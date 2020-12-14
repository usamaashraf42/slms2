@extends('_layouts.JobApplicant.default')
@section('title', 'Dashboard')
@push('post-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
{{--    <style>--}}
{{--        .display{--}}
{{--            /*width: 100%;*/--}}
{{--            /*padding: 25px;*/--}}
{{--            /*background-color: coral;*/--}}
{{--            /*color: white;*/--}}
{{--            /*font-size: 25px;*/--}}
{{--            /*box-sizing: border-box;*/--}}
{{--        /*}*/--}}
{{--    </style>--}}
@endpush
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Profile</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                </div>
            </div>
        </div>

        <section class="content">
            @component('_components.alerts-default')
            @endcomponent
                <form action="{{route('jobapplicant_profile_update')}}" method="post" accept-charset="utf-8" enctype ='multipart/form-data'>
                    @csrf
            <div class="row">

                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <br>
                            <br>
                            <div class="col-md-9">
                                <div class="row" style="margin-top: 25px">

                                    <div class="col-md-2" style="text-align: right">
                                        <label class="control-label" style="font-size: 20px">Step 1:</label>
                                    </div>
                                    <div class="col-md-10" style="">
                                        <label>Upload Your Sample Lecture</label>
                                        <div
                                            style="height: 60px;border-radius: 15px;border: 1px solid #ccc; padding-top: 13px;padding-bottom: 6px ">
                                            <span style="text-align: left;  padding-left: 15px; font-size: 20">View Video</span>
{{--                                        <!-- <span style="text-align: left;  padding-left: 15px; font-size: 12">@if(Auth::guard('teacher')->user()->sample_lecture){{Auth::guard('teacher')->user()->sample_lecture}}@else {{'Upload Your Sample Lecture'}} @endisset</span>  -->--}}

{{--                                        <!-- <input type="text" name="sample_lecture" style="text-align: left;  padding-left: 15px; font-size: 20;border-width:0px;--}}
{{--        border:none;" value="@isset(Auth::guard('teacher')->user()->sample_lecture){{Auth::guard('teacher')->user()->sample_lecture}}@endisset" placeholder="Upload Your Sample Lecture"> -->--}}
{{--                                            @if((Auth::guard('teacher')->user()->full_sample_lecture))--}}

{{--                                                <a href="{{route('video.play.sample.lecture')}}" target="_blank">--}}
{{--          <span style="   float: left; background: #004080;--}}
{{--          width: 202px;--}}
{{--          border-radius: 23px;--}}
{{--          height: 31px;--}}
{{--          text-align: center;--}}
{{--          overflow: hidden;--}}
{{--          position: relative;--}}
{{--          font-size: 18px;--}}
{{--          line-height: 31px;--}}
{{--          color: white;--}}
{{--          padding: 0px 41px 0 53px;--}}
{{--          margin: 0 auto 60px auto;--}}
{{--          margin-right: 10px;--}}
{{--          margin-left: 10px;--}}
{{--          cursor: pointer !important;">--}}
{{--          View Video--}}
{{--        </span></a>--}}
{{--                                            @endif--}}
                                            <a href="{{route('jobApplicant.record_video')}}" target="_blank">
      <span style="   float: right; background: #004080;
      width: 202px;
      border-radius: 23px;
      height: 31px;
      text-align: center;
      overflow: hidden;
      position: relative;
      font-size: 18px;
      line-height: 31px;
      color: white;
      padding: 0px 41px 0 53px;
      margin: 0 auto 60px auto;
      margin-right: 10px;
      cursor: pointer !important;">
      Record
    </span></a>
                                        </div>

                                    </div>


                                    <p class="alert alert-danger sample_video_error" style="display: none"></p>

                                    <div class="col-md-2" style="text-align: right;position: relative; ">
                                        <label class="control-label" style="font-size: 20px;margin-top: 20px">Step
                                            2:</label>
                                    </div>

                                    <div class="col-md-10" style="">
                                        <div class="row" >


                                            <div class="col-md-12">
                                                <!-- <label class="control-label" >Upload Profile Pic</label> -->
                                                <!-- Upload Your Picture -->

                                                <div
                                                    style="height: 60px;border-radius: 15px;border: 1px solid #ccc; padding-top: 13px;padding-bottom: 6px ">
                                                    <!--  <div class="fileContainer sprite" style="">

                                                     <span style="">Upload pic</span>
                                                     <input type="file" name="profile" value=" " class="profileImg">
                                                   </div> -->

                                                    <span style="text-align: left;  padding-left: 15px; font-size: 20" >Upload Profile Pic</span>

                                                    <span  style="   float: right; background: #004080;
                width: 202px;
                border-radius: 23px;
                height: 31px;
                overflow: hidden;
                text-align: center;
                position: relative;
                font-size: 18px;
                line-height: 31px;
                color: white;
                padding: 0px 41px 0 53px;
                margin: 0 auto 60px auto;
                margin-right: 10px;
                cursor: pointer !important; " id="image">
                                            Upload        </span>

                <div class="fileContainer sprite" style="">
{{--                  <span  for="images">Upload</span>--}}
                  <input type="file" id="file_input" name="profile" style="visibility: hidden">
                </div>
                                                </div>


                                            </div>

                                        </div>
                                        <p class="alert alert-danger images_error" style="display: none"></p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="text-align: right">
                                        <label class="control-label" style="font-size: 20px">Step 3:</label>
                                    </div>
                                    <div class="col-md-10" style="">

                                        <div
                                            style="height: 60px;border-radius: 15px;border: 1px solid #ccc; padding-top: 13px;padding-bottom: 6px "
                                            >
                                            <span style="text-align: left;  padding-left: 15px; font-size: 20">Upload Your Certificate/Degree</span>
                                            <span style="   float: right; background: #004080;
            width: 202px;
            border-radius: 23px;
            height: 31px;
            text-align: center;
            overflow: hidden;
            position: relative;
            font-size: 18px;
            line-height: 31px;
            color: white;
            padding: 0px 41px 0 53px;
            margin: 0 auto 60px auto;
            margin-right: 10px;
            cursor: pointer !important; " id="certificate_button">
            Upload
          </span>
                                        </div>

                                        <div style="display: none" id="certificate_table">


                                            <div class="row">
                                                <div class="table-responsive" style="width:fit-content !important;">
                                                    <table class="table table-striped dataTable ">
                                                        <thead class="thead">
                                                        <tr>
                                                            <th>Degree</th>
                                                            <th>Insitute</th>
                                                            <th>Percentage</th>
                                                            <th>Certificate/Degree</th>
                                                            <th>Image</th>
                                                            <th>
                                                                <div class="btn btn-success  addQualification addRow2"
                                                                     id="addQualification" data-toggle="modal"
                                                                     data-target="#add_feed">+
                                                                </div>
                                                            </th>


                                                        </tr>
                                                        </thead>
                                                        <tbody id="qualificationTable">

                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <p class="alert alert-danger education_error" style="display: none"></p>

                                        </div>



                                    </div>


                                </div>


                                <div class="row" style="" >
                                    <div class="col-md-2" style="text-align: right">
                                        <label class="control-label" style="font-size: 20px">Step 4:</label>
                                    </div>
                                    <div class="col-md-10" style="">

                                        <div
                                            style="height: 60px;border-radius: 15px;border: 1px solid #ccc; padding-top: 13px;padding-bottom: 6px "
                                            >
                                            <span style="text-align: left;  padding-left: 15px; font-size: 20">Upload you experience certificate</span>
                                            <span style="    float: right; background: #004080;
        width: 202px;
        border-radius: 23px;
        height: 31px;
        text-align: center;
        overflow: hidden;
        position: relative;
        font-size: 18px;
        line-height: 31px;
        color: white;
        padding: 0px 41px 0 53px;
        margin: 0 auto 60px auto;
        margin-right: 10px;
        cursor: pointer !important; " id="experience_button">
        Upload
      </span>
                                        </div>

                                        <div id="experience_table" style="display: none;">
                                            <div class="row">
                                                <div class="table-responsive" style="width:fit-content !important;">
                                                    <table class="table table-bordered table-striped dataTable">
                                                        <thead class="thead">
                                                        <tr>
                                                            <th>Insitute</th>
                                                            <th>FROM</th>
                                                            <th>TO</th>
                                                            <th>Certificate/Degree</th>
                                                            <th>Image</th>

                                                            <th>
                                                                <div class="btn btn-success  addQualification addRow2"
                                                                     id="addQualification" data-toggle="modal"
                                                                     data-target="#exp_modal">+
                                                                </div>
                                                            </th>


                                                        </tr>
                                                        </thead>
                                                        <tbody id="experienceTable">

                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <p class="alert alert-danger experience_error" style="display: none"></p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-3">
                                <div class="portlet-title tabbable-line profile_img">

                                    <div class="form-group">

                                        <div class="logoContainer" >
                                            <img id="profile_img" style="max-height: 300px;min-height: 300px;"
                                                src=" @if(Auth::guard('JobApplicant')->user()->images){{asset('jobapplicant/images/'.Auth::guard('JobApplicant')->user()->images)}}@else{{('http://img1.wikia.nocookie.net/__cb20130901213905/battlebears/images/9/98/Team-icon-placeholder.png')}}@endif"
                                                style="border-radius: 10px">
                                        </div>


                                    </div>
                                </div>
                            </div>


        </section>


        <div class="footer_new" style="margin-top:5px;align-content: center;height: 80px;
    /* padding: 10px; */
    padding-top: 27px;
    box-shadow: 0px 2px 7px #ccc;
    text-align: center;
    border-radius: 5px;
    border: 1px solid #ccc;
        margin-left: 20px;
    ">
            <div class="">
                <!-- <button type="reset" class="btn btn-danger" style="border-radius: 15px;width: 150px;"> Cancel </button> -->
                <img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
                     height="50"/>
                <button type="submit" class="btn btn-primary" style="border-radius: 15px;width: 150px;margin: auto;display: block" onclick="formSubmit(this);return false;"> Next </button>
            </div>
        </div>
    </form>
    </div>

    <!-- {{--add data modal--}} -->

    <div class="modal fade text-left" id="add_feed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 50%;height: 50%;">
            <div class="modal-content" style="">
                <div class="modal-header bg-success" style="background-color: #004080;color:white">
                    <h3 class="modal-title" id="myModalLabel35"> Add New Education</h3>

                </div>

                <div class="modal-body">
                    <form id="qualification_add_form" method="post" action="javascript:;">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="degree">DEGREE</label>
                                <select type="text" class="form-control degree" id="degree_id"  name="degree_id" ></select>

                                <p class="alert alert-danger degree_id_error" style="display: none"></p>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="instid">Insitute</label>

                                <select type="text" class="form-control institude" id="institude_id" name="institude_id" ></select>


                                <p class="alert alert-danger institude_id_error" style="display: none"></p>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="degree_type">Degree Type</label>
                                <select type="text" name="degree_type" id="degree_type"  class="form-control ">
                                    <option value="" disabled="disabled" selected=></option>}

                                    <option value="Regular">Regular</option>
                                    <option value="Private">Private</option>
                                </select>
                                <p class="alert alert-danger degree_type_error" style="display: none"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="passing_year">YEAR OF PASSING</label>
                                <select type="text" name="passing_year" id="passing_year"  class="form-control passing_year">

                                    <option value="" disabled="disable">select the year</option>
                                    @foreach(\App\Models\Year::get() as $data)
                                        <option value="{{$data->name}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                                <p class="alert alert-danger passing_year_error" style="display: none"></p>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="degree_percentage">PERCENTAGE</label>
                                <input type="number" step="any" min="0" max="100" name="degree_percentage" id="degree_percentage" class="form-control degree_percentage">
                                <p class="alert alert-danger degree_percentage_error" style="display: none"></p>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="degree_grade">GRADE</label>
                                <input type="text" name="degree_grade" id="degree_grade" class="form-control ">
                                <p class="alert alert-danger degree_grade_error" style="display: none"></p>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
                         height="50"/>
                    &nbsp;&nbsp;&nbsp;
                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                           value="Cancel">
                    <button type='submit' class="btn btn-outline-success btn-lg">Add Qualification</button>

                </div>
                </form>
            </div>
        </div>
    </div>


    <div id="show_qualification_edit_modal"></div>
    <!-- ??????????????????? Experience modal????????????????? -->
    <div class="modal fade text-left" id="exp_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content" style="">
                <div class="modal-header bg-success" style="background-color: #004080;color:white">
                    <h3 class="modal-title" id="myModalLabel35"> Add New Experience</h3>

                </div>

                <div class="modal-body">
                    <form id="experience_add_form" method="post" action="javascript:;">
                        @csrf

                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="ex_institude_id">Institute</label>
                                <select type="text" class="form-control ex_institude_id exp_institude" id="ex_institude_id"  name="institude_id" >
                                </select>

                                <p class="alert alert-danger ex_institude_id_error" style="display: none"></p>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="teachering_sub_id">TEACHING SUBJECT</label>
                                <select type="text" class="form-control teachering_sub_id" id="teachering_sub_id" name="teachering_sub_id" >
                                </select>
                                <p class="alert alert-danger teachering_sub_id_error" style="display: none"></p>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="curriculum_id">CURRICULUM(Which you can teach)</label>
                                <select type="text" class="form-control curriculum_id" id="curriculum_id"  name="curriculum_id" >
                                    <option value="" selected disabled="disabled">Choose the curriculum</option>

                                    <option value="Matric">Matric</option>
                                    <option value="Oxford">Oxford</option>
                                    <option value="Cambridge-GCE">Cambridge-GCE</option>
                                    <option value="Cambridge-IGCSE">Cambridge-IGCSE</option>
                                    <option value="IB">IB</option>
                                    <option value="American">American</option>
                                    <option value="Dars-e-Nazami">Dars-e-Nazami</option>
                                    <option value="Other">Other</option>



                                </select>

                                <p class="alert alert-danger curriculum_id_error" style="display: none"></p>
                            </div>
                        </div>
                        <div class="row">


                            <div class="col-sm-4 form-group">
                                <label for="class_id">Class</label>
                                <select type="text" class="form-control class_id" id="class_id"  name="class_id" list="ClassList" autocomplete="off">
                                </select>
                                <p class="alert alert-danger class_id_error" style="display: none"></p>
                            </div>

                            <div class="col-sm-2 form-group">
                                <label for="exp_from">FROM</label>
                                <input type="text" name="exp_from" id="exp_from" class="form-control exp_from" placeholder="dd-mm-yyyy" autocomplete="off">
                                <p class="alert alert-danger exp_from_error" style="display: none"></p>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="exp_to">TO</label>
                                <input type="text" name="exp_to" id="exp_to" class="form-control " placeholder="dd-mm-yyyy" autocomplete="off">
                                <p class="alert alert-danger exp_to_error" style="display: none"></p>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="current_job">Currently working</label>
                                <select type="text" name="current_job" id="current_job" class="form-control current_job" autocomplete="off">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>

                                <p class="alert alert-danger exp_to_error" style="display: none"></p>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
                                 height="50"/>
                            &nbsp;&nbsp;&nbsp;
                            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                                   value="Cancel">
                            <button type='submit' class="btn btn-outline-success btn-lg" id="experienceBtn">Add Experience</button>
                            <!-- <input type="submit" class="btn btn-outline-success btn-lg" id="addQualificationBtn"
                              value="Add Qualification"> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- ?????????????? Edit Qualification modal  -->


@endsection
@push('post-scripts')

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
                $('.loader-img').hide();
            $('#image').click(function(){
                $('#file_input').click();
            });
                //image prewiew
                $('#file_input').on('change', function () {
                    var file = $(this).get(0).files;
                    var reader = new FileReader();
                    reader.readAsDataURL(file[0]);
                    reader.addEventListener("load", function (e) {
                        var image = e.target.result;
                        $("#profile_img").attr('src', image);
                    });
                });
                //date picker
            $('#exp_from').datepicker({
                format: "dd-mm-yyyy"
            });
            // FOR DEMO PURPOSE
            // $('#exp_from').on('change', function () {
            //     var pickedDate = $('input').val();
            //     $('#exp_from').html(pickedDate);
            // });


            $('#exp_to').datepicker({
                format: "dd-mm-yyyy"
            });
            // FOR DEMO PURPOSE
            // $('#exp_to').on('change', function () {
            //     var pickedDate = $('input').val();
            //     $('#exp_to').html(pickedDate);
            // });
            //ajax on select type
            //form submit

            $('#degree_id').on('focus',function(){
                $('#degree_id').select2({
                    width: 'resolve',
                    ajax: {
                        url: "{{route('get_degree_ajax')}}",
                        method:"post",

                        processResults: function (_data, params) {

                            var data1= $.map(_data, function (obj) {
                                var newobj = {};
                                newobj.id = obj.name;
                                newobj.text= `${obj.name}  `;
                                return newobj;
                            });
                            return { results:data1};
                        }
                    }
                });

            });

            $('#institude_id').on('focus',function(e) {
                $('#institude_id').select2({
                    width: 'resolve',
                    ajax: {
                        url: "{{route('get_institude_ajax')}}",
                        method: "post",

                        processResults: function (_data, params) {

                            var data1 = $.map(_data, function (obj) {
                                var newobj = {};
                                newobj.id = obj.name;
                                newobj.text = `${obj.name}  `;
                                return newobj;
                            });
                            return {results: data1};
                        }
                    }
                });
            });
                $('#ex_institude_id').on('focus',function(){
                    $('#ex_institude_id').select2({
                        width: 'resolve',
                        ajax: {
                            url: "{{route('exp_institude_ajax')}}",
                            method:"get",

                            processResults: function (data, params) {

                                var data1= $.map(data, function (obj) {
                                    var newobj = {};
                                    newobj.id = obj.name;
                                    newobj.text= `${obj.name}`;
                                    return newobj;
                                });
                                return { results:data1};
                            }
                        }
                    });
                $('#teachering_sub_id').on('focus',function(){
                    $('#teachering_sub_id').select2({
                        width: 'resolve',
                        ajax: {
                            url: "{{route('get_subject_ajax')}}",
                            method:"post",

                            processResults: function (_data, params) {

                                var data1= $.map(_data, function (obj) {
                                    var newobj = {};
                                    newobj.id = obj.sub_name;
                                    newobj.text= `${obj.sub_name}  `;
                                    return newobj;
                                });
                                return { results:data1};
                            }
                        }
                    });
                });
                    $('#class_id').on('focus',function(){
                        $('#class_id').select2({
                            width: 'resolve',
                            ajax: {
                                url: "{{route('get_grade_ajax')}}",
                                method:"post",

                                processResults: function (_data, params) {

                                    var data1= $.map(_data, function (obj) {
                                        var newobj = {};
                                        newobj.id = obj.name;
                                        newobj.text= `${obj.name}  `;
                                        return newobj;
                                    });
                                    return { results:data1};
                                }
                            }
                        });
                    });

            });
//             $(document).on('click', '.addQualification', function(e) {
//                 var htmlContent=`<tr>
// <!--                <td><input type="text" class="form-control" name="qualification[]"></td>-->
//                 <td><input type="text" class="form-control" name="degree[]"></td>
//                  <td><input type="text" class="form-control" name="institude[]"></td>
// <!--                <td><input type="text" class="form-control" name="duration[]"></td>-->
//                 <td><input type="text" class="form-control" name="marks[]"></td>
//                 <td><label for="images" class="btn btn-primary" style="position: relative;left: 0px;top: 5px;">Upload Profile</label>
//                 <input type="file" onchange="readURL(this);" value="" name="document[]" class="hide" style="opacity: 0; max-width: 100px!important;"></td>
//                 <td><div class="btn btn-danger pull-right deleteQualification">-</div></td>
//                 </tr>`;
//
//                 $('#qualificationTable').append(htmlContent);
//             });
        $(document).on('click', '.deleteQualification', function(e) {

            //do whatever
            // var rowCount = $('#qualificationRows tr').length;
            // console.log('row count',rowCount);
            // if(rowCount==1){
            //
            //     return false;
            // }
            console.log('remove tr');
            $(this).parent().parent().remove();
        });
            $('#certificate_button').click(function (e) {
                // $('.alert').css('display','none');
                // $("#experience_table").css('display','none');
                $("#certificate_table").toggle();
                return false;

            });
            $('#experience_button').click(function (e) {
                // $('.alert').css('display','none');
                // $("#certificate_table").css('display','none');
                $("#experience_table").toggle();
                return false;

            })
            //education form
            $('form#qualification_add_form').on('submit',function(e){
                event.preventDefault();
                var valid = true;
                if (valid && $.trim($('#degree_id').val()) == ' ' || $.trim($('#degree_id').val()) == '') {

                    $('.degree_id_error').text('Degree field is required');
                    $('.degree_id_error').css('display','block');
                    valid = false;

                }
                else{
                    $('.degree_id_error').hide();
                }

                if (valid && $.trim($('#institude_id').val()) == '') {
                    console.log('institude_id validatoin');
                    $('.institude_id_error').text('Institude  field is required');
                    $('.institude_id_error').css('display','block');
                    valid = false;
                }
                else{
                    $('.institude_id_error').hide();
                }

                if (valid && $.trim($('#degree_type').val()) == '') {
                    // console.log('degree_type validatoin');
                    $('.degree_type_error').text('Name  field is required');
                    $('.degree_type_error').css('display','block');

                    valid = false;
                }
                else{
                    $('.degree_type_error').hide();
                }
                if (valid && $.trim($('#passing_year').val()) == '') {

                    $('.passing_year_error').text('Passing Year  field is required');
                    $('.passing_year_error').css('display','block');
                    valid = false;
                }
                else{
                    $('.passing_year_error').hide();
                }


                if (valid && $.trim($('#degree_percentage').val()) == '') {

                    $('.degree_percentage_error').text('Degree percentage  field is required');
                    $('.degree_percentage_error').css('display','block');
                    valid = false;
                }
                else{
                    $('.degree_percentage_error').hide();
                }


                if (valid && $.trim($('#degree_grade').val()) == '') {
                    // console.log('degree_grade validatoin');
                    $('.degree_grade_error').text('Degree Grade  field is required');
                    $('.degree_grade_error').css('display','block');
                    valid = false;
                }
                else{
                    $('.degree_grade_error').hide();
                }

                if(valid){

                    console.log('all field correctly done')

                    var degree_id=$('#degree_id').val();
                    var institude_id=$('#institude_id').val();
                    var degree_type=$('#degree_type').val();
                    var passing_year=$('#passing_year').val();
                    var degree_percentage=$('#degree_percentage').val();
                    var degree_grade=$('#degree_grade').val();


                    console.log('clicked',degree_id,institude_id);



                    var form = $('#qualification_add_form')[0]; // You need to use standard javascript object here
                    var formData = new FormData(form);
                    // var formData = $('#qualification_add_form').serialize();
                    console.log('form',form);
                    console.log('formData',formData);
                    $.ajax({
                        url: "{{route('jobapplicant_educationAdd')}}",
                        type: "POST",
                        data:new FormData(this),
                        dataType:'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('.loader-img').show();
                            $('#preloader').show();
                        },
                        complete: function () {
                            $('#preloader').fadeOut('slow', function () {
                                $(this).remove();
                            });
                            $('.loader-img').hide();
                        },
                        success: function (response) {

                            if (response.status == true) {



                                $('#add_feed').modal('hide');

                                $("#qualification_add_form")[0].reset();


                                swal(
                                    'Success!',
                                    'Data Added Successfully',
                                    'success'
                                );

                                qualificationTable();

                            } else {
                                swal(
                                    'Warning!',
                                    response.message,
                                    'warning'
                                );
                            }
                        }, error: function (e) {
                            console.log('error', e);
                            swal(
                                'Oops...',
                                'Something went wrong!',
                                'error'
                            )
                        }
                    });

                }




                e.preventDefault();

            });
            //experience form
            $('form#experience_add_form').on('submit',function(e){
                event.preventDefault();
                var valid = true;

                if (valid && $.trim($('#ex_institude_id').val()) == '') {
                    console.log('institude_id validatoin');
                    $('.ex_institude_id_error').text('Institude  field is required');
                    $('.ex_institude_id_error').css('display','block');
                    valid = false;
                }
                else{
                    $('.ex_institude_id_error').hide();
                }

                if (valid && $.trim($('#teachering_sub_id').val()) == '') {
                    // console.log('degree_type validatoin');
                    $('.teachering_sub_id_error').text('Teaching field is required');
                    $('.teachering_sub_id_error').css('display','block');

                    valid = false;
                }
                else{
                    $('.teachering_sub_id_error').hide();
                }
                if (valid && $.trim($('#curriculum_id').val()) == '') {

                    $('.curriculum_id_error').text('Curriculam  field is required');
                    $('.curriculum_id_error').css('display','block');
                    valid = false;
                }
                else{
                    $('.curriculum_id_error').hide();
                }


                if (valid && $.trim($('#class_id').val()) == '') {

                    $('.class_id_error').text('Class field is required');
                    $('.class_id_error').css('display','block');
                    valid = false;
                }
                else{
                    $('.class_id_error').hide();
                }


                if (valid && $.trim($('#exp_from').val()) == '') {
                    // console.log('degree_grade validatoin');
                    $('.exp_from_error').text('Date from field is required');
                    $('.exp_from_error').css('display','block');
                    valid = false;
                }
                else{
                    $('.exp_from_error').hide();
                }
                if (valid && $.trim($('#exp_to').val()) == '') {
                    // console.log('degree_grade validatoin');
                    $('.exp_to_error').text('Date to field is required');
                    $('.exp_to_error').css('display','block');
                    valid = false;
                }
                else{
                    $('.exp_to_error').hide();
                }
                if (valid && $.trim($('#current_job').val()) == '') {
                    // console.log('degree_grade validatoin');
                    $('.current_job_error').text('Currently Working field is required');
                    $('.current_job_error').css('display','block');
                    valid = false;
                }
                else{
                    $('.current_job_error').hide();
                }

                if(valid){

                    console.log('all field correctly done')

                    var form = $('#experience_add_form')[0]; // You need to use standard javascript object here
                    var formData = new FormData(form);
                    console.log('form',form);
                    console.log('formData',formData);
                    $.ajax({
                        url: "{{route('jobapplicant_experienceAdd')}}",
                        type: "POST",
                        data:formData,
                        dataType:'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('.loader-img').show();
                            $('#preloader').show();
                        },
                        complete: function () {
                            $('#preloader').fadeOut('slow', function () {
                                $(this).remove();
                            });
                            $('.loader-img').hide();
                        },
                        success: function (response) {

                            if (response.status == true) {



                                $('#add_feed').modal('hide');

                                $("#qualification_add_form")[0].reset();


                                swal(
                                    'Success!',
                                    'Data Added Successfully',
                                    'success'
                                );

                                qualificationTable();

                            } else {
                                swal(
                                    'Warning!',
                                    response.message,
                                    'warning'
                                );
                            }
                        }, error: function (e) {
                            console.log('error', e);
                            swal(
                                'Oops...',
                                'Something went wrong!',
                                'error'
                            )
                        }
                    });

                }




                e.preventDefault();

            });
        })
    </script>
    <script>
        $(function(){
            qualificationTable();
            experienceTable();
        });
        function goToProfilePage() {
            swal({
                title: "Warning",
                text: "If you go back your data will be reset",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function (isConfirm) {
                if (isConfirm) {
                } else {
                    swal("Cancelled", "Your Video is safe :)", "error");
                }
            });
        }
        function qualificationTable(){

            $('#qualificationTable').html(``);
            $.ajax({
                url: "{{route('jobapplicant_qualification_get_ajax')}}",
                method:"POST",
                success: function(response){

                    // console.log('qualificationTable',response);
                    if(response.status){
                        var data=response.record;
                        var qualificationTableHtml=``;

                        for(var i=0; i<data.length; i++){
                            var row=data[i];
                            // console.log('qualification row',row);

                            qualificationTableHtml+=`<tr>
      <td> ${row.degree?row.degree.name:''}</td>
      <td> ${row.institude?row.institude.name:''}</td>
      <td> ${row.degree_percentage?row.degree_percentage:''}</td>
      <td>
        <label class="label1 btn btn-primary" for="education_${row.id}">Upload file</label>
        <input  type="file" accept="image/*" onchange="previewFile(event,this)" id="education_${row.id}" name="education_${row.id}" class="change_image education_${i}"
      dvalue="${row.image?1:0}"  data-ids="${row.id}" style="visibility: hidden" >

      <div id="file-upload-filename"></div></td>

      <td> ${row.image?
                                `<img src="${row.full_image_path?row.full_image_path:''}" alt="image not exist" id="educ_${row.id}" class="educ_${row.id}" width="80" height="80">`
                                :`<img src="images/degree.jpg" alt="image not exist"  id="educ_${row.id}"  class="educ_${row.id}" width="80" height="80"`}</td>
        <td style="display: flex"> <button class="btn btn-info btn-sm  qualification_edit_record" data-ids=${row.id} onclick="qualification_edit_record(this); return false;"><i class="fa fa-edit fa-sm" aria-hidden="true"></i></button> &nbsp<button class="btn  btn-danger btn-sm qualification_delete_record" data-ids=${row.id} onclick="qualification_delete_record(this)"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button></td></tr>`;
                        }
                        $('#qualificationTable').html(qualificationTableHtml);



                    }
                    else{
                        var experienceTableHtml =`<tr>
     <td colspan="6">Record not found</td>
     </tr>`
                        $('#qualificationTable').html(experienceTableHtml);


                    }
                }});


        }
        function experienceTable(){

            $('#experienceTable').html(``);
            $.ajax({
                url: "{{route('jobapplicant_experience_get_ajax')}}",
                method:"POST",
                success: function(response){

                    // console.log('experienceTable',response);
                    if(response.status){
                        var data=response.record;
                        var experienceTableHtml=``;

                        for(var i=0; i<data.length; i++){
                            var row=data[i];
                            // console.log('qualification row',row);
                            experienceTableHtml+=`<tr>
        <td> ${row.institude?row.institude.name:''}</td>
        <td> ${row.exp_from?row.exp_from:''}</td>
        <td> ${row.exp_to?row.exp_to:''}</td>
        <td>    <label class="label1 btn btn-primary" for="experience_${row.id}">Upload file</label>
         <input  type="file" accept="image/*" onchange="ExpreviewFile(event,this)" id="experience_${row.id}" name="experience_${row.id}" class="change_image experience_${i}" dvalue="${row.image?1:0}" data-ids="${row.id}" style="visibility: hidden">
        <input type="hidden" name="experience_file">
        <div id="file-upload-filename"></div></td>
        <td> ${row.full_image_path?
                                `<img src="${row.full_image_path?row.full_image_path:''}" alt="image not exist" id="exp_${row.id}" class="exp_ ${row.id}" width="80" height="80">`
                                :`<img src="images/degree.jpg" alt="image not exist"  id="exp_${row.id}"  class="exp_ ${row.id}" width="80" height="80"`}</td>
          <td style="display: flex"> <div class="btn btn-info btn-sm  qualification_edit_record" data-ids=${row.id} onclick="experience_edit_record(this); return false;"><i class="fa fa-edit fa-sm" aria-hidden="true"></i></div> &nbsp<div class="btn btn-danger btn-sm experience_delete_record" data-ids=${row.id} onclick="experience_delete_record(this)"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></div></td></tr>`;
                        }
                        $('#experienceTable').html(experienceTableHtml);


                    }
                    else{
                        var experienceTableHtml =`<tr>
       <td colspan="6">Record not found</td>
       </tr>`
                        $('#experienceTable').html(experienceTableHtml);

                    }
                }});



        }
        function qualification_delete_record(obj){
            // console.log('ids',$(obj).attr('data-ids'));

{{--                @if(Auth::guard('JobApplicant')->user()->status==0){--}}
{{--                swal({--}}
{{--                    title: 'Your Status Inactive!',--}}
{{--                    text: 'You can not update your profile now',--}}
{{--                    icon: 'error'--}}
{{--                });--}}

{{--            }--}}
{{--            return false;--}}
{{--            @endif--}}



            var id=$(obj).attr('data-ids');


            swal({
                title: "Are you sure?",
                text: "You want to Delete Record!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'Qualification!',
                        text: 'Record Delete Successfully !',
                        icon: 'success'
                    }).then(function() {
                        $.ajax({
                            url: "{{route('jobapplicant_qualification.delete')}}",
                            method:"POST",
                            data:{id:id},
                            success: function(response){

                                // console.log('ajax call',response);
                                if(response.status){
                                    if(response.status==1) {
                                        $(obj).parent().parent('tr').remove();

                                        // qualificationTable();

                                    }
                                    // }else{
                                    //     // qualificationTable();
                                    //
                                    //     $(obj).parent().parent('tr').remove();
                                    // }

                                }
                                else{

                                }
                            }});
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });

        }
        function experience_delete_record(obj){


            var idd=$(obj).attr('data-ids');


            swal({
                title: "Are you sure?",
                text: "You want to Delete Record!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'Experience!',
                        text: 'Record Update Successfully !',
                        icon: 'success'
                    }).then(function() {
                        $.ajax({
                            url: "{{route('jobapplicant_experience_delete')}}",
                            method:"POST",
                            data:{id:idd},
                            success: function(response){

                                if(response.status){
                                    if(response.status==1){
                                        $(obj).parent().parent('tr').remove();

                                        // experienceTable();


                                    }else{
                                        // experienceTable();

                                        $(obj).parent().parent('tr').remove();
                                    }

                                }
                                else{

                                }
                            }});
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }
        function qualification_edit_record(obj){

            var id=$(obj).attr('data-ids');
            $.ajax({
                url: "{{route('jobapplicant_qualification_edit')}}",
                type: 'get',
                data: {
                    'id': id
                },
                success: function (response) {
                    // console.log(response);
                    $("#show_qualification_edit_modal").html(response);
                    jQuery("#updateCourse").modal('show');
                },
                error: function (e) {
                    // console.log('error', e);
                }
            });


        }
        function experience_edit_record(obj){


            var id=$(obj).attr('data-ids');
            $.ajax({
                url: "{{route('jobapplicant_experience_edit')}}",
                type: 'get',
                data: {
                    'id': id
                },
                success: function (response) {
                    // console.log(response);
                    $("#show_qualification_edit_modal").html(response);
                    jQuery("#updateExperience").modal('show');
                },
                error: function (e) {
                    // console.log('error', e);
                }
            });


        }
        var previewFile = function(event,obj) {
            $('.alert').css('display','none');
            var ids=$(obj).attr('data-ids');
            console.log('ids',ids);
            var output = document.getElementById('educ_'+ids);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        var ExpreviewFile = function(event,obj) {
            $('.alert').css('display','none');
            var ids=$(obj).attr('data-ids');
            var output = document.getElementById('exp_'+ids);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
       function trigger_experience(){
           $('#experience_table').show();
          // var element=document.getElementById("experience_table");
          //  element.classList.toggle('display');
          //  console.log('hell arslan'+ element);
          //  $("#experience_table").toggle();
           // console.log('usama');
       }
        function trigger_education(){
            $('#certificate_table').show();
            // var element=document.getElementById("certificate_table");
            // element.classList.toggle();
            //  console.log('hell arslan'+ element);
            //  $("#experience_table").toggle();
            // console.log('usama');
        }
        function formSubmit(btn){
            var valid=true;

            {{--                @if(!Auth::guard('teacher')->user()->image)--}}
            {{--                if (valid && $.trim($('#images').val()) == '') {--}}
            {{--                    // console.log('degree_type validatoin');--}}
            {{--                    $('.images_error').text('Profile Image field is required');--}}
            {{--                    $('.images_error').css('display','block');--}}

            {{--                    valid = false;--}}
            {{--                }--}}
            {{--                @endif--}}

            {{--                    @if(!Auth::guard('teacher')->user()->full_sample_lecture)--}}
            {{--                if (valid && $.trim($('#images').val()) == '') {--}}
            {{--                    // console.log('degree_type validatoin');--}}
            {{--                    $('.sample_video_error').text('Sample Video field is required');--}}
            {{--                    $('.sample_video_error').css('display','block');--}}

            {{--                    valid = false;--}}
            {{--                }--}}
            {{--                @endif--}}





            var qualCount = $('#qualificationTable tr').length;
            console.log('qualCount count',qualCount);

            for(var i=0; i<qualCount; i++){
                console.log('education_',$('.education_'+i).attr('dvalue') );

                if ($.trim($('.education_'+i).val()) == '' && ($('.education_'+i).attr('dvalue'))==0 ) {

                    console.log('education',parseInt($('.education_'+i).attr('dvalue')));
                    trigger_education();
                    $('.education_error').text("It is complusory to upload all degrees. If you don't have degree/certificate please delete that record");
                    $('.education_error').css('display','block');

                    valid = false;
                }
            }

            var ExpCount = $('#experienceTable tr').length;
            console.log('ExpCount count',ExpCount);
            for(var i=0; i<ExpCount; i++){
                console.log('exp',parseInt($('.experience_'+i).attr('dvalue')));
                if ($.trim($('.experience_'+i).val()) == '' && ($('.experience_'+i).attr('dvalue')) ==0) {
                    trigger_experience();
                    $('.experience_error').text(" It is complusory to upload experience letters. If you don't have experience please delete that record");
                    $('.experience_error').css('display','block');

                    valid = false;
                }
            }


            {{--// @foreach(Auth::guard('teacher')->user()->teacherEducation as $data)--}}

            {{--// @if(!$data->image)--}}
            {{--// console.log({{$data->id}},$.trim($('#education_'+{{$data->id}}).val()));--}}
            {{--// if ($.trim($('#education_'+{{$data->id}}).val()) == '') {--}}
            {{--//   console.log('qualification validatoin',"{{isset($data->degree->name)?$data->degree->name:''}}");--}}
            {{--//   $('.education_error').text("{{isset($data->degree->name)?$data->degree->name:''}} degree field is required");--}}
            {{--//   $('.education_error').css('display','block');--}}

            {{--//   valid = false;--}}
            {{--// }--}}

            {{--// @endif--}}

            {{--// @endforeach--}}

            {{--// @foreach(Auth::guard('teacher')->user()->teacherExp as $data)--}}

            {{--// @if(!$data->image)--}}
            {{--// console.log({{$data->id}},$.trim($('#experience_'+{{$data->id}}).val()));--}}
            {{--// if ($.trim($('#experience_'+{{$data->id}}).val()) == '') {--}}
            {{--//   console.log('qualification validatoin',"{{isset($data->institude->name)?$data->institude->name:''}}");--}}
            {{--//   $('.experience_error').text("{{isset($data->institude->name)?$data->institude->name:''}} Experience Letter field is required");--}}
            {{--//   $('.experience_error').css('display','block');--}}

            {{--//   valid = false;--}}
            {{--// }--}}

            {{--// @endif--}}

            {{--// @endforeach--}}


            // return false;
            if(!valid){
                return false;
            }
            $('#loader').show();

            $('.loader-img').show();
            $('#preloader').show();

            $(btn).attr('disabled', 'disabled');
            btn.disabled = true;
            btn.form.submit();
            return true;
        }

    </script>
@endpush
