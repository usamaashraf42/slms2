<?php

namespace App\Http\Controllers\admins\Student\studentTransfer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentTransferRequest;
use App\Models\Branch;
use App\Models\Student;
use App\Models\StudentTransfer;
use Auth;
class StudentTransferController extends Controller
{

    function __construct()
    {
         $this->middleware('role_or_permission:student-transfer', ['only' => ['create','store']]);
         
    }

    public function index(){
        $transfer=StudentTransfer::orderBy('id','Desc');
        if(Auth::user()->branch_id){
            $transfer->where('from_branch_id',Auth::user()->branch_id)->orWhere('to_branch_id',Auth::user()->branch_id);
        }
        $transfers=$transfer->get();
        if(!count($transfers)){
             session()->flash('error_message', __('Failed! To update Inserted'));
             return redirect()->back();
        }

        return view('admin.student.transfer.report',compact('transfers'));

        // $branch=Branch::where('status',1);

        //  if(Auth::user()->branch_id){
        //     $branch->where('id',Auth::user()->branch_id);
        // }
        // $branches=$branch->get();
        // return view('admin.student.transfer.index',compact('branches'));
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
         $otherBranches=Branch::where('status',1)->get();
    	return view('admin.student.transfer.create',compact('branches','otherBranches'));
    }

    public function store(StudentTransferRequest $request){
    	// dd($request->all());

        
        $ly_no=Student::where('id',$request->student_id);
        if(Auth::user()->branch_id){
            $ly_no->where('branch_id',Auth::user()->branch_id);
        }
        $ly=$ly_no->first();

        if(!($ly)){
            session()->flash('error_message', __('Record not found'));
             return redirect()->back();
        }

  

         $correction=StudentTransfer::create([
            'std_id'=>$request->student_id,

            'from_branch_id'=>isset($request->from_branch_id)?$request->from_branch_id:$ly->branch_id,

            'to_branch_id'=>isset($request->to_branch_id)!=null?$request->to_branch_id:$ly->branch_id,

            'from_class_id'=>isset($request->from_class_id)?$request->from_class_id:$ly->course_id,
            'to_class_id'=>isset($request->to_class_id)!=null?$request->to_class_id:$ly->course_id,

            

            'description'=>$request->description,
            'created_by'=>Auth::user()->id,
            'updated_by'=>Auth::user()->id,
         ]);
         if($correction){
            session()->flash('success_message', __('Record Inserted Successfully'));
         }else{
            session()->flash('error_message', __('Record not update'));
         }

         return redirect()->back();


    	$student=Student::find($request->student_id);
    	$student->branch_id=$request->transfer_to_branch;
    	if($request->transfer_to_class){
    		$student->course_id=$request->transfer_to_class;
    	}
    	$effected=$student->save();
    	if($effected){
    		session()->flash('success_message', __('Record update Successfully'));
    	}else{
    		 session()->flash('error_message', __('Failed! To update Inserted'));
    	}
    	return redirect()->back();

    }


    public function branch_student_transfer_report(Request $request){

        $transfers=StudentTransfer::get();
        if(!count($transfers)){
             session()->flash('error_message', __('Failed! To update Inserted'));
             return redirect()->back();
        }

        return view('admin.student.transfer.report',compact('transfers'));
    }

    public function edit($id){
        $transfers=StudentTransfer::find($id);

        if(!($transfers)){
           return response()->json(['status'=>0,"message"=>'record not found']);
        }

        $updatedstatus=StudentTransfer::where('id',$id)->update(['status'=>2]);
        if($updatedstatus){
             return response()->json(['status'=>1,"message"=>'Record update Successfully']);
        }else{
             return response()->json(['status'=>0,"message"=>'Record failed to update']);
        }

    }
}
