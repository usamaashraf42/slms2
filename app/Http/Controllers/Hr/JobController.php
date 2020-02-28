<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Job;
use App\Models\Branch;
use App\Models\JobBranch;
use App\Models\Application;
use DB;
class JobController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Job Record', ['only' => ['index']]);
         $this->middleware('role_or_permission:Job-Add', ['only' => ['create','store']]);

         $this->middleware('role_or_permission:Job-Edit', ['only' => ['edit','update']]);
         $this->middleware('role_or_permission:Job-Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $jobs=Job::orderBy('id','DESC')->get();
        return view('admin.Hr.jobs.index',compact('jobs'));
    }


    public function applicants($id)
    {
       
        $applications=Application::orderBy('id','DESC')->where('job_id',$id)->with('user')->get();
        // dd($applications);
        return view('admin.Hr.jobs.applicants',compact('applications'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {

        if($request->hasfile('images')){
            $Extension_profile = $request->file('images')->getClientOriginalExtension();
            $profile = 'profile'.'_'.date('YmdHis').'.'.$Extension_profile;
            $request->file('images')->move('images/job/', $profile);
        }

        DB::beginTransaction();
        $job=Job::create([
            'title' => $request->title,
            'long_title' => $request->long_title?$request->long_title:'',
            'description' => $request->description?$request->description:' ',
            'posting_date' => date("Y-m-d", strtotime($request->posting_date)),
            'till_date'=>date("Y-m-d", strtotime($request->till_date)),
            'images'=>isset($profile)?$profile:'no-image.png',
        ]);
        foreach($request->branch_ids as $ids){
        	
        	JobBranch::insert([
        		'job_id'=>$job->id,
        		'branch_id'=>$ids
        	]);
        }
        if($job){

            DB::commit();

            // $verifyUser = VerifyUser::create([
            //  'user_id' => $newUser->id,
            //  'token' => sha1(time()),
            // ]);

            // Mail::to($newUser->email)->send(new VerifyMail($newUser));
            session()->flash('success_message', __('Record Inserted Successfully'));
        }else{
            DB::rollBack();
            session()->flash('error_message', __('Failed! To Insert Record'));

        }
        
        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        try {

            $data = Subject::find($id);
            return view('admin.subject.edit',compact('data'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        //
    }
    public function deleteCourse(Request $request)
    {
        try {
            $allInputs = $request->all();
            $id = $request->input('id');

            $validation = Validator::make($allInputs, [
                'id' => 'required'
            ]);
            if ($validation->fails()) {
                $response = (new ApiMessageController())->validatemessage($validation->errors()->first());
            } else {
               
                $deleteItem =Subject::where('id', $id)->update([
                    'status' => 0
                ]);

                if ($deleteItem) {
                    $response = (new ApiMessageController())->saveresponse("Data Deleted Successfully");
                } else {
                    $response = (new ApiMessageController())->failedresponse("Failed to delete Data");
                }
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }

        return $response;
    }

    public function updateCourse(SubjectRequest $request)
    {
        try {
                $updateItem = Subject::where('id',$request->id)->update($request->except('_token','_method'));

                if ($updateItem) {
                    $response = (new ApiMessageController())->saveresponse("Data Updated Successfully");
                } else {
                    $response = (new ApiMessageController())->failedresponse("Failed to update Data");
                }
        } catch (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }

        return $response;
    }
}
