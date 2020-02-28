@extends('_layouts.admin.default')
@section('title', 'Account Category')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title"> New Account Category</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('account-category.update',$category->id) }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<input name="_method" type="hidden" value="PUT">

							<div class="col-md-10">
								<div class="form-group">
									<label for="exampleInputPassword1">Account Category Name</label>
									    <input type="text" class="form-control category" value="@isset($category->name){{$category->name}} @endisset" name="name" id="name" placeholder="Account Category Name">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group @if($errors->has('parent_id')) has-error @endif"">
										<label for="parent_id">Parent Account Category</label>
										<select  class="form-control " value="{{old('parent_id')}}" name="parent_id" id="parent_id"  placeholder="">
											<option disabled="disabled" selected="selected">Choose the Category</option>
											@foreach($categories as $cat)
												<option value="{{$cat->id}}" @if($cat->id==$category->parent_id) selected @endif>{{$cat->name}}</option>
											@endforeach

										</select>
										@if ($errors->has('parent_id'))
										<label id="parent_id-error" class="error" for="parent_id">{{$errors->first('parent_id')}}</label>
										@endif
									</div>

								</div>
								<div class="col-md-4">
									<div class="form-group @if($errors->has('code')) has-error @endif ">
										<label for="cus_cat_name">Code</label>
										<div class="ui calendar" id="code" style="width: 100%">
											<div class="ui input" style="width: -webkit-fill-available!important;">
												<input type="number"  class="form-control" value="@isset($category->code){{$category->code}}@endisset" name="code" id="code" autocomplete="off"  placeholder="code">
											</div>
										</div>
										@if ($errors->has('code'))
										<label id="code-error" class="error" for="code">{{$errors->first('code')}}</label>
										@endif
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group @if($errors->has('class')) has-error @endif"">
										<label for="class">Class</label>
										<select  class="form-control " value="{{old('class')}}" name="class" id="class"  placeholder="">
											<option disabled="disabled" selected="selected">Choose the Class</option>
											
												<option value="asset" @if('asset'==$category->class) selected @endif>Asset</option>
												<option value="liability" @if('liability'==$category->class) selected @endif>Liability</option>
												<option value="expense" @if('expense'==$category->class) selected @endif>Expense</option>
												<option value="revenue" @if('revenue'==$category->class) selected @endif>Revenue</option>
										

										</select>
										@if ($errors->has('class'))
										<label id="class-error" class="error" for="class">{{$errors->first('class')}}</label>
										@endif
									</div>

								</div>
							</div>
						




							<div class="form-group @if($errors->has('description')) has-error @endif">
								<label for="description">Description</label>
								<textarea class="form-control" id="description" name="description" rows="4">@isset($category->description){{$category->description}} @endisset</textarea>
								@if ($errors->has('description'))
								<label id="description-error" class="error" for="description">{{$errors->first('description')}}</label>
								@endif
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



		@endpush
		@push('post-scripts')

		<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

		<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


		<script>
			$('.branch_id').select2();
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

			function getClass(obj){
				$("[name='class_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);
				var branch_id  = $(".branch_id").val();
				console.log('branch',$("[name='branch_id']").val());
				$('.branch').val(branch_id);
				$.ajax({
					method:"POST",
					url:"{{route('branchHasClass')}}",
					data : {id:branch_id},
					dataType:"json",
					success:function(data){
						data.forEach(function(val,ind){
							var id = val.course.id;
							var name = val.course.course_name;
							var option = `<option value="${id}">${name} </option>`;
							$("[name='class_id']").append(option);
						});
						$('.class_id').select2();
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