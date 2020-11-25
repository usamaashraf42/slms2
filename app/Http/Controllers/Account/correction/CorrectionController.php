<?php

namespace App\Http\Controllers\Account\correction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeeCorrectionRequest;
use App\Models\FeeCorrection;
use App\Models\StudentFeeStructure;
use App\Models\FeePost;
use App\Models\Account;
use App\Models\Master;
use App\Models\Student;
use App\Models\Branch;
use DB;
use Auth;
class CorrectionController extends Controller
{
	function __construct()
	{
         $this->middleware('role_or_permission:Correction', ['only' => ['create','store']]);
         $this->middleware('role_or_permission:Correction Report', ['only' => ['index']]);

	}


///////////////////////////////
	// correction pending=0
	// correction approval=1
	// correctoin upaprroval=2
//////////////////////////////
	function index(){
		$branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
        $branches=$branch->get();
		return view('admin.account.correction.correction_report_branch',compact('branches'));
	}

	public function create(){
		return view('admin.account.correction.create');
	}

	public function store(FeeCorrectionRequest $request){
// echo (new \DateTime($request->due_date));exit();
		// if(date('d')>28){
		// 	session()->flash('error_message', __('You can not Enter Correction after 28...'));
		// 	return redirect()->back();
		// }

        // $year=date('Y');
        $year=$request->year;


		$deffered=isset($request->deffered)?$request->deffered:0;
		$request->correctionAmount=$request->correctionAmount!=null?$request->correctionAmount:0;

		$stdFee=StudentFeeStructure::where('std_id',$request->ly_no)->orderBy('id','DESC')->first();
		$stdent=Student::where('id',$request->ly_no)->first();
		$Net_AnnualFee=$stdFee->annual_fee - $stdFee->insurance_of;

		if(isset($stdFee)){
            // $currenMonth=date('m');
            $currenMonth=$request->month;
			if(substr($currenMonth, 0, 1)=='0'){
				$currenMonth=substr($currenMonth, 1, 2);
			}
			$paidFactor=0;
			$singleFee=$Net_AnnualFee/12;
		}
		$effectedAmount=$request->correctionAmount;

		DB::beginTransaction();

		$correction=FeeCorrection::create([
			'amount'=>$effectedAmount,
			'feeId'=>$request->feeId,
			'std_id'=>$request->ly_no,
			'correction_date'=>date('Y-m-d'),
			'correction_approv'=>0,
			'corr_remarks'=>isset($request->correctionRemarks)?$request->correctionRemarks:'',
			'make_auto_installments'=>isset($request->make_auto_installments)?$request->make_auto_installments:0,
			'created_by'=>Auth::user()->id,
			'updated_by'=>Auth::user()->id,
		]);
		if($correction){
			$studentFeePost=FeePost::where('id',$request->feeId)->first();
			$totalCorrection=(isset($studentFeePost->corrected_amount)?$studentFeePost->corrected_amount:0);
			$feePostUpdate['fee_due_date1']=date("Y-m-d", strtotime($request->due_date));
			$feePostUpdate['fee_due_date2']=date("Y-m-d", strtotime($request->due_date));
			$feePostUpdate['iscorrection']=2;
			$feePostUpdate['corrected_amount']=($totalCorrection)+($effectedAmount);
			$feePostUpdate['correction_reason']=isset($request->correctionRemarks)?$request->correctionRemarks:'';
			$feePostUpdate['deffered_amount']=isset($request->deffered)?$request->deffered:0;

			if(isset($studentFeePost->total_fee)){
				$feePostUpdate['total_fee']=(($studentFeePost->total_fee)-($deffered+($effectedAmount)));
			}
			$postEffected=FeePost::where('id',$request->feeId)->update($feePostUpdate);

			if($postEffected){
				$student=Account::where('std_id',$correction->std_id)->first();
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				if(!$student){
					$student=Account::create([
						'name'=>$stdent->s_name.' '.$stdent->s_fatherName,
						'std_id'=>$stdent->id,
						'type'=>'student',
					]);
				}
				$ledger=[
					'fee_id'=>isset($request->feeId)?$request->feeId:null,
					'std_id'=>isset($correction->std_id)?$correction->std_id:null,
					'correction_id'=>isset($correction->id)?$correction->id:null,
					'account_id'=>$student->id,
					'a_debit'=>0,
					'a_credit'=>isset($effectedAmount)?$effectedAmount:0,

					'balance'=>isset($master->balance)?($master->balance-$effectedAmount):((isset($master->balance)?$master->balance:0)+$effectedAmount),
					'posting_date'=>date('Y-m-d'),
					'description'=>'cor provisional (if not approved will be reverse)',
					'month'=>$currenMonth,
					'year'=>$year,
					'created_by'=>Auth::user()->id,
					'updated_by'=>Auth::user()->id,
				];
				$st['a_credit']=$student->a_credit-$effectedAmount;

				$std=Master::create($ledger);
				$branch=Account::where('branch_id',$request->branch_id)->first();

				if(!$branch){
					$baranch=Branch::find($stdent->branch_id);
					$branch=Account::create([
						'name'=>$baranch->branch_name,
						'branch_id'=>$baranch->id,
						'type'=>'Branch',
					]);
				}
				$master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
				$ledger=[
					'fee_id'=>isset($request->feeId)?$request->feeId:null,
					'branch_id'=>isset($baranch)?$baranch->id:null,
					'a_credit'=>0,
					'correction_id'=>isset($correction->id)?$correction->id:null,
					'a_debit'=>isset($effectedAmount)?$effectedAmount:0,
					'account_id'=>$branch->id,
					'balance'=>isset($master->balance)?($master->balance+$effectedAmount):((isset($master->balance)?$master->balance:0)+$effectedAmount),
					'posting_date'=>date('Y-m-d'),
					'description'=>'cor provisional (if not approved will be reverse)',
					'month'=>$currenMonth,
					'year'=>$year,
					'created_by'=>Auth::user()->id,
					'updated_by'=>Auth::user()->id,
				];
				$br['a_debit']=$branch->a_debit+$effectedAmount;
				$std=Master::create($ledger);

				Account::where('std_id',$student->id)->update($st);
				Account::where('branch_id',$stdent->branch_id)->update($br);
					//////////////////////

				if(isset($request->deffered) && !empty($request->deffered) && ($request->deffered>0)){
					$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
					$ledger=[
						'std_id'=>isset($correction->std_id)?$correction->std_id:null,
						'fee_id'=>isset($request->feeId)?$request->feeId:null,
						'correction_id'=>isset($correction->id)?$correction->id:null,
						'account_id'=>$student->id,

						'a_debit'=>0,
						'a_credit'=>$request->deffered,
						'balance'=>isset($master->balance)?($master->balance-$request->deffered):((isset($master->balance)?$master->balance:0)+$request->deffered),

						'posting_date'=>date('Y-m-d'),
						'description'=>'Defferred Amount Credit',
						'month'=>$currenMonth,
						'year'=>$year,
						'created_by'=>Auth::user()->id,
						'updated_by'=>Auth::user()->id,
					];
					$st['a_credit']=$student->a_credit-$request->deffered;

					$std=Master::create($ledger);


					$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
					$ledger=[
						'fee_id'=>isset($request->feeId)?$request->feeId:null,
						'branch_id'=>isset($baranch)?$baranch->id:null,
						'a_credit'=>0,
						'correction_id'=>isset($correction->id)?$correction->id:null,
						'a_debit'=>isset($request->deffered)?$request->deffered:0,
						'account_id'=>$student->id,
						'balance'=>isset($master->balance)?($master->balance+$request->deffered):((isset($master->balance)?$master->balance:0)+$request->deffered),
						'posting_date'=>date('Y-m-d'),
						'description'=>'Defferred Amount dabit',
						'month'=>$currenMonth,
						'year'=>$year,
						'created_by'=>Auth::user()->id,
						'updated_by'=>Auth::user()->id,
					];
					$br['a_debit']=$student->a_debit+$request->deffered;
					$std=Master::create($ledger);

				}
                /////////////////////////////
				DB::commit();
				session()->flash('success_message', __('Record Inserted Successfully'));
				return redirect()->route('student.challen',$request->feeId);


			}else{
				session()->flash('error_message', __('Failed! To update Record'));
				DB::rollBack();
			}

		}else{
			session()->flash('error_message', __('Failed! To update Record'));
			DB::rollBack();
		}

		return redirect()->back();
	}


