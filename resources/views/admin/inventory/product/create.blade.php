@extends('_layouts.admin.default')
@section('title', 'Product ')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Product Mangement</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('product.store') }}" enctype = "multipart/form-data" id="upload_new_form">
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
									<div class="col-md-4">
										<label class="control-label" style="width: 100%;">Category 
											<span style="color: red">*</span>
										</label>
										<select class="form-control cat_id" name="cat_id" onchange="changeCategory(this)"  id="cat_id" required>
											<option selected="selected" disabled="disabled">Select Category</option>
											@if(!empty($categories))
											@foreach($categories as $category)
											<option value="{{$category['id']}}" >{{$category['pro_cat_name']}}</option>
											@endforeach
											@endif
										</select>
										<p class="alert alert-danger cat_id_error" style="display: none"></p>
									</div>
									<div class="col-md-4">
										<label class="control-label" style="width: 100%;">Sub Category 
											<span style="color: red">*</span>
										</label>
										<select class="form-control sub_cat_id" name="sub_cat_id" id="sub_cat_id" required>
											
										</select>
										<p class="alert alert-danger branch_id_error" style="display: none"></p>
									</div>
									<div class="col-md-4">
										<label class="control-label">Product Name</label>
										<input name="pro_name" value="{{ old('pro_name') }}" type="text" placeholder="Product Name" class="form-control">
										@if ($errors->has('pro_name'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('pro_name')}}
										</div>
										@endif
									</div>
								</div>
								<div class="row" >
									<div class="col-md-4">
										<label class="control-label">Product Price</label>
										<input name="price" value="{{ old('price') }}" type="number" step="any" value="0" min="0" placeholder="price" class="form-control">
										@if ($errors->has('price'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('price')}}
										</div>
										@endif
									</div>
									<div class="col-md-4">
										<label class="control-label">Retail Price</label>
										<input name="retail_price" value="{{ old('retail_price') }}" type="number" step="any" value="0" min="0" placeholder="retail price" class="form-control">
										@if ($errors->has('retail_price'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('retail_price')}}
										</div>
										@endif
									</div>
									<div class="col-md-4">
										<label class="control-label">Trade Price</label>
										<input name="trade_price" value="{{ old('trade_price') }}" type="number" step="any" value="0" min="0" placeholder="trade price" class="form-control">
										@if ($errors->has('trade_price'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('trade_price')}}
										</div>
										@endif
									</div>

									
								</div>
								<div class="row" >
									<div class="col-md-8">
										<label class="control-label">Description</label>
										<textarea name="description" value="{{ old('description') }}"  placeholder="description" class="form-control"></textarea>
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
								


								
							</div> 
							<div class="col-md-12">

								<div class="row">
									<div class="card" style="width:100%">
										<div class="card-block">
											<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
												<button class="btn btn-primary ks-rounded" type="submit"> Submit </button>
												<button class="btn btn-success ks-rounded" type="reset">Reset</button>
											</div>

										</div>
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
				function changeCategory(obj){
					console.log('cat_id',$(obj).val());

					$('.sub_cat_id').html(` <option selected="selected" disabled="disabled"> Select Sub Category  </option>`);
					$.ajax({
						method:"POST",
						url:"{{route('productCategoryHasSubCategory')}}",
						data : {id:$(obj).val()},
						dataType:"json",
						success:function(response){
							console.log('catHasSubCate',response);
							if(response.status){
								response.data.forEach(function(val,ind){
									var id = val.id;
									var name = val.pro_cat_name;
									var option = `<option value="${id}">${name}</option>`;
									$('.sub_cat_id').append(option);
								});
							}

						}
					});
				}

				
			</script>
			@endpush