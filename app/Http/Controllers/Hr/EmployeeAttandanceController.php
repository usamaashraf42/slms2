<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeDate;
use App\Models\EmployeeAttendance;
use App\Models\User;
use App\Models\Branch;
use App\Models\Employee;

use Session;
use Auth;
class EmployeeAttandanceController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Employee Attandance Record', ['only' => ['index','store']]);
        $this->middleware('role_or_permission:Employee Attandance Add', ['only' => ['attandance_mark','empoyee_attandance_mark']]);
        $this->middleware('role_or_permission:Employee Attandance Edit', ['only' => ['edit','update']]);

    }

    public function index(){
    	
    	$branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        $branches=$branch->get();



    	return View('admin.Hr.attandance.index',compact('branches'));
    }


    public function create(){
    	$branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
        $branches=$branch->get();
    	return View('admin.Hr.attandance.create',compact('branches'));
    }


    public function employee($id){
    	
    }


    public function show($id){
   
        $user=Employee::where('emp_id',$id)->first();
        if(!$user){
            return redirect()->back();
        }

        return view('admin.Hr.attandance.show',compact('user'));

    }

    public function store(Request $request){
    	
        $employee =Employee::orderBy("emp_id",'ASC')->where('status',1);

    	if($request->branch_id){
             $employee->where('branch_id',$request->branch_id);
        }
        if(Auth::user()->branch_id){
            $employee->where('branch_id',Auth::user()->branch_id);
        }
        if($request->emp_id){
            $employee->where('emp_id',$request->emp_id);
        }
        
        $users=$employee->get();
        $month= $request->month;
        $year=$request->year;

        $branches=Branch::find($request->branch_id);
// dd($users);
        // $emp_dates=EmployeeAttendance::where('emp_id',$employees)->where('attendance_date',$request->month)->where('year',$request->year)->get();
        $month_days = cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year); // 31
        return View('admin.Hr.attandance.Employee_index',compact('branches','month_days','month','year','users'));
    	  // `attendance_date`, `working_hour`, `leave_id`, `in_time`, `out_time`,
    }



    public function empoyee_attandance_mark(Request $request){
        $month_days = cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year); // 31
        $user=Employee::where('emp_id',$request->emp_id)->first();
        if(!$user){
            session()->flash('error_message', __('Record not found'));
            return redirect()->back();
        }
        $month= $request->month;
        $year=$request->year;
        return view('admin.Hr.attandance.show',compact('user','month_days','month','year'));

    }



    public function attandance_mark(Request $request){
        // dd($request->all());
         $month= $request->month;
        $year=$request->year;
        $month_days = cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year); 

        for($i=1; $i<=$month_days; $i++){
            $date="$year".'-'."$month".'-'."$i";
            if(isset($request['punch_in_'.''.$date]) && $request['punch_in_'.''.$date]){
                $stDate=EmployeeDate::where('emp_id',$request->emp_id)->where('attendance_date',$date)->first();

                if(!$stDate){
                    $stDate=EmployeeDate::create(['emp_id'=>$request->emp_id,'attendance_date'=>$date,'present'=>1]);
                }
                if($stDate){
                    EmployeeAttendance::where('date_id',$stDate->id)->where('emp_id',$request->emp_id)->delete();
                    $attandance=EmployeeAttendance::create(['date_id'=>$stDate->id,'emp_id'=>$request->emp_id,'stamp'=>date("Y-m-d H:i:s", strtotime($date.' '.$request['punch_in_'.''.$date]))]);
                }


            }
            if(isset($request['punch_out_'.''.$date]) && $request['punch_out_'.''.$date]){
                $stDate=EmployeeDate::where('emp_id',$request->emp_id)->where('attendance_date',$date)->first();

                if(!$stDate){
                    $stDate=EmployeeDate::create(['emp_id'=>$request->emp_id,'attendance_date'=>$date,'present'=>1,]);
                }
                if($stDate){
                    $attandance=EmployeeAttendance::create(['date_id'=>$stDate->id,'emp_id'=>$request->emp_id,'stamp'=>date("Y-m-d H:i:s", strtotime($date.' '.$request['punch_out_'.''.$date]))]);
                }
            }
            if(isset($request['holiday_'.''.$date]) && $request['holiday_'.''.$date]){
                $stDate=EmployeeDate::where('emp_id',$request->emp_id)->where('attendance_date',$date)->first();

                if(!$stDate){
                    $stDate=EmployeeDate::create(['emp_id'=>$request->emp_id,'attendance_date'=>$date,'holiday_id'=>$request['holiday_'.''.$date] ]);
                }
                EmployeeAttendance::where('date_id',$stDate->id)->where('emp_id',$request->emp_id)->delete();
                
            }
            if(isset($request['leave_'.''.$date]) && $request['leave_'.''.$date]){
                $stDate=EmployeeDate::where('emp_id',$request->emp_id)->where('attendance_date',$date)->first();

                if(!$stDate){
                    $stDate=EmployeeDate::create(['emp_id'=>$request->emp_id,'attendance_date'=>$date,'leave_id'=>$request['leave_'.''.$date] ]);
                }

                EmployeeAttendance::where('date_id',$stDate->id)->where('emp_id',$request->emp_id)->delete();
                
            }
            
                
        }

        session()->flash('success_message', __('Record Inserted successfully'));
        return redirect()->route('employee-attandance.index');

    }
}
