@extends('_layouts.admin.default')
@section('title', 'job')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Add New Job</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('job.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}

						<div class="row">
							<div class="col-md-3">
								<div class="fileinput fileinput-new" data-provides="fileinput" >
									<div class="fileinput-new thumbnail" style="width: 250px; height: 250px;">
										<img src="{{asset('images/no-image.png')}}" id="profile-img-tag" height="250" width = "250">

									</div>
								</div>
								<div class="form-group">
									<label for="images" class="btn btn-primary" style="position: relative;left: 50px;top: 20px;">Job Image</label>
									<input type="file" id="images" value="{{ old('images') }}" name="images" class="hide" style="opacity: 0;">
									@if ($errors->has('images'))
									<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
											<span class="sr-only">Close</span>
										</button>
										<strong>Warning!</strong> {{$errors->first('images')}}
									</div>
									@endif
								</div>

								<div class="col-md-4">
									<div class="form-group" style="padding: 0px; ">
										<div class = "gallery"></div>
									</div>
								</div>
							</div>
							<div class="col-md-9" style="margin-bottom: 20px;">
								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-12">
										<label class="control-label"> Job  Title</label>
										<input name="title" value="{{ old('title') }}" type="text" placeholder="First Name" class="form-control">
										@if ($errors->has('title'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('title')}}
										</div>
										@endif
									</div>
								</div>
								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-12">
										<label class="control-label">Job Long Title </label>
										<input name="long_title"  value="{{ old('long_title') }}" class="form-control" placeholder="Long Title">
										@if ($errors->has('long_title'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('long_title')}}
										</div>
										@endif
									</div>

									<div class="col-md-12">
										<label class="control-label">Description</label>
										<textarea type="text" name="description" value="{{ old('description') }}"  class="form-control">
										</textarea>

										@if ($errors->has('description'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('description')}}
										</div>
										@endif
									</div>

								</div>
								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-6">
										<label class="control-label">Publish Date</label>
										<input class="form-control " type="text" autocomplete="false" @if(old('posting_date')) {{old('posting_date')}} @endif name="posting_date"  />
										
										@if ($errors->has('posting_date'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('posting_date')}}
										</div>
										@endif
									</div>
									<div class="col-md-6">
										<label class="control-label">Till Date</label>
										<input type="text" name="till_date" value="{{ old('till_date') }}" placeholder="Mobile No" class="form-control">

										@if ($errors->has('till_date'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('till_date')}}
										</div>
										@endif
									</div>
								</div>
								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-12 col-sm-12">
										<label class="control-label">Branches</label>
										<select id='permission-selected-options' multiple='multiple' name="branch_ids[]">
											@foreach($branches as $branch)
											<option value="{{$branch->id}}">{{$branch->branch_name}}</option>
											@endforeach
										</select>

									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
							value="Reset">
							<input type="submit" class="btn btn-outline-success btn-lg" id="addDataBtn"
							value="Add Job">
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection

		@push('post-styles')
		<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
		@endpush

		@push('post-scripts')
		<link href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" rel="stylesheet" type="text/css" />
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/img/switch.png">
		
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
		<script>
			$(function() {
				$('input[name="posting_date"]').daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 1980,
					maxYear: parseInt(moment().format('YYYY'),16)
				});

				$('input[name="till_date"]').daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 1980,
					maxYear: parseInt(moment().format('YYYY'),16)
				});
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
		<script type="text/javascript">

			$('#pre-selected-options').multiSelect();
			$('#permission-selected-options').multiSelect();
		</script>
		@endpush