<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start active open">
                <a href="{{ url('/admin') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('listadmin.test') }}" class="nav-link nav-toggle">
                    <i class="icon-notebook"></i>
                    <span class="title">Test</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('listadmin.content') }}" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Content</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('view.ques') }}" class="nav-link nav-toggle">
                    <i class="icon-question"></i>
                    <span class="title">Question</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('list.test.skill') }}" class="nav-link nav-toggle">
                    <i class="icon-badge"></i>
                    <span class="title">Test Skill</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('view.user') }}" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">User</span>
                    <span class="arrow"></span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->