<?php

namespace App\Http\Controllers\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarkPostRequest;
use App\Models\Branch;
use App\Models\ExamType;
use App\Models\Subject;
use App\Models\ExamMark;
use App\Models\StudentExamMark;
use App\Models\StudentSubjectExamMark;
use Auth;
use Session;

class ProgressResultCardController extends Controller
{
  function __construct()
    {
         $this->middleware('role_or_permission:Student Result Card', ['only' => ['index','store','create']]);
         
    }
	public function index(){
		$branch=Branch::with('courses');
    	if(Auth::user()->branch_id){
    		$branch->where('id',Auth::user()->branch_id);
    	}
    	if(Auth::user()->school_id){
    		$branch->where('school_id',Auth::user()->school_id);
    	}
    	$branches=$branch->get();

		$assesment=ExamType::where('parent_id',null)->get();
		$subjects=Subject::where('status',1)->get();

		return view('admin.exam.ProgressCard.create',compact('branches','assesment','subjects'));
	}

	public function store(Request $request){
		return view('admin.exam.ProgressCard.index');
		$markPost=0;

		$marks=StudentExamMark::where('branch_id',$request->branch_id)->orderBy('course_id','ASC')->where('exam_id',$request->exam_id?$request->exam_id:$request->exam_type_id)->where('exam_month',$request->month)->where('exam_year',$request->year);
		
		if($request->class_id){
			$marks->where('course_id',$request->class_id);
		}
		if($request->section_id){
			$marks->where('section_id',$request->section_id);
		}
			
		if($request->std_id){
			$marks->where('std_id',$request->std_id);
		}
		if($request->student_Id){
			$marks->where('std_id',$request->student_Id);
		}
		$data=$marks->get();

		if (isset($data) && !empty($data)) {
			return view('admin.exam.ResultCard.store',compact('data'));
		} else {

			Session::flash('error_message', __('Record Not Found'));
		}
		return redirect()->back();


	}
}
