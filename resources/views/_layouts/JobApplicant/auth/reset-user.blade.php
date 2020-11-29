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
                <form action="{{route('admin.reset')}}" method="POST">


                    @csrf
                    @component('_components.alerts-default')
                    @endcomponent
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="form-group custom-mt-form-group">
                        <input type="text" class="form-control" name="email" value="{{$email}}" /style="background-color:#fff;padding-left: 10px;">
                        <label class="control-label" style="color: #fff;"> Email</label><i class="bar"></i>
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
                    <div class="form-group custom-mt-form-group">
                        <input type="password" class="form-control" name="password" / style="background-color:#fff;padding-left: 10px;">
                        <label class="control-label" style="color: #fff;">Password</label><i class="bar"></i>
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
                    <div class="form-group custom-mt-form-group">
                        <input type="password" class="form-control" name="password_confirmation" / style="background-color:#fff;padding-left: 10px;">
                        <label class="control-label" style="color: #fff;">Confirm Password</label><i class="bar"></i>
                        @if ($errors->has('password_confirmation'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Warning!</strong> {{$errors->first('password_confirmation')}}
                        </div>
                        @endif
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
    @endsection