@extends('_layouts.admin.default')
@section('title', 'Branch Fee Detail')
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
          padding: 0rem;
          height: 80px!important;
        }
        .table_1 td{
          padding: 2px;
          padding: 0.1rem!important;
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

    <div class="col-md-12">
      <input type='button' id='btn' value='All Record Print' onclick="printDivs(this)" class="btn btn-primary float-center allrecord" style="width: 100%;">
    </div>
    <br><br>
    @isset($month)
    <?php 
    $dateObj= DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F');
    ?>      
    @endisset
    @php($levelName='')

    <section class="outstanding">
      <div id="DivIdToPrint">
       <div  style="float: right;">
         <div style="float: right;">Printed On:{{date('d-m-y')}} <span>{{date('H:i')}}</span></div>
       </div>
       <br>

       <div class="" style="margin-top: 25px; text-align: center;">
        <div class="logo_heading" style="width: 40%; margin: 0 auto;">
          <img src="{{asset('images/school/alis pvt ltd.png')}}">

        </div>
      </div>
      <page size="A4" layout="landscape">
       <div class="nav_bva" style="margin-top: -5px;">
        Branch Fee Detail <span>&nbsp;&nbsp;  </span>
      </div>
      <br>
      <div style="float: left;margin-top: -15px;"><strong><h4>@isset($records[0]->branch->branch_name){{$records[0]->branch->branch_name}} @endisset</h4></strong></div>

      <br>


      <table class="table_1">
       <thead>

        <tr>
          <th></th>
          <th style="max-width: 100px!important;"><strong><h4>@isset($records[0]->branch->branch_name){{$records[0]->branch->branch_name}} @endisset</h4></strong></th>
          <th> Ly No</th>
          <th> Addmission</th>
          <th> Annual Fee</th>
          <th> Sch Fee</th>
          <th> Net Annual Fee</th>
          <th> Net Monthly Fee</th>
          
        </th>
      </tr>
    </thead>


  
    @php($counter=0)

    @php($totalAnnul=0)
   


    @php($totalSch=0)
   

    @php($totalNetAnnual=0)




  @php($monthlyNetAnnual=0)
          @php($monthlyAnnul=0)
          @php($monthlySch=0)





    @foreach($records as $data)


    <tbody>


      @if(isset($data->course->course_name) && ($levelName!=$data->course->course_name))
      @if($counter)

        <tr>
          
            <td colspan="4">Total</td>
          

            <td> {{ $monthlyAnnul }}</td>
            <td>{{ $monthlySch }}</td>
            <td>{{ $monthlyNetAnnual }}</td>
            <td>{{ round(($monthlyNetAnnual)/12) }}</td>
          </tr>
          @php($monthlyNetAnnual=0)
          @php($monthlyAnnul=0)
          @php($monthlySch=0)

      @endif
      <tr style="margin:5px;">
        <td colspan="14" ><strong>{{$data->course->course_name}}</strong></td>
      </tr>



      @php($levelName=$data->course->course_name)
      @endif

        <tr>
          <td>{{++$counter}}</td>
          <td style="text-align: left!important;"><i>{{$data->s_name}}&nbsp; &nbsp; {{$data->s_phoneNo}}</td>
          <td style="text-align: left!important;"><i>@isset($data->id){{$data->id}}@endisset</td>
          <td>{{date("d-m-y", strtotime(($data->admission_date))) }}</td>


          <td>@isset($data->studentFee) 

            {{ ($data->studentFee->annual_fee)  }} 

            @php($totalAnnul+=$data->studentFee->annual_fee)
            @php($monthlyAnnul+=$data->studentFee->annual_fee)

          @endisset</td>

          <td>@isset($data->studentFee)
            {{ ($data->studentFee->scholarship_of)  }}

            @php($totalSch+=$data->studentFee->scholarship_of)
            @php($monthlySch+=$data->studentFee->scholarship_of)

          @endisset</td>
          <td>@isset($data->studentFee)
            {{ ($data->studentFee->Net_AnnualFee)  }} 

            @php($totalNetAnnual+=$data->studentFee->Net_AnnualFee)
            @php($monthlyNetAnnual+=$data->studentFee->Net_AnnualFee)
              

          @endisset</td>
          <td>@isset($data->studentFee){{ round(($data->studentFee->Net_AnnualFee)/12)  }} @endisset</td>

   
        </tr>
      
      @endforeach
        <tr>
          
            <td colspan="4">Total</td>
          

            <td> {{ $monthlyAnnul }}</td>
            <td>{{ $monthlySch }}</td>
            <td>{{ $monthlyNetAnnual }}</td>
            <td>{{ round(($monthlyNetAnnual)/12) }}</td>
          </tr>
          <tr>
          
            <td  colspan="4">Grand Total</td>
            
         

            <td> {{ $totalAnnul }}</td>
            <td>{{ $totalSch }}</td>
            <td>{{ $totalNetAnnual }}</td>
            <td>{{ round(($totalNetAnnual)/12) }}</td>
          </tr>

        </tbody>
      </table>



    </div>
  </section>

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


    $("#DivIdToPrint").print();


  }


</script>
@endpush
