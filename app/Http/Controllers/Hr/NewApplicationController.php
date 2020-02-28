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
class NewApplicationController extends Controller
{
   function __construct()
    {
         $this->middleware('role_or_permission:Job Application', ['only' => ['index']]);
         $this->middleware('role_or_permission:Interview Conduct', ['only' => ['selectedApplicant','updateStatus']]);
         
    }

  public function index()
  {

    $apps=Application::where('status',0)->orderBy('id','DESC')->get();
    return view('admin.Hr.NewApplication.index',compact('apps'));
  }
}
