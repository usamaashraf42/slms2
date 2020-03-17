<div class="panel">
    <div class="panel-heading">
        <h4 class="panel-title">Add New Department</h4>
    </div>
    <div class="panel-body">

        @component('_components.alerts-default')
        @endcomponent
        <hr>

        {{ Form::open(array('route' => 'admin.department.store','method'=>'POST','class'=>'m-form m-form--state form-horizontal','name'=>'add_department_form','id'=>'add_department_form')) }}
        <div class="form-group @if($errors->has('agency_category_id')) has-error @endif">
            <label class="col-sm-3 control-label">Agency Category<span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <select class="form-control select2" name="agency_category_id" id="agency_category_id" required>
                    <option value="">Select Agency</option>
                    <?php foreach ($agency_category as $agency) { ?>
                        <option value="<?php echo $agency->agency_category_id; ?>"><?php echo $agency->agency_category; ?></option>
                    <?php } ?>
                </select>

                @if ($errors->has('agency_category_id'))
                <label id="agency_category_id-error" class="error" for="agency_category_id">{{$errors->first('agency_category_id')}}</label>
                @endif

            </div>
        </div><!-- End form-group -->


        <div class="form-group @if($errors->has('district_id')) has-error @endif">
            <label class="col-sm-3 control-label">District<span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <select class="form-control select2" name="district_id" id="district_id" required>
                    <option value="">Select District</option>
                    <?php foreach ($districts as $district) { ?>
                        <option value="<?php echo $district->district_id; ?>"><?php echo $district->district_name; ?></option>
                    <?php } ?>
                </select>

                @if ($errors->has('district_id'))
                <label id="district_id-error" class="error" for="district_id">{{$errors->first('district_id')}}</label>
                @endif

            </div>
        </div><!-- End form-group -->



        <div class="form-group   @if($errors->has('deptt_file_no')) has-error @endif">
            <label class="col-sm-3 control-label">Department File No.<span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input name="deptt_file_no" type="text" value="{{ old('deptt_file_no') }}" class="form-control" required size="25" >

                @if ($errors->has('deptt_file_no'))
                <label id="deptt_file_no-error" class="error" for="deptt_file_no">{{$errors->first('deptt_file_no')}}</label>
                @endif
            </div>
        </div>


        <div class="form-group   @if($errors->has('deptt_name')) has-error @endif">
            <label class="col-sm-3 control-label">Department Name<span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input name="deptt_name" type="text" value="{{ old('deptt_name') }}" class="form-control" required size="25" >

                @if ($errors->has('deptt_name'))
                <label id="deptt_name-error" class="error" for="deptt_name">{{$errors->first('deptt_name')}}</label>
                @endif
            </div>
        </div>


        <div class="form-group   @if($errors->has('deptt_address')) has-error @endif">
            <label class="col-sm-3 control-label">Department Address<span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input name="deptt_address" type="text" value="{{ old('deptt_address') }}" class="form-control" required size="25" >

                @if ($errors->has('deptt_address'))
                <label id="deptt_address-error" class="error" for="deptt_address">{{$errors->first('deptt_address')}}</label>
                @endif
            </div>
        </div>


        <div class="form-group   @if($errors->has('deptt_contact_no')) has-error @endif">
            <label class="col-sm-3 control-label">Department Phone No.</label>
            <div class="col-sm-4">
                <input name="deptt_contact_no" type="text" value="{{ old('deptt_contact_no') }}" class="form-control"  size="25" >

                @if ($errors->has('deptt_contact_no'))
                <label id="deptt_contact_no-error" class="error" for="deptt_contact_no">{{$errors->first('deptt_contact_no')}}</label>
                @endif
            </div>
        </div>


        <div class="form-group   @if($errors->has('deptt_fax_no')) has-error @endif">
            <label class="col-sm-3 control-label">Department Fax No.</label>
            <div class="col-sm-4">
                <input name="deptt_fax_no" type="text" value="{{ old('deptt_fax_no') }}" class="form-control"  size="25" >

                @if ($errors->has('deptt_fax_no'))
                <label id="deptt_fax_no-error" class="error" for="deptt_fax_no">{{$errors->first('deptt_fax_no')}}</label>
                @endif
            </div>
        </div>



        <hr />
        <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-success btn-quirk btn-wide mr5">Save</button>
                <button type="reset" class="btn btn-quirk btn-wide btn-default">Reset</button>
            </div>
        </div>

        {{  Form::close() }}
        <!--form ends-->

    </div>
</div>