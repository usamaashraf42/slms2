@extends('_layouts.admin.default')
@section('title', 'Student Edit')
@section('content')
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
<div  class="col-sm-12">
  <hr/>
  <div class="col-md-12" style="display: none">
    <input type='button' id='btn' value='Print' onclick="printDiv(this,printAllRecord);" class="btn btn-primary float-center allrecord" style="width: 100%;">
  </div>
  <div class="row">
    <div class="col-md-12"> <!-- required for floating -->
      <!-- Nav tabs -->
      <ul class="nav nav-tabs tabs-left sideways">
        <li class="active" class="disabled"><a href="#home-v" data-toggle="tab">Personal info</a></li>
        <li class="disabled"><a href="#profile-v" data-toggle="tab">Guardian/Parents</a></li>
        <li class="disabled"><a href="#messages-v" data-toggle="tab">Admission Info</a></li>
        <li class="disabled"><a href="#settings-v" data-toggle="tab">Medical Info</a></li>
        <li class="disabled"><a href="#messages-v2" data-toggle="tab">Transport</a></li>
      </ul>
    </div>

    <div class="col-md-12">
      <!-- Tab panes -->
      <form method="POST" id="contact" action="{{route('students.update',$student->id)}}" enctype="multipart/form-data" style="margin: 20px;">
        <div>
          <h3>Student Admission</h3>
          <section>
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="medical_document_images[]" class="medical_document_images" id="medical_document_images" value="">

            @component('_components.alerts-default')
            @endcomponent
            <div class="tab-content">
              <div class="tab-pane active" id="home-v" style="background-color: #fff!important;">  
                @if(!(isset(Auth::user()->branch_id)) && empty(Auth::user()->branch_id))
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <label class="control-label" style="width: 100%;">Branch 
                        <span style="color: red">*</span></label>
                        <select class="form-control-1 branch_id" name="branch_id"  id="select_branch" required style="width: 100%!important; height: 35px;" disabled="true">
                          <option selected="selected" disabled="disabled">All Branches</option>
                          @if(!empty($branches))
                          @foreach($branches as $branch)
                          <option value="{{$branch['id']}}" @if($student->branch_id==$branch['id']) selected @endif>{{$branch['branch_name']}}</option>
                          @endforeach
                          @endif
                        </select>
                        <p class="alert alert-danger branch_id_error" style="display: none"></p>
                      </div>
                    </div> 
                  </div>
                  @endif

                  <div class="col-md-12">
                    <div id="AdmissionInfoForm" class="row" >
                      <div class="col-md-5 col-sm-4">
                        <label class="control-label" style="width: 100%;">Name 

                          <span style="color: red">*</span></label>
                          <input class="form-control " name="s_name" value="{{$student->s_name}}"  id="s_name" type="text" placeholder="Enter the student Name">

                          <p class="alert alert-danger s_name" style="display: none"></p>



                          <label class="control-label" style="width: 100%;">Date Of Birth (child)   <span style="color: red">*</span></label>
                          <div class="ui calendar" id="dateofbirth" style="width: 100%;">
                            <div class="ui input" style="width: -webkit-fill-available!important;">
                              <input class="form-control" name="s_DOB" id="s_DOB" value="{{$student->s_DOB}}" type="text">

                            </div>
                            <p class="alert alert-danger s_DOB_eror" style="display: none"></p>
                          </div>



                          <label type="radio"  class="control-label" style="width: 100%;">Father Name    <span style="color: red">*</span>
                          </label>


                          <input class="form-control" value="{{$student->s_fatherName}}" name="s_fatherName" id="s_fatherName" type="text" placeholder="Enter The Father Name" class="input-xlarge">
                          <p class="alert alert-danger s_fatherName" style="display: none"></p>

                          <label class="control-label" style="width: 100%">Nationality <p class=" country-error" style="display:block;color:red">
                          </p></label>
                          <select class="form-control-1" name="country_id" id="country_id" type="text" placeholder="country" class="input-xlarge" style="width: 100%!important; height: 35px;">
                            <option disabled="disabled" selected="selected">Choose the Nationality</option>
                            @php($oman=\App\Models\Country::get())
                            @foreach($oman as $om)
                            <option value="{{$om->id}}" @if($student->country_id==$om->id) selected @endif>{{$om->nam}} </option>
                            @endforeach>
                          </select>
                          <label class="control-label">Father's Qualification</label>
                          <input class="form-control" name="father_qualification" value="{{$student->father_qualification}}" type="text" placeholder="Father's Qualification">

                        </div>
                        <div class="col-md-5 col-sm-4">
                          <br>
                          <div class="form-control" >
                            <label class="radio-inline">
                              <input type="radio" class="s_sex" name="s_sex" @if(isset($student->s_sex) && $student->s_sex=='male') checked @endif  value="male" placeholder="male">  Male</label>
                              <label class="radio-inline">
                                <input type="radio" name="s_sex" class="s_sex"  @if(isset($student->s_sex) && $student->s_sex=='female') checked @endif value="female" placeholder="female"> Female</label>
                                <p class="alert alert-danger s_sex_error" style="display: none"></p>
                              </div>
                              <label class="control-label">Father CNIC / Resident Card / Civil Number</label>
                              <input class="form-control" value="{{isset($student->father_cnic)?$student->father_cnic:old('father_cnic')}}" name="father_cnic" type="text" placeholder="Enter the Father CNIC" class="input-xlarge">

                              <label class="control-label">Father's Occuption</label>
                              <input class="form-control" value="{{isset($student->father_occuption)?$student->father_occuption:old('father_occuption')}}" name="father_occuption" type="text" placeholder="Enter the Father's Occuption">
                              <label class="control-label">Religion</label>
                              <input class="form-control" type="text" value="{{isset($student->religion)?$student->religion:old('religion')}}" name="religion" placeholder="Religion" class="input-xlarge">
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12" style="text-align: center;">
                              <div class="form-group">
                                <label>Profile Image</label>
                                <div style="max-height: 250px; max-width: 200px;">
                                  <img id='profile'    @isset($student->images ) src="{{asset('images/student/pics/'.$student->images)}}" @endisset height="200px" width:150px; style="width: 100%!important; margin-bottom:15px;">
                                </div>
                                <div class="input-group" style="text-align: left;">
                                  <span class="input-group-btn">
                                    <label for="images" class="btn btn-primary nextmove">Upload Profile</label>
                                    <input type="file" id="images" value="{{ old('images') }}" name="images" class="hide" style="opacity: 0;">
                                  </span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-3">
                                  <ul class="list-inline pull-right">
                                    <li><input  class="btn btn-info prev-step personalFormPrevous" readonly="" value="Previous"></li>
                                    <li><input class="btn btn-primary next-step personalFormNext" onclick="personalFormSubmit(this)" readonly="" value="Next"></li>
                                  </ul>  
                                </div>    
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="profile-v">  
                        <div class="col-md-12">
                          <div class="row" style="background-color: #fff;">
                            <div class="col-md-12">
                             <div class="row">
                              <div class="col-md-6">
                                <label class="control-label" style="width: 100%">Emergency Mobile <span style="color: red">*</span></label>
                                <input class="form-control" type="text" 
                                value="{{isset($student->emergency_mobile)?$student->emergency_mobile:old('emergency_mobile')}}" 
                                id="emergency_mobile" name="emergency_mobile" placeholder="">
                                <p class="alert alert-danger emergency_mobile_eror" style="display: none"></p>
                              </div>
                              <div class="col-md-6">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="email"  value="{{isset($student->std_mail)?$student->std_mail:old('std_mail')}}" name="std_mail" placeholder="jsmith@yourcompany.com">
                              </div>
                            </div>
                            <hr>
                            <div class="row parents">
                              <table class="table table-bordered">
                                <thead class="thead-light">
                                  <tr>
                                    <th>Relation</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>CNIC</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="qualificationRows">
                                  @isset($student->StudentParent)
                                  @foreach($student->StudentParent as $parent)
                                  <tr>
                                    <td><select class="form-control" type="text"  value="" name="relation_type[]" >
                                      <option disabled="disabled" selected="selected">Choose the Relation</option>
                                      <option value="Mother" @if($parent->std_relation=='Mother') selected @endif>Mother</option>
                                      <option value="father" @if($parent->std_relation=='father') selected @endif>Father</option>
                                      <option value="Brother" @if($parent->std_relation=='Brother') selected @endif>Brother</option>
                                      <option value="Sister" @if($parent->std_relation=='Sister') selected @endif>Sister</option>
                                      <option value="Uncle" @if($parent->std_relation=='Uncle') selected @endif>Uncle</option>
                                      <option value="Anti" @if($parent->std_relation=='Anti') selected @endif>Anti</option>
                                    </select></td>
                                    <td> <input class="form-control" name="parent_name[]" id="parent_name[]" type="text" value="{{isset($student->name)?$student->name:old('name')}}" placeholder="Enter the Name :" ></td>
                                    <td><input class="form-control" name="parent_phone[]" id="parent_phone[]" value="{{isset($student->phone)?$student->phone:old('phone')}}" type="number" placeholder="Enter the Mobile No :" ></td>
                                    <td><input class="form-control" name="parent_address[]" id="parent_address[]" value="{{isset($student->address)?$student->address:old('address')}}" type="text" placeholder="Enter the Address :" >
                                    </td>
                                    <td><input  class="form-control" name="parent_cnic[]" id="parent_cnic[]" value="{{isset($student->cnic)?$student->cnic:old('cnic')}}" type="text" placeholder="Enter the Cnic :" ></td>
                                    <td> <input  class="form-control" name="parent_email[]" id="parent_email[]" value="{{isset($student->email)?$student->email:old('email')}}" type="email" placeholder="Enter the Email :" ></td>

                                  </tr>
                                  @endforeach
                                  @endif

                                </tbody>
                              </table>
                              <div class="btn btn-success pull-right addQualification">+</div>
                            </div>

                            <div class="row addParents">

                            </div>
                            <div class="row">
                              <br>
                                <!-- <div class="col-md-12 float-right">
                                  <br>
                                  <input class="btn btn-primary float-right addGuardian" readonly value="+"> 
                                </div>
                              -->
                            </div>
                            <hr>
                            <div class="row">
                             <div class="col-md-6">
                              <label class="control-label">Home Address : <span style="color: red">*</span></label>
                              <textarea class="form-control" name="home_address" id="home_address" type="text" placeholder="Enter the home Address" class="input-xlarge">
                               {{isset($student->home_address)?$student->home_address:old('home_address')}}
                             </textarea>
                             <p class="alert alert-danger home_address_eror" style="display: none"></p>
                           </div>


                         </div>
                       </div>

                       <div class="col-md-12">

                         <div class="row">
                          <div class="col-md-8"></div>
                          <div class="col-md-8"></div>  <div class="col-md-3">
                            <ul class="list-inline pull-right">
                              <li><input  class="btn btn-info prev-step" readonly="" value="Previous"></li>
                              <li><input class="btn btn-primary next-step" onclick="guardianFormSubmit(this)" readonly="" value="Next"></li>
                            </ul>  
                          </div>              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="messages-v"> 
                  <div class="col-md-12">
                    <div class="row" style="background-color: #fff;">
                     <div class="col-md-6">
                      <label class="control-label">Class in which admission is sought * </label>
                      <select class="form-control-1 course_id" name="course_id" id="course_id" style="width: 100%;" onchange="sectionSelect(this)">
                        <option disabled="disabled" selected="selected">Choose the Class</option>
                        @foreach($courses as $cours)
                        <option value="{{$cours->id}}" @if($student->course_id==$cours->id) selected @endif>{{$cours->course_name}}</option>
                        @endforeach
                      </select>
                      <p class="alert alert-danger course_id_eror" style="display: none"></p>
                    </div>
                    <div class="col-md-6">
                     <label class="control-label">Choose the Section</label>
                     <select class="form-control section_id" name="section_id" id="section_id" style="width: 100%;">
                     </select>
                   </div>
                   <div class="col-md-6">
                     <label class="control-label">Name of the last school</label>
                     <input class="form-control" type="text" placeholder="Enter the name of the last school :" class="input-xlarge">
                   </div>
                   <div class="col-md-6">

                    <label class="control-label">Admission Package :</label>
                    <select class="form-control" type="text" name="adm_package_id" placeholder="Enter the package" class="input-xlarge">
                      <option>Choose the package</option>
                      @php($pack=\App\Models\AdmissionPackage::where('status',1)->get())
                      @foreach($pack as $package)
                      <option value="{{$package->id}}" @if($student->adm_package_id==$package->id) selected @endif>{{$package->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6">
                   <label class="control-label">Other kids In school</label>
                   <input class="form-control" type="text" placeholder="Other kids In school..." class="input-xlarge">
                 </div>

                 <div class="col-md-6">
                  <label class="control-label">Reason for choosing American Lyceum</label>
                  <input class="form-control" type="text" placeholder="Enter the reason " class="input-xlarge">
                </div>
                <div class="col-md-6">
                  <label class="control-label">Remarks :</label>
                  <textarea class="form-control" type="text" placeholder="Enter the Remarks" class="input-xlarge"></textarea>
                </div>

                <div class="col-md-12">

                  <div class="row">
                    <div class="col-md-8"></div>  <div class="col-md-3">
                      <ul class="list-inline pull-right">
                        <li><input  class="btn btn-info prev-step" readonly="" value="Previous"></li>
                        <li><input class="btn btn-primary next-step"   onclick="admissionFormSubmit(this)" readonly=""  value="Next"></li>
                      </ul>  
                    </div>              
                  </div>
                </div>
              </div></div>
            </div>
            <div class="tab-pane" id="settings-v"> 
              <div class="col-md-12">   
                <div class="row" style="background-color: #fff;">
                 <div class="col-md-6">
                  <label class="control-label">Eye Sight is normal <span style="color:red">*</span></label>
                  <div class="form-control" id="eye_sight">
                    <label class="checkbox-inline">
                      <input type="checkbox" name="eye_sight" value="1" @if($student->eye_sight==1) checked @endif placeholder="">  Yes</label>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="eye_sight" value="0" @if($student->eye_sight==0) checked @endif placeholder=""> No</label>
                      </div>
                    </div>

                    <div class="col-md-3">
                     <label class="control-label">Number of glasses :</label>
                     <input class="form-control"  type="number" step="any" min="0" placeholder="Enter the Number of glasses :" class="input-xlarge">
                   </div>
                   <div class="col-md-3">
                    <label class="control-label">Any Other Eye Disease</label>
                    <input class="form-control" name="eye_disease" value="{{$student->eye_disease}}" type="text" placeholder="Eye Disease" class="input-xlarge">
                  </div>
                  <div class="col-md-6">

                    <label class="control-label">Allergies (if any): </label>
                    <textarea class="form-control" type="text" name="disease" value="{{$student->disease}}" placeholder="Allergies (if any)" class="input-xlarge">

                    </textarea>  


                  </div>
                  <div class="col-md-6">
                    <label class="control-label">Medical Caution (If any)</label>
                    <textarea class="form-control" name="medical_caution" value="{{$student->medical_caution}}"  type="text" placeholder="Medical Caution (If any)"></textarea> 

                  </div>
                  <div class="col-md-12">
                    <label class="control-label">Does a child has any contagious disease : </label>
                    <textarea class="form-control" name="contagious_disease" value="{{$student->contagious_disease}}" type="text" placeholder="any contagious disease"></textarea> 

                  </div>

                  <div class="col-md-6">

                    <label class="control-label">Vaccination : <span style="color: red">*</span></label>
                    <div class="form-control" id="vecination">
                      <label class="radio-inline">
                        <input type="radio" name="vecination" value="1" @if($student->vecination==1) checked @endif placeholder="">  Yes</label>
                        <label class="radio-inline">
                          <input type="radio" name="vecination" value="0" @if($student->vecination==0) checked @endif placeholder=""> No</label>
                        </div> 

                      </div>
                      <div class="col-md-6">
                        <div class="clsbox-1" runat="server">
                          <div class="dropzone clsbox" id="medical_file_dropzone">
                            <div class="dz-message" data-dz-message><span>Click here or drag/drop Medical Document to upload.</span></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">

                        <div class="row">
                          <div class="col-md-8"></div>  <div class="col-md-3">
                            <ul class="list-inline pull-right">
                             <li><input  class="btn btn-info prev-step" readonly="" value="Previous"></li>
                             <li><input class="btn btn-primary next-step" onclick="settingFormSubmit(this)" readonly=""  value="Next"></li>
                           </ul>  
                         </div>              
                       </div>
                     </div>
                   </div>
                 </div>
               </div>

               
               <div class="tab-pane" id="messages-v2" > 
                <div class="col-md-12">
                 <div id="tab6" class="row" style="background-color: #fff">
                   <div class="col-md-6">
                    <label class="control-label">Route Name: </label>
                    <select class="form-control" type="text" placeholder="Enter the home Address" name="route_id" class="input-xlarge" >
                      <option disabled="disabled" selected="selected">Choose the Route</option>

                    </select>
                  </div>
                  <div class="col-md-6">
                   <label class="control-label">Destination:</label>
                   <select class="form-control" type="text" placeholder="Enter the home Address" name="destination_id" class="input-xlarge" >
                    <option disabled="disabled" selected="selected">Choose the Destination</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Start Date</label>
                  <input class="form-control transport_start_date" id="transport_start_date" name="transport_start_date" type="text" placeholder="Father Mobile" class="input-xlarge">
                </div>
                <div class="col-md-4">
                  <label class="control-label">End Date</label>
                  <input class="form-control transport_end_date" id="transport_end_date" name="transport_end_date" type="text" placeholder="End Date" class="input-xlarge">
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-8"></div>  <div class="col-md-3">
                      <ul class="list-inline pull-right">
                        <li><button type="submit" class="btn btn-primary " name="submit">Save</button></li>

                      </ul>  
                    </div>              
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    


    <style type="text/css">
      body{ 
       margin-top:40px; 
     }
     .form-control-1{
      width: 100%!important; height: 35px!important;
    }
    .tab-pane{
      background-color: #fff!important;

    }
    .stepwizard-step p {
     margin-top: 10px;
   }
   .nextmove{
    margin: 10px;
  }
  .stepwizard-row {
   display: table-row;
 }

 .stepwizard {
   display: table;
   width: 100%;
   position: relative;
 }
 .stepwizard-step button[disabled] {
   opacity: 1 !important;
   filter: alpha(opacity=100) !important;
 }
 .control-label{
   margin-top: 5px;
 }
 .list-inline {
   margin-right: 0;
   margin-top: 10px;
   font-size: 0;

   display: inline-flex;}

   .stepwizard-row:before {
     top: 14px;
     bottom: 0;
     position: absolute;
     content: " ";
     width: 100%;
     height: 1px;
     background-color: #ccc;
     z-order: 0;

   }
   .nav-tabs li.disabled { color: grey; }
   .nav-tabs li.disabled a:hover { border-color: transparent; }
   .btn-primary {
    background-color: #00758c;
    border: 1px solid #00758c;
  }
  .stepwizard-step {
   display: table-cell;
   text-align: center;
   position: relative;
 }
 .disabled{
  pointer-events: none;
}
.btn-circle {
 width: 30px;
 height: 30px;
 text-align: center;
 padding: 6px 0;
 font-size: 12px;
 line-height: 1.428571429;
 border-radius: 15px;
}
.btn-file {
  position: relative;
  overflow: hidden;
}
.nav-tabs > li {
  float: left;
  width: 200px;
  background: #00758c;
  height: 50px;
  border-top-right-radius: 45px;
  margin: 4px;
}
.nav-tabs > li > a {
  margin-right: 0;
  color: #fff;
  font-size: initial;
  border-radius: 0;
  text-shadow: 0px 1px #000;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;

  background: white;
  cursor: inherit;
  display: block;
}
input{
  border-radius: 5px!important;
  box-shadow: 0px 1px #bbb!important;
}
.btn-file{
 float: left;
 width: 200px;
 background: #00758c!important;
 height: 50px;

 margin: 4px;
}
#img-upload{
  width: 100%;
}
.nav-tabs > li {
  float: left;
  width: 200px;
  background: #00758c;
  height: 50px;
  border-top-right-radius: 14px;
  margin: 4px;
}
.nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
  border-color: transparent;
  color: #fff;
  background: black;
}
.nav-tabs > li a.active, .nav-tabs > li a.active:focus, .nav-tabs>li a.active:hover {
  width: 90%;
  outline: none;
  border: 1px solid #ddd7d7;
  padding-left: 5px;
  border-bottom-color: transparent;
}
td, th {
  padding: 0px;
  padding-left: 4px!important;
}
.active{
 outline: none;
 border: 1px solid #c3c3c3;
 background-color: #012d4c!important;
 border-bottom-color: transparent;
}
form{
  background-color: #fff!important;
}
</style>
<input type="hidden" class="section" value="{{$student->section_id}}">
@endsection
@push('post-scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" />
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
<script>
  var today = new Date();
  $('#dateofbirth').calendar({
    monthFirst: false,
    type: 'date',
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
  $('#nationality').select2();
  $('#country_id').select2();
  $('.course_id').select2();
  $('.branch_id').select2();
</script>
<script type="text/javascript">
  CustomDropZone("medical_file_dropzone","medical_document","medical_document_images");
  function  CustomDropZone(drop_zone_id,folder_name,field_name) {
    Dropzone.autoDiscover = false;
    var temp_files=[];
    var uploaded_files = [];
    var myDropzone = new Dropzone('#'+drop_zone_id, {
      url: "#",
      acceptedFiles: "image/*,application/pdf",
      maxFilesize: 50,
      uploadMultiple: true,
      createImageThumbnails: true,
      addRemoveLinks: true,
      maxFiles: null,
      processQueue: true,
      autoProcessQueue: true,
      removedfile: function(file){
       var file_name = file.previewElement.querySelector("[data-dz-name]").innerHTML;
     //var file_name = file.name;

     $.ajax({
       type: 'POST',
       url: "#",
       data: {'folder_name':folder_name,file: file_name,'_token': $('meta[name="csrf-token"]').attr('content')},
       success: function(response){
        file.previewElement.remove();
        uploaded_files.pop(file_name);
        $('#'+field_name).val(uploaded_files);
        //$('#license_file').val('');
      }
    });
   },
   success: function(file,response){
    if(response.status){
      temp_files.push(file);
      if(temp_files.length==response.files_names.length){
        temp_files.forEach(function(row,index){
          var fileuploded = row.previewElement.querySelector("[data-dz-name]");
          fileuploded.innerHTML = response.files_names[index];
          uploaded_files.push(response.files_names[index]);
          $('#'+field_name).val(uploaded_files);
        });
      }
        //file.name = response.files_name;
        //var fileuploded = file.previewElement.querySelector("[data-dz-name]");
        //fileuploded.innerHTML = response.files_name;
       //console.log(file,response);
     }
   },
   init: function () {

     this.on('addedfile', function(file) {
      var ext = file.name.split('.').pop();
      if (ext == "pdf") {
        $(file.previewElement).find(".dz-image img").attr("src", "{{asset('images/pdf.png')}}");
        $('#file_ext').hide();
      }
      else if(ext == "doc" || ext == "docx") {
        $(file.previewElement).find(".dz-image img").attr("src", "{{asset('images/docx.png')}}");
        $('#file_ext').hide();
      }
      else{
        $('#file_ext').show();
      } 
    });
     this.on("thumbnail", function(file, dataUrl) {
      $('.dz-image').last().find('img').attr({width: '100%', height: '100%'});
    });
     this.on('sending', function(file, xhr, formData){
      temp_files = [];
      formData.append('folder_name',folder_name);
      formData.append('_token',$('meta[name="csrf-token"]').attr('content'));
    });
   }

 });

    return myDropzone;
  }


</script>
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#profile').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#images").change(function(){
    readURL(this);
  }); 

</script>



<script>

  var today = new Date();

  $('.country').select2();
  $('.nationality').select2();
  $('.course').select2();
  $('.section').select2();
  $('.category').select2();
  $('.religion').select2();
  $('.caste').select2();
  $('.blood').select2();
  $('.city').select2();
  $('#informationSubmit').on('click',function(){

    var form = $('#information_profile')[0];
    var formData = new FormData($('#information_profile')[0]);

    console.log('formData', formData);
    console.log('form', form);

  });

  function AdmissionInfo(obj){
    console.log('admission form submit');
    var form = $('#AdmissionInfoForm')[0];
    var formData = new FormData($('#AdmissionInfoForm')[0]);
    console.log('formData', formData);
    console.log('form', form,$('#AdmissionInfoForm').serialize());
  }
  $(function(){
    sectionSelect(course_id);
  });
  var section_id=$('.section').val();
  function sectionSelect(obj){
    console.log('section',section_id);
    console.log('course_id',$(obj).val());
    var course_id=$('#course_id').val();
    $('#section_id').html(` <option selected="selected" disabled='disabled'> Select Section  </option>`);
    $.ajax({
      method:"POST",
      url:"{{route('CourseHasSection')}}",
      data : {id:course_id},
      dataType:"json",
      success:function(response){
       if(response.status){
        response.data.forEach(function(val,ind){
         var id = val.id;
         var name = val.course_name;
         var option = `<option value="${id}" ${section_id==id?selected:''}>${name}</option>`;
         $('#section_id').append(option);
       });
      }

    }
  });
  }

  function filterFunction() {
   var input, filter, ul, li, a, i;
   input = document.getElementById("myInput");
   filter = input.value.toUpperCase();
   div = document.getElementById("myDropdown");
   a = div.getElementsByTagName("a");
   for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
     a[i].style.display = "";
   } else {
     a[i].style.display = "none";
   }
 }
}


