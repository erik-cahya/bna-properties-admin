@extends('admin.layouts.master')
@push('styles')
    <!-- third party css -->
    <link href="{{ asset('admin') }}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('admin') }}/assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="assets/js/config.js"></script>
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
                <div class="col-lg-6 col-xl-4">
                    <div class="card border-primary border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Total Booking</h6>
                                    <span class="h3 mb-0"> {{ $bookingData->count() }} Booking </span>
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
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">New Booking</h6>
                                    <span class="h3 mb-0"> {{ $bookingData->where('status', 'new booking')->count() }} Transaction </span>
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
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Booking Today</h6>
                                    <span class="h3 mb-0"> {{ $bookingToday->count() }} Transaction </span>
                                </div>
                                <div class="col-auto">
                                    <iconify-icon icon="material-symbols-light:pending-actions-sharp" style="font-size: 55px" class="text-muted mt-2"></iconify-icon>
                                </div>
                            </div> <!-- end row -->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Booking List</h4>
                            <p class="card-subtitle">Customer data for booking villas/properties</p>
                        </div>

                        <div class="card-bod">
                            <div class="table-responsive m-4">
                                <table class="table-hover table-centered nowrap table" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer Name</th>
                                            {{-- <th>Contact</th> --}}
                                            <th>Properties</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookingData as $booking)
                                            {{-- {{ dd($bookingData) }} --}}
                                            <tr>
                                                <td>
                                                    <span class="badge bg-primary ms-auto p-2">{{ $loop->iteration }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-start font-size-20 gap-1">
                                                        <iconify-icon icon="ph:user-bold"></iconify-icon>
                                                        <div class="flex-column">

                                                            <h6 class="font-size-14 font-weight-normal m-0">
                                                                {{ $booking->customer_name }}
                                                            </h6>
                                                            <span class="text-muted font-size-12">{{ implode('-', str_split(preg_replace('/\D/', '', $booking->customer_phone), 4)) }}</span>
                                                        </div>

                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <div class="d-flex align-items-start gap-1">
                                                        <div class="flex-column">

                                                            <h6 class="font-size-14 font-weight-normal m-0">
                                                                {{ $booking->customer_email }}
                                                            </h6>
                                                            <span class="text-muted font-size-14">{{ implode('-', str_split(preg_replace('/\D/', '', $booking->customer_phone), 4)) }}</span>

                                                        </div>

                                                    </div>
                                                </td> --}}
                                                <td>
                                                    <div class="d-flex align-items-start gap-1">
                                                        <iconify-icon icon="material-symbols-light:house-outline"></iconify-icon>
                                                        <div class="flex-column">
                                                            <h6 class="font-size-14 font-weight-normal m-0">{{ $booking->properties_name }}</h6>

                                                            <span class="text-muted font-size-12">{{ $booking->address }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="font-size-14 font-weight-normal mb-1">{{ \Carbon\Carbon::parse($booking->start_date)->format('d F, Y') }}</h6>
                                                    <span class="text-muted font-size-12">Already booked for {{ $bookingData->alreadyBooked }} days</span>
                                                </td>
                                                <td>
                                                    <h6 class="font-size-14 font-weight-normal mb-1">{{ \Carbon\Carbon::parse($booking->end_date)->format('d F, Y') }}</h6>
                                                    <span class="text-muted font-size-12">Time Remaining {{ $bookingData->remainingDays }} days</span>
                                                </td>
                                                <td>
                                                    @php
                                                        if ($booking->status == 'pending') {
                                                            $label = 'Pending';
                                                            $className = 'bg-warning';
                                                        } elseif ($booking->status == 'new booking') {
                                                            $label = 'New Booking';
                                                            $className = 'bg-blue';
                                                        } elseif ($booking->status == 'accept') {
                                                            $label = 'Accept';
                                                            $className = 'bg-success';
                                                        } else {
                                                            $label = 'Decline';
                                                            $className = 'bg-danger';
                                                        }
                                                    @endphp
                                                    <div class="d-flex">
                                                        <span class="badge {{ $className }} ms-auto">{{ $label }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- <button type="button" class="btn btn-xs btn-success waves-effect waves-light"><i class="mdi mdi-heart-half-full"></i></button> --}}

                                                    <div class="button-list" id="tooltip-container">
                                                        <div class="btn-group mb-2 me-1">
                                                            <button type="button" class="btn btn-xs btn-success waves-effect waves-light" data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdrop-{{ $booking->id }}" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Details"><i class="mdi mdi-eye"></i></button>

                                                            {{-- <button type="button" class="btn btn-xs btn-warning waves-effect waves-light" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="mdi mdi-lead-pencil"></i></button> --}}

                                                            <button type="button" class="btn btn-xs btn-warning waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true"><iconify-icon icon="subway:menu" class="fs-14"></iconify-icon></button>
                                                            <div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);" data-popper-placement="bottom-start">
                                                                <a class="dropdown-item d-flex align-items-center gap-2" href="#"><iconify-icon icon="simple-line-icons:check"></iconify-icon> Accept</a>
                                                                <a class="dropdown-item d-flex align-items-center gap-2" href="#"><iconify-icon icon="bitcoin-icons:clock-outline"></iconify-icon> Pending</a>
                                                                <a class="dropdown-item d-flex align-items-center gap-2" href="#"><iconify-icon icon="maki:cross"></iconify-icon> Decline</a>
                                                            </div>

                                                            <input type="hidden" class="propertyId" value="{{ $booking->id }}">
                                                            <button type="button" class="btn btn-xs btn-danger waves-effect waves-light deleteButton" data-nama="{{ $booking->customer_name }}" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Data"><i class="mdi mdi-trash-can"></i></button>
                                                        </div>

                                                        {{-- <div class="btn-group mb-2">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true"> <i class="mdi mdi-lead-pencil"></i></button>
                                                                <div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);" data-popper-placement="bottom-start">
                                                                    <a class="dropdown-item" href="#">Dropdown link</a>
                                                                    <a class="dropdown-item" href="#">Dropdown link</a>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>

                                                    {{-- <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop">
                                                        Launch static backdrop modal
                                                    </button> --}}

                                                </td>

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

        <!-- Modal -->
        @foreach ($bookingData as $booking)
            <div class="modal fade" id="staticBackdrop-{{ $booking->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                aria-hidden="true">
                {{-- <div class="modal-dialog modal-full-width"> --}}
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header p-3">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                <iconify-icon icon="bxs:user" class="fs-14"></iconify-icon> Transaction Details | {{ $booking->customer_name }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="px-4 py-2">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card border-primary border">
                                            <div class="card-body">
                                                <h4 class="header-title mb-3">Customer Data</h4>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputEmail4" class="form-label">Customer Name</label>
                                                        <input type="text" class="form-control" id="inputEmail4" value="{{ $booking->customer_name }}" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputPassword4" class="form-label">Email</label>
                                                        <input type="text" class="form-control" id="inputPassword4" value="{{ $booking->customer_email }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputAddress" class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" id="inputAddress" value="{{ $booking->customer_phone }}" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputAddress" class="form-label">Booking Date</label>
                                                        <input type="text" class="form-control" id="inputAddress" value="{{ \Carbon\Carbon::parse($booking->created_at)->format('d F, Y') }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputAddress" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="inputAddress" value="{{ $booking->customer_address }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card border-primary border">
                                            <div class="card-body">
                                                <h4 class="header-title mb-3">Properties Data</h4>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputEmail4" class="form-label">Properties Name</label>
                                                        <input type="text" class="form-control" id="inputEmail4" value="{{ $booking->properties_name }}" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputPassword4" class="form-label">Properties Type</label>
                                                        <input type="text" class="form-control" id="inputPassword4" value="{{ $booking->type_properties }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputAddress" class="form-label">Property Price /month</label>
                                                        <input type="text" class="form-control" id="inputAddress" value="$ {{ number_format($booking->price_usd, 2, ',', '.') }}" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputAddress" class="form-label">Max People</label>
                                                        <input type="text" class="form-control" id="inputAddress" value="{{ $booking->max_people }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputAddress" class="form-label">Property Address</label>
                                                    <input type="text" class="form-control" id="inputAddress" value="{{ $booking->address }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card border-success border">
                                            <div class="card-body">
                                                <h4 class="header-title mb-3">Booking Data</h4>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputEmail4" class="form-label">Start Booking Date</label>
                                                        <input type="text" class="form-control" id="inputEmail4" value="{{ \Carbon\Carbon::parse($booking->start_date)->format('d F, Y') }}" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputPassword4" class="form-label">End Booking Date</label>
                                                        <input type="text" class="form-control" id="inputPassword4" value="{{ \Carbon\Carbon::parse($booking->end_date)->format('d F, Y') }}" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputPassword4" class="form-label">Total Days</label>
                                                        <input type="text" class="form-control" id="inputPassword4" value="{{ $bookingData->remainingDays }} Days" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputPassword4" class="form-label">Status Booking</label>
                                                        <input type="text" class="form-control text-capitalize" id="inputPassword4" value="{{ $booking->status }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- /* Modal --}}
        @endforeach
    @endsection
    @push('script')
        <!-- third party js -->

        <script src="{{ asset('admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('admin') }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="{{ asset('admin') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('admin') }}/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <!-- third party js ends -->

        <!-- Datatables js -->
        <script src="{{ asset('admin') }}/assets/js/pages/datatables.js"></script>

        {{-- SweetAlert Delete --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteButtons = document.querySelectorAll('.deleteButton');

                deleteButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();

                        let propertyName = this.getAttribute('data-nama');
                        let propertyId = this.parentElement.querySelector('.propertyId').value;
                        const rowToDelete = this.closest('tr');


                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Delete Customer " + propertyName + "?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Kirim DELETE request manual lewat JavaScript
                                fetch('/booking/' + propertyId, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Content-Type': 'application/json'
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        Swal.fire({
                                            title: data.judul,
                                            text: data.pesan,
                                            icon: data.swalFlashIcon,
                                        });

                                        if (rowToDelete) {
                                            rowToDelete.remove();
                                        }

                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        Swal.fire('Error', 'Something went wrong!', 'error');
                                    });
                            }
                        });
                    });
                });
            });
        </script>
        {{-- /* SweetAlert Delete --}}
    @endpush
