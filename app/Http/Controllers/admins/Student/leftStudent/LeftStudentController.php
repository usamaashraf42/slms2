<?php

namespace App\Http\Controllers\admins\Student\leftStudent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Branch;
use App\Models\StudentLeft;
use App\Models\Course;
use Auth;
class LeftStudentController extends Controller
{

	
	 function __construct()
    {
         $this->middleware('role_or_permission:Student-left', ['only' => ['create','store']]);
         
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
        $classes=Course::get();

        

        return view('admin.student.leftStudent.index',compact('branches','classes'));
    }
    public function create(){
    	return view('admin.student.leftStudent.create');
    }


    public function store(Request $request){
    	// dd($request->all());

    	 $ly_no=Student::where('id',$request->ly_no);
        if(Auth::user()->branch_id){
            $ly_no->where('branch_id',Auth::user()->branch_id);
        }
        $ly=$ly_no->first();

        if(!($ly)){
        	session()->flash('error_message', __('Record not found'));
             return redirect()->back();
        }

         $correction=StudentLeft::create([
         	'std_id'=>$request->ly_no,
         	'branch_id'=>$ly->branch_id,
         	'description'=>$request->description,
         	'created_by'=>Auth::user()->id,
         	'updated_by'=>Auth::user()->id,
         ]);
         if($correction){
            session()->flash('success_message', __('Record Inserted Successfully'));
         }else{
            session()->flash('error_message', __('Record not update'));
         }

         return redirect()->back();

    }

    public function branch_student_left_report(Request $request){
        // dd($request->all());

        $stdLeft=StudentLeft::orderBy('id','DESC')->orderBy('status','ASC');
        if(Auth::user()->branch_id){
            $stdLeft->where('branch_id',Auth::user()->branch_id);
        }
        $records=$stdLeft->get();
     
        return view('admin.student.leftStudent.student_left_report',compact('records'));
    }


    public function edit($id){
      
       $std=StudentLeft::find($id);
       if($std){
        $std->status=2;
        $std->save();
        return response()->json(['status'=>1,'message'=>'record update Successfully']);
       }else{
        return response()->json(['status'=>0,'message'=>'record update Successfully']);
       }

    }
}
