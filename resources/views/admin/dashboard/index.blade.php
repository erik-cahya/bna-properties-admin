@extends('admin.layouts.master')
@section('content')
    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-lg-4 py-3">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Dashboard</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb float-end m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">BNA Properties</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-6 col-xl-4">
                    <div class="card border-primary border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Total Properties</h6>
                                    <span class="h3 mb-0"> {{ $dataProperties->count() }} Properties </span>
                                </div>
                                <div class="col-auto">
                                    <iconify-icon icon="material-symbols-light:holiday-village-outline" style="font-size: 55px" class="text-muted mt-2"></iconify-icon>
                                </div>
                            </div> <!-- end row -->

                            {{-- <div id="sparkline1" class="mt-3"></div> --}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6 col-xl-4">
                    <div class="card border-success border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Total Transaction</h6>
                                    <span class="h3 mb-0"> 12 Transaction </span>
                                </div>
                                <div class="col-auto">
                                    <iconify-icon icon="game-icons:receive-money" style="font-size: 55px" class="text-muted mt-2"></iconify-icon>
                                </div>
                            </div> <!-- end row -->

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6 col-xl-4">
                    <div class="card border-warning border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Total Transaction Pending</h6>
                                    <span class="h3 mb-0"> 14 Transaction </span>
                                </div>
                                <div class="col-auto">
                                    <iconify-icon icon="material-symbols-light:pending-actions-sharp" style="font-size: 55px" class="text-muted mt-2"></iconify-icon>
                                </div>
                            </div> <!-- end row -->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Recent Inquiry</h4>
                            <p class="card-subtitle">Customer data that makes transactions</p>
                        </div>
                        <div class="card-ody">
                            <div class="table-responsive">
                                <table class="table-centered table-striped table-nowrap mb-0 table">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Location</th>
                                            <th>Inquiry Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="table-user">
                                                <img src="{{ asset('admin') }}/assets/images/users/avatar-4.jpg" alt="table-user" class="avatar-sm rounded-circle me-2">
                                                <a href="javascript:void(0);" class="text-body font-weight-semibold">Paul J. Friend</a>
                                            </td>
                                            <td>
                                                937-330-1634
                                            </td>
                                            <td>
                                                pauljfrnd@jourrapide.com
                                            </td>
                                            <td>
                                                New York
                                            </td>
                                            <td>
                                                07/07/2024
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="table-user">
                                                <img src="{{ asset('admin') }}/assets/images/users/avatar-3.jpg" alt="table-user" class="avatar-sm rounded-circle me-2">
                                                <a href="javascript:void(0);" class="text-body font-weight-semibold">Bryan J. Luellen</a>
                                            </td>
                                            <td>
                                                215-302-3376
                                            </td>
                                            <td>
                                                bryuellen@dayrep.com
                                            </td>
                                            <td>
                                                New York
                                            </td>
                                            <td>
                                                09/12/2024
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-user">
                                                <img src="{{ asset('admin') }}/assets/images/users/avatar-8.jpg" alt="table-user" class="avatar-sm rounded-circle me-2">
                                                <a href="javascript:void(0);" class="text-body font-weight-semibold">Kathryn S.
                                                    Collier</a>
                                            </td>
                                            <td>
                                                828-216-2190
                                            </td>
                                            <td>
                                                collier@jourrapide.com
                                            </td>
                                            <td>
                                                Canada
                                            </td>
                                            <td>
                                                06/30/2024
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-user">
                                                <img src="{{ asset('admin') }}/assets/images/users/avatar-1.jpg" alt="table-user" class="avatar-sm rounded-circle me-2">
                                                <a href="javascript:void(0);" class="text-body font-weight-semibold">Timothy Kauper</a>
                                            </td>
                                            <td>
                                                (216) 75 612 706
                                            </td>
                                            <td>
                                                thykauper@rhyta.com
                                            </td>
                                            <td>
                                                Denmark
                                            </td>
                                            <td>
                                                09/08/2024
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-user">
                                                <img src="{{ asset('admin') }}/assets/images/users/avatar-5.jpg" alt="table-user" class="avatar-sm rounded-circle me-2">
                                                <a href="javascript:void(0);" class="text-body font-weight-semibold">Zara Raws</a>
                                            </td>
                                            <td>
                                                (02) 75 150 655
                                            </td>
                                            <td>
                                                austin@dayrep.com
                                            </td>
                                            <td>
                                                Germany
                                            </td>
                                            <td>
                                                07/15/2024
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="table-user">
                                                <img src="{{ asset('admin') }}/assets/images/users/avatar-6.jpg" alt="table-user" class="avatar-sm rounded-circle me-2">
                                                <a href="javascript:void(0);" class="text-body font-weight-semibold">Mike John</a>
                                            </td>
                                            <td>
                                                798-4651-455
                                            </td>
                                            <td>
                                                mikejohn@jourrapide.com
                                            </td>
                                            <td>
                                                New York
                                            </td>
                                            <td>
                                                08/07/2024
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
