<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryPost;
use App\Models\EmployeeDate;
use App\Models\EmployeeProfidentFund;
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


		// dd($request->all());


		$payroll=PayrollItem::orderBy('id','DESC')->first();
		$employee=EmployeeSalaryPost::where('branch_id',$request->branch_id)->where('month',$request->month)->where('year',$request->year);
		
		if($request->employee_id && $request->employee_id>0){
			$employee->where('emp_id',$request->employee_id);
		}

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
}
