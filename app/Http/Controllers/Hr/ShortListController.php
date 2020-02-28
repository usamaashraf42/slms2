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

use Auth;
use DB;
class ShortListController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Interview Record', ['only' => ['index']]);
         
    }
    public function index()
    {

        $applications=Application::orderBy('id','DESC')->whereHas('applicant')->where('status',8)->get();
        
        return view('admin.Hr.shortList.index',compact('applications'));
    }

}
