<?php

namespace App\Http\Controllers\Marketing\sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SmsSendRequest;
use App\Models\Branch;
use App\Models\Course;
use App\Models\FeePost;
use App\Models\SmsSendLog;
use App\Models\Student;
use App\Jobs\SmsQueueSend;
use App\Jobs\FeePostedSmSendJob;
use Session;
use Auth;

class FeePostedSmsController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:SMS Alert', ['only' => ['create','store']]);
         
    }


    public function create(){
    	$branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        $branches=$branch->get();

        $classes=Course::get();
    	return view('admin.marketing.sms.create',compact('branches','classes'));
    }


    public function store(Request $request){

        ini_set('max_execution_time', 0); //3 minutes

        \Artisan::call('cache:clear');


        $stds=FeePost::whereIn('branch_id',$request->branch_id)->with('student')->orderBy('id','DESC')->where('fee_month',$request->month)->where('fee_year',$request->year)->where('isPaid','<>',1)->get();

// dd($stds);
        if(count($stds)){

         (FeePostedSmSendJob::dispatch($stds));

         	session()->flash('success_message', __('Sms send successfully'));
        	return redirect()->back();
        }
        session()->flash('error_message', __('record not found'));
        return redirect()->back();


    

    	
    	
    }


    public function outstandingStudents($request){
        $sms_title=$request->sms_title;
        $sms=$request->sms_body;
         $stds=FeePost::whereIn('branch_id',$request->branch_id)->with('student')->orderBy('id','DESC')->where('fee_month',$request->month)->where('fee_year',$request->year)->where('isPaid','<>',1)->get();
         OutstandingSMSendController::dispatch($stds,$sms,$sms_title);
         return true;

        
    }
}
