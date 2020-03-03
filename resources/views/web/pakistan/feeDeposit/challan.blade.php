@extends('_layouts.web.pakistan.default')
@section('title', 'Fee Deposit')
@section('content')
<div id="search-container" class="bg-dark-blue invert">
  <a id="search-close" class="close-location pull-right no-style f7">CLOSE <span class="icon icon-x f5 ml1 relative white dib bg-gold"></span></a>
  <div class="pv3">
    <script type="text/javascript">
// <![CDATA[
$(document).ready(function() {
  $("#searchButton").click(function() { return send(); });
  $("#searchField").keypress(function(evt) {
   if (evt.keyCode == 13) {
    return send();
  }
});
  $("#searchField").click(function() { $(this).val(""); });
  function send() {
   val = $("#searchField").val();
   if (val != "") window.location = "/searchresults.aspx?s=" + escape(val);
   return false;
 }
});
//  ]]>
</script>
<div class="searchPanel">

  <label style="position: absolute;width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip: rect(0,0,0,0);border: 0;" class="sw-site-search-label sr-only" for="searchField">Search</label>
  <input type="text" id="searchField" class="searchField" value="Search" title="Search the Site" />
  <input type="button" id="searchButton" class="searchButton" value="Go" />
</div>

<span class="light-gray pt2 ph3 dib f6">Enter your search term and press enter. Press Esc or X to close.</span>
</div>
</div>
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
}">Fee Deposit </h2>
</div>
</div>
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
            <form   action="javascript:;" id="applicationForm"  method="POST" enctype="multipart/form-data">
              @csrf

              <div class="panel-body" >
                <div class="row">
                  <div class="col-md-9 col-sm-10 col-xs-12">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div id="div_id_username" class="form-group required">
                        <label for="std_id" class="control-label requiredField">Roll No                         
                          <span class="required" style="color: red">*</span> 
                        </label>
                        <div class="controls">
                          <input class="input-md  textinput textInput form-control" id="std_id" value="@if(old('std_id')){{old('std_id')}}@endif"   min="0" name="std_id"
                          placeholder="Please enter the Roll No" value="" style="margin-bottom: 10px;" type="number" />
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
                      <div id="div_id_username" class="form-group required">
                        <label for="fee_id" class="control-label requiredField">Voucher Id                        
                          <span class="required" style="color: red">*</span> 
                        </label>
                        <div class="controls">
                          <input class="input-md  textinput textInput form-control" id="fee_id" value="@if(old('fee_id')){{old('fee_id')}}@endif"  min="0" name="fee_id"
                          placeholder="Please enter the Voucher No" value="" style="margin-bottom: 10px;" type="number" />
                          <p class="fee_id_error" style="display: none; color:red;"></p>
                          @if ($errors->has('fee_id'))
                          <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                              <span class="sr-only">Close</span>
                            </button>
                            <strong>Warning!</strong> {{$errors->first('fee_id')}}
                          </div>
                          @endif
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      <div class="col-md-12">
  <div class="modal-footer">

    <input type="button" class="btn btn-info btn-lg"  data-dismiss="modal" onclick="jobFormSubmit(this)"  id="updateDataBtn" value="Submit">
  </div>
</div>
</form>
    </div>
  </div>
</section>








</div>
</div>
<div class="row">
  <div class="container">
  <div class="col-md-6">
    
  </div>
  <div class="col-md-6">
<div style="padding: 20px; border: 1px solid #ddd; margin: 15px;">

            <div class="row">
          <div class="receipt-header">
          <div class="col-xs-6 col-sm-6 col-md-6">
      
            <div class="receipt-left">
              <img class="img-responsive" alt="iamgurdeeposahan" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" style="width: 81px;">
                <br>
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 text-right">
            <div class="receipt-right" style="text-align: justify;">
                <STRONG>SADDAM BHATTI</STRONG><br>
              <STRONG>Lyc No. 112233</STRONG><br>
                <STRONG>Branch </STRONG>
              <straong>Red (v) </straong>

          <p><b>Date :</b> 15 Aug 2016</p>
     
            </div>
          </div>
        </div>
            </div>
      
      <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fee-Id</th>
                            <th>Month</th>
                             <th>Year</th>
                             <th>Due Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1234</td>
                        <td>03</td>
                        <td>2020</td>
                        <td>03-03-2020</td>
                        <td>15000/-</td>
                      </tr>
                    </tbody>
                </table>
                <div style="width: 50%; float: left;">
                            <p>
                                <strong>Total Amount: </strong>
                            </p>
                            <p>
                                <strong>Late Fees: </strong>
                            </p>
              <p>
                                <strong>Payable Amount: </strong>
                            </p>
              <p>
                                <strong>Balance Due: </strong>
                            </p>
           
                            <p>
                              <h2><strong>Total: </strong></h2>
                           </div>
                           <div style="width: 50%;float: right;">
                             
                         
                                <strong><i class="fa fa-inr"></i> 65,500/-</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> 500/-</strong>
                            </p>
              <p>
                                <strong><i class="fa fa-inr"></i> 1300/-</strong>
                            </p>
              <p>
                                <strong><i class="fa fa-inr"></i> 9500/-</strong>
                            </p>
                            <h2><strong><i class="fa fa-inr"></i> 31.566/-</strong></h2>
             </div>
    
<hr>
  <p style="width: 100%;border: 1px solid #ccc;">Thank you for your business!</p>
