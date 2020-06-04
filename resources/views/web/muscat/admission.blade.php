<!-- 
/**
 * Project:Muscat American Lyceum school.
 * User: SHAFQAT GHAFOOR
 * Phone: 03076110561
 * Date: 6/13/2019
 * Time: 12:30 PM
 */ -->

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
  <title> @yield('title','Admission') - American Lyceum Group of School</title>
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
  height: 15
  0px!important;
}
</style>
<script type="text/javascript">
  var BASE_URL = "{{ url('/')}}";
</script>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="overflow-x: hidden;">
 <div class="full">

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


    <li><a href="{{route('muscat.admission')}}" style="width: 120px; font-size: 18px;">Admission</a></li>

  </ul>
</div>
</div>
</nav>
<div id="layerslider" class="ls-container ls-fullwidth" style="visibility: visible;">
 <div class="ls-inner" style="background-color: transparent; width: 100%;height: 100%;">
  <div class="ls-lt-container ls-overflow-hidden" style="width: 100%;height: 100%; display: block;">
   <div class="ls-curtiles" style="overflow: hidden;"><img src="{{asset('web/muscat/img/web/banner_admission.png')}}" width="100%" height="100%"></div>
   <div class="ls-nexttiles">
    <div class="ls-lt-tile" style="width: 100%;height: 100%; overflow: visible;">
     <div class="ls-nexttile" style="top: 0px; left: 0px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"></div></div></div></div>




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
<?php 
  $branches=\App\Models\Branch::where('status',1)->where('b_countryCode',968)->get();
  $course=\App\Models\Course::where('parentId','>',0)->get();
  ?>

 <h2 >1 OMR ={{currencyCnv(1,'OMR','USD')}} Dollar</h2>

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
          <form action="{{route('muscat.admission_query')}}" method="post" style="width: 100%;">
            @csrf
            <input type="hidden" name="schoo_id" value="1">
            <br>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"  placeholder="Enter Name" required="">
                    <div class="alert alert-danger name-error" style="display:none">
                      <p style="color: red">Name is required</p>
                    </div>

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   <label for="fname">Father Name</label>
                   <input type="text" name="fname" class="form-control" id="fname" placeholder="Father name">
                 </div>

               </div>


              <div class="col-md-6">
                <div class="form-group">
                 <label for="dob"> Date Of Birth</label>

                 <div class="ui calendar" id="example12" style="width: 100%">
                    <div class="ui input" style="width: -webkit-fill-available!important;">
                      <input type="text" class="form-control" value="{{old('dob')}}" name="dob" id="dob" autocomplete="off"  placeholder="dob">
                    </div>
                  </div>



               </div>                
             </div>
             <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email Address">
              </div>

            </div>


          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Cell No#</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No">
              </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
              <label for="address">Address</label>
              <input name="address" class="form-control" id="address" placeholder="address">
            </div>

          </div>


        </div>

        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Want to join</label>
                 <select class="form-control" name="branch_id" id="branch_id" required="">
                    @foreach($branches as $branch) 
                      <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sel1">class</label>
                <select class="form-control" id="sel1" name="course_id" required="">
                  @foreach($course as $cour)
                  <option value="{{$cour->id}}">{{$cour->course_name}}</option>
                  @endforeach

                </select>
              </div>

          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_school">Last School</label>
                <input type="text" name="last_school" class="form-control" id="last_school" placeholder="Last School">
              </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
              <label for="last_result">Last Result</label>
              <input name="last_result" class="form-control" id="last_result" placeholder="Last Result">
            </div>

          </div>


        </div>


      </div>


      <div class="col-md-12">
        <button  class="btn btn-success  btn-md" style="float: right;">NEXT </button>
      </div>
    </form>
  </div>
</div>



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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- Swicther -->

<script src="http://www.lyceumgroupofschools.com/web/muscat/switcher/js/dmss.js"></script>

  <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
    
<script>
  var today = new Date();
    $('#example12').calendar({
      monthFirst: false,
      type: 'date',
  });
 

  </script>

  
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
 });



</script>

</body>
</html>