<?php

namespace App\Http\Controllers\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Branch;
use App\Models\StudentLeft;
use App\Models\StudentTransfer;
use Session;
use Auth;

class BranchPerformanceController extends Controller
{
     function __construct()
    {
         // $this->middleware('role_or_permission:Branch Detail', ['only' => ['create','index','store']]);
         
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
        return view('admin.branch.performance.create',compact('branches'));
    }




    public function store(Request $request){
    	// dd($request->all());

		$leftstudents=[];
		$students=[];
		$tranfstudents=[];
		$from_date=date("Y-m-d", strtotime($request->from_date));
		$till_date=date("Y-m-d", strtotime($request->till_date));
    	if($request->admissions){
    		$stds=Student::where('status',1)->where('is_active',1)->with('studentFee')->where('admission_date','>=',$from_date);
    		if($request->till_date){
					$stds->where('admission_date','<=',$till_date);
    		}
    		if($request->branch_id){
    			$stds->where('branch_id',$request->branch_id);
    		}

    		$students=$stds->get();
    	}

    	

    	if($request->leftStd){
    		$lefts=StudentLeft::where('created_at','>=',$from_date);
    		if($till_date){
					$lefts->where('created_at','<=',$till_date);
    		}
    		if($request->branch_id){
    			$lefts->where('branch_id',$request->branch_id);
    		}

    		$leftstudents=$lefts->get();
    	}

    	if($request->transStd){
    		$tranfs=StudentTransfer::where('created_at','>=',$from_date);
    		if($till_date){
					$tranfs->where('created_at','<=',$till_date);
    		}
    		if($request->branch_id){
    			$tranfs->where('from_branch_id',$request->branch_id);
    		}

    		$tranfstudents=$tranfs->get();
    	}

    	// dd($students[0]);
    	
    	// return redirect()->back();
        return view('admin.branch.performance.index',compact('leftstudents','students','tranfstudents','till_date','from_date'));
    }
}
