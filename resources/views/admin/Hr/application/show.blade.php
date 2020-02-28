@extends('_layouts.admin.default')
@section('title', 'Application View')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<!-- Start Container-->
					<div class="container" style="border: 1px solid #ccc;">
						<!-- row -->
            <div class="col-md-12">
              <div class="row">

               <aside class="col-md-4" id="sidebar" style="border-right: 1px solid #ccc;">
                <!--  Sidebar row -->
                <div class="row">                      
                 <!--  top section   -->
                 <div class="heading">                            
                  <div class="feature-img" style="max-height: 250px;">
                   <a href="#">
                    @if(isset($application->applicant->images))
                    <img src="{{asset('images/applicant/'.$application->applicant->images)}}" class="responsive-img" alt="" height="250" width="100%">
                    @else
                    <img src="{{asset('http://lyceumgroupofschools.com/images/applicant/no-image.png')}}" class="responsive-img" alt="" height="100%" width="100%">
                    @endif
                  </a> 
                </div>                            
                <div class="title col s12 m12 l9 right  wow fadeIn" style="background-color: rgba(1, 42, 123, 0.5);">   
                 <h2  class="text-white">@isset($application->applicant->name){{$application->applicant->name}} @endisset</h2> <!-- title name -->
               </div>                         
             </div>
             <br>
             <!-- sidebar info -->
             <div class="ort-info sidebar-item">
              <br><!-- text -->
              <div class="row">                               
                <div class="icon col-md-2"> <!-- icon -->
                 <i class="fa fa-user"></i>
               </div>                                
               <div class="info wow fadeIn a1 col-md-10" > 

                 <div class="section-item-details">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua . Ld do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                </div>             
              </div>
            </div>         
            <br>
            <!-- MOBILE NUMBER -->
            <div class="mobile sidebar-item">
             <div class="row">                                
              <div class="icon col-md-2"> 
               <i class="fa fa-phone"></i> <!-- icon -->
             </div>                                
             <div class="info col-md-10 " data-wow-delay="0.2s" >
               <div class="section-item-details">
                <div class="personal">
                  <h4><span>personal :</span>&nbsp;&nbsp; <a href="mailto:someone@example.com" style="color: #022b7e;">@isset($application->applicant->phone){{$application->applicant->phone}} @endisset</a></h4> 
                  <h4><span>mobile:</span>&nbsp;&nbsp; <a href="mailto:someone@example.com" style="color: #022b7e;">@isset($application->applicant->mobile){{$application->applicant->mobile}} @endisset</a></h4> <!-- Number -->             

                </div>

              </div>
            </div>
          </div>             
        </div>
        <br>
        <!--  EMAIL -->
        <div class="email sidebar-item ">
         <div class="row">                                
          <div class="icon col-md-2"> 
           <i class="fa fa-envelope"></i> <!-- icon -->
         </div>                                
         <div class=" info col-md-10 wow fadeIn a3" data-wow-delay="0.3s">
           <div class="section-item-details">
            <div class="personal">                                    
             <h4><span>personal :</span>&nbsp;&nbsp; <a href="mailto:someone@example.com" style="color: #022b7e;">@isset($application->applicant->email){{$application->applicant->email}} @endisset</a></h4> <!-- Email -->

           </div>
             <!-- <div class="work">                                 
               <h4>  <span>work :</span>&nbsp;&nbsp;<a href="mailto:someone@example.com" style="color: #022b7e;">uiuxakteck@gmail.com</a></h4> 
               <br>
             </div> -->
           </div>
         </div> 
       </div>          
     </div>
     <br>
     <!-- ADDRESS  -->
     <div class="address sidebar-item ">
       <div class="row">                                
         <div class="icon col-md-2"> 
           <i class="fa fa-home"></i> <!-- icon -->
         </div>                                
         <div class="info col-md-10 wow fadeIn a4" data-wow-delay="0.4s">
           <div class="section-item-details">
            <div class="address-details"> <!-- address  -->
             <h4>@isset($application->applicant->address){{$application->applicant->address}} @endisset</h4> 
           </div>                         
         </div>
       </div>
     </div>            
   </div>
   <!-- SKILLS -->
   <div class="skills sidebar-item" >
    <div class="row">
     <div class="icon col-md-2"> 
      <i class="fa fa-calendar-o"></i> <!-- icon -->
    </div>
    <!-- Skills -->
    <div class="skill-line a5 col-md-10" data-wow-delay="0.5s">


      @isset($application->applicant->cv)

      <iframe src="http://docs.google.com/gview?url=http://lyceumgroupofschools.com/images/applicant/cv/{{$application->applicant->cv}}&embedded=true"
                frameborder="0" width="200px" height="250px">
                </iframe>



     
     @endisset
     <h3>Branch Preference </h3>

     @isset($application->applicant->preferenceBranch1->branch_name)
     <div class="progress">
       <div class="determinate"> {{$application->applicant->preferenceBranch1->branch_name}} </div>
     </div>

     @endisset

     @isset($application->applicant->preferenceBranch2->branch_name)
     <div class="progress">
       <div class="determinate"> {{$application->applicant->preferenceBranch2->branch_name}} </div>
     </div>

     @endisset

     @isset($application->applicant->preferenceBranch3->branch_name)
     <div class="progress">
       <div class="determinate"> {{$application->applicant->preferenceBranch3->branch_name}} </div>
     </div>

     @endisset


   </div>
 </div>
