<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\FeePost;
use App\Models\Account;
use App\Models\Branch;
use App\Models\Master;
use App\Models\Student;
use App\Models\MasterDetail;
use Illuminate\Support\Facades\View;

use App\Models\FeeCorrection;
use File;

use DB;
use Validator;
class ApiQueryLogController extends Controller
{
	public function branches(){
		return 'false';
		$branches = DB::connection('mysql3')->table('branches')->get();
		foreach($branches as $branch){
			if(isset($branch->b_id) && !empty($branch->b_id)){
				$data=[
					'id'=>$branch->b_id,
					'user_id'=>1,

					'b_countryCode'=>$branch->b_countryCode,
					'mangerName'=>$branch->b_countryCode,
					'b_code'=>$branch->b_code,
					'branch_name'=>$branch->branch_name,
					'b_address'=>$branch->b_address,
					'b_contactPerson'=>$branch->b_contactPerson,
					'b_emil'=>$branch->b_emil,
					'b_cell'=>$branch->b_cell,
					'b_regFee'=>$branch->b_regFee,
					'b_bank'=>$branch->b_bank,
					'b_smanagerTel'=>$branch->b_smanagerTel,
					'b_bankContact'=>$branch->b_bankContact,
					'branch_monDef'=>$branch->branch_monDef,
					'isFranchise'=>$branch->isFranchise,
					'Rent'=>isset($branch->Rent)?$branch->Rent:null,
					'Misc'=>isset($branch->Misc)?$branch->Misc:null,
					'isFranchise'=>$branch->isFranchise,
					'isFranchise'=>$branch->isFranchise,
				];
				
				DB::connection('mysql')->table('branches')->insert($data);
			}
		}

		return 'true';
	}
	public function students(){
		return 'false';
		$std = DB::connection('mysql3')->table('stdinfo')->offset(0)->limit(9000)->get();
		
		foreach($std as $request){
			$std=Student::where('id',$request->s_lyceonianNo)->first();

			if(!$std){
				if(isset($request) && !empty($request)){
					$stdFee = DB::connection('mysql3')->table('student_fee')->where('ly_no',$request->s_lyceonianNo)->first();
				// return dd($stdFee);
					$stdAcc = DB::connection('mysql3')->table('std_account')->where('ly_no',$request->s_lyceonianNo)->get();

					$studentReg=Student::create([
						'id'=>$request->s_lyceonianNo,
						's_countryCode'=>$request->s_countryCode?$request->s_countryCode:null,
						's_lyceonianNo'=>$request->s_lyceonianNo?$request->s_lyceonianNo:null,
						's_initialReg'=>$request->s_initialReg?$request->s_initialReg:null,
						's_name'=>$request->s_name?$request->s_name:null,

						's_branchId'=>$request->s_branchId?$request->s_branchId:null,
						'branch_id'=>$request->s_branchId?$request->s_branchId:null,

						's_classPresent'=>$request->s_classPresent?$request->s_classPresent:null, 
						'course_id'=>$request->s_classPresent?$request->s_classPresent:null,

						's_section'=>$request->s_section?$request->s_section:null,
						'section_id'=>$request->s_section?$request->s_section:null, 

						'academic_session_id'=>null,
						's_sex'=>$request->s_sex?$request->s_sex:null,
						's_DOB'=>$request->s_DOB?$request->s_DOB:null,
						's_fatherName'=>$request->s_fatherName?$request->s_fatherName:null,
						's_phoneNo'=>$request->s_phoneNo?$request->s_phoneNo:null, 
						'std_mail'=>$request->std_mail?$request->std_mail:null, 
						'admission_date'=>$request->admission_date?$request->admission_date:null, 
						'session'=>$request->session?$request->session:null, 

						'nationality'=>null, 

						'is_active'=>$request->is_active?$request->is_active:null, 
						'is_freeze'=>$request->is_freeze?$request->is_freeze:null, 
						'freeze_month'=>$request->freeze_month?$request->freeze_month:null, 
						'freeze_year'=>$request->freeze_year?$request->freeze_year:null, 
						'freeze_toMonth'=>$request->freeze_toMonth?$request->freeze_toMonth:null, 
						'freeze_toYear'=>$request->freeze_toYear?$request->freeze_toYear:null, 
						'leaving_reason'=>$request->leaving_reason?$request->leaving_reason:null, 
						'leaving_date'=>$request->leaving_date?$request->leaving_date:null, 
						'religion'=>$request->Religion_X?$request->Religion_X:null, 
						'Hobbies'=>$request->Hobbies_X?$request->Hobbies_X:null, 
						'DOReg'=>$request->DOReg?$request->DOReg:null, 
						'home_address'=>$request->HAddress_X?$request->HAddress_X:null, 
						'office_address'=>$request->officeAddress_X?$request->officeAddress_X:null, 
						'father_mobile'=>$request->MobileF_X?$request->MobileF_X:null, 
						'mother_mobile'=>$request->MobileM_X?$request->MobileM_X:null,
						'emergency_mobile'=>$request->EmergencyMobile_X?$request->EmergencyMobile_X:null, 
						'home_telephone'=>$request->HOmetel_X?$request->HOmetel_X:null, 
						'Admissionfee'=>$request->Admissionfee, 
						'RegistrationFee'=>$request->RegistrationFee_X, 
						'Securityfee'=>$request->Securityfee_X, 
						'firstpayment'=>$request->firstpayment_X, 
						'remainingamount'=>$request->remainingamount_X,
						'Scholarship'=>$request->Scholarship_X, 
						'insurance'=>$request->insurance_X, 
						'api_token'=> str_random(60), 
						'activity'=>1, 
						'status'=>$request->is_active,
					]);
					$structure=\App\Models\StudentFeeStructure::where('std_id',$studentReg->id)->first();
					if(!$structure){
						$structure=\App\Models\StudentFeeStructure::create([
							'std_id'=>$studentReg->id, 
							'adm_fee'=>isset($stdFee->adm_fee)?$stdFee->adm_fee:0, 
							'sec_fee'=>isset($stdFee->sec_fee)?$stdFee->sec_fee:0, 
							'scholarship_type'=>isset($stdFee->scholarship_type)?(int)($stdFee->scholarship_type):0, 
							'scholarship_of'=>isset($stdFee->scholarship_of)?$stdFee->scholarship_of:0, 
							'insurance_of'=>isset($stdFee->insurance_of)?$stdFee->insurance_of:0, 
							'annual_fee'=>isset($stdFee->annual_fee)?$stdFee->annual_fee:0, 
							'Net_AnnualFee'=>isset($stdFee->Net_AnnualFee)?$stdFee->Net_AnnualFee:0, 
							'installment_no'=>isset($stdFee->installment_no)?$stdFee->installment_no:0, 
							'm1'=>isset($stdFee->m1)?$stdFee->m1:0, 
							'm2'=>isset($stdFee->m2)?$stdFee->m2:0, 
							'm3'=>isset($stdFee->m3)?$stdFee->m3:0, 
							'm4'=>isset($stdFee->m4)?$stdFee->m4:0, 
							'm5'=>isset($stdFee->m5)?$stdFee->m5:0, 
							'm6'=>isset($stdFee->m6)?$stdFee->m6:0, 
							'm7'=>isset($stdFee->m7)?$stdFee->m7:0, 
							'm8'=>isset($stdFee->m8)?$stdFee->m8:0, 
							'm9'=>isset($stdFee->m9)?$stdFee->m9:0, 
							'm10'=>isset($stdFee->m10)?$stdFee->m10:0, 
							'm11'=>isset($stdFee->m11)?$stdFee->m11:0, 
							'm12'=>isset($stdFee->m12)?$stdFee->m12:0
						]);
					}
					$account=Account::where('std_id',$studentReg->id)->first();
					if(!$account){
						$account=Account::create([
							'name'=>$studentReg->s_name.' '.$studentReg->s_fatherName, 
							'std_id'=>$studentReg->id, 
							'type'=>'student', 
						]);
					}

					$branch=Account::where('branch_id',$studentReg->branch_id)->first();
					if(!$branch){
						$branchAcc=Branch::find($studentReg->branch_id);
						if($branchAcc){
							$branch=Account::create([
								'name'=>$branchAcc->branch_name, 
								'branch_id'=>$branchAcc->id,
								'type'=>'Branch', 
							]);
						}
						
					}

					foreach($stdAcc as $acc){
						$detail=MasterDetail::create([
							'from_account_id'=>$acc->a_debit>0?isset($branch->id)?$branch->id:null:null,
							'to_account_id'=>$acc->a_credit>0?$account->id:null,
							'transaction_type'=>'TR',
							'amount'=>$acc->a_debit>0?$acc->a_debit:$acc->a_credit,
							'description'=>$acc->description
						]);
						$ledger=[
							'account_id'=>$account->id,
							'fee_id'=>$acc->feeId,
							'std_id'=>$studentReg->id,
							'correction_id'=>$acc->correctionId,
							'a_credit'=>$acc->a_credit,
							'a_debit'=>$acc->a_debit,
							'transaction_type'=>'TR',
							'amount_type'=> $acc->a_credit>0?'CR':'DB',
							'balance'=>$acc->a_balance,
							'detail_id'=>$detail->id,
							'description'=>$acc->description,
							'posting_date'=>$acc->update_date,
							'month'=>$acc->month,
							'year'=>$acc->year,
						];
						$std=Master::create($ledger);

						if($branch){
							$brnachMaster=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
							$ledger=[
								'account_id'=>$branch->id,
								'fee_id'=>$acc->feeId,
								'correction_id'=>$acc->correctionId,
								'branch_id'=>$branch->id,
								'a_credit'=>$acc->a_debit,
								'a_debit'=>$acc->a_credit,
								'transaction_type'=>'TR',
								'amount_type'=> $acc->a_credit>0?'CR':'DB',
								'detail_id'=>$detail->id,
								'balance'=>isset($brnachMaster->balance)?($brnachMaster->balance + ($acc->a_credit - $acc->a_debit)): ($acc->a_credit - $acc->a_debit),
								'description'=>$acc->description,
								'posting_date'=>$acc->update_date,
								'month'=>$acc->month,
								'year'=>$acc->year,
							];
							$branchAccount=Master::create($ledger);
						}

					}
				}
			}
		}

		return 'true';
	}

