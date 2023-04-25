<header class="main-header">
    <!-- Logo -->
    <a href="/dashboard/admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">INFORMATICA</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">INFORMATICA</span>
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
                        <img src="{{asset('assets/dashboard/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{auth()->guard('admin')->user()->full_name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('assets/dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                            <p>
                                {{auth()->guard('admin')->user()->full_name}} - Admin
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/dashboard/profile" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form action="{{route('dashboard.logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat">Déconnexion</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->guard('admin')->user()->full_name}}</p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>
            <li>
                <a href="/dashboard/admin">
                    <i class="fa fa-dashboard"></i> <span>Acceuil</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Comptes</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/dashboard/admins"><i class="fa fa-circle-o"></i> Admins</a></li>
                    <li><a href="/dashboard/users"><i class="fa fa-circle-o"></i> Utilisateurs</a></li>
                </ul>
            </li>

            <li>
                <a href="/dashboard/products">
                    <i class="fa fa-dashboard"></i> <span>Produits</span>
                </a>
            </li>

            <li>
                <a href="/dashboard/ads">
                    <i class="fa fa-dashboard"></i> <span>Publicités</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
