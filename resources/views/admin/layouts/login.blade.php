<!DOCTYPE html>
<html>

    @include('admin.includes.head')

    <body class="hold-transition login-page">

        @yield('content')

        <script src="{{ asset('js/admin_main.js?'.rand()) }}"></script>


    </body>

</html>
