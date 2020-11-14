@extends('_layouts.admin.default')
@section('title', 'Applications')
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

                .search {
                  width: 100%;
                  position: relative;
                  display: flex;
              }

              .searchButton {
                width: 40px;
                height: 51px;
                border: 1px solid #015384;
                background: #015384;
                text-align: center;
                color: #fff;
                border-radius: 0 5px 5px 0;
                cursor: pointer;
                font-size: 20px;
            }

            .searchTerm:focus{
              color: #e7ded5;
          }

          .searchButton {
            width: 40px;
            height: 42px;
            border: 1px solid #015384;
            background: #015384;
            text-align: center;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 20px;
        }

        /*Resize the wrap to see the search bar change!*/
        .wrap{
          width: 90%;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
      }
      .wrap-drop {

        background: #015384;
        box-shadow: 3px 3px 3px rgba(0,0,0,.2);
        cursor: pointer;
        padding: 1rem;
        position: relative;
        width: 100%;
        z-index: 3;
    }

    .wrap-drop::after {
        border-color:#ffffff transparent;
        border-style:solid;
        border-width:10px 10px 0;
        content:"";
        height:0;
        margin-top:-4px;
        position:absolute;
        right:1rem;
        top:50%;
        width:0;
    }

    .wrap-drop .drop {
        background:#e7ded5;
        box-shadow:3px 3px 3px rgba(0,0,0,.2);
        display:none;
        left:0;
        list-style:none;
        margin-top:0;
        opacity:0;
        padding-left:0;
        pointer-events:none;
        position:absolute;
        right:0;
        top:100%;
        z-index:2;
    }
    .box_drop{
        width: 100%;
        margin: 10px;
        border: 1px solid #ccc;
        padding: 10px;
        box-shadow: 0px 3px 4px #bbb;
    }
    .wrap-drop .drop li a {
        color:#ffffff;
        display:block;
        padding:1rem;
        text-decoration:none;
    }

    .wrap-drop span {
        color:#ffffff;
    }

    .wrap-drop .drop li:hover a {
        background-color:#ffffff;
        color:#e7ded5;
    }

    .wrap-drop.active::after {
        border-width:0 10px 10px;
    }

    .wrap-drop.active .drop {
        display:block;
        opacity:1;
        pointer-events:auto;
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
   .nav-tabs > li > a {
    border: none;
    color: #ffffff;
    background: #0080cc;
    border-top-right-radius: 15px;
}
.nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #5a4080 !important; background: #fff; }
.nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: #5a4080 none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}
.nav-tabs > li  {width: 173px;

    margin: 2px;

    text-align: center;}
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
@component('_components.alerts-default')
          @endcomponent

    			<div class="">
    				<div class="row">
                       <div class="box_drop">
                        <div class="col-md-12">
                            <div class="row">

                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <select name="branchAjax[]" id="branchAjax"  class="chosen-select-branch form-control branchAjax" multiple > 
                                    @if(!empty($branches))
                                    @foreach($branches as $branch)
                                    <option value={{$branch['id']}} @if($branch['id']==old('branch_id')){{'checked'}} @endif>{{$branch['branch_name']}}</option>
                                    @endforeach
                                    @endif 
                                    
                                </select>
                                
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <select   name="jobAjax[]" class="chosen-select-branch form-control jobAjax" multiple  id="jobAjax"  placeholder="Enter Name" style="width: 100%!important;">

                                    <optgroup label="ACADEMIC MANAGEMENT">
                                      <option value="principal" data-toggle="tooltip" title="Min 5 year Exp as principal">Principal</option>
                                      <option value="Branch Heads" data-toggle="tooltip" title="Min 2 year Exp as Branch head">Branch Heads </option>
                                      <option value="Assistant Branch Heads" data-toggle="tooltip" title="Degree in management">Assistant Branch Heads </option>
                                      <option value="O-Level Co-ordinator " data-toggle="tooltip" title="Done O-A level & 2 years , Exp">O-Level Co-ordinator </option>
                                      <option value="Pre-school Head" data-toggle="tooltip" title="degree/diploma in Montesori / Preschool">Pre-school Head</option>
                                      <option value="Primary Section Head" data-toggle="tooltip" title="Min 5 year Primary head or Coordinator">Primary Section Head</option>
                                      <option value="Senior Section Head"  data-toggle="tooltip" title="Min 5 year section head or Coordinator">Senior Section Head</option>
                                      <option value="Admin Officer">Admin Officer</option>
                                  </optgroup>
                                  <optgroup label="ACADEMICS">
                                      <option value="Pre school Teacher" data-toggle="tooltip" title="Min 2 year Exp Teaching + degree /dip in Preschool">Pre school Teacher</option>
                                      <option value="Pre School Junior Teacher" data-toggle="tooltip" title="Min 1 year \ Exp">Pre School Junior Teacher</option>
                                      <option value="Primary Teacher" data-toggle="tooltip" title="Min 2 year  \ Exp">Primary Teacher</option>
                                      <option value="Primary Junior Teacher" data-toggle="tooltip" title="Min 1 year \ Exp">Primary Junior Teacher</option>
                                      <option value="Matric Teacher" data-toggle="tooltip" title="Min 3 year \ Exp">Matric Teacher </option>
                                      <option value="O-Level Teacher" data-toggle="tooltip" title="Min 3 year \ Exp">O-Level Teacher</option>
                                  </optgroup>
                                  <optgroup label="GENERAL MANAGEMENT"> 
                                      <option value="Accounts" data-toggle="tooltip" title="Min 5 year \Exp">Accounts Manage</option>
                                      <option value="Account Asst. Manager" data-toggle="tooltip" title="Min 1 year Exp">Account Asst. Manager</option>
                                      <option value="Franchise Manager" data-toggle="tooltip" title="Min 2 year \Exp + degree Management">Franchise Manager</option>
                                      <option value="Asst. Franchise Manager" data-toggle="tooltip" title="Min 1 year \Exp + degree Management">Asst. Franchise Manager</option>.


                                      <option value="Manager Admin" data-toggle="tooltip" title="Min 5 year \Exp">Manager Admin</option>
                                      <option value=" Asst Manager Admin" data-toggle="tooltip" title="Min 1 year \Exp">Asst. Manager Admin</option>
                                  </optgroup>
                                  <optgroup label="SOFTWARE DEVELOPER" data-toggle="tooltip" title="Min 5 year Exp">
                                      <option value="Web/App Developer" data-toggle="tooltip" title="Min 5 year Exp">Web/App Developer       </option>
                                      <option value="Web/App Developer" data-toggle="tooltip" title="Min 5 year Exp">Front End      </option>
                                  </optgroup>
                                  <optgroup label="Internship / Training" data-toggle="tooltip" title="Min 5 year Exp">
                                      <option value="Internship in Management " data-toggle="tooltip" title="Min 5 year Exp">Internship in Management       </option>
                                      <option value="Internship in Teaching" data-toggle="tooltip" title="Min 5 year Exp">Internship in Teaching   </option>
                                      <option value="Internship in Software Developement" data-toggle="tooltip" title="Min 5 year Exp">Internship in Software Developement   </option>
                                  </optgroup>
                              </select>
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="wrap">
                             <div class="search">
                                <input type="text" class="form-control searchAjax" id="searchAjax" placeholder="What are you looking for?">
                                <button type="submit" class="searchButton">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>

        </div>
        <div class="col-md-12"> 
          <!-- Nav tabs -->
          <div class="card">
             <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="#newapp" aria-controls="newapp" role="tab" data-toggle="tab">  <span>New applications</span></a></li>
                <li role="presentation" onclick="myFunction(this)" ><a href="#shortlists" onclick="myFunction(this)" aria-controls="shortlists" role="tab" data-toggle="tab">  <span>Shortlisted </span></a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" onclick="interviewTab(this)" role="tab" data-toggle="tab"> <span>Called For Interview</span></a></li>
                <li role="presentation"><a href="#Selected" aria-controls="Selected" role="tab" data-toggle="tab"> <span>Selected</span></a></li>
                <li role="presentation"><a href="#Rejected" aria-controls="Rejected" role="tab" data-toggle="tab"> <span>Rejected</span></a></li>
                <li role="presentation"><a href="#Other" aria-controls="Other" role="tab" data-toggle="tab"> <span>Other</span></a></li>

            </ul>

            <!-- Tab panes -->

            <div class="tab-content">

                <!-- //////////////////////////////////////////////// -->

                <div role="tabpanel" class="tab-pane" id="Other">

                   <div class="nav_bva" style="margin-top: -20px;"><span>
                   Other </span>
               </div>

               <div class="table-responsive">
                   <table class="table" id="OtherApp" style="width:100%;" >
                      <thead>
                         <tr>
                            <th>select</th>
                            <th>Reject</th>
                            <th>View</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>1st Jobs</th>
                            <th>2nd Jobs</th>
                            <th>3rd Jobs</th>
                            <th>1st Branch</th>
                            <th>2nd Branch</th>
                            <th>3rd Branch</th>
                            <th>Experience</th>
                            
                        </tr>
                    </thead>





                </table>
            </div>

        </div>

        <!-- ///////////////////////////////////////////////////////// -->

        <!-- //////////////////////////////////////////////// -->

        <div role="tabpanel" class="tab-pane" id="Rejected">

            <div class="nav_bva" style="margin-top: -20px;"><span>
            Rejected </span>
        </div>

        <div class="table-responsive">
            <table class="table" id="RejectedApp"  style="width:100%;">
               <thead>
                  <tr>
                     <th>select</th>
                     <th>Reject</th>
                     <th>View</th>

                     <th>Image</th>
                     <th>Name</th>
                     <th>1st Jobs</th>
                     <th>2nd Jobs</th>
                     <th>3rd Jobs</th>
                     <th>1st Branch</th>
                     <th>2nd Branch</th>
                     <th>3rd Branch</th>
                     <th>Experience</th>
                     
                 </tr>
             </thead>





         </table>
     </div>

 </div>

 <!-- ///////////////////////////////////////////////////////// -->

 <!-- //////////////////////////////////////////////// -->

 <div role="tabpanel" class="tab-pane" id="Selected">

     <div class="nav_bva" style="margin-top: -20px;"><span>
     Selected </span>
 </div>

 <div class="table-responsive">
     <table class="table" id="SelectedApp" style="width:100%;" >
        <thead>
           <tr>
              <th>select</th>
              <th>Reject</th>
              <th>View</th>
              <th>Image</th>
              <th>Name</th>
              <th>1st Jobs</th>
              <th>2nd Jobs</th>
              <th>3rd Jobs</th>
              <th>1st Branch</th>
              <th>2nd Branch</th>
              <th>3rd Branch</th>
              <th>Experience</th>
              
          </tr>
      </thead>





  </table>
</div>

</div>

<!-- ///////////////////////////////////////////////////////// -->

<div role="tabpanel" class="tab-pane active" id="newapp">      
  <div class="nav_bva" style="margin-top: -20px;">
     New Applications
 </div>

 <div class="table-responsive">
     <table class="table" id="NewApplication" style="width:100%;">
        <thead>
           <tr>
              <th>select</th>
              <th>Reject</th>
              <th>View</th>

              <th>Image</th>

              <th>App Id</th>
              <th>Name</th>
              <th>1st Jobs</th>
              <th>2nd Jobs</th>
              <th>3rd Jobs</th>
              <th>1st Branch</th>
              <th>2nd Branch</th>
              <th>3rd Branch</th>
              <th>Applied Date</th>
              <th>Experience</th>
              
          </tr>
      </thead>

  </table>
</div>

</div>

<!-- ////////////////////////???????????????????????????????? -->

<div role="tabpanel"  class="tab-pane " id="shortlists"  >      <div class="nav_bva" onclick="myFunction(this)" style="margin-top: -20px;"><span>
Shortlisted </span>
</div>
<form action="{{route('application.selectedApplicant')}}" method="GET">						
   @component('_components.alerts-default')
   @endcomponent
   <div class="col-md-4">
      <div class="form-group" style="margin-top: 25px;">
         <button type="submit" class="btn btn-success"> Selected </button>
     </div>
 </div>
 <div class="table-responsive">
  <table class="table" id="ShortApp"style="width:100%;">
     <thead>
        <tr>
           <th>select</th>
           <th>Reject</th>
            <th>View</th>
           <th>Image</th>
           <th>App Id</th>

           <th>Name</th>
           <th>1st Jobs</th>
           <th>2nd Jobs</th>
           <th>3rd Jobs</th>
           <th>1st Branch</th>
           <th>2nd Branch</th>
           <th>3rd Branch</th>
           <th>Experience</th>
           
       </tr>
   </thead>
</table>
</div>
</form>

</div>





<!-- ?///////////////////////////////////////// here second tab start /////////////////////////////////////////////////////// -->
<div role="tabpanel" class="tab-pane" id="profile">

   <div class="nav_bva" style="margin-top: -20px;"><span>
   Call For Interview </span>
</div>

<div class="table-responsive">
   <table class="table" id="CallApp" style="width:100%;">
      <thead>
         <tr>
            <th>select</th>
            <th>Reject</th>
            <th>View</th>

            <th>Image</th>
            <th>Name</th>
            
            <th>1st Jobs</th>
            <th>2nd Jobs</th>
            <th>3rd Jobs</th>
            <th>1st Branch</th>
            <th>2nd Branch</th>
            <th>3rd Branch</th>
            <th>Experience</th>
            
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

<style>

	.img-circle{
		border-radius: 50%!important;
	}
	.custom-check{
		position: relative;
	}
	.custom-check:before{
		content: "";
		width: 28px;
		height: 26px;
		border: solid 2px #014a75;
		background: white;
		position: absolute;
	}
	.custom-check:after{
		content: "";
		width: 18px;
		height: 9px;
		border: solid 2px #fff;
		border-top: none;
		border-right: none;
		position: absolute;
		top: 5px;
		left: 5px;
		transform: rotate(-45deg);
		opacity: 0;
		transition: all 0.2s ease-out;
	}
	.custom-check:checked:after{
		opacity: 1;
	}
	.custom-check:checked:before{
		background: #014a75;
	}
	.table th, .table td {
		padding: 4px!important;
		max-width: 112px;
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<!--  // {"data":"user_id","render":function(status,type,row){
            //     return  row.applicant?`<iframe src="&embedded=true" 
            //     frameborder="0" width="120px" height="100px">
            //     </iframe>`:`<iframe src="&embedded=true" 
            //     frameborder="0" width="120px" height="100px">
            //     </iframe>`;

            // }}, -->
<script>

function myFunction(thisobj) {
  console.log('shortlist click');
  window.open("{{route('short-list.index')}}");
}


function interviewTab(tob){
  window.open("{{route('interview.index')}}");
}


    function OtherApp(){
        $('#OtherApp').DataTable().clear().destroy();
        var table = $('#OtherApp').DataTable();

        table.destroy();

        var branch=$('#branchAjax').val();
        var job=$('#jobAjax').val();
        var search=$('#searchAjax').val();


        $('#OtherApp').DataTable( {
            "processing": true,
            "serverSide": true,

            "pageLength": 40,
            ajax: {

                "url":"<?= route('NewApplications') ?>",
                "dataType":"json",
                "data":{status:null,branch:branch,job:job,customSearch:search},
                "type":"POST"
            },

            columns:[
            {"data":"id","render":function(id){
                return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input name="application_ids[]"   type="checkbox" class="checkboxes custom-check  checkedInput'+id+'" onclick="checkboxUncheck(this)" value="'+id+'" />  <span></span></label>'; 
            },"searchable":false,"orderable":false},
            {"data":"id","render":function(id){
                return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input name="reject_ids[]" "  type="checkbox" class="checkboxes custom-check checkedInput'+id+'" onclick="checkboxUncheck(this)" value="'+id+'" />  <span></span></label>'; 
            },"searchable":false,"orderable":false},

            {"data":"id","render":function(id){
                var edit_route = '{{ route("application.show", ":id") }}';
                edit_route = edit_route.replace(':id', id);

                var buttons = '<a href="'+edit_route+'" target="_blank" class="btn-sm btn-warning">View</a>';

                return buttons;
            },"searchable":false,"orderable":false},

            {"data":"user_id","render":function(status,type,row){
                return row.applicant?`<a class="example-image-link" href="${row.applicant.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="${row.applicant.images}"  alt="${row.applicant.name}" height="60" width="60" style="border-radius: 50%!important;" />
                </a>`:
                `<a class="example-image-link" href="no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

            }},

           

            {"data":"user_id","render":function(status,type,row){


                return `${row.applicant?row.applicant.name:''}`;

            }},


            {"data":"job_preference1","render":function(status,type,row){


                return `${row.job_preference1?row.job_preference1:''}`;

            }},
            {"data":"job_preference2","render":function(status,type,row){


                return `${row.job_preference2?row.job_preference2:''}`;

            }},
            {"data":"job_preference3","render":function(status,type,row){


                return `${row.job_preference3?row.job_preference3:''}`;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch1?row.applicant.preference_branch1.branch_name:''}`:``;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch2?row.applicant.preference_branch2.branch_name:''}`:'';

            }},

            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch3?row.applicant.preference_branch3.branch_name:''}`:'';

            }},
            {"data":"user_id","render":function(status,type,row){


                return row.applicant?`${row.applicant.experience?row.applicant.experience:''}`:``;

            }},
            

            ]
        } );
}



function RejectedApp(){

		// $("#RejectedApp").dataTable().fnDestroy();
		$('#RejectedApp').DataTable().clear().destroy();
        var table = $('#RejectedApp').DataTable();

        table.destroy();

        var branch=$('#branchAjax').val();
        var job=$('#jobAjax').val();
        var search=$('#searchAjax').val();


		// $('#RejectedApp').empty();

		$('#RejectedApp').DataTable( {
			"processing": true,
			"serverSide": true,

			"pageLength": 40,
			ajax: {

				"url":"<?= route('NewApplications') ?>",
				"dataType":"json",
				"data":{status:2,branch:branch,job:job,customSearch:search},
				"type":"POST"
			},

			columns:[
			{"data":"id","render":function(id){
                return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input name="application_ids[]"   type="checkbox" class="checkboxes custom-check" value="'+id+'" />  <span></span></label>'; 
            },"searchable":false,"orderable":false},
            {"data":"id","render":function(id){
                return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input name="reject_ids[]" "  type="checkbox" class="checkboxes custom-check" value="'+id+'" />  <span></span></label>'; 
            },"searchable":false,"orderable":false},

            {"data":"id","render":function(id){
                var edit_route = '{{ route("application.show", ":id") }}';
                edit_route = edit_route.replace(':id', id);

                var buttons = '<a href="'+edit_route+'" target="_blank" class="btn-sm btn-warning">View</a>';

                return buttons;
            },"searchable":false,"orderable":false},

            {"data":"user_id","render":function(status,type,row){
                return row.applicant?`<a class="example-image-link" href="${row.applicant.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="${row.applicant.images}"  alt="${row.applicant.name}" height="60" width="60" style="border-radius: 50%!important;" />
                </a>`:
                `<a class="example-image-link" href="no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

            }},


            {"data":"user_id","render":function(status,type,row){


                return `${row.applicant?row.applicant.name:''}`;

            }},

           
            {"data":"job_preference1","render":function(status,type,row){


                return `${row.job_preference1?row.job_preference1:''}`;

            }},
            {"data":"job_preference2","render":function(status,type,row){


                return `${row.job_preference2?row.job_preference2:''}`;

            }},
            {"data":"job_preference3","render":function(status,type,row){


                return `${row.job_preference3?row.job_preference3:''}`;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch1?row.applicant.preference_branch1.branch_name:''}`:``;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch2?row.applicant.preference_branch2.branch_name:''}`:'';

            }},

            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch3?row.applicant.preference_branch3.branch_name:''}`:'';

            }},
            {"data":"user_id","render":function(status,type,row){


                return row.applicant?`${row.applicant.experience?row.applicant.experience:''}`:``;

            }},
            

            ]
        } );
	}
	
	function SelectedApp(){

		$('#SelectedApp').DataTable().clear().destroy();
        var table = $('#SelectedApp').DataTable();

        table.destroy();
        var branch=$('#branchAjax').val();
        var job=$('#jobAjax').val();
        var search=$('#searchAjax').val();
		// $('#SelectedApp').empty();

		$('#SelectedApp').DataTable( {
			"processing": true,
			"serverSide": true,

			"pageLength": 40,
			ajax: {

				"url":"<?= route('NewApplications') ?>",
				"dataType":"json",
				"data":{status:9,branch:branch,job:job,customSearch:search},
				"type":"POST"
			},

			columns:[
			{"data":"id","render":function(id){
                return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input name="application_ids[]"   type="checkbox" class="checkboxes custom-check checkedInput'+id+'" onclick="checkboxUncheck(this)" value="'+id+'" />  <span></span></label>'; 
            },"searchable":false,"orderable":false},
            {"data":"id","render":function(id){
                return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input name="reject_ids[]" "  type="checkbox" class="checkboxes custom-check checkedInput'+id+'" onclick="checkboxUncheck(this)" value="'+id+'" />  <span></span></label>'; 
            },"searchable":false,"orderable":false},

            {"data":"id","render":function(id){
                var edit_route = '{{ route("application.show", ":id") }}';
                edit_route = edit_route.replace(':id', id);

                var buttons = '<a href="'+edit_route+'" target="_blank" class="btn-sm btn-warning">View</a>';

                return buttons;
            },"searchable":false,"orderable":false},

            {"data":"user_id","render":function(status,type,row){
                return row.applicant?`<a class="example-image-link" href="${row.applicant.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="${row.applicant.images}"  alt="${row.applicant.name}" height="60" width="60" style="border-radius: 50%!important;" />
                </a>`:
                `<a class="example-image-link" href="no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

            }},

           

            {"data":"user_id","render":function(status,type,row){


                return `${row.applicant?row.applicant.name:''}`;

            }},


            {"data":"job_preference1","render":function(status,type,row){


                return `${row.job_preference1?row.job_preference1:''}`;

            }},
            {"data":"job_preference2","render":function(status,type,row){


                return `${row.job_preference2?row.job_preference2:''}`;

            }},
            {"data":"job_preference3","render":function(status,type,row){


                return `${row.job_preference3?row.job_preference3:''}`;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch1?row.applicant.preference_branch1.branch_name:''}`:``;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch2?row.applicant.preference_branch2.branch_name:''}`:'';

            }},

            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch3?row.applicant.preference_branch3.branch_name:''}`:'';

            }},
            {"data":"user_id","render":function(status,type,row){


                return row.applicant?`${row.applicant.experience?row.applicant.experience:''}`:``;

            }},
            

            ]
        } );
	}
	
    function shortlist(){
        $('#ShortApp').DataTable().clear().destroy();
        var table = $('#ShortApp').DataTable();

        table.destroy();

        var branch=$('#branchAjax').val();
        var job=$('#jobAjax').val();
        var search=$('#searchAjax').val();
        $('#ShortApp').DataTable( {
            "processing": true,
            "serverSide": true,

            "pageLength": 40,
            ajax: {

                "url":"<?= route('shortListApplication') ?>",
                "dataType":"json",
                "data":{status:8,branch:branch,job:job,customSearch:search},
                "type":"POST"
            },

            columns:[

            
           
            {"data":"id","render":function(status,type,row){

                if(row.status==13){
                  return '';
                }else{
                  return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input name="application_ids[]"   type="checkbox" class="checkboxes custom-check checkedInput'+row.id+'" onclick="checkboxUncheck(this)" value="'+row.id+'" />  <span></span></label>';
                }
                 

            },"searchable":false,"orderable":false},
            {"data":"id","render":function(id){
                return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input name="reject_ids[]" "  type="checkbox" class="checkboxes custom-check checkedInput'+id+'" onclick="checkboxUncheck(this)" value="'+id+'" />  <span></span></label>'; 
            },"searchable":false,"orderable":false},

             {"data":"id","render":function(id){
                var edit_route = '{{ route("application.show", ":id") }}';
                edit_route = edit_route.replace(':id', id);

                var buttons = '<a href="'+edit_route+'" target="_blank" class="btn-sm btn-warning">View</a>';

                return buttons;
            },"searchable":false,"orderable":false},



            {"data":"user_id","render":function(status,type,row){
                return row.applicant?`<a class="example-image-link" href="${row.applicant.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="${row.applicant.images}"  alt="${row.applicant.name}" height="60" width="60" style="border-radius: 50%!important;" />
                </a>`:
                `<a class="example-image-link" href="no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

            }},



            {"data":"id","render":function(status,type,row){


                return `${row.id?row.id:''}`;

            }},

            {"data":"user_id","render":function(status,type,row){


                return `${row.applicant?row.applicant.name:''}`;

            }},

            
            {"data":"job_preference1","render":function(status,type,row){


                return `${row.job_preference1?row.job_preference1:''}`;

            }},
            {"data":"job_preference2","render":function(status,type,row){


                return `${row.job_preference2?row.job_preference2:''}`;

            }},
            {"data":"job_preference3","render":function(status,type,row){


                return `${row.job_preference3?row.job_preference3:''}`;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch1?row.applicant.preference_branch1.branch_name:''}`:``;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch2?row.applicant.preference_branch2.branch_name:''}`:'';

            }},

            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch3?row.applicant.preference_branch3.branch_name:''}`:'';

            }},
            {"data":"user_id","render":function(status,type,row){


                return row.applicant?`${row.applicant.experience?row.applicant.experience:''}`:``;

            }},
           
            ]
        } );

    }

    function CallApp(){

        $('#CallApp').DataTable().clear().destroy();
        var table = $('#CallApp').DataTable();

        table.destroy();
        var branch=$('#branchAjax').val();
        var job=$('#jobAjax').val();
        var search=$('#searchAjax').val();

          

        $('#CallApp').DataTable( {
          "processing": true,
          "serverSide": true,

          "pageLength": 40,
          ajax: {

             "url":"<?= route('interviewApplication') ?>",
             "dataType":"json",
             "data":{status:13,branch:branch,job:job,customSearch:search},
             "type":"POST"
         },

         columns:[
         {"data":"id","render":function(id){
                return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input name="application_ids[]"   type="checkbox" class="checkboxes custom-check" value="'+id+'" />  <span></span></label>'; 
            },"searchable":false,"orderable":false},
            {"data":"id","render":function(id){
                return  '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"> <input name="reject_ids[]" "  type="checkbox" class="checkboxes custom-check" value="'+id+'" />  <span></span></label>'; 
            },"searchable":false,"orderable":false},

            {"data":"id","render":function(status,type,row){
              console.log('interview',row.interview);

             

              
                var id=row.interview?row.interview.id:'';

                var edit_route = '{{ route("interview.marks", ":id") }}';
                edit_route = edit_route.replace(':id', id);

                var buttons = '<a href="'+edit_route+'" class="btn-sm btn-warning">Marks</a>';

                var marksid=row.id?row.id:'';
                var markslist_route = '{{ route("interview.markslist", ":id") }}';
                markslist_route = markslist_route.replace(':id', marksid);

                buttons+='<a href="'+markslist_route+'" target="_blank" class="btn btn-success btn-sm">Marks List</a>';

              return row.interview? buttons : '';
                
            },"searchable":false,"orderable":false},


            {"data":"user_id","render":function(status,type,row){
                return row.applicant?`<a class="example-image-link" href="${row.applicant.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="${row.applicant.images}"  alt="${row.applicant.name}" height="60" width="60" style="border-radius: 50%!important;" />
                </a>`:
                `<a class="example-image-link" href="no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

            }},

          

            {"data":"user_id","render":function(status,type,row){


                return `${row.applicant?row.applicant.name:''}`;

            }},

            
            {"data":"job_preference1","render":function(status,type,row){


                return `${row.job_preference1?row.job_preference1:''}`;

            }},
            {"data":"job_preference2","render":function(status,type,row){


                return `${row.job_preference2?row.job_preference2:''}`;

            }},
            {"data":"job_preference3","render":function(status,type,row){


                return `${row.job_preference3?row.job_preference3:''}`;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch1?row.applicant.preference_branch1.branch_name:''}`:``;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch2?row.applicant.preference_branch2.branch_name:''}`:'';

            }},

            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch3?row.applicant.preference_branch3.branch_name:''}`:'';

            }},
            {"data":"user_id","render":function(status,type,row){


                return row.applicant?`${row.applicant.experience?row.applicant.experience:''}`:``;

            }},


            ]
        } );
    }
    
    function NewApplication(){
        $('#NewApplication').DataTable().clear().destroy();

         var table = $('#NewApplication').DataTable();

        table.destroy();
        

        var branch=$('#branchAjax').val();
        var job=$('#jobAjax').val();
        var search=$('#searchAjax').val();

        $('#NewApplication').DataTable( {
          "processing": true,
          "serverSide": true,
          "pageLength": 20,
          ajax: {

             "url":"<?= route('NewApplications') ?>",
             "dataType":"json",
             "data":{status:0,branch:branch,job:job,customSearch:search},
             "type":"POST"
         },

         columns:[
            {"data":"status","render":function(status,type,row){
               var buttons = row.status==0?`<button data-ids='${row.id}' onclick="shortlistApp(this)" class="btn-sm btn-success">Shortlist</button>`:'';

                return buttons;
            },"searchable":false,"orderable":false},

            {"data":"id","render":function(status,type,row){
              var buttons =  row.status==2?'':`<button data-ids='${row.id}' onclick="rejectApp(this)" class="btn-sm btn-success">Reject</button>`;

              

                return buttons;
            },"searchable":false,"orderable":false},
            {"data":"id","render":function(id){
                var edit_route = '{{ route("application.show", ":id") }}';
                edit_route = edit_route.replace(':id', id);

                var buttons = '<a href="'+edit_route+'" target="_blank" class="btn-sm btn-warning">View</a>';

                return buttons;
            },"searchable":false,"orderable":false},


            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`<a class="example-image-link" href="${row.applicant.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="${row.applicant.images}"  alt="${row.applicant.name}" height="60" width="60" style="border-radius: 50%!important;" />
                </a>`:
                ``;

            }},

            

            {"data":"id","render":function(status,type,row){


                return `${row.id?row.id:''}`;

            }},


            {"data":"user_id","render":function(status,type,row){


                return `${row.applicant?row.applicant.name:''}`;

            }},

            
            {"data":"job_preference1","render":function(status,type,row){


                return `${row.job_preference1?row.job_preference1:''}`;

            }},
            {"data":"job_preference2","render":function(status,type,row){


                return `${row.job_preference2?row.job_preference2:''}`;

            }},
            {"data":"job_preference3","render":function(status,type,row){


                return `${row.job_preference3?row.job_preference3:''}`;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch1?row.applicant.preference_branch1.branch_name:''}`:``;

            }},
            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch2?row.applicant.preference_branch2.branch_name:''}`:'';

            }},

            {"data":"user_id","render":function(status,type,row){

                return row.applicant?`${row.applicant.preference_branch3?row.applicant.preference_branch3.branch_name:''}`:'';

            }},
            {"data":"created_at","render":function(status,type,row){

                return row.created_at?`${row.created_at}`:'';

            }},
            {"data":"user_id","render":function(status,type,row){


                return row.applicant?`${row.applicant.experience?row.applicant.experience:''}`:``;

            }},
            

            ]
        } );
    }
    


    function rejectApp(obj){
      console.log('oj',$(obj).attr('data-ids'),$(obj).parent().parent('tr').html(),);
		// $(obj).parent().parent('tr').remove();
		var ids=$(obj).attr('data-ids');
		$.ajax({
			url: "{{route('rejectApp')}}", 
			method:"POST",
			data:{id:ids},
			success: function(response){

				console.log('ajax call',response);
				if(response.status){
					if(response.status==1){
						$(obj).parent().parent('tr').remove();
						toastr.success('Record Update Successfully');
					}else{
						$(obj).parent().parent('tr').remove();
						toastr.warning('Failed to update');
					}
					RejectedApp();
					SelectedApp();
                    shortlist();
                }
                else{
                   toastr.danger('Record not update');
                   RejectedApp();
                   SelectedApp();
                   shortlist();
               }
           }});
		
	}

	function shortlistApp(obj){
		console.log('shortlist',$(obj).attr('data-ids'),$(obj).parent().parent('tr').html(),);


		var ids=$(obj).attr('data-ids');
		// $(obj).parent().parent('tr').remove();

		$.ajax({
			url: "{{route('shortlistApp')}}", 
			method:"POST",
			data:{id:ids},
			success: function(response){

				console.log('ajax call',response);
				if(response.status){
					if(response.status==1){
						$(obj).parent().parent('tr').remove();
						toastr.success('Record Update Successfully');
					}else{
						$(obj).parent().parent('tr').remove();
						toastr.warning('Failed to update');
					}
				}
				else{
					toastr.danger('Record not update');
				}
			}});

		RejectedApp();
		SelectedApp();
        shortlist();
    }
    
    RejectedApp();
    SelectedApp();
    shortlist();
    CallApp();
    NewApplication();
    OtherApp();

    $('#jobAjax').on('change', function(e) {
        console.log('jobAjax',$('#jobAjax').val());
        RejectedApp();
        SelectedApp();
        shortlist();
        CallApp();
        NewApplication();
        OtherApp();
    });
    $('#branchAjax').on('change', function(e) {
        console.log('branchAjax',$('#branchAjax').val());
        RejectedApp();
        SelectedApp();
        shortlist();
        CallApp();
        NewApplication();
        OtherApp();
    });
    $('#searchAjax').on('keyup', function(e) {
        console.log('searchAjax',$('#searchAjax').val());
        RejectedApp();
        SelectedApp();
        shortlist();
        CallApp();
        NewApplication();
        OtherApp();
    });


