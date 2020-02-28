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

                            
                                
                                
                            
                        </div><!-- item -->

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

    
    <section class="default-main content-start relative bg-white">

        <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">


            <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-about"> <a href="#" class="current">Why Eschool</a></li></ul>
            <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

            </div>

        </div>

        <div class="flex flex-row-ns flex-column flex-wrap mw8 center relative">

            <div class="main-section w-70-l w-70-m w-100 ph4 ph0-l">
                <div class="w-100">

                    <h1 class="mt5-ns pr4-ns hidden-element fade-down element-load">Why E School</h1>

                </div>

                <input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/about">
                <script type="text/javascript">
                    //<![CDATA[
                    Sys.WebForms.PageRequestManager._initialize('ctl00$cphPageBody$ctl00', 'aspnetForm', [], [], [], 90, 'ctl00');
                    //]]>
                </script>






                <input name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" type="hidden" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="294920">
                <div class="templatecontent ">
                    <p>Education is a basic human right, like a right to have food, clothes and a roof .. stated by UNO website.
                        Article 26 of 1948 Universal Declaration of Human Rights states that “ Everyone has the right to education”
                        About 72 million children of primary age are out of school which is  almost about the population of turkey..</p>
                        <h6>Reasons for this deplorable state:
                        </h6>
                    <p><h5>Poverty:</h5>
                    More than 3 billion people on less than 2.5$per day.
                    More than 1.3 billion people live In extreme poverty (less than 1.25$ a day)
                    1 billion children worldwide are living in poverty. According to UNICEF, 22,000 children die each day due to poverty.
                    80% of the world population lives on less than $10 a day.
                    The World Food Programme says, “The poor are hungry and their hunger traps them in poverty.” Hunger is the number one cause of death in the world, killing more than HIV/AIDS, malaria, and tuberculosis combined

                    </p><p><h5> Gender Discrimination
                    </h5>
                    54% of the non schooled population is of gilrs.
                    In Africa 12 million girls at risk of never receiving education.
                    In Yeman 80% of girls will never get education
                    More alarming in Pakistan , Afghanistan and Somalia.

                    </p><p><h5>Physically Challenged People:</h5>
                    1 billion people (15% of the world population) are facing some sort of physical disability.<br>
                    3.4 million persons are physically challenged.

                    </p><p><h5>UnEducated Adults
                    </h5>
                    759 million adults are uneducated… almost equal to the population of the whole of Europe.(742 m).  More than the double of the population of the USA (326m)
                    The way children are getting Education needs to be redesigned because<br>
                    The hegemony of schools is based on buildings and infrastructure.<br>
                    44% children out of school.<br>
                    21 % primary schools run by 1 teacher.<br>
                    14% schools have only one room.<br>
                    40% public primary schools without electricity<br>
                    28% did not have toilets<br>
                    25% without boundary<br>
                    29% no access to drinking water.<br>
                    43% have dangerous buildings.<br>

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

                <div class="sw-public-page-part relative w-100 pa4">

                    <div id="ctl00_cphCustomSection1_public_partctrl_cphCustomSection1_1_matrixContent" class="matrix-content"><div class="w-100 mw8 center">
                            
                        </div>

                        
                    </div>
                    <input type="hidden" name="ctl00$cphCustomSection1$public_partctrl_cphCustomSection1_1$hfPagePartId" id="ctl00_cphCustomSection1_public_partctrl_cphCustomSection1_1_hfPagePartId" value="298976">
                </div>
            </div>
        </div>

        <div id="section-two" class="section-two relative w-100 overflow-hidden">
            <div class="photo-background">

            </div>
            <div class="flex flex-row-ns flex-wrap flex-column w-100 relative">

                <div class="sw-public-page-part ">

                    <div id="ctl00_cphCustomSection2_public_partctrl_cphCustomSection2_1_matrixContent" class="matrix-content"><div class="static-caption bg-light-blue invert pa4 pa5-ns absolute vert-centered z-999 mw6 left-0 ">
                            <div class="caption-title heading f3 ttu b">American Lyceum Collegiate School</div>
                            <div class="description sans-serif f5">American Lyceum develops the individual talents, intellects, creativity and character of boys and girls through innovative teaching strategies and passionate and engaged learning.</div>
                        </div>

                        <div class="carousel-single w-100 owl-carousel owl-theme" style="height: 500px; opacity: 1; display: block;">

                            <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 30448px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);"><div class="owl-item active" style="width: 7612px;"><div class="item" style="min-height: 500px;">
                                            <div class="bg-image cover absolute top-0 left-0 w-100 h-100" style="background-image: url('{{asset('assets/frontend/images/about.jpg')}}');">
                                                <div></div>
                                            </div>
                                        </div></div><div class="owl-item" style="width: 7612px;"><div class="item" style="min-height: 500px;">
                                            <div class="bg-image cover absolute top-0 left-0 w-100 h-100" style="background-image: url('{{asset('assets/frontend/images/about.jpg')}}');">
                                                <div></div>
                                            </div>
                                        </div></div></div></div>

                            <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev">prev</div><div class="owl-next">next</div></div></div></div></div>
                    <input type="hidden" name="ctl00$cphCustomSection2$public_partctrl_cphCustomSection2_1$hfPagePartId" id="ctl00_cphCustomSection2_public_partctrl_cphCustomSection2_1_hfPagePartId" value="298982">
                </div>
            </div>
        </div>

        <div id="section-three" class="section-three relative w-100 overflow-hidden">
            <div class="photo-background">

            </div>
            <div class="flex flex-row-ns flex-wrap flex-column w-100 relative">

                <div class="sw-public-page-part w-100 mw8 center mb4 ph4 ph0-l">

                    <div id="ctl00_cphCustomSection3_public_partctrl_cphCustomSection3_1_matrixContent" class="matrix-content"><div class="w-100">
                            <h4>American Lyceum Voices</h4>
                        </div>

                        <div class="carousel-single w-100 owl-carousel owl-theme" style="opacity: 1; display: block;">

                            <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3888px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);"><div class="owl-item active" style="width: 972px;"><div class="carousel-item pa4-ns flex flex-row flex-wrap items-center">
                                            <div class="w-30-ns w-100 pr4-ns animate-inview fade-down"><img src="{{asset('assets/frontend/images/man.jpg')}}"></div>
                                            <div class="w-70-ns w-100 animate-inview fade-up">
                                                <blockquote class="center ma0">
                                                    <span class="f3">American Lyceum has prepared me culturally for the assimilation of other cultures into my own life and has made me more of an open-minded thinker.</span>
                                                    <p class="i pt3">Muhammad Tahir Nadeem Kadri
                                                    </p>
                                                </blockquote>
                                            </div>
                                        </div></div><div class="owl-item" style="width: 972px;"><div class="carousel-item pa4-ns flex flex-row flex-wrap items-center">
                                            <div class="w-30-ns w-100 pr4-ns animate-inview fade-down"><img src="../www.speakcdn.com/assets/2532/voices-stuart-mccathie.jpg"></div>
                                            <div class="w-70-ns w-100 animate-inview fade-up">
                                                <blockquote class="center ma0">
                                                    <span class="f3">The diversity of our community gives students the advantage of sharing different cultures, experiences, opinions and interests.</span>
                                                    <p class="i pt3">Stuart McCathie, Headmaster</p>
                                                </blockquote>
                                            </div>
                                        </div></div></div></div>

                            <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev">prev</div><div class="owl-next">next</div></div></div></div></div>
                    <input type="hidden" name="ctl00$cphCustomSection3$public_partctrl_cphCustomSection3_1$hfPagePartId" id="ctl00_cphCustomSection3_public_partctrl_cphCustomSection3_1_hfPagePartId" value="298983">
                </div>
                <div class="sw-public-page-part w-100 center mw8 mb4 ph4 ph0-l">

                    <div id="ctl00_cphCustomSection3_public_partctrl_cphCustomSection3_2_matrixContent" class="matrix-content"><div class="w-100 mw8 center">
                            <h4 class="title hidden-element fade-down">There's More to Explore</h4>
                        </div>

                        <div class="flex flex-row flex-wrap content-stretch w-100 mw8 center">

                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-1 ph3 ">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url();"><img alt="" src="{{asset('assets/frontend/images/student7.jpg')}}" style="visibility: hidden;">
                                    <span class="white absolute top-0 left-0 w-100 h-100 child bg-black-40 ph4 pv5">Learn more about our history</span> </a>
                                <h6 class="mt1"><a href="#">History of American Lyceum</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-2 ph3 ">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/lausanne-way.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/student7.jpg')}}" style="visibility: hidden;">
                                    <span class="white absolute top-0 left-0 w-100 h-100 child bg-black-40 ph4 pv5">Read more about the Lyceum Way</span> </a>
                                <h6 class="mt1"><a href="#">The Lyceum Way</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-3 ph3 ">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/90th-anniversary.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/student7.jpg')}}" style="visibility: hidden;">
                                    <span class="white absolute top-0 left-0 w-100 h-100 child bg-black-40 ph4 pv5">Enjoy exploring Lyceum through their perspectives</span> </a>
                                <h6 class="mt1"><a href="#">Explore Lyceum</a></h6>
                            </div>
                            <div class="w-25-l w-50-m w-100 hidden-element fade-down delay-4 ph3 ">
                                <a class="link bg-image-js mw6 flex h-75 hide-child br2 cover bg-center overflow-hidden relative items-center" href="#" style="background-image: url(&quot;../www.speakcdn.com/assets/2532/after-school.jpg&quot;);"><img alt="" src="{{asset('assets/frontend/images/student7.jpg')}}" style="visibility: hidden;">
                                    <span class="white absolute top-0 left-0 w-100 h-100 child bg-black-40 ph4 pv5">Learn more about the After School Program at Lyceum</span> </a>
                                <h6 class="mt1"><a href="#">Lyceum School Program </a></h6>
                            </div>
                        </div></div>
                    <input type="hidden" name="ctl00$cphCustomSection3$public_partctrl_cphCustomSection3_2$hfPagePartId" id="ctl00_cphCustomSection3_public_partctrl_cphCustomSection3_2_hfPagePartId" value="298986">
                </div>
            </div>
        </div>

        <div id="section-four" class="section-four relative w-100 overflow-hidden">
            <div class="flex flex-row-ns flex-wrap flex-column w-100 relative">

            </div>
        </div>

    </section>



</div>

    

			</section>
			@endsection