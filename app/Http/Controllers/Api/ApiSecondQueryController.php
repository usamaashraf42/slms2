<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\FeePost;
use App\Models\Account;
use App\Models\Branch;
use App\Models\Master;
use App\Models\Student;
use App\Models\MasterDetail;
use App\Models\StudentDate;
use App\Models\StudentAttandance;
use App\Models\FeeCorrection;
use App\Models\AccountCategory;
use DB;
use Validator;
use File;
use Illuminate\Support\Facades\Log;

class ApiSecondQueryController extends Controller
{
    public function category_balance(){
    	$acc=AccountCategory::with('accounts')->get();
    	foreach ($acc as $cats) {
    		$dabit=0;
    		$credit=0;
    		$master['balance']=0;
    		$accounts=Account::where('cat_id',$cats->id)->with('LedgerBalance')->get();
    		foreach ($accounts as $ledgers) {
                
    			if(isset($ledgers->LedgerBalance->balance)){
    				$balance+=$ledgers->LedgerBalance->balance;
    			}
    			
    		}
    		AccountCategory::where('id',$cats->id)->update($master);


    	}

    	return 'true';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
    }


    public function attandance(Request $request){
        Log::info('attandance Request: '.json_encode($request->all()));
        date_default_timezone_set("Asia/Karachi");
        $code=preg_replace('~\D~', '', $request->code);
        $stdent=Student::find($code);
        
        if(isset($stdent) && $stdent){
            $stDate=StudentDate::where('std_id',$stdent->id)->where('attendance_date',date('Y-m-d'))->first();
            if(!$stDate){
                $stDate=StudentDate::create(['std_id'=>$stdent->id,'attendance_date'=>date('Y-m-d')]);
            }
            if($stDate){
                $attandance=StudentAttandance::create(['date_id'=>$stDate->id,'std_id'=>$stdent->id,'stamp'=>date('Y-m-d H:i:s')]);
                if($attandance){
                     return response()->json(['status'=>1,'message'=>'Your attandance mark successfully']);
                }else{
                    return response()->json(['status'=>0,'message'=>'Your code not accepted']);
                }
            }else{
                 return response()->json(['status'=>0,'message'=>'Your code not accepted']);
            }
           
        }else{
             return response()->json(['status'=>0,'message'=>'Your code not accepted']);
        }

    }


    public function attandanceBulk(Request $request){
        Log::info('attandance Request: '.json_encode($request->all()));
        $validate = Validator::make($request->all(),[
            'list' => 'required',
        ]);

        if($validate->fails()){
            $status = 0;
            $message = $validate->errors()->first();
            return response()->json(['status' => $status, 'message' => $message], 200);
        } else {
            $listed= json_decode($request->list);
            if(is_array($listed)){

                foreach($listed as $liste) {
                    // return $liste;
                    // return response()->json(['status'=>1,'message'=>'Your attandance mark successfully','data'=>$liste]);
                    $code=preg_replace('~\D~', '', $liste->std_id);
                    $stdent=Student::find($code);
                    if($stdent){
                        $stDate=StudentDate::where('std_id',$stdent->id)->where('attendance_date',date("Y-m-d", strtotime($liste->attandance)))->first();
                    }
                    
                    if(!$stDate){
                        $stDate=StudentDate::create(['std_id'=>$stdent->id,'attendance_date'=>date("Y-m-d", strtotime($liste->attandance))]);
                    }
                    if($stDate){
                        $attandance=StudentAttandance::create(['date_id'=>$stDate->id,'std_id'=>$stdent->id,'stamp'=>date("Y-m-d H:i:s", strtotime($liste->attandance)) ]);
                    }
                }

            }else{
                return response()->json(['status'=>0,'message'=>'Failed, list should be in array']);
            }
            
               
            

            return response()->json(['status'=>1,'message'=>'Your attandance mark successfully']);

        }
    }



    public function branchstudent(Request $request){
        $temparray=array();
        $students= Student::where('branch_id',1)->where('status',1)->where('is_active',1)->get();
        $index=1;
        foreach ($students as $std) {
            $data= new \stdClass();
            $data->id  =$std->id;
            $data->branch  =isset($std->Branchs->branch_name)?$std->Branchs->branch_name:'';
            $data->phone  =$std->emergency_mobile?$std->emergency_mobile:'';
            $data->name  =$std->s_name?$std->s_name:'';
            $data->father_name  =$std->s_fatherName?$std->s_fatherName:'';
            $data->class  =isset($std->course->course_name)?$std->course->course_name:'';
            $data->photo  ='http://lyceumgroupofschools.com/images/student/pics/'.''.(isset($std->images)?$std->images:'no-image.png');              
            $temparray[]=$data;
        }
        
        if(count($temparray)){
            return response()->json(['status'=>1,'message'=>'Your Record found successfully','data'=>$temparray]);
        }else{
            return response()->json(['status'=>0,'message'=>'Record not found']);
        }
    }


