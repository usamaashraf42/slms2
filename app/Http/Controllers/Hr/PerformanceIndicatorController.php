<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PerformanceIndicatorRequest;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Validator;

use App\Models\PerformanceIndicator;
use Auth;
use Session;
use DB;
class PerformanceIndicatorController extends Controller
{
    public function index(){
    	$performances=PerformanceIndicator::where('status',1)->orderBy('id','DESC')->get();
// dd($performances);
    	return view('admin.Hr.Performance.PerformanceIndicator.index',compact('performances'));

    }
    public function store(PerformanceIndicatorRequest $request){
// dd($request->all());
    	$performances=PerformanceIndicator::create([
    		'indicator_name'=>$request->indicator_name,
    		'indicator_total_marks'=>$request->indicator_total_marks,
    		'created_by'=>Auth::user()->id,
    		'updated_by'=>Auth::user()->id,
            'status'=>1,
    	]);


    	if($performances){
			session()->flash('success_message', __('Record Inserted Successfully'));
		}else{

			session()->flash('error_message', __('Failed! To Insert Record'));
		}
		return redirect()->back();


    }


    public function edit($id)
    {
        try {
            $data = PerformanceIndicator::find($id);
            return view('admin.Hr.Performance.PerformanceIndicator.edit',compact('data'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
    }


    public function update(Request $request, $id)
    {
        $performances = PerformanceIndicator::find($id);
        if(!$performances){
            Session::flash('error_message',  __('messages.not_found', ['name' => 'user']));
            return redirect()->back();
        }
       $emp_leaves=PerformanceIndicator::where('id',$id)->update([
    		'indicator_name'=>$request->indicator_name?$request->indicator_name:$performances->indicator_name,
    		'indicator_total_marks'=>$request->indicator_total_marks?$request->indicator_total_marks:$performances->indicator_total_marks,
    		'updated_by'=>Auth::user()->id,
            'status'=>1,
    	]);
        if($emp_leaves){

            session()->flash('success_message', __('messages.success_curd', ['name' => 'user','action'=>'updated']));
        }
        else{
            session()->flash('error_message', __('messages.fail_curd', ['name' => 'user','action'=>'updated']));
        }

        return redirect()->route('performance-indicator.index');
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
    public function delete__request(Request $request)
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
              	 $data=PerformanceIndicator::where('id', $id)->first();
              	 if(!$data){
              	 	$response = (new ApiMessageController())->validatemessage($validation->errors()->first());
              	 }

                $deleteItem =PerformanceIndicator::where('id', $id)->update([
                    'status' => $data->status?0:1
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
                $updateItem = PerformanceIndicator::where('id',$request->id)->update($request->except('_token','_method'));

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
