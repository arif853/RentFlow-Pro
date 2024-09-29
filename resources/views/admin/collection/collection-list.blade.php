@extends('layouts.admin')
@section('title','Manage Booking')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Booking</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Collection</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Manage Collection</h5>
                <form class="ms-auto position-relative">
                    <div class="ms-auto">
                        <a href="{{route('collection.create')}}" class="btn btn-primary">Add New Collection</a>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                @if($collections->isEmpty())
                <tr>No data available.</tr>
                @else
                <table class="table align-middle" id="datatable">
                    <thead class="table-secondary">
                        <tr>
                            <th>Sl</th>
                            <th>Complex</th>
                            <th>Asset</th>
                            <th>Employee</th>
                            <th>Collection date</th>
                            <th>Collection Month</th>
                            <th>Total payable Rent</th>
                            <th>Collection Amount</th>
                            <th>Due</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($collections as $key => $collection)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$collection->building->building_name}}</td>
                            <td>{{$collection->asset->unit_name}}</td>
                            <td>{{$collection->employee->name}}</td>
                            <td>{{$collection->collection_date}}</td>
                            <td>{{$collection->month}}</td>
                            <td>{{$collection->payable_amount}}</td>
                            <td>{{$collection->collection_amount}}</td>
                            <td>{{$collection->due_amount}}</td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="{{route('collection.show', $collection->id)}}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-original-title="Views" aria-label="Views"><i
                                            class="bi bi-eye-fill text-primary"></i></a>
                                    <a href="{{route('collection.edit',$collection->id)}}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-original-title="Edit" aria-label="Edit"><i
                                            class="bi bi-pencil-fill text-warning"></i></a>
                                    <form action="{{ route('collection.destroy', $collection->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this collection?');"
                                        class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger border-0 bg-transparent p-0 delete-btn"
                                            data-bs-toggle="tooltip" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('collection.print',$collection->id)}}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-original-title="Print" aria-label="Print"><i class="bi bi-printer text-primary"></i></a>
                                </div>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</main>
<!--end page main-->
@endsection
@push('script')
<script>

</script>
@endpush
