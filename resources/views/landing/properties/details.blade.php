@extends('landing.layouts.landing-master')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area bg-overlay-white-30 bg-image mb-0 text-left" data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Property details</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html"><span class="ltn__secondary-color"><i
                                                class="fas fa-home"></i></span> Home</a></li>
                                <li>Property details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- IMAGE SLIDER AREA START (img-slider-3) -->
    <div class="ltn__img-slider-area mb-90">
        <div class="container-fluid">
            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="img/img-slide/31.jpg" data-rel="lightcase:myCollection">
                            <img src="{{ asset('landing') }}/img/img-slide/31.jpg" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="img/img-slide/32.jpg" data-rel="lightcase:myCollection">
                            <img src="{{ asset('landing') }}/img/img-slide/32.jpg" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="img/img-slide/33.jpg" data-rel="lightcase:myCollection">
                            <img src="{{ asset('landing') }}/img/img-slide/33.jpg" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="img/img-slide/34.jpg" data-rel="lightcase:myCollection">
                            <img src="{{ asset('landing') }}/img/img-slide/34.jpg" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="img/img-slide/35.jpg" data-rel="lightcase:myCollection">
                            <img src="{{ asset('landing') }}/img/img-slide/35.jpg" alt="Image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- IMAGE SLIDER AREA END -->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="#">Featured</a>
                                </li>
                                <li class="ltn__blog-category">
                                    <a class="bg-orange" href="#">For Rent</a>
                                </li>
                            </ul>
                        </div>
                        <h1>{{ $data_properties->properties_name }}</h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span> {{ $data_properties->address . ', ' . $data_properties->sub_region . ' ' . $data_properties->region }}</label>
                        <h4 class="title-2">Description</h4>
                        <p>{{ $data_properties->description }}</p>

                        <h4 class="title-2">Property Detail</h4>
                        <div class="property-detail-info-list section-bg-1 clearfix mb-60">
                            <ul>
                                <li><label>Property ID:</label> <span>HZ29</span></li>
                                <li><label>Home Area: </label> <span>120 sqft</span></li>
                                <li><label>Rooms:</label> <span>7</span></li>
                                <li><label>Baths:</label> <span>2</span></li>
                                <li><label>Year built:</label> <span>1992</span></li>
                            </ul>
                            <ul>
                                <li><label>Lot Area:</label> <span>HZ29 </span></li>
                                <li><label>Lot dimensions:</label> <span>120 sqft</span></li>
                                <li><label>Beds:</label> <span>7</span></li>
                                <li><label>Price:</label> <span>2</span></li>
                                <li><label>Property Status:</label> <span>For Sale</span></li>
                            </ul>
                        </div>

                        <h4 class="title-2">Facts and Features</h4>
                        <div class="property-detail-feature-list clearfix mb-45">
                            <ul>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Living Room</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Garage</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Dining Area</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Bedroom</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Bathroom</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Gym Area</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Garden</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="flaticon-double-bed"></i>
                                        <div>
                                            <h6>Parking</h6>
                                            <small>20 x 16 sq feet</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <h4 class="title-2">From Our Gallery</h4>
                        <div class="ltn__property-details-gallery mb-30">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="img/others/14.jpg" data-rel="lightcase:myCollection">
                                        <img class="mb-30" src="{{ asset('landing') }}/img/others/14.jpg" alt="Image">
                                    </a>
                                    <a href="img/others/15.jpg" data-rel="lightcase:myCollection">
                                        <img class="mb-30" src="{{ asset('landing') }}/img/others/15.jpg" alt="Image">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="img/others/16.jpg" data-rel="lightcase:myCollection">
                                        <img class="mb-30" src="{{ asset('landing') }}/img/others/16.jpg" alt="Image">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <h4 class="title-2 mb-10">Amenities</h4>
                        <div class="property-details-amenities mb-60">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <li>
                                                <label class="checkbox-item">Air Conditioning
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Gym
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Microwave
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Swimming Pool
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">WiFi
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <li>
                                                <label class="checkbox-item">Barbeque
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Recreation
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Microwave
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Basketball Cout
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Fireplace
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <li>
                                                <label class="checkbox-item">Refrigerator
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Window Coverings
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Washer
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">24x7 Security
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-item">Indoor Game
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="title-2">Location</h4>
                        <div class="property-details-google-map mb-60">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9334.271551495209!2d-73.97198251485975!3d40.668170674982946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b0456b5a2e7%3A0x68bdf865dda0b669!2sBrooklyn%20Botanic%20Garden%20Shop!5e0!3m2!1sen!2sbd!4v1590597267201!5m2!1sen!2sbd"
                                width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                        </div>

                        <h4 class="title-2">Floor Plans</h4>
                        <!-- APARTMENTS PLAN AREA START -->
                        <div class="ltn__apartments-plan-area product-details-apartments-plan mb-60">
                            <div
                                class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase--- text-center---">
                                <div class="nav">
                                    <a data-bs-toggle="tab" href="#liton_tab_3_1">First Floor</a>
                                    <a class="active show" data-bs-toggle="tab" href="#liton_tab_3_2"
                                        class="">Second Floor</a>
                                    <a data-bs-toggle="tab" href="#liton_tab_3_3" class="">Third Floor</a>
                                    <a data-bs-toggle="tab" href="#liton_tab_3_4" class="">Top Garden</a>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="liton_tab_3_1">
                                    <div class="ltn__apartments-tab-content-inner">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="apartments-plan-img">
                                                    <img src="{{ asset('landing') }}/img/others/10.png" alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div
                                                    class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                    <h2>First Floor</h2>
                                                    <p>Enimad minim veniam quis nostrud exercitation ullamco
                                                        laboris.
                                                        Lorem ipsum dolor sit amet cons aetetur adipisicing elit
                                                        sedo
                                                        eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                        sed ayd minim veniam.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="product-details-apartments-info-list section-bg-1">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div
                                                                class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Total Area</label> <span>2800 Sq.
                                                                            Ft</span></li>
                                                                    <li><label>Bedroom</label> <span>150 Sq.
                                                                            Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div
                                                                class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Belcony/Pets</label>
                                                                        <span>Allowed</span>
                                                                    </li>
                                                                    <li><label>Lounge</label> <span>650 Sq.
                                                                            Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="liton_tab_3_2">
                                    <div class="ltn__product-tab-content-inner">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="apartments-plan-img">
                                                    <img src="{{ asset('landing') }}/img/others/10.png" alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div
                                                    class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                    <h2>Second Floor</h2>
                                                    <p>Enimad minim veniam quis nostrud exercitation ullamco
                                                        laboris.
                                                        Lorem ipsum dolor sit amet cons aetetur adipisicing elit
                                                        sedo
                                                        eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                        sed ayd minim veniam.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="product-details-apartments-info-list section-bg-1">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div
                                                                class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Total Area</label> <span>2800 Sq.
                                                                            Ft</span></li>
                                                                    <li><label>Bedroom</label> <span>150 Sq.
                                                                            Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div
                                                                class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Belcony/Pets</label>
                                                                        <span>Allowed</span>
                                                                    </li>
                                                                    <li><label>Lounge</label> <span>650 Sq.
                                                                            Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="liton_tab_3_3">
                                    <div class="ltn__product-tab-content-inner">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="apartments-plan-img">
                                                    <img src="{{ asset('landing') }}/img/others/10.png" alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div
                                                    class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                    <h2>Third Floor</h2>
                                                    <p>Enimad minim veniam quis nostrud exercitation ullamco
                                                        laboris.
                                                        Lorem ipsum dolor sit amet cons aetetur adipisicing elit
                                                        sedo
                                                        eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                        sed ayd minim veniam.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="product-details-apartments-info-list section-bg-1">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div
                                                                class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Total Area</label> <span>2800 Sq.
                                                                            Ft</span></li>
                                                                    <li><label>Bedroom</label> <span>150 Sq.
                                                                            Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div
                                                                class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Belcony/Pets</label>
                                                                        <span>Allowed</span>
                                                                    </li>
                                                                    <li><label>Lounge</label> <span>650 Sq.
                                                                            Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="liton_tab_3_4">
                                    <div class="ltn__product-tab-content-inner">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="apartments-plan-img">
                                                    <img src="{{ asset('landing') }}/img/others/10.png" alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div
                                                    class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                    <h2>Top Garden</h2>
                                                    <p>Enimad minim veniam quis nostrud exercitation ullamco
                                                        laboris.
                                                        Lorem ipsum dolor sit amet cons aetetur adipisicing elit
                                                        sedo
                                                        eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                        sed ayd minim veniam.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="product-details-apartments-info-list section-bg-1">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div
                                                                class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Total Area</label> <span>2800 Sq.
                                                                            Ft</span></li>
                                                                    <li><label>Bedroom</label> <span>150 Sq.
                                                                            Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div
                                                                class="apartments-info-list apartments-info-list-color mt-40---">
                                                                <ul>
                                                                    <li><label>Belcony/Pets</label>
                                                                        <span>Allowed</span>
                                                                    </li>
                                                                    <li><label>Lounge</label> <span>650 Sq.
                                                                            Ft</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- APARTMENTS PLAN AREA END -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                        <!-- Author Widget -->
                        <div class="widget ltn__author-widget">
                            <div class="ltn__author-widget-inner text-center">
                                <img src="{{ asset('landing') }}/img/team/4.jpg" alt="Image">
                                <h5>Rosalina D. Willaimson</h5>
                                <small>Traveller/Photographer</small>
                                <div class="product-ratting">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                        <li class="review-total"> <a href="#"> ( 1 Reviews )</a></li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis distinctio,
                                    odio, eligendi suscipit reprehenderit atque.</p>
                                <div class="ltn__social-media">
                                    <ul>
                                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>

                                        <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Search Widget -->
                        <div class="widget ltn__search-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Search Objects</h4>
                            <form action="#">
                                <input type="text" name="search" placeholder="Search your keyword...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Form Widget -->
                        <div class="widget ltn__form-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Drop Messege For Book</h4>
                            <form action="#">
                                <input type="text" name="yourname" placeholder="Your Name*">
                                <input type="text" name="youremail" placeholder="Your e-Mail*">
                                <textarea name="yourmessage" placeholder="Write Message..."></textarea>
                                <button type="submit" class="btn theme-btn-1">Send Messege</button>
                            </form>
                        </div>
                        <!-- Top Rated Product Widget -->
                        <div class="widget ltn__top-rated-product-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Top Rated Product</h4>
                            <ul>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product/1.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Luxury House In Greenville </a></h6>
                                            <div class="product-price">
                                                <span>$30,000.00</span>
                                                <del>$35,000.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product/2.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">Apartment with Subunits</a></h6>
                                            <div class="product-price">
                                                <span>$30,000.00</span>
                                                <del>$35,000.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product/3.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.html">3 Rooms Manhattan</a></h6>
                                            <div class="product-price">
                                                <span>$30,000.00</span>
                                                <del>$35,000.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Popular Product Widget -->
                        <div class="widget ltn__popular-product-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Popular Properties</h4>
                            <div class="row ltn__popular-product-widget-active slick-arrow-1">
                                <!-- ltn__product-item -->
                                <div class="col-12">
                                    <div
                                        class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/6.jpg"
                                                    alt="#"></a>
                                            <div class="real-estate-agent">
                                                <div class="agent-img">
                                                    <a href="team-details.html"><img src="{{ asset('landing') }}/img/blog/author.jpg"
                                                            alt="#"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-price">
                                                <span>$349,00<label>/Month</label></span>
                                            </div>
                                            <h2 class="product-title"><a href="product-details.html">New Apartment
                                                    Nice View</a></h2>
                                            <div class="product-img-location">
                                                <ul>
                                                    <li>
                                                        <a href="product-details.html"><i class="flaticon-pin"></i>
                                                            Belmont Gardens, Chicago</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul
                                                class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                <li><span>3 </span>
                                                    Bedrooms
                                                </li>
                                                <li><span>2 </span>
                                                    Bathrooms
                                                </li>
                                                <li><span>3450 </span>
                                                    square Ft
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-12">
                                    <div
                                        class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/4.jpg"
                                                    alt="#"></a>
                                            <div class="real-estate-agent">
                                                <div class="agent-img">
                                                    <a href="team-details.html"><img src="{{ asset('landing') }}/img/blog/author.jpg"
                                                            alt="#"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-price">
                                                <span>$349,00<label>/Month</label></span>
                                            </div>
                                            <h2 class="product-title"><a href="product-details.html">New Apartment
                                                    Nice View</a></h2>
                                            <div class="product-img-location">
                                                <ul>
                                                    <li>
                                                        <a href="product-details.html"><i class="flaticon-pin"></i>
                                                            Belmont Gardens, Chicago</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul
                                                class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                <li><span>3 </span>
                                                    Bedrooms
                                                </li>
                                                <li><span>2 </span>
                                                    Bathrooms
                                                </li>
                                                <li><span>3450 </span>
                                                    square Ft
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- ltn__product-item -->
                                <div class="col-12">
                                    <div
                                        class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/5.jpg"
                                                    alt="#"></a>
                                            <div class="real-estate-agent">
                                                <div class="agent-img">
                                                    <a href="team-details.html"><img src="{{ asset('landing') }}/img/blog/author.jpg"
                                                            alt="#"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-price">
                                                <span>$349,00<label>/Month</label></span>
                                            </div>
                                            <h2 class="product-title"><a href="product-details.html">New Apartment
                                                    Nice View</a></h2>
                                            <div class="product-img-location">
                                                <ul>
                                                    <li>
                                                        <a href="product-details.html"><i class="flaticon-pin"></i>
                                                            Belmont Gardens, Chicago</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul
                                                class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                <li><span>3 </span>
                                                    Bedrooms
                                                </li>
                                                <li><span>2 </span>
                                                    Bathrooms
                                                </li>
                                                <li><span>3450 </span>
                                                    square Ft
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                        <!-- Social Media Widget -->
                        <div class="widget ltn__social-media-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Follow us</h4>
                            <div class="ltn__social-media-2">
                                <ul>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                                </ul>
                            </div>
                        </div>
                        <!-- Banner Widget -->
                        <div class="widget ltn__banner-widget d-none">
                            <a href="shop.html"><img src="{{ asset('landing') }}/img/banner/2.jpg" alt="#"></a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pb-70 d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center---">
                        <h1 class="section-title">Related Properties</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__related-product-slider-two-active slick-arrow-1">
                <!-- ltn__product-item -->
                <div class="col-xl-6 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/1.jpg" alt="#"></a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="{{ asset('landing') }}/img/blog/author.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Rent</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                            </h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens,
                                            Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span>3 </span>
                                    Bed
                                </li>
                                <li><span>2 </span>
                                    Bath
                                </li>
                                <li><span>3450 </span>
                                    Square Ft
                                </li>
                            </ul>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal"
                                            data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="portfolio-details.html" title="Compare">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$349,00<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-xl-6 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/2.jpg" alt="#"></a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="{{ asset('landing') }}/img/blog/author.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Sale</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                            </h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens,
                                            Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span>3 </span>
                                    Bed
                                </li>
                                <li><span>2 </span>
                                    Bath
                                </li>
                                <li><span>3450 </span>
                                    Square Ft
                                </li>
                            </ul>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal"
                                            data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="portfolio-details.html" title="Compare">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$349,00<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-xl-6 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/3.jpg" alt="#"></a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="{{ asset('landing') }}/img/blog/author.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Rent</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                            </h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens,
                                            Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span>3 </span>
                                    Bed
                                </li>
                                <li><span>2 </span>
                                    Bath
                                </li>
                                <li><span>3450 </span>
                                    Square Ft
                                </li>
                            </ul>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal"
                                            data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="portfolio-details.html" title="Compare">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$349,00<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-xl-6 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/4.jpg" alt="#"></a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="{{ asset('landing') }}/img/blog/author.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Rent</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                            </h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens,
                                            Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span>3 </span>
                                    Bed
                                </li>
                                <li><span>2 </span>
                                    Bath
                                </li>
                                <li><span>3450 </span>
                                    Square Ft
                                </li>
                            </ul>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal"
                                            data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="portfolio-details.html" title="Compare">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$349,00<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-xl-6 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="{{ asset('landing') }}/img/product-3/5.jpg" alt="#"></a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="{{ asset('landing') }}/img/blog/author.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Rent</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                            </h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="product-details.html"><i class="flaticon-pin"></i> Belmont Gardens,
                                            Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span>3 </span>
                                    Bed
                                </li>
                                <li><span>2 </span>
                                    Bath
                                </li>
                                <li><span>3450 </span>
                                    Square Ft
                                </li>
                            </ul>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal"
                                            data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="portfolio-details.html" title="Compare">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$349,00<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->
@endsection
