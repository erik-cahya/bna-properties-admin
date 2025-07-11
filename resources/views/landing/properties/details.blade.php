@extends('landing.layouts.landing-master')
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
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
        <div class="container-fluid px-0">
            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                @foreach ($imageGallery as $gallery)
                    <div class="col-lg-12 p-0">
                        <div class="image-wrapper" style="height: 560px; overflow: hidden;">
                            <a href="{{ asset($gallery->image_path) }}" data-rel="lightcase:myCollection">
                                <img src="{{ asset($gallery->image_path) }}" alt="Image"
                                    style="width: 100%; height: 100%; object-fit: cover; display: block;">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- IMAGE SLIDER AREA END -->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-10">
        <div class="container mb-4">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="#">{{ $data_properties->type_properties }}</a>
                                </li>
                                <li class="ltn__blog-category">
                                    <a class="bg-orange" href="#">{{ $data_properties->status_listing }}</a>
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
                                <li><label>Property ID:</label> <span>{{ $data_properties->properties_code }}</span></li>
                                <li><label>Home Area: </label> <span>{{ $data_properties->properties_size }} sqft</span></li>
                                <li><label>Rooms:</label> <span>{{ $data_properties->number_bedroom }}</span></li>
                                <li><label>Baths:</label> <span>{{ $data_properties->number_bathroom }}</span></li>
                            </ul>
                            <ul>
                                <li><label>Max People:</label> <span>{{ $data_properties->max_people }} People</span></li>
                                <li><label>Region:</label> <span>{{ $data_properties->region }}</span></li>
                                <li><label>Type:</label> <span>{{ $data_properties->type_properties }}</span></li>
                                <li><label>Year built:</label> <span>{{ $data_properties->year_build }}</span></li>

                            </ul>
                        </div>

                        <h4 class="title-2">Features</h4>
                        <div class="property-detail-feature-list clearfix mb-45">
                            {{-- <ul>
                                @foreach ($featuresData as $feature)
                                    <li>
                                        <div class="property-detail-feature-list-item">
                                            <i class="flaticon-double-bed"></i>
                                            <div>
                                                <h6>{{ $feature->name }}</h6>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul> --}}

                            <div class="row">

                                @foreach ($featuresData as $feature)
                                    <div class="col-md-6 mb-3">
                                        <div class="property-detail-feature-list-item">
                                            {{-- <i class="flaticon-double-bed"></i> --}}
                                            <iconify-icon icon="iconamoon:check-bold" class="align-self-center ltn__secondary-bg mx-2 p-2 text-white"></iconify-icon>

                                            <div>
                                                <h6>{{ $feature->name }}</h6>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <h4 class="title-2">From Our Gallery</h4>
                        <div class="ltn__property-details-gallery mb-30">
                            <div class="row">
                                @foreach ($imageGallery as $gallery)
                                    <div class="col-md-3">
                                        <a href="{{ asset($gallery->image_path) }}" data-rel="lightcase:myCollection">
                                            <img class="mb-10" src="{{ asset($gallery->image_path) }}" alt="Image">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">

                        <!-- Form Widget -->
                        @include('landing.properties.partials.boking-form')
                        <!-- Author Widget -->
                        <div class="widget ltn__author-widget">
                            <div class="ltn__author-widget-inner text-center">
                                <img src="{{ asset('landing') }}/img/team/4.jpg" alt="Image">
                                <h5>BNA Properties</h5>
                                <small>Property Agency</small>
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
                                <p>BNA Properties is a trusted real estate agency connecting you with the finest residential and investment opportunities. We offer professional and secure property solutions tailored to your needs — from buying and selling to rentals. With a wide network and experienced team, BNA Properties is here to help you find your ideal property with confidence.</p>
                            </div>
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
@push('script')
    <script src="{{ asset('js/flatpickr-min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}

    <script>
        $(document).ready(function() {
            // Hapus nice-select dari select tertentu
            $('#duration').next('.nice-select').remove(); // hapus UI palsu
            $('#duration').show(); // tampilkan asli kembali
        });
    </script>

    {{-- /* Flatpickr --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookedRanges = @json($bookedRanges);

            let startDateInstance = flatpickr("#start_date", {
                dateFormat: "Y-m-d",
                disable: bookedRanges,
                minDate: "today",
                onChange: updateEndDate
            });

            const durationInput = document.getElementById('duration');
            const startInput = document.getElementById('start_date');

            // Tambahkan log untuk cek
            console.log('Duration element:', durationInput);
            console.log('Start date element:', startInput);

            // Pastikan elemen ditemukan sebelum pasang event
            if (durationInput) {
                durationInput.addEventListener('change', updateEndDate);
            }
            if (startInput) {
                startInput.addEventListener('input', updateEndDate);
            }

            function updateEndDate() {
                console.log("updateEndDate triggered");

                const startInputVal = startInput.value;
                const duration = parseInt(durationInput.value || 1);
                const endInput = document.getElementById('end_date');

                if (!startInputVal || isNaN(duration)) {
                    endInput.value = '';
                    return;
                }

                const startDate = new Date(startInputVal);
                if (isNaN(startDate)) {
                    endInput.value = '';
                    return;
                }

                const endDate = new Date(startDate);
                const originalDay = startDate.getDate();

                endDate.setMonth(endDate.getMonth() + duration);

                if (endDate.getDate() !== originalDay) {
                    endDate.setDate(0);
                }

                endInput.value = endDate.toISOString().split('T')[0];
            }
        });
    </script>
@endpush
