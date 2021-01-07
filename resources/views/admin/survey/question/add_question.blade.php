@extends('_layouts.admin.default')
@section('title', 'Dashboard')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                <div class="card-box">

                    <div class="card-block">
                        <h4 class="card-title">Survey Categories</h4>
                        <div class="heading-elements float-right">
                            <a type="button" class="btn btn-success btn-min-width mr-1 mb-1" href="{{route('survey_questions.create')}}" ><i class="la la-plus">&nbsp;Add Question</i></a>
                        </div>
                        <div class="">
                                <h3  id="myModalLabel35"> Add New Question</h3>
                                <form action="" id="addDataForm" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @php
                                        $categorys =\App\Models\SurveyCategory::all();
                                    @endphp
                                    <input type="hidden" name="category_id" value="{{$category->id}}">
                                    <div class="modal-body">
                                        <fieldset class="form-group floating-label-form-group">

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="cat_name">Question Name</label>
                                                        <textarea type="text" class="form-control" id="question" name="question"></textarea>
                                                        <p style="color: red;margin-top: 3px" id="question_error"></p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <br>

                                                        <div class="btn btn-primary pull-right addquestion" style="text-align: center;">+</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group floating-label-form-group" id="addrows">

                                        </fieldset>


                                    </div>
                                    <div class="modal-footer">
                                        <img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
                                             height="50"/>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                                               value="Dismiss">
                                        <input type="submit" class="btn btn-outline-success btn-lg"  id="addDataBtn" value="Add Question">
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

    <div class="col-md-12">


    <div id="show_edit_modal"></div>

    <div id="question_edit"></div>
@endsection
@push('post-styles')
    <link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
