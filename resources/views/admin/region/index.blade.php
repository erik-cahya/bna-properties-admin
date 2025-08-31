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
                        <h4 class="page-title mb-0">Areas</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb float-end m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Panel</a></li>
                                <li class="breadcrumb-item active">Area</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Add new area</h4>
                            <p class="text-muted font-size-13 mb-4">
                                Enter the area name in the form below to add new area.
                            </p>
                            <form action="{{ route('region.store') }}" method="POST">
                                @csrf
                                <div class="row mb-2" bis_skin_checked="1">
                                    <label class="col-md-3 col-form-label" for="simpleinput">Area Name</label>
                                    <div class="col-md-9" bis_skin_checked="1">
                                        <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Area name">
                                    </div>
                                </div>

                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

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
                                    <h4 class="card-title">Area List</h4>
                                    <p class="text-muted font-size-13">
                                        Click on the area name to edit.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive m-4">
                                <table class="table-hover table-centered nowrap table" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Area Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($regions as $region)
                                            <tr>
                                                {{-- Number --}}
                                                <td>
                                                    <span class="badge bg-primary ms-auto p-2">{{ $loop->iteration }}</span>
                                                </td>

                                                {{-- Region Name --}}
                                                <td>
                                                    <div class="d-flex align-items-start font-size-20 gap-1">
                                                        <span class="iconify" data-icon="mdi:map-marker-radius" data-inline="false"></span>
                                                        <div class="flex-column">
                                                            <h6 class="font-size-14 font-weight-normal m-0 editable-region" data-id="{{ $region->id }}">
                                                                {{ $region->name }}
                                                            </h6>
                                                        </div>

                                                    </div>
                                                </td>

                                                {{-- Action --}}
                                                <td>
                                                    <div class="button-list center-items" id="tooltip-container">
                                                        <div class="btn-group mb-2 me-2">
                                                            <div>
                                                                <input type="hidden" class="propertyId" value="{{ $region->id }}">
                                                                <button type="button" class="btn btn-xs btn-danger waves-effect waves-light deleteButton no-border-radius" data-nama="{{ $region->name }}" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete Data"><i class="mdi mdi-trash-can"></i></button>
                                                            </div>
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
                            text: "Delete Area " + propertyName + "?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Kirim DELETE request manual lewat JavaScript
                                fetch('/region/' + propertyId, {
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

                                        // ✅ Only remove row if status is success
                                        if (data.swalFlashIcon === 'success') {
                                            if (rowToDelete) {
                                                rowToDelete.remove();
                                            }
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
                    document.querySelectorAll(".editable-region").forEach(el => {
                        el.addEventListener("click", function () {
                            const regionId = this.dataset.id;
                            const currentText = this.innerText;

                            // Create input with region id
                            const input = document.createElement("input");
                            input.type = "text";
                            input.value = currentText;
                            input.className = "form-control form-control-sm";
                            input.setAttribute("data-id", regionId);

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
                                const changedRegionId = input.getAttribute("data-id");

                                // If nothing changed, just restore
                                if (newValue === currentText) {
                                    restore(currentText);
                                    return;
                                }

                                // Swal confirmation
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: `Change "${currentText}" to "${newValue}" (ID: ${changedRegionId})?`,
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, update it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Send update request
                                        fetch(`/region/${changedRegionId}`, {
                                            method: "PUT",
                                            headers: {
                                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                                "Content-Type": "application/json"
                                            },
                                            body: JSON.stringify({ 
                                                id: changedRegionId, 
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
                                h6.className = "font-size-14 font-weight-normal m-0 editable-region";
                                h6.dataset.id = regionId;
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
