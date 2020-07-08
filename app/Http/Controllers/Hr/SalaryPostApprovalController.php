<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryPost;
use App\Models\EmployeeDate;
use App\Models\EmployeeProfidentFund;
use App\Models\EmployeeSalaryPostTemp;
use App\Models\User;
use App\Models\Employee;
use App\Models\PayrollItem;
use App\Models\Account;
use App\Models\Branch;
use App\Models\Master;
use Session;
use Auth;
use DB;
class SalaryPostApprovalController extends Controller
{
	public function index(){

		$branch=Branch::with('courses');
		if(Auth::user()->branch_id){
			$branch->where('id',Auth::user()->branch_id);
		}
		$branches=$branch->get();
		return view('admin.Hr.SalaryPostApproval.create',compact('branches'));
	}


	public function store(Request $request){

		$payroll=PayrollItem::orderBy('id','DESC')->first();
		$employee=EmployeeSalaryPostTemp::where('branch_id',$request->branch_id)->where('month',$request->month)->where('year',$request->year);
		
		
		$employees=$employee->get();
		// dd($employees);

		if(!count($employees)){
			session()->flash('error_message', __('Failed! To Insert Record'));
			return redirect()->back();
		}
		$days=cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year);
		$month=$request->month;
		$year=$request->year;

		return view('admin.Hr.SalaryPostApproval.index',compact('employees','month','year','days','payroll'));
		
	}


	public function realSalaryPosted(Request $request){

		$tempSalary=EmployeeSalaryPostTemp::where('emp_id',$request->emp_id)->where('month',$request->month)->where('year',$request->year)->first();
		$emp=Employee::where('emp_id',$request->emp_id)->first();
		$monthly_salary=isset($emp->Employeesalary->monthly_salary)?$emp->Employeesalary->monthly_salary:0;
		if(!$tempSalary or !$emp){
			return response()->json(['status','Please Refresh Your window and try again']);
		}

		$salaries=EmployeeSalaryPost::where([
			'emp_id'=>$request->emp_id,
			'branch_id'=>$emp->branch_id,
			'month'=>$request->month,
			'year'=>$request->year])->first();

		if(!$salaries){
			$posted=EmployeeSalaryPost::create([
			'emp_id'=>$request->emp_id,
			'branch_id'=>$emp->branch_id,
			'month'=>$request->month,
			'year'=>$request->year,

			'monthly_salary'=>$monthly_salary,
			'current_salay'=>$monthly_salary,
			'monthly_salary'=>$monthly_salary,

			'dopost'=>date('Y-m-d'),
			'carry_forward'=>0,
			'carryForward'=>0,
			'prevBalance'=>0,
			'total_holidays'=>$request->holidays,
				// 'insurance_deduction'=>$t_insurance,
				// 'total_insurance'=>$total_insurance,
				// 'total_insurance_install'=>$total_insurance_install,
			'security'=>$request->security,
			'pf'=>$request->pf,
			'pf_rate'=>$request->pf_rate,
			// 'tbPF'=>$pfAmount,

			// 'totalpaydays'=>$paidDays,
			// 'totaldeductdays'=>$days-$paidDays,

			'total_days'=>$request->days,
			// 'tax'=>$total_tax_amount_df,

			'ta'=>$request->ta,
			'medical'=>$request->medical,
			'house_rent'=>$request->house_rent,
			'transport'=>$request->transport,
			'mobile'=>$request->mobile,
			'advance_deduction'=>$request->advance,

			'total_leaves'=>$request->leaves,
			'total_absent'=>$request->absents,
			'late'=>$request->lates,
			'Earlyoffdays'=>$request->e_offs,
			'total_present'=>$request->presents,

			'total_salary'=>$request->total_given_salary,
			'actualSalaryGiven'=>$request->total_given_salary,

			'description'=>"Salary posted of ".getMonthName($request->month). "$request->year",
			'created_by'=>Auth::user()->id,
			'updated_by'=>Auth::user()->id,

		]);

		}else{
			$posted=EmployeeSalaryPost::where([
				'emp_id'=>$request->emp_id,
				'branch_id'=>$emp->branch_id,
				'month'=>$request->month,
				'year'=>$request->year])->update([
				
				'branch_id'=>$emp->branch_id,
				

				'monthly_salary'=>$monthly_salary,
				'current_salay'=>$monthly_salary,
				'monthly_salary'=>$monthly_salary,

				'dopost'=>date('Y-m-d'),
				'carry_forward'=>0,
				'carryForward'=>0,
				'prevBalance'=>0,
				'total_holidays'=>$request->holidays,
					// 'insurance_deduction'=>$t_insurance,
					// 'total_insurance'=>$total_insurance,
					// 'total_insurance_install'=>$total_insurance_install,
				'security'=>$request->security,
				'pf'=>$request->pf,
				'pf_rate'=>$request->pf_rate,

				// 'totalpaydays'=>$paidDays,
				// 'totaldeductdays'=>$days-$paidDays,

				'total_days'=>$request->days,
				// 'tax'=>$total_tax_amount_df,

				'ta'=>$request->ta,
				'medical'=>$request->medical,
				'house_rent'=>$request->house_rent,
				'transport'=>$request->transport,
				'mobile'=>$request->mobile,
				'advance_deduction'=>$request->advance,

				'total_leaves'=>$request->leaves,
				'total_absent'=>$request->absents,
				'late'=>$request->lates,
				'Earlyoffdays'=>$request->e_offs,
				'total_present'=>$request->presents,

				'total_salary'=>$request->total_given_salary,
				'actualSalaryGiven'=>$request->total_given_salary,

				'description'=>"Salary posted of ".getMonthName($request->month). "$request->year",
				'created_by'=>Auth::user()->id,
				'updated_by'=>Auth::user()->id,

			]);

		}

		

		if($posted){
			$tempSalary=EmployeeSalaryPostTemp::where('emp_id',$request->emp_id)->where('month',$request->month)->where('year',$request->year)->update(['is_approved'=>1]);
			return response()->json(['status'=>1,'message'=>'Salary posted successfully']);
		}

		return response()->json(['status'=>0,'message'=>'failed to salary posting']);
	}
}