	public function classes(){
		return 'false';
		$classes = DB::connection('mysql3')->table('tbl_grade')->get();
		
		foreach($classes as $classs){
			if(isset($classs->grade_code) && !empty($classs->grade_code)){
				$data=[
					'id'=>$classs->grade_code,
					'course_code'=>$classs->grade_code,
					'course_name'=>$classs->grade_name,
					'computer_fee'=>$classs->computer_fee,
					'lab_fee'=>$classs->lab_fee,
					'lib_fee'=>$classs->lib_fee,
					'exam_fee'=>$classs->exam_fee,
					'stationary'=>$classs->stationary,
					'ac_charge'=>$classs->ac_charge,
					
				];
				// return $data;
				DB::connection('mysql')->table('courses')->insert($data);
			}
		}

		return 'true';
	}

	public function BranchCourse(){
		return 'false';
		$courses = DB::connection('mysql3')->table('branch_classes')->get();
		
		foreach($courses as $classs){
			if(isset($classs->branch_id) && !empty($classs->branch_id)){
				$data=[
					'branch_id'=>$classs->branch_id,
					'course_id'=>$classs->class_id,
					
				];
				$branch=\App\Models\Branch::find($classs->branch_id);
				$course=\App\Models\Course::find($classs->class_id);
				if($branch && $course){
					DB::connection('mysql')->table('branch_courses')->insert($data);
				}
				
			}
		}

		return 'true';
	}


