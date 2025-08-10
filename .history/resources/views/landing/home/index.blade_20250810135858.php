@extends('landing.layouts.landing-master')
@section('content')
    <!-- SECTION 1 -->
    <div class="ltn__slider-area ltn__slider-11 ltn__slider-11-slide-item-count-show--- ltn__slider-11-pagination-count-show--- section-bg-1">
        <div class="ltn__slider-11-inner">
            <div class="ltn__slider-11-active">
                <!-- slide-item -->
                <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal ltn__slide-item-3 ltn__slide-item-11">
                    <div class="ltn__slide-item-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <h1 class="slide-title animated">Bali <span>Best</span><br> Villa Rentals</h1>
                                            <div class="slide-brief animated">
                                                <p>Explore a curated selection of stylish, fully serviced villas across Bali—ideal for holidays, remote work, or long-term stays.</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="{{ route('landing.contact.index') }}" class="theme-btn-1 btn btn-effect-1">Make An Enquiry</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide-item-img">
                                        <img src="{{ asset('landing') }}/img/slider/61.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slide-item -->
                <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal ltn__slide-item-3 ltn__slide-item-11">
                    <div class="ltn__slide-item-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <div class="slide-video mb-50 d-none">
                                                <a class="ltn__video-icon-2 ltn__video-icon-2-border" href="https://www.youtube.com/embed/tlThdr3O5Qo" data-rel="lightcase:myCollection">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                            <h6 class="slide-sub-title white-color--- animated"><span><i class="fas fa-home"></i></span> Real Estate Agency</h6>
                                            <h1 class="slide-title animated">Bali <span>Best</span><br> Villa Rentals</h1>
                                            <div class="slide-brief animated">
                                                <p>Explore a curated selection of stylish, fully serviced villas across Bali—ideal for holidays, remote work, or long-term stays.</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="service.html" class="theme-btn-1 btn btn-effect-1">OUR SERVICES</a>
                                                <a href="about.html" class="btn btn-transparent btn-effect-3">LEARN MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide-item-img">
                                        <img src="{{ asset('landing') }}/img/slider/62.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- slider-4-pagination -->
            <div class="ltn__slider-11-pagination-count">
                <span class="count"></span>
                <span class="total"></span>
            </div>
            <!-- slider-sticky-icon -->
            <div class="slider-sticky-icon-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- slider-4-img-slide-arrow -->
            <div class="ltn__slider-11-img-slide-arrow">
                <div class="ltn__slider-11-img-slide-arrow-inner">
                    <div class="ltn__slider-11-img-slide-arrow-active">

                    </div>
                    <!-- slider-4-slide-item-count -->
                    <div class="ltn__slider-11-slide-item-count">
                        <span class="count"></span>
                        <span class="total"></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- BOOKING FORM START -->
    <div class="ltn__car-dealer-form-area" style="margin-top: -80px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__car-dealer-form-tab">
                        <div class="ltn__tab-menu text-uppercase d-none">
                            <div class="nav">
                                <a class="active show" data-bs-toggle="tab" href="#ltn__form_tab_1_1"><i
                                        class="fas fa-car"></i>Find A Car</a>
                                <a data-bs-toggle="tab" href="#ltn__form_tab_1_2" class=""><i
                                        class="far fa-user"></i>Get a Dealer</a>
                            </div>
                        </div>
                        <div class="tab-content box-shadow-1 ltn__border position-relative bg-white pb-10">
                            <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                                <div class="car-dealer-form-inner">
                                    <form method="GET" action="{{ route('properties.index') }}" class="ltn__car-dealer-form-box row">
                                        <div
                                            class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-car---- col-lg-3 col-md-6">
                                            <select class="nice-select">
                                                <option>Choose Area</option>
                                                <option>chicago</option>
                                                <option>London</option>
                                                <option>Los Angeles</option>
                                                <option>New York</option>
                                                <option>New Jersey</option>
                                            </select>
                                        </div>
                                        <div
                                            class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-meter---- col-lg-3 col-md-6">
                                            <select class="nice-select">
                                                <option>Price Range</option>
                                                <option value="0-1000" {{ request('price_range') == '0-1000' ? 'selected' : '' }}>$0 - $1,000</option>
                                                <option value="1000-5000" {{ request('price_range') == '1000-5000' ? 'selected' : '' }}>$1,000 - $5,000</option>
                                                <option value="5000+" {{ request('price_range') == '5000+' ? 'selected' : '' }}>$5,000+</option>
                                            </select>
                                        </div>
                                        <div
                                            class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-calendar---- col-lg-3 col-md-6">
                                            <select class="nice-select">
                                                <option>Bedrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5+</option>
                                            </select>
                                        </div>
                                        <div
                                            class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-3 col-md-6">
                                            <div class="btn-wrapper mt-0 text-center">
                                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Find Villa</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BOOKING FORM END -->

    {{-- PROPERTIES SECTION --}}
    @include('landing.home.section.property-slide')
    {{-- /* END PROPERTIES SECTION --}}

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

    <!-- SEARCH BY PLACE AREA START (testimonial-7) -->
    <div class="ltn__search-by-place-area before-bg-top bg-image-top--- pt-115 pb-70" data-bs-bg="img/bg/20.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center---">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">Properties Area</h6>
                        <h1 class="section-title">Find The Best Villa Location <br> With Less Effort! </h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__search-by-place-slider-1-active slick-arrow-1">
                <div class="col-lg-4">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="{{ route('properties.index') }}"><img src="{{ asset('landing') }}/img/product-3/1.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>2 Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="locations.html">Bali, Indonesia</a></h6>
                            <h4><a href="{{ route('properties.index') }}">Seminyak</a></h4>
                            <div class="search-by-place-btn">
                                <a href="{{ route('properties.index') }}">View Property <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="{{ route('properties.index') }}"><img src="{{ asset('landing') }}/img/product-3/2.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>5 Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="locations.html">Bali, Indonesia</a></h6>
                            <h4><a href="{{ route('properties.index') }}">Canggu</a></h4>
                            <div class="search-by-place-btn">
                                <a href="{{ route('properties.index') }}">View Property <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="{{ route('properties.index') }}"><img src="{{ asset('landing') }}/img/product-3/3.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>9 Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="locations.html">Bali, Indonesia</a></h6>
                            <h4><a href="{{ route('properties.index') }}">Kerobokan</a></h4>
                            <div class="search-by-place-btn">
                                <a href="{{ route('properties.index') }}">View Property <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  -->
            </div>
        </div>
    </div>

    {{-- MANAGE VILLA --}}
    <div class="container">
        <div class="row g-0">
            <div class="col-md-4 text-color-white" style="background-color: #FF5A3B; height: 18rem; padding: 3rem;">
                <div class="d-flex flex-column justify-content-center h-100 align-items-start">

                    <h2>Manage Your Villa with Us</h2>
                    <a class="btn btn-effect-3 btn-white p-3" href="https://management.bnaproperty.com">
                        Explore Properties <i class="icon-next"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-8 overflow-hidden p-0">
                <img src="https://bnaproperty.com/wp-content/uploads/2025/06/img4.jpg" height="288px" alt="villa" style="object-fit: cover; background-position: center center">
            </div>
        </div>
    </div>
    {{-- END MANAGE VILLA --}}

    {{-- <!-- SEARCH BY PLACE AREA END -->

    <div class="ltn__search-by-place-area before-bg-top bg-image-top--- pt-115 pb-70" data-bs-bg="img/bg/20.jpg">
        <div class="container">
            <div class="row g-0 overflow-hidden rounded shadow" style="height: 100px;">
                <!-- Text Section -->
                <div class="col-md-4 d-flex flex-column justify-content-center align-items-start ltn__secondary-bg p-4 text-white" style=" border-top-left-radius: 0.5rem; border-bottom-left-radius: 0.5rem;">
                    <div class="coll-to-info text-color-white">
                        <h2>Manage Your Villa with Us</h2>
                        <a class="btn btn-effect-3 btn-white p-3" href="contact.html">
                            Explore Properties <i class="icon-next"></i>
                        </a>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="col-md-8 p-0">
                    <img src="{{ asset('landing') }}/img/product-3/3.jpg" alt="villa" class="w-100 h-100" style="object-fit: cover; background-position: center center">
                </div>
            </div>
        </div>
    </div> --}}

    <!-- CALL TO ACTION END -->

    <!-- TESTIMONIAL AREA START (testimonial-8) -->
    <div class="ltn__testimonial-area section-bg-1--- bg-image-top pb-65" data-bs-bg="img/bg/23.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center---">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color--- white-color">Client,s Testimonial</h6>
                        <h1 class="section-title white-color">See What,s Our Client <br>
                            Says About Us</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__testimonial-slider-6-active slick-arrow-3">
                <div class="col-lg-4">
                    <div class="ltn__testimonial-item ltn__testimonial-item-7 ltn__testimonial-item-8">
                        <div class="ltn__testimoni-info">
                            <div class="ltn__testimoni-author-ratting">
                                <div class="ltn__testimoni-info-inner">
                                    <div class="ltn__testimoni-img">
                                        <img src="{{ asset('landing') }}/img/testimonial/1.jpg" alt="#">
                                    </div>
                                    <div class="ltn__testimoni-name-designation">
                                        <h5>Jacob William</h5>
                                        <label>Selling Agents</label>
                                    </div>
                                </div>
                                <div class="ltn__testimoni-rating">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Precious ipsum dolor sit amet
                                consectetur adipisicing elit, sed dos
                                mod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad min
                                veniam, quis nostrud Precious ips
                                um dolor sit amet, consecte</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__testimonial-item ltn__testimonial-item-7 ltn__testimonial-item-8">
                        <div class="ltn__testimoni-info">
                            <div class="ltn__testimoni-author-ratting">
                                <div class="ltn__testimoni-info-inner">
                                    <div class="ltn__testimoni-img">
                                        <img src="{{ asset('landing') }}/img/testimonial/2.jpg" alt="#">
                                    </div>
                                    <div class="ltn__testimoni-name-designation">
                                        <h5>Kelian Anderson</h5>
                                        <label>Selling Agents</label>
                                    </div>
                                </div>
                                <div class="ltn__testimoni-rating">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Precious ipsum dolor sit amet
                                consectetur adipisicing elit, sed dos
                                mod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad min
                                veniam, quis nostrud Precious ips
                                um dolor sit amet, consecte</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__testimonial-item ltn__testimonial-item-7 ltn__testimonial-item-8">
                        <div class="ltn__testimoni-info">
                            <div class="ltn__testimoni-author-ratting">
                                <div class="ltn__testimoni-info-inner">
                                    <div class="ltn__testimoni-img">
                                        <img src="{{ asset('landing') }}/img/testimonial/3.jpg" alt="#">
                                    </div>
                                    <div class="ltn__testimoni-name-designation">
                                        <h5>Adam Joseph</h5>
                                        <label>Selling Agents</label>
                                    </div>
                                </div>
                                <div class="ltn__testimoni-rating">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Precious ipsum dolor sit amet
                                consectetur adipisicing elit, sed dos
                                mod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad min
                                veniam, quis nostrud Precious ips
                                um dolor sit amet, consecte</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__testimonial-item ltn__testimonial-item-7 ltn__testimonial-item-8">
                        <div class="ltn__testimoni-info">
                            <div class="ltn__testimoni-author-ratting">
                                <div class="ltn__testimoni-info-inner">
                                    <div class="ltn__testimoni-img">
                                        <img src="{{ asset('landing') }}/img/testimonial/4.jpg" alt="#">
                                    </div>
                                    <div class="ltn__testimoni-name-designation">
                                        <h5>James Carter</h5>
                                        <label>Selling Agents</label>
                                    </div>
                                </div>
                                <div class="ltn__testimoni-rating">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Precious ipsum dolor sit amet
                                consectetur adipisicing elit, sed dos
                                mod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad min
                                veniam, quis nostrud Precious ips
                                um dolor sit amet, consecte</p>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL AREA END -->

    <!--  START (blog-3) -->
    <div class="ltn__blog-area pt-115--- pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h1 class="section-title">Latest Properties Listings</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
            <!-- property-item -->
                @foreach ($latestListings as $properties)
                <div class="col-lg-12">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="{{ route('landing.properties.detail', $properties->slug) }}">
                                    <img src="{{ asset($properties?->featuredImage->image_path ?? 'admin/assets/images/placeholder.webp') }}" alt="#">
                                </a>
                                <div class="product-badge">
                                <ul>
                                        <li class="sale-badge bg-green">{{ $properties->status_listing }}</li>
                                        <li class="sale-badge bg-secondary-color">{{ $properties->type_properties }}</li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <a href="{{ route('landing.properties.detail', $properties->slug) }}"><i class="flaticon-pin"></i> {{ $properties->address . ', ' . $properties->sub_region . ' ' . $properties->region }}</a>
                                    </li>
                                </ul>
                            </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-price">
                                    <span>$ {{ number_format($properties->price_usd, 2, ',', '.') }}<label>/Month</label></span>
                                </div>
                                <h2 class="product-title"><a href="{{ route('landing.properties.detail', $properties->slug) }}">{{ $properties->properties_name }}</a>
                                </h2>
                                <div class="product-description">
                                    <p>{{ Str::limit($properties->description, 200) }}</p>
                                </div>
                                <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                    <li><span>{{ $properties->number_bedroom }} <i class="flaticon-bed"></i></span>
                                        Bedrooms
                                    </li>
                                    <li><span>{{ $properties->number_bathroom }} <i class="flaticon-clean"></i></span>
                                        Bathrooms
                                    </li>
                                    <li><span>{{ $properties->properties_size }} <i
                                                class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                        square Ft
                                    </li>
                                    <li><span>{{ $properties->max_people }} <iconify-icon icon="ph:user" style="font-size: 16px"></iconify-icon> </span>
                                        Max People
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            <!-- property-item -->
            </div>
        </div>
    </div>
    <!--  END -->
@endsection
