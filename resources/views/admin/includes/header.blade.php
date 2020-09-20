<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>ارتقي</b> ورتل</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <li class="dropdown ">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                      <span class="mr-1">مرحبا
                      <span
                      class="user-name text-bold-700">{{auth()->user()->name}}</span>
                     </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href=""><i
                                    class="ft-user"></i> تعديل الملف الشحصي </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ft-power"></i> تسجيل
                                الخروج </a>
                        </div>
                    </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @auth
                            {{-- <img src="{{ asset('images/avatars/avatar.png') }}" class="user-image"> --}}
                            {{-- <span class="hidden-xs">{{ auth()->user()->name }}</span> --}}
                        @endauth
                    </a>
                    <ul class="dropdown-menu">

                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('images/avatars/avatar.png') }}" class="img-circle" alt="User Image">

                            <p>
                                {{-- {{ auth()->user()->name }} --}}
                                {{-- <small>{{ auth()->user()->created_at->format('M. Y') }}</small> --}}
                            </p>

                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="pull-right">
                                {{-- <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">الحساب الشخصي</a> --}}
                            </div>
                            <div class="pull-left">
                                <a href="javascript:;" class="btn btn-default btn-flat" onclick="getElementById('logout').submit();">{{ __("Logout") }}</a>
                                <form action="{{ route('admin.logout') }}" method="POST" id="logout">
                                    @csrf
                                </form>
                            </div>


                        </li>


                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
