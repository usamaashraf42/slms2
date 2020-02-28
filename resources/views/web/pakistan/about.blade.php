@extends('_layouts.web.pakistan.default')
@section('content')
<div class="hero-container relative w-100 overflow-hidden ">
        <div class="slider" style="height: 607px;">
            <input type="hidden" name="ctl00$cphPageBanner$public_partctrl_cphPageBanner_1$hfPagePartId" id="ctl00_cphPageBanner_public_partctrl_cphPageBanner_1_hfPagePartId" value="298972">
            <div class="swRotator swSlider " id="swSlider-298972">
                <div class="scrollable" style="height: 607px; width: 100%;">
                    <div class="items" style="width: 20000em; left: -1903px;"><div class="item cloned" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/slider2.jpg')}});">
                            <img src="../www.speakcdn.com/assets/2532/kids-in-hallway.jpg" alt="First Day of School" class="o-0">
                            <div class="caption">
                                <div class="title">First Day of School</div>
                                <div class="description">There is no day like the first day at Lyceum. From lower school to upper school, it is a special day for all.<br><a href="#" class="btn">View Details  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div>
                        <div class="item" id="banner-element-43151" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/eschool.jpg')}});">
                            <img src="{{asset('assets/frontend/images/eschool.jpg')}}" alt="Pep Rally" class="o-0">

                                
                                
                            
                        </div>

                        <div class="item" id="banner-element-43152" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/mainslider(5).jpg')}});">

                            <img src="({{asset('assets/frontend/images/mainslider(5).jpg')}}" alt="Teaching at Lyceum" class="o-0">

                            <div class="caption">
                                <div class="title">Teaching at Lyceum</div>
                                <div class="description">Lyceum is blessed to have the most creative and qualified teachers leading the learning in the classroom.<br><a href="#" class="btn">Learn More  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div><!-- item -->

                        <div class="item" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/kids-in-hallway.jpg&quot;);">

                            <img src="../www.speakcdn.com/assets/2532/kids-in-hallway.jpg" alt="First Day of School" class="o-0">

                            <div class="caption">
                                <div class="title">First Day of School</div>
                                <div class="description">There is no day like the first day at Lyceum. From lower school to upper school, it is a special day for all.<br><a href="#" class="btn">View Video  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div><!-- item -->

                        <div class="item cloned" id="banner-element-43151" style="height: 607px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/kids-athletics-dap.jpg&quot;);">

                            <img src="../www.speakcdn.com/assets/2532/kids-athletics-dap.jpg" alt="Pep Rally" class="o-0">

                            <div class="caption">
                                <div class="title">Pep Rally</div>
                                <div class="description">Prior to big sporting events, the students of Lyceum gather together for a pep-rally to show off school spirit.<br><a href="#" class="btn">View Video  <span class="icon icon-arrow-right"></span></a></div>
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
 <div class="slider">
   <input type="hidden" name="ctl00$cphPageBanner$public_partctrl_cphPageBanner_1$hfPagePartId" 
   id="ctl00_cphPageBanner_public_partctrl_cphPageBanner_1_hfPagePartId" value="298972" />
          <script type="text/javascript" src="javascripts/jquery-plugins/jquery.tools.min.js"></script>
          <script type="text/javascript" src="javascripts/swfobject-2.2.js"></script>
          <script type="text/javascript" src="javascripts/banner-rotator.js"></script>
          <script type="text/javascript" src="javascripts/jquery-plugins/jquery.lightbox.js"></script>
          <link rel="stylesheet" href="sitefiles/global/css/jquery.lightbox.css" />
          <script type="text/javascript">
            var swr_298972;
            $(function() {
                swr_298972 = new swRotator({
                    container: 'swSlider-298972',
                    height: '700',
                    width: '100',
                    widthUnits: '%',
                    transition: 'swSlider',
                    vertical: "False" == "True" ? true : false,
                    reversed: "False" == "True" ? true : false,
                    delay: 5,
                    speed: 1,
                    showPager: "False" == "True" ? true : false
                });
            });
        </script>
        <div class="swRotator swSlider " id="swSlider-298972">        
            <div class="scrollable">
                <div class="items">
                    <div class="item" id="banner-element-43151">
                        <a href="https://vimeo.com/292406944" title="Pep Rally" target="_blank" style="border-width: 0px;"><img src="assets/2532/dsc019558.jpg" alt="Pep Rally" /></a>
                        <div class="caption">
                            <div class="title">Pep Rally</div>
                            <div class="description">Prior to big sporting events, the students of American Lyceum International School gather together for a pep-rally to show off school spirit.<br/><a href="pep-rally.html" class="btn">View Video  <span class="icon icon-arrow-right"></span></a></div>
                        </div> 
                    </div>
                    <div class="item" id="banner-element-43152">
                        <img src="assets/2532/lower-school-boy-holding-up-hand.jpg" alt="Teaching at American Lyceum International School" />
                        <div class="caption">
                            <div class="title">Teaching at American Lyceum International School</div>
                            <div class="description">American Lyceum International School is honored to have the most creative and qualified teachers leading the learning in the classroom.<br><a href="working-at-American Lyceum International School.html" class="btn">Learn More  <span class="icon icon-arrow-right"></span></a></div>
                        </div> 
                    </div>
                    <div class="item" id="banner-element-43153">
                        <img src="assets/2532/kids-in-hallway.jpg" alt="First Day of School" />
                        <div class="caption">
                            <div class="title">First Day of School</div>
                            <div class="description">There is no day like the first day at American Lyceum International School. From lower school to upper school, it is a special day for all.<br><a href="first-day-of-school.html" class="btn">View Video  <span class="icon icon-arrow-right"></span></a></div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="pager" style="display: none;">
                <a href="#" rel="1" class="first"><span class="pager-index">1
                </span><span class="pager-title">Pep Rally</span></a>
                <a href="#" rel="2" class=""><span class="pager-index">2
                </span><span class="pager-title">Teaching at American Lyceum International School</span></a>
                <a href="#" rel="3" class=" last"><span class="pager-index">3
                </span><span class="pager-title">First Day of School</span></a>
            </div>
        </div>
    </asp:ContentPlaceHolder>
    </div>
