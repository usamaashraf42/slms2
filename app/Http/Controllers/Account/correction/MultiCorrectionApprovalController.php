<?php

namespace App\Http\Controllers\Account\correction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MultiApprovedCorrectionRequest;
use App\Models\Branch;
use App\Models\FeeCorrection;
use Auth;
class MultiCorrectionApprovalController extends Controller
{

	function __construct()
    {
         $this->middleware('role_or_permission:Correction Approval', ['only' => ['create','store']]);
          $this->middleware('role_or_permission:Correction Approved Report', ['only' => ['index']]);
         
    }
    public function create(){
    	$branch=Branch::where('status',1);
        $branches=$branch->get();
    	return view('admin.account.multiCorrectionApproval.create',compact('branches'));
    }


    public function store(Request $request){
    	// dd($request->all());
    	$branch_id=$request->branch_id;

        $records=FeeCorrection::orderBy('id','DESC')->where('correction_approv',0)->with('student')->whereMonth('correction_date',$request->month)->whereYear('correction_date',$request->year);

        $records->whereHas('student', function($query) use ($branch_id){
            $query->where('branch_id',$branch_id);
          });
        $correction=$records->get();
        return view('admin.account.multiCorrectionApproval.index',compact('correction'));
    }

    public function multiApproved(MultiApprovedCorrectionRequest $request){
    	dd($request->all());
    }
}
