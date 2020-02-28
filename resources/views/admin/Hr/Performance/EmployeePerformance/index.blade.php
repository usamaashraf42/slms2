@extends('_layouts.admin.default')
@section('title', 'Performance')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				
				<div class="card-block">
					<h4 class="card-title">Employee Evolution Of @isset($branch) {{$branch->branch_name}} @endisset</h4>
					<div class="heading-elements float-right">
						<a href="{{route('performance.create',$month,$year,$branch_id)}}" class="btn add-btn btn-success" ><i class="fa fa-plus"></i> Add Performance </a>
					</div>
				</br>

				@component('_components.alerts-default')
				@endcomponent
				<div class="table-responsive">
					<table id="example" class="table border table-bordered ">
						<thead>
							<tr>
								<th></th>
								<th>Emp ID</th>
								<th>Employee Name</th>
								@foreach($performances as $per)
								<th>{{$per->indicator_name}} (max={{$per->indicator_total_marks}})</th>
								@endforeach
								<td>Total Marks</td>
								<th>Remarks</th>


							</tr>
						</thead>
						<tbody>
							@isset($employees)
							@foreach($employees as $admin)
							@php($total_marks=0)
							@php($gain_marks=0)
							<tr>
								<td>
									
									
									<button  class="btn btn-sm btn-primary" onclick="emp_evaluation({{$admin->emp_id}})">Evaluation</button>
									
								</td>
								<td>{{$admin->emp_id}}</td>
								<td>@isset($admin->name){{$admin->name.' / '.$admin->fname}}@endisset</td>


								@foreach($performances as $per)
								@php($record=$admin->get_employeePerformance($admin->emp_id,$month,$year,$per->id))


								<td>@isset($record['marks'])
									@php($total_marks+=$record['total_marks'])
									@php($gain_marks+=$record['marks'])
									{{ $record['marks']  }} 
									@endisset
								</td>

								@endforeach

								<td>{{$gain_marks}} / {{$total_marks}}</td>
								<td>@isset($record->remarks){{$record->remarks}}@endisset</td>

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


<!-- /Edit department Modal -->
<div id="show_edit_modal"></div>

</div>
@endsection

@push('post-styles')
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<!-- <link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script>
	
	$('#account').select2({
		ajax: {
			url: "{{route('get_employee')}}",
			method:"post",
			dataType: 'json',
			processResults: function (_data, params) {
				console.log('_data',_data);
				var data1= $.map(_data, function (obj) {
					var newobj = {};
					newobj.id = obj.id;
					newobj.text= `${obj.name} - (${obj.id}) `;
					return newobj;
				});
				return { results:data1};
			}
		}
	});
</script>
<script>
	$(document).ready(function() {

		$('#default-datatable').DataTable();


		var table = $('#example').DataTable( {
			"order": [[ 0, "desc" ]],
			lengthChange: false,
			"pageLength": 30,
			buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
		} );

		table.buttons().container()
		.appendTo( '#example_wrapper .col-md-6:eq(0)' );

	} );

	function emp_evaluation(ids){
		console.log('ids',ids);
		var month=({{$month}});
		var year=({{$year}});

		$.ajax({
			url: "{{route('emp_eveluation_modal')}}",
			type: 'POST',
			data: {
				'emp_id': ids,'month':month,'year':year
			},
			success: function (response) {

				$("#show_edit_modal").html(response);
				jQuery("#updateCourse").modal('show');
			},
			error: function (e) {
				console.log('error', e);
			}
		});



	}

	// function editItem(id) {
	// 	$.ajax({
	// 		url: 'admin/performance/performance-indicator/'+id+'/edit',
	// 		type: 'get',
	// 		data: {
	// 			'id': id
	// 		},
	// 		success: function (response) {

	// 			$("#show_edit_modal").html(response);
	// 			jQuery("#edit_performanceIndicator").modal('show');
	// 		},
	// 		error: function (e) {
	// 			console.log('error', e);
	// 		}
	// 	});
	// }

	function showConfirmDelete() {
		return confirm("Are You Sure You Want To Change Status?");
	}

	function deleteItem(id) {
		var val = showConfirmDelete();
		if (val) {
			$.ajax({
				url: "{{route('performance-indicator-delete')}}",
				type: 'post',
				data: {
					'id': id
				},
				dataType: 'json',
				success: function (response) {
					console.log('id', response);

					if (response.status == "200") {

						swal(
							'Success!',
							'Data Update Successfully',
							'success'
							);

						location.reload(true);

					} else {
						swal(
							'Warning!',
							response.message,
							'warning'
							);
					}
				},
				error: function () {
					swal(
						'Oops...',
						'Something went wrong!',
						'error'
						)
				}
			});
		}
	}

	
</script>



@endpush