<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\IncomeTaxRequest;
use App\Models\User;
use App\Models\IncomeTax;
use Session;
use Auth;
use DB;
class IncomeTaxController extends Controller
{
	public function index(){
		$taxs=IncomeTax::get();
		return view('admin.Hr.IncomeTax.index',compact('taxs'));
	}

	public function store(IncomeTaxRequest $request){
    	// dd($request->all());
		$holiday=IncomeTax::create([
			'annual_start_amount'=>$request->annual_start_amount,
			'annual_end_amount'=>$request->annual_end_amount,
			'after_amount_percentage'=>$request->after_amount_percentage,
			'fix_tax'=>$request->fix_tax,
			'per_tax'=>$request->per_tax
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

			$data = IncomeTax::find($id);
			return view('admin.Hr.IncomeTax.edit',compact('data'));
		} catch
		(\Illuminate\Database\QueryException $ex) {
			$response = (new ApiMessageController())->queryexception($ex);
		}
		return $response;
	}


	public function update(Request $request, $id){
		$data = IncomeTax::find($id);
		if(!$data){
			session()->flash('error_message', __('Record not found'));
			return redirect()->back();

		}
		$IncomeTax=IncomeTax::where('id',$id)->update([
			'annual_start_amount'=>$request->annual_start_amount?$request->annual_start_amount:$data->annual_start_amount,
			'annual_end_amount'=>$request->annual_end_amount?$request->annual_end_amount:$data->annual_end_amount,
			'after_amount_percentage'=>$request->after_amount_percentage?$request->after_amount_percentage:$data->after_amount_percentage,
			'fix_tax'=>$request->fix_tax?$request->fix_tax:$data->fix_tax,
			'per_tax'=>$request->per_tax?$request->per_tax:$data->per_tax
		]);
		if($IncomeTax){
			session()->flash('success_message', __('Record Inserted Successfully'));
		}else{

			session()->flash('error_message', __('Failed! To Insert Record'));
		}
		return redirect()->back();

	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $data = IncomeTax::find($id);
        if(!$data){
			session()->flash('error_message', __('Record not found'));
			return redirect()->back();

		}
		if($data->delete()){
			session()->flash('success_message', __('Record Inserted Successfully'));
		}else{

			session()->flash('error_message', __('Failed! To Insert Record'));
		}
		return redirect()->back();

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

    			$deleteItem =IncomeTax::where('id', $id)->update([
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
    		$updateItem = IncomeTax::where('id',$request->id)->update($request->except('_token','_method'));

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
