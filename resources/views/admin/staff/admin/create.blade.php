@extends('_layouts.admin.default')
@section('title', 'Staff')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Staff Mangement</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('staff.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						{{ csrf_field() }}

						<div class="row">
							<div class="col-md-3">
								<div class="fileinput fileinput-new" data-provides="fileinput" >
									<div class="fileinput-new thumbnail" style="width: 250px; height: 250px;">
										<img src="{{asset('images/no-image.png')}}" id="profile-img-tag" height="250" width = "250">

									</div>
								</div>
								<div class="form-group">
									<label for="images" class="btn btn-primary" style="position: relative;left: 50px;top: 20px;">Upload Profile</label>
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
								<div class="row">
									<div class="col-md-6">
										<label class="control-label" style="width: 100%;">School 
											<span style="color: red">*</span>
										</label>
										<select class="form-control school_id" name="school_id" onchange="changeBranch(this)"  id="school_id" required>
											<option selected="selected" disabled="disabled">Select School</option>
											@if(!empty($schools))
											@foreach($schools as $branch)
											<option value="{{$branch['id']}}" @if(isset(Auth::user()->school_id) && Auth::user()->school_id==$branch['id']) selected @endif>{{$branch['school_name']}}</option>
											@endforeach
											@endif
										</select>
										<p class="alert alert-danger branch_id_error" style="display: none"></p>
									</div>
									<div class="col-md-6">
										<label class="control-label" style="width: 100%;">Branch 
											<span style="color: red">*</span>
										</label>
										<select class="form-control branch_id" name="branch_id"  required>
											<option selected="selected" disabled="disabled">All Branches</option>
											@if(!empty($branches))
											@foreach($branches as $branch)
											<option value="{{$branch['id']}}" @if(isset(Auth::user()->branch_id) && Auth::user()->branch_id==$branch['id']) selected @endif>{{$branch['branch_name']}}</option>
											@endforeach
											@endif
										</select>
										<p class="alert alert-danger branch_id_error" style="display: none"></p>
									</div>
								</div>
								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-6">
										<label class="control-label"> Name</label>
										<input name="name" value="{{ old('name') }}" type="text" placeholder="First Name" class="form-control">
										@if ($errors->has('name'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('name')}}
										</div>
										@endif
									</div>
									<div class="col-md-6">
	                                    <label class="control-label"> Maintenance</label>
	                                    <select name="maintain_type"  type="text" placeholder="maintain_type" class="form-control">
	                                        <option value="">Choose Type </option>
	                                        <option value="1" >Yes</option>
	                                        <option value="0"  >No</option>
	                                        
	                                    </select>
	                                    @if ($errors->has('maintain_type'))
	                                    <div class="alert alert-danger" role="alert">
	                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                            <span aria-hidden="true">×</span>
	                                            <span class="sr-only">Close</span>
	                                        </button>
	                                        <strong>Warning!</strong> {{$errors->first('maintain_type')}}
	                                    </div>
	                                    @endif
	                                </div>
								</div>
								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-6">
										<label class="control-label">Email</label>
										<input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="abc123@example.com">
										@if ($errors->has('email'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('email')}}
										</div>
										@endif
									</div>

									<div class="col-md-6">
										<label class="control-label">phone</label>
										<input type="text" name="phone" value="{{ old('phone') }}" placeholder="Mobile No" class="form-control">

										@if ($errors->has('phone'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('phone')}}
										</div>
										@endif


									</div>

								</div> 

								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-6">
										<label class="control-label">Password</label>
										<input type="password" placeholder="******" class="form-control" name="password">
										@if ($errors->has('password'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('password')}}
										</div>
										@endif
									</div>

									<div class="col-md-6">
										<label class="control-label">Confirm Password</label>
										<input name="password_confirmation" type="password" placeholder="******" class="form-control">
									</div>
								</div> 
								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-12 col-sm-12">
										<label class="control-label">Roles</label>
										<select id='pre-selected-options' multiple='multiple' name="roles[]">
											@foreach($roles as $role)
											<option value="{{$role->id}}">{{$role->name}}</option>
											@endforeach
										</select>

									</div>
								</div>
								<div class="row" style="margin: 10px 0px;">
									<div class="col-md-12 col-sm-12">
										<label class="control-label">Permission</label>
										<select id='permission-selected-options' multiple='multiple' name="permissions[]">
											@foreach($permissions as $permission)
											<option value="{{$permission->id}}">{{$permission->name}}</option>
											@endforeach
										</select>

									</div>
								</div>
							</div> 

							<div class="row">
								<div class="col-md-8"></div>  <div class="col-md-3">
									<ul class="list-inline pull-right">
										<li><button type="submit" class="btn btn-primary " name="submit">Save</button></li>

									</ul>  
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

				// $('.branch_id').select2();


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
				function changeBranch(obj){
					console.log('course_id',$(obj).val());

					$('.branch_id').html(` <option selected="selected" value='0'> Select School  </option>`);
					$.ajax({
						method:"POST",
						url:"{{route('schoolHasBranch')}}",
						data : {id:$(obj).val()},
						dataType:"json",
						success:function(response){
							console.log('kids',response);
							if(response.status){
								response.data.forEach(function(val,ind){
									var id = val.id;
									var name = val.branch_name;
									var option = `<option value="${id}">${name}</option>`;
									$('.branch_id').append(option);
								});
							}

						}
					});
				}

				$('#pre-selected-options').multiSelect();
				$('#permission-selected-options').multiSelect();
			</script>
			@endpush