@extends('_layouts.web.pakistan.default')
@section('content')
<div id="search-container" class="bg-dark-blue invert">
  <a id="search-close" class="close-location pull-right no-style f7">CLOSE <span class="icon icon-x f5 ml1 relative white dib bg-gold"></span></a>
  <div class="pv3">
    <script type="text/javascript">
        $(document).ready(function() {
          $("#searchButton").click(function() { return send(); });
          $("#searchField").keypress(function(evt) {
           if (evt.keyCode == 13) {
            return send();
        }
    });
          $("#searchField").click(function() { $(this).val(""); });
          function send() {
           val = $("#searchField").val();
           if (val != "") window.location = "/searchresults.aspx?s=" + escape(val);
           return false;
       }
   });
</script>
<div class="searchPanel">
    <label style="position: absolute;width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip: rect(0,0,0,0);border: 0;" class="sw-site-search-label sr-only" for="searchField">Search</label>
    <input type="text" id="searchField" class="searchField" value="Search" title="Search the Site" />
    <input type="button" id="searchButton" class="searchButton" value="Go" />
</div>
<span class="light-gray pt2 ph3 dib f6">Enter your search term and press enter. Press Esc or X to close.</span>
</div>
</div>
<div id="siteWrapper" class="slide-right" style="overflow:hidden;">
    <div class="body-overlay"></div>
    <section class="home-main">

        <div class="slider relative left-0 w-100 h-100 nb6">
<style>
	#wrapper {
  font-family: Lato;
  font-size: 1.5rem;
  text-align: center;
  box-sizing: border-box;
  color: #333;
  
  #dialog {
    border: solid 1px #ccc;
    margin: 10px auto;
    padding: 20px 30px;
    display: inline-block;
    box-shadow: 0 0 4px #ccc;
    background-color: #FAF8F8;
    overflow: hidden;
    position: relative;
    max-width: 450px;
    
    h3 {
      margin: 0 0 10px;
      padding: 0;
      line-height: 1.25;
    }
    
    span {
      font-size: 90%;
    }
    
    #form {
      max-width: 240px;
      margin: 25px auto 0;
      
      input {
        margin: 0 5px;
        text-align: center;
        line-height: 80px;
        font-size: 50px;
        border: solid 1px #ccc;
        box-shadow: 0 0 5px #ccc inset;
        outline: none;
        width: 20%;
        transition: all .2s ease-in-out;
        border-radius: 3px;
        
        &:focus {
          border-color: purple;
          box-shadow: 0 0 5px purple inset;
        }
        
        &::selection {
          background: transparent;
        }
      }
      
      button {
        margin:  30px 0 50px;
        width: 100%;
        padding: 6px;
        background-color: #B85FC6;
        border: none;
        text-transform: uppercase;
      }
    }
    
    button {
      &.close {
        border: solid 2px;
        border-radius: 30px;
        line-height: 19px;
        font-size: 120%;
        width: 22px;
        position: absolute;
        right: 5px;
        top: 5px;
      }           
    }
    
    div {
      position: relative;
      z-index: 1;
    }
    
    img {
      position: absolute;
      bottom: -70px;
      right: -63px;
    }
  }
}
</style>
<div  class="form_layout">
</div>


<section class="default-main content-start relative bg-white">
<div id="siteWrapper" class="slide-right" style="overflow:hidden;">
  <div class="body-overlay"></div>
  <div class="scrollable" style="
  height: 160px;
  padding: 56px;
  width: 200;
  padding-bottom: 44px;
  margin-top: 100px;
  min-height:100%;
  background:linear-gradient(0deg, rgb(0, 0, 0, 0.6), rgb(0, 0, 0,0.6)),  url('http://127.0.0.1:8000/images/job_imags.jpg');
  background-size:cover;">
  <h2 class="apply_now" style="margin-top: 120px;
  text-align: center;
  text-shadow: 0px 4px 2px #000000;
  font-size: 36px;
  margin: 0 auto;
  color: white;
  padding: 6px;
  border-bottom-right-radius: 25px;
  border-bottom-left-radius: 25px;
}">Verification </h2>
</div>
<div class="pager" style="display: none;">
  <a href="#" rel="1" class="first current"><span class="pager-index">1
  </span><span class="pager-title">Pep Rally</span></a>
  <a href="#" rel="2" class=""><span class="pager-index">2
  </span><span class="pager-title">Teaching at Lyceum</span></a>
  <a href="#" rel="3" class="last"><span class="pager-index">3
  </span><span class="pager-title">First Day of School</span></a>