	public function sms4connect(Request $request){



		// $interview=\App\Models\Interview::whereDate('schedule','2019-10-17')->with('user')->get();

		// $phone=array();
		// foreach ($interview as $inter) {

		// 	$sms=strip_tags("Please be advised interview Time is 12:00pm and Date is 17th October, 2019 tomorrow.."."\r\n".
		// 		"Regards"."\r\n"."HR Manager"."\r\n"."03224772703");
		// 	if(isset($inter->user->phone) && ($inter->user->phone)){
		// 		$phone[]=$inter->user->phone;
		// 		SendSms($inter->user->phone,$sms);
		// 	}
		// }
		// return $phone;

		// $data=Student::orderBy('id','DESC')->first();
		// $ly=isset($data->id)?$data->id:null;
		// $branchNameStd=isset($data->Branchs->branch_name)?$data->Branchs->branch_name:null;
		// $stdNameStd=isset($data->s_name)?$data->s_name:null;
		// $stdFatherName=isset($data->s_fatherName)?$data->s_fatherName:null;
		// $courseName=isset($data->course->course_name)?$data->course->course_name:null;
		// $annualFeeStd=(isset($data->studentFee['annual_fee'])?$data->studentFee['annual_fee']:0);
		// $ScholarShipFeeStd=isset($data->studentFee['scholarship_of'])?$data->studentFee['scholarship_of']:0;
		// $firstStdFee=isset($data->firstStdFee->total_fee)?$data->firstStdFee->total_fee:0;
		// $pending=(($annualFeeStd - $ScholarShipFeeStd) - $firstStdFee);

		// $sms="Welcome to ALIS. Following are the Admission Details %0a Student Number : $ly %0aBranch :$branchNameStd %0aName : $stdNameStd %0aFather's Name:$stdFatherName %0aGrade : $courseName %0aAnnual Fee:$annualFeeStd %0aAnnual Scholarship:$ScholarShipFeeStd %0aPayment made at the time of Admission:12200 %0aPending Payment: $pending %0aThank you. If there is some error in the details %0aplease contact your branch";
		

		// $application_ids=$request->application_ids;
		// $schedule=date('Y-m-d H:i:s', strtotime($request->schedule)); 
		// $start_date=$request->start_date; 
		// $till_date=$request->till_date; 
		// $start_time=$request->start_time; 
		// $till_time=$request->till_time; 
		// $country_id=$request->country_id; 
		// $Venue=$request->Venue; 
		// $contact_no=$request->contact_no; 
		// $email_subject=$request->email_subject; 
		// $email_body=$request->email_body;
		// $email_send=$request->email_send; 
		// $address=$request->address;
		// $email_body='';
		// $message=strip_tags("$email_body"."\r\n"."Venue: $Venue \r\n"."Address: $address\r\n"."Time: ".date('h:i: A', strtotime($schedule))." \r\n"."Date: ".date('d F Y', strtotime($schedule))."\r\n"."Looking forward. \r\n"."Regards, \r\n"."HR Manager,\r\n"."American Lyceum International School.\r\n"."Contact: $contact_no");

		
		$validate = Validator::make($request->all(),[
			'phone' => 'required',

		]);
		$sms='hello';
		if($validate->fails()){
			$status = false;
			$message = $validate->errors()->first();
			return response()->json(['message' => $message, 'status' => $status], 200);
		} else {
			 $hll=SendSms($request->phone,$sms);
			 return $hll;
		}
	}


