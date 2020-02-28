@extends('_layouts.admin.default')
@section('title', 'Net Admission Status')
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
                         Branch Net Admission Status <span>&nbsp;&nbsp;  </span>
                         <p>{{date("d M Y", strtotime($from_date)) }} - {{date("d M Y", strtotime($till_date)) }} </p>
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
                              <th> Admitted</th>
                              <th>Left</th>
                              <th>Monthly Cash lost</th>
                              <th>Monthly Cash Come</th>
                              <th>Monthly Net Admission</th>

                              <th>Monthly Net Cash</th>
                              
                            </tr>
                          </thead>





                          <tbody>
                             @php($index=1)

                            @php($total_students=0)
                            @php($total_admitted_std=0)
                            @php($total_left_std=0)
                            @php($total_lost_fee=0)
                            @php($total_come_fee=0)

                          @foreach($records as $record)
                            @php($lost_fee=0)
                            @php($come_fee=0)
                            @php($net_fee=0)
                            @php($stds=count($record->student)>0?count($record->student):1)
                          
                            <tr>
                              <td>{{$index++}}</td>
                              <td style="max-width: 100px!important;"><strong>{{$record->branch_name}}</strong></td>
                              <td> {{count($record->student)}} @php($total_students+=count($record->student))</td>

                               <?php 
                                  $leftStd=$record->leftStd($from_date, $till_date);

                                  foreach ($leftStd as $lefti) {
                                    if(isset($lefti->student)){
                                      if(isset($lefti->student->studentFee)){
                                        $lost_fee+=$lefti->student->studentFee->Net_AnnualFee/12;
                                      }
                                    }
                                  }


                                  $admittedStd=$record->admittedStd($from_date, $till_date);
                                  foreach ($admittedStd as $admit) {
                                      if(isset($admit->studentFee)){
                                        $come_fee+=$admit->studentFee->Net_AnnualFee/12;
                                      }
                                    
                                  }

                                  
                                  
                              ?>


                              <td>{{count($record->admittedStd($from_date, $till_date))}}  @php($total_admitted_std+=count($record->admittedStd($from_date, $till_date)))</td>
                              <td>{{count($record->leftStd($from_date, $till_date))}}  @php($total_left_std+=count($record->leftStd($from_date, $till_date)))</td>
                              <td>{{number_format($lost_fee)}} @php( $total_lost_fee+=$lost_fee )</td>
                              <td>{{number_format($come_fee)}} @php( $total_come_fee+=$come_fee ) </td>
                              <td>{{count($record->admittedStd($from_date, $till_date)) - count($record->leftStd($from_date, $till_date))}}</td>
                              <td>{{number_format($come_fee - $lost_fee)}}</td>
                            </tr>
                          @endforeach

                          @php($net_stds=$total_admitted_std -  $total_left_std)
                          @php($net_amount=$total_come_fee - $total_lost_fee)

                            <tr>
                              <td>{{$index-1}}</td>
                              <td>Total</td>
                              <td>{{$total_students}}</td>
                              
                              <td>{{number_format($total_admitted_std)}} </td>
                              <td>{{number_format($total_left_std)}}</td>
                              <td>{{number_format($total_lost_fee)}}</td>
                              <td>{{number_format($total_come_fee)}}</td>
                              <td>{{($net_stds)}} </td>
                              <td>{{number_format($net_amount)}}</td>
                            </tr>
                            
                          </tbody>

                        </table>

                      </div>
                      </div>








                      <!-- ?///////////////////////////////////////// here second tab start /////////////////////////////////////////////////////// -->

                      <div role="tabpanel" class="tab-pane " id="home">      <div class="nav_bva" style="margin-top: -20px;">
                        Franchise Net Admission Status <span>&nbsp;&nbsp; </span>
                        <p>{{date("d M Y", strtotime($from_date)) }} - {{date("d M Y", strtotime($till_date)) }} </p>
                      </div>
                      <br>
                      <div style="float: left;margin-top: -15px;"><strong><h4></h4></strong>
                      </div>

                      <br>


                      <div class="table-responsive">
                        <table class="table">
                           <table class="table">
                          <thead>

                            <tr>
                              <th></th>
                              <th style="max-width: 100px!important;"><strong><h4>Branch Name</h4></strong></th>
                              <th> Total student</th>
                              <th> Admitted</th>
                              <th>Left</th>
                              <th>Cash lost</th>
                              <th>Cash Come</th>
                              <th>Net Admission</th>

                              <th>Net Cash</th>
                              
                            </tr>
                          </thead>





                          <tbody>
                             @php($index=1)

                            @php($total_students=0)
                            @php($total_admitted_std=0)
                            @php($total_left_std=0)
                            @php($total_lost_fee=0)
                            @php($total_come_fee=0)

                          @foreach($franchisees as $record)
                            @php($lost_fee=0)
                            @php($come_fee=0)
                            @php($net_fee=0)
                            @php($stds=count($record->student)>0?count($record->student):1)
                          
                            <tr>
                              <td>{{$index++}}</td>
                              <td style="max-width: 100px!important;"><strong>{{$record->branch_name}}</strong></td>
                              <td> {{count($record->student)}} @php($total_students+=count($record->student))</td>

                               <?php 
                                  $leftStd=$record->leftStd($from_date, $till_date);

                                  foreach ($leftStd as $lefti) {
                                   
                           



                                    if(isset($lefti->student)){
                                      if(isset($lefti->student->studentFee)){
                                        $std_lost_amount=$lefti->student->studentFee->Net_AnnualFee/12;
                                        $lost_fee+=$std_lost_amount;
                                      }
                                    }
                                  }


                                  $admittedStd=$record->admittedStd($from_date, $till_date);
                                  foreach ($admittedStd as $admit) {

                                    

                                      if(isset($admit->studentFee)){
                                        $New_come_fee=$admit->studentFee->Net_AnnualFee/12;
                                        $come_fee+=$New_come_fee;
                                      }
                                    
                                  }

                              ?>


                              <td>{{count($record->admittedStd($from_date, $till_date))}}  @php($total_admitted_std+=count($record->admittedStd($from_date, $till_date)))</td>
                              <td>{{count($record->leftStd($from_date, $till_date))}}  @php($total_left_std+=count($record->leftStd($from_date, $till_date)))</td>
                              <td>{{number_format($lost_fee)}} @php( $total_lost_fee+=$lost_fee )</td>
                              <td>{{number_format($come_fee)}} @php( $total_come_fee+=$come_fee ) </td>
                              <td>{{count($record->admittedStd($from_date, $till_date))}}</td>
                              <td>{{number_format($come_fee)}}</td>
                            </tr>
                          @endforeach
                          @php($net_stds=$total_admitted_std -  $total_left_std)
                          @php($net_amount=$total_come_fee - $total_lost_fee)
                            <tr>
                              <td>{{$index-1}}</td>
                              <td>Total</td>
                              <td>{{$total_students}}</td>
                              
                              <td>{{number_format($total_admitted_std)}} </td>
                              <td>{{number_format($total_left_std)}}</td>
                              <td>{{number_format($total_lost_fee)}}</td>
                              <td>{{number_format($total_come_fee)}}</td>
                              <td>{{($net_stds)}} </td>
                              <td>{{number_format($net_amount)}}</td>
                            </tr>
                            
                          </tbody>
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
