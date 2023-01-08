<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Merupakan aplikasi kasir">
    <meta name="Author" content="Rio Pranata Saputra">
    <meta name="Keywords" content="Aplikasi Kasir" />

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

<body class="ltr error-page1 main-body bg-light text-dark error-3">


    <!-- Loader -->
    <!-- <div id="global-loader">
        <img src="{{ asset('/') }}img/loader.svg" class="loader-img" alt="Loader">
    </div> -->
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div class="main-container container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{ asset('/') }}img/bg/bg.jpeg" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                    <div class="card-sigin">
                                        <div class="card-sigin">
                                            <div class="main-signup-header">
                                                <h2>APLIKASI D'BABERSHOP</h2>
                                                @error('keterangan')
                                                <div class="alert alert-danger mg-b-0" role="alert">
                                                    <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                                                        <span aria-hidden="true">×</span>
                                                    </button> {{ $message }}
                                                </div>
                                                @enderror
                                                <form action="{{ url('login/proses') }}" method="post">
                                                    @csrf

                                                    <label class="form-label">Username</label>
                                                    <div class="input-group mb-4 input-group-lg">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                                        <input class="form-control @error('username') is-invalid @enderror" name="username" autofocus placeholder="Enter Your Username" type="text" value="{{ old('username') }}">
                                                        @error('username')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group mb-3 input-group-lg">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                                        <input class="form-control form-lg @error('password') is-invalid @enderror" placeholder="Enter your password" type="password" name="password">

                                                        @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <button class="btn btn-primary btn-lg btn-block">Sign
                                                        In</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->
                    </div>
                </div><!-- End -->
            </div>
        </div>

    </div>
    <!-- End Page -->

    <!-- JQuery min js -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Moment js -->
    <script src="{{ asset('/') }}plugins/moment/moment.js"></script>

    <!-- P-scroll js -->
    <script src="{{ asset('/') }}plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/p-scroll.js"></script>

    <!-- eva-icons js -->
    <script src="{{ asset('/') }}js/eva-icons.min.js"></script>

    <!-- Rating js-->
    <!-- <script src="{{ asset('/') }}plugins/ratings-2/jquery.star-rating.js"></script>
    <script src="{{ asset('/') }}plugins/ratings-2/star-rating.js"></script> -->

    <!-- Sidebar js tambahan baru-->
    <script src="../assets/plugins/side-menu/sidemenu.js"></script>

    <!-- Right-sidebar js tambahan baru-->
    <script src="../assets/plugins/sidebar/sidebar.js"></script>
    <script src="../assets/plugins/sidebar/sidebar-custom.js"></script>


    <!--themecolor js-->
    <script src="{{ asset('/') }}js/themecolor.js"></script>

    <!-- custom js -->
    <script src="{{ asset('/') }}js/custom.js"></script>

</body>

</html>