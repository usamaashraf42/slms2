<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeePost;
use App\Models\Branch;
use App\Models\Account;
use App\Models\Master;
use App\Models\Student;
use App\Models\Bank;
use App\Models\BankFeeDeposit;
use App\Models\BankTransactionDetail;
use Illuminate\Support\Facades\Mail;
use \DB;
use Auth;
class FeeDepositController extends Controller
{

	/*
	slms
	ppmpf_5 define method and ppmpf_4 define project
	ppmpf_4=null and ppmpf_5=2 admission fee deposit
	ppmpf_4=null and ppmpf_5= summer book charge


	else fee deposit in slms




	prepon
	ppmpf_4=2 and ppmpf_5=11 define package buy in prepon



	*/
	public function index(){
		// $amount=substr(400000, 0, -2);
		// dd($this->britishlyceumPackageBuy(4003));
		// dd('hello');

		return view('web.pakistan.feeDeposit.challan');
	}


	public function feeDepositstatus(Request $request){
		$HashKey= "txtw58z1x0"; //Your Hash Key
		if(!(isset($_POST['pp_ResponseCode'])) && !(isset($_POST['pp_SecureHash'])) && !(isset($_POST['pp_ResponseMessage'])) ){
			session()->flash('error_message', __("Something went wrong from bank side, please try later"));
			return redirect()->route('feedeposit.index');
		}
		$ResponseCode =$_POST['pp_ResponseCode'];
		$ResponseMessage = $_POST['pp_ResponseMessage'];
		$Response="";$comment="";
		$ReceivedSecureHash =$_POST['pp_SecureHash'];
		$sortedResponseArray = array();
		if (!empty($_POST)) {
			foreach ($_POST as $key => $val) {
				$comment .= $key . "[" . $val . "],<br/>";
				$sortedResponseArray[$key] = $val;
			}
		}
		ksort($sortedResponseArray);			
		unset($sortedResponseArray['pp_SecureHash']);
		$Response=$HashKey;
		foreach ($sortedResponseArray as $key => $val) {		
			if ($val!=null and $val!="") {
				$Response.='&'.$val;				
			}
		}	
		$GeneratedSecureHash= hash_hmac('sha256', $Response, $HashKey);		

		if (strtolower($GeneratedSecureHash) == strtolower($ReceivedSecureHash)) 
		{
			if($ResponseCode == '000'||$ResponseCode == '121'||$ResponseCode == '200'){
				$amount=substr($request->pp_Amount, 0, -2);
				if($request->ppmpf_5==2){
					$this->admissionFeeSubmit($request->ppmpf_1);
					session()->flash('success_message', __("Fee deposit successfully"));
					return redirect()->route('pakistan.Apply');
				}elseif ($request->ppmpf_5==3) {

					$this->summerBookCharge($request->ppmpf_1);
					session()->flash('success_message', __("Fee deposit successfully"));
					return redirect()->route('pakistan.summerBook');

				}
				elseif ($request->ppmpf_4==2 && $request->ppmpf_5==11) {

					$url=$this->preponPackageBuy($request->ppmpf_1);
					if($url){
						session()->flash('error_message', __("Payment Pending. $ResponseMessage"));
						return redirect($url);
					}
					else{
						session()->flash('success_message', "Package buy successfully, thanks to subscribe prepon package" );
						return redirect('https://prepon.org/user/pricing');
					}


				}
				elseif ($request->ppmpf_4==3 && $request->ppmpf_5==21) {

					$url=$this->britishlyceumPackageBuy($request->ppmpf_1);
					if($url){
						session()->flash('error_message', __("Payment Pending. $ResponseMessage"));
						return redirect($url);
					}
					else{
						session()->flash('success_message', "Package buy successfully, thanks to subscribe prepon package" );
						return redirect('https://britishlyceum.org/teacher/teacher-panel');
					}


				}
				elseif ($request->ppmpf_4==4 && $request->ppmpf_5==22) {

					$url=$this->britishlyceumComPackageBuy($request->ppmpf_1);

					if($url){
						session()->flash('success_message', "Package buy successfully, thanks to subscribe Britishlyceum package" );
						return redirect($url);
					}
					else{
						session()->flash('success_message', "Package buy successfully, thanks to subscribe Britishlyceum package" );
						return redirect('https://britishlyceum.org/teacher/teacher-panel');
					}



					
					return redirect($url);
					

				}
				else{
					$this->feeDepositDbEffected($request->ppmpf_2,$request->ppmpf_1,$amount,8);
					session()->flash('success_message', __("Fee deposit successfully"));
					return redirect()->route('feedeposit.index');
				}
				

				
				
				
			} 
			else  if($ResponseCode == '124'||$ResponseCode == '210') {
				session()->flash('error_message', __("Payment Pending. $ResponseMessage"));

				if($request->ppmpf_5==2){
					return redirect()->route('pakistan.Apply');
				}elseif ($request->ppmpf_5==3) {

					return redirect()->route('pakistan.summerBook');

				}elseif ($request->ppmpf_4==2 && $request->ppmpf_5==11) {
					return redirect("https://prepon.org/user/package-failed/$ResponseMessage");

				}elseif ($request->ppmpf_4==3 && $request->ppmpf_5==21) {
					return redirect("https://britishlyceum.org/user/package-failed/$ResponseMessage");

				}
				elseif ($request->ppmpf_4==4 && $request->ppmpf_5==22) {
					return redirect("http://britishlyceum.com/user/package-failed/$ResponseMessage");

				}
				else{
					return redirect()->route('feedeposit.index');
				}
			}
			else {
				session()->flash('error_message', __("Payment Failed. $ResponseMessage "));
				if($request->ppmpf_5==2){
					return redirect()->route('pakistan.Apply');
				}elseif ($request->ppmpf_5==3) {

					return redirect()->route('pakistan.summerBook');


				}elseif ($request->ppmpf_4==2 && $request->ppmpf_5==11) {
					return redirect("https://prepon.org/user/package-failed/$ResponseMessage");

				}elseif ($request->ppmpf_4==3 && $request->ppmpf_5==21) {
					return redirect("https://britishlyceum.org/user/package-failed/$ResponseMessage");

				}elseif ($request->ppmpf_4==4 && $request->ppmpf_5==22) {
					return redirect("http://britishlyceum.com/user/package-failed/$ResponseMessage");

				}else{
					return redirect()->route('feedeposit.index');
				}
				
			}
			$txnrefno = htmlspecialchars($_POST['pp_TxnRefNo']);
			$reqAmount = htmlspecialchars($_POST['pp_Amount']);
			$reqDatetime = htmlspecialchars($_POST['pp_TxnDateTime']);
			$reqBillref = htmlspecialchars($_POST['pp_BillReference']);
			$reqRetrivalRefNo = htmlspecialchars($_POST['pp_RetreivalReferenceNo ']);
			$reqMerchantID = htmlspecialchars($_POST['pp_MerchantID']);	
		}
		else {
			
			session()->flash('error_message', __("mismatched marked it suspicious or reject it"));
			if($request->ppmpf_5==2){
				return redirect()->route('pakistan.Apply');
			}elseif ($request->ppmpf_5==3) {

				return redirect()->route('pakistan.summerBook');

			}elseif ($request->ppmpf_4==2 && $request->ppmpf_5==11) {
				return redirect("https://prepon.org/user/package-failed/$ResponseMessage");

			}elseif ($request->ppmpf_4==3 && $request->ppmpf_5==21) {
					return redirect("https://britishlyceum.org/user/package-failed/$ResponseMessage");

			}elseif ($request->ppmpf_4==4 && $request->ppmpf_5==22) {
					return redirect("http://britishlyceum.com/user/package-failed/$ResponseMessage");

				}else{
				return redirect()->route('feedeposit.index');
			}		
		}	
	}


