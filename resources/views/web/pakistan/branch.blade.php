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
    <style>
        .content {
          width:100%;
          margin:0;
      }
      .content h1{
          font-size:45px;
          text-align:left;
      }
      #accordion h4{
          margin:5px 0 0;
          padding:15px;
          font-size:20px;
          font-weight:normal;
          text-align:left;
          color:#fff;       
          background:#8ECAE8;
          outline: 0;
          cursor:pointer;
          max-height: 400px!important;
          border-bottom: 1px solid black;
          border-left: 1px solid black;
      }

      #accordion h4:hover {

          background:#555;
          content: "\2191";
      }
      .ui-accordion-content .ui-corner-bottom .ui-helper-reset .ui-widget-content{
          max-height: 800px!important;
      }
      #accordion div {
          position:relative;
          margin:0 0 0;
          padding:15px;
          color:#fff;
          background:transparent;
          display: block;
          color:#000;
      }
      #accordion div:after {
        position: absolute;
        top: -27px;
        right: 7%;
        display: block;
        width: 0;
        height: 0;
        margin-left: -20px;
        border-width: 15px;
        border-style: solid;
        border-color: transparent transparent  rgb(255,255,255)  transparent;
        z-index:1;
        content: '';
    }
</style>
<div class="hero-container relative w-100 overflow-hidden ">
    <div class="slider" style="height: 607px;">
        <input type="hidden" name="ctl00$cphPageBanner$public_partctrl_cphPageBanner_1$hfPagePartId" id="ctl00_cphPageBanner_public_partctrl_cphPageBanner_1_hfPagePartId" value="298972">
        <div class="swRotator swSlider " id="swSlider-298972">
            <div class="scrollable" style="height: 607px; width: 100%;">
                <div class="items" style="width: 20000em; left: -1903px;"><div class="item cloned" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/slider2.jpg')}});">

                    <img src="../www.speakcdn.com/assets/2532/kids-in-hallway.jpg" alt="First Day of School" class="o-0">

                </div>
                <div class="item" id="banner-element-43151" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/branches.jpg')}});">
                    <img src="{{asset('assets/frontend/images/branches.jpg')}}" alt="Pep Rally" class="o-0">
                </div><!-- item -->
                <div class="item" id="banner-element-43152" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/mainslider(5).jpg')}});">
                    <img src="{{asset('assets/frontend/images/mainslider(5).jpg')}}" alt="Teaching at Lyceum" class="o-0">
                </div><!-- item -->
                <div class="item" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/kids-in-hallway.jpg&quot;);">
                    <img src="../www.speakcdn.com/assets/2532/kids-in-hallway.jpg" alt="First Day of School" class="o-0">
                </div><!-- item -->

                <div class="item cloned" id="banner-element-43151" style="height: 607px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/kids-athletics-dap.jpg&quot;);">
                    <img src="../www.speakcdn.com/assets/2532/kids-athletics-dap.jpg" alt="Pep Rally" class="o-0">
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
        </div>
    </div>
