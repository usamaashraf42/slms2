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

    <base href="{{ url('/') }}">
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

        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/logo.png')}}">
        <title> @yield('title','Job Applicant')- American Lyceum</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Vendors Styles(used by this page)-->
        <link href="{{ asset('job_assets/plugins/custom/fullcalendar/fullcalendar.bundled1cf.css?v=7.1.6') }}"
            rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{ asset('job_assets/plugins/global/plugins.bundled1cf.css?v=7.1.6') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('job_assets/plugins/custom/prismjs/prismjs.bundled1cf.css?v=7.1.6') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('job_assets/css/style.bundled1cf.css?v=7.1.6') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->

        <link href="{{ asset('job_assets/css/themes/layout/header/base/lightd1cf.css?v=7.1.6') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('job_assets/css/themes/layout/header/menu/lightd1cf.css?v=7.1.6') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('job_assets/css/themes/layout/brand/lightd1cf.css?v=7.1.6') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('job_assets/css/themes/layout/aside/lightd1cf.css?v=7.1.6') }}" rel="stylesheet"
            type="text/css" />
        <!--end::Layout Themes-->
        <link rel="shortcut icon"
            href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/favicon.ico" />
        <!-- Hotjar Tracking Code for keenthemes.com -->
        <script>
            (function(h, o, t, j, a, r) {
                h.hj = h.hj || function() {
                    (h.hj.q = h.hj.q || []).push(arguments)
                };
                h._hjSettings = {
                    hjid: 1070954,
                    hjsv: 6
                };
                a = o.getElementsByTagName('head')[0];
                r = o.createElement('script');
                r.async = 1;
                r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
                a.appendChild(r);
            })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');

        </script>
    @show

    @stack('post-styles')

    <script type="text/javascript">
        var BASE_URL = "{{ url('/') }}";

    </script>

</head>

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">


    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <!--begin::Logo-->
        <a href="../../index.html">
            <img alt="Logo" src="../../../theme/html/demo1/dist/assets/media/logos/logo-dark.png" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->
            <!--begin::Header Menu Mobile Toggle-->
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <!--end::Header Menu Mobile Toggle-->
            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>


            <div class="d-flex flex-column flex-root">
                <!--begin::Page-->
                <div class="d-flex flex-row flex-column-fluid page">




                    @section('aside-left')
                        @include('_layouts.JobApplicant.partials._aside-left')
                    @show



                    <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                        @section('header-base')
                            @include('_layouts.JobApplicant.partials._header-base')
                        @show

                        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                            @yield('content')

                        </div>

                        @section('footer-base')
                            @include('_layouts.JobApplicant.partials._footer')
                        @show
                    </div>

                </div>
            </div>



            @include('_layouts.JobApplicant.partials._aside-left-shortcut')


@show

@stack('pre-scripts')

@section('scripts')

    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };

    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('job_assets/plugins/global/plugins.bundled1cf.js?v=7.1.6') }}"></script>
    <script src="{{ asset('job_assets/plugins/custom/prismjs/prismjs.bundled1cf.js?v=7.1.6') }}"></script>
    <script src="{{ asset('job_assets/js/scripts.bundled1cf.js?v=7.1.6') }}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('job_assets/plugins/custom/fullcalendar/fullcalendar.bundled1cf.js?v=7.1.6') }}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script>
    <script src="{{ asset('job_assets/plugins/custom/gmaps/gmapsd1cf.js?v=7.1.6') }}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('job_assets/js/pages/widgetsd1cf.js?v=7.1.6') }}"></script>
    <style>
        .swal-button--confirm {
            background-color: #DD6B55;
        }

    </style>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function printDiv(eve, obj) {
            console.log('printId', $(obj).attr('id'));

            var divToPrint = document.getElementById($(obj).attr('id'));

            var newWin = window.open('', 'Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

            newWin.document.close();

            setTimeout(function() {
                newWin.close();
            }, 10);

        }

    </script>

@show
@stack('post-scripts')
</body>

</html>
