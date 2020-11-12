@extends('_layouts.admin.default')
@section('title', 'Maintaince ')
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

    <!-- <div class="col-md-12">
      <input type='button' id='btn' value='All Record Print' onclick="printDivs(this,DivIdToPrint)" class="btn btn-primary float-center allrecord" style="width: 100%;">
    </div>
    <br><br> -->
    

    <br><br>

    <section class="outstanding">

      <div class="DivIdToPrint">

        <div  id="DivIdToPrint">

          <div class="row">
            <div class="col-md-12">
              <!-- Nav tabs -->
              <a href="{{route('maintenance.create')}}" class="btn btn-success btn-sm">Add Request</a><br><br>

              <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" >
                    <a href="#maintain" class="active" aria-controls="maintain" role="tab" data-toggle="tab">
                      <i class="fa fa-home"></i>  <span>Add Request</span>
                    </a>
                  </li>
                  <li role="presentation">
                    <a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">
                      <i class="fa fa-home"></i>  <span>Pending Maintenance</span>
                    </a>
                  </li>
                  <li role="presentation">
                    <a href="#needApproval" aria-controls="needApproval" role="tab" data-toggle="tab">
                      <i class="fa fa-home"></i>  <span>Need Approval</span>
                    </a>
                  </li>
                  <li role="presentation" >
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                      <i class="fa fa-home"></i>  <span>Approval Resolved Maintenance</span>
                    </a>
                  </li>
                  <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                      <i class="fa fa-user"></i>  <span>Resolved Maintenance</span>
                    </a>
                  </li>
                  
                </ul>

                <!-- Tab panes -->

                <div class="tab-content">
                  <!-- //////////////////////////////////////////////// -->
                  <div role="tabpanel" class="tab-pane active" id="maintain">  
                    <h4 class="card-title"> New Maintenance</h4>
                    <form method="POST" action="{{ route('maintenance.store') }}" enctype = "multipart/form-data" id="upload_new_form">
                      <div class="col-md-12">
                        {{csrf_field()}}
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="branch_id">Branch Name</label>
                              <select class="branch_id" name="branch_id"  id="branch_id"  style="width: 100%;height: 40px;">
                                <option selected="selected" value="0">All Branches</option>
                                @if(!empty($branches))
                                @foreach($branches as $branch)
                                <option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
                                @endforeach
                                @endif
                              </select>
                              @if ($errors->has('branch_name'))
                              <label id="branch_name-error" class="error" for="branch_name" style="color: red">{{$errors->first('branch_name')}}</label>
                              @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="cat_id">Maintaince Category</label>
                              <select class="cat_id" name="cat_id"  id="cat_id" onchange="maintainCategory(this)"  style="width: 100%;height: 40px;">
                                <option selected="selected" disabled="disable" value="0">Choose the Category</option>
                                @if(!empty($categories))
                                @foreach($categories as $cat)
                                <option value={{$cat['id']}}>{{$cat['main_name']}}</option>
                                @endforeach
                                @endif
                              </select>
                              @if ($errors->has('cat_id'))
                              <label id="cat_id-error" class="error" for="cat_id" style="color: red">{{$errors->first('cat_id')}}</label>
                              @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label">Sub Category</label>
                              <select name="sub_id" type="text" id="sub_id" onchange="maintainceUser(this)" value="{{old('sub_id')}}" class="form-control sub_id" placeholder="School Name">
                              </select>
                              @if ($errors->has('sub_id'))
                              <label id="sub_id-error" class="error" for="sub_id" style="color: red">{{$errors->first('sub_id')}}</label>
                              @endif
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label">Select User</label>
                              <select name="user_id" type="text" id="user_id" value="{{old('user_id')}}" class="form-control user_id" placeholder="School Name">
                              </select>
                              @if ($errors->has('user_id'))
                              <label id="user_id-error" class="error" for="user_id" style="color: red">{{$errors->first('user_id')}}</label>
                              @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label">Select Type</label>
                              <select name="type" type="text" id="type" value="{{old('type')}}" class="form-control type" placeholder="School Name">
                                <option value="3">Normal</option>
                                <option value="2">Urgent</option>
                                <option value="1">Emergency</option>
                              </select>
                              @if ($errors->has('type'))
                              <label id="type-error" class="error" for="type" style="color: red">{{$errors->first('type')}}</label>
                              @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="fileinput fileinput-new" data-provides="fileinput" >
                              <div class="fileinput-new thumbnail" style="width: 250px; height: 250px;">
                                <img src="{{asset('images/no-image.png')}}" id="profile-img-tag" height="250" width = "250">

                              </div>
                            </div>
                            <div class="form-group">
                              <label for="images" class="btn btn-primary" style="position: relative;left: 50px;top: 20px;">Upload Proof</label>
                              <input type="file" id="images" value="{{ old('images') }}" name="images" class="hide" style="opacity: 0;">
                              @if ($errors->has('images'))
                              <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                  <span class="sr-only">Close</span>
                                </button>
                                <strong>Warning!</strong> {{$errors->first('images')}}
                              </div>
                              @endif
                            </div>

                            <div class="col-md-4">
                              <div class="form-group" style="padding: 0px; ">
                                <div class = "gallery"></div>
                              </div>
                            </div>
                          </div>

                        </div>
                        


                        <div class="row">

                          <div class="col-md-12">
                            <label class="control-label">Description</label>
                            <textarea name="description" type="text" value="" class="form-control" placeholder="Description"></textarea>
                            @if ($errors->has('description'))
                            <label id="description-error" class="error" for="description" style="color: red">{{$errors->first('description')}}</label>
                            @endif
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
                    New Maintenance Request</span>
                  </div>
                  <br>

                  <br>
                  <div class="table-responsive">
                    <table class="table  table-bordered" id="maintaince_new">
                      <thead>

                        <tr>
                          <th>Proof</th>
                          <th>Branch</th>
                          <th style="max-width: 100px!important;"><strong><h4> Maintenance Assign </h4></strong></th>
                          <th>Main Category</th>
                          <th> Category</th>
                          <th> Description</th>
                          <th> Remarks</th>
                          <th> Posted Date </th>

                          <th>Status</th>
                        </tr>
                      </thead>




                    </table>
                  </div>

                </div>

                <!-- ////////////////////////???????????????????????????????? -->

                <div role="tabpanel" class="tab-pane " id="needApproval">      <div class="nav_bva" style="margin-top: -20px;">
                  Need Approval from Higher level Maintaince<span>&nbsp;&nbsp;  </span>
                </div>
                <br>

                <br>

                <div class="table-responsive">
                  <table class="table table-bordered" id="maintaince_needApproval">
                    <thead>

                      <tr>
                        <th> Maintaince Image</th>
                        <th>Resolved Proof</th>
                        <th>Branch</th>
                        <th style="max-width: 100px!important;"><strong><h4> Maintenance Assign </h4></strong></th>
                        <th>Main Category</th>
                        <th> Category</th>
                        <th> Description</th>
                        <th> Remarks</th>
                        <th> Posted Date </th>

                        <th>Action</th>
                      </tr>
                    </thead>




                  </table>


                </div>
              </div>





              <!-- ?///////////////////////////////////////// here need approval tab /////////////////////////////////////////////////////// -->

                <div role="tabpanel" class="tab-pane " id="home">      <div class="nav_bva" style="margin-top: -20px;">
                  Approval Pending Maintaince<span>&nbsp;&nbsp;  </span>
                </div>
                <br>

                <br>

                <div class="table-responsive">
                  <table class="table table-bordered" id="maintaince_approval">
                    <thead>

                      <tr>
                        <th> Maintaince Image</th>
                        <th>Resolved Proof</th>
                        <th>Branch</th>
                        <th style="max-width: 100px!important;"><strong><h4> Maintenance Assign </h4></strong></th>
                        <th>Main Category</th>
                        <th> Category</th>
                        <th> Description</th>
                        <th> Remarks</th>
                        <th> Posted Date </th>

                        <th>Action</th>
                      </tr>
                    </thead>




                  </table>


                </div>
              </div>





              <!-- ?///////////////////////////////////////// here second tab start /////////////////////////////////////////////////////// -->
              <div role="tabpanel" class="tab-pane" id="profile">
               @php($counter=1)
               <div role="tabpanel" class="tab-pane " id="home">      <div class="nav_bva" style="margin-top: -20px;">
                Resolved Maintaince <span>&nbsp;&nbsp; {{date('M')}}/{{date('Y')}} </span>
              </div>
              <br>


              <br>

              <div class="table-responsive">
                <table class="table table-bordered" id="maintaince_resolved">
                  <thead>

                    <tr>
                      <th> Maintaince Image</th>
                      <th>Resolved Proof</th>
                      <th>Branch</th>
                      <th style="max-width: 100px!important;"><strong><h4> Maintenance Assign </h4></strong></th>
                      <th>Main Category</th>
                      <th> Category</th>
                      <th> Description</th>
                      <th> Remarks</th>
                      <th> Posted Date </th>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


