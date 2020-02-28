@extends('_layouts.web.pakistan.default')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
 }">Welcome Franchise Application Form</h2>
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
<!-- ///////////////// -->
<div id="siteWrapper" class="slide-right" style="overflow:hidden;">
    <div class="body-overlay"></div>

    <div  class="form_layout">
    </div>

    <section class="default-main content-start relative bg-white">

        <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">


            <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-academics"> <a href="#">Franchise</a></li><li id="bc-college-acceptances"> <a href="#" class="current">Apply For Franchise Application</a></li></ul>
            <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

            </div>

        </div>

        <div class="flex flex-row-ns flex-column flex-wrap mw8 center relative">

            <div class="main-section w-70-l w-70-m w-100 ph4 ph0-l">
                <!-- <div class="w-100">

                    <h1 class="mt5-ns pr4-ns hidden-element fade-down element-load">Apply For Franchise</h1>

                </div> -->

                <input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/college-acceptances">
                <script type="text/javascript">

                    Sys.WebForms.PageRequestManager._initialize('ctl00$cphPageBody$ctl00', 'aspnetForm', [], [], [], 90, 'ctl00');

                </script>

                <input name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" type="hidden" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="295034">

            </div>
        </div>


        <div>

        </div>
        <div class="container">
            <form action="{{route('pakistan.franchise_form')}}" method="post" id="form">
                <div class="col-md-12">
                   @csrf
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
                  'thanks you',
                  'Your application has been submitted Successfully . we will contact you soon',
                  'success'
                  )
              </script>
              @endif
              
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="first_name" class="form-control" id="#" aria-describedby="emailHelp" placeholder="Enter name" required    title="Please Enter your first name ">


                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" required    title="Please Enter your first name ">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required >

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cell No</label>
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Cell number" required  >

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Country</label>
                            <select class="form-control" name="select_country"  id="franchise" required>

                                <option>Seclect Country</option>
                                <option value="Pakistan">Pakistan </option>
                                <option value="Canda">Canda</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Egypt">Egypt</option>
                                <option value="Oman">Oman</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="UK">UK</option>
                                <option value="USA">USA</option>
                                <option value="Bahrin">Bahrin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Any Other Information :</label>
                            <input type="text" name="information" class="form-control" id="information" placeholder="Enter any other Information">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" name="country_address" class="form-control" id="select_area" placeholder="Enter address" required>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Area Where Franchise Required:</label>
                            <input type="text" name="select_area" class="form-control" id="select_area" placeholder="Select Area" required>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Occupation:</label>
                            <input type="text" name="Occupation" class="form-control" id="Occupation" placeholder="Occupation" required>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Have you ever worked in education sector</label>
                            <input type="text" name="education_sector" class="form-control" id="education_sector" placeholder="Enter education sector" required>

                        </div>
                    </div>
                    

                </div>
                <div class="col-md-12">
                <div class="radio_franchise">
                    <lable  class="single_franchise" ><input onclick="changeValue(this)" type="radio" name="select_franchise" value="single_franchise">Single Franchise</lable>

                    <lable class="conversion_franchise"><input type="radio" name="select_franchise" value="Convesion or Existing" id="conversion_franchise" onclick="changeValue(this)">Conversion From Existing Franchise</lable>

                    <lable class="country_franchise"><input onclick="changeValue(this)" type="radio" name="select_franchise" value="Complete or Country" id="">Whole City/Country Franchise</lable>


                </div>
            </div>
            <div class="changeValue" style="display: none">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group" id="students_numbers">
                            <label for="exampleInputPassword1">Numbers Of Students</label>
                            <input type="number" name="number_students" class="form-control" id="number_student" placeholder="Enter number of students">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="existing_school">
                            <label for="exampleInputPassword1">Existing School</label>
                            <input type="text" name="exist_school" class="form-control" id="exist_school" placeholder="Enter existing school">

                        </div>
                    </div>
                </div>
            </div>

                <script type="text/javascript">

                    function changeValue(obj){
                        var valuess=$(obj).val();
                        if(valuess=='Convesion or Existing'){
                            $('.changeValue').css('display','block');
                        }else{
                            $('.changeValue').css('display','none');
                        }
                        
                    }
                </script>
                <input type="submit" class="btn btn-success  franchise_button" >
            </form>


        </div>



    </section>











</div>
</div>
</section>
@endsection