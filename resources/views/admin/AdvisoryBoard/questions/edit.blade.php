<div class="modal fade text-left" id="updateQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h3 class="modal-title" id="myModalLabel35"> Update Question</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="updateDataForm" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                            <label for="cat_name">Question Name</label>
                            <input type="text" class="form-control" id="question" name="parent_question" value="{{$parent_question->question}}" >
                            <p style="color: red;margin-top: 3px" id="cat_name_error"></p>
                        </fieldset>
                        @foreach($options as $option)
                            <fieldset class="form-group floating-label-form-group">
                                <label for="cat_name">Option/Answer Name</label>
                                <input type="text" class="form-control" id="question" name="option[{{$option->id}}]" value="{{$option->question}}" >
                                <p style="color: red;margin-top: 3px" id="cat_name_error"></p>
                            </fieldset>
                        @endforeach
                        <br>
                    </div>

                    <input type="hidden" name="question_id" value="{{$parent_question->id}}">

                </div>
                <div class="modal-footer">
                    <img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
                         height="50"/>
                    &nbsp;&nbsp;&nbsp;
                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                           value="Dismiss">
                    <input type="submit" class="btn btn-outline-info btn-lg"  id="updateDataBtn" value="Update Question">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.loader-img').hide();
        $("#updateDataBtn").on('click',function (e) {
            var form = $('#updateDataForm')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            console.log('formData', formData);
            console.log('form', form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                url: "{{route('question_update')}}",
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
                    if (response.status == true) {

                        $('#updateCategory').modal('hide');

                        $("#updateDataForm")[0].reset();


                        swal({title: "Success", text: "Record Updated Successfully!", type:
                                "success"}).then(function(){
                                location.reload();
                                setTimeout(location.reload(),4000);
                            }
                        );
                    } else {
                        console.log('error blank', response.message);
                        swal(
                            'Warning!',
                            response.message?response.message:'Something went wrong',
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
    });


</script>

