@extends('_layouts.admin.default')
@section('title', 'Student Left')
@section('content')
<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="card-block">
					<h4 class="card-title">Student Left</h4>
					
					@component('_components.alerts-default')
					@endcomponent
					<form method="POST" action="{{ route('left-student.store') }}" enctype = "multipart/form-data" id="upload_new_form">
						<div class="col-md-12">
							{{csrf_field()}}

							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Ly-No</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email" name='ly_no' type="text" class="form-control ly_no" placeholder="ly_no">
								</div>
								<div class="alert alert-danger ly_no-error" style="display:none">
									<p style="color: red">Ly No is required</p>
								</div>

								<div class="col-sm-4">
									<label for="input-group-icon-email" class="col-sm-2 form-control-label"></label>
									<a class="btn btn-primary" href="javascript:;" style="" onclick="approveRequest(this)">Search</a>
								</div>


							</div>
							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label ">Student Name</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email stdName" name="stdName" type="text" class="form-control stdName" placeholder="" readonly>
								</div>
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Father Name</label>
								<div class="col-sm-4">
									<input id="input-group-icon " value="" type="text" class="form-control stdFather" placeholder="" readonly>


								</div>
							</div>
							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Class</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email " value=""  type="text"  class="form-control stdClass" placeholder="" readonly> 
								</div>
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Section</label>
								<div class="col-sm-4">
									<input id="input-group-icon " type="text" name="fee" class="form-control stdSection" placeholder="" readonly>

								</div>
							</div>
							<div class="form-group row">
								<label for="input-group-icon-email" class="col-sm-2 form-control-label">Total Payable</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email " name="totalPayable" type="text" class="form-control stdBalance" placeholder="" readonly>
								</div>
								<!-- <label for="input-group-icon-email" class="col-sm-2 form-control-label">Correction Amount</label>
								<div class="col-sm-4">
									<input id="input-group-icon-email" name="correctionAmount" value="0" type="text" class="form-control correctionAmount" placeholder="">

								</div>
 -->
								
							</div>
							


							


							<div class="form-group row correctionDescription" >
								<label for="description" class="col-sm-2 form-control-label">Remarks</label>
								<div class="col-sm-4">
									<textarea id="description" value="" name="description" type="text" class="form-control description" rows="3" placeholder="" required></textarea>
								</div>

							</div>



							<div class="form-group row">

								<div class="card" style="width:100%">
									<div class="card-block">
										<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
											<button class="btn btn-primary ks-rounded" onclick="submitForm(this);"> Submit </button>
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
<script>
    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
    }
</script>

		<script type="text/javascript">
	function show(obj){
		console.log('value',$(obj).val());
		var radioValue = $("input[name='reason']:checked").attr('data-content');
		console.log(radioValue);
		if(radioValue=='Add Some Reason'){
			$('.correctionDescription').show();
		}else{
			$('.correctionDescription').css({"display": "none"});
		}
	}
	$('.correctionAmount').on('keyup',function(e){
		console.log('this');
		var val1=parseFloat($('.correctionAmount').val());
		var val2=parseFloat($('.totalPayable').val());
		$('.afterCorrection').val(val2-val1);

	});
	function approveRequest(obj){
		console.log('obj',obj);
		var ly_no=$('.ly_no').val();
		
		if(ly_no!=null  ){
			console.log('ly_no',ly_no);
         $.ajax({
            url: "{{route('studentById')}}", 
            method:"POST",
            data:{'id':ly_no},
            success: function(response){
            	console.log('ajax call',response.data);
              if(response.status){
              	console.log('re',response.data.s_fatherName);
                $('.stdName').val(response.data.s_name);
				$('.stdFather').val(response.data.s_fatherName);
				$('.stdClass').val(response.data.course?response.data.course.course_name:'');
				$('.stdSection').val(response.data.Section?response.data.Section.course_name:'');
				$('.stdBalance').val(response.data.balance?response.data.balance.balance:'');

              }
              else{
                alert('Record Not Found');
              }
            }});
     }else{
     		
     	}
		
      }
</script>

<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>

<script>

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

</script>

		@endpush