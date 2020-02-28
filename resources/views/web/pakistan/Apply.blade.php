@extends('_layouts.web.pakistan.default')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

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
                    <div class="items" style="width: 20000em; left: -1903px;"><div class="item cloned" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/student2.jpg')}});">
                        <img src="{{asset('assets/frontend/images/student2.jpg')}}" alt="First Day of School" class="o-0">
                    </div>
                    <div class="item" id="banner-element-43151" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/about.jpg')}});">
                        <img src="{{asset('assets/frontend/images/student2.jpg')}}" alt="Pep Rally" class="o-0">             
                    </div><!-- item -->
                    <div class="item" id="banner-element-43152" style="height: 607px; width: 1903px; float: left; background-image: url({{asset('assets/frontend/images/mainslider(5).jpg')}});">
                        <img src="{{asset('assets/frontend/images/mainslider(5).jpg')}}" alt="Teaching at Lyceum" class="o-0">
                    </div>
                    <div class="item" id="banner-element-43153" style="height: 607px; width: 1903px; float: left; background-image: url(&quot;../www.speakcdn.com/assets/2532/kids-in-hallway.jpg&quot;);">
                        <img src="../www.speakcdn.com/assets/2532/kids-in-hallway.jpg" alt="First Day of School" class="o-0">
                    </div>
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


    <?php 
$branches=\App\Models\Branch::where('status',1)->get();
$course=\App\Models\Course::where('parentId','>',0)->get();
 ?>

    <section class="default-main content-start relative bg-white">

        <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">


            <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-admissions"> <a href="#">Admission</a></li><li id="bc-how-to-apply"> <a href="#" class="current">How to Apply</a></li></ul>
            <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

            </div>

        </div>

        <div class="flex flex-row-ns flex-column flex-wrap mw8 center relative" style="border: 1px solid #ccc;margin-bottom: 20px;box-shadow: 0px 2px 2px #ccc;">

            <div class="w-100" style="text-align: center; background-color: aliceblue;margin-bottom: 20px;">

                <h3 class=" pr4-ns hidden-element fade-down element-load" style="color: #656e77;">How to Apply</h3>

            </div>
            @if(Session::has('error_message'))
            <script type="text/javascript">
                sweetAlert(
                  'Ops',
                  'please try again',
                  'danger'
                  )
              </script>
              @endif
              @if(Session::has('success_message'))
              <script type="text/javascript">
                sweetAlert(
                  'thanks you',
                  'Your application has been submitted Successfully . we will contact you soon',
                  'success'
                  )
              </script>
              @endif
              <div class="col-md-12">
                <form action="{{route('admission_query')}}" method="post">
                    @csrf
                    <input type="hidden" name="schoo_id" value="1">
                    <div class="row">
                      <div class="col-md-6">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="textx" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required="">
                            <div class="alert alert-danger name-error" style="display:none">
                                <p style="color: red">Name is required</p>
                            </div>
                            
                        </div>
                        <div class="form-group">
                              <label for="sel1">Branch</label>
                              <select class="form-control" id="sel1">
                                @foreach($branches as $branch) 
                                <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                @endforeach
                              
                            </select>
                        </div>
                        <div class="form-group">
                         <label for="dob"> Date Of Birth</label>
                         <input type="text" name="dob" class="form-control" id="dob" placeholder="age">
                     </div>
                     <div class="form-group">
                        <label for="branch_id">Want to join</label>
                        <select class="form-control" name="branch_id" id="branch_id" required="">
                            <option selected="selected" disabled="disabled">Seclect Branch</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address" placeholder="address"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                  
                <div class="form-group">
                   <label for="fname">Father Name</label>
                   <input type="text" name="fname" class="form-control" id="fname" placeholder="Father name">
               </div>
               <div class="form-group">
                      <label for="sel1">class</label>
                      <select class="form-control" id="sel1">
                        @foreach($course as $cour)
                        <option value="{{$cour->id}}">{{$cour->course_name}}</option>
                        @endforeach
                       
                    </select>
                </div>
               <div class="form-group">
                <label for="phone">Cell No#</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email Address">
            </div>
            <div class="form-group">
                <label for="schoolStudy">School where study</label>
                <textarea name="schoolStudy" class="form-control" id="schoolStudy" placeholder="School Study?"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <input type="submit" class="btn btn-success " style="float: right;">
    </div>
</form>
</div>
<!-- 
            <input type="hidden" name="ctl00$cphPageBody$hfExistingUrl" id="ctl00_cphPageBody_hfExistingUrl" value="/how-to-apply">
            <script type="text/javascript">
                //<![CDATA[
                Sys.WebForms.PageRequestManager._initialize('ctl00$cphPageBody$ctl00', 'aspnetForm', [], [], [], 90, 'ctl00');
                //]]>
            </script>






            <input name="ctl00$cphPageBody$public_partctrl_cphPageBody_1$hfPagePartId" type="hidden" id="ctl00_cphPageBody_public_partctrl_cphPageBody_1_hfPagePartId" value="295006">
            <div class="templatecontent ">
                <p class="no-border">Thank you for your interest in pursuing your child’s admission to American Lyceum International School. The first step in our admission process begins with an online application or you can visit your nearest branch.  You may begin your online application by clicking on the link below. We have also included the remaining steps by grade level for you to review prior to submitting your application including admission forms and assessment and student visit details.</p>

                

                <h4>Start Your Application Process</h4>

                <p><a class="btn" href="javascript:;" target="_blank">New Application </a><br>
                    

                -->




            </div>

            <div class="side-section w-30-l w-30-m w-100 pl4-l pl3-m">

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