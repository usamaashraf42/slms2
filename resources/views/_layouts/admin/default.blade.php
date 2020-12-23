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
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <base href="{{ url('/')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @section('metas')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">

  @show
  @stack('pre-styles')

  @section('styles')

  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
  <title> @yield('title','Dashboard')-School Mangement System</title>

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fullcalendar.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/morris/morris.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('js/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-16x16.png')}}" sizes="16x16" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-32x32.png')}}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/favicon-96x96.png')}}" sizes="96x96" />
  <link rel="icon" type="image/png" href="{{asset('web/pakistan/sitefiles/2532/css/images/android-chrome-192x192.png')}}" sizes="192x192" />

  @show

  @stack('post-styles')

  <script type="text/javascript">
    var BASE_URL = "{{ url('/')}}";
  </script>

</head>

<body>

  <div class="main-wrapper">

    @section('header-base')
    @include('_layouts.admin.partials._header-base')
    @show

    @section('aside-left')
    @include('_layouts.admin.partials._aside-left')
    @show

    <div class="page-wrapper">
      @yield('content')
    </div>
  </div>


  <div class="sidebar-overlay" data-reff=""></div>

  @show

  @stack('pre-scripts')

  @section('scripts')

  <script type="text/javascript" src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jquery.fullcalendar.js')}}"></script>
  <!-- <script type="text/javascript" src="{{asset('assets/js/chart.js')}}"></script> -->
  <script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
  <script src="{{asset('js/sweetalert2/sweetalert2.min.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .swal-button--confirm {
      background-color: #DD6B55;
    }
    .slimScrollBar{
        background: rgb(204, 204, 204);
        width: 10px !important;
        position: absolute;
        top: 0px;
        opacity: 0.4;
        display: block;
        border-radius: 7px;
        z-index: 99;
        right: 1px;
        height: 388.992px;
    }
  </style>

  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });
      function printDiv(eve,obj)
    {
      console.log('printId',$(obj).attr('id'));

      var divToPrint=document.getElementById($(obj).attr('id'));

      var newWin=window.open('','Print-Window');

      newWin.document.open();

      newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);

    }
 </script>

 @show
 @stack('post-scripts')
</body>
</html>
