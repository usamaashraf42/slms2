<?php

namespace App\Http\Controllers\admins\Student\classList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use App\Models\BranchCourse;
use App\Http\Requests\ClassListRequest;
use Auth;
use DB;
class ClassListController extends Controller
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

        $accounts =BranchCourse::orderBy('course_id','ASC')->where('branch_id',1)->with('course');

      $data=$accounts->get();

    	return view('admin.student.classList.create',compact('branches'));
    }

    public function store(ClassListRequest $request){
             $branch_id=$request->branch_id;
              $class=$request->class_id;

    		$student=BranchCourse::orderBy('course_id','ASC')->where('branch_id',$request->branch_id);
            if(isset($request->class_id) && !empty($request->class_id)){
                   
              $student->whereHas('course.Students', function($query) use ($class){
                $query->where('course_id',$class);
              });
                }
                if(isset($request->branch_id) && !empty($request->branch_id)){
                   
                  $student->whereHas('course.Students', function($query) use ($branch_id){
                        $query->where('branch_id',$branch_id);
                  });
                }
            $students=$student->get();

            if(!count($students)){
                session()->flash('error_message', __(' Record not found'));
                return redirect()->back();
            }
            return view('admin.student.classList.store',compact('students' ,'branch_id','class'));
    }
}