	public function feeDepositCreditCardstatus(Request $request){
		dd($request->all());
	}


	public function feeDepositpaypal(Request $request){

		$HashKey= "y14yb32g8s"; //Your Hash Key
		$ResponseCode =$_POST['pp_ResponseCode'];
		$ResponseMessage = $_POST['pp_ResponseMessage'];
		$Response="";$comment="";
		$ReceivedSecureHash =$_POST['pp_SecureHash'];
		$sortedResponseArray = array();
		if (!empty($_POST)) {
			foreach ($_POST as $key => $val) {
				$comment .= $key . "[" . $val . "],<br/>";
				$sortedResponseArray[$key] = $val;
			}
		}
		ksort($sortedResponseArray);			
		unset($sortedResponseArray['pp_SecureHash']);
		$Response=$HashKey;
		foreach ($sortedResponseArray as $key => $val) {		
			if ($val!=null and $val!="") {
				$Response.='&'.$val;				
			}
		}	
		$GeneratedSecureHash= hash_hmac('sha256', $Response, $HashKey);		
		// echo "GeneratedSecureHash ".$GeneratedSecureHash.' '.'ReceivedSecureHash'.$ReceivedSecureHash;
		// dd($request->all());			
		if (strtolower($GeneratedSecureHash) == strtolower($ReceivedSecureHash)) 
		{
			if($ResponseCode == '000'||$ResponseCode == '121'||$ResponseCode == '200'){

				session()->flash('success_message', __("Fee deposit successfully."));
				return redirect()->route('feedeposit.index');
				
			} 
			else  if($ResponseCode == '124'||$ResponseCode == '210') {
				session()->flash('error_message', __("Payment Pending."));
				return redirect()->route('feedeposit.index');

			}
			else {
				session()->flash('error_message', __("Payment Failed. "));
				return redirect()->route('feedeposit.index');
				
			}
			$txnrefno = htmlspecialchars($_POST['pp_TxnRefNo']);
			$reqAmount = htmlspecialchars($_POST['pp_Amount']);
			$reqDatetime = htmlspecialchars($_POST['pp_TxnDateTime']);
			$reqBillref = htmlspecialchars($_POST['pp_BillReference']);
			$reqRetrivalRefNo = htmlspecialchars($_POST['pp_RetreivalReferenceNo ']);
			$reqMerchantID = htmlspecialchars($_POST['pp_MerchantID']);	
		}
		else {
			
			session()->flash('error_message', __("mismatched marked it suspicious or reject it"));
			return redirect()->route('feedeposit.index');			
		}	
	}


