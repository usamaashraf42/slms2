{{-- 
/**
 * Project:Muscat American Lyceum school.
 * User: SHAFQAT GHAFOOR
 * Phone: 03076110561
 * Date: 6/13/2019
 * Time: 12:30 PM
 */
 --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <base href="{{ url('/')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @section('metas')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  @show
  @stack('pre-styles')

  @section('styles')

  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
  <title> @yield('title','Muscat') - American Lyceum Group of School</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <!-- Icon fonts -->
 <!--  <link href="{{asset('web/muscat/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('web/muscat/fonts/flaticons/flaticon.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('web/muscat/fonts/glyphicons/bootstrap-glyphicons.css')}}" rel="stylesheet" type="text/css"> -->
  <!-- Google fonts -->
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:700,900' rel='stylesheet' type='text/css'>
  <!-- Theme CSS -->
  <link href="{{asset('web/muscat/css/style.css')}}" rel="stylesheet">
  <!-- Color Style CSS -->
  <link href="{{asset('web/muscat/styles/funtime.css')}}" rel="stylesheet">
  <!-- Owl Slider & Prettyphoto -->
  <link rel="stylesheet" href="{{asset('web/muscat/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('web/muscat/css/prettyPhoto.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('web/muscat/styles/style_1.css')}}">
  <link rel="stylesheet" href="{{asset('web/muscat/layerslider/css/layerslider.css')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('web/muscat/img/favicon.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('web/muscat/img/favicon.png')}}">
  <link rel="shortcut icon" href="{{asset('web/muscat/img/favicon.png')}}" type="image/x-icon">
  <link rel="stylesheet" id="switcher-css" type="text/css" href="{{asset('web/muscat/switcher/css/switcher.css')}}" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/funtime.css')}}" title="funtime" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/playground.css')}}" title="playground" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/games.css')}}" title="games" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/childhood.css')}}" title="childhood" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/school.css')}}" title="school" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/switcher/css/boxed.css')}}" title="boxed" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/switcher/css/full.css')}}" title="full" media="all" />
  @show
  @stack('post-styles')
