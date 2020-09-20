<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-right image">
                {{-- <img src="{{ asset('images/avatars/avatar.png') }}" class="img-circle" alt="User Image"> --}}
            </div>
            <div class="pull-right info">
                {{-- <p>{{ auth('admin')->user()->name }}</p> --}}
                {{-- <a href="#"><i class="fa fa-circle text-success"></i> {{ __('Online') }}</a> --}}
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ __('Dashboard') }}</li>
        </ul>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.admin_users.index') }}">
                    <i class="fa fa-user"></i> <span>{{ __('الادمن') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.students.index') }}">
                    <i class="fa fa-users"></i> <span>{{ __('الطلاب') }}</span>
                </a>
            </li>
        </ul>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.teachers.index') }}">
                    <i class="fa fa-users "></i><span>{{ __('الشيوخ') }}</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
