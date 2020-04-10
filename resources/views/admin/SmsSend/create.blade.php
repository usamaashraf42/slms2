@extends('_layouts.admin.default')
@section('title', 'SMS Send ')
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

    					<div class="card">
    						<ul class="nav nav-tabs" role="tablist">
    							<li role="presentation" ><a href="#maintain" class="active" aria-controls="maintain" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Group SMS</span></a></li>
    							<li role="presentation"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Custom No SMS</span></a></li>


    						</ul>
    						@component('_components.alerts-default')
    						@endcomponent

    						<!-- Tab panes -->

    						<div class="tab-content">
    							<!-- //////////////////////////////////////////////// -->
    							<div role="tabpanel" class="tab-pane active" id="maintain">  
    								<h4 class="card-title"> Group SMS</h4>
    								<form method="POST" action="{{ route('sms-send.store') }}" enctype = "multipart/form-data" id="upload_new_form">
    									<div class="col-md-12">
    										{{csrf_field()}}
    										<div class="row">
    											<div class="col-md-3">
    												<div class="form-group">

    													<label for="branch_id">Select Branch</label>
    													<!-- <select class="form-control-1 branch_id" name="branch_id[]"   multiple="multiple"  id="branch_id" required style="height: 40px; width: 100%;">
    														<optgroup label="Select All" style="max-height: 344px;
    														min-height: 300px;
    														overflow-y: scroll;">
    														@if(!empty($branches))
    														@foreach($branches as $branch)
    														<option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
    														@endforeach
    														@endif
    													</optgroup>
    												</select> -->
                                                    <select class="form-control branch_id" name="branch_id[]"    id="branch_id" required style="height: 40px; width: 100%;">
                                                            
                                                            @if(!empty($branches))
                                                            @foreach($branches as $branch)
                                                            <option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
                                                            @endforeach
                                                            @endif
                                                        
                                                    </select>

    											</div>
    										</div>

    										<div class="col-md-3">
    											<div class="form-group">
    												<label for="select2">Select Class</label>
    												<select type="text" class="form-control class_id" id="class_id" onchange="getStudent()"  name="class_id"  placeholder="Name">
    													<option selected="selected" value="-1">Seclect Class</option>
    													@if(!empty($classes))
    													@foreach($classes as $class)
    													<option value={{$class['id']}}>{{$class['course_name']}}</option>
    													@endforeach
    													@endif

    												</select>

    											</div>
    										</div>

    										<div class="col-md-3">
    											<div class="form-group">
    												<label for="sms_title">Sms Title (it will not send in sms ) </label>
    												<input type="text" class="form-control sms_title" value="{{old('sms_title')}}" id="sms_title"  name="sms_title"  placeholder="Title">

    											</div>
    										</div>



    										<div class="col-md-9">
    											<div class="form-group">
    												<label for="sms_body">Sms Body</label>
    												<textarea type="text" class="form-control sms_body_one" id="sms_body"  name="sms_body"  placeholder="Sms Body">{{old('sms_body')}}</textarea>
    												<span id="remaining1">160 characters remaining</span>

    											</div>
    										</div>
    									</div>

    										<!-- <div class="row">
    											<div class="col-md-9">
    												<div class="form-group">
    													<label for="select2">Student</label>

    													<select id='banks-selected-options' class="form-control" multiple="multiple" name="student_ids[]">

    													</select>

    												</div>

    											</div>

    										</div> -->

    										<div class="form-group row">

    											<div class="card" style="width:100%">
    												<div class="card-block">
    													<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
    														<button class="btn btn-primary ks-rounded" onclick="submitForm(this)"> Send SMS </button>
    													</div>

    												</div>
    											</div>
    										</div>
    									</form>
    								</div>

    							</div>
    							<div role="tabpanel" class="tab-pane" id="detail">      
    								<div class="nav_bva" style="margin-top: -20px;">
    								Custom No SMS</span>
    							</div>
    							<br>

    							<form method="POST" action="{{ route('sms-send.store') }}" enctype = "multipart/form-data" id="upload_new_form">
    								<div class="col-md-12">
    									{{csrf_field()}}
    									<div class="row">
    										<div class="col-md-4">
    											<div class="form-group">
    												<label for="phone">Custom Phone</label>
    												<input type="text" class="form-control phone" id="phone" value="{{old('phone')}}"  name="phone"  placeholder="03076710561">
    											</div>
    										</div>


    										<div class="col-md-4">
    											<div class="form-group">
    												<label for="sms_title">Sms Title (it will not send in sms ) </label>
    												<input type="text" class="form-control sms_title" value="{{old('sms_title')}}" id="sms_title"  name="sms_title"  placeholder="Title">

    											</div>
    										</div>



    										<div class="col-md-8">
    											<div class="form-group">
    												<label for="sms_body">Sms Body</label>
    												<textarea type="text" class="form-control sms_body2" id="sms_body"  name="sms_body"  placeholder="Sms Body">{{old('sms_body')}}</textarea>
    												<span id="remaining2">160 characters remaining</span>

    											</div>
    										</div>
    									</div>

    									

    									<div class="form-group row">

    										<div class="card" style="width:100%">
    											<div class="card-block">
    												<div class="ks-items-block float-center" style="align-items: center;margin-left: 40%">
    													<button class="btn btn-primary ks-rounded" onclick="submitForm(this)"> Send SMS </button>
    												</div>

    											</div>
    										</div>
    									</div>
    								</form>
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

    		.caret:after {
    			content: '\e9c5';
    			font-family: 'icomoon';
    			display: inline!important;
    			font-size: 16px;
    			line-height: 1;
    			-webkit-font-smoothing: antialiased;
    			-moz-osx-font-smoothing: grayscale;
    		}
    		.multiselect { width: 400px!important;
    			background: white!important;
    			border: 1px solid #ddd!important;
    		}
    	</style>
    </div>

    @endsection
    @push('post-scripts')





    <link rel="stylesheet" href="{{asset('assets/dropdown-multi/dist/css/bootstrap-multiselect.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('assets/dropdown-multi/dist/js/bootstrap-multiselect.js')}}"></script>


    <script type="text/javascript">
		// $("#banks-selected-options").multiSelect();
		// $("#courses-selected-options").multiSelect();
		// $('#branch_id').selectpicker();


		// $(document).ready(function() {
		// 	// $('#branch_id').multiselect();

		// 	$(document).ready(function() {
		// 		$('#branch_id').multiselect({
		// 			enableClickableOptGroups: true
		// 		});
		// 	});
		// });
		function submitForm(btn) {

			console.log('profileFormSubmit');
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
        return true;
    }
