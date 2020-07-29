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

class SalarySheetController extends Controller
{
    public function index(){

		$branch=Branch::with('courses');
		if(Auth::user()->branch_id){
			$branch->where('id',Auth::user()->branch_id);
		}
		$branches=$branch->get();


		return view('admin.Hr.salarySheet.create',compact('branches'));
	}

	public function store(Request $request){
		

		$datas=EmployeeSalaryPost::where('month',$request->month)->where('year',$request->year);

		if($request->branch_id){
			$datas->where('branch_id',$request->branch_id);
		}

		$data=$datas->get();
		// dd($data);
		return view('admin.Hr.salarySheet.index',compact('data'));
		
	}

}
