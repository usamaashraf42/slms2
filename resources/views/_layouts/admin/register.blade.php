@extends('_layouts.admin._auth-default')
@section('title', 'Admin Register')
@section('content')
<div class="account-page">
    <div class="container">
        <h1 class="account-title text-white">Register</h1>
        <div class="account-box col-md-11" style="margin: 0 auto;">
            <div class="account-logo">
                <a href="index.html">
                    <img src="{{asset('assets/img/logo.png')}}" alt="SchoolAdmin" width="200px" height="50px" 
                    style="    min-width: 392px;
                    padding: 6px;
                    height: 74px;">
                </a>
            </div>
            <form action="{{route('admin_register')}}" method="POST">
                @csrf

                @component('_components.alerts-default')
                @endcomponent

                <div class="row" style="background-color: rgba(0,0,0,0.1);padding: 4px;padding-top: 10px;">
            

                    <div class="col-md-9" style="margin-bottom: 20px;">
                        <div class="row" style="margin-left: 0px; margin-right: 0px;">

                            <div class="col-md-6">
                                <label class="control-label" style="width: 100%; padding-left: 13px;">Country 
                                    <span style="color: red">*</span></label>
                                    <select class="s_countryCode" name="s_countryCode"  id="s_countryCode" onchange="countryHasBranch(this)"   style="height: 48px;width: 100%; border-radius: 7px;float: right;">

                                      <option value="0">Choose the country </option>
                                      <option value="92" @if((old('s_countryCode')) && old('s_countryCode')=='92') selected @endif>Pakistan</option>
                                      <option value="968" @if((old('s_countryCode')) && old('s_countryCode')=='968') selected @endif>Oman</option>
                                      <option value="971" @if((old('s_countryCode')) && old('s_countryCode')=='971') selected @endif>Dubai</option>
                                  </select>
                                  <p class="alert alert-danger branch_id1_error" style="display: none"></p>
                              </div>
                              <div class="col-md-6">
                                <label class="control-label" style="width: 100%;">Branch 
                                    <span style="color: red">*</span></label>
                                    <select class="branch_id" name="branch_id"  id="branch_id" style="     height: 48px; width: 100%;border-radius: 7px;float: left;">

                                </select>
                                <p class="alert alert-danger branch_id1_error" style="display: none"></p>
                            </div>
                        </div>
                        <div class="row" style="margin: 10px 0px;">
                            <div class="col-md-12">
                                <label class="control-label"> Name</label>
                                <input name="name" value="{{ old('name') }}" type="text" placeholder="First Name" class="form-control">
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
                        @php($roles=\Spatie\Permission\Models\Role::get())
                        <div class="row" style="margin: 10px 0px;">
                            <div class="col-md-6 col-sm-6">
                                 <label class="control-label">Roles Available (click to add role)</label>
                            </div>
                            <div class="col-md-6 col-sm-6 float-right">
                                <label class="control-label">Roles Sought/given (click role to remove)</label>
                            </div>
                            <div class="col-md-12 col-sm-12">
                               
                                <select id='pre-selected-options' multiple='multiple' name="roles[]">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>

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
                                <a class="btn btn-info  ks-rounded" href="{{route('admin.login')}}"style="width: 80px;font-size: all;" ><span style="color: #fff; font-weight: 400;">Back</span></a>
                                <button class="btn btn-primary ks-rounded"> Submit </button>
                            </div>
                        </div>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div>


<input type="hidden" class="branchId" value="@if((old('branch_id'))){{old('branch_id')}}@endisset">
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
<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('assets/multi-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/multi-select/jquery.multi-select.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/multi-select/select2.full.min.js')}}" type="text/javascript"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">



</script>

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
    // $('#permission-selected-options').multiSelect();
    $(function(){
        countryHasBranch('edu');
    })
    function countryHasBranch(obj){

     console.log('countryHasBranchCountry',$('.s_countryCode').val());

     var branch_id1=$('.branchId').val();

     if(branch_id1){

     }else{
         $("#branch_id").html(` <option selected="selected" disabled='disabled'> Select Branch  </option>`);
     }
    
     $.ajax({
        method:"POST",
        url:"{{route('countryHasBranch')}}",
        data : {id:$('.s_countryCode').val()},
        dataType:"json",
        success:function(response){
          console.log('countryHasBranch',response);
          if(response.status){
            response.data.forEach(function(val,ind){
               var id = val.id;
               var name = val.branch_name;
               var option = `<option value="${id}" ${branch_id1==id?selected:''}>${name}</option>`;
               $("#branch_id").append(option);
           });
        }

    }
});
 }
</script>
@endsection


