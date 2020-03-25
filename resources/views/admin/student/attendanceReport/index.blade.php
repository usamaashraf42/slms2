@extends('_layouts.admin.default')
@section('title', 'Attendance Report')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-8">
              <h4 class="page-title">Today Attendance Report</h4>
            </div>

          </div>
          <br>

          @component('_components.alerts-default')
          @endcomponent
          <div class="row">
            <div class="col-12">
              @foreach($branches as $branch)
              <div class="table-responsive">
                <h2> {{$branch->branch_name}}</h2>
                <table id="category_table" class="table">
                  <thead>
                   <tr>
                    <th></th>
                    <th>Class </th>
                    <th>Total Student </th>
                    <th>Present</th>
                    <th>Absent </th>
                    <th>Leaves</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   $totalStudentCount=0;
                  $totalPresentCount=0;
                  $totalAbsentCount=0;

                  ?>
                  @foreach($branch->level as $course)
                  <?php

                  $totalStd=count(class_students($branch->id,$course->course_id));
                  $todayPresent=class_attendance_by_date($branch->id,$course->course_id,date('Y-m-d'));
                  $todayAbsent=class_attendance_by_date_absent($branch->id,$course->course_id,date('Y-m-d'));

                  $totalStudentCount+=$totalStd;
                  $totalPresentCount+=$todayPresent;
                  $totalAbsentCount+=$todayAbsent;
                  ?>
                  @if($totalStd)
                  <tr>
                    <td></td>
                    <td>@isset($course->course->course_name){{$course->course->course_name}}@endisset </td>
                    <td>{{($totalStd)}} </td>
                    <td>{{$todayPresent}}</td>
                    <td>{{$todayAbsent}} </td>
                    <td>{{$totalStd- $todayPresent - $todayAbsent}}</td>
                    
                  </tr>
                  @endif
                 
                  @endforeach
                  <tr>
                    <td></td>
                    <td><strong>Total</td>
                    <td><strong>{{($totalStudentCount)}} </strong> </td>
                    <td><strong>{{$totalPresentCount}} </strong></td>
                    <td><strong>{{$totalAbsentCount}}  </strong></td>
                    <td><strong>{{$totalPresentCount - $totalPresentCount - $totalAbsentCount}} </strong></td>
                    
                  </tr>
                </tbody>
              </table>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection
@push('post-styles')

<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
@endpush
@push('post-scripts')
<script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>

@endpush