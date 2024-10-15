@extends('layouts.admin')
@section('title','Floor')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Asset</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Floor</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Floor</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form class="row g-3"
                                  action="{{ isset($floor) ? route('floors.update', $floor->id) : route('floors.store') }}"
                                  method="POST">
                                @csrf
                                @if(isset($floor))
                                    @method('PUT')
                                @endif
                                <div class="col-12">
                                    <label class="form-label">Building</label>
                                    <select class="form-select" name="building_id">
                                        <option>Select a Building</option>
                                        @foreach ($buildings as $building)
                                            <option value="{{ $building->id }}" {{ isset($floor) && $floor->building_id == $building->id ? 'selected' : '' }}>
                                                {{ $building->building_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Floor Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                           placeholder="Floor Name"
                                           name="floor_name"
                                           value="{{ isset($floor) ? $floor->floor_name : old('floor_name') }}" required>
                                           @error('floor_name')
                                           <span class="text-danger">{{$message}}</span>
                                           @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Floor Size</label>
                                    <input type="text" class="form-control"
                                           placeholder="Floor Size"
                                           name="floor_size"
                                           value="{{ isset($floor) ? $floor->floor_size : old('floor_size') }}">
                                           @error('floor_size')
                                           <span class="text-danger">{{$message}}</span>
                                           @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Total Unit</label>
                                    <input type="number" class="form-control"
                                           placeholder="Total Unit"
                                           name="total_unit"
                                           value="{{ isset($floor) ? $floor->total_unit : old('total_unit') }}">
                                           @error('total_unit')
                                           <span class="text-danger">{{$message}}</span>
                                           @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="1" {{ isset($floor) && $floor->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ isset($floor) && $floor->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">
                                            {{ isset($floor) ? 'Update Floor' : 'Add Floor' }}
                                        </button>
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
                                            <th>#</th>
                                            <th>Building Name</th>
                                            <th>Floor Name</th>
                                            <th>Floor Size</th>
                                            <th>Total Unit</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($floors as $key => $floor)
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox"></td>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $floor->building ? $floor->building->building_name: "N/A" }}</td>
                                            <td>{{ $floor->floor_name }}</td>
                                            <td>{{ $floor->floor_size }}</td>
                                            <td>{{ $floor->total_unit }}</td>
                                            <td>
                                                @if ($floor->status == 1)
                                                <a href="#" class="badge bg-success">Active </a>
                                                @else
                                                <a href="#" class="badge bg-danger">Inactive </a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 fs-6">
                                                    <a href="{{ route('floors.edit', $floor->id) }}"
                                                       class="text-warning" data-bs-toggle="tooltip"
                                                       data-bs-placement="bottom" title="Edit info" aria-label="Edit">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </a>
                                                    <form action="{{ route('floors.destroy', $floor->id) }}"
                                                          method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="text-danger border-0 bg-transparent p-0 delete-button"
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
                                {{ $floors->links('vendor.pagination.default') }}
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

<!-- SweetAlert Script -->
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
