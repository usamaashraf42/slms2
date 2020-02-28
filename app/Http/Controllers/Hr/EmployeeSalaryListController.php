<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PayrollItem;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\EmployeeSalaryPost;
use Auth;
use Session;
class EmployeeSalaryListController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Employee Salary List', ['only' => ['create','index','store']]);
         
    }
    public function index(){
    	$employees=Employee::get();
    	 $branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
         if(Auth::user()->s_countryCode){
            $branch->where('b_countryCode',Auth::user()->s_countryCode);
        }
        $branches=$branch->get();
    	return view('admin.Hr.EmployeeSalaryList.create',compact('employees','branches'));
    }



    public function store(Request $request){
// dd($request->all());
    	$payroll=PayrollItem::orderBy('id','DESC')->first();

		$employees=Employee::where('status',1)->has('Employeesalary');
		if($request->branch_id){
			$employees->where('branch_id',$request->branch_id);
		}
		if($request->employee_id){
			$employees->where('emp_id',$request->employee_id);
		}
		
		$datas=$employees->get();

		$month=$request->month;
		$year=$request->year;
		$month_days = cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year);


        $employees=EmployeeSalaryPost::where('month',$month)->where('year',$year);
        if($request->branch_id){
            $employees->where('branch_id',$request->branch_id);
        }
        if($request->employee_id){
            $employees->where('emp_id',$request->employee_id);
        }
        $datas=$employees->get();
		// dd($datas);
		return view('admin.Hr.EmployeeSalaryList.index',compact('datas','month','year','month_days','payroll'));


    }
}