<script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">


<script>
 

  function maintainCategory(obj){
    maintainceUser('obh');
    $("[name='sub_id']").html(` <option selected="selected" disable="disable" value="0"> Choose Sub Category  </option>`);
    var cat_id  = $(".cat_id").val();
    console.log('branch',$("[name='cat_id']").val());
    $('.branch').val(cat_id);
    $.ajax({
      method:"POST",
      url:"{{route('maintainSubCategory')}}",
      data : {id:cat_id},
      dataType:"json",
      success:function(res){
        console.log('categeroy',res);
        if(res.status){
          res.data.forEach(function(val,ind){
            var id = val.id;
            var name = val.main_name;
            var option = `<option value="${id}">${name} </option>`;
            $("[name='sub_id']").append(option);
          });
        }

      }
    });

  }

  function maintainceUser(edj){

    $("[name='user_id']").html(` <option selected="selected" disable="disable" value="0"> Choose the User  </option>`);
    var cat_id  = $(".cat_id").val();
    var sub_id=$('.sub_id').val();
    if(cat_id=='' || cat_id==undefined){
      cat_id=sub_id;
    }
    console.log('branch',$("[name='cat_id']").val());
    $('.branch').val(cat_id);
    $.ajax({
      method:"POST",
      url:"{{route('maintainceUser')}}",
      data : {id:cat_id},
      dataType:"json",
      success:function(res){
        console.log(res,'users');
        if(res.status){
          res.data.forEach(function(val,ind){
            var id = val.user.id;
            var name = val.user.name;
            var option = `<option value="${id}">${name} </option>`;
            $("[name='user_id']").append(option);
          });
        }

      }
    });
  }

  $('#account').select2({
    ajax: {
      url: "{{route('get_account')}}",
      method:"post",
      dataType: 'json',
      processResults: function (_data, params) {

        var data1= $.map(_data, function (obj) {
          var newobj = {};
          newobj.id = obj.id;
          newobj.text= `${obj.name} - (${obj.type}) `;
          return newobj;
        });
        return { results:data1};
      }
    }
  });