	public function feeChallan(Request $request){


		$fee=FeePost::where('std_id',$request->std_id)->with('student.branch','student.course')->orderBy('id','DESC')->first();

		$student=Student::find($request->std_id);
		$account=Account::where('std_id',$request->std_id)->with('LedgerBalance')->first();

		if(isset($fee->isPaid) && $fee->isPaid!=1 ){
			$object = new \stdClass;
			$object->fee_id=rand();
			$object->std_id=$fee->student->id;
			$object->name=$fee->student->s_name;

			$object->phone=$fee->student->s_phoneNo;
			$object->email=$fee->student->std_mail;
			$object->home_address=$fee->student->home_address;

			$object->s_fatherName=$fee->student->s_fatherName;
			$object->branch=$fee->student->branch->branch_name;
			$object->course=$fee->student->course->course_name;
			$object->course_id=$fee->student->course_id;

			$object->fee_month=$fee->fee_month;
			$object->fee_year=$fee->fee_year;
			$object->images=$fee->student->images;
			$object->total_fee=$fee->total_fee;

			$baranch=Branch::where('id',$fee->branch_id)->with('userSetting')->first();
			$branch_fine=isset($baranch->userSetting->fine)?$baranch->userSetting->fine:40;

			$now = strtotime(date( 'Y-m-d', strtotime( now() ) )); 
			$your_date = strtotime($fee->fee_due_date1);


			if($fee->outstand_lastmonth > 0){
				$your_date = strtotime($fee->fee_due_date2);
			}else{
				$your_date = strtotime($fee->fee_due_date1);
			}


			$datediff = $now - $your_date;
			$totalDay=round($datediff / (60 * 60 * 24));
			$fine=$totalDay * $branch_fine;

			if($fine>0){
				$object->fine=$fine;
			}else{
				$object->fine=0;
			}

			$object->total_payable=$fine+ $fee->total_fee;

			$object->due_date=$fee->outstand_lastmonth>0?date("d M Y", strtotime($fee->fee_due_date2)):date("d M Y", strtotime($fee->fee_due_date1));



			
		}
		if($student){
			$students = new \stdClass;
			$students->std_id=$student->id;

			$students->fee_id=rand();
			$students->name=$student->s_name;
			$students->s_fatherName=$student->s_fatherName;
			$students->course_id=$student->course_id;


			$students->s_phoneNo=$fee->student->s_phoneNo;
			$students->std_mail=$fee->student->std_mail;
			$students->home_address=$fee->student->home_address;


			
			$students->branch=isset($student->branch->branch_name)?$student->branch->branch_name:null;
			$students->course=isset($student->course->course_name)?$student->course->course_name:null;
			$students->images=$student->images;

			$total_pending_amount=0;
			// if(isset($account->LedgerBalance) && $account->LedgerBalance){
			// 	$total_pending_amount=$account->LedgerBalance->balance;
			// }

			
			if(isset($fee) && $fee){
				$paid=$fee->paid_amount>0?$fee->paid_amount:0;
				$total_pending_amount+=$fee->total_fee  -$paid;
			}
			$students->feed_id=isset($fee->id)?$fee->id:0;
			

			if(isset($object->fine) && $object->fine){
				$total_pending_amount+=$object->fine;
			}
			$students->total_pending=$total_pending_amount;
			$students->total_payable=$total_pending_amount;

			

			return response()->json(['status'=>1,'message'=>'Record found successfully','data'=>isset($object)?$object:null,'student'=>$students]);
		}

		else{
			return response()->json(['status'=>0]);
		}


	}


