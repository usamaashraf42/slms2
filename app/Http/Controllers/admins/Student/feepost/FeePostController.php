<?php

namespace App\Http\Controllers\admins\Student\feepost;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeePostRequest;
use App\Models\Branch;
use App\Models\Student;
use App\Models\FeePost;
use App\Models\Course;
use App\Models\StudentFeeStructure;
use App\Models\Account;
use App\Models\Master;
use App\Models\FeeCorrection;
use App\Jobs\FeePostJob;

use DB;
use Auth;
class FeePostController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Fee Post', ['only' => ['create','index','store']]);

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


         $classes=Course::get();
    	return view('admin.student.feepost.create',compact('branches','classes'));
    }

    public function store(FeePostRequest $request){
    //    dd($request->all());
       $ly_no=Student::select('id')->where('status',1)->where('branch_id',$request->branch_id)->get();

        // $correction=FeeCorrection::whereIn('std_id',$ly_no)->where('correction_approv',0)->whereMonth('created_at',"<",$request->month)->get();

        // if(count($correction)){
        //      session()->flash('error_message', __('before fee post coreection approved'));
        //      return redirect()->back();
        // }
        $discount=$request->discount;
        $discount_description=$request->discount_description;
        if(isset($request->courses) && count($request->courses)){
            foreach ($request->courses as $course) {

                $classId=$course;
                $studentId=$request->student_id;
                $lyId=$request->ly_no;
                $month=$request->month;
                $year=$request->year;
                $branchId=$request->branch_id;
                // $request->compFee=$request['comp_'.$course];
                // $request->labFee=$request['lab_'.$course];
                // $request->libFee=$request['lib_'.$course];
                // $request->examFee=$request['exam_'.$course];
                // $request->statFee=$request['stat_'.$course];
                // $request->acFee=$request['ac_'.$course];
                // $request->misc1=$request['misc1_amount__'.$course];
                // $request->misc2=$request['misc2_amount__'.$course];
                // $tution=['tution_'.$course];
                // $request->misc1_desc=$request['misc1_desc_'.$course];
                // $request->misc2_desc=$request['misc2_desc_'.$course];


                $outType=$request->outType;
                $discount_description=$request->discount_description;

                $fee_due_date1=$request->fee_due_date1;
                $fee_due_date2=$request->fee_due_date2;
                $fine_per_day=$request->fine_per_day;


                $compFee=$request['comp_'.$course];
                $labFee=$request['lab_'.$course];
                $libFee=$request['lib_'.$course];
                $examFee=$request['exam_'.$course];
                $statFee=$request['stat_'.$course];
                $acFee=$request['ac_'.$course];
                $misc1=$request['misc1_amount__'.$course];
                $misc2=$request['misc2_amount__'.$course];
                $tution=['tution_'.$course];
                $misc1_desc=$request['misc1_desc_'.$course];
                $misc2_desc=$request['misc2_desc_'.$course];


                (FeePostJob::dispatch($branchId,$classId,$month,$year,$compFee,$labFee,$libFee,$examFee,$statFee,$acFee,$misc1,$misc2,$tution,$misc1_desc,$misc2_desc,$lyId,$studentId,$outType,$discount,$discount_description,$fee_due_date1,$fee_due_date2,$fine_per_day,Auth::user()->id));

               




            }

            session()->flash('success_message', __('Fee Posting process is starting'));


        }else{

            session()->flash('error_message', __('please select class'));

        }
         \Artisan::call('queue:work');

        return redirect()->back();
    }


    public function show($id){
        // dd($id);
        $fees=FeePost::with('student')->where('std_id',$id)->orderBy('id','DESC')->get();

        return view('admin.student.feepost.index',compact('fees'));
    }

    public function challen($id){

        $feePost=FeePost::with('student')->find($id);
// dd($feePost);
        if(!$feePost){
             session()->flash('error_message', __('Record not found'));
             return redirect()->back();
        }
        return view('admin.student.fee-challen.studentChallen',compact('feePost'));
    }

    public function feeTotalRounded($std_id,$totalFee,$on_round_off){
        $stdFee=StudentFeeStructure::where('std_id',$std_id)->orderBy('id','DESC')->first();
        $firstReminder=$stdFee->carry_forward;
        $TotaLsecondFee=($firstReminder+($totalFee));
        $secondReminder=($TotaLsecondFee)%$on_round_off;
        $totalFee=(int)($TotaLsecondFee-$secondReminder);
        StudentFeeStructure::where('std_id',$std_id)->update(['carry_forward'=>$secondReminder]);
        return $totalFee;
    }
}
