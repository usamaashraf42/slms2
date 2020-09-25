<?php
namespace App\Http\Controllers\admins\Student\feeDeposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeeDepositRequest;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\BankFeeDeposit;
use App\Mail\FeeDepositMail;
use App\Imports\CsvDataImport;
use App\Models\FeePost;
use App\Models\Branch;
use App\Models\Student;
use App\Models\Account;
use App\Models\Master;
use App\Models\Bank;
use Session;
use Auth;
use File;
use DB;
class FeeDepositController extends Controller
{
  function __construct()
  {
   $this->middleware('role_or_permission:Fee Deposit', ['only' => ['create','index','store']]);
 }
 public function index(){
   return view('admin.student.feedeposit.create');
 }
 public function missedFeeId($transId,$feeId,$status,$stdName,$fileName,$entry,$message=null){
  $temp = new \stdClass();
  $temp->status=$status;
  $temp->transactionId=$transId;
  $temp->feeId=$feeId;
  $temp->stdName=$stdName;
  $temp->fileName=$fileName;
  $temp->totalEntry=$entry;
  $temp->message=$message?$message:'Record not update';
  return $temp;
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeeDepositRequest $request){
      // dd($request->all());
      $depositDate=(int)(isset($request->date)?$this->toNum($request->date):null);
      $amount=(isset($request->amount)?$this->toNum($request->amount):null);
      $feeId=(isset($request->feeId)?$this->toNum($request->feeId):null);
      $student=(isset($request->ly_no)?$this->toNum($request->ly_no):null);
      $transactionId=(isset($request->transactionId)?$this->toNum($request->transactionId):null);
      $branch=(isset($request->branch)?$this->toNum($request->branch):null);
      $fileName=$request->name;
      $bank=$request->bank;
      $month=$request->month;
      $year=date('Y');
      $entry=0;
      $excelData=array();
      $repeatedArray=[];
      $missedFeeIdArray=[];

      $month=date('m');
      if(substr($month, 0, 1)=='0'){
        $month=substr($month, 1, 2);
      }

      DB::beginTransaction();

      $banking=Bank::find($bank);
      $bankName='';
      if($banking){
        $bankName=$banking->bank_name;
      }
      if($request->hasFile('mis')){
        $sheedName=$request->mis->getClientOriginalName();
         // $request->file('mis')->move('images/FeeDepositMis/', $sheedName);

        $extension = File::extension($request->mis->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {



          $path = $request->mis->getRealPath();
          $excelData = Excel::toArray(new CsvDataImport, $request->file('mis')); 
          $data=(array)$excelData[0];
          $entry=count($data);

          if(!empty($data) && count($data)){
            $index=0;

              for($i=1; $i<count($data); $i++){
                $record=$data[$i];
              $feeIds=isset($feeId)?$record[$feeId]:null;
              $firstInsertamount=$record[$amount];
              $studentName=null;
              $std=false;
              $tranId=((isset($student)?$record[$student]:(isset($feeIds)?$feeIds:'')?(isset($feeIds)?$feeIds:''):''));
              $feeIdd=isset($feeIds)?$feeIds:null;
              $lyu=isset($student)?$record[$student]:null;
              $depositDatest=$record[$depositDate]?date("Y-m-d", strtotime($record[$depositDate])):date('Y-m-d');
              $smsdepositDatest=$record[$depositDate]?date("d-M-Y", strtotime($record[$depositDate])):date('Y-m-d');
              
              if('1970-01-01'==$depositDatest){
                 session()->flash('error_message', __('Date format should be in text. please correct it'));
                 return redirect()->back();
              }
              if($feeIdd){

                $stdd=FeePost::with('student')->where('fee_month',$month)->where('fee_year',$year)->where('id',$feeIdd)->first();

                if(!$stdd){
                  $stdd=FeePost::with('student')->where('fee_month',$month)->where('fee_year',$year)->where('std_id',$feeIdd)->first();
                }

                if(!$stdd){
                  $std=true;
                  $object = new \stdClass();
                  $object->status=0;
                  $object->transactionId=$tranId;
                  $object->message='Record not found';
                  array_push($repeatedArray,$object);
                  $status=0;
                  $stdName=$studentName;
                  $temp=$this->missedFeeId($tranId,$feeIds,$status,$stdName,$fileName,$entry,'Record not found');
                  array_push($missedFeeIdArray,$temp);
                }else{

                 if(($stdd->paid_amount>0)){
                  $std=true;
                  $object = new \stdClass();
                  $object->status=0;
                  $object->transactionId=$tranId;
                  $object->message='Already fee posted';
                  array_push($repeatedArray,$object);
                  $status=0;
                  $stdName=$studentName;
                  $temp=$this->missedFeeId($tranId,$feeIds,$status,$stdName,$fileName,$entry,'Fee already read');
                  array_push($missedFeeIdArray,$temp);
                }else{
                  $students=$stdd->student;
                  $tranId=$stdd->student->id;
                  $studentName=$students->s_name;
                  //////////// 1 = for full payment,, 0 = unpaid, 2 is partial payment
                  $feePosts=FeePost::where('id',$stdd->id)->update([
                    'paid_date'=>date("d-m-Y", strtotime($record[$depositDate])),
                    'paid_amount'=>$firstInsertamount,
                    'isPaid'=>($stdd->total_fee<=$firstInsertamount)?1:2
                  ]);
                  if(!$feePosts){
                    $status=0;
                    $stdName=$students->s_name;
                    $temp=$this->missedFeeId($tranId,$feeIds,$status,$stdName,$fileName,$entry,'Fee post not update');
                    array_push($missedFeeIdArray,$temp);
                    DB::rollBack(); 
                  }else{
                    $baranch=Branch::where('id',$request->branch_id)->with('userSetting')->first();
                    $branch_fine=isset($baranch->userSetting->fine)?$baranch->userSetting->fine:40;
                    ///////////////////////// Fee Deposit ......,...................
                    $studentAc=Account::where('std_id',$students->id)->first();
                    $master=Master::where('account_id',$studentAc->id)->orderBy('id','DESC')->first();
                    if(!$studentAc){
                      $studentAc=Account::create([
                        'name'=>$students->s_name.' '.$students->s_fatherName, 
                        'std_id'=>$students->id, 
                        'type'=>'student', 
                      ]);
                    }
                    $ledger=[
                      'fee_id'=>isset($stdd)?$stdd->id:null,
                      'std_id'=>isset($students)?$students->id:null,
                      'account_id'=>$studentAc->id,
                      'a_credit'=>isset($firstInsertamount)?$firstInsertamount:0,
                      'a_debit'=>0,
                      'balance'=>isset($master->balance)?$master->balance-$firstInsertamount:((isset($master->balance)?$master->balance:0)-$firstInsertamount),
                      
                      
                      'posting_date'=>$depositDatest,
                      'description'=>"Fee Deposited of".' '.getMonthName($stdd->fee_month). ' '."$year",
                      'month'=>$month,
                      'year'=>$year,
                      'created_by'=>Auth::user()->id,
                      'updated_by'=>Auth::user()->id,
                    ];
                    $std=Master::insert($ledger);
                    if(!$std){
                      DB::rollBack(); 
                    }else{
                      $branch=Account::where('branch_id',$students->branch_id)->first();
                      if(!$branch){
                        $branch=Account::create([
                          'name'=>$baranch->branch_name, 
                          'branch_id'=>$baranch->id,
                          'type'=>'Branch', 
                        ]);
                      }
                      $master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
                      $ledger=[
                        'fee_id'=>isset($stdd)?$stdd->id:null,
                        'a_credit'=>0,
                        'account_id'=>$branch->id,
                        'a_debit'=>isset($firstInsertamount)?$firstInsertamount:0,
                        'balance'=>isset($master->balance)?$master->balance+$firstInsertamount:($firstInsertamount),
                        'posting_date'=>$depositDatest,
                        'description'=>"Fee Deposited of  $students->s_name($students->id)".' ' .getMonthName($stdd->fee_month).' ' ."stdd->fee_year",
                        'month'=>$month,
                        'year'=>$year,
                        'created_by'=>Auth::user()->id,
                        'updated_by'=>Auth::user()->id,
                      ];
                      $std=Master::create($ledger);
                      if(!$std){
                        $status=0;
                        $stdName=$studentName;
                        $temp=$this->missedFeeId($tranId,$feeIds,$status,$stdName,$fileName,$entry);
                        array_push($missedFeeIdArray,$temp);
                        
                        
                        DB::rollBack(); 
                      }else{
                          //////////////////////
                          // end fee deposit...................... ////////////////////////
                          ///////////////////////// fine Posting
                        $now = strtotime(date( 'Y-m-d', strtotime( $record[$depositDate] ) )); 

                        $your_date = strtotime($stdd->fee_due_date1);
                        
                        if($stdd->outstand_lastmonth > 0){
                         $your_date = strtotime($stdd->fee_due_date2);
                       }else{
                        $your_date = strtotime($stdd->fee_due_date1);
                      }


                      $datediff = $now - $your_date;
                      $totalDay=round($datediff / (60 * 60 * 24));
                      $fine=$totalDay * $branch_fine;

                      if(($fine) && ($fine>=1)){
                        $master=Master::where('account_id',$studentAc->id)->orderBy('id','DESC')->first();
                        $ledger=[
                          'fee_id'=>isset($stdd)?$stdd->id:null,
                          'std_id'=>isset($students)?$students->id:null,
                          'account_id'=>$studentAc->id,
                          'a_credit'=>0,
                          'a_debit'=>isset($fine)?$fine:0,
                          'balance'=>isset($master->balance)?$master->balance+$fine:($fine),
                          'posting_date'=>$depositDatest,
                          'description'=>"Late Fee Deposit fine of".' '.getMonthName($stdd->fee_month).' '. "$year",
                          'month'=>$month,
                          'year'=>$year,
                          'created_by'=>Auth::user()->id,
                          'updated_by'=>Auth::user()->id,
                        ];
                        $std=Master::create($ledger);

                        $master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
                        $ledger=[
                          'fee_id'=>isset($stdd)?$stdd->id:null,
                          'a_credit'=>isset($fine)?$fine:0,
                          'account_id'=>$branch->id,
                          'a_debit'=>0,
                          'balance'=>isset($master->balance)?$master->balance-$fine:(-$fine),
                          'posting_date'=>$depositDatest,
                          'description'=>"Late Fee Deposit fine of".' '. getMonthName($month).' ' ."$year",
                          'month'=>$month,
                          'year'=>$year,
                          'created_by'=>Auth::user()->id,
                          'updated_by'=>Auth::user()->id,
                        ];
                        $firstInsert=Master::create($ledger);
                      }
                      $std=1;
                      if(!$std){
                        $status=0;
                        $stdName=$studentName;
                        $temp=$this->missedFeeId($tranId,$feeIds,$status,$stdName,$fileName,$entry);
                        array_push($missedFeeIdArray,$temp);
                        DB::rollBack(); 
                      }else{
                       $firstInsert=1;
                          ///////////////// end fine post
                       if(!$firstInsert){
                        $status=0;
                        $stdName=$studentName;
                        $temp=$this->missedFeeId($tranId,$feeIds,$status,$stdName,$fileName,$entry);
                        array_push($missedFeeIdArray,$temp);
                        DB::rollBack();
                      }else{
                       $status=1;
                       $stdName=$studentName;
                       $temp=$this->missedFeeId($tranId,$feeIds,$status,$stdName,$fileName,$entry);
                       array_push($missedFeeIdArray,$temp);

                       BankFeeDeposit::create([

                        'bank_id'=>$bank,
                        'deposite_date'=>$depositDatest,
                        'fee_id'=>isset($stdd)?$stdd->id:null,
                        'std_id'=>$students->id,
                        'branch_id'=>$students->branch_id,
                        'fee_month'=>isset($stdd)?$stdd->fee_month:null,
                        'fee_year'=>isset($stdd)?$stdd->fee_year:null,
                        'paid_amount'=>$firstInsertamount,
                        'created_by'=>Auth::user()->id,
                      ]);

                          // if($students->s_phoneNo){
                          //   $sms= ("FEE DEPOSITED %0aDear $students->s_fatherName ,%0aThank you for paying the Fee Installment of Rs. $firstInsertamount %0aIn $bankName on $smsdepositDatest. %0aIf you have any questions please contact your branch.");
                          //   SendSms($students->s_phoneNo,$sms);
                          // }
                          // if($students->std_mail){
                          //   Mail::send('emails.depositMail',['data'=>$students,'amount'=>$firstInsertamount,'smsdepositDatest'=>$smsdepositDatest,'bankName'=>$bankName], function($message){    
                          //           $message->to($students->std_mail)->subject('Fee Deposited');    
                          //   });

                          // }

                       DB::commit();
                     }
                   }
                            ////////////////////////
                 }

               }
             }
           }
         }
       }
     }
   }
 }
}

if($request->hasfile('mis')){
  $name = $request->file('mis')->getClientOriginalName();
  $request->file('mis')->move('images/FeeDepositMis', $name); 
}
if(isset($missedFeeIdArray)&& count($missedFeeIdArray)>0){

    // Mail::to('web@americanlyceum.com')->send(new FeeDepositMail($missedFeeIdArray,$sheedName));

        $emails = ['web@americanlyceum.com', 'accounts@americanlyceum.com', 'tnadeem@americanlyceum.com'];
      // $emails = ['web@americanlyceum.com'];
      // $emails=['waleedraza39@gmail.com','shafqatghafoor99@gmail.com'];

              try {
                  Mail::send('emails.missedMail', ['data'=>$missedFeeIdArray,'sheet'=>$sheedName], function($message) use ($emails){    
                 $message->to($emails)->subject('Fee Deposited');    
               });

              } catch (\Exception $e) {
                
              }


    
}
if(isset($repeatedArray)&& count($repeatedArray)>0){
  Session::push('alreadyUploaded',$repeatedArray);
  return redirect()->back();
}

if(isset($firstInsert) && $firstInsert)
  session()->flash('success_message', __('Record Update Successfully'));
else
  session()->flash('error_message', __('Failed! To Read File'));
return redirect()->back();
}
public function toNum($data) {
  $numarr=array(
   0=>'A',
   1=>'B',
   2=>'C',
   3=>'D' ,
   4=>'E',
   5=>'F',
   6=>'G',
   7=>'H',
   8=>'I',
   9=>'J');
  $narr = array_flip($numarr);
  $arr = str_split($data);
  $str = '';
  if(isset($data) && !empty($data)){
    foreach($arr as $s)
      $str .= $narr[$s];
  }else{
    $str=null;
  }
  return $str;
}
}