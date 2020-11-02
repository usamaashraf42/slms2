<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\JobRequest;
use App\Http\Requests\ApplicationStatusUpdateRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Job;
use App\Models\Branch;
use App\Models\JobBranch;
use App\Models\Application;
use App\Models\Applicant;
use App\Models\Interview;
use App\Models\MarksInterview;
use App\Models\ApplicationStatus;
use Illuminate\Support\Facades\Mail;
use Auth;
use DB;
class InterviewController extends Controller
{

    function __construct()
    {
       $this->middleware('role_or_permission:Interview Record', ['only' => ['index']]);
   }
   public function index()
   {
    $applications=Application::orderBy('id','DESC')->with('applicant.preferenceBranch1')->with('interview')->with('MarksInterview')->whereHas('interview')->whereHas('applicant')->where('status',13)->get();
        // dd($applications[0]);
    return view('admin.Hr.interview.index',compact('applications'));
}




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function RejectAfterInterview(Request $request){
        // return $request->all();

        $apps=Application::find($request->id);
        if(!$apps){
            return response()->json(['status'=>0,'response'=>'Record not found']);
        }
        $effected =Application::where('id',$request->id)->update(['status'=>4]);
        if(!$apps){
            return response()->json(['status'=>0,'response'=>'Record not found']);
        }
        return response()->json(['status'=>1,'response'=>'Record Effected Successfully']);

    }
    public function interviewMarks($id)
    {
        $interview_id=$id;
        if(!($interview_id)){
            session()->flash('error_message', __('Failed! Record not found'));
            return redirect()->back();
        }

        return view('admin.Hr.interview.interview_marks',compact('interview_id'));
    }

    public function markslist($id){
        $markslists=MarksInterview::where('application_id',$id)->get();
// dd(count($markslists));
        if(!(count($markslists))){
            session()->flash('error_message', __('Failed! Record not found'));
            return redirect()->back();
        }
        // dd($markslists);

        return view('admin.Hr.interview.markslist',compact('markslists'));
    }

    public function updateStatus(ApplicationStatusUpdateRequest $request){
        
        $status=ApplicationStatus::find($request->statusId);
        $schedule=$request->schedule;
        for($i=0; $i<count($request->application_ids); $i++ ){
            $application=Application::find($request->application_ids[$i]);
            $application->status=$request->statusId;
            $application->save();
            
            $endTime = strtotime("+15 minutes", strtotime($schedule));
            $schedule=(date('Y-m-d h:i:s', $endTime));
            $interview=Interview::create([
                'application_id'=>$request->application_ids[$i],
                'emp_id'=>$application->user_id,
                'description'=>"$status->name Schedule At $schedule",
                'schedule'=> $schedule
            ]);

        }

        if(isset($interview)){
            session()->flash('success_message', __('Please Check Your Email Account.'));
        }else{
            session()->flash('error_message', __('Failed! To Send Email'));
        }
        return redirect()->back();



        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        // dd($request->all());
        $interview=Interview::find($request->interview_id);
// dd($interview);
        $request->request->add([
            'created_by'=>Auth::id(),
            'updated_by'=>Auth::id(),
            'applicant_id'=>$interview->emp_id,
            'application_id'=>$interview->application_id,
            'description'=>$request->description?$request->description:''

        ]);
        $data1=$request->except('_token');

        $MarksInterview=MarksInterview::create($data1);
        if(isset($MarksInterview)){
            session()->flash('success_message', __('Marked Inserted Successfully'));
            return redirect()->route('interview.index');
        }else{
            session()->flash('error_message', __('Failed! to Inserted Marks'));
            return redirect()->back();
        }
        
        

    }


    public function selectedCandidateSmsEmail(Request $request){

        $ids=$request->application_ids;
        if( !($request->application_ids) ){
            session()->flash('error_message', __('Please Select Applications'));
            return redirect()->route('interview.index');
        }

        return view('admin.Hr.interview.emailSmsSend',compact('ids'));
    }

    public function sendSmsEmail(Request $request){
        // dd($request->all());
        $email_body=$request->email_body;
        $sms_body=$request->sms_body;
        $email_subject=$request->email_subject;

        $apps=Application::whereIn('id',$request->application_ids)->get();
        if(!count($apps) || !count($request->application_ids)){
            session()->flash('success_message', __('Please Select Applications'));
            return redirect()->route('interview.index');
        }

        foreach ($apps as $application) {
            if(isset($application->applicant->phone) && !empty(isset($application->applicant->phone)) ){
              $name=$application->applicant->name;
              $message=strip_tags("Dear $name"." <br> ".$sms_body);

                if(isset($request->sms_send) && $request->sms_send){
                    if(isset($application->applicant->phone)){
                        (SendSms($application->applicant->phone,$message));
                    }
                }
            }
            if(isset($application->applicant->email) && !empty(isset($application->applicant->email))){
                $name=$application->applicant->name;
                $message=("Dear $name"." <br> ".$email_body);
                $emails = [$application->applicant->email];
                if(isset($request->email_send) && $request->email_send){
                    Mail::send('emails.interviewCall', ['data'=>$message], function($message) use ($emails,$email_subject) {    
                        $message->to($emails)->subject($email_subject);    
                    });
                }
            }
        }

     
            session()->flash('success_message', __('Notification Send Successfully'));
            
        

        return redirect()->route('interview.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        // dd($id);

        return view('admin.Hr.application.show');
    }
    
}
