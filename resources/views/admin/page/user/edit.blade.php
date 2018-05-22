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
            <form action="{{route('update')}}" method="POST" class="form-horizontal" id="form_sample_1">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="id" value="{{$user->id}}"/>
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
                            <input type="text" class="form-control" value="{{$user->name}}" placeholder="" name="name">
                            <div class="form-control-focus"> </div>
                            <span class="help-block">enter your full name</span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Email</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" class="form-control" value="{{$user->email}}" name="email" placeholder="Enter your email">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Password
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" value="" placeholder="">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Phone Number
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$user->phone}}" placeholder="" name="phone">
                            <div class="form-control-focus"> </div>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Address
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <div class="input-icon">
                                <input type="text" class="form-control" value="{{$user->address}}" placeholder="Enter Address" name="address">
                                <div class="form-control-focus"> </div>
                                <i class="fa fa-bell-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">BOD
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <div class="input-icon">
                                <input type="text" value="{{Carbon\Carbon::Parse($user->dob)->format('d/m/Y')}}" class="form-control" id="mask_date" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-md-radios">
                        <label class="col-md-3 control-label" for="form_control_1">Gender</label>
                        <div class="col-md-9">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="checkbox1_8" class="md-radiobtn" 
                                        @if($user->gender === "Male")
                                            checked
                                        @endif
                                    >
                                    <label for="checkbox1_8">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Male </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="checkbox1_9" class="md-radiobtn"
                                        @if($user->gender === "Female")
                                            checked
                                        @endif
                                    >
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
                            <button type="submit" class="btn green">Submit</button>
                            <a href="{{ asset('admin/users/view') }}" class="btn default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
@endsection