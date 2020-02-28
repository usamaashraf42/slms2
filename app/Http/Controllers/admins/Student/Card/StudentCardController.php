<?php

namespace App\Http\Controllers\admins\Student\Card;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;

use Auth;
class StudentCardController extends Controller
{
    //Student Card
    function __construct()
    {
         // $this->middleware('role_or_permission:Student Card', ['only' => ['create','index','store']]);
         
    }

    public function index(){
       $branch=Branch::where('status',1);

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
        return view('admin.student.StudentCard.create',compact('branches'));
    }

    public function store(Request $request){

// dd($request->all());
    	$records=Student::where('status',1)->where('is_active',1);
         if(isset($request->branch_id) && !empty($request->branch_id) && ($request->branch_id)>0){
              $records->where('branch_id',$request->branch_id);
        }
        if(isset($request->class_id) && !empty($request->class_id) && ($request->class_id)>0){
              $records->where('course_id',$request->class_id);
        }

        if(isset($request->student_id) && !empty($request->student_id) && ($request->student_id)>0){
              $records->where('id',$request->student_id);
        }

        
      
        $record=$records->get();

        return view('admin.student.StudentCard.index',compact('record'));
    }
}