	public function feePost(){
		return 'false';
		$fees = DB::connection('mysql3')->table('fee_post')->get();

		foreach($fees as $fee){

			$feeRecord['id']=$fee->feeId;
			$feeRecord['feeId']=$fee->feeId;
			$feeRecord['std_id']=$fee->ly_no;
			$feeRecord['fee_month']=$fee->fee_month;
			$feeRecord['fee_year']=$fee->fee_year;
			$feeRecord['fee_date']=$fee->fee_date;
			$feeRecord['fee_due_date1']=$fee->fee_due_date1;
			$feeRecord['fee_due_date2']=$fee->fee_due_date2;
			$feeRecord['current_fee']=$fee->current_fee;
			$feeRecord['comp_fee']=$fee->comp_fee;
			$feeRecord['labfee']=$fee->labfee;
			$feeRecord['libfee']=$fee->libfee;
			$feeRecord['examfee']=$fee->examfee;
			$feeRecord['statfee']=$fee->statfee;
			$feeRecord['accharge']=$fee->accharge;
			$feeRecord['fine_perday']=$fee->fine_perday;
			$feeRecord['fine']=$fee->fine;
			$feeRecord['month_def']=$fee->month_def;
			$feeRecord['utility_fee']=$fee->utility_fee;
			$feeRecord['paid_date']=$fee->paid_date;
			$feeRecord['paid_amount']=$fee->paid_amount;
			$feeRecord['isPaid']=$fee->isPaid;
			$feeRecord['isdeffered']=$fee->isdeffered;
			$feeRecord['deffered_amount']=$fee->deffered_amount;
			$feeRecord['deffered_reason']=$fee->deffered_reason;
			$feeRecord['lastmonth_deffered']=$fee->lastmonth_deffered;
			$feeRecord['deffered_NEXT_Month']=$fee->deffered_NEXT_Month;
			$feeRecord['registerationFee']=$fee->registerationFee;
			$feeRecord['admissionFee']=$fee->admissionFee;
			$feeRecord['secFee']=$fee->secFee;
			$feeRecord['transport_fee']=$fee->transport_fee;
			$feeRecord['insurance_of']=$fee->insurance_of;
			$feeRecord['iscorrection']=$fee->iscorrection;
			$feeRecord['corrected_amount']=$fee->corrected_amount;
			$feeRecord['correction_reason']=$fee->correction_reason;
			$feeRecord['correction_approv']=$fee->ly_no;
			$feeRecord['lastMonthCorrection']=$fee->correction_approv;
			$feeRecord['outstand_lastmonth']=$fee->outstand_lastmonth;
			$feeRecord['grand_totalPayThisMonth']=$fee->grand_totalPayThisMonth;
			$feeRecord['misc1']=$fee->misc1;
			$feeRecord['misc1_desc']=$fee->misc1_desc;
			$feeRecord['misc2']=$fee->misc2;
			$feeRecord['misc2_desc']=$fee->misc2_desc;
			$feeRecord['total_fee']=$fee->total_fee;
			$feeRecord['created_at']=$fee->created_at;

			FeePost::insert($feeRecord);

		}
		return 'true';
		
	}


