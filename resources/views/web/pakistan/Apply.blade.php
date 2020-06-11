@extends('_layouts.web.pakistan.default')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


<div id="siteWrapper" class="slide-right" style="overflow:hidden;">
  <div class="body-overlay"></div>
  <style>
    .form-control {
      width: 100%;
    }
    .multiselect-container {
      box-shadow: 0 3px 12px rgba(0,0,0,.175);
      margin: 0;
    }
    .multiselect-container .checkbox {
      margin: 0;
    }
    .multiselect-container li {
      margin: 0;
      padding: 0;
      line-height: 0;
    }
    .multiselect-container li a {
      line-height: 25px;
      margin: 0;
      padding:0 35px;
    }
    .custom-btn {
      width: 100% !important;
    }
    .custom-btn .btn, .custom-multi {
      text-align: left;
      width: 100% !important;
    }
    .dropdown-menu > .active > a:hover {
      color:inherit;
    }
    .chosen-container-multi .chosen-choices {
      padding: 2px 5px!important;
      border-radius: 5px!important;
      height: auto!important;
      border: 1px solid #484242!important;
    }
    label {
      width: 100%;
      display: flex;
      margin-bottom: 5px;
      font-weight: 700;
    }
    .radio-inline + .radio-inline, .checkbox-inline + .checkbox-inline {
      margin-top: 0;
      margin-left: 0px!important;
    }
    .chosen-select{
      max-width: 350px!important;
    }
    #country_id{
      max-width: 350px!important;
      height: 32px;
    }
    .select2-selection__rendered{
      max-width: 350px!important;
    }
    /* Dropdown Button */
    .acdmics_heading{
      font-weight: bold;
      background: aliceblue;
      margin-bottom: 10px;
      padding: 8px 2px;
      text-align: center;  
    }
    .dropbtn {
      background-color: #ececec;
      color: #000000;
      padding: 10px;
      font-size: 1em;
      border: none;
      cursor: pointer;
      border: 1px solid #ddd;
      font-family: sans-serif;
      width: 100%;
      min-width: 90px;
      border-radius: 2px;
    }


    /* Dropdown button on hover & focus */

    .dropbtn:hover,
    .dropbtn:focus {
      background-color: #ededed;
    }


    /* The container <div> - needed to position the dropdown content */

    .dropdown {
      position: relative;
      display: inline-block;
    }
    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      display: none;
      position: absolute;
      z-index: 9;
      background-color: #ffffff;
      border-top-left-radius: 2px;
      border-top-right-radius: 2px;
      border-bottom: 4px solid #1F45A3;
      min-width: 110px;
      box-shadow: 0px 2px 20px 0px rgba(31, 69, 163, 0.25);
      padding: 3px;
    }
    /*Drop down radio and label main div*/
    .whr-drop-main {
      width: 100%;
      float: left;
      margin-top: 3%;
      margin-bottom: 5%;
    }
    /* Links inside the dropdown */
    /*Radio Button Class*/
    .whr-used-drop {
      float: left;
    }
    /*Label Class*/
    .whr-used-drop-lbl {
      font-family: sans-serif;
      font-size: 1em;
      color: #3D3D3D;
    }
    /* Show/Hide the dropdown menu (JS) when the user clicks on the dropdown button) */
    .whr-drop-hide {
      display: block;
    }
    .chosen-choices{
      max-width: 350px!important;
      height: 32px!important;
    }
    #residence{
      max-width: 350px;
    }
    .table_1 td th{
      border: 1px solid #ccc;
      padding: 0px 2px!important;
    }
  </style>
  <div  class="form_layout">
  </div>


  <div class="scrollable" style="
 height: 143px;
    padding: 56px;
    width: 200;
    padding-bottom: 44px;
    margin-top: 128px;
    min-height: 100%;
    background: linear-gradient(0deg, rgb(0, 0, 0, 0.6), rgb(0, 0, 0,0.6)), url(http://127.0.0.1:8000/images/job_imags.jpg);
    background-size: cover;"
  >
  <h2 class="apply_now" style="margin-top: 120px;
  text-align: center;
  text-shadow: 0px 4px 2px #000000;
  font-size: 36px;
  margin: 0 auto;
  color: white;
  padding: 6px;
  border-bottom-right-radius: 25px;
  border-bottom-left-radius: 25px;
}">Register Your Child </h2>
</div>

</div>
<div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative" style="padding-top: 0px!important;">
  <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
  </div>
