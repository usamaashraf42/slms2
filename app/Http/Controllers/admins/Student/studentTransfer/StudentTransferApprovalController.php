<?php

namespace App\Http\Controllers\admins\Student\studentTransfer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use App\Models\StudentTransfer;
use Auth;
class StudentTransferApprovalController extends Controller
{

	 function __construct()
    {
         $this->middleware('role_or_permission:Student-transfer Approval', ['only' => ['index','store']]);
         $this->middleware('role_or_permission:Student-transfer Approved Report', ['only' => ['create']]);
         
    }

    public function index(){
    	$transfer=StudentTransfer::orderBy('id','Desc')->where('status',0);
        if(Auth::user()->branch_id){
            $transfer->where('from_branch_id',Auth::user()->branch_id)->orWhere('to_branch_id',Auth::user()->branch_id);
        }
        $transfers=$transfer->get();
        if(!count($transfers)){
             session()->flash('error_message', __('Failed! To update Inserted'));
             return redirect()->back();
        }
        
        return view('admin.student.transfer.approvalRecord',compact('transfers'));
    }

    public function create(){
    	$transfer=StudentTransfer::orderBy('id','Desc')->where('status','<>',0)->whereMonth('created_at',date('m'));
        if(Auth::user()->branch_id){
            $transfer->where('from_branch_id',Auth::user()->branch_id)->orWhere('to_branch_id',Auth::user()->branch_id);
        }
        $transfers=$transfer->get();
        if(!count($transfers)){
             session()->flash('error_message', __('Failed! To update Inserted'));
             return redirect()->back();
        }

        return view('admin.student.transfer.approvalRecordReport',compact('transfers'));
    }


    public function store(Request $request){
    	// return $request->all();
    	$transfers=StudentTransfer::find($request->id);

        if(!($transfers)){
           return response()->json(['status'=>0,"message"=>'record not found']);
        }
        $student=Student::find($transfers->std_id);
        if($student){
        	$effected=Student::where('id',$transfers->std_id)->update(['branch_id'=>$transfers->to_branch_id,'course_id'=>$transfers->to_class_id]);
        	 $updatedstatus=StudentTransfer::where('id',$request->id)->update(['status'=>1]);
        	return response()->json(['status'=>1,'message'=>'Record update Successfully']);
        }else{
             return response()->json(['status'=>0,"message"=>'Record failed to update']);
        }
    }
}
