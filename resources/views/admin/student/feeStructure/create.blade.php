@extends('_layouts.admin.default')
@section('title', 'Student Fee Structure')
@section('content')
<style>
	table{
		border-spacing: 0px!important;
		border-collapse: unset;!important;
	}	
	
	@page {
		size: A4;
		margin: 4mm!important;
	}

	@media print {
		.page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always;
		}
		table{
			border-spacing: 0px!important;
			border-collapse: collapse!important;
		}
	}		
</style>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Student Fee Structure</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('fee-structure.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">

										<label for="branch_id">Select Branch</label>
										<select class="form-control-1 branch_id" name="branch_id" onchange="getClass(this)"   id="branch_id"  style="height: 40px; width: 100%;">
											<option selected="selected" value="">All Branches</option>
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
										<label for="select2">Select Class</label>
										<select type="text" class="form-control class_id" id="class_id"  name="class_id"  placeholder="Name">
											<option selected="selected" disabled="disabled">Seclect Class</option>
											@if(!empty($classes))
											@foreach($classes as $class)
											<option value={{$class['id']}}>{{$class['course_name']}}</option>
											@endforeach
											@endif

										</select>

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="select2">Type</label>
										<select type="text" class="form-control type" id="type"   name="type"  placeholder="Name">
											<option value="0">All </option>
											<option value="1">Not Equal </option>
											

										</select>

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

			<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

			<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


			<script>
				$('.branch_id').select2();
				var today = new Date();
				$('#example12').calendar({
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
								var option = `<option value="${id}">${name}</option>`;
								$("[name='class_id']").append(option);
							});
							$('.class_id').select2();
						}
					});

				}

				function getStudent(){
					console.log('getStudent',$("[name='branch_id']").val(),$("[name='class_id']").val());

					$("[name='student_id']").html(` <option selected="selected" value='0'> All Students  </option>`);

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

			</script>

			@endpush