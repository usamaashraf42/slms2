<?php

namespace App\Http\Controllers\Web\Muscat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventApplicant;
use App\Models\BankTransactionDetail;



use App\Models\Branch;

use Session;
use Mail;
class PublicController extends Controller
{
    public function index(){
    	return view('web.muscat.index');
    }
    public function nursery(){
    	return view('web.muscat.nursary');
    }
    public function school(){
    	return view('web.muscat.omanschool');
    }
    public function academy(){
    	return view('web.muscat.accadmin_nursery');
    }
    public function activity(){
        return view('web.muscat.nursery_activity');
    }
     public function academys(){
        return view('web.muscat.accadmin_school');
    }
        public function jobs(){
        return view('web.muscat.jobs');
    }
     public function ceo_messege(){
        return view('web.muscat.ceo_messege');
    }
     public function ceo_messege_school(){
        return view('web.muscat.ceo_messege_school');
    }
       public function curriculum(){
        return view('web.muscat.curriculum');
    }
     public function curriculum_school(){
        return view('web.muscat.curriculum_school');
    }
    public function news_nursery(){
        return view('web.muscat.news_nursery');
    }
    public function event_nursery(){
        return view('web.muscat.event_nursery');
    }
     public function news_school(){
        return view('web.muscat.news_school');
    }
        public function event_school(){
        return view('web.muscat.event_school');
    }
       public function faq(){
        return view('web.muscat.faq');
    }
        public function contact(){
        return view('web.muscat.contact');
    }
    public function contact_school(){
        return view('web.muscat.contact_school');
    }


    public function admission(){
        return view('web.muscat.admission');
    }

    public function admission_query(Request $request){
        // `id`, `school_id`, `branch_id`, `name`, `phone`, `contact_no`, `course_id`, `address`,

        // dd($request->all());
        $admission=\App\Models\AdmissionQuery::create([
            'school_id'=>$request->school_id?$request->school_id:1,
            'branch_id'=>$request->branch_id,
            'name'=>$request->name,
            'father_name'=>$request->fname,
            'last_school'=>$request->last_school,
            'last_result'=>$request->last_result,
            'dob'=>date("Y-m-d", strtotime($request->dob)),
            'email'=>$request->email,
            'address'=>$request->address,
            'contact_no'=>$request->phone,
            'course_id'=>$request->course_id,
        ]);
        $branch=\App\Models\Branch::find($request->branch_id);
        $amount=isset($branch->b_regFee)?$branch->b_regFee:1000;
            if($admission){
                $object = new \stdClass;
                $fees=\App\Models\BankTransactionDetail::create([
                    'std_reg_id'=>$admission->id,
                    'amount'=>$amount,
                    'bank_id'=>8,
                    'status'=>1,
                    'branch_id'=>isset($branch->id)?$branch->id:0,
                ]);

                $object->desire_amount=($amount).'00';
                $object->pp_Amount=($amount);

            // if($request->phone){
            //     $sms= strip_tags("Dear $request->fname ,"." <br> "."Initial Online registration of $request->name is in process. "." <br> "."Thank You, "." <br> "."ALIS, ");
            //     (SendSms($request->phone,$sms));
            // }
            if($request->email){
                $emails=$request->email;
                    // Mail::send('emails.initialAdmission',['user'=>$admission], function($message) use ($emails){    
                    //     $message->to($emails)->subject('Initial Online registration');    
                    // });

            }

            if(!$fees){
                 session()->flash('error_message', __('Please try again '));
                return redirect()->back()->with('error_message','Please try again');
            }


            session()->flash('success_message', __('To Complete Registration Please Deposit Registration Fee'));
            return view('web.muscat.admissionQuery.checkout',compact('branch','admission','fees','object'));
        }else{
            session()->flash('error_message', __('Please try again '));
            return redirect()->back()->with('error_message','Please try again');
        }



        return redirect()->back()->with('success_message','Your application has been submitted Successfully. we will contact you soon, thanks you');
    }


    
}
