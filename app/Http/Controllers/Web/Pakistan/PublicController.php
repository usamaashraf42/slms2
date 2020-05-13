<?php

namespace App\Http\Controllers\Web\Pakistan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controller\Fran;
use App\Models\EventApplicant;
use App\Models\BankTransactionDetail;



use App\Models\Branch;

use Session;
use Mail;
class PublicController extends Controller
{
    public function index(){
    	return view('web.pakistan.index');
    }

    public function about(){
    	return view('web.pakistan.about');
    }

    public function mision(){
    	return view('web.pakistan.mission');
    }

    public function leadership(){
    	return view('web.pakistan.leadership');
    }
    public function coreValue(){
    	return View('web.pakistan.coreValue');
    }
    public function vision(){
    	return view('web.pakistan.vision');
    }

    public function history(){
    	return view('web.pakistan.history');
    }

    public function why_e_school(){
        return view('web.pakistan.why_e_school');
    }
  public function Examination(){
        return view('web.pakistan.Examination');
    }

    public function Vision_two(){
        return view('web.pakistan.Vision_two');
    }
     public function mission_two(){
        return view('web.pakistan.mission_two');
    }
     public function history_two(){
        return view('web.pakistan.history_two');
    }
      public function information(){
        return view('web.pakistan.Information');
    }
  public function clubs(){
        return view('web.pakistan.clubs');
    }
    public function apply(){
        return view('web.pakistan.Apply');
    }
     public function leader(){
        return view('web.pakistan.leader');
    }
     public function fee_Structure(){
        return view('web.pakistan.Fee_Structure');
    }
       public function life(){
        return view('web.pakistan.life');
    }
          public function explore(){
        return view('web.pakistan.explore');
    }
    public function Jobs_now(){
        return view('web.pakistan.Jobs_now');
    }

    public function why_Us(){
        return view('web.pakistan.why_Us');
    }
      public function Apply_now(){
        return view('web.pakistan.Apply_now');
    }
      public function branch(){
        return view('web.pakistan.branch');
    }
      public function Summer(){
        return view('web.pakistan.Summer');
    }
      public function Summer_fee(){
        return view('web.pakistan.Summer_fee');
    }

    public function contactus(){
        return view('web.pakistan.contactus');
    }
    public function news(){
        return view('web.pakistan.news');
    }
    public function date_sheet(){
        return view('web.pakistan.date_sheet');
    }

    public function job_internship(){
        return view('web.pakistan.internship_job');
    }

     public function howToPay(){
        return view('web.pakistan.howToPay');
    }


    


    public function event(){
        return view('web.pakistan.event');
    }
    public function franchise_form(Request $request){

      // dd($request->all());
         $app=\App\Models\FranchiseApplicant::create([
        'first_name'=>$request->first_name?$request->first_name:'',
        'school_id'=>$request->school_id,
        'last_name'=>$request->last_name?$request->last_name:'',
        'email'=>$request->email?$request->email:'',
        'phone'=>$request->phone?$request->phone:'',
        'country'=>$request->select_country?$request->select_country:'',
        'country_address'=>$request->country_address?$request->country_address:'',
        'select_area'=>$request->select_area?$request->select_area:'',
        'select_franchise'=>$request->select_franchise?$request->select_franchise:'',
        'exist_school'=>$request->exist_school,
        'school_building'=>$request->school_building,
        'number_students'=>$request->number_students
    ]);
    if($app){
        $emails=$request->email;
        if($emails){
            Mail::send('emails.wellcome', ['email'=>$request->email], function($message) use ($emails){    
               $message->to($emails)->subject('Welcome to Royal Lyceum School System');    
             });
        }
        $emails='tnadeem@americanlyceum.com';
        Mail::send('emails.franchise', ['first_name'=>$request->first_name?$request->first_name:'','phone'=>$request->phone?$request->phone:'','select_country'=>$request->select_country?$request->select_country:'','email'=>$request->email,'country_address'=>$request->country_address?$request->country_address:'','select_area'=>$request->select_area?$request->select_area:'','select_franchise'=>$request->select_franchise?$request->select_franchise:'','exist_school'=>$request->exist_school,'school_building'=>$request->school_building,'number_students'=>$request->number_students], function($message) use ($emails){    
           $message->to($emails)->subject('New Franchise Applicant Record');    
         });
        session()->flash('success_message', __('Your application has been submitted Successfully. we will contact you soon, thanks you'));
        return redirect()->back()->with('success_message','Your application has been submitted Successfully. we will contact you soon, thanks you');
    }else{
        session()->flash('error_message', __('Please try again '));
        return redirect()->back()->with('error_message','Please try again');
    }

    return redirect()->back()->with('success_message','Your application has been submitted Successfully. we will contact you soon, thanks you');
    }

    public function admission_query(Request $request){
        // `id`, `school_id`, `branch_id`, `name`, `father_name`, `contact_no`, `course_id`, `address`,

        // dd($request->all());
        $admission=\App\Models\AdmissionQuery::create([
                'school_id'=>$request->school_id?$request->school_id:1,
                'branch_id'=>$request->branch_id,
                'name'=>$request->name,
                'father_name'=>$request->fname,
                'email'=>$request->email,
                'address'=>$request->address,
                'contact_no'=>$request->phone,
                'course_id'=>$request->course_id,
        ]);
        $branch=Branch::find($request->branch_id);
        $amount=isset($branch->b_regFee)?$branch->b_regFee:1000;
        if($admission){
            $object = new \stdClass;
            $fees=BankTransactionDetail::create([
                'std_reg_id'=>$admission->id,
                'amount'=>$amount,
                'bank_id'=>8,
                'status'=>1,
                'branch_id'=>isset($branch->id)?$branch->id:0,
            ]);

            $object->desire_amount=($amount).'00';
            $object->pp_Amount=($amount);

                session()->flash('success_message', __('Your application has been submitted Successfully. please submit registration fee, thanks you'));
                 return view('web.pakistan.admissionQuery.checkout',compact('branch','admission','fees','object'));
            }else{
            session()->flash('error_message', __('Please try again '));
            return redirect()->back()->with('error_message','Please try again');
            }

           

            return redirect()->back()->with('success_message','Your application has been submitted Successfully. we will contact you soon, thanks you');
    }
    public function event_posted(Request $request){
        $app=EventApplicant::create($request->all());
         if($app){
            session()->flash('success_message', __('Your application has been submitted Successfully. we will contact you soon, thanks you'));
        }else{
            session()->flash('error_message', __('Please try again '));
        }
        return redirect()->back();
    }


    function job_application(){
        return view('web.job.job_application');
    }


    

}