	public function balanceCorrection(){
		return 'false';
		$balancess=DB::connection('mysql3')->table('std_account')->get();
		foreach($balancess as $bala){

			$account=\App\Models\Account::where('std_id',$bala->ly_no)->first();


			$ledger=[
				'account_id'=>$account->id,
				'fee_id'=>$bala->feeId,
				'correction_id'=>$bala->correctionId,
				'a_credit'=>$bala->a_credit,
				'a_debit'=>$bala->a_debit,
				'balance'=>$bala->a_balance,
				'description'=>$bala->description,
				'posting_date'=>$bala->update_date,
				'month'=>$bala->month,
				'year'=>$bala->year,
			];
			$std=Master::create($ledger);
			
		}	
		return 'true';
	}
	public function sendsms(){
		$user=\App\Models\User::orderBy('id','DESC')->first();

		// Mail::send('emails.userForgotPasswordMail',['data'=>$stdent], function($message){    
  //               $message->to('saddambhatti98@gmail.com')->subject('New Admission');    
  //       });

         $passwordReset = \App\Models\PasswordReset::first();
        
        if ($user && $passwordReset){
            if($passwordReset->token){

            	$emails = $user->email;
	            Mail::send('emails.wellcome', ['data'=>$passwordReset,'user'=>$user], function($message) use ($emails) {    
	                $message->to('saddambhatti98@gmail.com')->subject('Welcome ALIS');    
	            });
	        }
	    }

		return 'true';
	}


