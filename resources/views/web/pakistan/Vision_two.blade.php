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
  <div class="hero-container relative w-100 overflow-hidden ">
    <div class="slider" style="height: 497px;">
        <input type="hidden" name="ctl00$cphPageBanner$public_partctrl_cphPageBanner_1$hfPagePartId" id="ctl00_cphPageBanner_public_partctrl_cphPageBanner_1_hfPagePartId" value="296016">
        <div class="swRotator swSlider " id="swSlider-296016">
            <div class="scrollable" style="height: 497px; width: 100%;">
                <div class="items" style="width: 20000em; left: -3806px;"><div class="item cloned" id="banner-element-44368" style="height: 497px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/vision.jpg')}});">
                        <img src="{{asset('assets/frontend/images/vision.jpg')}}" alt="" class="o-0">
                    </div>
                    <div class="item" id="banner-element-44371" style="height: 497px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/vision.jpg')}});">

                        <img src="{{asset('assets/frontend/images/vision.jpg')}}" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-44370" style="height: 497px; width: 1903px; float: left; background-image:url({{asset('assets/frontend/images/vision.jpg')}});">

                        <img src="{{asset('assets/frontend/images/vision.jpg')}}" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-43150" style="height: 497px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/branches.jpg')}});">

                        <img src="{{asset('assets/frontend/images/branches.jpg')}}" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-44366" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/dsc012791.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/dsc012791.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-43149" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/banner-middle-school-science.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/banner-middle-school-science.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-44364" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/dsc08651a.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/dsc08651a.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-43115" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/banner-little-girls-on-stage.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/banner-little-girls-on-stage.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-44368" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/dsc049309.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/dsc049309.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item cloned" id="banner-element-44371" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/dsc075556.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/dsc075556.jpg" alt="" class="o-0">


                    </div></div><!-- items -->
            </div><!-- scrollable -->


            <div class="pager" style="display: none;">

                <a href="#" rel="1" class="first"><span class="pager-index">1
            </span><span class="pager-title"></span></a>

                <a href="#" rel="2" class="current"><span class="pager-index">2
            </span><span class="pager-title"></span></a>

                <a href="#" rel="3" class=""><span class="pager-index">3
            </span><span class="pager-title"></span></a>

                <a href="#" rel="4" class=""><span class="pager-index">4
            </span><span class="pager-title"></span></a>

                <a href="#" rel="5" class=""><span class="pager-index">5
            </span><span class="pager-title"></span></a>

                <a href="#" rel="6" class=""><span class="pager-index">6
            </span><span class="pager-title"></span></a>

                <a href="#" rel="7" class=""><span class="pager-index">7
            </span><span class="pager-title"></span></a>

                <a href="#" rel="8" class="last"><span class="pager-index">8
            </span><span class="pager-title"></span></a>

            </div>



        </div><!-- swSlider-296016 -->
    </div>
</div>

<section class="default-main content-start relative bg-white">

    <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">


        <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-about"> <a href="#">Prospects</a></li><li id="bc-history-of-lausanne"> <a href="#" class="current">Download</a></li></ul>
        <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
        </div>
    </div>
   
        </div>
    </section>
@endsection