// Inspiration: https://tympanus.net/codrops/2012/10/04/custom-drop-down-list-styling/

function DropDown(el) {
    this.dd = el;
    this.placeholder = this.dd.children('span');
    this.opts = this.dd.find('ul.drop li');
    this.val = '';
    this.index = -1;
    this.initEvents();
}

DropDown.prototype = {
    initEvents: function () {
        var obj = this;
        obj.dd.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).toggleClass('active');
        });
        obj.opts.on('click', function () {
            var opt = $(this);
            obj.val = opt.text();
            obj.index = opt.index();
            obj.placeholder.text(obj.val);
            opt.siblings().removeClass('selected');
            opt.filter(':contains("' + obj.val + '")').addClass('selected');
        }).change();
    },
    getValue: function () {
        return this.val;
    },
    getIndex: function () {
        return this.index;
    }
};

$(function () {
    // create new variable for each menu
    var dd1 = new DropDown($('#noble-gases'));
    // var dd2 = new DropDown($('#other-gases'));
    $(document).click(function () {
        // close menu on document click
        $('.wrap-drop').removeClass('active');
    });
});


function checkboxUncheck(obj){
  console.log(checkboxUncheck,$(obj).val());
  $('checkedInput'+$(obj).val()).not(this).prop('checked', false);  
  
}

</script>
<script type="text/javascript" src="{{asset('assets/chosen/chosen.jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/chosen/init.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/chosen/chosen.css')}}">
    <script type="text/javascript">
        $(".chosen-select").chosen({max_selected_options: 3});
      $(".chosen-select-branch").chosen({max_selected_options: 3});
    </script>
@endpush
