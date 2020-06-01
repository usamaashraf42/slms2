@extends('_layouts.web.pakistan.default')
@section('title', 'Summer Book Order')
@section('content')

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
}">Summer Book Order </h2>
</div>
</div>

<?php

    $MerchantID ="MC35662"; //Your Merchant from transaction Credentials
    $Password   ="hv920evz9v"; //Your Password from transaction Credentials
    $ReturnURL  ="http://lyceumgroupofschools.com/feedeposit-status"; //Your Return URL 
    $HashKey    ="y14yb32g8s";//Your HashKey from transaction Credentials
    $PostURL = "https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform";
    //"http://testpayments.jazzcash.com.pk/PayAxisCustomerPortal/transactionmanagement/merchantform"; 
    date_default_timezone_set("Asia/karachi");
    $Amount = 1*100; //Last two digits will be considered as Decimal
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
                  <form   action="{{route('summerBookCharge')}}" id="applicationForm"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body" style="border:1px solid #ccc; margin-bottom: 20px;">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="div_id_username" class="form-group required">
                            <label for="std_id" class="control-label requiredField">Student Id                         
                              <span class="required" style="color: red">*</span> 
                            </label>
                            <div class="controls">
                              <input class=" form-control" id="std_id" value="@if(old('std_id')){{old('std_id')}}@endif"  name="std_id"
                              placeholder="Please enter the Roll No" value="" style="margin-bottom: 10px;"  />
                              <p class="std_id-error" style="display: none; color:red;"></p>
                              @if ($errors->has('std_id'))
                              <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                  <span class="sr-only">Close</span>
                                </button>
                                <strong>Warning!</strong> {{$errors->first('std_id')}}
                              </div>
                              @endif
                            </div>
                          </div>
                        </div>





                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="button"  class="btn btn-info btn-sm validateButton   float-left"   onclick="jobFormSubmit(this)"  value="Search">
                       </div>



                
                 <!-- //////////////////???????????????????? start ????????????????????????????????? -->
                 <div class="row" id="feeChallan">

                 </div>


                 <!-- /////////////////////////////  end display none????????????????????????????????? -->
               </div>
             </div>
           </div>
         </div>
         <div class="col-md-12 " >
           <div class="row" >
            <div class="col-md-8"></div>
            <div class="col-md-2 float-right" style="float:right">
             <!-- <input type="button"  class="btn btn-info btn-sm   float-left"   onclick="refreshwindow(this)"  value="back"> -->
           </div>
           <div class="col-md-2 float-right" style="float:right">

            <button class="btn btn-success btn-sm submitButton float-left" onclick="FormSubmit(this)"   style="display: none; "  value="submit">submit </button>
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

<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>



<script>

  $("#phone").inputmask({"mask": "99999999999"});

  function FormSubmit(obj){

   $amount=$('.pp_Amount').val();

   document.getElementById("applicationForm").submit();
 }


</script>

<script>

 function refreshwindow(obj){
  location.reload(true);
}

$("#applicationForm").on("submit", function(event) {
  event.preventDefault();
  $(this).off("submit");
  this.submit();
});
</script>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function my_drowpdown() {
  document.getElementById("myDropdown").classList.toggle("whr-drop-hide");
}
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('whr-drop-hide')) {
        openDropdown.classList.remove('whr-drop-hide');
      }
    }
  }
}