</div>
</div>   <!-- end row -->
</aside><!-- end sidebar -->


<section class="col-md-8 section">
 <div class="row">
  <div class="section-wrapper row">                            
   <div class="section-icon col-md-2">
    <i class="fa fa-suitcase"></i>
  </div>
  <div class="custom-content col-md-10 wow fadeIn a1">
    <h2>Work Experience</h2>
    @if(isset($application->applicant->exper) && $application->applicant->exper)
    @foreach($application->applicant->exper as $experience)
    <div class="custom-content-wrapper" data-wow-delay="0.2s">
     <h3>{{$experience->designation}} <span>@ {{$experience->org}}</span></h3>
     <span>{{ date("M Y", strtotime($experience->job_start))}} - {{ date("M Y", strtotime($experience->job_end))}} </span>
     <p>{{$experience->leave_of_reason}} </p>
   </div>
   @endforeach
   @endif
 </div>                            
</div>

                        <!-- ========================================
                         Education 
                         ==========================================-->

                        <!-- ========================================
                              Intertests 
                              ==========================================-->
                              <div class="section-wrapper row">
                                <div class="section-icon col-md-2">
                                  <i class="fa fa-graduation-cap"></i>
                                </div>
                                <div class="custom-content col-md-10 wow fadeIn a1">
                                  <h2>Education </h2>

                                  <div class="custom-content-wrapper" style="border-bottom: none;">
                                    <table style="width: 100%;">
                                      <tbody><tr id="heading">
                                        <td>Qualification</td>
                                        <td>Board</td>
                                        <td>Percentage / Grades</td>
                                        <td>Year</td>
                                      </tr>

                                      @if(isset($application->applicant->degrees) && $application->applicant->degrees)
                                        @foreach($application->applicant->degrees as $degree)
                                        <tr>
                                        <td>{{$degree->degree}}</td>
                                        <td>{{$degree->institude}}</td>
                                        <td>{{$degree->marks}}</td>
                                        <td>{{$degree->duration}}</td>
                                      </tr>
                                        @endforeach
                                      @endif


                                     
                                    </tbody>
                                  </table>
                                </div>
                                <!-- <div class="custom-content-wrapper">
                                  <h3><strong>Skill</strong></h3>
                                  <span>JAN 2013 - DEC 2013 </span>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                                <div class="custom-content-wrapper">
                                  <h3>Hobbies</h3>
                                  <span>JAN 2013 - DEC 2013 </span>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                                <div class="custom-content-wrapper">
                                  <h3>Language</h3>
                                  <span>JAN 2013 - DEC 2013 </span>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div> -->
                              </div>
                            </div>

                          </div><!-- end row -->
                        </section>
                      </div> 
                    </div>
                  </div>  
                  <style>
        	/*------------------------------------------------------------------

[Master Stylesheet]
Project:	    Matarial CV/Resume Template 
Version:	    1.0
Last change:	06/02/16 
Primary use:	CV/Resume, Portfolio, Perosnal Website 

-------------------------------------------------------------------*/
/*
|----------------------------------------------------------------------------
| CSS INDEX
|----------------------------------------------------------------------------
    1. STYLESHEET
        1-1. CUSTOM 
        1-2. TYPOGRAPHY
        1.3. BODY
    2. SIDEBAR
    3. SECTIONS CUSTOM STYLE
    4. WORK EXPERIENCE
    5. INTEREST
    6. WEBSITE
    7. BLOG
    8. COVER LATTER
    9. CONTACT
    10. PORTFOLIO

    ------------------------------------------------------------------*/
