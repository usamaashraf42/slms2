<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\ExamType;
use App\Models\ExamMark;
use App\Models\Exam;
use App\Models\Student;
use App\Models\FeePost;
use App\Models\StudentParent;

use Auth;
class AjaxCallController extends Controller
{
    public function CourseHasSection(Request $request){

        $data = Course::where('parentId',$request->id)->get();
        if(count($data)){
        	return response()->json(['status'=>1,'message'=>"Record found successfuly",'data'=>$data]);
        }
        return response()->json(['status'=>0,'message'=>"Record not found"]);
    }

    public function ExamTypeHastExam(Request $request){
    	$exam=ExamType::where('parent_id',$request->id)->get();
    	 if(count($exam)){
        	return response()->json(['status'=>1,'message'=>"Record found successfuly",'data'=>$exam]);
        }
        return response()->json(['status'=>0,'message'=>"Record not found"]);
    }

    public function marksPostingData(Request $request){

    	// $ExamMark=ExamMark::where('branch_id',$request->branch_id)->where('subject_id',$request->subject_id);

    	// if(isset($request->section_id) && !empty($request->section_id)){
    	// 	$ExamMark->where('course_id',$request->section_id);
    	// }else{
     //        $ExamMark->where('course_id',$request->class_id);
     //    }

    	// if(isset($request->exam_id) && !empty($request->exam_id)){
    	// 	$ExamMark->where('exam_id',$request->exam_id);
    	// }
    	// $record=$ExamMark->get();

    	// if((count($record))){
    	// 	return response()->json(['status'=>1,'message'=>"Record found successfuly",'data'=>$record]);
    	// }

    	$stduents=Student::select('id','s_name','s_fatherName')->where('branch_id',$request->branch_id)->where('is_active',1)->where('status',1);
    	if(isset($request->section_id) && !empty($request->section_id)){
    		$stduents->where('course_id',$request->section_id);
    	}else{
            $stduents->where('course_id',$request->class_id);
        }

    	$stds=$stduents->get();

        $exams=Exam::where('exam_date','>=',date('y-m-d'));
        if($request->exam_id){
            $exams->orWhere('term_id',$request->exam_id);
        }
        if($request->exam_type_id){
            $exams->orWhere('exam_type_id',$request->exam_type_id);
        }

    	$exam= $exams->first();

    	if(count($stds)){
        	return response()->json(['status'=>1,'message'=>"Student Record found successfuly",'data'=>$stds,'exam'=>$exam]);
        }

        return response()->json(['status'=>0,'message'=>"Record not found"]);

    }

    public function getStudent(Request $request){

        $student=FeePost::where('std_id',$request->id)->with('student.studentFee','student.Balance')->orderBy('id','DESC')->first();

        if($student){
            return response()->json(['status'=>1,'data'=>$student], 200);
        }else{
            $message='Record not found';
             return response()->json(['status'=>0,'message'=>$message], 200);
        }
    }

    public function correctionRecord(Request $request){


         $ly_no=Student::select('id','s_name','s_fatherName')->where('id',$request->id);
        if(Auth::user()->branch_id){
            $ly_no->where('branch_id',Auth::user()->branch_id);
        }
        $ly=$ly_no->first();
        if(!($ly)){
             return response()->json(['status'=>1,'data'=>'Record not found']);
        }

         $correction=\App\Models\FeeCorrection::with('student.branch','feePost')->find($request->id);
         if($correction){
            return response()->json(['status'=>1,'data'=>$correction]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }

    public function countryHasBranch(Request $request){
        
       $branch=\App\Models\Branch::where('b_countryCode',$request->id);
            if(Auth::check()){
                if(Auth::user()->branch_id){
                     $branch->where('id',Auth::user()->branch_id);
                }
            }
            if(Auth::check()){
                if(Auth::user()->school_id){
                     $branch->where('school_id',Auth::user()->school_id);
                }
                
            }
         
        $correction=$branch->get();


         if(count($correction)){
            return response()->json(['status'=>1,'data'=>$correction]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }
    
    public function schoolHasBranch(Request $request){
        
       $branch=\App\Models\Branch::where('school_id',$request->id);
            if(Auth::check()){
                if(Auth::user()->school_id){
                     $branch->where('school_id',Auth::user()->school_id);
                }
            }
         
        $correction=$branch->get();


         if(count($correction)){
            return response()->json(['status'=>1,'data'=>$correction]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }

     public function studentById(Request $request){


         $ly_no=Student::select('id','s_name','s_fatherName','course_id','section_id')->with('course','Section','Balance')->where('id',$request->id);
        if(Auth::user()->branch_id){
            $ly_no->where('branch_id',Auth::user()->branch_id);
        }
        $ly=$ly_no->first();
      

         if($ly){
            return response()->json(['status'=>1,'data'=>$ly]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }

    public function parentHasKids(Request $request){
        $kids=Student::where('father_cnic',$request->id)->get();
        if(count($kids)){
            return response()->json(['status'=>1,'data'=>$kids]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }
    public function admissionPackage(Request $request){
        $packages=\App\Models\AdmissionPackage::where('branch_id',$request->branch_id)->where('course_id',$request->course_id)->get();
         if(count($packages)){
            return response()->json(['status'=>1,'data'=>$packages]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }

    public function admissionPackageFirst(Request $request){
        $packages=\App\Models\AdmissionPackage::find($request->id);
         if(($packages)){
            return response()->json(['status'=>1,'data'=>$packages]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }


    
}
