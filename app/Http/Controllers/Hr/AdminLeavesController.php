<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeLeavesRequest;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Validator;
use App\Models\EmployeeLeaves;
use App\Models\Employee;
use App\Models\EmployeeDate;
use Session;
use Auth;

class AdminLeavesController extends Controller
{
	public function index(){
		$pending_leave=EmployeeLeavesRequest::where('leave_from','<=',date('Y-m-d'))->where('leave_till','>=',date('Y-m-d'))->where('leave_status',1)->where('status',1)->get();
		$approval_leave=EmployeeLeavesRequest::where('leave_from','<=',date('Y-m-d'))->where('leave_till','>=',date('Y-m-d'))->where('leave_status','<>',1)->where('status',1)->get();
		$leaves=EmployeeLeavesRequest::orderBy('id','DESC')->get();
		$leavesType=EmployeeLeaves::where('leave_status',1)->get();
		$employees=Employee::where('status',1)->get();
		$presentEmployees=EmployeeDate::where('attendance_date',date('Y-m-d'))->where('in_time','!=',null)->get();
    	// dd($leaves);
		return view('admin.Hr.leaves.index',compact('pending_leave','approval_leave','leaves','leavesType','employees','presentEmployees'));
	}


	public function leaves_request_update(Request $request){

		try {
			$allInputs = $request->all();
			$id = $request->input('id');

			$validation = Validator::make($allInputs, [
				'id' => 'required'
			]);
			if ($validation->fails()) {
				$response = (new ApiMessageController())->validatemessage($validation->errors()->first());
			} else {
				// return $request->all();
				$deleteItem =EmployeeLeavesRequest::where('id', $id)->update([
					'status' => $request->leaves_status,
					'leave_status'=>$request->leaves_status,
					'approved_by'=>Auth::user()->id,

				]);


				$record=EmployeeLeavesRequest::where('id', $id)->first();
				$diff = strtotime($record->leave_till) - strtotime($record->leave_from); 

				if($request->leaves_status==0){
					$record=EmployeeLeavesRequest::where('id', $id)->first();
					$diff = strtotime($record->leave_till) - strtotime($record->leave_from); 
					$days= abs(round($diff / 86400));
					$employees=Employee::where('emp_id',$record->emp_id)->first();
					$fromDate=$record->leave_from;
					for($i=0; $i<=$days; $i++){
						

						$date=EmployeeDate::where('emp_id',$record->emp_id)->where('attendance_date',$fromDate)->first();
						if(!$date){
							EmployeeDate::create([
								'emp_id'=>$record->emp_id,
								'branch_id'=>isset($employees->branch_id)?$employees->branch_id:null,
								'attendance_date'=>$fromDate,
								'leave_id'=>$id,
								'created_by'=>Auth::user()->id,
								'updated_by'=>Auth::user()->id,

							]);
						}
						$fromDate = date('Y-m-d', strtotime($fromDate . ' +1 day'));
					}


				}

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
}
