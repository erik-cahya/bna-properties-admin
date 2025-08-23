@extends('landing.layouts.landing-master')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area bg-overlay-white-30 bg-image text-left" data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Property</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                <li>Property</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__shop-options">
                        <ul class="justify-content-start">
                            <li>
                                <div class="ltn__grid-list-tab-menu">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="d-none">
                                <div class="showing-product-number text-right">
                                    <span>Showing 1–12 of 18 results</span>
                                </div>
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select">
                                        <option>Default Sorting</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                {{-- <input type="text" name="search" placeholder="Search your keyword..."> --}}
                                                <input class="widget__search--input__field" id="search_props" placeholder="Search property" type="text">

                                                <button type="submit"><i class="fas fa-search"></i></button>

                                            </form>
                                        </div>
                                    </div>
                                    @foreach ($data_properties as $properties)
                                        <!-- ltn__product-item -->
                                        <div class="col-xl-6 col-sm-6 col-12">
                                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                                <div class="product-img">
                                                    <a href="{{ route('landing.properties.detail', $properties->slug) }}">
                                                        <img src="{{ asset($properties?->featuredImage->image_path ?? 'admin/assets/images/placeholder.webp') }}" alt="#">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badg">{{ $properties->status_listing }}</li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="product-title"><a href="{{ route('landing.properties.detail', $properties->slug) }}">{{ $properties->properties_name }}</a></h2>
                                                    <div class="product-img-location">
                                                        <ul>
                                                            <li>
                                                                <a href="locations.html"><i class="flaticon-pin"></i> {{ $properties->address . ', ' . $properties->sub_region . ' ' . $properties->region }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                        <li><span>{{ $properties->number_bedroom }} </span>
                                                            Bed
                                                        </li>
                                                        <li><span>{{ $properties->number_bathroom }} </span>
                                                            Bath
                                                        </li>
                                                        <li><span>{{ $properties->properties_size }} </span>
                                                            Sqm
                                                        </li>
                                                    </ul>
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('landing.properties.detail', $properties->slug) }}" title="Product Details">
                                                                    <iconify-icon icon="weui:eyes-on-outlined"></iconify-icon>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-info-bottom">
                                                    <div class="product-price">
                                                        <span>${{ number_format($properties->price_usd, 2, ',', '.') }}<label>/Month</label></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            {{-- <input type="text" name="search" id="search_props" placeholder="Search your keyword..."> --}}
                                            <input class="widget__search--input__field" id="search_props" placeholder="Search property" type="text">

                                            <button type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    @foreach ($data_properties as $properties)
                                        <!-- ltn__product-item -->
                                        <div class="col-lg-12">
                                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                                <div class="product-img">
                                                    <a href="{{ route('landing.properties.detail', $properties->slug) }}">
                                                        <img src="{{ asset($properties?->featuredImage->image_path ?? 'admin/assets/images/placeholder.webp') }}" alt="#">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-badge-price">
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="sale-badg">{{ $properties->status_listing }}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$ {{ number_format($properties->price_usd, 2, ',', '.') }}<label>/Month</label></span>
                                                        </div>
                                                    </div>
                                                    <h2 class="product-title"><a href="{{ route('landing.properties.detail', $properties->slug) }}">{{ $properties->properties_name }}</a></h2>
                                                    <div class="product-img-location">
                                                        <ul>
                                                            <li>
                                                                <a href="locations.html"><i class="flaticon-pin"></i> {{ $properties->address . ', ' . $properties->sub_region . ' ' . $properties->region }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                        <li><span>{{ $properties->number_bedroom }} </span>
                                                            Bed
                                                        </li>
                                                        <li><span>{{ $properties->number_bathroom }} </span>
                                                            Bath
                                                        </li>
                                                        <li><span>{{ $properties->properties_size }} </span>
                                                            Sqm
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-info-bottom">
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('landing.properties.detail', $properties->slug) }}" title="Product Details">
                                                                    <span>Detail</span> <iconify-icon icon="weui:eyes-on-outlined"></iconify-icon>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pagination --}}
                    {{ $data_properties->links('vendor.pagination.custom-pagination') }}

                </div>

                {{-- Filtering Data --}}
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <h3 class="mb-10">Advance Information</h3>
                        <label class="mb-30"><small>About 9,620 results (0.62 seconds) </small></label>
                        <!-- Advance Information widget -->
                        <div class="widget ltn__menu-widget">
                            {{-- Property Type --}}
                            {{-- <h4 class="ltn__widget-title">Property Type</h4>
                            <ul>
                                <li>
                                    <a href="shop-right-sidebar.html">
                                        <label class="checkbox-item">House
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </a>
                                </li>
                                <li>
                                    <label class="checkbox-item">Single Family
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-item">Apartment
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-item">Office Villa
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-item">Luxary Home
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-item">Studio
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul> --}}

                            {{-- <hr> --}}
                            {{-- <!-- Price Filter Widget -->
                            <div class="widget--- ltn__price-filter-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">Filter by price</h4>
                                <div class="price_filter">
                                    <div class="price_slider_amount">
                                        <input type="submit" value="Your range:" />
                                        <input type="text" class="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                    <div class="slider-range"></div>
                                </div>
                            </div> --}
                            {{-- Bedroom & bathroom --}}
                            <h4 class="ltn__widget-title">Bed/bath</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">1
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-item">2
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-item">3
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-item">4
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-item">Up To 4
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                            <hr>
                            <h4 class="ltn__widget-title">Area</h4>
                            <ul>
                                @foreach ($regions as $region)
                                    <li>
                                        <label class="checkbox-item">{{ $region->name }}
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </aside>
                </div>
                {{-- /* Filtering Data --}}
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
@endsection
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function debounce(func, delay) {
            let timer;
            return function(...args) {
                clearTimeout(timer);
                timer = setTimeout(() => func.apply(this, args), delay);
            };
        }

        $(document).ready(function() {
            function fetchFilteredProperties() {

                let formData = {
                    query: $('#search_props').val(),
                    price_min: $('.input-min').val(),
                    price_max: $('.input-max').val(),
                    bedroom: $('[name="bedroom"]').val(),
                    property_type: [],
                    location: [],
                };

                console.log(formData);



                // Ambil data dari checkbox
                $('[name="property_type[]"]:checked').each(function() {
                    formData.property_type.push($(this).val());
                });
                $('[name="location[]"]:checked').each(function() {
                    formData.location.push($(this).val());
                });

                $.ajax({
                    url: '{{ route('property.search') }}',
                    type: 'GET',
                    data: formData,
                    beforeSend: function() {
                        $('#property-list').html('<p>Loading...</p>');
                    },
                    success: function(data) {
                        $('#property-list').html(data);
                    }
                });
            }

            // Event untuk semua filter
            $('#search_props').on('keyup', fetchFilteredProperties);
            $('.input-min, .input-max, [name="bedroom"], [name="property_type[]"], [name="location[]"]').on('change', fetchFilteredProperties);
        });
    </script>
@endpush
