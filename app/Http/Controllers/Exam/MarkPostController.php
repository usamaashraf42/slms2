<?php

namespace App\Http\Controllers\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarkPostRequest;
use App\Models\Branch;
use App\Models\ExamType;
use App\Models\Subject;
use App\Models\ExamMark;
use App\Models\Student;
use App\Models\Exam;
use App\Models\StudentExamMark;
use App\Models\StudentSubjectExamMark;
use Auth;
use Session;
class MarkPostController extends Controller
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

		return view('admin.exam.markPost.index',compact('branches','assesment','subjects'));
	}

	public function store(MarkPostRequest $request){

		for($i=0; $i<count($request->std_id); $i++){
			if(isset($request->std_id[$i]) && !empty($request->std_id[$i])){
				$student=Student::find($request->std_id[$i]);
				$dates=date("Y-m-d", strtotime($request->year."-".$request->month."-".'1'));
				$post=StudentExamMark::where('exam_id',$request->exam_id?$request->exam_id:$request->exam_type_id)->where('std_id',$request->std_id[$i])->where('section_id',$student?$student->course_id:$request->section_id)->where('course_id',$request->class_id)->where('exam_month',$request->month)->where('exam_year',$request->year)->orderBy('id','DESC')->first();

				if(!$post){
					
					$post=StudentExamMark::create([
						'exam_id'=>$request->exam_id?$request->exam_id:$request->exam_type_id, 
						'branch_id'=>$request->branch_id, 
						'std_id'=>$request->std_id[$i], 
						'course_id'=>$request->class_id,
						'section_id'=>$student?$student->course_id:$request->section_id,
						'exam_month'=>$request->month,
						'exam_year'=>$request->year,
					]);
				}
				
				if($post){

					$checkMarks=StudentSubjectExamMark::where('std_exam_mark',$post->id)->where('std_id',$request->std_id[$i])->where('subject_id',$request->subject_id)->orderBy('id','DESC')->first();
					if(!$checkMarks){
						$markPost=StudentSubjectExamMark::create([
							'std_exam_mark'=>$post->id, 
							'std_id'=>$request->std_id[$i],
							'subject_id'=>$request->subject_id,
							'total_marks'=>$request->max_mark, 
							'exam_month'=>$request->month,
							'exam_year'=>$request->year,
							'gain_marks'=>isset($request->gain_mark[$i])?(int)$request->gain_mark[$i]:0, 
							'class_participation'=>isset($request->class_participation[$i])?(int)$request->class_participation[$i]:0,
							'social_integration'=>isset($request->social_integration[$i])?(int)$request->social_integration[$i]:0, 
							'accept_to_suggestion'=>isset($request->accept_to_suggestion[$i])?(int)$request->accept_to_suggestion[$i]:0,
							'share_with'=>isset($request->share_with[$i])?(int)$request->share_with[$i]:0,
							'helping_other'=>isset($request->helping_other[$i])?(int)$request->helping_other[$i]:0,
							'confidence'=>isset($request->confidence[$i])?(int)$request->confidence[$i]:0,
							'spoken_eng'=>isset($request->spoken_eng[$i])?(int)$request->spoken_eng[$i]:0,
							'motivation'=>isset($request->motivation[$i])?(int)$request->motivation[$i]:0,
						]);
					}
					
				}


				
			}

		}
		if (isset($markPost) && !empty($markPost)) {
			Session::flash('success_message', __('Record inserted Successfully'));
		} else {

			Session::flash('error_message', __('Record Not Insert'));
		}
		return redirect()->route('post.index');


	}


	function deleteSubjectMarks(Request $request){
		$marks=StudentExamMark::select('id')->where('branch_id',$request->branch_id)->whereHas('student')->orderBy('course_id','ASC')->where('exam_id',$request->exam_id?$request->exam_id:$request->exam_type_id)->where('exam_month',$request->month)->where('exam_year',$request->year);

		if($request->class_id || $request->section_id){
			if($request->class_id){
				$marks->where('course_id',$request->class_id);
			}else{
				$marks->where('course_id',$request->section_id);
			}
		}

		$data=$marks->get();

		if(count($data)){
			$std=StudentSubjectExamMark::whereIn('std_exam_mark',$data)->where('subject_id',$request->subject_id)->whereHas('student')->delete();
			if(($std)){
				return response()->json(['status'=>1,'response'=>'Record found successfully']);
			}else{
				return response()->json(['status'=>0,'response'=>'Record not found']);
			}
		}else{
			return response()->json(['status'=>0,'response'=>'Record not found']);

		}
	}
}
