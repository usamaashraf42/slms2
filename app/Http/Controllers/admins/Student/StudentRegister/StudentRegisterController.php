<?php

namespace App\Http\Controllers\admins\Student\StudentRegister;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Http\Requests\RegisterationRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\AcademicSession;
use App\Models\StudentCategory;
use App\Models\BranchCourse;
use App\Models\StudentFeeStructure;
use App\Models\UpdateStudentFeeStructure;
use App\Models\Student;
use App\Models\Account;
use App\Models\StudentParent;
use App\Models\Branch;
use \Carbon\Carbon;
use App\Models\FeePost;
use App\Models\Master;

use DB;
use Auth;
class StudentRegisterController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Student Admission Record', ['only' => ['index']]);
        $this->middleware('role_or_permission:Student Addmission Add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Student Edit', ['only' => ['edit','update']]);

    }
    public function index()
    {

        $section=Course::where('parentId','<>',0)->with('classes')->get();
        $classes=Course::where('parentId',0)->get();

        $record=Student::orderBy('id','DESC')->where('status',1);
        if(Auth::user()->branch_id){
            $record->where('branch_id',Auth::user()->branch_id);
        }else{
            // dd(Carbon::now()->subDays(30));
            $record->whereDate('created_at','>', Carbon::now()->subDays(30))->limit(100);
        }
        $students=$record->get();
        // dd($record);
        return view('admin.student.student.index',compact('students'));
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(date("m Y",strtotime("-1 month",strtotime(date('Y-m-d')))));
// dd('hee');
     // dd(date("m Y",strtotime("+1 month",strtotime(date('Y-m-d')))));


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
        if(Auth::user()->school_id){
            $branch->where('school_id',Auth::user()->school_id);
        }

        $branches=$branch->get();


        // $courses=BranchCourse::with('course')->get();

        // $active_tab='personalInfo';

        return view('admin.student.register.create',compact('sessions','category','courses','branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterationRequest $request)
    {

       
        if($request->hasfile('images')){
            $Extension_profile = $request->file('images')->getClientOriginalExtension();
            $profile = $request->s_name.'_'.date('YmdHis').'.'.$Extension_profile;
            $request->file('images')->move('images/student/pics/', $profile);
        }
        DB::beginTransaction();
        $medical_documents=null;
        $emergency_mobile=$request->emergency_mobile_code.''.$request->emergency_mobile;

        
        $newUser=Student::create([
            's_name' => $request->s_name,
            'branch_id' => $request->branch_id,
            's_countryCode'=>$request->s_countryCode,
            's_fatherName' => $request->s_fatherName?$request->s_fatherName:'',
            's_DOB' => $request->s_DOB?date("Y-m-d", strtotime($request->s_DOB)):date("Y-m-d"),
            'country_id' => $request->country_id,
            's_sex'=>$request->s_sex,
            'images'=>isset($profile)?$profile:'no-image.png',
            'api_token'=> Str::random(60),
            'father_cnic' => $request->father_cnic,
            'father_occuption' => $request->father_occuption,
            'religion' => $request->religion,
            'home_address'=>isset($request->parent_address[0])?$request->parent_address[0]:null,
            'office_address'=>$request->office_address,
            'father_mobile'=>$request->father_mobile,
            'mother_mobile'=>$request->mother_mobile,
            'home_telephone'=>$request->home_telephone,
            'office_telephone'=>$request->office_telephone,
            'emergency_mobile'=>isset($request->parent_phone[0])?$request->parent_phone[0]:null,
            'std_mail'=>isset($request->parent_email[0])?$request->parent_email[0]:null,
            'branch_id'=>$request->branch_id?$request->branch_id:null,

            'cat_id'=>$request->cat_id?$request->cat_id:null,
            'id_type'=>$request->id_type?$request->id_type:null,
            'in_emergency'=>$request->in_emergency?$request->in_emergency:null,

            'course_id'=>$request->section_id?$request->section_id:null,
            's_section'=>$request->section_id?$request->section_id:null,
            'section_id'=>$request->section_id?$request->section_id:null, 
            'adm_package_id'=>$request->adm_package_id?$request->adm_package_id:null,
            'academic_session_id'=>null,
            's_phoneNo'=>isset($request->parent_phone[0])?$request->parent_phone[0]:null,
            'admission_date'=>date('Y-m-d'),
            'session'=>$request->session?$request->session:null, 
            'nationality'=>$request->nationality,
            'is_active'=>$request->is_active?$request->is_active:1, 
            'is_freeze'=>$request->is_freeze, 
            'freeze_till_date' => $request->freeze_till_date?date("Y-m-d", strtotime($request->freeze_till_date)):null,

            'religion'=>$request->religion?$request->religion:null,
            'Hobbies'=>$request->Hobbies?$request->Hobbies:null, 
            'DOReg'=>$request->DOReg?$request->DOReg:null, 
            'Admissionfee'=>$request->Admissionfee, 
            'RegistrationFee'=>$request->RegistrationFee, 
            'Securityfee'=>$request->Securityfee_X, 
            'firstpayment'=>$request->firstpayment_X, 
            'remainingamount'=>$request->remainingamount_X,
            'Scholarship'=>$request->Scholarship_X, 
            'insurance'=>$request->insurance_X, 
            'eye_sight'=>$request->eye_sight,
            'eye_disease'=>$request->eye_disease,
            'disease'=>$request->disease,
            'medical_caution'=>$request->medical_caution,
            'contagious_disease'=>$request->contagious_disease,
            'vecination'=>$request->vecination,
            'medical_documents'=>$medical_documents,
            'api_token'=> Str::random(60), 
            'activity'=>1, 
            'status'=>$request->status?$request->status:1,
            'created_by'=>Auth::user()->id,
            'updated_by'=>Auth::user()->id,
        ]);

        if($newUser){
            $account=Account::create([
                'name'=>$newUser->s_name,' '.$newUser->s_fatherName,
                'c_balance'=>0,
                'opening_balance'=>0,
                'type'=>'student',
                'std_id'=>$newUser->id
            ]);
            if($account){
                    $finalAnnualFee=((isset($request->total_annual_fee)?$request->total_annual_fee:0)- (isset($request->scholarship_of)?$request->scholarship_of:0));
                    $oneFactor=((isset($request->total_annual_fee)?$request->total_annual_fee:0)- (isset($request->scholarship_of)?$request->scholarship_of:0))/12;
                    $total_annual_fee=$request->annual_fee-$request->annual_scholarship_of;
                    $master1=[

                        'std_id'=>$newUser->id, 
                        'adm_fee'=>round(($request->adm_fee)?$request->adm_fee:$request->Admissionfee), 
                        'sec_fee'=>round(($request->sec_fee)?$request->sec_fee:0), 
                        'reg_fee'=>round(($request->RegistrationFee)?$request->RegistrationFee:0), 
                        'scholarship_type'=>($request->scholarship_type)?(int)($request->scholarship_type):0, 
                        'scholarship_of'=>round($request->annual_scholarship_of), 
                        'transport_fee'=>$request->transport_fee?$request->transport_fee:0,
                        'insurance_of'=>round($request->insurance_of)?$request->insurance_of:0, 
                        'annual_fee'=>round(($request->annual_fee)?(round($request->annual_fee)):0), 
                        'Net_AnnualFee'=>round($total_annual_fee), 
                        'installment_no'=>($request->installment_no)?$request->installment_no:0,
                        'fee_type'=>$request->feeStruture
                    ] ;
                    // dd($request->installment_no);
                    if($request->installment_no==12){
                        $master2=[
                            'installment_no'=>12,
                            'm1'=>1, 
                            'm2'=>1, 
                            'm3'=>1, 
                            'm4'=>1, 
                            'm5'=>1, 
                            'm6'=>1, 
                            'm7'=>1, 
                            'm8'=>1, 
                            'm9'=>1, 
                            'm10'=>1, 
                            'm11'=>1, 
                            'm12'=>1,
                            'fee_m1'=>$request->m1, 
                            'fee_m2'=>$request->m2, 
                            'fee_m3'=>$request->m3, 
                            'fee_m4'=>$request->m4, 
                            'fee_m5'=>$request->m5, 
                            'fee_m6'=>$request->m6, 
                            'fee_m7'=>$request->m7, 
                            'fee_m8'=>$request->m8, 
                            'fee_m9'=>$request->m9, 
                            'fee_m10'=>$request->m10, 
                            'fee_m11'=>$request->m11, 
                            'fee_m12'=>$request->m12
                        ];

                    }else{
                        $m1=((  (isset($request->m1)?($request->m1):0))/((isset($oneFactor)?($oneFactor!=0?$oneFactor:1):1)) );
                        $m2=(((isset($request->m2)?(($request->m2)):0))/((isset($request->m2)?($oneFactor!=0?$oneFactor:1):1)));
                        $m3=(((isset($request->m3)?($request->m3):0))/((isset($request->m3)?($oneFactor!=0?$oneFactor:1):1)));
                        $m4=(((isset($request->m4)?($request->m4):0))/((isset($request->m4)?($oneFactor!=0?$oneFactor:1):1)));
                        $m5=(((isset($request->m5)?($request->m5):0))/((isset($request->m5)?($oneFactor!=0?$oneFactor:1):1)));
                        $m6=(((isset($request->m6)?($request->m6):0))/((isset($request->m6)?($oneFactor!=0?$oneFactor:1):1)));
                        $m7=(((isset($request->m7)?($request->m7):0))/((isset($request->m7)?($oneFactor!=0?$oneFactor:1):1)));
                        $m8=(((isset($request->m8)?($request->m8):0))/((isset($request->m8)?($oneFactor!=0?$oneFactor:1):1)));
                        $m9=(((isset($request->m9)?($request->m9):0))/((isset($request->m9)?($oneFactor!=0?$oneFactor:1):1)));
                        $m10=(((isset($request->m10)?($request->m10):0))/((isset($request->m10)?($oneFactor!=0?$oneFactor:1):1)));
                        $m11=(((isset($request->m11)?($request->m11):0))/((isset($request->m11)?($oneFactor!=0?$oneFactor:1):1)));
                        $m12=(((isset($request->m12)?($request->m12):0))/((isset($request->m12)?($oneFactor!=0?$oneFactor:1):1)));


                        $master2=[
                            'm1'=>$m1, 
                            'm2'=>$m2, 
                            'm3'=>$m3, 
                            'm4'=>$m4, 
                            'm5'=>$m5, 
                            'm6'=>$m6, 
                            'm7'=>$m7, 
                            'm8'=>$m8, 
                            'm9'=>$m9, 
                            'm10'=>$m10, 
                            'm11'=>$m11, 
                            'm12'=>$m12,

                            'fee_m1'=>$request->m1, 
                            'fee_m2'=>$request->m2, 
                            'fee_m3'=>$request->m3, 
                            'fee_m4'=>$request->m4, 
                            'fee_m5'=>$request->m5, 
                            'fee_m6'=>$request->m6, 
                            'fee_m7'=>$request->m7, 
                            'fee_m8'=>$request->m8, 
                            'fee_m9'=>$request->m9, 
                            'fee_m10'=>$request->m10, 
                            'fee_m11'=>$request->m11, 
                            'fee_m12'=>$request->m12
                        ];
                    }
                    
                    $master3=array_merge($master1,$master2);

                    $structure=StudentFeeStructure::create($master3);
                
               

                
                    $finalAnnualFee=((isset($request->total_annual_fee)?$request->total_annual_fee:0)- (isset($request->scholarship_of)?$request->scholarship_of:0));

                    $oneFactor=((isset($request->total_annual_fee)?$request->total_annual_fee:0)- (isset($request->scholarship_of)?$request->scholarship_of:0))/12;


                    $total_annual_fee=$request->annual_fee-$request->annual_scholarship_of;
                    
                    if($request->feeStruture){
                        $master3=[
                            'update_date'=>$newUser->session=='April'?4:9,
                        ] ;
                    }
                    
                    
                    $master1=[

                        'std_id'=>$newUser->id, 
                        'adm_fee'=>round(($request->adm_fee)?$request->adm_fee:0), 
                        'sec_fee'=>round(($request->sec_fee)?$request->sec_fee:0), 
                        'scholarship_type'=>($request->scholarship_type)?(int)($request->scholarship_type):0, 
                        'scholarship_of'=>round($request->annual_scholarship_of), 
                        'transport_fee'=>$request->transport_fee?$request->transport_fee:0,
                        'insurance_of'=>round($request->insurance_of)?$request->insurance_of:0, 
                        'annual_fee'=>round(($request->annual_fee)?(round($request->annual_fee)):0), 
                        'Net_AnnualFee'=>round($total_annual_fee), 
                        'installment_no'=>($request->installment_no)?$request->installment_no:0,
                        'fee_type'=>$request->feeStruture,
                    ] ;
                        $next_m1=((  (isset($request->next_1)?($request->next_1):0))/((isset($oneFactor)?($oneFactor!=0?$oneFactor:1):1)) );
                        $next_m2=(((isset($request->next_2)?(($request->next_2)):0))/((isset($request->next_2)?($oneFactor!=0?$oneFactor:1):1)));
                        $next_m3=(((isset($request->next_3)?($request->next_3):0))/((isset($request->next_3)?($oneFactor!=0?$oneFactor:1):1)));
                        $next_m4=(((isset($request->next_4)?($request->next_4):0))/((isset($request->next_4)?($oneFactor!=0?$oneFactor:1):1)));
                        $next_m5=(((isset($request->next_5)?($request->next_5):0))/((isset($request->next_5)?($oneFactor!=0?$oneFactor:1):1)));
                        $next_m6=(((isset($request->next_6)?($request->next_6):0))/((isset($request->next_6)?($oneFactor!=0?$oneFactor:1):1)));
                        $next_m7=(((isset($request->next_7)?($request->next_7):0))/((isset($request->next_7)?($oneFactor!=0?$oneFactor:1):1)));
                        $next_m8=(((isset($request->next_8)?($request->next_8):0))/((isset($request->next_8)?($oneFactor!=0?$oneFactor:1):1)));
                        $next_m9=(((isset($request->next_9)?($request->next_9):0))/((isset($request->next_9)?($oneFactor!=0?$oneFactor:1):1)));
                        $next_m10=(((isset($request->next_10)?($request->next_10):0))/((isset($request->next_10)?($oneFactor!=0?$oneFactor:1):1)));
                        $next_m11=(((isset($request->next_11)?($request->next_11):0))/((isset($request->next_11)?($oneFactor!=0?$oneFactor:1):1)));
                        $next_m12=(((isset($request->next_12)?($request->next_12):0))/((isset($request->next_12)?($oneFactor!=0?$oneFactor:1):1)));


                        $master2=[
                            'm1'=>$next_m1, 
                            'm2'=>$next_m2, 
                            'm3'=>$next_m3, 
                            'm4'=>$next_m4, 
                            'm5'=>$next_m5, 
                            'm6'=>$next_m6, 
                            'm7'=>$next_m7, 
                            'm8'=>$next_m8, 
                            'm9'=>$next_m9, 
                            'm10'=>$next_m10, 
                            'm11'=>$next_m11, 
                            'm12'=>$next_m12,
                        ];
                    
                    
                    $master3=array_merge($master1,$master2);
                    // if(!$request->feeStruture){
                    //     $structure=UpdateStudentFeeStructure::create($master3);
                    // }
                    $structuress=UpdateStudentFeeStructure::create($master3);
                



                if(isset($structure) && $structure){

                    if(isset($request->parent_name) && count($request->parent_name)){
                        $parents=array();
                        for($i=0; $i<count($request->parent_name); $i++){

                            if(isset($request->parent_name)){
                                $temp=array();
                                $relation=isset($request->relation_type[$i])?$request->relation_type[$i]:null;
                                StudentParent::create([
                                    'std_id'=>$newUser->id,
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
                    $feePost=($this->feePost($request, $newUser));
                    if($feePost){
                        DB::commit();
                        $branch=Branch::find($request->branch_id);
                        $emails = ['web@americanlyceum.com', 'accounts@americanlyceum.com', 'tnadeem@americanlyceum.com',isset($branch)?$branch->b_emil:'web@americanlyceum.com'];
                            // $emails = ['web@americanlyceum.com','shafqatghafoor99@gmail.com'];
                        
                        Mail::send('emails.admission_manager', ['data'=>$newUser], function($message) use ($emails){    
                            $message->to($emails)->subject('New Admission');    
                        });

                        if($newUser->std_mail){
                            $emails = $newUser->std_mail;
                            if (filter_var($emails, FILTER_VALIDATE_EMAIL)) {
                                Mail::send('emails.admission_parent', ['data'=>$newUser], function($message) use ($emails){    
                                    $message->to($emails)->subject('Welcome to American Lyceum International School');    
                                });
                            }
                            
                        }


                        return redirect()->route('student.challen',$feePost->id);
                        session()->flash('success_message', __('Record Inserted Successfully'));
                    }else{
                        DB::rollBack();
                        session()->flash('error_message', __('Failed! To Insert Record'));
                    }

                }else{
                    DB::rollBack();
                    session()->flash('error_message', __('Failed! To Insert Record'));
                }

            }else{
                DB::rollBack();
                session()->flash('error_message', __('Failed! To Insert Record'));
            }
        }else{
           DB::rollBack();
           session()->flash('error_message', __('Failed! To Insert Record'));
       }
       return redirect()->back();
   }


   public function feePost($request, $std_id){

     $studentId=$std_id;

     $month=ltrim(date('m'),0);

     $year=date('Y');
     $response=0;

     $grade=Course::where('id',$std_id->section_id)->first();

     $stdAccount=Account::where('std_id',$std_id->id)->with('LedgerBalance')->orderBy('id','DESC')->first();

     $stdFee=StudentFeeStructure::where('std_id',$std_id->id)->orderBy('id','DESC')->first();
     DB::beginTransaction();
     $factor=$stdFee['m'.$month];
     $fee_m1=$stdFee['fee_m'.$month];
     $singleFee=isset($stdFee->Net_AnnualFee)?$stdFee->Net_AnnualFee/12:0;
     if($request->feePostMonth){
        $current_fee=$fee_m1>0?$fee_m1:round(isset($singleFee)?$singleFee:0)*  ( ($factor)?$factor:0);
    }else{
        $current_fee=0;
    }

    $miscCharge=((isset($request->insurance_of)?$request->insurance_of:0) + (isset($request->adm_fee)?$request->adm_fee:0) + (isset($request->sec_fee)?$request->sec_fee:0) + (isset($request->RegistrationFee)?$request->RegistrationFee:0)  + (isset($request->compFee)?(isset($grade->computer_fee)?$grade->computer_fee:0):0)+(isset($request->labFee)?(isset($grade->lab_fee)?$grade->lab_fee:0):0)+(isset($request->libFee)?(isset($grade->lib_fee)?$grade->lib_fee:0):0)+(isset($request->examFee)?(isset($grade->exam_fee)?$grade->exam_fee:0):0)+(isset($request->statFee)?(isset($grade->stationary)?$grade->stationary:0):0)+(isset($request->acFee)?(isset($grade->ac_charge)?$grade->ac_charge:0):0)+(isset($request->misc1)?$request->misc1:0)+(isset($request->misc2)?$request->misc2:0) + ($request->transport_fee?$request->transport_fee:0) + ($request->uniform?$request->uniform:0) + ($request->books_charges?$request->books_charges:0) + ($request->pendingFee?$request->pendingFee:0));

    $totalFee=(  $current_fee + $miscCharge );



    $TotaLsecondFee=($totalFee);
    $secondReminder=(($totalFee)%10);
    $totalFee=(int)($TotaLsecondFee-$secondReminder);

    StudentFeeStructure::where('std_id',$std_id->id)->update(['carry_forward'=>$secondReminder]);

    $feeRecord['feeId']=0;

    $feeRecord['std_id']=$std_id->id;
    $feeRecord['branch_id']=$std_id->branch_id;
    $feeRecord['fee_month']=$month;
    $feeRecord['fee_this_month']=$singleFee;
    $feeRecord['fee_factor']=$factor;
    $feeRecord['fee_year']=$year;
    $feeRecord['fee_date']=date('Y-m-d');
    $feeRecord['fee_due_date1']=$request->fee_due_date1?date("Y-m-d", strtotime($request->fee_due_date1)):date("Y-m-d");
    $feeRecord['fee_due_date2']=$request->fee_due_date1?date("Y-m-d", strtotime($request->fee_due_date1)):date("Y-m-d");

    $feeRecord['current_fee']=(isset($current_fee)?$current_fee:0);
    $feeRecord['comp_fee']=isset($request->compFee)?(isset($grade->computer_fee)?$grade->computer_fee:0):0;
    $feeRecord['labfee']=isset($request->labFee)?(isset($grade->lab_fee)?$grade->lab_fee:0):0;
    $feeRecord['libfee']=isset($request->libFee)?(isset($grade->lib_fee)?$grade->lib_fee:0):0;
    $feeRecord['examfee']=isset($request->examFee)?(isset($grade->exam_fee)?$grade->exam_fee:0):0;
    $feeRecord['statfee']=isset($request->statFee)?(isset($grade->stationary)?$grade->stationary:0):$request->books_charges;
    $feeRecord['accharge']=isset($request->acFee)?(isset($grade->ac_charge)?$grade->ac_charge:0):0;
    $feeRecord['fine_perday']=isset($request->fine_per_day)?$request->fine_per_day:0;
    $feeRecord['fine']=($request->outType!=1?(isset($fineCheck)?($fineCheck->paid_amount>0)?0:800:0):0);


    $feeRecord['month_def']=0;

    $feeRecord['utility_fee']=0;
    $feeRecord['paid_date']=null;
    $feeRecord['paid_amount']=0;
    $feeRecord['isPaid']=0;
    $feeRecord['isdeffered']=0;
    $feeRecord['deffered_amount']=$request->firstVoucher>0?($totalFee-$request->firstVoucher):0;
    $feeRecord['deffered_reason']='';
    $feeRecord['lastmonth_deffered']=0;
    $feeRecord['deffered_NEXT_Month']=0;

    $feeRecord['registerationFee']=(isset($request->RegistrationFee)?$request->RegistrationFee:0);
    $feeRecord['admissionFee']=(isset($request->adm_fee)?$request->adm_fee:0);
    $feeRecord['secFee']=(isset($request->sec_fee)?$request->sec_fee:0);
    $feeRecord['transport_fee']=$request->transport_fee;
    $feeRecord['uniform']=$request->uniform;
    $feeRecord['books_charges']=$request->books_charges;
    $feeRecord['insurance_of']=(isset($request->insurance_of)?$request->insurance_of:0);


    $feeRecord['iscorrection']=0;
    $feeRecord['corrected_amount']=0;
    $feeRecord['correction_reason']=0;
    $feeRecord['correction_approv']=0;
    $feeRecord['lastMonthCorrection']=0;
    $feeRecord['outstand_lastmonth']=(isset($stdAccount->LedgerBalance)?$stdAccount->LedgerBalance->balance:($request->pendingFee?$request->pendingFee:0));
    $feeRecord['grand_totalPayThisMonth']=$request->firstVoucher?$request->firstVoucher:$totalFee;

    $feeRecord['misc1']=isset($request->misc1)?$request->misc1:0;
    $feeRecord['misc1_desc']=isset($request->misc1_desc)?$request->misc1_desc:'';
    $feeRecord['misc2']=isset($request->misc2)?$request->misc2:0;
    $feeRecord['misc2_desc']=isset($request->misc2_desc)?$request->misc2_desc:'';
    $feeRecord['total_fee']=$request->firstVoucher?$request->firstVoucher:$totalFee;
    $feeRecord['created_by']=Auth::user()->id;
    $feeRecord['updated_by']=Auth::user()->id;

    $feeEffected=FeePost::create($feeRecord);

    if($feeEffected){
       
        if($miscCharge>0){
            $student=Account::where('std_id',$std_id->id)->first();
            $ledger=[
                'fee_id'=>isset($feeEffected)?$feeEffected->id:null,
                'account_id'=>$student->id,
                'a_credit'=>0,
                'a_debit'=>round(isset($miscCharge)?$miscCharge:0),
                'balance'=>round($miscCharge),
                'posting_date'=>date('Y-m-d'),
                'description'=>"Misc at the time of admission",
                'month'=>$month,
                'year'=>$year,
            ];
            $st['a_debit']=$student->a_debit+$miscCharge;
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
                    'a_credit'=>round(isset($miscCharge)?$miscCharge:0),
                    'a_debit'=>0,
                    'balance'=>round(isset($master->balance)?$master->balance-$miscCharge:(isset($master->balance)?$master->balance:0)),
                    'posting_date'=>date('Y-m-d'),
                    'description'=>"Misc at the time of admission",
                    'month'=>$request->month,
                    'year'=>$request->year,
                ];
                $br['a_credit']=$branch->a_credit+$miscCharge;
                $branchAccount=Master::create($ledger);
            }
        }
            $totalFee=$totalFee-$miscCharge;

            $totalFee=$request->pendingFee?$request->pendingFee:$totalFee;
            if($totalFee){
                $student=Account::where('std_id',$std_id->id)->first();
                $master=Master::where('account_id',$student->id)->orderBy('id','DESC')->first();
                $totalBalance=$master?$master->balance+$totalFee:$totalFee;
              
                $ledger=[
                    'fee_id'=>isset($feeEffected)?$feeEffected->id:null,
                    'account_id'=>$student->id,
                    'a_credit'=>0,
                    'a_debit'=>round(isset($totalFee)?$totalFee:0),
                    'balance'=>$totalBalance,
                    'posting_date'=>date('Y-m-d'),
                    'description'=>"First Fee Posted",
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
                    
                }       
            }

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

return $response;
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        try {

            $data = Course::find($id);
            $classes=Course::orderBy('id','DESC')->where('parentId',0)->get();
            return view('admin.section.edit',compact('data','classes'));
        } catch
        (\Illuminate\Database\QueryException $ex) {
            $response = (new ApiMessageController())->queryexception($ex);
        }
        return $response;
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
    public function deleteCourse(Request $request)
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

                $deleteItem =Course::where('id', $id)->update([
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

    public function updateCourse(SectionRequest $request)
    {
        try {
            $updateItem = Course::where('id',$request->id)->update($request->except('_token','_method'));

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
