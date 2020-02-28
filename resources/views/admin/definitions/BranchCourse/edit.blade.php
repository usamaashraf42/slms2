@extends('_layouts.admin.default')
@section('title', 'Branch')
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="card-box">
                <div class="card-block">
                    <h4 class="card-title">Branch Mangement</h4>
                    
                    @component('_components.alerts-default')
                    @endcomponent
                    <form method="POST" action="{{ route('branch-class.update',$user->id) }}" enctype = "multipart/form-data" id="upload_new_form">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="row">
                            
                            <div class="col-md-12" style="margin-bottom: 20px;">
                                <div class="row">
                                  <div class="col-md-12">
                                    <label class="control-label" style="width: 100%;">Branch 
                                      <span style="color: red">*</span></label>
                                      <input class="form-control branch_id" name="branch_name" value="{{$user->branch_name}}" readonly  id="select_branch" required>
                                      
                                    <p class="alert alert-danger branch_id_error" style="display: none"></p>
                                </div>
                            </div>
                            
                            <div class="row" style="margin: 10px 0px;">
                                <div class="col-md-12 col-sm-12">
                                    <label class="control-label">Classes</label>
                                    <select id='permission-selected-options' multiple='multiple' name="courses[]">
                                        @foreach($course as $permission)
                                        <option @if($user->hasCourse($permission)) selected @endif  value="{{$permission->id}}">{{$permission->course_name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                           
                        </div> 

                        <div class="row">

                            <div class="col-md-offset-3 col-md-9">

                                <button class="btn btn-success" type="Submit" name="submit">Save</button>
                            </form>

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