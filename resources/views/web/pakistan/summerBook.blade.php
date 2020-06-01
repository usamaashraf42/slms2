@extends('_layouts.web.pakistan.default')
@section('title', 'Summer Book Order')

@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


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


    /* Dropdown button on hover & focus */

    .dropbtn:hover,
    .dropbtn:focus {
      background-color: #ededed;
    }


    /* The container <div> - needed to position the dropdown content */

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
  </style>
  <div  class="form_layout">
  </div>


  <div class="scrollable" style="
  height: 143px;
  padding: 56px;
  width: 200;
  padding-bottom: 44px;
  margin-top: 128px;
  min-height: 100%;
  background: linear-gradient(0deg, rgb(0, 0, 0, 0.6), rgb(0, 0, 0,0.6)), url(http://127.0.0.1:8000/images/job_imags.jpg);
  background-size: cover;"
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
<div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative" style="padding-top: 0px!important;">
  <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
  </div>
</div>
<div class="clear-fix"></div>
<div class="" style="background-image: url('');">


  <section class="default-main content-start relative bg-white">

    <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">


      <ul id="breadcrumb"><li id="bc-home"> <a href="javascript:;" class="first"></a></li><li id="bc-admissions"> <a href="#">Summer Book</a></li><li id="bc-how-to-apply"> <a href="#" class="current">order</a></li></ul>
      <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

      </div>

    </div>

    <div class="flex container flex-row-ns flex-column flex-wrap mw12 center relative" style="margin-top: 30px;  border: 1px solid #ccc;margin-bottom: 20px; box-shadow: 0px 2px 2px #ccc;">

 <form  action="{{route('summerBookCharge')}}" id="applicationForm"  method="POST" enctype="multipart/form-data">
      @if(Session::has('error_message'))
      <script type="text/javascript">
        sweetAlert(
          'Ops',
          'please try again',
          'danger'
          )
        </script>
        @endif
        @if(Session::has('success_message'))
        <script type="text/javascript">
          sweetAlert(
            'thank you',
            'Your order has been submitted Successfully . You will receive your order within 7 working days',
            'success'
            )
          </script>
          @endif
         
            @csrf
            <div class="col-md-12">
              <div class="row"  style="margin-top: 20px;">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div  class="form-group required">
                    <label for="std_id" class="control-label requiredField">Student Id                         
                      <span class="required" style="color: red">*</span> 
                    </label>
                    <input class=" form-control" id="std_id" value="@if(old('std_id')){{old('std_id')}}@endif"  name="std_id"
                    placeholder="Please enter the Roll No" value="" style="margin-bottom: 20px;"  />
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
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <input type="button"  class="btn btn-info btn-sm validateButton   float-left"   onclick="jobFormSubmit(this)"  value="Search">
               </div>
             </div>
           </div>
           <div class="row" id="feeChallan">

           </div>
           <div>
            <div class="col-md-12 " >
             <div class="row" >
              <div class="col-md-8"></div>
              <div class="col-md-2 float-right" style="float:right">

              </div>
              <div class="col-md-2 float-right" style="float:right">

                <button class="btn btn-success btn-sm submitButton float-left" type="button" onclick="FormSubmit(this)"   style="display: none; "  value="submit">submit </button>


              </div>
            </div>
          </div>
        </div>



    </div>




  </div>

  <div class="side-section w-30-l w-30-m w-100 pl4-l pl3-m">

  </div>
</div>

</div>

<div id="section-one" class="section-one relative w-100 overflow-hidden">
  <div class="photo-background">

  </div>
  <div class="flex flex-row-ns flex-wrap flex-column w-100 relative mw8 center">

  </div>
</div>

<div id="section-two" class="section-two relative w-100 overflow-hidden">
  <div class="photo-background">

  </div>
  <div class="flex flex-row-ns flex-wrap flex-column w-100 relative">

  </div>
</div>

<div id="section-three" class="section-three relative w-100 overflow-hidden">
  <div class="photo-background">

  </div>
  <div class="flex flex-row-ns flex-wrap flex-column w-100 relative">

  </div>
</div>

<div id="section-four" class="section-four relative w-100 overflow-hidden">
  <div class="flex flex-row-ns flex-wrap flex-column w-100 relative">

  </div>
</div>

</section>

</div>
</div>
</section>
@endsection

@push('post-scripts')

<script>


  function FormSubmit(obj){
console.log('form submit');

   document.getElementById("applicationForm").submit();
 }


</script>

<script>

 function refreshwindow(obj){
  console.log('reload');
  location.reload(true);
}


</script>
<script>


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
           <input class="input-md  textinput textInput form-control" id="std_id" value="${response.student.std_mail?response.student.std_mail:''}"   name="email"
           placeholder="Please enter the email" value="" style="margin-bottom: 10px;"  />

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


@endpush
