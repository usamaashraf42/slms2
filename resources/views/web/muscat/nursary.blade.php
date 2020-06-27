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

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
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
      background-color: #fff;
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
    .images_boxs {
      margin: 10px;
      border: 3px solid #eaebff;
    }
    .media-body p {
      min-height: 187px;
      /* border: 1px solid; */
      padding: 10px;
    }
    .images_boxs img{
     width: 100%;
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


.header-top span {padding: 4px 0; display: inline-block}
.header-top-right > .content {
  display: inline-block;
  font-family: "montserratregular";
  margin-left: 13px;
  padding-left: 17px;
  position: relative;
}
.header-top-right > .content > a {color: #353794;}
.header-top-right .content:hover > a {color: #2d3e50;}
.header-top-right > .content i {font-size: 14px; margin-right: 8px;}
.header-top-right {float: right; padding-top: 9px}
.header-top-right > .content:after {
  background: #ffffff none repeat scroll 0 0;
  content: "";
  height: 10px;
  left: 0;
  position: absolute;
  top: 6px;
  width: 2px;
}
.header-top-right > .content:first-child:after {display: none;}
.header-top-right > .content .account-dropdown {
  background-color: #ffffff;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  margin: 0;
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: alpha(opacity=0);
  padding: 5px 19px 6px;
  position: absolute;
  right: 0;
  text-align: left;
  top: 100%;
  -webkit-transform: scaleY(0);
  transform: scaleY(0);
  -webkit-transform-origin: 0 0 0;
  transform-origin: 0 0 0;
  -webkit-transition: all 0.6s ease 0s;
  transition: all 0.6s ease 0s;
  width: 125px;
  z-index: -99;
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
.naverer a {
  padding-right: 10px;
  font-size: 18px;
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
            <i class="fa fa-phone" style="padding-right: 5px;"></i> +968-97001942</a>
            <a href="#" style="color: #fff;"><i class="fa fa-envelope"style="padding-right: 5px;"></i>muscat@americanlyceum.com</a>
          </div>
        </div>
        <div class="col-xl-6 col-md-6 col-lg-6" style="text-align: center;color: #fff">
          <div class="header-top-menu">
            <nav class="naver naverer">
              <ul>

                <li><a href="blog.html"> 
                 <a href="https://twitter.com/NurseryMuscat" title=""><i class="fa fa-twitter"></i></a>
               </li>
               <li>
                 <a href="https://www.facebook.com/AmericanLyceum" title=""><i class="fa fa-facebook"></i></a>
               </li>
               <li>
                 <a href="https://www.instagram.com/american_lyceum_nursery_oman/" title=""><i class="fa fa-instagram"></i></a>
               </li>
               <li style="padding-left: 35px; font-size: 18px;"><a href="{{route('muscat.contact')}}" style="color: #fff;">Contact Us  </a></li>
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
 <div class="collapse navbar-collapse" id="navbar-brand-centered" style="background-color: #353794!important;">
  <div class="container">
   <ul class="nav navbar-nav page-scroll navbar-left">
     <li><a href="#page-top">Home</a></li>
     <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
       <ul class="dropdown-menu">
         <li><a href="#team_new" style="background-color: #4a47ab;">Our Team</a></li>
         <!--                    <li><a href="{{route('muscat.ceo_messege')}}" style="background-color: #4a47ab;">Message from CEO</a></li> -->
         <li><a href="#team" style="background-color: #4a47ab;">Why American Lyceum</a></li>
       </ul>
     </li>
     <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admission  <b class="caret"></b></a>
       <ul class="dropdown-menu">
        <li><a  style="background-color: #4a47ab;"data-toggle="modal" data-target="#myModal">Apply</a></li>
        <li><a href="#admission" style="background-color: #4a47ab;">Policy </a></li>
        <li><a href="#prices"  style="background-color: #4a47ab;">Fee Structure</a></li>
        <li><a  href="{{route('muscat.faq')}}"  style="background-color: #4a47ab;">FAQ</a></li>
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
 <li><a href="{{route('muscat.news_nursery')}}">News</a></li>      
 <li><a href="{{route('muscat.event_nursery')}}">Events</a></li>          
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
   <div class="ls-curtiles" style="overflow: hidden;"><img src="{{asset('web/muscat/img/slide4.jpeg')}}" width="100%" height="100%"></div>
   <div class="ls-nexttiles">
    <div class="ls-lt-tile" style="width: 100%; height: 700px; overflow: visible;">
     <div class="ls-nexttile" style="top: 0px; left: 0px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"></div></div></div></div>
     
     
     <div class="ls-slide ls-slide-4 ls-animating" data-ls="transition2d:104;timeshift:-2000;" style="width: 100%; height: 700px; visibility: visible; display: none; left: auto; right: 0px; top: 0px; bottom: auto;">
       <img class="ls-bg ls-preloaded" alt="Slide background" style="padding: 0px; border-width: 0px; width: 100%; height: 1032px; margin-left: 0px; margin-top: -166px; visibility: visible; opacity: 0.484476;">
       <div class="ls-gpuhack" style="width: auto; height: auto; padding: 0px; border-width: 0px; left: 311.5px; top: 0px;"></div>
       <img src="{{asset('web/muscat/img/bee.png')}}" class="ls-l img-responsive hidden-xs hidden-sm parallax1 ls-preloaded" alt="" data-ls="delayin:1500;easingin:fadeIn;parallaxlevel:7;" style="margin-left: 0px; margin-top: 0px; width: 180px; height: 169px; padding: 0px; border-width: 0px; left: 311.5px; top: 0px; transform-origin: 50% 50% 0px; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 63.7959, 0, 0, 1); opacity: 0.202551; visibility: visible; filter: none;">
       <!-- Text -->

       <div class="ls-l header-text" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin:easeOutElastic;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;parallaxlevel:2;" style="margin-left: 0px; margin-top: 0px; width: auto; height: auto; font-size: 14px; padding: 30px; border-width: 0px; left: 311.5px; top: 0px; filter: none; background-color: rgb(245, 245, 245,0.5);">
        <h1>Welcome to American Lyceum</h1>
        <p class="subtitle hidden-xs"> American Lyceum International Nursery   </p>
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
  <div class="hidden-xs container-fluid cloud-divider">
    <svg id="deco-clouds1" class="head" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none" style="margin-top: 0px!important;">
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
<section id="services" class="color-section">
 <div class="container">
  <div class="col-lg-8 col-lg-offset-2">
   <div class="section-heading">
    <h2>Our Services</h2>
  </div>
</div>
<div class="row">
 <div class="col-md-12 col-lg-7 text-center">
  <h3 class="text-center">American Lyceum International Nursery</h3>
  <p>American Lyceum International Nursery will provide a stimulating and safe environment for children ages 0.6 months to 3 years. Run by a former elementary school teacher (Ms.Mildret), ALIN will be the fun, affordable alternative daycare with the best quality you can find in town. We seek to stimulate and develop children's problem-solving and reactive thinking skills through staff and child directed activities in our daily actions.
  </p>
</div>
<div class="col-md-12 col-lg-5">
  <img src="{{asset('web/muscat/img/services.png')}}" alt="" class="img-responsive center-block">
</div>
</div>
<div class="row">
 <div class="col-md-4 col-sm-12">
  <div class="service float">
    <img src="{{asset('web/muscat/img/service1.jpg')}}" alt="" class="img-circle center-block img-responsive" height="100%;" width="100%">
    <h4>Infants</h4>
    <p>It doesn’t take long to develop the confidence and calm of an experienced parent. Your baby will give you the most important information—how she likes to be treated, talked to, held, and comforted. This section address the most common questions and concerns that arise during the first months of life.</p>
  </div>
</div>
<div class="col-md-4 col-sm-12 res-margin">
  <div class="service float">
   <img src="{{asset('web/muscat/img/service2.jpg')}}" alt="" class="img-circle center-block  img-responsive" height="100%" width="100%">
   <h4>Toddlers</h4>
   <p>Your child is advancing from infancy toward and into the preschool years. During this time, his physical growth and motor development will slow, but you can expect to see some tremendous intellectual, social, and emotional changes.</p>
 </div>
</div>
<div class="col-md-4 col-sm-12">
  <div class="service float">
   <img src="{{asset('web/muscat/img/service3.jpg')}}" alt="" class="img-circle center-block img-responsive" height="100%" width="100%">
   <h4>Pre School</h4>
   <p>Your child is advancing from infancy toward and into the preschool years. During this time, his physical growth and motor development will slow, but you can expect to see some tremendous intellectual, social, and emotional changes.</p>
 </div>
</div>
</div>
</div>
</section>
<section id="callout" class="small-section">
 <div class="hidden-xs">
  <div class="cloud x1"></div>
  <div class="cloud x2"></div>
  <div class="cloud x3"></div>
  <div class="cloud x4"></div>
  <div class="cloud x5"></div>
  <div class="cloud x6"></div>
  <div class="cloud x7"></div>
</div>
<div class="container">
  <div class="sun hidden-sm hidden-xs">
   <div class="sun-face">
    <div class="sun-hlight"></div>
    <div class="sun-leye"></div>
    <div class="sun-reye"></div>
    <div class="sun-lred"></div>
    <div class="sun-rred"></div>
    <div class="sun-smile"></div>
  </div>

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
  <h3>Visit our Nursery</h3>
  <p>We cultivate and honor children's innate love of learning as they prepare for a life of purpose, integrity, and academic accomplishment. American Lyceum International Nursery students gain the skills and confidence to meet the challenges of self, family, community, and the world at large. We believe that the child and their needs are the central and commanding focus of the learning process.</p>
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
          <img src="{{asset('web/muscat/img/gallery2.jpg')}}" style="width:100%; ">
        </div>
      </div>
      <div class="col-md-6 col-lg-5">
        <div class="about_us_text">
          <h2>About us</h2>
          <p>American Lyceum International Nursery offers students a distinctive learning community through an established tradition of educational innovation.
            We forge meaningful relationships and embrace global mindedness. We learn from one another and honor and celebrate our differences and our likenesses.
          Unity between school, family and community.</p>

          <div id="owl-abot" class="owl-">
            <h4>Vision</h4>
            <p>“By Cultivating the crop of Enlightened leaders become the name of trust pride and performance”</p>
            <h4 style="margin-top: -15px;">Mission</h4>
            <p>“To Enable Primary and Secondary Greatness in People”

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="about" style="background-image: url('{{asset('web/muscat/img/notify-bg.jpg')}}'); height: 100%; width: 100%;background-size: cover;">
  <div class="container">
   <div class="col-lg-8 col-lg-offset-2">
     <h3 style="color: #fff;
     border-bottom: 5px solid #f3f0cf;
     width: 340px;">Our Philosophy</h3>
     
   </div>
   <div class="row">
    <div class="col-lg-12 col-sm-12"style="color: #d8d8d8;">
     
     <p>American Lyceum International Nursery strives to be preschool of choice by providing learning environment suitable for children development and offering unique curriculum combined between Montessori and EYFS concept.</p><p> By providing safe, fun and stimulating learning environment, creative ways of teaching, personal hand-on attention, and top level play-based education, American Lyceum International Nursery student can explore and develop their full potential and be prepared to be good citizen and leader for 21st century.</p>
     <p> 
      A combination of Montessori and EYFS. curriculum is aimed to establish acceleration in-children's intellectual development and prepare our students with strong foundation for a lifelong learners.
    </p>
  </div>
  <div class="col-sm-12 col-lg-5">
   
   
  </div>
  <!-- text -->
  
  <!-- /col-lg-8 -->
</div>
</div>
</section>

<section id="about" style="background-image: url('{{asset('web/muscat/img/background-stripes.png')}}'); background-size: cover;">
 <div class="container" >
  <div class="row features">
   <!-- First Collumn -->
   <div class="col-lg-12 col-sm-12">
    <!-- item1 -->
    <div class="container media text-center">
     
     <div class="media-body">
      <h2 class="media-heading">Infrastructure </h2>
      <br><br>
      <p>At American Lyceum International Nursery for Children, our students form the heart of the institute. The curriculum and infrastructure are designed keeping the little learners at the core. We collectively work towards fostering their cognitive, social, physical and academic development. The school’s ideologies, methodologies and facilities guarantee enriching experience to each of our students, beyond the classroom.
        Our unique approach ensures overall growth of all the students and prepares them for intensive academic program that awaits them in the years to come.
      </p>
    </div>
  </div>
  <div class="row" style="margin-bottom: 15px;" id="">
    <div class="col-md-1"></div>
    <div class="col-md-5 media text-center">
      <div class=" shade_er">
        <div class="images_boxs">
          <img src="{{asset('web/muscat/img/web/servic1.jpg')}}" width="100%" height="300px"></div>
          <div class="media-body">
            <h5 class="media-heading">Infant Care</h5>
            <p>Infant care has to do more than look right — it has to feel right. You want to know your child is safe and well cared for. Our infant program is designed to offer a secure place with knowledgeable teachers who honor your family’s routine, and who know every day that they’re not caring for any child, but the most important child — yours.</p>
          </div>
        </div>
      </div>
      <div class="col-md-5 media text-center">
        <div class=" shade_er"> 
          <div class="images_boxs"><img src="{{asset('web/muscat/img/web/servic2.jpg')}}" width="100%" height="300px"></div>

          <div class="media-body">
            <h5 class="media-heading">Certified Tutuor </h5>
            <p>Highly qualified staffs that are committed to provide personal attention and professional education to Preschool continuous improvement, growth, and achievement of every students.</p>
          </div>
        </div>
        <!-- item3 -->
        
      </div>
    </div>
    <!-- Second Collumn -->
    <div class="">
      <!-- item4 -->
      <div class="col-md-4 media text-center">
        <div class=" shade_er"> 
          <div class="images_boxs"><img src="{{asset('web/muscat/img/web/servic3.jpg')}}" width="100%" height="260px"></div>

          <div class="media-body">
            <h5 class="media-heading">Teaching Method </h5>
            <p>Unique and innovative curriculum that challenge children to develop to their full potential with a combined Montessori and EYFS. concept.</p>
          </div>
        </div>
        <!-- item5 -->
      </div>
      <div class="col-md-4 media text-center">
        <div class=" shade_er"> 
          <div class="images_boxs"><img src="{{asset('web/muscat/img/web/servic4.jpg')}}" width="100%" height="260px"></div>

          <div class="media-body">
            <h5 class="media-heading">RESPONSIBILITY</h5>
            <p>We want proactive personalities. Students: Must be responsible for whatever they are getting. Teachers : Must be responsible for the results of the students. Parents : Must be responsible for the grooming of the children.</p>
          </div>
        </div>
        <!-- item6 --></div>
        <div class="col-md-4 media text-center">
          <div class=" shade_er"> 
            <div class="images_boxs"><img src="{{asset('web/muscat/img/web/servic5.jpg')}}" width="100%" height="260px"></div>

            <div class="media-body">
              <h5 class="media-heading">Safety First </h5>
              <p>Safe and stimulating environment that children can explore and discover, then encourage creativity and collaboration and  independent.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /row features -->
<div class="col-lg-12 col-sm-12 " style="background-image: url('{{asset('web/muscat/img/lined_paper.png')}}');background-size: cover;">
  <div class="container">
   <h3 class="text-left" style="font-size: 42px; color: #ffeacb; text-align: center;">Why American Lyceum</h3>
   <div id="owl-testimonials" class="owl-carousel9">
    <!-- testimonial 1-->
    <blockquote>
     <div class="col-md-4 col-lg-4">
      <!-- testimonial image-->
      <img src="{{asset('web/muscat/img/testimonial1.jpg')}}" alt="" class="img-responsive img-circle" style="height: 330px!important;">
    </div>
    <div class="col-md-8  quote-test">
      <!-- quote -->
      <p style="text-align: left;">
        <h5 style="color: #ffeacb;">Because Every Child can be successfull </h5>
        <p>• Leadership Development.</p><br>
        <p>• International Recognition.</p><br>
        <p>• Whole brain Teaching (WBT)/ Power Teaching .</p><br>
        <p>• Children's Personal, Social and Emotional Development.
        </p><br>
        <p>• Children's develop responsibility, the ability to analyse, to question and problem solving faculties.</p><br>
        <p>• Children learn to share, cooperate and be friendly with others.</p><br>
        <p>• Can Reserve your area Q.</p><br>
        <p>• Development of the ability to act with confidance and independence.
        </p><br>
        <p>• Children are trained to avoid child abuse</p><br>
        <p>• Dedicated and Trained Faculty.</p>
        <p>• Inter Branch tranfer.</p>
        <p>• A wide range of curricular & Co-curricullar Activities.</p>
      </div>
    </blockquote>
    <!-- testimonial 2-->
    
  </div>
</div>
</div>
</section>
<div class="parallax-object1 hidden-sm hidden-xs" data-0="opacity:1;"
data-100="transform:translatey(40%);"
data-center-center="transform:translatey(-180%);">
<img src="{{asset('web/muscat/img/parallaxobject1.png')}}" alt="">
</div>
<section id="team" class="color-section">
  <!-- svg triangle shape -->
  <svg class="triangleShadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
   <path class="trianglePath1" d="M0 0 L50 100 L100 0 Z" />
 </svg>
 <div class="container" id="team_new">
   <div class="col-lg-8 col-lg-offset-2">
    <!-- Section heading -->
    <div class="section-heading">
     <h2>Our Team</h2>
   </div>
 </div>
 <!-- Intro text -->
 <div class="row team">
  <div class="col-lg-5 col-md-5 res-margin">
   <!-- Intro image -->
   <img src="{{asset('web/muscat/img/teammain.jpg')}}" class="center-block img-responsive img-curved" alt=""/>
 </div>
 <div class="col-lg-7 col-md-7">
   <h3>Meet our Qualified Staff</h3>
   <p>Meet Our Qualified Staff
    Highly qualified staffs that are committed to provide personal attention and professional education to Preschool continuous improvement, growth, and achievement of every students



  </p>
</div>
</div>
<!-- Team Carousel-->
<div class="owl-" style="display: none;">
  <div class="col-lg-2">
   <!-- member 1-->
   <div class="team-item">
    <img src="{{asset('web/muscat/img/team1.jpg')}}" alt=""/>
    <div class="team-caption" style="background-color: #353794;">
     <h5 class="text-light" style="font-size: 16px;">Jane Doe</h5>
     <p>Founder</p>
   </div>
 </div>
 <!-- /team-item-->
</div>
<!-- col-lg-12-->
<div class="col-lg-2">
 <!-- member 2-->
 <div class="team-item">
  <img src="{{asset('web/muscat/img/team2.jpg')}}" alt=""/>
  <div class="team-caption" style="background-color: #353794;">
   <h5 class="text-light" style="font-size: 16px;">Mario Salles</h5>
   <p>Teacher</p>
 </div>
</div>
<!-- /team-item-->
</div>
<!-- col-lg-12-->
<div class="col-lg-2">
 <!-- member 3-->
 <div class="team-item">
  <img src="{{asset('web/muscat/img/team3.jpg')}}" alt=""/>
  <div class="team-caption" style="background-color: #353794;">
   <h5 class="text-light" style="font-size: 16px;">Julia Stan</h5>
   <p>Teacher</p>
 </div>
</div>
<!-- /team-item-->
</div>
<!-- col-lg-12-->
<div class="col-lg-2">
 <!-- member 3-->
 <div class="team-item">
  <img src="{{asset('web/muscat/img/team4.jpg')}}" alt=""/>
  <div class="team-caption" style="background-color: #353794;">
   <h5 class="text-light" style="font-size: 16px;">Mary John</h5>
   <p>Caretaker</p>
 </div>
</div>
<!-- /team-item-->
</div>
<!-- col-lg-12-->
<div class="col-lg-2">
 <!-- member 3-->
 <div class="team-item">
  <img src="{{asset('web/muscat/img/team5.jpg')}}" alt=""/>
  <div class="team-caption" style="background-color: #353794;">
   <h5 class="text-light" style="font-size: 16px;">Marco Datella</h5>
   <p>Psychologist</p>
 </div>
</div>
<!-- /team-item-->
</div>
<!-- col-lg-12-->
<div class="col-lg-2">
 <!-- member 3-->
 <div class="team-item">
  <img src="{{asset('web/muscat/img/team6.jpg')}}" alt=""/>
  <div class="team-caption" style="background-color: #353794;">
   <h5 class="text-light" style="font-size: 16px;">Juditt Lind</h5>
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
<!-- Section ends -->
<!-- Section activities -->
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
        <img src="{{asset('web/muscat/img/activity1.jpg')}}" alt="" class="img-responsive img-circle">            
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
            <p>American Lyceum International Nursery and training in early learning through music for educators of babies, toddlers and children aged 0.6 months to 3 years. We have been developing our music programs .The programs consist of lesson plans for group sessions where the children are involved in creative play, movement games, song, dance and playing instruments.
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
    <img src="{{asset('web/muscat/img/activity2.jpg')}}" alt="" class="img-responsive img-circle">            
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
        <p>If you own a daycare, you’re likely passionate about providing the best possible experience for the children in your care. A great daycare playground can dovetail with your goals by helping you support children in growth, development, fun and creativity. Daycare playground equipment offers plenty of benefits:</p>
        <p>• An inclusive playground can help children play together, even if they have different mobility and ability levels.</p>
        <p>• Play can help children grow and develop.</p>
        <p>• Play can incite curiosity and creativity through play.</p>
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
    <img src="{{asset('web/muscat/img/activity3.jpg')}}" alt="" class="img-responsive img-circle">            
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
    <img src="{{asset('web/muscat/img/activity4.jpg')}}" alt="" class="img-responsive img-circle">            
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

</section>
<section id="gallery" class="color-section">
 <svg class="triangleShadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
  <path class="trianglePath1" d="M0 0 L50 100 L100 0 Z" />
</svg>
<div class="container">
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
       <img class="img-responsive" src="{{asset('web/muscat/img/gallery1.jpg')}}" alt="">
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
      <img class="img-responsive" src="{{asset('web/muscat/img/gallery2.jpg')}}" alt="">
      <span class="overlay-mask"></span>
      <a href="{{asset('web/muscat/img/gallery2.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
       <i class="fa fa-expand"></i></a>
     </div>
   </div>
 </div>
 <!-- Image 3 -->
 <div class="col-sm-6 col-md-6 col-lg-4 facilities">
   <div class="portfolio-item">
    <div class="gallery-thumb">
     <img class="img-responsive" src="{{asset('web/muscat/img/gallery3.jpg')}}" alt="">
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
    <img class="img-responsive" src="{{asset('web/muscat/img/gallery4.jpg')}}" alt="">
    <span class="overlay-mask"></span>
    <a href="{{asset('web/muscat/img/gallery4.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
     <i class="fa fa-expand"></i></a>
   </div>
 </div>
</div>
<!-- Image 5 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
 <div class="portfolio-item">
  <div class="gallery-thumb">
   <img class="img-responsive" src="{{asset('web/muscat/img/gallery5.jpg')}}" alt="">
   <span class="overlay-mask"></span>
   <a href="{{asset('web/muscat/img/gallery5.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
    <i class="fa fa-expand"></i></a>
  </div>
</div>
</div>
<!-- Image 6 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
  <div class="portfolio-item">
   <div class="gallery-thumb">
    <img class="img-responsive" src="{{asset('web/muscat/img/gallery6.jpg')}}" alt="">
    <span class="overlay-mask"></span>
    <a href="{{asset('web/muscat/img/gallery6.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
     <i class="fa fa-expand"></i></a>
   </div>
 </div>
</div>
<!-- Image 7 -->
<div class="col-sm-6 col-md-6 col-lg-4 events">
 <div class="portfolio-item">
  <div class="gallery-thumb">
   <img class="img-responsive" src="{{asset('web/muscat/img/gallery7.jpg')}}" alt="">
   <span class="overlay-mask"></span>
   <a href="{{asset('web/muscat/img/gallery7.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
    <i class="fa fa-expand"></i></a>
  </div>
</div>
</div>
<!-- Image 8 -->
<div class="col-sm-6 col-md-6 col-lg-4 events">
  <div class="portfolio-item">
   <div class="gallery-thumb">
    <img class="img-responsive" src="{{asset('web/muscat/img/gallery8.jpg')}}" alt="">
    <span class="overlay-mask"></span>
    <a href="{{asset('web/muscat/img/gallery8.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
     <i class="fa fa-expand"></i></a>
   </div>
 </div>
</div>
<!-- Image 9 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
 <div class="portfolio-item">
  <div class="gallery-thumb">
   <img class="img-responsive" src="{{asset('web/muscat/img/gallery9.jpg')}}" alt="">
   <span class="overlay-mask"></span>
   <a href="{{asset('web/muscat/img/gallery9.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
    <i class="fa fa-expand"></i></a>
  </div>
</div>
</div>
<!-- Image 10 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
  <div class="portfolio-item">
   <div class="gallery-thumb">
    <img class="img-responsive" src="{{asset('web/muscat/img/gallery10.jpg')}}" alt="">
    <span class="overlay-mask"></span>
    <a href="{{asset('web/muscat/img/gallery10.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
     <i class="fa fa-expand"></i></a>
   </div>
 </div>
</div>
<!-- Image 11 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
 <div class="portfolio-item">
  <div class="gallery-thumb">
   <img class="img-responsive" src="{{asset('web/muscat/img/gallery11.jpg')}}" alt="">
   <span class="overlay-mask"></span>
   <a href="{{asset('web/muscat/img/gallery11.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
    <i class="fa fa-expand"></i></a>
  </div>
</div>
</div>
<!-- Image 12 -->
<div class="col-sm-6 col-md-6 col-lg-4 facilities">
  <div class="portfolio-item">
   <div class="gallery-thumb">
    <img class="img-responsive" src="{{asset('web/muscat/img/gallery12.jpg')}}" alt="">
    <span class="overlay-mask"></span>
    <a href="{{asset('web/muscat/img/gallery12.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
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
        <img src="{{asset('web/muscat/img/galler.jpg')}}" width="80%">
        <div class="latest-caption text-center">
         <a href="blog-post.html">
          <h4>EXCELLENCE</h4>
        </a>
        <!-- Post Info -->
        
        <p>Academic : New Heights of Excellence are to be attained. Personal : Every person is to be at his/her best. Facilities : Excellent facilities are to be provided to learners.</p>
        
      </div>
    </div></div>
    <div class ="col-md-4">
     <div class="blog-preview ">
      <img src="{{asset('web/muscat/img/galler1.jpg')}}" width="80%">
      <div class="latest-caption text-center">
       <a href="blog-post.html">
        <h4>INTEGRITY</h4>
      </a>
      <!-- Post Info -->
      
      <p>Personal : Whatever we say we do that. Professional: Professional Integrity is the most important thing.</p>
      
    </div>
  </div>
  <!-- /blog-preview --></div>
  <!-- Blog item 3 -->
  <div class ="col-md-4">
   <div class="blog-preview ">
    <img src="{{asset('web/muscat/img/galler5.jpg')}}" width="80%">
    <div class="latest-caption text-center">
     <a href="blog-post.html">
      <h4>RESPECT</h4>
    </a>
    
    <p>All are respectful. No body , on whatever, rank is to be humiliated. Students: Must be respected by staff and faculty. Faculty : Must be respected by students and parents. Parents : Must be respected by Students and faculty.</p>
    <!-- Button-->
    
  </div>
</div></div>
<!-- /blog-preview -->
<!-- Blog item 4 -->

<!-- /blog-preview -->
<!-- Blog item 5 -->
<div class ="col-md-6">
 <div class="blog-preview ">
  <img src="{{asset('web/muscat/img/galler3.jpg')}}" width="80%">
  <div class="latest-caption text-center">
   <a href="blog-post.html">
    <h4>RESPONSIBILITY</h4>
  </a>
  <!-- Post Info -->
  
  <p>We want proactive personalities. Students: Must be responsible for whatever they are getting. Teachers: Must be responsible for the results of the students. Parents: Must be responsible for the grooming of the children.</p>
  
</div>
</div></div>
<!-- /blog-preview -->
<!-- Blog item 6 -->
<div class ="col-md-6">
 <div class="blog-preview ">
  <img src="{{asset('web/muscat/img/galler4.jpg')}}" width="80%">
  
  <div class="latest-caption text-center">
   <a href="blog-post.html">
    <h4>Toddler Care</h4>
  </a>
  
  
  <p>When your toddler’s in the right place, you just know. Our program is designed to give you that feeling — a safe place for your newly independent child to test out and learn new skills, wonder about everything, and discover how to make friends. It’s all alongside teachers who know every day that they’re not caring for any child, but the most important child — yours.</p>
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

<section id="admission">
  <section  style="background-image: url('{{asset('web/muscat/img/notify-bg.jpg')}}'); height: 100%; width: 100%;background-size: cover;">
    <div class="container">
     <div class="col-lg-12 col-lg-offset-2">
       <h3 style="color: #ffb86e;
       border-bottom: 5px solid #ffb86e;
       width: 70%;">ADMISSION POLICY & REGISTRATION</h3>
     </div>
     <div class="row">

       <div class="col-md-6  quote-test">
        <!-- quote -->
        <p style="text-align: left;">
        </p><h5 style="color: #ffeacb;">ADMISSION POLICY </h5>
        <p>• Adimission is granted on first come first serve basis.</p><br>
        <p>• The age restrictions are strickly observed.</p><br>
        <p>• Children with any disability can only get admission after the approval .</p><br>
        <p>• Once admission is cancelled again process has to be followed for readmission.
        </p><br>
        <p>• Admission may be cancelled if there is any health hazard to others.</p><br>
        <p>• The health and safety policy has to be followed in letter & spirit.</p><br>
        <p>• All dues have to be paid before availing of the services.</p><br>
        <p>• Admission may cancelled on misbehavior with staff.
        </p><br>
        <p>• Any decision regarding admission, By school, in Final</p><br>

      </div>
    </blockquote>
    <div class="col-md-6" style="text-align: center;">
     <div class="img_bx">
       <img src="{{asset('web/muscat/img/admtion.jpg')}}" alt="New York"  height="200px"  style="background-size: cover; width: 100%; height: 320px;">
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
                     <label for="dob"> Date Of Birth</label>
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
                   <label for="fname">Father Name</label>
                   <input type="text" name="fname" class="form-control" id="fname" placeholder="Father name">
                 </div>
                 <div class="form-group">
                  <label for="phone">Cell No#</label>
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
                  <label for="email">Email</label>
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
<div class="parallax-object3 hidden-sm hidden-xs" data-0="opacity:1;"
data-100="transform:translatex(0%);"
data-center-center="transform:translatex(380%);">
<!-- Image -->
<img src="{{asset('web/muscat/img/parallaxobject3.png')}}" alt="">
</div>
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
    <div class="pricing-item col-lg-3 col-md-3 col-sm-12">
      <div class="pricing-deco">
       <svg class="pricing-deco-img" enable-background='new 0 0 300 100' height='100px' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
        <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;  c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
        <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A; c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
        <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A; H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
        <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;  c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
      </svg>
      <h3 class="pricing-title">Hourly </h3>
    </div>
    <ul class="pricing-feature-list">
     <li style="font-weight:bold;">5 OMR per hour</li>                                                            
   </ul>
   
 </div>
 <div class="pricing-item col-lg-3 col-md-3 col-sm-12">
  <div class="pricing-deco">
   <svg class="pricing-deco-img" enable-background='new 0 0 300 100' height='100px' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
    <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;  c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
    <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A; c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
    <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A; H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
    <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;  c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
  </svg>
  <h3 class="pricing-title">Daily</h3>
</div>
<ul class="pricing-feature-list">
 <li style="font-weight:bold;">10 OMR per Day</li>
 <li style="font-weight:bold;">9h /day</li>
 
</ul>

</div>
<div class="pricing-item pricing-item-featured col-lg-3 col-md-3 col-sm-12">
  <div class="pricing-deco">
   <svg class="pricing-deco-img" enable-background='new 0 0 300 100' height='100px' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
    <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;  c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
    <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A; c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
    <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A; H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
    <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;  c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
  </svg>
                                                          <!--      <div class="pricing-price"><span class="pricing-currency">$</span>350
                                                                  <span class="pricing-period">/ week</span>
                                                                </div> -->
                                                                <h3 class="pricing-title">Weekly</h3>
                                                              </div>
                                                              <!-- List -->
                                                              <ul class="pricing-feature-list">
                                                               <li style="font-weight:bold;">40 OMR / weekly</li>
                                                               <li style="font-weight:bold;">9h /day</li>                                                 
                                                               
                                                             </ul>
                                                             <!-- Button-->
                                                             
                                                             <!--/page-scroll-->
                                                           </div>
                                                           <div class="pricing-item col-lg-3 col-md-3 col-sm-12">
                                                            <div class="pricing-deco">
                                                             <svg class="pricing-deco-img" enable-background='new 0 0 300 100' height='100px' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                                                              <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;  c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                                              <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A; c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                                              <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A; H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                                              <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;  c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                                                            </svg>
                                                             <!--   <div class="pricing-price"><span class="pricing-currency">$</span>999
                                                                  <span class="pricing-period">/ mo</span>
                                                                </div> -->
                                                                <h3 class="pricing-title">Monthly</h3>
                                                              </div>
                                                              <!-- List -->
                                                              <ul class="pricing-feature-list">
                                                               <li style="font-weight:bold;">150 OMR</li>
                                                               <li style="font-weight:bold;">9h /day</li>
                                                               <li style="font-weight:bold;">Registration Fee 100 OMR</li>
                                                               
                                                             </ul>
                                                             <!-- Button-->
                                                             
                                                             <!--/page-scroll-->
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
                                                      <li class="active1">
                                                        <a href="#contact_form1">FAQ</a>
                                                      </li>
                                                    </ul>
                                                    
                                                  </div>
                                                </div>
                                              </section>
                                              <section id="contact" class="color-section">
                                                
                                               <div class="container">

                                                <div class="col-lg-8 col-lg-offset-2">
                                                  <div id="contact_form1"></div>
                                                  <div class="section-heading">
                                                    <h2>Contact us</h2>
                                                  </div>

                                                </div>
                                                <div class="col-lg-4 text-center">
                                                  <h4>Information</h4>

                                                  <div class="contact-info">
                                                    <p><a>Contact US: </a></p>
                                                    <p><i class="fa fa-phone margin-icon"></i>+968-90856281, 97001942</p>
                                                    <div class="social-media">
                                                     <a href="https://twitter.com/NurseryMuscat" title=""><i class="fa fa-twitter"></i></a>
                                                     <a href="https://www.facebook.com/AmericanLyceum" title=""><i class="fa fa-facebook"></i></a>
                                                     
                                                     <a href="https://www.instagram.com/american_lyceum_nursery_oman/" title=""><i class="fa fa-instagram"></i></a>
                                                   </div>
                                                 </div>
                                                 <p>Way no 4804
                                                   Building no 283  
                                                 opp Pizza Hut near well roundabout.Azaibah</p>

                                                 
                                                 <div id="map-canvas"></div>
                                               </div>
                                               <div class="col-lg-7 col-lg-offset-1">
                                                 
                                                 <h4>Write us</h4>
                                                 <form method="post" action="post" id="contactUs">
                                                  @csrf
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
                                   <td class="text-right">07:00 AM to  - 5:00 PM </td> 
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

                      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                      <script type="text/javascript">
                        $.ajaxSetup({
                          headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                       });

                        var searchRequest = null;


                        function contactUs(obj){

                        }

                        $(function () {
                          var minlength = 3;

                          $("#sample_search").keyup(function () {
                            var that = this,
                            value = $(this).val();

                            if (value.length >= minlength ) {
                              if (searchRequest != null) 
                                searchRequest.abort();
                              searchRequest = $.ajax({
                                type: "GET",
                                url: "sample.php",
                                data: {
                                  'search_keyword' : value
                                },
                                dataType: "text",
                                success: function(msg){
                                    //we need to check if the value is the same
                                    if (value==$(that).val()) {
                                    //Receiving the result of search here
                                  }
                                }
                              });
                            }
                          });
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
