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
        <div class="slider" style="height: 607px;">
            <input type="hidden" name="ctl00$cphPageBanner$public_partctrl_cphPageBanner_1$hfPagePartId" id="ctl00_cphPageBanner_public_partctrl_cphPageBanner_1_hfPagePartId" value="298972">

            <div class="swRotator swSlider " id="swSlider-298972">
                <div class="scrollable" style="height: 607px; width: 100%;">
                    <div class="items" style="width: 20000em; left: -1903px;"><div class="item cloned" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/slider2.jpg')}});">

                            <img src="../www.speakcdn.com/assets/2532/kids-in-hallway.jpg" alt="First Day of School" class="o-0">

                            <div class="caption">
                                <div class="title">First Day of School</div>
                                <div class="description">There is no day like the first day at Lyceum. From lower school to upper school, it is a special day for all.<br><a href="first-day-of-school.html" class="btn">View Details  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div>

                        <div class="item" id="banner-element-43151" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/about.jpg')}});">

                            <img src="{{asset('assets/frontend/images/slider2.jpg')}}" alt="Pep Rally" class="o-0">

                            
                                
                                
                            
                        </div><!-- item -->

                        <div class="item" id="banner-element-43152" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/mainslider(5).jpg')}});">

                            <img src="({{asset('assets/frontend/images/mainslider(5).jpg')}}" alt="Teaching at Lyceum" class="o-0">

                            <div class="caption">
                                <div class="title">Teaching at Lyceum</div>
                                <div class="description">Lyceum is blessed to have the most creative and qualified teachers leading the learning in the classroom.<br><a href="working-at-lausanne.html" class="btn">Learn More  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div><!-- item -->

                        <div class="item" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/kids-in-hallway.jpg&quot;);">

                            <img src="../www.speakcdn.com/assets/2532/kids-in-hallway.jpg" alt="First Day of School" class="o-0">

                            <div class="caption">
                                <div class="title">First Day of School</div>
                                <div class="description">There is no day like the first day at Lyceum. From lower school to upper school, it is a special day for all.<br><a href="first-day-of-school.html" class="btn">View Video  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div><!-- item -->

                        <div class="item cloned" id="banner-element-43151" style="height: 607px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/kids-athletics-dap.jpg&quot;);">

                            <img src="../www.speakcdn.com/assets/2532/kids-athletics-dap.jpg" alt="Pep Rally" class="o-0">

                            <div class="caption">
                                <div class="title">Pep Rally</div>
                                <div class="description">Prior to big sporting events, the students of Lyceum gather together for a pep-rally to show off school spirit.<br><a href="pep-rally.html" class="btn">View Video  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div></div><!-- items -->
                </div><!-- scrollable -->


                <div class="pager" style="display: none;">

                    <a href="#" rel="1" class="first current"><span class="pager-index">1
            </span><span class="pager-title">Pep Rally</span></a>

                    <a href="#" rel="2" class=""><span class="pager-index">2
            </span><span class="pager-title">Teaching at Lyceum</span></a>

                    <a href="#" rel="3" class="last"><span class="pager-index">3
            </span><span class="pager-title">First Day of School</span></a>

                </div>



            </div><!-- swSlider-298972 -->
        </div>
    </div>
    <section class="default-main content-start relative bg-white">

        <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">


            <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-admissions"> <a href="#">Clubs</a></li><li id="bc-meet-our-team"> <a href="#" class="current">clubs</a></li></ul>
            <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

            </div>

        </div>

        <div class="flex flex-row-ns flex-column flex-wrap mw8 center relative">

            <div class="main-section w-70-l w-70-m w-100 ph4 ph0-l">
                <div class="w-100">

                    <h1 class="mt5-ns pr4-ns hidden-element fade-down element-load">Clubs</h1>

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
                            <h4 class="title hidden-element fade-down element-load">American Lyceum Clubs</h4>
                        </div>

                        <div class="flex flex-row flex-wrap content-stretch w-100 mw8 center mt4">

                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-1 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url('https://http://127.0.0.1:8000/public/assets/frontend/images/mainslider(5).jpg');"><img alt="" src="{{asset('assets/frontend/images/drama.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Drama and Activity Club</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-2 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-theatre.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/clean.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >AMC Club (Ambiance , Maintenance & Cleanliness)</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-3 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-visualarts.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/canteen.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Canteen & Exhibition Club</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-4 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-conservatory.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/student2.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Discipline  Club</a></h6>
                            </div>
                        </div>


                        <div class="flex flex-row flex-wrap content-stretch w-100 mw8 center mt4">

                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-1 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url('https://www.speakcdn.com/assets/2532/arts-more-to-explore-music.jpg');"><img alt="" src="{{asset('assets/frontend/images/media.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Media Club</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-2 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-theatre.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/student5.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Welfare club</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-3 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-visualarts.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/vision.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Vision Club</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-4 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-conservatory.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/green.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Green Club</a></h6>
                            </div>
                        </div>

                        <div class="flex flex-row flex-wrap content-stretch w-100 mw8 center mt4">

                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-1 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url('https://www.speakcdn.com/assets/2532/arts-more-to-explore-music.jpg');"><img alt="" src="{{asset('assets/frontend/images/spoken.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Debating and Spoken English Club</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-2 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-theatre.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/sciencelab.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Science and IT Club</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-3 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-visualarts.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/litrature.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Literature Club</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-4 ph3  element-load">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center"  style="background-image: url(&quot;../www.speakcdn.com/assets/2532/arts-more-to-explore-conservatory.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/student1.jpg')}}" style="visibility: hidden;">
                                    <span class="white dtc v-mid w-100 h-100 child bg-black-40 ph4 pv5"></span> </a>
                                <h6 class="mt1"><a >Sports Club</a></h6>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="ctl00$cphCustomSection4$public_partctrl_cphCustomSection4_1$hfPagePartId" id="ctl00_cphCustomSection4_public_partctrl_cphCustomSection4_1_hfPagePartId" value="298242">
                </div>
            </div>
        </div>

    </section>




    
                                                      
        
        
        
        
        
        
                
        

</div>

        </div>

    </section>




    
                                                      
        
        
        
        
        
        
                
        

</div>
</div>
</section>
@endsection