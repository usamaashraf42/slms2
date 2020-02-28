@extends('_layouts.admin.default')
@section('title', 'Branch Detail')
@section('content')
@php($classss=0)
<div class="content container-fluid" style="background-color: #fff;">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <style type="text/css">


        th ,td{
          border: 1px solid #000!important;
          text-align: center!important;
          font-size: 12px!important;

        }
        .table tr{
          border-top: 1px solid #000!important;
          border-bottom: 1px solid #000!important;
        }
        th{
          padding: 2px;
          padding: 0.55rem;
        }
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
      .table td{
        padding: .10rem!important;
        font-size: 12px!important;
      }
          .nav-tabs { border-bottom: 2px solid #DDD; }
     .nav-tabs > li a.active, .nav-tabs > li a.active:focus, .nav-tabs>li a.active:hover {
    width: 96%;
    outline: none;
    border: 1px solid #0071b3;
    padding-left: 5px;
    background-color: #0071b3;
    border-bottom-color: transparent;
}
.nav-tabs > li > a {
    border: none;
    color: #ffffff;
    background: #002774;
}
    .nav-tabs > li.active > a, .nav-tabs > li > a:hover {
    border: none;
    color: #ffffff !important;
    background: #028bec;
}
      .nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
      .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
      .tab-nav > li > a::after { background: #5a4080 none repeat scroll 0% 0%; color: #fff; }
      .tab-pane { padding: 15px 0; }
      .tab-content{padding:20px}
    .nav-tabs > li {
    width: 20%;
    text-align: center;
    height: 50px;
    margin: 0px 4px;
}
      .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
      body{ background: #EDECEC; padding:50px}

      @media all and (max-width:724px){
        .nav-tabs > li > a > span {display:none;} 
        .nav-tabs > li > a {padding: 5px 5px;}
      }
      @page { size: auto;  margin: 0mm; margin-right: 5px; }

    </style>

    <div class="col-md-12">
      <input type='button' id='btn' value='All Record Print' onclick="printDivs(this,DivIdToPrint)" class="btn btn-primary float-center allrecord" style="width: 100%;">
    </div>
    <br><br>
    @isset($month)
    <?php 
    $dateObj= DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F');
    ?>      
    @endisset
    @php($levelName='')

    <br><br>

    <section class="outstanding">

      <div class="DivIdToPrint">

        <div  id="DivIdToPrint">


         <div class="">
          <div class="row">
            <div class="col-md-12"> 
              <!-- Nav tabs -->
              <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active">
                    <a href="#detail" aria-controls="detail" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  
                      <span>Branch</span></a>
                    </li>
                    <li role="presentation" >
                      <a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  
                        <span>Franchise</span></a>
                      </li>
                    </ul>

                    <!-- Tab panes -->

                    <div class="tab-content">
                      <!-- //////////////////////////////////////////////// -->

                      <div role="tabpanel" class="tab-pane active" id="detail">      
                        <div class="nav_bva" style="margin-top: -20px;">
                          Branch Status <span>&nbsp;&nbsp;  </span>
                        </div>
                        <br>
                        <div style="float: left;margin-top: -15px;"><strong><h4> </h4></strong></div>
                        <br>
                        <div class="table-responsive">
                        <table class="table">
                          <thead>

                            <tr>
                              <th></th>
                              <th style="max-width: 100px!important;"><strong><h4>Branch Name</h4></strong></th>
                              <th> Total student</th>
                              <th> Annual Fee</th>
                              <th>Sch Fee</th>
                              <th>Net Fee</th>
                              <th>Monthly Net Fee</th>
                              <th>Avg fee/student</th>

                              <th>Salary</th>
                              <th>Rent</th>
                              <th>Utilities</th>
                              <th>Misc</th>
                              <th>expense</th>
                              
                              <th>Fee Posted</th>
                              <th>Fee Collected</th>
                              <th>Fee Outstanding</th>
                              <th>profile/loss</th>
                            </tr>
                          </thead>





                          <tbody>
                             @php($index=1)

                            @php($total_students=0)
                            @php($total_annual_fee=0)
                            @php($total_sch_fee=0)
                            @php($total_net_fee=0)
                            @php($total_current=0)
                            @php($total_salary=0)
                            @php($total_rent=0)
                            @php($total_utilities=0)
                            @php($total_misc=0)
                            @php($total_earning=0)


                          @foreach($records as $record)
                            @php($annual_fee=0)
                            @php($sch_fee=0)
                            @php($net_fee=0)
                            @php($stds=count($record->student)>0?count($record->student):1)
                           
                            @foreach($record->student as $std)
                              @php($annual_fee+=isset($std->studentFee->annual_fee)?$std->studentFee->annual_fee:0)
                              @php($sch_fee+=isset($std->studentFee->scholarship_of)?$std->studentFee->scholarship_of:0)
                              @php($net_fee+=isset($std->studentFee->Net_AnnualFee)?$std->studentFee->Net_AnnualFee:0)
                            @endforeach

                            @php($earning=0)
                            <tr>
                              <td>{{$index++}}</td>
                              <td style="max-width: 100px!important;"><strong>{{$record->branch_name}}</strong></td>
                              <td> {{count($record->student)}} @php($total_students+=count($record->student))</td>

                              <td> {{number_format($annual_fee)}} @php($total_annual_fee+=$annual_fee)</td>
                              <td>{{number_format($sch_fee)}} @php($total_sch_fee+=$sch_fee)</td>
                              <td>{{number_format($net_fee)}}  @php($total_net_fee+=$net_fee)</td>
                              @php($current=($net_fee)/12)
                              <td>{{number_format($current)}} @php($total_current+=$current)</td>
                              @php( $avg_fee=round((($current)/$stds)) )
                              <td>{{round((($current)/$stds))}}  </td>

                               <td>{{number_format($record->slary)}}  @php($total_salary+=$record->slary)</td>
                              <td>{{$record->Rent}}  @php($total_rent+=$record->Rent)</td>
                              <td>{{$record->utilities}} @php($total_utilities+=$record->utilities)</td>
                              <td>{{$record->Misc}}  @php($total_misc+=$record->Misc)</td>
                             

                              <td></td>
                              @php($earn=(($avg_fee)*(count($record->student))) )


                              
                              <td></td>
                              <td></td>
                              <td></td>
                              @php($earning=$earn - $record->Rent - $record->utilities - $record->Misc - (($record->slary)))
                              @php($total_earning+=$earning)
                           
                              <td>{{ number_format((float)$earning, 2, '.', '')  }}</td>
                            </tr>
                            @endforeach
                            <tr>
                              <td>{{$index-1}}</td>
                              <td>Total</td>
                              <td>{{$total_students}}</td>

                              <td>{{number_format($total_annual_fee)}}</td>
                              
                              <td>{{number_format($total_sch_fee)}}</td>
                              <td>{{number_format($total_net_fee)}}</td>
                              <td>{{number_format($total_current)}}</td>
                               <td>{{round((($total_current)/$total_students))}}</td>

                               <td>{{number_format($total_salary)}}</td>
                              <td>{{number_format($total_rent)}}</td>
                              <td>{{number_format($total_utilities)}}</td>
                              <td>{{number_format($total_misc)}}</td>

                              <td></td>
                             
                              
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>{{  number_format((float)$total_earning, 2, '.', '') }}</td>
                            </tr>
                            
                          </tbody>

                        </table>

                      </div>
                      </div>








                      <!-- ?///////////////////////////////////////// here second tab start /////////////////////////////////////////////////////// -->

                      <div role="tabpanel" class="tab-pane " id="home">      <div class="nav_bva" style="margin-top: -20px;">
                        Franchise Status <span>&nbsp;&nbsp; </span>
                      </div>
                      <br>
                      <div style="float: left;margin-top: -15px;"><strong><h4>Franchise status</h4></strong></div>

                      <br>


                      <div class="table-responsive">
                        <table class="table">
                          <thead>

                            <tr>
                              <th></th>
                              <th style="max-width: 100px!important;"><strong><h4>Branch Name</h4></strong></th>
                              <th> Total student</th>
                              <th> Annual Fee</th>
                              <th>Sch Fee</th>
                              <th>Net Fee</th>
                              <th>Monthly Net Fee</th>
                              <th>Avg fee/student</th>

                              <th>Slary</th>
                              <th>Rent</th>
                              <th>Utilities</th>
                              <th>Misc</th>
                              <th>expense</th>
                              <th>Fee Posted</th>
                              <th>Fee Collected</th>
                              <th>Fee Outstanding</th>
                              <th>profile/loss</th>
                            </tr>
                          </thead>





                          <tbody>
                             




                            @php($index=1)

                            @php($total_students=0)
                            @php($total_annual_fee=0)
                            @php($total_sch_fee=0)
                            @php($total_net_fee=0)
                            @php($total_current=0)
                            @php($total_salary=0)
                            @php($total_rent=0)
                            @php($total_utilities=0)
                            @php($total_misc=0)
                            @php($total_earning=0)


                          @foreach($franchisees as $record)
                            @php($annual_fee=0)
                            @php($sch_fee=0)
                            @php($net_fee=0)
                            @php($stds=count($record->student)>0?count($record->student):1)
                           
                            @foreach($record->student as $std)
                              @php($annual_fee+=isset($std->studentFee->annual_fee)?$std->studentFee->annual_fee:0)
                              @php($sch_fee+=isset($std->studentFee->scholarship_of)?$std->studentFee->scholarship_of:0)
                              @php($net_fee+=isset($std->studentFee->Net_AnnualFee)?$std->studentFee->Net_AnnualFee:0)
                            @endforeach

                            @php($earning=0)
                            <tr>
                              <td>{{$index++}}</td>
                              <td style="max-width: 100px!important;"><strong>{{$record->branch_name}}</strong></td>
                              <td> {{count($record->student)}} @php($total_students+=count($record->student))</td>

                              <td> {{number_format($annual_fee)}} @php($total_annual_fee+=$annual_fee)</td>
                              <td>{{number_format($sch_fee)}} @php($total_sch_fee+=$sch_fee)</td>
                              <td>{{number_format($net_fee)}}  @php($total_net_fee+=$net_fee)</td>
                              @php($current=($net_fee)/12)
                              <td>{{number_format($current)}} @php($total_current+=$current)</td>
                              @php( $avg_fee=round((($current)/$stds)) )
                              <td>{{round((($current)/$stds))}}  </td>

                               <td>{{number_format($record->slary)}}  @php($total_salary+=$record->slary)</td>
                              <td>{{$record->Rent}}  @php($total_rent+=$record->Rent)</td>
                              <td>{{$record->utilities}} @php($total_utilities+=$record->utilities)</td>
                              <td>{{$record->Misc}}  @php($total_misc+=$record->Misc)</td>
                             

                              <td></td>
                              @php($earn=(($avg_fee)*(count($record->student))) )
                              
                              <td></td>
                              <td></td>
                              <td></td>
                            @php($earn= $total_current *$total_students )
                            @php($earning=$earn - $record->Rent - $record->utilities - $record->Misc - (($record->slary)))
                              @php($total_earning+=$earning)
                           
                              <td>{{  number_format((float)$earning, 2, '.', '') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                              <td>{{$index-1}}</td>
                              <td>Total</td>
                              <td>{{$total_students}}</td>

                              <td>{{number_format($total_annual_fee)}}</td>
                              
                              <td>{{number_format($total_sch_fee)}}</td>
                              <td>{{number_format($total_net_fee)}}</td>
                              <td>{{number_format($total_current)}}</td>
                               <td>{{round((($total_current)/$total_students))}}</td>

                               <td>{{number_format($total_salary)}}</td>
                              <td>{{number_format($total_rent)}}</td>
                              <td>{{number_format($total_utilities)}}</td>
                              <td>{{number_format($total_misc)}}</td>

                              <td></td>
                             
                              
                              <td></td>
                              <td></td>
                              <td></td>
                           
                             <td>{{  number_format((float)$total_earning, 2, '.', '') }}</td>

                            </tr>


                             

                          </tbody>

                        </table>
                        </div>
                    </div>
                  </div>
               

                <!--  //////////////////////// ?????????????????????????????????????? -->


            </div>
          </div>



        </div>
      </div>

      <style>
        .total_nava{width: 32%;
          display: inline-block;
        }
        .sub_nava{
          width: 30%;
          float: right;
        }
      </style>
    </div>

    @endsection

    @push('post-scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
    <script type="text/javascript">
      function printDivs(eve,obj)
      {


        $("#"+$(obj).attr('id')).print();


      }
    </script>
    @endpush
