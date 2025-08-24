@extends('landing.layouts.landing-master')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area bg-overlay-white-30 bg-image text-left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('landing.index') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
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
                        <div class="text-right mb-4" id="showing-product-number">
                            @if(!empty($filterSummary))
                                <span>Showing {{ $filterSummary }}</span>
                            @else
                                <span>Showing all properties</span>
                            @endif
                        </div>
                        <ul class="justify-content-start">
                            <li>
                                <div class="ltn__grid-list-tab-menu">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select" name="sort" id="sortSelect">
                                        <option value="">Default Sorting</option>
                                        <option value="price_low_high" {{ request('sort') == 'price_low_high' ? 'selected' : '' }}>
                                            Sort by price: low to high
                                        </option>
                                        <option value="price_high_low" {{ request('sort') == 'price_high_low' ? 'selected' : '' }}>
                                            Sort by price: high to low
                                        </option>
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
                                            <form action="{{ route('landing.properties.search') }}" method="GET">
                                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search your keyword...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- Card View --}}
                                    <div id="properties-card" class="row">
                                        @include('landing.properties.partials.property-card', ['properties' => $properties])
                                    </div>
                                    
                                    {{-- @foreach ($properties as $property)
                                        <!-- ltn__product-item -->
                                        <div class="col-xl-6 col-sm-6 col-12">
                                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                                <div class="product-img">
                                                    <a href="{{ route('landing.properties.detail', $property->slug) }}">
                                                        <img src="{{ asset($property?->featuredImage->image_path ?? 'admin/assets/images/placeholder.webp') }}" alt="#">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badg">{{ $property->status_listing }}</li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="product-title"><a href="{{ route('landing.properties.detail', $property->slug) }}">{{ $property->properties_name }}</a></h2>
                                                    <div class="product-img-location">
                                                        <ul>
                                                            <li>
                                                                <a href="locations.html"><i class="flaticon-pin"></i> {{ $property->address . ', ' . $property->region->name }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                        <li><span>{{ $property->number_bedroom }} <i class="flaticon-bed"></i></span>
                                                        </li>
                                                        <li><span>{{ $property->number_bathroom }} <i class="flaticon-clean"></i></span>
                                                        </li>
                                                        <li><span>{{ $property->properties_size }} Sqm &nbsp;<i
                                                                    class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                                        </li>
                                                        <li><span>{{ $property->max_people }} <iconify-icon icon="ph:user" style="font-size: 16px"></iconify-icon> </span>
                                                        </li>
                                                    </ul>
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('landing.properties.detail', $property->slug) }}" title="Product Details">
                                                                    <iconify-icon icon="weui:eyes-on-outlined"></iconify-icon>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-info-bottom">
                                                    <div class="product-price">
                                                        <span>${{ number_format($property->price_usd, 0, '.', ',') }}<label>/Month</label></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    @endforeach --}}

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                <input type="text" name="search" placeholder="Search your keyword...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- List View --}}
                                    <div id="properties-list">
                                        @include('landing.properties.partials.property-list', ['properties' => $properties])
                                    </div>
                                    {{-- @foreach ($properties as $property)
                                        <!-- ltn__product-item -->
                                        <div class="col-lg-12">
                                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                                <div class="product-img">
                                                    <a href="{{ route('landing.properties.detail', $property->slug) }}">
                                                        <img src="{{ asset($property?->featuredImage->image_path ?? 'admin/assets/images/placeholder.webp') }}" alt="#">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-badge-price">
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="sale-badg">{{ $property->status_listing }}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>${{ number_format($property->price_usd, 0, '.', ',') }}<label>/Month</label></span>
                                                        </div>
                                                    </div>
                                                    <h2 class="product-title"><a href="{{ route('landing.properties.detail', $property->slug) }}">{{ $property->properties_name }}</a></h2>
                                                    <div class="product-img-location">
                                                        <ul>
                                                            <li>
                                                                <a href="locations.html"><i class="flaticon-pin"></i> {{ $property->address . ', ' . $property->region->name }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                        <li><span>{{ $property->number_bedroom }} <i class="flaticon-bed"></i></span>
                                                        </li>
                                                        <li><span>{{ $property->number_bathroom }} <i class="flaticon-clean"></i></span>
                                                        </li>
                                                        <li><span>{{ $property->properties_size }} Sqm &nbsp;<i
                                                                    class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                                        </li>
                                                        <li><span>{{ $property->max_people }} <iconify-icon icon="ph:user" style="font-size: 16px"></iconify-icon> </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-info-bottom">

                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('landing.properties.detail', $property->slug) }}" title="Product Details">
                                                                   <iconify-icon icon="weui:eyes-on-outlined"></iconify-icon>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pagination --}}
                    <div id="pagination-container">
                        {{ $properties->withQueryString()->links('vendor.pagination.custom-pagination') }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <h3 class="mb-10">Advance Information</h3>
                        <label class="mb-30" id="total-properties"><small>We have total {{ $totalProperties }} villas </small></label>

                        <!-- Filter Form -->
                        <form id="filterForm">
                            <div class="widget ltn__menu-widget">

                                <!-- Sorting input -->
                                <input type="hidden" name="sort" id="sortHidden">

                                {{-- Property Status --}}
                                <h4 class="ltn__widget-title">Property Availability</h4>
                                <ul class="mb-4">
                                    <li>
                                        <label class="checkbox-item">Available
                                            <input type="checkbox" name="status_listing" value="available" {{ request('status_listing') === 'available' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>

                                {{-- Price Range --}}
                                <h4 class="ltn__widget-title">Price Range</h4>
                                <ul class="mb-4">
                                    <li>
                                        <label class="checkbox-item">Less Than $1,000   
                                            <input type="checkbox" name="price_usd[]" value="0-1000" {{ in_array('0-1000', request('price_usd', [])) ? 'checked' : '' }}>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <span class="categorey-no"></span>
                                    </li>
                                    <li>
                                        <label class="checkbox-item">$1,000 - $5,000
                                            <input type="checkbox" name="price_usd[]" value="1000-5000" {{ in_array('1000-5000', request('price_usd', [])) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <span class="categorey-no"></span>
                                    </li>
                                    <li>
                                        <label class="checkbox-item">$5,000 - $10,000
                                            <input type="checkbox" name="price_usd[]" value="5000-10000" {{ in_array('5000-10000', request('price_usd', [])) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <span class="categorey-no"></span>
                                    </li>
                                    <li>
                                        <label class="checkbox-item">$10,000 - $20,000
                                            <input type="checkbox" name="price_usd[]" value="10000-20000" {{ in_array('10000-20000', request('price_usd', [])) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <span class="categorey-no"></span>
                                    </li>
                                    <li>
                                        <label class="checkbox-item">More Than $20,000
                                            <input type="checkbox" name="price_usd[]" value="20000+" {{ in_array('20000+', request('price_usd', [])) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <span class="categorey-no"></span>
                                    </li>
                                </ul>

                                {{-- Bedroom & Bathroom --}}
                                <h4 class="ltn__widget-title">Bedroom</h4>
                                <ul class="mb-4">
                                    <li>
                                        <label class="checkbox-item">1
                                            <input type="checkbox" name="number_bedroom[]" value="1" {{ in_array('1', request('number_bedroom', [])) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-item">2
                                            <input type="checkbox" name="number_bedroom[]" value="2" {{ in_array('2', request('number_bedroom', [])) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                    </li>
                                    <li>
                                        <label class="checkbox-item">3
                                            <input type="checkbox" name="number_bedroom[]" value="3" {{ in_array('3', request('number_bedroom', [])) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-item">4
                                            <input type="checkbox" name="number_bedroom[]" value="4" {{ in_array('4', request('number_bedroom', [])) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-item">Up To 4
                                            <input type="checkbox" name="number_bedroom[]" value="5+" {{ in_array('5+', request('number_bedroom', [])) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>

                                {{-- Area --}}
                                <h4 class="ltn__widget-title">Area</h4>
                                <ul class="mb-4">
                                    @foreach($regions as $region)
                                        <li>
                                            <label class="checkbox-item">{{ $region->name }}
                                                <input type="checkbox" name="region[]" value="{{ $region->id }}" {{ in_array($region->id, request('region', [])) ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
@endsection

@push('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('filterForm');
        const containerList = document.getElementById('properties-list');
        const containerCard = document.getElementById('properties-card');
        const sortSelect = document.getElementById('sortSelect');
        const sortHidden = document.getElementById('sortHidden');

        form.addEventListener('change', function(e) {
            e.preventDefault();

            let formData = new FormData(form);
            let query = new URLSearchParams(formData).toString();

            fetch("{{ route('landing.properties.index') }}?" + query, {
                headers: { "X-Requested-With": "XMLHttpRequest" }
            })
            .then(res => res.json())
            .then(data => {
                containerList.innerHTML = data.htmlList;
                containerCard.innerHTML = data.htmlCard ;
                document.getElementById('pagination-container').innerHTML = data.htmlPagination;
                document.getElementById('showing-product-number').innerText = 'Showing property' + data.filterSummary;
                document.getElementById('total-properties').innerText = 'Showing ' + data.totalProperties + ' Properties';
            });
        });
    });
</script>

<script>
    document.addEventListener("click", function(e) {
        const option = e.target.closest('.nice-select .option');
        if (option) {
            const select = document.getElementById('sortSelect');
            const value = option.getAttribute('data-value');
            const containerList = document.getElementById('properties-list');
            const containerCard = document.getElementById('properties-card');
            const form = document.getElementById('filterForm');

            if (select) {
                // Update hidden select value
                select.value = value;
                console.log('Sort changed:', value);

                // Build query from filters + sort
                let formData = new FormData(form);
                formData.append("sort", value);
                let query = new URLSearchParams(formData).toString();

                // AJAX request
                fetch("{{ route('landing.properties.index') }}?" + query, {
                    headers: { "X-Requested-With": "XMLHttpRequest" },
                })
                .then(res => res.json())
                .then(data => {
                    containerList.innerHTML = data.htmlList;
                    containerCard.innerHTML = data.htmlCard ;
                    if (data.filterSummary) {
                        document.getElementById("showing-product-number").innerText = data.filterSummary;
                    }
                    if (data.totalProperties) {
                        document.getElementById("total-properties").innerText = data.totalProperties;
                    }
                })
                .catch(err => console.error("Sorting AJAX error:", err));
            }
        }
    });
</script>


@endpush
