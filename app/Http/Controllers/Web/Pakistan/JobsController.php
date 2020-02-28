<?php

namespace App\Http\Controllers\Web\Pakistan;

use App\Models\jobs;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use  Validator;
use App\Models\Job;
use App\Models\User;
use App\Models\Application;
use App\Models\UserDegree;
use App\Models\UserExperience;
use App\Models\Applicant;
use DateTime;
use Auth;
use Session;
use DB;
class JobsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs=Job::where('status',1)->get();

        return view('web.job',compact('jobs'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(ApplicationRequest $request)
    {

        // dd($request->all());
      $date = new DateTime($request->dob);
        
        // if($request->all()){
        //     session()->flash('success_message', __('Record Inserted Successfully'));
        // }else{
        //     session()->flash('error_message', __('Failed! To Insert Record'));
        // }
        // return redirect()->back();

         $now = new DateTime();
         $interval = $now->diff($date);

         // if($interval->y <=16){
         //     session()->flash('error_message', __('Date of birth should be greater then 16 years.'));
         //     return redirect()->back()->withInput($request->input());
         // }
        DB::beginTransaction();
        if($request->hasfile('images')){
            $Extension_profile = $request->file('images')->getClientOriginalExtension();
            $profile = 'profile'.'_'.date('YmdHis').'.'.$Extension_profile;
            $request->file('images')->move('images/applicant/', $profile);
        }
        if($request->hasfile('cv')){
            $Extension_profile = $request->file('cv')->getClientOriginalExtension();
            $cv = 'cv'.'_'.date('YmdHis').'.'.$Extension_profile;
            $request->file('cv')->move('images/applicant/cv/', $cv);
        }

        $newUser=Applicant::where('email',$request->email)->first();
        if(!$newUser){
          $newUser=Applicant::create([
            'name' => $request->name,
            'fname' => $request->fname?$request->fname:'',
            'email' => $request->email,
            'phone' => $request->phone,
            'father_profession'=>$request->father_profession,
            'martial_status'=>$request->martial_status,
            'hus_name'=>$request->hus_name,
            'kids'=>$request->kids,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'experience'=>$request->experience,
            'cnic'=>$request->cnic,
            'mobile'=>$request->mobile,
            'residence'=>$request->residence,
            'qualification'=>$request->qualified,
            

            'dob'=>date("Y-m-d", strtotime($request->dob)),
            'spouse_prof'=>$request->spouse_prof,
            'images'=>isset($profile)?$profile:'no-image.png',
            'cv'=>isset($cv)?$cv:null,
            'status'=>0,
            'password' => Hash::make(Str::random(6)),
            'nationality'=>$request->country_id,

            'nationality'=>$request->country_id,

            'subject_preference1'=>isset($request->subjectsIds[0])?$request->subjectsIds[0]:null,
            'subject_preference2'=>isset($request->subjectsIds[1])?$request->subjectsIds[1]:null,
            'subject_preference3'=>isset($request->subjectsIds[2])?$request->subjectsIds[2]:null,

            'branch_preference1'=>isset($request->branchids[0])?$request->branchids[0]:null,
            'branch_preference2'=>isset($request->branchids[1])?$request->branchids[1]:null,
            'branch_preference3'=>isset($request->branchids[2])?$request->branchids[2]:null,


          ]);
        }
        

            $emails = [$request->email];
              if($emails){
                  Mail::send('emails.wellcome', ['data'=>$emails], function($message) use ($emails)
              {    
                  $message->to($emails)->subject('Welcome To American Lyceum Group Of School');    
              });
            }
            
     
        if($newUser){
            $UserDegree = array();
            if(isset($request->marks) && !empty($request->marks)){
              UserDegree::where('user_id',$newUser->id)->delete();
                for($i=0; $i<count($request->marks);$i++) {
                    /////////////////////////////////
                    /////////////////////////////                    
                    if(isset($request->file('degreeFile')[$i]) && !empty($request->file('degreeFile')[$i]) ){
                        $Extension_profile = $request->file('degreeFile')[$i]->getClientOriginalExtension();
                        $degree_images = $newUser->name.'_'.rand(0,100000).date('YmHmis').'.'.$Extension_profile;
                        $request->file("degreeFile")[$i]->move('images/applicant/degree_images/', $degree_images);
                    }
                    $tmp_dest = array();
                    $tmp_dest['marks']=isset($request->marks[$i])?$request->marks[$i]:null;
                    $tmp_dest['degree']=isset($request->degree[$i])?$request->degree[$i]:null;
                    $tmp_dest['institude']=isset($request->institude[$i])?$request->institude[$i]:null;
                    $tmp_dest['duration']=isset($request->duration[$i])?$request->duration[$i]:null;
                    $tmp_dest['passing_date']=isset($request->passing_date[$i])?date("Y-m-d", strtotime($request->passing_date[$i])):null;
                    $tmp_dest['degree_images']=isset($degree_images)?$degree_images:null;

                    $tmp_dest['qualification']=isset($request->qualification[$i])?$request->qualification[$i]:null;
                   $tmp_dest['user_id']=$newUser->id;
                   $tmp_dest['created_at']=now();
                   $tmp_dest['updated_at']=now();
                   $UserDegree[] = $tmp_dest;
                }
            }

            $degreeInserted = UserDegree::insert($UserDegree);
            if($degreeInserted){
              UserExperience::where('user_id',$newUser->id)->delete();
                $UserExperience = array();
                if(isset($request->org) && !empty($request->org)){
                    for($i=0; $i<count($request->org);$i++) {
                        $tmp_dest = array();
                        $tmp_dest['org']=isset($request->org[$i])?$request->org[$i]:null;
                        $tmp_dest['job_start']=isset($request->job_start[$i])?$request->job_start[$i]:null;
                        $tmp_dest['job_end']=isset($request->job_end[$i])?$request->job_end[$i]:null;
                        $tmp_dest['leave_of_reason']=isset($request->leave_of_reason[$i])?$request->leave_of_reason[$i]:null;
        
                       $tmp_dest['user_id']=$newUser->id;
                       $tmp_dest['last_salary']=isset($request->last_slary[$i])?$request->last_slary[$i]:null;
                       $tmp_dest['created_at']=now();
                       $tmp_dest['updated_at']=now();
                       $UserExperience[] = $tmp_dest;
                    }
                }
                $exp = UserExperience::insert($UserExperience);
                if($exp){
                    $application=Application::create([
                        'user_id' => $newUser->id,
                        'job_preference1'=>isset($request->jobIds[0])?$request->jobIds[0]:null,
                        'job_preference2'=>isset($request->jobIds[1])?$request->jobIds[1]:null,
                        'job_preference3'=>isset($request->jobIds[2])?$request->jobIds[2]:null,
                    ]);
                    if($application){

                        DB::commit();
                        emailVerifictionCode($newUser->email);
                        session()->flash('warning_message', __('Please Check Your Email Account!'));
                        return redirect()->route('email_verification',$newUser->email);
                    }else{
                        DB::rollBack();
                        session()->flash('error_message', __('Failed! To Insert Record'));
                    }
                }else{
                    DB::rollBack();
                    session()->flash('error_message', __('Failed! To Insert Record'));
                }
            }else{
                DB::rollBack();
                session()->flash('error_message', __('Failed! To Insert Record'));
            }
        }else{
            DB::rollBack();
            session()->flash('error_message', __('Failed! To Insert Record'));
        }
        return redirect()->back();
    
    }


    public function emailVerificationCode(Request $request){
       
        $emailCode=implode('', $request->code);
        $record= $email=\App\Models\EmailVerification::where('email',$request->email)->where('code',$emailCode)->first();
        if($record){
            $newUser=Applicant::where('email',$request->email)->first();
            Applicant::where('email',$request->email)->update(['email_verified_at'=>now()]);
            session()->flash('success_message', __('Your Account Verified Successfully'));
        }else{
            session()->flash('error_message', __('Please Enter The Correct Code'));
        }
         return redirect()->route('job_application');
    }
    public function phoneVerifictionCode(Request $request){
        if($request->phone){
            $phone=preg_replace('/[^a-zA-Z0-9_ -]/s','',$request->phone);
            $str = ltrim($phone, '0');
            $vear= ('92'.''.$str);

            $record=phoneVerifictionCode($vear);
            return $record;
            return json()->response(['status'=>1,'message'=>'Email send successfully']);
        }else{
            return json()->response(['status'=>0,'message'=>'phone field is required']);
        }
    }
    public function againEmailCode($mail){
         $record=emailVerifictionCode($mail);
        if($record){
            session()->flash('success_message', __('Please Check Your Email Account.'));
        }else{
            session()->flash('error_message', __('Failed! To Send Email'));
        }
         return redirect()->back();
    }


    public function email_verification($id){
        $applicant=Applicant::where('email',$id)->first();
        return view('web.job.email_verification',compact('applicant'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