</script>
<script>


	var $remaining = $('#remaining1'),
	$messages = $remaining.next();

	$('.sms_body_one').keyup(function(){

		var chars = this.value.length;

		console.log('keyup sms body 1',chars);
		messages = Math.ceil(chars / 160);
		remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
		console.log('remaining body 1',remaining);
		$('#remaining1').text(remaining + ' characters remaining');
		$messages.text(messages + ' message(s)');
	});
	var $remaining = $('#remaining2'),
	$messages = $remaining.next();
	$('.sms_body2').keyup(function(){
		console.log('keyup sms body 2');
		var chars = this.value.length,
		messages = Math.ceil(chars / 160),
		remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

		$remaining.text(remaining + ' characters remaining');
		$messages.text(messages + ' message(s)');
	});

	function getClass(obj){
		$("[name='class_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);
		var branch_id  = $(".branch_id").val();
		console.log('branch',$("[name='branch_id']").val());
		$('.branch').val(branch_id);
		$.ajax({
			method:"POST",
			url:"{{route('branchHasClass')}}",
			data : {id:branch_id},
			dataType:"json",
			success:function(data){
				data.forEach(function(val,ind){
					var id = val.course.id;
					var name = val.course.course_name;
					var option = `<option value="${id}">${name}</option>`;
					$("[name='class_id']").append(option);
				});
				$('.class_id').select2();
			}
		});

	}

	function getStudent(){
		console.log('getStudent',$("[name='branch_id']").val(),$("[name='class_id']").val());

		$("#banks-selected-options").html(` <option selected="selected" value='0'> All Students  </option>`);

		var branch_id=$("[name='branch_id']").val();
		var course_id=$("[name='class_id']").val();
		if(course_id!='' && branch_id!=''){
			$.ajax({
				method:"POST",
				url:"{{route('classHasStudent')}}",
				data : {branch_id:branch_id,course_id:course_id},
				dataType:"json",
				success:function(data){
					data.forEach(function(val,ind){
						var id = val.id;
						var name = val.s_name+' '+val.s_fatherName;
						var option = `<option value="${id}">${name}</option>`;
						console.log('students',option);
						$("#banks-selected-options").append(option);
									// var o = new Option(`${name}`, `${id}`);
									// 	$("#banks-selected-options").append(o);

								});


					$("#banks-selected-options").multiSelect();
				}
			});
		}

	}

	$('#account').select2({
		ajax: {
			url: "{{route('get_student_search')}}",
			method:"post",
			dataType: 'json',
			processResults: function (_data, params) {

				var data1= $.map(_data, function (obj) {
					var newobj = {};
					newobj.id = obj.id;
					newobj.text= `${obj.s_name} - (${obj.id}) `;
					return newobj;
				});
				return { results:data1};
			}
		}
	});

</script>

@endpush