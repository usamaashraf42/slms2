
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Fee Challan</title>
</head>
<style>
   .Row {
      display: table;
      width: 100%; /*Optional*/
      table-layout: fixed; /*Optional*/
      border-spacing: 2px; /*Optional*/
  }
  .Column {
      display: table-cell;
  }

  *{
    margin: 2px;
    padding: 2px;
    box-sizing: border-box;
    font-size: 14px;
  }
  html, body {
    height: 100%;
  }

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
 padding: 1px;
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

$amount=0;
$total_amount=3 * $amount;



// if($data->course_id>=183 && $data->course_id<=193){
//   $amount=1400;
//   $total_amount=3 * $amount;
// }

// if($data->course_id>=176 && $data->course_id<=179){
//   $amount=1200;
//   $total_amount=3 * $amount;
// }

// if($data->course_id>=163 && $data->course_id<=166){
//   $amount=700;
//   $total_amount=3 * $amount;
// }

// if($data->course_id>=163 && $data->course_id<=166 && $data->course_id>=15 && $data->course_id<=18){
//   $amount=700;
//   $total_amount=3 * $amount;
// }

if($data->course_id>=1 && $data->course_id<=11 ){
  $amount=990;
  $books=3;
  $total_amount=3 * $amount;
}

else if($data->course_id>=12 && $data->course_id<=15 ){
  $amount=990;
  $books=2;
  $total_amount=2 * $amount;
}
else{
  $amount=990;
  $books=1;
  $total_amount=1 * $amount;
}
// if($data->course_id>=194 && $data->course_id<=196){
//   $amount=990;
//   $total_amount=3 * $amount;
// }





