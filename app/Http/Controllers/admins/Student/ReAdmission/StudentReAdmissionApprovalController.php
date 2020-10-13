<?php

namespace App\Http\Controllers\admins\Student\ReAdmission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentReAdmission;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use Auth;

class StudentReAdmissionApprovalController extends Controller
{
     function __construct()
    {
         // $this->middleware('role_or_permission:Student-left Approval', ['only' => ['create','approveBranchWise']]);
          // $this->middleware('role_or_permission:Student-left Approved Report', ['only' => ['index']]);
    	 $this->middleware('role_or_permission:Re-Admission Approval', ['only' => ['create','index','store']]);
    	 // $this->middleware('role_or_permission:Re-Admission Approved Report', ['only' => ['index']]);
         
    }

    function index(){


       $stdLeft=StudentReAdmission::where('status',1)->with('student');

       if(Auth::user()->branch_id){
            $stdLeft->where('branch_id',Auth::user()->branch_id);
        }
        $students=$stdLeft->get();
      
        return view('admin.student.readmission.approved.index',compact('students'));
		
	}
    
    public function create(){

        $stdLeft=StudentReAdmission::where('status',0)->with('student');

        if(Auth::user()->branch_id){
            $stdLeft->where('branch_id',Auth::user()->branch_id);
        }

        $students=$stdLeft->get();
   
        return view('admin.student.readmission.approved.report',compact('students'));

    }

    public function store(Request $request){
    	$leftStd=StudentReAdmission::find($request->id);
    	if(!$leftStd){
    		return response()->json(['status'=>0,'message'=>'record not found']);
    	}

    	$std=Student::find($leftStd->std_id);
    	if($std){
    		$std->status=1;
    		$std->is_active=1;
            $std->leaving_date=date('Y-m-d');
    		$effectedStd=$std->save();
    		if($effectedStd){
    			$leftStd->status=0;
    			$leftStd->save();
    			return response()->json(['status'=>1,'message'=>'record not found']);
    		}else{
    			return response()->json(['status'=>0,'message'=>'record not update']);
    		}
    	}else{
    		return response()->json(['status'=>0,'message'=>'record not found']);
    	}

    }
}
