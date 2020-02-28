@extends('_layouts.admin.default')
@section('title', 'Admission Package')
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
	.table .thead-light th {
		color: #495057;
		background-color: #014671;

		color: aliceblue;

		border-color: #ffffff;
	}	
</style>
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Admission Package</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('admission-package.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">

										<label for="package_name">Package Name</label>
										<input class="form-control-1 package_name" name="package_name" type="text"  id="package_name" required style>


										@if ($errors->has('package_name'))
										<label id="package_name-error" class="error" for="package_name" style="color: red"> 
											{{$errors->first('package_name')}}
										</label>
										@endif

									</div>
								</div>

								<div class="col-md-5">
									<div class="form-group">

										<label for="select_branch">Select Branch</label>
										<select class="form-control-1 branch_id" name="branch_id"   id="select_branch" required style="height: 40px; width: 100%;">
											<option selected="selected" value="0">All Branches</option>
											@if(!empty($branches))
											@foreach($branches as $branch)
											<option value={{$branch['id']}} @if($branch_id==$branch['id']) selected @endif>{{$branch['branch_name']}}</option>
											@endforeach
											@endif
										</select>


										@if ($errors->has('branch_id'))
										<label id="branch_id-error" class="error" for="branch_id" style="color: red"> 
											{{$errors->first('branch_id')}}
										</label>
										@endif

									</div>
								</div>


							</div>

							<div class="col-md-12">

								<table class="table table-bordered">
									<thead class="thead-light">
										<tr>
											<th>Class</th>
											<th>Registration</th>
											<th>Admission</th>
											<th>Security</th>
											<th>Annual Fee</th>
											<th>Scholarship Fee</th>
											<th>Net Annual Fee</th>
										</tr>
									</thead>
									<tbody id="qualificationRows">
										@foreach($packages as $pack)
										<tr>
											<td>
												<select class="form-control" name="class_ids[]">
													<option disabled="disabled" selected="selected">Choose the Class</option>
													@foreach($courses as $cours)
													<option value="{{$cours->id}}" @if($pack->course_id==$cours->id) selected @endif>{{$cours->course_name}}</option>
													@endforeach
												</select>
												@if ($errors->has('class_ids'))
												<label id="class_ids-error" class="error" for="class_ids" style="color: red">
													{{$errors->first('class_ids')}}
												</label>
												@endif
											</td>
											<td> <input class="form-control " name="registerations[]" id="" type="number" min="0" value="0" placeholder=""></td>
											<td><input class="form-control " name="admissions[]" id="" type="number" min="0" value="0" placeholder=""></td>
											<td><input class="form-control" name="security[]" id="" type="number" min="0" value="0" placeholder="">
											</td>
											<td><input class="form-control" name="annualFee[]" id="" type="number" min="0" value="0" placeholder=""></td>
											<td> <input class="form-control" name="schFee[]" id="" type="number" min="0" value="0" placeholder=""></td>
											<td> <input class="form-control" name="netAnnualFee[]" id="" type="number" min="0" value="0" placeholder=""></td>

										</tr>
										@endforeach

									</tbody>
								</table>
								<div class="btn btn-success pull-right addQualification">+</div>

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

			$(document).ready(function(){
				$(document).ready(function(){
					$(document).on('click', '.addQualification', function(e) {
						var htmlContent=`<tr>
						<td>
						<select class="form-control" name="class_ids[]">
						<option disabled="disabled" selected="selected">Choose the Class</option>
						@foreach($courses as $cours)
						<option value="{{$cours->id}}" >{{$cours->course_name}}</option>
						@endforeach
						</select>
						</td>
						<td> <input class="form-control " name="registerations[]" id="" type="number" min="0" value="0" placeholder=""></td>
						<td><input class="form-control " name="admissions[]" id="" type="number" min="0" value="0" placeholder=""></td>
						<td><input class="form-control" name="security[]" id="" type="number" min="0" value="0" placeholder="">
						</td>
						<td><input class="form-control" name="annualFee[]" id="" type="number" min="0" value="0" placeholder=""></td>
						<td> <input class="form-control" name="schFee[]" id="" type="number" min="0" value="0" placeholder=""></td>
						<td> <input class="form-control" name="netAnnualFee[]" id="" type="number" min="0" value="0" placeholder=""></td>
						<td><div class="btn btn-danger pull-right deleteQualification">-</div></td>

						</tr>`;

						$('#qualificationRows').append(htmlContent);
					});
				});
				$(document).on('click', '.deleteQualification', function(e) {
					var rowCount = $('#qualificationRows tr').length;
					console.log('row count',rowCount);
					if(rowCount==1){
						return false;
					}
					console.log('remove tr');
					$(this).parent().parent('tr').remove();
				});
				$('input[name=martial_status]').on('change', function() {
					InputShow();
				});
				$('input[name=gender]').on('change', function() {
					InputShow();
				});
			});

		</script>

		@endpush