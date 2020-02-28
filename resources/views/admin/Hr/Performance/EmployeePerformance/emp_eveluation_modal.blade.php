<div class="modal fade text-left" id="updateCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-info">
			<h3 class="modal-title" id="myModalLabel35"> Update Evaluation</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
        <form action="javascript:;" id="updateDataForm" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            <input type="hidden" name="month" value="{{$month}}">
            <input type="hidden" name="year" value="{{$year}}">
            <div class="row">

                <div class="col-md-12" style="margin-bottom: 20px;">
                    <div class="row" style="margin: 10px 0px;">
                        <div class="col-md-12">
                            <label class="control-label"> Employee</label>
                            <input type="hidden" class=" form-control employee_id" name="employee_id" value="{{$emp_id}}" readonly="">
                            <input  class=" form-control" value="@isset($employees->name){{$employees->name}}@endisset" readonly >

                        </div>
                        @foreach($performances as $per)
                        <div class="col-md-12">
                            <label class="control-label"> {{$per->indicator_name}} (max marks= {{$per->indicator_total_marks}})</label>
                            <input  class=" form-control performance_{{$per->id}}" type="number" min="0" step="any" max="{{$per->indicator_total_marks}}"  name="performance_{{$per->id}}" id="performance_{{$per->id}}">
                        </div>
                        @endforeach

                    </div>
                    <div class="row" style="margin: 10px 0px;">
                        <div class="col-md-8">
                            <label class="control-label" for="remarks"> Remarks</label>
                            <textarea  class=" form-control "   name="remarks" id="remarks"></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">

               <input type="submit" class="btn btn-outline-success btn-lg"  id="addDataBtn" value="Update Evaluation">
           </div>
       </div>
   </div>
</div>

<script>


    $("#addDataBtn").click(function (e) {
console.log('event',e);
        var form = $('#updateDataForm')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        console.log('formData', formData);
        console.log('form', form);
        $.ajax({
            url: "{{ route('performance.store') }}",
            type: "POST",
            enctype: 'multipart/form-data',
            processData: false,  // Important!
            contentType: false,
            cache: false,
            data: formData,
            
            success: function (response) {
                if (response.status) {

                    $('#updateCourse').modal('hide');

                    $("#updateDataForm")[0].reset();

                    swal(
                        'Success!',
                        'Record successfully Update',
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
                location.reload(true)
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
