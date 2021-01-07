
@extends('_layouts.web.pakistan.default')
@section('title', 'Advisory board')
@push('post-styles')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable(analytics);
            var options = {
                title: 'Response from users',
                titlePosition:'none',
                legend: 'none',
                showLables: 'true',
                'width':500,
                'height':300

            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endpush

@section('content')
    <style type="text/css">
        main
        {
            width: 100%; min-height:700px
        }
        .advisoryboard
        {
            width: 60%;
            margin:200px auto 0px auto;
            box-shadow: 2px 2px  5px rgba(0,0,0,0.2),-2px -2px  5px rgba(0,0,0,0.2);
            min-height: 500px;
            border: 1px  transparent solid ;
            border-radius: 10px;
            padding: 0px  50px;
        }
        .advisoryboard h2{ text-transform: uppercase; color: #363636; text-align: center; font-size: 35px;}
        .advisoryboard label{text-transform: capitalize;color: #36363c;font-weight: bold;}
        .advisoryboard >input{    display: block;width: 100%;border: none;border-bottom: 1px solid #363636;}
        .advisoryboard   h3{ font-size: 30px;color: #363636;text-transform: capitalize;text-align: center;}
        .advisoryboard p { text-decoration-line: underline;line-height: 35px;color: #757575;; min-height: 100px; margin: 0px}
        .Abutton{display: flex;justify-content: center; margin-top: 20px}
        .Abutton button{background-color: #363636!important;color: white;border: none !important;outline: none!important;font-size: 15px !important;}
        .option{display: flex; justify-content: space-around;}
        .Abutton button:hover{background-color:#363636!important;border: none !important;outline: none!important; color:white !important }

        @media screen and (max-width: 1200px)
        {
            .advisoryboard{width: 80%};
        }
        @media screen and (max-width:992px)
        {
            .advisoryboard{width:90%};
            .advisoryboard h2{font-size:25px}
        }
        @media screen and (max-width:765px)
        {
            .advisoryboard{width: 90%};
            .advisoryboard h2{font-size:20px}
            .option{ flex-direction: column; }
        }
    </style>
    <main>
        <form id="addDataForm" method="post" enctype="multipart/form-data">
            @php
            $category =\App\Models\SurveyCategory::where('cat_type',4)->first();
            @endphp
            <input type="hidden" name="category_id" value="{{$category->id}}">
            <div class="advisoryboard">
                <h2>Advisory Board opinion Board</h2>
                <div class="form-group ">
                    <label for="name">Advisory Name:</label>
                    <select name="name" id="name" class="form-control" style="margin: 0">
                        <option  value=" " selected>Choose name..</option>
                        <option value="Syed Haider Ali">Syed Haider Ali</option>
                        <option value="Ms. Puja Seth">Ms. Puja Seth</option>
                        <option value=" Mr. Muhsin Ali"> Mr. Muhsin Ali</option>
                        <option value="DR. RASHID SALEEM">DR. RASHID SALEEM</option>
                        <option value="ARVIND KUMAR">ARVIND KUMAR</option>
                        <option value="Dr. Atif Shahbaz">Dr. Atif Shahbaz</option>
                        <option value="Siddharth Rajgarhia">Siddharth Rajgarhia</option>
                        <option value="Maria Belen">Maria Belen</option>
                        <option value="Jeffrey R. Quebec">Jeffrey R. Quebec</option>
                        <option value="DR. MUHAMMAD USMAN AWAN">DR. MUHAMMAD USMAN AWAN</option>
                        <option value="Dr. Sohail Qureshi">Dr. Sohail Qureshi</option>
                        <option value="Dr. Saffee Ullah">Dr. Saffee Ullah</option>
                        <option value="Nicola Waterson">Nicola Waterson</option>
                        <option value="Alícia Nakashima Villarreal">Alícia Nakashima Villarreal</option>
                    </select>
                    <p style="color: red;margin-top: 3px" id="name_error"></p>
                </div>
                @foreach($questions as $question)
                    <input type="hidden" name="questions[]" value="{{$question->id}}">
                <h3>Advise Required</h3>
                <label>Topic</label>
                <p style="font-size: 20px;text-align: center" name="question" readonly>{{$question->question}}</p>
                <label>Your suggestions/Admin</label>
                <div class="option">
                    <div class="col-md-8 radio" style="margin-top: 35px;display: flex">
                        @foreach($question->childrens as $option)
                            <div class="form-check form-check-inline" style="width: 15%">
                                <input class="form-check-input " type="radio" name="question_ans_{{$question->id}}" id="radio_button_{{$option->id}}" value="{{$option->id}}">
                                <label class="form-check-label" for="radio_button_{{$option->id}}">
                                    {{$option->question}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
                <div class="Abutton">
                    <button   id="view"> view</button>
                    <button style="margin-left: 20px" id="addDataBtn">Submit</button>
                </div>
                <div id="peichart" style="margin-left: 20%">
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                </div>
            </div>
        </form>
    </main>

    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>


    <script type="text/javascript" src="{{asset('assets/chosen/chosen.jquery.js')}}"></script>
    <script type="text/javascript">



        $(document).ready(function(){
            // $('.loader-img').hide();
            // $('#text_2').click(function(){
            //     // alert(2);
            //     $('#check_3').focus();
            //     console.log('hi')
            // })
            $('#peichart').hide();

            $('#view').click(function(e){
                e.preventDefault();
                console.log($(this).val());
                $('#peichart').toggle();
            })
        })

        $(document).ready(function(){
            $("#addDataBtn").click(function (e) {
                e.preventDefault();
                var form = $('#addDataForm')[0]; // You need to use standard javascript object here
                // console.log('form',form);
                var formData = new FormData(form);
                console.log('formData', formData);
                // return false;
                console.log('form', form);
                var names = {};
                $(':radio').each(function() {
                    names[$(this).attr('name')] = true;
                });
                var count = 0;
                $.each(names, function() {
                    count++;
                });
                if ($(':radio:checked').length !== count) {
                    swal({
                        title:"warning",
                        text:"Please advise by selecting any one radio button",
                        type:"warning"
                    })
                    // swal(
                    //     'Warning!',
                    //    'djndj',
                    //     'warning'
                    // );
                }
                    // if ($('input[type="radio"]:checked').length == 0) {
                    //     alert('please...');
                //     return false; }
                else {
                    $.ajax({
                        url: "{{route('pakistan_advisory_board_answers')}}",
                        type: "POST",
                        enctype: 'multipart/form-data',
                        processData: false,  // Important!
                        contentType: false,
                        cache: false,
                        data:formData,
                        beforeSend: function () {
                            $('.loader-img').show();
                            // $('#preloader').show();
                        },
                        complete: function () {
                            // $('#preloader').fadeOut('slow', function () {
                            //     $(this).remove();
                            // });
                            $('.loader-img').hide();
                        },
                        success: function (response) {
                            console.log('response', response);
                            if (response.status == '200') {
                                // $('#add_shed').modal('hide');
                                // $("#addDataForm")[0].reset();
                                // $(".slim-btn-remove").click();
                                swal({title: "Success", text: "Advisory board filled Successfully!", type:
                                        "success"}).then(function(){
                                        // location.reload();
                                        setTimeout(location.reload(),1000);
                                    }
                                );
                            } else {
                                // console.log('error blank', response.message);
                                swal(
                                    'Warning!',
                                    response.message,
                                    'warning'
                                );
                            }
                        },
                        // error: function (e) {
                        //     console.log('error', e);
                        //     swal(
                        //         'Oops...',
                        //         'Something went wrong!',
                        //         'error'
                        //     )
                        // }
                        error: function (response) {
                            if(response.responseJSON.errors.name)
                            {
                                $('#name_error').text(response.responseJSON.errors.name);
                            }
                            else{
                                $('#name_error').html(' ');
                            }
                        }
                    });
                    e.preventDefault();
                }

            });
        })
    </script>

@endsection

