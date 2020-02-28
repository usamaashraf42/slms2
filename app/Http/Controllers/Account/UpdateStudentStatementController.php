<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Branch;
use App\Models\Account;
use App\Models\Master;
use App\Models\Student;
use App\Models\FeePost;
use Auth;
class UpdateStudentStatementController extends Controller
{
	function __construct()
	{
		$this->middleware('role_or_permission:Student Account Statement Update', ['only' => ['create','index','store','update']]);

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

		return view('admin.NewUpdateStudentStatement.index', compact('branches'));
	}


	public function store(Request $request){


		$stduents=Student::where('status',1)->where('is_active',1)->where('branch_id',$request->branch_id)->orderBy('course_id','ASC')->get();
		if(!count($stduents)){
			session()->flash('error_message', __('Student is not your branch'));
			return redirect()->back();
		}

		return view('admin.NewUpdateStudentStatement.create',compact('stduents'));
		// $ly_no=Student::where('id',$request->std_id);

		// $ly=$ly_no->first();
		// if(!($ly)){
		// 	session()->flash('error_message', __('Student is not your branch'));
		// 	return redirect()->back();
		// }



		// if($ly->branch_id==968001 || $ly->branch_id==968002){
		// 	$student=Account::where('std_id',$ly->id)->first();
		// 	$account=Master::where('account_id',$student->id)->orderBy('id','ASC')->with('account.student')->get();
		// 	return view('admin.UpdateStudentStatement.store',compact('account','student','ly'));
		// }

		// session()->flash('error_message', __('statement update only of oman branch'));
		// return redirect()->back();

	}

	public function update(Request $request, $id)
	{

		$masters=Master::where('account_id',$id)->get();
		foreach ($masters as $value) {
			$value->feePost()->delete();
			$value->delete();
		}

		for($i=0; $i<count($request->amount_type); $i++){
			if(count($request->amount_type) == count($request->amount)){
				$master=Master::where('account_id',$id)->orderBy('id','DESC')->first();
				if(isset($request->amount_type[$i]) && isset($request->amount[$i]) && isset($request->posting_date[$i]) && isset($request->description[$i]) ){
					$ledger=[
						'std_id'=>$request->std_id, 
						'account_id'=>$id, 
						'amount_type'=>$request->amount_type[$i],                   
						'a_credit'=>$request->amount_type[$i]=='CR'?$request->amount[$i]:0,
						'a_debit'=>$request->amount_type[$i]=='DB'?$request->amount[$i]:0,
						'posting_date'=>date("Y-m-d", strtotime($request->posting_date[$i])),
						'description'=>$request->description[$i],
						'month'=>round(date("m", strtotime($request->posting_date[$i]))),
						'year'=>date("Y", strtotime($request->posting_date[$i]))
					];


					if($master){
						if($request->amount_type[$i]=='DB'){
							$ledger['balance']=$master->balance+$request->amount[$i];
						}else{
							$ledger['balance']=$master->balance-$request->amount[$i];
						}
					}else{
						if($request->amount_type[$i]=='DB'){
							$ledger['balance']=$request->amount[$i];
						}else{
							$ledger['balance']=(-$request->amount[$i]);
						}
					}
					
					$branchAccount=Master::create($ledger);
				}

			}
		}
		if(isset(($branchAccount))){
			session()->flash('success_message', __('Record Inserted Successfully'));
		}else{
			session()->flash('error_message', __('Failed! To Insert Record'));
		}
		return redirect()->route('update-student-statement.index');

	}


