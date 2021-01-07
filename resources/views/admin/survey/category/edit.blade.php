<div class="modal fade text-left" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
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
                            <label for="cat_name">Category Name</label>
                            <input type="text" class="form-control" id="cat_name" name="category_name" value="{{$categorys->category_name}}" placeholder="Enter Category Name">
                            <p style="color: red;margin-top: 3px" id="cat_name_error"></p>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                            <label for="cat_type">Survey Category Type</label>
                            <select name="cat_type" class="form-control">
                                <option value=" " selected>choose..</option>
                                <option value="1" @if(isset($categorys) && @$categorys->cat_type == 1){{'selected'}} @endif >Students</option>
                                <option value="2"  @if(isset($categorys) && @$categorys->cat_type == 2){{'selected'}} @endif>Teachers</option>
                                <option value="3"  @if(isset($categorys) && @$categorys->cat_type == 3){{'selected'}} @endif>Parents</option>
                                <option value="4"  @if(isset($categorys) && @$categorys->cat_type == 4){{'selected'}} @endif>Advisary Board</option>
                            </select>
                            <p style="color: red;margin-top: 3px" id="cat_type_error"></p>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                            <label for="month">Month</label>
                            <select name="month" class="form-control">
                                <option value=" " selected>choose..</option>
                                @foreach($months as $month)
                                    <option value="{{$month->month}}" @if(isset($categorys) && @$categorys->month == $month->month){{'selected'}} @endif >{{$month->month}}</option>
                                @endforeach
                            </select>
                            <p style="color: red;margin-top: 3px" id="month_error"></p>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="year">Year</label>
                            <select name="year" class="form-control">
                                <option value=" " selected>choose..</option>
                                @foreach($years as $year)
                                    <option  value="{{$year->name}}" @if(isset($categorys) && @$categorys->year == $year->name){{'selected'}} @endif >{{$year->name}}</option>
                                @endforeach
                            </select>
                            <p style="color: red;margin-top: 3px" id="year_error"></p>
                        </fieldset>
                        <br>
                    </div>


                    <input type="hidden" name="category_id" value="{{$categorys->id}}">

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
                url: "{{route('survey_category_update')}}",
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

