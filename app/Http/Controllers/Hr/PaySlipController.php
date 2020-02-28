<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryPost;
class PaySlipController extends Controller
{

	public function index(){
return view('admin.Hr.PaySlip.create');
	}
	public function store(Request $request){
// dd($request->all());

        $data=EmployeeSalaryPost::orderBy('id','DESC')->where('employee_id',$request->employee_id)->with('employee')->whereHas('employee')->where('month',$request->month)->where('year',$request->year)->first();
        if(!$data){
            session()->flash('error_message', __('Record not found'));
            return redirect()->back();
        }
        // dd($data);
        return view('admin.Hr.PaySlip.index',compact('data'));

	}
    public function show($id){
    	$data=EmployeeSalaryPost::orderBy('id','DESC')->where('employee_id',$id)->with('employee')->whereHas('employee')->first();
    	if(!$data){
            session()->flash('error_message', __('Record not found'));
            return redirect()->back();
    	}
        // dd($data);
    	return view('admin.Hr.PaySlip.index',compact('data'));

    }
}
