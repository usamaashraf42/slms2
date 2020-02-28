@extends('_layouts.admin.default')
@section('title', 'Term')
@section('content')
@php($banks=\App\Models\Bank::get())
@php($oman=\App\Models\Country::get())
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title"> New Term</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('exam-category.update',$category->id) }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							@method('PUT')
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="term"> Terms Name</label>
										<input class="term" name="term" value="{{$category->term}}"  id="term"  style="width: 100%;height: 40px;">

										@if ($errors->has('term'))
										<label id="term-error" class="error" for="term" style="color: red">{{$errors->first('term')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="parent_id">Main Terms Name</label>
										<select class="parent_id" name="parent_id"  id="parent_id"  style="width: 100%;height: 40px;">
											<option selected="selected" disabled="disable">All Term</option>
											@if(!empty($categories))
											@foreach($categories as $branch)

											<option value={{$branch['id']}} @if($category->parent_id==$branch['id']) selected  @endif>{{$branch['term']}}</option>
											@endforeach
											@endif
										</select>
										@if ($errors->has('branch_name'))
										<label id="branch_name-error" class="error" for="branch_name" style="color: red">{{$errors->first('branch_name')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="from_date"> From Month</label>
										<select class="from_date" name="from_date"  id="from_date"  style="width: 100%;height: 40px;">
											<option value="" selected="selected">Choose The Month</option>
											<option  value='1' >Janaury</option>
											<option value='2' >February</option>
											<option value='3' >March</option>
											<option value='4' >April</option>
											<option value='5' >May</option>
											<option value='6' >June</option>
											<option value='7' >July</option>
											<option value='8' >August</option>
											<option value='9' >September</option>
											<option value='10' >October</option>
											<option value='11' >November</option>
											<option value='12' >December</option>
										</select>

										@if ($errors->has('from_date'))
										<label id="from_date-error" class="error" for="from_date" style="color: red">{{$errors->first('from_date')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="to_date"> To Month</label>
										<select class="to_date" name="to_date"  id="to_date"  style="width: 100%;height: 40px;">
											<option value="" selected="selected">Choose The Month</option>
											<option  value='1' >Janaury</option>
											<option value='2' >February</option>
											<option value='3' >March</option>
											<option value='4' >April</option>
											<option value='5' >May</option>
											<option value='6' >June</option>
											<option value='7' >July</option>
											<option value='8' >August</option>
											<option value='9' >September</option>
											<option value='10' >October</option>
											<option value='11' >November</option>
											<option value='12' >December</option>
										</select>
										@if ($errors->has('to_date'))
										<label id="to_date-error" class="error" for="to_date" style="color: red">{{$errors->first('to_date')}}</label>
										@endif
									</div>
								</div>
								
							</div>


							<div class="row">
								
								<div class="col-md-12">
									<label class="control-label">Description</label>
									<textarea name="description" type="text" value="" class="form-control" placeholder="Description"></textarea>
									@if ($errors->has('description'))
									<label id="description-error" class="error" for="description" style="color: red">{{$category->description}}</label>
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
			$("[name='sub_id']").html(` <option selected="selected" disable="disable"> Choose Sub Category  </option>`);
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
			
			$("[name='user_id']").html(` <option selected="selected" disable="disable"> Choose the User  </option>`);
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