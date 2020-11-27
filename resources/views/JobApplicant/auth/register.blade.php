@extends('_layouts.JobApplicant._auth-default')
@section('title', 'Admin Register')
@section('content')
<div class="account-page">
    <div class="container">
        <h1 class="account-title text-white">Job Applicant Register</h1>
        <div class="account-box col-md-11" style="margin: 0 auto;">
            <div class="account-logo">
                <a href="index.html">
                    <img src="{{asset('assets/img/logo.png')}}" alt="SchoolAdmin" width="200px" height="50px"
                    style="    min-width: 392px;
                    padding: 6px;
                    height: 74px;">
                </a>
            </div>
            <form action="{{route('JobApplicant.register.submit')}}" method="POST" enctype="multipart/form-data">
                @csrf

                @component('_components.alerts-default')
                @endcomponent

                <div class="row" style="background-color: rgba(0,0,0,0.1);padding: 4px;padding-top: 10px;">


                    <div class="col-md-9" style="margin-bottom: 20px;">

                        <div class="row" style="margin: 10px 0px;">
                            <div class="col-md-6">
                                <label class="control-label"> Name</label>
                                <input name="name" value="{{ old('name') }}" type="text" placeholder="Full Name" class="form-control">
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
                            <div class="col-md-6">
                                <label class="control-label">Father Name</label>
                                <input name="fname" value="{{ old('fname') }}" type="text" placeholder="Father Name" class="form-control">
                                @if ($errors->has('fname'))
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>Warning!</strong> {{$errors->first('fname')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin: 10px 0px;">
                            <div class="col-md-6">
                                <label class="control-label">Email</label>
                                <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="abc123@example.com">
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
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Mobile No" class="form-control">

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
                            <div class="col-md-6">
                                <label class="control-label">Gender</label>
                                <select name="gender" type="gender" value="{{ old('gender') }}" class="form-control" placeholder="abc123@example.com" style="height: 48px;width: 100%; border-radius: 7px;float: right;">
                                    <option disabled="disabled" selected="selected" value="">Choose the Gender </option>
                                    <option  id="male" value="male"> Male </option>
                                    <option  id="id_As_2" value="female">Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>Warning!</strong> {{$errors->first('gender')}}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">CNIC</label>
                                <input type="text" name="cnic" value="{{ old('cnic') }}" placeholder="35100-6000000-5" class="form-control">

                                @if ($errors->has('cnic'))
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>Warning!</strong> {{$errors->first('cnic')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin: 10px 0px;">
                            <div class="col-md-6">
                                <label class="control-label">Password</label>
                                <input type="password" placeholder="******" class="form-control" name="password">
                                @if ($errors->has('password'))
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>Warning!</strong> {{$errors->first('password')}}
                                </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Confirm Password</label>
                                <input name="password_confirmation" type="password" placeholder="******" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="fileinput fileinput-new" data-provides="fileinput" >
                            <div class="fileinput-new thumbnail" style="max-width: 260px; max-height: 260px;">
                                <img src="{{asset('images/no-image.png')}}" id="profile-img-tag" height="250" width = "250">
                            </div>
                        </div>
                        <div class="form-group" style="border-radius: 5px;">
                            <label for="images" class="btn btn-primary" style="margin: 0 auto;">Upload Profile</label>
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
                        <div class="col-md-4" style="border-radius: 5px;">
                            <div class="form-group" style="padding: 0px; ">
                                <div class = "gallery"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" row" style="background-color:unset; text-align: right;">
                    <div class="" style="width:100%" style="background-color: rgba(0,0,0,0.5);">
                        <div class="card-block">
                            <div class="ks-items-block ">
                                <a class="btn btn-info  ks-rounded" href="{{route('JobApplicant.login')}}"style="width: 80px;font-size: all;" ><span style="color: #fff; font-weight: 400;">Back</span></a>
                                <button class="btn btn-primary ks-rounded"> Submit </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    .account-box label {
        color: #ffffff!important;
        font-size: 16px;
        font-weight: normal;
    }
    .account-box .form-group {
        margin-bottom: 25px;
        text-align: center;
    }
    @media screen and (max-width: 992px) {
      .branch_id1 {
        max-width: 300px
    }
}
@media screen and (max-width: 992px) {
  .branch_id1 {
    max-width: 280px
}
}
@media screen and (max-width: 600px) {
  .branch_id1 {
    max-width: 250px
}
}
</style>


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


</script>
@endsection


