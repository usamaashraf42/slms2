@extends('_layouts.admin.default')
@section('title', 'Student Fee Structure')
@section('content')
@php($classss=0)

<style>
  .table td, .table th {
    padding: .10rem!important;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
        font-size: 12px!important;
}
.table th {
    padding: .10rem!important;
    vertical-align: top;
    max-width: 60px!important;
    border-top: 1px solid #dee2e6;
}
table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    max-width: 40px;
    border-left-width: 0;
    /* max-width: 11px; */
}
</style>


<div class="content container-fluid" style="background-color: #fff;">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
    

    @if(isset($finalData) && count($finalData))


    <div class="col-md-12">

      <button style="font-size:36px;color:#000d82;" onclick="printDivs(this,DivIdToPrint);"> <i class="fa fa-print"></i><br><input type='button' id='btn' value='Print'  class="btn btn-primary float-center allrecord"></button>
    </div>
    <br><br>

    
    @php($levelName='')
    @php($counter=1)

    <section class="outstanding">
      <div class="DivIdToPrint">

        <div  id="DivIdToPrint">
         <div  style="float: right;">
           <div style="float: right;">Printed On:{{date('d-M-Y')}} <span>{{date('H:i')}}</span></div>
         </div>
         <div class="" style="margin-top: 25px; text-align: center;">

          <div class="logo_heading" style="width: 40%; margin: 0 auto;">
            <img src="{{asset('images/school/alis pvt ltd.png')}}">

          </div>
        </div>

        <div class="col-md-10" style="margin-top: 40px;">

         <div class="container">
           <div class="nav_bva" style="margin-top: -20px;">
            Student Fee Structure 
          </div>
          <br>

          <div style="width: 40%;"></div>
        </div>
        <br>

          <div class="table-responsive">
            <table id="example" class="table border table-bordered ">
         <thead>

          <tr>
            <th></th>
            <th >Branch</th>
            <th> Std Id#</th>
            <th> Std Name</th>
            <th> Class</th>
            
            <th> Annual Fee</th>
            <th> Sch Fee </th>

            <th> Net Annual Fee</th>

            <th>jan</th>

            <th>feb</th>

            <th> mar</th>

            <th > apr</th>

            <th>may</th>
            <th>june</th>
            <th>july</th>
            <th>aug</th>
            <th>sep</th>
            <th>oct</th>
            <th>nov</th>
            <th>dec</th>
            <th>Total</th>
            <th></th>

          </tr>
        </thead>
        <tbody>
          @php($counter=0)
          @foreach($finalData as $data)
          <tr class="feeStruture{{$data->std_id}}">
            <td>{{++$counter}}</td>
            <td >{{$data->branch}}</td>
            <td> {{$data->std_id}}</td>
            <td> {{$data->std_name}}</td>
            <td> {{$data->class}}</td>
            
            <td> {{$data->annual_fee}}</td>
            <td> {{$data->scholarship_of}} </td>

            <td> {{$data->Net_AnnualFee}}</td>

            <td><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m1_{{$data->std_id}}" value="{{$data->m1}}"></td>
            <td><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m2_{{$data->std_id}}" value="{{$data->m2}}"></td>
            <td>
              <input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m3_{{$data->std_id}}" value=" {{$data->m3}}">
            </td>

            <td ><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m4_{{$data->std_id}}" value=" {{$data->m4}}"></td>

            <td><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m5_{{$data->std_id}}" value="{{$data->m5}}"></td>
            <td><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m6_{{$data->std_id}}" value="{{$data->m6}}"></td>
            <td><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m7_{{$data->std_id}}" value="{{$data->m7}}"></td>
            <td><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m8_{{$data->std_id}}" value="{{$data->m8}}"></td>
            <td><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m9_{{$data->std_id}}" value="{{$data->m9}}"></td>
            <td><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m10_{{$data->std_id}}" value="{{$data->m10}}"></td>
            <td><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m11_{{$data->std_id}}" value="{{$data->m11}}"></td>
            <td><input type="text" style="max-width: 60px;" data-ids="{{$data->std_id}}" class="feeMonth std_m12_{{$data->std_id}}" value="{{$data->m12}}"></td>
            <td><input type="text" style="max-width: 60px;" readonly class="std_total_{{$data->std_id}}" value="{{$data->total}}"></td>

            <td><button data-ids="{{$data->std_id}}" onclick="updateFeeStrutureByBranch({{$data->std_id}})" class="btn btn-info btn-sm" >Update</button></td>

          </tr>

          @endforeach
        </tbody>


      

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
@else
<div class="alert alert-success"> Record Not Found</div>
@endif
@endsection
@push('post-styles')
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@push('post-scripts')
<script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/buttons.colVis.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

  $('.feeMonth').on('keyup',function(){
      console.log('feechange',$(this).attr('data-ids'));
      var std_id=$(this).attr('data-ids');
      var m1=parseInt($('.std_m1_'+std_id).val());
      var m2=parseInt($('.std_m2_'+std_id).val());
      var m3=parseInt($('.std_m3_'+std_id).val());
      var m4=parseInt($('.std_m4_'+std_id).val());
      var m5=parseInt($('.std_m5_'+std_id).val());
      var m6=parseInt($('.std_m6_'+std_id).val());
      var m7=parseInt($('.std_m7_'+std_id).val());
      var m8=parseInt($('.std_m8_'+std_id).val());
      var m9=parseInt($('.std_m9_'+std_id).val());
      var m10=parseInt($('.std_m10_'+std_id).val());
      var m11=parseInt($('.std_m11_'+std_id).val());
      var m12=parseInt($('.std_m12_'+std_id).val());

      var total_factor=m1+m2+m3+m4+m5+m6+m7+m8+m9+m10+m11+m12;

      $('.std_total_'+std_id).val(total_factor);


  });

  function updateFeeStrutureByBranch(obj){
      var std_id=parseInt(obj);
 console.log('button click',std_id);

      var m1=parseInt($('.std_m1_'+std_id).val());
      console.log('m1',m1);
      var m2=parseInt($('.std_m2_'+std_id).val());
      var m3=parseInt($('.std_m3_'+std_id).val());
      var m4=parseInt($('.std_m4_'+std_id).val());
      var m5=parseInt($('.std_m5_'+std_id).val());
      var m6=parseInt($('.std_m6_'+std_id).val());
      var m7=parseInt($('.std_m7_'+std_id).val());
      var m8=parseInt($('.std_m8_'+std_id).val());
      var m9=parseInt($('.std_m9_'+std_id).val());
      var m10=parseInt($('.std_m10_'+std_id).val());
      var m11=parseInt($('.std_m11_'+std_id).val());
      var m12=parseInt($('.std_m12_'+std_id).val());

      var total_factor=m1+m2+m3+m4+m5+m6+m7+m8+m9+m10+m11+m12;

      if(total_factor!=12){
        toastr.warning('Fee Factor Should be equal to 12');
        return false;
      }

      $('.std_total_'+std_id).val(total_factor);

        $.ajax({
            url: "{{route('studentFeeStrutureChange')}}", 
            method:"POST",
            data:{std_id:std_id,m1:m1,m2:m2,m3:m3,m4:m4,m5:m5,m6:m6,m7:m7,m8:m8,m9:m9,m10:m10,m11:m11,m12:m12},
            success: function(response){
             
              console.log('ajax call',response);
              if(response.status){
                if(response.status==1){
                  $('.feeStruture'+std_id).remove();
                  toastr.success('Record Update Successfully');
                }else{
                  $('.feeStruture'+std_id).remove();
                  toastr.warning('failed to update');
                }
              }
              else{
                 toastr.danger('Record not update');
              }
            }});
  }
  $(document).ready(function() {
     //Default data table
     

 } );
  function printDivs(eve,obj)
  {


    $("#"+$(obj).attr('id')).print();


  }
</script>
@endpush
