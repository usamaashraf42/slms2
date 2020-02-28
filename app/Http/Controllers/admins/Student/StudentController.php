<?php

namespace App\Http\Controllers\admins\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\AcademicSession;
use App\Models\StudentCategory;
use App\Models\BranchCourse;
use App\Models\StudentFeeStructure;
use App\Models\Student;
use App\Models\Account;
use App\Models\StudentParent;
use App\Models\Branch;
use \Carbon\Carbon;
use App\Models\FeePost;
use App\Models\Master;
use Illuminate\Support\Str;

use Auth;
use DB;
class StudentController extends Controller
{
	function __construct()
    {
        $this->middleware('role_or_permission:Student Record', ['only' => ['index']]);
        $this->middleware('role_or_permission:Student Edit', ['only' => ['edit','update']]);


    }

    public function index(){
    	$record=Student::orderBy('id','DESC')->where('status',1);

        if(Auth::user()->branch_id){
            $record->where('branch_id',Auth::user()->branch_id);
        }else{

            // dd(Carbon::now()->subDays(30));
            $record->whereDate('created_at','>', Carbon::now()->subDays(30))->limit(100);
        }
        $students=$record->get();

        return view('admin.student.student.index',compact('students'));
    }


    public function edit($id){
    	
    	$sessions=AcademicSession::where('status',1)->get();
        $courses=Course::where('parentId',0)->get();
        $category=StudentCategory::where('status',1)->get();
        $branch=Branch::where('status',1);

         if(Auth::user()->branch_id){
            $branch->where('id',Auth::user()->branch_id);
        }
         if(Auth::user()->s_countryCode){
            $branch->where('b_countryCode',Auth::user()->s_countryCode);
        }
        $branches=$branch->get();
        // return view('admin.student.register.create',compact('sessions','category','courses','branches'));

        $student=Student::find($id);
        if(!$student){
         session()->flash('error_message', __('Failed! To Insert Record'));
         return redirect()->back();
     }

     return view('admin.student.student.edit',compact('student','sessions','category','courses','branches'));
 }

 public function SearchAjax(Request $request){

        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = Student::with('course')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);


        if(Auth::user()->branch_id){
            $records->where('branch_id',Auth::user()->branch_id);
        }
        $students=$record->get();

