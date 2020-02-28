<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeePerformanceRequest;
use App\Http\Controllers\ApiMessageController;
use Illuminate\Support\Facades\Validator;
use App\Models\PerformanceIndicator;
use App\Models\EmployeePerformance;
use App\Models\User;
use App\Models\Employee;
use App\Models\Branch;
use Auth;
use Session;
use DB;
class PerformanceController extends Controller{

     function __construct()
    {

    }
   public function index(){
    	$performances=PerformanceIndicator::where('status',1)->orderBy('id','DESC')->get();
// dd($performances);
    	$users=User::where('status',1)->get();

        $branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }
        $branches=$branch->get();


    	return view('admin.Hr.Performance.EmployeePerformance.branch_eveluation',compact('performances','users','branches'));

    }

    public function branch_eveluation(Request $request){
       
            $employees=Employee::where('status',1)->where('branch_id',$request->branch_id)->get();
            $performances=PerformanceIndicator::where('status',1)->orderBy('id','ASC')->get();
            $month=$request->month;
            $year=$request->year;
            $branch_id=$request->branch_id;
            $branch=Branch::find($request->branch_id);



            return view('admin.Hr.Performance.EmployeePerformance.index',compact('performances','employees','branch_id','month','year','branch'));

    }


    public function emp_eveluation_modal(Request $request){
        // return $request->all();

            $employees=Employee::where('emp_id',$request->emp_id)->first();
            $emp_id=$request->emp_id;
            $performances=PerformanceIndicator::where('status',1)->orderBy('id','ASC')->get();
            $month=$request->month;
            $year=$request->year;
            $branch_id=$request->branch_id;
            $branch=Branch::find($request->branch_id);

        return view('admin.Hr.Performance.EmployeePerformance.emp_eveluation_modal',compact('performances','employees','branch_id','month','year','branch','emp_id'));
    }





    public function create(){
        // dd($month);
    	$performances=PerformanceIndicator::where('status',1)->get();
// dd($performances);
    	$users=User::where('status',1)->get();
    	return view('admin.Hr.Performance.EmployeePerformance.create',compact('performances','users'));
    }
    public function store(EmployeePerformanceRequest $request){


    	$performances=PerformanceIndicator::where('status',1)->get();
		foreach ($performances as $pro) {
            EmployeePerformance::where('emp_id',$request->employee_id)->where('month',$request->month)->where('year',$request->year)->where('indicator_id',$pro->id)->delete();
			$performancesAffected=EmployeePerformance::create([
	    		'emp_id'=>$request->employee_id,
	    		'indicator_id'=>$pro->id,
	    		'month'=>$request->month,
	    		'year'=>$request->year,
	    		'total_marks'=>$pro->indicator_total_marks,
	    		'marks'=>isset($request['performance_'.''.$pro->id])?$request['performance_'.''.$pro->id]:0,
	    		'remarks'=>$request->remarks,
	    		'created_by'=>Auth::user()->id,
	    		'updated_by'=>Auth::user()->id,
	            'given_by'=>Auth::user()->id,
	    	]);
		}
    	


    	if($performancesAffected){
            return response()->json(['status'=>1,'message'=>'record inserted Successfully']);
			// session()->flash('success_message', __('Record Inserted Successfully'));
		}else{
            return response()->json(['status'=>0,'message'=>'record inserted Successfully']);
			// session()->flash('error_message', __('Failed! To Insert Record'));
		}

        // return redirect()->route('performance.index');


    }


    public function edit($id)
    {
        try {
            $data = EmployeePerformance::find($id);
            return view('admin.Hr.Performance.EmployeePerformance.edit',compact('data'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
    }


    public function update(Request $request, $id)
    {
        $performances = EmployeePerformance::find($id);
        if(!$performances){
            Session::flash('error_message',  __('messages.not_found', ['name' => 'user']));
            return redirect()->back();
        }
       $emp_leaves=EmployeePerformance::where('id',$id)->update([
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
              	 $data=EmployeePerformance::where('id', $id)->first();
              	 if(!$data){
              	 	$response = (new ApiMessageController())->validatemessage($validation->errors()->first());
              	 }

                $deleteItem =EmployeePerformance::where('id', $id)->update([
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
                $updateItem = EmployeePerformance::where('id',$request->id)->update($request->except('_token','_method'));

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
