@extends('_layouts.admin.default')
@section('title', 'Student Admission')
@section('content')
@php($oman=\App\Models\Country::get())
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
<div  class="col-sm-12">
  <hr/>
  <div class="col-md-12" style="display: none">
    <input type='button' id='btn' value='Print' onclick="printDiv(this,printAllRecord);" class="btn btn-primary float-center allrecord" style="width: 100%;">
  </div>
  <div class="col-md-12">
    <div class="col-md-12">
      <ul class="nav nav-tabs tabs-left sideways">
        <li class="active navr" class="disabled"><a href="#home-v" data-toggle="tab">Personal info</a></li>
        <li class="disabled"><a href="#profile-v" data-toggle="tab">Guardian/Parents</a></li>
        <li class="disabled"><a href="#messages-v" data-toggle="tab">Admission Info</a></li>
        <li class="disabled"><a href="#settings-v" data-toggle="tab">Medical Info</a></li>
        <!-- <li class="disabled"><a href="#messages-v2" data-toggle="tab">Transport</a></li> -->
        <li class="disabled"><a href="#profile-vv" data-toggle="tab">Fee Structure</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-12">
    <form method="POST" id="contact" action="{{route('student-registration.store')}}" enctype="multipart/form-data" style="margin: 8px;">
      <!-- <input type="hidden" name="feePostMonth" readonly id="feePostMonth"> -->
      <div>
        <h3 style="
        padding: 6px;
        border: 2px solid #00448a;
        color: #ffffff;
        text-transform: none;
        background: #00448a;
        border-top-right-radius: 0px;
        font-size: 26px;
        text-shadow: 0px 3px 3px #520000;">Student Admission</h3>
        <section>
          @csrf
          <input type="hidden" name="medical_document_images[]" class="medical_document_images" id="medical_document_images" value="">
          @component('_components.alerts-default')
          @endcomponent
          <div class="tab-content">
            <div class="tab-pane active" id="home-v" style="background-color: #fff!important;">  
              <div class="col-md-12">
                <div class="row">
                  <div class="col-lg-5 col-md-12 col-sm-5 col-xs-5">
                    <label class="control-label" style="width: 100%;">Country 
                      <span style="color: red">*</span></label>
                      <select class="s_countryCode" name="s_countryCode" onchange="countryHasBranch(this)" style="width: 100%;
                      height: 33px;
                      border-radius: 6px;">
                      <option value="0">Choose the country </option>
                      @if(Auth::user()->s_countryCode==92)
                      <option value="92" @if(Auth::user()->s_countryCode==92) selected @endif>Pakistan</option>
                      @endif
                      @if(Auth::user()->s_countryCode==968)
                      <option value="968" @if(Auth::user()->s_countryCode==968) selected @endif>Oman</option>
                      @endif
                      @if(Auth::user()->s_countryCode==971)
                      <option value="971" @if(Auth::user()->s_countryCode==971) selected @endif>Dubai</option>
                      @endif
                      @if(empty(Auth::user()->s_countryCode))
                      <option value="92" >Pakistan</option>
                      <option value="968" >Oman</option>
                      <option value="971" >Dubai</option>
                      @endif
                    </select>
                    <p class="alert alert-danger country_error" style="display: none"></p>
                  </div>
                  <div class="col-lg-5 col-md-12 col-sm-5 col-xs-5">
                    <label class="control-label" style="width: 100%;">Branch 
                      <span style="color: red">*</span></label>
                      <select class="form-control-1 branch_id" name="branch_id" id="branch_id" onchange="branchHasClass(this)" required style="width: 100%;
                      height: 33px!important;
                      border-radius: 6px;">

                    </select>
                    <p class="alert alert-danger branch_id_error" style="display: none"></p>
                  </div>
                </div>
                <div id="AdmissionInfoForm" class="row" >
                  <div class="col-md-5 col-sm-4">
                    <label class="control-label" style="width: 100%;">Name 
                      <span style="color: red">*</span></label>
                      <input class="form-control " name="s_name" value="{{old('s_name')}}"  id="s_name" type="text" placeholder="Enter the student Name">
                      <p class="alert alert-danger s_name" style="display: none"></p>
                      <label class="control-label" style="width: 100%;">Date Of Birth (child)   <span style="color: red">*</span></label>
                      <div class="ui calendar" id="dateofbirth" style="width: 100%;">
                        <div class="ui input" style="width: -webkit-fill-available!important;">
                          <input class="form-control ip-android-1" readonly  name="s_DOB" id="s_DOB" value="{{old('s_DOB')}}" type="text">

                        </div>
                        <p class="alert alert-danger s_DOB_eror" style="display: none"></p>
                      </div>
                      <label type="radio"  class="control-label" style="width: 100%;">Father's  Name    <span style="color: red">*</span>
                      </label>
                      <input class="form-control" value="{{old('s_fatherName')}}" name="s_fatherName" id="s_fatherName" type="text" placeholder="Enter The Father Name" class="input-xlarge">
                      <p class="alert alert-danger s_fatherName" style="display: none"></p>

                      <label class="control-label" style="width: 100%">Nationality </label>


                      <select  name="country_id" id="country_id" type="text" placeholder="country" class="input-xlarge" style="width: 100%!important; height: 33px!important; border-radius: 5px!important; margin-top: 10px!important;">
                        <option disabled="disabled" selected="selected">Choose the Nationality</option>
                        @foreach($oman as $om)
                        <option value="{{$om->phonecod}}" @if(Auth::user()->s_countryCode==$om->phonecod) selected @endif>{{$om->nam}} </option>
                        @endforeach>

                      </select>
                      <p class=" country-error" style="display:none;color:red"></p>

                      <label class="control-label" style="width: 100%;margin-top: 10px;">Student's Category 
                        <p class=" country-error" style="display:none;color:red">
                        </p></label>
                        <select class="form-control-1" name="cat_id" id="cat_id" type="text" placeholder="cat_id" class="input-xlarge" 
                        style="width: 100%!important; height: 33px!important; border-radius: 6px!important;">
                        <option disabled="disabled" selected="selected">Choose the Category</option>
                        @foreach($category as $om)
                        <option value="{{$om->id}}" >{{$om->cat_name}} </option>
                        @endforeach>
                      </select>

                      



                    </div>
                    <div class="col-md-5 col-sm-4">

                      <br>
                      <div class="form-control" style="
                      margin-top: 12px;
                      border-radius: 5px;
                      height: 33px;">
                      <label class="radio-inline" style="padding-top: 5px;">
                        <input type="radio" class="s_sex" name="s_sex" @if(isset($student->s_sex) && $student->s_sex=='male') checked @endif  value="male" placeholder="male">  Male</label>
                        <label class="radio-inline" style="padding-top: 5px;">
                          <input type="radio" name="s_sex" class="s_sex"  @if(isset($student->s_sex) && $student->s_sex=='female') checked @endif value="female" placeholder="female"> Female</label>
                          <p class="alert alert-danger s_sex_error" style="display: none"></p>
                        </div>
                                <!-- <label class="control-label">CNIC / Resident / Civil Type</label>
                                <select class="form-control id_type" id="id_type" value="{{isset($student->id_type)?$student->id_type:old('id_type')}}" name="id_type" type="text" placeholder="Enter the Father CNIC" class="input-xlarge">
                                  <option value="CNIC">CNIC</option>
                                  <option value="Passport">Passport</option>
                                  <option value="Civil Number">Civil Number</option>
                                  <option value="Resident Card">Resident Card</option>
                                  <option value="Other">Other</option>
                                </select> -->
                                <label class="control-label">Religion</label>
                                <select class="form-control" type="text"  name="religion" placeholder="Religion" class="input-xlarge" style="height: 33px!important;border-radius: 5px!important;">

                                  <option value="ISLAM">ISLAM</option>
                                  <option value="JUDAISM">JUDAISM</option>
                                  <option value="CHRISTIANITY">CHRISTIANITY</option>
                                  <option value="HINDUISM">HINDUISM</option>
                                  <option value="BUDDHISM">BUDDHISM</option>
                                  <option value="SIKHISM">SIKHISM</option>
                                  <option value="ANIMISM">ANIMISM</option>

                                </select>
                                <label class="control-label">Father's Occupation</label>
                                <input class="form-control" value="{{isset($student->father_occuption)?$student->father_occuption:old('father_occuption')}}" name="father_occuption" type="text" placeholder="Enter the Father's Occupation">
                                <label class="control-label">Father's Qualification</label>
                                <input class="form-control" name="father_qualification" type="text" placeholder="Father's Qualification">

                                
                                <div class="row">
                                  <div class="col-md-4">
                                   <label class="control-label">Id Type</label>
                                   <select class="form-control id_type" id="id_type" value="{{isset($student->id_type)?$student->id_type:old('id_type')}}" name="id_type" type="text" placeholder="Enter the Father CNIC" class="input-xlarge" style="    border-radius: 5px;
                                   margin-top: 1px;
                                   height: 33px;">
                                   <option value="CNIC">CNIC</option>
                                   <option value="Passport">Passport</option>
                                   <option value="Civil Number">Civil Number</option>
                                   <option value="Resident Card">Resident Card</option>
                                   <option value="Other">Other</option>
                                 </select>
                               </div>
                               <div class="col-md-8">

                                <label class="control-label">Id Number <span style="color: red">*</span></label>
                                <input class="form-control father_cnic" id="father_cnic" value="{{isset($student->father_cnic)?$student->father_cnic:old('father_cnic')}}" onchange="getKids(this)" name="father_cnic" type="text" placeholder="Enter the Father CNIC" class="input-xlarge">
                                <p class="alert alert-danger father_cnic_eror" style="display: none"></p>
                              </div>
                            </div>

                          </div>
                          <div class="col-md-2 col-sm-4 col-xs-12" style="text-align: center;">
                            <div class="form-group">
                              <label style="    background: #;
                              padding: 4px 12px;
                              color: aliceblue;"></label>
                              <div class="img_upload">
                                <img id='profile'    @isset($student->images) src="{{asset('images/student/pics/'.$student->images)}}" @endisset height="229px" width:150px; style="
                                width: 100%!important;
                                box-shadow: 2px 4px 5px #adadad;
                                margin-bottom: 15px;
                                border-radius: 10px;
                                border: 1px solid #00448a;">
                              </div>
                              <div>
                                <span class="input-group-btn"style="text-align: center;">
                                  <label for="images" class="btn btn-primary nextmove" style="border-radius: 5px;">Upload Profile</label>
                                  <input type="file" id="images" value="{{ old('images') }}" name="images" class="hide" style="opacity: 0;">
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12" style="margin-top: 30px;">
                            <div class="row footer_btn">
                              <div class="col-md-10 col-xs-2"></div>
                              <div class="col-md-2 col-xs-12">
                                <ul class="list-inline pull-right">
                                  <li><input  class="btn btn-primary prev-step personalFormPrevous"  readonly="" value="Previous" style="width: 150px!important;"></li>
                                  <li><input class="btn btn-primary next-step personalFormNext" onclick="personalFormSubmit(this)" readonly="" value="Next" style="width: 150px!important;"></li>
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

                            <hr>
                            <div class="row parents">
                              <table class="table table-bordered">
                                <thead class="thead-light">
                                  <tr>
                                    <th>Default</th>
                                    <th>Relation</th>
                                    <th>Name</th>
                                    <th>CNIC</th>
                                    <th>Phone</th>
                                    <th>Address</th>

                                    <th>Email</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="qualificationRows">
                                  <tr>
                                    <td> <input type="radio" name="default" value="1" checked> </td>
                                    <td><select class="form-control" type="text"  value="" name="relation_type[]" disabled="disable">
                                      <option disabled="disabled" selected="selected">Choose the Relation</option>
                                      <option value="Mother">Mother</option>
                                      <option value="father" selected>Father</option>
                                      <option value="Brother">Brother</option>
                                      <option value="Sister">Sister</option>
                                      <option value="Uncle">Uncle</option>
                                      <option value="Anti">Anti</option>
                                    </select></td>
                                    <td> <input class="form-control fatherNameFirst" readonly name="parent_name[]" id="parent_name[]" type="text" placeholder="Enter the Name :" ></td>
                                    <td><input  class="form-control father_cnicfirst" readonly name="parent_cnic[]" id="parent_cnic[]" type="text" placeholder="Enter the Cnic :" ></td>
                                    <td><input class="form-control fatherphonefirst phone_no"  name="parent_phone[]" id="parent_phone[]" type="number" placeholder="Enter the Mobile No :" > <p class="alert alert-danger phone_no_eror" style="display: none"></p></td>
                                    <td><input class="form-control home_address" name="parent_address[]" id="home_address" type="text" placeholder="Enter the Address :" >
                                      <p class="alert alert-danger home_address_eror" style="display: none"></p>
                                    </td>

                                    <td> <input  class="form-control email_address" name="parent_email[]" id="parent_email[]" type="email" placeholder="Enter the Email :" >
                                     <p class="alert alert-danger email_address_eror" style="display: none"></p>
                                   </td>

                                 </tr>

                               </tbody>
                             </table>
                             <div class="btn btn-primary pull-right addQualification" style="margin-left: 10px; margin-top: 15px;">+</div>
                           </div>
                           <div class="row addParents">
                           </div>
                           <hr>
                              <!-- <div class="row">
                               <div class="col-md-6">
                                <label class="control-label">Home Address : </label>

                                <textarea class="form-control" name="home_address" id="home_address" type="text" placeholder="Enter the home Address" 
                                class="input-xlarge">
                                {{isset($student->home_address)?$student->home_address:old('home_address')}}
                              </textarea>
                              <p class="alert alert-danger home_address_eror" style="display: none"></p>
                            </div>
                          </div> -->
                          <br>
                        </div>
                      </div>
                      <div class="row"style="background-color: #fff;">
                        <div class="col-md-12" >
                          <div class="row footer_btn">
                            <div class="col-md-10 col-xs-2"></div>
                            <div class="col-md-2 col-xs-12">
                              <ul class="list-inline pull-right">
                                <li><input  class="btn btn-info prev-step" readonly="" value="Previous" style="min-width: 150px;"></li>
                                <li><input class="btn btn-info next-step" onclick="guardianFormSubmit(this)" readonly="" value="Next" style="width: 150px;"></li>
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

                        </select>
                        <p class="alert alert-danger course_id_eror" style="display: none"></p>
                      </div>
                      <div class="col-md-6">
                       <label class="control-label">Choose the Section</label>
                       <select class="form-control section_id" name="section_id" id="section_id" onchange="admissionPackage(this)" style="width: 100%;">

                       </select>
                       <p class="alert alert-danger " id="sectio_eror" style="display: none">Section id field is required</p>
                     </div>
                     <div class="col-md-6">
                       <label class="control-label">Name of the last school</label>
                       <input class="form-control" type="text" placeholder="Enter the name of the last school :" class="input-xlarge">
                     </div>
                     
                     <div class="col-md-6">
                       <label class="control-label">Other kids In school</label>
                       <select class="form-control kids" id="kids" type="text" placeholder="Other kids In school..." class="input-xlarge">

                       </select>
                     </div>
                     <div class="col-md-6">
                      <label class="control-label">Choose reason  CHANGE to From where you came to know about school</label>
                      <input class="form-control" type="text" placeholder="Enter the reason " class="input-xlarge">
                    </div>
                    <div class="col-md-6">

                      <label class="control-label">Remarks :</label>
                      <textarea class="form-control" type="text" placeholder="Enter the Remarks" class="input-xlarge"></textarea>
                    </div>
                    <div class="col-md-12" style="margin-top: 30px;">
                      <div class="row footer_btn">
                        <div class="col-md-10 col-xs-2"></div>
                        <div class="col-md-2 col-xs-12">
                          <ul class="list-inline pull-right">
                            <li><input  class="btn btn-info prev-step" readonly="" value="Previous"style="min-width: 150px;"></li>
                            <li><input class="btn btn-primary next-step"   onclick="admissionFormSubmit(this)" readonly=""  value="Next" style="width: 150px;"></li>
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
                      <label class="control-label">Eye Sight is normal </label>
                      <div class="form-control" id="eye_sight">
                        <label class="checkbox-inline">
                          <input type="checkbox" name="eye_sight" value="1" placeholder="">  Yes</label>
                          <label class="checkbox-inline">
                            <input type="checkbox" name="eye_sight" value="0" placeholder=""> No</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                         <label class="control-label">Number of glasses :</label>
                         <input class="form-control"  type="number" step="any" min="0" placeholder="Enter the Number of glasses :" class="input-xlarge">
                       </div>
                       <div class="col-md-3">
                        <label class="control-label">Any Other Eye Disease</label>
                        <input class="form-control" name="eye_disease" type="text" placeholder="Eye Disease" class="input-xlarge">
                      </div>
                      <div class="col-md-6">
                        <label class="control-label">Allergies (if any): </label>
                        <textarea class="form-control" type="text" name="disease" placeholder="Allergies (if any)" class="input-xlarge">
                        </textarea>  
                      </div>
                      <div class="col-md-6">
                        <label class="control-label">Medical Caution (If any)</label>
                        <textarea class="form-control" name="medical_caution"  type="text" placeholder="Medical Caution (If any)"></textarea> 
                      </div>
                      <div class="col-md-6">
                        <label class="control-label">Does a child has any contagious disease : </label>
                        <textarea class="form-control" name="contagious_disease"  type="text" placeholder="any contagious disease"></textarea> 
                      </div>
                      <div class="col-md-6">
                        <div class="clsbox-1" runat="server">
                          <br>
                          <div class="dropzone clsbox" id="medical_file_dropzone">
                            <div class="dz-message" data-dz-message><span>Click here or drag/drop Medical Document to upload.</span></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="control-label">Vaccination : </label>
                        <div class="form-control" id="vecination">
                          <label class="radio-inline">
                            <input type="radio" name="vecination" value="1" placeholder="">  Yes</label>
                            <label class="radio-inline">
                              <input type="radio" name="vecination" value="0" placeholder=""> No</label>
                            </div> 
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3 style="
                            padding: 6px;
                            border: 2px solid #00448a;
                            color: #ffffff;
                            text-transform: none;
                            background: #00448a;
                            border-top-right-radius: 0px;
                            font-size: 26px;
                            text-shadow: 0px 3px 3px #520000;">Transport</h3>
                          </div>



                          <div class="col-md-12 col-sm-12 col-xs-12">
                           <div id="tab6" class="row" style="background-color: #fff">
                             <div class="col-md-3">
                              <label class="control-label">Route Name: </label>
                              <select class="form-control" type="text" placeholder="Enter the home Address" name="route_id" class="input-xlarge" >
                                <option disabled="disabled" selected="selected">Choose the Route</option>

                              </select>
                            </div>
                            <div class="col-md-3">
                             <label class="control-label">Destination:</label>
                             <select class="form-control" type="text" placeholder="Enter the home Address" name="destination_id" class="input-xlarge" >
                              <option disabled="disabled" selected="selected">Choose the Destination</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Start Date</label>
                            <input class="form-control transport_start_date" id="transport_start_date" name="transport_start_date" type="text" placeholder="Father Mobile" class="input-xlarge">
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">End Date</label>
                            <input class="form-control transport_end_date" id="transport_end_date" name="transport_end_date" type="text" placeholder="End Date" class="input-xlarge">
                          </div>
                          <!-- <div class="col-md-12" style="margin-top: 30px;">
                            <div class="row footer_btn">
                              <div class="col-md-10 col-xs-2"></div>
                              <div class="col-md-2 col-xs-12">
                                <ul class="list-inline pull-right">
                                  <li>
                                   <li><input  class="btn btn-info prev-step" readonly="" value="Previous" style="min-width: 150px;"></li>
                                   <li><input class="btn btn-primary next-step" onclick="profileFormSubmit(this)" readonly="" value="Next" style="width: 150px;"></li>
                                 </li>
                               </ul>  
                             </div>              
                           </div>
                         </div> -->
                       </div>
                     </div>



                     <div class="col-md-12" style="margin-top: 30px;">
                      <div class="row footer_btn">
                        <div class="col-md-10 col-xs-2"></div>
                        <div class="col-md-2 col-xs-12">
                          <ul class="list-inline pull-right">
                           <li><input  class="btn btn-info prev-step" readonly="" value="Previous" style="min-width: 150px;"></li>
                           <li><input class="btn btn-primary next-step" onclick="profileFormSubmit(this)" readonly=""  value="Next" style="min-width: 150px;"></li>
                         </ul>  
                       </div>              
                     </div>
                   </div>

                 </div>
               </div>
             </div>
             <div class="tab-pane" id="profile-vv">   
              <div class="col-md-12">
               <div class="row" style="background-color: #fff;">
                <div class="col-md-3">
                  <label class="control-label">Admission Package :</label>
                  <select class="form-control adm_package_id" onchange="changeAdmissionPackage(this)" type="text" name="adm_package_id" id="adm_package_id" placeholder="Enter the package" class="input-xlarge">
                    <option disabled="disabled" selected="selected">Choose the package</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label class="control-label">Admission Session :</label>
                  <select class="form-control session" onchange="changeSessionPackage(this)" type="text" name="session" id="session" placeholder="Enter the package" class="input-xlarge">
                    <option disabled="disabled" selected="selected" value="">Choose the Session</option>
                    <option value="April" @if(date('m')<=4) selected @endif>March Session</option>
                    <option value="Sep" @if(date('m')>4) selected @endif>Sep Session</option>
                  </select>
                  <p class="alert alert-danger session_eror" style="display: none"></p>

                </div>
                <div class="col-md-2">
                  <label class="control-label">Admission Fee: </label>
                  <input class="form-control admission_Fee" type="number" value="0" min="0" step="any" placeholder="Admission Fee" name="adm_fee" class="input-xlarge">
                </div>


                <div class="col-md-2">
                 <label class="control-label">Security Charges:</label>
                 <input class="form-control security_Refundable" type="number" value="0" min="0" step="any" name="sec_fee" placeholder="Enter the Security Fee :" class="input-xlarge">
               </div>
               <div class="col-md-2">
                 <label class="control-label">Book Charges:</label>
                 <input class="form-control books_charges" type="number" value="0" min="0" step="any" name="books_charges" placeholder="Enter the Books Fee :" class="input-xlarge">
               </div>

               <div class="col-md-3">
                <label class="control-label">Insurance Fee: </label>
                <input class="form-control insurance_of" type="number" step="any" min="0" value="0" placeholder="Insurance Fee" name="insurance_of" class="input-xlarge">
              </div>
              <div class="col-md-3">
               <label class="control-label">Registration  Fee:</label>
               <input class="form-control registration_Fee" type="number" step="any" min="0" value="0" name="RegistrationFee" placeholder="Enter the Registration Fee :" class="input-xlarge">
             </div>
             <div class="col-md-3">
               <label class="control-label">Transport Fee:</label>
               <input class="form-control transport_fee" type="number" step="any" min="0" value="0" name="transport_fee" placeholder="Enter the Transport Fee :" class="input-xlarge">
             </div>
             <div class="col-md-3">
               <label class="control-label">Uniform:</label>
               <input class="form-control uniform" type="number" step="any" min="0" value="0" name="uniform" placeholder="Enter the Uniform Fee :" class="input-xlarge">
             </div>
             <div class="col-md-4">
               <label class="control-label">Annual Fee:</label>
               <input class="form-control annual_fee"   type="number" step="any" id="annual_fee" min="0" value="0" name="annual_fee" placeholder="Enter the Annual Fee :" class="input-xlarge">
               <p class="alert alert-danger annual_fee_eror" style="display: none"></p>
             </div>
             <div class="col-md-4">
              <label class="control-label">Annual Scholarship: </label>
              <input class="form-control scholarship" type="number" value="0" step="any" min="0" placeholder="Annual Scholarship" id="annual_scholarship_of" name="annual_scholarship_of" class="input-xlarge">
              <p class="alert alert-danger Scholarship_eror" style="display: none"></p>
            </div>

            <div class="col-md-4">
             <label class="control-label">Total Annual Fee:</label>
             <input class="form-control annually" type="number" step="any" id="total_fee" min="0" value="0" readonly name="total_annual_fee" placeholder="Total Annual Fee :" class="input-xlarge">
           </div>
           <div class="col-md-4">
             <label class="control-label">Monthly Fee:</label>
             <input class="form-control"type="number"  step="any" value="0" min="0" name="monthly_fee" id="monthly_fee" placeholder="Monthly Fee:" class="input-xlarge"   >
           </div>
           <div class="col-md-4">
            <label class="control-label">Monthly Scholarship: </label>
            <input class="form-control " type="number" value="0" step="any" min="0" placeholder="Monthly Scholarship" id="monthly_scholarship_of" name="monthly_scholarship_of" class="input-xlarge">
          </div>

          <div class="col-md-4">
           <label class="control-label">Total Monthly Fee:</label>
           <input class="form-control" type="number" step="any" value="0" min="0" id="total_monthly_fee" readonly name="total_monthly_fee" placeholder="Total Monthly Fee :" class="input-xlarge">
         </div>



         <!-- <div class="col-sm-4">
           <label class="control-label">Freeze:</label>
           <select type="text" class="form-control is_freeze" id="is_freeze" value="{{old('is_freeze')}}"   name="is_freeze"  placeholder="Misc 1 description">
            <option value="1" selected="">unfreeze</option>
            <option value="0">Freeze</option>

          </select>
        </div>
        <div class="col-sm-4">
         <label class="control-label">Freeze Till Date:</label>
         <input type="text" class="form-control freeze_till_date" readonly value="{{old('freeze_till_date')}}" name="freeze_till_date" id="freeze_till_date" autocomplete="off"  placeholder="First Due Date">

         @if ($errors->has('freeze_till_date'))
         <label id="freeze_till_date-error" class="error" for="freeze_till_date">
          {{$errors->first('freeze_till_date')}}
        </label>
        @endif
      </div> -->
      <div class="col-md-12">
        <div class="form-group row">
          <label for="input-group-icon-email" class="col-sm-2 form-control-label"> Fee Post of this Month </label>
          <div class="col-sm-4">
           <div class="checkbox">
            @if(date('d') < 21)
            <input type="checkbox" onchange="totalpayed()" class="checkbox_1" @if(date('d') < 21) disabled='true' @endif name="feePostMonth"  value="1" checked >
            <input type="hidden" class="" name="feePostMonth" value="1" >
            @else
            <input type="checkbox" class="checkbox_1" onchange="totalpayed()" name="feePostMonth" value="1" checked >
            @endif
            <label> FeePost of this {{date('M')}} </label>
          </div>
        </div>
        <label for="input-group-icon-email" class="col-sm-2 form-control-label">Fee Due Date </label>
        <div class="col-sm-4">
          <div class="ui calendar" id="example12" style="width: 100%">
            <div class="ui input" style="width: -webkit-fill-available!important;">
              <input type="text" class="form-control fee_due_date1" readonly value="{{date('d-M-Y')}}" name="fee_due_date1" id="fee_due_date1" autocomplete="off"  placeholder="First Due Date">
            </div>
          </div>
          @if ($errors->has('fee_due_date1'))
          <label id="fee_due_date1-error" class="error" for="fee_due_date1">
            {{$errors->first('fee_due_date1')}}
          </label>
          @endif
        </div>
      </div>
      <div class=" form-group row">
        <label for="input-group-icon-email" class="col-sm-2 form-control-label">Misc 1 Desc </label>
        <div class="col-sm-4">
          <input type="text" class="form-control misc1_desc" id="misc1_desc" value="{{old('misc1_desc')}}"   name="misc1_desc"  placeholder="Misc 1 description">
        </div>
        <label for="input-group-icon-email" class="col-sm-2 form-control-label">Misc 1 amount </label>
        <div class="col-sm-4">
          <input type="number" class="form-control misc1" value="{{old('misc1')}}"  name="misc1"  placeholder="Misc 1 amount"> 
        </div>
      </div>
      <div class=" form-group row">
        <label for="input-group-icon-email" class="col-sm-2 form-control-label">Misc 2 Desc </label>
        <div class="col-sm-4">
          <input type="text" class="form-control ly_no" id="ly_no" value="{{old('misc2_desc')}}"  name="misc2_desc"  placeholder="Misc 2 description">
        </div>
        <label for="input-group-icon-email" class="col-sm-2 form-control-label">Misc 2 amount </label>
        <div class="col-sm-4">
          <input type="number" class="form-control ly_no" value="{{old('misc2')}}"  name="misc2"  placeholder="Misc 2 amount"> 
        </div>
      </div>

      <div class="form-group row">
        <label for="input-group-icon-email" class="col-sm-2 form-control-label">Fee Configuration </label>          



        <div class="col-sm-2">
          <div class="checkbox">
            <input type="checkbox" class="checkbox_1" name="statFee" value="1"> <label>  Stationary fee </label>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="checkbox">
            <input type="checkbox" class="checkbox_1" name="acFee" value="1"> <label>  AC Fee </label>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="checkbox">
            <input type="checkbox" class="checkbox_1" name="labFee" value="1">  <label> Lab Fee </label>
          </div>
        </div>
        <div class="col-sm-2">

        </div>
        <div class="col-sm-2">
        </div>
        <div class="col-sm-2">
        </div>



        <div class="col-sm-2">
          <div class="checkbox">
            <input type="checkbox" class="checkbox_1" name="examFee" value="1">  <label> Exam Fee </label>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="checkbox">
            <input type="checkbox" class="checkbox_1" name="libFee" value="1"> <label>  Lib Fee </label>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="checkbox">
            <input type="checkbox" class="checkbox_1" name="compFee" value="1">  <label>Computer Fee </label>
          </div>
        </div>
        <div class="col-sm-2">




        </div>


        <div class="col-sm-1"></div>



      </div>



    </div>


    <div class="">
      <div class="col-md-12 ">


        <div class="col-md-12">  
          <h2 style="padding: 6px;
          border: 2px solid #00448a;
          color: #ffffff;
          text-transform: none;
          background: #00448a;
          border-top-right-radius: 0px;
          font-size: 26px;
          text-shadow: 0px 3px 3px #520000;">Fee Setting</h2>
        </div>


            <!-- <div class="col-md-12">
              <div class="form-control" >
                <label class="radio-inline">
                  <input type="radio" name="feeStruture" class="feeStruture" onchange="changeFeeSturture(this)" value="annual" >  Charge Fee for Full Year (From Sep {{date('Y')}} )
                </label>
                <label class="radio-inline">
                  <input type="radio" name="feeStruture" class="feeStruture"  onchange="changeFeeSturture(this)" value="custom" checked> Charge Fee from 
                  ( <select  name="feePostMonth"  > 
                    <option value="1">  {{date('M')}}</option>
                    <option value="0" @if(date('d') < 21)  disabled="disabled" @endif> {{ getMonthName(((int)date('m'))+1) }} </option>
                  </select>) ( <select name="feePostYear" @if(date('d') < 21)  disabled @endif > 
                    <option>  {{date('Y')}}</option>
                    <option @if(date('d') < 21)  disabled="disabled" @endif > {{ (((int)date('Y'))+1) }} </option>
                  </select>)
                </label>
              </div>
              <p class="alert alert-danger feeStruture_eror" style="display: none"></p>
            </div> -->
            <!-- <div class="col-md-12 dropDownInstallment" style="display: none">
              <label class="control-label">Charge Fee </label>
              <select class="form-control" type="number" onchange="MonthWisestructure(this)" value="1" step="any" id="fee_factor" min="1" max="12" name="installment_no"         placeholder="Enter the Total Fee Factor :" class="input-xlarge">
                <option value="1" selected="selected">Charge Fee from ({{date('Y')}} ) {{date('M')}}</option>
                <option value="0">Charge Fee from ( {{ date('Y')}} )  {{ getMonthName(((int)date('m'))+1) }}  </option>
                
              </select>
                      var optionText = $(".installment_no option:selected").text();

                    </div> -->
                    <input type="hidden" class="futur_date_month" value="{{date("m-Y",strtotime("+1 month",strtotime(date('Y-m-d'))))}}">

                    <input type="hidden" class="current_date_month" value="{{date("m-Y",strtotime(date('Y-m-d'))) }}" >

                    <input type="hidden" name="installment_no" class="current_month_installment_no" value="0" readonly>
                    <div class="row">

                      <div class="col-md-6 annulystructure" style="display: block">
                        <label class="control-label">Charge Fee from:</label>
                        <select class="form-control" type="number"  id="fee_factor" onchange="feeChargeFrom(this)" name="fee_from"  placeholder="Enter the Total Fee Factor :" class="input-xlarge">
                          <option disabled="disabled" selected="selected" value="0">charge fee from</option>

                          <option value="{{date("m-Y",strtotime("+1 month",strtotime(date('Y-m-d'))))}}" @if((int)date('m')==1)  @endif class="fee_factor{{date("m",strtotime("+1 month",strtotime(date('Y-m-d'))))}}" >{{date("M Y",strtotime("+1 month",strtotime(date('Y-m-d'))))}}</option>

                          <option value="{{date("m-Y",strtotime(date('Y-m-d'))) }}" @if((int)date('m')==2) selected @endif class="fee_factor{{date("m",strtotime(date('Y-m-d'))) }}" >{{date("M Y",strtotime(date('Y-m-d'))) }}</option>

                          @for($i=1; $i<=10; $i++)
                          <option value="{{date("m",strtotime("-$i month",strtotime(date('Y-m-d'))))}}"  class="fee_factor{{date("m",strtotime("-$i month",strtotime(date('Y-m-d'))))}}" >{{date("M Y",strtotime("-$i month",strtotime(date('Y-m-d'))))}}</option>
                          @endfor

                        </select>
                        <p class="alert alert-danger installment_no_erorr" style="display: none"></p>
                      </div>
                    </div>
                    <div class="col-md-12" style="display: block">
                      <label class="control-label">Configure Installment Month Wise for first year:</label>
                      <div class="row">
                        <div class="col-md-1">
                         <label class="control-label" for="m1">Jan:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m1" type="checkbox" checked value="1"  min="0" step="any" value="0" id="m1" name="m1" placeholder="Enter the January Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m2">Feb:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m2" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="m2" name="m2" placeholder="Enter the February Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m3">Mar:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m3" type="checkbox" checked  value="1"  step="any" min="0" value="0" id="m3" name="m3" placeholder="Enter the March Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m4">Apr:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m4" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="m4" name="m4" placeholder="Enter the April Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m5">May:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m5" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="m5" name="m5" placeholder="Enter the May Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m6">Jun:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m6" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="m6" name="m6" placeholder="Enter the June Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m7">Jul:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m7" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="m7" name="m7" placeholder="Enter the July Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m8">Aug:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m8" type="checkbox" checked  value="1"  step="any" value="0" id="m8" name="m8" placeholder="Enter the August Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m9">Sep:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m9" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="m9" name="m9" placeholder="Enter the September Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m10">Oct:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m10" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="m10" name="m10" placeholder="Enter the October Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m11">Nov:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m11" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="m11" name="m11" placeholder="Enter the November Factor :" class="input-xlarge">
                       </div>
                       <div class="col-md-1">
                         <label class="control-label" for="m12">Dec:</label>
                         <input class="form-control first_check_month cutomFeeFactor firstFeeCharge annualFee m12" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="m12" name="m12" placeholder="Enter the December Factor :" class="input-xlarge">
                       </div>

                       <div class="col-md-4" style="margin-top: 10px">
                        <button type="button" class="btn btn-success btn-min-width mr-1 mb-1 setFeeStructure" data-toggle="modal"
                        data-target="#first_year_installment" ><i class="la la-plus">&nbsp;First Year Installment</i></button>
                      </div>


                    </div>
                  </div>
                  <div class="col-md-12 " style="display: block">
                    <label class="control-label">Configure Installment for next year cycle:</label>
                    <div class="row">
                      <div class="col-md-1">
                       <label class="control-label" for="every_m1">Jan:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m1" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="every_m1" name="every_m1" placeholder="Enter the January Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m2">Feb:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m2" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="every_m2" name="every_m2" placeholder="Enter the February Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m3">Mar:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m3" type="checkbox" checked  value="1"  step="any" min="0" value="0" id="every_m3" name="every_m3" placeholder="Enter the March Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m4">Apr:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m4" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="every_m4" name="every_m4" placeholder="Enter the April Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m5">May:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m5" type="checkbox"  checked value="1"  min="0" step="any" value="0" id="every_m5" name="every_m5" placeholder="Enter the May Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m6">Jun:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m6" type="checkbox"   checked value="1"  min="0" step="any" value="0" id="every_m6" name="every_m6" placeholder="Enter the June Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m7">Jul:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m7" type="checkbox"   checked value="1"  min="0" step="any" value="0" id="every_m7" name="every_m7" placeholder="Enter the July Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m8">Aug:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m8" type="checkbox" checked  value="1"  step="any" value="0" id="every_m8" name="every_m8" placeholder="Enter the August Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m9">Sept:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m9" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="every_m9" name="every_m9" placeholder="Enter the September Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m10">Oct:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m10" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="every_m10" name="every_m10" placeholder="Enter the October Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m11">Nov:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m11" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="every_m11" name="every_m11" placeholder="Enter the November Factor :" class="input-xlarge">
                     </div>
                     <div class="col-md-1">
                       <label class="control-label" for="every_m12">Dec:</label>
                       <input class="form-control every_cutomFeeFactor every_annualFee every_m12" type="checkbox" checked  value="1"  min="0" step="any" value="0" id="every_m12" name="every_m12" placeholder="Enter the December Factor :" class="input-xlarge">
                     </div>


                   </div>
                 </div>
                   <!-- <div class="col-md-12">
                     <div class="row">
                       <div class="col-md-4 " >
                        <div class="pendingPayment" style="display: none">
                         <label class="control-label">Pending Fee Since the Start of the year :</label>
                         <input class="form-control pendingFee" type="number" readonly="" name="pendingFee" step="any"  placeholder="00" class="input-xlarge">
                       </div>
                     </div>
                     <div class="col-md-4">
                     </div>

                     <div class="col-md-4 float right">
                       <label class="control-label">Sum of All Yearly Installments: :</label>
                       <input class="form-control TotalCustomFee" type="number" readonly="" step="any"  placeholder="00" class="input-xlarge">
                     </div>
                   </div>
                 </div> -->
                 <div class="col-md-12">
                  <div class="row">
                    <!-- <div class="col-md-4">
                      <button type="button" class="btn btn-success btn-min-width mr-1 mb-1 setFeeStructure" data-toggle="modal"
                      data-target="#first_year_installment" ><i class="la la-plus">&nbsp;First Year Installment</i></button>
                    </div> -->
                    <div class="col-md-4" style="margin-top: 10px">
                      <button type="button" class="btn btn-success btn-min-width mr-1 mb-1 setFeeStructure" data-toggle="modal"
                      data-target="#next_year_installment"><i class="la la-plus">&nbsp;Next Year Installment cycle</i></button>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4">
                     <label class="control-label">Total Payable At The Time Of Admission :</label>
                     <input type="text" readonly name="total_payabled" class=" form-control total_payabled"  id="total_payabled" >
                   </div>
                   <div class="col-md-4">
                     <label class="control-label">First Voucher :</label>
                     <input class="form-control firstVoucher" name="firstVoucher" type="number"  step="any"  placeholder="00" class="input-xlarge">
                   </div>

              <!--  <div class="col-md-4">
                 <label class="control-label">Final Voucher :</label>
                 <input class="form-control finalVoucher" type="number" readonly  step="any"  placeholder="00" class="input-xlarge">
               </div> -->

             </div>
           </div>
         </div>
         <!-- ///////////////////////##############################@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
         <!-- ///////////////?????????????????????  -->
         <div class="modal fade text-left" id="next_year_installment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h3 class="modal-title" id="myModalLabel35"> Next Year Installment cycle</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                   <label class="control-label">January:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m1" readonly type="number"  min="0" step="any" value="0" name="next_m1" placeholder="Enter the January Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">February:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m2" readonly type="number"  min="0" step="any" value="0" name="next_m2" placeholder="Enter the February Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">March:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m3" readonly type="number"  step="any" min="0" value="0" name="next_m3" placeholder="Enter the March Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">April:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m4" readonly type="number"  min="0" step="any" value="0" name="next_m4" placeholder="Enter the April Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">May:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m5" readonly type="number"  min="0" step="any" value="0" name="next_m5" placeholder="Enter the May Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">June:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m6" readonly type="number"  min="0" step="any" value="0" name="next_m6" placeholder="Enter the June Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">July :</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m7" readonly type="number"  min="0" step="any" value="0" name="next_m7" placeholder="Enter the July Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">August:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m8" readonly type="number"  step="any" value="0" name="next_m8" placeholder="Enter the August Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">September:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m9" readonly type="number"  min="0" step="any" value="0" name="next_m9" placeholder="Enter the September Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">October:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m10" readonly type="number"  min="0" step="any" value="0" name="next_m10" placeholder="Enter the October Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">November:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m11" readonly type="number"  min="0" step="any" value="0" name="next_m11" placeholder="Enter the November Factor :" class="input-xlarge">
                 </div>
                 <div class="col-md-4">
                   <label class="control-label">December:</label>
                   <input class="form-control next_cutomFeeFactor next_annualFee next_m12" readonly type="number"  min="0" step="any" value="0" name="next_m12" placeholder="Enter the December Factor :" class="input-xlarge">
                 </div>


               </div>

             </div>

           </div>
           <br>
           <div class="modal-footer">

            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
            value="Dismiss">
          </div>
        </div>
      </div>
      </div




      <!-- ///////////////?????????????????????  -->
      <div class="modal fade text-left" id="first_year_installment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h3 class="modal-title" id="myModalLabel35"> First Year Installment</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-4">
                 <label class="control-label">January:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m1" readonly type="number"  min="0" step="any" value="0" name="m1" placeholder="Enter the January Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">February:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m2" readonly type="number"  min="0" step="any" value="0" name="m2" placeholder="Enter the February Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">March:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m3" readonly type="number"  step="any" min="0" value="0" name="m3" placeholder="Enter the March Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">April:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m4" readonly type="number"  min="0" step="any" value="0" name="m4" placeholder="Enter the April Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">May:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m5" readonly type="number"  min="0" step="any" value="0" name="m5" placeholder="Enter the May Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">June:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m6" readonly type="number"  min="0" step="any" value="0" name="m6" placeholder="Enter the June Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">July :</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m7" readonly type="number"  min="0" step="any" value="0" name="m7" placeholder="Enter the July Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">August:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m8" readonly type="number"  step="any" value="0" name="m8" placeholder="Enter the August Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">September:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m9" readonly type="number"  min="0" step="any" value="0" name="m9" placeholder="Enter the September Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">October:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m10 " readonly type="number"  min="0" step="any" value="0" name="m10" placeholder="Enter the October Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">November:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m11 " readonly type="number"  min="0" step="any" value="0" name="m11" placeholder="Enter the November Factor :" class="input-xlarge">
               </div>
               <div class="col-md-4">
                 <label class="control-label">December:</label>
                 <input class="form-control first_cutomFeeFactor first_annualFee first_m12 " readonly type="number"  min="0" step="any" value="0" name="m12" placeholder="Enter the December Factor :" class="input-xlarge">
               </div>


             </div>

           </div>

         </div>
         <br>
         <div class="modal-footer">

          <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
          value="Dismiss">
        </div>
      </div>
    </div>
  </div>
  <!-- ###########################///////////////////////////////?????????????????????????????????????????????? -->


  <div class="col-md-12" style="margin-top: 30px;">
    <div class="row footer_btn">
      <div class="col-md-10 col-xs-2"></div>
      <div class="col-md-2 col-xs-12">
        <ul class="list-inline pull-right">
          <li class="formRegisterButton" style="display: block">
            <input type="text" readonly="" class="btn btn-primary " onclick="feeStracture(this);" value="Ok to Proceed">
          </li>
          <li class="formSubmitButton" style="display: none">
            <input type="submit" class="btn btn-primary " onclick="submitForm(this);" value="Register">
            <!-- <input type="submit" class="btn btn-warning " onclick="DraftForm(this);" value="Draft"> -->
          </li>


        </ul>  
      </div>              
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- <div class="tab-pane" id="messages-v2" > 
  <div class="col-md-12 col-sm-12 col-xs-12">
   <div id="tab6" class="row" style="background-color: #fff">
     <div class="col-md-3">
      <label class="control-label">Route Name: </label>
      <select class="form-control" type="text" placeholder="Enter the home Address" name="route_id" class="input-xlarge" >
        <option disabled="disabled" selected="selected">Choose the Route</option>

      </select>
    </div>
    <div class="col-md-3">
     <label class="control-label">Destination:</label>
     <select class="form-control" type="text" placeholder="Enter the home Address" name="destination_id" class="input-xlarge" >
      <option disabled="disabled" selected="selected">Choose the Destination</option>
    </select>
  </div>
  <div class="col-md-3">
    <label class="control-label">Start Date</label>
    <input class="form-control transport_start_date" id="transport_start_date" name="transport_start_date" type="text" placeholder="Father Mobile" class="input-xlarge">
  </div>
  <div class="col-md-3">
    <label class="control-label">End Date</label>
    <input class="form-control transport_end_date" id="transport_end_date" name="transport_end_date" type="text" placeholder="End Date" class="input-xlarge">
  </div>
  <div class="col-md-12" style="margin-top: 30px;">
    <div class="row footer_btn">
      <div class="col-md-10 col-xs-2"></div>
      <div class="col-md-2 col-xs-12">
        <ul class="list-inline pull-right">
          <li>
           <li><input  class="btn btn-info prev-step" readonly="" value="Previous" style="min-width: 150px;"></li>
           <li><input class="btn btn-primary next-step" onclick="profileFormSubmit(this)" readonly="" value="Next" style="width: 150px;"></li>
         </li>
       </ul>  
     </div>              
   </div>
 </div>
