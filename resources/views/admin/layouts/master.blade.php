<!DOCTYPE html>
<html>

@include('admin.includes.head')


<body class="hold-transition skin-black sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('admin.includes.header')

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        @include('admin.includes.sidebar')

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <x-breadcrumb :title="$breadcrumbTitle ?? 'Page'" :links="$breadcrumbLinks ?? []"/>

            <!-- Main content -->
            <section class="content">
                @include('admin.partials.alerts')
                @yield('content')

            </section>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->

        @include('admin.includes.footer')
    </div>
    <!-- ./wrapper -->
    <script src="{{ asset('js/admin_main.js?'.rand()) }}"></script>
    @yield('extra-js')

</body>

</html>
