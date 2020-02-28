<div class="modal fade text-left" id="updateCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-info">
			<h3 class="modal-title" id="myModalLabel35"> Update Course</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="" id="updateDataForm" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-body">
				<div class="modal-body">
					<fieldset class="form-group floating-label-form-group">
						<label for="course_code">Course Code</label>
						<input type="number" class="form-control" value="{{$data->course_code}}" id="course_code" name="course_code" placeholder="Enter Course Code">
					</fieldset>

					<fieldset class="form-group floating-label-form-group">
						<label for="course_name">Course Name</label>
						<input type="text" class="form-control" id="course_name" value="{{$data->course_name}}" name="course_name" placeholder="Enter Course Name">
					</fieldset>
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