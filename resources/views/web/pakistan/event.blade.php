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
  <style>
    .tabler {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    .tabler td, .tabler th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    .tabler tr:nth-child(even){background-color: #f2f2f2;}

    .tabler tr:hover {background-color: #ddd;}

    .tabler th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #011e61;
      color: white;
    }
    .nav-tabs {
      border-bottom: none;
      margin-bottom: 15px;
    }
    .nav .nav-item{

      background: #ffffff;
      width: 49%;
      /* border: 1px solid #ccc; */
      margin-bottom: 2px;
      font-size: 22px;
      margin: 4px;
    }
    .nav .nav-item a{
      color: #fff;
      width: 100%;
      background: #3a65c7;

      /* border: 1px solid #ccc; */
      margin-bottom: 2px;
      font-size: 22px;
      margin: 4px;
    }
    .nav .nav-item.active a{
      background: #011e61;
      color: #fff;
      width: 100%;
      box-shadow: 0px 4px 4px #bbb;
      font-size: 22px;
      border-radius: 4px;
      text-align: center;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
      color: #fff;
      cursor: default;
      border-top: 5px solid #f10000;
      background-color: #011e61;
      border-radius: 4px;
    }
    .nav-item:not(:last-child) {
      padding-right: 1rem;
      background-color: #fff!important;
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
}">Welcome Event Application Form</h2>
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


      <ul id="breadcrumb">
        <!-- <li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-academics"> <a href="#">Event</a></li> -->
        <li id="bc-college-acceptances"> <a href="#" class="current">Event</a></li>
      </ul>
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
                <form action="{{route('pakistan.event_posted')}}" method="post" id="form">
                  <div class="col-md-12">
                  
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

                      <div class="tab-content">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item active">
                            <a href="#home" role="tab" data-toggle="tab">
                              Robotics
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#profile" role="tab" data-toggle="tab">
                              Coding
                            </a>
                          </li>
                        </ul>
                        <div class="tab-pane fade active in" id="home">
                         <h1 class="well"  style="text-align: center;">Robotics Registration</h1>
                         <div class="col-lg-12 well">
                          <div class="row">
                            <form action="{{route('pakistan.event_posted')}}" method="POST" id="form">
                               @csrf
                               <input type="hidden" name="type" value="Robotics">
                              <div class="col-sm-12">
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label>First Name</label>
                                    <input type="text" name="user_name" placeholder="Enter First Name Here.." class="form-control">
                                  </div>
                                  <div class="col-sm-6 form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="user_lastname" placeholder="Enter Last Name Here.." class="form-control">
                                  </div>
                                </div>          

                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label>Father Name</label>
                                    <input type="text" name="user_father" placeholder="Enter father name Here.." class="form-control">
                                  </div>  
                                  <div class="col-sm-6 form-group">
                                    <label>School  Name</label>
                                    <input type="text" name="school_name" placeholder="Enter School Name Here.." class="form-control">
                                  </div>  

                                </div>
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label>Email</label>
                                    <input type="text" name="user_email" placeholder="Enter Designation Here.." class="form-control">
                                  </div>    
                                  <div class="col-sm-6 form-group">
                                    <label>Phone No.</label>
                                    <input type="text" name="user_phone" placeholder="Enter Company Name Here.." class="form-control">
                                  </div>  
                                </div>          
                                <div class="form-group">
                                  <label>Address</label>
                                  <textarea name="address" placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                                </div>  

                                <div class="col-sm-12">

                                </div>  


                                <div class="opt ">
                                 <h1 > Team Members </h1>


                                 <table class=" table-bordered tabler well" >
                                  <thead>
                                    <tr>
                                     <th aria-controls="dtHorizontalVerticalExample"></th>
                                     <th aria-controls="dtHorizontalVerticalExample">First Name</th>
                                     <th aria-controls="dtHorizontalVerticalExample">Last Name</th>
                                     <th aria-controls="dtHorizontalVerticalExample">School Name</th>
                                     <th aria-controls="dtHorizontalVerticalExample">Contact</th>
                                     <th aria-controls="dtHorizontalVerticalExample">Email</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                  <tr>
                                   <td>1</td>
                                   <td><input type="text" name="first_user_name" style="width: 100%;"></td>
                                   <td><input type="text" name="first_user_lastname" style="width: 100%;"></td>
                                   <td><input type="text" name="first_school_name" style="width: 100%;"></td>
                                   <td><input type="text" name="first_user_phone" style="width: 100%;"></td>
                                   <td><input type="text" name="first_user_email" style="width: 100%;"></td>
                                 </tr>
                                 <tr>
                                   <td>2</td>
                                   <td><input type="text" name="second_user_name" style="width: 100%;"></td>
                                   <td><input type="text" name="second_user_lastname" style="width: 100%;"></td>
                                   <td><input type="text" name="second_school_name" style="width: 100%;"></td>
                                   <td><input type="text" name="second_user_phone" style="width: 100%;"></td>
                                   <td><input type="text" name="second_user_email" style="width: 100%;"></td>
                                 </tr>
                                 <tr>
                                   <td>3</td>
                                  <td><input type="text" name="third_user_name" style="width: 100%;"></td>
                                   <td><input type="text" name="third_user_lastname" style="width: 100%;"></td>
                                   <td><input type="text" name="third_school_name" style="width: 100%;"></td>
                                   <td><input type="text" name="third_user_phone" style="width: 100%;"></td>
                                   <td><input type="text" name="third_user_email" style="width: 100%;"></td>
                                 </tr>
                                 <tr>
                                   <td>4</td>
                                   <td><input type="text" name="fourth_user_name" style="width: 100%;"></td>
                                   <td><input type="text" name="fourth_user_lastname" style="width: 100%;"></td>
                                   <td><input type="text" name="fourth_school_name" style="width: 100%;"></td>
                                   <td><input type="text" name="fourth_user_phone" style="width: 100%;"></td>
                                   <td><input type="text" name="fourth_user_email" style="width: 100%;"></td>
                                 </tr>
                               </tbody>
                             </table>
                           </div>
                           <button type="submit" class="btn btn-lg btn-info pull-right" style="background: #011e61;border: 1px solid #011e61;">Submit</button>         
                         </div>
                       </form> 
                     </div>
                   </div>
                 </div>
                 <div class="tab-pane fade" id="profile">
                   <h1 class="well"  style="text-align: center;">Coding Registration</h1>
                   <form action="{{route('pakistan.event_posted')}}" method="POST" id="form">
                    @csrf
                    <input type="hidden" name="type" value="Coding">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-6 form-group">
                          <label>First Name</label>
                          <input type="text" name="user_name" placeholder="Enter First Name Here.." class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                          <label>Last Name</label>
                          <input type="text" name="user_lastname" placeholder="Enter Last Name Here.." class="form-control">
                        </div>
                      </div>          

                      <div class="row">
                        <div class="col-sm-6 form-group">
                          <label>Father Name</label>
                          <input type="text" name="user_father" placeholder="Enter father name Here.." class="form-control">
                        </div>  
                        <div class="col-sm-6 form-group">
                          <label>School  Name</label>
                          <input type="text" name="school_name" placeholder="Enter School Name Here.." class="form-control">
                        </div>  

                      </div>
                      <div class="row">
                        <div class="col-sm-6 form-group">
                          <label>Email</label>
                          <input type="text" name="user_email" placeholder="Enter Designation Here.." class="form-control">
                        </div>    
                        <div class="col-sm-6 form-group">
                          <label>Phone No.</label>
                          <input type="text" name="user_phone" placeholder="Enter Company Name Here.." class="form-control">
                        </div>  
                      </div>          
                      <div class="form-group">
                        <label>Address</label>
                        <textarea name="address"  placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                      </div>
                      <button type="submit" class="btn btn-lg btn-info pull-right" style="background: #011e61;border: 1px solid #011e61;">Submit</button>      
                    </div>
                  </form>
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
          </form>


        </div>



      </section>











    </div>
  </div>
</section>
@endsection