	public function updateStdStatementMaster(Request $request){
		
		$newUser=Student::find($request->std_id);
		if($newUser->branch_id!=968001 || $newUser->branch_id!=968002){
			


			$newUser->studentFee->reg_fee=$request->std_reg_fee_;
			$newUser->studentFee->scholarship_of=$request->scholarship_of;
			$newUser->studentFee->annual_fee=$request->annual_fee;
			$newUser->studentFee->Net_AnnualFee=$request->std_Net_AnnualFee_;
			$newUser->studentFee->transport_fee=$request->std_transport_;
			$newUser->studentFee->uniform=$request->std_uniform_;

			$newUser->studentFee->save();

			$student=Account::where('std_id',$request->std_id)->first();
			if($student){
				$masters=Master::where('account_id',$student->id)->get();
				foreach ($masters as $value) {
					$value->feePost()->delete();
					$value->delete();
				}
			}else{
				if($newUser){
					$student=Account::create([
						'name'=>$newUser->s_name,' '.$newUser->s_fatherName,
						'c_balance'=>0,
						'opening_balance'=>0,
						'type'=>'student',
						'std_id'=>$newUser->id
					]);
				}

			}
			if($request->std_reg_fee_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_reg_fee_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'Registration Fee Posted',
					'month'=>date('Y-m-d'),
					'year'=>date('Y-m-d'),
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_reg_fee_;
				}else{
					$ledger['balance']=$request->std_reg_fee_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_reg_fee_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'Registration Fee Deposit',
					'month'=>date('Y-m-d'),
					'year'=>date('Y-m-d'),
				];
				if($master){
					$ledger['balance']=$master->balance-$request->std_reg_fee_;
				}else{
					$ledger['balance']=-$request->std_reg_fee_;
					
				}
				$branchAccount=Master::create($ledger);
			}

			if($request->std_uniform_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_uniform_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'Uniform Fee Posted',
					'month'=>date('Y-m-d'),
					'year'=>date('Y-m-d'),
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_uniform_;
				}else{
					$ledger['balance']=$request->std_uniform_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_uniform_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'Uniform Fee Deposit',
					'month'=>date('Y-m-d'),
					'year'=>date('Y-m-d'),
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_uniform_;
				}else{
					$ledger['balance']=-$request->std_uniform_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			
			if($request->std_book_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_book_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'Books Fee Posted',
					'month'=>date('Y-m-d'),
					'year'=>date('Y-m-d'),
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_book_;
				}else{
					$ledger['balance']=$request->std_book_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_book_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'Books Fee Deposit',
					'month'=>date('Y-m-d'),
					'year'=>date('Y-m-d'),
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_book_;
				}else{
					$ledger['balance']=-$request->std_book_;
					
				}
				
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m1_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m1_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'January Fee Posted',
					'month'=>1,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m1_;
				}else{
					$ledger['balance']=$request->std_m1_;
					
				}
				$branchAccount=Master::create($ledger);

				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m1_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'January Fee Deposit',
					'month'=>1,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m1_;
				}else{
					$ledger['balance']=-$request->std_m1_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m2_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m2_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'February Fee Posted',
					'month'=>2,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m2_;
				}else{
					$ledger['balance']=$request->std_m2_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m2_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'February Fee Deposit',
					'month'=>2,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m2_;
				}else{
					$ledger['balance']=-$request->std_m2_;
					
				}
				$branchAccount=Master::create($ledger);
			}

			if($request->std_m3_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m3_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'March Fee Posted',
					'month'=>3,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m3_;
				}else{
					$ledger['balance']=$request->std_m3_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m3_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'March Fee Deposit',
					'month'=>3,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m3_;
				}else{
					$ledger['balance']=-$request->std_m3_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m4_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m4_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'April Fee Posted',
					'month'=>4,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m4_;
				}else{
					$ledger['balance']=$request->std_m4_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m4_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'April Fee Deposit',
					'month'=>4,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m4_;
				}else{
					$ledger['balance']=-$request->std_m4_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m5_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m5_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'may Fee Posted',
					'month'=>5,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m5_;
				}else{
					$ledger['balance']=$request->std_m5_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m5_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'may Fee Deposit',
					'month'=>5,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m5_;
				}else{
					$ledger['balance']=-$request->std_m5_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m6_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m6_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'June Fee Posted',
					'month'=>6,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m6_;
				}else{
					$ledger['balance']=$request->std_m6_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m6_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'June Fee Deposit',
					'month'=>6,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m6_;
				}else{
					$ledger['balance']=-$request->std_m6_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m7_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m7_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'July Fee Posted',
					'month'=>7,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m7_;
				}else{
					$ledger['balance']=$request->std_m7_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m7_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'July Fee Deposit',
					'month'=>7,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m7_;
				}else{
					$ledger['balance']=-$request->std_m7_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m8_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m8_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'August Fee Posted',
					'month'=>8,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m8_;
				}else{
					$ledger['balance']=$request->std_m8_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m8_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'August Fee Deposit',
					'month'=>8,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m8_;
				}else{
					$ledger['balance']=-$request->std_m8_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m9_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m9_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'September Fee Posted',
					'month'=>9,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m9_;
				}else{
					$ledger['balance']=$request->std_m9_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m9_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'September Fee Deposit',
					'month'=>9,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m9_;
				}else{
					$ledger['balance']=-$request->std_m9_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m10_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m10_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'October Fee Posted',
					'month'=>10,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m10_;
				}else{
					$ledger['balance']=$request->std_m10_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m10_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'October Fee Deposit',
					'month'=>10,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m10_;
				}else{
					$ledger['balance']=-$request->std_m10_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m11_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m11_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'November Fee Posted',
					'month'=>11,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m11_;
				}else{
					$ledger['balance']=$request->std_m11_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m11_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'November Fee Deposit',
					'month'=>11,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m11_;
				}else{
					$ledger['balance']=-$request->std_m11_;
					
				}
				$branchAccount=Master::create($ledger);
			}
			if($request->std_m12_){
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>0,
					'a_debit'=>$request->std_m12_,
					'posting_date'=>date("Y-m-d"),
					'description'=>'December Fee Posted',
					'month'=>12,
					'year'=>2019,
				];
				if($master){
					$ledger['balance']=$master->balance+$request->std_m12_;
				}else{
					$ledger['balance']=$request->std_m12_;
					
				}
				$branchAccount=Master::create($ledger);
				$master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
				$ledger=[
					'std_id'=>$request->std_id, 
					'account_id'=>$student->id, 
					'a_credit'=>$request->std_m12_,
					'a_debit'=>0,
					'posting_date'=>date("Y-m-d"),
					'description'=>'December Fee Deposit',
					'month'=>12,
					'year'=>2019,
				];
				
				if($master){
					$ledger['balance']=$master->balance-$request->std_m12_;
				}else{
					$ledger['balance']=-$request->std_m12_;
					
				}
				$branchAccount=Master::create($ledger);
				
			}
			return response()->json(['status'=>1]);
		}else{
			return response()->json(['status'=>0]);
		}







	}


}
