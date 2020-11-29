@extends('_layouts.JobApplicant._auth-default')
@section('title', 'Verification')
@section('content')
<div class="account-page">
    <div class="container">
        <h1 class="account-title text-white">Verification</h1>
        <div class="account-box col-md-6" style="margin: 0 auto; background-color: rgba('0,0,0,0.5'); border:1px #fff solid;padding-top: 10px;">
                <div class="account-logo">
                    <a href="index.html">
                        <img src="{{asset('assets/img/logo.png')}}" alt="SchoolAdmin" width="200px" height="50px"
                        style="    min-width: 392px;
    padding: 6px;
    height: 74px;">
                    </a>
                </div>
            <div class="account-wrapper">
                <form action="{{route('VerifyMailUser')}}" method="POST">
                    @csrf
                @component('_components.alerts-default')
                @endcomponent

                <div class="form-group custom-mt-form-group">
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="text" class="form-control" name="token" / style="background-color:#fff;padding-left: 10px;">
                    <label class="control-label" style="color: #fff;">Verification Code Enter</label><i class="bar"></i>
                </div>
                <div class="form-group text-center custom-mt-form-group" >
                    <button class="btn btn-primary btn-block account-btn" type="submit">Verification</button>
                </div>
               <!--  <div class="text-center">
                    <a href="{{route('forgot-password')}}">Forgot your password?</a>
                </div> -->
                <div class="text-center" style="float: right;margin-top: -25px;color: #fff;">
                    <a class="text-white" href="{{route('admin.register')}}">Create Account</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
