@extends('layouts.admin')
@section('title','Employee designation')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Employee</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Designation</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Designation</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form
                                action="{{ isset($designation) ? route('designation.update', $designation->id) : route('designation.store') }}"
                                method="POST">
                                @csrf
                                @if(isset($designation))
                                @method('PUT')
                                @endif
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Designation Name</label>
                                        <input type="text" class="form-control" placeholder="Designation Name"
                                            name="designation_name" id="designationName"
                                            value="{{ isset($designation) ? $designation->designation_name : old('designation_name') }}" required>
                                            @error('designation_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Designation Short Name</label>
                                        <input type="text" class="form-control" placeholder="Designation Short Name"
                                            name="designation_short_name"
                                            value="{{ isset($designation) ? $designation->designation_short_name : old('designation_short_name') }}">
                                            @error('designation_short_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Designation Code</label>
                                        <input type="text" class="form-control" placeholder="Designation Code"
                                            name="designation_code" id="{{isset($designation) ? '':'designationCode'}}"
                                            value="{{ isset($designation) ? $designation->designation_code : old('designation_code') }}" required>
                                            @error('designation_code')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="1"
                                                {{ isset($designation) && $designation->status == 1 ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="0"
                                                {{ isset($designation) && $designation->status == 0 ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">
                                                {{ isset($designation) ? 'Update Designation' : 'Add Designation' }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th><input class="form-check-input" type="checkbox"></th>
                                            <th>Sl</th>
                                            <th>Designation</th>
                                            <th>Short Name</th>
                                            <th>Designation Code</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($designations as $key => $designation)
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox"></td>
                                            <td>{{$key+1}}</td>
                                            <td>{{$designation->designation_name}}</td>
                                            <td>{{$designation->designation_short_name}}</td>
                                            <td>{{$designation->designation_code}}</td>
                                            <td>
                                                @if ($designation->status == 1)
                                                <a href="#" class="badge bg-success">Active</a>
                                                @else
                                                <a href="#" class="badge bg-danger">Inactive</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 fs-6">
                                                    {{-- <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title=""
                                                        data-bs-original-title="View detail" aria-label="Views"><i
                                                            class="bi bi-eye-fill"></i></a> --}}
                                                    <a href="{{ route('designation.edit',$designation->id) }}" class="text-warning" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title=""
                                                        data-bs-original-title="Edit info" aria-label="Edit"><i
                                                            class="bi bi-pencil-fill"></i></a>
                                                    <form action="{{ route('designation.destroy',$designation->id) }}"
                                                        method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="text-danger border-0 bg-transparent p-0 delete-button"
                                                            data-bs-toggle="tooltip" title="Delete">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <nav class="float-end mt-0" aria-label="Page navigation">
                                {{ $designations->links('vendor.pagination.default') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>

</main>
<!--end page main-->
<script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

</script>
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $('#designationName').on('keyup', function () {
            // Get the building name value
            let designationName = $(this).val().trim();

            // Generate the building code only if the building name has at least 4 characters
            if (designationName.length >= 4) {
                // Extract the first 4 characters of the building name
                let namePart = designationName.substring(0, 4).toUpperCase();

                // Generate a random 4-digit number
                let randomNumber = Math.floor(1000 + Math.random() * 9000);

                // Get the current year and extract the last digit
                let yearLastDigit = new Date().getFullYear().toString().slice(-2);

                // Combine to form the building code
                let designationCode = 'DGN' + '-' + yearLastDigit + randomNumber;

                // Set the generated code in the designation code input
                $('#designationCode').val(designationCode);
            } else {
                // Clear the designation code if the name is less than 4 characters
                $('#designationCode').val('');
            }
        });
    })

</script>
@endpush
