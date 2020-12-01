@extends('_layouts.JobApplicant.default')
@section('title', 'Dashboard')
@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>

                {{-- <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div> --}}

            </div>


        </div>
    </div>


    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div class="row">

                <div class="col-lg-8">
                    <!--begin::Advance Table Widget 4-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Current Jobs</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ applicants</span>
                            </h3>

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3">
                            <div class="tab-content">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead>
                                            <tr class="text-left text-uppercase">
                                                <th style="min-width: 250px" class="pl-7">
                                                    <span class="text-dark-75">Job Title</span>
                                                </th>
                                                <th style="min-width: 100px">Education</th>
                                                <th style="min-width: 100px">Experience</th>
                                                <th style="min-width: 100px">Salary</th>
                                                <th style="min-width: 80px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="pl-0 py-8">
                                                    <div class="d-flex align-items-center">

                                                        <div>
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Brad Simmons</a>
                                                            <span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                                                    <span class="text-muted font-weight-bold">Web, UI/UX Design</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">3 Year</span>
                                                    {{-- <span class="text-muted font-weight-bold">In Proccess</span> --}}
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$520</span>
                                                </td>


                                                <td class="pr-0 text-right">
                                                    <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">Apply</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0 py-8">
                                                    <div class="d-flex align-items-center">

                                                        <div>
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Brad Simmons</a>
                                                            <span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                                                    <span class="text-muted font-weight-bold">Web, UI/UX Design</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">3 Year</span>
                                                    {{-- <span class="text-muted font-weight-bold">In Proccess</span> --}}
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$520</span>
                                                </td>


                                                <td class="pr-0 text-right">
                                                    <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">Apply</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0 py-8">
                                                    <div class="d-flex align-items-center">

                                                        <div>
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Brad Simmons</a>
                                                            <span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                                                    <span class="text-muted font-weight-bold">Web, UI/UX Design</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">3 Year</span>
                                                    {{-- <span class="text-muted font-weight-bold">In Proccess</span> --}}
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$520</span>
                                                </td>


                                                <td class="pr-0 text-right">
                                                    <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">Apply</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0 py-8">
                                                    <div class="d-flex align-items-center">

                                                        <div>
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Brad Simmons</a>
                                                            <span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                                                    <span class="text-muted font-weight-bold">Web, UI/UX Design</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">3 Year</span>
                                                    {{-- <span class="text-muted font-weight-bold">In Proccess</span> --}}
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$520</span>
                                                </td>


                                                <td class="pr-0 text-right">
                                                    <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">Apply</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0 py-8">
                                                    <div class="d-flex align-items-center">

                                                        <div>
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Brad Simmons</a>
                                                            <span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                                                    <span class="text-muted font-weight-bold">Web, UI/UX Design</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">3 Year</span>
                                                    {{-- <span class="text-muted font-weight-bold">In Proccess</span> --}}
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$520</span>
                                                </td>


                                                <td class="pr-0 text-right">
                                                    <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">Apply</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 4-->
                </div>
                <div class="col-lg-4">
                    <!--begin::Mixed Widget 14-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title font-weight-bolder">Profile Complete</h3>

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <div class="flex-grow-1" style="position: relative;">
                                <div id="kt_mixed_widget_14_chart" style="height: 200px; min-height: 178.7px;">
                                    <div id="apexcharts6cdhj7zz" class="apexcharts-canvas apexcharts6cdhj7zz apexcharts-theme-light" style="width: 269px; height: 178.7px;">
                                        <svg id="SvgjsSvg1454" width="269" height="178.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1456" class="apexcharts-inner apexcharts-graphical" transform="translate(47.5, 0)">
                                            <defs id="SvgjsDefs1455">
                                                <clipPath id="gridRectMask6cdhj7zz">
                                                    <rect id="SvgjsRect1458" width="182" height="200" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">

                                                    </rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMask6cdhj7zz">
                                                    <rect id="SvgjsRect1459" width="180" height="202" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">

                                                    </rect>
                                                </clipPath>
                                            </defs>
                                            <g id="SvgjsG1460" class="apexcharts-radialbar">
                                                <g id="SvgjsG1461">
                                                    <g id="SvgjsG1462" class="apexcharts-tracks">
                                                        <g id="SvgjsG1463" class="apexcharts-radialbar-track apexcharts-track" rel="1">
                                                            <path id="apexcharts-radialbarTrack-0" d="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 87.98928506193984 26.607927764323023" fill="none" fill-opacity="1" stroke="rgba(201,247,245,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="8.97439024390244" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 87.98928506193984 26.607927764323023">

                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1465">
                                                        <g id="SvgjsG1469" class="apexcharts-series apexcharts-radial-series" seriesName="Progress" rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath1470" d="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 26.757474833957374 92.28249454023158" fill="none" fill-opacity="0.85" stroke="rgba(27,197,189,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="8.97439024390244" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="266" data:value="74" index="0" j="0" data:pathOrig="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 26.757474833957374 92.28249454023158">

                                                            </path>
                                                        </g>
                                                        <circle id="SvgjsCircle1466" r="56.9048780487805" cx="88" cy="88" class="apexcharts-radialbar-hollow" fill="transparent"></circle>
                                                        <g id="SvgjsG1467" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                            <text id="SvgjsText1468" font-family="Helvetica, Arial, sans-serif" x="88" y="100" text-anchor="middle" dominant-baseline="auto" font-size="30px" font-weight="700" fill="#5e6278" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">74%
                                                            </text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1471" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs">

                                            </line>
                                            <line id="SvgjsLine1472" x1="0" y1="0" x2="176" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden">

                                            </line>
                                        </g>
                                        <g id="SvgjsG1457" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend"></div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 270px; height: 235px;"></div>
                                </div><div class="contract-trigger"></div>
                            </div>
                        </div>
                            <div class="pt-5">
                                <p class="text-center font-weight-normal font-size-lg pb-7">Notes:Complete your profile Score automatic increase</p>
                                <a href="#" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">Increase Score</a>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 14-->
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
