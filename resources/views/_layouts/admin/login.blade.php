@extends('_layouts.admin._auth-default')
@section('title', 'Login')
@section('content')
<div class="account-page">
    <div class="container">
        <h1 class="account-title text-white">Login</h1>
        <div class="account-box col-md-6" style="margin: 0 auto; background-color: rgba('0,0,0,0.5'); padding-top: 10px;">
                <div class="account-logo">
                    <a href="index.html">
                        <img src="{{asset('assets/img/logo.png')}}" alt="SchoolAdmin" width="200px" height="50px" 
                        style="min-width: 330px;
    padding: 6px;
    height: 74px;">
                    </a>
                </div>
            <div class="account-wrapper">
                <form action="{{route('admin.loginSubmit')}}" method="POST">
                    @csrf
                @component('_components.alerts-default')
                @endcomponent
                 <div class="form-group custom-mt-form-group">
                    <input type="text" class="form-control" name="email" value="{{old('email')}}" /style="background-color:#fff;padding-left: 10px;">
                    <label class="control-label" style="color: #fff;">Username or Email</label><i class="bar"></i>
                </div>
                <div class="form-group custom-mt-form-group">
                    <input type="password" class="form-control" name="password" / style="background-color:#fff;padding-left: 10px;">
                    <label class="control-label" style="color: #fff;">Password</label><i class="bar"></i>
                </div>
                <div class="form-group text-center custom-mt-form-group" >
                    <button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
                </div>
                <div style="">
                    <a href="{{route('forgot-password')}}" style="width: 60%;">Forgot your password?</a>
                </div>
                <div style="float: right;margin-top: -25px;color: #fff; width: 40%;">
                    <a class="text-white" href="{{route('admin.register')}}">Create Account</a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .account-box .account-btn {
    border-radius: 0px;
    font-size: 22px;
    width: 260px;
    padding: 5px 13px;
    border-radius: 20px;
    border: 0;
    margin: 0 auto;
}
.account-box .account-btn :hover{
    border-radius: 0px!important;
    font-size: 22px!important;
    width: 260px!important;
    padding: 5px 13px!important;
    border-radius: 20px!important;
    border: 0!important;
    margin: 0 auto!important;
}
</style>
@endsection