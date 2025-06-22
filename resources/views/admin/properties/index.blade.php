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

                        <table id="basic-datatable" class="dt-responsive table-nowrap table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Name Properties</th>
                                    <th class="text-center">Property Details</th>
                                    <th class="text-center">Rooms</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr class="text-center">
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex gap-2 text-start">
                                            <img src="{{ asset('bna-assets/Property/p-1.jpg') }}" alt="" class="avatar-md border-light border-3 rounded border">
                                            <div class="align-self-center d-flex flex-column">
                                                <span class="fw-medium fs-5">Grand Resort Bali Tabanan</span>
                                                <hr class="m-1">
                                                <span class="font-size-12 fw-medium fst-italic">BNA-2131232123</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">

                                            <span class="fst-italic fw-bold font-size-16"><i class="mdi mdi-map-marker"></i> Singaraja, Buleleng</span>
                                            <span class="fst-italic text-muted font-size-12"> Jln. Raya Bedugul Singaraja, Baturiti, Bali</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-1">

                                            <span class="font-size-12"><i class="mdi mdi-bed"></i> 20 Bedroom</span>
                                            <span class="font-size-12"><i class="mdi mdi-shower"></i> 20 Bathroom</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fst-italic fw-medium font-size-12"> IDR 20.000.000.000</span>
                                            <hr class="m-1">
                                            <span class="fst-italic fw-medium font-size-12"> USD 231,0020</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-1">
                                            <span class="badge bg-danger ms-auto">Cancelled</span>
                                            <span class="badge bg-dark text-light ms-auto">Apartement</span>
                                            <span class="badge bg-dark text-light ms-auto">20 Max People</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group mb-2 me-1">
                                            <button type="button" class="btn btn-xs btn-success waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></button>
                                            <button type="button" class="btn btn-xs btn-warning waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></button>
                                            <button type="button" class="btn btn-xs btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can"></i></button>
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
