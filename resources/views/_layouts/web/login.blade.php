@extends('_layouts.admin._auth-default')
@section('title', 'Login')
@section('content')
<div class="account-page">
    <div class="container">
        <h3 class="account-title text-white">Login</h3>
        <div class="account-box">
            <div class="account-wrapper">
                <div class="account-logo">
                    <a href="index.html"><img src="{{asset('assets/img/logo.png')}}" alt="SchoolAdmin"></a>
                </div>
                <form action="{{route('admin.loginSubmit')}}" method="POST">
                    @csrf

                @component('_components.alerts-default')
                @endcomponent
                 <div class="form-group custom-mt-form-group">
                    <input type="text" name="email" />
                    <label class="control-label">Username or Email</label><i class="bar"></i>
                </div>
                <div class="form-group custom-mt-form-group">
                    <input type="password" name="password" />
                    <label class="control-label">Password</label><i class="bar"></i>
                </div>
                <div class="form-group text-center custom-mt-form-group">
                    <button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
                </div>
                <div class="text-center">
                    <a href="{{route('forgot-password')}}">Forgot your password?</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection