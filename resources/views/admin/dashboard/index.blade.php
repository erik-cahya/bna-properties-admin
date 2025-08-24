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

            {{-- top row --}}
            <div class="row">
                <div class="col-lg-6 col-xl-4">
                    <div class="card border-primary border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Total Villa</h6>
                                    <span class="h3 mb-0"> {{ $dataProperties->count() }} Villas </span>
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
                    <div class="card border-warning  border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Total Booking</h6>
                                    <span class="h3 mb-0"> {{ $boookingCount }} Bookings </span>
                                </div>
                                <div class="col-auto">
                                    <iconify-icon icon="game-icons:receive-money" style="font-size: 55px" class="text-muted mt-2"></iconify-icon>
                                </div>
                            </div> <!-- end row -->

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                {{-- <div class="col-lg-6 col-xl-4">
                    <div class="card border-success border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Villa Available</h6>
                                    <span class="h3 mb-0"> {{ $availableVillas }} Villas </span>
                                </div>
                                <div class="col-auto">
                                    <iconify-icon icon="fa6-regular:calendar-check" style="font-size: 55px" class="text-muted mt-2"></iconify-icon>
                                </div>
                            </div> <!-- end row -->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col--> --}}

                <div class="col-lg-6 col-xl-4">
                    <div class="card border-warning border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">New Inquiry</h6>
                                    <span class="h3 mb-0">
                                        <span id="pendingCount">{{ $bookings->whereIn('status', ['Pending', 'pending'])->count() }}</span> Pending Inquiry
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <iconify-icon icon="material-symbols-light:pending-actions-sharp" style="font-size: 55px" class="text-muted mt-2"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row-->

            {{-- Table Start --}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Booking Overview</h4>
                        </div>
                        <div class="card-ody">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-centered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Villa Name</th>
                                            <th>Villa Location</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Payment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                            <tr>
                                                <td>{{ $booking->customer?->customer_name ?? 'N/A' }}</td>
                                                <td>{{ $booking->customer?->customer_phone ?? 'N/A' }}</td>
                                                <td>{{ $booking->customer?->customer_email ?? 'N/A' }}</td>
                                                <td>{{ $booking->properties?->properties_name ?? 'N/A' }}</td>
                                                <td>{{ $booking->properties?->region?->name ?? 'N/A' }}</td>
                                                <td>{{ $booking->start_date }}</td>
                                                <td>{{ $booking->end_date }}</td>
                                                <td>
                                                    @if(strtolower($booking->dp_status) === 'paid')
                                                    <span class="badge bg-success">Paid</span>
                                                    @elseif(strtolower($booking->dp_status) === 'unpaid')
                                                    <span class="badge bg-warning text-dark">Unpaid</span>
                                                    @elseif(strtolower($booking->dp_status) === 'cancel')
                                                    <span class="badge bg-danger">Cancel</span>
                                                    @else
                                                    <span class="badge bg-secondary">{{ $booking->dp_status }}</span>
                                                    @endif
                                                </td>
                                                <td>                                                            
                                                    <a href="{{ route('booking.index') }}"><button type="button" class="btn btn-xs btn-success waves-effect waves-light" data-bs-toggle="modal">View &nbsp; <i class="mdi mdi-eye"></i> </button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end Table -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
