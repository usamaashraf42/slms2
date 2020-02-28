@extends('_layouts.admin.default')
@section('title', 'Bank')
@section('content')

<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title"> Update Bank</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('bank.update',$bank->id) }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<input type="hidden" name="_method" value="PUT">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Bank Name</label>
										<input type="text" class="form-control bank_name" value="@isset($bank->bank_name){{$bank->bank_name}}@endisset" name="bank_name" id="bank_name" placeholder="Account Category Name">
										@if ($errors->has('bank_name'))
										<label id="bank_name-error" class="error" for="bank_name" style="color: red">{{$errors->first('bank_name')}}</label>
										@endif
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Account No</label>
										<input name="account_no" type="text" value="@isset($bank->account_no){{$bank->account_no}}@endisset" class="form-control" placeholder="School Name">
										@if ($errors->has('account_no'))
										<label id="account_no-error" class="error" for="account_no" style="color: red">{{$errors->first('account_no')}}</label>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Contact No</label>
										<input name="cont_no" type="text" value="@isset($bank->cont_no){{$bank->cont_no}}@endisset" class="form-control" placeholder="School Name">
										@if ($errors->has('cont_no'))
										<label id="cont_no-error" class="error" for="cont_no" style="color: red">{{$errors->first('cont_no')}}</label>
										@endif
									</div>
								</div>
							</div>


							

						
						</div>

						
				
						




						<div class="form-group @if($errors->has('address')) has-error @endif">
							<label for="address">Address</label>
							<textarea class="form-control" id="address" name="address" rows="4">@isset($bank->address){{$bank->address}}@endisset</textarea>
							@if ($errors->has('address'))
							<label id="address-error" class="error" for="address">{{$errors->first('address')}}</label>
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