</script>
<script type="text/javascript">
  function printDivs(eve,obj)
  {


    $("#"+$(obj).attr('id')).print();


  }


  function resolved(ids){
    console.log('ids',$(ids).attr('data-ids'),ids);

    var idd=$(ids).attr('data-ids');
    $.ajax({
      url: "{{route('maintainceResolved')}}", 
      method:"POST",
      data:{id:idd},
      success: function(response){

        console.log('ajax call',response);
        if(response.status){
          if(response.status==1){
            $(ids).parent().parent('tr').remove();
            maintaince_new();
            maintaince_approval();
            maintaince_resolved();
            need_approval_maintenance();
            toastr.success('Record Update Successfully');
          }else{
            $(ids).parent().parent('tr').remove();
            maintaince_new();
            maintaince_approval();
            maintaince_resolved();
            need_approval_maintenance();
            toastr.warning('Failed to update');
          }

        }
        else{
         toastr.danger('Record not update');

       }
     }});
  }

  function approvedMaintainceHighLevel(ids){
    console.log('ids',$(ids).attr('data-ids'),ids);

    var idd=$(ids).attr('data-ids');
    var remarks=$('.remarks_'+idd).val();
    $.ajax({
      url: "{{route('approvedMaintainceHighLevel')}}", 
      method:"POST",
      data:{id:idd,remarks:remarks},
      success: function(response){

        console.log('ajax call',response);
        if(response.status){
          if(response.status==1){
            $(ids).parent().parent('tr').remove();
 
            maintaince_new();
            maintaince_approval();
            maintaince_resolved();
            need_approval_maintenance();
            toastr.success('Record Update Successfully');
          }else{
            maintaince_new();
            maintaince_approval();
            maintaince_resolved();
            need_approval_maintenance();
            $(ids).parent().parent('tr').remove();
            toastr.warning('Failed to update');
          }

        }
        else{
         toastr.danger('Record not update');
         
       }
     }});

  }

  function approvedMaintaince(ids){
    console.log('ids',$(ids).attr('data-ids'),ids);

    var idd=$(ids).attr('data-ids');
    var remarks=$('.remarks_'+idd).val();
    console.log('remarks',remarks);
    $.ajax({
      url: "{{route('approvedMaintaince')}}", 
      method:"POST",
      data:{id:idd,remarks:remarks},
      success: function(response){

        console.log('ajax call',response);
        if(response.status){
          if(response.status==1){
            $(ids).parent().parent('tr').remove();
 
            maintaince_new();
            maintaince_approval();
            maintaince_resolved();
            need_approval_maintenance();
            toastr.success('Record Update Successfully');
          }else{
            maintaince_new();
            maintaince_approval();
            maintaince_resolved();
            need_approval_maintenance();
            $(ids).parent().parent('tr').remove();
            toastr.warning('Failed to update');
          }

        }
        else{
         toastr.danger('Record not update');
         
       }
     }});
  }

  // <tbody>
  // @foreach($resolved_maintenance as $main)
  // <tr>
  // <td>@isset($main->branch) {{$main->branch->branch_name}} @endisset</td>
  // <td>@isset($main->assignUser) {{$main->assignUser->name}} @endisset</td>
  // <td>@isset($main->category->maintain_category) {{$main->category->maintain_category->main_name}} @endisset</td>
  // <td>@isset($main->category) {{ $main->category->main_name }} @endisset</td>
  // <td>@isset($main->description) {{$main->description}} @endisset</td>
  // <td>@isset($main->remarks) {{$main->remarks}} @endisset</td>
  // <td>@isset($main->posted_date) {{$main->posted_date}} @endisset</td>
  // <td></td>
  // </tr>
  // @endforeach
  // </tbody>
  maintaince_new();
  maintaince_approval();
  maintaince_resolved();
  need_approval_maintenance();

  function need_approval_maintenance(){
    $('#maintaince_needApproval').DataTable().clear().destroy();
    var table = $('#maintaince_needApproval').DataTable();

    table.destroy();

    $('#maintaince_needApproval').DataTable( {
      "processing": true,
      "serverSide": true,

      "pageLength": 30,
      ajax: {

        "url":"<?= route('maintainceNeedApprovalSearch') ?>",
        "dataType":"json",
        "type":"POST"
      },
      columns:[

      {"data":"images","render":function(status,type,row){

        return row.images?`<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/${row.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/${row.images}"  alt="${row.category?row.category?row.category.main_name:'':''}" height="60" width="60" style="border-radius: 50%!important;" />
        </a>`:
        `<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

      }},
      {"data":"resolved_images","render":function(status,type,row){

        return row.resolved_images?`<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/${row.resolved_images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/${row.resolved_images}"  alt="${row.category?row.category?row.category.main_name:'':''}" height="60" width="60" style="border-radius: 50%!important;" />
        </a>`:
        `<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

      }},
      {"data":"branch_id","render":function(status,type,row){

        return row.branch?row.branch.branch_name:'';

      }},
      {"data":"user_id","render":function(status,type,row){

        return row.assign_user?row.assign_user.name:'';

      }},
      {"data":"main_id","render":function(status,type,row){

        return row.category?row.category.maintain_category?row.category.maintain_category.main_name:'':'';

      }},
      {"data":"main_id","render":function(status,type,row){

        return row.category?row.category?row.category.main_name:'':'';

      }},

      {"data":"description","render":function(status,type,row){

        return row.description?row.description:'';

      }},
      {"data":"remarks","render":function(status,type,row){

        return row.remarks?row.remarks:'';

      }},
      {"data":"posted_date","render":function(status,type,row){

        return row.posted_date?row.posted_date:'';

      }},


      {"data":"type","render":function(status,type,row){

      var buttons = `<a href="javascript:;" class="btn btn-sm btn-success" data-ids="${row.id}" onclick="approvedMaintainceHighLevel(this)"> Approval </a>`;
      console.log('type_maintaince',buttons);
      return buttons;
      },"searchable":false,"orderable":false}



      ]
    } );
  }

  function maintaince_resolved(){
    $('#maintaince_resolved').DataTable().clear().destroy();
    var table = $('#maintaince_resolved').DataTable();

    table.destroy();

    $('#maintaince_resolved').DataTable( {
      "processing": true,
      "serverSide": true,

      "pageLength": 30,
      ajax: {

        "url":"<?= route('maintainceResolvedSearch') ?>",
        "dataType":"json",
        "type":"POST"
      },
      columns:[

      {"data":"images","render":function(status,type,row){

        return row.images?`<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/${row.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/${row.images}"  alt="${row.category?row.category?row.category.main_name:'':''}" height="60" width="60" style="border-radius: 50%!important;" />
        </a>`:
        `<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

      }},
      {"data":"resolved_images","render":function(status,type,row){

        return row.resolved_images?`<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/${row.resolved_images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/${row.resolved_images}"  alt="${row.category?row.category?row.category.main_name:'':''}" height="60" width="60" style="border-radius: 50%!important;" />
        </a>`:
        `<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

      }},
      {"data":"branch_id","render":function(status,type,row){

        return row.branch?row.branch.branch_name:'';

      }},
      {"data":"user_id","render":function(status,type,row){

        return row.assign_user?row.assign_user.name:'';

      }},
      {"data":"main_id","render":function(status,type,row){

        return row.category?row.category.maintain_category?row.category.maintain_category.main_name:'':'';

      }},
      {"data":"main_id","render":function(status,type,row){

        return row.category?row.category?row.category.main_name:'':'';

      }},

      {"data":"description","render":function(status,type,row){

        return row.description?row.description:'';

      }},
      {"data":"remarks","render":function(status,type,row){

        return row.remarks?row.remarks:'';

      }},
      {"data":"posted_date","render":function(status,type,row){

        return row.posted_date?row.posted_date:'';

      }},






      ]
    } );
  }


function maintaince_approval(){
    $('#maintaince_approval').DataTable().clear().destroy();
    var table = $('#maintaince_approval').DataTable();
    table.destroy();
  $('#maintaince_approval').DataTable( {
    "processing": true,
    "serverSide": true,

    "pageLength": 30,
    ajax: {

      "url":"<?= route('maintainceApprovedSearch') ?>",
      "dataType":"json",
      "type":"POST"
    },
    columns:[
    {"data":"images","render":function(status,type,row){

      return row.images?`<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/${row.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/${row.images}"  alt="${row.category?row.category?row.category.main_name:'':''}" height="60" width="60" style="border-radius: 50%!important;" />
      </a>`:
      `<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

    }},
    {"data":"resolved_images","render":function(status,type,row){

      return row.resolved_images?`<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/${row.resolved_images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/${row.resolved_images}"  alt="${row.category?row.category?row.category.main_name:'':''}" height="60" width="60" style="border-radius: 50%!important;" />
      </a>`:
      `<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

    }},

    {"data":"branch_id","render":function(status,type,row){

      return row.branch?row.branch.branch_name:'';

    }},
    {"data":"user_id","render":function(status,type,row){

      return row.assign_user?row.assign_user.name:'';

    }},
    {"data":"main_id","render":function(status,type,row){

      return row.category?row.category.maintain_category?row.category.maintain_category.main_name:'':'';

    }},
    {"data":"main_id","render":function(status,type,row){

      return row.category?row.category?row.category.main_name:'':'';

    }},

    {"data":"description","render":function(status,type,row){

      return row.description?row.description:'';

    }},
    {"data":"remarks","render":function(status,type,row){

      // return row.remarks?row.remarks:'';
      return `<textarea name="remarks_${row.id}" class="form-control remarks_${row.id}" placeholder="Remarks">${row.remarks}</textarea>`

    }},
    {"data":"posted_date","render":function(status,type,row){

      return row.posted_date?row.posted_date:'';

    }},
    


    {"data":"type","render":function(status,type,row){

      var buttons = `<a href="javascript:;" class="btn btn-sm btn-success" data-ids="${row.id}" onclick="approvedMaintaince(this)"> Satisfy </a>`;
      console.log('type_maintaince',buttons);
      return buttons;
    },"searchable":false,"orderable":false}

    
    ]
  } );
}

function maintaince_new(){
    $('#maintaince_new').DataTable().clear().destroy();
    var table = $('#maintaince_new').DataTable();

table.destroy();
  $('#maintaince_new').DataTable( {
    "processing": true,
    "serverSide": true,

    "pageLength": 30,
    ajax: {

      "url":"<?= route('maintainceSearch') ?>",
      "dataType":"json",
      "type":"POST"
    },
    columns:[

    {"data":"images","render":function(status,type,row){

      return row.images?`<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/${row.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/${row.images}"  alt="${row.category?row.category?row.category.main_name:'':''}" height="60" width="60" style="border-radius: 50%!important;" />
      </a>`:
      `<a class="example-image-link" href="http://lyceumgroupofschools.com/images/maintenance/no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lyceumgroupofschools.com/images/maintenance/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

    }},

    {"data":"branch_id","render":function(status,type,row){

      return row.branch?row.branch.branch_name:'';

    }},
    {"data":"user_id","render":function(status,type,row){

      return row.assign_user?row.assign_user.name:'';

    }},
    {"data":"main_id","render":function(status,type,row){

      return row.category?row.category.maintain_category?row.category.maintain_category.main_name:'':'';

    }},
    {"data":"main_id","render":function(status,type,row){

      return row.category?row.category?row.category.main_name:'':'';

    }},

    {"data":"description","render":function(status,type,row){

      return row.description?row.description:'';

    }},
    {"data":"remarks","render":function(status,type,row){

      return row.remarks?row.remarks:'';

    }},
    {"data":"posted_date","render":function(status,type,row){

      return row.posted_date?row.posted_date:'';

    }},
    


    {"data":"type","render":function(status,type,row){

      var buttons = row.type==1?'<a href="javascript:;" class="btn-sm btn-danger"> Emergency </a>':row.type==2?'<a href="javascript:;" class="btn-sm btn-warning"> Ungent </a>':row.type==3?'<a href="javascript:;" class="btn-sm btn-info"> Normal </a>':'';
      console.log('type_maintaince',buttons);
      return buttons;
    },"searchable":false,"orderable":false}

    
    ]
  } );
}
</script>

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

</script>
@endpush
