

<li><strong>Full Name:</strong> <strong>{{$data->name.' '.$data->fname}}  </li>
<li><strong>Email:</strong> <strong>{{$data->email}}  </li>
<li><strong>Phone:</strong> <strong>{{$data->phone}}  </li>
<li><strong>School Study:</strong> <strong>{{$data->schoolStudy}}  </li>	
<li><strong>School Study:</strong> <strong>{{$data->event_name}}  </li>	
	
<li><strong>Address:</strong> <strong>{{$data->address}}  </li>
	@php($branchEmail=App\Models\Branch::where('b_id',$data->branch_id)->first())
<li><strong>Branch:</strong> @if(isset($branchEmail->branch_name) && !empty($branchEmail->branch_name)){{$branchEmail->branch_name}}@endif</li>