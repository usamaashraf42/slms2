@extends('_layouts.JobApplicant.default')
@section('title', 'Dashboard')
@push('post-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
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

    <div class="row">
        <div class="col-md-12">
            <h2  style="margin-left: 34px;">Record Lecture </h2>
        </div>
        <br>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="text-align: center;margin-top: 27px;">
                    <label for="sub_id">curriculum: </label>
                </div>
                <div class="col-md-4">
                    <label>Choose the curriculum</label>
                    <select type="text" class="form-control curriculum_id" id="curriculum_id" name="curriculum_id"
                            onchange="curriculumChanged(this)">
                        <!-- <option value="" selected="" disabled="disabled">Choose the curriculum</option> -->
                        <option value="1">Standard (text Book Board)</option>
                        <option value="2">Silver (Oxford)</option>
                        <option value="3">Gold (Cambridge)</option>
                        <option value="0">Short Course</option>
                    </select>

                    <a href="" target="_blank" style="text-align: right;color:#004080">curriculum detail</a>


                </div>
                <div class="col-md-2" style="text-align: center;margin-top: 27px;">
                    <label>Medium of teaching: </label>
                </div>
                <div class="col-md-4">

                    <label for="sub_id">In which language you are recording lecture: </label>
                    <select type="text" name="medium_of_teaching" class="form-control" id="medium_of_teaching">

                        <option value="english">English</option>
                        <option value="urdu">Urdu</option>
                        <option value="other">Other</option>

                    </select>


                </div>
            </div>


            <div class="row" id="gradeCourse">

                <div class="col-md-2" style="text-align: center;margin-top: 27px;">
                    <label for="grade_id">For Grade: </label>
                </div>

                <div class="col-md-4">
                    <label for="sub_id">For which grade you are making lecture: </label>
                    <select class="form-control grade_id" id="grade_id" name="grade_id" value="{{old('grade')}}"
                            placeholder="Enter the grade...">
                        {{--                                                                    @foreach(\App\Models\Grade::get() as $data)--}}
                        {{--                                                                        <option value="{{$data->id}}"> {{$data->name}} </option>--}}
                        {{--                                                                    @endforeach--}}

                    </select>

                    <p class="alert alert-danger grade_id_error" style="display: none"></p>

                </div>


                <div class="col-md-2" style="text-align: center;margin-top: 27px;">
                    <label for="sub_id">Subject: </label>
                </div>
                <div class="col-md-4">
                    <label for="sub_id">Select subject on which you want to record a lecture: </label>
                    <select type="text" placeholder="" name="sub_id" class="form-control sub_id" id="sub_id">
                        <option value=""> choose Subject</option>
                        @foreach(\App\Models\Subject::get() as $data)
                            <option value="{{$data->id}}">{{$data->sub_name}}  </option>
                        @endforeach
                    </select>


                    <p class="alert alert-danger sub_id_error" style="display: none"></p>
                </div>


            </div>

            {{--                            <div class="row"  style="display: none"  id="shortCourse">--}}

            {{--                                <div class="col-md-2" style="text-align: center;margin-top: 27px;">--}}
            {{--                                    <label for="grade_id" >Short Course Name: </label>--}}
            {{--                                </div>--}}
            {{--                                <div class="col-md-2">--}}
            {{--                                    <label for="sub_id" >Short Course Name: </label>--}}
            {{--                                    <input class="form-control course_name" id="course_name" name="course_name" value="@isset(Auth::guard('teacher')->user()->shortCourse->name) {{Auth::guard('teacher')->user()->shortCourse->name}}@endisset" placeholder="Enter the short course name...">--}}


            {{--                                    <p class="alert alert-danger course_name_error" style="display: none"></p>--}}

            {{--                                </div>--}}

            {{--                                <div class="col-md-2">--}}
            {{--                                    <label for="sub_id" >Duration: </label>--}}
            {{--                                    <select class="form-control weeks" id="weeks" name="weeks" >--}}
            {{--                                        <option value="1" @if(isset(Auth::guard('teacher')->user()->weeks) && Auth::guard('teacher')->user()->weeks==1) selected @endif>1 weeks</option>--}}
            {{--                                        <option value="2" @if(isset(Auth::guard('teacher')->user()->weeks) && Auth::guard('teacher')->user()->weeks==2) selected @endif>2 weeks</option>--}}
            {{--                                        <option value="3" @if(isset(Auth::guard('teacher')->user()->weeks) && Auth::guard('teacher')->user()->weeks==3) selected @endif>3 weeks</option>--}}
            {{--                                        <option value="4" @if(isset(Auth::guard('teacher')->user()->weeks) && Auth::guard('teacher')->user()->weeks==4) selected @endif>4 weeks</option>--}}
            {{--                                        <option value="5" @if(isset(Auth::guard('teacher')->user()->weeks) && Auth::guard('teacher')->user()->weeks==5) selected @endif>5 weeks</option>--}}
            {{--                                        <option value="6" @if(isset(Auth::guard('teacher')->user()->weeks) && Auth::guard('teacher')->user()->weeks==6) selected @endif>6 weeks</option>--}}
            {{--                                        <option value="7" @if(isset(Auth::guard('teacher')->user()->weeks) && Auth::guard('teacher')->user()->weeks==7) selected @endif>7 weeks</option>--}}
            {{--                                        <option value="8" @if(isset(Auth::guard('teacher')->user()->weeks) && Auth::guard('teacher')->user()->weeks==8) selected @endif>8 weeks</option>--}}



            {{--                                    </select>--}}

            {{--                                    <p class="alert alert-danger weeks_error" style="display: none"></p>--}}

            {{--                                </div>--}}



            {{--                                <div class="col-md-2" style="text-align: center;margin-top: 27px;">--}}
            {{--                                    <label for="description" >Course Brief: </label>--}}
            {{--                                </div>--}}
            {{--                                <div class="col-md-4">--}}
            {{--                                    <label for="description" >Type Course Brief on which you are making a lecture: </label>--}}
            {{--                                    <textarea type="text" placeholder="" name="description" class="form-control description" id="description"> @if(isset(Auth::guard('teacher')->user()->shortCourse->description) ){{Auth::guard('teacher')->user()->shortCourse->description}} @endif--}}
            {{--        </textarea>--}}


            {{--                                    <p class="alert alert-danger description_error" style="display: none"></p>--}}
            {{--                                </div>--}}




            {{--                            </div>--}}

            <div class="row" style="margin-top: 40px">
                <div class="col-md-2" style="text-align: center;margin-top: 27px;">
                    <label>Topic: </label>
                </div>
                <div class="col-md-4">
                    <label for="sub_id">Type topic on which you are making a lecture: </label>

                    <input type="text" placeholder="Topic on which you want to record a sample lecture"
                           name="topic_id" class="form-control" id="topic_id" value="">


                    <p class="alert alert-danger topic_id_error" style="display: none"></p>
                </div>

                <div class="col-md-2" style="text-align: center;margin-top: 27px;">
                    <label for="learning_objective">Learning Objective: </label>
                </div>

                <div class="col-md-4">
                    <label for="sub_id">Type Learning objective: </label>
                    <input class="form-control learning_objective" id="learning_objective" name="learning_objective"
                           value="">
                    <p class="alert alert-danger learning_objective_error" style="display: none"></p>
                </div>


            </div>

            <div class="row" style="margin:20px">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                    <p style="color:red">Note: Sample video lecture must not be more than 3 minutes</p>
                    <div
                        style="background-image: url({{asset('jobapplicant/images/videoScreen.png')}});background-repeat: no-repeat, repeat;background-size: 100% 100%; padding: 17px 23px 0px 25px;">

                        <video id="myVideo" class="video-js vjs-default-skin videoRecordingBgImg"></video>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>


            <div class="row" style="margin:10px">
                <div class="col-md-4"></div>
                <div class="col-md-4" id="videoControlBtn" style="text-align: center;margin-top: 27px;">
                    <a href="javascript:;" style="border-radius: 15px;" class="btn btn-danger readyRecording"
                       onclick="readyRecording()">Enable Camera & Mic</a>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="row" style="margin:5px">
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="checkbox-inline">
                        <label class="checkbox checkbox-rounded" for="term_accepted">
                            <input type="checkbox" checked="checked" id="term_accepted" name="term_accepted">
                            <span></span> <a href="javascript:;" data-toggle="modal"
                                             data-target="#add_feed">terms and conditions of video</a></label>
                        <p class="alert alert-danger term_accepted_error" style="display: none"></p>

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="checkbox-inline">
                        <label class="checkbox checkbox-rounded">

                            <span></span> <a href="{{asset('howMakeVideo.pdf')}}" target="_blank">How to make a
                                video</a></label>
                        <p class="alert alert-danger term_accepted_error" style="display: none"></p>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="footer_new" style="margin-top:0px;align-content: center">
        <div style="margin: auto; width: 23%;">

                <button type="reset" class="btn btn-danger" style="border-radius: 15px;width: 150px;" onclick="goToProfilePage()"> back</button>

            <img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
                 height="50"/>
            &nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary " id="s_btn" style="border-radius: 15px;width: 150px;"
                    onclick="VideoUpload();return false;"> Upload
            </button>
        </div>
    </div>

        <!-- Modal open on click? -->
        <div class="modal fade text-left" id="add_feed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="width: 50%;height: 50%;">
                <div class="modal-content" style="">
                    <div class="modal-header bg-success" style="background-color: #004080;color:white">
                        <h3 class="modal-title" id="myModalLabel35"> Terms and Conditions of the Sample Video· </h3>

                    </div>
                    <div class="modal-body">
                        <div class="row container">
                            <p><strong>The demo video will be the property of British Lyceum.</strong></p>
                            <li> British Lyceum will share this with parents and students.</li>
                            <li>The video may be used for advertisement purposes</li>
                            <li>You are not allowed to use this video on any platform other than British Lyceum without prior permission. </li>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
                             height="50"/>
                        &nbsp;&nbsp;&nbsp;
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                               value="Ok">

                    </div>
                </div>
            </div>
        </div>


    </div>



@endsection
@push('post-scripts')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.loader-img').hide();
        })
    </script>
    <script>
        function goToProfilePage(){
                swal({
                    title: "Warning",
                    text: "If you go back your data will be reset",
                    icon: "warning",
                    buttons: [
                        'No, cancel it!',
                        'Yes, I am sure!'
                    ],
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
                    } else {
                        swal("Cancelled", "Your Video is safe :)", "error");
                    }
                });
        }

    </script>
    @endpush
