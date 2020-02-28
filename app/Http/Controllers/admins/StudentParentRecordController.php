<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Branch;
use Auth;
use Session;
use DB;
class StudentParentRecordController extends Controller
{
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
    	return view('admin.StudentParent.create',compact('branches'));
    }

    public function store(Request $request){
    	


    	$students=Student::orderBy('course_id','ASC');
    	if($request->branch_id){
    		$students->where('branch_id',$request->branch_id);
    	}
    	if($request->status){
    		$students->where('status',$request->status);
    	}

    	$datas=$students->get();

    	return view('admin.StudentParent.index',compact('datas'));

    }
}