function changeFeeSturture(obj){
  console.log('radio',$(obj).val());
  if($(obj).val() == 'monthly'){
    $('.cutomFee').val(0);
    $('.monthlystructure').css('display','block');
    $('.annulystructure').css('display','none');
     // $('.MonthWisestructure').css('display','block');
   }else{
    $('.cutomFee').val(0);
    $('.monthlystructure').css('display','none');
    $('.annulystructure').css('display','block');

  }

  if($(obj).val() == 'custom'){
    $('.cutomFee').val(0);
    $('.monthlystructure').css('display','block');
    $('.annulystructure').css('display','none');
    $('.MonthWisestructure').css('display','block');
  }
}
function MonthWisestructure(obj){
  $('.MonthWisestructure').css('display','block');
  $('.annualFee').val(0);
  var annual_total_fee=parseFloat($("#total_fee").val());
  var factor=parseInt($(obj).val());
  console.log('factor',factor,annual_total_fee,{{date('m')}});
  var month=parseInt({{date('m')}});
  if(factor==1){

    $('.MonthWisestructure').find('.m'+month).val(annual_total_fee);
  }
  if(factor==2){
    var feeMonth=month;
    var factorSix=parseFloat(annual_total_fee/2).toFixed(2);

    for(i=1; i<=2; i++){
      if(i==1){
        if(feeMonth==13){
          feeMonth=1;
        }
        if(feeMonth==14){
          feeMonth=2;
        }
        if(feeMonth==15){
          feeMonth=3;
        }
        if(feeMonth==16){
          feeMonth=4;
        }
        if(feeMonth==17){
          feeMonth=5;
        }if(feeMonth==18){
          feeMonth=6;
        }
        $('.MonthWisestructure').find('.m'+feeMonth).val(factorSix);
        feeMonth=feeMonth+6;
      }else{
        if(feeMonth==13){
          feeMonth=1;
        }
        if(feeMonth==14){
          feeMonth=2;
        }
        if(feeMonth==15){
          feeMonth=3;
        }
        if(feeMonth==16){
          feeMonth=4;
        }
        if(feeMonth==17){
          feeMonth=5;
        }if(feeMonth==18){
          feeMonth=6;
        }
        console.log('feeMonth',feeMonth);
        $('.MonthWisestructure').find('.m'+feeMonth).val(factorSix);
        feeMonth=feeMonth+6;

      }
    }
  }
  if(factor==3){
    var feeMonth=month;
    var factorSix=parseFloat(annual_total_fee/3).toFixed(2);
    for(i=1; i<=3; i++){
      console.log('feeMonth',feeMonth);
      if(i==1){
        // if(feeMonth==11){
        //   feeMonth=1;
        // }
        // if(feeMonth==12){
        //   feeMonth=4;
        // }
        if(feeMonth==13){
          feeMonth=3;
        }
        if(feeMonth==14){
          feeMonth=2;
        }

        if(feeMonth==15){
          feeMonth=1;
        }
        if(feeMonth==16){
          feeMonth=4;
        }
        $('.MonthWisestructure').find('.m'+feeMonth).val(factorSix);
        feeMonth=feeMonth+4;
      }else{
        // if(feeMonth==11){
        //   feeMonth=1;
        // }
        // if(feeMonth==12){
        //   feeMonth=4;
        // }
        if(feeMonth==13){
          feeMonth=3;
        }
        if(feeMonth==14){
          feeMonth=2;
        }

        if(feeMonth==15){
          feeMonth=1;
        }
        if(feeMonth==16){
          feeMonth=4;
        }

        $('.MonthWisestructure').find('.m'+feeMonth).val(factorSix);
        feeMonth=feeMonth+4;

      }
    }
  }
  if(factor==4){
    var feeMonth=month;
    var factorSix=parseFloat(annual_total_fee/4).toFixed(2);
    for(i=1; i<=4; i++){
      console.log('feeMonth',feeMonth);
      if(i==1){
        if(feeMonth==13){
          feeMonth=1;
        }
        if(feeMonth==14){
          feeMonth=2;
        }
        if(feeMonth==15){
          feeMonth=3;
        }
        $('.MonthWisestructure').find('.m'+feeMonth).val(factorSix);
        feeMonth=feeMonth+3;

      }else{
       if(feeMonth==13){
        feeMonth=1;
      }
      if(feeMonth==14){
        feeMonth=2;
      }
      if(feeMonth==15){
        feeMonth=3;
      }
      $('.MonthWisestructure').find('.m'+feeMonth).val(factorSix);
      feeMonth=feeMonth+3;

    }
  }
}
if(factor==6){
  var feeMonth=month;
  var factorSix=parseFloat(annual_total_fee/6).toFixed(2);
  for(i=1; i<=6; i++){
    if(i==1){
      feeMonth=feeMonth+2;
      if(feeMonth==14){
        feeMonth=2;
      }
      if(feeMonth==13){
        feeMonth=1;
      }
      $('.MonthWisestructure').find('.m'+feeMonth).val(factorSix);
      feeMonth=feeMonth+2;
    }else{
      if(feeMonth==14){
        feeMonth=2;
      }
      if(feeMonth==13){
        feeMonth=1;
      }
      console.log('feeMonth',feeMonth);
      $('.MonthWisestructure').find('.m'+feeMonth).val(factorSix);
      feeMonth=feeMonth+2;



    }
  }
}
if(factor==10){
  var feeMonth=month;
  var factorSix=parseFloat(annual_total_fee/12).toFixed(2);
  for(i=1; i<=12; i++){
    if(i==1){

      if(feeMonth==14){
        feeMonth=2;
      }
      if(feeMonth==13){
        feeMonth=1;
      }
      if(feeMonth==5 || feeMonth==8){
        var doubleFee=(factorSix*2).toFixed(2);
        $('.MonthWisestructure').find('.m'+feeMonth).val(doubleFee);
      }else{
        $('.MonthWisestructure').find('.m'+feeMonth).val(factorSix);
      }

      feeMonth=feeMonth++;
    }else{
      if(feeMonth==14){
        feeMonth=2;
      }
      if(feeMonth==13){
        feeMonth=1;
      }
      if(feeMonth==5 || feeMonth==8){
        var doubleFee=(factorSix*2).toFixed(2);
        $('.MonthWisestructure').find('.m'+feeMonth).val(doubleFee);
      }else{
        $('.MonthWisestructure').find('.m'+feeMonth).val(factorSix);
      }

      feeMonth++;
    }
  }
}
if(factor==12){
 var factorSix=parseFloat(annual_total_fee/12).toFixed(2);
 $('.annualFee').val(factorSix);
}


}


