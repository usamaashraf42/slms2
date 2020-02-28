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
    font-size: 15px!important;
    text-align: center;
    transition: background .2s ease-in-out;
    font-family: 'Lato',sans-serif;
    color: #fff;
    letter-spacing: 0.2px;
    font-weight: 600;
    background: transparent;
}
.box{
width: 320px;
border: 1px solid #bbb;
padding: 14px;
min-height: 140px;
margin: 10px;
float: left;
background-image: url('{{asset('web/muscat/img/Konfest.PNG')}}');
height: 100%;
background-color: #e4e4f3;
background-size: cover;
display: inline-block;
text-align: justify;
box-shadow: 0px 3px 3px #353794;
color: #fff;
}
.box p{
  text-align: center;
}
.event-date{
  font-weight: bold;
  color: #e6383d;
}
.event-description{
color: #000;
}


#calendar{
  width:358px;
  margin:0 auto;
  margin-top:2%;
  margin-bottom:2%;
  border-radius:5px;
  font-family:'Open Sans',sans-serif;
  text-align:center;
  color:#555;
  box-shadow:0 0 50px -14px rgba(0,0,0,.8);
}

#calendar h1{
  background: #353794;
  border-radius:5px 5px 0 0;
  padding:20px;
  font-size:140%;
  font-weight:300;
  text-transform:uppercase;
  letter-spacing:1px;
  color:#fff;
  cursor:default;
  text-shadow:0 0 10px rgba(0,0,0,.8);
}

#calendar table{
    border-top: 1px solid #ddd;
    border-left: 1px solid #ddd;
    border-spacing: 0;
    width: 95%;
    margin: 0 auto;
    border-radius: 0 0 5px 5px;
}
#calendar td{
  width:38px;
  height:38px;
  background:#eee;
  border-right:1px solid #ddd;
  border-bottom:1px solid #ddd;
  padding:6px;
  cursor:pointer;
  transition:background .3s;
  -webkit-transition:background .3s;
}

#calendar td:hover:not(.current){
  background:#ddd;
}

#calendar .lastmonth,#calendar .nextmonth,#calendar .nextmonth ~ *{
  background:#fff;
  color:#999;
}

#calendar .current{
  background:#ee3333;
  font-weight:700;
  color:#fff;
  text-shadow:0 0 10px rgba(0,0,0,.5);
}
.box_imgs{
  width: 100%;

  border: 2px solid #000;
}
.box_imgs img{
  height: 100%;
  width: 100%;
}
#calendar .hastask{
  font-weight:700;
}

#calendar tr:last-of-type td:first-of-type{border-radius:0 0 0 5px;}
#calendar tr:last-of-type td:last-of-type{border-radius:0 0 5px 0;}
.bg_blue{
  background: #353794;
    color: aliceblue;
}
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
    var BASE_URL = "{{ url('')}}";
  </script>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="overflow-x: hidden;">
   <div class="full">
