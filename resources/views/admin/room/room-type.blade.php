@extends('layouts.admin')
@section('title', 'Room Type')
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
                <li class="breadcrumb-item active" aria-current="page">Room Type</li>
              </ol>
            </nav>
          </div>
        </div>
        <!--end breadcrumb-->

          <div class="card">
            <div class="card-header py-3">
              <h6 class="mb-0">Add Room Type</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <!-- Use the same form for both Add and Edit -->
                                <form class="row g-3" action="{{ isset($editData) ? route('roomtype.update', $editData->id) : route('roomtype.store') }}" method="POST">
                                    @csrf
                                    @if(isset($editData))
                                        @method('PUT') <!-- For updating the existing room type -->
                                    @else
                                        @method('POST') <!-- For creating a new room type -->
                                    @endif
                                    <div class="col-12">
                                        <label class="form-label">Room Type <span class="text-warning">(Master bed, Regular Bed, Toilet, Kitchen)</span></label>
                                        <input type="text" class="form-control" placeholder="Type of the room" name="roomType" value="{{ isset($editData) ? $editData->roomType : old('roomType') }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="1" {{ isset($editData) && $editData->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ isset($editData) && $editData->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">{{ isset($editData) ? 'Update' : 'Save' }}</button>
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
                                                <th>#</th>
                                                <th>Room Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $key => $data)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $data->roomType }}</td>
                                                    <td>
                                                        @if ($data->status == 1)
                                                            <a href="#" class="badge bg-success">Active</a>
                                                        @else
                                                            <a href="#" class="badge bg-danger">Inactive</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3 fs-6">
                                                            <a href="{{ route('roomtype.edit', $data->id) }}" class="text-warning" data-bs-toggle="tooltip" title="Edit">
                                                                <i class="bi bi-pencil-fill"></i>
                                                            </a>
                                                            <!-- Delete Form -->
                                                            <form action="{{ route('roomtype.destroy', $data->id) }}" method="POST" class="delete-form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="text-danger border-0 bg-transparent p-0 delete-button" data-bs-toggle="tooltip" title="Delete">
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
                                    {{ $items->links('vendor.pagination.default') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>

      </main>
   <!--end page main-->
   <script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const form = this.closest('form'); // Get the closest form to the button

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
                    form.submit(); // Submit the form if confirmed
                }
            });
        });
    });
</script>

@endsection