@endpush
@push('post-scripts')
    <script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datatable/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatable').DataTable();

        });
        //     var table = $('#example').DataTable( {
        //         "order": [[ 0, "desc" ]],
        //         lengthChange: false,
        //         buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
        //     } );
        //
        //     table.buttons().container()
        //         .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        // } );
    </script>
    <script>

        $('.addquestion').on('click', function(e) {

            var increment =`  <div class="col-md-12 remove">
                                                <div class="row">
                                            <div class="col-md-4">
                                                <label for="cat_type">Question</label>
                                                <textarea type="text" class="form-control" id="question" name="child_questions[]"></textarea>
                                            </div>
                                                    <div class="col-md-2">

                                                        <label for="cat_type">Question type </label>
                                                <select name="question_type[]" class="form-control">
                                                    <option value=" " selected>choose..</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                    <option value="3">May be</option>
                                                </select>
                                                <p style="color: red;margin-top: 3px" id="question_type_error"></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <br>
{{--                                                        <div class="btn btn-primary   " style="text-align: center;">+</div>--}}
            <div class="btn btn-danger deletequestion " style="text-align: center;">-</div>
        </div>
            </div>
            </div>
`;

            $("#addrows").append(increment);
            console.log('increment',increment);
        });
        $(document).on('click', '.deletequestion', function(e) {
            // var rowCount = $('#qualificationRows tr').length;
            // console.log('row count',rowCount);
            // if(rowCount==1){
            //     return false;
            // }
            // console.log('remove tr');
            // ($(this).parent().parent().remove();
            $(this).closest('.remove').remove();
        });
        /*showing confirm cancel popup box*/
        function showConfirm() {
            return confirm("Are You Sure You Want To Resend This Notification?");
        }
        function resend(id) {
            var val = showConfirm();
            if (val) {
                $.ajax({
                    url: "#",
                    type: 'post',
                    data: {
                        'id': id
                    },
                    dataType: 'json',
                    success: function (response) {
                        console.log('id', response);

                        if (response.status == "200") {

                            swal(
                                'Success!',
                                'Notification Sent Successfully',
                                'success'
                            );

                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        swal(
                            'Oops...',
                            'Something went wrong!',
                            'error'
                        )
                    }
                });
            }
        }

        {{--/*showing confirm cancel popup box*/--}}
        {{--function showConfirmDelete() {--}}
        {{--    return confirm("Are You Sure You Want To Delete This Data?");--}}
        {{--}--}}
        {{--/*delete item */--}}
        {{--function deleteItem(id) {--}}
        {{--    var val = showConfirmDelete();--}}
        {{--    if (val) {--}}
        {{--        $.ajax({--}}
        {{--            url: "{{route('survey_category_status_change')}}",--}}
        {{--            type: 'post',--}}
        {{--            data: {--}}
        {{--                'id': id--}}
        {{--            },--}}
        {{--            dataType: 'json',--}}
        {{--            success: function (response) {--}}
        {{--                console.log('id', response);--}}

        {{--                if (response.status == "200") {--}}

        {{--                    swal(--}}
        {{--                        'Success!',--}}
        {{--                        'Shed Deleted Successfully',--}}
        {{--                        'success'--}}
        {{--                    );--}}

        {{--                    location.reload(true);--}}

        {{--                } else {--}}
        {{--                    swal(--}}
        {{--                        'Warning!',--}}
        {{--                        response.message,--}}
        {{--                        'warning'--}}
        {{--                    );--}}
        {{--                }--}}
        {{--            },--}}
        {{--            error: function () {--}}
        {{--                swal(--}}
        {{--                    'Oops...',--}}
        {{--                    'Something went wrong!',--}}
        {{--                    'error'--}}
        {{--                )--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }--}}
        {{--}--}}
        function change_status(obj,id,status) {
            $.ajax({
                url: "{{ route('survey_question_status_change') }}",
                method:"POST",
                data:{'id':id,'status':status},
                success: function(response){
                    console.log('hy');
                    if(response.status){
                        if(status)
                            $(obj).replaceWith('<a href="javascript:;" onclick="change_status(this,'+id+',0)" class="btn btn-success"> Active </a>');
                        else
                            $(obj).replaceWith('<a href="javascript:;" onclick="change_status(this,'+id+',1)" class="btn btn-danger"> Deactive </a>');
                        toastr.success(response.message);

                    }else{
                        toastr.error(response.message);

                    }
                }});

        }
        function editItem(id) {
            console.log('id', id);
            var edit_route = '{{ route("survey_questions.edit", ":id") }}';
            var edit_route_1 = edit_route.replace(':id', id);
            // console.log(edit_route);
            $.ajax({
                url: edit_route_1,
                method: "GET",
                success: function (response) {
                    // console.log('period edit',response);
                    if (!response.status) {
                        console.log('inner');
                        swal("Failed", response.message, "error");
                        return false;
                    } else {
                        console.log('outer');
                        $("#question_edit").html(response.contentHtml);
                        jQuery("#updateQuestion").modal('show');
                    }
                }
            });
        }

        function detail(id) {
            window.location = baseurl + '/shed/' + id;
        }

        $('.loader-img').hide();
        $("#addDataBtn").click(function (e) {
            var form = $('#addDataForm')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            console.log('formData', formData);
            console.log('form', form);
            $.ajax({
                url: "{{route('survey_questions.store')}}",
                type: "POST",
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
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
                    if (response.status == '200') {
                        $('#add_shed').modal('hide');
                        $("#addDataForm")[0].reset();
                        $(".slim-btn-remove").click();
                        swal(
                            'Success!',
                            'Survey Question added successfully',
                            'success'
                        ).then(function(){
                            //location.reload();
                             setTimeout(location.reload(),1000);
                        });
                        // location.reload(true);
                    } else {
                        // console.log('error blank', response.message);
                        swal(
                            'Warning!',
                            response.message,
                            'warning'
                        );
                    }
                },
                error: function (e) {
                    console.log('error', e);
                    swal(
                        'Oops...',
                        'Plz fill all fields',
                        'error'
                    )
                }
                // error: function (response) {
                //     $('#question_error').text(response.responseJSON.errors.question);
                //     $('#question_type_error').text(response.responseJSON.errors.question_type);
                //     $('#category_id_error').text(response.responseJSON.errors.category_id);
                // }
            });
            e.preventDefault();
        });
    </script>
@endpush
