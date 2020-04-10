<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SmsSendRequest;
use App\Models\Branch;
use App\Models\Course;
use App\Models\SmsSendLog;
use App\Models\Student;
use Session;
use Auth;
class SmsSendController extends Controller
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
    	return view('admin.SmsSend.create',compact('branches','classes'));
    }


    public function store(SmsSendRequest $request){
        \Artisan::call('cache:clear');
        \Artisan::call('config:cache');
// dd($request->all());
        if($request->branch_id && count($request->branch_id)  ){
        	$students=Student::where('is_active',1)->where('status',1);
        	if(count($request->branch_id)){
        		$students->whereIn('branch_id',$request->branch_id);
        	}
        	if($request->class_id != -1){
        		$students->where('course_id',$request->class_id);
        	}
        	if(($request->student_ids) && count($request->student_ids)>1){
        		$students->whereIn('id',$request->student_ids);
        	}


        	$stds=$students->get();
        
            
        	foreach ($stds as $std) {
    			$log=null;
        		
    			if(isset($std->emergency_mobile) && ($std->emergency_mobile) && $request->sms_body){
    				$sms=strip_tags($request->sms_body);
    				$emergency_mobile[]=$std->emergency_mobile;
    				$log=SendSms($request->emergency_mobile?$request->emergency_mobile:$std->s_phoneNo,$sms);
    			}

        		// SmsSendLog::create([
    	    	// 	'std_id'=>$std->id,
    	    	// 	'branch_id'=>$request->branch_id?$request->branch_id:$std->branch_id,
    	    	// 	'class_id'=>$request->class_id?$request->class_id:$std->course_id,
    	    	// 	'created_by'=>Auth::user()->id,
    	    	// 	'sms_title'=>$request->sms_title,
    	    	// 	'sms_body'=>$request->sms_body,
    	    	// 	'phone'=>$request->emergency_mobile?$request->emergency_mobile:$std->s_phoneNo,
    	    	// 	'description'=>isset($log)?$log:null,
    	    	// ]);
        	}
        }

    	if($request->phone){
    		if(isset($request->phone) && ($request->phone) && $request->sms_body){
				$sms=strip_tags($request->sms_body);
				$log=SendSms($request->phone,$sms);
             
				// SmsSendLog::create([
		  //   		'created_by'=>Auth::user()->id,
		  //   		'sms_title'=>$request->sms_title,
		  //   		'sms_body'=>$request->sms_body,
		  //   		'phone'=>$request->phone,
		  //   		'description'=>isset($log)?$log:null,
		  //   	]);
			}
    	}


    	session()->flash('success_message', __('Sms send successfully'));
        return redirect()->back();
    	
    }
}