<div class="header-top black-bg d-none d-md-block">
                <div class="container-fluid">
                    <div class="row">
                                <div class="col-xl-1 col-md-1 col-lg-1"></div>
                        <div class="col-xl-5 col-md-5 col-lg-5">
                            <div class="header-contact" style="padding-top: 5px;">
                                <a href="#" style="padding-right: 40px;color: #fff">
                                  <i class="fa fa-phone" style="padding-right: 5px;"></i> +968-97001942</a>
                                <a href="#" style="color: #fff;"><i class="fa fa-envelope" style="padding-right: 5px;"></i>muscat@americanlyceum.com</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-6" style="text-align: center;color: #fff">
                            <div class="header-top-menu">
                                <nav class="naver naverer">
                                    <ul>

                                        <li><a href="blog.html"> 
                     </a><a href="https://twitter.com/NurseryMuscat" title=""><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                     <a href="https://www.facebook.com/AmericanLyceum" title=""><i class="fa fa-facebook"></i></a>
       </li>
       <li>
                     <a href="https://www.instagram.com/american_lyceum_nursery_oman/" title=""><i class="fa fa-instagram"></i></a>
            </li>
                                        <li style="padding-left: 35px; font-size: 18px;"><a href="http://127.0.0.1:8000/muscat/contact" style="color: #fff;">Contact Us  </a></li>
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
                             <li><a href="{{route('muscat.jobs')}}">Vacancies</a></li>
         <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Branches <b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        <li><a href="{{route('muscat.nursery')}}" style="background-color: #4a47ab;">Nursery</a></li>
                        <li><a href="{{route('muscat.school')}}" style="background-color: #4a47ab;">School</a></li>
                     </ul>
                  </li>
                   <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academics <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                   <li><a href="{{route('muscat.curriculum')}}" style="background-color: #4a47ab;">Curriculum</a></li>
                    <li><a href="{{route('muscat.academy')}}" style="background-color: #4a47ab;">Activity</a></li>
                    <li><a href="{{route('muscat.academy')}}" style="background-color: #4a47ab;">Academic</a></li>
                    </ul>
                    </li>
               </ul>
               <ul class="nav navbar-nav page-scroll navbar-right">
                 
                                <li><a href="{{route('muscat.news_nursery')}}">News</a></li>      
            <li><a href="{{route('muscat.event_nursery')}}">Events</a></li>     
                     <li><a href="http://www.lyceumgroupofschools.com/admin/login">Portal</a></li>

                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Prospects <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="franchisbooklet.pdf" style="background-color: #4a47ab;">View</a></li>
                    <li><a href="franchisbooklet.pdf"  download="franchisbooklet.pdf" style="background-color: #4a47ab;">Download</a></li>
                    </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div id="layerslider" class="ls-container ls-fullwidth" style="visibility: visible;">
         <div class="ls-inner" style="background-color: transparent; width: 100%; height: 100%;">
          <div class="ls-lt-container ls-overflow-hidden" style="width: 100%; height: 100%; display: block;">
             <div class="ls-curtiles" style="overflow: hidden;"><img src="{{asset('web/muscat/img/web/img_4.jpg')}}" width="100%" height="140%"></div>
             <div class="ls-nexttiles">
                <div class="ls-lt-tile" style="width: 100%; height: 100%; overflow: visible;">
                   <div class="ls-nexttile" style="top: 0px; left: 0px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"></div></div></div></div>
         
              
                  <div class="ls-slide ls-slide-4 ls-animating" data-ls="transition2d:104;timeshift:-2000;" style="width: 100%; height: 100%; visibility: visible; display: none; left: auto; right: 0px; top: 0px; bottom: auto;">
                     <img class="ls-bg ls-preloaded" alt="Slide background" style="padding: 0px; border-width: 0px; width: 100%;height: 100%; margin-left: 0px; margin-top: -166px; visibility: visible; opacity: 0.484476;">
                     <div class="ls-gpuhack" style="width: auto; height: auto; padding: 0px; border-width: 0px; left: 311.5px; top: 0px;"></div>
                     <img src="{{asset('web/muscat/img/bee.png')}}" class="ls-l img-responsive hidden-xs hidden-sm parallax1 ls-preloaded" alt="" data-ls="delayin:1500;easingin:fadeIn;parallaxlevel:7;" style="margin-left: 0px; margin-top: 0px; width: 180px; height: 169px; padding: 0px; border-width: 0px; left: 311.5px; top: 0px; transform-origin: 50% 50% 0px; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 63.7959, 0, 0, 1); opacity: 0.202551; visibility: visible; filter: none;">
                     <!-- Text -->

                     <div class="ls-l header-text" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin:easeOutElastic;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;parallaxlevel:2;" style="margin-left: 0px; margin-top: 0px; width: auto; height: auto; font-size: 14px; padding: 30px; border-width: 0px; left: 311.5px; top: 0px; filter: none; background-color: rgb(245, 245, 245,0.5);">
                        <h1>Welcome to American Lyceum</h1>
                        <p class="subtitle hidden-xs"> American Lyceum International Nursary   </p>
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
<div class="container-fluid">
 
            <!-- Navigation -->
            <div class="text-center col-md-12">
              <br>
               <ul class="nav nav-pills cat text-center" role="tablist" id="gallerytab">

                     </li><li><a href="#" data-toggle="tab" data-filter=".events" class="active">Academic Calendar</a></li>
                     <li><a href="#" data-toggle="tab" data-filter=".facilities">Activity Calendar </a></li>
                   <li><a href="#" data-toggle="tab" data-filter=".facilities1">Permotion</a></li>
                  </ul>
               </div>
               <!-- Gallery -->
               <div class="row">
                  <div class="col-md-12">
                     <div id="lightbox" class="isotope" style="position: relative; overflow: hidden; height: 960px;">
                        <!-- Image 1 -->
                        <div class="col-sm-12 col-md-12 col-lg-12 events isotope-item isotope-hidden" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(0.001, 0.001, 1); opacity: 0;">
            <div id="accad" style="border: 1px solid #bbb; padding: 5px;box-shadow: 0px 2px 3px #bbb; margin-top: 180px; text-align: center;">
