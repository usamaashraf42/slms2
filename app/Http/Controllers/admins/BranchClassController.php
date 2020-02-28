<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Branch;
use App\Models\Course;
use App\Models\BranchCourse;
class BranchClassController extends Controller
{
	 function __construct()
    {
         $this->middleware('role_or_permission:Branch-Class-Record', ['only' => ['create','index','store']]);
         $this->middleware('role_or_permission:Branch-Class-Record Update', ['only' => ['update','edit']]);
         
    }
    public function index(){
    	$branch=Branch::with('courses');
    	if(Auth::user()->branch_id){
    		$branch->where('id',Auth::user()->branch_id);
    	}
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
    	$branches=$branch->get();
    	return view('admin.definitions.BranchCourse.index',compact('branches'));
    }

    public function edit($id){
    	$branch=Branch::with('courses')->where('id',$id);

    	if(Auth::user()->branch_id){
    		$branch->where('id',Auth::user()->branch_id);
    	}
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }

    	$user=$branch->first();
    	// dd($user);
    	$course=Course::get();

    	return view('admin.definitions.BranchCourse.edit',compact('user','course'));
    }

     public function update(Request $request, $id){

     	$branchesCourse=BranchCourse::where('branch_id',$id)->delete();
    
     	
    
     		for($i=0; $i<count($request->courses); $i++){
                BranchCourse::where('branch_id',$id)->delete();
     			if(isset($request->courses[$i])){
     				BranchCourse::insert([
     					'branch_id'=>$id,
     					'course_id'=>$request->courses[$i],
     				]);
     			}
     		}
     
     	session()->flash('success_message', __('Record Inserted Successfully'));
        return redirect()->route('branch-class.index');
     }


}
