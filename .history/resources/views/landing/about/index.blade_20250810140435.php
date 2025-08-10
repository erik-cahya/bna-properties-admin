@extends('landing.layouts.landing-master')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area bg-overlay-white-30 bg-image text-left" data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">About Us </h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html"><span class="ltn__secondary-color">
                                            <i class="fas fa-home"></i>
                                        </span> Home</a></li>
                                <li>About Us </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="{{ asset('landing') }}/img/others/11.png" alt="About Us Image">
                        <div class="about-us-img-info about-us-img-info-2 about-us-img-info-3 d-none">

                            <div class="ltn__video-img ltn__animation-pulse1">
                                <img src="{{ asset('landing') }}/img/others/8.png" alt="video popup bg image">
                                <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&showinfo=0" data-rel="lightcase:myCollection">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">About Us</h6>
                            <h1 class="section-title">More Than Rental</h1>
                            <p> BNA Property Rental offers trusted, stress-free villa rentals in Bali. We connect guests with handpicked villas that blend comfort, privacy, and local charm—backed by clear communication and personalized service from start to finish</p>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-3">
                            <div class="ltn__feature-icon">
                                <span><i class="flaticon-house-4"></i></span>
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Accessible Comfort</a></h4>
                                <p>Thoughtfully priced, professionally managed stays.</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-3">
                            <div class="ltn__feature-icon">
                                <span><i class="flaticon-call-center-agent"></i></span>
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Personal Support</a></h4>
                                <p>From booking to departure, we're here to help every step of the way.</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-3">
                            <div class="ltn__feature-icon">
                                <span><i class="flaticon-maps-and-location"></i></span>
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Unique Locations</a></h4>
                                <p>We focus on areas with true character and charm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!-- Our Main Service -->
    <div class="ltn__feature-area section-bg-1--- pt-115 pb-90 mb-120---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">Our Services</h6>
                        <h1 class="section-title">Our Main Service</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__custom-gutter--- justify-content-center">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 bg-white text-center">
                        <div class="ltn__feature-icon">
                            <!-- <span><i class="flaticon-house"></i></span> -->
                            <img src="{{ asset('landing') }}/img/icons/icon-img/21.png" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="https://bnaproperty.com">Real Estate</a></h3>
                            <p>Helping you buy or sell property in Bali with confidence, clarity, and local expertise.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 active bg-white text-center">
                        <div class="ltn__feature-icon">
                            <!-- <span><i class="flaticon-house-3"></i></span> -->
                            <img src="{{ asset('landing') }}/img/icons/icon-img/22.png" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="https://rent.bnaproperty.com">Villa Rentals</a></h3>
                            <p>Connecting travelers with handpicked Bali villas for short or long-term stays.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 bg-white text-center">
                        <div class="ltn__feature-icon">
                            <!-- <span><i class="flaticon-deal-1"></i></span> -->
                            <img src="{{ asset('landing') }}/img/icons/icon-img/23.png" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="https://management.bnaproperty.com">Villa Management</a></h3>
                            <p>Comprehensive property care and guest services to keep your villa performing at its best</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Main Service END -->

    <!-- BLOG AREA START (blog-3) -->
    <div class="ltn__blog-area pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Properties</h6>
                        <h1 class="section-title">Latest Property</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__search-by-place-slider-1-active slick-arrow-1">
                <div class="col-lg-4">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/1.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>2 Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="locations.html">Bali, Indonesia</a></h6>
                            <h4><a href="product-details.html">Seminyak</a></h4>
                            <div class="search-by-place-btn">
                                <a href="product-details.html">View Property <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/2.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>5 Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="locations.html">Bali, Indonesia</a></h6>
                            <h4><a href="product-details.html">Canggu</a></h4>
                            <div class="search-by-place-btn">
                                <a href="product-details.html">View Property <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/3.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>9 Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="locations.html">Bali, Indonesia</a></h6>
                            <h4><a href="product-details.html">Kerobokan</a></h4>
                            <div class="search-by-place-btn">
                                <a href="product-details.html">View Property <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  -->
            </div>
        </div>
    </div>
    <!-- BLOG AREA END -->
@endsection