<h1>ACADEMIC CALENDAR SESSION 2019-2020</h1>
<ol>
    <li class="box">
        <p class="event-date">August 31, 2019 </p>
        <p class="event-description">Islamic New Year (holiday subject to Government announcement).</p>
    </li>
    <li class="box">
        <p class="event-date">September 1,2019</p>
        <p class="event-description">Beginning of the 1st Term.</p>
    </li>
    <li class="box">
        <p class="event-date">November 9, 2019</p>
        <p class="event-description">Prophet Mohammad’s Birthday (holiday subject to Gov. announcement).</p>
    </li>
    <li class="box">
        <p class="event-date">November 18-19, 2019</p>
        <p class="event-description">National Day (Holiday subject to Gov. announcement). </p>
    </li>
    <li class="box">
        <p class="event-date">December 25,26 2019</p>
        <p class="event-description">Christmas Day nursery is closed) </p>
    </li>
    <li class="box">
        <p class="event-date">December 22,2019</p>
        <p class="event-description">End of 1st Term</p>
    </li>
    <li class="box">
        <p class="event-date">December 22-January 5 2020</p>
        <p class="event-description">Winter Break </p>
    </li>
    <li class="box">
        <p class="event-date">December 29- 2 January 2020</p>
        <p class="event-description">Result Day/Parent-Teacher Meeting</p>
    </li>
    <li class="box">
        <p class="event-date">January 5 , 2020</p>
        <p class="event-description">First Day of Second Semester</p>
    </li>
    <li class="box">
        <p class="event-date">March 22, 2019</p>
        <p class="event-description">Isra Al Miraj (holiday subject to Gov. announcement)</p>
    </li>
    <li class="box">
        <p class="event-date">March 29- April 12,2020</p>
        <p class="event-description">End of 2nd Semester , Spring Break.</p>
    </li>
    <li class="box">
        <p class="event-date">April 5-8,2020</p>
        <p class="event-description">PTM</p>
    </li>
    <li class="box">
        <p class="event-date">April 12,2020</p>
        <p class="event-description">Beginning of 3rd Term</p>
    </li>
    <li class="box">
        <p class="event-date">April 23, 2020</p>
        <p class="event-description">First Day of Ramadan (subject to announcement)</p>
    </li>
    <li class="box">
        <p class="event-date">May 24-25</p>
        <p class="event-description">Eid Al-fitr(holiday subject to Gov. announcement)</p>
    </li>
    <li class="box">
        <p class="event-date">June 21,2020</p>
        <p class="event-description">End of 3rd Term.</p>
    </li>
    <li class="box">
        <p class="event-date">June 28-30,2020</p>
        <p class="event-description">PTM</p>
    </li>
    <li class="box">
        <p class="event-date">July 1, 2020</p>
        <p class="event-description">Start of summer camp .</p>
    </li>

