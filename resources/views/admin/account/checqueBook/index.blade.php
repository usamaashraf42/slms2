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
      .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
      .nav-tabs > li > a { border: none; color: #ffffff;background: #5a4080; }
      .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #5a4080 !important; background: #fff; }
      .nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
      .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
      .tab-nav > li > a::after { background: ##5a4080 none repeat scroll 0% 0%; color: #fff; }
      .tab-pane { padding: 15px 0; }
      .tab-content{padding:20px}
      .nav-tabs > li  {width:20%; text-align:center;}
      .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
      body{ background: #EDECEC; padding:50px}

      @media all and (max-width:724px){
        .nav-tabs > li > a > span {display:none;} 
        .nav-tabs > li > a {padding: 5px 5px;}
      }

      @page { size: auto;  margin: 0mm; margin-right: 5px; }

    </style>

    <!-- <div class="col-md-12">
      <input type='button' id='btn' value='All Record Print' onclick="printDivs(this,DivIdToPrint)" class="btn btn-primary float-center allrecord" style="width: 100%;">
    </div>
    <br><br> -->
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


         <div class="container">
          <div class="row">
            <div class="col-md-12"> 
              <!-- Nav tabs -->
              <div class="card">
                <ul class="nav nav-tabs" role="tablist">

                  <li role="presentation" class="active"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Checque Available</span></a></li>
                  <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Checque Issued </span></a></li>
                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-user"></i>  <span>Checque Clear</span></a></li>
                  
                </ul>

                <!-- Tab panes -->

                <div class="tab-content">
                  <!-- //////////////////////////////////////////////// -->

                  <div role="tabpanel" class="tab-pane active" id="detail">      
                    <div class="nav_bva" style="margin-top: -20px;">
                      Checque Available
                    </div>

                    <div class="table-responsive">
                      <table class="table" id="available_checque">
                        <thead>
                          <tr>
                            <th></th>
                            <th style="max-width: 100px!important;"><strong><h4>Bank</h4></strong></th>
                            <th> Account</th>
                            <th> Checque No</th>

                          </tr>
                        </thead>

                      </table>
                    </div>

                  </div>

                  <!-- ////////////////////////???????????????????????????????? -->

                  <div role="tabpanel" class="tab-pane " id="home">      <div class="nav_bva" style="margin-top: -20px;"><span>
                  Checque Issued </span>
                </div>


                <div class="table-responsive">
                  <table class="table" id="issued_checque">
                   <thead>

                    <tr>
                      <th></th>
                      <th style="max-width: 100px!important;"><strong><h4></h4></strong>Bank</th>
                      <th> Account</th>
                      <th> Checque No</th>
                      <th> Issued To</th>
                      <th>Issue Date</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                </table>
              </div>

            </div>





            <!-- ?///////////////////////////////////////// here second tab start /////////////////////////////////////////////////////// -->
            <div role="tabpanel" class="tab-pane" id="profile">



              <div class="table-responsive">
                <table class="table" id="clear_checque" >
                 <thead>

                  <tr>
                    <th></th>
                    <th style="max-width: 100px!important;"><strong><h4></h4>Bank</th>
                      <th> Account</th>
                      <th> Checque No</th>
                      <th> Issued To</th>
                      <th>Issue Date</th>
                      <th>Amount</th>
                      <th>Clear Date</th>
                    </tr>




                  </thead>





                </table>
              </div>

            </div>



            <!-- ////////////////////////////////// Second tab end here ??????????????????????????????????????????? -->
            <!-- //////////////////////////////////////// here third tab start?????????????????????????????????????????? -->

            <!--  //////////////////////// ?????????????????????????????????????? -->
          </div>

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


<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
<!-- <link href="{{asset('assets/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"> -->

<script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>


<script>
  
  $('#clear_checque').DataTable( {
    "processing": true,
    "serverSide": true,

    "pageLength": 30,
    ajax: {

      "url":"<?= route('ClearChecque') ?>",
      "dataType":"json",
      "type":"POST"
    },

    


    columns:[
    {"data":"id","render":function(id){
      return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input type="checkbox" class="checkboxes" value="'+id+'" />  <span></span></label>'; 
    },"searchable":false,"orderable":false},

    {"data":"bank","render":function(status,type,row){
      return row.bank?row.bank.bank_name:'';

    }},
    {"data":"account","render":function(status,type,row){
      console.log('acount',row.account);
      return `${row.account?row.account.name:''} (${row.account?row.account.type:''})`;

    }},
    {"data":"checque_no","render":function(status,type,row){
      return row.checque_no?row.checque_no:'';

    }},
    {"data":"detail","render":function(status,type,row){

      return row.detail.issue_account?row.detail.issue_account.name:'';

    }},
    {"data":"detail","render":function(status,type,row){
      return row.detail?row.detail.posting_date:'';

    }},

    {"data":"detail","render":function(status,type,row){
      return row.detail?row.detail.amount:'';

    }},
    {"data":"detail","render":function(status,type,row){
      return row.detail?row.detail.updated_at:'';

    }},
    ]
  } );
  $('#issued_checque').DataTable( {
    "processing": true,
    "serverSide": true,

    "pageLength": 30,
    ajax: {

      "url":"<?= route('IssuedChecque') ?>",
      "dataType":"json",
      "type":"POST"
    },
    columns:[
    {"data":"id","render":function(id){
      return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input type="checkbox" class="checkboxes" value="'+id+'" />  <span></span></label>'; 
    },"searchable":false,"orderable":false},

    {"data":"bank","render":function(status,type,row){
      return row.bank?row.bank.bank_name:'';

    }},
    {"data":"account","render":function(status,type,row){
      return `${row.account?row.account.name:''} (${row.account?row.account.type:''})`;

    }},
    {"data":"checque_no","render":function(status,type,row){
      return row.checque_no?row.checque_no:'';

    }},
    {"data":"detail","render":function(status,type,row){
      console.log('detail',row);
      return row.detail.issue_account?row.detail.issue_account.name:'';

    }},
    {"data":"detail","render":function(status,type,row){
      return row.detail?row.detail.posting_date:'';

    }},

    {"data":"detail","render":function(status,type,row){
      return row.detail?row.detail.amount:'';

    }},
    ]
  } );

  $('#available_checque').DataTable( {
    "processing": true,
    "serverSide": true,

    "pageLength": 30,
    ajax: {

      "url":"<?= route('AvailableChecque') ?>",
      "dataType":"json",
      "type":"POST"
    },
    columns:[
    {"data":"id","render":function(id){
      return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input type="checkbox" class="checkboxes" value="'+id+'" />  <span></span></label>'; 
    },"searchable":false,"orderable":false},

    {"data":"bank","render":function(status,type,row){
      return row.bank?row.bank.bank_name:'';

    }},
    {"data":"account","render":function(status,type,row){
      return `${row.account?row.account.name:''} (${row.account?row.account.type:''})`;

    }},
    {"data":"checque_no","render":function(status,type,row){
      return row.checque_no?row.checque_no:'';

    }},




    
    ]
  } );
</script>

@endpush
