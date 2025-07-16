@extends('admin.layouts.master')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
@endpush
@section('content')
    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-lg-4 py-3">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Properties Details</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb float-end m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Properties</a></li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <ol class="carousel-indicators">
                                                @foreach ($image_gallery as $gallery)
                                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->iteration - 1 == 0 ? 'active' : '' }}"></li>
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                @foreach ($image_gallery as $gallery)
                                                    <div class="carousel-item {{ $loop->iteration - 1 == 0 ? 'active' : '' }}">
                                                        <img class="d-block img-fluid" src="{{ asset($gallery->image_path) }}" alt="First slide" style="object-fit: contain">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </a>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 ">
                                        <h4 class="card-title">{{ $dataProperties->properties_name }}</h4>
                                        <p class="card-subtitle"><i class="mdi mdi-map-marker"></i> {{ $dataProperties->address . ', ' . $dataProperties->sub_region . ', ' . $dataProperties->region }}</p>
                                        <hr>
                                        <span class="font-size-12">
                                            {{ $dataProperties->description }}
                                        </span>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-4 mb-3">
                                                <h5 class="d-flex flex-row gap-2 fw-medium"><iconify-icon icon="entypo:price-tag" class="font-size-16"></iconify-icon> Price IDR</h5>
                                                <h5 class="font-size-16">IDR 500.000.000.000</h5>
                                            </div>

                                            <div class="col-lg-4 mb-3">
                                                <h5 class="d-flex flex-row gap-2 fw-medium"><iconify-icon icon="solar:tag-price-outline" class="font-size-16"></iconify-icon> Price USD</h5>
                                                <h5 class="font-size-16">$5000</h5>
                                            </div>

                                            <div class="col-lg-4 mb-3">
                                                <h5 class="d-flex flex-row gap-2 fw-medium"><iconify-icon icon="fluent-mdl2:build-issue" class="font-size-16"></iconify-icon> Year Build</h5>
                                                <h3 class="font-size-20">2023</h3>
                                            </div>

                                            <div class="col-lg-4 mb-3">
                                                <h5 class="d-flex flex-row gap-2 fw-medium"><iconify-icon icon="mdi:resize" class="font-size-16"></iconify-icon> Properties Size</h5>
                                                <h3>200 m2</h3>
                                            </div>

                                            <div class="col-lg-4 mb-3">
                                                <h5 class="d-flex flex-row gap-2 fw-medium"><iconify-icon icon="mdi:bedroom-outline" class="font-size-16"></iconify-icon> Number Bedroom</h5>
                                                <h3>2 <span class="text-uppercase text-muted font-size-12 mb-3">Bedroom</span></h3>
                                            </div>

                                            <div class="col-lg-4 mb-3">
                                                <h5 class="d-flex flex-row gap-2 fw-medium"><iconify-icon icon="cil:bathroom" class="font-size-16"></iconify-icon> Number Bathroom</h5>
                                                <h3>4 <span class="text-uppercase font-size-12 text-muted mb-3">Bathroom</span></h3>
                                            </div>
                                        </div>

                                        <hr class="m-0 mb-4">

                                        <h4 class="card-title mb-3">Properties Feature</h4>



                                        <div class="row">
                                            @foreach ($feature_list as $feature)
                                                <div class="col-lg-6 mb-3 d-flex gap-2">
                                                    <iconify-icon icon="simple-line-icons:check" class="font-size-18"></iconify-icon>
                                                    <p class="card-subtitle">{{ $feature->feature_name }}</p>
                                                </div>
                                            @endforeach
                                        </div>



                                    </div>
                                </div>

                            </div> <!-- end card-body-->

                            <div class="card-header">

                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->


                </div>
            </div>
            <!-- end page title -->



        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lightbox = GLightbox({
                selector: '.glightbox'
            });
        });
    </script>
@endpush
