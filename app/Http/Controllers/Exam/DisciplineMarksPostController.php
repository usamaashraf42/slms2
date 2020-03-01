<?php

namespace App\Http\Controllers\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use App\Models\ExamType;
use App\Models\Exam;
use App\Models\Branch;
use App\Models\Subject;
use App\Models\StudentExamMark;
use Session;
use Auth;
class DisciplineMarksPostController extends Controller
{
    function __construct()
	{
		$this->middleware('role_or_permission:Marks Posted', ['only' => ['index','create','store']]);
		$this->middleware('role_or_permission:Marks Edit', ['only' => ['edit','update']]);

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

		return view('admin.exam.DisciplineMarksPost.index',compact('branches','assesment','subjects'));
	}

	public function store(Request $request){

// dd($request->all());
		$marks=StudentExamMark::where('branch_id',$request->branch_id)->whereHas('student')->orderBy('course_id','ASC')->where('exam_id',$request->exam_id?$request->exam_id:$request->exam_type_id)->where('exam_month',$request->month)->where('exam_year',$request->year);

		if($request->class_id){
			$marks->where('course_id',$request->class_id);
		}
		if($request->section_id){
			$marks->where('section_id',$request->section_id);
		}

		$data=$marks->get();

		if(!count($data)){
			Session::flash('error_message', __('Record not found'));
			return redirect()->back();
		}

		return view('admin.exam.DisciplineMarksPost.store',compact('data'));
		// dd($data);

	}
}
