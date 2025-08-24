<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="dark" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | BNA Properties</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Drezoc - Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin') }}/assets/images/bna-icon.webp">
    <link rel="icon" type="image/x-icon" href="{{ asset('admin') }}/assets/images/bna-icon.webp">
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/images/bna-icon.webp">

    <link href="{{ asset('admin') }}/assets/libs/morris.js/morris.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('admin') }}/assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('admin') }}/assets/js/config.js"></script>

    <style>
        .invalid-form {
            z-index: 5;
            margin-top: 0.1rem;
            padding: 0.4rem 0.8rem;
            border-radius: 0.2rem;
            position: absolute;
            top: 100%;
            color: rgb(255, 255, 255);
            background-color: var(--bs-danger);
        }

        .border-invalid-form {
            border-color: var(--bs-danger);
        }
        
        /* CUSTOM CSS */

        .font-size-18{
            font-size: 18px;
        }

        .pad-8{
            padding: 16px;
        }

        .pad-16{
            padding: 32px;
        }

        .pad-t-8{
            padding-top: 16px;
        }

        .pad-t-16{
            padding-top: 32px !important;
        }

        .pad-t-32{
            padding-top: 64px;
        }

        .pad-b-8{
            padding-bottom: 16px;
        }

        .pad-b-16{
            padding-bottom: 32px;
        }

        .pad-b-32{
            padding-bottom: 64px;
        }

        .no-border-radius{
            border-radius: 0 !important;
        }

        .center-items{
            display: flex !important;
            justify-items: center !important;
            align-items: center;
            margin-left: 0 !important;
        }

        .img-preview {
            position: relative;
            display: inline-block;
            margin: 5px;
        }

        .img-preview img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 2px solid #ccc;
            padding: 4px;
            border-radius: 6px;
        }

        .delete-btn {
            position: absolute;
            top: 2px;
            right: 2px;
            background: rgba(255, 0, 0, 0.85);
            color: #fff;
            border: none;
            border-radius: 4px;
            width: 24px;
            height: 24px;
            font-size: 14px;
            font-weight: bold;
            line-height: 18px;
            text-align: center;
            cursor: pointer;
            transition: background 0.2s;
        }

        .delete-btn:hover {
            background: rgba(200, 0, 0, 1);
        }


    </style>

    @stack('styles')
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        @include('admin.layouts.sidebar')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            @include('admin.layouts.header')
            <!-- ========== Topbar End ========== -->

            @yield('content')

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © BNA Property
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{ asset('admin') }}/assets/js/vendor.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/app.js"></script>

    <!-- Jquery Sparkline Chart  -->
    <script src="{{ asset('admin') }}/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Jquery-knob Chart Js-->
    <script src="{{ asset('admin') }}/assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!-- Morris Chart Js-->
    <script src="{{ asset('admin') }}/assets/libs/morris.js/morris.min.js"></script>

    <script src="{{ asset('admin') }}/assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init-->
    <script src="{{ asset('admin') }}/assets/js/pages/dashboard.js"></script>
    <script src="{{ asset('admin/assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/iconify.min.js') }}"></script>

    <script>
        @if (session('flashData'))
            var flashData = @json(session('flashData'));

            Swal.fire({
                title: flashData.judul,
                text: flashData.pesan,
                icon: flashData.swalFlashIcon,
                confirmButtonText: 'OK'
            });
        @endif
    </script>

    @stack('script')

</body>

</html>
