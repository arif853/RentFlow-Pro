@extends('layouts.admin')
@section('title','Manage Asset')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Asset</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Asset</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Manage Asset</h5>
            </div>
            <div class="table-responsive mt-3">
                <div class="col-12 mb-3">
                    <div class="col-3 d-flex">
                        <div class="col-11">
                            <label for="asset">Asset</label>
                            <input class="form-control" name="asset" id="asset" placeholder="Search Asset id or Name">
                        </div>
                        <div class="col-11 ps-3">
                            <label for="employee">Employee</label>
                            <select class="form-select" name="employee" id="employee">
                                <option value="">Select an Employee</option>
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->name }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-11 ps-3">
                            <label for="building">Building</label>
                            <select class="form-select" name="building" id="building">
                                <option value="">Select a Building</option>
                                @foreach ($buildings as $building)
                                <option value="{{ $building->building_name }}">{{ $building->building_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <table class="table align-middle" id="datatable">
                    <thead class="table-secondary">
                        <tr>
                            <th>Sl</th>
                            <th>Asset ID</th>
                            <th>Employee Name</th>
                            <th>Building</th>
                            <th>Rooms</th>
                            <th>Available from</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="assetTableBody">
                        @foreach ($assets as $key => $asset)
                        <tr>
                            <td>{{$key +1}}</td>
                            <td>{{$asset->unit_name}} <br> {{$asset->asset_code}}</td>
                            <td>{{$asset->employee ? $asset->employee->name : 'N/A'}} <br>
                                {{$asset->employee ? $asset->employee->employee_code : 'N/A'}}
                            </td>
                            <td>{{$asset->building ? $asset->building->building_name : 'N/A'}} <br>
                                {{$asset->building ? $asset->building->building_code : 'N/A'}}
                            </td>
                            <td>
                                @if($asset->rooms)
                                @foreach ($asset->rooms as $room)
                                {{$room->roomtype->roomType}}, <br>
                                @endforeach
                                @endif
                            </td>
                            <td>{{\Carbon\Carbon::parse($asset->available_from)->format('d M, Y')}}</td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="{{route('asset.show',$asset->id)}}" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{route('asset.edit',$asset->id)}}" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="{{ route('asset.destroy', $asset->id) }}"
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
                        @endforeach
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
$(document).ready(function() {
    // Custom Search: Asset ID or Name
    $('#asset').on('keyup', function () {
        $('#datatable').DataTable().columns(1).search(this.value).draw();
    });

    // Custom Search: Employee Name
    $('#employee').on('change', function () {
        $('#datatable').DataTable().columns(2).search(this.value).draw();
    });

    // Custom Search: Building Name
    $('#building').on('change', function () {
        $('#datatable').DataTable().columns(3).search(this.value).draw();
    });

    // Delete confirmation
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
});
</script>
@endpush

