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
    <div class="ltn__about-us-area pb-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 align-self-center">
                    <div class="about-us-img-wrap ltn__img-shape-left about-img-left">
                        <img src="{{ asset('landing') }}/img/blog/2.jpg" alt="#">
                    </div>
                </div>
                <div class="col-lg-7 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-20">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">About Us</h6>
                            <h1 class="section-title">The Leading Real Estate
                                Rental Marketplace<span>.</span></h1>
                            <p>Over 39,000 people work for us in more than 70 countries all over the
                                This breadth of global coverage, combined with specialist services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!-- SERVICE AREA START (Service 1) -->
    <div class="ltn__service-area section-bg-1 pt-115 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Services</h6>
                        <h1 class="section-title">Our Core Services</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 bg-white text-center">
                        <div class="ltn__feature-icon">
                            <img src="{{ asset('landing') }}/img/icons/icon-img/21.png" alt="#">

                            <!-- <img src="{{ asset('landing') }}/img/icons/icon-img/21.png" alt="#"> -->
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">Real Estate</a></h3>
                            <p>Helping you buy or sell property in Bali with confidence, clarity, and local expertise.</p>
                            <!-- <a class="ltn__service-btn" href="service-details.html">Find A Home <i class="flaticon-right-arrow"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 bg-white text-center">
                        <div class="ltn__feature-icon">
                            <img src="{{ asset('landing') }}/img/icons/icon-img/22.png" alt="#">

                            <!-- <img src="{{ asset('landing') }}/img/icons/icon-img/21.png" alt="#"> -->
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">Villa Rentals</a></h3>
                            <p>Connecting travelers with handpicked Bali villas for short or long-term stays.</p>
                            <!-- <a class="ltn__service-btn" href="service-details.html">Find A Home <i class="flaticon-right-arrow"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 bg-white text-center">
                        <div class="ltn__feature-icon">
                            {{-- <span><i class="flaticon-operator"></i></span> --}}
                            <img src="{{ asset('landing') }}/img/icons/icon-img/23.png" alt="#">

                            {{-- <!-- <img src="{{ asset('landing') }}/img/icons/icon-img/21.png" alt="#"> --> --}}
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">Villa Management</a></h3>
                            <p>Comprehensive property care and guest services to keep your villa performing at its best.</p>
                            <!-- <a class="ltn__service-btn" href="service-details.html">Find A Home <i class="flaticon-right-arrow"></i></a> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- SERVICE AREA END -->

    <!-- BLOG AREA START (blog-3) -->
    <div class="ltn__blog-area pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Properties</h6>
                        <h1 class="section-title">Leatest Property</h1>
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
