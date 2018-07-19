@extends('front.page.master') @section('content') @if(Session::has('flash_message'))
<div class="alert alert-success" id="reportAdd">{{ Session::get('flash_message')}}</div>
@endif @if(Session::has('error_message'))
<div class="alert alert-danger">
  @foreach(Session::get('error_message') as $error) {{ $error }}
  <br> @endforeach
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="profile-sidebar" style="height:300px;">
        <div class="portlet light profile-sidebar-portlet ">
          <div class="profile-userpic">
            <img src="../assets/global/img/default-user-icon-23.jpg" class="img-responsive" alt=""> </div>
          <div class="profile-usertitle">
            <div class="profile-usertitle-name"> {{ $data['user']->name }} </div>
            <div class="profile-usertitle-job"> {{ $data['user']->email }} </div>
            <div><a id="e{{ $data['user']->id }}" href="{{ route('profile', [ 'id' => $data['user']->id]) }}">See my profile</a></div>
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
                  <span class="caption-subject font-blue-madison bold uppercase">Test Result</span>
                </div>
              </div>
              <div class="portlet-body">
                <div class="tab-content">
                  <!-- PERSONAL INFO TAB -->
                  <div class="user-socer green">
                    <div>
                      <div class="pmi-caption">
                          <span>{{ $data['test']->name }}</span>
                      </div>
                      <div class="om-item">
                          <a>
                              <span class="om-icon"> </span>
                              <strong>{{ $data['content']->name }}</strong>
                          </a>
                      </div>
                    </div>
                    <h2>Your score is:</h2>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="welldone">
                          <div class="wd-round">
                            <span class="pr-icon-true"> </span>
                            <p>Correct Answers</p>
                            <strong>{{ $data['testresult']->correct_answer }}/10</strong>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="welldone">
                          <div class="wd-round score">
                            <strong>{{ $data['testresult']->score}}</strong>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="welldone">
                          <div class="wd-round">
                            <span class="pr-icon-time"> </span>
                            <p style="padding-left:20px;">Time Spent</p>
                            <strong>{{ $data['timetaken']}}</strong>
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
      </div>
    </div>
  </div>
</div>
@endsection