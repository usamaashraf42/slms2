@extends('_layouts.admin.default')
@section('title', 'Dashboard')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                <div class="card-box">

                    <div class="card-block">
                        <h4 class="card-title">Survey Attempts</h4>
{{--                        <div class="heading-elements float-right">--}}
{{--                            <a type="button" class="btn btn-success btn-min-width mr-1 mb-1" href="{{route('survey_questions.create')}}" ><i class="la la-plus">&nbsp;Add Question</i></a>--}}
{{--                        </div>--}}
                        <div class="table-responsive">
                            <div>
                                <h3>The {{$count}} members are  filled the survey</h3>
                            </div>
                            <table id="example" class="table border table-bordered " style="text-align: center">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Branch Name</th>
                                    <th>Section</th>
                                    <th>Survey</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i =1;
                                @endphp
                                @isset($attemps)
                                @foreach($attemps as $attemp)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td >@isset($attemp->name){{$attemp->name}}@endisset</td>
                                        <td >@isset($attemp->email){{$attemp->email}}@endisset</td>
                                        <td >@isset($attemp->phone){{$attemp->phone}}@endisset</td>
                                        <td >@isset($attemp->branch->branch_name){{$attemp->branch->branch_name}}@endisset</td>
                                        <td >@isset($attemp->section_id){{$attemp->section_id}}@endisset</td>
                                        <td><a href="javascript:;" onclick="answer({{$attemp->id}})" class="btn btn-primary btn-sm">See Answer</a>
                                        </td>

                                    </tr>
                                @endforeach
                                                                @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">

    </div>
    <div id="show_edit_modal"></div>
    <div class="modal fade text-left" id="add_shed" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h3 class="modal-title" id="myModalLabel35"> Add New Question</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="addDataForm" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                                        <div class="btn btn-primary pull-right addQualification" style="text-align: center;">+</div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="cat_type">Question Type</label>
                            <select name="question_type" class="form-control">
                                <option value=" " selected>choose..</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                                <option value="3">May be</option>
                            </select>
                            <p style="color: red;margin-top: 3px" id="question_type_error"></p>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="month">Category Type</label>
                            <select name="category_id" class="form-control">
                                <option value=" " selected>choose..</option>
                                @isset($categorys)
                                @foreach($categorys as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                                @endisset
                            </select>
                            <p style="color: red;margin-top: 3px" id="category_id_error"></p>
                        </fieldset>
                        <br>
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
    <div id="survey_modal_ans"></div>
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
        function answer(id) {
            console.log('id', id);
            var edit_route = '{{ route("survey_attempts_modal.edit", ":id") }}';
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
                        $("#survey_modal_ans").html(response.contentHtml);
                        jQuery("#survey_modal").modal('show');
                    }
                }
            });
        }


    </script>
@endpush
