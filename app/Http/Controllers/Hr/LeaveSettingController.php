<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeLeaveNameRequest;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Validator;

use App\Models\EmployeeLeaves;
use Auth;
class LeaveSettingController extends Controller
{
    public function index(){
		$leaves=EmployeeLeaves::where('leave_status',1)->get();
		return view('admin.Hr.leaveSetting.index',compact('leaves'));
	}

	public function store(EmployeeLeaveNameRequest $request){
    	
		$holiday=EmployeeLeaves::create([
			'leave_name'=>$request->leave_name,
			'deduction'=>$request->deduction,
			'leave_status'=>1,
			'created_by'=>Auth::user()->id,
			'updated_by'=>Auth::user()->id
		]);
		if($holiday){
			session()->flash('success_message', __('Record Inserted Successfully'));
		}else{

			session()->flash('error_message', __('Failed! To Insert Record'));
		}
		return redirect()->back();
	}

	 public function edit($id)
    {
        try {

            $data = EmployeeLeaves::find($id);
            return view('admin.Hr.leaveSetting.edit',compact('data'));
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
    public function deleteLeaveSetting(Request $request)
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
               $data = EmployeeLeaves::find($id);
                $deleteItem =EmployeeLeaves::where('id', $id)->update([
                    'leave_status' => $data->leave_status?0:1
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

    public function updateLeaveSetting(Request $request)
    {
        try {
                $updateItem = EmployeeLeaves::where('id',$request->id)->update($request->except('_token','_method'));

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
