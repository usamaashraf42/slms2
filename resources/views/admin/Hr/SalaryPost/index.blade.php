@extends('_layouts.admin.default')
@section('title', 'Salary Post')
@section('content')
<div class="content container-fluid">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card-box">

        <div class="card-block">
          <h4 class="card-title">Salary Post of {{get_month_name_by_no($month).'/'.$year}}</h4>
          <div class="heading-elements float-right">
            <!-- <a href="{{route('employee.create')}}">
              <button type="button" class="btn btn-success btn-min-width mr-1 mb-1">
                <i class="la la-plus">&nbsp;Add Employee</i>
              </button>
            </a>  -->
          </div>
          @component('_components.alerts-default')
          @endcomponent
          <div class="table-responsive">
            <table id="" class="table border table-bordered ">
              <thead>
                <tr>
                  <th></th>
                  <th>EmployeeId</th>
                  <th>Total Days</th>
                  <th>Absent</th>
                  <th>Leaves</th>
                  <th>holiday</th>
                  <th>E-off </th>
                  <th>Late</th>
                  <th>Comment</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 
                @isset($employees)
                @php($counter=1)
                @foreach($employees as $admin)

                <?php
                $presents=0;
                $absents=0;
                $leave_ids=0;
                $holiday_ids=0;

                $early_off=0;
                $late=0;

                $employeeDate=$admin->EmployeeDateByMonth($month,$year);
                $monthly_salary=isset($admin->Employeesalary->monthly_salary)?$admin->Employeesalary->monthly_salary:0;
                $ta=isset($admin->Employeesalary->ta)?$admin->Employeesalary->ta:0;
                $oneDay=$monthly_salary/$days;
                foreach ($employeeDate as $emp_day) {
                  if($emp_day->present){
                    $presents++;
                  }
                  if($emp_day->absent){
                    $absents++;
                  }
                  if($emp_day->leave_id){
                    $leave_ids++;
                  }
                  if($emp_day->holiday_id){
                    $holiday_ids++;
                  }
                }

              
            
                ?>
                
              
                <tr class="salaryPostedRow{{$admin->emp_id}}">
                  <input type="hidden" name="emp_ids[]" value="@isset($admin->emp_id){{$admin->emp_id}}@endisset">
                  <input type="hidden" name="month" value="{{$month}}">
                  <input type="hidden" name="year" value="{{$year}}">
                  <td>{{$counter++}}</td>
                  <td>@isset($admin->emp_id){{$admin->emp_id}}@endisset  @isset($admin->name){{$admin->name}}@endisset</td>

                  <td>{{$days}}</td>
                  <td>{{$days-$presents}}</td>
                  <td>{{$leave_ids}}</td>
                  <td>{{$holiday_ids}}</td>
                  <td>{{$early_off}}</td>
                  <td>{{$late}}</td>
                  <td><textarea class="form-control employee_comment_{{$admin->emp_id}}" name="employee_comment_{{$admin->emp_id}}"></textarea></td>
                  <td><button class="btn btn-success" data-ids="{{$admin->emp_id}}" onclick="salaryPost({{$admin->emp_id}})">Send</button></td>
                </tr>
                @endforeach
                @endisset
              </tbody>
              
            </table>
            
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

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
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
 </script>
 <script>




  function salaryPost(obj) {
    var id=parseInt(obj);
    var  comment=$('.employee_comment_'+id).val();
    var month=<?php echo $month; ?>;
    var year=<?php echo $year; ?>;

    console.log('comment',comment,'id',id);
      
      $.ajax({
        url: "{{route('emp.EmployeeSalaryPostTemp')}}",
        type: 'post',
        data: {
          'emp_id': id,
          'comment':comment,

          'month':month,
          'year':year
        },
        dataType: 'json',
        success: function (response) {
          console.log('EmployeeSalaryPostTemp', response);

          if (response.status) {

            $('.salaryPostedRow'+id).remove();
                toastr.success('Record Update Successfully');

          } else {
            alert(response.message);
          }
        },
        error: function () {
          swal(
            'Oops...',
            'Something went wrong!',
            'error'
            )
        }
      });
    
  }



        </script>

        @endpush