<?php

namespace App\Http\Controllers\Web\Pakistan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventApplicant;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\Branch;

class SummerController extends Controller
{
    public function index(){
    	return view('web.pakistan.summer.index');
    }
    public function SummerDetail(){
    	return view('web.pakistan.summer.detail');
    }

    public function pakistanRegister(){
    	return view('web.pakistan.summer.pakRegisteration');
    }
    public function omanRegister(){
    	return view('web.pakistan.summer.omanRegisteration');
    }
    public function registeration(Request $request){
// dd($request->all());
       $app=\App\Models\EventApplicant::create([
            'user_name'=>$request->name?$request->name:'',
            'user_lastname'=>$request->fname?$request->fname:'',
            'user_father'=>$request->dob?date("Y-m-d", strtotime($request->dob)):null,

            'school_id'=>$request->school_id,
            'branch_id'=>$request->branch_id,
            'event_name'=>$request->event_name,
            'type'=>$request->type,
            'first_school_name'=>$request->schoolStudy,
            'address'=>$request->address,
            
            'user_email'=>$request->email?$request->email:'',
            'user_phone'=>$request->phone?$request->phone:'',

           

            ]);
            if($app){
                $branchEmail=Branch::where('id',$request->branch_id)->first();
                if(isset($branchEmail->b_emil) && !empty($branchEmail->b_emil)){
                    $bMail=$string = str_replace(' ','',$branchEmail->b_emil); 
                    if(($request->branch_id==968001) || ($request->branch_id==968002) ){
                        $emails = ['web@americanlyceum.com','tnadeem@americanlyceum.com','gmoman@americanlyceum.com',$bMail];
                    }else{
                        $emails = ['web@americanlyceum.com','tnadeem@americanlyceum.com',$bMail];
                    }
                }else{
                    $emails = ['web@americanlyceum.com','tnadeem@americanlyceum.com'];
                }
            // Mail::send('emails.summerPlan', ['data'=>$newUser], function($message) use ($emails)
            // {    
            //     $message->to($emails)->subject('Camp Registration ');    
            // });

                session()->flash('success_message', __('Your application has been submitted Successfully. we will contact you soon, thanks you'));
                return redirect()->back()->with('success_message','Your application has been submitted Successfully. we will contact you soon, thanks you');
            }else{
            session()->flash('error_message', __('Please try again '));
            return redirect()->back()->with('error_message','Please try again');
            }

            return redirect()->back()->with('success_message','Your application has been submitted Successfully. we will contact you soon, thanks you');



       
    }
}
