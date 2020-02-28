@extends('_layouts.admin.default')
@section('title', 'Employee Card')
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
					<h4 class="card-title">Employee Card</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('employee-card.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">

										<label for="branch_id">Select Branch</label>
										<select class="form-control-1 branch_id" name="branch_id" onchange="getClass(this)"  id="branch_id" required style="height: 40px; width: 100%;">
											<option selected="selected" value="0">All Branches</option>
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
										<label for="employee_id">Select Employee</label>
										<select type="text" class="form-control employee_id" id="employee_id"  name="employee_id"  placeholder="Name">
											<option selected="selected" disabled="disabled">Seclect Employee</option>
											@if(!empty($users))
											@foreach($users as $user)
											<option value={{$user['emp_id']}}>{{$user['name']}}</option>
											@endforeach
											@endif

										</select>

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="emp_id">Employee Id</label>
										<select type="text" class="category" value="{{old('emp_id')}}" name="emp_id" id="account" placeholder="cat_id" style="width: 100%;min-height: 40px;">
											<option disabled="disabled" selected>Seclect Employee</option>
										</select>


									</div>                       
								</div>
							</div>

							<div class="row">

								<div class="col-md-4">
									<div class="form-group">
										<label for="from_date">From Date</label>
										<input type="text" readonly class="from_date" autocomplete="off"  value="{{old('from_date')}}" name="from_date" id="from_date" placeholder="from_date" style="width: 100%;min-height: 40px;">

										@if ($errors->has('from_date'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('from_date')}}
										</div>
										@endif

									</div>                       
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="valid_date">Valid Till</label>
										<input type="text" class="valid_date" value="{{old('valid_date')}}" autocomplete="off" name="valid_date" id="valid_date" placeholder="valid_date" style="width: 100%;min-height: 40px;">

										@if ($errors->has('valid_date'))
										<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											<strong>Warning!</strong> {{$errors->first('valid_date')}}
										</div>
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



		@endpush
		@push('post-scripts')

		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

		<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

		<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 

		<script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

		<script type="text/javascript">



			$(".from_date").AnyPicker({
				mode: "datetime",
				dateTimeFormat: " dd-MMM-yyyy",
			});
			$(".valid_date").AnyPicker({
				mode: "datetime",
				dateTimeFormat: " dd-MMM-yyyy",
			});

		</script>
		<script>
			

			function getClass(obj){
				$("[name='employee_id']").html(` <option selected="selected" value='0'> All Employee  </option>`);
				var branch_id  = $(".branch_id").val();
				console.log('branch',$("[name='branch_id']").val());
				$('.branch').val(branch_id);
				$.ajax({
					method:"POST",
					url:"{{route('branchHasEmployee')}}",
					data : {branch_id:branch_id},
					dataType:"json",
					success:function(res){
						console.log('data',res);
						if(res.status){
							res.data.forEach(function(val,ind){
								var id = val.emp_id;
								var name = val.name;
								var option = `<option value="${id}">${name} (${id})</option>`;
								$("[name='employee_id']").append(option);
							});
						}
						
					}
				});

			}



			$('#account').select2({
				ajax: {
					url: "{{route('get_employee')}}",
					method:"post",
					dataType: 'json',
					processResults: function (_data, params) {
						console.log('_data',_data);
						var data1= $.map(_data, function (obj) {
							var newobj = {};
							newobj.id = obj.emp_id;
							newobj.text= `${obj.name} - (${obj.emp_id}) `;
							return newobj;
						});
						return { results:data1};
					}
				}
			});

		</script>

		@endpush