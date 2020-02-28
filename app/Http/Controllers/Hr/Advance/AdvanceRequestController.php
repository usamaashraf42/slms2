<?php

namespace App\Http\Controllers\Hr\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiMessageController;
use App\Http\Requests\ApplicationStatusUpdateRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AdvanceRequestRequest;
use App\Models\AdvanceRequest;
use App\Models\AdvanceInstallment;
use App\Models\Employee;
use Session;
use Auth;
use DB;
class AdvanceRequestController extends Controller
{
	public function index()
	{
		$advances=AdvanceRequest::orderBy('branch_id','DESC')->orderBy('id','DESC')->where('user_id',Auth::user()->id)->get();
		return view('admin.Hr.advance.index',compact('advances'));
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
// `id`, `branch_id`, `emp_id`, `user_id`, `advance_amount`, `advance_request_date`, `reason`, `total_installment`, `approved_by`, `checque_no`, `adv_status`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`


    	try {
    		$allInputs = $request->all();
    		$id = $request->input('id');

    		$validation = Validator::make($allInputs, [
    			'reason'=>'required',
    			'advance_amount'=>'required',
    			'total_installment'=>'required'
    		]);
    		if ($validation->fails()) {
    			$response = (new ApiMessageController())->validatemessage($validation->errors()->first());
    		} else {
                $employee=Employee::where('user_id',Auth::user()->id)->first();
                if(!$employee){
                    $response = (new ApiMessageController())->failedresponse("Failed to Save Data");
                }
    			$adv=AdvanceRequest::create([
    				'user_id'=>Auth::user()->id,
                    'emp_id'=>isset($employee)?$employee->emp_id:null,
                    'branch_id'=>isset($employee)?$employee->branch_id:null,
    				'advance_amount'=>$request->advance_amount,
    				'advance_request_date'=>date('Y-m-d'),
    				'reason'=>$request->reason,
    				'total_installment'=>$request->total_installment,
    				'adv_status'=>1,
    				'created_by'=>Auth::user()->id,
    			]);
    			for($i=0; $i<$request->total_installment; $i++){
    				AdvanceInstallment::create([
    					'adv_id'=>$adv->id,
    					'installment_amount'=>isset($request->installment_amount[$i])?$request->installment_amount[$i]:0,
    					'month'=>isset($request->month[$i])?$request->month[$i]:null,
    					'year'=>isset($request->year[$i])?$request->year[$i]:null,
    				]);
    			}

    			if ($adv) {
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
