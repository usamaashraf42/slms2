<!DOCTYPE html>
<html>
<head>
	<title>fees</title>
</head>
<body>

	<table>
		<caption>Fees</caption>
		<thead>
			<tr>
				<th></th>
				<th>name</th>
				<th>link</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $record)
			<tr>
				<td>@isset($record->id){{$record->id}}@endisset  </td>
				<td>@isset($record->student){{$record->student->s_name}}@endisset  </td>
				<td><a href="{{route('fee.billing',($record->id))}}"> {{route('fee.billing',($record->id))}}</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>