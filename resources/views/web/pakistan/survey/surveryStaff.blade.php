@extends('_layouts.web.pakistan.default')
@section('title', 'Staff Survey')
@section('content')

    <div id="siteWrapper" class="slide-right" style="overflow:hidden;">
        <div class="body-overlay"></div>
        <style>
            .form-control {
                width: 100%;
            }
            .multiselect-container {
                box-shadow: 0 3px 12px rgba(0,0,0,.175);
                margin: 0;
            }
            .multiselect-container .checkbox {
                margin: 0;
            }
            .multiselect-container li {
                margin: 0;
                padding: 0;
                line-height: 0;
            }
            .multiselect-container li a {
                line-height: 25px;
                margin: 0;
                padding:0 35px;
            }
            .custom-btn {
                width: 100% !important;
            }
            .custom-btn .btn, .custom-multi {
                text-align: left;
                width: 100% !important;
            }
            .dropdown-menu > .active > a:hover {
                color:inherit;
            }
            .chosen-container-multi .chosen-choices {
                padding: 2px 5px!important;
                border-radius: 5px!important;
                height: auto!important;
                border: 1px solid #484242!important;
            }
            label {
                width: 100%;
                display: flex;
                margin-bottom: 5px;
                font-weight: normal;
            }
            .radio-inline + .radio-inline, .checkbox-inline + .checkbox-inline {
                margin-top: 0;
                margin-left: 0px!important;
            }
            .chosen-select{
                max-width: 350px!important;
            }
            #country_id{
                max-width: 350px!important;
                height: 32px;
            }
            .select2-selection__rendered{
                max-width: 350px!important;
            }
            /* Dropdown Button */
            .acdmics_heading{
                font-weight: bold;
                background: aliceblue;
                margin-bottom: 10px;
                padding: 8px 2px;
                text-align: center;
            }
            .dropbtn {
                background-color: #ececec;
                color: #000000;
                padding: 10px;
                font-size: 1em;
                border: none;
                cursor: pointer;
                border: 1px solid #ddd;
                font-family: sans-serif;
                width: 100%;
                min-width: 90px;
                border-radius: 2px;
            }
            .dropbtn:hover,
            .dropbtn:focus {
                background-color: #ededed;
            }
            .dropdown {
                position: relative;
                display: inline-block;
            }
            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                display: none;
                position: absolute;
                z-index: 9;
                background-color: #ffffff;
                border-top-left-radius: 2px;
                border-top-right-radius: 2px;
                border-bottom: 4px solid #1F45A3;
                min-width: 110px;
                box-shadow: 0px 2px 20px 0px rgba(31, 69, 163, 0.25);
                padding: 3px;
            }
            /*Drop down radio and label main div*/
            .whr-drop-main {
                width: 100%;
                float: left;
                margin-top: 3%;
                margin-bottom: 5%;
            }
            /* Links inside the dropdown */
            /*Radio Button Class*/
            .whr-used-drop {
                float: left;
            }
            /*Label Class*/
            .whr-used-drop-lbl {
                font-family: sans-serif;
                font-size: 1em;
                color: #3D3D3D;
            }
            /* Show/Hide the dropdown menu (JS) when the user clicks on the dropdown button) */
            .whr-drop-hide {
                display: block;
            }
            .chosen-choices{
                max-width: 350px!important;
                height: 32px!important;
            }
            #residence{
                max-width: 350px;
            }
            .table_1 td th{
                border: 1px solid #ccc;
                padding: 0px 2px!important;
            }
            .check_box {

                padding: 5px;
                margin-top: 12px;
            }
            @import url('https://fonts.googleapis.com/css?family=Lato');
            .list_radio{
                color: #AAAAAA;
                display: block;
                position: relative;
                float: left;
                width: 100%;
                height: 100px;
                border-bottom: 1px solid #333;
            }
            ul li input[type=radio]{
                position: absolute;
                visibility: hidden;
            }
            ul li label{
                display: block;
                position: relative;
                font-weight: 300;
                font-size: 1.35em;
                padding: 25px 25px 25px 80px;
                margin: 10px auto;
                height: 30px;
                z-index: 9;
                cursor: pointer;
                -webkit-transition: all 0.25s linear;
            }

            ul li:hover label{
                color: #FFFFFF;
            }

            ul li .check{
                display: block;
                position: absolute;
                border: 5px solid #AAAAAA;
                border-radius: 100%;
                height: 25px;
                width: 25px;
                top: 30px;
                left: 20px;
                z-index: 5;
                transition: border .25s linear;
                -webkit-transition: border .25s linear;
            }

            ul li:hover .check {
                border: 5px solid #000;
            }

            ul li .check::before {
                display: block;
                position: absolute;
                content: '';
                border-radius: 100%;
                height: 15px;
                width: 15px;

                margin: auto;
                transition: background 0.25s linear;
                -webkit-transition: background 0.25s linear;
            }

            input[type=radio]:checked ~ .check {
                border: 5px solid #162c6f;
            }

            input[type=radio]:checked ~ .check::before{
                background: #162c6f;
            }

            input[type=radio]:checked ~ label{
                color: #162c6f;
            }


            /* Styles for alert...
            by the way it is so weird when you look at your code a couple of years after you wrote it XD */

            .alert {
                box-sizing: border-box;
                background-color: #BDFFE1;
                width: 100%;
                position: relative;
                top: 0;
                left: 0;
                z-index: 300;
                padding: 20px 40px;
                color: #333;
            }

            .alert h2 {
                font-size: 22px;
                color: #232323;
                margin-top: 0;
            }

            .alert p {
                line-height: 1.6em;
                font-size:18px;
            }

            .alert a {
                color: #232323;
                font-weight: bold;
            }
            .img_box_paypal{
                max-width: 200px;
            }
            th{
                text-align: center!important;
            }
            .acc__panel {
                display: none;
            }
            .header{  background-color:#00274c;    height: 100px; }
            /*.header{ width:100%; min-height:50px; margin: 40px auto; display: flex;justify-content: space-around; align-items: center ; background-color:#00274c }*/
            label.show{font-size: 18px ; color:white; text-transform: capitalize; font-weight: normal;    padding-left: 10px;}
            .table{width: 100%; margin:auto; border: 1px solid black}
            select{width: 150px;margin-left: 10px;height: 25px;}
            table{ font-family: arial, sans-serif;border-collapse:collapse;width: 100%;}
            td, th {border: 1px solid black;text-align: left;padding:8px; text-align: center;}
            tr td:nth-child(2){width: 58%}
            textarea{width: 100%; height: 100%; margin: 0px; padding: 0px; border: 1px solid black}
            @media screen and (max-width: 992px)
            {
                .header{width: 90%}
                .table{width:100%}
            }
            @media screen and (max-width: 576px)
            {
                .header{flex-direction:column}
                .header div{margin: 10px 0px}
            }
            p{
                padding-left: 10px;
            }
            .footer{
                display: flex;
                justify-content: space-between;
                box-sizing: border-box;
                margin-top: 30px;
            }
            .flex_1{
                width: 70%;
            }
            .flex_2{
                width: 30%;
            }

        </style>
        <div  class="form_layout">
        </div>
        <div class="scrollable" style="
            height: 160px;
            padding: 56px;
            width: 200;
            padding-bottom: 44px;
            margin-top: 100px;
            min-height:100%;
            background:linear-gradient(0deg, rgb(0, 0, 0, 0.6), rgb(0, 0, 0,0.6)),  url('{{asset('images/job_imags.jpg')}}');
            background-size:cover;"
        >
            <h2 class="apply_now" style="margin-top: 120px;
text-align: center;
text-shadow: 0px 4px 2px #000000;
font-size: 36px;
margin: 0 auto;
color: white;
padding: 6px;
border-bottom-right-radius: 25px;
border-bottom-left-radius: 25px;
}">Employee Satisfaction Survey</h2>
        </div>
    </div>

    <?php

    $MerchantID ="MC35662"; //Your Merchant from transaction Credentials
    $Password   ="hv920evz9v"; //Your Password from transaction Credentials
    $ReturnURL  ="http://lyceumgroupofschools.com/feedeposit-status"; //Your Return URL
    $HashKey    ="y14yb32g8s";//Your HashKey from transaction Credentials
    $PostURL = "https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform";
    //"http://testpayments.jazzcash.com.pk/PayAxisCustomerPortal/transactionmanagement/merchantform";
    date_default_timezone_set("Asia/karachi");
    $Amount = 1*100; //Last two digits will be considered as Decimal
    $BillReference = "11111";
    $Description = "Thank you for using Jazz Cash";
    $Language = "EN";
    $TxnCurrency = "PKR";
    $TxnDateTime = date('YmdHis') ;
    $TxnExpiryDateTime = date('YmdHis', strtotime('+8 Days'));
    $TxnRefNumber = "T".date('YmdHis');
    $TxnType = "";
    $Version = '1.1';
    $SubMerchantID = "";
    $DiscountedAmount = "";
    $DiscountedBank = "";
    $ppmpf_1="";
    $ppmpf_2="";
    $ppmpf_3="";
    $ppmpf_4="";
    $ppmpf_5="";

    $HashArray=[$Amount,$BillReference,$Description,$DiscountedAmount,$DiscountedBank,$Language,$MerchantID,$Password,$ReturnURL,$TxnCurrency,$TxnDateTime,$TxnExpiryDateTime,$TxnRefNumber,$TxnType,$Version,$ppmpf_1,$ppmpf_2,$ppmpf_3,$ppmpf_4,$ppmpf_5];

    $SortedArray=$HashKey;
    for ($i = 0; $i < count($HashArray); $i++) {
        if($HashArray[$i] != 'undefined' AND $HashArray[$i]!= null AND $HashArray[$i]!="" )
        {

            $SortedArray .="&".$HashArray[$i];
        } }
    $Securehash = hash_hmac('sha256', $SortedArray, $HashKey);
    ?>

    <div class="breadcrumb-container w-100 pa3 pv2-ns ph4-ns relative">
        <div id="ctl00_cphBreadCrumb_BreadcrumbMenu1_pnlControls">
        </div>
    </div>
    <div class="clear-fix"></div>
    <div class="container" style="background-image: url('');">
        <section id="contact-page" class="pt-90 pb-120 white-bg">
            <div style="    width: 100%;
          height: 4px;
          background-color: #d1d2d4;">
                <h5 style="text-align: center;color: #fff;padding-top: 5px;"></h5>
            </div>
            <div class="col-md-12" style=" padding: 20px; margin: 0 auto; border: 1px solid #ccc; width: 100%;box-shadow: 0px 4px 4px #bbb;">
                <div class="row">
                    <div class="">
                        @component('_components.alerts-default')
                        @endcomponent
                        <div id="signupbox"  class="mainbox col-md-12  col-sm-12 col-xs-12">
                            <div>
                                <div class="table-responsive">
                                    <form action="" id="addDataForm" method="post" enctype="multipart/form-data">
{{--                                        <label for="cat_type">Survey Category</label>--}}
{{--                                        <select name="category_id" class="form-control">--}}
{{--                                            <option value=" " selected>choose..</option>--}}
{{--                                            @foreach($categorys as $category )--}}
{{--                                                <option value="{{$category->id}}">{{$category->category_name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                        </select>--}}
{{--                                        <p style="color: red;margin-top: 3px" id="category_id_error"></p>--}}
                                        <div class="header">
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                        <label class="show"  for="branches">select Branch</label>
                                                        <select name="branch_id" id="branch_id" class="form-control">
                                                            <option value=" " selected>select Branch</option>
                                                            @foreach($branches as $branch)
                                                                <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    <p style="color: red;margin-top: 3px" id="branch_id_error"></p>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                        <label  class="show" for="sections">select section</label>
                                                        <select name="section_type" id="section" class="form-control">
                                                            <option  value=" " selected>select Section</option>
                                                            <option value="Preschool">Preschool</option>
                                                            <option value="Junior(1-5)">Junior(1-5)</option>
                                                            <option value="Middle(6-8)">Middle(6-8)</option>
                                                            <option value="Matric(9-10)">Matric(9-10)</option>
                                                            <option value="O-level">O-level</option>
                                                            <option value="Management">Management</option>
                                                            <option value="Others">Others</option>
                                                            <option value="Blue Color">Blue Color</option>
                                                            <option value="E-School">E-School</option>
                                                        </select>
                                                    <p style="color: red;margin-top: 3px" id="section_error"></p>
                                                    </div>
                                            </div>
                                        </div>

                                    <table id="example" class="table border table-bordered " style="text-align: center!important">
                                        <thead>
                                        <tr>
                                            <th width="10%"></th>
                                            <th width="60%"></th>
                                            <th width="10%">Yes</th>
                                            <th width="10%">No</th>
                                            <th width="10%">May be</th>
                                        </tr>
                                        </thead>
                                        <tbody id="data">
                                            {{ csrf_field() }}

                                        @isset($questions)
                                            @php
                                                $i =1;
                                            @endphp
                                            @foreach($questions as $question)
                                                @if($question->question_type =='null')
                                                <tr id="rows_{{$question->id}}">
                                                    <td>{{$i++}}</td>
                                                    <td style="text-align: left;font-family: Noto Serif;">
                                                        {{$question->question}}
                                                        <input type="hidden" name="questions[]" value="{{$question->id}}">
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" onclick="getChildQuestion(this)"  data-ids="{{$question->id}}" name="question_ans_{{$question->id}}" value="1"  >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input  " onclick="getChildQuestion(this)"  type="radio" data-ids="{{$question->id}}" name="question_ans_{{$question->id}}"  value="2"  >
                                                            </div>


                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" onclick="getChildQuestion(this)" type="radio" data-ids="{{$question->id}}" name="question_ans_{{$question->id}}"  value="3"  >
                                                        </div>

                                                    </td>

                                                </tr>
                                                @endif
                                            @endforeach
                                        @endisset
                                        </tbody>
                                    </table>
                                        <div class="container" style="margin-top: 20px;">
                                            <div class="form-check form-check-inline" id="hide1">
                                                <input class="form-check-input" type="checkbox" name="check"
                                                       id="check_1">
                                                <label class="form-check-label" for="inlineRadio1"
                                                       style="display: inline">I do not want to mention my name</label>
{{--                                                <input type="hidden" name="name" value="1">--}}
                                            </div>
                                            <div class="form-check form-check-inline" id="hide2">
                                                <input class="form-check-input" type="checkbox" name="check"
                                                       id="check_2">
                                                <label class="form-check-label" for="checkbox" style="display: inline">I
                                                    am saving my name </label>:
                                                <input id="checkbox" type="text" name="name" autocomplete="off"  >
                                            </div>
                                            <p style="color: red;margin-top: 3px" id="check_error"></p>
                                            <div class="footer">
                                                <div class="flex_1">
                                                    <b>Date :</b> <span>{{ date('Y-m-d') }}</span></div>
                                                <div class="flex_2">Time taken by Survey <span
                                                        id="count-up"> 0:00</span></div>
                                            </div>
                                        </div>
                                                                  </div>


                            </div>


                            <!-- /////////////////////////////  end display none????????????????????????????????? -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 " >
                <div class="row" >
                    <div class="col-md-8"></div>
{{--                    <div class="col-md-2 float-right" style="float:right">--}}
{{--                        <input type="button"  class="btn btn-info btn-sm   float-left"   onclick="refreshwindow(this)"  value="back">--}}
{{--                    </div>--}}

                    <div class="col-md-2 float-right" style="float:right;display: flex">
                        <div style="     width: 40%;margin-top: 20px;">
                            <img class="loader-img" src="{{asset('images/ajax-loader.gif')}}" width="50"
                                 height="50"/>
                        </div>
                        <div style="    width: 60%;">
                            <input class="btn btn-success btn-sm submitButton" id="addDataBtn"    value="submit">
                        </div>


                    </div>
                </div>

            </div>
            </form>

    </div>
    </div>
    </div>
    </section>
    </div>
    </div>
    </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>


    <script type="text/javascript" src="{{asset('assets/chosen/chosen.jquery.js')}}"></script>
    <script type="text/javascript">
        // function count() {
        //     var seconds =0;
        //     var minute =0;
        //     var count=1;
        //     setInterval(counter,1000);
        //     function counter() {
        //         // console.log(count);
        //         var c=count++;
        //         console.log(c)
        //         document.getElementById('counter').innerHTML = c;
        //     }
        // }
        var min    = 0;
        var second = 0;
        var zeroPlaceholder = 0;
        var counterId = setInterval(countUp, 1000);

        function countUp () {
            second++;
            if(second == 59){
                second = 0;
                min = min + 1;
            }
            if(second == 10){
                zeroPlaceholder = '';
            }else
            if(second == 0){
                zeroPlaceholder = 0;
            }
            // console.log(min+':'+zeroPlaceholder+second)

            document.getElementById("count-up").innerText = min+':'+zeroPlaceholder+second;
        }
        $(document).ready(function(){
            $('.loader-img').hide();
            $('#check_1').click(function(){
                console.log($(this).val());
                $('#hide2').toggle();
            })
            $('#check_2').click(function(){
                console.log($(this).val());
                $('#hide1').toggle();
            })
        })
        function getChildQuestion(obj) {
            // console.log(obj);
            var question_id = $(obj).attr('data-ids');
            var answer_id = $(obj).val();

            console.log('question', question_id, 'ans', answer_id);
            $.ajax({
                url: "{{route('pakistan_survey_staff_questions')}}",
                type: 'get',
                data: {
                    'question_id': question_id,
                    'answer_id':answer_id
                },
                dataType: 'json',
                success: function (response) {
                    console.log('id', response);
                    if (response.status == "200") {
                        // console.log('id', response.answer.question);
                        // a =$(obj).parents('tr').attr('id');
                        // console.log(a);
                        // var tabcontent = document.getElementById("rows_"+${response.answer.id?response.answer.id:''});
                        // var tabcontent =document.getElementsByClassName('tabcontent');
                        // console.log(tabcontent);
                        // console.log(tabcontent.length);
                        // response.childerns.foreach($)
                        var chids=response.childerns;
                        console.log(chids);
                        console.log(chids.length)
                        for(var i=0; i<chids.length; i++){
                            console.log('child',chids[i].id);
                            $('#row_'+chids[i].id).css('display','none');
                        }
                    console.log(response.answer);
                        // for (var i = 0; i < tabcontent.length; i++) {
                        //     tabcontent[i].style.display = "none";
                        // }
                        html =`<tr id="row_${response.answer.id?response.answer.id:''}">
                                  <td></td>
                                    <input type="hidden" name="questions[]" value="${response.answer.id?response.answer.id:''}">
                                  <td style="text-align: left; font-family: "Noto Serif", Garamond, "Times New Roman", Times, sans-serif;">
                                           ${response.answer.question?response.answer.question:''}
                                  </td>
                                 <td colspan="3"><textarea class="form-control" name="question_ans_${response.answer.id?response.answer.id:''}"></textarea></td>
                                </tr>`;
                        // $('#data').append(html);
                        $(obj).parents('tr').after(html)
                        // a.insertAdjacentHTML("afterend", html);
                        // console.log(a.insertAdjacentHTML("afterend", html));
                        // $('#row_'+question_id).insertAfter(html);
                        // var $this     = $(html),
                        // $parentTR = $this.closest('tr');
                        //
                        // $parentTR.clone().insertAfter($parentTR);
                        // $(html).insertAfter(this);
                        // console.log($('this').find('tr').css('color','red'));
                        // console.log(remove_tr)
                        // if(remove_tr)
                        // {
                        //     $(remove_tr).remove();
                        // }
                        // $('.hide').css('color','red');

                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    swal(
                        'Oops...',
                        'Something went wrong!',
                        'error'
                    )
                }
            });
        }
        $(document).ready(function(){
            $("#addDataBtn").click(function (e) {
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
                        text:"Please fill all questions",
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
                        url: "{{route('pakistan_survey_staff_answers')}}",
                        type: "POST",
                        enctype: 'multipart/form-data',
                        processData: false,  // Important!
                        contentType: false,
                        cache: false,
                     data:formData,
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
                                // $('#add_shed').modal('hide');
                                // $("#addDataForm")[0].reset();
                                // $(".slim-btn-remove").click();
                                swal({title: "Success", text: "Survey filled  Successfully!", type:
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
                            if(response.responseJSON.errors.branch_id)
                            {
                                $('#branch_id_error').text(response.responseJSON.errors.branch_id);
                            }
                            else{
                                $('#branch_id_error').html(' ');
                            }
                            if(response.responseJSON.errors.section_type) {
                                $('#section_error').text(response.responseJSON.errors.section_type);
                            }
                                else{
                                    $('#section_error').html(' ');
                                }
                            if(response.responseJSON.errors.check) {
                                $('#check_error').text(response.responseJSON.errors.check);
                            }
                            else{
                                $('#check_error').html(' ');
                            }
                        }
                    });
                    e.preventDefault();
                }

            });
        })
    </script>

@endsection