	public function feeFactorCheck(){
		return 'false';
		$balancess=\App\Models\StudentFeeStructure::where('m9',0)->get();
		$temarray=array();
		foreach($balancess as $bala){
			$factir=0;
			$factir+=$bala->m1;
			$factir+=$bala->m2;
			$factir+=$bala->m3;
			$factir+=$bala->m4;
			$factir+=$bala->m5;
			$factir+=$bala->m6;
			$factir+=$bala->m7;
			$factir+=$bala->m8;
			$factir+=$bala->m9;
			$factir+=$bala->m10;
			$factir+=$bala->m11;
			$factir+=$bala->m12;
			
			if($factir<12){
				array_push($temarray, $bala);
			}
		}
		

		foreach($temarray as $bala){
			if(!$bala->m1)
				$ter['m1']=1;

			if(!$bala->m2)
				$ter['m2']=1;

			if(!$bala->m3)
				$ter['m3']=1;

			if(!$bala->m4)
				$ter['m4']=1;

			if(!$bala->m5)
				$ter['m5']=1;

			if(!$bala->m6)
				$ter['m6']=1;

			if(!$bala->m7)
				$ter['m7']=1;

			if(!$bala->m8)
				$ter['m8']=1;

			if(!$bala->m9)
				$ter['m9']=1;

			if(!$bala->m10)
				$ter['m10']=1;

			if(!$bala->m11)
				$ter['m11']=1;

			if(!$bala->m12)
				$ter['m12']=1;

			$balal=\App\Models\StudentFeeStructure::where('id',$bala->id)->update($ter);

			if($balal){

				$stdFee=\App\Models\StudentFeeStructure::find($bala->id);
				if($stdFee){

					if(!($bala->m9)){
						$feeposted=\App\Models\FeePost::where('std_id',$bala->std_id)->where('fee_month',9)->first();


						if($feeposted){

							$singleFee=isset($stdFee->Net_AnnualFee)?$stdFee->Net_AnnualFee/12:0;
							$curFEe=$singleFee*1;
							$balan['current_fee']=$curFEe;
							$balan['total_fee']=$feeposted->total_fee+$singleFee;

							$effed=\App\Models\FeePost::where('id',$feeposted->id)->update($balan);

							if($effed){

								$acc=Account::where('std_id',$bala->std_id)->first();
								$mas=Master::where('account_id',$acc->id)->orderBy('id','DESC')->first();
								$mas->a_debit=$mas->a_debit+$curFEe;
								$mas->balance=$mas->balance+$curFEe;
								$mas->save();


							}

						}
					}

				}


			}
			



			
			
		}	
		return 'true';
	}


	public function feepostrevert(){
		return 'false';
		$feeposts=FeePost::where('fee_month',9)->where('fee_year',2019)->where('paid_amount','>',0)->get();
		return $feeposts;
		foreach($feeposts as $posts){
			$fee=FeePost::find($posts->id);
			$fee->paid_date=null;
			$fee->paid_amount=0;
			$fee->isPaid=0;
			$fee->save();
		}

		return 'true';
	}

	public function feeDepositedReverted(){
		return 'false';
		$masters=Master::where('month',9)->where('description','Fee Deposited of September 2019')->orderBy('id','DESC')->delete();
		$masters=Master::where('month',9)->where('description','Late Fee Deposit fine of September 2019')->orderBy('id','DESC')->delete();
		return ($masters);
	}

