<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Branch;
class BankOutstandingController extends Controller
{

	function __construct()
	{
         // $this->middleware('role_or_permission:Bank Outstanding', ['only' => ['create','store','index']]);

	}

    public function index(){
    	$branches=Branch::get();
    	return view('admin.account.brank-outstanding.create',compact('branches'));
    }

    public function store(Request $request){
    	$month=$request->month;
    	$year=$request->year;
    	$student=Student::where('status',1)->orderBy('branch_id','ASC');
    	if($request->branch_id){
    		$student->where('branch_id',$request->branch_id);
    	}
    	$students=$student->get();

    	return view('admin.account.brank-outstanding.index',compact('students','month','year'));
    
    }


}
