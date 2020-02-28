<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequestLeave;
use App\Http\Controllers\ApiMessageController;

use Illuminate\Support\Facades\Validator;
use App\Models\EmployeeLeavesRequest;
use App\Models\EmployeeLeaves;
use Auth;
use Session;
use DB;
class EmployeeLeaveController extends Controller
{
    public function index(){
    	$emp_leaves=EmployeeLeavesRequest::where('emp_id',Auth::user()->id)->orderBy('id','DESC')->get();
    	$leaves=EmployeeLeaves::where('leave_status',1)->get();
    	$counter_leaves=EmployeeLeavesRequest::where('status',1)->groupBy('leave_id')->select('leave_id', DB::raw('count(*) as total_leaves'))->with('leave')->get();
// dd($counter_leaves);
    	return view('admin.Hr.employeeLeave.index',compact('emp_leaves','leaves','counter_leaves'));

    }
    public function store(EmployeeRequestLeave $request){

    	$emp_leaves=EmployeeLeavesRequest::create([
    		'emp_id'=>Auth::user()->id,
    		'leave_id'=>$request->leave_id,
            'leave_from'=>date('Y-m-d', strtotime($request->leave_from)),
            'leave_till'=>date('Y-m-d', strtotime($request->leave_till)),
            'status'=>1,
            'leave_status'=>1,
            'reason'=>$request->reason

    	]);
    	if($emp_leaves){
			session()->flash('success_message', __('Record Inserted Successfully'));
		}else{

			session()->flash('error_message', __('Failed! To Insert Record'));
		}
		return redirect()->back();


    }


    public function edit($id)
    {
        try {
        	$leaves=EmployeeLeaves::where('leave_status',1)->get();
            $data = EmployeeLeavesRequest::find($id);
            return view('admin.Hr.employeeLeave.edit',compact('data','leaves'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
    }


    public function update(Request $request, $id)
    {
// dd($request->all());
        $user = EmployeeLeavesRequest::find($id);
        if(!$user){
            Session::flash('error_message',  __('messages.not_found', ['name' => 'user']));
            return redirect()->back();
        }
       $emp_leaves=EmployeeLeavesRequest::where('id',$id)->update([
    		'emp_id'=>Auth::user()->id,
    		'leave_id'=>$request->leave_id,
            'leave_from'=>date('Y-m-d', strtotime($request->leave_from)),
            'leave_till'=>date('Y-m-d', strtotime($request->leave_till)),
            'status'=>1,
            'leave_status'=>1,
            'reason'=>$request->reason
    	]);
        if($emp_leaves){

            session()->flash('success_message', __('messages.success_curd', ['name' => 'user','action'=>'updated']));
        }
        else{
            session()->flash('error_message', __('messages.fail_curd', ['name' => 'user','action'=>'updated']));
        }

        return redirect()->route('leaves-requests.index');
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
    public function delete_leave_request(Request $request)
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
               
                $deleteItem =EmployeeLeavesRequest::where('id', $id)->update([
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

    public function updateHoliday(Request $request)
    {
        try {
                $updateItem = EmployeeLeavesRequest::where('id',$request->id)->update($request->except('_token','_method'));

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
