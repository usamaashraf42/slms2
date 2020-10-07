



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fee Challan</title>
  </head>
  <style>
  li{
        list-style: circle;
  }
  .ommni{
   float: left;
   font-weight: 400;
  }
  .card{
    background: #fff;
    padding: 12px;
    text-align: center;
  }

.tab-content{
    display: block;
    /* margin: 10px; */
    margin-top: 30px;
    margin-bottom: 30px;
}
.nav-pills>li {
  float: left;
  border: 1px solid #ddd;
}
.payment_box {
    background-color: #F5F5F5;
    min-height: 300px;
    border-radius: 50px;
    text-align-last: center;
    height: auto;
    padding-bottom: 15px;
    box-shadow: 0px 3px 4px #ccc;
    border: 1px solid #ccc;
    padding-top: 57px;
}
.nav-pills>li>a {
  border-radius: 0!important;
  border-top: 3px solid transparent!important;
  color: #444!important;
  border-radius: 9px!important;
  margin: 12px!important;
  border: 1px solid #000!important;
  background: #E6E6E6!important;
}
.myTable{
  width: 90%;
  margin: 0 auto;
  border: 1px solid;
}
.myTable>thead>tr>th, .myTable>tbody>tr>th, .myTable>tfoot>tr>th, .myTable>thead>tr>td, .myTable>tbody>tr>td, .table-bordered>tfoot>tr>td {
  border: 1px solid #000000;
border-right: 2px solid #000;
}

.nav-pills>li.active>a{
  transform: translateY(-5px);
  opacity: 1;
  background-color: #004080!important;
  color:#fff!important;
}
.table_box{
 width: 80%;
 border-radius: 22px;
 padding: 16px;
 margin: 0 auto;
 margin-bottom: 18px!important;
 background: whitesmoke;
 text-align: center;
}
.border_r{
  border-right: 2px solid!important;
}
</style>
@foreach($records as $data)

<?php 

  if($data->course_id>=183 && $data->course_id<=193){
    $amount=1400;
    $total_amount=3 * $amount;
  }

  if($data->course_id>=176 && $data->course_id<=179){
    $amount=1200;
    $total_amount=3 * $amount;
  }

  if($data->course_id>=163 && $data->course_id<=166){
    $amount=700;
    $total_amount=3 * $amount;
  }

  if($data->course_id>=163 && $data->course_id<=166 && $data->course_id>=15 && $data->course_id<=18){
    $amount=700;
    $total_amount=3 * $amount;
  }

  if($data->course_id>=1 && $data->course_id<=15 ){
    $amount=400;
    $total_amount=3 * $amount;
  }

  if($data->course_id>=194 && $data->course_id<=196){
    $amount=990;
    $total_amount=3 * $amount;
  }

  if(!$data->course_id){
    $amount=0;
    $total_amount=3 * $amount;
  }



?>
  <body>
    <table  class="myTable" cellspacing="0" style="margin-top: -10px;">
    <tbody><tr>
      <th  class="border_r"colspan="3">
       <div style="padding-left: 10px;">
          <p  style="padding: 12px!important; margin-top: 5px;">
          
          <div style="text-align: right;font-weight: normal;font-size: 14px;padding-right: 5px;"> Candidate  </div> 

          <span class="" style="float: center!important;text-align: center !important;">  <strong>British Lyceum (PVT) Ltd</strong></span></p><br>
          <span class="" style="float: center!important;text-align: center !important"> Online Fee</span></p><br>

          <span class="ommni"> Account title: British Lyceum (PVT) Ltd </span> <br>
        
          <span class="ommni">  <strong>DIB A/C# &nbsp; 0630050001</strong></span></p><br>
            <span class="ommni">For queries contact: 0346-4292920 </span> <br>

       </div>
      </th>
          <th  class="border_r"colspan="3">
       <div style="padding-left: 10px;">
          <p  style="padding: 12px!important; margin-top: 5px;">
          
          <div style="text-align: right;font-weight: normal;font-size: 14px;padding-right: 5px;"> BLIS  </div> 
          <span class="" style="float: center!important;text-align: center !important;">  <strong>British Lyceum (PVT) Ltd</strong></span></p><br>
          <span class="" style="float: center!important;text-align: center !important"> Online Fee</span></p><br>

          <span class="ommni"> Account title: British Lyceum (PVT) Ltd </span> <br>
        
          <span class="ommni">  <strong>DIB A/C# &nbsp; 0630050001</strong></span></p><br>
            <span class="ommni">For queries contact: 0346-4292920 </span> <br>

       </div>
      </th>
       <th  class="border_r"colspan="3">
       <div style="padding-left: 10px;">
          <p  style="padding: 12px!important; margin-top: 5px;">
          
          <div style="text-align: right;font-weight: normal;font-size: 14px;padding-right: 5px;"> Bank  </div> 
          <span class="" style="float: center!important;text-align: center !important;">  <strong>British Lyceum (PVT) Ltd</strong></span></p><br>
          <span class="" style="float: center!important;text-align: center !important"> Online Fee</span></p><br>

          <span class="ommni"> Account title: British Lyceum (PVT) Ltd </span> <br>
        
          <span class="ommni">  <strong>DIB A/C# &nbsp; 0630050001</strong></span></p><br>
            <span class="ommni">For queries contact: 0346-4292920 </span> <br>

       </div>
      </th>
    </tr>
    <tr>
      <th  class="border_r"colspan="3" style="padding: 10px;">
              
          <span style="float: left;"> Name:  {{$data->s_name}} </span>
          <br>
