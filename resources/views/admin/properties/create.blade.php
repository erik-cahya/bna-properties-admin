@extends('admin.layouts.master')
@push('styles')
    <link href="{{ asset('admin') }}/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-lg-4 py-3">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Create Properties</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb float-end m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Properties</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="d-flex flex-wrap gap-2">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger p-2" style="font-size: 12px" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create New Property Listing</h4>
                            <p class="card-subtitle">Enter your property data according to the form below.</p>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data" id="galleryForm">
                                @csrf

                                <x-admin-floating-form type="text" className="col-md-12" label="Properties Name" name="propertiesName" />

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description" style="height: 80px"></textarea>
                                            <label for="description">Description</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="address" name="address" style="height: 80px"></textarea>
                                            <label for="address">Address</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="statusListing" name="statusListing" aria-label="Floating label select example">
                                                <option selected="" disabled readonly>Choose Status Listing</option>
                                                <option value="Pending">Pending</option>
                                                <option value="For Rent">For Rent</option>
                                            </select>
                                            <label for="statusListing">Status Listing</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="typeProperties" name="typeProperties" aria-label="Floating label select example">
                                                <option selected="" disabled readonly>Choose Type of Properties</option>
                                                <option value="Villa">Villa</option>
                                                <option value="Appartement">Appartement</option>
                                            </select>
                                            <label for="typeProperties">Property Type</label>
                                        </div>
                                    </div>

                                    <x-admin-floating-form type="number" className="col-md-4" label="Properties Size" name="propertiesSize" />

                                </div>

                                <div class="row">
                                    <x-admin-floating-form type="text" className="col-md-12" label="Price Per Month (USD)" name="priceUSD" />
                                    {{-- <x-admin-floating-form type="text" className="col-md-6" label="Price Per Month (IDR)" name="priceIDR" /> --}}
                                    {{-- <x-admin-floating-form type="text" className="col-md-6" label="Price Per Month (USD) " name="priceUSD" disabled /> --}}

                                    {{-- <input type="hidden" name="usd_price" id="usd_price_raw"> --}}
                                    {{-- <p id="exchange_rate_info" class="d-none"></p> --}}
                                </div>

                                <div class="row">
                                    <x-admin-floating-form type="number" className="col-md-3" label="Number Bedroom" name="numberBedroom" />
                                    <x-admin-floating-form type="number" className="col-md-3" label="Number Bathroom" name="numberBathroom" />
                                    <x-admin-floating-form type="number" className="col-md-3" label="Year Build" name="yearBuild" />
                                    <x-admin-floating-form type="number" className="col-md-3" label="Max People" name="maxPeople" />
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="region" name="region" aria-label="Floating label select example">
                                                <option selected="" disabled readonly>Choose Region</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                @endforeach

                                            </select>
                                            <label for="region">Region</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="subRegion" name="subRegion" aria-label="Floating label select example">
                                                <option selected="" disabled readonly>--Select Region--</option>
                                            </select>
                                            <label for="subRegion">Sub Region</label>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="my-3">Features</h4>

                                <div class="row mb-3">
                                    @foreach ($data_features as $features)
                                        <div class="col-4">
                                            <div class="form-check my-2">
                                                <input type="checkbox" data-plugin="switchery" data-color="#64b0f2" name="feature[{{ $features->slug }}]" data-size="small" />
                                                <label class="form-check-label" for="flexCheckChecked">{{ $features->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <h4 class="mt-4">Gallery</h4>
                                <p class="card-subtitle">The first image is the featured image</p>

                                <div class="col-lg-12 mb-3 mt-4">

                                    <input type="file" name="images[]" id="imageInput" multiple accept="image/*" class="form-control mb-1">
                                    <div id="previewContainer" class="d-flex flex-wrap gap-3"></div>

                                    <input type="hidden" name="order" id="imageOrder">

                                    @error('images')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col -->

            </div>

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
@push('script')
    <!-- Plugins Js -->
    <script src="{{ asset('admin') }}/assets/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <!-- Demo js -->
    <script src="{{ asset('admin') }}/assets/js/pages/form-advanced.js"></script>

    <script src="{{ asset('admin/assets/js/cleave.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const cleaveFields = [{
            id: '#priceUSD',
            options: {}
        }, ];

        cleaveFields.forEach(field => {
            new Cleave(field.id, {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand',
                prefix: '$ ',
                noImmediatePrefix: true,
                numeralDecimalMark: '.',
                delimiter: ',',
                ...field.options // spread operator untuk custom config
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const regionSelect = document.getElementById('region');
            const subregionSelect = document.getElementById('subRegion');

            regionSelect.addEventListener('change', function() {
                const regionId = this.value;

                subregionSelect.innerHTML = '<option value="">-- Select Sub Region --</option>';
                subregionSelect.disabled = true;

                if (regionId) {
                    fetch(`/get-subregions/${regionId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(subregion => {
                                const option = document.createElement('option');
                                option.value = subregion.id;
                                option.text = subregion.name;
                                subregionSelect.appendChild(option);
                            });

                            subregionSelect.disabled = false;
                        })
                        .catch(error => console.error('Error fetching subregions:', error));
                }
            });
        });
    </script>

    {{-- Convert IDR to USD --}}
    {{-- <script>
        const defaultKurs = 15000;
        const cacheKey = 'usd_to_idr_rate';
        const cacheTimeKey = 'usd_to_idr_rate_time';
        const cacheTTL = 10 * 60 * 2000; // 20 minutes

        // debounce / batasi eksekusi fungsi (ketika user ketik angka)
        function debounce(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        function formatCurrency(value, locale, currency, fraction = 2) {
            return new Intl.NumberFormat(locale, {
                style: 'currency',
                currency: currency,
                minimumFractionDigits: fraction
            }).format(value);
        }

        async function getExchangeRate() {
            const now = new Date().getTime();
            const storedRate = localStorage.getItem(cacheKey);
            const storedTime = localStorage.getItem(cacheTimeKey);

            if (storedRate && storedTime && (now - parseInt(storedTime)) < cacheTTL) {
                return parseFloat(storedRate);
            }

            try {
                const response = await axios.get('https://api.exchangerate-api.com/v4/latest/USD');
                const rate = response.data.rates.IDR;
                localStorage.setItem(cacheKey, rate);
                localStorage.setItem(cacheTimeKey, now);
                return rate;
            } catch (error) {
                console.error("Gagal mengambil kurs dari API:", error);
                return defaultKurs;
            }
        }

        async function handleIDRInput() {

            const idrInput = document.getElementById('priceIDR');

            const idrValue = parseFloat(idrInput.value.replace(/[^0-9]/g, '')) || 0;


            // if (idrValue <= 0) return;

            const rate = await getExchangeRate();
            document.getElementById('exchange_rate_info').textContent = `1 USD = ${formatCurrency(rate, 'id-ID', 'IDR', 0)}`;
            const usdValue = idrValue / rate;

            console.log(idrValue);


            // Update USD values
            document.getElementById('priceUSD').value = formatCurrency(usdValue, 'en-US', 'USD');
            document.getElementById('usd_price_raw').value = usdValue.toFixed(2);

        }

        document.getElementById('priceIDR').addEventListener('input', debounce(handleIDRInput, 400));
    </script> --}}
    {{-- /* Convert IDR to USD --}}

    {{-- ######################### Gallery Upload ######################### --}}
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <script>
        const imageInput = document.getElementById('imageInput');
        const previewContainer = document.getElementById('previewContainer');
        const imageOrder = document.getElementById('imageOrder');
        const galleryForm = document.getElementById('galleryForm');
        let files = [];

        imageInput.addEventListener('change', (e) => {
            files = Array.from(e.target.files);
            previewContainer.innerHTML = '';

            files.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = (event) => {
                    const imgDiv = document.createElement('div');
                    imgDiv.classList.add('img-preview');
                    imgDiv.setAttribute('data-index', index);
                    imgDiv.innerHTML = `
                              <img src="${event.target.result}" alt="Image Preview"
                                   style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #ccc; padding: 4px;">
                              <p class="text-center mt-1">Image ${index + 1}</p>
                         `;
                    previewContainer.appendChild(imgDiv);
                };
                reader.readAsDataURL(file);
            });

            updateOrder();
        });

        function updateOrder() {
            const items = document.querySelectorAll('.img-preview');
            imageOrder.value = Array.from(items).map(item => item.getAttribute('data-index')).join(',');
        }

        new Sortable(previewContainer, {
            animation: 150,
            onEnd: () => updateOrder(),
        });

        // 👇 Tambahkan ini agar order selalu terupdate saat form disubmit
        galleryForm.addEventListener('submit', function(e) {
            updateOrder(); // pastikan order diperbarui dulu
        });
    </script>
    {{-- /* Gallery Upload */ --}}
@endpush
