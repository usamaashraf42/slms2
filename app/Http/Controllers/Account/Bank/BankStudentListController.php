<?php

namespace App\Http\Controllers\Account\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Branch;

use Auth;
use Session;
class BankStudentListController extends Controller
{
    public function index(){
    	$branches=Branch::get();
    	return view('admin.account.bank.studentList.index',compact('branches'));
    }

    public function store(Request $request){
    	// dd($request->all());
    	$month=$request->month;
    	$year=$request->year;
    	$student=Student::where('status',1)->orderBy('course_id','ASC')->orderBy('branch_id','ASC');
    	if($request->branch_id){
    		$student->where('branch_id',$request->branch_id);
    	}
    	$students=$student->get();

    	return view('admin.account.brank-outstanding.index',compact('students','month','year'));
    
    }

}