<style>
  .blog-preview img{ width: 100%!important;
height: 300px;
}

  .about_us .about_us_text p {
  line-height: 1.929;
  margin-bottom: 35px;
}
h2, .btn, .btn-primary, .owl-theme .owl-dots .owl-dot span, .owl-theme .owl-dots .owl-dot span:before, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, .owl-prev, .owl-next, .pager li>a:hover, .social-media a i, .back-to-top i:hover, .pagination>li>a:hover, .pagination>li>a:focus, .pager li > a:hover, .pager li > a:focus, .navbar-brand-centered:hover, .navbar-brand-centered:focus, .navbar-toggle:focus, .navbar-toggle:active, .navbar-toggle:hover, .navbar-custom ul.nav li a:hover, .navbar-custom .nav > .active > a, .navbar-custom ul.nav ul.dropdown-menu li a:hover, .navbar-custom ul.nav ul.dropdown-menu li a:focus, .nav .open>a, .nav .open>a:focus, .nav .open>a:hover, .pagination>.active>a, .pagination>.active>a:focus, .nav-pills>li.active>a, .nav.nav-pills > li > a:focus, .nav.nav-pills > li > a:hover, .nav.nav-pills > li > .active, .nav.nav-tabs>li>a:hover, .nav.nav-tabs > li.active > a:hover, .nav.nav-tabs > li.active > a:focus, .nav.nav-tabs>li.active>a, .pricing-item:hover .pricing-deco, .blog-tags a:hover {
    background-color: #e6383d!important;
}
.quote-test {
    margin-top: 10px;
    /* padding: 24px; */
    text-align: left!important;
    font-family: sans-serif;
    color: #ccc;
}
.img_bx {
    border: 2px solid #353794;
}
.gallery-thumb {
    display: block;
    position: relative;
    overflow: hidden;
    border-radius: 25%;
    box-shadow: 6px 6px 0px rgba(103, 102, 102, 0.2);
}
.gallery-thumb .overlay-mask {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    z-index: 1;
    border-radius: 22%!important;
    transition: opacity .3s ease-out;
}
.service:hover h4, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover, .team-item .team-caption, .navbar-custom ul.nav ul.dropdown-menu li a, .panel-heading a, .panel-heading a:hover, .nav-pills .nav > li > a:focus, .navbar-brand-centered, .navbar-header, .btn:hover, .btn:focus, .btn-primary:hover, .btn-primary:focus, .navbar-collapse, .owl-prev:hover, .owl-next:hover, .back-to-top i, #instafeed .likes, .social-media a i:hover, .blog-tags a, .date-category, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {
    background-color: #f5f5f5;
}
.shade_er{
      border: 1px solid #ccc;
    margin-bottom: 8px;
    box-shadow: 2px 0px 5px #ccc;
    min-height: 350px;
}
.navbar-brand-centered {
    border-radius: 0 0 50% 50%;
    max-height: 100px;
    left: 0;
    right: 0;
    top: 0%;
    padding: 80px 65px!important;

border: 4px solid #353794;  margin: auto;
    position: absolute;
    width: 160px;
    transition: all .2s ease-in-out;
}
.navbar-brand-centered img {
    max-height: 118px;
    position: absolute;
    left: 0;
    right: 0;
    top: 5%;
    margin: auto;
}
.quote-test p {
    font-size: 16px;
    display: inline;
}
h2:before, #about .media i:hover, footer i, .smaller.social-media a i:hover, footer a, .post-info i, .breadcrumb>.active, .gallery-thumb i:hover {
    color: #34327c;
    background: #c1c1c1;
    display: none!important;
}
@media (max-width: 576px) {
  /* line 53, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
  .about_us .about_us_text p {
    margin-bottom: 10px;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 53, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
  .about_us .about_us_text p {
    margin-bottom: 20px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  /* line 53, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
  .about_us .about_us_text p {
    margin-bottom: 20px;
  }
}

/* line 68, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
.about_us .about_us_text ul {
  list-style: none;
  padding: 0;
  margin: 0;
  margin-bottom: 30px;
}

@media (max-width: 576px) {
  /* line 68, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
  .about_us .about_us_text ul {
    margin-bottom: 10px;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 68, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
  .about_us .about_us_text ul {
    margin-bottom: 20px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  /* line 68, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
  .about_us .about_us_text ul {
    margin-bottom: 20px;
  }
}

/* line 88, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
.about_us .about_us_text ul li {
  display: inline-block;
  margin-bottom: 20px;
  font-size: 16px;
  padding-right: 33px;
  padding-top: 12px;
  color: #242429;
  width: 50%;
  float: left;
  font-family: "Playfair Display", serif;
  position: relative;
  padding-left: 29px;
}

@media (max-width: 991px) {
  /* line 88, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
  .about_us .about_us_text ul li {
    padding-top: 5px;
    padding-right: 15px;
  }
}

/* line 106, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
.about_us .about_us_text ul li span {
  margin-right: 10px;
  color: #0065e1;
  position: absolute;
  top: 16px;
  left: 0;
}

@media (max-width: 991px) {
  /* line 106, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
  .about_us .about_us_text ul li span {
    top: 10px;
  }
}

/* line 120, ../../01 cl html template/03_jun 2019/182_medico_html/sass/_about_us.scss */
.about_us .about_us_text .btn_2 {
  margin-top: 13px;
}
h3 {
    font-family: 'Alegreya sans',serif;
    color: #e6383d!important
    font-weight: 800;
    font-size: 46px;
    margin-top: 0px;
    position: relative;
}
.blog-preview {
    position: relative;
    float: left;
    overflow: hidden;
    margin: 10px 1%;
    min-height: 270px;
  }
.blog-preview p{
      text-align: justify;
}
.nav.nav-tabs > li > a {

    color: #fff !important;
    font-size: 18px!important;
}
.img-circle {
    box-shadow: 6px 6px 0px rgba(103, 102, 102, 0.2);
    height: 286px!important;
}
.blog-preview img{ width: 100%!important;
height: 280px;
}
.images_boxs{
  margin: 30px;
}
.media-body p{
  min-height: 225px;
  padding: 10px;
}
.images_boxs img{
 width: 90%;
}
.navbar-custom ul.nav li a {
    font-size: 15px!important;
    text-align: center;
    transition: background .2s ease-in-out;
    font-family: 'Lato',sans-serif;
    color: #fff;
    letter-spacing: 0.2px;
    font-weight: 600;
    background: transparent;
}
.social_1{
      width: 40px;
    height: 40px;
    display: inline-block;
}
.social_1 img{ width: 100%;
 border-radius: 50px;

}
.navbar-custom ul.nav li a {
    font-size: 23px!important;
    text-align: center;
    transition: background .2s ease-in-out;
    font-family: 'Lato',sans-serif;
    color: #fff;
    letter-spacing: 0.2px;
    font-weight: 600;
    background: transparent;
}
.navbar-nav > li > a {
    line-height: 58px;
    padding: 8px 16px;
    transition: background .2s ease-in-out;
}
.slide1 img{
  max-height:550px;
    border: 25px solid #353794;
    border-radius: 5px;
}
.slide1 :hover{
transform: scale(1.1); 
}
.form-control {
    display: block;
    width: 100%;
    height: 40px;
border: 1px solid #000;
    font-size: 15px;
    outline: 0;
    box-shadow: none;
    background: #fff;
    border-radius: 10px;
    margin-top: 15px;
    padding: 4px 15px;
}
#layerslider {
    padding-top: 75px;
    border-bottom: 2px dashed;
    width: 100% !important;
    height: 531px!important;
}
</style>
  <script type="text/javascript">
    var BASE_URL = "{{ url('/')}}";
  </script>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="overflow-x: hidden;">
   <div class="full">
      <div class="demo_changer">
         <div class="form_holder">
            <div class="row">
               <div class="col-md-12 text-center">
                  <div class="predefined_styles">
                     <h4>Choose a Color Skin</h4>
                     <a href="playground" class="styleswitch"><img src="{{asset('web/muscat/switcher/images/icons/playground.png')}}" class="img-circle" alt=""></a>     
                     <a href="games"  class="styleswitch"><img src="{{asset('web/muscat/switcher/images/icons/games.png')}}" class="img-circle" alt=""></a>
                     <a href="funtime" class="styleswitch"><img src="{{asset('web/muscat/switcher/images/icons/funtime.png')}}" class="img-circle" alt=""></a>
                     <a href="school" class="styleswitch"><img src="{{asset('web/muscat/switcher/images/icons/school.png')}}" class="img-circle" alt=""></a>               
                     <a href="childhood" class="styleswitch"><img src="{{asset('web/muscat/switcher/images/icons/childhood.png')}}" class="img-circle" alt=""></a>
                     <h4>Width</h4>
                     <a href="boxed" class="btn styleswitch">Boxed</a>
                     <a href="full" class="btn styleswitch">Full Width</a>
                     <h4>Header</h4>
                     <a href="index.html" class="btn">Layerslider</a>
                     <a href="index_video.html" class="btn">Video</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top" >
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
               <i class="fa fa-bars"></i>
            </button>
            <div class="navbar-brand-centered page-scroll">
               <a href="#page-top"><img src="{{asset('web/muscat/img/logo.png')}}"  alt=""></a>
            </div>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="navbar-brand-centered" style="background-color: #353794!important;">
            <div class="container">
               <ul class="nav navbar-nav page-scroll navbar-left">
                       <li><a href="{{route('muscat.nursery')}}">Home</a></li>
            
               </ul>
               <ul class="nav navbar-nav page-scroll navbar-right">
         
               
                  <li><a href="{{route('muscat.jobs')}}" style="width: 120px; font-size: 18px;">Vacancies</a></li>
          
               </ul>
            </div>
         </div>
      </nav>
      <div id="layerslider" class="ls-container ls-fullwidth" style="visibility: visible;">
         <div class="ls-inner" style="background-color: transparent; width: 100%;height: 100%;">
          <div class="ls-lt-container ls-overflow-hidden" style="width: 100%;height: 100%; display: block;">
             <div class="ls-curtiles" style="overflow: hidden;"><img src="{{asset('web/muscat/img/web/career_1.jpg')}}" width="100%" height="100%"></div>
             <div class="ls-nexttiles">
                <div class="ls-lt-tile" style="width: 100%;height: 100%; overflow: visible;">
                   <div class="ls-nexttile" style="top: 0px; left: 0px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"></div></div></div></div>
         
              
                  <div class="ls-slide ls-slide-4 ls-animating" data-ls="transition2d:104;timeshift:-2000;" style="width: 100%;height: 100%; visibility: visible; display: none; left: auto; right: 0px; top: 0px; bottom: auto;">
                     <img class="ls-bg ls-preloaded" alt="Slide background" style="padding: 0px; border-width: 0px; width: 1903px; height: 1032px; margin-left: 0px; margin-top: -166px; visibility: visible; opacity: 0.484476;">
                     <div class="ls-gpuhack" style="width: auto; height: auto; padding: 0px; border-width: 0px; left: 311.5px; top: 0px;"></div>
                     <img src="{{asset('web/muscat/img/bee.png')}}" class="ls-l img-responsive hidden-xs hidden-sm parallax1 ls-preloaded" alt="" data-ls="delayin:1500;easingin:fadeIn;parallaxlevel:7;" style="margin-left: 0px; margin-top: 0px; width: 180px; height: 169px; padding: 0px; border-width: 0px; left: 311.5px; top: 0px; transform-origin: 50% 50% 0px; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 63.7959, 0, 0, 1); opacity: 0.202551; visibility: visible; filter: none;">
                     <!-- Text -->

                     <div class="ls-l header-text" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin:easeOutElastic;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;parallaxlevel:2;" style="margin-left: 0px; margin-top: 0px; width: auto; height: auto; font-size: 14px; padding: 30px; border-width: 0px; left: 311.5px; top: 0px; filter: none; background-color: rgb(245, 245, 245,0.5);">
                        <h1>Welcome to American Lyceum</h1>
                        <p class="subtitle hidden-xs"> American Lyceum International <br> Nursary & School  </p>
                        <!-- Button -->

                        <div class="page-scroll hidden-xs">
                           <a class="btn" href="#contact">Contact us</a>
                        </div>
                     </div>
                     <!-- Parallax Image -->
                     <img src="{{asset('web/muscat/img/star.png')}}" class="ls-l img-responsive hidden-xs hidden-sm parallax2 ls-preloaded" alt="" data-ls="delayin:1500;easingin:fadeIn;parallaxlevel:6;" style="margin-left: 0px; margin-top: 0px; width: 120px; height: 112px; padding: 0px; border-width: 0px; left: 311.5px; top: 0px; transform-origin: 50% 50% 0px; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 63.7959, 0, 0, 1); opacity: 0.502551; visibility: visible; filter: none;">
                  </div>
                 
                     <div class="ls-circle-timer" style="display: none;">

                      <div class="ls-ct-left">

                       <div class="ls-ct-rotate" style="transform: matrix(1, 0, 0, 1, 0, 0);">

                          <div class="ls-ct-hider">

                           <div class="ls-ct-half">
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="ls-ct-right">

                     <div class="ls-ct-rotate" style="transform: matrix(1, 0, 0, 1, 0, 0);">

                      <div class="ls-ct-hider">

                       <div class="ls-ct-half">

                       </div>
                    </div>
                 </div>
              </div>
              <div class="ls-ct-center">
              </div>
           </div>
        </div> 
     </div>
    <div class="clear-fix"></div>
    <div class="container">
      <div class="col-md-12" style="text-align: center;">
   <h2 style="padding: 25px 28px;">Apply Now</h2>
