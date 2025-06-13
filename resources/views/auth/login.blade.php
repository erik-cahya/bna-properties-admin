<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Minia - Minimal Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/images/favicon.ico">

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin') }}/assets/css/app.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- <body data-layout="horizontal"> -->
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-12 col-lg-12 col-md-12">
                    <div class="auth-bg d-flex justify-content-center p-4" style="height: 100vh">
                        <div class="bg-overlay bg-primary"></div>

                        <div class="col-xxl-4 col-lg-4 col-md-5 w-login">
                            <div class="d-flex p-sm-5 p-4">
                                <div class="w-100">
                                    <div class="d-flex flex-column h-100">
                                        <div class="mb-md-5 mb-4 text-center">
                                            <a href="index.html" class="d-block auth-logo">
                                                <img src="{{ asset('admin') }}/assets/images/logo-sm.svg" alt="" height="28"> <span class="logo-txt">Minia</span>
                                            </a>
                                        </div>
                                        <div class="auth-content my-auto">
                                            <div class="text-center">
                                                <h5 class="mb-0">Welcome Back !</h5>
                                                <p class="text-muted mt-2">Sign in to continue to Admin Panel.</p>
                                            </div>
                                            <form class="mt-4 pt-2" action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" name="email" class="form-control" id="Email" placeholder="Enter Your Email" value="{{ old('email') }}">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <label class="form-label">Password</label>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <div class="">
                                                                <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light ms-0 shadow-none" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                                            <label class="form-check-label" for="remember-check">
                                                                Remember me
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="mb-3">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                            </form>

                                            <div class="mt-4 pt-2 text-center">
                                                <div class="signin-other-title">
                                                    <h5 class="font-size-14 text-muted fw-medium mb-3">- Sign in with -</h5>
                                                </div>

                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void()"
                                                            class="social-list-item bg-primary border-primary text-white">
                                                            <i class="mdi mdi-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void()"
                                                            class="social-list-item bg-info border-info text-white">
                                                            <i class="mdi mdi-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void()"
                                                            class="social-list-item bg-danger border-danger text-white">
                                                            <i class="mdi mdi-google"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p class="text-muted mb-0">Don't have an account ? <a href="auth-register.html"
                                                        class="text-primary fw-semibold"> Signup now </a> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end auth full page content -->
                        </div>

                        <!-- end bubble effect -->

                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="{{ asset('admin') }}/assets/libs/pace-js/pace.min.js"></script>
    <!-- password addon init -->
    <script src="{{ asset('admin') }}/assets/js/pages/pass-addon.init.js"></script>

</body>

</html>
