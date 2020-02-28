@extends('_layouts.admin.default')
@section('title', 'Outstanding')
@section('content')
@php($classss=0)
<div class="content container-fluid" style="background-color: #fff;">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <style type="text/css">
        .table_1 th ,.table_1 td{
          border: 1px solid #000!important;
          text-align: center!important;
          font-size: 12px!important;
          color: #000!important;
        }
        .table_1 tr{
          border-top: 1px solid #000!important;
          border-bottom: 1px solid #000!important;
        }

        th{
          padding: 0px!important;
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
      .table_1 td{
        padding: 2px!important;
        font-size: 12px!important;
        color: #000!important;
      }
      @page { size: auto;  margin: 5mm!important;}
    </style>
    <div class="col-md-12">

      <button style="font-size:36px;color:#000d82;" onclick="printDivs(this,'DivIdToPrint')"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='All Record Print'  class="btn btn-primary float-center allrecord"></button>
    </div>


    <br><br>
    @isset($month)
    <?php 
    $dateObj= DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F');
    ?>      
    @endisset
    @php($levelName='')
    @php($counter=1)

    <div id="DivIdToPrint">



     <div class="logoremove">
       <div  style="float: right;">
         <div style="float: right;">Printed On:{{date('d-M-Y')}} <span>{{date('H:i')}}</span></div>
       </div>
       <br>  
       <div class="row" style="margin-top: 25px;text-align: right;">
        <div class="logo_heading" style="margin: 0 auto; width: 40%;">
          <img src="{{asset('images/school/alis pvt ltd.png')}}">
        </div>
      </div>

      <div class="nav_bva" style="margin-top: -5px;">
        Reports <span>&nbsp;&nbsp; @isset($from_date){{date("d-M-y", strtotime($from_date))}}@endisset - @isset($till_date){{date("d-M-y", strtotime($till_date))}} @endisset</span>
      </div>
      <br>
    </div>

<table class="table_1">
  <thead>
    <th>Branch</th>
    <th>Admissited Students</th>
    <th>Lefted Students</th>
    <th>Transfered Students</th>
  </thead>
  <tbody>
    <th>
      @if(isset($students[0])) 

        @isset($students[0]->Branchs->branch_name){{$students[0]->Branchs->branch_name}} @endisset 

      @else
        @if(isset($leftstudents[0])) 
          @isset($leftstudents[0]->Branchs) {{$leftstudents[0]->Branchs->branch_name}} @endisset
        @else
          @if(isset($tranfstudents[0])) 
            @isset($tranfstudents[0]->Branchs->branch_name) {{$tranfstudents[0]->Branchs->branch_name}} @endisset 
          @endif
        @endif
      @endif
      
      
    </th>
    <td>{{count($students)}}</td>
    <td>{{count($leftstudents)}}</td>
    <td>{{count($tranfstudents)}}</td>
  </tbody>
</table>

    <br><br><br>
    @isset($students)
    <table class="table_1">
      <strong><h4>@isset($students[0]->Branchs->branch_name){{$students[0]->Branchs->branch_name}} @endisset Admissions</h4></strong>
      <thead>
        <tr>
          <th></th>
          <th> Std Id</th>
          <th> SName</th>
          <th> Grade</div></th>
          <th> Admiss</div></th>
          <th> Registration</div></th>
          <th> Security</div></th>

          <th> Annual Fee </div></th>
          <th> Scholarship </div></th>
          <th> Net Annual Fee </div></th>
          <th>  Monthly</div></th>
          <th>  Total</div></th>
          <th >FirstPayment </div></th>

          <th >DoAdmission</div></th>

        </tr>
      </thead>    
      <tbody>

        @php($counter=0)
        @foreach($students as $cour)
        <tr>
          <td>{{++$counter}}</td>
          <td >@isset($cour->id){{$cour->id}}@endisset</td>
          <td >@isset($cour->s_name){{$cour->s_name.' S/O '.$cour->s_fatherName}}@endisset</td>

          <td > @isset($cour->course){{$cour->course->course_name}}@endisset </td>

          <td > @isset($cour->branchFeePost){{$cour->branchFeePost->admissionFee>0?$cour->branchFeePost->admissionFee:$cour->studentFee->adm_fee}}@endisset </td>
          <td > @isset($cour->branchFeePost){{$cour->branchFeePost->registerationFee?$cour->branchFeePost->admissionFee:$cour->studentFee->sec_fee}}@endisset </td>
          <td > @isset($cour->branchFeePost){{$cour->branchFeePost->secFee?$cour->branchFeePost->secFee:$cour->studentFee->sec_fee}}@endisset </td>

          <td > @isset($cour->studentFee){{$cour->studentFee->annual_fee}}@endisset </td>
          <td > @isset($cour->studentFee){{$cour->studentFee->scholarship_of}}@endisset </td>
          <td > @isset($cour->studentFee){{$cour->studentFee->Net_AnnualFee}}@endisset </td>
          <td > @isset($cour->studentFee){{$cour->studentFee->Net_AnnualFee/12}}@endisset </td>
          <td > @isset($cour->branchFeePost){{$cour->branchFeePost->grand_totalPayThisMonth>0?$cour->branchFeePost->grand_totalPayThisMonth:$cour->branchFeePost->total_fee}}@endisset </td>
          <td > @isset($cour->branchFeePost){{$cour->branchFeePost->paid_amount}}@endisset </td>

          <td > @isset($cour->admission_date){{date("d-M-y", strtotime($cour->admission_date))}}@endisset </td>

        </tr>
        @endforeach

      </tbody>


    </table>
    @endisset

    <!-- /////////////////////////////////tranfstudents -->
    <br>
    <br><br><br>
    @isset($tranfstudents)
    <table class="table_1">
      <strong><h4>@isset($tranfstudents[0]->fromBranch->branch_name){{$tranfstudents[0]->fromBranch->branch_name}} @endisset {{('Transfer Students')}}</h4></strong>
      <thead>
        <tr>
          <th></th>
          <th> Std Id</th>
          <th> SName</th>
          <th> Grade</th>
          <th> Transfered Grade</th>
          <th> Branch</th>
          <th> Transfered Branch</th>
          <th>Transfer Date</th>
        </tr>
      </thead>    
      <tbody>

        @php($counter=0)
        @foreach($tranfstudents as $cour)
        <tr>
          <td>{{++$counter}}</td>
          <td >@isset($cour->student->id){{$cour->student->id}}@endisset</td>
          <td >@isset($cour->student->s_name){{$cour->student->s_name.' S/O '.$cour->student->s_fatherName}}@endisset</td>
          <td>@isset($cour->fromClass){{$cour->fromClass->course_name}}@endisset</td>
          <td>@isset($cour->toClass){{$cour->toClass->course_name}}@endisset</td>


           <td > @isset($cour->fromBranch){{$cour->fromBranch->branch_name}}@endisset </td>
          <td > @isset($cour->toBranch){{$cour->toBranch->branch_name}}@endisset </td>

          <td > @isset($cour->updated_at){{date("d-M-y", strtotime($cour->updated_at))}}@endisset </td>

        </tr>
        @endforeach

      </tbody>


    </table>
    @endisset
<!-- /////////////////////////////////leftstudents -->
<br><br><br><br>
    @isset($leftstudents)
    <table class="table_1">
      <strong><h4>@isset($leftstudents[0]->branch->branch_name){{$leftstudents[0]->branch->branch_name}} @endisset {{('Left Students')}}</h4></strong>
      <thead>
        <tr>
          <th></th>
          <th> Std Id</th>
          <th> SName</th>
          <th> Grade</th>
          <th >DoAdmission</th>
          <th>Left Date</th>

        </tr>
      </thead>    
      <tbody>

        @php($counter=0)
        @foreach($leftstudents as $cour)
        <tr>
          <td>{{++$counter}}</td>
          <td >@isset($cour->student->id){{$cour->student->id}}@endisset</td>
          <td >@isset($cour->student->s_name){{$cour->student->s_name.' S/O '.$cour->student->s_fatherName}}@endisset</td>

          <td > @isset($cour->student->course){{$cour->student->course->course_name}}@endisset </td>


          <td > @isset($cour->student->admission_date){{date("d-M-y", strtotime($cour->student->admission_date))}}@endisset </td>
          <td > @isset($cour->updated_at){{date("d-M-y", strtotime($cour->updated_at))}}@endisset </td>

        </tr>
        @endforeach

      </tbody>


    </table>
    @endisset

    




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

// console.log('eve',eve,'obj',obj);
$("#"+obj).print();




}

// $(function(){
//   $( ".logoremove" ).first().css( "display", "none" );
// });
</script>
@endpush
