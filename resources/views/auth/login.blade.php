<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="dark" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Log In | Drezoc - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Drezoc - Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('admin') }}/assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('admin') }}/assets/js/config.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100 justify-content-center">
                        <div class="card my-5 overflow-hidden rounded shadow-lg">
                            <div class="row">
                                {{-- <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div> --}}
                                <div class="col-lg-12">
                                    <div class="px-5 pb-5">
                                        <div class="w-75 auth-logo mx-auto mb-4 text-center">
                                            <a href="index.html" class="logo-dark pt-4">
                                                <span><img src="{{ asset('bna-assets/logo-bna-dark.png') }}" alt="" height="100"></span>
                                            </a>

                                            <a href="index.html" class="logo-light">
                                                <span><img src="{{ asset('bna-assets/logo-bna-light.png') }}" alt="" height="120"></span>
                                            </a>
                                        </div>

                                        @error('email')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert" bis_skin_checked="1">
                                                <i class="mdi mdi-block-helper me-2"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <h1 class="h5 mb-1">Welcome Back!</h1>

                                        <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>

                                        <form class="mt-4 pt-2" action="{{ route('login') }}" method="POST">
                                            @csrf

                                            <div class="form-group mb-3">
                                                <label class="form-label" for="emailaddress">Email address</label>
                                                <input class="form-control" type="email" id="emailaddress" required="" name="email" placeholder="Enter your email">
                                            </div>

                                            <div class="form-group mb-3">
                                                <a href="pages-recoverpw.html" class="text-muted float-end"><small></small></a>
                                                <label class="form-label" for="password">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                                    <button class="btn btn-outline-light toggle-password" type="button">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="">
                                                    <input class="form-check-input" type="checkbox" id="checkbox-signin">
                                                    <label class="form-check-label ms-2" for="checkbox-signin">Remember me</label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary w-100" type="submit"> Log In </button>
                                            </div>
                                        </form>

                                        <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                <p class="text-muted mb-0">Don't have an account?
                                                    <a class="text-muted font-weight-medium ms-1" href='{{ route('register') }}'><b>Sign Up</b></a>
                                                </p>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- App js -->
    <script src="{{ asset('admin') }}/assets/js/vendor.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/app.js"></script>

    <!-- Tambahkan Font Awesome untuk ikon mata -->

    <script>
        document.querySelector('.toggle-password').addEventListener('click', function(e) {
            // Toggle type attribute
            const password = document.querySelector('#password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle eye icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>

</body>

</html>
