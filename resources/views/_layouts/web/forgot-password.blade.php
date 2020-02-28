@extends('_layouts.admin._auth-default')
@section('title', 'Forgot Password')
@section('content')
<div class="account-page">
    <div class="container">
        <h3 class="account-title text-white">Forgot Password</h3>
        <div class="account-box">
            <div class="account-wrapper">
                <div class="account-logo">
                    <a href="index.html"><img src="{{asset('assets/img/logo.png')}}" alt="school-admin"></a>
                </div>
                <form>
                 <div class="form-group custom-mt-form-group">
                    <input type="text" />
                    <label class="control-label">Username or Email</label><i class="bar"></i>
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