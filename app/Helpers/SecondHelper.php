<?php
    

if (!function_exists('class_attendance_by_date')) {
  function class_attendance_by_date($branch_id,$class_id,$attendance_date)
  {

    	$attendance=\App\Models\StudentDate::where('branch_id',$branch_id)->where('class_id',$class_id)->whereDate('attendance_date',$attendance_date)->where('present',1)->count();

    	return $attendance;
  }
}

if (!function_exists('class_attendance_by_date_absent')) {
  function class_attendance_by_date_absent($branch_id,$class_id,$attendance_date)
  {

    	$attendance=\App\Models\StudentDate::where('branch_id',$branch_id)->where('class_id',$class_id)->whereDate('attendance_date',$attendance_date)->where('present',2)->count();

    	return $attendance;
  }
}

if (!function_exists('std_attendance')) {
  function std_attendance($branch_id,$class_id,$std_id,$attendance_date)
  {

      $attendance=\App\Models\StudentDate::where('branch_id',$branch_id)->where('class_id',$class_id)->where('std_id',$std_id)->whereDate('attendance_date',$attendance_date)->first();

      return $attendance;
  }
}


if (!function_exists('class_students')) {
  function class_students($branch_id,$class_id)
  {

    	$students=\App\Models\Student::where('branch_id',$branch_id)->where('course_id',$class_id)->where('status',1)->get();

    	return $students;
  }
}

?>