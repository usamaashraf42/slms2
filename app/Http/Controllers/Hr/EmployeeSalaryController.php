<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryPost;
use App\Models\EmployeeDate;
use App\Models\EmployeeProfidentFund;
use App\Models\User;
use App\Models\PayrollItem;
use App\Models\Account;
use App\Models\Master;
use Session;
use Auth;
use DB;
class EmployeeSalaryController extends Controller
{
    public function index(){
    	return view('admin.Hr.EmployeeSalary.create');
    }


    public function store(Request $request){
    	
    	$salaries=EmployeeSalaryPost::where('month',$request->month)->where('year',$request->year);
    	if($request->employee_id){
    		$salaries->where('employee_id',$request->employee_id);
    	}

    	$datas=$salaries->get();


    	if(!count($datas)){
    		session()->flash('error_message', __('Record not found'));
    		return redirect()->back();
    	}
    	// dd($data);
    	return view('admin.Hr.EmployeeSalary.index',compact('datas'));
    	
    }
}
