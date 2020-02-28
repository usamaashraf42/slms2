<?php

namespace App\Http\Controllers\Hr\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use App\Http\Requests\ApplicationStatusUpdateRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AdvanceRequestRequest;
use App\Models\AdvanceRequest;
use App\Models\ApprovedAdvanceRequest;
use App\Models\ApprovedAdvanceInstallment;
use App\Models\AdvanceInstallment;
use App\Models\Employee;
use Session;
use Auth;
use DB;
class AdvanceApprovalController extends Controller
{
	public function index()
	{
		$advances=AdvanceRequest::orderBy('branch_id','DESC')->orderBy('id','DESC')->where('adv_status',1)->get();
		return view('admin.Hr.approvalAdvance.index',compact('advances'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// return ($request->all());

    	try {
    		$allInputs = $request->all();
    		$id = $request->input('id');

    		$validation = Validator::make($allInputs, [
    			'id'=>'required',
    			
    		]);
    		if ($validation->fails()) {
    			$response = (new ApiMessageController())->validatemessage($validation->errors()->first());
    		} else {
    			$advanceRequest=AdvanceRequest::find($request->id);
    			if(!$advanceRequest){
    				$response = (new ApiMessageController())->failedresponse("Failed to delete Data");
    			}
    			if($request->adv_status==0){
    				$approvedAdv=ApprovedAdvanceRequest::create([
    					'adv_id'=>$request->id,
    					'user_id'=>$advanceRequest->user_id,
    					'emp_id'=>isset($advanceRequest)?$advanceRequest->emp_id:null,
    					'branch_id'=>isset($advanceRequest)?$advanceRequest->branch_id:null,
    					'advance_amount'=>$advanceRequest->advance_amount,
    					'advance_request_date'=>$advanceRequest->advance_request_date,
    					'reason'=>$advanceRequest->reason,
    					'total_installment'=>$advanceRequest->total_installment,
    					'adv_status'=>1,
    					'created_by'=>$advanceRequest->created_by,
    				]);

    				foreach ($advanceRequest->installment as $insta) {
    					ApprovedAdvanceInstallment::create([
    						'app_adv_id'=>$approvedAdv->id,
    						'installment_amount'=>$insta->installment_amount,
    						'month'=>$insta->month,
    						'year'=>$insta->year
    					]);
    				}
    			}else{
    				$advanceRequest->adv_status=$request->adv_status;
    				$advanceRequest->save();
    			}
    			


    			if ($approvedAdv) {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
