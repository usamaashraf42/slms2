@extends('_layouts.admin.default')
@section('title', 'Certificate')
@section('content')
<div class=" container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
			<div class="card-box">
				<div class="col-md-12">
          <input type='button' id='btn' value='Print' onclick="printDivs(this,printAllRecord)" 
          class="btn btn-primary float-center allrecord" style="width: 100%;">
        </div>
        <div id="printAllRecord" >
          <div class="card-block">
            <style>
  @import "lesshat";
  body {
   margin: 0;
   padding: 0;
   background-color: #FAFAFA;
   font: 12pt sans-serif;
   color: #808080;
   border: 1px #808080 solid;
 }
 .pag {
  position: relative;
  width: 21.0cm;
  height: 29.7cm;
  padding: 1cm;
  border: 1px solid #ccc;
  margin: 1cm auto;
  background: white;
  box-shadow: 0px 4px 4px #827e7e;
}
.pag .pagination {
 position: absolute;
 top: .5cm;
 right: 1cm;
 font-size: 10px;
}
.pag .credits {
 position: absolute;
 bottom: .5cm;
 left: 1cm;
 font-size: 10px;
}
.content {
 padding: 1cm;
 height: 27.7cm;
 width: 100%;
 margin: 0cm;
}
h1 {
 text-align: center;
 margin-top: 5px;
}
a {
 color: #808080;
 text-decoration: none;
}
@page {
 size: A4;
 margin: 0;
}
@media print {
  body {
   margin: 0;
   padding: 0;
   background-color: #FAFAFA;
   font: 12pt sans-serif;
   color: #808080;
   border: 1px #808080 solid;
 }
 .pag {
   position: relative;
   width: 21.0cm;
   height: 29.7cm;
   padding: 1cm;
   margin: 1cm auto;
   background: white;
   box-shadow: 0 0 5px rgba(0,0,0,0.1);
 }
 .pag .pagination {
   position: absolute;
   top: .5cm;
   right: 1cm;
   font-size: 10px;
 }
 .pag .credits {
   position: absolute;
   bottom: .5cm;
   left: 1cm;
   font-size: 10px;
 }
 .content {
   padding: 1cm;

   height: 27.7cm;
   width: 100%;
   margin: 0cm;
 }
 h1 {
   text-align: center;
   margin-top: 5px;
 }
 a {
   color: #808080;
   text-decoration: none;
 }
 .pag {
   margin: 0;
   border: initial;
   border-radius: initial;
   width: initial;
   min-height: initial;
   box-shadow: initial;
   background: initial;
   page-break-after: always;
 }
 p {
  margin-top: 51px;
  text-align: center;
  margin-bottom: 1rem;
}
.date_resp {
  width: 60%!important;
}
.certificate {
 text-align: center;
 padding: 4em 4em 5em;
 background: repeating-linear-gradient(45deg, #192a56, #1c3062 30px, #192a56 0, #192a56 60px);
 margin: 0 auto;
 outline: 1px solid #128fc2;
 border: 10px solid white;
}
.certificate h1 {
  font-size: 28px;
  text-transform: uppercase;
}
.certificate--inner-wrap {
  background: white;
  height: 100%;
  width: 100%;
  padding: 2em 6em;
  position: relative;
}
.certificate--date, .certificate--from {
 position: absolute;
 font-weight: bold;
}
.certificate--date {
 left: 4em;
 bottom: 3em;
}
.certificate--from {
  right: 14px;
  bottom: 1em;
  width: 200px;
}

.certificate-Firma img {
 width: 200px;
 height: 100px;
}
}
p{
  margin-top: 51px;
  text-align: center;
  margin-bottom: 1rem;
}
.certificate {
 text-align: center;
 padding: 4em 4em 5em;
 background: repeating-linear-gradient(45deg, #192a56, #1c3062 30px, #192a56 0, #192a56 60px);
 margin: 0 auto;
 outline: 1px solid #128fc2;
 border: 10px solid white;
}
.certificate h1 {
  font-size: 28px;
  text-transform: uppercase;
}
.certificate--inner-wrap {
  background: white;
  height: 100%;
  width: 100%;
  padding: 2em 6em;
  position: relative;
}
.certificate--date, .certificate--from {
 position: absolute;
 font-weight: bold;
}
.certificate--date {
 left: 4em;
 bottom: 3em;
}
.certificate--from {
  right: 14px;
  bottom: 1em;
  width: 200px;
}
.certificate--from img {
 width: 200px;
}
.certificate-Firma {
 width: 200px;
}
.certificate-Firma img {
 width: 200px;
 height: 100px;
}
.box_1{
  width: 100%;
}
.box_left{
  width: 50%;
  float: left;
  clear: both;
  line-height: 1.8;
  text-align: justify;
}
.box_right{
  width: 50%;
  float: right;
  line-height: 1.8;
  text-align: left;
}
</style>
            <div class="book">
              <div class="pag"style="background-image: url('{{asset('assets/img/certifecate.jpg')}}');
-webkit-print-color-adjust: exact;background-size: cover;">
                <div class="content" style="padding-top: 200px;">
                  <h1>SCHOOL LEAVING CERTIFICATE</h1>
                  <p style="text-align: left; font-weight: normal;line-height: 1.8;"><strong style="text-align: center;">This is certified that <strong style="border-bottom: 2px solid #000;">@isset($stds->student) {{$stds->student->s_name}} @endisset</strong> Son/daughter of @isset($stds->student) {{$stds->student->s_name}} @endisset
                    Was student of @isset($stds->student->course) {{$stds->student->course->course_name}} @endisset. His/her particulars are as under:</strong></p>
                    <div class="paper">
                     <!--                  <h4>Date: {{date("D", strtotime(now()))}}, {{date("d M Y", strtotime(now()))}}</h4> -->
                     <div style="width: 500px;
                     margin: 0 auto;">
                     <div>
                      <div class="box_1" style="margin-top: 80px;"> 
                        <div class="box_left"><strong>Lyceonian No<span style="padding-left: 20px;">:</span></strong></div>
                        <div class="box_right">@isset($stds->student) {{$stds->student->id}} @endisset</div>

                        <div class="box_left"><strong>Name<span style="padding-left: 80px;">:</span></strong></div>
                        <div class="box_right">@isset($stds->student) {{$stds->student->s_name}} @endisset</div>

                        <div class="box_left"><strong>Father Name<span style="padding-left: 26px;">:</span></strong></div>
                        <div class="box_right">@isset($stds->student->s_fatherName) {{$stds->student->s_fatherName}} @endisset</div>

                        <div class="box_left"><strong>Grade<span style="padding-left: 78px;">:</span></strong></div>
                        <div class="box_right">@isset($stds->student->course){{$stds->student->course->course_name}} @endisset</div>

                        <div class="box_left"><strong>DOB<span style="padding-left: 88px;">:</span></strong></div>
                        <div class="box_right">@isset($stds->student->s_DOB) {{ date("d M Y", strtotime($stds->student->s_DOB)) }} @endisset</div>

                        <div class="box_left"><strong>Admission Date<span style="padding-left: 2px;">:</span></strong></div>
                        <div class="box_right">@isset($stds->student->admission_date) {{ date("d M Y", strtotime($stds->student->admission_date)) }} @endisset</div>

                        <div class="box_left"><strong>School Leaving Date<span>:</span></strong></div>
                        <div class="box_right">@isset($stds->student->leaving_date) {{ date("d M Y", strtotime($stds->student->leaving_date)) }} @endisset</div>
                      </div>
                    </div>
                  </div>    
                  <div class="date_resp" style="position: absolute; bottom: 173px;width: 80%;">
                    <div style="width: 200px;float:left;text-align: center;">
                     <span class="certificate--date">{{date("d M Y", strtotime(now()))}}</span>
                     <hr>
                     Date Of issue
                   </div>
                   <div style="
                   width: 200px;
                   float: right;
                   margin-top: -104px;">
                   <span class="certificate-Firma">
                    <img src="https://restaurantemalahierba.com/wp-content/uploads/2018/08/firma-lester.png" alt="" />
                  </span>
                  <hr> 
                  PRINCIPAL
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection
@push('post-styles')
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<style>
  @import "lesshat";
  body {
   margin: 0;
   padding: 0;
   background-color: #FAFAFA;
   font: 12pt sans-serif;
   color: #808080;
   border: 1px #808080 solid;
 }
 .pag {
  position: relative;
  width: 21.0cm;
  height: 29.7cm;
  padding: 1cm;
  border: 1px solid #ccc;
  margin: 1cm auto;
  background: white;
  box-shadow: 0px 4px 4px #827e7e;
}
.pag .pagination {
 position: absolute;
 top: .5cm;
 right: 1cm;
 font-size: 10px;
}
.pag .credits {
 position: absolute;
 bottom: .5cm;
 left: 1cm;
 font-size: 10px;
}
.content {
 padding: 1cm;
 height: 27.7cm;
 width: 100%;
 margin: 0cm;
}
h1 {
 text-align: center;
 margin-top: 5px;
}
a {
 color: #808080;
 text-decoration: none;
}
@page {
 size: A4;
 margin: 0;
}
@media print {
  body {
   margin: 0;
   padding: 0;
   background-color: #FAFAFA;
   font: 12pt sans-serif;
   color: #808080;
   border: 1px #808080 solid;
 }
 .pag {
   position: relative;
   width: 21.0cm;
   height: 29.7cm;
   padding: 1cm;
   margin: 1cm auto;
   background: white;
   box-shadow: 0 0 5px rgba(0,0,0,0.1);
 }
 .pag .pagination {
   position: absolute;
   top: .5cm;
   right: 1cm;
   font-size: 10px;
 }
 .pag .credits {
   position: absolute;
   bottom: .5cm;
   left: 1cm;
   font-size: 10px;
 }
 .content {
   padding: 1cm;

   height: 27.7cm;
   width: 100%;
   margin: 0cm;
 }
 h1 {
   text-align: center;
   margin-top: 5px;
 }
 a {
   color: #808080;
   text-decoration: none;
 }
 .pag {
   margin: 0;
   border: initial;
   border-radius: initial;
   width: initial;
   min-height: initial;
   box-shadow: initial;
   background: initial;
   page-break-after: always;
 }
 p {
  margin-top: 51px;
  text-align: center;
  margin-bottom: 1rem;
}
.date_resp {
  width: 60%!important;
}
.certificate {
 text-align: center;
 padding: 4em 4em 5em;
 background: repeating-linear-gradient(45deg, #192a56, #1c3062 30px, #192a56 0, #192a56 60px);
 margin: 0 auto;
 outline: 1px solid #128fc2;
 border: 10px solid white;
}
.certificate h1 {
  font-size: 28px;
  text-transform: uppercase;
}
.certificate--inner-wrap {
  background: white;
  height: 100%;
  width: 100%;
  padding: 2em 6em;
  position: relative;
}
.certificate--date, .certificate--from {
 position: absolute;
 font-weight: bold;
}
.certificate--date {
 left: 4em;
 bottom: 3em;
}
.certificate--from {
  right: 14px;
  bottom: 1em;
  width: 200px;
}

.certificate-Firma img {
 width: 200px;
 height: 100px;
}
}
p{
  margin-top: 51px;
  text-align: center;
  margin-bottom: 1rem;
}
.certificate {
 text-align: center;
 padding: 4em 4em 5em;
 background: repeating-linear-gradient(45deg, #192a56, #1c3062 30px, #192a56 0, #192a56 60px);
 margin: 0 auto;
 outline: 1px solid #128fc2;
 border: 10px solid white;
}
.certificate h1 {
  font-size: 28px;
  text-transform: uppercase;
}
.certificate--inner-wrap {
  background: white;
  height: 100%;
  width: 100%;
  padding: 2em 6em;
  position: relative;
}
.certificate--date, .certificate--from {
 position: absolute;
 font-weight: bold;
}
.certificate--date {
 left: 4em;
 bottom: 3em;
}
.certificate--from {
  right: 14px;
  bottom: 1em;
  width: 200px;
}
.certificate--from img {
 width: 200px;
}
.certificate-Firma {
 width: 200px;
}
.certificate-Firma img {
 width: 200px;
 height: 100px;
}
.box_1{
  width: 100%;
}
.box_left{
  width: 50%;
  float: left;
  clear: both;
  line-height: 1.8;
  text-align: justify;
}
.box_right{
  width: 50%;
  float: right;
  line-height: 1.8;
  text-align: left;
}
</style>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
<script>
  function printDivs(eve,obj)
  {


    $("#printAllRecord").print();


  }
  $(document).ready(function() {
     //Default data table
     $('#default-datatable').DataTable();


     var table = $('#example').DataTable( {
     	"order": [[ 0, "desc" ]],
     	lengthChange: false,
     	buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
     } );

     table.buttons().container()
     .appendTo( '#example_wrapper .col-md-6:eq(0)' );

   } );
  function null_model(){
        // alert("s");
        $("#append_data").text('');
        $("#append_data").html('');
      }

      
      function approveRequest(id){
        console.log('approve Request Id',id);
        $.ajax({
          url: "{{route('correctionRecord')}}", 
          method:"POST",
          data:{'id':id},
          success: function(response){
           console.log('ajax call',response);
           if(response.status){
            $('.stdinfo').val(response.data.student.s_name);
            $('.branch').val(response.data.student.branch.branch_name);
            $('.amount').val(response.data.amount);
            $('.correctinId').val(response.data.id);
            $('.feeId').val(response.data.feeId);
            if(response.data.tbl_correctioncol==12){
              console.log('gg');
              $('#amount').css({"display": "none"});
            }else{
              console.log('display show');
              $('#amount').css({"display": "block"});
            }

          }
          else{
            console.log(response.message);
          }
        }});
      }

    </script>

    @endpush