    public function deleteCourse(){
        $branches=\App\Models\Branch::get();
        foreach ($branches as  $value) {
           $courses=\App\Models\Course::get();
           foreach ($courses as $kCourse) {
                $branchesCourses=\App\Models\BranchCourse::where('branch_id',$value->id)->where('course_id',$kCourse->id)->get();

                for($i=1; $i<count($branchesCourses); $i++){
                    \App\Models\BranchCourse::where('id',$branchesCourses[$i]->id)->delete();
                }
               
           }
           
        }
        return 'true';
    }


    public function studentStructureChange(){
        $students=Student::select('id')->with('studentFee')->where('branch_id',10)->get();
        
        foreach ($students as $stds) {


            if($stds->studentFee){

                $stds->studentFee->m12=1;
                $stds->studentFee->save();

            }
        }


        return $students;

        
    }


    public function exam_add_section(){
        // return 'true';
        // $subjects=StudentSubjectExamMark::get();

        $stds=\App\Models\StudentExamMark::get();
        // return ($stds);
        foreach ($stds as $std) {
       

            $student=\App\Models\Student::where('id',$std->std_id)->first();
            if($student && $student->course_id){
               
                $std->update(['section_id'=>$student->course_id]);
            }
        }
        

        return $stds;
    }



    public function salarySheetRead(Request $request){
        if($request->hasFile('mis')){
            $sheedName=$request->mis->getClientOriginalName();
            $extension = File::extension($request->mis->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $path = $request->mis->getRealPath();
                $data = Excel::load($path, function($reader) {

                })->get();

                $headerRow = $data->first()->keys()->toArray();
// return $data;
                $ddCount=(count($data));
                $entry=$ddCount;
                // return $entry;
                // INSERT INTO `employee_salary_posts`(`id`, `employee_id`, `branch_id`, `month`, `year`, `current_salay`, `monthly_salary`, `insurance_deduction`, `total_insurance`, `total_insurance_install`, `pf`, `ta`, `medical`, `house_rent`, `transport`, `mobile`, `advance_deduction`, `total_leaves`, `prevBalance`, `carryForward`, `total_absent`, `total_days`, `total_present`, `latedays`, `Earlyoffdays`, `totaldeductdays`, `totalpaydays`, `misc1_des`, `misc1`, `misc2_desc`, `misc2`, `total_salary`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `carry_forward`, `adminCreditDays`, `tbPF`, `EOBI`, `summerSalary`, `actualSalaryGiven`, `paidFromBankid`, `chkCashed`, `dopost`, `isApproved`, `isUnapproved`, `approvalRemarks`, `approvalStatusUpdatedOn`, `advance`, `tax`, `security`, `total_holidays`)

                if(!empty($data) && $data->count()){
                    $excelData=$data;
                    $index=0;
                    foreach($data as $record){
                        foreach ($record as $kot) {
                            return $record[20];
                            $employeeData=\App\Models\Employee::find($kot->eid);
                            if($employeeData){
                                EmployeeSalaryPost::create([
                                    'employee_id'=>$kot->eid,
                                    'branch_id'=>$employeeData->branch_id,
                                    'month'=>4,
                                    'year'=>2018,
                                    'current_salay'=>$kot->total_salary,
                                    'ta'=>$kot['t.a'],
                                    'pf'=>$kot['p.f'],
                                    'total_salary'=>$kot->net_slary,
                                    'actualSalaryGiven'=>$kot->net_slary,
                                    'tbPF'=>$kot['t.bf._pf'],
                                    'medical'=>$kot->medical,
                                    'security'=>$kot->security,
                                    'tax'=>$kot->tax,
                                    'total_absent'=>$kot->absent,
                                    'total_leaves'=>$kot->leaves,
                                    'advance'=>$kot->advance,
                                    
                                    // 'EOBI'=>$kot->




                                ]);
                            }
                            


                        }
                    }
                }
            }
        }

        return $request->all();
    }
}
                            