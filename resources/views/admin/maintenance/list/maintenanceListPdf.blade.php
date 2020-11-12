
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Maintenance List</title>
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

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<body>
  <div class="Row" style="text-align: center">
    <h2>Maintenance List</h2>
  </div>
  <div class="Row">
    <div style="overflow-x:auto;">
      <table>
        <tr>
          <th>Branch</th>
          <th>Maintenance Assign</th>
          <th>Main Category</th>
          <th>Category</th>
          <th>Posted</th>
          <th>Time</th>
          <th>Description</th>
          <th>Remarks</th>
        </tr>

        @foreach($records as $data)
        <tr>
          <td>{{isset($data->branch->branch_name)?$data->branch->branch_name:''}}</td>
        
          <td>@isset($data->assignUser) {{$data->assignUser->name}} @endisset</td>
          
          <td>@isset($data->category->maintain_category) {{$data->category->maintain_category->main_name}} @endisset</td>
          <td>@isset($data->category) {{ $data->category->main_name }} @endisset</td>
          <td>@isset($data->posted_date) {{$data->posted_date}} @endisset</td>
         <td>
            @if(isset($data->category->maintain_category) && $data->category->maintain_category)                            
              {{$data->category->maintain_category->avg_time}} 
            @else
              @isset($data->category) {{ $data->category->avg_time }} @endisset
            @endif
                        
          </td>
         <td>@isset($data->description) {{$data->description}} @endisset</td>
          <td>@isset($data->remarks) {{$data->remarks}} @endisset</td>
        </tr>
     @endforeach
      </table>
  </div>

</body>
</html>
