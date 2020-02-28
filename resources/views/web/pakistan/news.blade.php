@extends('_layouts.web.pakistan.default')
@section('content')


<div id="search-container" class="bg-dark-blue invert">
  <a id="search-close" class="close-location pull-right no-style f7">CLOSE <span class="icon icon-x f5 ml1 relative white dib bg-gold"></span></a>
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
//  ]]>
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


            <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-admissions"> <a href="#">Clubs</a></li><li id="bc-meet-our-team"> <a href="#" class="current">News</a></li></ul>
            <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

            </div>

        </div>

        <div class="flex flex-row-ns flex-column flex-wrap mw8 center relative">

            <div class="main-section w-70-l w-70-m w-100 ph4 ph0-l">
                <div class="w-100">

                    <h1 class="mt5-ns pr4-ns hidden-element fade-down element-load">News</h1>

                </div>

                <input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/meet-our-team">
                <script type="text/javascript">
                    //<![CDATA[
                    Sys.WebForms.PageRequestManager._initialize('ctl00$cphPageBody$ctl00', 'aspnetForm', [], [], [], 90, 'ctl00');
                    //]]>
                </script>






                <input name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" type="hidden" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="295009">



            </div>

            <div class="side-section w-30-l w-30-m w-100 pl4-l pl3-m">

            </div>

        </div>

        <div id="section-one" class="section-one relative w-100 overflow-hidden">
            <div class="photo-background">

            </div>
            <div class="flex flex-row-ns flex-wrap flex-column w-100 relative mw8 center">

            </div>
        </div>

        <div id="section-two" class="section-two relative w-100 overflow-hidden">
            <div class="photo-background">

            </div>
            <div class="flex flex-row-ns flex-wrap flex-column w-100 relative">

            </div>
        </div>

        <div id="section-three" class="section-three relative w-100 overflow-hidden">
            <div class="photo-background">

            </div>
            <div class="flex flex-row-ns flex-wrap flex-column w-100 relative">

            </div>
        </div>

        <div id="section-four" class="section-four relative w-100 overflow-hidden">
            <div class="flex flex-row-ns flex-wrap flex-column w-100 relative">

            </div>
        </div>



        <div id="section-four" class="section-four relative w-100 overflow-hidden">
            <div class="flex flex-row-ns flex-wrap flex-column w-100 relative">

                <div class="sw-public-page-part w-100 center mt4 mb6 ph4 ph0-l">

                    <div id="ctl00_cphCustomSection4_public_partctrl_cphCustomSection4_1_matrixContent" class="matrix-content"><div class="w-100 mw8 center">
                            <h4 class="title hidden-element fade-down element-load">American Lyceum news</h4>
                        </div>

                        <div class="flex flex-row flex-wrap content-stretch w-100 mw8 center mt4">

                            <div class="col-md-6">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url('https://http://127.0.0.1:8000/public/assets/frontend/images/mainslider(5).jpg');"><img alt="" src="{{asset('assets/frontend/images/back.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>

                                <h6>New session Starts From  <b>11 March</b>.</h6>
                                {{--<h6 class="mt1"><a href="#">Drama and Activity Club</a></h6>--}}
                            </div>
                            <div class="col-md-6">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-theatre.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/bahar.JPG')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><b>New Session Party Party  Theme
                                        “Jashan-e-Baharan” 15 March</b></h6>
                            </div>

                        </div>


                        <div class="flex flex-row flex-wrap content-stretch w-100 mw8 center mt4">

                            <div class="col-md-6">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url('https://www.speakcdn.com/assets/2532/arts-more-to-explore-music.jpg');"><img alt="" src="{{asset('assets/frontend/images/defence.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><b>Pakistan Day
                                        Special Assembly
                                        Calligraphy contest
                                        (Gr 4-O’level)  22 March</b></h6>
                            </div>
                            {{--<div class="col-md-6">--}}
                                {{--<a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-theatre.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/student5.jpg')}}" style="visibility: hidden;">--}}
                                    {{--<span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>--}}
                                {{--<h6 class="mt1"><a href="#">Welfare club</a></h6>--}}
                            {{--</div>--}}
                            <div class="col-md-6">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-visualarts.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/vision.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><b>Pakistan Day
                                        Special Assembly
                                        Calligraphy contest
                                        (Gr 4-O’level)29 March</b></h6>
                            </div>
                            {{--<div class="col-md-6">--}}
                                {{--<a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-conservatory.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/green.jpg')}}" style="visibility: hidden;">--}}
                                    {{--<span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>--}}
                                {{--<h6 class="mt1"><a href="#">Green Club</a></h6>--}}
                            {{--</div>--}}
                        </div>

                        {{--<div class="flex flex-row flex-wrap content-stretch w-100 mw8 center mt4">--}}

                            {{--<div class="w-25-l w-50-m w-100 hidden-element fade-down delay-1 ph3  element-load">--}}
                                {{--<a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url('https://www.speakcdn.com/assets/2532/arts-more-to-explore-music.jpg');"><img alt="" src="{{asset('assets/frontend/images/spoken.jpg')}}" style="visibility: hidden;">--}}
                                    {{--<span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>--}}
                                {{--<h6 class="mt1"><a href="#">Debating and Spoken English Club</a></h6>--}}
                            {{--</div>--}}
                            {{--<div class="w-25-l w-50-m w-100 hidden-element fade-down delay-2 ph3  element-load">--}}
                                {{--<a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-theatre.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/sciencelab.jpg')}}" style="visibility: hidden;">--}}
                                    {{--<span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>--}}
                                {{--<h6 class="mt1"><a href="#">Science and IT Club</a></h6>--}}
                            {{--</div>--}}
                            {{--<div class="w-25-l w-50-m w-100 hidden-element fade-down delay-3 ph3  element-load">--}}
                                {{--<a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-visualarts.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/litrature.jpg')}}" style="visibility: hidden;">--}}
                                    {{--<span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>--}}
                                {{--<h6 class="mt1"><a href="#">Literature Club</a></h6>--}}
                            {{--</div>--}}
                            {{--<div class="w-25-l w-50-m w-100 hidden-element fade-down delay-4 ph3  element-load">--}}
                                {{--<a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-conservatory.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/student1.jpg')}}" style="visibility: hidden;">--}}
                                    {{--<span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>--}}
                                {{--<h6 class="mt1"><a href="#">Sports Club</a></h6>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>
                    <input type="hidden" name="ctl00$cphCustomSection4$public_partctrl_cphCustomSection4_1$hfPagePartId" id="ctl00_cphCustomSection4_public_partctrl_cphCustomSection4_1_hfPagePartId" value="298242">
                </div>
            </div>
        </div>

    </section>
@endsection