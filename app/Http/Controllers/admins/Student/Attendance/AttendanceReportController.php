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
class AttendanceReportController extends Controller
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

		return view('admin.student.attendanceReport.create',compact('branches'));
	}

	public function store(Request $request){


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

		if($request->branch_id){
			$branch->where('id',$request->branch_id);
		}

		$branches=$branch->get();

		$date=isset($request->fee_due_date1)?date('Y-m-d', strtotime($request->fee_due_date1)):date('Y-m-d');
		$last_absent_day=$request->last_absent_day;
		$tempDates=array();

		if($last_absent_day){
			for($i=0; $i<$last_absent_day; $i++){
				$dates=date('Y-m-d',strtotime("-$i days"));
				array_push($tempDates, $dates);
			}			
		}

		return view('admin.student.attendanceReport.index',compact('branches','date','last_absent_day','tempDates'));
	}



}
