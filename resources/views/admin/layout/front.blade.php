<!DOCTYPE html>
<html lang="en">
@include ('admin.layout.header')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
    <div class="clearfix"> </div>
    <div class="page-container">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                   @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include ('admin.layout.footer')
    @include ('admin.layout.script')
    @yield('jquery')
</body>

</html>