<?php

namespace App\Http\Controllers\Account\correction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeeCorrectionApprovalRequest;
use App\Models\FeeCorrection;
use App\Models\StudentFeeStructure;
use App\Models\FeePost;
use App\Models\Account;
use App\Models\Master;
use App\Models\Student;
use App\Models\Branch;
use DB;
use Auth;
class ApproveCorrectionController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Correction Approval', ['only' => ['create','store']]);
          $this->middleware('role_or_permission:Correction Approved Report', ['only' => ['index']]);
         
    }

    function index(){
       
		$branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
        $branches=$branch->get();
		return view('admin.account.approve-correction.create',compact('branches'));
	}
    
    public function create(){
         $branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
         if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
        $branches=$branch->get();
        // dd($branches);
    	$correction=FeeCorrection::where('correction_approv',0)->get();
        return view('admin.account.correction.approveBranchWise',compact('branches'));
		 // return view('admin.account.correction.index',compact('correction'));
    }

    public function store(FeeCorrectionApprovalRequest $request){
    	
// return $request->all();
        $correction=FeeCorrection::where('id',$request->correctinId)->where('correction_approv',0)->first();
     
        if(!($correction)){
            return response()->json(['status'=>2,'message'=>'Correction already approved']);
        }
        

        $request->approveAmount=$request->approveAmount?$request->approveAmount:0;
    	 $correction=FeeCorrection::find($request->correctinId);
        $correc['correction_approv']=1;
        $correc['corr_remarks']=$request->description;
        $approveAmount=isset($request->approveAmount)?$request->approveAmount:$correction->amount;

        $effected=FeeCorrection::where('id',$request->correctinId)->update($correc);
        
        if($effected){
            if(isset($correction->make_auto_installments) && ($correction->make_auto_installments)>0){
                    $stdFee=StudentFeeStructure::where('std_id',$correction->std_id)->orderBy('id','DESC')->first();

                        if(isset($stdFee)){
                            $currenMonth=date('m');
                            if(substr($currenMonth, 0, 1)=='0'){
                                $currenMonth=substr($currenMonth, 1, 2);
                            }
                            $paidFactor=0;
                            $singleFee=$stdFee->Net_AnnualFee/12;
                            $totalFactor=$stdFee->m1+$stdFee->m2+$stdFee->m3+$stdFee->m4+$stdFee->m5+$stdFee->m6+$stdFee->m7+$stdFee->m8+$stdFee->m9+$stdFee->m10+$stdFee->m11+$stdFee->m12;
                            for($i=4;$i<12;$i++){

                                if($i==$currenMonth){
                                    $latestFee=($paidFactor!=0?$paidFactor:1)*$singleFee;
                                    $remaingFactor=12-($paidFactor!=0?$paidFactor:1);
                                    if($correction->make_auto_installments==1){
                                        $record2['m'.$i]=$latestFee;
                                        $record2['installment_no']=1;
                                        $approveAmount+=($stdFee->annual_fee-$stdFee->scholarship_of);
                                    }if($correction->make_auto_installments==2){
                                        $record2['installment_no']=2;
                                        $record2['m'.$i]=$remaingFactor/2;
                                        $record2['m'.($i+1)]=$remaingFactor/2;
                                        $approveAmount=($stdFee->annual_fee-$stdFee->scholarship_of)/2;
                                    }
                                    if($correction->make_auto_installments==6){
                                        $record2['installment_no']=6;
                                        $record2['m'.$i]=$remaingFactor/6;
                                        $record2['m'.($i+1)]=$remaingFactor/6;
                                        $record2['m'.($i+2)]=$remaingFactor/6;
                                        $record2['m'.($i+3)]=$remaingFactor/6;
                                        $record2['m'.($i+4)]=$remaingFactor/6;
                                        $record2['m'.($i+4)]=$remaingFactor/6;
                                        $record2['m'.($i+5)]=$remaingFactor/6;
                                        $approveAmount=($stdFee->annual_fee-$stdFee->scholarship_of)/6;
                                    }else{
                                      
                                        $latestFactor=round(($remaingFactor/12),1);
                                        $record2['installment_no']=12;
                                        $record2['m1']=1;
                                        $record2['m2']=1;
                                        $record2['m3']=1;
                                        $record2['m4']=1;
                                        $record2['m5']=1;
                                        $record2['m6']=1;
                                        $record2['m7']=1;
                                        $record2['m8']=1;
                                        $record2['m9']=1;
                                        $record2['m10']=1;
                                        $record2['m11']=1;
                                        $record2['m12']=1;
                                        $approveAmount+=$singleFee;
                                       
                                    }
                                    $stdFee=StudentFeeStructure::where('std_id',$correction->std_id)->orderBy('id','DESC')->update($record2);
                                    break;
                                }
                                $paidFactor+=$stdFee['m'.$i];

                            }


                        }
                }
            
            if(isset($effected)){
                $stdent=Account::orderBy('id','DESC')->where('std_id',$correction->std_id)->first();
                if($correction->amount==$request->approveAmount){
                    $stdent=Student::find($correction->std_id);
                    $student=Account::where('std_id',$correction->std_id)->first();

                    $master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
                    $ledger=[
                        'fee_id'=>isset($correction->feeId)?$correction->feeId:null,
                        'a_credit'=>0,
                        'std_id'=>$correction->std_id,
                        'correction_id'=>isset($correction->id)?$correction->id:null,
                        'a_debit'=>0,
                        'account_id'=>$student->id,
                        'balance'=>$master->balance,
                        'posting_date'=>date('Y-m-d'),
                        'description'=>$request->description?$request->description:"Correction approved is ".''.($correction->amount),
                        'month'=>$correction->month,
                        'year'=>$correction->year,
                        'created_by'=>Auth::user()->id,
                        'updated_by'=>Auth::user()->id,
                    ];
                    $std=Master::create($ledger);
                }
        
                if(($correction->amount!=$request->approveAmount) && ($correction->make_auto_installments!=12)){
                    $effectedAmount=(($correction->amount)+(-($request->approveAmount)));
                    // return $effectedAmount;
                    $stdent=Student::find($correction->std_id);
                    $student=Account::where('std_id',$correction->std_id)->first();

                	$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
					$ledger=[
						'fee_id'=>isset($correction->feeId)?$correction->feeId:null,
						'a_credit'=>0,
                        'std_id'=>$correction->std_id,
						'correction_id'=>isset($correction->id)?$correction->id:null,
						'a_debit'=>isset($effectedAmount)?$effectedAmount:0,
						'account_id'=>$student->id,
						'balance'=>isset($master->balance)?($master->balance+($effectedAmount)):((isset($master->balance)?$master->balance:0)+$effectedAmount),
						'posting_date'=>date('Y-m-d'),
						'description'=>$request->description?$request->description:"Correction approved is ".''.($correction->amount-$effectedAmount).' ' ."and unapproved is $effectedAmount",
						'month'=>$correction->month,
                        'year'=>$correction->year,
                        'created_by'=>Auth::user()->id,
            			'updated_by'=>Auth::user()->id,
					];
					$br['a_debit']=$student->a_debit+$effectedAmount;
					$std=Master::create($ledger);

					$branch=Account::where('branch_id',$stdent->branch_id)->first();

					if(!$branch){
						$baranch=Branch::find($stdent->branch_id);
						$branch=Account::create([
							'name'=>$baranch->branch_name, 
							'branch_id'=>$baranch->id,
							'type'=>'Branch', 
						]);
					}
                    if($branch){
                        $master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
                        $ledger=[
                            'fee_id'=>isset($correction->feeId)?$correction->feeId:null,
                            'correction_id'=>isset($correction->id)?$correction->id:null,
                            'account_id'=>$branch->id,
                            'branch_id'=>$stdent->id,
                            'a_debit'=>0,
                            'a_credit'=>isset($effectedAmount)?$effectedAmount:0,
                            'balance'=>isset($master->balance)?(($master->balance)-($effectedAmount)):((isset($master->balance)?$master->balance:0)+$effectedAmount),
                            'posting_date'=>date('Y-m-d'),
                            'description'=>"Correction unapproved of".' '.$stdent->name .' '.$stdent->std_id,
                            'month'=>$correction->month,
                            'year'=>$correction->year,
                            'created_by'=>Auth::user()->id,
                            'updated_by'=>Auth::user()->id,
                        ];
                        $st['a_credit']=$branch->a_credit-$effectedAmount;
                        $std=Master::create($ledger);
                        Account::where('branch_id',$stdent->branch_id)->update($br);
                    }
					Account::where('std_id',$student->id)->update($st);
                }
               
                    $feeCorrection=FeePost::where('std_id',$correction->std_id)->orderBy('id','DESC')->first();
                    if($feeCorrection){
                        $approve=isset($request->approveAmount)?$request->approveAmount:$correction->amount;
                        $upto['correction_approv']=($feeCorrection->correction_approv + $approve);
                        $upto['iscorrection']=1;
                        $upto['correction_reason']=$request->corr_remarks;

                        if(isset($feeCorrection->total_fee) && isset($approve) && !empty($approve)){
                             $upto['total_fee']=$feeCorrection->total_fee-$approve;
                        }
                       
                        $feeCorrection=FeePost::where('std_id',$correction->std_id)->orderBy('id','DESC')->update($upto);
                    }
                    
                
            }
            return response()->json(['status'=>1,'message'=>'record inserted Successfully']);
            // session()->flash('success_message', __('Record Inserted Successfully'));
        }else{
             return response()->json(['status'=>0,'message'=>'record Failed to inserted']);
            // session()->flash('error_message', __('Failed! To update Record'));
        }


    }


    public function approveBranchWise(Request $request){
        // dd($request->all());
        $branch_id=$request->branch_id;

         $records=FeeCorrection::select('fee_corrections.*','fee_corrections.id as fee_correction_id', 'students.id as std_id')->where('correction_approv',0)->join('students', 'students.id', '=', 'fee_corrections.std_id')->orderBy('course_id','ASC')->with('student')->whereMonth('correction_date',$request->month)->whereYear('correction_date',$request->year);

              // $records=FeeCorrection::where('correction_approv',0)->with('student')->whereMonth('correction_date',$request->month)->whereYear('correction_date',$request->year);
        $records->whereHas('student', function($query) use ($branch_id){
            $query->where('branch_id',$branch_id);
          });
        $correction=$records->get();
        return view('admin.account.correction.index',compact('correction'));
    }

    public function correctionReport(Request $request){
        // dd($request->all());

        $branch_id=$request->branch_id;

        $records=FeeCorrection::where('correction_approv','<>',0)->join('students', 'students.id', '=', 'fee_corrections.std_id')->orderBy('course_id','ASC')->with('student')->whereMonth('correction_date',$request->month)->whereYear('correction_date',$request->year);

        $records->whereHas('student', function($query) use ($branch_id){
            $query->where('branch_id',$branch_id);
          });
        $correction=$records->get();
      
        return view('admin.account.approve-correction.index',compact('correction'));
    }
}
