<?php

namespace App\Http\Controllers\admins\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Auth;
use Session;
class StatusChangeController extends Controller
{
	function __construct()
    {
         // $this->middleware('role_or_permission:Re-Admission', ['only' => ['create','index','store']]);
         
    }
    public function index(){
    	return view('admin.student.readmission.create');
    }

    public function store(Request $request){
    	
    	$std=Student::where('id',$request->ly_no);

        if(Auth::user()->branch_id){
            $std->where('branch_id',Auth::user()->branch_id);
        }
        
        $ly=$std->first();
        
    	if(!$ly){
    		 session()->flash('error_message', __('Record not found'));
    		 return redirect()->back();
    	}

    	$sdd=Student::where('id',$request->ly_no)->update(['status'=>1,'is_active'=>1]);

    	if(!$sdd){
    		 session()->flash('error_message', __('Record not found'));
    	}else{
    		session()->flash('success_message', __('Record update Successfully'));
    	}

    	return redirect()->back();
    	
    }
}
