<?php

namespace App\Http\Controllers\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarkPostRequest;
use App\Models\Branch;
use App\Models\ExamType;
use App\Models\Subject;
use App\Models\ExamMark;
use App\Models\Exam;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentExamMark;
use App\Models\StudentSubjectExamMark;
use Auth;
use Session;
class MarkPostEditController extends Controller
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

		return view('admin.exam.markPostEdit.index',compact('branches','assesment','subjects'));
	}



	public function marksEdit(Request $request){
		// dd($request->all());

		$branch=$request->branch_id;
		$course=$request->class_id;
		$section_id=$request->section_id;
		$subject_id=$request->subject_id;
		$month=$request->month;
		$year=$request->year;
		$exam_id=$request->exam_id;
		$exam_type_id=$request->exam_type_id;
		$max_mark=$request->max_mark;




		$marks=StudentExamMark::select('id')->where('branch_id',$request->branch_id)->whereHas('student')->orderBy('course_id','ASC')->where('exam_id',$request->exam_id?$request->exam_id:$request->exam_type_id)->where('exam_month',$request->month)->where('exam_year',$request->year);

		if($request->class_id){
			$marks->where('course_id',$request->class_id);
		}
		if($request->section_id){
			$marks->where('section_id',$request->section_id);
		}

		$data=$marks->get();

		if(count($data)){
			$studentMarks=StudentSubjectExamMark::whereIn('std_exam_mark',$data)->orderBy('std_id','ASC')->where('subject_id',$request->subject_id)->with('student')->whereHas('student')->get();
			if(count($studentMarks)){
				// dd($studentMarks);
				$branchName=Branch::find($branch);
				$courseName=Course::find($course);
				$sectionName=Course::find($section_id);
				$subjectName=Subject::find($subject_id);
				// dd($subjectName);
				$StudentExamMarkName=Exam::with('exam_main_category','exam_type')->find($exam_id?$exam_id:$exam_type_id);

				$StudentExamMarkTypeName=Exam::with('exam_main_category','exam_type')->find($exam_type_id);



				return view('admin.exam.markPostEdit.create',compact('studentMarks','branch','course','section_id','subject_id','month','year','exam_id','exam_type_id','max_mark','branchName','courseName','sectionName','subjectName','StudentExamMarkName','StudentExamMarkTypeName'));
			}else{
				Session::flash('error_message', __('Record not found'));
			}

		}else{
			Session::flash('error_message', __('Record not found'));

		}
		return redirect()->back();
		

	}


	public function show($id){

	}

	public function store(Request $request){
// dd($request->all());
		if(count($request->std_ids)==count($request->gain_mark)){
			if(count($request->std_ids)){
				for($i=0; $i<count(($request->std_ids)); $i++){
					if(isset($request->gain_mark[$i]) && $request->std_ids[$i]){

						$student=Student::find($request->std_ids[$i]);

						if($student){
							$post=StudentExamMark::where('exam_id',$request->exam_id?$request->exam_id:$request->exam_type_id)->where('std_id',$request->std_ids[$i])->where('section_id',$request->section_id)->where('course_id',$request->course_id)->where('exam_month',$request->month)->where('exam_year',$request->year)->orderBy('id','DESC')->first();

						if(!$post){
							$post=StudentExamMark::create([
								'exam_id'=>$request->exam_id?$request->exam_id:$request->exam_type_id, 
								'branch_id'=>$request->branch_id, 
								'std_id'=>$request->std_ids[$i], 
								'course_id'=>$request->course_id,
								'section_id'=>$request->section_id,
								'exam_month'=>$request->month,
								'exam_year'=>$request->year,
							]);
						}
						
						if($post){

							$checkMarks=StudentSubjectExamMark::where('std_exam_mark',$post->id)->where('std_id',$request->std_ids[$i])->where('subject_id',$request->subject_id)->orderBy('id','DESC')->first();
							if(!$checkMarks){
								$markPost=StudentSubjectExamMark::create([
									'std_exam_mark'=>$post->id, 
									'std_id'=>$request->std_ids[$i],
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
								
							}else{
								if(isset($request->ids[$i])){
									$marks=StudentSubjectExamMark::where('std_id',$request->std_ids[$i])->where('id',$request->ids[$i])->update([
									'gain_marks'=>(int)$request->gain_mark[$i],
									'total_marks'=>$request->max_mark, 
									'class_participation'=>isset($request->class_participation[$i])?(int)($request->class_participation[$i]):0,
									'social_integration'=>isset($request->social_integration[$i])?(int)($request->social_integration[$i]):0, 
									'accept_to_suggestion'=>isset($request->accept_to_suggestion[$i])?(int)($request->accept_to_suggestion[$i]):0,
									'share_with'=>isset($request->share_with[$i])?(int)($request->share_with[$i]):0,
									'helping_other'=>isset($request->helping_other[$i])?(int)($request->helping_other[$i]):0,
									'confidence'=>isset($request->confidence[$i])?(int)($request->confidence[$i]):0,
									'spoken_eng'=>isset($request->spoken_eng[$i])?(int)($request->spoken_eng[$i]):0,
									'motivation'=>isset($request->motivation[$i])?(int)($request->motivation[$i]):0,
								]);
								}
								
							}
							
						}

						}
						
						
					}
					
				}
				Session::flash('success_message', __('Record inserted Successfully'));
			}else{
				Session::flash('error_message', __('Record Not Insert'));
			}

		}else{
			Session::flash('error_message', __('Record Not Insert'));
		}

		return redirect()->route('marks-edit.index');

	}
}
