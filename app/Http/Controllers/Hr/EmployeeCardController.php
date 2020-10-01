<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeCardRequest;
use App\Models\Branch;
use App\Models\Employee;
use Auth;
use Session;

class EmployeeCardController extends Controller
{
    public function index(){
    	$branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        $branches=$branch->get();
        return view('admin.Hr.EmployeeCard.create',compact('branches'));
    }


    public function store(Request $request){
        // dd($request->employee_id);
    	$records=Employee::where('status',1);

         if(isset($request->branch_id) && !empty($request->branch_id) && ($request->branch_id)>0){
              $records->where('branch_id',$request->branch_id);
        }
       

        if(isset($request->employee_id) && !empty($request->employee_id) && ($request->employee_id)>0){
              $records->whereIn('emp_id',$request->employee_id);
        }

        if(isset($request->emp_id) && !empty($request->emp_id) && ($request->emp_id)>0){
              $records->where('emp_id',$request->emp_id);
        }

        $record=$records->get();
        $from_date=$request->from_date;
        $valid_date=$request->valid_date;
        // dd($record);
        
        return view('admin.Hr.EmployeeCard.index' , compact('record','from_date','valid_date'));
    }
}