	public function store(Request $request){
		
		
		if($request->pp_Amount<100){
			session()->flash('error_message', __('Amount should be greater then 100'));
			return redirect()->back();
		}
		$fee=FeePost::where('std_id',$request->std_id)->with('student.branch','student.course')->orderBy('id','DESC')->first();

		$student=Student::find($request->std_id);
		$account=Account::where('std_id',$request->std_id)->with('LedgerBalance')->first();
		if(!$student){
			session()->flash('error_message', __('Record not found'));
			return redirect()->back();
		}
		$fees=BankTransactionDetail::create([
			'std_id'=>$request->std_id,
			'amount'=>$request->pp_Amount,
			'bank_id'=>8,
			'fee_id'=>$fee->id,
			'status'=>1,
			'branch_id'=>isset($fee->branch_id)?$fee->branch_id:0,
		]);
		if(!$fees){
			session()->flash('error_message', __('Something went wrong please try later'));
			return redirect()->back();
		}
		$object = new \stdClass;
		if(isset($fee->isPaid) && $fee->isPaid!=1 ){
			$object->fee_id=$fees->id;
			$object->std_id=$fee->student->id;
			$object->name=$fee->student->s_name.' '.$fee->student->s_fatherName;
			$object->branch=$fee->student->branch->branch_name;
			$object->course=$fee->student->course->course_name;
			$object->fee_month=$fee->fee_month;
			$object->fee_year=$fee->fee_year;
			$object->images=$fee->student->images;
			$object->total_fee=$fee->total_fee;

			$baranch=Branch::where('id',$fee->branch_id)->with('userSetting')->first();
			$branch_fine=isset($baranch->userSetting->fine)?$baranch->userSetting->fine:40;

			$now = strtotime(date( 'Y-m-d', strtotime( now() ) )); 
			$your_date = strtotime($fee->fee_due_date1);
			if($fee->outstand_lastmonth > 0){
				$your_date = strtotime($fee->fee_due_date2);
			}else{
				$your_date = strtotime($fee->fee_due_date1);
			}


			$datediff = $now - $your_date;
			$totalDay=round($datediff / (60 * 60 * 24));
			$fine=$totalDay * $branch_fine;

			if($fine>0){
				$object->fine=$fine;
			}else{
				$object->fine=0;
			}

			$object->total_payable=$fine+ $fee->total_fee;

			$object->due_date=$fee->outstand_lastmonth>0?date("d M Y", strtotime($fee->fee_due_date2)):date("d M Y", strtotime($fee->fee_due_date1));
		}
		$request=$request;

		$students = new \stdClass;
		$students->std_id=$student->id;
		$students->name=$student->s_name;
		$students->s_fatherName=$student->s_fatherName;
		$students->branch=isset($student->branch->branch_name)?$student->branch->branch_name:null;
		$students->course=isset($student->course->course_name)?$student->course->course_name:null;
		$students->images=$student->images;

		$total_pending_amount=0;
		if(isset($account->LedgerBalance) && $account->LedgerBalance){
			$total_pending_amount=$account->LedgerBalance->balance;
		}

		if(isset($object->fine) && $object->fine){
			$total_pending_amount+=$object->fine;
		}
		$students->total_pending=$total_pending_amount;
		$students->fee_id=$fees->id;
		
		if(!$request->pp_Amount){
			session()->flash('error_message', __("Amount Should be Equal or greater then $students->total_pending"));
			return redirect()->back();
		}
		if($request->type_method==2 or $request->type_method==3 && $object){
			$object->desire_amount=($request->pp_Amount).'00';
			$object->pp_Amount=($request->pp_Amount);

			return view('web.pakistan.feeDeposit.newForm',compact('request','object','students'));
		}else{
			$object->desire_amount=$request->pp_Amount;
			return view('web.pakistan.feeDeposit.checkoutChallan',compact('request','object','students'));
			// session()->flash('error_message', __('PayPal is not integrate'));
			// return redirect()->back();
		}
	}

