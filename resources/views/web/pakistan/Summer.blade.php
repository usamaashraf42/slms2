@extends('_layouts.web.pakistan.default')
@section('content')
<div class="hero-container relative w-100 overflow-hidden">
  <div class="slider">
    <input type="hidden" name="ctl00$cphPageBanner$public_partctrl_cphPageBanner_1$hfPagePartId" 
    id="ctl00_cphPageBanner_public_partctrl_cphPageBanner_1_hfPagePartId" value="298972">
    <div class="swRotator swSlider " id="swSlider-298972">
      <div class="scrollable" style="height: 200px; width: 100%;">
      </div>
    </div>
  </div>
  <section class="default-main content-start relative bg-white">

    <div class="container" style="align-content: center;text-align: center">
      <!-- <p><a href="{{route('summer-detail')}}"><span class="fa fa-info-circle" aria-hidden="true">Information about summer camp plan </span></a> -->
        <h4> Camp Registration</h4></p>
      </div>
      <div class="col-md-6">
                    <form action="{{route('registeration')}}" method="post">
                        {{csrf_field()}}

                      

                        <input type="hidden" name="type" value="camp">
                        <input type="hidden" name="school_id" value="1">
                        <div class="col-md-6">
                            {{--inner form dive col 6--}}
                            <div class="form-group">
                                <label for="">School</label>
                                <select class="form-control" name="" id="" name="" id="" disabled="true">
                                    <option value="2" >Royal Lyceum School System</option>
                                    <option value="1" selected>American Lyceum International School System </option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="event_name">Select camp</label>
                              <select class="form-control" name="event_name" id="event_name" required>
                                  <option  value="robotics and fista">robotics and fista</option>
                                 <option value="winter camp"> Winter Camp</option>
                                 <option value="Summer camp"> Summer Camp</option>
                              </select>
                            </div>
                             <div class="form-group">
                         <label for="fname">Father Name</label>
                         <input type="text" name="fname" class="form-control" id="fname" placeholder="Father name">
                     </div>

                            
                            <div class="form-group">
                               <label for="dob"> Date Of Birth</label>
                               <input type="text" name="dob" class="form-control" id="dob" placeholder="age">
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
                            <label for="branch_id">Where want to join camp in</label>
                            <select class="form-control" name="branch_id" id="branch_id" required>
                                <option disabled="disabled" selected="selected">Seclect Branch</option>
                                @php($oman=\App\Models\Branch::where('b_countryCode',92)->get())
                                @foreach($oman as $om)
                                <option value="{{$om->id}}">{{$om->branch_name}} </option>
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="textx" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
                                <div class="alert alert-danger name-error" style="display:none">
                                    <p style="color: red">Name is required</p>
                                </div>
                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
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
                <div class="col-md-6">
                    <input type="submit" class="btn btn-success " >
                </div>
            </form></div>
  {{--righ side space--}}
  <div class="col-md-6">
   <img src="{{asset('images/camps.jpeg')}}">
 </section>
</div>
</div>
</div>
</div>
{{--</div>--}}
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