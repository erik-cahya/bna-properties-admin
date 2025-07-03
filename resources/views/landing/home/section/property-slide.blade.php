<!-- PRODUCT SLIDER AREA START -->
{{-- {{ dd($data_properties) }} --}}

<div class="ltn__product-slider-area ltn__product-gutter pb-90 plr--7 pt-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Properties</h6>
                    <h1 class="section-title">Featured Listings</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__product-slider-item-four-active-full-width slick-arrow-1">
            <!-- ltn__product-item -->
            @foreach ($data_properties as $properties)
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

            <!-- ltn__product-item -->

            <!--  -->
        </div>
    </div>
</div>
<!-- PRODUCT SLIDER AREA END -->
