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
    <title> @yield('title','Admission Fee Deposit') - American Lyceum Group of School</title>
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

  <nav class="navbar navbar-custom navbar-fixed-top" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
       <i class="fa fa-bars"></i>
     </button>
     <div class="navbar-brand-centered page-scroll">
       <a href="#page-top"><img src="{{asset('web/muscat/img/logo.png')}}"  alt=""></a>
     </div>
   </div>
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


<br>
<br>

<br>

<br>
<br>
<br>
<br>
<br>

<div class="clear-fix"></div>
<div class="container">
  <div class="col-md-12" style="text-align: center;">
   <h2 style="padding: 25px 28px;">Verify</h2>
 </div>
</div>


      <div class="container" style="margin-top: 40px; border: 1px solid #ccc;padding-top: 20px;">
        @component('_components.alerts-default')
        @endcomponent

        <h2 >1 OMR ={{currencyCnv(1,'OMR','USD')}} Dollar</h2>
        <div id="signupbox"  class="mainbox col-md-12  col-sm-12 col-xs-12">
          <div>
            <form   action="{{route('admission.payWithpaypal')}}" id="applicationForm"  method="POST" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="amount" value=" @isset($object->pp_Amount) {{currencyCnv($object->pp_Amount,'OMR','USD')}}  @endisset">

              <input type="hidden" name="transaction_id" value="{{$fees->id}}">
              <div class="panel-body" style="border:1px solid #ccc; margin-bottom: 20px;">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">




          


                  </div>
                </div>

                <!-- //////////////////???????????????????? start ????????????????????????????????? -->
                <div class="row" id="feeChallan">

                  <div style="margin: 0 0 2em 0;
                  padding: 1em 1em 1.5em 1em;
                  background: #fff;
                  ">

                  <div class="col-md-6">
                    <div class="receipt-header" style="border: 1px solid #ccc;
                    padding: 12px;text-align: center; ">
                    <div class="receipt-right" style="text-align: center;">
                      <div class="box_filed"> <h4><b style="color:red">{{$admission->name}}</b></h4>  </div>
                      <div class="box_filed"> <h4><b style="color:red">{{$admission->father_name}}</b></h4>  </div>

                      <div class="box_filed"><STRONG>@isset($admission->branch->branch_name){{$admission->branch->branch_name}}
                        @endisset
                      </STRONG></div>
                      <div class="box_filed"><STRONG>
                        @isset($admission->grade->course_name){{$admission->grade->course_name}}
                        @endisset

                      </STRONG></div>

                    </div>


                    <div class="clearfix"></div>



                  </div>
                </div>
                <div class="col-md-6">

                  <div style="width: 70%; float: left; text-align: justify;">

                    <p style="font-size:20px;">
                      <b> Amount going to be charged from you: </b>
                    </p>
                  </div>
                  <div style="width: 30%;float: right; text-align: right;padding-right: 15px; ">

                    <h2 style="font-size:32px;"><strong><i class="fa fa-OMR"></i> @isset($object->pp_Amount) {{currencyCnv($object->pp_Amount,'OMR','USD')}}$  @endisset/-</strong></h2>

                  </div>
                </div>


              </div>

            </div>


            <!-- /////////////////////////////  end display none????????????????????????????????? -->
          </div>
        </div>
      </div>
       <div class="col-md-12">
      <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">

          <!--    <input type="button" class="btn btn-info btn-lg validateButton "   onclick="jobFormSubmit(this)"  id="updateDataBtn" value="Submit"> -->
          <input type="submit" class="btn btn-success btn-lg submitButton"   style="display: block;"  id="updateDataBtn" value="OK">
        </div>
      </div>
    </div>
  </form>
  
    </div>
   

</div>
<!-- The Modal -->

</div>
</section>


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