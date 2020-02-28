<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeePerformanceRequest;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Validator;
use App\Models\PerformanceIndicator;
use App\Models\EmployeePerformance;
use App\Models\User;
use Auth;
use Session;
use DB;
class PerformanceListController extends Controller
{
    public function index(){
    	$performances=PerformanceIndicator::where('status',1)->orderBy('id','DESC')->get();
		// dd($performances);
    	$users=User::where('status',1)->get();
    	return view('admin.Hr.Performance.PerformanceList.create',compact('performances','users'));

    }

    public function store(Request $request){
    	$user=User::find($request->employee_id);
    	if(!$user){
    		return redirect()->back();
    	}
    	$performances=$user->employeePerformanceByMonth($request->month,$request->year);
    	$records=EmployeePerformance::where('emp_id',$request->employee_id)->where('month',$request->month)->where('year',$request->year)->get();
    	// dd($records);
    	return view('admin.Hr.Performance.PerformanceList.index',compact('performances','user','records'));
    	// dd($performances);


    }
}
