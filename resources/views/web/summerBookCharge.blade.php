@extends('_layouts.web.pakistan.default')
@section('title', 'Summer Book Charge Verification')
@section('content')
<
<div id="siteWrapper" class="slide-right" style="overflow:hidden;">
	<div class="body-overlay"></div>
	<style>
		.form-control {
			width: 100%;
		}
		.multiselect-container {
			box-shadow: 0 3px 12px rgba(0,0,0,.175);
			margin: 0;
		}
		.multiselect-container .checkbox {
			margin: 0;
		}
		.multiselect-container li {
			margin: 0;
			padding: 0;
			line-height: 0;
		}
		.multiselect-container li a {
			line-height: 25px;
			margin: 0;
			padding:0 35px;
		}
		.custom-btn {
			width: 100% !important;
		}
		.custom-btn .btn, .custom-multi {
			text-align: left;
			width: 100% !important;
		}
		.dropdown-menu > .active > a:hover {
			color:inherit;
		}
		.chosen-container-multi .chosen-choices {
			padding: 2px 5px!important;
			border-radius: 5px!important;
			height: auto!important;
			border: 1px solid #484242!important;
		}
		label {
			width: 100%;
			display: flex;
			margin-bottom: 5px;
			font-weight: 700;
		}
		.radio-inline + .radio-inline, .checkbox-inline + .checkbox-inline {
			margin-top: 0;
			margin-left: 0px!important;
		}
		.chosen-select{
			max-width: 350px!important;
		}
		#country_id{
			max-width: 350px!important;
			height: 32px;
		}
		.select2-selection__rendered{
			max-width: 350px!important;
		}
		/* Dropdown Button */
		.acdmics_heading{
			font-weight: bold;
			background: aliceblue;
			margin-bottom: 10px;
			padding: 8px 2px;
			text-align: center;  
		}
		.dropbtn {
			background-color: #ececec;
			color: #000000;
			padding: 10px;
			font-size: 1em;
			border: none;
			cursor: pointer;
			border: 1px solid #ddd;
			font-family: sans-serif;
			width: 100%;
			min-width: 90px;
			border-radius: 2px;
		}
		.dropbtn:hover,
		.dropbtn:focus {
			background-color: #ededed;
		}
		.dropdown {
			position: relative;
			display: inline-block;
		}
		/* Dropdown Content (Hidden by Default) */
		.dropdown-content {
			display: none;
			position: absolute;
			z-index: 9;
			background-color: #ffffff;
			border-top-left-radius: 2px;
			border-top-right-radius: 2px;
			border-bottom: 4px solid #1F45A3;
			min-width: 110px;
			box-shadow: 0px 2px 20px 0px rgba(31, 69, 163, 0.25);
			padding: 3px;
		}
		/*Drop down radio and label main div*/
		.whr-drop-main {
			width: 100%;
			float: left;
			margin-top: 3%;
			margin-bottom: 5%;
		}
		/* Links inside the dropdown */
		/*Radio Button Class*/
		.whr-used-drop {
			float: left;
		}
		/*Label Class*/
		.whr-used-drop-lbl {
			font-family: sans-serif;
			font-size: 1em;
			color: #3D3D3D;
		}
		/* Show/Hide the dropdown menu (JS) when the user clicks on the dropdown button) */
		.whr-drop-hide {
			display: block;
		}
		.chosen-choices{
			max-width: 350px!important;
			height: 32px!important;
		}
		#residence{
			max-width: 350px;
		}
		.table_1 td th{
			border: 1px solid #ccc;
			padding: 0px 2px!important;
		}
		.check_box {

			padding: 5px;
			margin-top: 12px;
		}
		@import url('https://fonts.googleapis.com/css?family=Lato');
		.list_radio{
			color: #AAAAAA;
			display: block;
			position: relative;
			float: left;
			width: 100%;
			height: 100px;
			border-bottom: 1px solid #333;
		}
		ul li input[type=radio]{
			position: absolute;
			visibility: hidden;
		}
		ul li label{
			display: block;
			position: relative;
			font-weight: 300;
			font-size: 1.35em;
			padding: 25px 25px 25px 80px;
			margin: 10px auto;
			height: 30px;
			z-index: 9;
			cursor: pointer;
			-webkit-transition: all 0.25s linear;
		}

		ul li:hover label{
			color: #FFFFFF;
		}

		ul li .check{
			display: block;
			position: absolute;
			border: 5px solid #AAAAAA;
			border-radius: 100%;
			height: 25px;
			width: 25px;
			top: 30px;
			left: 20px;
			z-index: 5;
			transition: border .25s linear;
			-webkit-transition: border .25s linear;
		}

		ul li:hover .check {
			border: 5px solid #000;
		}

		ul li .check::before {
			display: block;
			position: absolute;
			content: '';
			border-radius: 100%;
			height: 15px;
			width: 15px;

			margin: auto;
			transition: background 0.25s linear;
			-webkit-transition: background 0.25s linear;
		}

		input[type=radio]:checked ~ .check {
			border: 5px solid #162c6f;
		}

		input[type=radio]:checked ~ .check::before{
			background: #162c6f;
		}

		input[type=radio]:checked ~ label{
			color: #162c6f;
		}