        if(!empty($search)){

            $records->where('name', 'like', "%{$search}%")
                ->orWhere('code','like',"%{$search}%")
                ->orWhere('status','like',"%{$search}%");

        }
        $data = $records->get();
        // return $data;
        $totalFiltered = Branch::count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);
    }

 public function update(Request $request, $id){

    


    $student=Student::find($id);

    if(!$student){
       session()->flash('error_message', __('Failed! To Insert Record'));
       return redirect()->back();
   }
   if($request->hasfile('images')){
        $Extension_profile = $request->file('images')->getClientOriginalExtension();
        $profile = $request->s_name.'_'.date('YmdHis').'.'.$Extension_profile;
        $request->file('images')->move('images/student/pics/', $profile);
    }
    DB::beginTransaction();
        $medical_documents=null;

        $newUser=[
            's_name' => $request->s_name?$request->s_name:$student->s_name,
            'branch_id' => $request->branch_id?$request->branch_id:$student->branch_id,
            's_fatherName' => $request->s_fatherName?$request->s_fatherName:$student->s_fatherName,
            's_DOB' => $request->s_DOB?date("Y-m-d", strtotime($request->s_DOB)):$student->s_DOB,
            'country_id' => $request->country_id?$request->country_id:$student->country_id,
            's_sex'=>$request->s_sex?$request->s_sex:$student->s_sex,
            'images'=>isset($profile)?$profile:$student->images,
            'father_cnic' => $request->father_cnic?$request->father_cnic:$student->father_cnic,
            'father_occuption' => $request->father_occuption?$request->father_occuption:$student->father_occuption,
            'religion' => $request->religion?$request->religion:$student->religion,
            'home_address'=>$request->home_address?$request->home_address:$student->home_address,
            'office_address'=>$request->office_address?$request->office_address:$student->office_address,
            'father_mobile'=>$request->father_mobile?$request->father_mobile:$student->father_mobile,
            'mother_mobile'=>$request->mother_mobile?$request->mother_mobile:$student->mother_mobile,
            'home_telephone'=>$request->home_telephone?$request->home_telephone:$student->home_telephone,
            'office_telephone'=>$request->office_telephone?$request->office_telephone:$student->office_telephone,
            'emergency_mobile'=>$request->emergency_mobile?$request->emergency_mobile:$student->emergency_mobile,
            'std_mail'=>$request->std_mail?$request->std_mail:$student->std_mail,


            'course_id'=>$request->course_id?$request->course_id:$student->course_id,
            's_section'=>$request->section_id?$request->section_id:$student->s_section,
            'section_id'=>$request->section_id?$request->section_id:$student->section_id, 
            'adm_package_id'=>$request->adm_package_id?$request->adm_package_id:$student->adm_package_id,
            'academic_session_id'=>$student->academic_session_id?$request->academic_session_id:$student->academic_session_id,
            's_phoneNo'=>$request->emergency_mobile?$request->emergency_mobile:$student->emergency_mobile, 
            'admission_date'=>$request->admission_date?$request->admission_date:$student->admission_date,
            'session'=>$request->session?$request->session:$student->session, 
            'nationality'=>$request->nationality?$request->nationality:$student->nationality,
            'is_active'=>$request->is_active?$request->is_active:$student->is_active, 
            'is_freeze'=>$request->is_freeze?$request->is_freeze:$student->is_freeze, 
            'religion'=>$request->religion?$request->religion:$student->religion,
            'Hobbies'=>$request->Hobbies?$request->Hobbies:$student->Hobbies, 
            'DOReg'=>$request->DOReg?$request->DOReg:$student->DOReg, 

            'Admissionfee'=>$request->adm_fee?$request->adm_fee:$student->Admissionfee, 
            'RegistrationFee'=>$request->RegistrationFee?$request->RegistrationFee:$student->RegistrationFee, 
            'Securityfee'=>$request->sec_fee?$request->sec_fee:$student->Securityfee, 
            'firstpayment'=>$request->firstpayment?$request->firstpayment:$student->firstpayment, 
            'remainingamount'=>$request->remainingamount?$request->remainingamount:$student->remainingamount,
            'Scholarship'=>$request->Scholarship?$request->Scholarship:$student->Scholarship, 
            'insurance'=>$request->insurance?$request->insurance:$student->insurance, 
            'eye_sight'=>$request->eye_sight?$request->eye_sight:$student->eye_sight,
            'eye_disease'=>$request->eye_disease?$request->eye_disease:$student->eye_disease,
            'disease'=>$request->disease?$request->disease:$student->disease,
            'medical_caution'=>$request->medical_caution?$request->medical_caution:$student->medical_caution,
            'contagious_disease'=>$request->contagious_disease?$request->contagious_disease:$student->contagious_disease,
            'vecination'=>$request->vecination?$request->vecination:$student->vecination,
            'updated_by'=>Auth::user()->id,
        ];


        Student::where('id',$id)->update($newUser);

        if(isset($request->parent_name) && count($request->parent_name)){
            $parents=array();
            for($i=0; $i<count($request->parent_name); $i++){

                if(isset($request->parent_name)){
                    $temp=array();
                    $relation=isset($request->relation_type[$i])?$request->relation_type[$i]:null;
                    StudentParent::create([
                        'std_id'=>$id,
                        'name'=>isset($request->parent_name[$i])?$request->parent_name[$i]:null,
                        'phone'=>isset($request->parent_phone[$i])?$request->parent_phone[$i]:null,
                        'address'=>isset($request->parent_address[$i])?$request->parent_address[$i]:null,
                        'cnic'=>isset($request->parent_cnic[$i])?$request->parent_cnic[$i]:null,
                        'email'=>isset($request->parent_email[$i])?$request->parent_email[$i]:null,
                        'password'=>Str::random(6),
                    ]);

                }
            }
        }

        session()->flash('success_message', __('Record Inserted Successfully'));
        return redirect()->route('students.index');



}
public function UpdatefeePost($request, $std_id){

 $studentId=$std_id;

 $month=ltrim(date('m'),0);

 $year=date('Y');
 $response=0;

 $grade=Course::where('id',$std_id->s_classPresent)->first();

 $stdAccount=Account::where('std_id',$std_id->id)->orderBy('id','DESC')->first();

 $stdFee=StudentFeeStructure::where('std_id',$std_id->id)->orderBy('id','DESC')->first();

 DB::beginTransaction();
 $factor=$stdFee['m'.$request->month];
 $singleFee=isset($stdFee->Net_AnnualFee)?$stdFee->Net_AnnualFee/12:0;
 $current_fee=(isset($singleFee)?$singleFee:0)*(isset($factor)?$factor:1);

 $totalFee=((isset($request->insurance_of)?$request->insurance_of:0) + (isset($request->adm_fee)?$request->adm_fee:0) + (isset($request->sec_fee)?$request->sec_fee:0) + (isset($request->RegistrationFee)?$request->RegistrationFee:0)  +  $current_fee );

 $feeRecord['feeId']=0;
 $feeRecord['std_id']=$std_id->id;
 $feeRecord['fee_month']=$month;
 $feeRecord['fee_year']=$year;
 $feeRecord['fee_date']=date('Y-m-d');
 $feeRecord['fee_due_date1']=date('Y-m-d');
 $feeRecord['fee_due_date2']=date('Y-m-d');
 $feeRecord['current_fee']=(isset($singleFee)?$singleFee:0)*(isset($factor)?$factor:1);
 $feeRecord['comp_fee']=0;
 $feeRecord['labfee']=0;
 $feeRecord['libfee']=0;
 $feeRecord['examfee']=0;
 $feeRecord['statfee']=0;
 $feeRecord['accharge']=0;
 $feeRecord['fine_perday']=0;
 $feeRecord['fine']=0;
 $feeRecord['month_def']=0;
 $feeRecord['utility_fee']=0;
 $feeRecord['transport_fee']=0;
 $feeRecord['paid_date']=null;
 $feeRecord['paid_amount']=0;
 $feeRecord['isPaid']=0;
 $feeRecord['isdeffered']=0;
 $feeRecord['deffered_amount']=0;
 $feeRecord['deffered_reason']='';
 $feeRecord['lastmonth_deffered']=0;
 $feeRecord['deffered_NEXT_Month']=0;

 $feeRecord['registerationFee']=(isset($request->RegistrationFee)?$request->RegistrationFee:0);
 $feeRecord['admissionFee']=(isset($request->adm_fee)?$request->adm_fee:0);
 $feeRecord['secFee']=(isset($request->sec_fee)?$request->sec_fee:0);
 $feeRecord['transport_fee']=0;
 $feeRecord['insurance_of']=(isset($request->insurance_of)?$request->insurance_of:0);


 $feeRecord['iscorrection']=0;
 $feeRecord['corrected_amount']=0;
 $feeRecord['correction_reason']=0;
 $feeRecord['correction_approv']=0;
 $feeRecord['lastMonthCorrection']=0;
 $feeRecord['outstand_lastmonth']=(isset($stdAccount->a_balance)?$stdAccount->a_balance:0);
 $feeRecord['grand_totalPayThisMonth']=$totalFee;

 $feeRecord['misc1']=isset($request->misc1)?$request->misc1:0;
 $feeRecord['misc1_desc']=isset($request->misc1_desc)?$request->misc1_desc:'';
 $feeRecord['misc2']=isset($request->misc2)?$request->misc2:0;
 $feeRecord['misc2_desc']=isset($request->misc2_desc)?$request->misc2_desc:'';
 $feeRecord['total_fee']=$totalFee;
 $feeRecord['created_by']=Auth::user()->id;
 $feeRecord['updated_by']=Auth::user()->id;

 $feeEffected=FeePost::create($feeRecord);

 if($feeEffected){
    $student=Account::where('std_id',$std_id->id)->first();

    $ledger=[
        'fee_id'=>isset($feeEffected)?$feeEffected->id:null,
        'account_id'=>$student->id,
        'a_credit'=>0,
        'a_debit'=>round(isset($totalFee)?$totalFee:0),
        'balance'=>round($totalFee),
        'posting_date'=>date('Y-m-d'),
        'description'=>"Fee post of".' '.getMonthName($month).' '."$year",
        'month'=>$month,
        'year'=>$year,
    ];
    $st['a_debit']=$student->a_debit+$totalFee;
    $studentMaster=Master::create($ledger);

    if($studentMaster){
        $branch=Account::where('branch_id',$std_id->branch_id)->first();
        $master=Master::where('account_id',$std_id->id)->orderBy('id','DESC')->first();
        if(!$branch){
            $branch=Branch::find($request->branch_id);
            $account=Account::create([
                'name'=>$branch->branch_name, 
                'branch_id'=>$branch->id,
                'type'=>'Branch', 
            ]);
        }
        $ledger=[
            'fee_id'=>isset($feeEffected)?$feeEffected->id:null,
            'a_credit'=>round(isset($totalFee)?$totalFee:0),
            'a_debit'=>0,
            'balance'=>round(isset($master->balance)?$master->balance-$totalFee:(isset($master->balance)?$master->balance:0)),
            'posting_date'=>date('Y-m-d'),
            'description'=>"Fee post of".' '.getMonthName($month).' '."$year",
            'month'=>$request->month,
            'year'=>$request->year,
        ];
        $br['a_credit']=$branch->a_credit+$totalFee;
        $branchAccount=Master::create($ledger);
        if($branchAccount){
            DB::commit();
            $response=$feeEffected;
        }else{
            DB::rollBack();
            $response='0';
        }

    }else{
        DB::rollBack();
        $response='0';
    }
}else{

    DB::rollBack();
    $response='0';
}

return $response;
}
}
