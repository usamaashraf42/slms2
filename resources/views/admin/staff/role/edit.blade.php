@extends('_layouts.admin.default')
@section('title', 'Role')
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="card-box">
                <div class="card-block">
                    <h4 class="card-title">Role Mangement</h4>
                    
                    @component('_components.alerts-default')
                    @endcomponent
                    <form method="POST" action="{{ route('role.update',$role->id) }}" enctype = "multipart/form-data" id="upload_new_form">
                          <input name="_method" type="hidden" value="PUT">
                        {{ csrf_field() }}
                        <div class="row">

                            
                            <div class="col-md-12" style="margin-bottom: 20px;">
                                <div class="row" style="margin: 10px 0px;">
                                    <div class="col-md-12">
                                        <label class="control-label"> Name</label>
                                        <input name="name" value="{{ $role->name }}" type="text" placeholder="First Name" class="form-control">
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
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Permission</label>
                                        <select id='permission-selected-options' multiple='multiple' name="permissions[]">
                                            @foreach($permissions as $permission)
                                                    <option value="{{$permission->id}}" @if($role->hasPermissionTo($permission->id)) selected @endif>{{$permission->name}}</option>
                                              
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">

                                        <button class="btn btn-success" type="Submit" >Save</button>
                                    </form>
                                    <a href=""class="btn  btn-primary" type="reset">Cancel</a>

                                </div>
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