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
    background-color: #005d80;">
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
    <div class="col-md-12" style=" padding: 20px; margin: 0 auto; border: 1px solid #ccc; width: 100%;box-shadow: 0px 4px 4px #bbb;">
      <div class="row">
        <div class="">
          @component('_components.alerts-default')
          @endcomponent
          <div id="signupbox"  class="mainbox col-md-12  col-sm-12 col-xs-12">
            <div>
      
                    <br>
                    <hr>
                    <br>
                    <div class="panel-body" >
                      <div class="row">
                        <div class="col-md-9 col-sm-10 col-xs-12">
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <div id="div_id_username" class="form-group required">
                              <label for="name" class="control-label   requiredField">Name                                 
                                <span class="required" style="color: red">*</span> 
                              </label>
                              <div class="controls">
                                <input class="input-md  textinput textInput form-control" id="name" value="@if(old('name')){{old('name')}}@endif"  maxlength="40" name="name"
                                placeholder="Please enter the Full name" value="" style="margin-bottom: 10px" type="text" />
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
                            <div id="div_id_location" class="form-group required">
                              <label for="father_profession" class="control-label requiredField">Father profession <span class="required" style="color: red">*</span></label>
                              <div class="controls ">
                                <input class="input-md textinput textInput form-control"  value="@if(old('father_profession')){{old('father_profession')}}@endif" id="father_profession" name="father_profession" placeholder="Name" style="margin-bottom: 10px" type="text" />
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
                            <label for="gender" class="control-label requiredField"> Gender <span class="required" style="color: red">*</span>
                            </label>
                            <div class="controls "  style="margin-bottom: 10px">
                              <label class="radio-inline"> <input type="radio" name="gender" id="male" value="male"  style="margin-bottom: 10px"> Male </label>
                              <label class="radio-inline"> <input type="radio" name="gender" id="id_As_2" value="female"  style="margin-bottom: 10px">Female</label>
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
                            <div class="">
                              <div id="div_id_gender" class="form-group required">
                               <label for="id_name" class="control-label   requiredField"> Status 
                                <span class="required" style="color: red">*</span></label>
                                <div class="controls "  style="margin-bottom: 10px">
                                  <label class="radio-inline"> <input type="radio" name="martial_status" id="married" value="Married"  style="margin-bottom: 10px;"> Married </label>
                                  <label class="radio-inline"> <input type="radio" name="martial_status" id="id_gender_2" value="Single"  style="margin-bottom: 10px"> Single </label>
                                  <label class="radio-inline"> <input type="radio" name="martial_status" id="id_gender_1" value="separated"  style="margin-bottom: 10px"> Separated </label>
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
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <div id="Address" class="form-group required">
                              <label for="father_profession" class="control-label requiredField">Address:<span class="required" style="color: red">*</span></label>
                              <div class="controls ">
                                <input class="input-md textinput textInput form-control"  value="@if(old('address')){{old('address')}}@endif" id="address" name="address" placeholder="Address" style="margin-bottom: 10px" type="text" />

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
                            <div id="IDCard/Passport No:" class="form-group required">
                              <label for="father_profession" class="control-label requiredField">IDCard/Passport No:<span class="required" style="color: red">*</span></label>
                              <div class="controls ">
                                <input class="input-md textinput textInput form-control"  value="@if(old('cnic')){{old('cnic')}}@endif" id="cnic" name="cnic" placeholder="IDCard/Passport No:" style="margin-bottom: 10px" type="text" />
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
                            <div id="Experience" class="form-group required">
                              <label for="father_profession" class="control-label requiredField"> Experience:<span class="required" style="color: red">*</span></label>
                              <div class="controls ">
                                <select class=""   id="experience" name="experience" placeholder="Experience" style="width: 100%;height: 35px;">
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
                            <div id="Qualification       
                            " class="form-group required">
                            <label for="father_profession" class="control-label requiredField"> Qualification        
                              :<span class="required" style="color: red">*</span></label>
                              <div class="controls ">
                                <input class="input-md textinput textInput form-control"   id="father_profession" name="qualified" placeholder=" Qualification        
                                " style="margin-bottom: 10px" type="text" />

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
                            <div id="div_id_company" class="form-group required"> 
                              <label for="" class="control-label   requiredField">Date of Birth <span class="required" style="color: red"></span></label>
                              <div class="controls "> 
                                <div class="ui calendar" id="example12" style="width: 100%">
                                  <div class="ui input" style="width: -webkit-fill-available!important;">
                                    <!-- <input type="text" class="form-control" value="{{old('fee_due_date1')}}" name="fee_due_date1" id="fee_due_date1" autocomplete="off"  placeholder="fee_due_date1"> -->
                                    <input class="input-md  form-control " type="text" autocomplete="false" id="dob" name="dob" autocomplete="off"   style="margin-bottom: 10px"  />
                                  </div>
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
                          </div>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <div id="div_id_company" class="form-group required"> 
                              <label for="" class="control-label   requiredField">Email <span class="required" style="color: red">*</span></label>
                              <div class="controls "> 
                                <input class="input-md  form-control " type="text" autocomplete="false" name="email"  style="margin-bottom: 10px"  />
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
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <div id="div_id_company" class="form-group required"> 
                              <label for="" class="control-label   requiredField">Mobile No <span class="required" style="color: red">*</span></label>
                              <div class="controls "> 
                                <input class="input-md  form-control " type="text" autocomplete="false" name="phone"  style="margin-bottom: 10px"  />
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
                              <label for="" class="control-label   requiredField">Second Mobile No </label>
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
                            <div  style="margin-top: 30px;">
                              <input type="file"  name="cv" />
                              <label class="label1" for="file-upload">Upload CV</label>
                              <div id="file-upload-filename"></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-10 col-xs-12">
                          <div class="fileinput fileinput-new" data-provides="fileinput" >
                            <div class="fileinput-new thumbnail" style="width: 250px; height: 250px;">
                              <img src="{{asset('images/no-image.png')}}" id="profile-img-tag" height="250" width = "250">

                            </div>
                          </div>
                          <div class="form-group">
                            <label for="images" class="btn btn-primary" style="position: relative;left: 50px;top: 20px; width: 180px">Upload Profile</label>
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
                    </div>
                  </div>
                </div>
              </div> 
            </div>
            <hr>
            <h5>ACADEMICS:</h5>
            <hr>
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
                  <td><div class="btn btn_primary mt-0 pull-right deleteQualification">-</div></td>

                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="qualification[]"></td>
                  <td><input type="text" class="form-control" name="institude[]"></td>
                  <td><input type="text" class="form-control" name="degree[]"></td>
                  <td><input type="text" class="form-control" name="duration[]"></td>
                  <td><input type="number" class="form-control"  min="0" step="0.01" name="marks[]"></td>
                  <td><input type="text" class="form-control " name="passing_date[]"></td>
                  <td>
                    <input type="file" name="degreeFile[]" multiple  />
                    <label class="label1" for="file-upload">Upload file</label>
                    <div id="file-upload-filename"></div>
                  </td>
                  <td><div class="btn btn_primary mt-0 pull-right deleteQualification">-</div></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="qualification[]"></td>
                  <td><input type="text" class="form-control" name="institude[]"></td>
                  <td><input type="text" class="form-control" name="degree[]"></td>
                  <td><input type="text" class="form-control" name="duration[]"></td>
                  <td><input type="number" class="form-control" name="marks[]"></td>
                  <td><input type="text" class="form-control " name="passing_date[]"></td>
                  <td>
                    <input type="file" name="degreeFile[]" multiple  />
                    <label class="label1" for="file-upload">Upload file</label>
                    <div id="file-upload-filename"></div>
                  </td>
                  <td><div class="btn btn_primary mt-0 pull-right deleteQualification">-</div></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="qualification[]"></td>
                  <td><input type="text" class="form-control" name="institude[]"></td>
                  <td><input type="text" class="form-control" name="degree[]"></td>
                  <td><input type="text" class="form-control" name="duration[]"></td>
                  <td><input type="number" class="form-control" name="marks[]"></td>
                  <td><input type="text" class="form-control " name="passing_date[]"></td>
                  <td>
                    <input type="file" name="degreeFile[]" multiple  />
                    <label class="label1" for="file-upload">Upload file</label>
                    <div id="file-upload-filename"></div>
                  </td>
                  <td><div class="btn btn_primary mt-0 pull-right deleteQualification">-</div></td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="qualification[]"></td>
                  <td><input type="text" class="form-control" name="institude[]"></td>
                  <td><input type="text" class="form-control" name="degree[]"></td>
                  <td><input type="text" class="form-control" name="duration[]"></td>
                  <td><input type="number" class="form-control" name="marks[]"></td>
                  <td><input type="text" class="form-control " name="passing_date[]"></td>
                  <td>
                    <input type="file" name="degreeFile[]" multiple  />
                    <label class="label1" for="file-upload">Upload file</label>
                    <div id="file-upload-filename"></div>
                  </td>
                  <td><div class="btn btn_primary mt-0 pull-right deleteQualification">-</div></td>
                </tr>
              </tbody>
            </table>
            {{-- <a href="javascript:;" class="btn btn-success pull-right addQualification" id="addQualification">+</a> --}}
            <hr>
            <h5>Job Experience:</h5>
            <hr>
            <table class="table_1 table-bordered">
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

            <br>



            <div class="col-md-12">

              <div class="modal-footer">
                <input type="reset" class="btn btn-warning btn-lg" data-dismiss="modal"
                value="Reset">
                <input type="submit"  class="btn btn-info btn-lg"  data-dismiss="modal" id="updateDataBtn" value="Submit">
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
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
        <td><input type="text" class="form-control" name="leave_of_reason[]"></td><td><div class="btn btn-danger pull-right deleteRow">-</div></td>
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
        <td><label for="images" class="btn btn-primary" style="position: relative;left: 0px;top: 5px;">Upload Profile</label>
        <input type="file" onchange="readURL(this);" value="" name="document[]" class="hide" style="opacity: 0; max-width: 100px!important;"></td>
        <td><div class="btn btn-danger pull-right deleteQualification">-</div></td>
        </tr>`;

        $('#qualificationRows').append(htmlContent);
      });

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
</script>
    @endsection





