@extends('admin.layouts.master')

@push('styles')
    <link href="{{ asset('admin') }}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-lg-4 py-3">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Properties Feature List</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb float-end m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Properties</a></li>
                                <li class="breadcrumb-item active">Features</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Property Feature List</h4>
                            <p class="text-muted font-size-13 mb-4">
                                Enter the property name in the form below to add new data.
                            </p>
                            <form action="{{ route('features.store') }}" method="POST">
                                @csrf
                                <div class="row mb-2" bis_skin_checked="1">
                                    <label class="col-md-3 col-form-label" for="simpleinput">Features Name</label>
                                    <div class="col-md-9" bis_skin_checked="1">
                                        <input type="text" id="simpleinput" class="form-control" name="featuresName" placeholder="Input Name Features">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-dark">Save Data</button>
                            </form>

                        </div> <!-- end card -->
                    </div> <!-- end card body-->
                </div><!-- end col-->
            </div>
            <div class="row">

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Property Feature List</h4>
                            <p class="text-muted font-size-13 mb-4">
                                This data will appear in each detailed properties.
                            </p>

                            <table id="basic-datatable" class="dt-responsive nowrap w-100 table">
                                <thead>
                                    <tr>
                                        <th width="20">No</th>
                                        <th width="100">Name</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data_features as $feature)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    {{ $feature->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group mb-2 me-1">

                                                    <button type="button" class="btn btn-xs btn-primary waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i></button>

                                                    <input type="hidden" class="propertyId" value="{{ $feature->id }}">
                                                    <button type="button" class="btn btn-xs btn-danger waves-effect waves-light deleteButton" data-nama="{{ $feature->name }}"><i class="mdi mdi-trash-can"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->

            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('script')
    <!-- third party js -->
    <script src="{{ asset('admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Data Table --}}
    <script>
        $("#basic-datatable").DataTable({
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        });
    </script>
    {{-- /* Data Table --}}

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
                        text: "Delete property " + propertyName + "?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim DELETE request manual lewat JavaScript
                            fetch('/panel/features/' + propertyId, {
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