/*------------------------------------------------------------------
[ Color codes ]
    main-color:         #5da4d9;
    Blue:               #71DD75 (Blue)    [ This is the main color in Template ]
    white:              #FFFFFF (White)     [  ]
    body-bg-color:      #eae8e7            [ body bg color ]
    font-color:         #767270             [ font color  ]
    border-color:       #4783c2;

    ------------------------------------------------------------------ */
    * {
    	font-family: 'roboto', sans-serif;
    }
    .fix {
    	overflow: hidden;
    }
    p {
    	font-family: 'Roboto', sans-serif;
    	font-weight: 300;
    	font-size: 10pt;
    	line-height: 17pt;
    }
    a {
    	color: #ffffff;
    }
    td{
      border: 1px solid #ccc;
      padding: 2px;
    }
    .clear {
    	clear: both;
    }
    /* style for wow animation*/
    .a1 {
    	visibility: visible;
    	-webkit-animation-delay: 0.1s;
    	-moz-animation-delay: 0.1s;
    	animation-delay: 0.1s;
    }
    .a2 {
    	visibility: visible;
    	-webkit-animation-delay: 0.2s;
    	-moz-animation-delay: 0.2s;
    	animation-delay: 0.2s;
    }
    .a3 {
    	visibility: visible;
    	-webkit-animation-delay: 0.3s;
    	-moz-animation-delay: 0.3s;
    	animation-delay: 0.3s;
    }
    .a4 {
    	visibility: visible;
    	-webkit-animation-delay: 0.4s;
    	-moz-animation-delay: 0.4s;
    	animation-delay: 0.4s;
    }
    .a5 {
    	visibility: visible;
    	animation-delay: 0.5s;
    	-webkit-animation-delay: 0.5s;
    	animation-name: fadeIn;
    	-webkit-animation-name: fadeIn;
    }
    /* style for Typography */
    h2,
    h3 {
    	font-family: 'Roboto', sans-serif;
    	font-weight: 500;
    }
    h2 {
    	font-size: 22pt;
    	line-height: 37pt;
    	margin: 0px;
    }
    h3 {
    	font-size: 14pt;
    	line-height: 24pt;
    }
    h4 {
    	font-size: 12pt;
    	line-height: 20pt;
    	opacity: 1;
    }
    h5 {
    	font-size: 10pt;
    	margin: 0px;
    	padding: 0px;
    	line-height: 15pt;
    }
    .fa {
    	font-size: 22px;
    }