$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
  allWells = $('.setup-content'),
  allNextBtn = $('.nextBtn');
  allWells.hide();
  navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
    $item = $(this);
    if (!$item.hasClass('disabled')) {
      navListItems.removeClass('btn-primary').addClass('btn-default');
      $item.addClass('btn-primary');
      allWells.hide();
      $target.show();
      $target.find('input:eq(0)').focus();
    }
  });
  allNextBtn.click(function(){
    var curStep = $(this).closest(".setup-content"),
    curStepBtn = curStep.attr("id"),
    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
    curInputs = curStep.find("input[type='text'],input[type='url']"),
    isValid = true;
    $(".form-group").removeClass("has-error");
    for(var i=0; i<curInputs.length; i++){
      if (!curInputs[i].validity.valid){
        isValid = false;
        $(curInputs[i]).closest(".form-group").addClass("has-error");
      }
    }
    if (isValid)
      nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
$(document).ready( function() {
 $(document).on('change', '.btn-file :file', function() {
  var input = $(this),
  label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [label]);
});

 $('.btn-file :file').on('fileselect', function(event, label) {

  var input = $(this).parents('.input-group').find(':text'),
  log = label;

  if( input.length ) {
    input.val(log);
  } else {
    if( log ) alert(log);
  }
});
});

$('.addGuardian').on('click',function(){
  console.log('guardian');
  var guard=`<hr><div class="col-md-6">
  <label class="control-label">Relation </label>
  <select class="form-control" type="text"  value="" name="relation_type[]" >
  <option disabled="disabled" selected="selected">Choose the Relation</option>
  <option value="Mother">Mother</option>
  <option value="father">Father</option>
  <option value="Brother">Brother</option>
  <option value="Sister">Sister</option>
  <option value="Uncle">Uncle</option>
  <option value="Anti">Anti</option>
  </select> 
  </div>
  <div class="col-md-6">
  <label class="control-label">Name :</label>
  <input class="form-control" name="parent_name[]" id="parent_name[]" type="text" placeholder="Enter the Name :" >
  </div>
  <div class="col-md-6">
  <label class="control-label">Phone :</label>
  <input class="form-control" name="parent_phone[]" id="parent_phone[]" type="text" placeholder="Enter the Mobile No :" >
  </div>
  <div class="col-md-6">
  <label class="control-label">Address :</label>
  <textarea class="form-control" name="parent_address[]" id="parent_address[]" type="text" placeholder="Enter the Address :" ></textarea>
  </div><div class="col-md-6">
  <label class="control-label">Cnic :</label>
  <input class="form-control" name="parent_cnic[]" id="parent_cnic[]" type="text" placeholder="Enter the Address :" >
  </div>
  <div class="col-md-6">
  <label class="control-label">Email :</label>
  <input  class="form-control" name="parent_email[]" id="parent_email[]" type="email" placeholder="Enter the Email :" >
  </div>`;
  $('.addParents').append(guard);

});

$('.feeCollect').add('#annual_fee').add('#annual_scholarship_of').on('keyup change',function() {
  var sum = 0;
  var annual_fee=parseFloat($('#annual_fee').val());
  var amount=$("#annual_scholarship_of").val();

  $(".feeCollect").each(function(){
    sum += parseFloat($(this).val());
  });
  console.log('feeCollect',sum);

  if(sum==undefined){
    sum=0;
  }
  sum+=annual_fee;

  console.log('amount',amount);
  console.log('sum',sum);
  var total=(sum) - amount;

  $("#total_fee").val(total);
  console.log('total amount',total);
  var total_monthly_fee= parseFloat(total)/12;
  console.log('total_monthly_fee',total_monthly_fee);
  var monthlyValue=(parseFloat($('#annual_fee').val())/12).toFixed(2);
  $('#monthly_fee').val(monthlyValue);
  var monthlyScholar=(parseFloat(amount)/12).toFixed(2);

  $('#monthly_scholarship_of').val(monthlyScholar);
  
  $('#total_monthly_fee').val(total_monthly_fee.toFixed(2));
});
$('#monthly_fee').add('#monthly_scholarship_of').on('keyup change',function() {
  var sum = 0;
  var month_fee=parseFloat($('#monthly_fee').val());
  var amount=parseFloat($("#monthly_scholarship_of").val());

  var monthlyValue=parseFloat((month_fee*12).toFixed(2));
  $('#annual_fee').val(monthlyValue);

  var annualScholar=((amount)*12).toFixed(2);

  $('#annual_scholarship_of').val(annualScholar);

  $(".feeCollect").each(function(){
    sum += parseFloat($(this).val());
  });
  console.log('feeCollect',sum);

  if(sum==undefined){
    sum=0;
  }
  sum+=monthlyValue;

  console.log('amount',amount);
  console.log('sum',sum);
  var total=(sum) - amount;

  $("#total_fee").val(total);
  console.log('total amount',total);
  var total_monthly_fee= parseFloat(total)/12;
});
</script>
<script type="text/javascript">
  function nextToTab(){
    var $active = $('.nav-tabs li.active');
    $active.next().removeClass('disabled');
    nextTab($active);
  }
  function prevousToTab(){
    var $active = $('.nav-tabs li.active');
    prevTab($active);
  }
  function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
  }
  function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
  }
  function personalFormSubmit(ob){
    console.log('personalFormSubmit');
    var valid = true;   
    console.log('form input',$('#s_name').val() == '');

    if (valid && $('.branch_id').val() == '') {
      $('.branch_id_error').text('Branch  field is required');
      $('.branch_id_error').css('display','block');
      valid = false;
    }
    if (valid && $('#s_name').val() == '') {
      $('.s_name').text('student name field is required');
      $('.s_name').css('display','block');
      valid = false;
    }
    if (valid && $('#s_DOB').val() == '') {
      $('.s_DOB_eror').text('date of birth field is required');
      $('.s_DOB_eror').css('display','block');
      valid = false;
    }
    if (valid && $('#s_fatherName').val() == '') {
      $('.s_fatherName').text('Father name field is required');
      $('.s_fatherName').css('display','block');
      valid = false;
    }
    if (valid && $('#s_sex').val() == '') {
      $('.s_sex_error').text('Gender name field is required');
      $('.s_sex_error').css('display','block');
      valid = false;
    }
    if(valid){
      nextToTab();
    }
  }
  function guardianFormSubmit(oj){
    console.log('guardianFormSubmit');
    var valid = true;   
    console.log('form input',$('#emergency_mobile').val() == '');
    if (valid && $('#emergency_mobile').val() == '') {
      $('.emergency_mobile_eror').text('Emergency No field is required');
      $('.emergency_mobile_eror').css('display','block');
      valid = false;
    }

    if (valid && $('#home_address').val() == '') {
      $('.home_address_eror').text('Emergency No field is required');
      $('.home_address_eror').css('display','block');
      valid = false;
    }

    
    if(valid){
      nextToTab();
    }
  }
  function admissionFormSubmit(og){
    console.log('admissionFormSubmit');
    var valid = true;   
    console.log('form input',$('#course_id').val());
    if (valid && $('#course_id').val() == '' || $('#course_id').val() == null) {
      console.log('in condition');
      $('.course_id_eror').text('Course id field is required');
      $('.course_id_eror').css('display','block');
      valid = false;
    }
    if(valid){
      console.log('valid admission',valid);
      nextToTab();
    }
  }
  function profileFormSubmit(oh){
    console.log('profileFormSubmit');
    var valid = true;   
    console.log('form input',$('input[name=feeStruture]:checked', '#contact').val());
    if (valid && $('input[name=feeStruture]:checked', '#contact').val() == '' || $('.feeStruture').val() == null || $('.feeStruture').val() == undefined) {
      $('.feeStruture_eror').text('fee Struture field is required');
      $('.feeStruture_eror').css('display','block');
      valid = false;
    }
    if(valid){
      nextToTab();
    }
  }
  $(function() {
    enable_cb();
    $("#group1").click(enable_cb);
  });
  function settingFormSubmit(ol){
    console.log('profileFormSubmit');
    var valid = true;   
    console.log('form input',$('input[name=feeStruture]:checked', '#contact').val());
    // if (valid && $('input[name=feeStruture]:checked', '#contact').val() == '' || $('.feeStruture').val() == null || $('.feeStruture').val() == undefined) {
    //       $('.feeStruture_eror').text('fee Struture field is required');
    //       $('.feeStruture_eror').css('display','block');
    //       valid = false;
    //   }
    if(valid){
      nextToTab();
    }
  }
  $(function() {
    enable_cb();
    $("#group1").click(enable_cb);
  });

  function enable_cb() {
    if (this.checked) {
      $("input.group1").removeAttr("disabled");
    } else {
      $("input.group1").attr("disabled", true);
    }
  }
</script>
<script>

  function printDiv(eve,obj)
  {
    console.log('printId',$(obj).attr('id'));

    var divToPrint=document.getElementById($(obj).attr('id'));

    var newWin=window.open('','Print-Window');

    newWin.document.open();

    newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

    newWin.document.close();

    setTimeout(function(){newWin.close();},10);

  }



</script>
@endpush