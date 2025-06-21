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

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create New Property Listing</h4>
                            <p class="card-subtitle">Enter your property data according to the form below.</p>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('properties.store') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="propertiesName" name="propertiesName" placeholder="Input Properties Name">
                                    <label for="propertiesName">Properties Name</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="statusListing" name="statusListing" aria-label="Floating label select example">
                                                <option selected="" disabled readonly>Choose Status Listing</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Listing">Listing</option>
                                            </select>
                                            <label for="statusListing">Status Listing</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="typeProperties" name="typeProperties" aria-label="Floating label select example">
                                                <option selected="" disabled readonly>Choose Type of Properties</option>
                                                <option value="Villa">Villa</option>
                                                <option value="Appartement">Appartement</option>
                                            </select>
                                            <label for="typeProperties">Property Type</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="numberBedroom" name="numberBedroom" placeholder="Enter Email address">
                                            <label for="numberBedroom">Number Bedroom</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="numberBathroom" name="numberBathroom" placeholder="Enter Email address">
                                            <label for="numberBathroom">Number Bathroom</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="yearBuild" name="yearBuild" placeholder="Enter Email address">
                                            <label for="yearBuild">Year Build</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="maxPeople" name="maxPeople" placeholder="Enter Email address">
                                            <label for="maxPeople">Max People</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="priceIDR" name="priceIDR" placeholder="Input IDR Price">
                                            <label for="priceIDR">Price Per Month (IDR)</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="priceUSD" name="priceUSD" placeholder="Input USD Price">
                                            <label for="priceUSD">Price Per Month (USD)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="region" name="region" aria-label="Floating label select example">
                                                <option selected="" disabled readonly>Choose Region</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Listing">Listing</option>
                                            </select>
                                            <label for="region">Region</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="subRegion" name="subRegion" aria-label="Floating label select example">
                                                <option selected="" disabled readonly>Choose Sub Region</option>
                                                <option value="Villa">Villa</option>
                                                <option value="Appartement">Appartement</option>
                                            </select>
                                            <label for="subRegion">Sub Region</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-2">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="address" name="address" style="height: 100px"></textarea>
                                    <label for="address">Address</label>
                                </div>

                                <h4 class="my-3">Features</h4>

                                <div class="row mb-3">
                                    @foreach ($data_features as $features)
                                        <div class="col-4">
                                            <div class="form-check my-2">
                                                <input type="checkbox" data-plugin="switchery" data-color="#64b0f2" name="{{ $features->slug }}" data-size="small" />
                                                <label class="form-check-label" for="flexCheckChecked">{{ $features->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
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

    <script>
        const cleaveFields = [{
                id: '#priceIDR',
                options: {
                    prefix: 'IDR '
                }
            },
            {
                id: '#priceUSD',
                options: {}
            },
        ];

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
@endpush