	public function feePostedUpdate(){
		return 'false';
		$balancess=\App\Models\StudentFeeStructure::get();
		foreach ($balancess as $structure) {
			$fee=\App\Models\StudentFeeStructure::find($structure->id);
			$currentFee=($fee->Net_AnnualFee/12);


			// return $fee->m1*$currentFee;

			$firstFee=(int)(($fee->m1*$currentFee)-($fee->m1*$currentFee)%10);
			$firstReminder=($fee->m1*$currentFee)%10;
			////////// 2nd fee
			$TotaLsecondFee=($firstReminder+($fee->m2*$currentFee));
			$secondReminder=($TotaLsecondFee)%10;
			$secondFee=(int)($TotaLsecondFee-$secondReminder);
			////////// 3rd fee
			$TotaLthirdFee=($secondReminder+($fee->m3*$currentFee));
			$thirdReminder=($TotaLthirdFee)%10;
			$thirdFee=(int)($TotaLthirdFee-$thirdReminder);
			////////// 4th fee

			$TotaL4thFee=($thirdReminder+($fee->m4*$currentFee));
			$fourthReminder=($TotaL4thFee)%10;
			$fourthFee=(int)($TotaL4thFee-$fourthReminder);
			
			////////// 5th fee
			$TotaL5thFee=($fourthReminder+($fee->m5*$currentFee));
			$fifthReminder=($TotaL5thFee)%10;
			$fifthFee=(int)($TotaL5thFee-$fifthReminder);

			
			////////// 6th fee
			$TotaL6thFee=($fifthReminder+($fee->m6*$currentFee));
			$sixthReminder=($TotaL6thFee)%10;
			$sixthFee=(int)($TotaL6thFee-$sixthReminder);
			
			////////// 7th fee
			$TotaL6thFee=($sixthReminder+($fee->m7*$currentFee));
			$sixthReminder=($TotaL6thFee)%10;
			$sixthFee=(int)($TotaL6thFee-$sixthReminder);
			
			////////// 8th fee
			$TotaL8thFee=($sixthReminder+($fee->m8*$currentFee));
			$eightReminder=($TotaL8thFee)%10;
			$eightFee=(int)($TotaL8thFee-$eightReminder);
			
			////////// 9th fee
			$TotaL9thFee=($eightReminder+($fee->m9*$currentFee));
			$ninthReminder=($TotaL9thFee)%10;
			$ninthFee=(int)($TotaL9thFee-$ninthReminder);
			
			////////// 10th fee
			$TotaL10thFee=($ninthReminder+($fee->m10*$currentFee));
			$tenReminder=($TotaL10thFee)%10;
			$tenFee=(int)($TotaL10thFee-$tenReminder);
			
			////////// 10th fee
			$TotaL11thFee=($tenReminder+($fee->m11*$currentFee));
			$elevenReminder=($TotaL11thFee)%10;
			$elevenFee=(int)($TotaL11thFee-$elevenReminder);
			
			////////// 10th fee
			$TotaL12thFee=($elevenReminder+($fee->m12*$currentFee));
			$twelveReminder=($TotaL12thFee)%10;
			$twelveFee=(int)($TotaL12thFee-$twelveReminder);
			
			////////// 10th fee


			return ($twelveReminder);

			$fee->month1=$fee->m1*$currentFee;
			$fee->month2=$fee->m2*$currentFee;
			$fee->month3=$fee->m3*$currentFee;
			$fee->month4=$fee->m4*$currentFee;
			$fee->month5=$fee->m5*$currentFee;
			$fee->month6=$fee->m6*$currentFee;
			$fee->month7=$fee->m7*$currentFee;
			$fee->month8=$fee->m8*$currentFee;
			$fee->month9=$fee->m9*$currentFee;
			$fee->month10=$fee->m10*$currentFee;

			$fee->month11=$fee->m11*$currentFee;
			$fee->month12=$fee->m12*$currentFee;
			$fee->save();
		}
		
		return 'true';
	}


	public function correctionApproved(){
		return 'false';
			// return Master::select('*')->groupBy('correction_id')->having(count('correction_id'),'>',1)->get();
		$corrections=FeeCorrection::where('correction_approv',0)->get();
		$temarray=array();
		foreach ($corrections as $corr) {
			$masters=Master::where('correction_id',$corr->id)->where('std_id',$corr->std_id)->get();
			if(count($masters) > 1){
				array_push($temarray,$corr->id);
				FeeCorrection::where('id',$corr->id)->update(['correction_approv'=>1]);
			}
		}
		return $temarray;



	}

	
}
