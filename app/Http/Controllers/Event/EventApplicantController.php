<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\EventApplicant;
use Session;
class EventApplicantController extends Controller
{
    public function admission_inquiry(){
    	$admission=EventApplicant::orderBy('id','DESC')->where('type','admission');
    	if(Auth::user()->school_id){
    		$admission->where('school_id',Auth::user()->school_id);
    	}
    	$admissions=$admission->get();
    	// dd($admissions);
    	return view('admin.event.admission.index',compact('admissions'));
    }

    public function camp_applicant(){
    	$admission=EventApplicant::orderBy('id','DESC')->where('type','camp');

    	if(Auth::user()->school_id){
    		$admission->where('school_id',Auth::user()->school_id);
    	}
    	if(Auth::user()->branch_id){
    		$admission->where('branch_id',Auth::user()->branch_id);
    	}
    	$camps=$admission->get();
    	// dd($camps);
    	return view('admin.event.camp.index',compact('camps'));
    }
}