/* style for

***** body  *****

*/
body {
	background-color: #eae8e7;
	color: #767270;
	text-align: center;
}
.container {
	margin-top: 24px;
}
/* style for

***** Sidebar  *****

*/
.sidebar {
	text-align: left;
	color: #ffffff;
	background-color: #5da4d9;
	overflow: hidden;
	display: block;
}
.sidebar .heading {
	position: relative;
}
.sidebar .heading .feature-img {
	position: relative;
}
.sidebar .heading .feature-img img {
	width: 100%;
}
.sidebar .heading .button-collapse {
	display: block !important;
}
.sidebar .heading .nav-icon {
	position: absolute;
	top: 0;
	padding: 0 16px;
}
.sidebar .heading nav {
	background-color: initial;
	box-shadow: initial;
}
.sidebar .heading nav .button-collapse i {
	height: 30px;
	font-size: 18pt;
	line-height: 24pt;
	background-color: #5da4d9;
	margin-top: 20px;
	padding: 0px 6px;
}
.sidebar .heading nav .side-nav h3 {
	color: #5da4d9;
	padding: 0 15px;
}
.sidebar .heading nav .side-nav li a:hover {
	color: #5da4d9;
}
.sidebar .heading nav .side-nav li:hover {
	background-color: transparent !important;
}
.sidebar .heading .title {
	position: absolute;
	right: 11px;
	bottom: 46px;
}
.sidebar .heading .title span {
	margin-top: -5px;
	font-size: 10pt;
	margin: 0px;
	padding: 0px;
	line-height: 15pt;
}
.sidebar .icon {
	margin-top: 8px;
}
.sidebar .icon .fa {
	display: inherit;
	text-align: center;
}
.sidebar .sidebar-item {
	overflow: hidden;
	margin-top: 10px;
}
.sidebar .sidebar-item:first-child {
	margin-top: 30px;
}
.sidebar .section-item-details {
	padding-right: 26px;
	margin-bottom: 30px;
}
.sidebar .section-item-details p {
	margin: 0px;
}
.sidebar .info {
	border-bottom: 1px solid #4783c2;
	padding-left: 0px;
}
.sidebar .info span {
	opacity: 0.7;
	font-weight: 300;
}
.sidebar .personal {
	margin-bottom: 20px;
}
.sidebar .personal h4 {
	margin: 0px;
}
.sidebar .work h4 {
	margin-bottom: 0px;
}
.sidebar .address-details h4 {
	margin-top: 0px;
}
.sidebar .address-details h4 span {
	font-size: 10pt;
}
.sidebar .skill-line {
	padding-right: 30px;
	padding-left: 0px;
}
.sidebar .skill-line .progress {
	background-color: #4783c2;
	height: 2px;
	overflow: visible;
}
.sidebar .skill-line .determinate {
	background-color: #ffffff;
}
.sidebar .skill-line .determinate .fa {
	font-size: 12px;
	position: absolute;
	top: -5px;
	right: 0px;
	margin-left: 50%;
}
.sidebar .skill-line h3 {
	margin-top: 0px;
	margin-bottom: 20px;
}
.sidebar .skill-line span {
	opacity: initial;
}
/* style for

***** Sections *****

*/
#section {
	overflow: hidden;
}
.section {
	padding-left: 32px !important;
	text-align: left;
}
.section .fa {
	text-align: center;
	display: block;
	font-size: 30pt;
}
.section .section-wrapper {
	background-color: #ffffff;
	overflow: hidden;
	margin-bottom: 24px;
	padding-bottom: 24px !important;
}
.section .section-wrapper .section-icon {
	margin-top: 40px;
}
.section .section-wrapper h2 {
	margin-top: 30px;
	margin-bottom: 25px;
}
/* style for

***** Work Experience  *****

*/
.custom-content {
	padding-right: 0px !important;
}
.custom-content-wrapper {
	padding-right: 30px;
	margin-bottom: 25px;
	border-bottom: 1px solid #bdbdbd;
}
.custom-content-wrapper:last-child {
	border-bottom: initial;
}
.custom-content-wrapper h3 {
	margin: 0px;
	font-size: 12pt;
	line-height: 20pt;
}
.custom-content-wrapper h3 span {
	color: #767270;
}
.custom-content-wrapper span {
	color: #5da4d9;
	margin-top: 0px;
	font-size: 10pt;
	line-height: 15pt;
}
.custom-content-wrapper p {
	margin-top: 0px;
	margin-bottom: 25px;
}
/* style for

*****  Interests  *****

*/
.interests ul {
	padding-left: 0px;
}
.interests ul li {
	list-style-type: none;
	display: inline-block;
	width: 19%;
}
.interests ul li .fa {
	color: #5da4d9;
	text-align: left;
}
/* style for

***** Portfolio website  *****

*/
.website {
	padding-top: 40px !important;
	padding: 20px;
}
.website span {
	font-size: 12pt;
	line-height: 18pt;
}
.website span a {
	color: #5da4d9;
	word-wrap: break-word;
}
/* style for

***** blog  *****

*/
.post-title {
	margin-top: -5px;
	color: white;
	padding: 20px 30px;
}
.post-title h2 {
	margin: 0px;
	font-size: 14pt;
	line-height: 24pt;
}
.post-title span {
	opacity: 0.7;
}
.blog-post .thumbnail img {
	width: 100%;
	margin-bottom: -2px;
}
.blog-post:nth-child(odd) {
	padding-left: 0px !important;
}
.blog-post:nth-child(even) {
	padding-right: 0px !important;
}
.blog-post:last-child {
	padding-right: 0px !important;
}
#blog-post-1 {
	background-color: #e95855;
}
#blog-post-2 {
	background-color: #707281;
}
#blog-post-3 {
	background-color: #564d52;
}
#blog-post-4 {
	background-color: #47bac9;
}
#blog-post-5 {
	background-color: #68c02e;
}
.post-details {
	background-color: #ffffff;
	padding: 20px 30px;
	margin-bottom: 24px;
}
.featured-img {
	padding-right: 0px !important;
}
.caption {
	padding-left: 0px !important;
}
#caption .post-details {
	margin-bottom: 0px;
}
.comment .section-wrapper {
	padding-bottom: 0px !important;
	margin-bottom: 0px !important;
}
.comment .comment-img {
	padding: 10px;
}
.comment .comment-details {
	padding: 10px;
}
.comment .comment-details h4 {
	margin: 0px;
}
.comment .comment-details span {
	font-size: 9pt;
	line-height: 17pt;
}
.comment-form {
	padding-bottom: 0px;
	background-color: #fff;
	padding: 20px 50px !important;
}
/* style for
    **************
   * Cover latter * 
 
   */
   .cover-latter {
   	padding: 30px;
   	margin-right: 5px;
   	margin-bottom: 24px;
   	background-color: white;
   }
   .cover-latter strong {
   	font-weight: 400;
   }
   .cover-latter p:last-child {
   	margin: 30px 0px;
   }
   .cover-latter p h2 {
   	margin-bottom: 0px;
   	font-size: 12pt;
   	line-height: 20pt;
   }
   .cover-latter .cover-title span {
   	font-size: 12pt;
   	line-height: 20pt;
   	font-weight: 500;
   }
   .cover-latter .cover-title h2 {
   	font-size: 12pt;
   	line-height: 20pt;
   	margin-top: 20px;
   }
   .cover-latter .cover-title h4 {
   	font-weight: 500;
   }
   .cover-latter .cover-title p {
   	margin-top: 0px;
   }
   .cover-latter .signature h4 {
   	margin: 0px;
   }
