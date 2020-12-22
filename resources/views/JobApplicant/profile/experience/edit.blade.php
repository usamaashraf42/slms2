<style type="text/css">
    .btn-styling{
        border-radius: 20px!important:color:white;background-color:#004080;color: white
    }
    .btn-styling:hover{
        color: white!important;
    }

</style>
<div class="modal fade text-left" id="updateExperience" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width: 50%;height: 50%;">
        <div class="modal-content">
            <div class="modal-header bg-success" style="background-color: #004080;color:white">
                <h3 class="modal-title pt-3" id="myModalLabel35"> Update Experience</h3>

            </div>
            <form action="" id="ExperienceUpdation" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}


                <input type="hidden" name="exp_id" value="{{$data->id}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="ex_institude_id">Institute</label>
                            <select type="text" class="form-control ex_institude_id exp_institude_form" id="ex_institude_id"    name="institude_id" >
                                <option value="@isset($data->institude->id) {{$data->institude->id}} @endisset">@isset($data->institude->name) {{$data->institude->name}} @endisset</option>

                            </select>


                            <p class="alert alert-danger institude_id_error" style="display: none"></p>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="teachering_sub_id">TEACHING SUBJECT</label>
                            <select type="text" class="form-control teachering_sub_id_form"  id="teachering_sub_id" name="teachering_sub_id" >

                                <option value="@isset($data->subject->id) {{$data->subject->id}} @endisset">@isset($data->subject->sub_name) {{$data->subject->sub_name}} @endisset</option>
                            </select>

                            <p class="alert alert-danger teachering_sub_id_error" style="display: none"></p>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="curriculum_id">CURRICULUM</label>
                            <select type="text" class="form-control curriculum_id" id="curriculum_id"   name="curriculum_id" >


                                <option value="" selected disabled="disabled">Choose the curriculum</option>

                                <option value="matric" @if(isset($data->curriculum) && strtolower($data->curriculum)=='matric') selected @endif>Matric</option>
{{--                                <option value="oxford" @if(isset($data->curriculum) =='Oxford') selected @endif>Oxford</option>--}}
                                <option value="oxford" {{(isset($data->curriculum) && strtolower($data->curriculum)=='oxford') ?'selected':''}}>Oxford</option>
                                <option value="cambridge-GCE" @if(isset($data->curriculum) &&  strtolower($data->curriculum)=='cambridge-gce') selected @endif>Cambridge-GCE</option>
                                <option value="cambridge-IGCSE" @if(isset($data->curriculum) &&  strtolower($data->curriculum)=='cambridge-igcse') selected @endif>Cambridge-IGCSE</option>
                                <option value="IB" @if(isset($data->curriculum) &&  strtolower($data->curriculum)=='ib') selected @endif>IB</option>
                                <option value="american" @if(isset($data->curriculum) &&  strtolower($data->curriculum)=='american') selected @endif>American</option>
                                <option value="dars-e-Nazami" @if(isset($data->curriculum) &&  strtolower($data->curriculum)=='dars-e-nazami') selected @endif>Dars-e-Nazami</option>
                                <option value="other" @if(isset($data->curriculum) &&  strtolower($data->curriculum)=='other') selected @endif>Other</option>



                            </select>

                            <p class="alert alert-danger curriculum_id_error" style="display: none"></p>
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="class_id">Class</label>
                            <select type="text" class="form-control class_id_form" id="class_id"   name="class_id" list="ClassList_form">
                                <option value="@isset($data->course->id) {{$data->course->id}} @endisset">@isset($data->course->course_name) {{$data->course->course_name}} @endisset</option>
                            </select>
                            <p class="alert alert-danger class_id_error" style="display: none"></p>
                        </div>

                        <div class="col-sm-2 form-group">
                            <label for="exp_from">FROM</label>
                            <input type="text" name="exp_from" id="exp_from" class="form-control" value="@isset($data->exp_from){{$data->exp_from}}@endisset" autocomplete="off">
                            <p class="alert alert-danger exp_from_error" style="display: none"></p>
                        </div>
                        <div class="col-sm-2 form-group">
                            <label for="exp_to">TO</label>
                            <input type="text" name="exp_to" id="exp_to" class="form-control " value="@isset($data->exp_to){{$data->exp_to}}@endisset">
                            <p class="alert alert-danger exp_to_error" style="display: none"></p>
                        </div>



                        <div class="col-sm-4 form-group">
                            <label for="current_job">Currently working</label>
                            <select type="text" name="current_job" id="current_job" class="form-control current_job">
                                <option value="0" @if($data->current_job==0) selected @endif >no</option>
                                <option value="1" @if($data->current_job==1) selected @endif >yes</option>
                            </select>

                            <p class="alert alert-danger exp_to_error" style="display: none"></p>

                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
                         height="50"/>
                    &nbsp;&nbsp;&nbsp;
                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                           value="Cancel">

                    <input type="submit" class="btn btn-outline-info btn-lg btn-styling"  id="updateDataBtn" value="Update Experience" >
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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

    $('.loader-img').hide();
    $("#ExperienceUpdation").submit(function (e) {


        var form = $('#ExperienceUpdation')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        console.log('formData', formData);
        console.log('form', form);
        $.ajax({

            type: "POST",
            enctype: 'multipart/form-data',
            processData: false,  // Important!
            contentType: false,
            cache: false,
            url: "{{route('jobapplicant_experience_update')}}",
            data: formData,
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
                console.log('response', response);
                if (response.status == true) {

                    $('#updateCourse').modal('hide');

                    $("#ExperienceUpdation")[0].reset();

                    swal(
                        'Success!',
                        'Shed Updated Successfully',
                        'success'
                    );
                    location.reload(true)
                } else {
                    console.log('error blank', response.message);
                    swal(
                        'Warning!',
                        response.message,
                        'warning'
                    );
                    ;
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
        e.preventDefault();
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




</script>
