@extends('admin.layout.master')
@section('content')
    <div class="portlet light portlet-fit portlet-form ">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject font-green sbold uppercase">Basic Validation</span>
            </div>
            <div class="actions">
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                    <i class="icon-cloud-upload"></i>
                </a>
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                    <i class="icon-wrench"></i>
                </a>
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                    <i class="icon-trash"></i>
                </a>
            </div>
        </div>
        @if(Session::has('flash_message'))
            <div class="alert alert-success" id="reportAdd">{{ Session::get('flash_message')}}</div>
        @endif
        <div class="portlet-body">
            <!-- BEGIN FORM-->
            <form action="{{route('add')}}" method="POST" class="form-horizontal" id="form_sample_1">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-body">
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-success display-hide">
                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="name">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Email
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Password
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" placeholder="" name="password">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Confirm Password
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" placeholder="" name="confirm_password">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Phone Number
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="phone">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Address
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Enter Address" name="address">
                                <div class="form-control-focus"> </div>
                                <i class="fa fa-bell-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Day of Birth
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <div class="input-icon">
                                <input type="date" class="form-control" id="mask_date" name="dob">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-md-radios">
                        <label class="col-md-3 control-label" for="form_control_1">Gender</label>
                        <div class="col-md-9">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="checkbox1_8" name="gender" value="male" class="md-radiobtn">
                                    <label for="checkbox1_8">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Male </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="checkbox1_9" name="gender" value="female" class="md-radiobtn">
                                    <label for="checkbox1_9">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Female </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" id="addUser" class="btn green">Submit</button>
                            <a href="{{ asset('admin/users/view') }}" class="btn default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>

@endsection
@section('jquery')
    
@endsection