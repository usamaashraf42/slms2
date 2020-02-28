@extends('_layouts.admin.default')
@section('title', 'Employee Edit')
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="card-box">
                <div class="card-block">
                    <h4 class="card-title">Employee Edit</h4>
                    
                    @component('_components.alerts-default')
                    @endcomponent
                    <form method="POST" action="{{ route('employee.update',$user->emp_id) }}" enctype = "multipart/form-data" id="upload_new_form">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
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
                                    <div class="col-md-3">
                                        <label class="control-label" style="width: 100%;">Branch 
                                            <span style="color: red">*</span>
                                        </label>
                                        <select class="form-control branch_id" name="branch_id"  id="select_branch" onchange="department(this)" required>
                                            <option selected="selected" disabled="disabled">All Branches</option>
                                            @if(!empty($branches))
                                            @foreach($branches as $branch)
                                            <option value="{{$branch['id']}}" @if(isset($user->branch_id) && $user->branch_id==$branch['id']) selected @endif>{{$branch['branch_name']}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <p class="alert alert-danger branch_id_error" style="display: none"></p>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label" style="width: 100%;">Department 
                                            <span style="color: red">*</span>
                                        </label>
                                        <select class="form-control dep_id" name="dep_id"  >
                                            <option selected="selected" disabled="disabled" value="0">Department</option>
                                            @if(!empty($departments))
                                            @foreach($departments as $branch)
                                            <option value="{{$branch['dep_id']}}" @if(isset($user->dep_id) && $user->dep_id==$branch['dep_id']) selected @endif>@isset($branch->department->dep_name){{$branch->department->dep_name}} @endisset</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <p class="alert alert-danger dep_id_error" style="display: none"></p>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label" style="width: 100%;">Designation 
                                            <span style="color: red">*</span>
                                        </label>
                                        <select class="form-control designation_Code" name="designation_Code"   >
                                            <option selected="selected" disabled="disabled" value="0">Select Designation</option>
                                            @if(!empty($designations))
                                            @foreach($designations as $branch)
                                            <option value="{{$branch['id']}}" @if(isset($user->designation_Code) && $user->designation_Code==$branch['id']) selected @endif>{{$branch['designation']}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <p class="alert alert-danger branch_id_error" style="display: none"></p>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label" style="width: 100%;">Shift 
                                            <span style="color: red">*</span>
                                        </label>
                                        <select class="form-control shift_id" name="shift_id" >
                                            <option selected="selected" disabled="disabled" value="0">Select Shift</option>
                                            @if(!empty($shifts))
                                            @foreach($shifts as $shift)
                                            <option value="{{$shift['id']}}" @if(isset($user->shift) && $user->shift==$shift['id']) selected @endif>{{$shift['title']}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <p class="alert alert-danger branch_id_error" style="display: none"></p>
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px 0px;">
                                    <div class="col-md-6">
                                        <label class="control-label"> Name</label>
                                        <input name="name" value="@isset($user->name){{ $user->name }} @endisset" type="text" placeholder="First Name" class="form-control">
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
                                        <input name="fname" value="@isset($user->fname){{ $user->fname }} @endisset" type="text" placeholder="First Name" class="form-control">
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
                                        <input name="email" type="email" value="@isset($user->email) {{ $user->email }} @endisset" class="form-control" placeholder="abc123@example.com">
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
                                        <input type="text" name="phone" value="@isset($user->mobile)  {{ $user->mobile }} @endisset" placeholder="Mobile No" class="form-control">

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
                                        <input name="cnic" type="text" value="@isset($user->cnic) {{ $user->cnic }} @endisset" class="form-control" placeholder="abc123@example.com">
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
                                                <input type="text" class="form-control dobEmployee" value="@isset($user->DOB) {{ $user->DOB }} @endisset" readonly name="dob" id="dob" autocomplete="off"  placeholder="dob">
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
                                                <input type="text" class="form-control" value="@isset($user->date_join) {{ $user->date_join }} @endisset " readonly name="joiningdate" id="joiningdate" autocomplete="off"  placeholder="joiningdate">
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
                                        <input name="salary" type="number" min="0" value=" @isset($user->salary) {{ $user->salary }} @endisset  " class="form-control" value="0">
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
                                        <input name="qualification" type="text" min="0" value="@isset($user->degreein_education) {{ $user->degreein_education }} @endisset  " class="form-control" value="0">
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

                                    <!-- <div class="col-md-6">
                                        <label class="control-label">Designation</label>
                                        <input name="designation" type="text" min="0" value="@isset($user->designation_Code) {{ $user->designation_Code }} @endisset " class="form-control">
                                        @if ($errors->has('designation'))
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <strong>Warning!</strong> {{$errors->first('designation')}}
                                        </div>
                                        @endif
                                    </div> -->

                                </div>
                                <div class="row" style="margin: 10px 0px;">


                                    <div class="col-md-12">
                                        <label class="control-label">Address</label>
                                        <textarea name="address" type="text"  class="form-control">@isset($user->address) {{ $user->address }} @endisset </textarea>
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
                    </div>



                    <div class="col-lg-12 box_style">
                        <h2 class="h2_bav">Salary</h2>


                        <div class="row">

                            <div class="col-md-12" style="margin-bottom: 20px;">

                                <div class="row" style="margin: 10px 0px;">
                                    <div class="col-md-3">
                                        <label class="control-label"> Monthly Salary</label>
                                        <input name="monthly_salary" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->monthly_salary }} @endisset " type="text" step="any" min="0"  class="form-control">
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
                                        <input name="total_insurance" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->total_insurance }} @endisset  " type="text" step="any" min="0"  class="form-control">
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
                                        <input name="total_insurance_install" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->total_insurance_install }} @endisset " type="text" step="any" min="0"  class="form-control">
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
                                        <label class="control-label">Profident Fund Deduction</label>
                                        <select name="pf" type="text" step="any" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->pf }} @endisset" class="form-control" placeholder="0">
                                            <option value="0" @if(isset($user->EmployeeSalary->pf) && $user->EmployeeSalary->pf < 0) selected @endif> No </option>
                                            <option value="1" @if(isset($user->EmployeeSalary->pf) && $user->EmployeeSalary->pf > 0) selected @endif>Yes</option>

                                        </select>
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
                                        <label class="control-label">TA</label>
                                        <input name="ta" type="text" step="any" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->ta }} @endisset" class="form-control" placeholder="0">
                                        @if ($errors->has('ta'))
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <strong>Warning!</strong> {{$errors->first('ta')}}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label">Medical</label>
                                        <input type="text" step="any" min="0" name="medical" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->medical }} @endisset "  class="form-control">

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
                                        <input name="house_rent" type="text" step="any" min="0" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->house_rent }} @endisset " class="form-control">
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
                                        <input name="transport" type="text" step="any" min="0" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->transport }} @endisset " class="form-control" >
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
                                        <input name="mobile"  type="text" step="any" min="0" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->mobile }} @endisset " class="form-control" >
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
                                        <input name="allow_leaves" type="text" min="0" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->allow_leaves }} @endisset " class="form-control" value="0">
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
                                        <input name="total_annual_leave" type="text" step="any" min="0" value="@isset($user->EmployeeSalary) {{ $user->EmployeeSalary->total_annual_leave }} @endisset " class="form-control" value="0">
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
</div>
</div>
@endsection

