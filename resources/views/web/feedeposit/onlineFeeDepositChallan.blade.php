
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALIS | Fee Payments</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">


  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-16x16.png')}}" sizes="16x16" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-32x32.png')}}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-96x96.png')}}" sizes="96x96" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/android-chrome-192x192.png')}}" sizes="192x192" /> 



    <link href="{{asset('web/invoice.css')}}" rel="stylesheet">
  
</head>
<body><style type="text/css">
    .mt--1{
        margin-top: -2px;
    }
    .card-body{
        padding: 0px 1.25rem;
    }
    .accordion_title_info{
        line-height: 33px;    
    }    
    .accordion_title_info a i{
        font-size: 18px;   
    }
    .modal-dialog{
        max-width: 900px;
    }
    #viewPopup h3{
        margin-left: 20px;
    }
    #viewPopup p{
        margin-left: 20px;
        margin-bottom: 10px;
    }
    #viewPopup ol li{
        margin-bottom: 10px;
    }
    p.cart_status{        
        margin-left: 160px !important;
    }
    .cart_added{
        color: #1c84c6;
        font-style: italic;
        font-size: 18px;
    }
    #cart_grid_wrapper th{    
        text-align: center !important;
    }	
</style>
<?php

    $MerchantID ="MC35662"; //Your Merchant from transaction Credentials
    $Password   ="hv920evz9v"; //Your Password from transaction Credentials
    $ReturnURL  ="http://lyceumgroupofschools.com/feedeposit-status"; //Your Return URL 
    $HashKey    ="y14yb32g8s";//Your HashKey from transaction Credentials
    $PostURL = "https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform";
    //"http://testpayments.jazzcash.com.pk/PayAxisCustomerPortal/transactionmanagement/merchantform"; 
    date_default_timezone_set("Asia/karachi");
    $Amount = $data->total_fee; //Last two digits will be considered as Decimal
    $BillReference = "11111";
    $Description = "Thank you for using Jazz Cash";
    $Language = "EN";
    $TxnCurrency = "PKR";
    $TxnDateTime = date('YmdHis') ;
    $TxnExpiryDateTime = date('YmdHis', strtotime('+8 Days'));
    $TxnRefNumber = "T".date('YmdHis');
    $TxnType = "";
    $Version = '1.1';
    $SubMerchantID = "";
    $DiscountedAmount = "";
    $DiscountedBank = "";
    $ppmpf_1="";
    $ppmpf_2="";
    $ppmpf_3="";
    $ppmpf_4="";
    $ppmpf_5="";

    $HashArray=[$Amount,$BillReference,$Description,$DiscountedAmount,$DiscountedBank,$Language,$MerchantID,$Password,$ReturnURL,$TxnCurrency,$TxnDateTime,$TxnExpiryDateTime,$TxnRefNumber,$TxnType,$Version,$ppmpf_1,$ppmpf_2,$ppmpf_3,$ppmpf_4,$ppmpf_5];

    $SortedArray=$HashKey;
    for ($i = 0; $i < count($HashArray); $i++) { 
      if($HashArray[$i] != 'undefined' AND $HashArray[$i]!= null AND $HashArray[$i]!="" )
      {

        $SortedArray .="&".$HashArray[$i];
      } }
      $Securehash = hash_hmac('sha256', $SortedArray, $HashKey);  
      ?>


