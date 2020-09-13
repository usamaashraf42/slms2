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


/* Style the button that is used to open and close the collapsible content */
.collapsible1,
.collapsible2,
.collapsible3 ,
.collapsible4,
.collapsible5,
.collapsible6,
.collapsible7{

    color: #fff;
    position: relative;
    width: 100%;
    margin: 0 auto;
    z-index: 3;
    font-size: 13px;
    line-height: 22px;
    text-transform: uppercase;
    padding: 16px 60px 16px 40px;
    border-radius: 0px 50px 50px 0px;
    margin: 0;
    background: #353794;
    cursor: pointer;
    transition: all .2s linear;
}

/* Effects on hover and when it's open */
.active1,
.text1,
.collapsible1:hover {
background-color: #800205;

}

.active2,
.text2,
.collapsible2:hover {
background-color: #800205;
}
.active5,
.text5,
.collapsible5:hover {
  background-color: #800205;
}
.active5,
.text5,
.collapsible5:hover {
  background-color: #800205;
}.active6,
.text6,
.collapsible6:hover {
 background-color: #800205;
}
.active7,
.text7,
.collapsible7:hover {
 background-color: #800205;
}
.active4,
.text4,
.collapsible4:hover {
 background-color: #800205;+
}

/* Style the collapsible content. Note: hidden by default */
.content {
  padding: 0 18px;
  color: black;
  max-height: 0;

  font-size:18px;
  margin: auto;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  
  background-size: 100%;
  margin-bottom: 10px;
  border-radius: 0px 0px 10px 10px;
}

/* Move around the gradient image to change area */
.c1 {
  background-position-y: 100%;
}

.c2 {
  background-position-y: 80%;
}

