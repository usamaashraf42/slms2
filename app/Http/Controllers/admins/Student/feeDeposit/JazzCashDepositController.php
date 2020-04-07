<?php

namespace App\Http\Controllers\admins\Student\feeDeposit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JazzCashFileReadRequest;
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
use App\Models\BankTransactionDetail;
use Session;
use Auth;
use File;
use DB;

class JazzCashDepositController extends Controller
{
	public function index(){
		return view('admin.student.feedeposit.jazzcash.index');
	}


	public function store(JazzCashFileReadRequest $request){
		$deposite_date=date("Y-m-d", strtotime($request->deposite_date));

		if($request->hasFile('mis')){
			$sheedName=$request->mis->getClientOriginalName();
			$extension = File::extension($request->mis->getClientOriginalName());
			if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
				$path = $request->mis->getRealPath();
				$excelData = Excel::toArray(new CsvDataImport, $request->file('mis')); 
				$data=(array)$excelData[0];
				// dd($data[1]);
				$entry=count($data);
				if(isset($data[1])){
					$this->jazzcashFileRead($data[1],$deposite_date);
				}
			}
		}

		session()->flash('success_message', __('File Read Successfully'));
		return redirect()->back();


	}


	public function jazzcashFileRead($requests,$deposit_date){
		// $amount=


		if(isset($requests[8])  && $requests[8]<=0){
			return true;
		}
		if(isset($requests[15])&& $requests[15] == '000'||$requests[15] == '121'||$requests[15] == '200'){
			$amount=$requests[8];

		foreach ($requests as $request) {
			$depositDatest=$deposit_date?date("Y-m-d", strtotime($deposit_date)):date('Y-m-d');
			$smsdepositDatest=$deposit_date?date("d-M-Y", strtotime($deposit_date)):date('Y-m-d');
			
			if(isset($requests[11]) && $requests[11]){
				$transaction=BankTransactionDetail::find($requests[11]);

				if($transaction && $transaction->fee_id && $transaction->status==1){
					$students=Student::where('id',$transaction->std_id)->first();
					$stdd=FeePost::orderBy('id','DESC')->with('student')->where('id',$transaction->fee_id)->first();
					$month=$stdd->fee_month;
					$year=$stdd->fee_year;
					DB::beginTransaction();

					if(!$stdd){
						
						return true;
					}else{

						$effectedAmount=$stdd->paid_amount>0?$stdd->paid_amount+$amount:$amount;
						$feePosts=FeePost::where('id',$stdd->id)->update([
							'paid_date'=>date("d-m-Y"),
							'paid_amount'=>$effectedAmount,
							'isPaid'=>($stdd->total_fee<=$effectedAmount)?1:2
						]);
						if(!$feePosts){
							DB::rollBack(); 
							
							return true;
						}else{
							$baranch=Branch::where('id',$students->branch_id)->with('userSetting')->first();
							$branch_fine=isset($baranch->userSetting->fine)?$baranch->userSetting->fine:40;
							$branch=Account::where('branch_id',$students->branch_id)->first();
							$studentAc=Account::where('std_id',$students->id)->first();
							
							$now = strtotime(date( 'Y-m-d', strtotime($deposit_date) )); 
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

							$master=Master::where('account_id',$studentAc->id)->orderBy('id','DESC')->first();
							$ledger=[
								'fee_id'=>isset($stdd)?$stdd->id:null,
								'std_id'=>isset($students)?$students->id:null,
								'account_id'=>$studentAc->id,
								'a_credit'=>isset($amount)?$amount:0,
								'a_debit'=>0,
								'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),


								'posting_date'=>$depositDatest,
								'description'=>"Fee Deposited of  $students->s_name($students->id)".' ' .getMonthName($stdd->fee_month).' ' ."$stdd->fee_year by jazzcash",
								'month'=>$month,
								'year'=>$year,
								'created_by'=>Auth::user()->id,
								'updated_by'=>Auth::user()->id,
							];
							$std=Master::insert($ledger);
							if(!$std){
								DB::rollBack(); 
							}else{

								$master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
								$ledger=[
									'fee_id'=>isset($stdd)?$stdd->id:null,
									'a_credit'=>0,
									'account_id'=>$branch->id,
									'a_debit'=>isset($amount)?$amount:0,
									'balance'=>isset($master->balance)?$master->balance+$amount:($amount),
									'posting_date'=>$depositDatest,
									'description'=>"Fee Deposited of  $students->s_name($students->id)".' ' .getMonthName($stdd->fee_month).' ' ."$stdd->fee_year by jazzcash",
									'month'=>$month,
									'year'=>$year,
									'created_by'=>Auth::user()->id,
									'updated_by'=>Auth::user()->id,
								];
								$std=Master::create($ledger);
								if(!$std){
									DB::rollBack(); 

									return true; 
								}else{

									$std=1;
									if(!$std){
										DB::rollBack();
										
										return true;
									}else{



										$banks=BankFeeDeposit::create([
											'deposite_date'=>$depositDatest,
											'fee_id'=>isset($stdd)?$stdd->id:null,
											'std_id'=>$students->id,
											'branch_id'=>$students->branch_id,
											'fee_month'=>isset($stdd)?$stdd->fee_month:null,
											'fee_year'=>isset($stdd)?$stdd->fee_year:null,
											'paid_amount'=>$amount,
											'created_by'=>Auth::user()->id,
										]);

										if($banks){
											DB::commit();
											return true;
										}else{
											DB::rollBack();
											return true;
										}


									}
								}
							}

						}

					}
				}

			}
		}

		}
		
	}
	

}
