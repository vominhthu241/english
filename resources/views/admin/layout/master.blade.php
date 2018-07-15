<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!--HEADER-->
@include ('admin.layout.header')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
    <!-- BEGIN HEADER -->
    @include ('admin.layout.navbar')
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- SIDE BAR -->
        @include ('admin.layout.sidebar')
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <!-- THEME-->
                <h1 class="page-title"> Admin
                    <small>Admin Management</small>
                </h1>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Dashboard</span>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                @yield('content')
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!--FOOTER -->
    @include ('admin.layout.footer')
    @include ('admin.layout.script')
    @yield('jquery')
</body>

</html>