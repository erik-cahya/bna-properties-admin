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

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-lg-4 py-3">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Property List</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb float-end m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Property</a></li>
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

                        <table class="table-hover table-centered nowrap table" id="basic-datatable">
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

                                @foreach ($data_properties as $properties)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex gap-2 text-start">
                                                <img src="{{ asset($properties?->featuredImage->image_path ?? 'admin/assets/images/placeholder.webp') }}" alt="" class="avatar-md border-light border-3 rounded border">
                                                <div class="align-self-center d-flex flex-column">
                                                    <span class="fw-medium fs-5">{{ $properties->properties_name }}</span>
                                                    <hr class="m-1">
                                                    <span class="font-size-12 fw-medium fst-italic">{{ $properties->properties_code }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fst-italic fw-bold font-size-16"><i class="mdi mdi-map-marker"></i> {{ $properties->region->name }}</span>
                                                <span class="fst-italic text-muted font-size-12"> {{ $properties->address }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column gap-1">

                                                <span class="font-size-12"><i class="mdi mdi-bed"></i> {{ $properties->number_bedroom }} Bedroom</span>
                                                <span class="font-size-12"><i class="mdi mdi-shower"></i> {{ $properties->number_bathroom }} Bathroom</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fst-italic fw-bold font-size-14 d-flex justify-content-center gap-1">
                                                <iconify-icon icon="solar:dollar-broken" style="font-size: 20px" class="align-self-center"></iconify-icon> USD {{ number_format($properties->price_usd, 2, ',', '.') }}
                                            </span>
                                            <span class="font-size-12"><i class="mdi mdi-human-female-boy"></i> {{ $properties->max_people }} Max People</span>

                                        </td>
                                        <td>
                                            <div class="d-flex flex-column gap-1">
                                                @php
                                                    if ($properties->status_listing == 'Available') {
                                                        $label = 'Available';
                                                        $className = 'bg-success';
                                                    } else if ($properties->status_listing == 'Pending') {
                                                        $label = 'Pending';
                                                        $className = 'bg-warning';
                                                    } else {
                                                        $label = 'Rented';
                                                        $className = 'bg-danger';
                                                    }
                                                @endphp
                                                <span class="badge {{ $className }} ms-auto">{{ $label }}</span>

                                                <span class="badge bg-dark text-light ms-auto"><i class="mdi mdi-home"></i> {{ $properties->type_properties }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group mb-2 me-1">
                                                {{-- detail button --}}
                                                <a href="{{ route('landing.properties.detail', $properties->slug) }}" target="_blank" class="btn btn-xs btn-success waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a>

                                                {{-- edit button --}}
                                                <a href="{{ route('properties.edit', $properties->id) }}"><button type="button" class="btn btn-xs btn-warning waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></button></a>

                                                {{-- delete button --}}
                                                <input type="hidden" class="propertyId" value="{{ $properties->id }}">
                                                <button type="button" class="btn btn-xs btn-danger waves-effect waves-light deleteButton" data-name="{{ $properties->properties_name }}"><i class="mdi mdi-trash-can"></i></button>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- container -->
    </div> <!-- content -->
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

                    let propertyName = this.getAttribute('data-name');
                    let propertyId = this.parentElement.querySelector('.propertyId').value;
                    const rowToDelete = this.closest('tr');


                    console.log("Delete clicked for ID:", propertyId);
                    console.log("Fetching URL:", '{{ url("panel/properties") }}/' + propertyId);


                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Delete property " + propertyName + "?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim DELETE request manual lewat JavaScript
                            fetch('/panel/properties/'+propertyId, {
                                    method: 'DELETE',
                                    credentials: 'same-origin',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json',
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
