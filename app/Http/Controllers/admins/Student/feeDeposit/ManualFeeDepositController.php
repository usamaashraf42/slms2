<?php

namespace App\Http\Controllers\admins\Student\feeDeposit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManualFeeDepositRequest;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\BankFeeDeposit;
use App\Mail\FeeDepositMail;
use App\Imports\CsvDataImport;
use App\Models\FeePost;
use App\Models\Branch;
use App\Models\Student;
use App\Models\Account;
use App\Models\Master;
use App\Models\Bank;
use Session;
use Auth;
use File;
use DB;
class ManualFeeDepositController extends Controller
{
	function __construct()
	{
		$this->middleware('role_or_permission:Fee Deposit', ['only' => ['create','index','store']]);
	}
	public function index(){
		return view('admin.student.feedeposit.manual.create');
	}

	public function store(ManualFeeDepositRequest $request){
		// dd($request->all());

		$depositDatest=$request->deposit_date?date("Y-m-d", strtotime($request->deposit_date)):date('Y-m-d');
		$smsdepositDatest=$request->deposit_date?date("d-M-Y", strtotime($request->deposit_date)):date('Y-m-d');
		$month=$request->month;
		$year=$request->year;


		$students=Student::where('id',$request->std_id)->first();

		$stdd=FeePost::with('student')->where('fee_month',$request->month)->where('fee_year',$request->year)->where('id',$request->feeId)->first();
		DB::beginTransaction();

		if(!$stdd){
			session()->flash('error_message', __('Failed! Fee Record not found'));
			return redirect()->back();
		}else{

			$feePosts=FeePost::where('id',$stdd->id)->update([
				'paid_date'=>date("d-m-Y", strtotime($request->deposit_date)),
				'paid_amount'=>$request->amount,
				'isPaid'=>($stdd->total_fee<=$request->amount)?1:2
			]);
			if(!$feePosts){
				DB::rollBack(); 
				session()->flash('error_message', __('Failed to fee record update'));
				return redirect()->back();
			}else{
				$baranch=Branch::where('id',$request->branch_id)->with('userSetting')->first();
				$branch_fine=isset($baranch->userSetting->fine)?$baranch->userSetting->fine:40;
                    ///////////////////////// Fee Deposit ......,...................
				$studentAc=Account::where('std_id',$students->id)->first();
				$master=Master::where('account_id',$studentAc->id)->orderBy('id','DESC')->first();
				if(!$studentAc){
					$studentAc=Account::create([
						'name'=>$students->s_name.' '.$students->s_fatherName, 
						'std_id'=>$students->id, 
						'type'=>'student', 
					]);
				}

				$ledger=[
					'fee_id'=>isset($stdd)?$stdd->id:null,
					'std_id'=>isset($students)?$students->id:null,
					'account_id'=>$studentAc->id,
					'a_credit'=>isset($request->amount)?$request->amount:0,
					'a_debit'=>0,
					'balance'=>isset($master->balance)?$master->balance-$request->amount:((isset($master->balance)?$master->balance:0)-$request->amount),


					'posting_date'=>$depositDatest,
					'description'=>"Fee Deposited of".' '.getMonthName($stdd->fee_month). ' '."$year",
					'month'=>$month,
					'year'=>$year,
					'created_by'=>Auth::user()->id,
					'updated_by'=>Auth::user()->id,
				];
				$std=Master::insert($ledger);
				if(!$std){
					DB::rollBack(); 
				}else{
					$branch=Account::where('branch_id',$students->branch_id)->first();
					if(!$branch){
						$branch=Account::create([
							'name'=>$baranch->branch_name, 
							'branch_id'=>$baranch->id,
							'type'=>'Branch', 
						]);
					}
					$master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
					$ledger=[
						'fee_id'=>isset($stdd)?$stdd->id:null,
						'a_credit'=>0,
						'account_id'=>$branch->id,
						'a_debit'=>isset($request->amount)?$request->amount:0,
						'balance'=>isset($master->balance)?$master->balance+$request->amount:($request->amount),
						'posting_date'=>$depositDatest,
						'description'=>"Fee Deposited of  $students->s_name($students->id)".' ' .getMonthName($stdd->fee_month).' ' ."$stdd->fee_year",
						'month'=>$month,
						'year'=>$year,
						'created_by'=>Auth::user()->id,
						'updated_by'=>Auth::user()->id,
					];
					$std=Master::create($ledger);
					if(!$std){
						DB::rollBack(); 
						session()->flash('error_message', __('Failed to update account'));
						return redirect()->back(); 
					}else{
                          //////////////////////
                          // end fee deposit...................... ////////////////////////
                          ///////////////////////// fine Posting
						$now = strtotime(date( 'Y-m-d', strtotime($request->deposit_date) )); 

						$your_date = strtotime($stdd->fee_due_date1);

						if($stdd->outstand_lastmonth > 0){
							$your_date = strtotime($stdd->fee_due_date2);
						}else{
							$your_date = strtotime($stdd->fee_due_date1);
						}


						$datediff = $now - $your_date;
						$totalDay=round($datediff / (60 * 60 * 24));
						$fine=$totalDay * $branch_fine;

						if(($fine) && ($fine>=1)){
							$master=Master::where('account_id',$studentAc->id)->orderBy('id','DESC')->first();
							$ledger=[
								'fee_id'=>isset($stdd)?$stdd->id:null,
								'std_id'=>isset($students)?$students->id:null,
								'account_id'=>$studentAc->id,
								'a_credit'=>0,
								'a_debit'=>isset($fine)?$fine:0,
								'balance'=>isset($master->balance)?$master->balance+$fine:($fine),
								'posting_date'=>$depositDatest,
								'description'=>"Late Fee Deposit fine of".' '.getMonthName($stdd->fee_month).' '. "$year",
								'month'=>$month,
								'year'=>$year,
								'created_by'=>Auth::user()->id,
								'updated_by'=>Auth::user()->id,
							];
							$std=Master::create($ledger);

							$master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
							$ledger=[
								'fee_id'=>isset($stdd)?$stdd->id:null,
								'a_credit'=>isset($fine)?$fine:0,
								'account_id'=>$branch->id,
								'a_debit'=>0,
								'balance'=>isset($master->balance)?$master->balance-$fine:(-$fine),
								'posting_date'=>$depositDatest,
								'description'=>"Late Fee Deposit fine of".' '. getMonthName($month).' ' ."$year",
								'month'=>$month,
								'year'=>$year,
								'created_by'=>Auth::user()->id,
								'updated_by'=>Auth::user()->id,
							];
							$firstInsert=Master::create($ledger);
						}
						$std=1;
						if(!$std){
							DB::rollBack();
							session()->flash('error_message', __('Failed to update Fee Record'));
							return redirect()->back();
						}else{
							
				

								$banks=BankFeeDeposit::create([
									'deposite_date'=>$depositDatest,
									'fee_id'=>isset($stdd)?$stdd->id:null,
									'std_id'=>$students->id,
									'branch_id'=>$students->branch_id,
									'fee_month'=>isset($stdd)?$stdd->fee_month:null,
									'fee_year'=>isset($stdd)?$stdd->fee_year:null,
									'paid_amount'=>$request->amount,
									'created_by'=>Auth::user()->id,
								]);

                          // if($students->s_phoneNo){
                          //   $sms= ("FEE DEPOSITED %0aDear $students->s_fatherName ,%0aThank you for paying the Fee Installment of Rs. $request->amount %0aIn $bankName on $smsdepositDatest. %0aIf you have any questions please contact your branch.");
                          //   SendSms($students->s_phoneNo,$sms);
                          // }
                          // if($students->std_mail){
                          //   Mail::send('emails.depositMail',['data'=>$students,'amount'=>$request->amount,'smsdepositDatest'=>$smsdepositDatest,'bankName'=>$bankName], function($message){    
                          //           $message->to($students->std_mail)->subject('Fee Deposited');    
                          //   });

                          // }
								if($banks){
									DB::commit();
									 session()->flash('success_message', __('Record Update Successfully'));
									 return redirect()->back();
								}else{
									DB::rollBack();
									session()->flash('error_message', __('Failed! To Fee deposit'));
									return redirect()->back();
								}

								
							
						}
                            ////////////////////////
					}
				}

			}


		}
	}
}

