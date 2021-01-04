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
            @php
                $category =\App\Models\SurveyCategory::find(32);
            @endphp
            <form action="" id="updateDataForm" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                    <fieldset class="form-group floating-label-form-group">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="cat_name">Question Name</label>
                                    <textarea type="text" class="form-control question" id="question" name="question">@isset($question){{$question->question}}@endisset</textarea>
                                    <p style="color: red;margin-top: 3px" id="question_error"></p>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">

                                    <label for="cat_name">All Options</label>
                                    @foreach($options as$option)
                                    <input type="text" class="form-control option_1" name="option[{{$option->id}}]" value="@isset($option){{$option->option}}@endisset">
                                    <p style="color: red;margin-top: 3px" id="question_error"></p>
                                        @endforeach
                                </div>
                                <input type="hidden" name="question_id" value="{{$question->id}}">
                            </div>
                        </div>
                    </fieldset>

                <div class="modal-footer">
                    <img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
                         height="50"/>
                    &nbsp;&nbsp;&nbsp;
                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                           value="Dismiss">
                    <input type="submit" class="btn btn-outline-success btn-lg"  id="updateDataBtn" value="Add Question">
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