@push('post-styles')

<style>
    .box_style{
        margin-top: 20PX;
        border: 1px solid #ccc;
        padding: 4px 10px;
        box-shadow: 0px 4px 4px #bbb;
    }
    .h2_bav{
        background: #014671;
        padding: 8px;
        color: aliceblue;
        border-left: 10px solid #000;
        border-right: 10px solid #000;
        box-shadow: 0px 4px 4px #bbb;
        text-shadow: 0px 3px 4px #000;
        text-align: center;

    }
</style>

@endpush
@push('post-scripts')


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


    function department(obj){
        shifts();
        $("[name='dep_id']").html(` <option selected="selected" value='0'> Select Department  </option>`);

        var branch_id  = $(".branch_id").val();
        console.log('branch',$("[name='branch_id']").val());
        $('.branch').val(branch_id);
        $.ajax({
            method:"POST",
            url:"{{route('branchHasDepartment')}}",
            data : {branch_id:branch_id},
            dataType:"json",
            success:function(res){
                console.log('departments record',res);
                if(res.status){
                    res.data.forEach(function(val,ind){
                        var id = val.dep_id;
                        var name = val.department.dep_name;
                        var option = `<option value="${id}">${name}</option>`;
                        $("[name='dep_id']").append(option);
                    });
                }
                

            }
        });

    }


     function shifts(){
        $("[name='shift_id']").html(` <option selected="selected" value='0'>Select Shift  </option>`);

        var branch_id  = $(".branch_id").val();
        console.log('branch',$("[name='branch_id']").val());
        $('.branch').val(branch_id);
        $.ajax({
            method:"POST",
            url:"{{route('departmentHasShift')}}",
            data : {branch_id:branch_id},
            dataType:"json",
            success:function(res){
                console.log('shift record',res);
                if(res.status){
                    res.data.forEach(function(val,ind){
                        var id = val.id;
                        var name = val.title;
                        var option = `<option value="${id}">${name}</option>`;
                        $("[name='shift_id']").append(option);
                    });
                }
                
            }
        });

    }


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