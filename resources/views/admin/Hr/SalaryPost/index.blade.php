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
                  <th>Name</th>
                  <th>Monthly Salary</th>
                  <th>Total Days</th>
                  <th>Absent</th>
                  <th>Leaves</th>
                  <th>holiday</th>
                  <th>Total Present</th>
                  <th>Paid Days</th>
                  <th>EOBI</th>
                  <th>Advance</th>
                  <th>Security</th>
                  <th>Tax</th>
                  <th>T.A</th>
                  <th>PF rate</th>
                  <th>PF</th>
                  <th>Given Salary</th>
                </tr>
              </thead>
              <tbody>
                <form method="POST" action="{{route('salaryPosted')}}"  enctype = "multipart/form-data">
                  @csrf


                
                @isset($employees)
                @php($counter=1)
                @foreach($employees as $admin)
                <?php
                $presents=0;
                $absents=0;
                $leave_ids=0;
                $holiday_ids=0;
                $employeeDate=$admin->EmployeeDateByMonth($month,$year);
                // dd($employeeDate);
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

                $pf=isset($payroll->pf)?$payroll->pf:0;
                $eobi=isset($payroll->eobi)?$payroll->eobi:0;
                $tax=isset($payroll->tax)?$payroll->tax:0;
                $paidDays=$presents + $leave_ids + $holiday_ids;
                $paidAmount=$paidDays * $oneDay;
                $pfAmount=$pf*$paidAmount/100;
                $advance=0;
                $security=0;
                $carry_forward=isset($admin->Employeesalary->carry_forward)?$admin->Employeesalary->carry_forward:0;

                $annual_salary=$monthly_salary*12;
                // dd($annual_salary);

                $incomeTax=\App\Models\IncomeTax::where('annual_start_amount','<=',$annual_salary)->where('annual_end_amount','>=',$annual_salary)->first();
                $fixTax=isset($incomeTax->fix_tax)?$incomeTax->fix_tax:0;
                $total_amount=$annual_salary - (isset($incomeTax->after_amount_percentage)?$incomeTax->after_amount_percentage:0);
                $per_amount_afterPrice=0;
                if($total_amount>0){
                  $per_amount_afterPrice= ($total_amount * (isset($incomeTax->per_tax)?$incomeTax->per_tax:0))/100;
                }
                $total_tax_amount_df=$per_amount_afterPrice + $fixTax;
                $eobi_deduction= ($eobi * $paidAmount/100);
                $total_given_salary=$paidAmount - $pfAmount - $total_tax_amount_df - $eobi_deduction - $security - $advance + $ta;
                
                ?>
                <tr>
                  <input type="hidden" name="emp_ids[]" value="@isset($admin->emp_id){{$admin->emp_id}}@endisset">
                  <input type="hidden" name="month" value="{{$month}}">
                  <input type="hidden" name="year" value="{{$year}}">
                  <td>{{$counter++}}</td>
                  <td>@isset($admin->emp_id){{$admin->emp_id}}@endisset</td>
                  <td>@isset($admin->name){{$admin->name}}@endisset</td>
                  <td>@isset($monthly_salary){{$monthly_salary}}@endisset</td>

                  <td>{{$days}}</td>
                  <td>{{$days-$presents}}</td>
                  <td>{{$leave_ids}}</td>
                  <td>{{$holiday_ids}}</td>
                  <td>{{$presents}}</td>
                  <td>{{ $presents + $leave_ids + $holiday_ids}}</td>
                  
                  <td>{{$eobi_deduction}}</td>
                  <td>{{$advance}}</td>
                  <td>{{$security}}</td>
                  <td>{{$total_tax_amount_df}}</td>
                  <td>{{$ta}}</td>
                  <td>{{round($pf,2)}}</td>
                  <td>{{round($pfAmount,2)}}</td>
                  <td>{{ round(($total_given_salary ),2) }}</td>
                </tr>
                @endforeach
                @endisset
              </tbody>
              
            </table>
            <div class="card" style="width:100%">
              <div class="card-block">
                <div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
                  <button class="btn btn-primary ks-rounded" type="submit"> Salary Post </button>
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


  /*showing confirm cancel popup box*/
  function showConfirm() {
    return confirm("Are You Sure You Want To Update This Account?");
  }

  function resend(id) {
    var val = showConfirm();
    if (val) {
      $.ajax({
        url: "#",
        type: 'post',
        data: {
          'id': id
        },
        dataType: 'json',
        success: function (response) {
          console.log('id', response);

          if (response.status == "200") {

            swal(
              'Success!',
              'Notification Sent Successfully',
              'success'
              );

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
  }


  /*showing confirm cancel popup box*/
  function showConfirmDelete() {
    return confirm("Are You Sure You Want To Delete This Data?");
  }

  /*delete item */
  function deleteItem(id) {
    var val = showConfirmDelete();
    if (val) {
      $.ajax({
        url: "#",
        type: 'post',
        data: {
          'id': id
        },
        dataType: 'json',
        success: function (response) {
          console.log('id', response);

          if (response.status == "200") {

            swal(
              'Success!',
              'Shed Deleted Successfully',
              'success'
              );

            location.reload(true);

          } else {
            swal(
              'Warning!',
              response.message,
              'warning'
              );
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
  }

  /*showing update item modal on click*/
  function editItem(id) {
    $.ajax({
      url: 'admin/class/'+id+'/edit',
      type: 'get',
      data: {
        'id': id
      },
      success: function (response) {

        $("#show_edit_modal").html(response);
        jQuery("#updateCourse").modal('show');
      },
      error: function (e) {
        console.log('error', e);
      }
    });
  }

  /* On-click function to view  detail */
  function detail(id) {
    window.location = baseurl + '/shed/' + id;
  }



  $('.loader-img').hide();
  $("#addDataBtn").click(function (e) {


            var form = $('#addDataForm')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            console.log('formData', formData);
            console.log('form', form);
            $.ajax({
              url: "#",
              type: "POST",
              enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: formData,
                beforeSend: function () {
                  $('.loader-img').show();
                  $('#preloader').show();
                },
                complete: function () {
                  $('#preloader').fadeOut('slow', function () {
                    $(this).remove();
                  });
                  $('.loader-img').hide();
                },
                success: function (response) {
                  console.log('response', response);
                  if (response.status == '200') {



                    $('#add_shed').modal('hide');

                    $("#addDataForm")[0].reset();
                    $(".slim-btn-remove").click();

                    swal(
                      'Success!',
                      'Shed Added Successfully',
                      'success'
                      );
                    location.reload(true);
                  } else {
                    console.log('error blank', response.message);
                    swal(
                      'Warning!',
                      response.message,
                      'warning'
                      );
                  }
                }, error: function (e) {
                  console.log('error', e);
                  swal(
                    'Oops...',
                    'Something went wrong!',
                    'error'
                    )
                }
              });
            e.preventDefault();
          });

        </script>

        @endpush