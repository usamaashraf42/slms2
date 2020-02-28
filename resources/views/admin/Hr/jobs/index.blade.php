@extends('_layouts.admin.default')
@section('title', 'Job')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Job Mangement</h4>
					<div class="heading-elements float-right">
                        <a href="{{route('job.create')}}">
                        	<button type="button" class="btn btn-success btn-min-width mr-1 mb-1">
                        		<i class="la la-plus">&nbsp;Add Job</i>
                        	</button>
                    	</a>
                    </div>
					<div class="table-responsive">
						<table id="example" class="table border table-bordered ">
							<thead>
								<tr>
									<th></th>
									<th>Job Title</th>
									<th>Branch</th>
									<th>Posting Date</th>
									<th>Final Date</th>
									<th>Total Applicants</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@isset($jobs)
									@foreach($jobs as $job)
									<tr>
										<td><input type="checkbox" name="ids[]" value="{{$job->id}}"></td>
										<td>{{$job->title}}</td>
										<td>{{branchImplode($job->jobBranch)}}</td>
										<td>{{date("d-m-Y", strtotime($job->posting_date))}}
										</td>
										<td>{{date("d-m-Y", strtotime($job->till_date))}}</td>
										<td>{{$job->applicants()}}</td>
										<td>{{$job->status}}</td>
										<td><a href="{{route('job.edit',$job->id)}}"  class="btn-sm btn-info btn-sm">Edit</a>
											<a href="{{route('applicants',$job->id)}}"  class="btn-sm btn-warning btn-sm">Applicants</a></td>
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