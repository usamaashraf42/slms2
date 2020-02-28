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
                    <div class="items" style="width: 20000em; left: -1903px;"><div class="item cloned" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/primary.jpg')}};">

                            <img src="({{asset('assets/frontend/images/primary.jpg')}};" alt="First Day of School" class="o-0">

                            <div class="caption">
                                <div class="title">First Day of School</div>
                                <div class="description">There is no day like the first day at Lyceum. From lower school to upper school, it is a special day for all.<br><a href="#" class="btn">View Details  <span class="icon icon-arrow-right"></span></a></div>
                            </div>
                        </div>

                        <div class="item" id="banner-element-43151" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/student1.jpg')}});">

                            <img src="{{asset('assets/frontend/images/primary.JPG')}}" alt="Pep Rally" class="o-0">

                            
                                
                                
                            
                        </div><!-- item -->

                        <div class="item" id="banner-element-43152" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/mainslider(5).jpg')}});">

                            <img src="({{asset('assets/frontend/images/primary.JPG')}}" alt="Teaching at Lyceum" class="o-0">

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


        <ul id="#"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-admissions"> <a href="admissions.html">Admission</a></li><li id="#"> <a href="#" class="current">Admission at Lyceum</a></li></ul>
        <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

        </div>

    </div>

    <div class="flex flex-row-ns flex-column flex-wrap mw8 center relative">

        <div class="main-section w-70-l w-70-m w-100 ph4 ph0-l">
            <div class="w-100">

                <h1 class="mt5-ns pr4-ns hidden-element fade-down element-load">Admission at Lyceum</h1>

            </div>

            <input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/admission-at-lausanne">
            <script type="text/javascript">
                //<![CDATA[
                Sys.WebForms.PageRequestManager._initialize('ctl00$cphPageBody$ctl00', 'aspnetForm', [], [], [], 90, 'ctl00');
                //]]>
            </script>






            <input name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" type="hidden" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="295005">
            <div class="templatecontent ">
                <p>&nbsp;</p>

                <p>
                

                <p>&nbsp;</p>

                <div>Since its founding in 1984, American Lyceum International  School has been dedicated to empowering the individual by providing a supportive and challenging learning environment in which students can be themselves and explore a wide range of interests.At ALIS  students come first in everything we do, and the meaningful relationships provided by our faculty and staff give students the confidence to take risks and to find success in every opportunity. The diversity of thought, culture and background at ALIS fosters a joyful community of respect and friendship that is really something to witness. .</div>

                <div>&nbsp;</div>

                <div> The dedication of ALIS  to continual improvement, including our use of technology  and our advisory programs, enables us to provide the very best educational experience for our students’ preparation for life and the ever-changing global environment. From project-based learning in the Lower School to the thematic approach in Middle School to the International Cambridge  Programme in the Upper School, studies are put into context and applicable to students’ lives so that they can shape their own opinions, make educated decisions about their futures and respond to the world around them.
                </div>

                <div>We encourage prospective families to attend admission events such as previews, open days and special events, which are designed to provide broader connections with the ALIS community and programs through unique information sessions, experiential activities as well as special interest highlights such as arts performances or Sports events.
                </div>

                <h6>Thank you for your interest in American Lyceum International School!
                </h6>

                <div>We look forward to welcoming you to campus soon. For more information, please feel free to contact our admission office, +968-90856281 (Muscat, Oman) 03-111-786-092 (Pakistan) or&nbsp;<a href="#"> info@americanlyceum.com</a>.</div>

                <div>&nbsp;</div>

                <div>&nbsp;</div>

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

</section>

</div>
        </div>
    </section>
@endsection