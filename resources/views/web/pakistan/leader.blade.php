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
    <div class="slider" style="height: 497px;">
        <input type="hidden" name="ctl00$cphPageBanner$public_partctrl_cphPageBanner_1$hfPagePartId" id="ctl00_cphPageBanner_public_partctrl_cphPageBanner_1_hfPagePartId" value="296016">

        <div class="swRotator swSlider " id="swSlider-296016">
            <div class="scrollable" style="height: 497px; width: 100%;">
                <div class="items" style="width: 20000em; left: -9515px;"><div class="item cloned" id="banner-element-43150" style="height: 497px; width: 1903px; float: left; background-image:  url({{asset('assets/frontend/images/vision.jpg')}});">

                        <img src="{{asset('assets/frontend/images/1.jpg')}}" alt="" class="o-0">


                    </div>

                    <div class="item" id="banner-element-44371" style="height: 497px; width: 1903px; float: left; background-image:  url({{asset('assets/frontend/images/vision.jpg')}});">

                        <img src="{{asset('assets/frontend/images/1.jpg')}}" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-43115" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/banner-little-girls-on-stage.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/banner-little-girls-on-stage.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-44366" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/dsc012791.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/dsc012791.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-44368" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/dsc049309.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/dsc049309.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-44364" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/dsc08651a.jpg&quot;);">

                        <img src="{{asset('assets/frontend/images/leadership.jpg')}}" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-43149" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/banner-middle-school-science.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/banner-middle-school-science.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-44370" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/dsc099702.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/dsc099702.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item" id="banner-element-43150" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/banner-kids-xylophone-stage.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/banner-kids-xylophone-stage.jpg" alt="" class="o-0">


                    </div><!-- item -->

                    <div class="item cloned" id="banner-element-44371" style="height: 497px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/dsc075556.jpg&quot;);">

                        <img src="../www.speakcdn.com/assets/2532/dsc075556.jpg" alt="" class="o-0">


                    </div></div><!-- items -->
            </div><!-- scrollable -->


            <div class="pager" style="display: none;">

                <a href="#" rel="1" class="first"><span class="pager-index">1
            </span><span class="pager-title"></span></a>

                <a href="#" rel="2" class=""><span class="pager-index">2
            </span><span class="pager-title"></span></a>

                <a href="#" rel="3" class=""><span class="pager-index">3
            </span><span class="pager-title"></span></a>

                <a href="#" rel="4" class=""><span class="pager-index">4
            </span><span class="pager-title"></span></a>

                <a href="#" rel="5" class=""><span class="pager-index">5
            </span><span class="pager-title"></span></a>

                <a href="#" rel="6" class="current"><span class="pager-index">6
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


        <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-about"> <a href="#">About</a></li><li id="bc-leadership"> <a href="#" class="current">Leadership of Lyceum</a></li></ul>
        <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

        </div>

    </div>

    <div class="flex flex-row-ns flex-column flex-wrap mw8 center relative">

        <div class="main-section w-70-l w-70-m w-100 ph4 ph0-l">
            <div class="w-100">

                <h1 class="mt5-ns pr4-ns hidden-element fade-down element-load">Leadership</h1>

            </div>

            <input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/leadership">
            <script type="text/javascript">
                //<![CDATA[
                Sys.WebForms.PageRequestManager._initialize('ctl00$cphPageBody$ctl00', 'aspnetForm', [], [], [], 90, 'ctl00');
                //]]>
            </script>






            <input name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" type="hidden" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="294995">
            <div class="templatecontent w-100 w-70-ns pv4-ns pl4-ns pa3">
                <p><img alt="Headmaster Stuart McCathie" src="{{asset('assets/frontend/images/1.jpg')}}"   style="margin: 5px; float: right; height: 300px; width: 500px;">Since our founding in 1984&nbsp;ALIS has continually evolved for the better&nbsp; But our founders’ emphasis on challenging the status quo, commitment to middle class, inspiring teachers and highly individualized instruction are values we hold dear today</p>

                <p>This is an exciting time for American Lyceum International School. In December 2018 2018, American Lyceum International School got the International Award of the Best School in Dubai, UAE.  In 2018 we also got the ISO certification and got our SOPs standardized against international Standards.</p>

                <p>We’ve graduated generations of alumni empowered to forge their own path. And our students learn to respect and consider the viewpoints of others as they work through complex problems. That desire for different thoughts and opinions has steadily grown the diversity of our campus over the decades, giving our students the ability to form meaningful relationships across stereotypical, socio-economic and global divides.</p>

                <p>While we are proud of the history that we’ve built together, we challenge ourselves to be better tomorrow than we are today, and are constantly looking for ways to further serve our students and community. Lyceum will continue to adjust to fully prepare our graduates for college and for life in a global environment, but our consistent core values will continue to guide us into the future just as they have for the past 90 years.</p>

                <p>Our school has an incredible history. It’s long been a place that helps students find their passion in an environment of not only of tolerance and empathy but of true commitment .
                </p>

                <p><em>Tahir Nadeem. Kadri
                    </em><br>
                    CEO
                </p>

            </div>



        </div>

        <div class="side-section w-30-l w-30-m w-100 pl4-l pl3-m">
            <div class="side-container bg-gold nt5-ns relative pt3 ph0-ns pa4-ns pb5-ns mb4">
                <div class="mobile-sidemenu-toggle dn-ns dib fr f3 absolute right-0 nt2"><span class="icon icon-chevron-down"></span></div>
                <p class="dib mb3 ml2-ns pv0 ph3 o-40 tracked sans-serif f7 b">IN THIS SECTION</p>
               <ul id="childpagenav-161286">
                        <li class="sw-menucode-item" id="cpn-Lyceum-way-learning-process">
                            <a href="{{route('pakistan.leadership')}}" class="first  sw-menucode-item__link">Leadership</a>
                        </li>
                        <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                            <a href="#" class=" sw-menucode-item__link">Eschool</a>
                        </li> <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                            <a href="{{route('pakistan.history')}}" class=" sw-menucode-item__link">History of Lyceum</a>
                        </li>
                        </li> <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                            <a href="{{route('pakistan.vision')}}" class=" sw-menucode-item__link">vision</a>
                        </li>
                        </li> <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                            <a href="{{route('pakistan.coreValue')}}" class=" sw-menucode-item__link">Core Values</a>
                        </li>
                    </ul>

                    <div id="ctl00_cphSideMenu_swSiblingMenu_pnlSideMenu">


                        <h2 class="sw-menucode-child"><a class="sw-menucode-child__link" href="{{route('pakistan.history')}}">History</a></h2>
                        <ul id="subnav">
                            <li class="sw-menucode-item" id="cpn-Lyceum-way-learning-process">
                                <a href="{{route('pakistan.leadership')}}" class="first  sw-menucode-item__link">Leadership</a>
                            </li>
                            </li> <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                                <a href="{{route('pakistan.history')}}" class=" sw-menucode-item__link">History of Lyceum</a>
                            </li>
                            <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                                <a href="#" class=" sw-menucode-item__link">Eschool</a>
                            </li> <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                                <a href="{{route('pakistan.vision')}}" class=" sw-menucode-item__link">vision</a>
                            </li>
                            </li> <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                                <a href="{{route('pakistan.coreValue')}}" class=" sw-menucode-item__link">Core Values</a>
                            </li>

                        </ul>




                </div>


            </div>

        </div>

    </div>

    <div id="section-one" class="section-one relative w-100 overflow-hidden">
        <div class="photo-background">

        </div>
        <div class="flex flex-row-ns flex-wrap flex-column w-100 relative mw8 center">
            <input name="ctl00$cphCustomSection1$public_partctrl_cphCustomSection1_1$hfPagePartId" type="hidden" id="ctl00_cphCustomSection1_public_partctrl_cphCustomSection1_1_hfPagePartId" value="296018">
            <div class="templatecontent w-100 w-60-ns pa5-ns pa3 bg-near-white">
                <h3 class="dark-blue">Advisory Board :</h3>

                <h6 class="measure">The board’s primary functions are to keep the direction right.</h6>

                <p>All implementation, overseeing of day-to-day operations, personnel matters and relationships with constituents are the responsibility of the head and the school’s administrative team. The board relies upon the administration to hear and adjudicate any grievances according to the policies found in the staff, parent and student handbook. Advisors are the leaders in their own field of expertise. The Board of Advisors does not serve as a court of appeals.
                </p>

            </div>
            <input name="ctl00$cphCustomSection1$public_partctrl_cphCustomSection1_2$hfPagePartId" type="hidden" id="ctl00_cphCustomSection1_public_partctrl_cphCustomSection1_2_hfPagePartId" value="296088">
            <div class="templatecontent w-100 w-40-ns bg-image-js" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/two-boys-looking-at-a-book.jpg&quot;);">
                <img alt="" src="../www.speakcdn.com/assets/2532/two-boys-looking-at-a-book.jpg" style="visibility: hidden;">

            </div>

        </div>
    </div>

    <div id="section-two" class="section-two relative w-100 overflow-hidden">

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

</section>

</div>

 </div>
</section>
@endsection