<br>
        <span style="float: left;"> ID: {{$data->id}} </span>
<br>      
      </th>
 <th  class="border_r"colspan="3" style="padding: 10px;">
              
          <span style="float: left;"> Name:  {{$data->s_name}}</span>
          <br>
          <br>

        <span style="float: left;"> <!-- {{$data->s_name}}  -->ID: {{$data->id}} </span>
      <br>
      </th>
       <th  class="border_r"colspan="3" style="padding: 10px;">
              
          <span style="float: left;"> Name:  {{$data->s_name}}</span>
          <br>
          <br>

        <span style="float: left;"> <!-- {{$data->s_name}}  -->ID: {{$data->id}} </span>
      
      </th>
    </tr>
    <tr>
      <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px;height: 80px;">
        Course studied 3 X {{$amount}}
       
      </td>
      <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px;height: 80px;">
        {{$total_amount}}/-
      </td>
  <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px;height: 80px;">
       Course studied 3 X {{$amount}}
      </td>
      <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px;height: 80px;">
        {{$total_amount}}/-
      </td>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px;height: 80px;">
       Course studied 3 X {{$amount}}
      </td>
      <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px;height: 80px;">
        {{$total_amount}}/-
      </td>
    </tr>

  
    <tr>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px;">
        Prev Balance 
      </td>
        <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px;">
       0
      </td>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px;">
        Prev Balance 
      </td>
        <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px;">
        0
      </td>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px;">
        Prev Balance 
      </td>
        <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px;">
        0
      </td>
        </tr>

    <tr>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px; ">
       Fee
      </td>
   <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px; ">
       0
      </td>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px; ">
       Fee
      </td>
   <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px; ">
       0
      </td>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px; ">
       Fee
      </td>
   <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px; ">
       0
      </td>
        </tr>

    <tr>
      <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px; ">
       Misc 
      </td>
      <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px; ">
     0
      </td>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px; ">
       Misc 
      </td>
      <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px; ">
      0
      </td>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px; ">
       Misc 
      </td>
      <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px; ">
         0
      </td>
        </tr>

    <tr>
      <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px; ">
       Sub Total
      </td>
       <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px; ">
       {{$total_amount}}/-
      </td>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px; ">
       Sub Total
      </td>
       <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px; ">
       {{$total_amount}}/-
      </td>
       <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px; ">
       Sub Total
      </td>
       <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px; ">
       {{$total_amount}}/-
      </td>
    </tr>


  
     

    <tr >

      <th  class="border_r" colspan="2" style="padding: 5px;">
        <p>Total Payable</p>
       <p style="font-size: 10"></p>
      </th>
      <th  class="border_r"colspan="1" style="padding: 5px;">
       {{$total_amount}}/-
     </th>
     <th  class="border_r" colspan="2" style="padding: 5px;">
       <p>Total Payable</p>
       <p style="font-size: 10"></p>
     </th>
     <th  class="border_r"colspan="1" style="padding: 5px;">
       {{$total_amount}}/-
     </th>
     <th  class="border_r" colspan="2" style="padding: 5px;">
       <p>Total Payable</p>
       <p style="font-size: 10"></p>

     </th>
     <th  class="border_r"colspan="1" style="padding: 5px;">
      {{$total_amount}}/-
    </th>
  </tr>
   <tr >

     <th  class="border_r" colspan="2" style="padding: 5px;">
      Payable after due date
      </th>
      <th  class="border_r"colspan="1" style="padding: 5px;">
       {{$total_amount}}/-
     </th>



     
    
    <th  class="border_r" colspan="2" style="padding: 5px;">
      Payable after due date
      </th>
      <th  class="border_r"colspan="1" style="padding: 5px;">
       {{$total_amount}}/-
     </th>
  
     <th  class="border_r" colspan="2" style="padding: 5px;">
      Payable after due date
      </th>
      <th  class="border_r"colspan="1" style="padding: 5px;">
       {{$total_amount}}/-
     </th>
   
  </tr>
   <tr >

      <th  class="border_r" colspan="3" style="padding: 5px;">
       Due date  <span>10-Oct-2020</span>
      </th>
     
     <th  class="border_r" colspan="3" style="padding: 5px;">
      Due date <span>10-Oct-2020</span>
     </th>
    
     <th  class="border_r" colspan="3" style="padding: 5px;">
      Due date <span>10-Oct-2020</span>
     </th>
    
  </tr>
</tbody>
</table>
@endforeach
  </body>
</html>
