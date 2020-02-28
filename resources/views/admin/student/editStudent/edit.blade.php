<div class="modal fade text-left" id="updateCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-info">
			<h3 class="modal-title" id="myModalLabel35"> Update Student Profile</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="javascript:;" id="updateDataForm" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-body">
				<div class="modal-body">
					

					<fieldset class="form-group floating-label-form-group">
						<label for="s_name">Student Name</label>
						<input type="text" class="form-control" id="s_name" value="{{$data->s_name}}" required name="s_name" placeholder="Enter section Name">
					</fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="s_fatherName">Father Name</label>
                        <input type="text" class="form-control" id="s_fatherName" value="{{$data->s_fatherName}}" required name="s_fatherName" placeholder="Enter section Name">
                    </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                        <label for="s_phoneNo">Phone</label>
                        <input type="text" class="form-control" id="s_phoneNo" value="{{$data->s_phoneNo}}" name="phone" required placeholder="Enter section Name">
                    </fieldset>

                     <fieldset class="form-group floating-label-form-group">
                        <label for="photo">Image</label>
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Images">
                    </fieldset>


                  
                   
                    </div>
					<br>
				</div>


				<input type="hidden" name="id" value="{{$data->id}}">

			
			<div class="modal-footer">
				<img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
				height="50"/>
				&nbsp;&nbsp;&nbsp;
				<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
				value="Dismiss">
				<input type="submit" class="btn btn-outline-info btn-lg"  id="updateDataBtn" value="Update">
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
        	url: "{{route('EditStudentProfile')}}",
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
            	if (response.status) {

            		$('#updateCourse').modal('hide');

            		$("#updateDataForm")[0].reset();

            		swal(
            			'Success!',
            			'Record update successfully',
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