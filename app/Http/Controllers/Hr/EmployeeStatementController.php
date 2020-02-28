<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeSalaryPost;
use App\Models\EmployeeDate;
use App\Models\EmployeeProfidentFund;
use App\Models\User;
use App\Models\PayrollItem;
use App\Models\Account;
use App\Models\Master;
use App\Models\Employee;
use Session;
use Auth;
use DB;
class EmployeeStatementController extends Controller
{

	function __construct()
    {
       $this->middleware('role_or_permission:Employee Statement', ['only' => ['index','create','store']]);
   	}



    public function index(){
    	
        return view('admin.Hr.statement.create');

    }


    public function store(Request $request){    	
  			$salaries=EmployeeSalaryPost::where('emp_id',$request->employee_id)->get();
  			$pfs=EmployeeProfidentFund::where('emp_id',$request->employee_id)->get();
  			$employee=Employee::where('emp_id',$request->employee_id)->first();
        return view('admin.Hr.statement.index',compact('salaries','pfs','employee'));
    }
}
