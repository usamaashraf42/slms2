<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ApplicationStatusRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Job;
use App\Models\Branch;
use App\Models\ApplicationStatus;
use App\Models\Application;
use Ixudra\Curl\Facades\Curl;
use DB;
class ApplicationStatusController extends Controller
{

    function __construct()
    {
         $this->middleware('role_or_permission:Application-status Record', ['only' => ['index']]);
         $this->middleware('role_or_permission:Application-status Create', ['only' => ['create','store']]);
         $this->middleware('role_or_permission:Application-status Edit', ['only' => ['edit','update']]);
         
    }

    public function index()
    {
        $applications=ApplicationStatus::orderBy('id','DESC')->get();
        return view('admin.Hr.jobStatus.index',compact('applications'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('admin.Hr.jobStatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationStatusRequest $request)
    {
    	// dd($request->all());
    	$status=ApplicationStatus::create($request->except('_token'));
        
        if($status){
            DB::commit();
            session()->flash('success_message', __('Record Inserted Successfully'));
        }else{
            DB::rollBack();
            session()->flash('error_message', __('Failed! To Insert Record'));

        }
        
        return redirect()->route('application-status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
            $data = ApplicationStatus::find($id);
            if(!$data){
            	session()->flash('error_message', __('Failed! To Insert Record'));
            	return redirect()->back();
            }
            return view('admin.Hr.jobStatus.edit',compact('data'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
       		$status = ApplicationStatus::where('id',$id)->update($request->except('_token','_method'));
            if($status){
	            DB::commit();
	            session()->flash('success_message', __('Record Inserted Successfully'));
	        }else{
	            DB::rollBack();
	            session()->flash('error_message', __('Failed! To Insert Record'));

	        }
	        
	        return redirect()->route('application-status.index');
    }
   
    public function destroy($id)
    {
        //
    }
    public function deleteApplicationStatus(Request $request)
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
               $item =ApplicationStatus::where('id', $id)->first();
                $deleteItem =ApplicationStatus::where('id', $id)->update([
                    'status' => $item->status==1?0:1
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