/* Styles for alert... 
by the way it is so weird when you look at your code a couple of years after you wrote it XD */

.alert {
	box-sizing: border-box;
	background-color: #BDFFE1;
	width: 100%;
	position: relative; 
	top: 0;
	left: 0;
	z-index: 300;
	padding: 20px 40px;
	color: #333;
}

.alert h2 {
	font-size: 22px;
	color: #232323;
	margin-top: 0;
}

.alert p {
	line-height: 1.6em;
	font-size:18px;
}

.alert a {
	color: #232323;
	font-weight: bold;
}
.img_box_paypal{
	max-width: 200px;
}
</style>
<div  class="form_layout">
</div>
<div class="scrollable" style="
height: 160px;
padding: 56px;
width: 200;
padding-bottom: 44px;
margin-top: 100px;
min-height:100%;
background:linear-gradient(0deg, rgb(0, 0, 0, 0.6), rgb(0, 0, 0,0.6)),  url('{{asset('images/job_imags.jpg')}}');
background-size:cover;"
>
<h2 class="apply_now" style="margin-top: 120px;
text-align: center;
text-shadow: 0px 4px 2px #000000;
font-size: 36px;
margin: 0 auto;
color: white;
padding: 6px;
border-bottom-right-radius: 25px;
border-bottom-left-radius: 25px;
}">Verification</h2>
</div>
</div>

<?php

     $MerchantID ="00168054"; //Your Merchant from transaction Credentials
    $Password   ="55589342s0"; //Your Password from transaction Credentials
    $ReturnURL  ="https://lyceumgroupofschools.com/feedeposit-status"; //Your Return URL 
    $HashKey    ="txtw58z1x0";//Your HashKey from transaction Credentials
    $PostURL = "https://payments.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform";
    //"http://testpayments.jazzcash.com.pk/PayAxisCustomerPortal/transactionmanagement/merchantform"; 
    date_default_timezone_set("Asia/karachi");
    $Amount = $object->desire_amount; //Last two digits will be considered as Decimal
    $BillReference = $fees->id;
    $Description = "Thank you for using Jazz Cash";
    $Language = "EN";
    $TxnCurrency = "PKR";
    $TxnDateTime = date('YmdHis') ;
    $TxnExpiryDateTime = date('YmdHis', strtotime('+8 Days'));
    $TxnRefNumber = $fees->id;
    $TxnType = "";
    $Version = '1.1';
    $SubMerchantID = "";
    $DiscountedAmount = "";
    $DiscountedBank = "";
    $ppmpf_1=$fees->id;
    $ppmpf_2=$student->id;
    $ppmpf_3="";
    $ppmpf_4="";
    $ppmpf_5="3";
