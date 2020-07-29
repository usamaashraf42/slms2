@extends('_layouts.admin.default')
@section('title', 'Statement')
@section('content')
@php($classss=0)
<div class="content container-fluid" style="background-color: #fff;">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <h4 class="card-title">Statement of @isset($employee->name) {{$employee->name}} ( {{$employee->emp_id}} )  @endisset</h4>
      <style type="text/css">



        .nav_bva{
         text-align: center;
         font-size: 20px;
         font-weight: bold;
       }
       .nav_bva1{
        text-align: left;
        font-size: 18px;

        width: 50%;
      }
      .total_navaq{
        width: 48%;
        display: inline-block;
      }
      .nav-tabs { border-bottom: 2px solid #DDD; }
      .nav-tabs > li a.active, .nav-tabs > li a.active:focus, .nav-tabs>li a.active:hover {
        width: 100%;
        outline: none;
        border: 1px solid #0071b3;
        padding-left: 5px;
        background-color: #0071b3;
        border-bottom-color: transparent;
      }
      .nav-tabs > li > a { border: none; color: #ffffff;background: #014772; }
      .nav-tabs > li.active > a, .nav-tabs > li > a:hover {
        border: none;
        color: #ffffff !important;
        background: #0282d0;
      }
      .nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
      .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
      .tab-nav > li > a::after { background: #5a4080 none repeat scroll 0% 0%; color: #fff; }
      .tab-pane { padding: 15px 0; }
      .tab-content{padding:20px}
      .nav-tabs > li {
        text-align: center;
        width: 250px;
        height: 50px;
        margin: 0px 4px;
      }
      .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
      @media all and (max-width:724px){
        .nav-tabs > li {
          float: left;
          margin-bottom: -1px;
          width: 46%!important;
        }
        .nav-pills > li > a, .nav-tabs > li > a {
          font-size: 12px;
          -webkit-border-radius: 2px 2px 0 0;
          -moz-border-radius: 2px 2px 0 0;
          -ms-border-radius: 2px 2px 0 0;
          -o-border-radius: 2px 2px 0 0;
          position: relative;
          display: block;
          padding: 10px 15px;
          border-radius: 2px 2px 0 0;
          margin-right: 2px;
          line-height: 1.42857143;
          border: 1px solid transparent;
          border-radius: 4px 4px 0 0;
        }
        .nav-tabs > li > a {padding: 5px 5px;}
      }
    }

    @page { size: auto;  margin: 0mm; margin-right: 5px; }

  </style>


       <div class="search-lists">
         <ul class="nav nav-tabs nav-tabs-solid">
           <!-- <li class="nav-item"><a class="nav-link active" href="#results_projects" data-toggle="tab">Salaries </a></li> -->
           <!-- <li class="nav-item"><a class="nav-link" href="#results_clients" data-toggle="tab">Profident Fund </a></li> -->

         </ul>
         <div class="tab-content">
           @component('_components.alerts-default')
           @endcomponent

           <div class="tab-pane show active" id="results_projects">

             <div class="row">
              <div class="table-responsive">
                <table id="NewApplication" class="table border table-bordered " style="width:100%;">
                  <thead>
                   <tr>
                    <th></th>
                    <th>Month/year</th>
                    <th>Monthly Salary</th>
                    <th>Tax</th>
                    <th>TA</th>
                    <th>Total Days</th>
                    <th>Total Absent</th>
                    <th>Security</th>
                    <th>PF</th>
                    <th>Paid Amount</th>

                  </tr>
                </thead>
                <tbody>
                  @php($total_pf=0)
                  @php($total_given_salary=0)
                  @php($security=0)
                  @php($counter=1)
                  @foreach($salaries as $data)
                  <tr>
                    <td>{{$counter++}}</td>
                    <td>{{$data->month}}/ {{$data->year}}</td>
                    <td>{{$data->monthly_salary}}</td>
                    <td>{{$data->tax}}</td>
                    <td>{{$data->ta}}</td>
                    <td>{{$data->total_present + $data->total_absent }}</td>
                    <td>{{$data->total_absent}}</td>
                    <td>{{$data->security}}</td>
                    <td>{{$data->pf}}</td>
                      @php($total_pf+=$data->pf)
                      @php($total_given_salary+=$data->total_salary)
                      @php($security+=$data->security)

                    <td>{{$data->total_salary }}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="7"><strong>Total</strong></td>
                    <td>{{$security}}</td>
                    <td>{{round($total_pf)}}</td>
                    <td>{{round($total_given_salary)}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="tab-pane" id="results_clients">

         @component('_components.alerts-default')
         @endcomponent

         <div class="table-responsive">
          <table id="ShortApp" class="table border table-bordered " style="width:100%;">
            <thead>
              <tr>
               <th>Month / Year</th>
               <th>PF Rate </th>
               <th>PF amount</th>

             </tr>
           </thead>
           <tbody>
            
            @foreach($pfs as $pf)
            <tr>
             <td>{{$pf->month}} / {{$pf->year}}</td>
             <td>{{$pf->pf_amount}} </td>
             <td>{{$pf->total_pf_amount}}</td>

           </tr>

           @endforeach
           <tr>
             <td colspan="2"><strong>Total</strong></td>
             <td>{{$total_pf}}</td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>



 </div>
</div>

</div>
</div>
<!-- /Content End -->

</div>
<!-- /Page Content -->

@endsection

@push('post-scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
<script type="text/javascript">
	function printDivs(eve,obj)
	{


		$("#"+$(obj).attr('id')).print();


	}
</script>


<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<!-- <link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> -->

<script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



@endpush
