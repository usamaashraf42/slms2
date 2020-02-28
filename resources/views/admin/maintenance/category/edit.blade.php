<div class="modal fade text-left" id="updateCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-info">
			<h3 class="modal-title" id="myModalLabel35"> Update Category</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="" id="updateDataForm" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-body">
				<div class="modal-body">
                <fieldset class="form-group floating-label-form-group">
                    <label for="main_name"> Name</label>
                    <input type="text" class="form-control" id="main_name" name="main_name" value ="{{$category->main_name}}" placeholder="Enter Category Name">
                </fieldset>
                


                <fieldset class="form-group floating-label-form-group">
                    <label for="course_name">Main Category</label>
                    @isset($mains)

                    <select class="form-control" id="parentId" name="parent_id">
                        <option selected="selected" disabled="disabled">Choose Category</option>
                        @foreach($mains as $cours)
                        <option value="{{$cours->id}}" @if($category->parent_id==$cours->id) selected @endif>{{$cours->main_name}}</option>
                        @endforeach
                    </select>

                    @endisset
                </fieldset>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <fieldset class="form-group floating-label-form-group">
                            <label for="avg_time">Avg Time</label>
                            <input type="text" min="0" max="999999999" class="form-control" id="avg_time" name="avg_time" value ="{{$category->avg_time}}" placeholder="Enter Avg Time">
                        </fieldset>
                    </div>
                    
                </div>


                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <label class="control-label">User Available (click to add User)</label>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <label class="control-label">Maintenance being given to employee (click Employee to remove)</label>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        
                        <select id='pre-users-options' multiple='multiple' name="users[]">
                            @foreach($employees as $user)

                            <option value="{{$user->id}}" @if($category->hasUser($user->id)) selected @endif>{{$user->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    </

                </div>

            </div>


				<input type="hidden" name="id" value="{{$category->id}}">

			</div>
			<div class="modal-footer">
				<img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
				height="50"/>
				&nbsp;&nbsp;&nbsp;
				<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
				value="Dismiss">
				<input type="submit" class="btn btn-outline-info btn-lg"  id="updateDataBtn" value="Update Category">
			</div>
		</form>
	</div>
</div>
</div>
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

        $('#pre-users-options').multiSelect();
       
    </script>
<script>



	$('.loader-img').hide();
	$("#updateDataBtn").click(function (e) {


        var form = $('#updateDataForm')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        console.log('formData', formData);
        console.log('form', form);
        $.ajax({
        	url: "{{route('maintenance.updateMainCategory')}}",
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