</ol>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 facilities isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate3d(379px, 245px, 0px) scale3d(1, 1, 1); opacity: 1;">
<div class="row">
<div class="col-md-4">
  <div id="calendar">
  <h1>September -2019</h1>
  <table>
    <tr><td class="lastmonth">30</td><td>1</td><td>2</td><td>3</td><td class="hastask">4</td><td>5</td><td>6</td></tr>
    <tr><td>7</td><td>8</td><td class="hastask">9</td><td>10</td><td>11</td><td class="hastask">12</td><td>13</td></tr>
    <tr><td>14</td><td class="hastask">15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td></tr>
    <tr><td class="hastask">21</td><td>22</td><td>23</td><td>24</td><td>25</td><td class="hastask">26</td><td>27</td></tr>
    <tr><td>28</td><td>29</td><td class="hastask">30</td><td>31</td><td class="nextmonth">1</td><td>2</td><td>3</td></tr>
  </table>
</div>
<div id="calendar">
  <h1>October-2019</h1>
<table>
    <tr><td class="lastmonth">30</td><td>1</td><td>2</td><td>3</td><td class="hastask">4</td><td>5</td><td>6</td></tr>
    <tr><td>7</td><td>8</td><td class="hastask">9</td><td>10</td><td>11</td><td class="hastask">12</td><td>13</td></tr>
    <tr><td>14</td><td class="hastask">15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td></tr>
    <tr><td class="hastask">21</td><td>22</td><td>23</td><td>24</td><td>25</td><td class="hastask">26</td><td>27</td></tr>
    <tr><td>28</td><td>29</td><td class="hastask">30</td><td>31</td><td class="nextmonth">1</td><td>2</td><td>3</td></tr>
  </table>
</div>
</div>
<div class="col-md-8">
  <table   class="table table-bordered" width="0">
<tbody>
<tr class="bg_blue">
<td >
<p><strong>Date</strong></p>
</td>
<td  >
<p><strong>Section</strong></p>
</td>
<td  >
<p><strong>Activity</strong></p>
</td>
<td >
<p><strong>Explanation/Instruction</strong></p>
</td>

</tr>
<tr>
<td >
<p>1 Sep</p>
</td>
<td  >
<p>All</p>
</td>
<td  >
<p>Start of the 1<sup>st</sup> term</p>
</td>
<td>
<p>Distribution of New Syllabus and Topic Plan for Penguin, Panda and Leopard Class</p>
<p>Children to create &ldquo;My First day at School&rdquo; cards</p>
</td>

</tr>
<tr>
  <td><p>5 sep</p></td>
<td>
<p>All</p>
</td>
<td  >
<p>Splash Day</p>
</td>
<td>
<p>Children to participate in fun and joyful swimming activities.</p>
</td>

</tr>
<tr>
<td >
<p>12 Sep</p>
</td>
<td  >
<p>All</p>
</td>
<td  >
<p>Colour Bag Mixing</p>
</td>
<td>
<p>Children to mix colours in Zipped plastic bags through various hand manipulations</p>
</td>
</tr>
<tr>
<td >
<p>19 Sep</p>
</td>
<td  >
<p>Penguin, Panda, Leopards</p>
</td>
<td  >
<p>Muffin Man Day!</p>
</td>
<td>
<p>Children to decorate readymade muffins with confectionary decoration items.</p>
</td>

</tr>
<tr>
<td >
<p>26 Sep</p>
</td>
<td  >
<p>All</p>
</td>
<td  >
<p>Movie &amp; Pop Corn</p>
</td>
<td>
<p>Children to enjoy favourite</p>
</td>

</tr>
<tr>
<td >
<p>5/12/19/26 Sep</p>
</td>
<td  >
<p>All</p>
</td>
<td  >
<p>Weekly Circle Time</p>
</td>
<td>
<p>Star of the week and additional special behaviour announcement.</p>
</td>