</div>
</div>
</div> -->
</form>
</div>
</div>
<div class="clearfix"></div>
<input type="hidden" class="branchId" value="{{Auth::user()->branch_id}}">


<style type="text/css">
  body{ 
   margin-top:40px; 
 }
 .radio-inline{
  padding-top: 5px;
}
.form-control{
  height: 33px!important;
  font-size: 14px;
  border-radius: 5px!important;
  padding: 0px 4px!important;
}
.form-control-1{
  width: 100%!important; height: 33px!important;
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
  background-color: #00448a;
  border: 1px solid #00448a;
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
  background: #002773;
  height: 41px!important;
  border-top-right-radius: 14px;
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
.input- .select2-hidden-accessible{
  height: 35px;
}
.btn-file{
 float: left;
 width: 200px;
 background: #0086d4!important;
 height: 50px;
 margin: 4px;
}
#img-upload{
  width: 100%;
}
.nav-tabs > li {
  float: left;
  width: 200px;
  background: #00448a;
  height: 50px;
  border-top-right-radius: 14px;
  margin: 4px;
}
.nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
  border-color: transparent;
  color: #fff;
  background: #0039a2;
  border-top: 4px solid #ec0207;
}
.nav-tabs > li a.active, .nav-tabs > li a.active:focus, .nav-tabs>li a.active:hover {
  border-bottom: 2px solid #ff0003;
  padding: 9px;
  outline: none;
  background: #0039a2;
  border-top: 2px solid #e60002;
}
td, th {
  padding: 0px;
  padding-left: 4px!important;
}
.form-control:disabled, .form-control[readonly] {
  opacity: 1;
}
.active{
  outline: none;
  background-color: #0086d4!important;
  border-bottom-color: transparent;}
  .btn-info {
    background-color: #000d82;
    background-color: #00448a;
    border: 1px solid #00448a;
    width: 100%;
  }
  .form-group {
    position: relative;
    padding: 12px 0 0;
  }
  form {
    background-color: #fff!important;
    box-shadow: 0px 2px 2px #696969;
  }
  .footer_btn{
    background: -webkit-linear-gradient(45deg, #00448a 63%, #f3f1f1 17%)!important;
    height: 57px!important;
  }





  @media only screen and (max-width: 1800px) {
    .footer_btn{
      background: -webkit-linear-gradient(45deg, #00448a 45%, #f3f1f1 17%)!important;
      height: 57px!important;
    }
  }
  @media only screen and (max-width: 1600px) {
    .footer_btn{
      background: -webkit-linear-gradient(45deg, #00448a 30%, #f3f1f1 17%)!important;
      height: 57px!important;
    }
    .btn:not(:disabled):not(.disabled) {
      cursor: pointer;
      font-size: 12px!important;
    }
    .nav-tabs > li {
      float: left;
      width: 150px;
      background: #00448a;
      height: 50px;
      border-top-right-radius: 14px;
      margin: 4px;
    }
  }
  @media only screen and (max-width: 992px) {
    .footer_btn{
      background: -webkit-linear-gradient(45deg, #00448a 23%, #f3f1f1 17%)!important;
      height: 57px!important;
    }
    .btn:not(:disabled):not(.disabled) {
      cursor: pointer;
      width: 88%!important;
      font-size: 10px!important;
    }
  }
  @media only screen and (max-width: 600px) {
    .footer_btn{
      background: -webkit-linear-gradient(45deg, #f3f1f1 17%, #f3f1f1 17%)!important;
      height: 57px!important;
    }
    .img_upload{
      max-height: 250px;
      max-width: 200px;
      margin: 0 auto;
    }
  }
</style>
@endsection
@push('post-scripts')
<script>
  function feeStracture(obj){
    var valid=true;


    console.log('form input',$('input[name=total_payable]:checked', '#contact').val(),parseInt($('#annual_fee').val()),'annualFee' );
    if (valid && $('#session').val() == '' || $('#session').val() == null  || parseInt($('#session').val()) < 1) {
      console.log('inner Amount',parseInt($('#session').val()));
      $('.session_eror').text('Session Field is required');
      $('.session_eror').css('display','block');
      valid = false;
    }

    if (valid && $('#annual_fee').val() == '' || $('#annual_fee').val() == null  || parseInt($('#annual_fee').val()) < 1) {
      console.log('inner Amount',parseInt($('#annual_fee').val()));
      $('.annual_fee_eror').text('Annual Fee should be greater than 0');
      $('.annual_fee_eror').css('display','block');
      valid = false;
    }

    var optionText = $("#fee_factor").val();
    console.log('installment_no_errorere',optionText,parseInt($(".installment_no").val()),$(".installment_no").val());

    // if (valid &&  $(".installment_no").val() == < 1  ) {
    //   $('.installment_no_erorr').text('installment no Field is required');
    //   $('.installment_no_erorr').css('display','block');
    //   valid = false;
    // }
    if(valid && ($("#fee_factor").val()) =='' || $("#fee_factor").val() == null || $("#fee_factor").val() == undefined){
      console.log('fee_factor',$("#fee_factor").val())
      $('.installment_no_erorr').text('installment no Field is required');
      $('.installment_no_erorr').css('display','block');
      valid = false;
    }

    var annual_fee=parseFloat($('#annual_fee').val());
    var annual_scholarship_of=parseFloat($('#annual_scholarship_of').val());

    if ( annual_fee < annual_scholarship_of){
      $('.Scholarship_eror').text('Scholarship Amount should be less then Annual fee ');
      $('.Scholarship_eror').css('display','block');
      valid = false;
    }




      // if (valid && $('input[name=feeStruture]:checked', '#contact').val()=='' || $('input[name=feeStruture]:checked', '#contact').val() == null || $('input[name=feeStruture]:checked', '#contact').val() == undefined) {
      //   $('.feeStruture_eror').text('fee Struture field is required');
      //   $('.feeStruture_eror').css('display','block');
      //   valid = false;
      // }




      // if (valid && $('input[name=feeStruture]:checked', '#contact').val()=='annual' ) {

      //   if(valid && ($("#fee_factor").val()) =='' || $("#fee_factor").val() == null || $("#fee_factor").val() == undefined){
      //     console.log('fee_factor',$("#fee_factor").val())
      //     $('.feeStruture_eror').text('Fee Factor should be 12');
      //     $('.feeStruture_eror').css('display','block');
      //     valid = false;
      //   }


      // }
      first_year_config_installment();
      second_year_config();
      if(valid){
        $('.formRegisterButton').css('display','none');
        $('.formSubmitButton').css('display','block');
        // btn.form.submit();

      }
    }
    function submitForm(btn) {

      console.log('profileFormSubmit');
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
        return true;
      }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" />





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

           $.ajax({
             type: 'POST',
             url: "#",
             data: {'folder_name':folder_name,file: file_name,'_token': $('meta[name="csrf-token"]').attr('content')},
             success: function(response){
              file.previewElement.remove();
              uploaded_files.pop(file_name);
              $('#'+field_name).val(uploaded_files);
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
      changeSessionPackage('obj');
      function changeSessionPackage(ohj){

    // disableOptionSession();
    console.log('changeSessionPackageChange',$('#session').val(),ohj);
    var curent=parseInt(<?php echo (int)(date('m')); ?>);
    var session_v=$('#session').val();
    if(session_v=='April'){
      console.log('curentApriol',curent);
      if(curent>=4){
        var month_b=12-curent;
        var total=month_b+4;


      }
    }
    if(session_v=='Sep'){
      console.log('curentSep',curent);
      if(curent>=8){
        var month_b=12-curent;
        var total=parseInt(month_b+8);
        console.log('totalSessionPackageSep',total);


      }

      feeChargeFrom('dd');
    }




  }


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
  $(function(){
    countryHasBranch('obj');

  });

  function DraftForm(obj){
    console.log('form draf', $("#contact").serialize());
    $("#contact").trigger("reset");
    location.reload();

  }
  function changeAdmissionPackage(obh){
    console.log(obh);
    $.ajax({
      method:"POST",
      url:"{{route('admissionPackageFirst')}}",
      data : {id:$(obh).val()},
      dataType:"json",
      success:function(response){
        console.log('changeAdmissionPackage',response);

        if(response.data){
          $('.registration_Fee').val(response.data.registration_Fee); 
          $('.admission_Fee').val(response.data.admission_Fee); 
          $('.security_Refundable').val(response.data.security_Refundable); 
          $('.annual_fee').val(response.data.annual_fee); 
          $('.scholarship').val(response.data.scholarship); 
          $('.annually').val(response.data.annually);        

          var sum = 0;
          var annual_fee=response.data.annual_fee;
          var amount=response.data.scholarship;

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
          totalpayed();
          readonlyBranchSetting();
        }

      }
    });
  }

  function changedmissionsPackage(){
   var branch_id=$('.branch_id').val();
   var course_id=$('#course_id').val();
   console.log('branch_id',branch_id,'course_id',course_id);

   $.ajax({
    method:"POST",
    url:"{{route('admissionPackageNulls')}}",
    data :  {branch_id:branch_id,course_id:course_id},
    dataType:"json",
    success:function(response){
      console.log('admissionPackageNulls',response);

      if(response.data){
        $('.registration_Fee').val(response.data.registration_Fee); 
        $('.admission_Fee').val(response.data.admission_Fee); 
        $('.security_Refundable').val(response.data.security_Refundable); 
        $('.annual_fee').val(response.data.annual_fee); 
        $('.scholarship').val(response.data.scholarship); 
        $('.annually').val(response.data.annually);        

        var sum = 0;
        var annual_fee=response.data.annual_fee;
        var amount=response.data.scholarship;

        $(".feeCollect").each(function(){
          sum += parseFloat($(this).val());
        });
        console.log('admissionPackageNulls',sum);

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
        totalpayed();
        readonlyBranchSetting();
      }

    }
  });
 }


 function readonlyBranchSetting(){
   var branch_id=$('.branch_id').val();
   $.ajax({
    method:"POST",
    url:"{{route('readonlyBranchSetting')}}",
    data :  {branch_id:branch_id},
    dataType:"json",
    success:function(response){
      console.log('readonlyBranchSetting',response);

      if(response.status){

        $('.registration_Fee').val(response.data.registration_Fee); 
        $('.admission_Fee').val(response.data.admission_Fee); 
        if(!response.data.securityFee){
          $('.security_Refundable').val(0); 
          $('.security_Refundable').prop('readonly', true);
        }
        if(!response.data.bookFee){
          $('.books_charges').val(0); 
          $('.books_charges').prop('readonly', true);
        }
        if(!response.data.transportCharge){
          $('.transport_fee').val(0); 
          $('.transport_fee').prop('readonly', true);
        }

        if(!response.data.Insurace){
          $('.insurance_of').val(0); 
          $('.insurance_of').prop('readonly', true);
        }

        if(!response.data.uniFee){
          $('.uniform').val(0); 
          $('.uniform').prop('readonly', true);
        }


        totalpayed();
      }

    }
  });
 }




 @if(Auth::user()->s_countryCode==92)


 function admissionPackage(obj){

  var branch_id=$('.branch_id').val();
  var course_id=$('#course_id').val();
  console.log('branch_id',branch_id,'course_id',course_id);
  $.ajax({
    method:"POST",
    url:"{{route('admissionPackage')}}",
    data : {branch_id:branch_id,course_id:course_id},
    dataType:"json",
    success:function(response){
      console.log('response',response);

      if(response.status){
        response.data.forEach(function(val,ind){
         var id = val.id;
         var name = val.package_name;
         var option = `<option value="${id}" >${name}</option>`;
         $("#adm_package_id").append(option);
       });
      }
      readonlyBranchSetting();

    }
  });

  changedmissionsPackage();
}
@endif


function branchHasClass(objClass){
  console.log('objClass',objClass,$('.branch_id').val());
  var branch_id1=$('.branch_id').val();
  $("#course_id").html('');
  console.log('branchHasClasses',branch_id1);
  $("#course_id").html(` <option selected="selected" disabled='disabled'> Select Class  </option>`);
  $.ajax({
    method:"POST",
    url:"{{route('branchHasClasses')}}",
    data : {branch_id:branch_id1},
    dataType:"json",
    success:function(response){
      console.log('branchHasClass',response);
      if(response.status){
        response.data.forEach(function(val,ind){
         var id = val.id;
         var name = val.course_name;
         var option = `<option value="${id}" ${branch_id1==id?'selected':''}>${name}</option>`;
         $("#course_id").append(option);
       });
      }

    }
  });

}
function countryHasBranch(obj){
  var s_countryCode=$('.s_countryCode').val();
  @if(Auth::user()->s_countryCode)
  var s_countryCode=<?php  echo Auth::user()->s_countryCode ?>;

  @endif

  var branch_id1=$('.branchId').val();
  if(branch_id1){

  }else{
   $("#branch_id").html(` <option selected="selected" disabled='disabled'> Select Branch  </option>`);
 }

 console.log('branch_id1   dd',  branch_id1,s_countryCode);

 $.ajax({
  method:"POST",
  url:"{{route('countryHasBranch')}}",
  data : {id:s_countryCode},
  dataType:"json",
  success:function(response){
    console.log('countryHasBranch',response);
    if(response.status){
      response.data.forEach(function(val,ind){
       var id = val.id;
       var name = val.branch_name;
       var option = `<option value="${id}" ${branch_id1==id?'selected':''}>${name}</option>`;
       $("#branch_id").append(option);
     });
    }

  }
});
}


function getKids(obj){
  console.log('course_id',$(obj).val());

  // $('#kids').html(` <option selected="selected" disabled='disabled'> Select Section  </option>`);
  $.ajax({
    method:"POST",
    url:"{{route('parentHasKids')}}",
    data : {id:$(obj).val()},
    dataType:"json",
    success:function(response){
      console.log('kids',response);
      if(response.status){
        response.data.forEach(function(val,ind){
         var id = val.id;
         var name = val.s_name+' ('+val.id+')';
         var option = `<option value="${id}">${name}</option>`;
         $('#kids').append(option);
       });
      }

    }
  });
}

function sectionSelect(obj){
  console.log('course_id',$(obj).val());
  $('#section_id').html(``);
  $.ajax({
    method:"POST",
    url:"{{route('CourseHasSection')}}",
    data : {id:$(obj).val()},
    dataType:"json",
    success:function(response){
     if(response.status){
      response.data.forEach(function(val,ind){
       var id = val.id;
       var name = val.course_name;
       var option = `<option value="${id}">${name}</option>`;
       $('#section_id').append(option);
     });

      changedmissionsPackage();
    }

  }
});

  
  changedmissionsPackage();
  // admissionPackage('obj');
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





var month=parseInt({{date('m')}});








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
  var guard=`<tr>
  <td><select class="form-control" type="text"  value="" name="relation_type[]" >
  <option disabled="disabled" selected="selected">Choose the Relation</option>
  <option value="Mother">Mother</option>
  <option value="father" disabled="disabled>Father</option>
  <option value="Brother">Brother</option>
  <option value="Sister">Sister</option>
  <option value="Uncle">Uncle</option>
  <option value="Anti">Anti</option>
  </select></td>
  <td> <input class="form-control" name="parent_name[]" id="parent_name[]" type="text" placeholder="Enter the Name :" ></td>
  <td><input class="form-control" name="parent_phone[]" id="parent_phone[]" type="number" placeholder="Enter the Mobile No :" ></td>
  <td><input class="form-control" name="parent_address[]" id="parent_address[]" type="text" placeholder="Enter the Address :" >
  </td>
  <td><input  class="form-control" name="parent_cnic[]" id="parent_cnic[]" type="text" placeholder="Enter the Cnic :" ></td>
  <td> <input  class="form-control" name="parent_email[]" id="parent_email[]" type="email" placeholder="Enter the Email :" ></td>

  </tr>`;
  $('.addParents').append(guard);

});

function scholarship(){

  var monthly_fee=$('#monthly_fee').val();
  var annual_fee=$('#annual_fee').val();


  var total_annual_fee=parseInt($('#total_annual_fee').val());
  var total_monthly_fee=parseInt($('#total_monthly_fee').val());


  var annual_scholarship_of=$('#annual_scholarship_of').val();
  var monthly_scholarship_of=$('#monthly_scholarship_of').val();
  console.log('parseInt',total_annual_fee,'monthly_scholarship_of',monthly_scholarship_of);


  $('#annual_scholarship_of').on('keyup', function () {

    var value = $(this).val();
    
    if ((value !== '') && (value.indexOf('.') === -1)) {

      $(this).val(Math.max(Math.min(value, annual_fee), 0));
    }
  });

  $('#monthly_scholarship_of').on('keyup', function () {

    var value = $(this).val();
    
    if ((value !== '') && (value.indexOf('.') === -1)) {

      $(this).val(Math.max(Math.min(value, monthly_fee), 0));
    }
  });


  
}


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


  var total=(sum) - amount;

  $("#total_fee").val(total);
  var total_monthly_fee= parseFloat(total)/12;
  var monthlyValue=(parseFloat($('#annual_fee').val())/12).toFixed(2);
  $('#monthly_fee').val(monthlyValue);
  var monthlyScholar=(parseFloat(amount)/12).toFixed(2);

  $('#monthly_scholarship_of').val(monthlyScholar);
  
  $('#total_monthly_fee').val(total_monthly_fee.toFixed(2));

  totalpayed();
  // scholarship();
});

$('#monthly_scholarship_of').on('keyup',function() {

  var sum = 0;
  var month_fee=parseFloat($('#monthly_fee').val());
  var amount=parseFloat($("#monthly_scholarship_of").val());

  var monthlyValue=parseFloat((month_fee*12).toFixed(2));
  $('#annual_fee').val(monthlyValue);

  var annualScholar=amount;
  console.log('monthly_scholarship_of',amount);
  $('#annual_scholarship_of').val(annualScholar*12);

  sum+=monthlyValue;
  var annualSch=$("#annual_scholarship_of").val(2);
  var total=(sum) - annualSch;
  $("#total_fee").val(total);
  
  console.log('total amount',total);
  var total_monthly_fee= (parseInt(total)/12).toFixed(2);
  $("#total_monthly_fee").val(total_monthly_fee);


  totalpayed();
   // scholarship();
 });


$('#monthly_fee').add('#monthly_scholarship_of').on('keyup change',function() {

  var sum = 0;
  var month_fee=parseFloat($('#monthly_fee').val());
  var amount=parseFloat($("#monthly_scholarship_of").val());

  var monthlyValue=parseFloat((month_fee*12).toFixed(2));
  $('#annual_fee').val(monthlyValue);

  var annualScholar=amount;
  console.log('monthly_scholarship_of',amount);
  $('#annual_scholarship_of').val(annualScholar*12);

  sum+=monthlyValue;

  var annualSch=$("#annual_scholarship_of").val();
  var total=(sum) - annualSch;
  $("#total_fee").val(total);
  
  console.log('total amount',total);
  var total_monthly_fee= (parseInt(total)/12).toFixed(2);
  console.log('month',total_monthly_fee);
  $("#total_monthly_fee").val(total_monthly_fee);


  totalpayed();
   // scholarship();
 });

function changAnuualScholar(){
  var sum = 0;
  var month_fee=parseFloat($('#monthly_fee').val());
  var amount=parseFloat($("#monthly_scholarship_of").val());

  var monthlyValue=parseFloat((month_fee*12).toFixed(2));
  $('#annual_fee').val(monthlyValue);

  var annualScholar=amount;
  console.log('monthly_scholarship_of',amount);
  $('#annual_scholarship_of').val(annualScholar*12);

  sum+=monthlyValue;

  var annualSch=$("#annual_scholarship_of").val();
  var total=(sum) - annualSch;
  $("#total_fee").val(total);
  
  console.log('total amount',total);
  var total_monthly_fee= (parseInt(total)/12).toFixed(2);
  console.log('month',total_monthly_fee);
  $("#total_monthly_fee").val(total_monthly_fee);
}

function monthly(){
  var sum = 0;
  var month_fee=parseFloat($('#monthly_fee').val());
  var amount=parseFloat($("#monthly_scholarship_of").val());

  var monthlyValue=parseFloat((month_fee*12).toFixed(2));
  $('#annual_fee').val(monthlyValue);

  var annualScholar=amount;
  console.log('monthly_scholarship_of',amount);
  $('#annual_scholarship_of').val(annualScholar*12);

  sum+=monthlyValue;
  var annualSch=$("#annual_scholarship_of").val(2);
  var total=(sum) - annualSch;
  $("#total_fee").val(total);
  
  console.log('total amount',total);
  var total_monthly_fee= (parseInt(total)/12).toFixed(2);
  $("#total_monthly_fee").val(total_monthly_fee);


  totalpayed();
   // scholarship();
 }

 function monthly_scholarship_of(){
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


  var total=(sum) - amount;

  $("#total_fee").val(total);
  var total_monthly_fee= parseFloat(total)/12;
  var monthlyValue=(parseFloat($('#annual_fee').val())/12).toFixed(2);
  $('#monthly_fee').val(monthlyValue);
  var monthlyScholar=(parseFloat(amount)/12).toFixed(2);

  $('#monthly_scholarship_of').val(monthlyScholar);
  
  $('#total_monthly_fee').val(total_monthly_fee.toFixed(2));

  totalpayed();
  // scholarship();
}
</script>
<script type="text/javascript">
  function nextToTab(){
    var $active = $('.nav-tabs li.active');
    $active.next().removeClass('disabled');
    nextTab($active);
  }
  function prevousToTab(){
    var $active = $('.nav-tabs li.navr');
    prevTab($active);
  }
  function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
  }
  function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
  }



  function personalFormSubmit(ob){
    $('.alert-danger').css('display','none');
    console.log('personalFormSubmit');
    branchHasClass();
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

    if (valid && $('#father_cnic').val() == '') {
      $('.father_cnic_eror').text('Father Cnic field is required');
      $('.father_cnic_eror').css('display','block');
      valid = false;
    }


    
    if(valid){
      var s_fatherName=$("#s_fatherName").val();
      var emergency_mobile=$("#emergency_mobile").val();
      var father_cnic=$('#father_cnic').val();

      $(".fatherNameFirst").val(s_fatherName);
      $(".fatherphonefirst").val(emergency_mobile);
      $(".father_cnicfirst").val(father_cnic);
      console.log('fatherNameFirst',s_fatherName,'fatherphonefirst',emergency_mobile);


      nextToTab();
    }
  }
  function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
  }

  function validatePhone(txtPhone) {
    $('.alert-danger').css('display','none');
    console.log('validatePhone',txtPhone);
    var contryCode=parseInt($('.s_countryCode').val());
    if(contryCode==92){
      if(txtPhone.length!=11 ){
        console.log('phneLength',txtPhone.length);
        $('.phone_no_eror').text('Please Enter Valid Phone No and phone No length should be 11.');
        $('.phone_no_eror').css('display','block');
        return false;
      }
      
    }
    if(contryCode.length==968){
      if(txtPhone.length!=8){
        console.log('phneLength',txtPhone.length);
        $('.phone_no_eror').text('Please Enter Valid Phone No. and phone length should be 8');
        $('.phone_no_eror').css('display','block');
        return false;
      }

    }
    var a = txtPhone;

    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(a)) {
      return true;
    }
    else {
      return false;
    }
  }

  function guardianFormSubmit(oj){
    $('.alert-danger').css('display','none');
    branchHasClass();
    console.log('guardianFormSubmit');
    var valid = true;   

    if (valid && $('.phone_no').val() == '') {

      $('.phone_no_eror').text('Emergency No field is required');
      $('.phone_no_eror').css('display','block');
      valid = false;
    }

    if($('.phone_no').val()){
      $checkPhone=validatePhone(($('.phone_no').val()));
      console.log('checkPhone',$checkPhone);
      if($checkPhone){
        valid = true;
      }else{

        valid=false;
        $('.phone_no_eror').text('Please Enter Valid Phone No');
        $('.phone_no_eror').css('display','block');
      }
    }

    if ($('.email_address').val()) {
      var checkEmail=validateEmail($('.email_address').val());
      console.log("Checked Email",checkEmail);
      if(!checkEmail){
        $('.email_address_eror').text('Please Enter the valid Email address');
        $('.email_address_eror').css('display','block');
        valid = false;
      }


    }





    if (valid && $('#home_address').val() == '') {
      $('.home_address_eror').text('Address Field field is required');
      $('.home_address_eror').css('display','block');
      valid = false;
      console.log('form input',$('#home_address').val());
    }
    if(valid){
      nextToTab();
    }
  }
  function admissionFormSubmit(og){
    $('.alert-danger').css('display','none');
    console.log('admissionFormSubmit');
    var valid = true;   
    console.log('form input',$('#course_id').val());

    if (valid && $('#course_id').val() == '' || $('#course_id').val() == null) {
      console.log('in condition');
      $('.course_id_eror').text('Course id field is required');
      $('.course_id_eror').css('display','block');
      valid = false;
    }

    if (valid && $('#section_id').val() == '' || $('#section_id').val() == null) {

      $('#sectio_eror').css('display','block');
      console.log('in Section',$('#sectio_eror').text());
      valid = false;
    }

    if(valid){
      console.log('valid admission',valid);
      nextToTab();
    }
  }
  function profileFormSubmit(oh){
    $('.alert-danger').css('display','none');
    console.log('profileFormSubmit');
    var valid = true;  



    if(valid){
      nextToTab();
    }




  }
  $(function() {
    enable_cb();
    $("#group1").click(enable_cb);
  });
  function settingFormSubmit(ol){
    $('.alert-danger').css('display','none');
    console.log('profileFormSubmit');
    var valid = true;   
    console.log('form input',$('input[name=feeStruture]:checked', '#contact').val());
    // if (valid && $('input[name=feeStruture]:checked', '#contact') || $('.feeStruture').val() == null || $('.feeStruture').val() == undefined) {
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


  $(document).ready(function() {
   $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
    if(e.keyCode == 13) {
      e.preventDefault();
      return false;
    }
  });
 });
  document.getElementById("contact").onkeypress = function(e) {
    var key = e.charCode || e.keyCode || 0;     
    if (key == 13) {
      e.preventDefault();
    }
  }

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
  $('.prev-step').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
  });
  $(document).ready(function(){
    $(document).ready(function(){
      $(document).on('click', '.addQualification', function(e) {
        var htmlContent=`<tr>
        <td> <input type="radio" name="default" value="1" > </td>
        <td><select class="form-control" type="text"  value="" name="relation_type[]" disabled="disable">
        <option disabled="disabled" selected="selected">Choose the Relation</option>
        <option value="Mother" selected="selected">Mother</option>
        <option value="father" disabled='disabled'>Father</option>
        <option value="Brother">Brother</option>
        <option value="Sister">Sister</option>
        <option value="Uncle">Uncle</option>
        <option value="Anti">Anti</option>
        </select></td>
        <td> <input class="form-control "  name="parent_name[]" id="parent_name[]" type="text" placeholder="Enter the Name :" ></td>
        <td><input  class="form-control "  name="parent_cnic[]" id="parent_cnic[]" type="text" placeholder="Enter the Cnic :" ></td>
        <td><input class="form-control  phone_no"  name="parent_phone[]" id="parent_phone[]" type="number" placeholder="Enter the Mobile No :" > <p class="alert alert-danger phone_no_eror" style="display: none"></p></td>
        <td><input class="form-control home_address" name="parent_address[]" id="home_address" type="text" placeholder="Enter the Address :" >
        <p class="alert alert-danger home_address_eror" style="display: none"></p>
        </td>

        <td> <input  class="form-control email_address" name="parent_email[]" id="parent_email[]" type="email" placeholder="Enter the Email :" >
        <p class="alert alert-danger email_address_eror" style="display: none"></p>
        </td>
        <td><div class="btn btn-danger pull-right deleteQualification">-</div></td>

        </tr>`;

        $('#qualificationRows').append(htmlContent);
      });
    });
    $(document).on('click', '.deleteQualification', function(e) {
      var rowCount = $('#qualificationRows tr').length;
      console.log('row count',rowCount);
      if(rowCount==1){
        return false;
      }
      console.log('remove tr');
      $(this).parent().parent('tr').remove();
    });
    $('input[name=martial_status]').on('change', function() {
      InputShow();
    });
    $('input[name=gender]').on('change', function() {
      InputShow();
    });
  });

  $(document).ready(function() {
    setTimeout(function() {
      console.log('alert danger display' ,$(".alert-danger").html());

      $(".alert-danger").css('display','none');
    }, 5000);
  });

