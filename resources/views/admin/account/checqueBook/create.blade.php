@extends('_layouts.admin.default')
@section('title', 'Checque Book Add')
@section('content')
<div class="content container-fluid">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<h4 class="card-title">Checque Book Add</h4>
			<div class="card-box">
				
				<div class="card-block">
					
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('bank-checque.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<div class=" form-group row">
								<label for="cheque_book" class="col-sm-2 form-control-label">Bank Name </label>
								<div class="col-sm-4">
									<select type="text" class="form-control cheque_book" value="{{old('cheque_book')}}" onchange="getBankAccount(this)"  name="cheque_book"  placeholder="checque book"> 
										<option>Choose the Bank</option>
										@foreach($banks as $bank)
										<option value="{{$bank->id}}">{{$bank->bank_name}}</option>
										@endforeach
									</select>
								</div>

								<label for="account_id" class="col-sm-2 form-control-label">Account </label>
								<div class="col-sm-4">
									<select type="text" class="account_id" value="{{old('account_id')}}" name="account_id" id="account_id" placeholder="account_id" style="width: 100%;height: 40px;">
									</select>
								</div>
								
							</div>

							
							<div class=" form-group row">
								<label for="cheque_start" class="col-sm-2 form-control-label">Checque Start </label>
								<div class="col-sm-4">
									<input type="text" class="form-control cheque_start" id="cheque_start" value="{{old('cheque_start')}}"   name="cheque_start"  placeholder="0000000000">
								</div>
								<label for="cheque_end" class="col-sm-2 form-control-label">Checque End </label>
								<div class="col-sm-4">
									<input type="text" class="form-control cheque_end" value="{{old('cheque_end')}}"  name="cheque_end"  placeholder="9999999999"> 
								</div>
							</div>
							<div class=" form-group row">
								<label for="cheque_book_issue_date" class="col-sm-2 form-control-label">Checque Book Issue Date </label>
								<div class="col-sm-4">
									<input type="text" class="form-control cheque_book_issue_date" id="cheque_book_issue_date" value="{{old('cheque_book_issue_date')}}"  name="cheque_book_issue_date"  placeholder="Checque Book Issue Date" readonly>
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


		<script>
			$('.branch_id').select2();
			var today = new Date();

			function getBankAccount(obj){
				$("[name='account_id']").html(` <option selected="selected" disabled='disabled'> Select Account </option>`);
				var branch_id  = $(".cheque_book").val();

				$('.cheque_book').val(branch_id);


				$.ajax({
					method:"POST",
					url:"{{route('bankHasAccount')}}",
					data : {bank_id:branch_id},
					dataType:"json",
					success:function(response){
						console.log('data',response);
						if(response.status){
							response.data.forEach(function(val,ind){
								var id = val.id;
								var name = val.name+' (' +val.type+')';
								var option = `<option value="${id}">${name} </option>`;
								$("[name='account_id']").append(option);
							});
						}
						
						// $('.account_id').select2();
					}
				});

			}

			


		</script>
		<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

		<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 
		<script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

		<script type="text/javascript">



			$(".cheque_book_issue_date").AnyPicker({
				mode: "datetime",
				dateTimeFormat: " dd-MMM-yyyy",
			});


		</script>


		@endpush