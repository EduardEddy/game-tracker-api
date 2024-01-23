<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Admin')</title>
    <link rel="icon" type="{{ asset('assets/logos/play_time_logo.png') }}">
    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('assets/template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('assets/template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/template/css/icons-number.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.dashboard_components.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.dashboard_components.navbar')
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title_page', 'Dashboard')</h1>
                    </div>
                    @yield('content')
                </div>
            </div>
            @include('layouts.dashboard_components.footer')
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('assets/template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('assets/template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('assets/template/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <!--script src="{{ URL::asset('assets/template/vendor/chart.js/Chart.min.js') }}"></script-->

    <!-- Page level custom scripts -->
    <!--script src="{{ URL::asset('assets/template/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ URL::asset('assets/template/js/demo/chart-pie-demo.js') }}"></script-->
    @yield('script')

</body>

</html>