	public function edit($id){

		$currenMonth=date('m');
		if(substr($currenMonth, 0, 1)=='0'){
			$currenMonth=substr($currenMonth, 1, 2);
		}
		$correction=FeeCorrection::find($id);
		$cor['correction_approv']=2;
		$data=FeeCorrection::where('id',$id)->update($cor);

		if(!$correction){
			session()->flash('error_message', __('Record not found'));
			return redirect()->back();
		}

		if(isset($correction)){
			$totalFee=$correction->amount;
			$student=Account::where('std_id',$correction->std_id)->first();
			$stdd=Student::find($correction->std_id);
			$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();

			$ledger=[
				'fee_id'=>isset($feeEffected)?$feeEffected->id:null,
				'account_id'=>$student->id,
				'a_credit'=>0,
				'a_debit'=>isset($totalFee)?$totalFee:0,
				'balance'=>isset($master->balance)?$master->balance+$totalFee:((isset($master->balance)?$master->balance:0)+$totalFee),
				'posting_date'=>date('Y-m-d'),
				'description'=>"Correction Unapproved",
				'month'=>$currenMonth,
				'year'=>date('Y'),
				'created_by'=>Auth::user()->id,
				'updated_by'=>Auth::user()->id,
			];
			$st['a_debit']=$student->a_debit+$totalFee;

			$std=Master::create($ledger);
			$branch=Account::where('branch_id',$stdd->branch_id)->first();
			$master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
			$ledger=[
				'fee_id'=>isset($feeEffected)?$feeEffected->fee_id:null,
				'a_credit'=>isset($totalFee)?$totalFee:0,
				'a_debit'=>0,
				'balance'=>isset($master->balance)?$master->balance-$totalFee:((isset($master->balance)?$master->balance:0)-$totalFee),
				'posting_date'=>date('Y-m-d'),
				'description'=>"Correction Unapproved",
				'month'=>$currenMonth,
				'year'=>date('Y'),
				'created_by'=>Auth::user()->id,
				'updated_by'=>Auth::user()->id,
			];
			$br['a_credit']=$branch->a_credit+$totalFee;
			$std=Master::create($ledger);

			if($std){
				Account::where('std_id',$student->id)->update($st);
				Account::where('branch_id',$branch->branch_id)->update($br);
			}

			return response()->json(['status'=>1,'message'=>"Record update Successfully"]);
			// session()->flash('success_message', __('Record Inserted Successfully'));
		}else{
			return response()->json(['status'=>0,'message'=>"Record not update"]);
			// session()->flash('error_message', __('Failed! To update Record'));
		}
		return redirect()->back();
	}


	public function branch_correction_report(Request $request){
		$branch_id=$request->branch_id;

		if(!$branch_id){
			session()->flash('warning_message', __('Please select the branch'));
			return redirect()->back();
		}

        $records=FeeCorrection::with('student')->join('students', 'students.id', '=', 'fee_corrections.std_id')->whereMonth('correction_date',$request->month)->whereYear('correction_date',$request->year)->orderBy('course_id','ASC');

        $records->whereHas('student', function($query) use ($branch_id){
            $query->where('branch_id',$branch_id);
          });
        if(isset($request->type)){
        	$records->where('correction_approv',$request->type);
        }
        $correction=$records->get();




        return view('admin.account.correction.report',compact('correction'));

	}


}
