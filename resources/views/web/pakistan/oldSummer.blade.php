@extends('_layouts.web.pakistan.default')
@section('content')
<div id="search-container" class="bg-dark-blue invert">
<a id="search-close" class="close-location pull-right no-style f7">CLOSE 
  <span class="icon icon-x f5 ml1 relative white dib bg-gold"></span></a>
  <div class="pv3">
    <script type="text/javascript">
// <![CDATA[
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
 <style type="text/css">
 .swRotator .scrollable .items .item .caption{
        margin-left: 33%;
        margin-bottom:10px; 
    }
    body, html {
    height: 100%;
}
.img-container {
  position: relative;
  text-align: center;
  color: white;
  width: 100%;
}

/* Centered text */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="img-container">
        <img src="{{asset('images/web/summer.jpg')}}" alt="Snow" >
        <div class="centered" >
            <h5 style="color: white"> Please Select Country for Summer Camp Registration</h5>

            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">USA</a>
            <a class="btn" href="{{route('pakistanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Pakistan</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Oman</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">UK</a>
        </div>
    </div>
    

<section class="default-main content-start relative bg-white">
    <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">
        <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-admissions"> <a href="#">Summer Camp Plans</a></li><li id="bc-meet-our-team"> <a href="#" class="current">Detail</a></li></ul>
        <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
        </div>
    </div>
    <div class="row summerCampPlan">
        <div class="container" style="align-content: center;text-align: center">
            <h2>Summer Camp Plan</h2>
            <span style="color: red">Select for Registration in following countries </span><br>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">USA</a>
            <a class="btn" href="{{route('pakistanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Pakistan</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Oman</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">UK</a>
        </div>
        <div class="container">
   
            <div class="col-md-12">
                <img src="{{asset('images/web/SummerCampBrochure.png')}}">
                
            </div>
            <div class="col-md-2"></div>
        </div> 
         <div class="container" style="align-content: center;text-align: center">
            <h5>Select for Registration in following countries </h5>
             
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">USA</a>
            <a class="btn" href="{{route('pakistanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Pakistan</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">Oman</a>
            <a class="btn" href="{{route('omanRegister')}}" style="padding: 10px 16px;font-size: 16px;line-height: 1.33;border-radius: 35px;background-color: #FFCB05">UK</a>
        </div>
        
        
    </div>

    







</section>

<style type="text/css">
   /* === card component ====== 
 * Variation of the panel component
 * version 2018.10.30
 * https://codepen.io/jstneg/pen/EVKYZj
 */
 .card{ background-color: #fff; border: 1px solid transparent; border-radius: 6px; }
 .card > .card-link{ color: #333; }
 .card > .card-link:hover{  text-decoration: none; }
 .card > .card-link .card-img img{ border-radius: 6px 6px 0 0; }
 .card .card-img{ position: relative; padding: 0; display: table; }
 .card .card-img .card-caption{
  position: absolute;
  right: 0;
  bottom: 16px;
  left: 0;
}
.card .card-body{ display: table; width: 100%; padding: 12px; }
.card .card-header{ border-radius: 6px 6px 0 0; padding: 8px; }
.card .card-footer{ border-radius: 0 0 6px 6px; padding: 8px; }
.card .card-left{ position: relative; float: left; padding: 0 0 8px 0; }
.card .card-right{ position: relative; float: left; padding: 8px 0 0 0; }
.card .card-body h1:first-child,
.card .card-body h2:first-child,
.card .card-body h3:first-child, 
.card .card-body h4:first-child,
.card .card-body .h1,
.card .card-body .h2,
.card .card-body .h3, 
.card .card-body .h4{ margin-top: 0; }
.card .card-body .heading{ display: block;  }
.card .card-body .heading:last-child{ margin-bottom: 0; }

.card .card-body .lead{ text-align: center; }

@media( min-width: 768px ){
  .card .card-left{ float: left; padding: 0 8px 0 0; }
  .card .card-right{ float: left; padding: 0 0 0 8px; }

  .card .card-4-8 .card-left{ width: 33.33333333%; }
  .card .card-4-8 .card-right{ width: 66.66666667%; }

  .card .card-5-7 .card-left{ width: 41.66666667%; }
  .card .card-5-7 .card-right{ width: 58.33333333%; }
  
  .card .card-6-6 .card-left{ width: 50%; }
  .card .card-6-6 .card-right{ width: 50%; }
  
  .card .card-7-5 .card-left{ width: 58.33333333%; }
  .card .card-7-5 .card-right{ width: 41.66666667%; }
  
  .card .card-8-4 .card-left{ width: 66.66666667%; }
  .card .card-8-4 .card-right{ width: 33.33333333%; }
}

/* -- default theme ------ */
.card-default{ 
  border-color: #ddd;
  background-color: #fff;
  margin-bottom: 24px;
}
.card-default > .card-header,
.card-default > .card-footer{ color: #333; background-color: #ddd; }
.card-default > .card-header{ border-bottom: 1px solid #ddd; padding: 8px; }
.card-default > .card-footer{ border-top: 1px solid #ddd; padding: 8px; }
.card-default > .card-body{  }
.card-default > .card-img:first-child img{ border-radius: 6px 6px 0 0; }
.card-default > .card-left{ padding-right: 4px; }
.card-default > .card-right{ padding-left: 4px; }
.card-default p:last-child{ margin-bottom: 0; }
.card-default .card-caption { color: #fff; text-align: center; text-transform: uppercase; }


/* -- price theme ------ */
.card-price{ border-color: #999; background-color: #ededed; margin-bottom: 24px; }
.card-price > .card-heading,
.card-price > .card-footer{ color: #333; background-color: #fdfdfd; }
.card-price > .card-heading{ border-bottom: 1px solid #ddd; padding: 8px; }
.card-price > .card-footer{ border-top: 1px solid #ddd; padding: 8px; }
.card-price > .card-img:first-child img{ border-radius: 6px 6px 0 0; }
.card-price > .card-left{ padding-right: 4px; }
.card-price > .card-right{ padding-left: 4px; }
.card-price .card-caption { color: #fff; text-align: center; text-transform: uppercase; }
.card-price p:last-child{ margin-bottom: 0; }

.card-price .price{ 
  text-align: center; 
  color: #337ab7; 
  font-size: 3em; 
  text-transform: uppercase;
  line-height: 0.7em; 
  margin: 24px 0 16px;
}
.card-price .price small{ font-size: 0.4em; color: #66a5da; }
.card-price .details{ list-style: none; margin-bottom: 24px; padding: 0 18px; }
.card-price .details li{ text-align: center; margin-bottom: 8px; }
.card-price .buy-now{ text-transform: uppercase; }
.card-price table .price{ font-size: 1.2em; font-weight: 700; text-align: left; }
.card-price table .note{ color: #666; font-size: 0.8em; }
</style>

</div>
</section>
@endsection