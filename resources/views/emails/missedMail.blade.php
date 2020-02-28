


  <div style="width: 450px; border-bottom: 2px solid #000;">
      <img src="http://www.lyceumgroupofschools.com/images/school/americanlycesum.png">
 </div>
<h2 >Subject: Fee Deposit </h2>
@php($readEntry=0)
@foreach($data as $fee)
	@if($fee->status)
		@php($readEntry++)
	@endif
@endforeach

<strong>Sheet Name: @isset($sheet){{$sheet}} @endisset</strong>
<p>Total Entries: <strong>{{count($data)}}</strong> Read Entries:<strong>{{$readEntry}}</strong>, UnRead Entry:{{(count($data))-($readEntry)}}</p>



</div>
<div style="width: 50%;float: left;"><strong>Fee Deposit</strong></div><div style="width: 50%;float: right;"><span>: </span></div>
</div>
<table style="max-width: 550px;margin-top: 4px;">
  <tr style="background-color: #cbe6f3;">
    <th>FeeId</th>
    <th>Student Name</th>
    <th>Status</th>
    <th>Lay No</th>
    <th>Message</th>
  </tr>
  @foreach($data as $fee)
  <tr>
    <td>@isset($fee->feeId){{$fee->feeId}}@endisset</td>
    <td>@isset($fee->stdName){{$fee->stdName}}@endisset</td>
    <td>@if($fee->status){{'Success'}} @else {{'Failed!'}} @endif</td>
    <td>@isset($fee->transactionId){{$fee->transactionId}} @endisset</td>   
    <td>@if($fee->status){{' Fee Submit Successfully'}} @else {{'Failed To Update Record'}} @endif</td>
  </tr>
  @endforeach
  
</table>
