<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BNA Properties | Rental Properties</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{ asset('landing') }}/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="{{ asset('landing') }}/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('landing') }}/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('landing') }}/css/responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Country flag CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.1/css/intlTelInput.css" />
    <!-- Country flag JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.1/js/intlTelInput.min.js"></script>


    <style>
        
        .home-sec-1-padding {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .home-text-padding{
            padding: 16px 16px 16px 0px;
        }

        /* Apply only for mobile screens */
        @media (min-width: 768px) {
            .home-sec-1-padding {
                padding-top: 40px;   /* smaller on mobile */
                padding-bottom: 140px;
            }
            .home-text-padding{
                padding: 48px 16px 16px 0px;
            }
        }
        
        @media (min-width: 992px) {
            .home-sec-1-padding {
                padding-top: 40px;
                padding-bottom: 120px;
            }
            .home-text-padding{
                padding: 96px 16px 16px 0px;
            }
        }

        .header-active {
            color: #FF5A3B;
        }
    </style>

    @stack('style')
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="body-wrapper bg-light">

        <!-- HEADER AREA START (header-5) -->
        @include('landing.layouts.header')
        <!-- HEADER AREA END -->

        <div class="ltn__utilize-overlay"></div>

        @yield('content')

        {{-- FOOTER AREA --}}
        @include('landing.layouts.footer')
        {{-- /* FOOTER AREA --}}

    </div>
    <!-- Body main wrapper end -->

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    <script src="{{ asset('landing') }}/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('landing') }}/js/main.js"></script>

    <script src="{{ asset('admin/assets/js/iconify.min.js') }}"></script>
    @stack('script')

</body>

</html>
