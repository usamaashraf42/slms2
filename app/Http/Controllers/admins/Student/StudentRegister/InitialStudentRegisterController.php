<?php

namespace App\Http\Controllers\admins\Student\StudentRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdmissionQuery;

use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\StudentCategory;
use App\Models\Branch;
use Auth;
use Session;

class InitialStudentRegisterController extends Controller
{
    public function NewAdmission(Request $request){
    	$data=AdmissionQuery::where('id',$request->id)->first();

    	if(!$data){
    		session()->flash('error_message', __('Record not found'));
    		return redirect()->back();
    	}

    	$sessions=AcademicSession::where('status',1)->get();
        $courses=Course::where('parentId',0)->get();
        $category=StudentCategory::where('status',1)->get();
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
// dd($data);
    	return View('admin.student.InitalAdmission.admission',compact('data','sessions','category','courses','branches'));
    }
}