</div>
</div>
	<div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">
		<ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-academics"> <a href="#">Job</a></li><li id="bc-college-acceptances"> <a href="#" class="current">Email Verification</a></li></ul>
		<div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
		</div>
	</div>
	<div class="flex flex-row-ns flex-column flex-wrap mw8 center relative" style="background-image: url('');">
		<section id="contact-page" class="pt-90 pb-120 white-bg">
			<div class="col-md-12" style=" padding: 20px; margin: 0 auto; text-align: center; width: 100%;">
				<div class="row">
					<div id="wrapper">
  <div id="dialog">
    <h5>Please enter the 4-digit verification code we sent via Email:</h5>
    <span>(we want to make sure it's you before we proceed)</span><br>
   <span style="font-size: 18px; font-style: italic;"><span>*</span> If you don't receive the email please check your spam folder.</span>
    <div id="form">
      <form action="{{route('emailVerificationCode')}}" method="POST">
        @csrf
        @component('_components.alerts-default')
            @endcomponent
     <input type="hidden" name="email" value="@isset($applicant->email){{$applicant->email}}@endisset">
      <input type="number" name="code[]" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
      <input type="number" name="code[]" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
      <input type="number" name="code[]" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
      <input type="number" name="code[]" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
      <button class=" btn-primary btn-embossed" style="margin-top: 12px!important;" type="submit">Verify</button>
       </form>
    </div>
 
    <div>
      Didn't receive the code?<br />
      @isset($applicant->email)
      <a href="{{route('againEmailCode',$applicant->email)}}">Send code again</a><br />
      @endisset
    </div>

  </div>
</div>
				</div>
			</div>
		</section>
	</div>
</section>
<footer class="bg-near-black invert sans-serif pt6 relative" style="    border-left: 5px solid #8f0625;
border-top: 6px solid #8f0625;
color: black;
border-right: 16px solid #8f0625;">
<div class="mw9 center flex flex-row flex-wrap pt5 nt5">
  <div class="logo-wrap w-25-ns  tl nt2 pb6 dn dib-l relative">
    <a class="logo-link dib ph3" href="http://127.0.0.1:8000/pakistan">
     <img src="http://127.0.0.1:8000/images/school/americanlycesum.png">


     

   </a>
 </div>
 <div class="address w-30-l w-40-m  tl ph4">
  <input name="ctl00$ctl31$hfPagePartId" type="hidden" id="ctl00_ctl31_hfPagePartId">
  <div class="templatecontent ">
    <p><span class="db pt1 pb2 b">American Lyceum group of School</span> 
      <a href="info@americanlyceum.com" target="_blank" title="Map and Directions"><br>
      info@americanlyceum.com</a><br>
      <a href="tel:9014741000" title="Call us today!">
        <i class="fa fa-phone" aria-hidden="true"></i> +92-3-111-786-092<br>
        
      </a>
      <a href="tel:923111786092" title="Call us today!"> <i class="fa fa-whatsapp" aria-hidden="true"></i>
      +968-90856281</a></p>    

    </div>

  </div>
  <div class="quick-links w-25-l w-40-m  pl5-l ph2-l ph4 ph0-m pb4">
    <ul id="childpagenav-161766">
      <li class="sw-menucode-item" id="cpn-giving">
        <a href="#" class="first  sw-menucode-item__link">Giving</a>
      </li>
      <li class="sw-menucode-item" id="cpn-site-map">
        <a href="#" class=" sw-menucode-item__link">Site Map</a>
      </li>
      <li class="sw-menucode-item" id="cpn-the-lausanne-way">
        <a href="#" class=" sw-menucode-item__link">The Lyceum Way</a>
      </li>
      <li class="sw-menucode-item" id="cpn-tuition">
        <a href="#" class=" sw-menucode-item__link">Tuition</a>
      </li>
      <li class="sw-menucode-item" id="cpn-apply">
        <a href="#" class=" sw-menucode-item__link">Apply</a>
      </li>
      <li class="sw-menucode-item" id="cpn-contact-us_1">
        <a href="#" class="last sw-menucode-item__link">Contact Us</a>
      </li>
    </ul>

  </div>
  <div class="w-20-ns  ph4-l ph0-m ph4 ibo">
    <input name="ctl00$ctl32$hfPagePartId" type="hidden" id="ctl00_ctl32_hfPagePartId">
    <div class="templatecontent">
      <a class="dib w-40-ns w-60" href="http://127.0.0.1:8000/pakistan" target="_blank" title="American Lyceum group of school">
        <img alt="American Lyceum group of school" src="http://127.0.0.1:8000/images/school/logooo.png" style="width: 100%">
      </a> 
    </div>
  </div>
</div>
<div class="mw9 center  ttu pa3 credit flex flex-row flex-wrap">
  <div class="social-nav w-50-ns  pa4">
    <ul id="childpagenav-161778">
      <li class="sw-menucode-item" id="cpn-facebook">
        <a href="#" target="_blank" class="first  sw-menucode-item__link">Facebook</a>
      </li>
      <li class="sw-menucode-item" id="cpn-twitter">
        <a href="#" target="_blank" class=" sw-menucode-item__link">Twitter</a>
      </li>
      <li class="sw-menucode-item" id="cpn-instagram">
        <a href="#" target="_blank" class=" sw-menucode-item__link">Instagram</a>
      </li>
      <li class="sw-menucode-item" id="cpn-youtube">
        <a href="#" target="_blank" class="last sw-menucode-item__link">YouTube</a>
      </li>
    </ul>

  </div>
  
</div>
</footer>
<script>
	$(function() {
  'use strict';

  var body = $('body');

  function goToNextInput(e) {
    var key = e.which,
      t = $(e.target),
      sib = t.next('input');

    if (key != 9 && (key < 48 || key > 57)) {
      e.preventDefault();
      return false;
    }

    if (key === 9) {
      return true;
    }

    if (!sib || !sib.length) {
      sib = body.find('input').eq(0);
    }
    sib.select().focus();
  }

  function onKeyDown(e) {
    var key = e.which;

    if (key === 9 || (key >= 48 && key <= 57)) {
      return true;
    }

    e.preventDefault();
    return false;
  }
  
  function onFocus(e) {
    $(e.target).select();
  }
  body.on('keyup', 'input', goToNextInput);
  body.on('keydown', 'input', onKeyDown);
  body.on('click', 'input', onFocus);
})
</script>
@endsection