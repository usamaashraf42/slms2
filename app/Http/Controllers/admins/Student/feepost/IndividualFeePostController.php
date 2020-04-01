<?php

namespace App\Http\Controllers\admins\Student\feepost;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndividualFeePostRequest;
use App\Models\Branch;
use App\Models\Student;
use App\Models\FeePost;
use App\Models\Course;
use App\Models\StudentFeeStructure;
use App\Models\Account;
use App\Models\Master;
use App\Models\FeeCorrection;
use DB;
use Auth;
class IndividualFeePostController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Fee Post', ['only' => ['create','index','store']]);
         
    }


    public function index(){
    	$branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
         if(Auth::user()->s_countryCode){
            $branch->where('b_countryCode',Auth::user()->s_countryCode);
        }
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
        $branches=$branch->get();
         $classes=Course::get();
    	return view('admin.student.Individualfeepost.create',compact('branches','classes'));
    }

    public function store(IndividualFeePostRequest $request){
       
    	
        $ly_no=Student::where('id',$request->std_id)->first();
     
       if(!$ly_no){
        session()->flash('error_message', __('Student Not found'));
        return redirect()->back();
       }

       $classId=$ly_no->course_id;
       $studentId=$request->std_id;
       $lyId=$ly_no->id;
       $month=$request->month;
       $year=$request->year;
       $branchId=$ly_no->branch_id;

        $tem=array();

        $tem=array();
        $branch=Branch::where('id',$ly_no->branch_id)->first();
        $on_round_off=1;

        if(isset($branch->userSetting->on_round_off) && ($branch->userSetting->on_round_off)){
            $on_round_off=$branch->userSetting->on_round_off;
        }else{
            $on_round_off=5;
        }
        
        $stduentsi=Student::where('id',$request->std_id)->first();

        $feeLast=FeePost::orderBy('id','DESC')->first();


        if(!($stduentsi)){
            session()->flash('error_message', __('Record not found'));
            return redirect()->back();
        }
     
        

            $checkFee=FeePost::where('std_id',$stduentsi->id)->where('fee_month',$request->month)->where('fee_year',$request->year)->first();

            $fineCheck=FeePost::where('std_id',$stduentsi->id)->orderBy('id','DESC')->first();
            if(!($checkFee)){
            	 $feeid=2;
                $grade=Course::where('id',$stduentsi->course_id)->first();
                $msterAccount=Account::where('std_id',$stduentsi->id)->orderBy('id','DESC')->first();
                if(!$msterAccount){
                      $msterAccount=Account::create([
                        'name'=>$stduentsi->s_name.' '.$stduentsi->s_fatherName, 
                        'std_id'=>$stduentsi->id, 
                        'type'=>'student', 
                      ]);
                    }

                $stdAccount=Master::where('account_id',$msterAccount->id)->orderBy('id','DESC')->first();
                if(!$stdAccount){
                     $stdAccount = new \stdClass();
                    $stdAccount->balance=0;
                }
                $stdFee=StudentFeeStructure::where('std_id',$stduentsi->id)->orderBy('id','DESC')->first();
                $firstReminder=$stdFee->carry_forward;

                DB::beginTransaction();
                $factor=$stdFee['m'.$request->month];
                $singleFee=isset($stdFee->Net_AnnualFee)?$stdFee->Net_AnnualFee/12:0;
                $curFEe=(isset($singleFee)?$singleFee:0)*(isset($factor)?$factor:1);

                

                $totalFee=round((isset($request->compFee)?(isset($grade->computer_fee)?$grade->computer_fee:0):0)+(isset($request->labFee)?(isset($grade->lab_fee)?$grade->lab_fee:0):0)+(isset($request->libFee)?(isset($grade->lib_fee)?$grade->lib_fee:0):0)+(isset($request->examFee)?(isset($grade->exam_fee)?$grade->exam_fee:0):0)+(isset($request->statFee)?(isset($grade->stationary)?$grade->stationary:0):0)+(isset($request->acFee)?(isset($grade->ac_charge)?$grade->ac_charge:0):0)+($singleFee*$factor)+(isset($request->misc1)?$request->misc1:0)+(isset($request->misc2)?$request->misc2:0) + (isset($stdFee->insurance_of)?$stdFee->insurance_of:0) +($request->outType==0?($fineCheck?($stdAccount->balance>1000)?800:0:0):0) );

                
                $fineMonth=0;
                $monthDeff=0;

                $fineMonth=0;
                $monthDeff=0;

                $TotaLsecondFee=($firstReminder+($totalFee));
                $secondReminder=($TotaLsecondFee) % $on_round_off;
                $totalFee=(int)($TotaLsecondFee-$secondReminder);
                StudentFeeStructure::where('std_id',$stduentsi->id)->update(['carry_forward'=>$secondReminder]);
               
              
                $total_feel=($totalFee);
                $grandTotalPay=0;
                if(($request->outType==0) && isset($fineCheck) && ($stdAccount) ){
                    $total_feel=($totalFee+ $stdAccount->balance);
                     $fineMonth=(($stdAccount->balance)>1000)?800:0;
                    $monthDeff=($fineCheck->month_def)?$fineCheck->month_def:0;
                    $grandTotalPay=$totalFee+(($stdAccount->balance)?$stdAccount->balance:0);
                }


                $stdAccounBalance=($totalFee+ (($stdAccount)?$stdAccount->balance:0));
                $feeRecord['feeId']=$feeid;
                $feeRecord['std_id']=$stduentsi->id;
                $feeRecord['branch_id']=$stduentsi->branch_id;
                $feeRecord['fee_month']=$request->month;
                $feeRecord['fee_year']=$request->year;
                $feeRecord['fee_date']=date('Y-m-d');
                $feeRecord['fee_due_date1']=date("Y-m-d", strtotime($request->fee_due_date1));
                $feeRecord['fee_due_date2']=date("Y-m-d", strtotime($request->fee_due_date2));
                $feeRecord['current_fee']=($singleFee*$factor);
                $feeRecord['comp_fee']=isset($request->compFee)?(isset($grade->computer_fee)?$grade->computer_fee:0):0;
                $feeRecord['labfee']=isset($request->labFee)?(isset($grade->lab_fee)?$grade->lab_fee:0):0;
                $feeRecord['libfee']=isset($request->libFee)?(isset($grade->lib_fee)?$grade->lib_fee:0):0;
                $feeRecord['examfee']=isset($request->examFee)?(isset($grade->exam_fee)?$grade->exam_fee:0):0;
                $feeRecord['statfee']=isset($request->statFee)?(isset($grade->stationary)?$grade->stationary:0):0;
                $feeRecord['accharge']=isset($request->acFee)?(isset($grade->ac_charge)?$grade->ac_charge:0):0;
                $feeRecord['fine_perday']=isset($request->fine_per_day)?$request->fine_per_day:0;
                $feeRecord['fine']=$fineMonth;
                $feeRecord['month_def']=$monthDeff;
                $feeRecord['utility_fee']=0;
                $feeRecord['transport_fee']=0;
                $feeRecord['paid_date']=null;
                $feeRecord['paid_amount']=0;
                $feeRecord['isPaid']=0;
                $feeRecord['isdeffered']=0;
                $feeRecord['deffered_amount']=0;

                $feeRecord['deffered_reason']='';
                $feeRecord['lastmonth_deffered']=isset($fineCheck->deffered_amount)?$fineCheck->deffered_amount:0;
                $feeRecord['deffered_NEXT_Month']=0;
                $feeRecord['iscorrection']=0;
                $feeRecord['corrected_amount']=0;
                $feeRecord['correction_reason']=0;
                $feeRecord['correction_approv']=0;
                $feeRecord['lastMonthCorrection']=isset($fineCheck->corrected_amount)?$fineCheck->corrected_amount:0;
                $feeRecord['outstand_lastmonth']=(isset($stdAccount->balance)?$stdAccount->balance:0);

                $feeRecord['grand_totalPayThisMonth']=$grandTotalPay;
                $feeRecord['insurance_of']=isset($stdFee->insurance_of)?$stdFee->insurance_of:0;
                $feeRecord['misc1']=isset($request->misc1)?$request->misc1:0;
                $feeRecord['misc1_desc']=isset($request->misc1_desc)?$request->misc1_desc:'';
                $feeRecord['misc2']=isset($request->misc2)?$request->misc2:0;
                $feeRecord['misc2_desc']=isset($request->misc2_desc)?$request->misc2_desc:'';
                $feeRecord['total_fee']=$total_feel;
                $feeRecord['created_by']=Auth::user()->id;
                $feeRecord['updated_by']=Auth::user()->id;
                
                $feeEffected=FeePost::create($feeRecord);

                if($feeEffected){
                	$student=Account::where('std_id',$stduentsi->id)->first();
                	$master=Master::where('account_id',$stduentsi->id)->orderBy('id','DESC')->first();
                	if(!$student){
						$student=Account::create([
							'name'=>$stduentsi->s_name.' '.$stduentsi->s_fatherName, 
							'std_id'=>$stduentsi->id, 
							'type'=>'student', 
						]);
					}
                	$ledger=[
						'fee_id'=>isset($feeEffected)?$feeEffected->id:null,
						'account_id'=>$student->id,
						'a_credit'=>0,
						'a_debit'=>isset($totalFee)?$totalFee:0,
						'balance'=>$stdAccounBalance,
						'posting_date'=>date('Y-m-d'),
						'description'=>"Fee post of ".getMonthName($request->month). "$request->year",
						'month'=>$request->month,
                        'year'=>$request->year,
                        'created_by'=>Auth::user()->id,
                        'updated_by'=>Auth::user()->id,
					];
					$st['a_debit']=$student->a_debit+$totalFee;
					
					$std=Master::create($ledger);
					$branch=Account::where('branch_id',$request->branch_id)->first();

					if(!$branch){
						$baranch=Branch::find($request->branch_id);
						$branch=Account::create([
							'name'=>$baranch->branch_name, 
							'branch_id'=>$baranch->id,
							'type'=>'Branch', 
						]);
					}

                     $master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
					$ledger=[
						'fee_id'=>isset($feeEffected)?$feeEffected->id:null,
						'a_credit'=>isset($totalFee)?$totalFee:0,
                        'account_id'=>$master->id,
						'a_debit'=>0,
						'balance'=>isset($master->balance)?$master->balance-$totalFee:(-$totalFee),
						'posting_date'=>date('Y-m-d'),
						'description'=>"Fee post of". getMonthName($request->month) ."$request->year",
						'month'=>$request->month,
                        'year'=>$request->year,
                        'created_by'=>Auth::user()->id,
                        'updated_by'=>Auth::user()->id,
					];
					$br['a_credit']=$branch->a_credit+$totalFee;
					$std=Master::create($ledger);

                    if($std){
                    	Account::where('std_id',$stduentsi->id)->update($st);
						Account::where('branch_id',$request->branch_id)->update($br);
                        DB::commit();
                        return redirect()->route('student.challen',$feeEffected->id);
                        session()->flash('success_message', __('Fee Post Successfully'));
                    }else{
                    	 session()->flash('error_message', __('Failed! To update Inserted'));
                        DB::rollBack();
                    }
                }else{
                	 session()->flash('error_message', __('To update Inserted'));
                    DB::rollBack();
                }
            }else{
                array_push($tem, $checkFee);
                session()->flash('error_message', __('Fee already Posted'));
            }

            
        

        return redirect()->back();
    }
}
