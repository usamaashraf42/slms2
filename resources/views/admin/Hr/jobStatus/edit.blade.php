@extends('_layouts.admin.default')
@section('title', 'Update Application Status')
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="card-box">
                <div class="card-block">
                    <h4 class="card-title">Update Application Status Mangement</h4>
                    
                    @component('_components.alerts-default')
                    @endcomponent
                    <form method="POST" action="{{ route('application-status.update',$data->id) }}" enctype = "multipart/form-data" id="upload_new_form">
                        {{ csrf_field() }}
                       <input name="_method" type="hidden" value="PUT">

                        @csrf
                        <div class="row" style="margin: 10px 0px;">
                            <div class="col-md-12">
                                <label class="control-label"> Name</label>
                                <input name="name" value="{{ $data->name }}" type="text" placeholder="First Name" class="form-control">
                                @if ($errors->has('name'))
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>Warning!</strong> {{$errors->first('name')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin: 10px 0px;">
                            <div class="col-md-6">
                                <label class="control-label">Status</label>
                                <div style="padding-top: 20px">
                                    <label style="display:inline; padding-right: 35px">
                                        <input name="status" id="facility_used_for_active"  class="icheck facility_status" type="radio" value="1"  @if($data->status) checked @endif> Active </label>
                                        <label style="display:inline;">
                                            <input name="status" id="facility_used_for_inactive" class="icheck facility_status" type="radio" value="0" @if($data->status==0)checked @endif >  Inactive </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label">Description</label>
                                        <textarea type="text" name="description" value="{{ old('description') }}" placeholder="Description" class="form-control">{{$data->description}}</textarea> 
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                                value="Dismiss">
                                <input type="submit" class="btn btn-outline-success btn-lg" id="addDataBtn"
                                value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection

            @push('post-styles')
            <link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
            @endpush

            @push('post-scripts')
            <link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
            <script src="{{asset('assets/multi-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('assets/multi-select/jquery.multi-select.js')}}" type="text/javascript"></script>
            <script src="{{asset('assets/multi-select/select2.full.min.js')}}" type="text/javascript"></script>

            <script type="text/javascript">
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#profile-img-tag').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#images").change(function(){
                    readURL(this);
                }); 

            </script>
            <script type="text/javascript">

                $('#pre-selected-options').multiSelect();
                $('#permission-selected-options').multiSelect();
            </script>
            @endpush