</div>
    </div>
    <div class="container" style="margin-top: 40px; border: 1px solid #ccc;padding-top: 20px;">

                    <form  action="http://www.lyceumgroupofschools.com/pakistan/jobs" id="applicationForm"  method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="kkByhdgJZZJ88qpYUgvKt9VVZToXjoWktLIDu0yZ">                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="hidden" name="_token" value="kkByhdgJZZJ88qpYUgvKt9VVZToXjoWktLIDu0yZ">                          <label for="exampleInputEmail1">Select Job Opening</label>
                          <span> (select upto 3 max)</span>
                          <select  class="chosen-select form-control" multiple name="jobIds[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" >
                            <option disabled="disabled">SELECT JOB TO APPLY </option>
                            <optgroup label="MANAGEMENT">
                              <option value="principal">Principal</option>
                              <option value="Branch Heads">Branch Heads </option>
                              <option value="Assistant Branch Heads">Assistant Branch Heads </option>
                              <option value="O-Level Co-ordinator">O-Level Co-ordinator </option>
                              <option value="Pre-school Head">Pre-school Head</option>
                              <option value="Primary Section Head">Primary Section Head</option>
                              <option value="Senior Section Head">Senior Section Head</option>
                              <option value="Admin Officer">Admin Officer</option>
                            </optgroup>
                            <optgroup label="ACADEMICS">
                              <option value="Senior Teacher">Senior Teacher</option>
                              <option value="Teacher">Teacher</option>
                              <option value="Junior Teacher">Junior Teacher</option>
                              <option value="O-Level Teacher">O-Level Teacher</option>
                            </optgroup>
                            <optgroup label="GENERAL">
                              <option value="Accounts">Accounts</option>
                              <option value="Franchise Manager">Franchise Manager</option>
                              <option value="Assistant Franchise Manager">Assistant Franchise Manager</option>.
                              <option value="Canteen Manager">Canteen Manager</option>
                              <option value="Canteen Operator">Canteen Operator</option>
                            </optgroup>
                            <optgroup label="SOFTWARE DEVELOPER">
                              <option value="Web/App Developer">Web/App Developer       </option>
                            </optgroup>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="country_id"> Select Country</label>
                        <select  name="country_id" id="country_id" onchange="countryHasBranch(this)" style="    width: 100%;
    height: 28px;">
                          <option disabled="disabled" selected="selected">Choose the country </option>
                          <option value="92">Pakistan</option>
                          <option value="968">Oman</option>
                        </select>
                      </div>
                      <div class="col-md-4 otherBranches" style="display: none;">
                        <div class="form-group">
                          <label for="branch_id">In which branch are you interested: Preference</label>

                          <select  class="chosen-select-branch form-control" multiple name="branchids[]" class="form-control" id="branch_id" aria-describedby="emailHelp" placeholder="Enter Name" >
                            <option disabled="disabled">Choose the Branch</option>

                            
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 omanBranches" style="display: block">
                        <div class="form-group">
                          <label for="branch_id">In which branch are you interested: Preference</label>

                          <select  class="chosen-select-branch " multiple name="branchids[]" class="form-control" id="branch_id" aria-describedby="emailHelp" placeholder="Enter Name" style="width: 100%;height: 28px;" >
                            <option disabled="disabled">Choose the Branch</option>
                                                                                    <option value="">Nursery Azaibah                </option>
                                                        <option value="">School Azaibah </option>
                                                      </select>
                        </div>
                      </div>
                      <div class="col-md-4 pakistanBranches" style="display: block">
                        <div class="form-group">
                          <label for="branch_id">In which branch are you interested: Preference
                            <span style="font-weight: normal!important;"><br> (select upto 3 max)</span></label>
                          <select type="textx" class="chosen-select-branch form-control" multiple name="branchids[]" class="form-control" id="branch_id" aria-describedby="emailHelp" placeholder="Enter Name" >
                            <option disabled="disabled"> Choose the Branch </option>
                                                                                    <option value="">Township                       </option>
                                                        <option value="">Johar Town II                  </option>
                                                        <option value="">Model Town                     </option>
                                                        <option value="">Ravi Campus                    </option>
                                                        <option value="">WAPDA Town                     </option>
                                                        <option value="">Allama Iqbal Town              </option>
                                                        <option value="">Engineers Town                </option>
                                                        <option value="">Premier Branch /EME                </option>
                                                        <option value="">Canal Bank Mpg </option>
                                                        <option value="">Arifwala                       </option>
                                                        <option value="">Kasur                          </option>
                                                        <option value="">Awan Town                      </option>
                                                        <option value="">Faisalabad                     </option>
                                                        <option value="">NFC                            </option>
                                                        <option value="">Rawalpindi                     </option>
                                                        <option value="">Muridke                        </option>
                                                        <option value="">Expo Branch                    </option>
                                                        <option value="">Khanewal                       </option>
                                                        <option value="">Faisalabad 2                   </option>
                                                        <option value="">Shahdara                       </option>
                                                        <option value="">Sialkot 1                      </option>
                                                        <option value="">Sheikhupura 1                  </option>
                                                        <option value="">Westwood                       </option>
                                                        <option value="">Aishayna (Ferozpur Road)       </option>
                                                        <option value="">Gujranwala1                    </option>
                                                        <option value="">Renala Khurd 1                 </option>
                                                        <option value="">Township Junior Campus         </option>
                                                        <option value="">Sharaqpur 1                    </option>
                                                        <option value="">Pattoki Branch                 </option>
                                                        <option value="">Franchise                      </option>
                                                        <option value="">Kamokee                        </option>
                                                        <option value="">Valencia                       </option>
                                                        <option value="">Kahna (Ferozpur Road)          </option>
                                                        <option value="">Amir Town                      </option>
                                                      </select>
                        </div>
                      </div>
                      <div class="col-md-4 subjectsDiv" style="display: block">
                        <div class="form-group">
                          <label for="subjectsIds">Which subject  are you best in teaching</label>
                          <span style="font-weight: normal!important;"><br> (select upto 3 max)</span>
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
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="nationality" style="margin-bottom: 20px;">Nationality</label>

                          <select  class="form-control input-md nationality" name="nationality"
                           id="nationality" 
                          style="min-height: 25px;">
                            <option value="AF">Afghanistan   </option>
                            <option value="AX">Åland Islands </option>
                            <option value="AL">Albania       </option>
                            <option value="DZ">Algeria       </option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra       </option>
                            <option value="AO">Angola     </option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia, Plurinational State of</option>
                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, the Democratic Republic of the</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Côte d'Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CW">Curaçao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran, Islamic Republic of</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea, Democratic People's Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK" selected>Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territory, Occupied</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Réunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin (French part)</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten (Dutch part)</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province of China</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands, British</option>
                            <option value="VI">Virgin Islands, U.S.</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="residence">Residence</label>
           <select  class="input-md residence" name="residence" id="residence" style="min-height: 25px;width: 100%;height: 35px;">
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia, Plurinational State of</option>
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, the Democratic Republic of the</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Côte d'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="VA">Holy See (Vatican City State)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran, Islamic Republic of</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea, Democratic People's Republic of</option>
                                <option value="KR">Korea, Republic of</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia, Federated States of</option>
                                <option value="MD">Moldova, Republic of</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK" selected>Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestinian Territory, Occupied</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barthélemy</option>
                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten (Dutch part)</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan, Province of China</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UM">United States Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                <option value="VN">Viet Nam</option>
                                <option value="VG">Virgin Islands, British</option>
                                <option value="VI">Virgin Islands, U.S.</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                  
                    <br>
                    <hr>
                    <br>
                    <div class="panel-body" >
                      <div class="row">
                        <div class="col-md-9">
                          <div class="col-md-4">
                            <div id="div_id_username" class="form-group required">
                              <label for="name" class="control-label   requiredField">Name                                 
                                <span class="required" style="color: red">*</span> 
                              </label>
                              <div class="controls">
                                <input class="input-md  textinput textInput form-control" id="name" value=""  maxlength="40" name="name"
                                placeholder="Please enter the Full name" value="" style="margin-bottom: 10px" type="text" />
                                                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div id="div_id_email" class="form-group required">
                              <label for="fname" class="control-label   requiredField">Father’s name <span class="required" style="color: red">*</span> </label>
                              <div class="controls ">
                                <input class="input-md emailinput form-control" id="fname"  value="" name="fname" placeholder="Enter the Father’s name" style="margin-bottom: 10px" type="text" />
                                                              </div>     
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div id="div_id_location" class="form-group required">
                              <label for="father_profession" class="control-label requiredField">Father's profession <span class="required" style="color: red">*</span></label>
                              <div class="controls ">
                                <input class="input-md textinput textInput form-control"  value="" id="father_profession" name="father_profession" placeholder="Name" style="margin-bottom: 10px" type="text" />
                                                              </div> 
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label for="gender" class="control-label requiredField"> Gender <span class="required" style="color: red">*</span>
                            </label>
                            <div class="controls "  style="margin-bottom: 10px">
                              <label class="radio-inline"> <input type="radio" name="gender" id="male" value="male"  style="margin-bottom: 10px"> Male </label>
                              <label class="radio-inline"> <input type="radio" name="gender" id="id_As_2" value="female"  style="margin-bottom: 10px"> Female</label>
                                                          </div>
                          </div>
                          <div class="col-md-4">
                            <div class="row">
                              <div id="div_id_gender" class="form-group required">
                                <label for="id_name" class="control-label   requiredField"> Status 
                                  <span class="required" style="color: red">*</span></label>
                                  <div class="controls "  style="margin-bottom: 10px">
                                    <label class="radio-inline"> <input type="radio" name="martial_status" id="married" value="Married"  style="margin-bottom: 10px"> Married </label>
                                    <label class="radio-inline"> <input type="radio" name="martial_status" id="id_gender_2" value="Single"  style="margin-bottom: 10px"> Single </label>
                                    <label class="radio-inline"> <input type="radio" name="martial_status" id="id_gender_1" value="separated"  style="margin-bottom: 10px"> Separated </label>
                                                                      </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div id="Address" class="form-group required">
                                <label for="father_profession" class="control-label requiredField">Address:<span class="required" style="color: red">*</span></label>
                                <div class="controls ">
                                  <input class="input-md textinput textInput form-control"  value="" id="address" name="address" placeholder="Address" style="margin-bottom: 10px" type="text" />

                                                                  </div> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div id="IDCard/Passport No:" class="form-group required">
                                <label for="father_profession" class="control-label requiredField">ID Card/Passport No:<span class="required" style="color: red">*</span></label>
                                <div class="controls ">
                                  <input class="input-md textinput textInput form-control"  value="" id="cnic" name="cnic" placeholder="IDCard/Passport No:" style="margin-bottom: 10px" type="text" />
                                                                  </div> 
                              </div>
                            </div>
                            <div class="col-md-4">
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
                                                                  </div> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div id="Qualification       
                              " class="form-group required">
                              <label for="father_profession" class="control-label requiredField"> Qualification        
                                :<span class="required" style="color: red">*</span></label>
                                <div class="controls ">
                                  <input class="input-md textinput textInput form-control"   id="father_profession" name="qualified" placeholder=" Qualification        
                                  " style="margin-bottom: 10px" type="text" />

                                                                  </div> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div id="div_id_company" class="form-group required"> 
                                <label for="" class="control-label   requiredField">Date of Birth <span class="required" style="color: red"></span></label>
                                <div class="controls "> 
                                  <div class="ui calendar" id="example12" style="width: 100%">
                                    <div class="ui input" style="width: -webkit-fill-available!important;">
                                      <!-- <input type="text" class="form-control" value="" name="fee_due_date1" id="fee_due_date1" autocomplete="off"  placeholder="fee_due_date1"> -->
                                      <input class="input-md  form-control " type="text" autocomplete="false" id="dob" name="dob" autocomplete="off"   style="margin-bottom: 10px"  />
                                    </div>
                                  </div>

                                                                  </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div id="div_id_company" class="form-group required"> 
                                <label for="" class="control-label   requiredField">Email <span class="required" style="color: red">*</span></label>
                                <div class="controls "> 
                                  <input class="input-md  form-control " type="text" autocomplete="false" name="email"  style="margin-bottom: 10px"  />
                                  
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div id="div_id_company" class="form-group required"> 
                                <label for="" class="control-label   requiredField">Mobile No <span class="required" style="color: red">*</span></label>
                                <div class="controls "> 
                                  <input class="input-md  form-control " type="text" autocomplete="false" name="phone"  style="margin-bottom: 10px"  />
                                                                  </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div id="div_id_company" class="form-group required"> 
                                <label for="" class="control-label   requiredField">Second Mobile No </label>
                                <div class="controls "> 
                                  <input class="input-md  form-control " type="text" autocomplete="false" name="mobile"  style="margin-bottom: 10px"  />
                                  
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div  style="margin-top: 30px;">
                                <input type="file"  name="cv" />
                                <label class="label1" for="file-upload">Upload CV</label>
                                <div id="file-upload-filename"></div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="fileinput fileinput-new" data-provides="fileinput" >
                              <div class="fileinput-new thumbnail" style="width: 250px; height: 250px;">
                                <img src="http://www.lyceumgroupofschools.com/images/no-image.png" id="profile-img-tag" height="250" width = "250">

                              </div>
                            </div>
                            <div class="form-group">
                              <label for="images" class="btn btn-primary" style="position: relative;left: 50px;top: 20px;">Upload Profile</label>
                              <input type="file" id="images"  name="images" class="hide" style="opacity: 0;">
                                                          </div>
                            <div class="col-md-4">
                              <div class="form-group" style="padding: 0px; ">
                                <div class = "gallery"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
          
             
              <hr>
              <h5>ACADEMICS:</h5>
              <hr>
              <table class="table table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th>Qualification</th>
                    <th>Institute name</th>
                    <th>Degree</th>
                    <th>Duration</th>
                    <th>Marks Obtained</th>
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
              
              <hr>
              <h5>Job Experience:</h5>
              <hr>
              <table class="table table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th>Organization/Institution</th>
                    <th>job start</th>
                    <th>Job end</th>
                    <th>Reason of Leaving</th>
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

