@extends('admin.layouts.master')
@push('styles')
    <!-- third party css -->
    <link href="{{ asset('admin') }}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('admin') }}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('admin') }}/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('admin') }}/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" /> --}}
    <!-- third party css end -->

    <!-- App css -->
    {{-- <link href="{{ asset('admin') }}/assets/css/style.min.css" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="{{ asset('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css"> --}}
    {{-- <script src="assets/js/config.js"></script> --}}
@endpush
@section('content')
    <div class="px-3">
        <div class="container-fluid">
            <div class="py-lg-4 py-3">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Bookings</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb float-end m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Panel</a></li>
                                <li class="breadcrumb-item active">Booking</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Cost per Unit</h6>
                                    <span class="h3 mb-0"> $85.50 </span>
                                </div>
                                <div class="col-auto">
                                    <span class="badge badge-soft-success">+7.5%</span>
                                </div>
                            </div> <!-- end row -->

                            <div id="sparkline1" class="mt-3"><canvas style="display: inline-block; width: 231px; height: 50px; vertical-align: top;" width="231" height="50"></canvas></div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Market Revenue</h6>
                                    <span class="h3 mb-0"> $12,548.25 </span>
                                </div>
                                <div class="col-auto">
                                    <span class="badge badge-soft-danger">-24.5%</span>
                                </div>
                            </div> <!-- end row -->

                            <div id="sparkline2" class="mt-3"><canvas style="display: inline-block; width: 231px; height: 50px; vertical-align: top;" width="231" height="50"></canvas></div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Expenses</h6>
                                    <span class="h3 mb-0"> $8,451.28 </span>
                                </div>
                                <div class="col-auto">
                                    <span class="badge badge-soft-success">+3.5%</span>
                                </div>
                            </div> <!-- end row -->

                            <div id="sparkline3" class="mt-3"><canvas style="display: inline-block; width: 231px; height: 50px; vertical-align: top;" width="231" height="50"></canvas></div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Daily Visits</h6>
                                    <span class="h3 mb-0"> 1,12,584 </span>
                                </div>
                                <div class="col-auto">
                                    <span class="badge badge-soft-success">+53.5%</span>
                                </div>
                            </div> <!-- end row -->

                            <div id="sparkline4" class="mt-3"><canvas style="display: inline-block; width: 231px; height: 50px; vertical-align: top;" width="231" height="50"></canvas></div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Booking List</h4>
                            <p class="card-subtitle">Transaction period from 21 July to 25 Aug</p>
                        </div>

                        <div class="card-bod">
                            <div class="table-responsive m-4">
                                <table class="table-hover table-centered nowrap table" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer Name</th>
                                            <th>Contact</th>
                                            <th>Properties</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookingData as $booking)
                                            <tr>
                                                <td>
                                                    <span class="badge bg-primary ms-auto p-2">{{ $loop->iteration }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-start font-size-20 gap-1">
                                                        <iconify-icon icon="ph:user-bold"></iconify-icon>
                                                        <div class="flex-column">

                                                            <h5 class="font-size-15 font-weight-normal m-0">
                                                                {{ $booking->customer_name }}
                                                            </h5>
                                                            <span class="text-muted font-size-12">{{ $booking->customer_address }}</span>
                                                        </div>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-start font-size-20 gap-1">
                                                        <div class="flex-column">

                                                            <h5 class="font-size-14 font-weight-normal m-0">
                                                                {{ $booking->customer_email }}
                                                            </h5>
                                                            <span class="text-muted font-size-14">{{ implode('-', str_split(preg_replace('/\D/', '', $booking->customer_phone), 4)) }}</span>

                                                        </div>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-start font-size-20 gap-1">
                                                        <iconify-icon icon="material-symbols-light:house-outline"></iconify-icon>
                                                        <div class="flex-column">
                                                            <h5 class="font-size-15 font-weight-normal m-0">{{ $booking->properties_name }}</h5>

                                                            <span class="text-muted font-size-12">{{ $booking->address }}</span>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-15 font-weight-normal mb-1">{{ \Carbon\Carbon::parse($booking->start_date)->format('d F, Y') }}</h5>
                                                    <span class="text-muted font-size-12">Already booked for {{ $bookingData->alreadyBooked }} days</span>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-15 font-weight-normal mb-1">{{ \Carbon\Carbon::parse($booking->end_date)->format('d F, Y') }}</h5>
                                                    <span class="text-muted font-size-12">Time Remaining {{ $bookingData->remainingDays }} days</span>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-15 font-weight-normal mb-1">$790.000.000</h5>
                                                    <span class="text-muted font-size-12">Amount</span>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-15 font-weight-normal mb-1">Pending</h5>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-15 font-weight-normal mb-1">Pending</h5>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-15 font-weight-normal mb-1">Pending</h5>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-15 font-weight-normal mb-1">Pending</h5>
                                                </td>
                                                {{-- <td>
                                                <h5 class="font-size-17 font-weight-normal mb-1"><i class="fab fa-cc-visa"></i></h5>
                                                <span class="text-muted font-size-12">Card</span>
                                            </td> --}}

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>

        </div>
    </div>
@endsection
@push('script')
    <!-- third party js -->
    <script src="{{ asset('admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    {{-- <script src="{{ asset('admin') }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script> --}}
    <!-- third party js ends -->

    <!-- Datatables js -->
    <script src="{{ asset('admin') }}/assets/js/pages/datatables.js"></script>
@endpush
