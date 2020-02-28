<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\BranchCourse;
use App\Models\Student;
use Auth;
class BranchStudentDetailController extends Controller
{
    public function index(){
    	$branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
         if(Auth::user()->s_countryCode){
            $branch->where('b_countryCode',Auth::user()->s_countryCode);
        }
         if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
        $branches=$branch->get();
    	return view('admin.branch.branchClassStudent.index',compact('branches'));
    }

    public function store(Request $request){
    	

    	$student=BranchCourse::orderBy('branch_id','ASC')->orderBy('course_id','ASC');
    	if($request->branch_id){
			$student->where('branch_id',$request->branch_id);
    	}
    	$records=$student->get();

    	// dd($records);


    	return view('admin.branch.branchClassStudent.create',compact('records'));
    }
}
