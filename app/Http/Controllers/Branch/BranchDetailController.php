<?php

namespace App\Http\Controllers\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use Auth;
class BranchDetailController extends Controller
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

        return view('admin.branch.detail.full',compact('records'));
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
    	return view('admin.branch.detail.create',compact('branches','classes'));
    }


    public function store(Request $request){
    	// dd($request->all());
    	 $month=$request->month;
    	 $year=$request->year;

      $records=Branch::with('student','student.feePost','student.grade','student.account')->where('id',$request->branch_id);
      
    
        
        if(Auth::user()->branch_id){
              $records->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
              $records->where('school_id',Auth::user()->school_id);
        }

        $branch=$records->first();

        if(!$branch){
        	session()->flash('error_message', __('Record not found'));
        	return redirect()->back();
        }

        return view('admin.branch.detail.index',compact('branch','month','year'));
    }
}