<div id="wrapper">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <ul class="contact-info">
                        <li>
                            <a href="tel:0346 4292920"><i class="fa fa-phone"></i>0346 4292920</a>
                        </li>
                        <li>
                            <a href="mailto:info@americanlyceum.com"><i class="fa fa-envelope"></i>info@americanlyceum.com</a>
                        </li>
                        <li>
                            <div class="float-left mr-2" style="color:#fff;">in case of any inquiry email at</div>
                            <a href="mailto:account@americanlyceum.com"><i class="fa fa-envelope"></i>accounts@americanlyceum.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="social-icons">
                        <li>
                           <a target="_blank" href="https://www.facebook.com/alyceum/"><i class="fa fa-facebook"></i></a>
                       </li>
                       <li>
                           <a target="_blank" href="https://twitter.com/amlyceum"><i class="fa fa-twitter"></i></a>
                       </li>
                       <li>
                           <a target="_blank" href="https://www.instagram.com/american_lyceum_school_oman"><i class="fa fa-instagram"></i></a>
                       </li>
                   </ul>
               </div>
           </div>
       </div>
   </div>
   <div class="logo_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="logo" href=""></a> 
                <!-- <h4>Student Fee</h4>    -->
                
            </div>
				<!-- <div class="col-md-6 text-right d-none">
					<div class="row">
						<div class="col-sm-10 mt-4">
							<div class="amt">								
								<strong>Total ( <span id="total_count">0</span> ) : </strong>
								<span>PKR 0</span>     
							</div>
						</div>
						<div class="col-sm-2 d-none">
							<a href="javascript:void(0);" class="cart_add" title="view or add cart here"><i class="fal fa-shopping-cart" style="font-size:60px;color:#061d7b;"></i></a>
						</div>
					</div>
				</div> -->
            </div>
        </div>
    </div>
    <div class="invc_wrap">
          @component('_components.alerts-default')
              @endcomponent
       
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="mt_116 f-aid-student-detail" style="display: block;">
                            <div class="invc_inner">
                                <div class="invc_fee_sec">
                                    <div class="stdnt_prfl">
                                        <div class="prfl_img">
                                            
                                            @if(isset($data->student->s_sex) && $data->student->s_sex=='female')

                                            <img src="{{asset('images/girl.jpg')}}" class="rounded-circle circle-border" alt="profile">
                                            @else
                                            <img src="{{asset('images/boy.jpg')}}" class="rounded-circle circle-border" alt="profile">
                                            @endif

                                        </div>
                                    <div class="rgt_stdnt_prfl">
                                        <h3>@isset($data->student->s_name){{$data->student->s_name}}@endisset - @isset($data->student->id){{$data->student->id}}@endisset</h3>

                                        <h5>@isset($data->student->course->course_name){{$data->student->course->course_name}}@endisset </h5>
                                        <h5 class="afw-h5">@isset($data->student->branch->branch_name){{$data->student->branch->branch_name}}@endisset</h5>
                                    </div>
                                </div>    
                                </div>
                                
                                <div class="acc_wrap">
                                    <div class="accordion" id="accordion_transfer">
                                        <div class="card">
                                            <div class="card-header" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true">
                                                <div class="title">
                                                   
                                                    <div class="sbtitl">
                                                        <p class="accordion_title_info"><strong>Fee for</strong>@isset($data->fee_month){{getMonthName($data->fee_month)}}@endisset {{$data->fee_year}} - @isset($data->fee_month){{getMonthName($data->fee_month)}}@endisset {{$data->fee_year}}</p>
                                                        <p class="accordion_title_info"><strong>Amount: </strong><span>{{number_format($data->total_fee)}}</span></p>
                                                       
                                                        <p class="accordion_title_info float-right">
                                                            <!-- <a class=" btn common-blue-btn" title="Preview &nbsp;/ &nbsp; Download" target="_blank" href="javascript:;">Preview/Download
                                                            </a> -->
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapse_1" class="collapse show" data-parent="#accordion_transfer" style="">
                                                <div class="card-body">
                                                    <table class="table small mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border-top:none;"><strong>Invoice Number:</strong></td>
                                                                <td style="border-top:none;">{{$data->id}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Fee Cycle:</strong></td><td>@isset($data->fee_month){{getMonthName($data->fee_month)}}@endisset {{$data->fee_year}} - @isset($data->fee_month){{getMonthName($data->fee_month)}}@endisset {{$data->fee_year}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Due date:</strong></td>
                                                                <td>
                                                                     @if($data->outstand_lastmonth > 0)
                                                                        {{date("d-M-Y", strtotime($data['fee_due_date2']))}}
                                                                        @else
                                                                        {{date("d-M-Y", strtotime($data['fee_due_date1']))}}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Valid date:</strong></td>
                                                                <td>@if($data->outstand_lastmonth > 0)
                                                                        {{date("d-M-Y", strtotime($data['fee_due_date2']))}}
                                                                        @else
                                                                        {{date("d-M-Y", strtotime($data['fee_due_date1']))}}
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Amount:</strong></td><td>{{number_format($data->total_fee)}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="amnt_sec">                                
                                    <div class="trms_sec">
                                        <div class="checkbox " style="margin-top: 8px;">
                                            <input id="terms_conditions" type="checkbox">
                                            <label for="terms_conditions"></label>
                                        </div>
                                        <p>I have read and agreed to the 
                                            <!-- <a href="javascript:;" data-target="javascript:;" data-toggle="modal">Terms &amp; Conditons</a> -->
                                            <a href="javascript:;" >Terms &amp; Conditons</a>
                                        </p> 
                                    </div>
                                    
                                    <div class="bilng_sec mr-5">
                                          <form   action="{{route('feedeposit.store')}}" id="applicationForm"  method="POST" enctype="multipart/form-data">
                                            @csrf
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

                                              <input type="hidden" class="type_method" name="type_method" value="2" />

                                            <input type="hidden" id="std_id" value="{{$data->std_id}}"   name="std_id" />
                                        <div class="pay_sec">                                           
                                            <button type="submit" id="" class=" btn common-blue-btn">
                                                Pay Now
                                            </button>

                                            </form>
                                        </div>
                                    </div>
                                    <div class="amt float-right mt-2 mr-3">                             
                                        <p><strong>Total:</strong> PKR {{number_format($data->total_fee)}}</p>     
                                    </div>
                                  
                                    
                                    <div class="clearfix">
                                        <div style="float: left;clear: both;margin-top: 12px;color:#000;">
                                            <!-- <h6>If you are paying multiple challans, please enter the student ID in the search box, and then click Add to Cart</h6> -->
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>    
                    </div>    
                </div>
                
                
            </div>
        
        </div>
    </div>

