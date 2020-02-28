@extends('_layouts.admin.default')
@section('title', 'Staff')
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="card-box">
                <div class="card-block">
                    <h4 class="card-title">Staff Mangement</h4>
                    
                    @component('_components.alerts-default')
                    @endcomponent
                    <form method="POST" action="{{ route('staff.update',$user->id) }}" enctype = "multipart/form-data" id="upload_new_form">
                        {{ csrf_field() }}
                       <input name="_method" type="hidden" value="PUT">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput" >
                                    <div class="fileinput-new thumbnail" style="width: 250px; height: 250px;">
                                        <img src="@if($user->images) {{asset('images/staff/'.$user->images)}}@else{{asset('images/no-image.png')}} @endif" id="profile-img-tag" height="250" width = "250">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="images" class="btn btn-primary" style="position: relative;left: 50px;top: 20px;">Upload Profile</label>
                                    <input type="file" id="images" value="{{ old('images') }}" name="images" class="hide" style="opacity: 0;">
                                    @if ($errors->has('images'))
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>Warning!</strong> {{$errors->first('images')}}
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group" style="padding: 0px; ">
                                        <div class = "gallery"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9" style="margin-bottom: 20px;">
                                <div class="row" style="margin: 10px 0px;">
                                    <div class="col-md-12">
                                        <label class="control-label"> Name</label>
                                        <input name="name" value="{{ $user->name }}" type="text" placeholder="First Name" class="form-control">
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
                                        <label class="control-label">Email</label>
                                        <input name="email" type="email" value="{{ $user->email }}" class="form-control" placeholder="abc123@example.com">
                                        @if ($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <strong>Warning!</strong> {{$errors->first('email')}}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label">phone</label>
                                        <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Mobile No" class="form-control">

                                        @if ($errors->has('phone'))
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <strong>Warning!</strong> {{$errors->first('phone')}}
                                        </div>
                                        @endif


                                    </div>

                                </div> 

                                
                                <div class="row" style="margin: 10px 0px;">
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Roles</label>
                                        <select id='pre-selected-options' multiple='multiple' name="roles[]">
                                            @foreach($roles as $role)
                                            <option @if($user->hasRole($role)) selected @endif  value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row" style="margin: 10px 0px;">
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Permission</label>
                                        <select id='permission-selected-options' multiple='multiple' name="permissions[]">
                                            @foreach($permissions as $permission)
                                            <option @if($user->hasPermissionTo($permission)) selected @endif  value="{{$permission->id}}">{{$permission->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">

                                        <button class="btn btn-success" type="Submit" name="submit">Save</button>
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