</script>



<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 

<script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

<script type="text/javascript">
 $(".ip-android-1").AnyPicker({
   mode: "datetime",
   dateTimeFormat: " dd-MMM-yyyy",
 });



 $(".fee_due_date1").AnyPicker({
   mode: "datetime",
   dateTimeFormat: " dd-MMM-yyyy",
 });
 $(".freeze_till_date").AnyPicker({
   mode: "datetime",
   dateTimeFormat: " dd-MMM-yyyy",
 });

</script>
<script type="text/javascript">
  $('.annual_fee').add('#annual_scholarship_of').on('on keyup',function() {
    $('.monthlystructure').css('display','none');
    $('.annulystructure').css('display','block');
    $('.MonthWisestructure').css('display','none');
    $('.every_monthlystructure').css('display','none');
    $('.every_annulystructure').css('display','none');
    $('.every_MonthWisestructure').css('display','none');
    // $('.feeStruture').prop('checked', true); // Checks it
    // $('.feeStruture').prop('checked', false); // Unchecks it
    $('.every_feeStruture').prop('checked', true); // Checks it
    $('.every_feeStruture').prop('checked', false); // Unchecks it

  });



  $('.admission_Fee').add('.security_Refundable').add('.insurance_of').add('.registration_Fee').add('.transport_fee').add('.annual_fee').add('.annualFee').add('.uniform').add('.books_charges').add('#annual_scholarship_of').on('on keyup',function() {



    totalpayed();
    // customFeeFactor();
    // every_cutomFeeFactorSum();
  });