</div>
<section class="default-main content-start relative bg-white">
    <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">
        <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-academics"> <a href="#">Academics</a></li><li id="bc-college-acceptances"> <a href="#" class="current">Branches Of American Lyceum</a></li></ul>
        <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
        </div>
    </div>
    <div class="flex flex-row-ns flex-column flex-wrap mw8 center relative">
        <div class="main-section w-70-l w-70-m w-100 ph4 ph0-l">
            <div class="w-100">
                <h1 class="mt5-ns pr4-ns hidden-element fade-down element-load">Branches</h1>
            </div>
            <input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/college-acceptances">
            <input name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" type="hidden" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="295034">
            <div class="templatecontent ">
            </div>
            <div class="content" style="margin-bottom: 140px; height: auto!important;">
                <div id="accordion" style="height: auto!important;">
                    <h4 style="width: 100%;">United Kingdom<i class=" fa fa-sort-down" style="float: right;"></i></h4>
                    <div style="max-height: 200PX;">
                        <p>
                         <ul>
                            <li class="branch_name "><b>1. United Kingdom</b></li>
                            241-B Wincobank, Sheffield<br>
                        </ul>
                    </p>
                </div>
                <h4 style="width: 100%;">United State of America<i class=" fa fa-sort-down" style="float: right;"></i></h4>
                <div style="max-height: 300PX;">
                    <p>
                     <ul>
                        <li class="branch_name"><b>1. United States</b></li>
                        236th Avenue, Sammamish, Washington<br>
                        Contact @ Ms. Samah<br>
                        +1-425-442-3939<br>
                        info@americnlyceum.com
                    </ul>
                </p>
            </div>
            <h4 style="width: 100%;">Oman<i class=" fa fa-sort-down" style="float: right;"></i></h4>
            <div style="max-height: 420PX;">
                <p>
                 <ul>
                    <li class="branch_name"><b>1. International Nursery</b></li>
                    18-Nov Street<br>
                    Contact @ Ms. Maldret<br>
                    (Level (Age 0 to Age 5.5)<br>
                    00968-97001942<br>
                    muscat@americanlyceum.com
                    <hr class="cut_line">
                    <li class="branch_name"><b>2. International School</b></li>
                    Level: (KG1,KG2,Grade 1, Grade 2, Grade 3,Grade 4,Grade 5)<br>
                    +968-96970503<br>
                    kg@americanlyceum.com
                    <hr class="cut_line">
                </ul>
            </p>
        </div>
        <h4 style="width: 100%;">Pakistan <i class=" fa fa-sort-down" style="float: right;"></i></h4>
        <div>
            <p>
              <ul>
                <li class="branch_name"><b>1. Township branch</b></li>
                58-1-B-1 Main Moulana Shaukat Ali Road, Township<br>
                Contact @ Ms. Khushbakht<br>
                Level (Montessori to O-Level)<br>
                0322-4772707<br>
                township@americanlyceum.edu.pk
                <hr class="cut_line">
                <li class="branch_name"><b>2. Model Town branch</b></li>
                Model Town, 253 G Block.<br>
                Contact @Ms. Azka <br>
                Level:Montessori to Matric/ O-Level<br>
                03224772706<br>
                modeltown@americanlyceum.edu.pk
                <hr class="cut_line">
                <li class="branch_name"><b>3. Johar Town 2 branch</b></li>
                D block<br>
                Contact @ Ms. Afsha<br>
                Level (KG1, KG2, 1,2)<br>
                0322-4772709<br>
                kg@americanlyceum.com
                <hr class="cut_line">
                <li class="branch_name"><b> 4. Wapda Town branch</b></li>
                262-F Main Road Wapda Town<br>
                Contact @ Ms. Kanwal
                03224772710
                wapdatown@americanlyceum.edu.pk
                <hr class="cut_line">
                <li class="branch_name"><b>5. Engineers’Town branch</b></li>
                Engineers Town, Sector B<br>
                Contact @ Ms. Huma Iqbal<br>
                03464292924<br>
                iep@americanlyceum.edu.pk
                <hr class="cut_line">
                <li class="branch_name"><b>6. Premier Branch</b></li>
                Canal Road, Opposite Green Fort, Neat DHA-EME.<br>
                Contact @ Ms. Afifa<br>
                03464292925<br>
                eme@americanlyceum.edu.pk

                <hr class="cut_line">

                <li class="branch_name"><b>7. Gulshan Ravi branch</b></li>
                26-F Main Boulevard, Gulshan Ravi<br>
                Contact @Ms. Warda<br>
                
                03224772708<br>
                gulshanravi@americanlyceum.edu.pk

                <hr class="cut_line">

                <li class="branch_name"><b>8. Allama Iqbal Town branch</b></li>
                Main Boulevard Allama Iqbal Town<br>
                Contact @Ms. Hina<br>
                
                03464292923<br>
                ait@americanlyceum.edu.pk
                <hr class="cut_line">

                <li class="branch_name"><b>9. Canal Bank branch</b></li>
                5-Griffen Scheme Canal Road Mughalpura Lahore<br>
                Contact @ Ms. Fatima khursheed<br>
                
                03464292922<br>
                canalbank_bm@americanlyceum.edu.pk
                <hr class="cut_line">

                <li class="branch_name"><b>10. Arifwala brach</b></li>
                186/k Sahiwal Road Arif Wala<br>
                Contact @ Mr. Awais<br>
                
                03214034324<br>
                arifwala@americanlyceum.edu.pk
                <hr class="cut_line">

                <li class="branch_name"><b>11. Awan Town branch</b></li>
                60 Qutab Block Awan Town Multan road Lahore.<br>
                Contact @ Mr. Furqan Akhtar<br>
                
                0300-4896100<br>
                awantown@americanlyceum.edu.pk
                <hr class="cut_line">

                <li class="branch_name"><b>12. Kasur branch</b></li>
                Bhatta Goriyan Wala, Ghaffar Chowk Kasur<br>
                Contact @ Mr. Asif Baloch<br>
                
                0492-727522 0323-4060080<br>
                kasur@americanlyceum.edu.pk
                <hr class="cut_line">

                <li class="branch_name"><b>13. Faisalabad branch</b></li>
                58 Zia Town opposite United Hospital near Kashmir Pull, Faisalabad<br>
                Contact @ Mr. Nadeem<br>
                
                041-8522888 0300-0266661<br>
                faisalabad1@americanlyceum.edu.pk
                <hr class="cut_line">

                <li class="branch_name"><b>14. Faisalabad 2 branch</b></li>
                182 B Main Road Batala Colony, Faisalabad<br>
                Contact @ Muhammad Musharaf<br>
                
                0300-6608654<br>
                faisalabad2@americanlyceum.edu.pk
                <hr class="cut_line">

                <li class="branch_name"><b>15. NFC branch</b></li>
                House 4-D, 6th Avenue NFC phase 1 Lahore<br>
                Contact @ Ms. Alvi<br>
                
                0423-5457762 0335-0148118<br>
                nfc@americanlyceum.edu.pk
                <hr class="cut_line">

                <li class="branch_name"><b>16. Expo Branch</b></li>
                25 H-1 Johar Town near Expo.<br>
                Contact @ Ms. Sumaira<br>
                
                0331-1142270<br>
                expo@americanlyceum.edu.pk
            <!-- <hr class="cut_line">

            <li class="branch_name"><b>Rawalpindi branch</b></li>
            90 Main Khyaban-e-Tanveer Chaklala Scheme 3 Rawalpindi<br>
            Contact @ Faheem Abbas Dhandla<br>
            
            0333-9950627<br>
            rawalpindi@americanlyceum.edu.pk -->
            <hr class="cut_line">

            <li class="branch_name"><b>17. Muridke branch</b></li>
            Model City housing campus opposite KE lather shop Muridke<br>
            Contact @ Dr Nadeem<br>
            
            0303-5600241<br>
            muridke@americanlyceum.edu.pk
            <hr class="cut_line">

            <li class="branch_name"><b>18. Shahdara branch</b></li>
            Main Sagian bypass road near Sagian police chowki Naain Sukh Shahdara<br>
            Contact @ Ubaid Ullah<br>
            
            03004018104<br>
            shahdara@americanlyceum.edu.pk
            <hr class="cut_line">


            <li class="branch_name"><b>19. Gujranwala-1 </b></li>
            Sialkot bypass road adjacent to University of Central Punjab (UCP) Gujranwala<br>
            Contact @Mr. Awais<br>
            
            0321-111-2082<br>
            gujrawala1@americanlyceum.edu.pk
            <hr class="cut_line">


            <li class="branch_name"><b>20. Ferozepur Road 1 branch</b></li>
            Aashiana Road,Bank Stop, Ferozepur Road Lahore<br>
            Contact @ Muhammad Zaheer<br>
            
            0333-4861481<br>
            ferozpurroad1@americanlyceum.edu.pk
            <hr class="cut_line">

            <li class="branch_name"><b>21. Sialkot 1 branch</b></li>
            American lyceum International School Sialkot campus Sambrial.<br>
            Contact @ Mr.Yaseen Malik, G.M Babur<br>
            
            0321-8705555, 0333-8626825<br>
            sialkot1@americanlyceum.edu.pk
            <hr class="cut_line">


            <li class="branch_name"><b>22. Sheikhupura 1 branch</b></li>
            The new address of building is 22-Boys College Road-Civil Lines, Sheikhupura.<br>
            Contact @ Rizwan Qamar, Danish Ahmad<br>
            
            0300-8875758, 0333-3367555<br>
            sheikhupura1@americanlyceum.edu.pk
            <hr class="cut_line">
<!-- 

            <li class="branch_name"><b>Renala Khurd 1 branch (suspended)</b></li>
            Opposite main gate Sahara City near motorway office Renala Khurd.<br>
            Contact @ Mr. Sajid<br>
            
            0306-9612478<br>
            renalakhurd1@americanlyceum.edu.pk
            <hr class="cut_line"> -->


            <li class="branch_name"><b>23. Westwood branch</b></li>
            Westwood colony, opposite to Metro<br>
            Contact @ Mr. Nasir Ali<br>
            
            0300-4811819<br>
            westwood@americanlyceum.edu.pk
            <hr class="cut_line">


            <li class="branch_name"><b>24. Ferozpur Road Main (2) branch</b></li>
            Purana Kana bus stop main ferozpur road.<br>
            Contact @ Ernest Faheem<br>
            
            +92-324-4990704<br>
            ferozpurroad@americanlyceum.edu.pk
            <hr class="cut_line">


            <li class="branch_name"><b>25. Pattoki Branch branch</b></li>
            Tehsil Pattoki Dist Qasur<br>
            Contact @ M Ammad Bari<br>
            
            +92-321-9422374<br>
            pattoki@americanlyceum.edu.pk
            <hr class="cut_line">


            <li class="branch_name"><b>26. Gulshan-e-Lahore branch</b></li>
            1-B Gulshan e Lahore Society, Lahore<br>
            Contact @ Mr. Adeel<br>
            
            03014148943<br>
            gulshanlahore@americanlyceum.edu.pk
            <hr class="cut_line">


            <li class="branch_name"><b>27. Amir Town branch</b></li>
            Building 28 street no 4, Amir Town hurbans pura, Lahore<br>
            Contact @ Ms. Sumaira Sarfaraz<br>
            
            03080040608<br>
            amirtown@americanlyceum.edu.pk
            <hr class="cut_line">
            <li class="branch_name"><b>28. Kamoki branch</b></li>
            Dr. Rafi road adjacent to Fatima Jinnah College satellite Town GT road kamoki<br>
            Contact @ Naveed Akhter<br>
            
            0321-8705555, 0333-8626825<br>
            rachna@americanlyceum.edu.pk
            <hr class="cut_line">
            <li class="branch_name"><b>29. Khanewal branch</b></li>
            W block main people's colony Road Khanewal .<br>
            0652552337<br>

            khanewal@americanlyceum.edu.pk
            <hr class="cut_line">
            


            <hr class="cut_line">
            <li class="branch_name"><b>30. Toba Tek Singh</b></li>
            Canal Road,  Toba Tek Singh<br>
            Contact @ Mr.Bilal <br>
            0333-6867407<br>
            Tobateksingh@amercianlyceum.edu.pk
            <hr class="cut_line">
            <li class="branch_name"><b>31. Quaid Campus</b></li>
            Main Ferozpur Road near kenchi stop Lahore.<br>
            Contact @ Mr.Rizwan <br>
            0300-8594494<br>
            quaidcampus@americanlyceum.edu.pk
            <hr class="cut_line">
            <li class="branch_name"><b>32. Manawan Campus</b></li>

            OPST Govt girls High school  Main GT Road Manawan Bata Pur<br>
            Contact @ Ms Amina <br>
            0322-424-4220<br>
            manawan@americanlyceum.edu.pk
            <hr class="cut_line">
            <li class="branch_name"><b>33. sharaqpur Campus</b></li>

            Chota Adda sharaqpur<br>
            Contact @ Mr. Eng Mahmood <br>
            0308-4006996<br>
            sharaqpur@americanlyceum.edu.pk
            <hr class="cut_line">
            <li class="branch_name"><b>34. Maragzar Campus</b></li>

            address No. 162 &amp; 163, Block C, Maraghzar colony, Multan Road, Lahore<br>
            Contact @ Mrs. Shazia Zafar <br>
            0322-21-4041841<br>
            maragzar@americanlyceum.edu.pk
            <hr class="cut_line">
            <li class="branch_name"><b>35.Bucheki Campus</b></li>

            Near Hazir Rice Mill Main Jaranwala Road Bucheki<br>
            Contact @ Mr. Ahmad Faraz Bhatti <br>
            0300-2036680<br>
            bucheki@americanlyceum.edu.pk
            <hr class="cut_line">

            <li class="branch_name"><b>36. Shahdara Town Campus</b></li>
            H#130-R-18/4,Near Mp high school main road Shahdara Town Lahore<br>
            Contact @ Ubaid Ullah<br>
            
            03004018104<br>
            shahdaratown@americanlyceum.edu.pk
            <hr class="cut_line">

            <li class="branch_name"><b>37. Gujranwala-2 </b></li>
            93-D G Magnolia Gujranwala<br>
            Contact @Mr. Umar<br>
            
            0333-821-1648<br>
            gujranwala2@americanlyceum.edu.pk
            <hr class="cut_line">
            <li class="branch_name"><b>38. Morekhunda </b></li>
            Main Lahore Road, Khaki Shah, Morekhunda<br>
            Contact @Mr. Bilal Arshad<br>
            
            0321-100-7600<br>
            Morekhunda@americanlyceum.edu.pk
            <hr class="cut_line">
        </ul>
    </p>
</div> 
<input type="hidden" name="ctl00$cphPageBody$public_partctrl_cphPageBody_2$hfPagePartId" id="ctl00_cphPageBody_public_partctrl_cphPageBody_2_hfPagePartId" value="298934">
</div>
</div>


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
</section>
<script>
    $(function() {
        $("#accordion").accordion({
            active: false,
            autoHeight: false,
            navigation: true,
            collapsible: true,
            event: "click"
        });
    });
</script>
<script type="text/javascript">
 $('#home-tab').click(function(){
    console.log('helelo');
    $("#home").show();
    $('#profile').css("display", "none");
});
 $('#profile-tab').click(function(){
     console.log('helelo');
     $("#home").css("display", "none");
     $('#profile').show();
 });
</script>                     
</div>
</div>
</section>
@endsection