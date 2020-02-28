@extends('_layouts.admin.default')
@section('title', 'Send Sms and Email')
@section('content')
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Send Sms And Email</h4>
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('sendSmsEmail') }}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}

						@foreach($ids as $id)
						<input type="hidden" name="application_ids[]" value="@if(isset($id) && !empty($id)){{$id}}@endif">
						@endforeach

						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label for="email_subject">Email Subject</label>
									<textarea name="email_subject"   class="form-control email_subject">Notification</textarea>
									<p class="alert alert-danger email_body_eror" style="display: none"></p>
								</div>
							</div>
						</div>
						

						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label for="email_body">Email</label>
									<textarea name="email_body"  id="summernote" class="form-control email_body"> We are pleased to inform you that you have been selected for interview from the plenty of candidates. The following are the detail of the interview.<br>
										Please bring the following things with you:<br>
										1- Your recent photograph<br>
										2- Your latest CV<br>
										3- Copies of your degrees<br></textarea>
									<p class="alert alert-danger email_body_eror" style="display: none"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email_body">SMS</label>
									<textarea name="sms_body" rows="17" class="form-control email_body">Congratulations  you have been selected for interview from the plenty of candidates.  Check your email for more details.
									</textarea>
									<p class="alert alert-danger email_body_eror" style="display: none"></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="sms_send">Sms</label>
									<input type="checkbox" name="sms_send" value="1">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email_send">Email</label>
									<input type="checkbox" name="email_send" checked value="1">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">

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

<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


<script>
	$('#summernote').summernote({
			  height: 300,                 // set editor height
			  minHeight: null,             // set minimum height of editor
			  maxHeight: null,             // set maximum height of editor
			  focus: true                  // set focus to editable area after initializing summernote
			});
	$('#summernote2').summernote({
			  height: 300,                 // set editor height
			  minHeight: null,             // set minimum height of editor
			  maxHeight: null,             // set maximum height of editor
			  focus: true                  // set focus to editable area after initializing summernote
			});
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
			// $(function() {
		 //   	$('#start_time').daterangepicker({
		 //            timePicker : true,
		 //            singleDatePicker:true,
		 //            timePicker24Hour : true,
		 //            timePickerIncrement : 1,
		 //            timePickerSeconds : true,
		 //            locale : {
		 //                format : 'HH:mm:ss'
		 //            }
		 //        }).on('show.daterangepicker', function(ev, picker) {
		 //            picker.container.find(".calendar-date").hide();
		 //        }).on('showCalendar.daterangepicker', function(ev, picker){
		 //           picker.container.find('.calendar-date').remove();
		 //        });
			// });
			// $(function() {
			// $('#till_time').daterangepicker({
		 //            timePicker : true,
		 //            singleDatePicker:true,
		 //            timePicker24Hour : true,
		 //            timePickerIncrement : 1,
		 //            timePickerSeconds : true,
		 //            locale : {
		 //                format : 'HH:mm:ss'
		 //            }
		 //        }).on('show.daterangepicker', function(ev, picker) {
		 //            picker.container.find(".calendar-date").hide();
		 //        }).on('showCalendar.daterangepicker', function(ev, picker){
		 //           picker.container.find('.calendar-date').remove();
		 //        });
			// });
			// $(function() {
		 //   	$('#start_date').daterangepicker({
		 //            timePicker : false,
		 //            singleDatePicker:true,
		 //            timePicker24Hour : true,
		 //            timePickerIncrement : 1,
		 //            timePickerSeconds : true,
		 //            locale : {
		 //                format : 'YYYY-MM-DD'
		 //            }
		 //        })
			// });
			// $(function() {
			// $('#till_date').daterangepicker({
		 //            timePicker : false,
		 //            singleDatePicker:true,
		 //            timePicker24Hour : true,
		 //            timePickerIncrement : 1,
		 //            timePickerSeconds : true,
		 //            locale : {
		 //                format : 'YYYY-MM-DD'
		 //            }
		 //        })
			// });
			var today = new Date();

			$('#start_date').val(new Date(today.getFullYear(), today.getMonth(), today.getDate()+1));
			$('#till_date').val(new Date(today.getFullYear(), today.getMonth(), today.getDate()+1));


			$('#start_date').calendar({
				monthFirst: false,
				type: 'date',
				minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()+1),

			});
			$('#till_date').calendar({
				monthFirst: false,
				type: 'date',
				minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()+1),
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

		</script>
		<script>


			function statusId_name(og){
				console.log('statusId_name');
				var valid = true;   
				console.log('form input',$('#statusId').val());
				if (valid && $('#statusId').val() == '' || $('#statusId').val() == null) {
					console.log('in condition');
					$('.statusId_eror').text('Course id field is required');
					$('.statusId_eror').css('display','block');
					valid = false;
				}
				if (valid && $('#schedule').val() == '') {
					$('.schedule_eror').text('student name field is required');
					$('.schedule_eror').css('display','block');
					valid = false;
				}
				if (valid && $('#start_date').val() == '') {
					$('.start_date_eror').text('date of birth field is required');
					$('.start_date_eror').css('display','block');
					valid = false;
				}
				if (valid && $('#till_date').val() == '') {
					$('.till_date_eror').text('Father name field is required');
					$('.till_date_eror').css('display','block');
					valid = false;
				}
				if (valid && $('#start_time').val() == '') {
					$('.start_time_error').text('Gender name field is required');
					$('.start_time_error').css('display','block');
					valid = false;
				}
				if (valid && $('#till_time').val() == '') {
					$('.till_time_error').text('Gender name field is required');
					$('.till_time_error').css('display','block');
					valid = false;
				}
				if (valid && $('#country_id').val() == '') {
					$('.country_id_error').text('Gender name field is required');
					$('.country_id_error').css('display','block');
					valid = false;
				}
				if (valid && $('#Venue').val() == '') {
					$('.Venue_error').text('Gender name field is required');
					$('.Venue_error').css('display','block');
					valid = false;
				}
				if (valid && $('#contact_no').val() == '') {
					$('.contact_no_error').text('Gender name field is required');
					$('.contact_no_error').css('display','block');
					valid = false;
				}
				if (valid && $('#email_subject').val() == '') {
					$('.email_subject_error').text('Gender name field is required');
					$('.email_subject_error').css('display','block');
					valid = false;
				}

				if (valid && $('#email_body').val() == '') {
					$('.email_body_error').text('Gender name field is required');
					$('.email_body_error').css('display','block');
					valid = false;
				}
				$('#upload_new_form :input:visible[required="required"]').each(function()
				{
					if(!this.validity.valid)
					{
						$(this).focus();
						return false;
					}
				});
			}

			$('.punch_in').timepicker({
				timeFormat: 'h:mm p',
				interval: 10,
				minTime: '10',
				maxTime: '6:00pm',
				startTime: '10:00',
				dynamic: false,
				dropdown: true,
				scrollbar: true
			});




			$('.punch_out').timepicker({
				timeFormat: 'h:mm p',
				interval: 10,
				minTime: '10',
				maxTime: '6:00pm',
				startTime: '10:00',
				dynamic: false,
				dropdown: true,
				scrollbar: true
			});
			

		</script>
		@endpush