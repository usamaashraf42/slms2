@extends('_layouts.admin._auth-default')
@section('title', 'Forgot Password')
@section('content')
<div class="account-page">
    <div class="container">
        <h1 class="account-title text-white">Login</h1>
        <div class="account-box col-md-6" style="margin: 0 auto;">
            <div class="account-logo">
                <a href="index.html">
                    <img src="{{asset('assets/img/logo.png')}}" alt="SchoolAdmin" width="200px" height="50px" 
                    style="    min-width: 392px; padding: 6px;height: 74px;">
                </a>
            </div>
            @if(Session::has('forgot_success_message'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Error!</strong>  {{ Session::get('forgot_success_message') }}
            </div>
            @endif
            @if(Session::has('forgot_danger'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Error!</strong>  {{ Session::get('forgot_danger') }}
            </div>
            @endif
            <form method="POST" action="{{route('admin.create_token')}}">
                @csrf
                <div class="form-group custom-mt-form-group">
                    <input type="text" name="email" / style="border-bottom: 2px solid #f7f7f7; color: #fff;">
                    <label class="control-label text-white"> Email</label><i class="bar"></i>
                </div>
                <div class="form-group text-center custom-mt-form-group">
                    <button class="btn btn-primary btn-block account-btn" type="submit">Reset Password</button>
                </div>
                <div class="text-center">
                    <a href="{{route('admin.login')}}">Back to Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection