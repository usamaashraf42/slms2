@extends('_layouts.admin.default')
@section('title', 'School Edit')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">School Edit</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('school.update',$school->id) }}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}
						@method('PUT')

						<div class="row">
							<div class="col-md-3">
								<div class="fileinput fileinput-new" data-provides="fileinput" >
									<div class="fileinput-new thumbnail" style="width: 250px; height: 250px;">
										<img src="@if( isset($school->school_logo) && $school->school_logo) {{asset('images/school_logo/'.''.$school->school_logo)}} @else {{asset('images/no-image.png')}} @endif" id="profile-img-tag" height="250" width = "250">

									</div>
								</div>
								<div class="form-group">
									<label for="images" class="btn btn-primary" style="position: relative;left: 50px;top: 20px;">Upload Logo</label>
									<input type="file" id="images" value="{{ old('school_logo') }}" name="school_logo" class="hide" style="opacity: 0;">
									@if ($errors->has('school_logo'))
									<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
											<span class="sr-only">Close</span>
										</button>
										<strong>Warning!</strong> {{$errors->first('school_logo')}}
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
											<label class="control-label">School Name</label>
											<input name="school_name" value="@isset($school->school_name){{$school->school_name}} @endisset" type="text" placeholder=" school_name" class="form-control">
											@if ($errors->has('school_name'))
											<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
													<span class="sr-only">Close</span>
												</button>
												<strong>Warning!</strong> {{$errors->first('school_name')}}
											</div>
											@endif
										</div>
									</div>
									<div class="row" style="margin: 10px 0px;">
										<div class="col-md-6">
											<label class="control-label">Email</label>
											<input name="school_email" type="email" value="@isset($school->school_email){{$school->school_email}} @endisset" class="form-control" placeholder="abc123@example.com">
											@if ($errors->has('school_email'))
											<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
													<span class="sr-only">Close</span>
												</button>
												<strong>Warning!</strong> {{$errors->first('school_email')}}
											</div>
											@endif
										</div>

										<div class="col-md-6">
											<label class="control-label">Cheif Name</label>
											<input type="text" name="sch_cheif_name" value="@isset($school->sch_cheif_name){{$school->sch_cheif_name}} @endisset" placeholder="CEO Name" class="form-control">

											@if ($errors->has('sch_cheif_name'))
											<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
													<span class="sr-only">Close</span>
												</button>
												<strong>Warning!</strong> {{$errors->first('sch_cheif_name')}}
											</div>
											@endif


										</div>

									</div> 
									<div class="row" style="margin: 10px 0px;">
										<div class="col-md-6">
											<label class="control-label">School Phone No</label>
											<input name="school_phone_no" type="text" value="@isset($school->school_phone_no){{$school->school_phone_no}} @endisset" class="form-control" placeholder="0304587879">
											@if ($errors->has('school_phone_no'))
											<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
													<span class="sr-only">Close</span>
												</button>
												<strong>Warning!</strong> {{$errors->first('school_phone_no')}}
											</div>
											@endif
										</div>

										<div class="col-md-6">
											<label class="control-label">School Tell No</label>
											<input type="text" name="sch_tel_no" value="@isset($school->sch_tel_no){{$school->sch_tel_no}} @endisset" placeholder="423810131" class="form-control">

											@if ($errors->has('sch_tel_no'))
											<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
													<span class="sr-only">Close</span>
												</button>
												<strong>Warning!</strong> {{$errors->first('sch_tel_no')}}
											</div>
											@endif


										</div>

									</div>
									<div class="row" style="margin: 10px 0px;">
										<div class="col-md-6">
											<label class="control-label">Address</label>
											<textarea name="address" type="text" value="{{ old('address') }}" class="form-control" placeholder="address">@isset($school->address){{$school->address}} @endisset</textarea>
											@if ($errors->has('address'))
											<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
													<span class="sr-only">Close</span>
												</button>
												<strong>Warning!</strong> {{$errors->first('address')}}
											</div>
											@endif
										</div>

									</div>

									
									<div class="row" style="margin: 10px 0px;">
										<div class="col-md-12 col-sm-12">
											<label class="control-label">Branches</label>
											<select id='pre-selected-options' multiple='multiple' name="branches[]">
												@foreach($branches as $role)

												<option value="{{$role->id}}" @if($school->checkBranch($role->id)) selected @endif>{{$role->branch_name}}</option>

												@endforeach
											</select>

										</div>
									</div>

									
								</div> 

								
							</div>
							<div class="form-group row">

									<div class="card" style="width:100%">
										<div class="card-block">
											<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
												<button type="Submit" class="btn btn-primary ks-rounded"> Submit </button>
												<a class="btn btn-success ks-rounded" href="{{route('school.index')}}">Cancel</a>
											</div>

										</div>
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
				<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
				<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
				<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
				<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
				<script src="{{asset('assets/multi-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/multi-select/jquery.multi-select.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/multi-select/select2.full.min.js')}}" type="text/javascript"></script>

				<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
				<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

				<script type="text/javascript">

					$('.branch_id').select2();


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