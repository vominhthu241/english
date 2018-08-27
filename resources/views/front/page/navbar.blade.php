<div class="page-logo">
    <a href="{{route('homepage')}}">
        <img src="../assets/global/img/english/logo_english.png" alt="logo" class="logo-default"> </a>
    <div class="menu-toggler sidebar-toggler">
        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-top">
  <!-- BEGIN TOP NAVIGATION MENU -->
  <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        <li class="menu"><a href="{{ route('homepage') }}"><b>Home</b></a></li>
        <li class="menu"><a href="{{ route('view.testread') }}"><b>Test Reading Online</b></a></li> 
        <li class="menu"><a href="{{ route('view.testlist') }}"><b>Test Listening Online</b></a></li> 
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        @if(Session::has('users'))
            <li class="menu dropdown dropdown-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" class="img-circle" src="../assets/global/img/default-user-icon-23.jpg" width="24" height="24"/>
                    <span class="username username-hide-on-mobile"> {{ Session::get('users')->name }} </span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-default">
                    <li>
                        <a id="e{{ Session::get('users')->id }}" href="{{ route('profile', [ 'id' => Session::get('users')->id]) }}">
                            <i class="icon-user"></i> My Profile </a>
                    </li>
                    @if(Auth::check())
                    @if(Auth::user()->role == 0)
                    <li>
                        <a href="{{ route('admin.user')}}">
                            <i class="icon-user"></i> Admin </a>
                    </li>
                    @endif
                    @endif
                    <li class="divider"> </li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <i class="icon-key"></i> Log Out </a>
                    </li>
                </ul>
            </li>
        @else
            <a href="{{ route('to.login') }}" style="display: inline-block; padding: 15px 0;">
                <li class="menu">Login</li>
                </li>
            </a>
        @endif
        <!-- END USER LOGIN DROPDOWN -->
      </ul>
  </div>
  <!-- END TOP NAVIGATION MENU -->
</div>