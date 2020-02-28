<?php

namespace App\Http\Controllers\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarkPostRequest;
use App\Models\StudentExamMark;
use App\Models\Branch;
use App\Models\Course;
use App\Models\ExamType;
use App\Models\Subject;
use App\Models\ExamMark;
use Auth;
use Session;
class MarksListController extends Controller
{
	function __construct()
	{
		$this->middleware('role_or_permission:Marks List', ['only' => ['index','store','create']]);

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

		return view('admin.exam.markList.index',compact('branches','assesment','subjects'));
	}

	public function store(Request $request){

// dd($request->all());

		$marks=StudentExamMark::where('branch_id',$request->branch_id)->whereHas('student')->orderBy('section_id','ASC')->orderBy('std_id','ASC')->where('exam_id',$request->exam_id?$request->exam_id:$request->exam_type_id)->where('exam_month',$request->month)->where('exam_year',$request->year);



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
		// dd($data);
		if (count($data)) {
			return view('admin.exam.markList.store',compact('data'));
		} else {

			Session::flash('error_message', __('Record Not Insert'));
		}
		return redirect()->back();


	}
}
