<?php

namespace App\Http\Controllers\admins\Student\studentFreeze;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentFreezeRequest;
use App\Models\Student;
use Auth;
class StudentFreezeController extends Controller
{

	public function index(){
		$ly_no=Student::where('is_freeze',0)->where('status',1)->orderBy('course_id','ASC');
		if(Auth::user()->branch_id){
            $ly_no->where('branch_id',Auth::user()->branch_id);
        }

        $students=$ly_no->get();
		
		return view('admin.student.studentFreeze.index',compact('students'));
	}
   public function create(){
   	return view('admin.student.studentFreeze.create');
   }


   public function store(StudentFreezeRequest $request){
		// dd($request->all());

		$ly_no=Student::where('id',$request->std_id);

        // if(Auth::user()->branch_id){
        //     $ly_no->where('branch_id',Auth::user()->branch_id);
        // }

        $ly=$ly_no->first();

        if(!($ly)){
        	session()->flash('error_message', __('Record not found'));
             return redirect()->back();
        }

         $correction=Student::where('id',$request->std_id)->update([
         	'is_freeze'=>0,
         	'freeze_date'=>date('Y-m-d'),
         	'freeze_till_date'=>date("Y-m-d", strtotime($request->freeze_till_date)),
         	'description'=>$request->description,
         	'updated_by'=>Auth::user()->id,
         ]);

         if($correction){
            session()->flash('success_message', __('Record updated Successfully'));
         }else{
            session()->flash('error_message', __('Record not update'));
         }

         return redirect()->back();


   }
}
