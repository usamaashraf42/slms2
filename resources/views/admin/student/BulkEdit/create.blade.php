@extends('_layouts.admin.default')
@section('title', 'Student Edit')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Student Edit</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('student-edit.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}

							<div class="col-md-10">
								<div class="row"> 
									<div class="col-md-4">
										<div class="form-group">

											<label for="from_branch_id">Select Branch</label>
											<select class="from_branch_id" name="from_branch_id" onchange="getClass(this)"  id="from_branch_id" required style="width: 100%;height: 35px;">
												<option selected="selected" disabled="disabled">Choose Branch</option>
												@if(!empty($branches))
												@foreach($branches as $branch)
												<option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
												@endforeach
												@endif
											</select>

										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label for="from_class_id">Select Class</label>
											<select type="text" class="from_class_id" id="from_class_id" onchange="getStudent()"  name="from_class_id"  placeholder="Name"style="width: 100%;height: 35px;">
												<option selected="selected" disabled="disabled">Seclect Class</option>

											</select>

										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											

											<label for="std_id">Ly No</label>
											<select type="text" class="category" value="{{old('from')}}" name="std_id" id="account" placeholder="cat_id" style="width: 100%;min-height: 40px;">
												<option disabled="disabled" selected>Choose the Student</option>
											</select>

											

											

										</div>
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



		@endpush
		@push('post-scripts')

		<!-- <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

		<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->


		<script>
			// $('.branch_id').select2();
			// $('.transfer_to_branch').select2();
			// var today = new Date();
			// $('#example12').calendar({
			// 	monthFirst: false,
			// 	type: 'date',
			// 	minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
			// });
			// $('#example1').calendar({
			// 	monthFirst: false,
			// 	type: 'date',
			// 	minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
			// });
			function getCourse(obj){
				$("[name='to_class_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);
				var branch_id  = $(".to_branch_id").val();
				console.log('branch',$("[name='to_branch_id']").val());
				$('.to_branch_id').val(branch_id);
				$.ajax({
					method:"POST",
					url:"{{route('branchHasClass')}}",
					data : {id:branch_id},
					dataType:"json",
					success:function(data){
						data.forEach(function(val,ind){
							var id = val.course.id;
							var name = val.course.course_name;
							var option = `<option value="${id}">${name}</option>`;
							$("[name='to_class_id']").append(option);
						});
						$('.to_class_id').select2();
					}
				});
			}

			function getToCourse(obj){
				$("[name='transfer_to_class']").html(` <option selected="selected" value='0'> All Classes  </option>`);
				var branch_id  = $(".transfer_to_branch").val();
				console.log('branch',$("[name='transfer_to_branch']").val());
				$('.transfer_to_branch').val(branch_id);
				$.ajax({
					method:"POST",
					url:"{{route('branchHasClass')}}",
					data : {id:branch_id},
					dataType:"json",
					success:function(data){
						data.forEach(function(val,ind){
							var id = val.course.id;
							var name = val.course.course_name;
							var option = `<option value="${id}">${name}</option>`;
							$("[name='transfer_to_class']").append(option);
						});
						$('.transfer_to_class').select2();
					}
				});
			}

			function getClass(obj){
				$("[name='from_class_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);
				var branch_id  = $(".from_branch_id").val();
				console.log('branch',$("[name='from_branch_id']").val());
				$('.from_branch_id').val(branch_id);
				$.ajax({
					method:"POST",
					url:"{{route('branchHasClass')}}",
					data : {id:branch_id},
					dataType:"json",
					success:function(data){
						data.forEach(function(val,ind){
							var id = val.course.id;
							var name = val.course.course_name;
							var option = `<option value="${id}">${name}</option>`;
							$("[name='from_class_id']").append(option);
						});
						$('.from_class_id').select2();
					}
				});

			}
			$('#account').select2({
				ajax: {
					url: "{{route('get_student_search')}}",
					method:"post",
					dataType: 'json',
					processResults: function (_data, params) {

						var data1= $.map(_data, function (obj) {
							var newobj = {};
							newobj.id = obj.id;
							newobj.text= `${obj.s_name} - (${obj.id}) `;
							return newobj;
						});
						return { results:data1};
					}
				}
			});


			function getStudent(){
				console.log('getStudent',$("[name='branch_id']").val(),$("[name='class_id']").val());

				$("[name='student_id']").html(` <option selected="selected" disabled='disabled'>Selected Student  </option>`);

				var branch_id=$("[name='from_branch_id']").val();
				var course_id=$("[name='from_class_id']").val();
				
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