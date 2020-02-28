<?php

namespace App\Http\Controllers\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use Auth;
class BranchMonthlyFeeController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Branch Detail', ['only' => ['create','index','store']]);
         
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
        $records=$branch->get();


        return view('admin.branch.monthlyFee.full',compact('records'));
    }

    public function create(){
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
        $classes=Course::get();
    	return view('admin.branch.monthlyFee.create',compact('branches','classes'));
    }


    public function store(Request $request){
    	


    	 $month=$request->month;
    	 $year=$request->year;

        $students=Student::where('branch_id',$request->branch_id)->where('status',1)->with('studentFee')->whereHas('studentFee')->orderBy('course_id','ASC');
        if($request->class_id){
              $students->where('course_id',$request->class_id);
        }

        $records =$students->get();

        if(!count($records)){
        	session()->flash('error_message', __('Record not found'));
        	return redirect()->back();
        }
        return view('admin.branch.monthlyFee.index',compact('records','month','year'));
    }
}
