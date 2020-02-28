@extends('_layouts.admin.default')
@section('title', 'Query Edit')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Query Edit</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('query.update',$query->id) }}" enctype = "multipart/form-data" id="upload_new_form">
						<input type="hidden" name="schoo_id" value="1" readonly="">
						<div class="col-md-12">
							{{csrf_field()}}
							@method('PUT')
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="branch_id">Branch Name</label>
										<select class="branch_id" name="branch_id"  id="branch_id"  style="width: 100%;height: 40px;">
											<option selected="selected" value="0">All Branches</option>
											@if(!empty($branches))
											@foreach($branches as $branch)
											<option value={{$branch['id']}} @if($query->branch_id==$branch['id']) selected @endif >{{$branch['branch_name']}}</option>
											@endforeach
											@endif
										</select>
										@if ($errors->has('branch_name'))
										<label id="branch_name-error" class="error" for="branch_name" style="color: red">{{$errors->first('branch_name')}}</label>
										@endif
									</div>
								</div>


								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Name</label>
										<input name="name" type="text" id="name" value="{{$query->name}}" class="form-control name" placeholder=" Name">

										@if ($errors->has('name'))
										<label id="name-error" class="error" for="name" style="color: red">{{$errors->first('name')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Father Name</label>
										<input name="father_name" type="text" id="father_name" value="{{$query->father_name}}" class="form-control name" placeholder="Father Name">

										@if ($errors->has('father_name'))
										<label id="father_name-error" class="error" for="father_name" style="color: red">{{$errors->first('father_name')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="course_id">Grade</label>
										<select class="course_id" name="course_id"  id="course_id"  style="width: 100%;height: 40px;">
											<option selected="selected" value="0">All Course</option>
											@if(!empty($courses))
											@foreach($courses as $course)
											<option value={{$course['id']}} @if($query->course_id==$course['id']) selected @endif>{{$course['course_name']}}</option>
											@endforeach
											@endif
										</select>
										@if ($errors->has('branch_name'))
										<label id="branch_name-error" class="error" for="branch_name" style="color: red">{{$errors->first('branch_name')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Phone No</label>
										<input name="phone_no" type="text" id="phone_no" value="{{$query->contact_no}}" class="form-control name" placeholder="Contact No">

										@if ($errors->has('phone_no'))
										<label id="phone_no-error" class="error" for="phone_no" style="color: red">{{$errors->first('phone_no')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Reference By</label>
										<select name="type" type="text" id="type" value="{{old('type')}}" class="form-control type" placeholder="School Name">
											<option value="By Cable Ad" @if($query->reference_by=='By Cable Ad')  selected @endif>By Cable Ad</option>
											<option value="Marketing" @if($query->reference_by=='Marketing') selected  @endif>Marketing</option>
											<option value="Social Media" @if($query->reference_by=='Social Media') selected  @endif>Social Media</option>
											<option value="Other" @if($query->reference_by=='Other')  selected @endif>Other</option>
										</select>
										@if ($errors->has('type'))
										<label id="type-error" class="error" for="type" style="color: red">{{$errors->first('type')}}</label>
										@endif
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Address</label>
									<textarea name="address" type="text" value="" class="form-control" placeholder="address">{{$query->address}}</textarea>
									@if ($errors->has('address'))
									<label id="address-error" class="error" for="address" style="color: red">{{$errors->first('address')}}</label>
									@endif
								</div>

								<div class="col-md-4">
									<label class="control-label">Remarks</label>
									<textarea name="remarks" type="text" value="" class="form-control" placeholder="Remarks">{{$query->remarks}}</textarea>
									@if ($errors->has('remarks'))
									<label id="remarks-error" class="error" for="remarks" style="color: red">{{$errors->first('remarks')}}</label>
									@endif
								</div>
							</div>


						</div>


						<div class="form-group row">

							<div class="card" style="width:100%">
								<div class="card-block">
									<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
										<button class="btn btn-primary ks-rounded"> Submit </button>
										<button class="btn btn-success ks-rounded">Cancel</button>
									</div>

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


