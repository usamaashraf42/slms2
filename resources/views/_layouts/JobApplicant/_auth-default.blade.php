<?php
/**
 * Project: School Mangement Sytem.
 * User: SHAFQAT GHAFOOR
 * Phone: 03076110561
 * Date: 6/13/2019
 * Time: 12:30 PM
 */
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="{{ url('/')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @section('metas')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    @show

    <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

    <title> @yield('title','Login') - School Mangement System</title>

    @stack('pre-styles')
    @section('styles')
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
        <script type="text/javascript" src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

    @show
    @stack('post-styles')
    
    <div class="main-wrapper">
        @yield('content')
    </div>


    
    <div class="sidebar-overlay" data-reff=""></div>
    
    <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>

    <script type="text/javascript">
        var BASE_URL = "{{ url('/')}}";
    </script>
</head>




</body>
</html>