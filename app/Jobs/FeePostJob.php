<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
class FeePostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $timeout = 120000000;

    protected $branchId;
    protected $classId;
    protected $month;
    protected $year;
    protected $compFee;
    protected $labFee;
    protected $libFee;
    protected $examFee;
    protected $statFee;
    protected $acFee;
    protected $misc1;
    protected $misc2;
    protected $tution;
    protected $misc1_desc;
    protected $misc2_desc;
    protected $lyId;
    protected $studentId;
    protected $outType;
    protected $discount;
    protected $discount_description;
    protected $fee_due_date1;
    protected $fee_due_date2;
    protected $fine_per_day;
    protected $admin_id;

    public function __construct($branchId,$classId,$month,$year,$compFee,$labFee,$libFee,$examFee,$statFee,$acFee,$misc1,$misc2,$tution,$misc1_desc,$misc2_desc,$lyId,$studentId,$outType,$discount,$discount_description,$fee_due_date1,$fee_due_date2,$fine_per_day,$admin_id)
    {
        $this->admin_id=$admin_id;
        $this->branchId=$branchId;
        $this->classId=$classId;
        $this->month=$month;
        $this->year=$year;
        $this->compFee=$compFee;
        $this->labFee=$labFee;
        $this->libFee=$libFee;
        $this->examFee=$examFee;
        $this->statFee=$statFee;
        $this->acFee=$acFee;
        $this->misc1=$misc1;
        $this->misc2=$misc2;
        $this->tution=$tution;
        $this->misc1_desc=$misc1_desc;
        $this->misc2_desc=$misc2_desc;
        $this->lyId=$lyId;
        $this->studentId=$studentId;
        $this->outType=$outType;
        $this->discount=$discount;
        $this->discount_description=$discount_description;

        $this->fee_due_date2=$fee_due_date2;
        $this->fee_due_date1=$fee_due_date1;
        $this->fine_per_day=$fine_per_day;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       try{
            $admin_id=$this->admin_id;
            $branchId=$this->branchId;
            $classId=$this->classId;
            $month=$this->month;
            $year=$this->year;
            $compFee=$this->compFee;
            $labFee=$this->labFee;
            $libFee=$this->libFee;
            $examFee=$this->examFee;
            $statFee=$this->statFee;
            $acFee=$this->acFee;
            $misc1=$this->misc1;
            $misc2=$this->misc2;
            $tution=$this->tution;
            $misc1_desc=$this->misc1_desc;
            $misc2_desc=$this->misc2_desc;
            $discount=$this->discount;
            $outType=$this->outType;
            $discount_description=$this->discount_description;
            $fee_due_date2=$this->fee_due_date2;
            $fee_due_date1=$this->fee_due_date1;
            $fine_per_day=$this->fine_per_day;

            $student=Student::where('branch_id',$branchId)->where('status',1)->where('is_freeze','<>',0);

                if(isset($classId) && $classId>0){
                    $student->where('course_id',$classId);
                }
                $stduents=$student->get();


                $branch=Branch::where('id',$branchId)->with('userSetting')->first();
                $on_round_off=1;
                if(isset($branch->userSetting->on_round_off) && ($branch->userSetting->on_round_off)){
                    $on_round_off=$branch->userSetting->on_round_off;
                }else{
                    $on_round_off=5;
                }
                $branch_fine=(isset($branch->userSetting->fine)?$branch->userSetting->fine:40)*20;


                if(!count($stduents)){
                    // session()->flash('error_message', __('Record not found'));

                }


            for($i=0; $i<count($stduents);$i++){
                $checkFee=null;
                $checkFee=FeePost::where('std_id',$stduents[$i]->id)->where('fee_month',$month)->where('fee_year',$year)->first();

                $fineCheck=FeePost::where('std_id',$stduents[$i]->id)->orderBy('id','DESC')->first();
                if(!($checkFee) && empty($checkFee)){
                    $grade=Course::where('id',$stduents[$i]->course_id)->first();
                    $msterAccount=Account::where('std_id',$stduents[$i]->id)->orderBy('id','DESC')->first();
                    if(!$msterAccount){
                        $msterAccount=Account::create([
                            'name'=>$stduents[$i]->s_name.' '.$stduents[$i]->s_fatherName,
                            'std_id'=>$stduents[$i]->id,
                            'type'=>'student',
                        ]);
                    }

                    $stdAccount=Master::where('account_id',$msterAccount->id)->orderBy('id','DESC')->first();
                    if(!$stdAccount){
                         $stdAccount = new \stdClass();
                        $stdAccount->balance=0;
                    }
                    $stdFee=StudentFeeStructure::where('std_id',$stduents[$i]->id)->orderBy('id','DESC')->first();

                    DB::beginTransaction();
                    $factor=$stdFee['m'.$month];
                    $singleFee=isset($stdFee->Net_AnnualFee)?$stdFee->Net_AnnualFee/12:0;
                    $curFEe=(isset($singleFee)?$singleFee:0)*(isset($factor)?$factor:1);
                    $firstReminder=$stdFee->carry_forward;
                    $currentFee=round($singleFee*$factor);


                    if(!$tution){
                        $currentFee=0;
                    }

                    $totalFee=round((isset($compFee)?(isset($grade->computer_fee)?$grade->computer_fee:0):0)+(isset($labFee)?(isset($grade->lab_fee)?$grade->lab_fee:0):0)+(isset($libFee)?(isset($grade->lib_fee)?$grade->lib_fee:0):0)+(isset($examFee)?(isset($grade->exam_fee)?$grade->exam_fee:0):0)+(isset($statFee)?(isset($grade->stationary)?$grade->stationary:0):0)+(isset($acFee)?(isset($grade->ac_charge)?$grade->ac_charge:0):0)+$currentFee+(isset($misc1)?$misc1:0)+(isset($misc2)?$misc2:0)  +($outType==0?($fineCheck?($stdAccount->balance>1000)?$branch_fine:0:0):0) + $stdFee->transport_fee);

                    $fineMonth=0;
                    $monthDeff=0;

                    $TotaLsecondFee=($firstReminder+($totalFee));
                    $secondReminder=($TotaLsecondFee)%$on_round_off;
                    $totalFee=(int)($TotaLsecondFee-$secondReminder);
                    StudentFeeStructure::where('std_id',$stduents[$i]->id)->update(['carry_forward'=>$secondReminder]);



                    $total_feel=($totalFee);

                    $grandTotalPay=0;
                    if(($outType==0) && isset($fineCheck) && ($stdAccount) ){
                        $total_feel=($totalFee+ $stdAccount->balance);
                        // $fineMonth=$fineCheck?($stdAccount->balance>1000)?$branch_fine:0:0;
                        if($fineCheck){
                            $fineMonth=($stdAccount->balance>1000)?$branch_fine:0;
                        }else{
                            $fineMonth=0;
                        }
                        $monthDeff=($fineCheck->month_def)?$fineCheck->month_def:0;
                        $grandTotalPay=$totalFee+(($stdAccount->balance)?$stdAccount->balance:0);
                    }



                    // $total_feel
                    $discount_total_feel=0;
                    $discount_rate=0;

                    if($discount && $currentFee){
                        $discount_rate=($discount*$currentFee)/100;
                        $discount_total_feel=$currentFee-$discount_rate;

                    }
                    $stdAccounBalance=($totalFee+ (($stdAccount)?$stdAccount->balance:0));
                    $feeRecord['fee_this_month']=$singleFee;
                    $feeRecord['fee_factor']=$factor;

                    $feeRecord['fee_discount']=$discount;
                    $feeRecord['fee_discount_des']=$discount_description;

                    $feeRecord['std_id']=$stduents[$i]->id;
                    $feeRecord['branch_id']=$stduents[$i]->branch_id;
                    $feeRecord['course_id']=$stduents[$i]->course_id;

                    $feeRecord['fee_month']=$month;
                    $feeRecord['fee_year']=$year;
                    $feeRecord['fee_date']=date('Y-m-d');
                    $feeRecord['fee_due_date1']=date("Y-m-d", strtotime($fee_due_date1));
                    $feeRecord['fee_due_date2']=date("Y-m-d", strtotime($fee_due_date2));
                    $feeRecord['current_fee']=$currentFee;
                    $feeRecord['comp_fee']=isset($compFee)?(isset($grade->computer_fee)?$grade->computer_fee:0):0;
                    $feeRecord['labfee']=isset($labFee)?(isset($grade->lab_fee)?$grade->lab_fee:0):0;
                    $feeRecord['libfee']=isset($libFee)?(isset($grade->lib_fee)?$grade->lib_fee:0):0;
                    $feeRecord['examfee']=isset($examFee)?(isset($grade->exam_fee)?$grade->exam_fee:0):0;
                    $feeRecord['statfee']=isset($statFee)?(isset($grade->stationary)?$grade->stationary:0):0;
                    $feeRecord['accharge']=isset($acFee)?(isset($grade->ac_charge)?$grade->ac_charge:0):0;
                    $feeRecord['fine_perday']=isset($fine_per_day)?$fine_per_day:0;
                    $feeRecord['fine']=$fineMonth;
                    $feeRecord['month_def']=$monthDeff;
                    $feeRecord['utility_fee']=0;
                    $feeRecord['transport_fee']=$stdFee->transport_fee;
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
                    $feeRecord['misc1']=isset($misc1)?$misc1:0;
                    $feeRecord['misc1_desc']=isset($misc1_desc)?$misc1_desc:'';
                    $feeRecord['misc2']=isset($misc2)?$misc2:0;
                    $feeRecord['misc2_desc']=isset($misc2_desc)?$misc2_desc:'';
                    $feeRecord['total_fee']=($discount)>0? $this->feeTotalRounded($stduents[$i]->id,($total_feel-$discount_rate),$on_round_off):$total_feel;
                    $feeRecord['created_by']=$admin_id;
                    $feeRecord['updated_by']=$admin_id;

                    $feeEffected=FeePost::create($feeRecord);

                    if($feeEffected){
                        $student=Account::where('std_id',$stduents[$i]->id)->first();
                        $master=Master::where('account_id',$stduents[$i]->id)->orderBy('id','DESC')->first();
                        if(!$student){
                            $student=Account::create([
                                'name'=>$stduents[$i]->s_name.' '.$stduents[$i]->s_fatherName,
                                'std_id'=>$stduents[$i]->id,
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
                            'description'=>"Fee post of ".getMonthName($month). "$year",
                            'month'=>$month,
                            'year'=>$year,
                            'created_by'=>$admin_id,
                            'updated_by'=>$admin_id,
                        ];
                        $st['a_debit']=$student->a_debit+$totalFee;

                        $std=Master::create($ledger);

                        $branch=Account::where('branch_id',$branchId)->first();
                        if(!$branch){
                            $baranch=Branch::find($branchId);
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

                            'account_id'=>$branch->id,
                            'a_debit'=>0,
                            'balance'=>isset($master->balance)?$master->balance-$totalFee:(-$totalFee),
                            'posting_date'=>date('Y-m-d'),
                            'description'=>"Fee post of". getMonthName($month) ."$year",
                            'month'=>$month,
                            'year'=>$year,
                            'created_by'=>$admin_id,
                            'updated_by'=>$admin_id,
                        ];
                        $br['a_credit']=$branch->a_credit+$totalFee;
                        $std=Master::create($ledger);

                        // if discount given by admin
                        if($discount && $discount_rate){
                            $student=Account::where('std_id',$stduents[$i]->id)->first();
                            $masterSc=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();

                            $ledger=[
                                'fee_id'=>isset($feeEffected)?$feeEffected->id:null,
                                'account_id'=>$student->id,
                                'a_credit'=>$discount_rate,
                                'a_debit'=>0,
                                'balance'=>isset($masterSc->balance)?$masterSc->balance-$discount_rate:(-$discount_rate),
                                'posting_date'=>date('Y-m-d'),
                                'description'=>$discount_description,
                                'month'=>$month,
                                'year'=>$year,
                                'created_by'=>$admin_id,
                                'updated_by'=>$admin_id,
                            ];

                            $std=Master::create($ledger);

                            $branch=Account::where('branch_id',$branchId)->first();

                            $master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
                            $ledger=[
                                'fee_id'=>isset($feeEffected)?$feeEffected->id:null,
                                'a_credit'=>0,
                                'account_id'=>$branch->id,
                                'a_debit'=>$discount_rate,
                                'balance'=>isset($master->balance)?$master->balance+$discount_rate:($totalFee),
                                'posting_date'=>date('Y-m-d'),
                                'description'=>$discount_description,
                                'month'=>$month,
                                'year'=>$year,
                                'created_by'=>$admin_id,
                                'updated_by'=>$admin_id,
                            ];
                            $std=Master::create($ledger);
                        }

                        if($std){
                            // Account::where('std_id',$stduents[$i]->id)->update($st);
                            // Account::where('branch_id',$branchId)->update($br);
                            DB::commit();
                            

                        }else{
                            DB::rollBack();
                        }
                    }else{
                        DB::rollBack();
                    }
                }
            }
       } catch(\Exception $e){
        }
    }

    public function feeTotalRounded($std_id,$totalFee,$on_round_off){
        $stdFee=StudentFeeStructure::where('std_id',$std_id)->orderBy('id','DESC')->first();
        $firstReminder=$stdFee->carry_forward;
        $TotaLsecondFee=($firstReminder+($totalFee));
        $secondReminder=($TotaLsecondFee)%$on_round_off;
        $totalFee=(int)($TotaLsecondFee-$secondReminder);
        StudentFeeStructure::where('std_id',$std_id)->update(['carry_forward'=>$secondReminder]);
        return $totalFee;
    }
}
