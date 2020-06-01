@extends('_layouts.admin.default')
@section('title', 'Orders ')
@section('content')
@php($classss=0)
<div class="content container-fluid" style="background-color: #fff;">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
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

  <div class="col-md-12">
    <input type='button' id='btn' value='All Record Print' onclick="printDivs(this,DivIdToPrint)" class="btn btn-primary float-center allrecord" style="width: 100%;">
  </div>
  <br><br>


  <br><br>

  <section class="outstanding">

    <div class="DivIdToPrint">

      <div  id="DivIdToPrint">

        <div class="row">
          <div class="col-md-12">
            <!-- Nav tabs -->
            <!-- <a href="{{route('maintenance.create')}}" class="btn btn-success btn-sm">Add Query</a><br><br> -->

            <div class="card">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" ><a href="#maintain" class="active" aria-controls="maintain" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Add order</span></a></li>
                <li role="presentation"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Pending order</span></a></li>
                <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Delivered order</span></a></li> 
                <li role="presentation" ><a href="#Cancelled" aria-controls="Cancelled" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Cancel order</span></a></li>                 
              </ul>

              <!-- Tab panes -->

              <div class="tab-content">
                @component('_components.alerts-default')
                @endcomponent
                <!-- //////////////////////////////////////////////// -->
                <div role="tabpanel" class="tab-pane active" id="maintain">  
                  <h4 class="card-title"> New Order</h4>
                  <form method="POST" action="{{ route('order.store') }}" enctype = "multipart/form-data" id="upload_new_form">
                    <input type="hidden" name="schoo_id" value="1" readonly="">
                    <div class="col-md-12">
                      {{csrf_field()}}
                      <div class="row">
                        <div class="col-md-4">
                          <label class="control-label" style="width: 100%;">School 
                            <span style="color: red">*</span>
                          </label>
                          <select class="form-control school_id" name="school_id" onchange="schoolHasBranch(this)"  id="school_id" required>
                            <option selected="selected" disabled="disabled">Select School</option>
                            @if(!empty($schools))
                            @foreach($schools as $category)
                            <option value="{{$category['id']}}" >{{$category['school_name']}}</option>
                            @endforeach
                            @endif
                          </select>
                          <p class="alert alert-danger school_id_error" style="display: none"></p>
                        </div>
                        <div class="col-md-4">
                          <label class="control-label" style="width: 100%;">Branch 
                            <span style="color: red">*</span>
                          </label>
                          <select class="form-control branch_id" name="branch_id"   id="branch_id" required>
                            <option selected="selected" disabled="disabled">Select branch</option>
                            @if(!empty($branches))
                            @foreach($branches as $category)
                            <option value="{{$category['id']}}" >{{$category['branch_name']}}</option>
                            @endforeach
                            @endif
                          </select>
                          <p class="alert alert-danger branch_id_error" style="display: none"></p>
                        </div>
                        <div class="col-md-3">
                          <label class="control-label">Type</label>
                          <select class="form-control type" name="type" id="type" type="number" step="any" value="0" min="0" required>
                            <option>Normal</option>
                            <option>Urgent</option>
                            <option>Emergency</option>
                          </select>
                          
                          @if ($errors->has('type'))
                          <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                              <span class="sr-only">Close</span>
                            </button>
                            <strong>Warning!</strong> {{$errors->first('type')}}
                          </div>
                          @endif
                        </div>
                      </div>
                        <!-- <div class="col-md-4">
                          <label class="control-label" style="width: 100%;">Category 
                            <span style="color: red">*</span>
                          </label>
                          <select class="form-control cat_id" name="cat_id" onchange="changeCategory(this)"  id="cat_id" required>
                            <option selected="selected" disabled="disabled">Select Category</option>
                            @if(!empty($categories))
                            @foreach($categories as $category)
                            <option value="{{$category['id']}}" >{{$category['pro_cat_name']}}</option>
                            @endforeach
                            @endif
                          </select>
                          <p class="alert alert-danger cat_id_error" style="display: none"></p>
                        </div>
                        <div class="col-md-4">
                          <label class="control-label" style="width: 100%;">Sub Category 
                            <span style="color: red">*</span>
                          </label>
                          <select class="form-control sub_cat_id"  name="sub_cat_id" id="sub_cat_id" onchange="SubCategoryHasProduct(this)">

                          </select>
                          <p class="alert alert-danger branch_id_error" style="display: none"></p>
                        </div>-->
                        <div class="row products">

                          <div class="col-md-4">
                            <label class="control-label">Select Product</label>
                            <select class="form-control pro_id product_ids"  name="pro_id[]"  onclick="get_products(this)" required>
                            </select>
                            
                          </div> 
                          <div class="col-md-4">
                            <label class="control-label">Qty</label>
                            <input class="form-control qty" name="qty[]" type="number" onkeyup="changeQtyProduct(this)" step="any" value="0" min="0" required>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Total Price</label>
                            <input class="form-control price" readonly name="price[]" type="number" step="any" value="0" min="0" required>

                          </div>
                          <div class="col-md-1">
                            <div class="btn btn-success deleteProduct" style="margin-top: 30px;">-</div>
                          </div>
                        </div>

                        <div class="addProducts" id="qualificationRows">



                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <label class="control-label">Description</label>
                            <textarea class="form-control description" name="description" id="description" placeholder="description"></textarea>
                          </div>
                          <div class="col-md-3">
                          </div>
                          <div class="col-md-1">
                            <div class="btn_ad_plus">
                              <div class="btn btn-success addQualification" style="padding: 5px 10px;;margin-top: 4px;">+</div>

                            </div>
                          </div>
                        </div>
                      </div>





                      <div class="form-group row">

                        <div class="card" style="width:100%">
                          <div class="card-block">
                            <div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
                              <button class="btn btn-primary ks-rounded"> Submit </button>
                              <button class="btn btn-success ks-rounded">Cancel</button>
                            </div>

                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="detail">      
                    <div class="nav_bva" style="margin-top: -20px;">
                    Pending Order</span>
                  </div>
                  <br>

                  <br>
                  <div class="table-responsive">
                    <table id="example" class="table border table-bordered ">
                      <thead>
                        <tr>
                          <th>Order Id</th>
                          <th>Branch </th>
                          <th>Student Name (id)</th>  
                          <th>Phone</th>  
                          <th>address</th>             
                          <th>Product </th>
                          <th>Qty</th>
                          <th>Price</th>
                          <th> Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @isset($orders)
                        @foreach($orders as $query)
                        <tr class="order_{{$query->order_id}}">
                          <td>{{$query->order_id}}</td>
                          <td>@isset($query->branch) {{$query->branch->branch_name}} @endisset </td>
                          <td>@isset($query->student) {{$query->student->s_name}} ({{$query->std_id}}) @endisset </td>

                          <td> @isset($query->phone) {{$query->phone}} @endisset</td>
                          <td> @isset($query->address) {{$query->address}} @endisset</td>
                        
                          <td>@isset($query->products) {{implode_product($query->products)}} @endisset </td>

                          <td> @isset($query->qty) {{$query->qty}} @endisset</td>
                          <td>@isset($query->price) {{$query->price}} @endisset </td>
                          <td>@isset($query->created_at) {{date("d M Y", strtotime($query->created_at))}} @endisset</td>
                          <td>
                            <a href="{{route('order.edit',$query->order_id)}}"  class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{route('deliver',$query->order_id)}}"  class="btn btn-warning btn-sm" onclick="deliverOrder({{$query->order_id}})">Deliver</a>
                            <a href="javascript:;"  class="btn btn-danger btn-sm" onclick="cancelOrder({{$query->order_id}})">Cancel</a>
                          </td>
                        </tr>
                        @endforeach
                        @endisset
                      </tbody>

                    </table>
                  </div>


                </div>

                <!-- ////////////////////////???????????????????????????????? -->

                <div role="tabpanel" class="tab-pane " id="home">      <div class="nav_bva" style="margin-top: -20px;">
                  Closed Queries<span>&nbsp;&nbsp;  </span>
                </div>
                <br>

                <br>

                <div class="table-responsive">
                  <table class="table" id="closed_products">
                    <thead>
                      <tr>
                        <th>Order Id</th>
                        <th>Branch </th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Product </th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th> Date</th>

                      </tr>
                    </thead>

                  </table>


                </div>
              </div>

              <!-- ?///////////////////////////////////////// here second tab start /////////////////////////////////////////////////////// -->
              <div role="tabpanel" class="tab-pane " id="Cancelled">      <div class="nav_bva" style="margin-top: -20px;">
                Cancel Order<span>&nbsp;&nbsp;  </span>
              </div>
              <br>

              <br>

              <div class="table-responsive">
                <table class="table" id="cancel_orders">
                  <thead>
                    <tr>
                      <th>Order Id</th>
                      <th>Branch </th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Product </th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th> Date</th>

                    </tr>
                  </thead>

                </table>


              </div>
            </div>



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
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
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


 </script>
 <script type="text/javascript">

   function cancelOrder(ids){
    swal({
      title: "Are you sure?",
      text: "You will be Cancel the Order!",
      icon: "warning",
      buttons: [
      'No, cancel it!',
      'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
          method:"POST",
          url:"{{route('cancelOrder')}}",
          data : {id:ids},
          dataType:"json",
          success: function (response) {
            console.log('id', response);

            if (response.status) {
              $('.order_'+ids).remove();
              maintaince_new();
              cancel_orders();
              swal(
                'Success!',
                'Notification Sent Successfully',
                'success'
                );

            } else {
             swal(
              'Oops...',
              'Something went wrong!',
              'error'
              )
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
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    })

  }

  function deliverOrder(ids){
    console.log('deliverOrder',ids);
    $.ajax({
      method:"POST",
      url:"{{route('deliverOrder')}}",
      data : {id:ids},
      dataType:"json",
      success:function(response){
        console.log('deliverOrder',response);
        if(response.status){
          $('.order_'+ids).remove();

        }

      }
    });
  }
  // function cancelOrder(ids){
  //   console.log('cancelOrder',ids);
  //   $.ajax({
  //     method:"POST",
  //     url:"{{route('cancelOrder')}}",
  //     data : {id:ids},
  //     dataType:"json",
  //     success:function(response){
  //       console.log('cancelOrder',response);
  //       if(response.status){
  //         $('.order_'+ids).remove();

  //       }

  //     }
  //   });
  // }


  var clone_html=``;

$(document).ready(function(){
    $(document).ready(function(){
      $(document).on('click', '.addQualification', function(e) {
         console.log('add product row');
        var htmlContent=`<div class="row products">

  <div class="col-md-4">
  <label class="control-label">Select Product</label>
  <select class="form-control pro_id product_ids"  name="pro_id[]"  onclick="get_products(this)" required>

  </select>

  </div> 
  <div class="col-md-4">
  <label class="control-label">Qty</label>
  <input class="form-control qty" name="qty[]" type="number" onkeyup="changeQtyProduct(this)" step="any" value="0" min="0" required>


  </div>
  <div class="col-md-3">
  <label class="control-label">Total Price</label>
  <input class="form-control price" readonly name="price[]" type="number" step="any" value="0" min="0" required>

  </div>
  <div class="col-md-1">
  <div class="btn btn-success" style="margin-top: 30px;">-</div>
  </div>
  </div>`;

        $('#qualificationRows').append(htmlContent);
      });
    });
    $(document).on('click', '.deleteProduct', function(e) {
      console.log('remove product row');
      $(this).parent().parent('.products').remove();
    });

  });
  function printDivs(eve,obj)
  {


    $("#"+$(obj).attr('id')).print();


  }

  maintaince_new();
  cancel_orders();
  function cancel_orders(){

    console.log('cancel_orders');
    $('#cancel_orders').DataTable().clear().destroy();
    var table = $('#cancel_orders').DataTable();

    table.destroy();
    $('#cancel_orders').DataTable( {
      "processing": true,
      "serverSide": true,

      "pageLength": 30,
      ajax: {

        "url":"<?= route('cancelled_orders') ?>",
        "dataType":"json",
        "type":"POST"
      },
      columns:[

      
      {"data":"order_id","render":function(status,type,row){

        return row.order_id?row.order_id:'';

      }},
      {"data":"branch_id","render":function(status,type,row){

        return row.branch?row.branch.branch_name:'';

      }},
      {"data":"pro_id","render":function(status,type,row){

        return row.category?row.category.pro_cat_name:'';

      }},
      {"data":"pro_id","render":function(status,type,row){

        return row.sub_category?row.sub_category.pro_cat_name:'';

      }},
      {"data":"pro_id","render":function(status,type,row){

        return row.product?row.product.pro_name:'';

      }},
      
      {"data":"qty","render":function(status,type,row){

        return row.qty?row.qty:'';

      }},
      {"data":"price","render":function(status,type,row){

        return row.price?row.price:'';

      }},
      {"data":"created_at","render":function(status,type,row){

        return row.created_at?row.created_at:'';

      }},
      
      ]
    } );

  }
  function maintaince_new(){
    console.log('closed_products');
    $('#closed_products').DataTable().clear().destroy();
    var table = $('#closed_products').DataTable();

    table.destroy();
    $('#closed_products').DataTable( {
      "processing": true,
      "serverSide": true,

      "pageLength": 30,
      ajax: {

        "url":"<?= route('closedProduct') ?>",
        "dataType":"json",
        "type":"POST"
      },
      columns:[

      
      {"data":"order_id","render":function(status,type,row){

        return row.order_id?row.order_id:'';

      }},
      {"data":"branch_id","render":function(status,type,row){

        return row.branch?row.branch.branch_name:'';

      }},
      {"data":"pro_id","render":function(status,type,row){

        return row.category?row.category.pro_cat_name:'';

      }},
      {"data":"pro_id","render":function(status,type,row){

        return row.sub_category?row.sub_category.pro_cat_name:'';

      }},
      {"data":"pro_id","render":function(status,type,row){

        return row.product?row.product.pro_name:'';

      }},
      
      {"data":"qty","render":function(status,type,row){

        return row.qty?row.qty:'';

      }},
      {"data":"price","render":function(status,type,row){

        return row.price?row.price:'';

      }},
      {"data":"created_at","render":function(status,type,row){

        return row.created_at?row.created_at:'';

      }},
      
      ]
    } );
  }
</script>
<script type="text/javascript">
  function changeCategory(obj){
    console.log('cat_id',$(obj).val());

    $('.sub_cat_id').html(` <option selected="selected" disabled="disabled"> Select Sub Category  </option>`);
    $.ajax({
      method:"POST",
      url:"{{route('productCategoryHasSubCategory')}}",
      data : {id:$(obj).val()},
      dataType:"json",
      success:function(response){
        console.log('catHasSubCate',response);
        if(response.status){
          response.data.forEach(function(val,ind){
            var id = val.id;
            var name = val.pro_cat_name;
            var option = `<option value="${id}">${name}</option>`;
            $('.sub_cat_id').append(option);
          });
        }

      }
    });
  }
  function SubCategoryHasProduct(obj){
    console.log('cat_id',$(obj).val());

    $('.pro_id').html(` <option selected="selected" disabled="disabled"> Select product  </option>`);
    $.ajax({
      method:"POST",
      url:"{{route('SubCategoryHasProduct')}}",
      data : {id:$(obj).val()},
      dataType:"json",
      success:function(response){
        console.log('catHasSubCate',response);
        if(response.status){
          response.data.forEach(function(val,ind){
            var id = val.pro_id;
            var name = val.pro_name;
            var option = `<option value="${id}">${name}</option>`;
            $('.pro_id').append(option);
          });
        }

      }
    });
  }


  function changeQtyProduct(obj){
    var qty=parseInt($(obj).val());


    var pro_id=$(obj).parent().parent('.products').find('.product_ids').val();

    console.log('pro_id',pro_id);
    $.ajax({
      method:"POST",
      url:"{{route('productGetById')}}",
      data : {id:pro_id},
      dataType:"json",
      success:function(response){
        console.log('productGetById',response);
        if(response.status){
          var price=qty * response.data.price;
          $(obj).parent().parent('.products').find('.price').val(price);

        }

      }
    });

  }

  function schoolHasBranch(obj){
    $('.branch_id').html(` <option selected="selected" value='0'> Select School  </option>`);
    $.ajax({
      method:"POST",
      url:"{{route('schoolHasBranch')}}",
      data : {id:$(obj).val()},
      dataType:"json",
      success:function(response){
        console.log('kids',response);
        if(response.status){
          response.data.forEach(function(val,ind){
            var id = val.id;
            var name = val.branch_name;
            var option = `<option value="${id}">${name}</option>`;
            $('.branch_id').append(option);
          });
        }

      }
    });
  }
  function get_products(obj){
    $(obj).select2({
      ajax: {
        url: "{{route('get_product')}}",
        method:"post",
        dataType: 'json',
        processResults: function (_data, params) {

          var data1= $.map(_data, function (obj) {
            var newobj = {};
            newobj.id = obj.pro_id;
            newobj.text= `${obj.pro_name} `;
            return newobj;
          });
          return { results:data1};
        }
      }
    });
  }
  
</script>

@endpush
