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
                        <h4 class="page-title mb-0">Customers</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb float-end m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Panel</a></li>
                                <li class="breadcrumb-item active">Customer</li>
                            </ol>
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
                                    <h4 class="card-title">Customer List</h4>
                                    <p class="card-subtitle">Customer data for booking villas/properties</p>
                                </div>
                                <div class="flex-column">
                                    <a href="{{ route('booking.export') }}" class="btn btn-sm btn-primary">Export Excel</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-bod">
                            <div class="table-responsive m-4">
                                <table class="table-hover table-centered nowrap table" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer Name</th>
                                            <th>Customer Email</th>
                                            <th>Customer Phone Number</th>
                                            <th>Customer Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                {{-- Number --}}
                                                <td>
                                                    <span class="badge bg-primary ms-auto p-2">{{ $loop->iteration }}</span>
                                                </td>

                                                {{-- Customer Name --}}
                                                <td>
                                                    <div class="d-flex align-items-start font-size-20 gap-1">
                                                        <iconify-icon icon="ph:user-bold"></iconify-icon>
                                                        <div class="flex-column">

                                                            <h6 class="font-size-14 font-weight-normal m-0">
                                                                {{ $customer->customer_name }}
                                                            </h6>
                                                        </div>

                                                    </div>
                                                </td>
                                                
                                                {{-- Customer Email --}}
                                                <td>
                                                    <div class="d-flex align-items-start gap-1">
                                                        <div class="flex-column">

                                                            <h6 class="font-size-14 font-weight-normal m-0">
                                                                {{ $customer->customer_email }}
                                                            </h6>

                                                        </div>

                                                    </div>
                                                </td>

                                                {{-- Customer Phone --}}
                                                <td>
                                                    <div class="d-flex align-items-start gap-1">
                                                        <div class="flex-column">

                                                            <h6 class="font-size-14 font-weight-normal m-0">
                                                                {{ $customer->customer_phone }}
                                                            </h6>

                                                        </div>

                                                    </div>
                                                </td>

                                                {{-- Customer Meesage --}}
                                                <td>
                                                    <div class="d-flex align-items-start gap-1">
                                                        <div class="flex-column">

                                                            <h6 class="font-size-14 font-weight-normal m-0">
                                                                {{ $customer->message }}
                                                            </h6>

                                                        </div>

                                                    </div>
                                                </td>

                                                {{-- Action --}}
                                                <td class="center-items">
                                                    <div class="button-list  center-items" id="tooltip-container">
                                                        <div class="btn-group mb-2 me-1">

                                                            <input type="hidden" class="propertyId" value="{{ $customer->id }}">
                                                            <button type="button" class="btn btn-xs btn-danger waves-effect waves-light deleteButton" data-nama="{{ $customer->customer_name }}" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Data"><i class="mdi mdi-trash-can"></i></button>
                                                        </div>
                                                    </div>
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
