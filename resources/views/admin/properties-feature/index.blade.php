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
                            <h4 class="header-title">Add new feature</h4>
                            <p class="text-muted font-size-13 mb-4">
                                Enter the feature name in the form below to add new data.
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

                        </div> 
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="flex-column">
                                    <h4 class="card-title">Property Feature List</h4>
                                    <p class="text-muted font-size-13">
                                        Click on the feature name to edit.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive m-4">
                                <table  class="table-hover table-centered nowrap table" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($features as $feature)
                                            <tr>
                                                <td><span class="badge bg-primary ms-auto p-2">{{ $loop->iteration }}</span></td>
                                                <td>
                                                    <div class="d-flex align-items-start font-size-20 gap-1">
                                                        <span class="iconify" data-icon="mdi:map-marker-radius" data-inline="false"></span>
                                                        <div class="flex-column">
                                                            <h6 class="font-size-14 font-weight-normal m-0 editable-feature" data-id="{{ $feature->id }}">
                                                                {{ $feature->name }}
                                                            </h6>
                                                        </div>

                                                    </div>
                                                </td>
                                                {{-- Action --}}
                                                <td>
                                                    <div class="button-list center-items" id="tooltip-container">
                                                        <div class="btn-group mb-2 me-2">
                                                            <div>
                                                                <input type="hidden" class="propertyId" value="{{ $feature->id }}">
                                                                <button type="button" class="btn btn-xs btn-danger waves-effect waves-light deleteButton no-border-radius" data-nama="{{ $feature->name }}" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Data"><i class="mdi mdi-trash-can"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
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
                        text: "Delete this feature ?",
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

    {{-- Handling edit on table --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // function to bind click-to-edit
            function bindEditableEvents() {
                document.querySelectorAll(".editable-feature").forEach(el => {
                    el.addEventListener("click", function () {
                        const featureId = this.dataset.id;
                        const currentText = this.innerText;

                        // Create input with feature id
                        const input = document.createElement("input");
                        input.type = "text";
                        input.value = currentText;
                        input.className = "form-control form-control-sm";
                        input.setAttribute("data-id", featureId);

                        this.replaceWith(input);
                        input.focus();

                        input.addEventListener("keydown", function (e) {
                            if (e.key === "Enter") {
                                e.preventDefault(); // avoid form submission or line breaks
                                input.blur(); // trigger blur → your existing update logic
                            }
                            if (e.key === "Escape") {
                                e.preventDefault();
                                restore(currentText); // cancel edit, restore old value
                            }
                        });

                        input.addEventListener("blur", function () {
                            const newValue = input.value.trim();
                            const changedFeatureId = input.getAttribute("data-id");

                            // If nothing changed, just restore
                            if (newValue === currentText) {
                                restore(currentText);
                                return;
                            }

                            // Swal confirmation
                            Swal.fire({
                                title: 'Are you sure?',
                                text: `Change "${currentText}" to "${newValue}" (ID: ${changedFeatureId})?`,
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, update it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Send update request
                                    fetch(`/panel/features/${changedFeatureId}`, {
                                        method: "PUT",
                                        headers: {
                                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                            "Content-Type": "application/json"
                                        },
                                        body: JSON.stringify({ 
                                            id: changedFeatureId, 
                                            name: newValue 
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.swalFlashIcon === 'error') {
                                            // restore old value on validation or business error
                                            restore(currentText);
                                        } else {
                                            // update success
                                            restore(newValue);
                                        }

                                        Swal.fire({
                                            title: data.judul,
                                            text: data.pesan,
                                            icon: data.swalFlashIcon,
                                        });
                                    })
                                    .catch(() => {
                                        restore(currentText);

                                        Swal.fire({
                                            title: 'Error',
                                            text: 'Something went wrong while updating!',
                                            icon: 'error',
                                        });
                                    });
                                } else {
                                    // If cancelled, restore old value
                                    restore(currentText);
                                }
                            });
                        });

                        function restore(text) {
                            const h6 = document.createElement("h6");
                            h6.className = "font-size-14 font-weight-normal m-0 editable-feature";
                            h6.dataset.id = featureId;
                            h6.innerText = text;
                            input.replaceWith(h6);

                            // ✅ rebind the new element
                            bindEditableEvents();
                        }
                    });
                });
            }

            // initial binding
            bindEditableEvents();
        });
    </script>
@endpush
