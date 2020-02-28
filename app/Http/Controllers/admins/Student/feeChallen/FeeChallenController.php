<?php

namespace App\Http\Controllers\admins\Student\feeChallen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Course;
use Auth;
use PDF;
class FeeChallenController extends Controller
{
  function __construct()
    {
         $this->middleware('role_or_permission:Fee Challen', ['only' => ['index','create','store']]);
        
         
    }
    public function index(Request $request){

    	$records=Branch::with('student.studentFee','student.grade','student.feePost','student.account');
        
       

        if(isset($request->branch_id) && !empty($request->branch_id) && ($request->branch_id)>0 ){
          $branchId=$request->branch_id;
            $records->where('id',$branchId);
        }

        if(isset($request->class_id) && !empty($request->class_id) && ($request->class_id)>0 ){
          $classId=$request->class_id;
          $records->whereHas('student', function($query) use ($classId){
              $query->where('s_classPresent',$classId);
              $query->where('is_active',1);
          });
        }

        if(isset($request->student_id) && !empty($request->student_id)){
          $studentId=$request->student_id;
          $records->whereHas('student', function($query) use ($studentId){
              $query->where('s_lyceonianNo',$studentId);
              $query->where('is_active',1);
          });
        }

        if(isset($request->ly_no) && !empty($request->ly_no) && ($request->ly_no)>0){
          $lyId=$request->ly_no;
          $records->whereHas('student', function($query) use ($lyId){
              $query->where('s_lyceonianNo',$lyId);
              $query->where('is_active',1);
          });
        }

        if(isset($request->month) && !empty($request->month)){
          
          $records->whereHas('student', function($query) use ($month){
              $query->whereHas('feePost',function($query2) use ($month){
                $query2->where('fee_month',$month);
              });
              
          });
        }
        
        if(isset($request->year) && !empty($request->year)){
          
          $records->whereHas('student.feePost', function($query) use ($year){
              $query->where('fee_year',$year);
          });
        }
        $record=$records->first();
        $month=$request->month;
        $year=$request->year;
        $branch_id=$request->branch_id;
        $class_id=$request->class_id;
        $ly_no=$request->ly_no?$request->ly_no:$request->student_id;        // dd($record);
    	return view('admin.student.fee-challen.print',compact('record','month','year','branch_id','class_id','ly_no'));
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
        $classes=Course::get();
      return view('admin.student.fee-challen.create',compact('branches','classes'));
    }

    public function store(Request $request){
      // dd($request->all());
      $currenMonth=date('m');
      if(substr($currenMonth, 0, 1)=='0'){
        $currenMonth=substr($currenMonth, 1, 2);
      }
        $month=$currenMonth;

        $year=date('Y');



        $branch_id=$request->branch_id;
        $class_id=$request->class_id;
        $ly_no=$request->ly_no;  
        
      $records=Branch::with('student','student.feePost')->where('id',$request->branch_id);
      
 

         if(Auth::user()->branch_id){
              $records->where('id',Auth::user()->branch_id);
        }
      
        $record=$records->first();
        // dd($record);
         if(!($record)){
          return redirect()->back();
        }
      return view('admin.student.fee-challen.print',compact('record','month','year','branch_id','class_id','ly_no'));
    }

    public function show(){
      dd("show");
    }



    public function fee_challan_pdf($branch_id=null,$class_id=null,$ly_no=null,$month=null,$year=null){
     

       $records=Branch::with('student','student.feePost')->where('id',$branch_id);
     
         if(Auth::user()->branch_id){
              $records->where('id',Auth::user()->branch_id);
        }
      
        $record=$records->first();




        if(!($record)){
          return redirect()->back();
        }



        $students=\App\Models\Student::select('id')->where('branch_id',$branch_id)->where('course_id',$class_id)->orderBy('course_id','ASC')->where('status',1)->limit(5)->get();

        $feeArray=\App\Models\FeePost::whereIn('std_id',$students)->groupBy('std_id')->orderBy('fee_month','DESC')->orderBy('fee_year','DESC')->limit(5)->get();
// dd($feeArray);

        // $pdf = PDF::loadView('admin.student.fee-challen.challan_pdf', ['record'=>$record,'month'=>$month,'year'=>$year,'branch_id'=>$branch_id,'class_id'=>$class_id,'ly_no'=>$ly_no]);
        $pdf=  app('dompdf.wrapper')->loadView('admin.student.fee-challen.challan_pdf',compact('record','month','year','branch_id','class_id','ly_no','feeArray'));
// dd($pdf);
        // $pdf =d PDF::loadView('admin.student.fee-challen.challan_pdf',compact('record','month','year','branch_id','class_id','ly_no'));

        // return $pdf;
        
        // return $pdf->stream();
dd($pdf->stream('invoice.pdf'));
     return $pdf->stream('invoice.pdf');
        return $pdf->download('challan_pdf.pdf');
        return redirect()->back();

        return view('admin.student.fee-challen.challan_pdf',compact('record','month','year','branch_id','class_id','ly_no','feeArray'));

    }
}
