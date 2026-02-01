@extends('layouts.admin')
@section('title', 'Manage Complex')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">
            <i class="bi bi-buildings me-2"></i>Complex
        </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Complex</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{route('building.create')}}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>Add New Complex
            </a>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card hover-lift">
        <div class="card-body">
            <div class="d-flex align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <h5 class="mb-1 fw-semibold">Building Management</h5>
                    <small class="text-muted">View and manage all building complexes</small>
                </div>
                <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search text-muted"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="Search buildings..." style="min-width: 250px;">
                </form>
            </div>
            <div class="">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Complex Code</th>
                            <th>Complex Name</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Manager</th>
                            <th>Guard Info</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($buildings as $key => $building)
                        <tr>
                            <td><span class="badge bg-light text-dark">{{$key + 1}}</span></td>
                            <td><span class="fw-medium text-primary">{{$building->building_code}}</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded bg-gradient-primary bg-opacity-10 text-white d-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px;">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <span class="fw-medium">{{$building->building_name}}</span>
                                </div>
                            </td>
                            <td><span class="badge bg-info bg-opacity-10 text-info">{{ucfirst($building->building_type)}}</span></td>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt text-muted me-1"></i>
                                    {{$building->location? $building->location->name : 'N/A'}}
                                </span>
                            </td>
                            <td>
                                <div>
                                    <span class="fw-medium">{{$building->employee ? $building->employee->name : 'N/A'}}</span>
                                    @if($building->employee && $building->employee->phone)
                                    <br><small class="text-muted"><i class="bi bi-telephone me-1"></i>{{$building->employee->phone}}</small>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if($building->security_guard_name)
                                <div>
                                    <span class="fw-medium">{{$building->security_guard_name}}</span>
                                    @if($building->guard_contact_number)
                                    <br><small class="text-muted"><i class="bi bi-telephone me-1"></i>{{$building->guard_contact_number}}</small>
                                    @endif
                                </div>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if ($building->status == 1)
                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Active</span>
                                @else
                                    <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-2">
                                    <a href="{{route('building.show',$building->id)}}" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="View Details"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{route('building.edit',$building->id)}}" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="{{ route('building.destroy', $building->id) }}"
                                        method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-danger border-0 bg-transparent p-0 delete-btn"
                                                data-bs-toggle="tooltip" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="bi bi-building text-muted" style="font-size: 3rem;"></i>
                                    <h6 class="mt-3 text-muted">No Buildings Found</h6>
                                    <p class="text-muted mb-3">Get started by adding your first building complex</p>
                                    <a href="{{route('building.create')}}" class="btn btn-primary">
                                        <i class="bi bi-plus-lg me-1"></i>Add Building
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!--end page main-->
@endsection
@push('script')
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
@endpush
