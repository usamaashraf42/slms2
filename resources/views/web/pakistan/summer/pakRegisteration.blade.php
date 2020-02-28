
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
        <div class="slider">
            <input type="hidden" name="ctl00$cphPageBanner$public_partctrl_cphPageBanner_1$hfPagePartId" id="ctl00_cphPageBanner_public_partctrl_cphPageBanner_1_hfPagePartId" value="298972">
            <div class="hero-container relative w-100 overflow-hidden ">
                <div class="slider" style="height: 200px;">
                    <input type="hidden" name="ctl00$cphPageBanner$public_partctrl_cphPageBanner_1$hfPagePartId" id="ctl00_cphPageBanner_public_partctrl_cphPageBanner_1_hfPagePartId" value="298972">



                    <div class="swRotator swSlider " id="swSlider-298972">
                        <div class="scrollable" style="height: 200px; width: 100%;">

                        </div>
                    </div>
                </div>

                <section class="default-main content-start relative bg-white">
                    {{--<h4>Please fill out the New application of American lyceum Admission </h4>--}}


                    <div class="container" style="align-content: center;text-align: center">
                     <a href="{{route('summer-detail')}}"><span class="fa fa-info-circle" aria-hidden="true">Information about summer camp plan </span></a>
                     <h4>Summer Camp Registration</h4>
                 </div>
                 <div class="col-md-6">
                    <form action="{{route('registeration')}}" method="post">
                        {{csrf_field()}}
                        <div class="col-md-6">
                            {{--inner form dive col 6--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="textx" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
                                <div class="alert alert-danger name-error" style="display:none">
                                    <p style="color: red">Name is required</p>
                                </div>
                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                            <div class="form-group">
                               <label for="dob"> Date Of Birth</label>
                               <input type="text" name="dob" class="form-control" id="dob" placeholder="age">
                           </div>
                           <div class="form-group">
                            <label for="branch_id">Want to join summer camp in</label>
                            <select class="form-control" name="branch_id" id="branch_id" required>
                                <option disabled="disabled" selected="selected">Seclect Branch</option>
                                @php($oman=\App\Models\Branch::where('b_countryCode',92)->where('isFranchise',1)->get())
                                @foreach($oman as $om)
                                <option value="{{$om->b_id}}">{{$om->branch_name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" id="address" placeholder="address"></textarea>
                        </div>
                        

                    </div>
                    {{--end inner form div--}}
                    <div class="col-md-6">
                        {{--inner form 2nd div start--}}
                        <div class="form-group">
                         <label for="fname">Father Name</label>
                         <input type="text" name="fname" class="form-control" id="fname" placeholder="Father name">
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

                    {{--<div class="form-check">--}}
                        {{--<input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                        {{--<label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                    {{--</div>--}}
                </div>
                <div class="col-md-6">
                    <input type="submit" class="btn btn-success " >
                </div>
            </form></div>

            {{--righ side space--}}
            <div class="col-md-6">
                <img src="{{asset('images/web/SummerCampBrochure.png')}}">
            </div>
</section>
</div>
</div></div></div>
        {{--</div>--}}
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @if(Session::has('error_message'))
    <script type="text/javascript">
    	
    	swal("Oops!", "Failed To Registeration", "error");
    </script>
    @endif

    @if(Session::has('success_message'))
    <script type="text/javascript">

       swal("Thanks For Registeration!", "We will contact you soon", "success");

   </script>
   @endif

   @endsection