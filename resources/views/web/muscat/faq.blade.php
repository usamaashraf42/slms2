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
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:700,900' rel='stylesheet' type='text/css'>
  <link href="{{asset('web/muscat/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('web/muscat/styles/funtime.css')}}" rel="stylesheet">
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
.accordion a {
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  width: 100%;
  padding: 1rem 3rem 1rem 1rem;
  color: #7288a2;
  font-size: 1.15rem;
  font-weight: 400;
  border-bottom: 1px solid #e5e5e5;
}
.accordion a:hover,
.accordion a:hover::after {
  cursor: pointer;
  color: #03b5d2;
}
.accordion a:hover::after {
  border: 1px solid #03b5d2;
}
.accordion a.active {
color: #03b5d2;
border-bottom: 1px solid #03b5d2;
}
.accordion a::after {
  font-family: 'Ionicons';
  content: '\f218';
  position: absolute;
  float: right;
  right: 1rem;
  font-size: 1rem;
  color: #7288a2;
  padding: 5px;
  width: 30px;
  height: 30px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  border: 1px solid #7288a2;
  text-align: center;
}
.accordion a.active::after {
  font-family: 'Ionicons';
  content: '\f209';
  color: #03b5d2;
  border: 1px solid #03b5d2;
}
.accordion .content {
  opacity: 0;
  padding: 0 1rem;
  max-height: 0;
  border-bottom: 1px solid #e5e5e5;
  overflow: hidden;
  clear: both;
  -webkit-transition: all 0.2s ease 0.15s;
  -o-transition: all 0.2s ease 0.15s;
  transition: all 0.2s ease 0.15s;
}
.accordion .content p {
  font-size: 1rem;
  font-weight: 300;
}
.accordion .content.active {
  opacity: 1;
  padding: 1rem;
  max-height: 100%;
  -webkit-transition: all 0.35s ease 0.15s;
  -o-transition: all 0.35s ease 0.15s;
  transition: all 0.35s ease 0.15s;
}
  </style>
  <script type="text/javascript">
    var BASE_URL = "{{ url('')}}";
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
                             <li><a href="{{route('muscat.jobs')}}">Vacancies</a></li>
         <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Branches <b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        <li><a href="{{route('muscat.nursery')}}" style="background-color: #4a47ab;">Nursery</a></li>
                        <li><a href="{{route('muscat.school')}}" style="background-color: #4a47ab;">School</a></li>
                     </ul>
                  </li>
                     <li><a href="{{route('muscat.academy')}}">Academic Calendar </a></li>
               </ul>
               <ul class="nav navbar-nav page-scroll navbar-right">
                 
            
                    <li><a href="{{route('muscat.academy')}}"> Activity Calendar</a></li>
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
             <div class="ls-curtiles" style="overflow: hidden;"><img src="{{asset('web/muscat/img/event.jpg')}}" width="100%" height="140%"></div>
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
                        <p class="subtitle hidden-xs"> American Lyceum International Nursary & School  </p>
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
           
               </div>
               <!-- Gallery -->
               <div class="row">
                  <div class="col-md-12">
      <br><br>
<h1 style="margin: 0 auto;text-align: center;">Frequently Asked Questions</h1>
<div class="container">
  <div class="accordion">
    <div class="accordion-item">
      <a>How much does this cost?</a>
      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>Are you accepting new students?</a>
      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>I'm interested, can you tell me more?</a>
      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>Where are you located?</a>
      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
      </div>
    </div>
    <div class="accordion-item">
      <a> What is your curriculum?</a>
      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
      </div>
    </div>
       <div class="accordion-item">
      <a> Do you have any vacancies?</a>
      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
      </div>
    </div>
     <div class="accordion-item">
      <a>  What is the admission criteria ?</a>
      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
      </div>
    </div>
  </div>
  
</div>
 <br><br>
</div>
</div>
<div class="container" style="text-align: center;">
                                                   <h4>Write us</h4>
                                                   <div class="col-md-12" id="contact_form">
                                                      <div class="form-group">
                                                         <input type="text" name="name" class="form-control input-field" placeholder="Name" required="">                    
                                                         <input type="email" name="email" class="form-control input-field" placeholder="Email ID" required="">           
                                                         <input type="text" name="subject" class="form-control input-field" placeholder="Subject" required="">                     
                                                      </div>
                                                      <textarea name="message" id="message" class="textarea-field form-control" rows="4" placeholder="Enter your message" required=""></textarea>
                                                      <button type="submit" id="submit_btn" value="Submit" class="btn center-block">Send message</button>
                                                      <br><br>
                                                   </div>
                                                   <div id="contact_results"></div>
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