</div>
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
      </section>
     <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
      <script type="text/javascript" src="http://www.lyceumgroupofschools.com/assets/chosen/chosen.jquery.js"></script>
      <script type="text/javascript" src="http://www.lyceumgroupofschools.com/assets/chosen/init.js"></script>
      <link rel="stylesheet" type="text/css" href="http://www.lyceumgroupofschools.com/assets/chosen/chosen.css">
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
      

</div>
<!-- #siteWrapper End -->

<!-- Shadowbox -->
<!-- ShadowBox Markup -->
<div id="toTop"><a title="Back to Top"><span class="icon icon-chevron-up"></span></a></div>
<div class="student modal fade" id="student-modal" tabindex="-1" role="dialog" aria-labelledby="Student Modal">
  <div class="modal-dialog center" role="document">
    <div class="modal-content">
      <div class="modal-header pa2 flex flex-row justify-between">
        <h4 class="modal-title dark-blue" id="studentLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon icon-x"></span></button>
      </div>
      <div class="modal-body tl">

      </div>
    </div>
  </div>
</div>
  <footer>
                                          <div class="container-fluid">
                                             <div class="col-lg-4 col-md-6 text-center res-margin">
                                                <h6 class="text-light">Sign our Newsletter</h6>
                                                <p>We will send updates once a week.</p>
                                                <!-- Form -->       
                                                <div id="mc_embed_signup">
                                                   <form action="//yourlist.us12.list-manage.com/subscribe/post?u=04e646927a196552aaee78a7b&id=111" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                                      <div id="mc_embed_signup_scroll">
                                                         <div class="mc-field-group">
                                                            <div class="input-group">
                                                               <input class="form-control input-lg required email" type="email" value="" name="EMAIL" placeholder="Your email here" id="mce-EMAIL">
                                                               <span class="input-group-btn">
                                                                  <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn">
                                                               </span>
                                                            </div>
                                                            <!-- Subscription results -->
                                                            <div id="mce-responses" class="mailchimp">
                                                               <div class="alert alert-danger response" id="mce-error-response"></div>
                                                               <div class="alert alert-success response" id="mce-success-response"></div>
                                                            </div>
                                                         </div>
                                                         <!-- /mc-fiel-group -->                  
                                                      </div>
                                                      <!-- /mc_embed_signup_scroll -->
                                                   </form>
                                                   <!-- /form ends -->
                                                </div>
                                                <!-- /mc_embed_signup -->               
                                             </div>
                                               <div class="col-lg-4 col-md-6 res-margin">
                            
                                             </div>
                                             <div class="col-lg-4 col-md-12 text-center">
                                                <h6 class="text-light">Opening Hours:</h6>
                                                <table class="table">

                                                   <tbody>
                                                      <tr>
                                                         <td class="text-left"> Sunday to Thursday </td>
                                                         <td class="text-right">07:00 AM to  - 4:00 PM </td> 
                                                      </tr>
                                                      <tr>
                                                         <td class="text-left">Weekends / Holidays</td>
                                                         <td class="text-right"><span class="label label-danger">Closed</span></td>
                                                      </tr>
                                                   </tbody>
                                                </table>

                                          </div>
                                          <hr>
                                          {{-- <p>Copyright © 2018 - 2019 </p> --}}
                                          <div class="page-scroll hidden-sm hidden-xs">
                                             <a href="#page-top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
                                          </div>
                                       </footer>
