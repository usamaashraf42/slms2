<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Branch;
use Auth;
use Session;

class EmployeeListController extends Controller
{

	function __construct()
    {
         $this->middleware('role_or_permission:Employee List', ['only' => ['create','index','store']]);
         
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
    	return view('admin.Hr.EmployeeList.create',compact('employees','branches'));
    }



    public function store(Request $request){

		$employees=Employee::where('status',1);
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
		// dd($data);
		return view('admin.Hr.EmployeeList.index',compact('datas','month','year','month_days'));


    }
}
