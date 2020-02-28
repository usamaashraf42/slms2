@extends('_layouts.admin.default')
@section('title', 'Order Delivered')
@section('content')
<div class="content container-fluid">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="card-box">
        <div class="card-block">
          <h4 class="card-title">Order Delivered</h4>
          
          @component('_components.alerts-default')
          @endcomponent
          <form method="POST" action="{{ route('order.store') }}" enctype = "multipart/form-data" id="upload_new_form">
            <input type="hidden" name="schoo_id" value="1" readonly="">
            <div class="col-md-12">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-4">
                  <label class="control-label">Order ID</label>
                  <input class="form-control order_id" name="order_id" id="order_id" style="width: 100%;min-height: 40px;" value="{{$order->order_id}}" readonly>

                  @if ($errors->has('pro_name'))
                  <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      <span class="sr-only">Close</span>
                    </button>
                    <strong>Warning!</strong> {{$errors->first('pro_name')}}
                  </div>
                  @endif
                </div>
                <div class="col-md-4">
                  <label class="control-label" style="width: 100%;">School 
                    <span style="color: red">*</span>
                  </label>
                  <select class="form-control school_id" name="school_id" onchange="schoolHasBranch(this)"  id="school_id" readonly>
                    <option selected="selected" disabled="disabled">Select School</option>
                    @if(!empty($schools))
                    @foreach($schools as $category)
                    <option value="{{$category['id']}}" @if($order->school_id==$category['id']) selected @endif>{{$category['school_name']}}</option>
                    @endforeach
                    @endif
                  </select>
                  <p class="alert alert-danger school_id_error" style="display: none"></p>
                </div>
                <div class="col-md-4">
                  <label class="control-label" style="width: 100%;">Branch 
                    <span style="color: red">*</span>
                  </label>
                  <select class="form-control branch_id" name="branch_id"   id="branch_id" readonly>
                    <option selected="selected" disabled="disabled">Select branch</option>
                    @if(!empty($branches))
                    @foreach($branches as $category)
                    <option value="{{$category['id']}}" @if($order->branch_id==$category['id']) selected @endif>{{$category['branch_name']}}</option>
                    @endforeach
                    @endif
                  </select>
                  <p class="alert alert-danger branch_id_error" style="display: none"></p>
                </div>
              </div>
              <div class="row">
                
                <div class="col-md-4">
                  <label class="control-label">Select Product</label>
                  <select class="form-control pro_id product_ids" name="pro_id" id="pro_id" style="width: 100%;min-height: 40px;" required>
                    @if(!empty($products))
                    @foreach($products as $pro)
                    <option value="{{$pro['pro_id']}}" @if($order->pro_id==$pro['pro_id']) selected @endif> {{$pro['pro_name']}}</option>
                    @endforeach
                    @endif

                  </select>
                  @if ($errors->has('pro_name'))
                  <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      <span class="sr-only">Close</span>
                    </button>
                    <strong>Warning!</strong> {{$errors->first('pro_name')}}
                  </div>
                  @endif
                </div>
                <div class="col-md-4">
                  <label class="control-label">Qty</label>
                  <input class="form-control qty" name="qty" id="qty" type="number" onkeyup="changeQtyProduct(this)" step="any" value="0" min="0" required>

                  @if ($errors->has('qty'))
                  <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      <span class="sr-only">Close</span>
                    </button>
                    <strong>Warning!</strong> {{$errors->first('qty')}}
                  </div>
                  @endif
                </div>
                <div class="col-md-4">
                  <label class="control-label">Total Price</label>
                  <input class="form-control price" readonly name="price" id="price" type="number" step="any" value="0" min="0" required>

                  @if ($errors->has('price'))
                  <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      <span class="sr-only">Close</span>
                    </button>
                    <strong>Warning!</strong> {{$errors->first('price')}}
                  </div>
                  @endif
                </div>
              </div>
              <div class="row">

                
              

              </div>
              <div class="row">
                <div class="col-md-8">
                  <label class="control-label">Description</label>
                  <textarea class="form-control description" name="description" id="description" placeholder="description"></textarea>
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
      </div>
    </div>
    @endsection

    @push('post-styles')
    <link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    @endpush

    @push('post-scripts')
    <link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/multi-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/multi-select/jquery.multi-select.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/multi-select/select2.full.min.js')}}" type="text/javascript"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

      <script type="text/javascript">
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
        $("#images").change(function(){
          readURL(this);
        }); 
        $('#pro_id').select2({
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


      </script>



      @endpush