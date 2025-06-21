@extends('admin.layouts.master')
@section('content')
    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-lg-4 py-3">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Properties List</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb float-end m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Properties</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Property Feature List</h4>
                        <p class="text-muted font-size-13 mb-4">
                            This data will appear in each detailed properties.
                        </p>

                        <table id="basic-datatable" class="dt-responsive nowrap table">
                            <thead>
                                <tr>
                                    <th width="20" class="text-center">No</th>
                                    <th width="100">Name Properties</th>
                                    <th width="100" class="text-center">Property Details</th>
                                    <th width="100" class="text-center">Price</th>
                                    <th width="100" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <img src="{{ asset('bna-assets/Property/p-1.jpg') }}" alt="" class="avatar-lg rounded-circle me-2">
                                            <div class="align-self-center d-flex flex-column">
                                                <span class="fw-medium fs-5">Grand Resort Bali Tabanan</span>
                                                <hr class="m-1">
                                                <span class="fst-italic text-muted font-size-12"><i class="mdi mdi-map-marker"></i> Jln. Raya Bedugul Singaraja, Baturiti</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="max-width: 120px">
                                        <div class="d-flex justify-content-center mb-2 gap-2">
                                            <span class="badge bg-dark font-size-12 text-light"><i class="mdi mdi-shower-head"></i> 20</span>
                                            <span class="badge bg-blue font-size-12"><i class="mdi mdi-bed"></i> 30</span>
                                            <span class="badge bg-blue font-size-12"><i class="mdi mdi-bed"></i> 2022</span>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <span class="badge bg-dark text-light">Leasehold</span>
                                            <span class="badge bg-blue">Villa</span>
                                        </div>

                                    </td>
                                    <td style="max-width: 120px">
                                        <div class="d-flex flex-column gap-2">
                                            <span class="fst-italic fw-bold font-size-14"><i class="mdi mdi-map-marker"></i> IDR 200.000.000</span>
                                            <span class="fst-italic fw-bold font-size-14"><i class="mdi mdi-map-marker"></i> USD 43.000</span>
                                        </div>

                                    </td>
                                    <td style="max-width: 120px">
                                        <div class="d-flex justify-content-center mb-2 gap-2">
                                            <span class="badge bg-dark font-size-12"><i class="mdi mdi-shower-head"></i> 20</span>
                                            <span class="badge bg-blue font-size-12"><i class="mdi mdi-bed"></i> 30</span>
                                            <span class="badge bg-blue font-size-12"><i class="mdi mdi-bed"></i> 2022</span>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <span class="badge bg-dark">Leasehold</span>
                                            <span class="badge bg-blue">Villa</span>
                                        </div>

                                    </td>

                                </tr>

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
