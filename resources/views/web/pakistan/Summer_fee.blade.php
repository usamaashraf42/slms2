@extends('_layouts.web.pakistan.default')
@section('content')
<div class="hero-container relative  overflow-hidden ">
        <div class="slider" style="height: 607px;">
            <input type="hidden" name="ctl00$cphPageBanner$public_partctrl_cphPageBanner_1$hfPagePartId" id="ctl00_cphPageBanner_public_partctrl_cphPageBanner_1_hfPagePartId" value="298972">
            <div class="swRotator swSlider " id="swSlider-298972">
                <div class="scrollable" style="height: 607px; width: 100%;">
                    <div class="items" style="width: 20000em; left: -1903px;"><div class="item cloned" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url({{asset(
                        'assets/frontend/images/slider2.jpg')}})';">
                            <img src="../www.speakcdn.com/assets/2532/kids-in-hallway.jpg" alt="First Day of School" class="o-0">
                            <div class="caption">
                                <div class="title">First Day of School</div>
                                <div class="description">There is no day like the first day at Lyceum. From lower school to upper school, it is a special day for all.<br><a href="#" class="btn">View Details  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div>
                        <div class="item" id="banner-element-43151" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('/assets/frontend/images/eschool.jpg')}});">
                            <img src="{{asset('/assets/frontend/images/eschool.jpg')}}" alt="Pep Rally" class="o-0">
                        </div>
                        <div class="item" id="banner-element-43152" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('/assets/frontend/images/mainslider(5).jpg')}});">
                            <img src="({{asset('/assets/frontend/images/mainslider(5).jpg')}}" alt="Teaching at Lyceum" class="o-0">
                            <div class="caption">
                                <div class="title">Teaching at Lyceum</div>
                                <div class="description">Lyceum is blessed to have the most creative and qualified teachers leading the learning in the classroom.<br><a href="#" class="btn">Learn More  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div>
                        <div class="item" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/kids-in-hallway.jpg&quot;);">
                            <img src="../www.speakcdn.com/assets/2532/kids-in-hallway.jpg" alt="First Day of School" class="o-0">
                            <div class="caption">
                                <div class="title">First Day of School</div>
                                <div class="description">There is no day like the first day at Lyceum. From lower school to upper school, it is a special day for all.<br><a href="#" class="btn">View Video  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div>
                        <div class="item cloned" id="banner-element-43151" style="height: 607px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/kids-athletics-dap.jpg&quot;);">
                            <img src="../www.speakcdn.com/assets/2532/kids-athletics-dap.jpg" alt="Pep Rally" class="o-0">
                            <div class="caption">
                                <div class="title">Pep Rally</div>
                                <div class="description">Prior to big sporting events, the students of Lyceum gather together for a pep-rally to show off school spirit.<br><a href="#" class="btn">View Video  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div>
                      </div>
                </div>
                <div class="pager" style="display: none;">
                    <a href="#" rel="1" class="first current"><span class="pager-index">1
            </span>
            <span class="pager-title">Pep Rally</span></a>
               <a href="#" rel="2" class=""><span class="pager-index">2
            </span>
            <span class="pager-title">Teaching at Lyceum</span></a>
                <a href="#" rel="3" class="last"><span class="pager-index">3
            </span>
            <span class="pager-title">First Day of School</span></a>
                </div>
            </div>
        </div>
    </div>
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
      <div class="container">
         <div class="col-md-12">
            <img src="{{asset('assets/frontend/images/slide1.jpg')}}">
        </div>
      </div> 
    <label style="position: absolute;width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip: rect(0,0,0,0);border: 0;" class="sw-site-search-label sr-only" for="searchField">Search</label>
    <input type="text" id="searchField" class="searchField" value="Search" title="Search the Site" />
    <input type="button" id="searchButton" class="searchButton" value="Go" />
</div>
<span class="light-gray pt2 ph3 dib f6">Enter your search term and press enter. Press Esc or X to close.</span>
</div>
</div>
<div id="siteWrapper" class="slide-right" style="overflow:hidden;">
<div class="body-overlay"></div>                                       
<div  class="form_layout">
</div>
<section class="default-main content-start relative bg-white">
<div class="breadcrumb-container  pa3 pv2-ns ph4-ns relative">
<ul id="breadcrumb">
    <li id="bc-home">
        <a href="#" class="first"></a></li>
        <li id="bc-academics"> <a href="#">Admission</a></li>
        <li id="bc-college-acceptances"> <a href="#" class="current">Fee Module</a></li>
    </ul>
            <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
            </div>
        </div>
        <div class="flex flex-row-ns flex-column flex-wrap mw8 center relative">
            <div class="main-section w-70-l w-70-m  ph4 ph0-l">
                <div class="">
                    <h1 class="mt5-ns pr4-ns hidden-element fade-down element-load">Fee Payment Module</h1>
                </div>
             <input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/college-acceptances">
                <script type="text/javascript">
                    Sys.WebForms.PageRequestManager._initialize('ctl00$cphPageBody$ctl00', 'aspnetForm', [], [], [], 90, 'ctl00');
                </script>
                <input name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" type="hidden" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="295034">
            </div>
        </div>
        <div class="container">
            <form action="javascript:;" method="post" id="form">
                <div class="col-md-12">
                    <input type="hidden" name="_token" value="nTbwrlD2zjAqo2P0DbmKT2eWrfgSZyTByzGt4lsk">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Student Id</label>
                        <input type="number" name="student_id" class="form-control" id="last_name" placeholder="Enter Student Id" required   pattern="[A-Za-z0-9\S]{1,25}" title="Please Enter student Lyceum Id">
                    </div>
                </div>
                <input type="submit" class="btn btn-success  franchise_button" value="Check Student Fee">
                <a class="btn btn-success" href="#">Pay By jazzCash</a>
            </form>
        </div>
    </section>
</div>

</section>
@endsection