</div>    
  </div>
</div>

</div>
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 

<script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

<script type="text/javascript">




 $("#fee_due_date1").AnyPicker({
   mode: "datetime",
   dateTimeFormat: " dd-MMM-yyyy",
 });

</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
<script type="text/javascript" src="{{asset('assets/chosen/chosen.jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/chosen/init.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/chosen/chosen.css')}}">


<script type="text/javascript">
  $('.nationality').select2();
  $('.residence').select2();
  $(".chosen-select").chosen({max_selected_options: 3});
  $(".chosen-select-branch").chosen({max_selected_options: 3});

</script>
<script>

  $("#phone").inputmask({"mask": "99999999999"});

  function countryHasBranch(obj){

    var country  = $(obj).val();

    console.log('country',country);
    if(parseInt(country)==92){
      console.log('pakistanBranches');
      $('.otherBranches').css('display','none');
      $('.omanBranches').css('display','none');
      $('.pakistanBranches').show();
    }
    else{
      console.log('omanBranches');
      $('.otherBranches').css('display','none');
      $('.omanBranches').show();
      $('.pakistanBranches').css('display','none');
    }
  }



  var today = new Date();
  $('#example12').calendar({
    monthFirst: false,
    type: 'date',
    maxDate: new Date(today.getFullYear()-16, today.getMonth(), today.getDate()),
  });
</script>
<script type="text/javascript">
  $('.city').select2();
  $('.addRow').on('click', function(e) {
    console.log('sweetalert');
    var htmlContent=`<tr class="">
    <td><input type="text" class="form-control" name="org[]"></td>
    <td><input type="date" class="form-control" name="job_start[]"></td>
    <td><input type="date" name="job_end[]" class="form-control"></td>
    <td><input type="text" class="form-control"></td>
    <td><input type="text" class="form-control" name="leave_of_reason[]"></td>
    <td><div class="btn btn-danger pull-right deleteRow" onclick="deleteRow(this)">-</div></td>
    </tr>`;
    $('#inputRows').append(htmlContent);
  });
  $('.deleteRow').on('click', function(e) {
    console.log('remove tr');
    $(this).parent().parent('tr').remove();
  });
  $('#addQualification').on('click', function(e) {
    console.log('click for qualification add');
    var htmlContent=`<tr>
    <td><input type="text" class="form-control" name="qualification[]"></td>
    <td><input type="text" class="form-control" name="institude[]"></td>
    <td><input type="text" class="form-control" name="degree[]"></td>
    <td><input type="text" class="form-control" name="duration[]"></td>
    <td><input type="text" class="form-control" name="marks[]"></td>
    <td><input type="text" class="form-control" name="passing_date[]"></td>
    <td>
    <input type="file" name="degreeFile[]"  multiple  />
    <label class="label1" for="file-upload">Upload file</label>
    <div id="file-upload-filename"></div>
    </td>
    <td><div class="btn btn-danger pull-right deleteQualification" onclick="deleteQualification(this)">-</div></td>
    </tr>`;

    $('#qualificationRows').append(htmlContent);
  });
  function deleteQualification(obj){
    var rowCount = $('#qualificationRows tr').length;
    console.log('row count',rowCount);
    if(rowCount==1){
      return false;
    }
    console.log('remove tr');
    $(obj).parent().parent('tr').remove();
  }
  function deleteRow(obj){
    var rowCount = $('#inputRows tr').length;
    console.log('row count',rowCount);
    if(rowCount==1){
      return false;
    }
    console.log('remove tr');
    $(obj).parent().parent('tr').remove();
  }
  $('.deleteQualification').on('click', function(e) {
    var rowCount = $('#qualificationRows tr').length;
    console.log('row count',rowCount);
    if(rowCount==1){
      return false;
    }
    console.log('remove tr');
    $(this).parent().parent('tr').remove();

  });

  $('input[name=martial_status]').on('change', function() {
    InputShow();
  });
  $('input[name=gender]').on('change', function() {
    InputShow();
  });
</script>
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#profile-img-tag').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#images").change(function(){
    console.log('images','update');
    readURL(this);
  }); 
</script>
<script>
  var input = document.getElementById( 'file-upload' );
  var infoArea = document.getElementById( 'file-upload-filename' );

  input.addEventListener( 'change', showFileName );

  function showFileName( event ) {

    var input = event.srcElement;

    var fileName = input.files[0].name;

    infoArea.textContent = 'File name: ' + fileName;
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
function mystatus() {
  document.getElementById("myDropdow").classList.toggle("whr-drop-hide");
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

  var valid = true;   

  $('.name').css('display','none');
  $('.fname').css('display','none');
  

  if ($('#name').val() == '') {
    console.log('name',$('#name').val());
    $('.name').text('name field is required');
      // $('.name').css('display','block');
      $('.name').css('display','block','color','red','border-color','red');
      // $('html, body').animate({
      //   scrollTop: $("#name").offset().top
      // }, 2000);

      valid = false;
    }


    if ($('#fname').val() == '') {
     console.log('fname',$('#fname').val());
     $('.fname').text('father name field is required');
     $('.fname').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#fname").offset().top
    // }, 2000);

    valid = false;
  }






  if(valid){
   ob.disabled = true;
          // submit the form    
          ob.form.submit();
          return true;
        }
        else{
          $('html, body').animate({
            scrollTop: $("#fname").offset().top
          }, 'slow');
        }
      }
    </script>


    @endsection
