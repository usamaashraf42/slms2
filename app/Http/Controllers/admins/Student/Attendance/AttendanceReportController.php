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

	public function store(Request $reqeust){
		dd($request->all());
	}



}
