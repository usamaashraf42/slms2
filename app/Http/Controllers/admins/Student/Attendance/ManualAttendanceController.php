<?php

namespace App\Http\Controllers\admins\Student\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Student;
use App\Models\BranchCourse;
use App\Models\StudentDate;
use App\Http\Requests\ClassListRequest;
use Auth;
use DB;
class ManualAttendanceController extends Controller
{

	public function index(){
		$branch=Branch::where('status',1)->with('level.course.Students')->has('level.course.Students');

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

		return view('admin.student.ManualAttendance.index',compact('branches'));
	}


	public function store(Request $request){


		$student=BranchCourse::orderBy('course_id','ASC')->where('branch_id',$request->branch_id);v  


		if(isset($request->class_id) && !empty($request->class_id) && ($request->class_id) > 0){
			$class=$request->class_id;
			$student->whereHas('course.Students', function($query) use ($class){
				$query->where('course_id',$class);
			});
		}
		if(isset($request->branch_id) && !empty($request->branch_id)){
			$branch_id=$request->branch_id;
			$student->whereHas('course.Students', function($query) use ($branch_id){
				$query->where('branch_id',$branch_id);
			});
		}
		$classes=$student->get();
		$attendance_date=date("Y-m-d", strtotime($request->attendance_date));

		if(!count($classes)){
			session()->flash('error_message', __('Record not found'));
			return redirect()->back();
		}

		// dd($attendance_date);

		return view('admin.student.ManualAttendance.attendanceClassWise',compact('classes','attendance_date'));

	}


	public function manualAttendance($branch_id=null,$class_id=null,$attendance_date=null){
		$student=BranchCourse::orderBy('course_id','ASC')->where('branch_id',$branch_id);


		if(isset($class_id) && !empty($class_id) && ($class_id) > 0){
			$class=$class_id;
			$student->whereHas('course.Students', function($query) use ($class){
				$query->where('course_id',$class);
			});
		}
		if(isset($branch_id) && !empty($branch_id)){
			$branch_id=$branch_id;
			$student->whereHas('course.Students', function($query) use ($branch_id){
				$query->where('branch_id',$branch_id);
			});
		}
		$classes=$student->get();
		$attendance_date=date("Y-m-d", strtotime($attendance_date));

		if(!count($classes)){
			session()->flash('error_message', __('Record not found'));
			return redirect()->back();
		}
		;

		return view('admin.student.ManualAttendance.attendanceClassWise',compact('classes','attendance_date'));
	}


	public function AddAttendance(Request $request){
		// dd($request->all());

		$students=Student::where('status',1)->where('branch_id',$request->branch_id)->where('course_id',$request->class_id)->get();
		// dd($students);
		if(!count($students)){
			session()->flash('error_message', __('Record not found'));
			return redirect()->back();
		}
		$attendance_date=$request->attendance_date;
		return view('admin.student.ManualAttendance.attendanceMarked',compact('students','attendance_date'));

	}

	public function attendanceMarked(Request $request){
		$branch=$request->branch_id;
		$class_id=$request->section_id;
		$attendance_date=$request->attendance_date;
		for($i=0; $i<count($request->std_ids); $i++){
			if(isset($request->std_ids[$i]) && $request->std_ids[$i] && isset($request->attendance[$i]) && $request->attendance[$i]){
				$datas=StudentDate::where('std_id',$request->std_ids[$i])->where('attendance_date',$request->attendance_date)->where('section_id',$request->section_id)->where('branch_id',$request->branch_id)->first();
				if(!$datas){
					$data=StudentDate::insert([
						'std_id'=>$request->std_ids[$i],
						'attendance_date'=>$request->attendance_date,
						'present'=>$request->attendance[$i]==1?1:0,
						'absent'=>$request->attendance[$i]==2?1:0,
						'holiday_id'=>$request->attendance[$i]==4?1:0,
						'leave_id'=>$request->attendance[$i]==3?1:0,
						'branch_id'=>$request->branch_id,
						'section_id'=>$request->section_id,
						'class_id'=>$request->class_id,
					]);
				}else{
					$data=StudentDate::where('std_id',$request->std_ids[$i])->where('attendance_date',$request->attendance_date)->where('section_id',$request->section_id)->where('branch_id',$request->branch_id)->update([
						'std_id'=>$request->std_ids[$i],
						'attendance_date'=>$request->attendance_date,
						'present'=>$request->attendance[$i]==1?1:0,
						'absent'=>$request->attendance[$i]==2?1:0,
						'holiday_id'=>$request->attendance[$i]==4?1:0,
						'leave_id'=>$request->attendance[$i]==3?1:0,
						'branch_id'=>$request->branch_id,
						'section_id'=>$request->section_id,
						'class_id'=>$request->class_id,
					]);
				}
				
			}
		}
		if(isset($data) && $data){
			session()->flash('success_message', __("Attendance Marked successfully."));

			$student=BranchCourse::orderBy('course_id','ASC')->where('branch_id',$request->branch_id);


			
			if(isset($request->branch_id) && !empty($request->branch_id)){
				$branch_id=$request->branch_id;
				$student->whereHas('course.Students', function($query) use ($branch_id){
					$query->where('branch_id',$branch_id);
				});
			}
			$classes=$student->get();
			$attendance_date=date("Y-m-d", strtotime($request->attendance_date));

			if(!count($classes)){
				session()->flash('error_message', __('Record not found'));
				return redirect()->back();
			}

		// dd($attendance_date);

			return view('admin.student.ManualAttendance.attendanceClassWise',compact('classes','attendance_date'));
		}else{
			session()->flash('error_message', __('Failed to mark the attendance'));
			return redirect()->back();
		}
	}
}
