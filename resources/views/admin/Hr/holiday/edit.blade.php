


<div class="modal fade text-left" id="updateCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Edit Holiday </h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times; </span>
			</button>
		</div>
		<form action="" id="updateDataForm" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$data->id}}">
			<div class="form-group">
				<label>Holiday Name  <span class="text-danger">* </span></label>
				<input class="form-control" name="holiday_title" value="{{$data->holiday_title}}" type="text" />
			</div>
			<div class="form-group">
				<label>Holiday Date  <span class="text-danger">* </span></label>
				<div class="cal-icon"><input class="form-control datetimepicker" name="holiday_date" value="{{$data->holiday_date}}" type="text" /></div>
			</div>
			<div class="submit-section">
				<button class="btn btn-primary submit-btn" id="updateDataBtn">Update </button>
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
        	url: "{{route('holidays.updateHoliday')}}",
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