/* ***** Contact  *****
*
*/
.section .g-map {
	padding-bottom: 0px !important;
}
.section .g-map #map {
	width: 100%;
	height: 350px;
}
input[type=text]:focus:not([readonly]),
input[type=password]:focus:not([readonly]),
input[type=email]:focus:not([readonly]),
input[type=url]:focus:not([readonly]),
input[type=time]:focus:not([readonly]),
input[type=date]:focus:not([readonly]),
input[type=datetime-local]:focus:not([readonly]),
input[type=tel]:focus:not([readonly]),
input[type=number]:focus:not([readonly]),
input[type=search]:focus:not([readonly]),
textarea.materialize-textarea:focus:not([readonly]) {
	border-bottom: 1px solid #5da4d9;
}
input[type=text]:focus:not([readonly]) + label,
input[type=password]:focus:not([readonly]) + label,
input[type=email]:focus:not([readonly]) + label,
input[type=url]:focus:not([readonly]) + label,
input[type=time]:focus:not([readonly]) + label,
input[type=date]:focus:not([readonly]) + label,
input[type=datetime-local]:focus:not([readonly]) + label,
input[type=tel]:focus:not([readonly]) + label,
input[type=number]:focus:not([readonly]) + label,
input[type=search]:focus:not([readonly]) + label,
textarea.materialize-textarea:focus:not([readonly]) + label {
	color: #5da4d9;
}
.waves-me:focus {
	background-color: #5da4d9;
	color: #fff;
}
.btn {
	margin-left: 10px;
	background-color: #5da4d9;
}
.btn:hover,
.btn:focus {
	background-color: #5da4d9;
}
.email-success,
.email-failed {
	display: none;
	text-align: left !important;
	margin: 0 0 0 0 !important;
}
.btn.disabled {
	background-color: #5da4d9;
	color: #fff;
	cursor: default;
}
.btn.disabled:focus {
	background-color: #5da4d9;
	color: #fff;
	cursor: default;
}
.btn.disabled:hover {
	background-color: #5da4d9;
	color: #fff;
	cursor: default;
}
#msgSubmit {
	font-size: 20px;
	margin-bottom: 20px;
	margin-left: 10px;
}
.text-danger {
	color: red;
}
.text-success {
	color: #5da4d9 ;
}
/*
|----------------------------------------------------------------------------
| PORTFOLIO
|----------------------------------------------------------------------------
*/
.portfolio-nav ul {
	margin: 30px;
	text-align: center;
}
.portfolio-nav ul li {
	list-style-type: none;
	display: inline;
	margin: 10px;
	padding-bottom: 5px;
	cursor: pointer;
	text-transform: uppercase;
}
.portfolio-nav ul li:hover {
	border-bottom: 1px solid #bdbdbd;
}
.mix {
	display: none;
}
.fancybox-overlay {
	background-color: rgba(25, 22, 22, 0.69);
}
.back-btn {
	margin: 0 auto;
	text-align: center;
	margin-bottom: 20px;
}
.back-btn .fa {
	display: inline;
}
#back-button {
	display: none;
	text-align: center;
	text-transform: uppercase;
	margin: 0 auto;
	padding: 15px;
}
#back-button i {
	margin-right: 10px;
	font-size: 30px;
	opacity: 0.9;
	position: relative;
	top: 5px;
	margin-right: 15px;
}
#back-button img {
	padding: 10px;
}
#loader {
	min-height: 930px;
	position: relative;
	display: none;
}
#loader .loader-icon {
	background: url(../images/loading.gif) no-repeat center center;
	background-color: #FFF;
	margin: -22px -22px;
	top: 50%;
	left: 60%;
	z-index: 10000;
	position: fixed;
	width: 44px;
	height: 44px;
	-webkit-background-size: 30px 30px;
	background-size: 30px 30px;
	border-radius: 5px;
}
.full-project {
	padding: 30px !important;
}
.single-project {
	background-color: #fff;
	margin-bottom: 20px;
}
.single-project .full-project-title {
	font-size: 30px;
}
.single-project-img {
	margin: 0;
	padding: 0 !important;
}
.single_image {
	color: #fff;
	text-align: left;
}
.single_image h2 {
	font-size: 22px;
	line-height: 34px;
	margin: 10px 0;
}
.single_image p {
	text-transform: normal;
	margin-top: 10px;
	opacity: 0.8;
}
.full-portfolio {
	position: relative;
}
.full-portfolio .section-wrapper {
	padding-bottom: 0 !important;
}
.full-project-content {
	padding: 30px;
}
.project-information li a {
	color: #5da4d9;
}
li{
	list-style-type: none;
}
</style>
 <!--=====================
                JavaScript
                ===================== -->
                <!-- Jquery core js-->
                <script src="assets/js/jquery.min.js"></script>

                <!-- materialize js-->
                <script src="assets/js/materialize.min.js"></script>

                <!-- wow js-->
                <script src="assets/js/wow.min.js"></script>

                <!-- Map api -->
                <script src="//maps.googleapis.com/maps/api/js?v=3.exp"></script>

                <!-- Masonry js-->
                <script src="assets/js/masonry.pkgd.js"></script>

                <script src="assets/js/validator.min.js"></script>

                <!-- Customized js -->
                <script src="assets/js/init.js"></script>

        <!-- =========================================================
            STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
            ===========================================================-->

            <!-- Style switter js -->
            <script src="assets/js/styleswitcher.js"></script>


          </div>
        </div>
      </div>
    </div>
  </div>
  <style>

  </style>
  @endsection