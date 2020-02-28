@extends('_layouts.admin.default')
@section('title', 'Franchise Applicant')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Franchise Applicant Mangement</h4>
				<div class="col-md-3">
						<div class="heading-elements float-left" style="width: 95%; margin-left: 20px;">

						@if(!Auth::user()->school_id)
						<div class="row">
							<label class="control-label" style="width: 100%;">Select School </label>
							<select   class=" form-control " style="width: 100%" onchange="location = this.value;" > 
								<option value="javascript:;">Choose School</option>
								@if(!empty($schools))
								@foreach($schools as $branch)
								 <option value="{{route('franchise-applicant.show',$branch->id)}}" >{{$branch['school_name']}}</option> 
								@endforeach
								@endif 

							</select>

						</div>
						<br>
						@endif
					</div>


				</div>


					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th></th>
									<th>School</th>
									<th>Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Mobile No</th>
									<th>Country</th>
									<th>Address</th>
									<th>Area</th>
									<th>Select Franchise</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								@isset($records)
								@foreach($records as $job)
								<tr>
									<td><input type="checkbox" name="ids[]" value="{{$job->id}}"></td>
									<td>@if($job->school_id==1) {{'AMERICAN LYCEUM GROUP OF SCHOOL'}} @elseif($job->school_id==2) {{'ROYAL LYCEUM'}} @else {{'AMERICAN LYCEUM GROUP OF SCHOOL'}}  @endif</td>
									<td>{{$job->first_name}}</td>
									<td>{{$job->last_name}}</td>
									<td>{{$job->email}}</td>
									<td>{{$job->phone}}</td>
									<td>{{$job->country}}</td>
									<td>{{$job->country_address}}</td>
									<td>{{$job->select_area}}</td>
									<td>{{$job->select_franchise}}</td>

									<td>@isset($job->created_at){{date("d-m-Y", strtotime($job->created_at))}} @endisset</td>

									</td>
								</tr>
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

<script>
	$(document).ready(function() {
     //Default data table
     $('#default-datatable').DataTable();


     var table = $('#example').DataTable( {
     	"order": [[ 0, "desc" ]],
     	lengthChange: false,
     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
     } );

     table.buttons().container()
     .appendTo( '#example_wrapper .col-md-6:eq(0)' );

 } );
</script>


@endpush