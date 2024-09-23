@extends('layouts.admin')
@section('title','Area')
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
                    <li class="breadcrumb-item active" aria-current="page">Area/Location</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Area/Location</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form class="row g-3" action="{{ isset($location) ? route('locations.update', $location->id) : route('locations.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($location))
                                    @method('PUT')
                                @endif
                                <div class="col-12">
                                    <label class="form-label">Area/Location Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ $location->name ?? '' }}" required>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" name="zip_code" value="{{ $location->zip_code ?? '' }}">
                                    @error('zip_code')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Google Map Link <span class="text-warning">(only 100 * 100 size map iframe link )</span></label>
                                    <input type="text" class="form-control" name="google_map_link" value="{{ $location->google_map_link ?? '' }}">
                                    @error('google_map_link')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Picture</label>
                                    <input type="file" class="form-control" name="picture" id="picture-input">
                                    @error('picture ')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    @if(isset($location) && $location->picture)
                                        <img id="picture-preview" src="{{ asset('storage/locations/' . $location->picture) }}" alt="Preview Image" style="margin-top: 10px;" width="100px">
                                    @else
                                        <img id="picture-preview" src="#" alt="Preview Image" style="display:none; margin-top: 10px;" width="100px">
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status" required>
                                        <option value="1" {{ isset($location) && $location->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ isset($location) && $location->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">{{ isset($location) ? 'Update Location' : 'Add Location' }}</button>
                                    </div>
                                </div>
                            </form>

                            <script>
                                document.getElementById('picture-input').onchange = function () {
                                    const [file] = this.files;
                                    if (file) {
                                        const preview = document.getElementById('picture-preview');
                                        preview.src = URL.createObjectURL(file);
                                        preview.style.display = 'block';
                                    }
                                }
                            </script>

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
                                            <th>Area/Location Name</th>
                                            <th>Location ID</th>
                                            <th>Zip Code</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Map</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($locations as $location)
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox"></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $location->name }}</td>
                                            <td>{{ $location->location_code }}</td>
                                            <td>{{ $location->zip_code }}</td>
                                            <td>
                                                @if ($location->status == 1)
                                                <a href="#" class="badge bg-success">Active</a>
                                                @else
                                                <a href="#" class="badge bg-danger">Inactive</a>
                                                @endif
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/locations/' . $location->picture) }}" alt="Preview Image" style="margin-top: 10px;" width="100px">
                                            </td>
                                            <td>
                                                @if ($location->google_map_link)
                                                <span class="badge bg-primary">Map Added</span>
                                                @else
                                                <span class="badge bg-warning">No Map </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 fs-6">
                                                    <a href="{{ route('locations.edit', $location->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" class="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="javascript:;" class="text-danger delete-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <nav class="float-end mt-0" aria-label="Page navigation">
                                {{ $locations->links('vendor.pagination.default') }}
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

 <!-- SweetAlert for Delete Confirmation -->
 <script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
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
