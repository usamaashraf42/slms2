@extends('_layouts.admin.default')
@section('title', 'User Attendance Mark')
@section('content')
@php($leaves=\App\Models\EmployeeLeaves::where('leave_status',1)->get())
@php($holidays=\App\Models\EmployeeHoliday::where('status',1)->get())

<div class="content container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col-sm-8">
              <h4 class="page-title">User Attendance Mark</h4>
              <br>
              <div style="float: left;margin-top: -15px;"><strong>{{$user->emp_id.'  '.$user->name}} &nbsp; &nbsp; @if($user->status=='0') <span class="badge badge-info">freeze</span> @else  @if($user->status) <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Deactive</span> @endif @endif</strong></div>
              <div  style="float: right; margin-top: -20px; float: right;">{{$user->phone}}  </div>
              <div style="width: 40%;"></div><br>
              <strong>Designation: </strong>{{$user->designation}} &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;,&nbsp; &nbsp;&nbsp; &nbsp;
              <strong>Roles:</strong> @isset($user->roles){{roleImplode($user->roles)}}@endisset
            </div>
           <!--  <div class="col-sm-4 text-right m-b-30">
              <a href="{{route('bank.create')}}" class="btn btn-primary rounded" ><i class="fa fa-plus"></i> Add New </a>
            </div> -->
          </div>
          <br>

          @component('_components.alerts-default')
          @endcomponent
          

          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="default-datatable" class="table">
                  <thead>
                    <tr>
                     <tr>
                      <th>Date </th>
                      <th>Day</th>
                      <th>Punch In </th>
                      <th>Punch Out</th>
                      <th>Holiday</th>
                      <th>Leave</th>

                    </tr>
                  </thead>
                  <body >
                    <form method="POST" action="{{route('attandance_mark')}}">
                      @csrf
                      <input type="hidden" name="emp_id" value="{{$user->emp_id}}">
                      <input type="hidden" name="month" value="{{$month}}">
                      <input type="hidden" name="year" value="{{$year}}">
                      @for($i=1; $i<=$month_days; $i++)
                      <tr>
                        <?php
                        $date="$year".'-'."$month".'-'."$i";
                        $atten_date="$i".'-'."$month".'-'."$year";
                        $att_date=$user->get_attandanceByMonth($date);
                        $nameOfDay = date('D', strtotime($date));
                        ?>
                        <input type="hidden" name="dates[]" value="{{$date}}">
                        <td>{{$atten_date}} </td>
                        <td>{{$nameOfDay}}</td>
                        <td>

                          <?php
                          $punch_in=null;
                          $punch_out=null;
                          $holiday_id=null;
                          $leave_id=null;
                          if(isset($user->get_attandanceByMonth($date)->attendance) && count($user->get_attandanceByMonth($date)->attendance)){
                              $attendance=count($user->get_attandanceByMonth($date)->attendance);
                              $punch_in=date('H:i', strtotime($user->get_attandanceByMonth($date)->attendance[0]->stamp));

                              $punch_out=date('H:i', strtotime($user->get_attandanceByMonth($date)->attendance[$attendance-1]->stamp));

                              $leave_id=$user->get_attandanceByMonth($date)->leave_id;
                              $holiday_id=$user->get_attandanceByMonth($date)->holiday_id;
                              

                          }


                          ?>
                          <input type="" name="punch_in_{{$date}}"  @if(!$leave_id && !$holiday_id) class="punch_in punch_in_{{$i}}" @else readonly @endif   value="@if(isset($punch_in) && $punch_in) {{$punch_in}} @endif"  placeholder="08:00">
                        </td>
                        <td><input type="" name="punch_out_{{$date}}"  @if(!$leave_id && !$holiday_id) class="punch_out  punch_out_{{$i}}" @else readonly @endif  value="@if(isset($punch_out) && $punch_out) {{$punch_out}} @endif"  placeholder="03:00"> </td>

                        <td><select name="holiday_{{$date}}">
                          <option  selected="selected" value="0">Choose the Holiday</option>
                          @foreach($holidays as $holiday)
                          <option value="{{$holiday->id}}" @if($holiday_id && $holiday_id==$holiday->id) selected @endif>{{$holiday->holiday_title}}</option>
                          @endforeach
                        </select></td>

                        <td><select name="leave_{{$date}}">
                          <option  selected="selected" value="0">Choose the Leave</option>
                          @foreach($leaves as $leave)
                          <option value="{{$leave->id}}" @if($leave_id && $leave_id==$leave->id) selected @endif>{{$leave->leave_name}}</option>
                          @endforeach
                        </select></td>
                      </tr>

                      @endfor

                    </body>
                  </table>
                  <div class="form-group row">

                    <div class="card" style="width:100%">
                      <div class="card-block">
                        <div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
                          <button class="btn btn-primary ks-rounded"> Submit </button>
                        </div>

                      </div>
                    </div>
                  </div>
                </form>
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
  <style type="text/css">
    .bootstrap-timepicker-widget table td input {
      width: 50px !important;
    }
    
  </style>
  @endpush
  @push('post-scripts')
  <script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />



  <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" />
  <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script>


  <link rel="stylesheet" href="{{asset('js/timeselect/jquery.timeselector.css')}}" />
  
    <script src="{{asset('js/timeselect/jquery.timeselector.js')}}"></script>


  <script>
    // $(".punch_in").inputmask({"mask": "99:99"});
    // $(".punch_out").inputmask({"mask": "99:99"});
    @for($i=1; $i<=$month_days; $i++)
    // $('.punch_in_'+{{$i}}).timepicker('setTime', null);


    $('.punch_in_'+{{$i}}).timeselector({
      
    });



    $('.punch_out_'+{{$i}}).timeselector({
      
    });
    @endfor


    // $(function() {
    //      showInputs: false

    //   $('.punch_in').daterangepicker({
    //     singleDatePicker: true,
    //     showDropdowns: true,
    //     minYear: 1980,
    //     timePicker: true,
    //     timePicker24Hour: true,
    //     timePickerIncrement: 10,
    //     autoUpdateInput: true,
    //     locale: {
    //       format: 'HH:mm',
    //     },
    //     maxYear: parseInt(moment().format('YYYY'),16)
    //   });


    // });
    // $(function() {
    //   $('.punch_out').daterangepicker({
    //     singleDatePicker: true,
    //     showDropdowns: true,
    //     minYear: 1980,
    //     timePicker: true,
    //     timePicker24Hour: true,
    //     timePickerIncrement: 10,
    //     autoUpdateInput: true,
    //     locale: {
    //       format: 'HH:mm',
    //     },
    //     maxYear: parseInt(moment().format('YYYY'),16)
    //   });


    // });
    function daysInMonth (month, year) {
      return new Date(year, month, 0).getDate();
    }

// July
function searchEmployee(){
  var year=$('#year').val();
  var month=$('#month').val();

  var totalday=parseInt(daysInMonth(month,year));
  console.log('totalday',totalday);

  var date = new Date('06/11/2019');

  var days = ["Monday","Tuesday","Wednesday","Thursday","Fridat","Saturday","Sunday"];
      // alert(days[date.getDay()]);
      var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];



// alert(monthNames[date.getMonth()]);

var html_content=``;
for(var i=0; i<totalday;i++){
  var date = new Date(`${i+1}/${totalday}/${year}`);
  console.log(date,'date');
  html_content+=`<tr>
  <td>${i+1}-${totalday}-${year} </td>
  <td>${days[date.getDay()]} </td>
  <td>Time In </td>
  <td>Time Out</td>
  <td>Leave</td>
  </tr>`;
}
console.log('html_content',html_content);
$('#employeeAttandance').html(html_content);

}

</script>

@endpush