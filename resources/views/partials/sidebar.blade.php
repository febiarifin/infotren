<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/img/default-profile.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('assets/img/default-profile.png') }}" class="img-circle"
                                alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small
                                    class="label bg-primary">{{ \Carbon\Carbon::parse(now())->formatLocalized('%d %B %Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-danger btn-logout">Logout <i
                                    class="fa  fa-sign-out"></i></a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/img/default-profile.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ $active == 'dashboard' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ $active == 'pesantrens' ? 'active' : '' }}">
                <a href="{{ route('pesantrens') }}">
                    <i class="fa fa-th"></i> <span>Manajemen Pesantren</span>
                </a>
            </li>
            <li class="{{ $active == 'settings' ? 'active' : '' }}">
                <a href="{{ route('settings') }}">
                    <i class="fa fa-gear"></i> <span>Pengaturan</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