	public function searchChallan(Request $request){
		
		$fee=FeePost::where('std_id',$request->std_id)->with('student.branch','student.course')->orderBy('id','DESC')->first();

		if(!$fee){
			session()->flash('error_message', __('Record not found'));
			return redirect()->back();
		}
		$object = new \stdClass;
		if($fee){
			$object->fee_id=$fee->id;
			$object->std_id=$fee->student->id;
			$object->name=$fee->student->s_name.' '.$fee->student->s_fatherName;
			$object->branch=$fee->student->branch->branch_name;
			$object->course=$fee->student->course->course_name;
			$object->fee_month=$fee->fee_month;
			$object->fee_year=$fee->fee_year;
			$object->images=$fee->student->images;
			$object->total_fee=$fee->total_fee;

			$baranch=Branch::where('id',$fee->branch_id)->with('userSetting')->first();
			$branch_fine=isset($baranch->userSetting->fine)?$baranch->userSetting->fine:40;

			$now = strtotime(date( 'Y-m-d', strtotime( now() ) )); 
			$your_date = strtotime($fee->fee_due_date1);
			if($fee->outstand_lastmonth > 0){
				$your_date = strtotime($fee->fee_due_date2);
			}else{
				$your_date = strtotime($fee->fee_due_date1);
			}


			$datediff = $now - $your_date;
			$totalDay=round($datediff / (60 * 60 * 24));
			$fine=$totalDay * $branch_fine;

			if($fine>0){
				$object->fine=$fine;
			}else{
				$object->fine=0;
			}

			$object->total_payable=$fine+ $fee->total_fee;

			$object->due_date=$fee->outstand_lastmonth>0?date("d M Y", strtotime($fee->fee_due_date2)):date("d M Y", strtotime($fee->fee_due_date1));
		}
		$request=$request;
		if( $object){
			return response()->json(['status'=>1,'request'=>$request,'object'=>'object','data'=>$object]);
		}else{
			return response()->json(['status'=>0,'request'=>$request,'object'=>'object','data'=>$object]);
			
		}
	}

