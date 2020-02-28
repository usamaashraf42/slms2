@extends('_layouts.admin.default')
@section('title', 'Stduent Transfer')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="col-md-12">
          <input type='button' id='btn' value='Print' onclick="printDivs(this,printAllRecord)" 
          class="btn btn-primary float-center allrecord" style="width: 100%;">
        </div>
        <div id="printAllRecord" >
				<div class="card-block">
					<h4 class="card-title">Stduent Transfer @isset($transfers[0]->student->branch) Of {{$transfers[0]->student->branch->branch_name}}@endisset</h4>
					@component('_components.alerts-default')
						@endcomponent

						<table id="example" class="table border table-bordered ">
						<thead>
              <tr >
                <th>Ly no</th>
                <th>Student</th>

                <th>From Branch</th>
                <th>From Class</th>

                 <th>To Branch</th>
                 <th>To Class</th>
              
                <th>Reason</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
             @isset($transfers)
              @php($class=0)
              @foreach($transfers as $pro)
              @php($classId=$pro->student->course_id)
              @if($classId!=$class)
                  <tr> 
                    <td colspan="13"><strong>@if(isset($pro->student->course->course_name)){{$pro->student->course->course_name}} @endif </strong></td> 
                  </tr> 
                  @endif
                  <tr>
                    <td>@isset($pro->student){{$pro->student->id}}@endisset</td>
                    <td>@isset($pro->student){{$pro->student->s_name}}@endisset</td>
                    <td>@isset($pro->fromBranch){{$pro->fromBranch->branch_name}}@endisset</td>
                    <td>@isset($pro->fromClass){{$pro->fromClass->course_name}}@endisset</td>



                    <td>@isset($pro->toBranch){{$pro->toBranch->branch_name}}@endisset</td>
                    <td>@isset($pro->toClass){{$pro->toClass->course_name}}@endisset</td>
                    <td>{{$pro->description}}</td>
                   
                    <td>@if($pro->status==1)<button class="btn btn-success btn-sm">{{'approved'}}</button>@endif @if($pro->status==2)<button class="btn btn-danger btn-sm">{{'Unapproved'}}@endif </button> @if($pro->status==0)<button class="btn btn-warning btn-sm">{{'pending'}}@endif </button></td>
                    
               </tr>
              

              @php($class=$pro->student->course_id)
              @endforeach
              @endisset
            </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	
@endsection
@push('post-styles')
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
@endpush
@push('post-scripts')
<script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>


@endpush