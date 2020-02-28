<div class="modal fade text-left" id="updateCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-info">
			<h3 class="modal-title" id="myModalLabel35"> Update section</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="" id="updateDataForm" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-body">
				<div class="modal-body">
					

					<fieldset class="form-group floating-label-form-group">
						<label for="course_name">section Name</label>
						<input type="text" class="form-control" id="course_name" value="{{$data->course_name}}" name="course_name" placeholder="Enter section Name">
					</fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="course_name">Section Name</label>
                        @isset($classes)
                            
                            <select class="form-control" id="parentId" name="parentId">
                                <option selected="selected" disabled="disabled">Choose Class</option>
                                @foreach($classes as $cours)
                                <option value="{{$cours->id}}" @if($data->parentId==$cours->id) {{'selected'}} @endif>{{$cours->course_name}}</option>
                                @endforeach
                            </select>
                            
                        @endisset
                    </fieldset>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="computer_fee">Computer Fee</label>
                                <input type="number" min="0" max="999999999" class="form-control" id="computer_fee" value="{{$data->computer_fee}}" name="computer_fee" placeholder="Enter Computer Fee">
                            </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="lab_fee">Lab Fee</label>
                                <input type="number" min="0" max="999999999" value="{{$data->lab_fee}}" class="form-control" id="lab_fee" name="lab_fee" placeholder="Enter Lab fee">
                            </fieldset>
                        </div>
                    </div>
                 
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="lib_fee">Library Fee</label>
                                <input type="number" min="0" max="999999999" value="{{$data->lib_fee}}" class="form-control" id="lib_fee" name="lib_fee" placeholder="Enter Library Fee">
                            </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="exam_fee">Exam Fee</label>
                                <input type="number" min="0" max="999999999" value="{{$data->exam_fee}}" class="form-control" id="exam_fee" name="exam_fee" placeholder="Enter Exam Fee">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="stationary">stationary Charge</label>
                                <input type="number" min="0" max="999999999" value="{{$data->stationary}}" class="form-control" id="stationary" name="stationary" placeholder="Enter stationary Charge">
                            </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <fieldset class="form-group floating-label-form-group">
                                <label for="ac_charge">Ac Charge</label>
                                <input type="number" min="0" max="999999999" value="{{$data->ac_charge}}" class="form-control" id="ac_charge" name="ac_charge" placeholder="Enter AC Charge">
                            </fieldset>
                        </div>
                    </div>
					<br>
				</div>


				<input type="hidden" name="id" value="{{$data->id}}">

			</div>
			<div class="modal-footer">
				<img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
				height="50"/>
				&nbsp;&nbsp;&nbsp;
				<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
				value="Dismiss">
				<input type="submit" class="btn btn-outline-info btn-lg"  id="updateDataBtn" value="Update Course">
			</div>
		</form>
	</div>
</div>
</div>

<script>


	$('.loader-img').hide();
	$("#updateDataBtn").click(function (e) {


        var form = $('#updateDataForm')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        console.log('formData', formData);
        console.log('form', form);
        $.ajax({
        	url: "{{route('course.updateCourse')}}",
        	type: "POST",
        	enctype: 'multipart/form-data',
            processData: false,  // Important!
            contentType: false,
            cache: false,
            data: formData,
            beforeSend: function () {
            	$('.loader-img').show();
            	$('#preloader').show();
            },
            complete: function () {
            	$('#preloader').fadeOut('slow', function () {
            		$(this).remove();
            	});
            	$('.loader-img').hide();
            },
            success: function (response) {
            	console.log('response', response);
            	if (response.status == '200') {

            		$('#updateCourse').modal('hide');

            		$("#updateDataForm")[0].reset();

            		swal(
            			'Success!',
            			'Shed Updated Successfully',
            			'success'
            			);
            		location.reload(true)
            	} else {
            		console.log('error blank', response.message);
            		swal(
            			'Warning!',
            			response.message,
            			'warning'
            			);
            		;
            	}
            }, error: function (e) {
            	console.log('error', e);
            	swal(
            		'Oops...',
            		'Something went wrong!',
            		'error'
            		)
            }
        });
        e.preventDefault();
    });

</script>
<script>
	$(document).ready(function () {
		$('.icheck-blue').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
            increaseArea: '15%' // optional
        });
	});
</script>