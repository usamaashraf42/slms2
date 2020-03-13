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


	public function store(Request $request){
// dd($request->all());
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

		if($object->total_payable> $request->pp_Amount){
			session()->flash('error_message', __('Amount Should be Equal or greater then $object->total_payable'));
			return redirect()->back();
		}
		if($request->type_method==2 && $object){
			$object->desire_amount=$request->pp_Amount;
			// dd($request->all());
			return view('web.pakistan.feeDeposit.newForm',compact('request','object'));
		}else{
			$object->desire_amount=$request->pp_Amount;
			return view('web.pakistan.feeDeposit.paypalChallan',compact('request','object'));
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
