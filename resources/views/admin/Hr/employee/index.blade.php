@extends('_layouts.admin.default')
@section('title', 'Employee Management ')
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
					width: 96%;
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
    					<!-- <a href="{{route('employee.create')}}" class="btn btn-success btn-sm">Add Request</a><br><br> -->

    					<div class="card">
                            @component('_components.alerts-default')
                            @endcomponent
                            <ul class="nav nav-tabs" role="tablist">

                             <li role="presentation"><a href="#detail" class="active" aria-controls="detail" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Active Employee</span></a></li>
                             <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Left Employee</span></a></li>
                             <li role="presentation" ><a href="{{route('employee.create')}}" ><i class="fa fa-home"></i>  <span>Add Employee</span></a></li>

                         </ul>

                         <!-- Tab panes -->

                         <div class="tab-content">
                             <!-- //////////////////////////////////////////////// -->
                             <div role="tabpanel" class="tab-pane " id="maintain">  
                                <h4 class="card-title"> New Employee</h4>
                                <form method="POST" action="{{ route('employee.store') }}" enctype = "multipart/form-data" id="upload_new_form">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="fileinput fileinput-new" data-provides="fileinput" >
                                                <div class="fileinput-new thumbnail" style="width: 250px; height: 250px;">
                                                    <img src="{{asset('images/no-image.png')}}" id="profile-img-tag" height="250" width = "250">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="images" class="btn btn-primary" style="position: relative;left: 50px;top: 20px;">Upload Profile</label>
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
                                        <div class="col-md-9" style="margin-bottom: 20px;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="control-label" style="width: 100%;">Branch 
                                                        <span style="color: red">*</span></label>
                                                        <select class="form-control branch_id" name="branch_id"  id="select_branch" required>
                                                            <option selected="selected" disabled="disabled">All Branches</option>
                                                            @if(!empty($branches))
                                                            @foreach($branches as $branch)
                                                            <option value="{{$branch['id']}}" @if(isset(Auth::user()->branch_id) && Auth::user()->branch_id==$branch['id']) selected @endif>{{$branch['branch_name']}}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                        <p class="alert alert-danger branch_id_error" style="display: none"></p>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin: 10px 0px;">
                                                    <div class="col-md-6">
                                                        <label class="control-label"> Name</label>
                                                        <input name="name" value="{{ old('name') }}" type="text" placeholder="First Name" class="form-control">
                                                        @if ($errors->has('name'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('name')}}
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">Father Name</label>
                                                        <input name="fname" value="{{ old('fname') }}" type="text" placeholder="First Name" class="form-control">
                                                        @if ($errors->has('fname'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('fname')}}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row" style="margin: 10px 0px;">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Email</label>
                                                        <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="abc123@example.com">
                                                        @if ($errors->has('email'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('email')}}
                                                        </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="control-label">phone</label>
                                                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Mobile No" class="form-control">

                                                        @if ($errors->has('phone'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('phone')}}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div> 
                                                <div class="row" style="margin: 10px 0px;">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Cnic</label>
                                                        <input name="cnic" type="text" value="{{ old('cnic') }}" class="form-control" placeholder="99999-9999999-9">
                                                        @if ($errors->has('cnic'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('cnic')}}
                                                        </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="control-label">Date Of Birth</label>
                                                        <div class="ui calendar" id="example12" style="width: 100%">
                                                            <div class="ui input" style="width: -webkit-fill-available!important;">
                                                                <input type="text" class="form-control dobEmployee" value="{{old('dob')}}" readonly name="dob" id="dob" autocomplete="off"  placeholder="dob">
                                                            </div>
                                                        </div>

                                                        @if ($errors->has('dob'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('dob')}}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div> 
                                                <div class="row" style="margin: 10px 0px;">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Date Of Joining</label>

                                                        <div class="ui calendar" id="example1" style="width: 100%">
                                                            <div class="ui input" style="width: -webkit-fill-available!important;">
                                                                <input type="text" class="form-control" value="{{old('joiningdate')}}" readonly name="joiningdate" id="joiningdate" autocomplete="off"  placeholder="joiningdate">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('joiningdate'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('joiningdate')}}
                                                        </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="control-label">Salary</label>
                                                        <input name="salary" type="number" min="0" value="{{ old('salary') }}" class="form-control" value="0">
                                                        @if ($errors->has('salary'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('salary')}}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div> 
                                                <div class="row" style="margin: 10px 0px;">


                                                    <div class="col-md-6">
                                                        <label class="control-label">Qualification</label>
                                                        <input name="qualification" type="text" min="0" value="{{ old('qualification') }}" class="form-control" value="0">
                                                        @if ($errors->has('qualification'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('qualification')}}
                                                        </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="control-label">Designation</label>
                                                        <input name="designation" type="text" min="0" value="{{ old('designation') }}" class="form-control">
                                                        @if ($errors->has('designation'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('designation')}}
                                                        </div>
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="row" style="margin: 10px 0px;">


                                                    <div class="col-md-12">
                                                        <label class="control-label">Address</label>
                                                        <textarea name="address" type="text"  class="form-control">{{old('address')}}</textarea>
                                                        @if ($errors->has('address'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                            <strong>Warning!</strong> {{$errors->first('address')}}
                                                        </div>
                                                        @endif
                                                    </div>



                                                </div>


                                            </div> 
                                        </div>
                                        


                                        @if(Auth::user()->can('HR Dashboard'))
                                        <div class="col-lg-12 box_style">
                                            <h2 class="h2_bav">Salary</h2>


                                            <div class="row">

                                                <div class="col-md-12" style="margin-bottom: 20px;">

                                                    <div class="row" style="margin: 10px 0px;">
                                                        <div class="col-md-3">
                                                            <label class="control-label"> Monthly Salary</label>
                                                            <input name="monthly_salary" value="{{ old('monthly_salary') }}" type="number" step="any" min="0"  class="form-control">
                                                            @if ($errors->has('monthly_salary'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Warning!</strong> {{$errors->first('monthly_salary')}}
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="control-label"> Insurance</label>
                                                            <input name="total_insurance" value="{{ old('total_insurance') }}" type="number" step="any" min="0"  class="form-control">
                                                            @if ($errors->has('total_insurance'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Warning!</strong> {{$errors->first('total_insurance')}}
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="control-label"> Insurance Installment</label>
                                                            <input name="total_insurance_install" value="{{ old('total_insurance_install') }}" type="number" step="any" min="0"  class="form-control">
                                                            @if ($errors->has('total_insurance_install'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Warning!</strong> {{$errors->first('total_insurance_install')}}
                                                            </div>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="control-label">Profident Fund</label>
                                                            <input name="pf" type="number" step="any" value="{{ old('pf') }}" class="form-control" placeholder="0">
                                                            @if ($errors->has('pf'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Warning!</strong> {{$errors->first('pf')}}
                                                            </div>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="control-label">Medical</label>
                                                            <input type="number" step="any" min="0" name="medical" value="{{ old('medical') }}"  class="form-control">

                                                            @if ($errors->has('medical'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Warning!</strong> {{$errors->first('medical')}}
                                                            </div>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="control-label">House Rent</label>
                                                            <input name="house_rent" type="number" step="any" min="0" value="{{ old('house_rent') }}" class="form-control">
                                                            @if ($errors->has('house_rent'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Warning!</strong> {{$errors->first('house_rent')}}
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Transport</label>
                                                            <input name="transport" type="number" step="any" min="0" value="{{ old('transport') }}" class="form-control" >
                                                            @if ($errors->has('transport'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Warning!</strong> {{$errors->first('transport')}}
                                                            </div>
                                                            @endif
                                                        </div>



                                                        <div class="col-md-3">
                                                            <label class="control-label">Mobile Load</label>
                                                            <input name="mobile"  type="number" step="any" min="0" value="{{ old('mobile') }}" class="form-control" >
                                                            @if ($errors->has('mobile'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Warning!</strong> {{$errors->first('mobile')}}
                                                            </div>
                                                            @endif
                                                        </div>



                                                        <div class="col-md-3">
                                                            <label class="control-label">Monthly Leaves</label>
                                                            <input name="allow_leaves" type="number" min="0" value="{{ old('allow_leaves') }}" class="form-control" value="0">
                                                            @if ($errors->has('allow_leaves'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Warning!</strong> {{$errors->first('allow_leaves')}}
                                                            </div>
                                                            @endif
                                                        </div>



                                                        <div class="col-md-3">
                                                            <label class="control-label">Total Annual Leave</label>
                                                            <input name="total_annual_leave" type="number" step="any" min="0" value="{{ old('total_annual_leave') }}" class="form-control" value="0">
                                                            @if ($errors->has('total_annual_leave'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">Close</span>
                                                                </button>
                                                                <strong>Warning!</strong> {{$errors->first('total_annual_leave')}}
                                                            </div>
                                                            @endif
                                                        </div>



                                                    </div>


                                                </div> 
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-lg-12 box_style">
                                            <h2 class="h2_bav"> Access level</h2>

                                            <div class="row" >
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="control-label">Roles Available (click to add role)</label>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="control-label">Roles Sought/given to employee (click role to remove)</label>
                                                </div>
                                                <div class="col-md-12 col-sm-12">

                                                    <select id='pre-selected-options' multiple='multiple' name="roles[]">
                                                        @foreach($roles as $role)
                                                        <option   value="{{$role->id}}">{{$role->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row" style="margin: 10px 0px;">
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="control-label">Permission Available (click to add role)</label>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="control-label">Permission being given to employee (click role to remove)</label>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <label class="control-label">Permission</label>
                                                    <select id='permission-selected-options' multiple='multiple' name="permissions[]">
                                                        @foreach($permissions as $permission)
                                                        <option  value="{{$permission->id}}">{{$permission->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-md-12" style="margin-bottom: 20px;">

                                                    <div class="row" style="margin: 10px 0px;">


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

                                <br>

                                <br>
                                <div role="tabpanel" class="tab-pane active" id="detail">      
                                    <div class="nav_bva" style="margin-top: -20px;">
                                     Active Employee<span>&nbsp;&nbsp;  </span>
                                 </div>
                                 <br>

                                 <div class="row filter-row">
                                    <div class="col-sm-6 col-md-3">  
                                        <div class="form-group form-focus">
                                            <label for="branch_id">Select Branch</label>
                                            <select class="form-control-1 activebranch_id" name="branch_id" onchange="changeBranchId(this)"    id="branch_id"  style="height: 40px; width: 100%;">
                                                @if(!empty($branches))
                                                @foreach($branches as $branch)
                                                <option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                </div>


                                <br>

                                <div class="table-responsive">
                                 <table class="table  table-bordered" id="maintaince_new">
                                  <thead>
                                   <tr>
                                    <th>Image</th>
                                    <th>Emp Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Branch</th>
                                    <th>join</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>

                </div>

                <!-- ////////////////////////???????????????????????????????? -->

                <div role="tabpanel" class="tab-pane " id="home">      
                    <div class="nav_bva" style="margin-top: -20px;">
                     Left Employee<span>&nbsp;&nbsp;  </span>
                 </div>
                 <br>
                 <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <label for="left_branch_id">Select Branch</label>
                            <select class="form-control-1 left_branch_id" name="left_branch_id" onchange="changeBranchId(this)"    id="left_branch_id"  style="height: 40px; width: 100%;">
                                @if(!empty($branches))
                                @foreach($branches as $branch)
                                <option value={{$branch['id']}}>{{$branch['branch_name']}}</option>
                                @endforeach
                                @endif
                            </select>

                        </div>
                    </div>
                </div>
                <br>

                <div class="table-responsive">
                 <table class="table" id="maintaince_approval">
                  <thead>
                   <tr>
                    <th>Image</th>
                    <th>Emp Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Branch</th>
                    <th>join</th>
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
     <table class="table" id="maintaince_resolved">
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
<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('assets/multi-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/multi-select/jquery.multi-select.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/multi-select/select2.full.min.js')}}" type="text/javascript"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="{{asset('assets/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<link href="{{asset('assets/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

<script type="text/javascript">
 $("#banks-selected-options").multiSelect();
 $("#courses-selected-options").multiSelect();
</script>
<script>
 var today = new Date();
 $('#posting_date').calendar({
  monthFirst: false,
  type: 'date',
  minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
});
 $('#example1').calendar({
  monthFirst: false,
  type: 'date',
  minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
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

      toastr.success('Record Update Successfully');
  }else{
      $(ids).parent().parent('tr').remove();
      maintaince_new();
      maintaince_approval();

      toastr.warning('Failed to update');
  }

}
else{
 toastr.danger('Record not update');

}
}});
}

function EmployeeStatusChange(ids){
  console.log('ids',$(ids).attr('data-ids'),ids);

  var idd=$(ids).attr('data-ids');


  swal({
      title: "Are you sure?",
      text: "You want to update Record!",
      icon: "warning",
      buttons: [
      'No, cancel it!',
      'Yes, I am sure!'
      ],
      dangerMode: true,
  }).then(function(isConfirm) {
      if (isConfirm) {
        swal({
          title: 'Employee!',
          text: 'Record Update Successfully !',
          icon: 'success'
      }).then(function() {
          $.ajax({
           url: "{{route('EmployeeStatusChange')}}", 
           method:"POST",
           data:{id:idd},
           success: function(response){

            console.log('ajax call',response);
            if(response.status){
             if(response.status==1){
              $(ids).parent().parent('tr').remove();

              maintaince_new();
              maintaince_approval();


          }else{
              maintaince_new();
              maintaince_approval();

              $(ids).parent().parent('tr').remove();
              toastr.warning('Failed to update');
          }

      }
      else{
         toastr.danger('Record not update');

     }
 }});
      });
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
}
});



}


maintaince_new();
maintaince_approval();
function changeBranchId(obj){
    maintaince_new();
    maintaince_approval();
}
changeBranchId('dd');

function maintaince_approval(){

    var branch_id=$('.left_branch_id').val();
    $('#maintaince_approval').DataTable().clear().destroy();
    var table = $('#maintaince_approval').DataTable();
    table.destroy();

    console.log('left_branch_id',branch_id,$(".left_branch_id").val());

    $('#maintaince_approval').DataTable( {
       "processing": true,
       "serverSide": true,

       "pageLength": 30,
       ajax: {

        "url":"<?= route('leftEmployeeSearch') ?>",
        "dataType":"json",
        "data":{branch_id:branch_id},
        "type":"POST"

    },
    columns:[
    {"data":"images","render":function(status,type,row){

        return row.images?`<a class="example-image-link" href="images/staff/${row.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="images/staff/${row.images}"  alt="${row.category?row.category?row.category.main_name:'':''}" height="60" width="60" style="border-radius: 50%!important;" />
        </a>`:
        `<a class="example-image-link" href="images/staff/no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="images/staff/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

    }},
    {"data":"emp_id","render":function(status,type,row){

        return row.emp_id?row.emp_id:'';

    }},
    {"data":"id","render":function(status,type,row){

        return row.name?row.name:''+' '+row.fname?row.fname:'';

    }},
    {"data":"email","render":function(status,type,row){

        return row.email?row.email:'';

    }},
    {"data":"mobile","render":function(status,type,row){

        return row.mobile?row.mobile:'';

    }},
    {"data":"branch_id","render":function(status,type,row){

        return row.branch?row.branch.branch_name:'';

    }},

    {"data":"date_join","render":function(status,type,row){

        return row.date_join?row.date_join:'';

    }},




    {"data":"status","render":function(status,type,row){

        var buttons = row.status==1?`<a href="javascript:;" data-ids='${row.emp_id}' onclick="EmployeeStatusChange(this)" class="btn-sm btn-danger"> Active </a>`:`<a href="javascript:;" data-ids='${row.emp_id}' class="btn-sm btn-info" onclick="EmployeeStatusChange(this)"> Active </a>`;
        buttons+=`<a href="admin/employee/${row.emp_id}/edit"  class="btn-sm btn-success"> Edit </a>`;
        @if(Auth::user()->can('Employee Statement')   )
        buttons+=`<a href="admin/employee-statement/${row.emp_id}"  class="btn-sm btn-warning"> statement </a>`;
        @endif

        return buttons;
    },"searchable":false,"orderable":false}

    ]
} );
}

function maintaince_new(){
    var branch_id = $(".activebranch_id").val();
    $('#maintaince_new').DataTable().clear().destroy();
    var table = $('#maintaince_new').DataTable();

    table.destroy();

    console.log('branch_id',branch_id,$(".activebranch_id").val());
    $('#maintaince_new').DataTable( {
       "processing": true,
       "serverSide": true,

       "pageLength": 30,
       ajax: {

        "url":"<?= route('activeEmployeeSearch') ?>",
        "dataType":"json",
        "data":{branch_id:branch_id},
        "type":"POST"
    },
    columns:[

    {"data":"images","render":function(status,type,row){

        return row.images?`<a class="example-image-link" href="images/staff/${row.images}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="images/staff/${row.images}"  alt="${row.category?row.category?row.category.main_name:'':''}" height="60" width="60" style="border-radius: 50%!important;" />
        </a>`:
        `<a class="example-image-link" href="images/staff/no-image.png" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="images/staff/no-image.png"  alt="''" height="60" width="60" style="border-radius: 50%!important;" />`;

    }},

    {"data":"emp_id","render":function(status,type,row){

        return row.emp_id?row.emp_id:'';

    }},

    {"data":"name","render":function(status,type,row){

        return row.name?row.name:''+' '+row.fname?row.fname:'';

    }},
    {"data":"email","render":function(status,type,row){

        return row.email?row.email:'';

    }},
    {"data":"mobile","render":function(status,type,row){

        return row.mobile?row.mobile:'';

    }},
    {"data":"branch_id","render":function(status,type,row){

        return row.branch?row.branch.branch_name:'';

    }},

    {"data":"date_join","render":function(status,type,row){

        return row.date_join?row.date_join:'';

    }},




    {"data":"status","render":function(status,type,row){

        var buttons = row.status==1?`<a href="javascript:;" data-ids='${row.emp_id}' onclick="EmployeeStatusChange(this)" class="btn-sm btn-danger"> Left </a>`:`<a href="javascript:;" data-ids='${row.emp_id}' class="btn-sm btn-info" onclick="EmployeeStatusChange(this)"> Left </a>`;
        buttons+=`<a href="admin/employee/${row.emp_id}/edit"  class="btn-sm btn-success"> Edit </a>`;
        @if(Auth::user()->can('Employee Statement')   )
        buttons+=`<a href="admin/employee-statement/${row.emp_id}"  class="btn-sm btn-warning"> statement </a>`;
        @endif

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

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-font.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-ios.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-android.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('js/datepickerScroll/src/anypicker-windows.css')}}" /> 

<!-- <script type="text/javascript" src="{{asset('js/datepickerScroll/vendors/jquery-1.11.1.min.js')}}"></script> -->
<script type="text/javascript" src="{{asset('js/datepickerScroll/src/anypicker.js')}}"></script>

<script type="text/javascript">

    $("#joiningdate").AnyPicker({
        mode: "datetime",
        dateTimeFormat: " dd-MMM-yyyy",
    });
    $(".dobEmployee").AnyPicker({
        mode: "datetime",
        dateTimeFormat: " dd-MMM-yyyy",
    });


    
    $('.branch_id').select2();


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

        $("[name='student_id']").html(` <option selected="selected" value='0'> All Classes  </option>`);

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
                        $("[name='student_id']").append(option);
                    });

                    $('.student_id').select2();
                }
            });
        }

    }

</script>

<link href="{{asset('assets/multi-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/multi-select/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

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

    $('.branch_id').select2();


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
<script type="text/javascript">

    $('#pre-selected-options').multiSelect();
    $('#permission-selected-options').multiSelect();
</script>


@endpush