// dd($TxnRefNumber);
    $HashArray=[$Amount,$BillReference,$Description,$DiscountedAmount,$DiscountedBank,$Language,$MerchantID,$Password,$ReturnURL,$TxnCurrency,$TxnDateTime,$TxnExpiryDateTime,$TxnRefNumber,$TxnType,$Version,$ppmpf_1,$ppmpf_2,$ppmpf_3,$ppmpf_4,$ppmpf_5];

    $SortedArray=$HashKey;
    for ($i = 0; $i < count($HashArray); $i++) { 
    	if($HashArray[$i] != 'undefined' AND $HashArray[$i]!= null AND $HashArray[$i]!="" )
    	{

    		$SortedArray .="&".$HashArray[$i];
    	} }
    	$Securehash = hash_hmac('sha256', $SortedArray, $HashKey);  
    	?>
    	<div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">
    		<div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
    		</div>
    	</div>
    	<div class="clear-fix"></div>
    	<div class="container" style="background-image: url('');">
    		<section id="contact-page" class="pt-90 pb-120 white-bg">
    			<div style="    width: 100%;
    			height: 4px;
    			background-color: #d1d2d4;">
    			<h5 style="text-align: center;color: #fff;padding-top: 5px;"></h5>
    		</div>
    		<div class="col-md-12" style=" padding: 20px; margin: 0 auto; border: 1px solid #ccc; width: 100%;box-shadow: 0px 4px 4px #bbb;">
    			<div class="row">
    				<div class="">
    					@component('_components.alerts-default')
    					@endcomponent
    					<div id="signupbox"  class="mainbox col-md-12  col-sm-12 col-xs-12">
    						<div>
    							<form   action="https://payments.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform" id="applicationForm"  method="POST" enctype="multipart/form-data">
    								@csrf
    								<div class="panel-body" style="border:1px solid #ccc; margin-bottom: 20px;">
    									<div class="row">
    										<div class="col-md-12 col-sm-12 col-xs-12">
    											
    											


    											<input type="hidden" name="pp_Version" value="<?php echo $Version; ?>" />
    											<input type="hidden" name="pp_TxnType" value="<?php echo $TxnType; ?>" />
    											<input type="hidden" name="pp_Language" value="<?php echo $Language; ?>" />
    											<input type="hidden" name="pp_MerchantID" value="<?php echo $MerchantID; ?>" />
    											<input type="hidden" name="pp_SubMerchantID" value="<?php echo $SubMerchantID; ?>" />
    											<input type="hidden" name="pp_Password" value="<?php echo $Password; ?>" />
    											<input type="hidden" name="pp_TxnRefNo" class="TxnRefNumber" value="<?php echo $TxnRefNumber; ?>"/>
    											<input type="hidden" name="pp_Amount" class="pp_Amount" value="<?php echo $Amount; ?>" />
    											<input type="hidden" name="pp_TxnCurrency" value="<?php echo $TxnCurrency; ?>"/>
    											<input type="hidden" name="pp_TxnDateTime" value="<?php echo $TxnDateTime; ?>" />
    											<input type="hidden" name="pp_BillReference" class="pp_BillReference" value="<?php echo $BillReference ?>" />
    											<input type="hidden" name="pp_Description" value="<?php echo $Description; ?>" />
    											<input type="hidden" id="pp_DiscountedAmount" name="pp_DiscountedAmount" value="<?php echo $DiscountedAmount ?>">
    											<input type="hidden" id="pp_DiscountBank" name="pp_DiscountBank" value="<?php echo $DiscountedBank ?>">
    											<input type="hidden" name="pp_TxnExpiryDateTime" value="<?php echo  $TxnExpiryDateTime; ?>" />
    											<input type="hidden" name="pp_ReturnURL" value="<?php echo $ReturnURL; ?>" />
    											<input type="hidden" name="pp_SecureHash" value="<?php echo $Securehash; ?>" />
    											<input type="hidden" name="ppmpf_1" class="ppmpf_1" value="<?php echo $ppmpf_1; ?>" />
    											<input type="hidden" name="ppmpf_2" class="ppmpf_2" value="<?php echo $ppmpf_2; ?>" />
    											<input type="hidden" name="ppmpf_3" value="<?php echo $ppmpf_3; ?>" />
    											<input type="hidden" name="ppmpf_4" value="<?php echo $ppmpf_4; ?>" />
    											<input type="hidden" name="ppmpf_5" value="<?php echo $ppmpf_5; ?>" />


    										</div>
    									</div>

    								<!-- //////////////////???????????????????? start ????????????????????????????????? -->
    								<div class="row" id="feeChallan">

    									<div style="margin: 0 0 2em 0;
    									padding: 1em 1em 1.5em 1em;
    									background: #fff;
    									">

    									<div class="col-md-7">
    										<div class="receipt-header" style="border: 1px solid #ccc;
    										padding: 12px;text-align: center; ">
    										<div class="receipt-right" style="text-align: center;">
    											<div class="box_filed"> <h4><b style="color:red">{{$student->s_name}}</b></h4>  </div>
    											<div class="box_filed"> <h4><b style="color:red">{{$student->s_fatherName}}</b></h4>  </div>

    											<div class="box_filed"><STRONG>@isset($student->branch->branch_name){{$student->branch->branch_name}} @endisset</STRONG></div>
    											<div class="box_filed"><STRONG>@isset($student->s_phoneNo){{$student->course->course_name}} @endisset </STRONG></div>

    											<div class="box_filed"><STRONG>@isset($student->s_phoneNo){{$student->s_phoneNo}} @endisset </STRONG></div>
    											<div class="box_filed"><STRONG>@isset($student->std_mail){{$student->std_mail}} @endisset </STRONG></div>
    											<div class="box_filed"><STRONG>@isset($request->address){{$request->address}} @endisset </STRONG></div>

    										</div>

    										<div class="receipt-left">
    											<!-- <img class="img-responsive" alt="iamgurdeeposahan" src="@if(isset($student->images) && $student->images){{asset('images/student/pics/'.$student->images)}} @else {{asset('assets/img/user.jpg')}} @endif" width="100%"  style="max-width: 180px;margin: 0 auto;"> -->
    											<br>
    										</div>
    										<div class="clearfix"></div>
    										


    									</div>
    								</div>
    								<div class="col-md-5">
    									
    									<div style="width: 70%; float: left; text-align: justify;">
    										
    										<p style="font-size:20px;">
    											<b> Amount going to be charged from you: </b>
    										</p>
    									</div>
    									<div style="width: 30%;float: right; text-align: right;padding-right: 15px; ">

    											<h2 style="font-size:32px;"><strong><i class="fa fa-inr"></i> {{$object->pp_Amount}}/-</strong></h2>

    										</div>
    									</div>


    								</div>

    							</div>


    							<!-- /////////////////////////////  end display none????????????????????????????????? -->
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-12">
    				<div class="row">
    					<div class="col-md-10"></div>
    					<div class="col-md-2">

    					<!--    <input type="button" class="btn btn-info btn-lg validateButton "   onclick="jobFormSubmit(this)"  id="updateDataBtn" value="Submit"> -->
    					<input type="submit" class="btn btn-success btn-lg submitButton"   style="display: block;"  id="updateDataBtn" value="OK">
    				</div>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
</section>
</div>
</div>
</div>
</div>



@endsection
