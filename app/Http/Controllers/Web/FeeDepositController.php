<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeePost;
use App\Models\Branch;
use App\Models\Account;
use App\Models\Master;
use App\Models\Student;
class FeeDepositController extends Controller
{
	public function index(){
		// dd($_POST);
		return view('web.pakistan.feeDeposit.challan');
	}


	public function feeDepositstatus(Request $request){
		// dd($request->all());
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

				session()->flash('success_message', __("Payment Successfull. $ResponseMessage"));
				return redirect()->route('feedeposit.index');
				
			} 
			else  if($ResponseCode == '124'||$ResponseCode == '210') {
				session()->flash('error_message', __("Payment Pending. $ResponseMessage"));
				return redirect()->route('feedeposit.index');

			}
			else {
				session()->flash('error_message', __("Payment Failed. $ResponseMessage "));
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

				session()->flash('success_message', __("Payment Successfull."));
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
// $object

		if($fee){
			$object = new \stdClass;
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
		if($student){
			$students = new \stdClass;
			$students->std_id=$student->id;
			$students->name=$student->s_name.' '.$student->s_fatherName;
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

			return response()->json(['status'=>1,'message'=>'Record found successfully','data'=>isset($object)?$object:null,'student'=>$students]);
		}

		else{
			return response()->json(['status'=>0]);
		}


	}


	public function store(Request $request){
// dd($request->all());
		$fee=FeePost::where('std_id',$request->std_id)->with('student.branch','student.course')->orderBy('id','DESC')->first();

		$student=Student::find($request->std_id);
		$account=Account::where('std_id',$request->std_id)->with('LedgerBalance')->first();



		if(!$student){
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

		$students = new \stdClass;
		$students->std_id=$student->id;
		$students->name=$student->s_name.' '.$student->s_fatherName;
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
		$students->fee_id=isset($object->fee_id)?$object->fee_id:rand(1, 7);


		if($students->total_pending> $request->pp_Amount){
			session()->flash('error_message', __('Amount Should be Equal or greater then $students->total_pending'));
			return redirect()->back();
		}
		if($request->type_method==2 && $object){
			$object->desire_amount=$request->pp_Amount;
			// dd($request->all());
			return view('web.pakistan.feeDeposit.newForm',compact('request','object','students'));
		}else{
			$object->desire_amount=$request->pp_Amount;
			return view('web.pakistan.feeDeposit.paypalChallan',compact('request','object','students'));
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

}
