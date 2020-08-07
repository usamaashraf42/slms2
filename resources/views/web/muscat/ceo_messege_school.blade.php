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
.team-item img, .elements h5, #layerslider, .btn:hover, .btn:focus, .blog.jumbotron, .comment, .header-text, .open>.dropdown-toggle.btn-default:focus, .open>.dropdown-toggle.btn-default:hover {
    border-color: #00047d;
}
#layerslider {
    padding-top: 68px;
    border-bottom: 0px dashed;
    width: 100% !important;
    height: 598px!important;
    margin-bottom: 15px;
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
.social_1{
      width: 40px;
    height: 40px;
    display: inline-block;
}
.social_1 img{ width: 100%;
 border-radius: 50px;

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
.navbar-custom ul.nav li a {
    font-size: 17px!important;
    text-align: center;
    transition: background .2s ease-in-out;
    font-family: 'Lato',sans-serif;
    color: #fff;
    letter-spacing: 0.2px;
    font-weight: 600;
    background: transparent;
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
                                <a href="mailto:kg@americanlyceum.com" style="color: #fff;"><i class="fa fa-envelope" style="padding-right: 5px;"></i>kg @ americanlyceum.com</a>
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
         <div class="ls-inner" style="background-color: transparent; width: 100%;height: 100%;">
          <div class="ls-lt-container ls-overflow-hidden" style="width: 100%;height: 600px; display: block;">
             <div class="ls-curtiles" style="overflow: hidden;"><img src="{{asset('web/muscat/img/images_ceo.jpg')}}" width="100%" height="700px"></div>
             <div class="ls-nexttiles">
                <div class="ls-lt-tile" style="width: 100%;height: 100%; overflow: visible;">
                   <div class="ls-nexttile" style="top: 0px; left: 0px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"></div></div></div></div>
         
              
                  <div class="ls-slide ls-slide-4 ls-animating" data-ls="transition2d:104;timeshift:-2000;" style="width: 100%;height: 100%; visibility: visible; display: none; left: auto; right: 0px; top: 0px; bottom: auto;">
                     <img class="ls-bg ls-preloaded" alt="Slide background" style="padding: 0px; border-width: 0px; width: 1903px; height: 600px; margin-left: 0px; margin-top: -166px; visibility: visible; opacity: 0.484476;">
           
                     <!-- Text -->

                     <div class="ls-l header-text" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin:easeOutElastic;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;parallaxlevel:2;" style="margin-left: 0px; margin-top: 0px; width: auto; height: auto; font-size: 14px; padding: 30px; border-width: 0px; left: 311.5px; top: 0px; filter: none; background-color: rgb(245, 245, 245,0.5);">
                        <h1>Welcome to American Lyceum</h1>
                        <p class="subtitle hidden-xs"> American Lyceum International   School  </p>
                        <!-- Button -->

                        <div class="page-scroll hidden-xs">
                         <!--   <a class="btn" href="#contact">Contact us</a> -->
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
<div class="col-md-12" style="margin-bottom: 40px;">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <h2 style="margin: 0 auto; padding: 20px;">

Message from CEO
</h2>
  </div>
</div>


    <div class="row"> 
    <div class=" col-md-5">
      <div class="" style="border: 5px solid #d6d6d6;
    box-shadow: 0px 4px 4px #6b6767;">
        <img width="100%" height="400" src="{{asset('web/muscat/img/Capture_2.jpg')}}" class="vc_single_image-img attachment-full" >
      </div>
    </div>


    <div class="col-md-6">
      <p style="text-align: justify;    text-align: justify;
    font-size: 18px;
    font-style: italic;
    font-family: sans-serif;">
       Since our founding in 1984 ALIS has continually evolved for the better  But our founders’ emphasis on challenging the status quo, commitment to middle class, inspiring teachers and highly individualized instruction are values we hold dear today

This is an exciting time for American Lyceum International School. In December 2018, American Lyceum International School got the International Award of the Best School in Dubai, UAE. In 2018 we also got the ISO certification and got our SOPs standardized against international Standards.

We’ve graduated generations of alumni empowered to forge their own path. And our students learn to respect and consider the viewpoints of others as they work through complex problems. That desire for different thoughts and opinions has steadily grown the diversity of our campus over the decades, giving our students the ability to form meaningful relationships across stereotypical, socio-economic and global divides.
</p>
     
    </div>
</div>
  <div class="wpb_text_column wpb_content_element ">
    <div class="wpb_wrapper">
    <br>
  <p style="    text-align: justify;
    font-size: 18px;
      font-style: italic;
    font-family: sans-serif;"> 
While we are proud of the history that we’ve built together, we challenge ourselves to be better tomorrow than we are today, and are constantly looking for ways to further serve our students and community. Lyceum will continue to adjust to fully prepare our graduates for college and for life in a global environment, but our consistent core values will continue to guide us into the future just as they have for the past 90 years.

Our school has an incredible history. It’s long been a place that helps students find their passion in an environment of not only of tolerance and empathy but of true commitment</p>

    </div>
  </div>
<div class="vc_wp_text wpb_content_element"><div class="widget widget_text"><br><h4 class="widget__title"  style="margin: 0 0 36px 0;
    font-size: 22px;
    font-weight: 300;
    color: #584036;">Tahir Nadeem. Kadri
    <br>  
-----------CEO---------
  </h4>   

    </div></div></div></div></div></div>
      </div>
</article>
      </main><!-- /main -->
    </div>
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