	function feeDepositDbEffected($std_id,$fee_id,$amount,$bank){

		
		$transaction=BankTransactionDetail::where('id',$fee_id)->first();
		$fee=FeePost::where('std_id',$std_id)->orderBy('id','DESC')->first();

		if($transaction){
			$fees=BankTransactionDetail::where('id',$transaction->id)->update(['status'=>0]);
			if($transaction->fee_id){
				$fee=FeePost::where('id',$transaction->fee_id)->orderBy('id','DESC')->first();
			}
			
		}
		
		$stdd=$fee;
		$month=isset($stdd->fee_month)?$stdd->fee_month:date('m');
		$year=isset($stdd->fee_year)?$stdd->fee_year:date('Y');
		$depositDatest=date('Y-m-d');
		$students=Student::find($std_id);


		if(!$students){
			return false;
		}
		if($fee){
			$effectedAmount=$fee->paid_amount>0?$fee->paid_amount+$amount:$amount;
			$feePosts=FeePost::where('id',$fee->id)->update([
				'paid_date'=>date("d-m-Y"),
				'paid_amount'=>$effectedAmount,
				'isPaid'=>($fee->total_fee<=$effectedAmount)?1:2
			]);
		}

		
		$branch_fine=0;
		$baranch=Branch::where('id',$students->branch_id)->with('userSetting')->first();
		if($baranch){
			$branch_fine=isset($baranch->userSetting->fine)?$baranch->userSetting->fine:40;
		}

		
                    ///////////////////////// Fee Deposit ......,...................
		$studentAc=Account::where('std_id',$students->id)->first();
		
		if(!$studentAc){
			$studentAc=Account::create([
				'name'=>$students->s_name.' '.$students->s_fatherName, 
				'std_id'=>$students->id, 
				'type'=>'student', 
			]);
		}

		$branch=Account::where('branch_id',$students->branch_id)->first();
		if(!$branch){
			$branch=Account::create([
				'name'=>$baranch->branch_name, 
				'branch_id'=>$baranch->id,
				'type'=>'Branch', 
			]);
		}

		DB::beginTransaction();
		if(isset($stdd->fee_due_date1) && $stdd->outstand_lastmonth && $stdd->isPaid==0){
			$now = strtotime(date('Y-m-d')); 
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
					
				];
				$firstInsert=Master::create($ledger);
			}
		}

		$master=Master::where('account_id',$studentAc->id)->orderBy('id','DESC')->first();

		$ledger=[
			'fee_id'=>isset($stdd)?$stdd->id:null,
			'std_id'=>isset($students)?$students->id:null,
			'account_id'=>$studentAc->id,
			'a_credit'=>isset($amount)?$amount:0,
			'a_debit'=>0,
			'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),
			'posting_date'=>$depositDatest,
			'description'=>"Fee Deposited of".' '.getMonthName($stdd->fee_month). ' '."$year by jazzcash",
			'month'=>$month,
			'year'=>$year,
			
		];
		$std=Master::insert($ledger);
		if(!$std){
			DB::rollBack();
			return false; 
		}else{
			
			$master=Master::where('account_id',$branch->id)->orderBy('id','DESC')->first();
			$ledger=[
				'fee_id'=>isset($stdd)?$stdd->id:null,
				'a_credit'=>0,
				'account_id'=>$branch->id,
				'a_debit'=>isset($amount)?$amount:0,
				'balance'=>isset($master->balance)?$master->balance+$amount:($amount),
				'posting_date'=>$depositDatest,
				'description'=>"Fee Deposited of  $students->s_name($students->id)".' ' .getMonthName($stdd->fee_month).' ' ."$stdd->fee_year by jazzcash",
				'month'=>$month,
				'year'=>$year,
				
			];
			$std=Master::create($ledger);
			$bankAc=Account::where('bank_id',$bank)->first();
			
			if(!$bankAc){
				$bank_name=Bank::find($bank);
				$bankAc=Account::create([
					'name'=>$bank_name->bank_name, 
					'bank_id'=>$bank, 
					'type'=>'bank', 
				]);
			}
			$master=Master::where('account_id',$bankAc->id)->orderBy('id','DESC')->first();
			$ledger=[
				'fee_id'=>isset($stdd)?$stdd->id:null,
				'std_id'=>isset($students)?$students->id:null,
				'account_id'=>$bankAc->id,
				'a_credit'=>isset($amount)?$amount:0,
				'a_debit'=>0,
				'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),
				'posting_date'=>$depositDatest,
				'description'=>"Fee Deposited of".' '.getMonthName($stdd->fee_month). ' '."$year by jazzcash",
				'month'=>$month,
				'year'=>$year,
				
			];
			$std=Master::insert($ledger);

			if(!$std){
				DB::rollBack(); 
				return false;
			}else{
				
				
				$std=1;
				if(!$std){
					DB::rollBack();
					return false;
				}else{
					$banks=BankFeeDeposit::create([
						'bank_id'=>$bank,
						'deposite_date'=>$depositDatest,
						'fee_id'=>isset($stdd)?$stdd->id:null,
						'std_id'=>$students->id,
						'branch_id'=>$students->branch_id,
						'fee_month'=>isset($stdd)?$stdd->fee_month:null,
						'fee_year'=>isset($stdd)?$stdd->fee_year:null,
						'paid_amount'=>$amount,
					]);


					if($banks){
						if(isset($students->s_phoneNo)){
							$sms= nl2br("Dear Parent,\nThank you for deposited the fee of St No $students->id ,$students->s_name. Rs.($amount) received on Mobi cash for any queries contact (03464292920)",false);
							(SendSms($students->s_phoneNo,$sms));
						}
						DB::commit();
						return true;
					}else{
						DB::rollBack();
						return false;
					}

				}
			}
		}
		
	}
	function summerBookCharge($id){

		$bank=BankTransactionDetail::find($id);
		$amount=$bank->amount;

		if($bank){
			$fees=BankTransactionDetail::where('id',$id)->update(['status'=>0]);

			if($bank->order_id){
				$admission=\App\Models\InvOrder::where('order_id',$bank->order_id)->first();
				
				\App\Models\InvOrder::where('order_id',$bank->order_id)->update(['is_paid'=>1]);

				if(isset($admission->std_id) && $admission->std_id){
					$student=Student::find($admission->std_id);

					$student->s_phoneNo=$admission->phone;
					$student->std_mail=$admission->email;
					$student->home_address=$admission->address;


					$student->save();

					$bankAc=Account::where('bank_id',8)->first();
					if($bankAc){
						$master=Master::where('account_id',$bankAc->id)->orderBy('id','DESC')->first();
						$ledger=[
							'account_id'=>$bankAc->id,
							'a_credit'=>isset($amount)?$amount:0,
							'a_debit'=>0,
							'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),
							'posting_date'=>date('Y-m-d'),
							'description'=>"summer book charged $amount by jazzcash",
							'month'=>date('m'),
							'year'=>date('Y'),
							
						];
						$std=Master::insert($ledger);

					}
					

				} 


				if(isset($admission->phone) && $admission->phone && isset($student) && $student){
					$sms= strip_tags("Dear $admission->s_name ,"." <br> "."Your summer book order has been received.You will receive your order within 7 working days. "." <br> "."Regards, "." <br> "."ALIS ");
					SendSms($admission->phone,$sms);
				}
				if(isset($admission->email) && $admission->email && isset($student) && $student){
					$emails=$admission->email;
					$address=$admission->address;
					Mail::send('emails.summerBookChargeMail',['user'=>$student ,'address'=>$address], function($message) use ($emails){    
						$message->to($emails)->subject('Online payment of summer book');    
					});

				}


				return true;
			}else{
				return true;
			}


			

			

		}else{
			return false;
		}


	}


	public function britishlyceumComPackageBuy($id){

		$bank=BankTransactionDetail::find($id);

		if($bank){
			$amount=$bank->amount;
			$fees=BankTransactionDetail::where('id',$id)->update(['status'=>0]);
			$bankAc=Account::where('bank_id',8)->first();
			if($bankAc){
				$master=Master::where('account_id',$bankAc->id)->orderBy('id','DESC')->first();
				$ledger=[
					'account_id'=>$bankAc->id,
					'a_credit'=>isset($amount)?$amount:0,
					'a_debit'=>0,
					'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),
					'posting_date'=>date('Y-m-d'),
					'description'=>"britishlyceum Package subscribed by jazzcash",
					'month'=>date('m'),
					'year'=>date('Y'),

				];
				$std=Master::insert($ledger);



			}

			$projectAcc=Account::where('id',10081)->first();
			if($projectAcc){
				$master=Master::where('account_id',$projectAcc->id)->orderBy('id','DESC')->first();
				$ledger=[
					'account_id'=>$projectAcc->id,
					'a_credit'=>isset($amount)?$amount:0,
					'a_debit'=>0,
					'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),
					'posting_date'=>date('Y-m-d'),
					'description'=>"britishlyceum Package subscribed by jazzcash",
					'month'=>date('m'),
					'year'=>date('Y'),

				];
				$std=Master::insert($ledger);



			}


			$url="http://britishlyceum.com/teacher/pricing/user/package-status/$bank->britishlyceum_user_id/$bank->prepon_transaction_id/$bank->id/$bank->amount";

			return $url;
		}else{
			return false;
		}

	}

	
	public function britishlyceumPackageBuy($id){
		$bank=BankTransactionDetail::find($id);

		if($bank){
			$amount=$bank->amount;
			$fees=BankTransactionDetail::where('id',$id)->update(['status'=>0]);
			$bankAc=Account::where('bank_id',8)->first();
			if($bankAc){
				$master=Master::where('account_id',$bankAc->id)->orderBy('id','DESC')->first();
				$ledger=[
					'account_id'=>$bankAc->id,
					'a_credit'=>isset($amount)?$amount:0,
					'a_debit'=>0,
					'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),
					'posting_date'=>date('Y-m-d'),
					'description'=>"britishlyceum Package subscribed by jazzcash",
					'month'=>date('m'),
					'year'=>date('Y'),

				];
				$std=Master::insert($ledger);



			}

			$projectAcc=Account::where('id',10081)->first();
			if($projectAcc){
				$master=Master::where('account_id',$projectAcc->id)->orderBy('id','DESC')->first();
				$ledger=[
					'account_id'=>$projectAcc->id,
					'a_credit'=>isset($amount)?$amount:0,
					'a_debit'=>0,
					'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),
					'posting_date'=>date('Y-m-d'),
					'description'=>"britishlyceum Package subscribed by jazzcash",
					'month'=>date('m'),
					'year'=>date('Y'),

				];
				$std=Master::insert($ledger);



			}


			

			$url="https://britishlyceum.org/teacher/pricing/user/package-status/$bank->britishlyceum_user_id/$bank->prepon_transaction_id/$bank->amount";
			return $url;
		}else{
			return false;
		}

	}



	function preponPackageBuy($id){
		$bank=BankTransactionDetail::find($id);

		if($bank){
			$amount=$bank->amount;
			$fees=BankTransactionDetail::where('id',$id)->update(['status'=>0]);
			$bankAc=Account::where('bank_id',8)->first();
			if($bankAc){
				$master=Master::where('account_id',$bankAc->id)->orderBy('id','DESC')->first();
				$ledger=[
					'account_id'=>$bankAc->id,
					'a_credit'=>isset($amount)?$amount:0,
					'a_debit'=>0,
					'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),
					'posting_date'=>date('Y-m-d'),
					'description'=>"prepon Package subscribed by jazzcash",
					'month'=>date('m'),
					'year'=>date('Y'),

				];
				$std=Master::insert($ledger);



			}

			$projectAcc=Account::where('id',10076)->first();
			if($projectAcc){
				$master=Master::where('account_id',$projectAcc->id)->orderBy('id','DESC')->first();
				$ledger=[
					'account_id'=>$projectAcc->id,
					'a_credit'=>isset($amount)?$amount:0,
					'a_debit'=>0,
					'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),
					'posting_date'=>date('Y-m-d'),
					'description'=>"prepon Package subscribed by jazzcash",
					'month'=>date('m'),
					'year'=>date('Y'),

				];
				$std=Master::insert($ledger);



			}


			

			$url="https://prepon.org/user/pricing/user/package-status/$bank->prepon_user_id/$bank->prepon_package_id/$bank->id/$bank->amount";
			return $url;
		}else{
			return false;
		}

	}
	function admissionFeeSubmit($id){
		$bank=BankTransactionDetail::find($id);
		if($bank){
			$amount=$bank->amount;

			$fees=BankTransactionDetail::where('id',$id)->update(['status'=>0]);

			if($bank->std_reg_id){
				$admission=\App\Models\AdmissionQuery::find($bank->std_reg_id);
				$admission->paid=1;
				$admission->save();

				$bankAc=Account::where('bank_id',8)->first();
				if($bankAc){
					$master=Master::where('account_id',$bankAc->id)->orderBy('id','DESC')->first();
					$ledger=[
						'account_id'=>$bankAc->id,
						'a_credit'=>isset($amount)?$amount:0,
						'a_debit'=>0,
						'balance'=>isset($master->balance)?$master->balance-$amount:((isset($master->balance)?$master->balance:0)-$amount),
						'posting_date'=>date('Y-m-d'),
						'description'=>"intial addmission fee paid by jazzcash",
						'month'=>date('m'),
						'year'=>date('Y'),

					];
					$std=Master::insert($ledger);

				}


				if(isset($admission->contact_no) && $admission->contact_no){
					$sms= strip_tags("Dear $admission->father_name ,"." <br> "."Congratulations, You $admission->name has been initially registered in school. Your Registration Number is $admission->id. "." <br> "."Thank You, "." <br> "."Our Manager will contact you shortly.Regards, "." <br> "."ALIS ");
					SendSms($admission->contact_no,$sms);
				}
				if($admission->email){
					$emails=$admission->email;
					Mail::send('emails.initialAdmissionSuccess',['user'=>$admission], function($message) use ($emails){    
						$message->to($emails)->subject('Initial Online registration');    
					});

				}


				return true;
			}else{
				return true;
			}


			

			

		}else{
			return false;
		}
	}

}
