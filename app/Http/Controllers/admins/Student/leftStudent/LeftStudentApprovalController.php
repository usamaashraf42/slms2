<?php

namespace App\Http\Controllers\admins\Student\leftStudent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentLeft;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use Auth;
class LeftStudentApprovalController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Student-left Approval', ['only' => ['create','approveBranchWise']]);
          $this->middleware('role_or_permission:Student-left Approved Report', ['only' => ['index']]);
         
    }

    function index(){


       $stdLeft=StudentLeft::where('status','<>',0)->with('student');

       if(Auth::user()->branch_id){
            $stdLeft->where('branch_id',Auth::user()->branch_id);
        }
        $records=$stdLeft->get();
      

      
        
   
        return view('admin.student.approvedLeftStudent.index',compact('records'));
		
	}
    
    public function create(){

        $stdLeft=StudentLeft::where('status',0)->with('student');

        if(Auth::user()->branch_id){
            $stdLeft->where('branch_id',Auth::user()->branch_id);
        }

        $students=$stdLeft->get();
   
        return view('admin.student.approvedLeftStudent.report',compact('students'));

       // $branch=Branch::where('status',1);
       //   if(Auth::user()->branch_id){
       //      $branch->where('id',Auth::user()->branch_id);
       //  }
       //  $branches=$branch->get();
       //  return view('admin.student.approvedLeftStudent.create',compact('branches'));
    }

    public function store(Request $request){
    	

    	$leftStd=StudentLeft::find($request->left_id);
    	if(!$leftStd){
    		return response()->json(['status'=>0,'message'=>'record not found']);
    	}
    	$std=Student::find($leftStd->std_id);
    	if($std){
    		$std->status=0;
    		$std->is_active=0;
            $std->leaving_date=date('Y-m-d');
    		$effectedStd=$std->save();
    		if($effectedStd){
    			$leftStd->status=1;
    			$leftStd->save();
    			return response()->json(['status'=>1,'message'=>'record not found']);
    		}else{
    			return response()->json(['status'=>0,'message'=>'record not update']);
    		}
    	}else{
    		return response()->json(['status'=>0,'message'=>'record not found']);
    	}

    }


    public function approveBranchWise(Request $request){
        // dd($request->all());


        $branch_id=$request->branch_id;

        $records=StudentLeft::where('status',0)->with('student');
        if(Auth::user()->branch_id){
            $records->where('branch_id',Auth::user()->branch_id);
        }

      
        $students=$records->get();
        // dd($students);
      
        return view('admin.student.approvedLeftStudent.report',compact('students'));
    }

    public function correctionReport(Request $request){
        // dd($request->all());

        $branch_id=$request->branch_id;

        $records=FeeCorrection::where('correction_approv','<>',0)->with('student')->whereMonth('correction_date',$request->month)->whereYear('correction_date',$request->year);

        $records->whereHas('student', function($query) use ($branch_id){
            $query->where('branch_id',$branch_id);
          });
        $correction=$records->get();
      
        return view('admin.account.approve-correction.index',compact('correction'));
    }


    public function certificate($id){
       

        $stds=StudentLeft::find($id);
         // dd($stds);
        return view('admin.student.approvedLeftStudent.certificate',compact('stds'));
    }
}
