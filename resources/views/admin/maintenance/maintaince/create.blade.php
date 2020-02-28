@extends('_layouts.admin.default')
@section('title', 'Maintenance')
@section('content')
@php($banks=\App\Models\Bank::get())
@php($oman=\App\Models\Country::get())
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title"> New Maintenance</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('maintenance.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="branch_id">Branch Name</label>
										<select class="branch_id" name="branch_id"  id="branch_id"  style="width: 100%;height: 40px;">
											<option selected="selected" value="0">All Branches</option>
											@if(!empty($branches))
											@foreach($branches as $branch)
											<option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
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
										<label for="cat_id">Maintaince Category</label>
										<select class="cat_id" name="cat_id"  id="cat_id" onchange="maintainCategory(this)"  style="width: 100%;height: 40px;">
											<option selected="selected" disabled="disable" value="0">Choose the Category</option>
										@if(!empty($categories))
											@foreach($categories as $cat)
											<option value={{$cat['id']}}>{{$cat['main_name']}}</option>
											@endforeach
											@endif
										</select>
										@if ($errors->has('cat_id'))
										<label id="cat_id-error" class="error" for="cat_id" style="color: red">{{$errors->first('cat_id')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Sub Category</label>
										<select name="sub_id" type="text" id="sub_id" onchange="maintainceUser(this)" value="{{old('sub_id')}}" class="form-control sub_id" placeholder="School Name">
										</select>
										@if ($errors->has('sub_id'))
										<label id="sub_id-error" class="error" for="sub_id" style="color: red">{{$errors->first('sub_id')}}</label>
										@endif
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Select User</label>
										<select name="user_id" type="text" id="user_id" value="{{old('user_id')}}" class="form-control user_id" placeholder="School Name">
										</select>
										@if ($errors->has('user_id'))
										<label id="user_id-error" class="error" for="user_id" style="color: red">{{$errors->first('user_id')}}</label>
										@endif
									</div>
								</div>
							</div>


							<div class="row">
								
								<div class="col-md-12">
									<label class="control-label">Description</label>
									<textarea name="description" type="text" value="" class="form-control" placeholder="Description"></textarea>
									@if ($errors->has('description'))
									<label id="description-error" class="error" for="description" style="color: red">{{$errors->first('description')}}</label>
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
	@endsection

	@push('post-styles')
	<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />

	<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />


	@endpush
	@push('post-scripts')

	<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

	<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
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
		$("#banks-selected-options").multiSelect();
		$("#courses-selected-options").multiSelect();
	</script>
	<script>
		var today = new Date();
		$('#posting_date').calendar({
			monthFirst: false,
			type: 'date',
			minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
		});
		$('#example1').calendar({
			monthFirst: false,
			type: 'date',
			minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
		});

		function maintainCategory(obj){
			$("[name='sub_id']").html(` <option selected="selected" disable="disable" value="0"> Choose Sub Category  </option>`);
			var cat_id  = $(".cat_id").val();
			console.log('branch',$("[name='cat_id']").val());
			$('.branch').val(cat_id);
			$.ajax({
				method:"POST",
				url:"{{route('maintainSubCategory')}}",
				data : {id:cat_id},
				dataType:"json",
				success:function(res){
					console.log('categeroy',res);
					if(res.status){
						res.data.forEach(function(val,ind){
							var id = val.id;
							var name = val.main_name;
							var option = `<option value="${id}">${name} </option>`;
							$("[name='sub_id']").append(option);
						});
					}
					
				}
			});

		}

		function maintainceUser(edj){
			
			$("[name='user_id']").html(` <option selected="selected" disable="disable" value="0"> Choose the User  </option>`);
			var cat_id  = $(".cat_id").val();
			console.log('branch',$("[name='cat_id']").val());
			$('.branch').val(cat_id);
			$.ajax({
				method:"POST",
				url:"{{route('maintainceUser')}}",
				data : {id:cat_id},
				dataType:"json",
				success:function(res){
					console.log(res,'users');
					if(res.status){
						res.data.forEach(function(val,ind){
							var id = val.user.id;
							var name = val.user.name;
							var option = `<option value="${id}">${name} </option>`;
							$("[name='user_id']").append(option);
						});
					}
					
				}
			});
		}

		$('#account').select2({
			ajax: {
				url: "{{route('get_account')}}",
				method:"post",
				dataType: 'json',
				processResults: function (_data, params) {

					var data1= $.map(_data, function (obj) {
						var newobj = {};
						newobj.id = obj.id;
						newobj.text= `${obj.name} - (${obj.type}) `;
						return newobj;
					});
					return { results:data1};
				}
			}
		});

		function getStudent(){
			console.log('getStudent',$("[name='branch_id']").val(),$("[name='class_id']").val());

			$("[name='student_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);

			var branch_id=$("[name='branch_id']").val();
			var course_id=$("[name='class_id']").val();
			if(course_id!='' && branch_id!=''){
				$.ajax({
					method:"POST",
					url:"{{route('classHasStudent')}}",
					data : {branch_id:branch_id,course_id:course_id},
					dataType:"json",
					success:function(data){
						data.forEach(function(val,ind){
							var id = val.id;
							var name = val.s_name+' '+val.s_fatherName;
							var option = `<option value="${id}">${name}</option>`;
							$("[name='student_id']").append(option);
						});

						$('.student_id').select2();
					}
				});
			}

		}

	</script>

	@endpush