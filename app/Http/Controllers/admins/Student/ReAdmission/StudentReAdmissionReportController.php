<?php

namespace App\Http\Controllers\admins\Student\ReAdmission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentReAdmission;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use Auth;
class StudentReAdmissionReportController extends Controller
{
    function __construct()
    {
         // $this->middleware('role_or_permission:Re-Admission', ['only' => ['index']]);
         
    }

    function index(){


       $stdLeft=StudentReAdmission::where('status','<>',0)->with('student');

       if(Auth::user()->branch_id){
            $stdLeft->where('branch_id',Auth::user()->branch_id);
        }
        $records=$stdLeft->get();

        return view('admin.student.readmission.report',compact('records'));
		
	}

	 public function edit($id){
      
       $std=StudentReAdmission::find($id);
       if($std){
        $std->status=2;
        $std->save();
        return response()->json(['status'=>1,'message'=>'record update Successfully']);
       }else{
        return response()->json(['status'=>0,'message'=>'record update Successfully']);
       }

    }

}
