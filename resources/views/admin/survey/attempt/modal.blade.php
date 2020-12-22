<div class="modal fade  bd-example-modal-lg text-left" id="survey_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width: 1200px">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h3 class="modal-title" id="myModalLabel35">Survey Answer</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="addDataForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-sm-6 list">
                        @if($survey_table->name=='Not want to add name')
                            @isset($survey_table)
                                <ul>
                                    <li>The survey person does not want to show his name</li>
                                </ul>
                            @endisset
                        @else
                            @isset($survey_table)
                                <ul>
                                    <li>The survey name id <b>{{$survey_table->name}}</b></li>
                                </ul>
                            @endisset
                            @endif

                    </div>
                    <div class="col-sm-12 list">
                    @isset($survey_table)
                        <ul>
                            <li>The survey person email is <b>{{$survey_table->email}}</b></li>
                        </ul>
                    @endisset
                </div>
                        <div class="col-sm-6 list">
                                @isset($survey_table)
                                    <ul>
                                        <li>The branch selected is  <b>{{$survey_table->branch->branch_name}}</b></li>
                                        </ul>
                                @endisset
                        </div>
                        <div class="col-sm-6 list">
                            @isset($survey_table)
                                <ul>
                                    <li>
                                        The selected selected is <b>{{$survey_table->section_id}}</b>
                                    </li>
                                </ul>

                            @endisset
                        </div>
                    </div>

                <table id="example" class="table border table-bordered " style="text-align: center!important">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Questions</th>
                        <th>Yes</th>
                        <th>No</th>
                        <th>May be</th>
                    </tr>
                    </thead>
                    <tbody id="data">
                    {{ csrf_field() }}

                    @isset($survey_ans)
                        @php
                            $i =1;
                        @endphp
                        @foreach($survey_ans as $answer)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td style="text-align: left;font-family: Noto Serif;">
                                        {{$answer->question->question}}
                                    </td>

                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" value="1" {{ ($answer->survey_ans==1)? "checked" : "" }}  >
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"  value="1" {{ ($answer->survey_ans==2)? "checked" : "" }} >
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"  value="3" {{ ($answer->survey_ans==3)? "checked" : "" }} >
                                        </div>
                                    </td>
                                </tr>

                                @foreach($answer->childrens as $answerer)
                                    <tr>
                                        <td></td>
                                        <td style="text-align: left;font-family: Noto Serif;">
                                            {{$answerer->question->question}}
                                        </td>
                                        <td colspan="3">

                                                {{$answerer->survey_ans}}

                                        </td>
                                    </tr>

                                @endforeach

                        @endforeach
                    @endisset
                    </tbody>
                </table>
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
                url: "{{route('survey_question_update')}}",
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

