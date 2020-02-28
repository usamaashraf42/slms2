@extends('_layouts.admin.default')
@section('title', 'Query ')
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
                <li role="presentation" ><a href="#maintain" class="active" aria-controls="maintain" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Add Query</span></a></li>
                <li role="presentation"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Pending Query</span></a></li>
                <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>closed Query</span></a></li>                  
              </ul>

              <!-- Tab panes -->

              <div class="tab-content">
                @component('_components.alerts-default')
                @endcomponent
                <!-- //////////////////////////////////////////////// -->
                <div role="tabpanel" class="tab-pane active" id="maintain">  
                  <h4 class="card-title"> New Query</h4>
                  <form method="POST" action="{{ route('query.store') }}" enctype = "multipart/form-data" id="upload_new_form">
                    <input type="hidden" name="schoo_id" value="1" readonly="">
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
                              <option value={{$branch['id']}} @if(Auth::user()->branch_id==$branch['id']) selected @endif >{{$branch['branch_name']}}</option>
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
                            <label class="control-label">Name</label>
                            <input name="name" type="text" id="name" value="{{old('name')}}" class="form-control name" placeholder=" Name">

                            @if ($errors->has('name'))
                            <label id="name-error" class="error" for="name" style="color: red">{{$errors->first('name')}}</label>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label">Father Name</label>
                            <input name="father_name" type="text" id="father_name" value="{{old('father_name')}}" class="form-control name" placeholder="Father Name">

                            @if ($errors->has('father_name'))
                            <label id="father_name-error" class="error" for="father_name" style="color: red">{{$errors->first('father_name')}}</label>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="course_id">Grade</label>
                            <select class="course_id" name="course_id"  id="course_id"  style="width: 100%;height: 40px;">
                              <option selected="selected" value="0">All Course</option>
                              @if(!empty($courses))
                              @foreach($courses as $course)
                              <option value={{$course['id']}} >{{$course['course_name']}}</option>
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
                            <label class="control-label">Phone No</label>
                            <input name="phone_no" type="text" id="phone_no" value="{{old('phone_no')}}" class="form-control name" placeholder="Contact No">

                            @if ($errors->has('phone_no'))
                            <label id="phone_no-error" class="error" for="phone_no" style="color: red">{{$errors->first('phone_no')}}</label>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label">Reference By</label>
                            <select name="type" type="text" id="type" value="{{old('type')}}" class="form-control type" placeholder="School Name">
                              <option value="By Cable Ad">By Cable Ad</option>
                              <option value="Marketing">Marketing</option>
                              <option value="Social Media">Social Media</option>
                              <option value="Other">Other</option>
                            </select>
                            @if ($errors->has('type'))
                            <label id="type-error" class="error" for="type" style="color: red">{{$errors->first('type')}}</label>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <label class="control-label">Address</label>
                          <textarea name="address" type="text" value="" class="form-control" placeholder="address"></textarea>
                          @if ($errors->has('address'))
                          <label id="address-error" class="error" for="address" style="color: red">{{$errors->first('address')}}</label>
                          @endif
                        </div>

                        <div class="col-md-4">
                          <label class="control-label">Remarks</label>
                          <textarea name="remarks" type="text" value="" class="form-control" placeholder="Remarks"></textarea>
                          @if ($errors->has('remarks'))
                          <label id="remarks-error" class="error" for="remarks" style="color: red">{{$errors->first('remarks')}}</label>
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
                  New Query Request</span>
                </div>
                <br>

                <br>
                <div class="table-responsive">
                  <table id="example" class="table border table-bordered ">
                    <thead>
                      <tr>
                        <th>Query Id</th>
                        <th>Date</th>
                        <th>Branch</th>
                        <th>Name </th>
                        <th>Father Name </th>
                        <th>Contact No</th>
                        <th>Grade</th>
                        <th> Query Person</th>
                        <th>Reference</th>
                        <th> Address</th>
                        <th> Remarks</th>
                        <th>Follow ups</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @isset($queries)
                      @foreach($queries as $query)
                      <tr class="query_{{$query->id}}">
                        <td>{{$query->id}}</td>
                        <td>{{date("d M Y", strtotime($query->created_at))}}</td>
                        <td>@isset($query->branch) {{$query->branch->branch_name}} @endisset </td>
                        <td>@isset($query->name) {{$query->name}} @endisset </td>
                        <td> @isset($query->father_name) {{$query->father_name}} @endisset</td>
                        <td>@isset($query->contact_no) {{$query->contact_no}} @endisset </td>
                        <td>@isset($query->grade) {{$query->grade->course_name}} @endisset</td>
                        <td> @isset($query->queryBy) {{$query->queryBy->name}} @endisset</td>
                        <td> @isset($query->reference_by) {{$query->reference_by}} @endisset</td>
                        <td> @isset($query->address) {{$query->address}} @endisset</td>
                        <td> @isset($query->remarks) {{$query->remarks}} @endisset</td>
                        <td> @isset($query->followUps) {{count($query->followUps)}} @endisset</td>

                        <td>
                          <a href="{{route('query.edit',$query->id)}}"  class="btn btn-warning btn-sm">Edit</a>
                          <a href="javascript:;" onclick="queryClosed(this,{{$query->id}})"  class="btn btn-danger btn-sm">Closed</a> 
                          <a href="{{route('followUP',$query->id)}}" class="btn btn-primary btn-sm">Follow</a> 
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
                <table class="table" id="closed_queries">
                  <thead>

                    <tr>
                      <th>Query Id</th>
                      <th>Branch</th>
                      <th>Name </th>
                      <th>Father Name </th>
                      <th>Contact No</th>
                      <th>Grade</th>
                      <th> Query Person</th>
                      <th>Reference</th>
                      <th> Address</th>
                      <th> Remarks</th>
                      <th>Follow ups</th>
                    </tr>
                  </thead>




                </table>


              </div>
            </div>





            <!-- ?///////////////////////////////////////// here second tab start /////////////////////////////////////////////////////// -->



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

  /*showing confirm cancel popup box*/
  function queryClosed(obj,id) {
    swal({
      title: "Are you sure?",
      text: "You will be Close to Admission Query!",
      icon: "warning",
      buttons: [
      'No, cancel it!',
      'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
          url: "{{route('queryClosed')}}",
          type: 'post',
          data: {
            'id': id
          },
          dataType: 'json',
          success: function (response) {
            console.log('id', response);

            if (response.status) {
              maintaince_new();
              $(obj).parent().parent('tr').remove();
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



  // function queryClosed(obj){
  //   maintainceUser('obh');
  //   $("[name='sub_id']").html(` <option selected="selected" disable="disable" value="0"> Choose Sub Category  </option>`);
  //   var cat_id  = $(".cat_id").val();
  //   console.log('branch',$("[name='cat_id']").val());
  //   $('.branch').val(cat_id);
  //   $.ajax({
  //     method:"POST",
  //     url:"{{route('maintainSubCategory')}}",
  //     data : {id:cat_id},
  //     dataType:"json",
  //     success:function(res){
  //       console.log('categeroy',res);
  //       if(res.status){
  //         res.data.forEach(function(val,ind){
  //           var id = val.id;
  //           var name = val.main_name;
  //           var option = `<option value="${id}">${name} </option>`;
  //           $("[name='sub_id']").append(option);
  //         });
  //       }

  //     }
  //   });

  // }

  


</script>
<script type="text/javascript">
  function printDivs(eve,obj)
  {


    $("#"+$(obj).attr('id')).print();


  }

  maintaince_new();

  function maintaince_new(){
    console.log('closedQueries');
    $('#closed_queries').DataTable().clear().destroy();
    var table = $('#closed_queries').DataTable();

    table.destroy();
    $('#closed_queries').DataTable( {
      "processing": true,
      "serverSide": true,

      "pageLength": 30,
      ajax: {

        "url":"<?= route('closedQueries') ?>",
        "dataType":"json",
        "type":"POST"
      },
      columns:[

      
      {"data":"id","render":function(status,type,row){

        return row.id?row.id:'';

      }},
      {"data":"branch_id","render":function(status,type,row){

        return row.branch?row.branch.branch_name:'';

      }},
      {"data":"name","render":function(status,type,row){

        return row.name?row.name:'';

      }},
      {"data":"father_name","render":function(status,type,row){

        return row.father_name?row.father_name:'';

      }},
      {"data":"contact_no","render":function(status,type,row){

        return row.contact_no?row.contact_no:'';

      }},
      {"data":"course_id","render":function(status,type,row){

        return row.grade?row.grade.course_name:'';

      }},
      {"data":"created_by","render":function(status,type,row){

        return row.query_by?row.query_by.name:'';

      }},
      {"data":"reference_by","render":function(status,type,row){

        return row.reference_by?row.reference_by:'';

      }},

      {"data":"address","render":function(status,type,row){

        return row.address?row.address:'';

      }},
      {"data":"remarks","render":function(status,type,row){

        return row.remarks?row.remarks:'';

      }},
      {"data":"parent_id","render":function(status,type,row){

        return row.follow_ups?row.follow_ups.length:'';

      }}
      ]
    } );
  }
</script>


@endpush
