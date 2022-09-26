<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin-lte') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin-lte') }}/bower_components/Ionicons/css/ionicons.min.css">
    @auth
        <!-- DataTables -->
        <link rel="stylesheet"
            href="{{ asset('admin-lte') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- AdminLTE Skins-->
        <link rel="stylesheet" href="{{ asset('admin-lte') }}/dist/css/skins/_all-skins.min.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        {{-- My Css --}}
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @else
    @endauth
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte') }}/dist/css/AdminLTE.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition @auth fixed skin-blue sidebar-mini @else login-page @endauth">
    @include('sweetalert::alert')

    @auth
        <div class="wrapper">
            @include('partials.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.18
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
                reserved.
            </footer>
        </div>
    @else
        @yield('content')
    @endauth

    <!-- jQuery 3 -->
    <script src="{{ asset('admin-lte') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin-lte') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    @auth
        <!-- DataTables -->
        <script src="{{ asset('admin-lte') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('admin-lte') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('admin-lte') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="{{ asset('admin-lte') }}/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin-lte') }}/dist/js/adminlte.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset('admin-lte') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- page script -->
        <script>
            $(function() {
                $('#example1').DataTable()
                $('#example2').DataTable({
                    'paging': true,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false
                })
            })

            $('.textarea').wysihtml5()
        </script>

        @if ($active == 'pesantrens')
            <script src="{{ asset('assets/js/pesantrens.js') }}"></script>
        @endif

    @endauth

</body>

</html>
