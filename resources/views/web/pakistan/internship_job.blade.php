@extends('_layouts.web.pakistan.default')
@section('title', 'Internship')
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
}">Apply for Internship </h2>
</div>
<div class="pager" style="display: none;">
  <a href="#" rel="1" class="first current"><span class="pager-index">1
  </span><span class="pager-title">Pep Rally</span></a>
  <a href="#" rel="2" class=""><span class="pager-index">2
  </span><span class="pager-title">Teaching at Lyceum</span></a>
  <a href="#" rel="3" class="last"><span class="pager-index">3
  </span><span class="pager-title">First Day of School</span></a>
</div>
</div>
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
            <form   action="{{route('jobs.store')}}" id="applicationForm"  method="POST" enctype="multipart/form-data">
              @csrf

              <div class="panel-body" >
                <div class="row">
                  <div class="col-md-9 col-sm-10 col-xs-12">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div id="div_id_username" class="form-group required">
                        <label for="name" class="control-label requiredField">Name                         
                          <span class="required" style="color: red">*</span> 
                        </label>
                        <div class="controls">
                          <input class="input-md  textinput textInput form-control" id="name" value="@if(old('name')){{old('name')}}@endif"  maxlength="40" name="name"
                          placeholder="Please enter the Full name" value="" style="margin-bottom: 10px;" type="text" />
                          <p class="name" style="display: none; color:red;"></p>
                          @if ($errors->has('name'))
                          <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                              <span class="sr-only">Close</span>
                            </button>
                            <strong>Warning!</strong> {{$errors->first('name')}}
                          </div>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div id="div_id_email" class="form-group required">
                        <label for="fname" class="control-label   requiredField">Father Name <span class="required" style="color: red">*</span> </label>
                        <div class="controls ">
                          <input class="input-md emailinput form-control" id="fname"  value="@if(old('fname')){{old('fname')}}@endif" name="fname" placeholder="Enter the father name" style="margin-bottom: 10px" type="text" />
                          <p class="fname" style="display: none; color:red;"></p>
                          @if ($errors->has('fname'))
                          <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                              <span class="sr-only">Close</span>
                            </button>
                            <strong>Warning!</strong> {{$errors->first('fname')}}
                          </div>
                          @endif
                        </div>     
                      </div>
                    </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                  <div id="div_id_company" class="form-group required"> 
                    <label for="Email" class="control-label   requiredField">Email <span class="required" style="color: red">*</span></label>
                    <div class="controls "> 
                      <input class="input-md  form-control email" id="email" type="text" autocomplete="false" name="email"  style="margin-bottom: 10px"  />
                      <p class="email_error" style="display: none; color:red;"></p>
                      @if ($errors->has('email'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong>Warning!</strong> {{$errors->first('email')}}
                      </div>
                      @endif

                    </div>
                  </div>
                </div>
              
                  <div style="clear:both;"></div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div id="div_id_company" class="required"> 
                      <label for="" class="control-label   requiredField">Date of Birth <span class="required" style="color: red"></span></label>
                      <div class="controls "> 
                       
                            <!-- <input type="text" class="form-control" value="{{old('fee_due_date1')}}" name="fee_due_date1" id="fee_due_date1" autocomplete="off"  placeholder="fee_due_date1"> -->
                            <input class="input-md  form-control st" type="date"  id="dob" name="dob"   style="margin-bottom: 10px"  />
                           <!-- <input type="text" class="form-control fee_due_date1" readonly value="{{date('d-M-Y')}}" name="fee_due_date1" id="fee_due_date1" autocomplete="off"  placeholder="First Due Date"> -->
                        <p class="dob" style="display: none; color:red;"></p>
                      </div>

                      @if ($errors->has('dob'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong>Warning!</strong> {{$errors->first('dob')}}
                      </div>
                      @endif

                    </div>
                  </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="form-group"> 
                       <label class="requiredField">Gender <span class="required" style="color: red">*</span></label>   
                       <div class="controls">
                         <select  name="gender" id="gender" class="form-control" style=" height: 32px; width: 100%;">
                          <option disabled="disabled" selected="selected" value="">Choose the Gender </option>
                          <option  id="male" value="male"> Male </option>
                          <option  id="id_As_2" value="female">Female</option>
                        </select>
                      </div>
                      <p class="gender_error" style="display: none; color:red;"></p>
                      @if ($errors->has('gender'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong>Warning!</strong> {{$errors->first('gender')}}
                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                   <div id="div_id_gender" class="form-group required">
                     <label class="requiredField" for="id_name"> Status <span class="required" style="color: red;float: right;">*</span></label>     
                     <div class="controls ">
                       <select  name="martial_status"  class="form-control requiredField martial_status"  id="div_id_gender"  style=" height: 32px; width: 100%;">
                        <option disabled="disabled" selected="selected">Choose the Status </option>
                        <option  id="id_gender_2" value="Single">   Single</option>
                        <option  id="married" value="Married">  Married </option>
                        <option  id="id_gender_1" value="separated">  Separated</option>
                      </select>
                      <p class="martial_status_error" style="display: none; color:red;"></p>
                    </div>

                    @if ($errors->has('martial_status'))
                    <div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                      </button>
                      <strong>Warning!</strong> {{$errors->first('martial_status')}}
                    </div>
                    @endif
                  </div>
                </div>
     
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div id="div_id_company" class="form-group required"> 
                    <label for="phone" class="control-label   requiredField">Mobile No <span class="required" style="color: red">*</span></label>
                    <div class="controls "> 
                      <input class="input-md  phone form-control " id="phone" type="text" autocomplete="false" name="phone"  style="margin-bottom: 10px"  />
                      <p class="phone_error" style="display: none; color:red;"></p>
                      @if ($errors->has('phone'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong>Warning!</strong> {{$errors->first('phone')}}
                      </div>
                      @endif
                    </div>
                  </div>
                </div>             
        <div class="col-md-4 col-sm-6 col-xs-12">
                  <div id="div_id_company" class="form-group required"> 
                    <label for="mobile" class="control-label   requiredField">Second Mobile No </label>
                    <div class="controls "> 
                      <input class="input-md  form-control " type="text" autocomplete="false" name="mobile"  style="margin-bottom: 10px"  />
                      @if ($errors->has('Mobile'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong>Warning!</strong> {{$errors->first('Mobile')}}
                      </div>
                      @endif

                    </div>
                  </div>
                </div>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                  <div id="Qualification       
                  " class="form-group required">
                  <label  class="control-label requiredField"> Qualification        
                    :<span class="required" style="color: red">*</span></label>
                    <div class="controls ">
                      <input class="input-md textinput textInput form-control"   id="qualified" name="qualified" placeholder=" Qualification        
                      " style="margin-bottom: 10px" type="text" />
                      <p class="qualified_eror" style="display: none; color:red;"></p>
                      @if ($errors->has('qualification'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong>Warning!</strong> {{$errors->first('qualification')}}
                      </div>
                      @endif
                    </div> 
                  </div>
                </div>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                  <div id="IDCard/Passport No:" class="form-group required">
                    <label  class="control-label requiredField">IDCard/Passport No:<span class="required" style="color: red">*</span></label>
                    <div class="controls ">
                      <input class="input-md textinput textInput form-control"  value="@if(old('cnic')){{old('cnic')}}@endif" id="cnic" name="cnic" placeholder="IDCard/Passport No:" style="margin-bottom: 10px" type="text" />
                      <p class="cnic" style="display: none; color:red;"></p>
                      @if ($errors->has('cnic'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong>Warning!</strong> {{$errors->first('cnic')}}
                      </div>
                      @endif
                    </div> 
                  </div>
                </div>
       
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div id="Address" class="form-group required">
                    <label for="father_profession" class="control-label requiredField">Address:<span class="required" style="color: red">*</span></label>
                    <div class="controls ">
                      <input class="input-md textinput textInput form-control"  value="@if(old('address')){{old('address')}}@endif" id="address" name="address" placeholder="Address" style="margin-bottom: 10px" type="text" />
                      <p class="address" style="display: none; color:red;"></p>
                      @if ($errors->has('address'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong>Warning!</strong> {{$errors->first('address')}}
                      </div>
                      @endif
                    </div> 
                  </div>
                </div>

      
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div id="div_id_location" class="form-group required">
                    <label for="father_profession" class="control-label requiredField">Father profession <span class="required" style="color: red">*</span></label>
                    <div class="controls ">
                      <input class="input-md textinput textInput form-control"  value="@if(old('father_profession')){{old('father_profession')}}@endif" id="father_profession" name="father_profession" placeholder="Name" style="margin-bottom: 10px" type="text" />
                      <p class="father_profession" style="display: none; color:red;"></p>
                      @if ($errors->has('name'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong>Warning!</strong> {{$errors->first('name')}}
                      </div>
                      @endif
                    </div> 
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div id="Experience" class="form-group required">
                    <label for="experience" class="control-label requiredField"> Experience:<span class="required" style="color: red">*</span></label>
                    <div class="controls ">
                      <select class=""   id="experience" name="experience" placeholder="experience" style="padding-left: 6px;
                      border-radius: 5px;
                      width: 100%;
                      height: 35px;">
                      <option selected="selected" disabled="disabled"> Select The Experience </option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">15+</option>
                    </select>
                    <p class="experience_error" style="display: none; color:red;"></p>
                    @if ($errors->has('experience'))
                    <div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                      </button>
                      <strong>Warning!</strong> {{$errors->first('experience')}}
                    </div>
                    @endif
                  </div> 
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">

                <label for="country_id"> Select Country</label>     

                <select  name="country_id"  class="form-control" id="country_id" onchange="countryHasBranch(this)" style=" height: 32px; width: 100%;">
                  <option disabled="disabled" selected="selected">Choose the country </option>
                  <option value="92" selected="selected">Pakistan</option>
                </select>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group" style="max-width: 100%">
                  <label for="nationality">City</label>
                  <select  class="input-md form-control" class="form-control" name="nationality"
                  id="nationality" style="width: 100%;">
                  <option value="" disabled selected>Select The City</option>
                  <option value="Islamabad">Islamabad</option>
                  <option value="" disabled>Punjab Cities</option>
                  <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                  <option value="Ahmadpur East">Ahmadpur East</option>
                  <option value="Ali Khan Abad">Ali Khan Abad</option>
                  <option value="Alipur">Alipur</option>
                  <option value="Arifwala">Arifwala</option>
                  <option value="Attock">Attock</option>
                  <option value="Bhera">Bhera</option>
                  <option value="Bhalwal">Bhalwal</option>
                  <option value="Bahawalnagar">Bahawalnagar</option>
                  <option value="Bahawalpur">Bahawalpur</option>
                  <option value="Bhakkar">Bhakkar</option>
                  <option value="Burewala">Burewala</option>
                  <option value="Chillianwala">Chillianwala</option>
                  <option value="Chakwal">Chakwal</option>
                  <option value="Chichawatni">Chichawatni</option>
                  <option value="Chiniot">Chiniot</option>
                  <option value="Chishtian">Chishtian</option>
                  <option value="Daska">Daska</option>
                  <option value="Darya Khan">Darya Khan</option>
                  <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                  <option value="Dhaular">Dhaular</option>
                  <option value="Dina">Dina</option>
                  <option value="Dinga">Dinga</option>
                  <option value="Dipalpur">Dipalpur</option>
                  <option value="Faisalabad">Faisalabad</option>
                  <option value="Fateh Jhang">Fateh Jang</option>
                  <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                  <option value="Gojra">Gojra</option>
                  <option value="Gujranwala">Gujranwala</option>
                  <option value="Gujrat">Gujrat</option>
                  <option value="Gujar Khan">Gujar Khan</option>
                  <option value="Hafizabad">Hafizabad</option>
                  <option value="Haroonabad">Haroonabad</option>
                  <option value="Hasilpur">Hasilpur</option>
                  <option value="Haveli">Haveli</option>
                  <option value="Lakha">Lakha</option>
                  <option value="Jalalpur">Jalalpur</option>
                  <option value="Jattan">Jattan</option>
                  <option value="Jampur">Jampur</option>
                  <option value="Jaranwala">Jaranwala</option>
                  <option value="Jhang">Jhang</option>
                  <option value="Jhelum">Jhelum</option>
                  <option value="Kalabagh">Kalabagh</option>
                  <option value="Karor Lal Esan">Karor Lal Esan</option>
                  <option value="Kasur">Kasur</option>
                  <option value="Kamalia">Kamalia</option>
                  <option value="Kamoke">Kamoke</option>
                  <option value="Khanewal">Khanewal</option>
                  <option value="Khanpur">Khanpur</option>
                  <option value="Kharian">Kharian</option>
                  <option value="Khushab">Khushab</option>
                  <option value="Kot Adu">Kot Adu</option>
                  <option value="Jauharabad">Jauharabad</option>
                  <option value="Lahore">Lahore</option>
                  <option value="Lalamusa">Lalamusa</option>
                  <option value="Layyah">Layyah</option>
                  <option value="Liaquat Pur">Liaquat Pur</option>
                  <option value="Lodhran">Lodhran</option>
                  <option value="Malakwal">Malakwal</option>
                  <option value="Mamoori">Mamoori</option>
                  <option value="Mailsi">Mailsi</option>
                  <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                  <option value="mian Channu">Mian Channu</option>
                  <option value="Mianwali">Mianwali</option>
                  <option value="Multan">Multan</option>
                  <option value="Murree">Murree</option>
                  <option value="Muridke">Muridke</option>
                  <option value="Mianwali Bangla">Mianwali Bangla</option>
                  <option value="Muzaffargarh">Muzaffargarh</option>
                  <option value="Narowal">Narowal</option>
                  <option value="Okara">Okara</option>
                  <option value="Renala Khurd">Renala Khurd</option>
                  <option value="Pakpattan">Pakpattan</option>
                  <option value="Pattoki">Pattoki</option>
                  <option value="Pir Mahal">Pir Mahal</option>
                  <option value="Qaimpur">Qaimpur</option>
                  <option value="Qila Didar Singh">Qila Didar Singh</option>
                  <option value="Rabwah">Rabwah</option>
                  <option value="Raiwind">Raiwind</option>
                  <option value="Rajanpur">Rajanpur</option>
                  <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                  <option value="Rawalpindi">Rawalpindi</option>
                  <option value="Sadiqabad">Sadiqabad</option>
                  <option value="Safdarabad">Safdarabad</option>
                  <option value="Sahiwal">Sahiwal</option>
                  <option value="Sangla Hill">Sangla Hill</option>
                  <option value="Sarai Alamgir">Sarai Alamgir</option>
                  <option value="Sargodha">Sargodha</option>
                  <option value="Shakargarh">Shakargarh</option>
                  <option value="Sheikhupura">Sheikhupura</option>
                  <option value="Sialkot">Sialkot</option>
                  <option value="Sohawa">Sohawa</option>
                  <option value="Soianwala">Soianwala</option>
                  <option value="Siranwali">Siranwali</option>
                  <option value="Talagang">Talagang</option>
                  <option value="Taxila">Taxila</option>
                  <option value="Toba Tek  Singh">Toba Tek Singh</option>
                  <option value="Vehari">Vehari</option>
                  <option value="Wah Cantonment">Wah Cantonment</option>
                  <option value="Wazirabad">Wazirabad</option>
                  <option value="" disabled>Sindh Cities</option>
                  <option value="Badin">Badin</option>
                  <option value="Bhirkan">Bhirkan</option>
                  <option value="Rajo Khanani">Rajo Khanani</option>
                  <option value="Chak">Chak</option>
                  <option value="Dadu">Dadu</option>
                  <option value="Digri">Digri</option>
                  <option value="Diplo">Diplo</option>
                  <option value="Dokri">Dokri</option>
                  <option value="Ghotki">Ghotki</option>
                  <option value="Haala">Haala</option>
                  <option value="Hyderabad">Hyderabad</option>
                  <option value="Islamkot">Islamkot</option>
                  <option value="Jacobabad">Jacobabad</option>
                  <option value="Jamshoro">Jamshoro</option>
                  <option value="Jungshahi">Jungshahi</option>
                  <option value="Kandhkot">Kandhkot</option>
                  <option value="Kandiaro">Kandiaro</option>
                  <option value="Karachi">Karachi</option>
                  <option value="Kashmore">Kashmore</option>
                  <option value="Keti Bandar">Keti Bandar</option>
                  <option value="Khairpur">Khairpur</option>
                  <option value="Kotri">Kotri</option>
                  <option value="Larkana">Larkana</option>
                  <option value="Matiari">Matiari</option>
                  <option value="Mehar">Mehar</option>
                  <option value="Mirpur Khas">Mirpur Khas</option>
                  <option value="Mithani">Mithani</option>
                  <option value="Mithi">Mithi</option>
                  <option value="Mehrabpur">Mehrabpur</option>
                  <option value="Moro">Moro</option>
                  <option value="Nagarparkar">Nagarparkar</option>
                  <option value="Naudero">Naudero</option>
                  <option value="Naushahro Feroze">Naushahro Feroze</option>
                  <option value="Naushara">Naushara</option>
                  <option value="Nawabshah">Nawabshah</option>
                  <option value="Nazimabad">Nazimabad</option>
                  <option value="Qambar">Qambar</option>
                  <option value="Qasimabad">Qasimabad</option>
                  <option value="Ranipur">Ranipur</option>
                  <option value="Ratodero">Ratodero</option>
                  <option value="Rohri">Rohri</option>
                  <option value="Sakrand">Sakrand</option>
                  <option value="Sanghar">Sanghar</option>
                  <option value="Shahbandar">Shahbandar</option>
                  <option value="Shahdadkot">Shahdadkot</option>
                  <option value="Shahdadpur">Shahdadpur</option>
                  <option value="Shahpur Chakar">Shahpur Chakar</option>
                  <option value="Shikarpaur">Shikarpaur</option>
                  <option value="Sukkur">Sukkur</option>
                  <option value="Tangwani">Tangwani</option>
                  <option value="Tando Adam Khan">Tando Adam Khan</option>
                  <option value="Tando Allahyar">Tando Allahyar</option>
                  <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                  <option value="Thatta">Thatta</option>
                  <option value="Umerkot">Umerkot</option>
                  <option value="Warah">Warah</option>
                  <option value="" disabled>Khyber Cities</option>
                  <option value="Abbottabad">Abbottabad</option>
                  <option value="Adezai">Adezai</option>
                  <option value="Alpuri">Alpuri</option>
                  <option value="Akora Khattak">Akora Khattak</option>
                  <option value="Ayubia">Ayubia</option>
                  <option value="Banda Daud Shah">Banda Daud Shah</option>
                  <option value="Bannu">Bannu</option>
                  <option value="Batkhela">Batkhela</option>
                  <option value="Battagram">Battagram</option>
                  <option value="Birote">Birote</option>
                  <option value="Chakdara">Chakdara</option>
                  <option value="Charsadda">Charsadda</option>
                  <option value="Chitral">Chitral</option>
                  <option value="Daggar">Daggar</option>
                  <option value="Dargai">Dargai</option>
                  <option value="Darya Khan">Darya Khan</option>
                  <option value="dera Ismail Khan">Dera Ismail Khan</option>
                  <option value="Doaba">Doaba</option>
                  <option value="Dir">Dir</option>
                  <option value="Drosh">Drosh</option>
                  <option value="Hangu">Hangu</option>
                  <option value="Haripur">Haripur</option>
                  <option value="Karak">Karak</option>
                  <option value="Kohat">Kohat</option>
                  <option value="Kulachi">Kulachi</option>
                  <option value="Lakki Marwat">Lakki Marwat</option>
                  <option value="Latamber">Latamber</option>
                  <option value="Madyan">Madyan</option>
                  <option value="Mansehra">Mansehra</option>
                  <option value="Mardan">Mardan</option>
                  <option value="Mastuj">Mastuj</option>
                  <option value="Mingora">Mingora</option>
                  <option value="Nowshera">Nowshera</option>
                  <option value="Paharpur">Paharpur</option>
                  <option value="Pabbi">Pabbi</option>
                  <option value="Peshawar">Peshawar</option>
                  <option value="Saidu Sharif">Saidu Sharif</option>
                  <option value="Shorkot">Shorkot</option>
                  <option value="Shewa Adda">Shewa Adda</option>
                  <option value="Swabi">Swabi</option>
                  <option value="Swat">Swat</option>
                  <option value="Tangi">Tangi</option>
                  <option value="Tank">Tank</option>
                  <option value="Thall">Thall</option>
                  <option value="Timergara">Timergara</option>
                  <option value="Tordher">Tordher</option>
                  <option value="" disabled>Balochistan Cities</option>
                  <option value="Awaran">Awaran</option>
                  <option value="Barkhan">Barkhan</option>
                  <option value="Chagai">Chagai</option>
                  <option value="Dera Bugti">Dera Bugti</option>
                  <option value="Gwadar">Gwadar</option>
                  <option value="Harnai">Harnai</option>
                  <option value="Jafarabad">Jafarabad</option>
                  <option value="Jhal Magsi">Jhal Magsi</option>
                  <option value="Kacchi">Kacchi</option>
                  <option value="Kalat">Kalat</option>
                  <option value="Kech">Kech</option>
                  <option value="Kharan">Kharan</option>
                  <option value="Khuzdar">Khuzdar</option>
                  <option value="Killa Abdullah">Killa Abdullah</option>
                  <option value="Killa Saifullah">Killa Saifullah</option>
                  <option value="Kohlu">Kohlu</option>
                  <option value="Lasbela">Lasbela</option>
                  <option value="Lehri">Lehri</option>
                  <option value="Loralai">Loralai</option>
                  <option value="Mastung">Mastung</option>
                  <option value="Musakhel">Musakhel</option>
                  <option value="Nasirabad">Nasirabad</option>
                  <option value="Nushki">Nushki</option>
                  <option value="Panjgur">Panjgur</option>
                  <option value="Pishin valley">Pishin Valley</option>
                  <option value="Quetta">Quetta</option>
                  <option value="Sherani">Sherani</option>
                  <option value="Sibi">Sibi</option>
                  <option value="Sohbatpur">Sohbatpur</option>
                  <option value="Washuk">Washuk</option>
                  <option value="Zhob">Zhob</option>
                  <option value="Ziarat">Ziarat</option>
                </select>
              </div>
            </div>
            <div style="clear: both;"></div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div  style="    margin-top: 2px;
              border: 1px solid #ccc;border-radius: 5px;margin-bottom: 10px;">
              <input type="file"  name="cv" / style="opacity: 0;">
              <div class="label1 control-label" for="file-upload" style="
              margin-top: -20px;
              text-align: center;
              height: 32px;
              text-align: center;
              padding-top: 5px;
              text-align: center;
              background-color: #ffffff;
              border-radius: 4px;"><i class="fas fa-upload" style="font-size:16px;"></i> &nbsp;&nbsp; Upload CV</div>
              <div id="file-upload-filename"></div>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-10 col-xs-12">
          <br>
          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 250px; height: 250px;">
              <img src="{{asset('images/no-image.png')}}" id="profile-img-tag" height="100%" width = "250" style="height: 100!important;">

            </div>
          </div>
          <div class="form-group">
            <label for="images" class="btn btn-primary" style="position: relative;left: 50px;top: -14px; width: 180px">Upload Profile</label>
            <input type="file" id="images"  name="images" class="hide" style="opacity: 0;">
            @if ($errors->has('images'))
            <div class="alert alert-danger" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Warning!</strong> {{$errors->first('images')}}
            </div>
            @endif
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group" style="padding: 0px; ">
              <div class = "gallery"></div>
            </div>
          </div>
        </div>
      </div>

      <hr style="width: 100%;">
      <div class="col-md-12">
        <div class="row">

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">

              <label for="jobIds"  class="control-label" >Select Job Opening: <span class="required" style="color: red">*</span></label>
              <span> (select upto 3 max)</span>             <br>
              <select  class="chosen-select" multiple name="jobIds[]" class="form-control" id="jobIds" aria-describedby="emailHelp" placeholder="Enter Name" style="width: 100%!important;">
                <option disabled="disabled">SELECT JOB TO APPLY </option>

                <optgroup label="ACADEMIC MANAGEMENT">
                  <option value="principal" data-toggle="tooltip" title="Min 5 year Exp as principal">Principal</option>
                  <option value="Branch Heads" data-toggle="tooltip" title="Min 2 year Exp as Branch head">Branch Heads </option>
                  <option value="Assistant Branch Heads" data-toggle="tooltip" title="Degree in management">Assistant Branch Heads </option>
                  <option value="O-Level Co-ordinator " data-toggle="tooltip" title="Done O-A level & 2 years , Exp">O-Level Co-ordinator </option>
                  <option value="Pre-school Head" data-toggle="tooltip" title="degree/diploma in Montesori / Preschool">Pre-school Head</option>
                  <option value="Primary Section Head" data-toggle="tooltip" title="Min 5 year Primary head or Coordinator">Primary Section Head</option>
                  <option value="Senior Section Head"  data-toggle="tooltip" title="Min 5 year section head or Coordinator">Senior Section Head</option>
                  <option value="Admin Officer">Admin Officer</option>
                </optgroup>
                <optgroup label="ACADEMICS">
                  <option value="Pre school Teacher" data-toggle="tooltip" title="Min 2 year Exp Teaching + degree /dip in Preschool">Pre school Teacher</option>
                  <option value="Pre School Junior Teacher" data-toggle="tooltip" title="Min 1 year \ Exp">Pre School Junior Teacher</option>
                  <option value="Primary Teacher" data-toggle="tooltip" title="Min 2 year  \ Exp">Primary Teacher</option>
                  <option value="Primary Junior Teacher" data-toggle="tooltip" title="Min 1 year \ Exp">Primary Junior Teacher</option>
                  <option value="Matric Teacher" data-toggle="tooltip" title="Min 3 year \ Exp">Matric Teacher </option>
                  <option value="O-Level Teacher" data-toggle="tooltip" title="Min 3 year \ Exp">O-Level Teacher</option>
                  <option value="Music Teacher" data-toggle="tooltip" title="Min 3 year \ Exp">Music Teacher</option>
                </optgroup>
                <optgroup label="GENERAL MANAGEMENT"> 
                  <option value="Accounts" data-toggle="tooltip" title="Min 5 year \Exp">Accounts Manage</option>
                  <option value="Account Asst. Manager" data-toggle="tooltip" title="Min 1 year Exp">Account Asst. Manager</option>
                  <option value="Franchise Manager" data-toggle="tooltip" title="Min 2 year \Exp + degree Management">Franchise Manager
                  </option>
                  <option value="Asst. Franchise Manager" data-toggle="tooltip" title="Min 1 year \Exp + degree Management">Asst. Franchise Manager
                  </option>.


                  <option value="Manager Admin" data-toggle="tooltip" title="Min 5 year \Exp">Manager Admin</option>
                  <option value=" Asst Manager Admin" data-toggle="tooltip" title="Min 1 year \Exp">Asst. Manager Admin</option>
                </optgroup>
                <optgroup label="SOFTWARE DEVELOPER" data-toggle="tooltip" title="Min 5 year Exp">
                  <option value="Web/App Developer" data-toggle="tooltip" title="Min 5 year Exp">Web/App Developer       </option>
                  <option value="Web/App Developer" data-toggle="tooltip" title="Min 5 year Exp">Front End      </option>
                </optgroup>
                <optgroup label="Internship / Training" data-toggle="tooltip" title="Min 5 year Exp">
                  <option value="Internship in Management " selected="" data-toggle="tooltip" title="Min 5 year Exp">Internship in Management </option>
                  <option value="Internship in Teaching" data-toggle="tooltip" title="Min 5 year Exp">Internship in Teaching </option>
                  <option value="Internship in Software Developement"  data-toggle="tooltip" title="Min 5 year Exp">Internship in Software Developement   </option>
                </optgroup>
              </select>
              <p class="jobIds_error" style="display: none; color:red;"></p>
            </div>
          </div>



          <div class="col-md-4 col-sm-6 col-xs-12 pakistanBranches" style="display: block">
            <div class="form-group">
             <label for="branch_id"  class="control-label">In which branch you are interested: <span class="required" style="color: red">*</span></label>
             <span> (select upto 3 max)</span>       
             <select type="textx" class="chosen-select-branch form-control" multiple name="branchids[]" class="form-control" id="branch_id" aria-describedby="emailHelp" placeholder="Enter Name" >
              <option disabled="disabled"> Choose the Branch </option>
              @php($oman=\App\Models\Branch::where('b_countryCode',92)->get())
              @foreach($oman as $om)
              <option value="{{$om->id}}">{{$om->branch_name}} </option>
              @endforeach
            </select>
            <p class="branch_id_error" style="display: none; color:red;"></p>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 subjectsDiv" style="display: block">
          <div class="form-group">

            <label for="subjectsIds">Which subject you are best in teaching: <span class="required" style="color: red">*</span></label>
            <span> (select upto 3 max)</span>
            <select type="textx" class="chosen-select-branch form-control" multiple name="subjectsIds[]" class="form-control" id="subjectsIds" aria-describedby="emailHelp">
              <option disabled="disabled"> Choose the Subjects</option>
              <option value="6">Maths                    </option>
              <option value="7">Science                  </option>
              <option value="8">Islamiat                 </option>
              <option value="9">S Studies                </option>
              <option value="10">Geography                </option>
              <option value="11">Art                      </option>
              <option value="12">Al Quran                 </option>
              <option value="13">Conversation             </option>
              <option value="14">Computer                 </option>
              <option value="15">Biology                  </option>
              <option value="16">Chemistry                </option>
              <option value="17">Physics                  </option>
              <option value="18">Accounting               </option>
              <option value="19">B Studies                </option>
              <option value="20">Economics                </option>
              <option value="24">English                  </option>
              <option value="25">Urdu                     </option>
              <option value="26">History                  </option>
              <option value="27">G. Knowledge             </option>
              <option value="28">Arabic                   </option>
              <option value="29">H Economics              </option>
              <option value="30">Grand Test               </option>
              <option value="31">English Listening Spkng  </option>
              <option value="34">Environmental Study      </option>
              <option value="35">English Literature       </option>
              <option value="36">English Language         </option>
              <option value="37">Additional English       </option>
            </select>
            <p class="subjectsIds_error" style="display: none; color:red;"></p>
          </div>
        </div>
      </div>
    </div>

  </div>
  <br>
  <hr>
  <br>

</div>
</div>
</div> 
</div>
<div class="acdmics_heading">
  <h5>ACADEMICS:</h5>
</div>
<table class="table_1 table-bordered">
  <thead class="thead-light">
    <tr>
      <th>Qualification</th>
      <th>Institute name</th>
      <th>Degree</th>
      <th>Duration</th>
      <th>Mark Obtained</th>
      <th>Year of Passing</th>
      <th>images</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="qualificationRows">
    <tr>
      <td><input type="text" class="form-control" name="qualification[]"></td>
      <td><input type="text" class="form-control" name="institude[]"></td>
      <td><input type="text" class="form-control" name="degree[]"></td>
      <td><input type="text" class="form-control" name="duration[]"></td>
      <td><input type="number" class="form-control"  min="0" step="0.01" name="marks[]"></td>
      <td><input type="text" class="form-control " name="passing_date[]"></td>
      <td>
        <input type="file" name="degreeFile[]"  multiple  />
        <label class="label1" for="file-upload">Upload file</label>
        <div id="file-upload-filename"></div>
      </td>
      <td><div class="btn btn_primary mt-0 pull-right addQualification addRow2" id="addQualification">+</div></td>

    </tr>

  </tbody>
</table>
{{-- <a href="javascript:;" class="btn btn-success pull-right addQualification" id="addQualification">+</a> --}}
<hr>
<div class="acdmics_heading">
  <h5>Job Experience:</h5>
</div>
<hr>
<table class="table_1 table-bordered" style="width: 100%;">
  <thead class="thead-light">
    <tr>
      <th>Organization/Institution</th>
      <th>job start</th>
      <th>Job end</th>
      <th>Reason Of Leaving</th>
      <th>last Salary</th>

    </tr>
  </thead>
  <tbody id="inputRows">
    <tr class="">
      <td><input type="text" class="form-control" name="org[]"></td>
      <td><input type="date" class="form-control" name="job_start[]"></td>
      <td><input type="date" name="job_end[]" class="form-control "></td>
      <td><input type="text"  name="leave_of_reason[]" class="form-control"></td>
      <td><input type="number" any class="form-control"  name="last_slary[]"></td>

      <td><div class="btn btn-success pull-right addRow">+</div></td>
    </tr>
  </tbody>
</table>


        <label for="fname" class="control-label">Why Are You Interested In This Job?</label>
        <textarea rows="3" style="width: 100%; border-radius: 2px;"> 
          
        </textarea>

<div class="col-md-12">
  <div class="modal-footer">

    <input type="button" class="btn btn-info btn-lg"  data-dismiss="modal" onclick="jobFormSubmit(this)"  id="updateDataBtn" value="Submit">
  </div>
</div>
</form>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h1 class="modal-title">Heading</h1>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <h3>Some text to enable scrolling..</h3>
        <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
</div>
</section>
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
   $('.name').css('display','none');
   $('.name').css('display','none');
   $('.name').css('display','none');
   $('.name').css('display','none');
   $('.name').css('display','none');

   $('.name').css('display','none');
   $('.name').css('display','none');


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


   if ($('#dob').val() == '') {
     console.log('dob',$('#dob').val());
     $('.dob').text('date field is required');
     $('.dob').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#dob").offset().top
    // }, 2000);

     valid = false;
   }

   if ($('#email').val() == '') {
     console.log('email',$('#email').val());
     $('.email_error').text('email field is required');
     $('.email_error').css('display','block','color','red','border-color','red');

    //  $('html, body').animate({
    //   scrollTop: $("#email").offset().top
    // }, 2000);


     valid = false;
   }
   if ($('#phone').val() == '') {
     console.log('phone',$('#phone').val());
     $('.phone').text('phone field is required');
     $('.phone').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#phone").offset().top
    // }, 2000);

     valid = false;
   }
   if ($('#address').val() == '') {
     console.log('address',$('#address').val());
     $('.address').text('address field is required');
     $('.address').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#address").offset().top
    // }, 2000);

     valid = false;
   }
   if ($('#cnic').val() == '') {
     console.log('cnic',$('#cnic').val());
     $('.cnic').text('cnic field is required');
     $('.cnic').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#cnic").offset().top
    // }, 2000);
     valid = false;
   } 
   if ($('#qualified').val() == '') {
     console.log('qualified',$('#qualified').val());
     $('.qualified_eror').text('qualified field is required');
     $('.qualified_eror').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#qualified").offset().top
    // }, 2000);
     valid = false;
   }
   if ($('#father_profession').val() == '') {
     console.log('father_profession',$('#father_profession').val());
     $('.father_profession').text('father profession field is required');
     $('.father_profession').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#father_profession").offset().top
    // }, 2000);
     valid = false;
   }



   if ($('#gender').val() == '' || $('#gender').val() == null) {

     $('.gender_error').text('Gender field is required');
     $('.gender_error').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#gender").offset().top
    // }, 2000);
     valid = false;
   }



   if ($('.martial_status').val() == '') {
     $('.martial_status_error').text('Martial Status field is required');
     $('.martial_status_error').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $(".martial_status").offset().top
    // }, 2000);
     valid = false;
   }


   if ($('#phone').val() == '') {
     console.log('phone',$('#phone').val());
     $('.phone_error').text('phone field is required');
     $('.phone_error').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#phone").offset().top
    // }, 2000);
     valid = false;
   }
   if ($('#experience').val() == '') {
     console.log('experience',$('#experience').val());
     $('.experience_error').text('experience field is required');
     $('.experience_error').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#experience").offset().top
    // }, 2000);
     valid = false;
   }


   
   console.log('lenth',$('#jobIds').val(), $('#jobIds').val());
   if ($('#jobIds').val() == '' || $('#jobIds').val()==null) {
     $('.jobIds_error').text('Job field is required');
     $('.jobIds_error').css('display','block','color','red','border-color','red');
 // $('html, body').animate({
 //      scrollTop: $("#jobIds").offset().top
 //    }, 2000);
     valid = false;
   }


   if ($('#branch_id').val() == '' || $('#branch_id').val()==null) {
     $('.branch_id_error').text('Job field is required');
     $('.branch_id_error').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#branch_id").offset().top
    // }, 2000);
     valid = false;
   }
        
   if ($('#subjectsIds').val() == '' || $('#subjectsIds').val()==null) {
     $('.subjectsIds_error').text('Job field is required');
     $('.subjectsIds_error').css('display','block','color','red','border-color','red');
    //  $('html, body').animate({
    //   scrollTop: $("#subjectsIds").offset().top
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