</div>

<section class="default-main content-start relative bg-white">

	<div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">


		<ul id="breadcrumb"><li id="bc-home"  >  <a href="index.html" class="first ">Home</a></li><li id="bc-about"  >  <a href="about.html" class=" current">About</a></li></ul>
		<div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

		</div>

	</div>

	<div class="flex flex-row-ns flex-column flex-wrap mw8 center relative">

		<div class="main-section w-70-l w-70-m w-100 ph4 ph0-l">
			<div class="w-100">

				<h1 class="mt5-ns pr4-ns hidden-element fade-down">About</h1>

			</div>

			<input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/about" />
			<script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$cphPageBody$ctl00', 'aspnetForm', [], [], [], 90, 'ctl00');
//]]>
</script>






<input name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" type="hidden" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="294920" />
<div class="templatecontent ">
	<p>American Lyceum International School Collegiate School offers students a distinctive learning community through an established tradition of educational innovation.</p>

	<p>We forge meaningful relationships and embrace global mindedness. We learn from one another and honor and celebrate our differences and our likenesses.</p>    

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
                            <a href="{{route('pakistan.history')}}" class=" sw-menucode-item__link">History of Lyceum</a>
                        </li>
                        </li> <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                            <a href="{{route('pakistan.vision')}}" class=" sw-menucode-item__link">vision</a>
                        </li>
                        </li> 
                        <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                            <a href="{{route('pakistan.coreValue')}}" class=" sw-menucode-item__link">Core Values</a>
                        </li>
                    </ul>

                    <div id="ctl00_cphSideMenu_swSiblingMenu_pnlSideMenu">


                        <h2 class="sw-menucode-child"><a class="sw-menucode-child__link" href="{{route('pakistan.history')}}">History</a></h2>
                        <ul id="subnav">
                        <li class="sw-menucode-item" id="cpn-Lyceum-way-learning-process">
                           <a href="{{route('pakistan.leadership')}}" class="first  sw-menucode-item__link">Leadership</a>
                        </li>
                            </li>
                            <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                                <a href="{{route('pakistan.history')}}" class=" sw-menucode-item__link">History of Lyceum</a>
                        </li>
                        <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                    <a href="{{route('pakistan.vision')}}" class=" sw-menucode-item__link">vision</a>
                        </li>
                        </li> 
                        <li class="sw-menucode-item" id="cpn-Lyceum-way-self-reflection">
                         <a href="{{route('pakistan.coreValue')}}" 
                         class=" sw-menucode-item__link">Core Values</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
@endsection