.c3 {
  background-position-y: 60%;
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
                                <a  style="padding-right: 40px;color: #fff">
                                  <i class="fa fa-phone" style="padding-right: 5px;"></i>+968-90856281</a>
                                <a href="mailto:kg@americanlyceum.com" style="color: #fff;"><i class="fa fa-envelope" style="padding-right: 5px;"></i>info@americanlyceum.com</a>
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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
               <i class="fa fa-bars"></i>
            </button>
            <div class="navbar-brand-centered page-scroll">
               <a href="#page-top"><img src="{{asset('web/muscat/img/logoinvoice01.png')}}"  alt=""></a>
            </div>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="navbar-brand-centered" style="background-color: #353794!important;">
            <div class="container">
               <ul class="nav navbar-nav page-scroll navbar-left">
                  <li><a href="{{route('muscat.school')}}">Home</a></li>
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
                   <li><a href="{{route('muscat.curriculum_school')}}" style="background-color: #4a47ab;">Curriculum</a></li>
                    <li><a href="{{route('muscat.academys')}}" style="background-color: #4a47ab;">Activity</a></li>
                    <li><a href="{{route('muscat.academys')}}" style="background-color: #4a47ab;">Academic</a></li>
                    </ul>
                    </li>
               </ul>
             <ul class="nav navbar-nav page-scroll navbar-right">
             <li><a href="{{route('muscat.news_school')}}">News</a></li>      
             <li><a href="{{route('muscat.event_school')}}">Events</a></li>     
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
             <div class="ls-curtiles" style="overflow: hidden;"><img src="{{asset('web/muscat/img/curiculam.jpg')}}" width="100%" height="140%"></div>
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
                        <p class="subtitle hidden-xs"> American Lyceum International School   </p>
                        <!-- Button -->

                        <div class="page-scroll hidden-xs">
                        <!--    <a class="btn" href="#contact">Contact us</a> -->
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
                 <div class="row">
                 <div class="col-md-2"></div>
<div class="col-md-8">
    <div class="title-holder" style="text-align: center;"><h1>EYFS Curriculum</h1></div>
    <div class="secondLvlCss"><p class="introParagraph">The Early Years Foundation stage is the curriculum followed in Kindergarten and Reception. There are seven areas of learning which are each divided into sub categories. Each area of learning and development is implemented through a mix of adult-led and child-initiated activities. &nbsp;</p><div class="scrollToMenu">In This <strong>Section</strong></div><blockquote style="display:inline"><p style="display:inline">"Children in the EYFS develop strong foundations for learning through a varied and vibrant curriculum."</p></blockquote>
<br><br><br><br>
          <button class="collapsible1">Prime Area - Communication and language <i class="fa fa-angle-down" style="font-size:24px; float: right;"></i></button>
<div class="content c1">
<p>Listening and attention: children listen attentively in a range of situations. They listen to stories, anticipating key events and responding to what they hear with relevant comments, questions or actions. They give their attention to what others say and respond appropriately, while engaged in another activity. The children are encouraged to develop their listening skills by being part of bigger audiences. They attend whole-school assemblies and school events led by unfamiliar adults.</p><p>Understanding: children follow instructions involving several ideas or actions. They answer ‘how’ and ‘why’ questions about their experiences and in response to stories or events. The children engage in activities that help them to predict what might happen.</p><p>Speaking: children bring in Show and Tell in order that they not only gain confidence in speaking, but also in listening to others. They express themselves effectively, showing awareness of the listener’s needs. They use past, present and future forms accurately when talking about events that have happened or are to happen in the future. They develop their own narratives and explanations by connecting ideas or events. There is a big focus on the importance of establishing home-school-community links and the environment enables the children to verbally share a wealth of experiences.</p><h6>Languages</h6><p>In EYFS we promote enjoyment, pride and a sense of achievement, in order to foster an interest in learning another language; namely French. The children are encouraged to appreciate stories, songs, poems and rhymes in French and to join in games and activities which are highly enjoyable, motivating and inclusive. As a result, they repeat simple words and start copying the correct pronunciation without being afraid of making mistakes. They listen attentively to spoken language and show understanding by joining in and responding, which helps them develop their speaking and listening skills. We embrace cultural awareness at every opportunity which allows the children to develop their understanding of French customs and traditions.</p>
</div>

<button class="collapsible2">Prime Area - Physical development <i class="fa fa-angle-down" style="font-size:24px; float: right;"></i></button>
<div class="content c2">
  <p>Moving and handling: children show good control and co-ordination in large and small movements. The use of the outdoor classroom and interactive whiteboards provides opportunities for them to explore gross motor movements which support them in consolidating the clockwise and anti-clockwise movements they need for writing. ‘Funky finger’ and ‘Twiddle-box’ activities allow children to gain a range of experiences that support their fine motor skills; in particular strengthening the muscles in the thumb and first two fingers. They move confidently in a range of ways, safely negotiating space, and use all areas of the school for exploring, such as the play equipment, garden, wildlife garden and playgrounds. The children are introduced to pencil grip on an individual basis as and when they are physically able to take the next step in progressing from mark-making to the early stages of handwriting.</p><p>Health and self-care: children know the importance of physical exercise and a healthy diet for good health. All meals are planned and prepared with the children in mind. The children are taught to have good table manners and these expectations are introduced from Kindergarten. We talk about ways to keep healthy and safe. Children manage their own basic hygiene and personal needs successfully, including dressing.</p><h6>Physical education</h6><p>Physical education inspires all of our pupils to succeed, excel and enjoy competitive sport and other physically demanding activities. We aim to instil and encourage a love of physical education in the hope that the children will benefit from a healthy, active life-style and continue with physical exercise into their later years. Within the curriculum there are three complementary strands to our teaching: PE lessons, Swimming and Games. Young children join us having individually developed the physical skills of running, jumping, kicking and throwing; our focus is to refine these skills and to build accuracy and strength. Skills are taught at a fundamental level in a wide variety of sports. Focusing on the children’s natural tendency to be active, we aim to encourage confidence in their own ability, so building their self-esteem. Children participate in fun and challenging differentiated activities building co-operation, refined motor and co-ordination skills.</p>
</div>

<button class="collapsible3">Prime Area - Personal, social and emotional development <i class="fa fa-angle-down" style="font-size:24px; float: right;"></i></button>
<div class="content c3">
  <p>There is a&nbsp;significant focus on the personal, social and emotional development of our youngest children and this forms an integral part of the learning in the Kindergarten and Reception classes; not just in the classroom but throughout the day, whatever the activity or environment. From the ‘Hello’ song at the start of the day, through activities and playtimes, to carrying their own book bags at home-time; the children are learning important skills that they will continue to develop through to adulthood. They learn to take risks and challenge themselves and each other, to make mistakes, to negotiate, to respect and care for others and the world around them, and all within a safe and nurturing environment.</p><p>Self-confidence and self-awareness: children are confident to try new activities, and say why they like some activities more than others. They are confident to speak in a familiar group, will talk about their ideas, and will choose the resources they need for their chosen activities. Opportunities are provided for the children to talk and perform in front of others on a daily basis, from Show and Tell, to singing songs and telling stories. Wider opportunities ensure they feel confident to perform to an unfamiliar audience, such as the Nativity and events such as Sports Day.</p><p>Children enjoy the support of a range of specialist staff, as well as EYFS professionals. Great emphasis is placed on promoting strong, positive relationships between the children and all of the adults that they meet, to help develop their confidence.</p><p>Managing feelings and behaviour: children talk about how they and others show feelings, talk about their own and others’ behaviour, and its consequences, and know that some behaviour is unacceptable. They work as part of a group or as a class, and understand and follow the class Golden Rules. They adjust their behaviour to different situations, and have different opportunities to try new activities, such as watching a production from a theatre company, thus ensuring that the children take changes of routine in their stride. There are high expectations of behaviour for all children, and it is particularly important that all EYFS staff model clear expectations, helping them to establish boundaries within their immediate environment.</p><p>Making relationships: children play co-operatively, taking turns with others. They take account of one another’s ideas about how to organise their activity. They show sensitivity to others’ needs and feelings, and form positive relationships with adults and children. ‘Learning through play’ is an essential process in introducing and developing children’s social skills. They enjoy extended periods of child-led activities to give them the opportunity to demonstrate and develop these skills; simultaneously engaging in developing their independence through problem-solving activities with their peers. The class rules that are established help the children to adhere to whole-school rules, which in turn promotes the development of positive relationships with a wider range of adults and peers.</p>
</div>
  <button class="collapsible4">Specific Area - Literacy <i class="fa fa-angle-down" style="font-size:24px; float: right;"></i></button>
<div class="content c2">
 <p>Children experience an adult led ‘Letters and Sounds’ session each day, progressing through the phases during their time in EYFS. They share stories regularly and learn to discuss what has been, predict what may happen and describe settings, events and characters. The children are encouraged to explore a wide range of fiction and non-fiction picture books. In Reception they learn to read and understand simple sentences. They are taught to use their phonic knowledge to decode regular words and accurately read them aloud. The children read daily, either individually or as part of a group reading activity.&nbsp;They explore mark making using a variety of resources and begin to build strength in their fingers ready to develop a pencil grip in preparation for writing. They are introduced to the cursive letter formation alongside phonics sessions and are encouraged to ‘have a go’ at writing less familiar words, applying their phonic knowledge; making essential links between their reading and writing skills.</p>
</div>

<button class="collapsible5">Specific Area - Mathematics <i class="fa fa-angle-down" style="font-size:24px; float: right;"></i></button>
<div class="content c3">
 <p>Children count reliably with numbers from 1 to 20, place them in order and say which number is one more or one less than a given number. Using quantities and objects, they add and subtract two single-digit numbers and count on or back to find the answer. They solve problems, including doubling, halving and sharing. In Reception they are introduced to whole-school strategies for performing simple calculations. Individual progress is valued and children are exposed to numbers beyond 20, joining in with number games linked to the 100 square; giving exposure to a higher range of two digit numbers. Children use everyday language to talk about size, weight, capacity, position, distance, time and money to compare quantities and objects, and to solve problems. They recognize, create and describe patterns. They explore characteristics of everyday objects and shapes and use mathematical language to describe them.&nbsp;</p>
</div>
<button class="collapsible6">Specific Area - Expressive arts and design <i class="fa fa-angle-down" style="font-size:24px; float: right;"></i></button>
<div class="content c3">
 <p>Children talk about past and present events in their own lives and in the lives of family members. They know that other children don’t always enjoy the same things, and are sensitive to this. They know about similarities and differences between themselves and others, and among families, communities and traditions. They also understand similarities and differences in relation to places, objects, materials and living things. They talk about the features of their own immediate environment and how environments might vary from one another. They make observations of animals and plants and explain why some things occur, and talk about changes.</p><h6>Outdoor Learning</h6><p>Outdoor Learning is an integral part of teaching and learning throughout EYFS. There is a huge focus in providing rich outdoor learning environments to better enable children to demonstrate and develop their skills across each of the 7 areas of learning. When children enter Kindergarten a primary focus is on developing listening skills, and natural sounds in the outdoor environment are used to support the initial phase of Letters and Sounds. EYFS maximise using natural resources in all areas of the school grounds, in all weathers. Additionally, there is an outdoor classroom in the courtyard and children in KG and Reception are encouraged to engage in free-flow learning play; independently accessing a range of resources. This provides them with rich opportunities to make links in their learning; consolidating what is learnt during adult-led sessions as well as extending exploration through child-led activities. As part of transition to Year 1, daily outdoor experiences become more focused on small group problem-solving activities, which help to nurture the characteristics of effective learning.</p><h6>Computing</h6><p>When your child joins us in Early Years, Computing and the use of technology becomes an integral part of their education. Embracing the potential of Information Technology is recognised throughout the Early Years curriculum. Skills, knowledge and attitudes already learnt from home are built upon, and children are given every opportunity to use technology in order to develop their education across all areas of learning. Children are given experience using a variety of devices and learn to complete a simple computer program, perform simple functions using a mouse and keyboard, log on to the school’s network and use appropriate internet based games and activities to support their learning. Using technology such as cameras, iPads and programmable devices becomes second nature to them as their love of Computing is nourished and developed.</p>
</div>

<button class="collapsible7">Open me I'm the coolest! <i class="fa fa-angle-down" style="font-size:24px; float: right;"></i></button>
<div class="content c3">
 <p>Exploring and using media and materials: children <a href="/school-life/performing-arts">sing songs, make music and dance</a>, and experiment with ways of changing them. They safely use and explore a variety of materials, tools and techniques, experimenting with colour, design, texture, form and function.</p>
 <h6>Music</h6><p>Music is embedded in the curriculum throughout Kindergarten and Reception at St Margaret's.&nbsp; In addition to weekly specialist music teaching, which provides opportunities to explore a wide range of percussion instruments in our Music Room, the children have access to instruments in their classrooms for free play.&nbsp; Poems and stories may be accompanied by children's choices of instruments or movements.&nbsp; Singing is taught through a wide range of action songs, promoting a steady pulse, in addition to forming an important part of daily routines in the classroom.&nbsp; The children prepare songs and actions for their Christmas production, in which Reception lead the ensemble.&nbsp; Pupils learn the rudiments of pattern and structure in response to simple scores on the interactive whiteboard and other visual cues; they can also control changes of dynamics and tempo by the end of the Reception year.&nbsp;</p><p>Children represent their own ideas, thoughts and feelings through design and technology, art, music, dance, role-play and stories. They are equipped with a range of mark-making and writing resources to encourage them to develop a passion for writing.</p><p>In addition to teaching the 7 areas of learning, we look very closely at the characteristics of effective learning which are the ways in which a child engages with other people and their environment and underpins learning and development, supporting the child to remain an effective, motivated and independent learner. They are encouraged in both adult-led and child-initiated play and include: Playing and Exploring – children investigate and experience things, and ‘have a go’; Active Learning – children concentrate and keep on trying if they encounter difficulties, and enjoy achievements; Creating and Thinking Critically – children have and develop their own ideas, make links between ideas, and develop strategies for doing things. These are all celebrated regularly, and children themselves begin to recognise how they like to learn.</p>
</div>

  </div>
<div style="clear:both;">
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
    var coll1 = document.getElementsByClassName("collapsible1");
var i;

for (i = 0; i < coll1.length; i++) {
  coll1[i].addEventListener("click", function() {
    this.classList.toggle("active1");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

var coll2 = document.getElementsByClassName("collapsible2");
var i;

for (i = 0; i < coll2.length; i++) {
  coll2[i].addEventListener("click", function() {
    this.classList.toggle("active2");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

var coll2 = document.getElementsByClassName("collapsible4");
var i;

for (i = 0; i < coll2.length; i++) {
  coll2[i].addEventListener("click", function() {
    this.classList.toggle("active4");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

var coll2 = document.getElementsByClassName("collapsible5");
var i;

for (i = 0; i < coll2.length; i++) {
  coll2[i].addEventListener("click", function() {
    this.classList.toggle("active5");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
var coll3 = document.getElementsByClassName("collapsible3");
var i;

for (i = 0; i < coll3.length; i++) {
  coll3[i].addEventListener("click", function() {
    this.classList.toggle("active3");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
var coll2 = document.getElementsByClassName("collapsible6");
var i;

for (i = 0; i < coll2.length; i++) {
  coll2[i].addEventListener("click", function() {
    this.classList.toggle("active6");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

var coll2 = document.getElementsByClassName("collapsible7");
var i;

for (i = 0; i < coll2.length; i++) {
  coll2[i].addEventListener("click", function() {
    this.classList.toggle("active7");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
 </script>