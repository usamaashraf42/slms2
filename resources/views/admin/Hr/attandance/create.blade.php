@extends('_layouts.admin.default')
@section('title', 'Attendance')
@section('content')

<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Attendance</h4>
					@component('_components.alerts-default')
					@endcomponent
				<form method="POST" action="{{ route('employee-attandance.store') }}" enctype = "multipart/form-data" id="upload_new_form">
				{{ csrf_field() }}
					
						
						<div class="col-md-12">
							<div class="row" >
								<div class="col-md-6">
										<label for="branch_id">Select Employee</label>
										<select  class=" form-control employee_id"  name="employee_id" id="employee_id">
											
									<p class="alert alert-danger statusId_eror" style="display: none"></p>
							
								</div>
								<div class="col-md-6">
									 <label for="schedule">Attendance Time</label>
									 <input   name="schedule" id="schedule" class="form-control schedule" >
									 <p class="alert alert-danger schedule_eror" style="display: none"></p>
							</div>
							</div>
							
							
						</div>
						<div class="modal-footer">
							<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
							value="Dismiss">
							<input type="submit" class="btn btn-outline-success btn-lg"   id="addDataBtn" value="Submit">
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		@endsection

		@push('post-styles')

		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
		

		@endpush
		@push('post-scripts')

		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

		<script>
			$(function() {
				$('input[name="schedule"]').daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 1980,
					timePicker: true,
					timePicker24Hour: true,
					timePickerIncrement: 10,
					autoUpdateInput: true,
					locale: {
						format: 'YYYY/MM/DD HH:mm',
					},
					maxYear: parseInt(moment().format('YYYY'),16)
				});


			});
			$(function() {
		   	$('#start_time').daterangepicker({
		            timePicker : true,
		            singleDatePicker:true,
		            timePicker24Hour : true,
		            timePickerIncrement : 1,
		            timePickerSeconds : true,
		            locale : {
		                format : 'HH:mm:ss'
		            }
		        }).on('show.daterangepicker', function(ev, picker) {
		            picker.container.find(".calendar-date").hide();
		        }).on('showCalendar.daterangepicker', function(ev, picker){
		           picker.container.find('.calendar-date').remove();
		        });
			});
			$(function() {
			$('#till_time').daterangepicker({
		            timePicker : true,
		            singleDatePicker:true,
		            timePicker24Hour : true,
		            timePickerIncrement : 1,
		            timePickerSeconds : true,
		            locale : {
		                format : 'HH:mm:ss'
		            }
		        }).on('show.daterangepicker', function(ev, picker) {
		            picker.container.find(".calendar-date").hide();
		        }).on('showCalendar.daterangepicker', function(ev, picker){
		           picker.container.find('.calendar-date').remove();
		        });
			});
			$(function() {
		   	$('#start_date').daterangepicker({
		            timePicker : false,
		            singleDatePicker:true,
		            timePicker24Hour : true,
		            timePickerIncrement : 1,
		            timePickerSeconds : true,
		            locale : {
		                format : 'YYYY-MM-DD'
		            }
		        })
			});
			$(function() {
			$('#till_date').daterangepicker({
		            timePicker : false,
		            singleDatePicker:true,
		            timePicker24Hour : true,
		            timePickerIncrement : 1,
		            timePickerSeconds : true,
		            locale : {
		                format : 'YYYY-MM-DD'
		            }
		        })
			});
		</script>

		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#profile-img-tag').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#images").change(function(){
				readURL(this);
			}); 


			$('#employee_id').select2({
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

@endpush