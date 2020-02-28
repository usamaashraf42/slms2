<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Account;
use Session;
use Auth;
class AjaxSecondCallController extends Controller
{
    public function bankHasAccount(Request $request){
    	// return dd($request->all());

    	$account=Account::where('bank_id',$request->bank_id)->get();

    	if(!count($account)){
    		$bank=Bank::find($request->bank_id);
            // return $bank;
    		if($bank){
    			$account[]=Account::create([
    				'type'=>'bank',
                    'bank_id'=>$request->bank_id,
    				'name'=>$bank->bank_name,
    				'c_balance'=>0,
    				'opening_balance'=>0,
    				'a_credit'=>0,
    				'a_debit'=>0,
    				'balance'=>0
    			]);
    		}
    	}
       
    	if(count($account)){
    		return response()->json(['status'=>1,'response'=>'Record found successfully','data'=>$account]);
    	}else{
    		return response()->json(['status'=>0,'response'=>'Record not found']);
    	}
    }

    public function bankHasChecque(Request $request){
        // return dd($request->all());

        $account=\App\Models\Checque::where('bank_id',$request->bank_id)->where('status',0)->get();

   
        if(count($account)){
            return response()->json(['status'=>1,'response'=>'Record found successfully','data'=>$account]);
        }else{
            return response()->json(['status'=>0,'response'=>'Record not found']);
        }
    }

    public function admissionPackageNulls(Request $request){
         $packages=\App\Models\AdmissionPackage::where('branch_id',$request->branch_id)->where('course_id',$request->course_id)->first();
         if(($packages)){
            return response()->json(['status'=>1,'data'=>$packages]);
         }else{
             $packages=\App\Models\AdmissionPackage::where('branch_id',null)->where('course_id',$request->course_id)->first();
             return response()->json(['status'=>1,'data'=>$packages]);
         }
    }

    public function get_issue_checque(Request $request){
        $Checques=\App\Models\Checque::with('bank','account','detail.IssueAccount')->where('status',1)->get();

        $accounts = \App\Models\Checque::with('bank','account','detail.IssueAccount')->where('status',1)->limit(20);
        $filter = $request->input('q');
        if(!empty($filter)){  
            $accounts->where('checque_no', 'like', "%{$filter}%")
            ->orWhere('cheque_book_issue_date', 'like', "%{$filter}%")
            ->orWhere('description', 'like', "%{$filter}%");
        }

        $data=$accounts->get();
        if($data){
            $status = true;
            return response()->json($data, 200);
        }
        else
        {
          return response()->json($data, 200);
      }


    }


     public function get_employee(Request $request){
// return $request->all();
        $accounts = \App\Models\Employee::where('status',1)->limit(20);
        if(Auth::user()->branch_id){
            $accounts->where('branch_id',Auth::user()->branch_id);
        }
        if(Auth::user()->school_id){
            $accounts->where('school_id',Auth::user()->school_id);
        }

        if($request->branch_id){
            $accounts->where('branch_id',$request->branch_id);
        }

        if($request->emp_id){
            $accounts->where('emp_id',$request->emp_id);
        }
        $filter = $request->input('q');
        if(!empty($filter)){  
            $accounts->where('name', 'like', "%{$filter}%")
             ->orWhere('fname', 'like', "%{$filter}%")
            ->orWhere('email', 'like', "%{$filter}%")
            ->orWhere('date_join', 'like', "%{$filter}%")
            ->orWhere('address', 'like', "%{$filter}%")
            ->orWhere('id_type', 'like', "%{$filter}%")
            ->orWhere('branch_id', 'like', "%{$filter}%")
            ->orWhere('emp_id', 'like', "%{$filter}%")
            ->orWhere('designation_Code', 'like', "%{$filter}%")
            ->orWhere('status', 'like', "%{$filter}%")
            ->orWhere('mobile', 'like', "%{$filter}%");
        }

        $data=$accounts->get();
        if($data){
            $status = true;
            return response()->json($data, 200);
        }
        else
        {
          return response()->json($data, 200);
      }


    }


    public function branchHasEmployee(Request $request){
        $users=\App\Models\Employee::where('status',1)->where('branch_id',$request->branch_id)->get();
        if(count($users)){
            return response()->json(['status'=>1,'data'=>$users]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }

    public function branchHasDepartment(Request $request){
         // $departments=EmployeeDepartment::get();
         //  $shifts=EmployeeShift::get();

        $users=\App\Models\BranchEmployeeDepartment::where('branch_id',$request->branch_id)->with('department')->get();
        if(count($users)){
            return response()->json(['status'=>1,'data'=>$users]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }

    public function departmentHasShift(Request $request){
        $users=\App\Models\EmployeeShift::where('status',1)->where('branch_id',$request->branch_id)->get();
        if(count($users)){
            return response()->json(['status'=>1,'data'=>$users]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }


    public function checqueDetail(Request $request){
        $accounts = \App\Models\Checque::with('bank','account','detail.IssueAccount')->where('checque_no',$request->checque_id)->first();
        if(($accounts)){
            return response()->json(['status'=>1,'data'=>$accounts]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }

    }


    public function branchHasClass(Request $request){

       $branch_id=$request->branch_id;
        $class=\App\Models\BranchCourse::select('course_id')->where("branch_id",$branch_id)->get();

        $tempArray=array();
        $cors=\App\Models\Course::orWhereIn('id',$class)->with('classes')->get();
        // dd($cors);
        foreach ($cors as  $values) {
            if(isset($values->classes)){
                $trueData=1;
                if(count($tempArray)){
                    foreach($tempArray as $tem){

                        if($values->classes->id == $tem->id){
                            $trueData=0;
                            break;
                        } 
                    }
                }
                if($trueData){
                    $tempArray[]=$values->classes;
                }

            }else{
                $trueData=1;
                foreach($tempArray as $tem){

                    if($values->id == $tem->id){
                        $trueData=0;
                        break;
                    }

                }
                if($trueData){
                    $tempArray[]=$values;
                }
            }
            
        }
        if(count($tempArray)){
            return response()->json(['status'=>1,'data'=>$tempArray]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }

    public function branchHasCourse(Request $request){

    }

    public function branchCourseHasCourse(Request $request){
        
    }


    public function readonlyBranchSetting(Request $request){
        $branch=\App\Models\Branch::with('userSetting')->find($request->branch_id);
        if(($branch->userSetting)){
            return response()->json(['status'=>1,'data'=>$branch->userSetting]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }


    public function branchHasSectionStudent(Request $request){
         $branch_id=$request->id;
        $class=\App\Models\BranchCourse::select('course_id')->where("branch_id",$branch_id)->get();

       
        $stds=\App\Models\Student::select('course_id')->orderBy('course_id','ASC')->where("branch_id",$branch_id)->where('status',1)->where('is_active',1)->get();
         $cors=\App\Models\Course::orWhereIn('id',$stds)->get();
        if(count($cors)){
            return response()->json(['status'=>1,'data'=>$cors]);
         }else{
            return response()->json(['status'=>0,'data'=>'Record not found']);
         }
    }
}
