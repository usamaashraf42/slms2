@extends('_layouts.admin.default')
@section('title', 'Product sub Category Edit')
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="card-box">
                <div class="card-block">
                    <h4 class="card-title">Product sub Category Edit</h4>
                    
                    @component('_components.alerts-default')
                    @endcomponent
                    <form method="POST" action="{{ route('product-sub-category.update',$cat->id) }}" enctype = "multipart/form-data" id="upload_new_form">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row">
                    
                            <div class="col-md-12" style="margin-bottom: 20px;">
                                <div class="row" style="margin: 10px 0px;">
                                    <div class="col-md-4">
                                        <label class="control-label"> Category Name</label>
                                        <select name="parent_id" value="{{ old('pro_cat_name') }}" type="text" placeholder="Category Name" class="form-control">
                                            @foreach($categories as $ecat)
                                                <option value="{{$ecat->id}}" @if($ecat->id==$cat->parent_id) selected @endif>{{$ecat->pro_cat_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('parent_id'))
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <strong>Warning!</strong> {{$errors->first('parent_id')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="row" style="margin: 10px 0px;">
                                    <div class="col-md-4">
                                        <label class="control-label"> Name</label>
                                        <input name="pro_cat_name" value="{{ $cat->pro_cat_name }}" type="text" placeholder="Category Name" class="form-control">
                                        @if ($errors->has('pro_cat_name'))
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <strong>Warning!</strong> {{$errors->first('pro_cat_name')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                

                                
                                
                                
                            </div> 

                            <div class="row">
                                <div class="col-md-8"></div>  <div class="col-md-3">
                                    <ul class="list-inline pull-right">
                                        <li><button type="submit" class="btn btn-primary " name="submit">Save</button></li>

                                    </ul>  
                                </div>              
                            </div>
                        </div>
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

                // $('.branch_id').select2();


            </script>

            
            @endpush