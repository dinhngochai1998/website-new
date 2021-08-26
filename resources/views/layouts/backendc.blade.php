<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta content="ie=edge" http-equiv="x-ua-compatible" />
        <title></title>
        <meta content="width=device-width,initial-scale=1" name="viewport" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="">

        @yield('styles')
          <!-- Google Font: Source Sans Pro -->
        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('backendc/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('backendc/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('backendc/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('backendc/plugins/jqvmap/jqvmap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('backendc/dist/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('backendc/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('backendc/plugins/daterangepicker/daterangepicker.css') }}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('backendc/plugins/summernote/summernote-bs4.min.css') }}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('backendc/plugins/toastr/toastr.min.css') }}">
        <!-- Sweetalert2 -->
        <link rel="stylesheet" href="{{ asset('backendc/plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backendc/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

        <link rel="stylesheet" href="{{ asset('backendc/css/style.css') }}">
    </head>

        <body class="hold-transition sidebar-mini layout-fixed">
            @include('backendc.includes.sidebar')
                @yield('content')
        </body>

    @yield('js')

    <!-- jQuery -->
    <script src="{{ asset('backendc/plugins/jquery/jquery.min.js') }}"></script>

    <!-- jQuery -->
    <script src="{{  asset('backendc/js/common.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backendc/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backendc/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backendc/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('backendc/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backendc/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backendc/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backendc/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('backendc/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backendc/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backendc/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('backendc/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backendc/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backendc/dist/js/adminlte.js') }}"></script>
    <!-- Toastr App -->
    <script src="{{ asset('backendc/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Toastr App -->
    <script src="{{ asset('backendc/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backendc/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('backendc/dist/js/pages/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

</html>
