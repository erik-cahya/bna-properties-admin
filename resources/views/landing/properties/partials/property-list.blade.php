{{-- List View --}}
@forelse ($properties as $property)
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
@empty
    <p>No properties found.</p>
@endforelse