function jobFormSubmit(ob){


  $('.std_id-error').css('display','none');
   $('#feeChallan').html('');

  var valid = true;   


  console.log('jobFormSubmit');
  $('.std_id-error').css('display','none');
  $('.fee_id_error').css('display','none');
  
  var fee_id=parseInt($('#fee_id').val());
  var std_id=parseInt($('#std_id').val());
  if ($('#std_id').val() == '') {
    console.log('name',$('#name').val());
    $('.std_id-error').text('std Id field is required');
    $('.std_id-error').css('display','block','color','red','border-color','red');

    valid = false;
  }


  if(valid){




    $.ajax({
      method:"POST",
      url: "{{route('feeChallan')}}",
      data : {'std_id':std_id},
      dataType:"json",
      success: function (response) {
        console.log('feeChallan', response);

        if (response.status) {
         $('#std_id').prop('readonly', true);
         $('.validateButton').css('display','none');
         $('.pp_Amount').val(response.student.total_payable);
         $('.pp_BillReference').val(response.student.fee_id);
         $('.TxnRefNumber').val(response.student.fee_id);
         $('.ppmpf_1').val(response.student.feed_id);
         $('.ppmpf_2').val(std_id);

         var content=`<div class="col-md-9">
         <div style="margin: 0 0 2em 0;
         padding: 1em 1em 1.5em 1em;
         background: #fff;
         ">

         <div class="col-md-6 col-sm-6 col-xs-12">
         <div id="div_id_username" class="form-group required">
         <label for="std_name" class="control-label requiredField">Student Name                         
         <span class="required" style="color: red">*</span> 
         </label>
         <div class="controls">
         <input class="input-md  textinput textInput form-control" id="std_name"  readonly value="${response.student.name}"    name="std_name"
         value="" style="margin-bottom: 10px;"  />


         </div>
         </div>
         </div>



         <div class="col-md-6 col-sm-6 col-xs-12">
         <div id="div_id_username" class="form-group required">
         <label for="father_name" class="control-label requiredField">Student Father Name                         
         <span class="required" style="color: red">*</span> 
         </label>
         <div class="controls">
         <input class="input-md  textinput textInput form-control" id="father_name" value="${response.student.s_fatherName}"   min="0" name="father_name"
         placeholder="Please enter the Father name" value="" style="margin-bottom: 10px;" readonly />

         </div>
         </div>
         </div>


         <div class="col-md-6 col-sm-6 col-xs-12">
         <div id="div_id_username" class="form-group required">
         <label for="class_id" class="control-label requiredField">Class                        
         <span class="required" style="color: red">*</span> 
         </label>
         <div class="controls">
         <input class="input-md  textinput textInput form-control" id="class_id" value="${response.student.course}"   min="0" name="class_id"
         placeholder="Please enter the Roll No" value="" style="margin-bottom: 10px;" readonly />

         </div>
         </div>
         </div>

         <div class="col-md-6 col-sm-6 col-xs-12">
         <div id="phone" class="form-group required">
         <label for="phone" class="control-label requiredField">Phone (Update Delivery Phone Number)                       
         <span class="required" style="color: red">*</span> 
         </label>
         <div class="controls">
         <input class="input-md  textinput textInput form-control" id="phone" value="${response.student.s_phoneNo?response.student.s_phoneNo:''}"   name="phone"
         placeholder="Please enter the phone" value="" style="margin-bottom: 10px;"  />

         </div>
         </div>
         </div>

         <div class="col-md-6 col-sm-6 col-xs-12">
         <div id="div_id_username" class="form-group required">
         <label for="email" class="control-label requiredField">Email (Update Email)                        
         </label>
         <div class="controls">
         <input class="input-md  textinput textInput form-control" id="std_id" value="${response.student.std_mail?response.student.std_mail:''}"   min="0" name="email"
         placeholder="Please enter the email" value="" style="margin-bottom: 10px;" type="number" />

         </div>
         </div>
         </div>

         <div class="col-md-6 col-sm-6 col-xs-12">
         <div id="address" class="form-group required">
         <label for="address" class="control-label requiredField">Home Address (Update Delivery Address)                        
         <span class="required" style="color: red">*</span> 
         </label>
         <div class="controls">
         <textarea class="input-md  textinput textInput form-control" id="address"  min="0" name="address" placeholder="Please enter the address" value="" style="margin-bottom: 10px;"  > ${response.student.home_address?response.student.home_address:''}</textarea> 

         </div>
         </div>
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12">
         <div id="book_charge" class="form-group required">
         <label for="book_charge" class="control-label requiredField"> Summer Book Charge                   
         </label>
         <div class="controls">
         <input class="input-md  textinput textInput form-control" id="book_charge" readonly value="300" name="book_charge"  vstyle="margin-bottom: 10px;" type="number" >

         </div>
         </div>
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12">
         <div id="delivery_charge" class="form-group required">
         <label for="delivery_charge" class="control-label requiredField"> Delivery Charge                 

         </label>
         <div class="controls">
         <input class="input-md  textinput textInput form-control" id="delivery_charge" readonly  value="120" name="delivery_charge"  vstyle="margin-bottom: 10px;" type="number" >

         </div>
         </div>
         </div>




         </div>`;

         $('#feeChallan').append(content);
         $('.submitButton').css('display','block');

       } else {
        console.log('status false', response);
        $('.std_id-error').text('std Id is not valid.');
        $('.std_id-error').css('display','block','color','red','border-color','red');
        $('.validateButton').css('display','block');

       // location.reload(true);
     }
   },
   error: function () {
    swal(
      'Oops...',
      'Something went wrong!',
      'error'
      )
  }
});
}
}

function AmountConstraint(obj){
  console.log($(obj).attr('data-amount'),'amount');

  var finalAmount=parseInt($(obj).attr('data-amount'));
  var partialAmount=parseInt($(obj).val());


  // if ($(obj).val() < finalAmount){
  //   console.log('amount',finalAmount);
  //   var content=`Amount not allowed Less then ${finalAmount}`;
  //   // alert(content);
  //   $(obj).val(finalAmount);
  // }

  $('.pp_Amount').val(partialAmount);

}



function checkedMethod(obj){
    // $(obj).val(this.checked);
    console.log('checkmethod',obj);
    $(obj).prop("checked");

    var method=parseInt($(obj).val());
    $('.type_method').val(method);
    
  }






</script>


@endsection
