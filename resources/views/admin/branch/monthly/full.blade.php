@extends('_layouts.admin.default')
@section('title', 'Branch Detail')
@section('content')
@php($classss=0)
<div class="content container-fluid" style="background-color: #fff;">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <style type="text/css">


        th ,td{
          border: 1px solid #000!important;
          text-align: center!important;
          font-size: 12px!important;

        }
        .table tr{
          border-top: 1px solid #000!important;
          border-bottom: 1px solid #000!important;
        }
        th{
          padding: 2px;
          padding: 0.55rem;
        }
        .nav_bva{
         text-align: center;
         font-size: 20px;
         font-weight: bold;
       }
       .nav_bva1{
        text-align: left;
        font-size: 18px;

        width: 50%;
      }
      .total_navaq{
        width: 48%;
        display: inline-block;
      }
      .table td{
        padding: .10rem!important;
        font-size: 12px!important;
      }
      .nav-tabs { border-bottom: 2px solid #DDD; }
      .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
      .nav-tabs > li > a { border: none; color: #ffffff;background: #5a4080; }
      .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #5a4080 !important; background: #fff; }
      .nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
      .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
      .tab-nav > li > a::after { background: ##5a4080 none repeat scroll 0% 0%; color: #fff; }
      .tab-pane { padding: 15px 0; }
      .tab-content{padding:20px}
      .nav-tabs > li  {width:20%; text-align:center;}
      .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
      body{ background: #EDECEC; padding:50px}

      @media all and (max-width:724px){
        .nav-tabs > li > a > span {display:none;} 
        .nav-tabs > li > a {padding: 5px 5px;}
      }

      @page { size: auto;  margin: 0mm; margin-right: 5px; }

    </style>

    <!-- <div class="col-md-12">
      <input type='button' id='btn' value='All Record Print' onclick="printDivs(this,DivIdToPrint)" class="btn btn-primary float-center allrecord" style="width: 100%;">
    </div>
    <br><br> -->
   

    <?php 
          $month=date('m');
      if(substr($month, 0, 1)=='0'){
        $month=substr($month, 1, 2);
      }
    ?>

    <section class="outstanding">
      <div class="DivIdToPrint">

        <div  id="DivIdToPrint">


         <div class="container">
          <div class="row">
            <div class="col-md-12"> 
              <div class="nav_bva" style="margin-top: -20px;">
                Details Of American Lyceum <span> </span>
              </div>
              <br>
              <br>
              <table class="table">
                <thead>

                  <tr>
                    <th>Sr No</th>
                    <th>Branch</th>
                    <th style="max-width: 100px!important;"><strong><h4>Total Student</h4></strong></th>
                    <th> Posted Fee</th>
                    <th> Correction Fee</th>
                    <th>After Correction</th>

                    <th>Deposited Fee</th>
                    <th>Outstanding Fee</th>
                  </tr>
                </thead>
                @php($outArray=0)
                @php($activeArray=0)

                <tbody>
                  @php($counter=0)
                  @foreach($records as $branch)
                    <tr>

                        @foreach($branch->student as $data)
                        @php($totalFeePostedOfMonth=0)
                        @php($totalCorrectionOfMonth=0)
                        @php($totalDepositedOfMonth=0)
                        @php($totalStdudents=count($branch->student))
                        @php(($studentFeeMonth=$data->feePostOfMonth($month)))
                        @if($studentFeeMonth)
                        @php($totalFeePostedOfMonth+=$studentFeeMonth->total_fee)
                        @php($totalCorrectionOfMonth+=$studentFeeMonth->corrected_amount)
                        @php($totalDepositedOfMonth+=$studentFeeMonth->paid_amount)
                        @endif
                        @endforeach
                        <td>{{++$counter}}</td>

                        <td>@isset($branch->branch_name){{$branch->branch_name}}@endisset</td>
                        <td ><i>@isset($totalStdudents){{$totalStdudents}}@endisset</td>
                        <td ><i>@isset($totalFeePostedOfMonth){{$totalFeePostedOfMonth + $totalCorrectionOfMonth}}@endisset</td>
                        <td><i>@isset($totalCorrectionOfMonth){{$totalCorrectionOfMonth}}@endisset</td>
                        <td ><i>@isset($totalFeePostedOfMonth){{$totalFeePostedOfMonth }}@endisset </td>
                        <td><i>@isset($totalDepositedOfMonth){{$totalDepositedOfMonth}}@endisset</td>
                        <td ><i>@isset($totalFeePostedOfMonth){{$totalFeePostedOfMonth - $totalDepositedOfMonth}}@endisset</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

           <style>
            .total_nava{width: 32%;
              display: inline-block;
            }
            .sub_nava{
              width: 30%;
              float: right;
            }
          </style>
        </div>

        @endsection

        @push('post-scripts')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
        <script type="text/javascript">
          function printDivs(eve,obj)
          {


            $("#"+$(obj).attr('id')).print();


          }
        </script>
        @endpush
