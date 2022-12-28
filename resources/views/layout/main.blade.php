<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/') }}img/brand/favicon.png" type="image/x-icon" />

    <!-- Icons css -->
    <link href="{{ asset('/') }}css/icons.css" rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="{{ asset('/') }}plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- style css -->
    <link href="{{ asset('/') }}css/style.css" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ asset('/') }}css/animate.css" rel="stylesheet">

</head>

<body class="main-body app sidebar-mini ltr">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('/') }}img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page custom-index">
        <div>
            <!-- main-header -->
            @include('layout.header')
            <!-- /main-header -->

            <!-- main-sidebar -->
            @include('layout.sidebar')
            <!-- main-sidebar -->
        </div>

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- container -->
            <div class="main-container container-fluid">

                @yield('isi')
            </div>
        </div>

        <!-- Footer opened -->
        @include('layout.footer')
        <!-- Footer closed -->

    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

    <!-- JQuery min js -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--Internal  Chart.bundle js -->
    <script src="{{ asset('/') }}plugins/chart.js/Chart.bundle.min.js"></script>

    <!-- Moment js -->
    <script src="{{ asset('/') }}plugins/moment/moment.js"></script>

    <!--Internal Sparkline js -->
    <script src="{{ asset('/') }}plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Moment js -->
    <script src="{{ asset('/') }}plugins/raphael/raphael.min.js"></script>

    <!--Internal Apexchart js-->
    <script src="{{ asset('/') }}js/apexcharts.js"></script>

    <!-- Rating js-->
    <script src="{{ asset('/') }}plugins/ratings-2/jquery.star-rating.js"></script>
    <script src="{{ asset('/') }}plugins/ratings-2/star-rating.js"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{ asset('/') }}plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}plugins/perfect-scrollbar/p-scroll.js"></script>

    <!-- Eva-icons js -->
    <script src="{{ asset('/') }}js/eva-icons.min.js"></script>

    <!-- right-sidebar js -->
    <script src="{{ asset('/') }}plugins/sidebar/sidebar.js"></script>
    <script src="{{ asset('/') }}plugins/sidebar/sidebar-custom.js"></script>

    <!-- Sticky js -->
    <script src="{{ asset('/') }}js/sticky.js"></script>
    <script src="{{ asset('/') }}js/modal-popup.js"></script>

    <!-- Left-menu js-->
    <script src="{{ asset('/') }}plugins/side-menu/sidemenu.js"></script>

    <!-- Internal Map -->
    <script src="{{ asset('/') }}plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('/') }}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

    <!--Internal  index js -->
    <script src="{{ asset('/') }}js/index.js"></script>

    <!--themecolor js-->
    <script src="{{ asset('/') }}js/themecolor.js"></script>

    <!-- Apexchart js-->
    <script src="{{ asset('/') }}js/apexcharts.js"></script>
    <script src="{{ asset('/') }}js/jquery.vmap.sampledata.js"></script>

    <!-- custom js -->
    <script src="{{ asset('/') }}js/custom.js"></script>

</body>

</html>