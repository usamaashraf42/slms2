<?php
use \Carbon\Carbon;




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

   $attendance=\App\Models\StudentDate::where('branch_id',$branch_id)->where('class_id',$class_id)->whereDate('attendance_date',$attendance_date)->where('absent',1)->count();

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
if (!function_exists('lastAbsentDay')) {
  function lastAbsentDay($branch_id,$dates)
  {

    $attendance=\App\Models\StudentDate::where('branch_id',$branch_id);
    foreach($dates as $date){
      $attendance->where('attendance_date',$date);
    }

    return $attendance->where('absent',1)->groupBy('std_id')->with('student')->get();

    
  }
}


if (!function_exists('lastAbsentFromDay')) {
  function lastAbsentFromDay($branch_id,$dates)
  {

   $attendance=\App\Models\StudentDate::where('branch_id',$branch_id)->whereIn('attendance_date',$dates)->where('absent',1)->with('student')->get();

   return $attendance;
 }
}



function currencyCnv( $amount, $from, $to){

  $conv_id = "{$from}_{$to}";
  $string = file_get_contents("https://free.currencyconverterapi.com/api/v6/convert?q=$conv_id&compact=ultra&apiKey=6cc4b09b7a1dff05a1d9");
  $json_a = json_decode($string, true);
  return $amount * round($json_a[$conv_id], 4);
}


function getJobProfilePath($filename = '29-09-2020-1601355172'){


    $dir = '/';
    $recursive = false;
    $contents = collect(Storage::disk('job')->listContents($dir, $recursive));

    $file = $contents
              ->where('type', '=', 'file')
              ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
              ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
              ->first(); 


    $rawData = Storage::disk('job')->url($file['path']);

    return ($rawData);
    
}



function currencyConverter($amount, $from, $to){

  $response = Currency::convert($from,$to,$amount);
  return response()->json($response);

}


function ReferenceDecrypt($string) {
 return Crypt::decryptString($string);
}

function ReferenceEncrypt($string) {
  return  Crypt::encryptString($string);
  
}

 