function updateFirstYear(){
  var first_year=parseInt(0);
        // console.log('checkbox value',$(this).);

        if ($('.m1').is(':checked')){
          first_year++;
        } 
        if ($('.m2').is(':checked')){
          first_year++;
        } 
        if ($('.m3').is(':checked')){
          first_year++;
        } 
        if ($('.m4').is(':checked')){
          first_year++;
        } 
        if ($('.m5').is(':checked')){
          first_year++;
        } 
        if ($('.m6').is(':checked')){
          first_year++;
        } 
        if ($('.m7').is(':checked')){
          first_year++;
        } 
        if ($('.m8').is(':checked')){
          first_year++;
        } 
        if ($('.m9').is(':checked')){
          first_year++;
        } 
        if ($('.m10').is(':checked')){
          first_year++;
        } 
        if ($('.m11').is(':checked')){
          first_year++;
        } 
        if ($('.m12').is(':checked')){
          first_year++;
        } 

        total_fee_factor=first_year;

  console.log('total_fee_factor',total_fee_factor);
        var total_fee=parseInt($('#total_fee').val());
        var single=total_fee/total_fee_factor;


        $('.first_m1').val(0);
        $('.first_m2').val(0);
        $('.first_m3').val(0);
        $('.first_m4').val(0);
        $('.first_m5').val(0);

        $('.first_m6').val(0);
        $('.first_m7').val(0);
        $('.first_m8').val(0);
        $('.first_m9').val(0);
        $('.first_m10').val(0);
        $('.first_m11').val(0);
        $('.first_m12').val(0);

        if ($('.m1').is(':checked')){
          $('.first_m1').val(single);
        } 
        if ($('.m2').is(':checked')){
          $('.first_m2').val(single);
        } 
        if ($('.m3').is(':checked')){
          $('.first_m3').val(single);
        } 
        if ($('.m4').is(':checked')){
          $('.first_m4').val(single);
        } 
        if ($('.m5').is(':checked')){
          $('.first_m5').val(single);
        } 
        if ($('.m6').is(':checked')){
          $('.first_m6').val(single);
        } 
        if ($('.m7').is(':checked')){
          $('.first_m7').val(single);
        } 
        if ($('.m8').is(':checked')){
          $('.first_m8').val(single);
        } 
        if ($('.m9').is(':checked')){
          $('.first_m9').val(single);
        } 
        if ($('.m10').is(':checked')){
          $('.first_m10').val(single);
        } 
        if ($('.m11').is(':checked')){
          $('.first_m11').val(single);
        } 
        if ($('.m12').is(':checked')){
          $('.first_m12').val(single);
        } 
        $('.current_month_installment_no').val(total_fee_factor);
}
  

  function totalpayed(){
    updateFirstYear();
    var admission_Fee=parseFloat($('.admission_Fee').val());
    var security_Refundable=parseFloat($('.security_Refundable').val());
    var insurance_of=parseFloat($('.insurance_of').val());
    var registration_Fee=parseFloat($('.registration_Fee').val());
    var transport_fee=parseFloat($('.transport_fee').val());
    var annual_fee=parseFloat($('.annual_fee').val());
    var annual_scholarship_of=parseFloat($('#annual_scholarship_of').val());
    var uniform=parseFloat($('.uniform').val());
    var books_charges=parseFloat($('.books_charges').val());

    var feeMonth=parseInt(month);
    var monthFee =parseFloat($('.first_m'+feeMonth).val());
    var EverymonthFee =parseFloat($('.every_m'+feeMonth).val());
    var pendingPayment=parseFloat($('.pendingFee').val());

    console.log('pendingPayment TotalPayed',pendingPayment);


    var total_payabled=0;
    if((admission_Fee)>0){
      total_payabled+=admission_Fee;
    }
    if((security_Refundable)>0){
      total_payabled+=security_Refundable;
    }

    if((uniform)>0){
      total_payabled+=uniform;
    }
    if((insurance_of)>0){
      total_payabled+=insurance_of;
    }
    if((books_charges)>0){
      total_payabled+=books_charges;
    }

    if((pendingPayment)>0){
      total_payabled+=pendingPayment;
    }
       if ($("input[name=feePostMonth]").is(':checked')){
          total_payabled+=monthFee;
        } 
   


    

    if((registration_Fee)>0){
      total_payabled+=registration_Fee;
    }
    if((transport_fee)>0){
      total_payabled+=transport_fee;
    }
    
    console.log('total_payabled',total_payabled);

    $('.total_payabled').val(total_payabled.toFixed(2));
  }





  $('.m1').add('.m2').add('.m3').add('.m4').add('.m5').add('.m6').add('.m7').add('.m8').add('.m9').add('.m10').add('.m11').add('.m12').on('on click',function() {

    first_year_config_installment();
    second_year_config();
  });
  function first_year_config_installment(){
    var first_year=parseInt(0);
        // console.log('checkbox value',$(this).);

        if ($('.m1').is(':checked')){
          first_year++;
        } 
        if ($('.m2').is(':checked')){
          first_year++;
        } 
        if ($('.m3').is(':checked')){
          first_year++;
        } 
        if ($('.m4').is(':checked')){
          first_year++;
        } 
        if ($('.m5').is(':checked')){
          first_year++;
        } 
        if ($('.m6').is(':checked')){
          first_year++;
        } 
        if ($('.m7').is(':checked')){
          first_year++;
        } 
        if ($('.m8').is(':checked')){
          first_year++;
        } 
        if ($('.m9').is(':checked')){
          first_year++;
        } 
        if ($('.m10').is(':checked')){
          first_year++;
        } 
        if ($('.m11').is(':checked')){
          first_year++;
        } 
        if ($('.m12').is(':checked')){
          first_year++;
        } 
        first_year_fee_factor(first_year);
        

      }

      function first_year_fee_factor(total_fee_factor){
        console.log('total_fee_factor',total_fee_factor);
        var total_fee=parseInt($('#total_fee').val());
        var single=total_fee/total_fee_factor;


        $('.first_m1').val(0);
        $('.first_m2').val(0);
        $('.first_m3').val(0);
        $('.first_m4').val(0);
        $('.first_m5').val(0);

        $('.first_m6').val(0);
        $('.first_m7').val(0);
        $('.first_m8').val(0);
        $('.first_m9').val(0);
        $('.first_m10').val(0);
        $('.first_m11').val(0);
        $('.first_m12').val(0);

        if ($('.m1').is(':checked')){
          $('.first_m1').val(single);
        } 
        if ($('.m2').is(':checked')){
          $('.first_m2').val(single);
        } 
        if ($('.m3').is(':checked')){
          $('.first_m3').val(single);
        } 
        if ($('.m4').is(':checked')){
          $('.first_m4').val(single);
        } 
        if ($('.m5').is(':checked')){
          $('.first_m5').val(single);
        } 
        if ($('.m6').is(':checked')){
          $('.first_m6').val(single);
        } 
        if ($('.m7').is(':checked')){
          $('.first_m7').val(single);
        } 
        if ($('.m8').is(':checked')){
          $('.first_m8').val(single);
        } 
        if ($('.m9').is(':checked')){
          $('.first_m9').val(single);
        } 
        if ($('.m10').is(':checked')){
          $('.first_m10').val(single);
        } 
        if ($('.m11').is(':checked')){
          $('.first_m11').val(single);
        } 
        if ($('.m12').is(':checked')){
          $('.first_m12').val(single);
        } 
        $('.current_month_installment_no').val(total_fee_factor);
        totalpayed();

      }


      $('.every_m1').add('.every_m2').add('.every_m3').add('.every_m4').add('.every_m5').add('.every_m6').add('.every_m7').add('.every_m8').add('.every_m9').add('.every_m10').add('.every_m11').add('.every_m12').on('on click',function() {
        first_year_config_installment();
        second_year_config();
      });


      function second_year_config(){
        var first_year=parseInt(0);
        // console.log('checkbox value',$(this).);

        if ($('.every_m1').is(':checked')){
          first_year++;
        } 
        if ($('.every_m2').is(':checked')){
          first_year++;
        } 
        if ($('.every_m3').is(':checked')){
          first_year++;
        } 
        if ($('.every_m4').is(':checked')){
          first_year++;
        } 
        if ($('.every_m5').is(':checked')){
          first_year++;
        } 
        if ($('.every_m6').is(':checked')){
          first_year++;
        } 
        if ($('.every_m7').is(':checked')){
          first_year++;
        } 
        if ($('.every_m8').is(':checked')){
          first_year++;
        } 
        if ($('.every_m9').is(':checked')){
          first_year++;
        } 
        if ($('.every_m10').is(':checked')){
          first_year++;
        } 
        if ($('.every_m11').is(':checked')){
          first_year++;
        } 
        if ($('.every_m12').is(':checked')){
          first_year++;
        } 

        

        console.log('first_year_checkbox',first_year);
        next_year_fee_factor(first_year);



      }

      
      function next_year_fee_factor(total_fee_factor){
        console.log('next_total_fee_factor',total_fee_factor);
        var total_fee=parseInt($('#total_fee').val());
        var single=total_fee/total_fee_factor;

        $('.next_m1').val(0);
        $('.next_m2').val(0);
        $('.next_m3').val(0);
        $('.next_m4').val(0);
        $('.next_m5').val(0);

        $('.next_m6').val(0);
        $('.next_m7').val(0);
        $('.next_m8').val(0);
        $('.next_m9').val(0);
        $('.next_m10').val(0);
        $('.next_m11').val(0);
        $('.next_m12').val(0);


        if ($('.every_m1').is(':checked')){

          $('.next_m1').val(single);
        } 
        if ($('.every_m2').is(':checked')){

          $('.next_m2').val(single);
        } 
        if ($('.every_m3').is(':checked')){

          $('.next_m3').val(single);
        } 
        if ($('.every_m4').is(':checked')){

          $('.next_m4').val(single);
        } 
        if ($('.every_m5').is(':checked')){

          $('.next_m5').val(single);
        } 
        if ($('.every_m6').is(':checked')){

          $('.next_m6').val(single);
        } 
        if ($('.every_m7').is(':checked')){

          $('.next_m7').val(single);
        } 
        if ($('.every_m8').is(':checked')){

          $('.next_m8').val(single);
        } 
        if ($('.every_m9').is(':checked')){

          $('.next_m9').val(single);
        } 
        if ($('.every_m10').is(':checked')){

          $('.next_m10').val(single);
        } 
        if ($('.every_m11').is(':checked')){

          $('.next_m11').val(single);
        } 
        if ($('.every_m12').is(':checked')){

          $('.next_m12').val(single);
        } 

        totalpayed();

      }

      $('.setFeeStructure').on('click',function(){
        first_year_config_installment();
        second_year_config();
      });

      var NewfuturfeeCharge=(<?php echo date('m',strtotime("+1 month",strtotime(date('Y-m-d')))); ?>);
      var futurfeeChargeYear=(<?php echo date('Y',strtotime("+1 month",strtotime(date('Y-m-d')))); ?>);
      futurfeeCharge=$('.futur_date_month').val();
      var CurrentfeeCharge=$('.current_date_month').val();
      console.log('futurfeeChargeDate',$('.futur_date_month').val(),$('.futur_date_month').val());
      function feeChargeFrom(obj){

       console.log('changeSessionPackageChange',$('#session').val(),obj);
       var curent=parseInt(<?php echo (int)(date('m')); ?>);

       var feeCharge=$('#fee_factor').val();

       var session_v=$('#session').val();


       if(futurfeeCharge==feeCharge){
        console.log('futur');
        $('#m'+curent).attr('disabled',true).removeAttr('checked');
      }else{

       if(feeCharge==CurrentfeeCharge){
        console.log('current');
        $('.firstFeeCharge').removeAttr('disabled');
        $('.firstFeeCharge').attr('checked');



      }else{

        if(session_v=='April'){

          $('#m'+curent).removeAttr('disabled');
          $('#m'+curent+1).removeAttr('disabled');
          $('#m'+curent+2).removeAttr('disabled');
          $('#m'+curent).attr('checked');
          $('#m'+curent+1).attr('checked');
          $('#m'+curent+2).attr('checked');


          $('#m12').attr('disabled',true).removeAttr('checked');
          $('#m11').attr('disabled',true).removeAttr('checked');
          $('#m10').attr('disabled',true).removeAttr('checked');
          $('#m9').attr('disabled',true).removeAttr('checked');
          $('#m8').attr('disabled',true).removeAttr('checked');
          $('#m7').attr('disabled',true).removeAttr('checked');
          $('#m6').attr('disabled',true).removeAttr('checked');
          $('#m5').attr('disabled',true).removeAttr('checked');
          $('#m4').attr('disabled',true).removeAttr('checked');

        }
        if(session_v=='Sep'){
          console.log('curentSep',curent);
          $('#m1').removeAttr('disabled').attr('checked');
          $('#m2').removeAttr('disabled').attr('checked');
          $('#m3').removeAttr('disabled').attr('checked');
          $('#m4').removeAttr('disabled').attr('checked');
          $('#m5').removeAttr('disabled').attr('checked');
          $('#m6').removeAttr('disabled').attr('checked');
          $('#m7').removeAttr('disabled').attr('checked');
          $('#m8').removeAttr('disabled').attr('checked');

          $('#m9').attr('disabled',true).removeAttr('checked');
          $('#m10').attr('disabled',true).removeAttr('checked');
          $('#m11').attr('disabled',true).removeAttr('checked');
          $('#m12').attr('disabled',true).removeAttr('checked');
        }
      }

    }

  }

</script>
@endpush