?>
<body>
  <table  class="myTable" cellspacing="0" style="margin-top:2px;">
    <tbody>
      <tr>
      <th  class="border_r" colspan="3">

        <p style="padding: 12px!important; margin-top: 5px;"> <div style="text-align: right;font-weight: normal;font-size: 14px;"> BLIS  </div></p>

        <div style=" display: inline-block;margin-top: 0px;">
           <img src="https://www.lyceumgroupofschools.com/images/blis.png" style="" height="80" width="80" >
         </div>
          <div style=" display: inline-block;text-align: left">
              <p style="font-size: 18px;font-weight: 700;">British Lyceum (PVT) Ltd</p>
              <p style="font-size: 16px;">Online Fee</p>
          </div>

      </th>
      <th  class="border_r" colspan="3">
       <p style="padding: 12px!important; margin-top: 5px;"> <div style="text-align: right;font-weight: normal;font-size: 14px;"> Candidate  </div></p>

        <div style=" display: inline-block;margin-top: 0px;">
           <img src="https://www.lyceumgroupofschools.com/images/blis.png" style="" height="80" width="80" >
         </div>
          <div style=" display: inline-block;text-align: left">
              <p style="font-size: 18px;font-weight: 700;">British Lyceum (PVT) Ltd</p>
              <p style="font-size: 16px;">Online Fee</p>
          </div>
      </th>
      <th  class="border_r" colspan="3">
     <p style="padding: 12px!important; margin-top: 5px;"> <div style="text-align: right;font-weight: normal;font-size: 14px;"> Bank  </div></p>

        <div style=" display: inline-block;margin-top: 0px;">
           <img src="https://www.lyceumgroupofschools.com/images/blis.png" style="" height="80" width="80" >
         </div>
          <div style=" display: inline-block;text-align: left">
              <p style="font-size: 18px;font-weight: 700;">British Lyceum (PVT) Ltd</p>
              <p style="font-size: 16px;">Online Fee</p>
          </div>
      </th>
    </tr>
    <tr>
      <th  class="border_r"colspan="3" style="text-align: left;">
          <div style="display: inline-block;">
             <p style="font-size: 14px;"><strong style="font-size: 16px; font-weight: 700">Account Title:</strong> British Lyceum (PVT) Ltd</p>
          </div>
            
      </th>
      <th  class="border_r"colspan="3"  style="text-align: left;">

       <div style="display: inline-block;">
             <p style="font-size: 14px;"><strong style="font-size: 16px; font-weight: 700">Account Title:</strong> British Lyceum (PVT) Ltd</p>
          </div>
            
      </th>
      <th  class="border_r"colspan="3"  style="text-align: left;">

        <div style="display: inline-block;">
             <p style="font-size: 14px;"><strong style="font-size: 16px; font-weight: 700">Account Title:</strong> British Lyceum (PVT) Ltd</p>
          </div>
      </th>
    </tr>


     <tr>
      <th  class="border_r"colspan="3" style="text-align: left;">
         <div style="display: inline-block;">
              <img src="https://www.lyceumgroupofschools.com/images/dib.png" style="" height="35" width="90" > 
          </div>
           <div style=" display: inline-block;text-align: left">
            <p style="font-size: 14px;"><strong style="font-size: 16px; font-weight: 700">DIB A/C:</strong> 0630050001</p>
          </div>
            
      </th>
      <th  class="border_r"colspan="3"  style="text-align: left;">

          <div style="display: inline-block;">
              <img src="https://www.lyceumgroupofschools.com/images/dib.png" style="" height="35" width="90" > 
          </div>
           <div style=" display: inline-block;text-align: left">
            <p style="font-size: 14px;"><strong style="font-size: 16px; font-weight: 700">DIB A/C:</strong> 0630050001</p>
          </div>
            
      </th>
      <th  class="border_r"colspan="3"  style="text-align: left;">

       <div style="display: inline-block;">
              <img src="https://www.lyceumgroupofschools.com/images/dib.png" style="" height="35" width="90" > 
          </div>
           <div style=" display: inline-block;text-align: left">
            <p style="font-size: 14px;"><strong style="font-size: 16px; font-weight: 700">DIB A/C:</strong> 0630050001</p>
          </div>

      </th>
    </tr>
     <tr>
      <th  class="border_r"colspan="3" style="text-align: left;">
          <div style="display: inline-block;">
             <p style="font-size: 14px;"><strong style="font-size: 16px; font-weight: 700">For Any Query:</strong> 03-111-4444-92</p>
          </div>
            
      </th>
      <th  class="border_r"colspan="3"  style="text-align: left;">

       <div style="display: inline-block;">
              <p style="font-size: 14px;"><strong style="font-size: 16px; font-weight: 700">For Any Query:</strong> 03-111-4444-92</p>
          </div>
            
      </th>
      <th  class="border_r"colspan="3"  style="text-align: left;">

        <div style="display: inline-block;">
             <p style="font-size: 14px;"><strong style="font-size: 16px; font-weight: 700">For Any Query:</strong> 03-111-4444-92</p>
          </div>
      </th>
    </tr>



    <tr>
      <th  class="border_r" colspan="3" style="text-align: left;">

        <p > Name:  {{$data->s_name}} </p>
      
        <p > ID: {{$data->id}} </p>
      </th>
      <th  class="border_r" colspan="3" style="text-align: left;">

        <p > Name:  {{$data->s_name}} </p>
      
        <p > ID: {{$data->id}} </p>
      </th>
      <th  class="border_r" colspan="3" style="text-align: left;">

        <p > Name:  {{$data->s_name}} </p>
      
        <p > ID: {{$data->id}} </p>
      </th>
    </tr>
    <tr>
      <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px;height: 80px;">
        Course studied {{$books}} X {{$amount}}

      </td>
      <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px;height: 80px;">
        {{$total_amount}}/-
      </td>
      <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px;height: 80px;">
       Course studied {{$books}} X {{$amount}}
     </td>
     <td class="border_r" colspan="1" style="border-bottom:none;padding: 15px;height: 80px;">
      {{$total_amount}}/-
    </td>
    <td class="border_r" colspan="2" style="border-bottom:none;padding: 15px;height: 80px;">
     Course studied {{$books}} X {{$amount}}
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
   Due date  <span>10-{{date('m')}}-2020</span>
 </th>

 <th  class="border_r" colspan="3" style="padding: 5px;">
  Due date <span>10-{{date('m')}}-2020</span>
</th>

<th  class="border_r" colspan="3" style="padding: 5px;">
  Due date <span>10-{{date('m')}}-2020</span>
</th>

</tr>
</tbody>
</table>
@endforeach
</body>
</html>
