@extends('front.page.master') @section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success" id="reportAdd">{{ Session::get('flash_message')}}</div>
@endif

@if(Session::has('error_message'))
    <div class="alert alert-danger">
    @foreach(Session::get('error_message') as $error)
    {{ $error }}<br>
    @endforeach
    </div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="profile-sidebar">
        <div class="portlet light profile-sidebar-portlet ">
          <div class="profile-userpic">
            <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
          <div class="profile-usertitle">
            <div class="profile-usertitle-name"> {{ $user->name}} </div>
            <div class="profile-usertitle-job"> {{ $user->email}} </div>
          </div>
        </div>
      </div>
      <div class="profile-content">
        <div class="row">
          <div class="col-md-12">
            <div class="portlet light ">
              <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                  <i class="icon-globe theme-font hide"></i>
                  <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                </div>
              </div>
              <div class="portlet-body">
                <div class="tab-content">
                  <!-- PERSONAL INFO TAB -->
                  <div class="tab-pane active" id="tab_1_1">
                    <form action="{{route('update.user')}}" method="POST">
                      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                      <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" value="{{$user->name}}" name="name" placeholder="Name" class="form-control" /> </div>
                      <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="text" value="{{$user->email}}" name="email" placeholder="Email" class="form-control" /> </div>
                      <div class="form-group">
                        <label class="control-label">Phone Number</label>
                        <input type="text" value="{{$user->phone}}" name="phone" placeholder="+1 646 580 DEMO (6284)" class="form-control" /> </div>
                      <div class="form-group">
                        <label class="control-label">Address</label>
                        <input type="text" value="{{$user->address}}" placeholder="Enter Address" name="address" class="form-control" /> </div>
                      <div class="form-group">
                        <label class="control-label">Day of Birth</label>
                        <input type="date" value="{{Carbon\Carbon::Parse($user->dob)->format('d/m/Y')}}" id="mask_date" class="form-control" /> </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="form_control_1">Gender</label>
                        <div class="col-md-9">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" name="gender" id="checkbox1_8" class="md-radiobtn" value="male" 
                                        @if($user->gender === "Male" || $user->gender === "male")
                                            checked
                                        @endif
                                    >
                                    <label for="checkbox1_8">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Male </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" name="gender" id="checkbox1_9" class="md-radiobtn" value="female"
                                        @if($user->gender === "Female" || $user->gender === "female")
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
                        <button type="submit" class="btn green"> Update </button>
                        <a href="{{ route('homepage') }}" class="btn default"> Cancel </a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection