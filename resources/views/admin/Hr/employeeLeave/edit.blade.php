


@extends('_layouts.admin.default')
@section('title', 'Human Resource')
@section('content')
<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Leaves </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard </a></li>
                    <li class="breadcrumb-item active">Leaves </li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Leave </a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <!-- Leave Statistics -->
    <div class="row">
     <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Leave </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times; </span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('leaves-requests.update',$data->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Leave Type  <span class="text-danger">* </span></label>
                    <select class="select form-control" name="leave_id">
                        <option selected="selected" disabled="disabled">Choose Leave Type </option>
                        @foreach($leaves as $leave)
                        <option value="{{$leave->id}}" @if($data->leave_id==$leave->id) selected @endif>{{$leave->leave_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>From  <span class="text-danger">* </span></label>
                    <div class="cal-icon">
                        <input class="form-control datetimepicker" name="leave_from" value="{{$data->leave_from}}" id="" type="text" />
                    </div>
                </div>
                <div class="form-group">
                    <label>To  <span class="text-danger">* </span></label>
                    <div class="cal-icon">
                        <input class="form-control datetimepicker" id="" name="leave_till" value="{{$data->leave_till}}" type="text" />
                    </div>
                </div>

                <div class="form-group">
                    <label>Leave Reason  <span class="text-danger">* </span></label>
                    <textarea rows="4" class="form-control" name="reason" placeholder="Going to hospital " name="Going to hospital ">{{$data->reason}}</textarea>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>



	

@endsection