<script type="text/javascript">
  $(document).ready(function() {
    $.fn.randomize = function(selector){
      (selector ? this.find(selector) : this).parent().each(function(){
        $(this).children(selector).sort(function(){
          return Math.random() - 0.5;
        }).detach().appendTo(this);
      });

      return this;
    };
    $('div.hats-container').randomize('div.hat');

  });
</script>
<script>
  /*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
  !function(t){"use strict";t.loadCSS||(t.loadCSS=function(){});var e=loadCSS.relpreload={};
  if(e.support=function(){var e;try{e=t.document.createElement("link").relList.supports("preload")}catch(t){e=!1}return function(){return e}}(),
    e.bindMediaToggle=function(t){var e=t.media||"all";function a(){t.media=e}t.addEventListener?t.addEventListener("load",a):t.attachEvent&&
    t.attachEvent("onload",a),setTimeout(function(){t.rel="stylesheet",t.media="only x"}),setTimeout(a,3e3)},e.poly=function(){if(!e.support())
      for(var a=t.document.getElementsByTagName("link"),n=0;n<a.length;n++){var o=a[n];"preload"!==o.rel||"style"!==o.getAttribute("as")||
        o.getAttribute("data-loadcss")||(o.setAttribute("data-loadcss",!0),e.bindMediaToggle(o))}},!e.support()){e.poly();
    var a=t.setInterval(e.poly,500);t.addEventListener?t.addEventListener("load",function(){e.poly(),t.clearInterval(a)}):t.attachEvent&&
    t.attachEvent("onload",function(){e.poly(),t.clearInterval(a)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:t.loadCSS=loadCSS
  }("undefined"!=typeof global?global:this);
</script></form>

<script src="http://www.lyceumgroupofschools.com/web/pakistan/sitefiles/2532/js/helper-minfe78.js?cache=0001"></script>
<script>
  jQ171(document).ready(function($) {
    Shadowbox.init({
      language: 'en', players:
      ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']});

  });
</script>
        
        
        
        <script src="http://www.lyceumgroupofschools.com/web/muscat/js/jquery.min.js"></script>


        <!-- Swicther -->

        <script src="http://www.lyceumgroupofschools.com/web/muscat/switcher/js/dmss.js"></script>
        <script type="text/javascript">
          $.ajaxSetup({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         });



       </script>
              
     </body>
     </html>