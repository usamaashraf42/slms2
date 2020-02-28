<?php

namespace App\Http\Controllers\admins\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use App\Models\Course;
use Auth;
class StudentBulkEditController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:student-transfer', ['only' => ['create','store']]);
         
    }

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


    	return view('admin.student.BulkEdit.create',compact('branches'));

    }

    public function store(Request $request){
        
        $courses=Course::get();
        $students=Student::where('status',1);
        if($request->from_branch_id){
            $students->where('branch_id',$request->from_branch_id);
        }
        if($request->from_class_id){
            $students->where('course_id',$request->from_class_id);
        }
        if($request->std_id){
            $students->where('id',$request->std_id);
        }

        $records=$students->get();
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

        return view('admin.student.BulkEdit.index',compact('records','courses','branches'));
        
    }

    public function edit_update(Request $request){
// dd(($request->all()));
        for($i=0; $i<count($request->ids); $i++){
            if(isset($request->ids[$i]) && ($request->ids[$i])){
                $student=Student::find($request->ids[$i]);
               
                $student->s_name=isset($request->s_name[$i])?$request->s_name[$i]:$student->s_name;
                $student->s_fatherName=isset($request->s_fatherName[$i])?$request->s_fatherName[$i]:$student->s_fatherName;
                $student->s_phoneNo=isset($request->s_phoneNo[$i])?$request->s_phoneNo[$i]:$student->s_phoneNo;
                $student->is_active=isset($request->statuses[$i])?$request->statuses[$i]:$student->is_active;

                $student->course_id=isset($request->course_id[$i])?$request->course_id[$i]:$student->course_id;

                $student->branch_id=isset($request->branch_ids[$i])?$request->branch_ids[$i]:$student->branch_id;
                $student->status=isset($request->statuses[$i])?$request->statuses[$i]:$student->status;
                $student->save();
            }
           
        }

        session()->flash('success_message', __('Record Inserted Successfully'));
        return redirect()->back();
    }
}
