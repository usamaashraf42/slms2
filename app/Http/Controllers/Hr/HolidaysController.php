<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HolidayRequest;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Validator;

use App\Models\EmployeeHoliday;
use Auth;

class HolidaysController extends Controller
{
	public function index(){
		$holidays=EmployeeHoliday::where('status',1)->whereYear('holiday_date',date('Y'))->get();
		return view('admin.Hr.holiday.index',compact('holidays'));
	}

	public function store(HolidayRequest $request){
    	
    	$date = str_replace('/', '-', $request->holiday_date);
		$holiday=EmployeeHoliday::create([
			'holiday_title'=>$request->holiday_title,
			'holiday_date'=>date('Y-m-d', strtotime($date)),
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

            $data = EmployeeHoliday::find($id);
            return view('admin.Hr.holiday.edit',compact('data'));
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
    public function deleteHoliday(Request $request)
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
               
                $deleteItem =EmployeeHoliday::where('id', $id)->update([
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
                $updateItem = EmployeeHoliday::where('id',$request->id)->update($request->except('_token','_method'));

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
