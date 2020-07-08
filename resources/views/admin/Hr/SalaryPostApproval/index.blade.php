@extends('_layouts.admin.default')
@section('title', 'Salary Approval')
@section('content')
<div class="content container-fluid">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card-box">

        <div class="card-block">
          <h4 class="card-title">Salary Approval of {{get_month_name_by_no($month).'/'.$year}}</h4>
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
                  <th>EmployeeId</th>
                  <th>Monthly Salary</th>
                  <th>Comment</th>
                  <th>Absent</th>

                  <th>Leaves</th>
                  <th>App Leave</th>

                  <th>E.off</th>
                  <th>App E.off</th>

                  <th>Late</th>
                  <th>App late</th>


                  <th>Advance</th>
                  <th>Security</th>
                  <th>Tax</th>
                  <th>T.A</th>
                  <th>PF rate</th>
                  <th>PF</th>
                  <th>Given Salary</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
               <!--  <form method="POST" action="{{route('salaryPosted')}}"  enctype = "multipart/form-data">
                  @csrf -->
                  @php($counter=1)
                  @isset($employees)
                  @foreach($employees as $admin)
                  <input type="hidden" class="days" value="{{$admin->total_days}}  ">
                  <input type="hidden" name="month" value="{{$month}}">
                  <input type="hidden" name="year" value="{{$year}}">

                <tr class="realSalaryPost_{{$admin->emp_id}}">
                  <input type="hidden" name="emp_ids[]" value="@isset($admin->emp_id){{$admin->emp_id}}@endisset">
                
                  <input type="hidden" class="salary_emp_{{$admin->emp_id}}" value="@isset($admin->monthly_salary){{$admin->monthly_salary}}@endisset">

                 
                  <td>@isset($admin->emp_id){{$admin->emp_id}}@endisset @isset($admin->employee->name){{$admin->employee->name}}@endisset</td>
                  <td>@isset($admin->monthly_salary){{$admin->monthly_salary}}@endisset</td>

                  <td>{{$admin->requested_comment}}</td>

                  <td>{{$admin->absent}}  <input  name="absent_emp_id_{{$admin->emp_id}}" class="absent_emp_id_{{$admin->emp_id}} absent" data-ids="{{$admin->emp_id}}" value="{{$admin->absent}}" style="max-width: 51px"></td>

                  <td>{{$admin->leaves}}  </td>

                  <td><input class="leave_emp_id_{{$admin->emp_id}} leave" name="leave_emp_id_{{$admin->emp_id}}" data-ids="{{$admin->emp_id}}" value="{{$admin->leaves}}" style="max-width: 51px"></td>

                   <td>{{$admin->e_off}}  </td>
                   <td><input class="e_off_emp_id_{{$admin->emp_id}} e_off" name="e_off_emp_id_{{$admin->emp_id}}" data-ids="{{$admin->emp_id}}" value="{{$admin->e_off}}" style="max-width: 51px"></td>

                  <td>{{$admin->late}} </td>
                  <td> <input class="late_emp_id_{{$admin->emp_id}} late" name="late_emp_id_{{$admin->emp_id}}" data-ids="{{$admin->emp_id}}" value="{{$admin->late}}" style="max-width: 51px"></td>

                  <td>{{$admin->advance_deduction}}  <input  name="advance_emp_id_{{$admin->emp_id}}" class="advance_emp_id_{{$admin->emp_id}} absent" value="{{$admin->advance_deduction}}" data-ids="{{$admin->emp_id}}" style="max-width: 51px"></td>

                  <td>{{$admin->security}}  <input class="security_emp_id_{{$admin->emp_id}} security" name="security_emp_id_{{$admin->emp_id}}" data-ids="{{$admin->emp_id}}" value="{{$admin->security?$admin->security:0}}" style="max-width: 51px"></td>

                  <td>{{$admin->tax}}  <input class="tax_emp_id_{{$admin->emp_id}} tax" name="tax_emp_id_{{$admin->emp_id}}" data-ids="{{$admin->emp_id}}" value="{{$admin->tax}}" style="max-width: 51px"></td>

                  <td>{{$admin->ta}}  <input class="ta_emp_id_{{$admin->emp_id}} ta" name="ta_emp_id_{{$admin->emp_id}}" data-ids="{{$admin->emp_id}}" value="{{$admin->ta}}" style="max-width: 51px"></td>

           
                  <td>{{$admin->pf}}  <input class="pf_emp_id_{{$admin->emp_id}} pf" name="pf_emp_id_{{$admin->emp_id}}" data-ids="{{$admin->emp_id}}" value="{{$admin->pf}}" style="max-width: 51px"></td>

                  <td class="pf_{{$admin->emp_id}}">{{round($admin->pf_deduction,2)}}</td>

                  <td class="emp_given_salary_{{$admin->emp_id}}">{{ round(($admin->given_salary ),2) }}</td>
                  <td><button class="btn btn-success" data-ids="{{$admin->emp_id}}" onclick="RealSalaryPost({{$admin->emp_id}})">Post</button></td>
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


 $('.absent').add('.leave').add('.tax').add('.e_off').add('.late').add('.present_days').add('.advance_deduction').add('.security').add('.pf').add('.ta').on('keyup keypress blur change',function(obj) {

      var ids=parseInt($(this).attr('data-ids'));
      var days=parseInt($('.days').val());
      var monthly=parseFloat($('.salary_emp_'+ids).val());
      var salary=parseFloat($('.salary_emp_'+ids).val());
      var today_salary=parseFloat(monthly/days);
      var fourth_salary=parseFloat(today_salary/4);

      var ta= parseFloat($('.ta_emp_id_'+ids).val());
      var tax= parseFloat($('.tax_emp_id_'+ids).val());
      var security= parseInt($('.security_emp_id_'+ids).val());
      var leave= parseInt($('.leave_emp_id_'+ids).val());
      var absent= parseInt($('.absent_emp_id_'+ids).val());

      var late= parseInt($('.late_emp_id_'+ids).val());
      var e_off= parseInt($('.e_off_emp_id_'+ids).val());

      var pf=parseInt($('.pf_emp_id_'+ids).val());




      



      var absent_fine=absent*today_salary;
      var late_fine=0;
      if(late && late>2){
        late_fine=(late-2)*fourth_salary;
      }
     var e_off_fine=0;
      if(e_off && e_off>2){
        e_off_fine=(e_off-2)*fourth_salary;
      }




      var monthly_salary=parseInt(today_salary*days)+ta-tax-security-absent_fine-late_fine-e_off_fine;

      var pf_amount=(monthly_salary*pf)/100;

      monthly_salary=monthly_salary-pf_amount;

      console.log('ids',ids,'salary',salary,'days',days,'monthly_salary',monthly_salary,'ta',ta,'tax',tax,'security',security,'absent',absent_fine);

      $('.pf_'+ids).text('');
      $('.pf_'+ids).text(pf_amount);

      
      $('.emp_given_salary_'+ids).text('');
      $('.emp_given_salary_'+ids).text(monthly_salary);
  });

  function RealSalaryPost(id) {
    var ids=parseInt(id);

      var month=<?php echo $month; ?>;
      var year= <?php echo $year; ?>;
         var days=parseInt($('.days').val());

      var holidays=4;
      var ta=0;
      var security=parseInt($('.security_emp_id_'+ids).val());
      var absents=parseInt($('.absent_emp_id_'+ids).val());
      var leaves=parseInt($('.leave_emp_id_'+ids).val());
      var lates=parseInt($('.late_emp_id_'+ids).val());
      var e_offs=parseInt($('.e_off_emp_id_'+ids).val());
      var pf=parseInt($('.pf_emp_id_'+ids).val());

      var total_given_salary=parseFloat($('.emp_given_salary_'+ids).text());
  
      $.ajax({
        url: "{{route('realSalaryPosted')}}",
        type: 'post',
        data: {
          'emp_id': id,'month':month,'year':year,'holidays':holidays,'security':security,'pf':pf,'days':days,'ta':ta,'leaves':leaves,'absents':absents,'lates':lates,'e_offs':e_offs,'total_given_salary':total_given_salary

        },
        dataType: 'json',
        success: function (response) {
          console.log('id', response);

          if (response.status) {
            $('.realSalaryPost_'+ids).remove();
            swal(
              'Success!',
              'Salary Posted Sent Successfully',
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


 

        </script>

        @endpush