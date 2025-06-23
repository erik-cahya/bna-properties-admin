@extends('admin.layouts.master')
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
                <div class="col-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="{{ asset('admin') }}/assets/images/media/img-3.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="{{ asset('admin') }}/assets/images/media/img-2.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="{{ asset('admin') }}/assets/images/media/img-1.jpg" alt="Third slide">
                                    </div>
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
                        </div> <!-- end card-body-->

                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">

                                    <h4 class="card-title">{{ $dataProperties->properties_name }}</h4>
                                    <p class="card-subtitle"><i class="mdi mdi-map-marker"></i> {{ $dataProperties->address }}</p>
                                </div>
                                <div class="col-lg-6 d-flex flex-column text-end">

                                    <h5 class="">IDR {{ number_format($dataProperties->price_idr, 2, ',', '.') }}</h5>
                                    <h5 class="">USD {{ number_format($dataProperties->price_usd, 2, ',', '.')  }}</h5>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->


            </div>
            </div>
            <!-- end page title -->



        </div> <!-- container -->

    </div> <!-- content -->
@endsection
