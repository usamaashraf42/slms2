<style type="text/css">
    .btn-styling{
        border-radius: 20px!important:color:white;background-color:#004080;color: white
    }
    .btn-styling:hover{
        color: white!important;
    }

</style>
<div class="modal fade text-left" id="updateCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width: 50%;height: 50%;">
        <div class="modal-content">
            <div class="modal-header bg-success" style="background-color: #004080;color:white">
                <h3 class="modal-title pt-3" id="myModalLabel35"> Update Qualification</h3>

            </div>
            <form action="" id="qualificationUpdate" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="degree">DEGREE</label>
                            <select type="text" class="form-control degree_form" id="degree_ids"  name="degree_id">
                                <option value="@isset($data->degree->id){{$data->degree->id }}@endisset">@isset($data->degree->name){{$data->degree->name }}@endisset</option>


                            </select>

                            <p class="alert alert-danger degree_id_error" style="display: none"></p>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="instid">INSTITUTE</label>

                            <select type="text" class="form-control institude_form" id="institude_ids"  name="institude_id" >
                                <option value="@isset($data->institude->id){{$data->institude->id }}@endisset">@isset($data->institude->name){{$data->institude->name }}@endisset</option>

                            </select>


                            <p class="alert alert-danger institude_id_error" style="display: none"></p>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="degree_type">Degree Type</label>
                            <select type="text" name="degree_type" id="degree_type"  class="form-control ">
                                <option value="" disabled="disabled" selected=></option>}

                                <option value="Regular" @if($data->degree_type=='Regular') selected @endif>Regular</option>
                                <option value="Private" @if($data->degree_type=='Private') selected @endif>Private</option>
                            </select>
                            <p class="alert alert-danger degree_type_error" style="display: none"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="passing_year">YEAR OF PASSING</label>

                            <select type="text" name="passing_year" id="passing_year"  class="form-control passing_year">

                                <option value="" disabled="disable">select the year</option>
                                @foreach($years as $dataRecprd)
                                    <option value="{{$dataRecprd->name}}" @if($dataRecprd->passing_year==$data->name) selected @endif>{{$dataRecprd->name}}</option>
                                @endforeach
                            </select>

                            <p class="alert alert-danger passing_year_error" style="display: none"></p>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="degree_percentage">PERCENTAGE</label>
                            <input name="degree_percentage" value="{{$data->degree_percentage}}"  class="form-control degree_percentage">
                            <p class="alert alert-danger degree_percentage_error" style="display: none"></p>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="degree_grade">GRADE</label>
                            <input name="degree_grade" class="form-control" value="{{$data->degree_grade}}">
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

                    <input type="submit" class="btn btn-outline-info btn-lg btn-styling"  id="updateDataBtn" value="Update Qualification" >
                </div>
            </form>
        </div>
    </div>
</div>

<script>


    $('.loader-img').hide();
    $("#qualificationUpdate").submit(function (e) {


        var form = $('#qualificationUpdate')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        console.log('formData', formData);
        console.log('form', form);
        $.ajax({

            type: "POST",
            enctype: 'multipart/form-data',
            processData: false,  // Important!
            contentType: false,
            cache: false,
            url: "{{route('jobapplicant_qualification_update')}}",
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

                    $("#qualificationUpdate")[0].reset();

                    swal({title: "Success", text: "Record Updated Successfully!", type:
                            "success"})
                        .then(function(){
                        location.reload();
                        setTimeout(location.reload(),4000);
                    });
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


    $('#degree_ids').on('focus',function(){
        $('#degree_ids').select2({
            width: 'resolve',
            ajax: {
                url: "{{route('get_degree_ajax')}}",
                method:"post",
                dataType: 'json',
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

    $('#institude_ids').on('focus',function(){
        $('#institude_ids').select2({
            width: 'resolve',
            ajax: {
                url: "{{route('get_institude_ajax')}}",
                method:"post",
                dataType: 'json',
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
