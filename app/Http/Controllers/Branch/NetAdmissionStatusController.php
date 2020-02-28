<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Branch;
use App\Models\StudentLeft;
use App\Models\StudentTransfer;
use Auth;
use Session;

class NetAdmissionStatusController extends Controller
{
    function __construct()
    {
         // $this->middleware('role_or_permission:New Admission Status', ['only' => ['create','index','store']]);
         
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

        return view('admin.branch.netAdmission.create',compact('branches'));
    }

    public function store(Request $request){
    	// dd($request->all());

        // $lefts=StudentLeft::groupBy('')->get();
        // dd($lefts);

    	$from_date=date("Y-m-d", strtotime($request->from_date));
    	$till_date=date("Y-m-d", strtotime($request->till_date));

		$fees=Branch::where('isFranchise',1);
    	if($request->branch_id){
            $fees->where('id',$request->branch_id);
        }
        if(Auth::user()->branch_id){
            $fees->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $fees->where('school_id',Auth::user()->school_id);
        }
        $records = $fees->get();


        $franchise=Branch::where('isFranchise',null);
        if($request->branch_id){
            $fees->where('id',$request->branch_id);
        }
        
        if(Auth::user()->branch_id){
            $franchise->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $franchise->where('school_id',Auth::user()->school_id);
        }

        $franchisees = $franchise->get();
        return view('admin.branch.netAdmission.index',compact('from_date','till_date','franchisees','records'));

    }

}
