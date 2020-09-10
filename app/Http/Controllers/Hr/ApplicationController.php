<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\JobRequest;
use App\Http\Requests\ApplicationStatusUpdateRequest;
use App\Http\Requests\SelectedApplicantRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Job;
use App\Models\Branch;
use App\Models\JobBranch;
use App\Models\Application;
use App\Models\Applicant;
use App\Models\Interview;
use App\Models\ApplicationStatus;
use Ixudra\Curl\Facades\Curl;
use DB;
use Auth;
class ApplicationController extends Controller
{

   function __construct()
    {
         $this->middleware('role_or_permission:Job Application', ['only' => ['index']]);
         $this->middleware('role_or_permission:Interview Conduct', ['only' => ['selectedApplicant','updateStatus']]);
         
    }

  public function index()
  {

    // $apps=Application::where('id',539)->with('applicant.preferenceBranch1','applicant.preferenceBranch2','applicant.preferenceBranch3','applicant.preferenceSubject1')->whereHas('applicant')->join('applicants', 'applicants.id', '=', 'applications.user_id')->get();
// dd($apps);
    $branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        $branches=$branch->get();
    return view('admin.Hr.application.index',compact('branches'));
  }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $branches=Branch::where('status',1)->get();
      return view('admin.Hr.jobs.create',compact('branches'));
    }

    public function selectedApplicant(Request $request){

      $ids=$request->application_ids;
      if(isset($request->reject_ids) && !empty($request->reject_ids)){
        for($i=0; $i<count($request->reject_ids); $i++ ){
          if(isset($request->reject_ids[$i]) && !empty($request->reject_ids[$i])){
            $application=Application::find($request->reject_ids[$i]);
            $application->status=-1;
            $application->updated_by=Auth::user()->id;
            $application->save();

            $user=Applicant::find($application->user_id);
            $user->status=-1;
            $effected = $user->save();
          }

        }
      }
      

      if(isset($ids) && !empty($ids) && count($ids)){
        return view('admin.Hr.application.selectedApplicant',compact('ids'));
      }

      if(isset($effected) && !empty($effected)){
        session()->flash('success_message', __('Record effected Successfully'));
      }else{
        session()->flash('error_message', __('please check the checkbox for call interview or reject'));
      }
      return redirect()->back();


    }


    public function updateStatus(ApplicationStatusUpdateRequest $request){
// dd($request->all());
      $status=ApplicationStatus::find($request->statusId);
      $schedule="10:00";

 

      $application_ids=$request->application_ids;
      
      $start_date=$request->start_date; 
      $till_date=$request->till_date; 
      $start_time=$request->start_time; 
      $till_time=$request->till_time; 
      $country_id=$request->country_id; 
      $Venue=$request->Venue; 
      $contact_no=$request->contact_no; 
      $email_subject=$request->email_subject; 
      $email_body=str_replace("n", "",$request->email_body);
      $sms_body=$request->sms_body;
      $email_send=$request->email_send; 
      $address=$request->address;
      $duration=$request->duration;
      $scheduleDate = date('Y-m-d', strtotime("$start_date "));
      $schedule = date('Y-m-d H:i:s', strtotime("$scheduleDate $start_time"));

      for($i=0; $i<count($application_ids); $i++ ){
        $schedule=$this->schedule($start_date,$till_date,$start_time,$till_time,$schedule,$duration);

        if(!($schedule) || $schedule <= now()){
          session()->flash('error_message', __('Time Schedule is complete not further to shortlist'));
          return redirect()->back();
          break;
        }

        // dd($schedule);
        $application=Application::find($application_ids[$i]);
        $application->status=$request->statusId;
        $application->updated_by=Auth::user()->id;
        $application->save();


        $interview=Interview::create([
          'application_id'=>$application_ids[$i],
          'emp_id'=>$application->user_id,
          'description'=>"$status->name Schedule At $schedule",
          'schedule'=> $schedule,
          'created_by'=>Auth::user()->id,
          'updated_by'=>Auth::user()->id,
        ]);
        $interview=true;
        if($interview){

         
          // $message=strip_tags("$email_body");
         if(isset($application->applicant->phone) && !empty(isset($application->applicant->phone)) ){
          $name=$application->applicant->name;
          $message=strip_tags(" Dear $name"." <br> ".$sms_body."<br>"." Time: ".date('h:i: A', strtotime($schedule))."<br>"." Date: ".date('d F Y', strtotime($schedule))."<br>"." Venue: $Venue"."<br>"." Address: $address" ."<br>"." Regards: HR Manager"."<br>"." Contact No: $contact_no");

          if(isset($request->sms_send) && $request->sms_send){
            if(isset($application->applicant->phone)){
              (SendSms($application->applicant->phone,$message));
            }

          }
        }
        if(isset($application->applicant->email) && !empty(isset($application->applicant->email))){
          $name=$application->applicant->name;
          $message=("Dear $name"." <br> ".$email_body."Venue: $Venue"." <br> "."Address: $address"." <br> "."Time: ".date('h:i: A', strtotime($schedule))." <br>"."Date: ".date('d F Y', strtotime($schedule)) ." <br> "."Regards: HR Manager"." <br> "."Contact No: $contact_no");
          $emails = [$application->applicant->email];
          if(isset($request->email_send) && $request->email_send){

            try{
             Mail::send('emails.interviewCall', ['data'=>$message], function($message) use ($emails,$email_subject) 
              {    
                $message->to($emails)->subject($email_subject);    
              });
          }
          catch(\Exception $e){

          }

          
           
          }
        }


      }

    }

    if(isset($interview)){
      session()->flash('success_message', __('Interview Scheduled Successfully'));
    }else{
      session()->flash('error_message', __('Failed! To Send Email'));
    }
    return redirect()->route('short-list.index');

  }

  public function schedule($start_date,$till_date,$start_time,$till_time,$schedule,$duration){
      $start_date=date('Y-m-d', strtotime("$start_date"));
      $start_time=date('H:i:s', strtotime("$start_time"));
        $till_date=date('Y-m-d', strtotime("$till_date"));
      $till_time=date('H:i:s', strtotime("$till_time"));


    $finalDate = date('Y-m-d H:i:s', strtotime("$till_date $till_time"));
    $startDate = date('Y-m-d H:i:s', strtotime("$start_date $start_time"));
 // dd($startDate);
    $time = date("H:i:s",strtotime($startDate));
      $endTime = date('Y-m-d H:i:s',strtotime("+$duration minutes", strtotime($startDate)));
      return $schedule=(date('Y-m-d h:i:s', strtotime($endTime)));

    if($startDate <= $finalDate && $startDate >= $startDate){

      $time = date("H:i:s",strtotime($startDate));
      $endTime = date('Y-m-d H:i:s',strtotime("+$duration minutes", strtotime($startDate)));
      return $schedule=(date('Y-m-d h:i:s', strtotime($endTime)));

      // if($till_time >= $time){
      //   $endTime = date('Y-m-d H:i:s',strtotime("+10 minutes", strtotime($schedule)));
      //   // return $schedule=(date('Y-m-d h:i:s', strtotime($endTime)));
      // }else{
      //   $nextDay = strtotime("+1 day", strtotime($schedule));
      //   $finalDate = date('Y-m-d', strtotime($nextDay));
      //   $endTime = date('Y-m-d H:i:s', strtotime("$finalDate $start_time"));
      // }
      // if($endTime <= $finalDate){
      //   return $schedule=(date('Y-m-d h:i:s', strtotime($endTime)));
      // }else{
      //   return false;
      // }


    }else{
      return $finalDate;
    }


  }

  public function cvPreview($id){
    $application=Application::with('applicant')->find($id);
        // dd($application);
    if(isset($application->applicant) && empty($application->applicant)){
      session()->flash('error_message', __('Applicant not found'));
      return redirect()->back();
    }


    $path = "http://lyceumgroupofschools.com/images/applicant/cv/$application->applicant->cv";

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename='.$path);
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');

    echo readfile($path);
  }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
        $application=Application::where('id',$id)->with('applicant.preferenceBranch1','applicant.preferenceBranch2','applicant.preferenceBranch3','applicant.preferenceSubject3')->first();

        if(!$application){
            session()->flash('error_message', __('Record not found'));
            return redirect()->back();
        }

      return view('admin.Hr.application.show',compact('application'));
    }


    function rejectApp(Request $request){
      $app=Application::find($request->id);
      if(!$app){
          return response()->json(['status'=>0,'message'=>'record not found']);
      }
      $app->status=2;
      if($app->save()){
        return response()->json(['status'=>1,'message'=>'record update Successfully']);
      }else{
        return response()->json(['status'=>0,'message'=>'Failed to update record']);
      }
    }
    function shortlistApp(Request $request){
      $app=Application::find($request->id);
      if(!$app){
          return response()->json(['status'=>0,'message'=>'record not found']);
      }
      $app->status=8;
      if($app->save()){
        return response()->json(['status'=>1,'message'=>'record update Successfully']);
      }else{
        return response()->json(['status'=>0,'message'=>'Failed to update record']);
      }
    }


    



    public function NewApplications(Request $request){
        // return $request->all();
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $customSearch=$request->customSearch;
        $jobSearch=$request->job;
        $branch=$request->branch;
        $records = Application::where('status',0)->orderBy('id','DESC')->where('applications.status',0)->with('interview')->with('applicant.preferenceBranch1','applicant.preferenceBranch2','applicant.preferenceBranch3','applicant.preferenceSubject3','applicant')->whereHas('applicant')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);




        if(!empty($search)){
            $records->where('job_preference1', 'like', "%{$search}%")
                ->orWhere('job_preference2','like',"%{$search}%")
                ->orWhere('job_preference3','like',"%{$search}%");

            // $records->whereHas('applicant', function ($query) use ($search){
            //     $query->where('name', 'like', "%{$search}%")->orWhere('fname', 'like', "%{$search}%")->orWhere('phone', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
            // });

        }
         if($jobSearch){
           $records->whereIn('job_preference1' , $jobSearch)
                ->orWhereIn('job_preference2',$jobSearch)
                ->orWhereIn('job_preference3',$jobSearch);
        }
        
        if(Auth::user()->branch_id){
            $records->whereHas('applicant', function ($query) {
                $query->where('branch_preference1',Auth::user()->branch_id )->orWhere('branch_preference2',Auth::user()->branch_id)->orWhere('branch_preference3',Auth::user()->branch_id);
            });
        }
        if($branch){
          $records->whereHas('applicant', function ($query) use ($branch) {
          $query->whereIn('branch_preference1',$branch )->orWhereIn('branch_preference2',$branch)->orWhereIn('branch_preference3',$branch);
          });
        }
        
        // if($customSearch){
        //    $records->whereHas('applicant', function ($query) use ($customSearch){
        //         $query->where('name', 'like', "%{$customSearch}%")->orWhere('fname', 'like', "%{$customSearch}%")->orWhere('phone', 'like', "%{$customSearch}%")->orWhere('email', 'like', "%{$customSearch}%");
        //     });
        // }
        $data = $records->where('applications.status',0)->get();
        // return $data;
        $filter = Application::where('status',0)->where('applications.status',0);
        if(Auth::user()->branch_id){
            $filter->whereHas('applicant', function ($query) {
                $query->where('branch_preference1',Auth::user()->branch_id )->orWhere('branch_preference2',Auth::user()->branch_id)->orWhere('branch_preference3',Auth::user()->branch_id);
            });
        }
        if($branch){
          $filter->whereHas('applicant', function ($query) use ($branch) {
          $query->whereIn('branch_preference1',$branch )->orWhereIn('branch_preference2',$branch)->orWhereIn('branch_preference3',$branch);
          });
        }
        if($jobSearch){
           $filter->whereIn('job_preference1' , $jobSearch)
                ->orWhereIn('job_preference2',$jobSearch)
                ->orWhereIn('job_preference3',$jobSearch);
        }
        if($customSearch){
           $filter->whereHas('applicant', function ($query) use ($customSearch){
                $query->where('name', 'like', "%{$customSearch}%")->orWhere('fname', 'like', "%{$customSearch}%")->orWhere('phone', 'like', "%{$customSearch}%")->orWhere('email', 'like', "%{$customSearch}%");
            });
        }


        if(!empty($search)){

            $filter->where('job_preference1', 'like', "%{$search}%")
                ->orWhere('job_preference2','like',"%{$search}%")
                ->orWhere('job_preference3','like',"%{$search}%");

            $filter->whereHas('applicant', function ($query) use ($search){
                $query->where('name', 'like', "%{$search}%")->orWhere('fname', 'like', "%{$search}%")->orWhere('phone', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
            });
        }
        $totalFiltered=$filter->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);
    }

    public function shortListApplication(Request $request){
        // return $request->all();
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $customSearch=$request->customSearch;
        $jobSearch=$request->job;
        $branch=$request->branch;
        $records = Application::orderBy('id','DESC')->with('interview')->with('applicant.preferenceBranch1','applicant.preferenceBranch2','applicant.preferenceBranch3','applicant.preferenceSubject3','applicant')->whereHas('applicant')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);




        if(!empty($search)){
            $records->where('job_preference1', 'like', "%{$search}%")
                ->orWhere('job_preference2','like',"%{$search}%")
                ->orWhere('job_preference3','like',"%{$search}%");

            // $records->whereHas('applicant', function ($query) use ($search){
            //     $query->where('name', 'like', "%{$search}%")->orWhere('fname', 'like', "%{$search}%")->orWhere('phone', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
            // });

        }
         if($jobSearch){
           $records->whereIn('job_preference1' , $jobSearch)
                ->orWhereIn('job_preference2',$jobSearch)
                ->orWhereIn('job_preference3',$jobSearch);
        }
        
        if(Auth::user()->branch_id){
            $records->whereHas('applicant', function ($query) {
                $query->where('branch_preference1',Auth::user()->branch_id )->orWhere('branch_preference2',Auth::user()->branch_id)->orWhere('branch_preference3',Auth::user()->branch_id);
            });
        }
        if($branch){
          $records->whereHas('applicant', function ($query) use ($branch) {
          $query->whereIn('branch_preference1',$branch )->orWhereIn('branch_preference2',$branch)->orWhereIn('branch_preference3',$branch);
          });
        }
        
        // if($customSearch){
        //    $records->whereHas('applicant', function ($query) use ($customSearch){
        //         $query->where('name', 'like', "%{$customSearch}%")->orWhere('fname', 'like', "%{$customSearch}%")->orWhere('phone', 'like', "%{$customSearch}%")->orWhere('email', 'like', "%{$customSearch}%");
        //     });
        // }
        $data = $records->where('applications.status',8)->get();
        // return $data;
        $filter = Application::where('status',8);
        if(Auth::user()->branch_id){
            $filter->whereHas('applicant', function ($query) {
                $query->where('branch_preference1',Auth::user()->branch_id )->orWhere('branch_preference2',Auth::user()->branch_id)->orWhere('branch_preference3',Auth::user()->branch_id);
            });
        }
        if($branch){
          $filter->whereHas('applicant', function ($query) use ($branch) {
          $query->whereIn('branch_preference1',$branch )->orWhereIn('branch_preference2',$branch)->orWhereIn('branch_preference3',$branch);
          });
        }
        if($jobSearch){
           $filter->whereIn('job_preference1' , $jobSearch)
                ->orWhereIn('job_preference2',$jobSearch)
                ->orWhereIn('job_preference3',$jobSearch);
        }
        if($customSearch){
           $filter->whereHas('applicant', function ($query) use ($customSearch){
                $query->where('name', 'like', "%{$customSearch}%")->orWhere('fname', 'like', "%{$customSearch}%")->orWhere('phone', 'like', "%{$customSearch}%")->orWhere('email', 'like', "%{$customSearch}%");
            });
        }

        if(!empty($search)){

            $filter->where('job_preference1', 'like', "%{$search}%")
                ->orWhere('job_preference2','like',"%{$search}%")
                ->orWhere('job_preference3','like',"%{$search}%");

            $filter->whereHas('applicant', function ($query) use ($search){
                $query->where('name', 'like', "%{$search}%")->orWhere('fname', 'like', "%{$search}%")->orWhere('phone', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
            });
        }
        $totalFiltered=$filter->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);
    }

    public function interviewApplication(Request $request){
        // return $request->all();
        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $customSearch=$request->customSearch;
        $jobSearch=$request->job;
        $branch=$request->branch;
        $records = Application::orderBy('id','DESC')->where('applications.status',13)->with('interview')->with('applicant.preferenceBranch1','applicant.preferenceBranch2','applicant.preferenceBranch3','applicant.preferenceSubject3','applicant')->whereHas('applicant')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);




        if(!empty($search)){
            $records->where('job_preference1', 'like', "%{$search}%")
                ->orWhere('job_preference2','like',"%{$search}%")
                ->orWhere('job_preference3','like',"%{$search}%");

            // $records->whereHas('applicant', function ($query) use ($search){
            //     $query->where('name', 'like', "%{$search}%")->orWhere('fname', 'like', "%{$search}%")->orWhere('phone', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
            // });

        }
         if($jobSearch){
           $records->whereIn('job_preference1' , $jobSearch)
                ->orWhereIn('job_preference2',$jobSearch)
                ->orWhereIn('job_preference3',$jobSearch);
        }
        
        if(Auth::user()->branch_id){
            $records->whereHas('applicant', function ($query) {
                $query->where('branch_preference1',Auth::user()->branch_id )->orWhere('branch_preference2',Auth::user()->branch_id)->orWhere('branch_preference3',Auth::user()->branch_id);
            });
        }
        if($branch){
          $records->whereHas('applicant', function ($query) use ($branch) {
          $query->whereIn('branch_preference1',$branch )->orWhereIn('branch_preference2',$branch)->orWhereIn('branch_preference3',$branch);
          });
        }
        
        // if($customSearch){
        //    $records->whereHas('applicant', function ($query) use ($customSearch){
        //         $query->where('name', 'like', "%{$customSearch}%")->orWhere('fname', 'like', "%{$customSearch}%")->orWhere('phone', 'like', "%{$customSearch}%")->orWhere('email', 'like', "%{$customSearch}%");
        //     });
        // }
        $data = $records->get();
        // return $data;
        $filter = Application::where('status',13);
        if(Auth::user()->branch_id){
            $filter->whereHas('applicant', function ($query) {
                $query->where('branch_preference1',Auth::user()->branch_id )->orWhere('branch_preference2',Auth::user()->branch_id)->orWhere('branch_preference3',Auth::user()->branch_id);
            });
        }
        if($branch){
          $filter->whereHas('applicant', function ($query) use ($branch) {
          $query->whereIn('branch_preference1',$branch )->orWhereIn('branch_preference2',$branch)->orWhereIn('branch_preference3',$branch);
          });
        }
        if($jobSearch){
           $filter->whereIn('job_preference1' , $jobSearch)
                ->orWhereIn('job_preference2',$jobSearch)
                ->orWhereIn('job_preference3',$jobSearch);
        }
        if($customSearch){
           $filter->whereHas('applicant', function ($query) use ($customSearch){
                $query->where('name', 'like', "%{$customSearch}%")->orWhere('fname', 'like', "%{$customSearch}%")->orWhere('phone', 'like', "%{$customSearch}%")->orWhere('email', 'like', "%{$customSearch}%");
            });
        }


        if(!empty($search)){

            $filter->where('job_preference1', 'like', "%{$search}%")
                ->orWhere('job_preference2','like',"%{$search}%")
                ->orWhere('job_preference3','like',"%{$search}%");

            $filter->whereHas('applicant', function ($query) use ($search){
                $query->where('name', 'like', "%{$search}%")->orWhere('fname', 'like', "%{$search}%")->orWhere('phone', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
            });
        }
        $totalFiltered=$filter->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);
    }
    
    
  }