</div>
<div class="clear-fix"></div>
<div class="" style="background-image: url('');">
  <?php 
  $branches=\App\Models\Branch::where('status',1)->get();
  $course=\App\Models\Course::where('parentId','>',0)->get();
  ?>

  <section class="default-main content-start relative bg-white">

    <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">


      <ul id="breadcrumb"><li id="bc-home"> <a href="#" class="first"></a></li><li id="bc-admissions"> <a href="#">Admission</a></li><li id="bc-how-to-apply"> <a href="#" class="current">Register Your Child</a></li></ul>
      <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">

      </div>

    </div>

    <div class="flex container flex-row-ns flex-column flex-wrap mw8 center relative" style="margin-top: 30px;  border: 1px solid #ccc;margin-bottom: 20px; box-shadow: 0px 2px 2px #ccc;">


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
          <form action="{{route('admission_query')}}" method="post" style="width: 100%;">
            @csrf
            <input type="hidden" name="schoo_id" value="1">
            <br>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name"  placeholder="Enter Name" required="">
                    <div class="alert alert-danger name-error" style="display:none">
                      <p style="color: red">Name is required</p>
                    </div>

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   <label for="fname">Father Name</label>
                   <input type="text" name="fname" class="form-control" id="fname" placeholder="Father name">
                   <div class="alert alert-danger fname-error" style="display:none">
                      <p style="color: red">Name is required</p>
                    </div>
                 </div>

               </div>


              <div class="col-md-6">
                <div class="form-group">
                 <label for="dob"> Date Of Birth</label>

                 <div class="ui calendar" id="example12" style="width: 100%">
                    <div class="ui input" style="width: -webkit-fill-available!important;">
                      <input type="text" class="form-control" value="{{old('dob')}}" name="dob" id="dob" autocomplete="off"  placeholder="dob" required="">
                      
                    </div>
                  </div>

<div class="alert alert-danger dob-error" style="display:none">
                      <p style="color: red">Name is required</p>
                    </div>

               </div>                
             </div>
             <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email Address">
              
              </div>

            </div>


          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Cell No#</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No">
               
              </div>
               <div class="alert alert-danger phone-error" style="display:none">
                      <p style="color: red">Phone is required</p>
                    </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
              <label for="address">Address</label>
              <input name="address" class="form-control" id="address" placeholder="address">
              <div class="alert alert-danger address-error" style="display:none">
                      <p style="color: red">address is required</p>
                    </div>
            </div>

          </div>


        </div>

        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Want to join</label>
                 <select class="form-control" name="branch_id" id="branch_id" required="">
                    @foreach($branches as $branch) 
                      <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sel1">class</label>
                <select class="form-control" id="sel1" name="course_id" required="">
                  @foreach($course as $cour)
                  <option value="{{$cour->id}}">{{$cour->course_name}}</option>
                  @endforeach

                </select>
              </div>

          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_school">Last School</label>
                <input type="text" name="last_school" class="form-control" id="last_school" placeholder="Last School">
              </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
              <label for="last_result">Last Result</label>
              <input name="last_result" class="form-control" id="last_result" placeholder="Last Result">
            </div>

          </div>


        </div>


      </div>


      <div class="col-md-12">
        <button  class="btn btn-success  btn-md"  onclick="jobFormSubmit(this)" style="float: right;">NEXT </button>
      </div>
    </form>
  </div>




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

@push('post-scripts')

    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
    
<script>
  var today = new Date();
    $('#example12').calendar({
      monthFirst: false,
      type: 'date',
  });
 




  function jobFormSubmit(ob){

  var valid = true;   

   $('.name-error').css('display','none');
   $('.fname-error').css('display','none');
   $('.phone-error').css('display','none');
   $('.address-error').css('display','none');
 


  if ($('#name').val() == '') {
    console.log('name',$('#name').val());
      $('.name-error').text('name field is required');
      $('.name-error').css('display','block','color','red','border-color','red');

      valid = false;
    }


    if ($('#fname').val() == '') {
     console.log('fname',$('#fname').val());
     $('.fname-error').text('father name field is required');
     $('.fname-error').css('display','block','color','red','border-color','red');
   
     valid = false;
   }


   if ($('#dob').val() == '') {
     console.log('dob',$('#dob').val());
     $('.dob-error').text('date field is required');
     $('.dob-error').css('display','block','color','red','border-color','red');
 
     valid = false;
   }

  
   if ($('#phone').val() == '') {
     console.log('phone',$('#phone').val());
     $('.phone-error').text('phone field is required');
     $('.phone-error').css('display','block','color','red','border-color','red');
  
     valid = false;
   }
   if ($('#address').val() == '') {
     console.log('address',$('#address').val());
     $('.address-error').text('address field is required');
     $('.address-error').css('display','block','color','red','border-color','red');
   

     valid = false;
   }

   




   if(valid){
     ob.disabled = true;
          // submit the form    
          ob.form.submit();
          return true;
        }
      
      }
    </script>
  @endpush