</tr>
<tr>
<td >
<p>6/13/20/27 Oct</p>
</td>
<td  >
<p>All</p>
</td>
<td  >
<p>Weekly Circe Time</p>
</td>
<td>
<p>Beginning of School Week Circle Time, Singing Songs, Dancing, Recycling Poems</p>
</td>

</tr>
<tr>


<td  >
<p>&nbsp;&nbsp;</p>
</td>
<td>
<p>&nbsp;</p>
</td>


</tr>
<tr>`
<td >
<p>3 Oct</p>
</td>
<td  >
<p>Panda, Leopard</p>
</td>
<td  >
<p>Play Traffic Cop</p>
</td>
<td>
<p>Children will have a blast taking turns playing the role of a traffic cope of the classic game Red Light, Green Light involved Ambulance and Firefighters roles explaining what happens to those particular vehicles in traffic light &ndash;children express their unlimited imagination during play/</p>
</td>


</tr>
<tr>
<td >
<p>17 Oct</p>
</td>
<td  >
<p>Panda,</p>
<p>Leopard</p>
</td>
<td  >
<p>Splash Day!</p>
<p>Paint&nbsp; with ice(alternative activity)</p>
</td>
<td>
<p>Children to discover a new cool way to paint a masterpiece with frozen cubes of paint.</p>
</td>


</tr>
</tbody>
</table>
</div>
</div>
<div class="row">
  <div class="col-md-4">
  <div id="calendar">
  <h1>November -2019</h1>
  <table>
    <tr><td class="lastmonth">30</td><td>1</td><td>2</td><td>3</td><td class="hastask">4</td><td>5</td><td>6</td></tr>
    <tr><td>7</td><td>8</td><td class="current">9</td><td>10</td><td>11</td><td class="hastask">12</td><td>13</td></tr>
    <tr><td>14</td><td class="hastask">15</td><td>16</td><td>17</td><td class="current">18</td><td class="current">19</td><td>20</td></tr>
    <tr><td class="hastask">21</td><td>22</td><td>23</td><td>24</td><td>25</td><td class="hastask">26</td><td>27</td></tr>
    <tr><td>28</td><td>29</td><td class="hastask">30</td><td>31</td><td class="nextmonth">1</td><td>2</td><td>3</td></tr>
  </table>
</div></div>
  <div class="col-md-8">
    <table  class="table table-bordered" width="0">
<tbody>
<tr class="bg_blue">
<td >
<p><strong>Date</strong></p>
</td>
<td >
<p><strong>Section</strong></p>
</td>
<td >
<p><strong>Activity</strong></p>
</td>
<td>
<p><strong>Explanation/Instruction</strong></p>
</td>
<td >
<p><strong>Ck</strong></p>
</td>
</tr>
<tr>
<td>
<p>24 Oct</p>
</td>
<td >
<p>Panda, Leopard</p>
</td>
<td >
<p>Fruit Salad Day!</p>
</td>
<td >
<p>Children to cut (plastic cutlery) and mix fruits into salad and enjoy afterwords.</p>
</td>

</tr>
<tr>
<td>
<p>30 Oct</p>
</td>
<td >
<p>Penguin, Panda, Leopards</p>
</td>
<td >
<p>&nbsp;&nbsp;Pumpkin Day!</p>
</td>
<td >
<p>Children to create different collages, pictures for upcoming Dress up Party.</p>
<p>&nbsp;</p>
</td>

</tr>
<tr>
<td>
<p>31 Oct</p>
</td>
<td >
<p>All</p>
</td>
<td >
<p><strong>Dress Up Party!</strong></p>
</td>
<td >
<p>Children to come dressed up in costumes and have fun during the small party.</p>
</td>

</tr>
<tr>
<td>
<p>3/10/17/24/31 Oct</p>
</td>
<td >
<p>Penguin, Panda, leopards</p>
</td>
<td >
<p>Weekly Circle time</p>
</td>
<td >
<p>Star of the week and additional special behaviour announcement.</p>
</td>

</tr>
<tr>
<td>
<p>3/10/17/24 Nov</p>
</td>
<td >
<p>All</p>
</td>
<td >
<p>Weekly Circle Time</p>
</td>
<td >
<p>Beginning of School Week Circle Time, Singing Songs, Dancing, Recycling Poems</p>
</td>

</tr>
<tr>
<td>
<p>7 Nov</p>
</td>
<td >
<p>All</p>
</td>
<td >
<p>Sun catcher Craft</p>
</td>
<td >
<p>Children to create colourful, eye-popping sun catchers from Card Sparkling Paper &nbsp;and Glitters.</p>
</td>

</tr>
<tr>
<td>
<p>14 Nov</p>
</td>
<td >
<p>All</p>
</td>
<td >
<p>National Day Art &amp; Craft!</p>
</td>
<td >
<p>Children to create cards and decorations for the upcoming celebration</p>
</td>

</tr>
<tr>
<td>
<p>17 Nov</p>
</td>
<td >
<p>All</p>
</td>
<td >
<p>National Day Party!</p>
</td>
<td >
<p>TBA as per government regulations,</p>
<p>Children to come dressed up in traditional clothes.</p>
</td>

</tr>
<tr>
<td>
<p>21 Nov</p>
</td>
<td >
<p>Penguin, Panda, Leopards</p>
</td>
<td >
<p><strong>Field Trip to Ghubrah Park &ldquo;Picnic Day</strong>&rdquo;</p>
<p>&nbsp;Autumn Wreath (alternative activity)</p>
</td>
<td >
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Children to make wreathes made from carton and decorated with premade dry tree leaves.</p>
</td>

</tr>
<tr>
<td>
<p>28 Nov</p>
</td>
<td >
<p>Panda, Leopards</p>
</td>
<td >
<p>Splash Day!</p>
<p>Spaghetti Sinner Art(alternative activity)</p>
</td>
<td >
<p>&nbsp;&nbsp;Children to create various art collages with manipulating spaghetti on the glued paper and colour them afterwards</p>
</td>

</tr>
<tr>
<td>
<p>9 Nov</p>
<p>18-19 Nov</p>
</td>
<td >
<p>All</p>
</td>
<td>
<p>The Prophet&rsquo;s Birthday National Day/Birthday of HM Sultan Qaboos</p>

</td>
<td > 
<p>TBA as per government</p>
</td>

</tr>
</tbody>
</table>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
  <div id="calendar">
  <h1>December -2019</h1>
  <table>
    <tr><td class="lastmonth">30</td><td>1</td><td>2</td><td>3</td><td class="hastask">4</td><td>5</td><td>6</td></tr>
    <tr><td>7</td><td>8</td><td class="hastask">9</td><td>10</td><td>11</td><td class="hastask">12</td><td>13</td></tr>
    <tr><td>14</td><td class="hastask">15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td></tr>
    <tr><td class="hastask">21</td><td>22</td><td>23</td><td>24</td><td class="current">25</td><td class="current">26</td><td>27</td></tr>
    <tr><td>28</td><td>29</td><td class="hastask">30</td><td>31</td><td class="nextmonth">1</td><td>2</td><td>3</td></tr>
  </table>
</div></div>
  <div class="col-md-8">
        <table  class="table table-bordered" width="0">
<tbody>
<tr>
<td>
<p>7/14/21/28 Nov</p>
</td>
<td >
<p>All</p>
</td>
<td >
<p>Weekly Circle Time</p>
</td>
<td >
<p>Star of the week and additional special behaviour announcement.</p>
</td>

</tr>
<tr>
<td>
<p>1/8/15 Dec</p>
</td>
<td >
<p>All</p>
</td>
<td >
<p>Weekly Circle Time</p>
</td>
<td >
<p>Beginning of School Week Circle Time, Singing Songs, Dancing, Recycling Poems</p>
</td>

</tr>
<tr>
<td>
<p>5 Dec</p>
</td>
<td >
<p>Panda, Leopards</p>
</td>
<td >
<p>Draw, Spray, Air Dry</p>
</td>
<td >
<p>Children to colour old T-shirts or piece of light colour cloth with markers and paint.</p>
</td>

</tr>
<tr>
<td>
<p>12 Dec</p>
</td>
<td >
<p>Penguin, Panda, Leopards</p>
</td>
<td >
<p>Dancing Starch Worms</p>
</td>
<td >
<p>Children to mix starch, water and food colours; place it on thin metal baking tray &lsquo;put tray on speaker, teacher to put music and observe the Starch mixture moving with rhythm of music.</p>
</td>

</tr>
<tr>
<td>
<p>19 Dec</p>
</td>
<td >
<p>All</p>
</td>
<td >
<p>Snowflakes Wreath</p>
</td>
<td >
<p>Children to create wreathes made of snowflakes and decorated with glitters.</p>
</td>

</tr>
<tr>
<td>
<p>23 Dec</p>
</td>
<td >
<p>All</p>
</td>
<td >
<p>White Snowflake/&rdquo;&nbsp;&nbsp; Frozen&rdquo; Dress up Party!</p>
</td>
<td >
<p>Children to perform Role play from favourite story&rdquo; Frozen&rdquo;</p>
</td>

</tr>
<tr>

<td>
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td>
<p>22 Dec-5 Jan</p>
</td>
<td >
<p>All</p>
</td>
<td >
<p>Academic Break</p>
</td>
<td >
<p>No Academic Lessons only Day Care programs for Dolphin and Penguin Classes: Free play, Group play, Outdoor Physical Activities</p>
</td>

</tr>
<tr>
<td>
<p>29 Dec-2 Jan</p>
</td>
<td >
<p>Penguin, Panda, Leopards</p>
</td>
<td >
<p>PTM</p>
</td>
<td >
<p>Invite Parents for Conference, Teacher to prepare necessary information.</p>
</td>

</tr>
</tbody>
</table>
    </div>
                                                   </div>
                                     
                                                         </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 facilities1 isotope-hidden isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate3d(379px, 245px, 0px) scale3d(1, 1, 1); opacity: 1;">

  <div class="col-md-6">
    <div class="box_imgs">
      <img src="{{asset('web/muscat/img/banner.jpg')}}">
    </div>
    <br>
     <div class="box_imgs">
      <img src="{{asset('web/muscat/img/banner2.jpg')}}">
    </div>
  </div>
  <div class="col-md-6">
    <div class="box_imgs">
      <img src="{{asset('web/muscat/img/banner1.jpg')}}" height="100%" style="max-height: 810px;">
        <br>
    </div>
      <br>
</div>
</div>
</div>
</div>
</div>


  </div>
<div style="clear:both;">
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

                                                   <tbody class="bg_blue">
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
  <script src="{{asset('web/muscat/js/main.js')}}"></script>
  <!-- Isotope -->    
  <script src="{{asset('web/muscat/js/jquery.isotope.js')}}"></script>
  <!--Mail Chimp validator -->

  <script src="{{asset('web/muscat/js/mc-validate.js')}}"></script>
  <!--Other Plugins -->

  <script src="{{asset('web/muscat/js/plugins.js')}}"></script>
  <!-- Contact -->

  <script src="{{asset('web/muscat/js/contact.js')}}"></script>
  <!-- Prefix free CSS -->

  <script src="{{asset('web/muscat/js/prefixfree.js')}}"></script>        
  <!-- GreenSock -->

  <script src="{{asset('web/muscat/layerslider/js/greensock.js')}}" ></script>
  <!-- LayerSlider script files -->

  <script src="{{asset('web/muscat/layerslider/js/layerslider.transitions.js')}}" ></script>

  <script src="{{asset('web/muscat/layerslider/js/layerslider.kreaturamedia.jquery.js')}}" ></script>
  <!-- Swicther -->

  <script src="{{asset('web/muscat/switcher/js/dmss.js')}}"></script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });
 </script>