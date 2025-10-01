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

    <style>
        /* style disabled booked days as red */
        .flatpickr-day.booked {
            background: #dc3545;
            color: white;
            border-radius: 50%;
            cursor: not-allowed;
        }

        /* make disabled days text red */
        .flatpickr-day.flatpickr-disabled {
            color: red !important;
            opacity: 1 !important; /* keep text visible */
        }

    </style>


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
                    <div class="card border-warning border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">New Inquiry</h6>
                                    <span class="h3 mb-0">
                                        <span id="pendingCount">{{ $bookingData->whereIn('status', ['Pending', 'pending'])->count() }}</span> Pending Inquiry
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <iconify-icon icon="material-symbols-light:pending-actions-sharp" style="font-size: 55px" class="text-muted mt-2"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-4">
                    <div class="card border-danger border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase font-size-12 text-muted mb-3">Payment</h6>
                                    <span class="h3 mb-0">
                                        <span id="unpaidCount">{{ $bookingData->whereIn('dp_status', ['Unpaid', 'unpaid'])->count() }}</span> Unpaid Deposit
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <iconify-icon icon="game-icons:receive-money" style="font-size: 55px" class="text-muted mt-2"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">

                                <div class="flex-column">
                                    <h4 class="card-title">Booking List</h4>
                                    <p class="card-subtitle">Customer data for booking villas/properties</p>
                                </div>
                                <div class="flex-column">
                                    <a href="{{ route('booking.export') }}" class="btn btn-sm btn-primary">Export Excel</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive m-4">
                                <table class="table-hover table-centered nowrap table" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer Name</th>
                                            <th>Properties</th>
                                            {{-- <th>Message</th> --}}
                                            <th>DP Amount</th>
                                            <th>DP Status</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookingData as $booking)
                                            <tr>
                                                {{-- Number --}}
                                                <td>
                                                    <span class="badge bg-primary ms-auto p-2">{{ $loop->iteration }}</span>
                                                </td>

                                                {{-- Client detail --}}
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
                                                
                                                {{-- Client Email --}}
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

                                                {{-- Properties Detail --}}
                                                <td>
                                                    <div class="d-flex align-items-start gap-1">
                                                        <iconify-icon icon="material-symbols-light:house-outline"></iconify-icon>
                                                        <div class="flex-column">
                                                            <h6 class="font-size-14 font-weight-normal m-0">{{ $booking->properties_name }}</h6>

                                                            <span class="text-muted font-size-12">{{ $booking->address }}</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                {{-- Message--}}
                                                {{-- <td>
                                                    <div class="flex-column">
                                                        <h6 class="font-size-14 font-weight-normal m-0">
                                                            {{ $booking->message }}
                                                        </h6>
                                                    </div>
                                                </td> --}}

                                                {{-- DP Amount --}}
                                                <td>
                                                    <span class="dpAmountDisplay d-flex align-items-center gap-1" 
                                                        data-id="{{ $booking->id }}" 
                                                        data-original="{{ $booking->dp_amount }}">
                                                        <iconify-icon icon="solar:dollar-broken" style="font-size: 20px"></iconify-icon> 
                                                        <span class="amountValue">USD {{ number_format($booking->dp_amount, 0, ',', '.') }}</span>
                                                        <iconify-icon icon="mdi:pencil" class="text-primary editDpIcon" style="cursor:pointer; font-size:16px"></iconify-icon>
                                                    </span>


                                                    <input type="number" 
                                                        class="form-control changeDpAmount d-none"
                                                        data-id="{{ $booking->id }}"
                                                        data-original="{{ $booking->dp_amount }}"
                                                        value="{{ number_format($booking->dp_amount, 0, '', '') }}"
                                                        min="0" step="1">
                                                </td>

                                                {{-- DP Status --}}
                                                <td>
                                                    <div class="d-flex align-items-start gap-1">
                                                        <select name="status" class="form-select changeDpStatus" data-id="{{ $booking->id }}"  data-original="{{ $booking->dp_status }}">
                                                            <option class="changeDpStatus" value="Paid" {{ $booking->dp_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                                            <option class="changeDpStatus" value="Unpaid" {{ $booking->dp_status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                                            <option class="changeDpStatus" value="No Deposit" {{ $booking->dp_status == 'No Deposit' ? 'selected' : '' }}>No Deposit</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                {{-- End Date --}}
                                                <td>
                                                    <input type="date" 
                                                        class="form-control changeStartDate"
                                                        data-id="{{ $booking->id }}"
                                                        data-original="{{ \Carbon\Carbon::parse($booking->start_date)->format('Y-m-d') }}"
                                                        value="{{ \Carbon\Carbon::parse($booking->start_date)->format('Y-m-d') }}">
                                                </td>

                                                {{-- Start Date --}}
                                                <td>
                                                    <input type="date" 
                                                        class="form-control changeEndDate"
                                                        data-id="{{ $booking->id }}"
                                                        data-original="{{ \Carbon\Carbon::parse($booking->end_date)->format('Y-m-d') }}"
                                                        value="{{ \Carbon\Carbon::parse($booking->end_date)->format('Y-m-d') }}">
                                                </td>

                                                {{-- Status --}}
                                                <td>
                                                    <select name="status" class="form-select changeStatus" data-id="{{ $booking->id }}"  data-original="{{ $booking->status }}">
                                                        <option class="changeStatus" value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="On Going" {{ $booking->status == 'On Going' ? 'selected' : '' }}>On Going</option>
                                                        <option class="changeStatus" value="Confirmed" {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                        <option class="changeStatus" value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                        <option class="changeStatus" value="Completed" {{ $booking->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                    </select>
                                                </td>

                                                {{-- Action --}}
                                                <td>
                                                    <div class="button-list center-items" id="tooltip-container">
                                                        <div class="btn-group mb-2 me-2">
                                                            
                                                            {{-- <button type="button" class="btn btn-xs btn-success waves-effect waves-light" data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdrop-{{ $booking->id }}" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Details"><i class="mdi mdi-eye"></i></button> --}}

                                                            {{-- <button type="button" class="btn btn-xs btn-warning waves-effect waves-light" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="mdi mdi-lead-pencil"></i></button> --}}

                                                            {{-- <input type="hidden" class="bookingID" value="{{ $booking->id }}">

                                                            <button type="button" class="btn btn-xs btn-warning waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true"><iconify-icon icon="subway:menu" class="fs-14"></iconify-icon></button>

                                                            <div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);" data-popper-placement="bottom-start">
                                                                <button class="dropdown-item d-flex align-items-center changeStatus gap-2" data-status="confirm"><iconify-icon icon="simple-line-icons:check"></iconify-icon> Confirm</button>
                                                                <button class="dropdown-item d-flex align-items-center changeStatus gap-2" data-status="pending"><iconify-icon icon="bitcoin-icons:clock-outline"></iconify-icon> Pending</button>
                                                                <button class="dropdown-item d-flex align-items-center changeStatus gap-2" data-status="decline"><iconify-icon icon="maki:cross"></iconify-icon> Decline</button>
                                                            </div> --}}
                                                            <div>
                                                                <input type="hidden" class="propertyId" value="{{ $booking->id }}">
                                                                <button type="button" class="btn btn-xs btn-danger waves-effect waves-light deleteButton no-border-radius" data-nama="{{ $booking->customer_name }}" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Data"><i class="mdi mdi-trash-can"></i></button>
                                                            </div>
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
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Book Property</h4>
                                <p class="text-muted font-size-13 mb-4">
                                    Fill out the form below to send a booking request.
                                </p>

                                <form action="{{ route('booking.store') }}" method="POST">
                                    @csrf
                                    <!-- Select Villa -->

                                    <div class="row mb-2">
                                        <label class="col-md-3 col-form-label" for="propertySlug">Villa</label>
                                        <div class="col-md-9">
                                            <select id="propertySlug" class="form-control" name="propertySlug" required>
                                                <option value="">-- Choose a villa --</option>
                                                @foreach($properties as $property)
                                                    <option value="{{ $property->slug }}" data-id="{{ $property->id }}">
                                                        {{ $property->properties_code }} - {{ $property->properties_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('propertySlug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <!-- Name -->
                                    <div class="row mb-2">
                                        <label class="col-md-3 col-form-label" for="name">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Full name" required>
                                        </div>
                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <!-- Email -->
                                    <div class="row mb-2">
                                        <label class="col-md-3 col-form-label" for="email">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email address" required>
                                        </div>
                                    </div>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <!-- Phone Number -->
                                    <div class="row mb-2">
                                        <label class="col-md-3 col-form-label" for="phone">Phone</label>
                                        <div class="col-md-9">
                                            <input type="tel" id="phone" class="form-control" name="phone" placeholder="Phone number*" required>
                                            <input type="hidden" id="full_phone" name="full_phone">
                                        </div>
                                    </div>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <!-- Message -->
                                    <div class="row mb-2">
                                        <label class="col-md-3 col-form-label" for="message">Message</label>
                                        <div class="col-md-9">
                                            <textarea id="message" class="form-control" name="message" rows="3" placeholder="Write message..."></textarea>
                                        </div>
                                    </div>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <!-- Start Date -->
                                    <div class="row mb-2">
                                        <label class="col-md-3 col-form-label" for="start_date">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" id="start_date" class="form-control" name="start_date" required>
                                        </div>
                                    </div>

                                    <!-- End Date -->
                                    <div class="row mb-2">
                                        <label class="col-md-3 col-form-label" for="end_date">End Date</label>
                                        <div class="col-md-9">
                                            <input type="text" id="end_date" class="form-control" name="end_date" required>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-sm btn-dark">Save Data</button>
                                </form>

                            </div> 
                        </div>
                    </div>
                </div>


                </div>
            </div>

        </div>


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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        
        {{-- date --}}
<script>
    const villaRanges = @json($villaRanges);

    const startPicker = flatpickr("#start_date", {
        minDate: "today",
        dateFormat: "Y-m-d"
    });

    const endPicker = flatpickr("#end_date", {
        minDate: "today",
        dateFormat: "Y-m-d"
    });

    function applyDisabledRanges(villaId) {
        if (!villaId || !villaRanges[villaId]) {
            startPicker.set("disable", []);
            endPicker.set("disable", []);
            return;
        }

        const disabledRanges = villaRanges[villaId];

        startPicker.set("disable", disabledRanges);
        endPicker.set("disable", disabledRanges);

        // mark booked days in red
        [startPicker, endPicker].forEach(picker => {
            picker.set("onDayCreate", [
                function(dObj, dStr, fp, dayElem) {
                    const dateStr = dayElem.dateObj.toISOString().slice(0, 10);
                    disabledRanges.forEach(range => {
                        if (dateStr >= range.from && dateStr <= range.to) {
                            dayElem.classList.add("booked");
                        }
                    });
                }
            ]);
        });
    }

    function initDatepickers(villaId, ranges) {
        const disabled = ranges
            .filter(r => r.id == villaId)
            .map(r => ({ from: r.from, to: r.to }));

        const commonOptions = {
            dateFormat: "Y-m-d",
            disable: disabled,
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                if (dayElem.classList.contains("flatpickr-disabled")) {
                    dayElem.classList.add("booked"); // keep red style
                }
            },
            onChange: function(selectedDates, dateStr, instance) {
                // if user somehow picked a disabled date (or clicked on it)
                if (instance.isEnabled(dateStr) === false) {
                    // find the next enabled date
                    const nextDate = instance.config.disable
                        ? findNextAvailable(instance, new Date(dateStr))
                        : null;

                    if (nextDate) {
                        instance.setDate(nextDate, true); // auto-move to available
                    }
                }
            }
        };

        flatpickr("#start_date", commonOptions);
        flatpickr("#end_date", commonOptions);
    }

    // helper to find next available date
    function findNextAvailable(instance, date) {
        let next = new Date(date);
        for (let i = 0; i < 365; i++) { // max 1 year scan
            next.setDate(next.getDate() + 1);
            if (instance.isEnabled(next)) {
                return next;
            }
        }
        return null;
    }

    document.getElementById("propertySlug").addEventListener("change", function() {
        const villaId = this.options[this.selectedIndex].dataset.id;
        applyDisabledRanges(villaId);
    });

</script>



        {{-- phone --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const phoneInput = document.querySelector("#phone");
                const fullPhoneInput = document.querySelector("#full_phone");

                const iti = window.intlTelInput(phoneInput, {
                    initialCountry: "id",  // default to Indonesia
                    preferredCountries: ["id", "sg", "au", "us"], // customize if needed
                    separateDialCode: true,
                });
                
                // update hidden input on submit
                const form = phoneInput.closest("form");
                
                if (form) {
                    form.addEventListener("submit", function () {
                        fullPhoneInput.value = iti.getNumber(); // full international format
                    });
                }
            });
        </script>

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
                            text: "Delete " + propertyName + "?",
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
                                        console.log();
                                        Swal.fire({
                                            title: data.judul,
                                            text: data.pesan,
                                            icon: data.swalFlashIcon,
                                        });

                                        if (rowToDelete) {
                                            rowToDelete.remove();
                                        }
                                        // update the top bar data
                                        updateBookingCounts();
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

        {{-- SweetAlert Change Status --}}
        <script>
            document.querySelectorAll('.changeStatus').forEach(select  => {
                select .addEventListener('change', function(e) {
                    e.preventDefault(); // ⛔ stop any default page reload
                    e.stopPropagation(); // ⛔ stop event bubbling

                    let dataStatus = this.value;
                    let bookingId = this.getAttribute('data-id');

                    // console.log(dataStatus);
                    const rowToDelete = this.closest('tr');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Change status booking to " + dataStatus + "?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, change it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('/booking/change-status', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        booking_id: bookingId,
                                        status: dataStatus
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log(data.property)
                                    Swal.fire({
                                        title: data.judul,
                                        text: data.pesan,
                                        icon: data.swalFlashIcon,
                                        timer: 2000,
                                    });

                                    // update the top bar data
                                    updateBookingCounts();

                                    // update the data-original so cancel works next time
                                    select.setAttribute('data-original', dataStatus); 
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire('Error', 'Something went wrong!', 'error');
                                });
                        }else{
                            e.target.value = e.target.getAttribute('data-original');
                        }
                    });
                });
            });
        </script>
        {{-- /* SweetAlert Change Status --}}

        {{-- SweetAlert Change DP Status --}}
        <script>
            document.querySelectorAll('.changeDpStatus').forEach(select => {
                select.addEventListener('change', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    let newStatus = this.value;
                    let bookingId = this.getAttribute('data-id');
                    let oldStatus = this.getAttribute('data-original');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Change booking status to " + newStatus + "?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, change it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('/booking/update-dp-status', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    booking_id: bookingId,
                                    status: newStatus
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                Swal.fire({
                                    title: data.judul ?? 'Updated!',
                                    text: data.pesan ?? 'Status updated successfully.',
                                    icon: data.swalFlashIcon ?? 'success',
                                    timer: 2000,
                                });

                                // update the top bar data
                                updateBookingCounts();

                                // save new status as original
                                select.setAttribute('data-original', newStatus);
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire('Error', 'Something went wrong!', 'error');
                                select.value = oldStatus; // revert on error
                            });
                        } else {
                            select.value = oldStatus; // revert on cancel
                        }
                    });
                });
            });
        </script>
        {{-- SweetAlert Change DP Status --}}
        
        {{-- SweetAlert Change DP Amount --}}
        <script>
            // Show input when clicking the pencil or the number itself
            document.querySelectorAll('.dpAmountDisplay').forEach(span => {
                let pencil = span.querySelector('.editDpIcon');
                let input = span.nextElementSibling;

                function activateInput() {
                    span.classList.add('d-none');
                    input.classList.remove('d-none');
                    input.focus();
                }

                span.addEventListener('click', (e) => {
                    if (!e.target.classList.contains('editDpIcon')) return; // only pencil triggers
                    activateInput();
                });
            });


            document.querySelectorAll('.changeDpAmount').forEach(input => {
                input.addEventListener('change', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    let newAmount = this.value;
                    let bookingId = this.getAttribute('data-id');
                    let oldAmount = this.getAttribute('data-original');
                    let span = this.previousElementSibling;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Change deposit amount to USD " + parseInt(newAmount).toLocaleString() + "?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, change it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('/booking/update-dp-amount', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    booking_id: bookingId,
                                    dp_amount: newAmount
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                Swal.fire({
                                    title: data.judul ?? 'Updated!',
                                    text: data.pesan ?? 'Deposit amount updated successfully.',
                                    icon: data.swalFlashIcon ?? 'success',
                                    timer: 2000,
                                });

                                // update display with formatted value
                                let display = input.previousElementSibling;
                                let formatted = newAmount.toLocaleString();

                                // update only the text, keep pencil
                                display.querySelector('.amountValue').textContent = `USD ${formatted}`;

                                input.classList.add('d-none');
                                display.classList.remove('d-none');
                                this.setAttribute('data-original', newAmount);
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire('Error', 'Something went wrong!', 'error');
                                this.value = oldAmount; // revert if failed
                                span.classList.remove('d-none');
                                this.classList.add('d-none');
                            });
                        } else {
                            this.value = oldAmount; // revert if canceled
                            span.classList.remove('d-none');
                            this.classList.add('d-none');
                        }
                    });
                });
            });
        </script>
        {{-- SweetAlert Change DP Amount --}}

        {{-- /* SweetAlert Change Date --}}
        <script>
            function handleDateChange(selector, fieldName, url) {
                document.querySelectorAll(selector).forEach(input => {
                    input.addEventListener('change', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        let newDate = this.value;
                        let bookingId = this.getAttribute('data-id');
                        let oldDate = this.getAttribute('data-original');

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Change booking " + fieldName + " to " + newDate + "?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, change it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch(url, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        booking_id: bookingId,
                                        [fieldName]: newDate
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire({
                                        title: data.judul ?? 'Updated!',
                                        text: data.pesan ?? fieldName + ' updated successfully.',
                                        icon: data.swalFlashIcon ?? 'success',
                                        timer: 2000,
                                    });

                                    // update stored original
                                    input.setAttribute('data-original', newDate);
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire('Error', 'Something went wrong!', 'error');
                                    input.value = oldDate; // revert if failed
                                });
                            } else {
                                input.value = oldDate; // revert if canceled
                            }
                        });
                    });

                    // Always open date picker on field click
                    input.addEventListener('click', function() {
                        if (this.showPicker) this.showPicker();
                    });
                });
            }

            // Apply for start_date and end_date
            handleDateChange('.changeStartDate', 'start_date', '/booking/update-start-date');
            handleDateChange('.changeEndDate', 'end_date', '/booking/update-end-date');
        </script>
        {{-- SweetAlert Change Date --}}

        {{-- to ajax fetch top data --}}
        <script>
            function updateBookingCounts() {
                fetch('/booking-counts')
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('pendingCount').textContent = data.pending;
                        document.getElementById('unpaidCount').textContent = data.unpaid;
                    });
            }
        </script>




    @endpush
