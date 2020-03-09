<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeePost;
use App\Models\Branch;
class FeeDepositController extends Controller
{
	public function index(){
		// dd($_POST);
		return view('web.pakistan.feeDeposit.challan');
	}


	public function feeDepositstatus(){
		$HashKey= ""; //Your Hash Key
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
				echo "Payment Successfull".$ResponseCode;
				echo "Transaction Message=".$ResponseMessage;
							 // do your handling for success
			} 
			else  if($ResponseCode == '124'||$ResponseCode == '210') {
				echo "Payment Pending".$ResponseCode;
				echo "Transaction Message=".$ResponseMessage;
							// do your handling for faliure
			}
			else {
				echo "Payment Failed".$ResponseCode;
				echo "Transaction Message=".$reqmessage;
			}
			$txnrefno = htmlspecialchars($_POST['pp_TxnRefNo']);
			$reqAmount = htmlspecialchars($_POST['pp_Amount']);
			$reqDatetime = htmlspecialchars($_POST['pp_TxnDateTime']);
			$reqBillref = htmlspecialchars($_POST['pp_BillReference']);
			$reqRetrivalRefNo = htmlspecialchars($_POST['pp_RetreivalReferenceNo ']);
			$reqMerchantID = htmlspecialchars($_POST['pp_MerchantID']);	
		}
		else {
			echo "mismatched marked it suspicious or reject it";				
		}	
	}
	

	public function feeChallan(Request $request){


		// dd($request->all());
		$fee=FeePost::where('std_id',$request->std_id)->with('student.branch','student.course')->where('id',$request->fee_id)->where('paid_amount','<=',0)->first();




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



			return response()->json(['status'=>1,'message'=>'Record found successfully','data'=>$object]);
		}else{
			return response()->json(['status'=>0]);
		}


	}


	public function store(){
			// dd($request->all());
		 $HashKey= ""; //Your Hash Key
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
		 		echo "Payment Successfull".$ResponseCode;
		 		echo "Transaction Message=".$ResponseMessage;
							 // do your handling for success
		 	} 
		 	else  if($ResponseCode == '124'||$ResponseCode == '210') {
		 		echo "Payment Pending".$ResponseCode;
		 		echo "Transaction Message=".$ResponseMessage;
							// do your handling for faliure
		 	}
		 	else {
		 		echo "Payment Failed".$ResponseCode;
		 		echo "Transaction Message=".$reqmessage;
		 	}
		 	$txnrefno = htmlspecialchars($_POST['pp_TxnRefNo']);
		 	$reqAmount = htmlspecialchars($_POST['pp_Amount']);
		 	$reqDatetime = htmlspecialchars($_POST['pp_TxnDateTime']);
		 	$reqBillref = htmlspecialchars($_POST['pp_BillReference']);
		 	$reqRetrivalRefNo = htmlspecialchars($_POST['pp_RetreivalReferenceNo ']);
		 	$reqMerchantID = htmlspecialchars($_POST['pp_MerchantID']);	
		 }
		 else {
		 	echo "mismatched marked it suspicious or reject it";				
		 }	
		}
	}
