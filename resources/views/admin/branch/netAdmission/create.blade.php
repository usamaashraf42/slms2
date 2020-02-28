@extends('_layouts.admin.default')
@section('title', 'Admission Status')
@section('content')
<div class="content container-fluid">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<h4 class="card-title">Admission Status</h4>
			<div class="card-box">
				
				<div class="card-block">
					
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('net-admission-status.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">

										<label for="exampleInputPassword1">Select Branch</label>
										<select class="branch_id" name="branch_id" onchange="getClass(this)"  id="select_branch" required style="width: 100%;height: 40px;">
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

										<label for="exampleInputPassword1">From Date</label>
										<input type="text" class="form-control from_date" value="{{date('d-M-Y')}}" name="from_date" id="from_date" autocomplete="off"  placeholder="from_date" readonly>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">

										<label for="exampleInputPassword1">Till Date</label>
										<input type="text" class="form-control till_date" value="{{date('d-M-Y')}}" name="till_date" id="till_date" autocomplete="off"  placeholder="from_date" readonly>

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

		 <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 

    <!-- <script type="text/javascript" src="{{asset('js/datepickerScroll/vendors/jquery-1.11.1.min.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

    <script type="text/javascript">
     

     var dToday = new Date();

     $(".from_date").AnyPicker({
       mode: "datetime",
       dateTimeFormat: " dd-MMM-yyyy",
     });
     $(".till_date").AnyPicker({
       mode: "datetime",
       dateTimeFormat: " dd-MMM-yyyy",
     });
 </script>

		@endpush