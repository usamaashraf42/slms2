{{-- 
  /**
  * Project:Muscat American Lyceum school.
  * User: saddam
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> @yield('title','Muscat') - American Lyceum Group of School</title>
    <a href="http://support.flaticon.com/hc/en-us/articles/205019862-CSS-code-for-Iconfont-" rel="nofollow noreferrer"></a>
    <!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
    <!-- Icon fonts -->
    <!-- <link href="{{asset('web/muscat/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"> -->
    <!-- <link href="{{asset('web/muscat/fonts/flaticons/flaticon.css')}}" rel="stylesheet" type="text/css"> -->
    <!-- <link href="{{asset('web/muscat/fonts/glyphicons/bootstrap-glyphicons.css')}}" rel="stylesheet" type="text/css"> -->
    <!-- Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:700,900' rel='stylesheet' type='text/css'>
    <!-- Theme CSS -->
    <!-- <link href="{{asset('web/muscat/css/style.css')}}" rel="stylesheet"> -->
    <!-- Color Style CSS -->
    <link href="{{asset('web/muscat/styles/funtime.css')}}" rel="stylesheet">
    <!-- Owl Slider & Prettyphoto -->
    <!-- <link rel="stylesheet" href="{{asset('web/muscat/css/owl.carousel.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('web/muscat/css/prettyPhoto.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('web/muscat/styles/style_1.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('web/muscat/layerslider/css/layerslider.css')}}"> -->
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('web/muscat/img/web/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('web/muscat/img/web/favicon.png')}}">
    <link rel="shortcut icon" href="{{asset('web/muscat/img/web/favicon.png')}}" type="image/x-icon">
    <!-- <link rel="stylesheet" id="switcher-css" type="text/css" href="{{asset('web/muscat/switcher/css/switcher.css')}}" media="all" /> -->
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/funtime.css')}}" title="funtime" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/playground.css')}}" title="playground" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/games.css')}}" title="games" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/childhood.css')}}" title="childhood" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/styles/school.css')}}" title="school" media="all" />
    <!-- <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/switcher/css/boxed.css')}}" title="boxed" media="all" /> -->
    <!-- <link rel="alternate stylesheet" type="text/css" href="{{asset('web/muscat/switcher/css/full.css')}}" title="full" media="all" /> -->

    @show

    @stack('post-styles')
    <style>
      .about_us .about_us_text p {
        line-height: 1.929;
        margin-bottom: 35px;
      }
      h2, .btn, .btn-primary, .owl-theme .owl-dots .owl-dot span, .owl-theme .owl-dots .owl-dot span:before, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, .owl-prev, .owl-next, .pager li>a:hover, .social-media a i, .back-to-top i:hover, .pagination>li>a:hover, .pagination>li>a:focus, .pager li > a:hover, .pager li > a:focus, .navbar-brand-centered:hover, .navbar-brand-centered:focus, .navbar-toggle:focus, .navbar-toggle:active, .navbar-toggle:hover, .navbar-custom ul.nav li a:hover, .navbar-custom .nav > .active > a, .navbar-custom ul.nav ul.dropdown-menu li a:hover, .navbar-custom ul.nav ul.dropdown-menu li a:focus, .nav .open>a, .nav .open>a:focus, .nav .open>a:hover, .pagination>.active>a, .pagination>.active>a:focus, .nav-pills>li.active>a, .nav.nav-pills > li > a:focus, .nav.nav-pills > li > a:hover, .nav.nav-pills > li > .active, .nav.nav-tabs>li>a:hover, .nav.nav-tabs > li.active > a:hover, .nav.nav-tabs > li.active > a:focus, .nav.nav-tabs>li.active>a, .pricing-item:hover .pricing-deco, .blog-tags a:hover {
        background-color: #e6383d!important;
      }
      .social_1 {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: inline-block;
        margin: 5px;
        border: 2px solid #2f2d6b;
      }
      .quote-test {
        margin-top: 10px;
        /* padding: 24px; */
        text-align: left!important;
        font-family: sans-serif;
        color: #ccc;
      }
      h2, .btn, .btn-primary, .owl-theme .owl-dots .owl-dot span, .owl-theme .owl-dots .owl-dot span:before, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, .owl-prev, .owl-next, .pager li>a:hover, .social-media a i, .back-to-top i:hover, .pagination>li>a:hover, .pagination>li>a:focus, .pager li > a:hover, .pager li > a:focus, .navbar-brand-centered:hover, .navbar-brand-centered:focus, .navbar-toggle:focus, .navbar-toggle:active, .navbar-toggle:hover, .navbar-custom ul.nav li a:hover, .navbar-custom .nav > .active > a, .navbar-custom ul.nav ul.dropdown-menu li a:hover, .navbar-custom ul.nav ul.dropdown-menu li a:focus, .nav .open>a, .nav .open>a:focus, .nav .open>a:hover, .pagination>.active>a, .pagination>.active>a:focus, .nav-pills>li.active>a, .nav.nav-pills > li > a:focus, .nav.nav-pills > li > a:hover, .nav.nav-pills > li > .active, .nav.nav-tabs>li>a:hover, .nav.nav-tabs > li.active > a:hover, .nav.nav-tabs > li.active > a:focus, .nav.nav-tabs>li.active>a, .pricing-item:hover .pricing-deco, .blog-tags a:hover {
        background-color: #f6faff!important;
        border-radius: 2px;

        transform: rotate(0deg);

        color: #353794;
      }
      .service:hover h4, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover, .team-item .team-caption, .navbar-custom ul.nav ul.dropdown-menu li a, .panel-heading a, .panel-heading a:hover, .nav-pills .nav > li > a:focus, .navbar-brand-centered, .navbar-header, .btn:hover, .btn:focus, .btn-primary:hover, .btn-primary:focus, .navbar-collapse, .owl-prev:hover, .owl-next:hover, .back-to-top i, #instafeed .likes, .social-media a i:hover, .blog-tags a, .date-category, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {
        background-color: #f5f5f5;
      }
      section:nth-child(odd) h2 {
        transform: rotate(0deg);
      }
      .btn:hover, .btn:focus {
        color: #000;
        box-shadow: none;
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
        max-height: 113px;
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
      .pricing-palden .pricing-deco {
        border-radius: 10px 10px 0 0;
        padding: 0em 0 5em;
        position: relative;
        transition: background-color 0.3s;
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
        height: 280px!important;
      }
      .gallery-thumb {
        display: block;
        position: relative;
        overflow: hidden;
        border-radius: 25%;
        box-shadow: 6px 6px 0px rgba(103, 102, 102, 0.2);
      }
      .jac li {
        padding: 10px;
        font-size: 17px;
        width: 14%;
        font-weight: bold;
        display: inline-block;
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
      .section-title h2{
        margin-bottom:20px;
        padding-bottom:15px;
        position:relative;
        text-transform:capitalize;
        line-height:24px;
      }
      .section-title h2:before,.section-title h2:after,.fanfact-wrap h2:before,.fanfact-wrap h2:after{
        position:absolute;
        left:49%;
        bottom:0;
        width:60px;
        height:1px;
        background:#296dc1;
        content:"";
        transform:translateX(-50%);
        -webkit-transform:translateX(-50%);
        -moz-transform:translateX(-50%);
      }
      .section-title h2:after,.fanfact-wrap h2:after{
        bottom:-2px;
        left:51%;
      }
      .section-title p {
        text-transform: capitalize;
        margin-bottom: 35px;
        font-size: 15px;
        font-style: italic;
        color: #696969;
        line-height: 24px;
      }
      .service-wrap {
        background: #fafafa;
        transition: all .3s;
        box-shadow: 0px 4px 4px #bbb;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
      }
      .service-wrap:hover{
        background:#296dc1;
      }
      .service-img{
        position:relative;
        z-index:9;
        overflow:hidden;
      }
      .service-img {
        position: relative;
        z-index: 9;
        max-height: 270px;
        overflow: hidden;
      }
      .service-img:before{
        position:absolute;
        left:0;
        top:0;
        width:100%;
        height:100%;
        background:#000;
        content:"";
        z-index:9;
        opacity:.2;
        transition:all .3s;
        -webkit-transition:all .3s;
        -moz-transition:all .3s;
      }
      .service-wrap:hover .service-img:before{
        opacity:.5;
      }
      .service-content {
        padding: 16px 20px;
        min-height: 225px;
      }
      .service-content h3 {
        text-align: center;
        padding: 5px;
        font-family: unset;
        font-size: 30px;
        font-size: 20px;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        background: #353794;
        color: aliceblue;

        transition: all .3s;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
      }
      .service-content p{
        margin-bottom:10px;
        transition:all .3s;
        -webkit-transition:all .3s;
        -moz-transition:all .3s;
        text-transform:capitalize;
      }
      .service-wrap:hover .service-content p,.service-wrap:hover .service-content h3,.service-wrap:hover .service-content a{color:#fff}
      .service-wrap .service-content a:hover{
        text-shadow: 0px 3px 5px rgba(0,0,0,.3);
      }
      .section-title h2 {
        margin-bottom: 21px;
        padding-bottom: 39px;
        position: relative;
        text-transform: capitalize;
        line-height: 24px;
      }
      .section-title p {
        text-transform: capitalize;
        margin-bottom: 35px;
        font-size: 15px;
        font-style: normal;
        color: #696969;
        line-height: 24px;
      }
      section.color-section, .blog-row, #activities .tab-content, .color_block, .cloud-divider, #blog-page blockquote, #layerslider, .comment, .table-striped, .dropdown-menu {
        background: #f6faff!important;

      }
      #deco-clouds1.head path {
        fill: #353794;
        stroke: #f6faff;
      }
      .blog-preview img{ width: 100%!important;
        height: 300px;
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
      font-size: 14px!important;
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
      max-height:500px;
      min-height:500px;
      border: 25px solid #353794;
      border-radius: 5px;
    }
    .slide1 :hover{
      transform: scale(1.1); 
    }
    .navbar-custom ul.nav ul.dropdown-menu li a {
      margin: 5px;
      line-height: 31px;
      display: inline-block;
      min-width: 118px;
    }
    .active1 {
      position: relative;
      box-shadow: 0px 3px 4px #bbb;
      display: block;
      margin: 4px;
      letter-spacing: 0.2px;
      background: #34327c;
      display: inline-block;
      font-weight: 700;
      font-size: 18px;
      min-height: 50px;
      border: 5px solid #000;
      line-height: 43px;
      border: 2px solid #000;
      border: 1px solid #000;
      border: 0;
      color: #fff;
      padding: 0px 31px;
    }
    .active1 a{
      color: #fff;

    }
    .searchtop {
      width: 90px;
      padding: 0px 5px;
      display: inline;
      border: none;
      border-radius: 22px;
      background: #353794;
    }
    .searchtop1 {
      width: 124px;
      padding: 1px 5px;
      border: 1px solid #fff;
      display: inline-flex;
      border-radius: 22px;
      background: #353794;
    }
    .nav>li>a:focus, .nav>li>a:hover {
      text-decoration: none!important;
      background-color: #e6383d!important;
    }
    .header-top-right > .content:hover .account-dropdown {
      opacity: 1;
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
      filter: alpha(opacity=100);
      -webkit-transform: scaleY(1);
      transform: scaleY(1);
      z-index: 9999;   
    }
    .account-dropdown a {
      color: #2d3e50;
      display: block;
      padding: 5px 0;
    }
    .navbar-custom ul.nav ul.dropdown-menu li a {
      width: 100%;
      border-radius: 5px;
      margin: 2px;
      border-top: 2px solid #fff;
      line-height: 30px;
      border: 1px 0px 2px 0px solid #000;
      display: inline-block;
      min-width: 130px;
    }
    .navbar-custom ul.nav li a {
      font-size: 14px!important;
      text-align: center;
      transition: background .2s ease-in-out;
      border-radius: 10px 10px 0px 0px;
      font-family: 'Lato',sans-serif;
      color: #fff;
      letter-spacing: 0.2px;
      font-weight: 600;
      background: transparent;
    }
    .img-circle {
      box-shadow: 6px 6px 0px rgba(103, 102, 102, 0.2);
      width: 100%;
      height: 298px!important;
    }
    .account-dropdown li {display: block;}
    .header-top{padding:8px 0}
    .header-area .header-top .header-contact a{color:#bebebe;display:inline-block;padding-right:55px;font-weight:300;font-size:14px}
    @media (min-width: 768px) and (max-width: 991px){.header-area .header-top .header-contact a{padding-left:14px}}
    .header-area .header-top .header-contact a i{padding-right:14px;font-size:12px;color:#bebebe}@media (min-width: 768px) and (max-width: 991px){.header-area .header-top .header-contact a i{padding-right:5px}}
    .header-area .header-top .header-top-menu{text-align:right}
    .header-area .header-top .header-top-menu ul li{display:inline-block}
    .header-area .header-top .header-top-menu ul li a{color:#bdbdbd;margin-left:33px;font-size:14px}
    @media (max-width: 767px)
    {.header-area .main-header-area{padding:10px 0;height:60px}}
    .account-dropdown li {display: block;}
    .naver ul  li{
      display: inline;
      list-style-type: none;
      padding: 2px 10px;
    }
    .header-top {
      border-bottom: 2px solid #fff;
      padding: 4px 0;
      position: fixed;
      width: 100%;
      z-index: 9999;
      height: 38px;
      background: linear-gradient(36deg, rgb(53, 55, 148) 64%, rgb(230, 56, 61) 27%);
    }
  </style>
  <script type="text/javascript">
    var BASE_URL = "{{ url('/')}}";
  </script>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="overflow-x: hidden;">
  <div class="header-top black-bg d-none d-md-block">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-1 col-md-1 col-lg-1"></div>
        <div class="col-xl-5 col-md-5 col-lg-5">
         <div class="header-contact" style="padding-top: 5px;">
           <a href="#" style="padding-right: 40px;color: #fff">
             <i class="fa fa-phone" style="padding-right: 5px;"></i> +968-90856281</a>
             <a href="#" style="color: #fff;"><i class="fa fa-envelope"style="padding-right: 5px;"></i>kg @ americanlyceum.com</a>
           </div>
         </div>
         <div class="col-xl-6 col-md-6 col-lg-6" style="text-align: center;color: #fff">
          <div class="header-top-menu">
            <nav class="naver naverer">
              <ul>

                <li><a href="blog.html"> 
                </a><a href="https://twitter.com/kgamericanlyce1" title=""><i class="fa fa-twitter"></i></a>
              </li>
              <li>
               <a href="https://www.facebook.com/AmericanLyceumSchoolMuscat" title=""><i class="fa fa-facebook"></i></a>
             </li>
             <li>
               <a href="https://www.instagram.com/american_lyceum_school_oman/" title=""><i class="fa fa-instagram"></i></a>
             </li>
             <li style="padding-left: 35px; font-size: 18px;"><a href="{{route('muscat.contact_school')}}" style="color: #fff;">Contact Us  </a></li>
             <li style=" font-size: 18px;"><a href="http://www.lyceumgroupofschools.com/admin/login" style="color: #fff;">Portal  </a></li>
           </ul>
         </nav>
       </div>
     </div>
   </div>
 </div>
</div>
<nav class="navbar navbar-custom navbar-fixed-top" style="margin-top: 37px;">
 <div class="navbar-header">
  <div class="navbar-brand-centered page-scroll">
    <a href="#page-top"><img src="{{asset('web/muscat/img/logoinvoice01.png')}}"  alt=""></a>
  </div>
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
    <i class="fa fa-bars"></i>
  </button>
</div>
<div class="collapse navbar-collapse" id="navbar-brand-centered" style="background-color: #353794!important;">
  <div class="container">
   <ul class="nav navbar-nav page-scroll navbar-left">
     <li><a href="#page-top">Home</a></li>
     <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
       <ul class="dropdown-menu">
         <li><a href="#team_1" style="background-color: #4a47ab;">Our Team</a></li>
         <!--                  <li><a href="{{route('muscat.ceo_messege_school')}}" style="background-color: #4a47ab;">Message from CEO</a></li> -->
         <li><a href="#team" style="background-color: #4a47ab;">Why American Lyceum</a></li>
       </ul>
     </li>
     <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admission  <b class="caret"></b></a>
       <ul class="dropdown-menu">
        <li><a  style="background-color: #4a47ab;"data-toggle="modal" data-target="#myModal">Apply</a></li>
        <li><a href="#admission" style="background-color: #4a47ab;">Policy </a></li>
        <li><a href="#prices"  style="background-color: #4a47ab;">Fee Structure</a></li>
        <li><a href="{{route('muscat.faq')}}"  style="background-color: #4a47ab;">FAQ</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academics <b class="caret"></b></a>
      <ul class="dropdown-menu">
       <li><a href="{{route('muscat.curriculum_school')}}"  style="background-color: #4a47ab;">Curriculum</a></li>
       <li><a href="{{route('muscat.academys')}}" style="background-color: #4a47ab;">Activity</a></li>
       <li><a href="{{route('muscat.academys')}}" style="background-color: #4a47ab;">Academic</a></li>
     </ul>
   </li>
   <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Branches <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li><a href="{{route('muscat.nursery')}}" style="background-color: #4a47ab;">Nursery</a></li>
      <li><a href="{{route('muscat.school')}}" style="background-color: #4a47ab;">School</a></li>
    </ul>
  </li>
</ul>
<ul class="nav navbar-nav page-scroll navbar-right">
 <li><a href="{{route('muscat.jobs')}}">Vacancies</a></li>
 <li><a href="{{route('muscat.news_school')}}">News</a></li>      
 <li><a href="{{route('muscat.event_school')}}">Events</a></li>          
 <li><a href="#gallery">Gallery</a></li>    
 <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Prospects <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="franchisbooklet.pdf" style="background-color: #4a47ab;">View</a></li>
    <li><a href="franchisbooklet.pdf"  download="franchisbooklet.pdf" style="background-color: #4a47ab;">Download</a></li>
  </ul>
</li>

<li><div class="topnav" style="margin-right: -140px; margin-top: 22px;">
  <form class="example" action="action_page.php">
    <div class="searchtop1">
      <input type="text" placeholder="Search.." id="sample_search" name="search" class="searchtop"><i class="fa fa-search" type="submit" style="padding-top: 2px;"></i>
    </div>
  </form>
</div></li>
</ul>
</div>
</div>
</nav>
</div>
<div id="layerslider" class="ls-container ls-fullwidth" style="visibility: visible;">
 <div class="ls-inner" style="background-color: transparent; width: 100%; height: 700px;">
  <div class="ls-lt-container ls-overflow-hidden" style="width: 100%; height: 700px; display: block;">
    <div class="ls-curtiles" style="overflow: hidden;"><img src="{{asset('web/muscat/img/web/slide3.png')}}" width="100%" height="120%"></div>
    <div class="ls-nexttiles">
      <div class="ls-lt-tile" style="width: 100%; height: 700px; overflow: visible;">
        <div class="ls-nexttile" style="top: 0px; left: 0px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"></div></div></div></div>
        <div class="ls-slide ls-slide-4 ls-animating" data-ls="transition2d:104;timeshift:-2000;" 
        style="width: 100%; height: 700px; visibility: visible; display: none; left: auto; right: 0px; top: 0px; bottom: auto;">
        <img class="ls-bg ls-preloaded" alt="Slide background" style="padding: 0px; border-width: 0px; width: 100%; height: 700px; margin-left: 0px; margin-top: -166px; visibility: visible; opacity: 0.484476;">
        <div class="ls-gpuhack" style="width: auto; height: auto; padding: 0px; border-width: 0px; left: 311.5px; top: 0px;"></div>
        <img src="{{asset('web/muscat/img/web/bee.png')}}" class="ls-l img-responsive hidden-xs hidden-sm parallax1 ls-preloaded" alt="" data-ls="delayin:1500;easingin:fadeIn;parallaxlevel:7;" style="margin-left: 0px; margin-top: 0px; width: 180px; height: 169px; padding: 0px; border-width: 0px; left: 311.5px; top: 0px; transform-origin: 50% 50% 0px; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 63.7959, 0, 0, 1); opacity: 0.202551; visibility: visible; filter: none;">
        <div class="ls-l header-text" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin:easeOutElastic;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;parallaxlevel:2;" style="margin-left: 0px; margin-top: 0px; width: auto; height: auto; font-size: 14px;    background-color: rgb(245, 245, 245,0.5); padding: 30px; border-width: 0px; left: 311.5px; top: 0px; filter: none;">
          <h1>Welcome to American Lyceum</h1>
          <p class="subtitle hidden-xs"> American Lyceum International School</p>
          <div class="page-scroll hidden-xs">
           <a class="btn" href="#contact">Contact us</a>
         </div>
       </div>
       <img src="{{asset('web/muscat/img/web/star.png')}}" class="ls-l img-responsive hidden-xs hidden-sm parallax2 ls-preloaded" alt="" data-ls="delayin:1500;easingin:fadeIn;parallaxlevel:6;" style="margin-left: 0px; margin-top: 0px; width: 120px; height: 112px; padding: 0px; border-width: 0px; left: 311.5px; top: 0px; transform-origin: 50% 50% 0px; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 63.7959, 0, 0, 1); opacity: 0.502551; visibility: visible; filter: none;">
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

<div class="ls-loading-container" style="z-index: -1; display: none;">
 <div class="ls-loading-indicator"></div></div>
 <a class="ls-nav-prev" href="#" style="visibility: hidden;"></a><a class="ls-nav-next" href="#" style="visibility: hidden;"></a>
 <div class="ls-bottom-nav-wrapper" style="visibility: hidden;"><a class="ls-nav-start ls-nav-start-active" href="#"></a><span class="ls-bottom-slidebuttons"><a href="#" class=""></a><a href="#" class=""></a><a href="#" class="ls-nav-active"></a><a href="#" class=""></a><a href="#" class=""></a>
  <div class="ls-thumbnail-hover" style="width: 100px; height: 60px;">
   <div class="ls-thumbnail-hover-inner" style="visibility: hidden; display: block;">
    <div class="ls-thumbnail-hover-bg"></div>
    <div class="ls-thumbnail-hover-img" style="width: 100px; height: 60px;"><img style="height: 60px;"></div><span></span></div></div></span><a class="ls-nav-stop" href="#"></a></div>
    <div class="ls-shadow"></div>
  </div>

  <section id="services" class="color-section">
   <div class="container">
    <div class="col-lg-8 col-lg-offset-2">
     <div class="section-heading">
      <br>
      <br>
      <h2>Our Services</h2>
    </div>
  </div>
  <div class="row">
   <div class="col-md-12 col-lg-7 text-center">
    <h3 class="text-center">American Lyceum International School</h3>
    <p>American Lyceum International School will provide a stimulating and safe
      environment for children ages 0.6 months to 3 years. Run by a former elementary
      school teacher (Ms.Mildret), ALIS will be the fun, affordable alternative daycare with
      the best quality you can find in town. We seek to stimulate and develop children&#39;s
      problem-solving and reactive thinking skills through staff and child directed activities

      in our daily actions.
    </p>
  </div>
  <div class="col-md-12 col-lg-5">
    <img src="{{asset('web/muscat/img/web/services.jpg')}}" alt="" class="img-responsive center-block" style="border: 8px solid #ffe5e5;
    margin: 10px;">
  </div>
</div>
<div class="row">
 <div class="col-md-4 col-sm-12">
  <div class="service float">
    <img src="{{asset('web/muscat/img/web/service1.jpg')}}" alt="" class="img-circle center-block img-responsive" height="100%;">
    <h4>Infants</h4>
    <p>It doesn’t take long to develop the confidence and calm of an experienced parent.
      Your baby will give you the most important information—how they like to be treated,
      talked to, held, and comforted. This section addresses the most common questions

      and concerns that arise during the first months of life.
    </p>
  </div>
</div>
<div class="col-md-4 col-sm-12 res-margin">
  <div class="service float">
   <img src="{{asset('web/muscat/img/web/service2.jpg')}}" alt="" class="img-circle center-block  img-responsive" height="100%">
   <h4>Toddlers</h4>
   <p>Your child is advancing from infancy  and into the preschool years. During this
    time, their physical growth and motor development will be slow, but you can expect
    to see some tremendous intellectual, social, and emotional changes.
  </p>
</div>
</div>
<!-- /col-md-3-->
<!-- item 3-->
<div class="col-md-4 col-sm-12">
  <div class="service float">
   <img src="{{asset('web/muscat/img/web/service3.jpg')}}" alt="" class="img-circle center-block img-responsive" height="100%">
   <h4>PRESCHOOL</h4>
   <p>Your child is advancing from infancy toward and into the preschool years. During this
    time, his physical growth and motor development will slow, but you can expect to see

    some tremendous intellectual, social, and emotional changes.
  </p>
</div>
</div>
<!-- /col-md-4-->   
<!-- item 3-->
</div>
<!-- /row -->
</div>
<!-- /container-->
</section>
<!-- /Section ends -->
<!-- Section Callout -->
<section id="callout" class="small-section">
 <!-- Clouds background -->
 <div class="hidden-xs">
  <div class="cloud x1"></div>
  <div class="cloud x2"></div>
  <div class="cloud x3"></div>
  <div class="cloud x4"></div>
  <div class="cloud x5"></div>
  <div class="cloud x6"></div>
  <div class="cloud x7"></div>
</div>
<!-- /Clouds ends -->
<div class="container">
  <!-- Animated Sun -->
  <div class="sun hidden-sm hidden-xs">
   <div class="sun-face">
    <div class="sun-hlight"></div>
    <div class="sun-leye"></div>
    <div class="sun-reye"></div>
    <div class="sun-lred"></div>
    <div class="sun-rred"></div>
    <div class="sun-smile"></div>
  </div>
  <!-- Sun rays -->
  <div class="sun-anime">
    <div class="sun-ball"></div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
    <div class="sun-light"><b></b><s></s>
    </div>
  </div>
</div>
<!-- /Animated Sun -->
<div class="col-md-6 col-sm-6 text-center">
 <div class="well">
  <h3>Visit our School</h3>
  <p>We cultivate and honor children's innate love of learning as they prepare for a life of purpose, integrity, and academic accomplishment. American Lyceum Private School,  students gain the skills and confidence to meet the challenges of self, family, community, and the world at large. We believe that the child and their needs are the central and commanding focus of the learning process.
  </p>
  <div class="page-scroll">
   <!-- Button-->
   <a class="btn" href="#contact">Contact us</a>
 </div>
 <!-- /page-scroll -->
</div>
<!-- /well -->
</div>
<!-- /col-md-6 -->
</div>
<!-- /container-->
</section>
<!-- Section Ends-->
<section class="about_us single_about_padding">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-6 col-lg-6">
        <div class="about_us_img">
          <img src="{{asset('web/muscat/img/web/gallery2.jpg')}}" alt="" style="width:100%; ">
        </div>
      </div>
      <div class="col-md-6 col-lg-5">
        <div class="about_us_text">
          <h2>About us</h2>
          <p>American Lyceum Private School offers students a distinctive learning community through an established tradition of educational innovation.
            We forge meaningful relationships and embrace global mindedness. We learn from one another and honor and celebrate our differences and our likenesses. We value
            Unity between school, family and community.
          </p>

          <div id="owl-abot" class="owl-">
            <h4>Vision</h4>
            <p>“By cultivating the crop of enlightened leaders become the name of trust pride and
              performance.”
            </p>
            <h4 style="margin-top: -15px;">Mission</h4>
            <p>“To Enable Primary and Secondary Greatness in People”

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="about" style="background-image: url('{{asset('web/muscat/img/web/web.jpg')}}'); height: 100%; width: 100%;background-size: cover;">
  <div class="container">
    <div class="col-lg-8 col-lg-offset-2">
     <h3 style="color: #fff;
     border-bottom: 5px solid #f3f0cf;
     width: 340px;">Our Philosophy</h3>

   </div>
   <div class="row">
    <div class="col-lg-12 col-sm-12">

     <p style="color: #fff;">American Lyceum Private School  strives to be preschool of choice by providing learning environment suitable for child development and offers unique curriculum

      combined with Montessori and EYFS concept.
    </p><p style="color: #fff;"> By providing safe, fun and stimulating learning environment, creative ways of
      teaching, personal hands-on attention, and top level play-based education,
      American Lyceum Private School students can explore and develop their full
    potential and be prepared to be good citizens and leaders of the 21st century.</p>
    <p style="color: #fff;"> 

      A combination of EYFS &amp; International Curriculum (Cambridge) is aimed to
      establish acceleration inchildren&#39;s intellectual development and prepare our

      students with strong foundation for lifelong learning.
    </p>
  </div>
  <div class="col-sm-12 col-lg-5">


  </div>
  <!-- text -->

  <!-- /col-lg-8 -->
</div>
</div>
</section>
<section class="service-area pb-140">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 wow fadeInUp" style="visibility: visible;">
        <div class="section-title text-center">
          <h2>Infrastructure </h2>
          <p>At American Lyceum Private School for children, our students form the heart of the
            institute. The curriculum and infrastructure are designed keeping the little
            learners at the core. We collectively work towards fostering their cognitive, social,
            physical and academic development. The school’s ideologies, methodologies and
            facilities guarantee enriching experience to each of our students, beyond the
            classroom. Our unique approach ensures overall growth of all the students and
            prepares them for intensive academic program that awaits them in the years to

            come.
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s;">
        <div class="service-wrap">
          <div class="service-img">
            <img src="{{asset('web/muscat/img/web/careerplay.jpg')}}" width="100%" alt="">
          </div>
          <div class="service-content">
            <h3>RESPONSIBILITY</h3>
            <p>We Want Proactive Personalities - Students must be responsible for whatever they
              are getting. Teachers: must be responsible for the results of the students. Parents:

            must be responsible for the grooming of the children.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s;">
        <div class="service-wrap">
         <div class="service-img">
          <img src="{{asset('web/muscat/img/web/careerplay7.jpg')}}" width="100%" alt="">
        </div>
        <div class="service-content" style="margin-bottom: 15px;">
          <h3>Infant care</h3>
          <p>Infant care has to do more than just look right, it has to feel right. You want to
            know your child is safe and well cared for. Our infant program is designed to offer
            a secure place with knowledgeable teachers who honor your family’s routine, and
            who know every day that they’re not caring for a child, but the most important

            child; yours.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s;">
      <div class="service-wrap">
        <div class="service-img">
          <img src="{{asset('web/muscat/img/web/careerplay3.jpg')}}" width="100%" alt="">
        </div>
        <div class="service-content">
          <h3>Safety First </h3>
          <p>Safe and stimulating environment that children can explore and discover, that
            encourages creativity, and collaboration, independence.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s;">
      <div class="service-wrap">
       <div class="service-img">
        <img src="{{asset('web/muscat/img/web/careerplay4.jpg')}}" width="100%" alt="">
      </div>
      <div class="service-content">
        <h3>Certified Tutors</h3>
        <p>American Lyceum’s highly qualified staff is committed to provide personal
          attention and professional education to preschool, along with continuous
          improvement, growth, and achievement of every student.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12 col wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s;">
    <div class="service-wrap">
      <div class="service-img">
        <img src="{{asset('web/muscat/img/web/careerplay1.jpg')}}" width="100%" alt="">
      </div>
      <div class="service-content">
        <h3>Teaching Method</h3>
        <p>American Lyceum’s highly qualified staff is committed to provide personal
          attention and professional education to preschool, along with continuous
          improvement, growth, and achievement of every student.
        </p>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</section>
<section id="about">
  <!-- /row features -->
  <div class="col-lg-12 col-sm-12 " style="background-image: url('{{asset('web/muscat/img/web/lined_paper.png')}}');background-size: cover;">
    <div class="container">
     <h3 class="text-center" style="font-size: 35px; color: #ffeacb;">Why American Lyceum ?</h3>
     <div id="owl-testimonials" class="owl-carousel9">
      <!-- testimonial 1-->
      <blockquote>
       <div class="col-md-4 col-lg-4">
        <!-- testimonial image-->
        <img src="{{asset('web/muscat/img/web/testimonial1.jpg')}}" alt="" class="img-responsive img-circle">
      </div>
      <div class="col-md-8  quote-test">
        <!-- quote -->
        <p style="text-align: center;">
        </p><h5 style="color: #ffeacb;">Because Every Child can be Successful </h5>
        <p>• Leadership Development.</p><br>
        <p>• International Recognition.</p><br>
        <p>• Whole brain teaching (WBT)/power teaching.</p><br>
        <p>• Children's personal, social and emotional development.
        </p><br>
        <p>• Children's develop responsibility, the ability to analyze, to question and problem solving faculties.</p><br>
        <p>• Children learn to share, cooperate and be friendly with others.</p><br>
        <p>• Can reserve your area Q.</p><br>
        <p>• Development of the ability to act with confidence and independence.
        </p><br>
        <p>• Children are trained to avoid child abuse</p><br>
        <p>• Dedicated and trained faculty.</p>
        <p>• Inter branch tranfer.</p>
        <p>• A wide range of curricular &amp; co-curricular activities.</p>
      </div>
    </blockquote>
  </div>
</div>
</div>
</section>
<div class="parallax-object1 hidden-sm hidden-xs" data-0="opacity:1;"
data-100="transform:translatey(40%);"
data-center-center="transform:translatey(-180%);">
<img src="{{asset('web/muscat/img/web/parallaxobject1.png')}}" alt="">
</div>
<section id="team" class="color-section">
  <svg class="triangleShadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
   <path class="trianglePath1" d="M0 0 L50 100 L100 0 Z" />
 </svg>
 <div class="container">
   <div class="col-lg-8 col-lg-offset-2">
    <div class="section-heading">
     <h2>Our Team</h2>
   </div>
 </div>
 <div class="row team">
  <div class="col-lg-5 col-md-5 res-margin">
   <img src="{{asset('web/muscat/img/web/teammain.jpg')}}" class="center-block img-responsive img-curved" alt=""/>
 </div>
 <div class="col-lg-7 col-md-7" id="team_1">
   <h3>Meet our Qualified Staff</h3>
   <p>
     American Lyceum’s highly qualified staff is committed to provide personal
     attention and professional education to preschool, along with continuous
     improvement, growth, and achievement of every student.
   </p>
 </div>
</div>
<div style="display: none;">
  <div class="col-lg-2">
   <div class="team-item">
    <img src="{{asset('web/muscat/img/web/team1.jpg')}}" alt=""/>
    <div class="team-caption" style="background-color:#353794;">
     <h5 class="text-light" style="font-size: 19px;" >Jane Doe</h5>
     <p>Founder</p>
   </div>
 </div>
</div>
<div class="col-lg-2">
 <div class="team-item">
  <img src="{{asset('web/muscat/img/web/team2.jpg')}}" alt=""/>
  <div class="team-caption" style="background-color:#353794;">
   <h5 class="text-light" style="font-size: 19px;" >Mario Salles</h5>
   <p>Teacher</p>
 </div>
</div>
<!-- /team-item-->
</div>
<!-- col-lg-12-->
<div class="col-lg-2">
 <!-- member 3-->
 <div class="team-item">
  <img src="{{asset('web/muscat/img/web/team3.jpg')}}" alt=""/>
  <div class="team-caption" style="background-color:#353794;">
   <h5 class="text-light" style="font-size: 19px;" >Julia Stan</h5>
   <p>Teacher</p>
 </div>
</div>
<!-- /team-item-->
</div>
<!-- col-lg-12-->
<div class="col-lg-2">
 <!-- member 3-->
 <div class="team-item">
  <img src="{{asset('web/muscat/img/web/team4.jpg')}}" alt=""/>
  <div class="team-caption" style="background-color:#353794;">
   <h5 class="text-light" style="font-size: 19px;" >Mary John</h5>
   <p>Caretaker</p>
 </div>
</div>
<!-- /team-item-->
</div>

<div class="col-lg-2">
 <!-- member 3-->
 <div class="team-item">
  <img src="{{asset('web/muscat/img/web/team6.jpg')}}" alt=""/>
  <div class="team-caption" style="background-color:#353794;">
   <h5 class="text-light" style="font-size: 19px;" >Juditt Lind</h5>
   <p>Expert</p>
 </div>
</div>
<!-- /team-item-->
</div>
<!-- col-lg-12-->
</div>
<!--/owl-team -->  
</div>
<!--/container -->
</section>
<section id="admission">
 <section style="background-image: url('http://127.0.0.1:8000/web/muscat/img/notify-bg.jpg'); height: 100%; width: 100%;background-size: cover;">
  <div class="container">
   <div class="col-lg-12 col-lg-offset-2">
     <h3 style="color: #ffb86e;
     border-bottom: 5px solid #ffb86e;
     width: 70%;">ADMISSION POLICY &amp; REGISTRATION</h3>
   </div>
   <div class="row">

     <div class="col-md-6  quote-test">
      <!-- quote -->
      <p style="text-align: left;">
      </p><h5 style="color: #ffeacb;">ADMISSION POLICY </h5>
      <p>• Admission is granted on first come first serve basis.</p><br>
      <p>• The age restrictions are strictly observed.</p><br>
      <p>• Children with any disability can only get admission after the approval .</p><br>
      <p>• Once admission is cancelled, process has to be followed for readmission.
      </p><br>
      <p>• Admission may be cancelled if there is any health hazard to others.</p><br>
      <p>• The health and safety policy has to be followed in letter &amp; spirit.</p><br>
      <p>• All dues have to be paid before availing of the services.</p><br>
      <p>• Admission may cancelled on misbehavior with staff.
      </p><br>
      <p>• Any decision regarding admission by the school is final.</p><br>

    </div>

    <div class="col-md-6" style="text-align: center;">
     <div class="img_bx">
       <img src="http://127.0.0.1:8000/web/muscat/img/admtion.jpg" alt="New York" height="200px" style="background-size: cover; width: 100%; height: 320px;">
       <button type="button" class="btn btn-info btn-xl" data-toggle="modal" data-target="#myModal" style="width: 200px;margin: 10px;"> Apply </button>
     </div>  
   </div>
 </div>
</div>
</section>
<div class="modal fade" id="myModal" role="dialog" style="margin-top: 180px;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
        <section class="default-main content-start relative bg-white">

          <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">



            <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

            </div>

          </div>

          <div class="flex flex-row-ns flex-column flex-wrap mw8 center relative">

            <div class="main-section w-70-l w-70-m w-100 ph4 ph0-l">
              <div class="w-100">

                <h1 class="mt5-ns pr4-ns hidden-element fade-down element-load">How to Apply</h1>

              </div>
              <div class="col-md-12">
                <form action="http://localhost:8000/pakistan/registeration" method="post">
                  <input type="hidden" name="_token" value="uUdvRNYXsTVBSZyFwa45lcjuKN2DOBlVEYGaqKHN">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="textx" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required="">
                      <div class="alert alert-danger name-error" style="display:none">
                        <p style="color: red">Name is required</p>
                      </div>

                    </div>
                    <div class="form-group">
                     <label for="dob"> Date of Birth</label>
                     <input type="text" name="dob" class="form-control" id="dob" placeholder="age">
                   </div>
                   <div class="form-group">
                    <label for="branch_id">Branch</label>
                    <select class="form-control" name="branch_id" id="branch_id" required="">
                      <option selected="selected" disabled="disabled">Seclect Branch</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" id="address" placeholder="address"></textarea>
                  </div>
                </div>

                <div class="col-md-6">

                  <div class="form-group">
                   <label for="fname">Father’s Name</label>
                   <input type="text" name="fname" class="form-control" id="fname" placeholder="Father name">
                 </div>
                 <div class="form-group">
                  <label for="phone">Cell No</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No">
                </div>
                <div class="form-group">
                  <label for="schoolStudy">Nationality</label>
                  <select class="form-control" name="branch_id" id="branch_id" required="">
                    <option selected="selected" disabled="disabled">Seclect Nationality</option>
                    <option></option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="email">Email ID</label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="Email Address">
                </div>





              </div>
              <div class="col-md-6">
                <input type="submit" class="btn btn-success ">
              </div>
            </form>
          </div>
<!-- 
            <input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/how-to-apply">
            <script type="text/javascript">
                //<![CDATA[
                Sys.WebForms.PageRequestManager._initialize('ctl00$cphPageBody$ctl00', 'aspnetForm', [], [], [], 90, 'ctl00');
                //]]>
            </script>






            <input name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" type="hidden" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="295006">
            <div class="templatecontent ">
                <p class="no-border">Thank you for your interest in pursuing your child’s admission to American Lyceum International School. The first step in our admission process begins with an online application or you can visit your nearest branch.  You may begin your online application by clicking on the link below. We have also included the remaining steps by grade level for you to review prior to submitting your application including admission forms and assessment and student visit details.</p>

                

                <h4>Start Your Application Process</h4>

                <p><a class="btn" href="javascript:;" target="_blank">New Application </a><br>
                    

                -->
              </div>



            </div>

            <div class="side-section w-30-l w-30-m w-100 pl4-l pl3-m">

            </div>
          </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<section  class="color-section"><div id="demo" class="carousel slide" data-ride="carousel">
</div>
</section>
</section>
<section id="activities">
  <div class="container">
   <!-- Section Heading -->
   <div class="section-heading">
    <h2>Our Activities</h2>
  </div>
  <!--Navigation -->
  <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#tab1" data-toggle="tab">Music Classes </a></li>
    <li><a href="#tab2" data-toggle="tab">Playground </a></li>
    <li><a href="#tab3" data-toggle="tab">SIGNATURE PRACTICES</a></li>
    <li><a href="#tab4" data-toggle="tab">Art & Craft</a></li>
  </ul>
  <div class="tabbable">
    <div class="tab-content col-md-12 col-centered">
     <!--Tab Content 1 -->
     <div class="tab-pane active in fade" id="tab1">
      <div class="row">
       <div class="col-md-5 col-lg-5 pull-left">
        <!-- Activity image-->
        <img src="{{asset('web/muscat/img/web/activity1.jpg')}}" alt="" class="img-responsive img-circle">            
      </div>
      <div class="col-md-7 col-lg-7 pull-left">
        <!-- Activity text-->
        <h3>Music Classes</h3>
        <!-- Accordion -->
        <div class="panel-group" id="accordion">
         <!-- Question 1 -->
         <div class="panel">

          <div id="collapse1" class="panel-collapse collapse in">
           <div class="panel-body">
            <p>American Lyceum Private School is training in early learning through music
              education for babies, toddlers and children aged 3 years to 6 years. We have been
              developing our music programs, these programs consist of lesson plans for group
              sessions where the children are involved in creative play, movement games, singing, dancing and playing instruments.
            </p>
          </div>
        </div>
      </div>    
    </div>
  </div>
  <!-- /.col-md-7 -->
</div>
<!-- /.row -->
</div>
<!-- /#tab1 -->  
<!--Tab Content 2 -->
<div class="tab-pane fade" id="tab2">
  <div class="row">
   <div class="col-md-5 col-lg-5 pull-left">
    <!-- Activity image-->
    <img src="{{asset('web/muscat/img/web/activity2.jpg')}}" alt="" class="img-responsive img-circle">            
  </div>
  <div class="col-md-7 col-lg-7 pull-left">
    <!-- Activity text-->
    <h3>Playground  Classes</h3>
    <!-- Accordion -->
    <div class="panel-group" id="accordion2">
     <!-- Question 1 -->
     <div class="panel">
      <div id="collapse4" class="panel-collapse collapse in">
       <div class="panel-body">
        <p>If you own a school, you’re likely passionate about providing the best possible experience for the children in your care. A great school playground can dovetail with your goals by helping you support children in growth, development, fun and creativity. School playground equipment offers plenty of benefits:
        </p>
        <p>• An inclusive playground can help children play together, even if they have different mobility and ability levels.</p>
        <p>• Play can help children grow and develop.</p>
        <p>• Play can incite curiosity and creativity in children.</p>
        <p>• Sensory play can encourage children to explore the world around them while building sensory perception.</p>
        <p>• Play can relieve stress, especially for children who are new to daycare.</p>
        <p>• Play time can help children make friends and have fun.</p>
        <p>• Playgrounds can have components which help children learn numbers, letters and colors.</p>
        <p>• A playground can encourage active play and an interest in exercise.</p>
        <p>• Playgrounds can help children learn social skills.</p>

      </p>
    </div>
  </div>
</div>      
</div>
<!-- /.accordion -->      
</div>
<!-- /.col-md-7 -->
</div>
<!-- /.row -->
</div>
<!-- /#tab2 -->  
<!--Tab Content 3 -->
<div class="tab-pane fade" id="tab3">
  <div class="row">
   <div class="col-md-5 col-lg-5 pull-left">
    <!-- Activity image-->
    <img src="{{asset('web/muscat/img/web/activity3.jpg')}}" alt="" class="img-responsive img-circle">            
  </div>
  <div class="col-md-7 col-lg-7 pull-left">
    <!-- Activity text-->
    <h3>SIGNATURE PRACTICES</h3>
    <!-- Accordion -->
    <div class="panel-group" id="accordion3">
     <!-- Question 1 -->
     <div class="panel">
      <div id="collapse7" class="panel-collapse collapse in">
       <div class="panel-body">
        <p>  Our World at Their Fingertips® curriculum includes seven toddler Signature Practices that make learning an adventure and inspire individual development:</p>

        <p>• Prime Times: One-on-one interactions to build relationships and important social skills.</p>
        <p>• Language Development: Conversation to encourage thinking, speaking, and comprehension.</p>
        <p>• Sensory Experiences: Materials and media to ignite the senses.</p>
        <p>• Small Group Learning: Activities to maximize prime times, encourage choices in play, and minimize overstimulation.</p>
        <p>• Self-Help Skills: Encouragement to learn daily tasks and routines at each child’s own pace.</p>
        <p>• Cause and Effect: Opportunities to learn about the scientific method by asking questions, experimenting, finding answers, and testing results.</p>
        <p>• Outdoor Experiences: Time outside to introduce new sights, sounds, smells, and textures.</p>

      </div>
    </div>
  </div>        
</div>
<!-- /.accordion -->      
</div>
<!-- /.col-md-7 -->
</div>
<!-- /.row -->
</div>
<!-- /#tab3 -->  
<!--Tab Content 4 -->
<div class="tab-pane fade" id="tab4">
  <div class="row">
   <div class="col-md-5 col-lg-5 pull-left">
    <!-- Activity image-->
    <img src="{{asset('web/muscat/img/web/activity4.jpg')}}" alt="" class="img-responsive img-circle">            
  </div>
  <div class="col-md-7 col-lg-7 pull-left">
    <!-- Activity text-->
    <h3>Art & Craft</h3>
    <!-- Accordion -->
    <div class="panel-group" id="accordion4">
     <!-- Question 1 -->
     <div class="panel">

      <div id="collapse10" class="panel-collapse collapse in">
       <div class="panel-body">
        <p>Give your child a chance to embrace his artistic side. Try these great arts and crafts ideas: Whether it's learning a new handcraft like crochet or getting messy.
        </p>
      </div>
    </div>
  </div>
</div>                            
</div>                          
</div>
</div>

<!-- /#tab5 -->          
</div>
<!--tab-content-->  
</div>
<!--tababble--> 
</div>
<!-- /container -->
</section>
<!-- /Section ends -->
<!-- Parallax object -->
<div class="parallax-object2 hidden-sm hidden-xs" data-0="opacity:1;"
data-start="margin-top:40%"
data-100="transform:translatey(0%);"
data-center-center="transform:translatey(-180%);">
<!-- Image -->
<img src="{{asset('web/muscat/img/web/parallaxobject2.png')}}" alt="">
</div>
<!-- Section Gallery -->
<section id="gallery" class="color-section">
 <!-- svg triangle shape -->
 <svg class="triangleShadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
  <path class="trianglePath1" d="M0 0 L50 100 L100 0 Z" />
</svg>
<div class="container">
  <!-- Section heading -->
  <div class="section-heading">
   <h2>Our Gallery</h2>
 </div>
 <!-- Navigation -->
 <div class="text-center col-md-12">
   <ul class="nav nav-pills cat text-center" role="tablist" id="gallerytab">
    <li class="active"><a href="#" data-toggle="tab" data-filter="*">All</a>
     <li><a href="#" data-toggle="tab" data-filter=".events">Events</a></li>
     <li><a href="#" data-toggle="tab" data-filter=".facilities">Our Facilities</a></li>
   </ul>
 </div>
 <!-- Gallery -->
 <div class="row">
  <div class="col-md-12">
   <div id="lightbox">
    <!-- Image 1 -->
    <div class="col-sm-6 col-md-6 col-lg-4 events">
     <div class="portfolio-item">
      <div class="gallery-thumb">
       <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery1.jpg')}}" alt="">
       <span class="overlay-mask"></span>
       <a href="img/gallery1.jpg" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
        <i class="fa fa-expand"></i></a>
      </div>
    </div>
  </div>
  <!-- Image 2 -->
  <div class="col-sm-6 col-md-6 col-lg-4 facilities">
    <div class="portfolio-item">
     <div class="gallery-thumb">
      <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery2.jpg')}}" alt="">
      <span class="overlay-mask"></span>
      <a href="{{asset('web/muscat/img/web/gallery2.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
       <i class="fa fa-expand"></i></a>
     </div>
   </div>
 </div>
 <!-- Image 3 -->
 <div class="col-sm-6 col-md-6 col-lg-4 facilities">
   <div class="portfolio-item">
    <div class="gallery-thumb">
     <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery3.jpg')}}" alt="">
     <span class="overlay-mask"></span>
     <a href="img/gallery3.jpg" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
      <i class="fa fa-expand"></i></a>
    </div>
  </div>
</div>
<!-- Image 4 -->
<div class="col-sm-6 col-md-6 col-lg-4 events">
  <div class="portfolio-item">
   <div class="gallery-thumb">
    <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery4.jpg')}}" alt="">
    <span class="overlay-mask"></span>
    <a href="{{asset('web/muscat/img/web/gallery4.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
     <i class="fa fa-expand"></i></a>
   </div>
 </div>
</div>
<!-- Image 5 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
 <div class="portfolio-item">
  <div class="gallery-thumb">
   <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery5.jpg')}}" alt="">
   <span class="overlay-mask"></span>
   <a href="{{asset('web/muscat/img/web/gallery5.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
    <i class="fa fa-expand"></i></a>
  </div>
</div>
</div>
<!-- Image 6 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
  <div class="portfolio-item">
   <div class="gallery-thumb">
    <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery6.jpg')}}" alt="">
    <span class="overlay-mask"></span>
    <a href="{{asset('web/muscat/img/web/gallery6.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
     <i class="fa fa-expand"></i></a>
   </div>
 </div>
</div>
<!-- Image 7 -->
<div class="col-sm-6 col-md-6 col-lg-4 events">
 <div class="portfolio-item">
  <div class="gallery-thumb">
   <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery7.jpg')}}" alt="">
   <span class="overlay-mask"></span>
   <a href="{{asset('web/muscat/img/web/gallery7.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
    <i class="fa fa-expand"></i></a>
  </div>
</div>
</div>
<!-- Image 8 -->
<div class="col-sm-6 col-md-6 col-lg-4 events">
  <div class="portfolio-item">
   <div class="gallery-thumb">
    <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery8.jpg')}}" alt="">
    <span class="overlay-mask"></span>
    <a href="{{asset('web/muscat/img/web/gallery8.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
     <i class="fa fa-expand"></i></a>
   </div>
 </div>
</div>
<!-- Image 9 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
 <div class="portfolio-item">
  <div class="gallery-thumb">
   <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery9.jpg')}}" alt="">
   <span class="overlay-mask"></span>
   <a href="{{asset('web/muscat/img/web/gallery9.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
    <i class="fa fa-expand"></i></a>
  </div>
</div>
</div>
<!-- Image 10 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
  <div class="portfolio-item">
   <div class="gallery-thumb">
    <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery10.jpg')}}" alt="">
    <span class="overlay-mask"></span>
    <a href="{{asset('web/muscat/img/web/gallery10.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
     <i class="fa fa-expand"></i></a>
   </div>
 </div>
</div>
<!-- Image 11 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
 <div class="portfolio-item">
  <div class="gallery-thumb">
   <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery11.jpg')}}" alt="">
   <span class="overlay-mask"></span>
   <a href="{{asset('web/muscat/img/web/gallery11.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
    <i class="fa fa-expand"></i></a>
  </div>
</div>
</div>
<!-- Image 12 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
  <div class="portfolio-item">
   <div class="gallery-thumb">
    <img class="img-responsive" src="{{asset('web/muscat/img/web/gallery12.jpg')}}" alt="">
    <span class="overlay-mask"></span>
    <a href="{{asset('web/muscat/img/web/gallery12.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
     <i class="fa fa-expand"></i></a>
   </div>
 </div>
</div>
</div>
<!-- /lightbox-->
</div>
<!-- /col-md-12-->
</div>
<!-- /row -->
</div>
<!-- /container -->
</section>


<section id="latestblog">
  <div class="container">

   <!-- Section Heading -->
   <div class="section-heading">
    <h2>Core Values </h2>
  </div>
  <!-- Carousel -->
  <div class="row color_block">
    <div class="row" id="owl-blog">
     <!-- Blog item 1 -->
     <div class ="col-md-4">
       <div class="blog-preview ">
        <!-- Blog image -->
        <img src="{{asset('web/muscat/img/web/galler.jpg')}}" width="80%">
        <div class="latest-caption text-center">
         <a href="blog-post.html">
          <h4>EXCELLENCE</h4>
        </a>
        <!-- Post Info -->

        <p>Academic: New Heights of Excellence are to be attained. Personal: Every person is
          to be at his/her best. Facilities: Excellent facilities are to be provided to learners.

        </p>

      </div>
    </div></div>
    <div class ="col-md-4">
     <div class="blog-preview ">
      <img src="{{asset('web/muscat/img/web/galler1.jpg')}}" width="80%">
      <div class="latest-caption text-center">
       <a href="blog-post.html">
        <h4>INTEGRITY</h4>
      </a>
      <!-- Post Info -->

      <p>Personal: We do whatever we commit to. Professional: Professional Integrity is our

        most important and valued asset.
      </p>

    </div>
  </div>
  <!-- /blog-preview --></div>
  <!-- Blog item 3 -->
  <div class ="col-md-4">
   <div class="blog-preview ">
    <img src="{{asset('web/muscat/img/web/galler5.jpg')}}" width="80%">
    <div class="latest-caption text-center">
     <a href="blog-post.html">
      <h4>RESPECT</h4>
    </a>

    <p>Everyone is expected to be respectful regardless of their rank and grade. Nobody,
      on whichever level of the hierarchy is to be humiliated. Students must be
      respected by staff and faculty. Faculty must be respected by students and parents.

      Parents must be respected by Students and faculty.
    </p>
    <!-- Button-->

  </div>
</div></div>
<!-- /blog-preview -->
<!-- Blog item 4 -->

<!-- /blog-preview -->
<!-- Blog item 5 -->
<div class ="col-md-6">
 <div class="blog-preview ">
  <img src="{{asset('web/muscat/img/web/galler3.jpg')}}" width="80%">
  <div class="latest-caption text-center">
   <a href="blog-post.html">
    <h4>RESPONSIBILITY</h4>
  </a>
  <!-- Post Info -->

  <p>We want proactive personalities. Students must be responsible for whatever they
    are getting. Teachers must be responsible for the results of the students. Parents

    must be responsible for the grooming of the children.
  </p>

</div>
</div></div>
<!-- /blog-preview -->
<!-- Blog item 6 -->
<div class ="col-md-6">
 <div class="blog-preview ">
  <img src="{{asset('web/muscat/img/web/galler4.jpg')}}" width="80%">

  <div class="latest-caption text-center">
   <a href="blog-post.html">
    <h4>Toddler Care</h4>
  </a>


  <p>When your toddler’s in the right place, you just know. Our program is designed to give you that feeling — a safe place for your newly independent child to test out and learn new skills, wonder about everything, and discover how to make friends. It’s all alongside teachers who know every day that they’re not caring for any child, but the most important child — yours.
  </p>
</div></div>
</div>
<!-- /blog-preview -->
</div>
<!-- /owl-blog -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</section>
<!-- Section ends -->
<!-- Parallax object -->
<div class="parallax-object3 hidden-sm hidden-xs" data-0="opacity:1;"
data-100="transform:translatex(0%);"
data-center-center="transform:translatex(380%);">
<!-- Image -->
<img src="{{asset('web/muscat/img/web/parallaxobject3.png')}}" alt="">
</div>
<!-- Section Prices -->
<section id="prices" class="color-section">
 <!-- svg triangle shape -->
 <svg id="triangleShadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
  <path class="trianglePath1" d="M0 0 L50 100 L100 0 Z" />
</svg>
<div class="container">
  <div class="col-lg-8 col-lg-offset-2">
   <!-- Section heading -->
   <div class="section-heading">
    <h2>Our Prices</h2>
  </div>
</div>
<div class="row">
 <div class="col-md-12 text-center">
  <!-- Price tables -->
  <div class="pricing pricing-palden">
   <div class="pricing-item col-lg-12 col-md-12 col-sm-12">
    <div class="pricing-deco">
     <svg class="pricing-deco-img" enable-background='new 0 0 300 100' height='100px' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
      <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;  c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
      <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A; c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
      <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A; H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
      <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;  c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
    </svg>
                                                          <!--      <div class="pricing-price"><span class="pricing-currency">$</span>59
                                                                  <span class="pricing-period">/ day</span>
                                                                </div> -->
                                                                <h3 class="pricing-title">Annual Fee </h3>
                                                              </div>
                                                              <!-- List -->
                                                              <ul class="pricing-feature-list jac" style="display: inline-block; width: 100%;">
                                                               <li>Registration FEE  <br>125 OMR</li>
                                                               
                                                               <li> KG1           <br>   1600 OMR </li>
                                                               <li>KG2        <br>      1750 OMR</li>
                                                               <li>Grade 1  <br>     2000 OMR </li>
                                                               <li>Grade 2    <br>    2000 OMR</li> 
                                                               <li>Grade 3    <br>    2200 OMR</li> 
                                                               <li>Grade 4    <br>    2400 OMR</li> 



                                                             </ul>

                                                           </div>
                                                           <!--/pricing-item-->
                                                         </div>
                                                         <!-- /col-sm-12-->
                                                       </div>
                                                       <!-- /row -->       
                                                     </div>
                                                     <!-- /container-->
                                                   </div>
                                                 </section>
                                                 <!-- /Section ends -->
                                                 <!-- Section Call to Action -->
                                                 <section id="call-to-action" class="small-section">
                                                   <div class="container-fluid text-center" style="margin-right: 10px; margin-left: 15px;">
                                                     <div class="col-md-3 col-sm-4 col-xs-12">
                                                      <div class="slide1">
                                                        <img src="{{asset('web/muscat/img/web/activit.jpg')}}" width="100%">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                                      <div class="slide1">
                                                        <img src="{{asset('web/muscat/img/web/activit1.jpg')}}" width="100%">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                                      <div class="slide1">
                                                        <img src="{{asset('web/muscat/img/web/activit2.jpg')}}" width="100%">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                                      <div class="slide1">
                                                        <img src="{{asset('web/muscat/img/web/activit3.jpg')}}" width="100%">
                                                      </div>
                                                    </div>
                                                  </section>
                                                  <div class="container">
                                                    <div class="container">
                                                      <div class="nav nav-tabs">
                                                       <ul class="nav navbar-nav page-scroll navbar-left">
                                                         <li class="active1">
                                                          <a href="#contact_form1">Complaint</a>
                                                        </li>
                                                        <li class="active1">
                                                          <a href="#contact_form1">Suggestion</a>
                                                        </li>
                                                        <li class="active1">
                                                          <a href="#contact_form1">Feedback</a>
                                                        </li>
                                                      </ul>

                                                    </div>
                                                  </div>
                                                </div>
                                                <section id="contact" class="color-section">
                                                 <div class="container" style="padding-top: 30px;">
                                                  <div class="col-lg-8 col-lg-offset-2">
                                                   <!-- Section heading -->
                                                   <div class="section-heading">
                                                    <h2>Contact us</h2>
                                                  </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                 <h4>Information</h4>
                                                 <div class="contact-info">
                                                  <p><a href="mailto:youremailaddress">Contact US: 
                                                  </a></p>
                                                  <p><i class="fa fa-phone margin-icon"></i>+968-90856281, 96970503.24237450</p>
                                                </div>
                                                <div class="social-media">
                                                 <a href="https://twitter.com/kgamericanlyce1" title=""><i class="fa fa-twitter"></i></a>
                                                 <a href="https://www.facebook.com/AmericanLyceumSchoolMuscat" title=""><i class="fa fa-facebook"></i></a>

                                                 <a href="https://www.instagram.com/american_lyceum_school_oman/" title=""><i class="fa fa-instagram"></i></a>
                                               </div>
                                               <p>Visit us at Way No 4864, Azaiba behind Sultan Center , Muscat, OMAN</p>

                                               <div id="map-canvas"></div>
                                             </div>
                                             <div id="contact_form1"></div>
                                             <div class="col-lg-7 col-lg-offset-1">
                                               <h4>Write us</h4>
                                                <div id="contact_form">
                                                  <div class="form-group">
                                                   <input type="text" name="name" class="form-control input-field" placeholder="Name" required="">                    
                                                   <input type="email" name="email" class="form-control input-field" placeholder="Email ID" required="">           
                                                   <input type="text" name="subject" class="form-control input-field" placeholder="Subject" required="">                     
                                                 </div>
                                                 <textarea name="message" id="message" class="textarea-field form-control" rows="4" placeholder="Enter your message" required=""></textarea>
                                                 <button type="submit" id="contactUsBtn" value="Submit" class="btn center-block" >Send message</button>
                                               </form>
                                               </div>
                                             </div>
                                             <div id="contact_results"></div>
                                           </div>
                                         </div>
                                       </section>
                                       <div class="container-fluid cloud-divider">
                                         <svg id="deco-clouds" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
                                          <path d="M-5 100 Q 0 20 5 100 Z
                                          M0 100 Q 5 0 10 100
                                          M5 100 Q 10 30 15 100
                                          M10 100 Q 15 10 20 100
                                          M15 100 Q 20 30 25 100
                                          M20 100 Q 25 -10 30 100
                                          M25 100 Q 30 10 35 100
                                          M30 100 Q 35 30 40 100
                                          M35 100 Q 40 10 45 100
                                          M40 100 Q 45 50 50 100
                                          M45 100 Q 50 20 55 100
                                          M50 100 Q 55 40 60 100
                                          M55 100 Q 60 60 65 100
                                          M60 100 Q 65 50 70 100
                                          M65 100 Q 70 20 75 100
                                          M70 100 Q 75 45 80 100
                                          M75 100 Q 80 30 85 100
                                          M80 100 Q 85 20 90 100
                                          M85 100 Q 90 50 95 100
                                          M90 100 Q 95 25 100 100
                                          M95 100 Q 100 15 105 100 Z">
                                        </path>
                                      </svg>
                                    </div>
                                    <div class="v-parallax v-bg-stylish v-bg-stylish-v10" id="download" style="background-image: url('{{asset('web/muscat/img/calltoactionbg1.jpg')}}');background-size: cover;   background-size:cover;
                                    background-blend-mode: multiply; background-color: rgb(51, 49, 124, 0.9);">

                                    <div class="container">
                                      <div class="row center">

                                        <div class="col-sm-12">

                                          <div class="v-content-wrapper">


                                            <div class="v-spacer col-sm-12 v-height-standard"></div>

                                            <div id="intro_stores" style="text-align: center;">
                                              <h3 class="v-smash-text-large-2x" style="
                                              border-radius: 0px;
                                              height: 50px;
                                              font-size: 22px;
                                              margin-top: 40px;
                                              color: #fff;
                                              letter-spacing: 1.5;
                                              line-height: 1;}">
                                              <span>Download American Lyceum App!
                                              </span>
                                            </h3>
                                            <a href="https://play.google.com/store/apps/details?id=com.lyceum.eschool">
                                              <img src="http://eschoolforall.com/assets/img/landing/download.png" class="img-responsive" alt="google_icon" width="300px" style="margin:0 auto;border-radius:15px;"></a>

                                            </div>



                                          </div>

                                        </div>

                                        <div class="v-bg-overlay overlay-colored"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <footer>
                                    <div class="container-fluid">
                                     <!-- Newsletter -->
                                     <div class="col-lg-4 col-md-6 text-center res-margin">
                                      <h6 class="text-light">SIGN UP FOR OUR NEWSLETTER</h6>
                                      <p>We will send updates once a week.</p>
                                      <!-- Form -->       
                                      <div id="mc_embed_signup">
                                       <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
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
                             <!-- /col-lg-4 -->
                             <!-- Bottom Credits -->
                             <div class="col-lg-4 col-md-6 res-margin">

                             </div>
                             <!-- /col-lg-4 -->
                             <!-- Opening Hours -->
                             <div class="col-lg-4 col-md-12 text-center">
                              <!-- Sign-->
                              <h6 class="text-light">Opening Hours:</h6>
                              <!-- Table-->
                              <table class="table">
                               <tbody>
                                <tr>
                                 <td class="text-left"> Sunday to Thursday </td>
                                 <td class="text-right">07:00 AM to  - 03:00 PM </td> 
                               </tr>
                               <tr>
                                 <td class="text-left">Friday & Saturday / Holidays</td>
                                 <td class="text-right"><span class="label label-danger">Closed</span></td>
                               </tr>
                             </tbody>
                           </table>
                         </div>
                         <!-- /col-lg-4 -->
                       </div>
                       <!-- / container -->
                       <hr>
                       {{-- <p>Copyright © 2018 - 2019 </p> --}}
                       <!-- /container -->
                       <!-- Go To Top Link -->
                       <div class="page-scroll hidden-sm hidden-xs">
                         <a href="#page-top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
                       </div>
                     </footer>
                     <!-- /footer ends -->
                   </div>
                   <style>
                    h6 {
                      font-size: 22px;
                      margin-bottom: 10px;
                      text-transform: uppercase;
                      font-family: 'Lato',sans-serif;
                      font-weight: 800;
                      letter-spacing: 0.8px;
                      color: #000261;
                    }
                  </style>
                  <script src="{{asset('web/muscat/js/jquery.min.js')}}"></script>
                  <script src="{{asset('web/muscat/js/bootstrap.min.js')}}"></script>
                  <!-- Google maps -->
                  <script src="https://maps.googleapis.com/maps/api/js?v=3"></script>
                  <!-- Main Js -->
                  <script src="{{asset('web/muscat/js/main_1.js')}}"></script>
                  <!-- Isotope -->    
                  <script src="{{asset('web/muscat/js/jquery.isotope.js')}}"></script>
                  <!--Mail Chimp validator -->

                  <script src="{{asset('web/muscat/js/mc-validate.js')}}"></script>
                  <!--Other Plugins -->

                  <script src="{{asset('web/muscat/js/plugins.js')}}"></script>
                  <!-- Contact -->

                  <!-- <script src="{{asset('web/muscat/js/contact.js')}}"></script> -->
                  <!-- Prefix free CSS -->

                  <!-- <script src="{{asset('web/muscat/js/prefixfree.js')}}"></script>         -->
                  <!-- GreenSock -->

                  <!-- <script src="{{asset('web/muscat/layerslider/js/greensock.js')}}" ></script> -->
                  <!-- LayerSlider script files -->

                  <!-- <script src="{{asset('web/muscat/layerslider/js/layerslider.transitions.js')}}" ></script> -->

                  <!-- <script src="{{asset('web/muscat/layerslider/js/layerslider.kreaturamedia.jquery.js')}}" ></script> -->
                  <!-- Swicther -->

                  <script src="{{asset('web/muscat/switcher/js/dmss.js')}}"></script>
                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                      <script type="text/javascript">
                    $.ajaxSetup({
                      headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                   });
                    $("#contactUsBtn").click(function (e) {


            var form = $('#contactUs')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            console.log('formData', formData);
            console.log('form', form);
            $.ajax({
              url: "{{route('ContactFom')}}",
              type: "POST",
              enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: formData,

                success: function (response) {
                  console.log('response', response);
                  if (response.status) {




                    $("#contactUs")[0].reset();

                    swal(
                      'Success!',
                      'Your query has been submitted , We contact with you very soon',
                      'success'
                      );
                  } else {
                    console.log('error blank', response.message);
                    swal(
                      'Warning!',
                      response.message,
                      'warning'
                      );
                  }
                }, error: function (e) {
                  console.log('error', e);
                  swal(
                    'Oops...',
                    'Something went wrong!',
                    'error'
                    )
                }
              });
            e.preventDefault();
          });

        </script>

