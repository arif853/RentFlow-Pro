@extends('layouts.admin')
@section('title','Checkout Collection')
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
                    <li class="breadcrumb-item active" aria-current="page">Checkout Collection</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Manage Checkout Collection</h5>
                <form class="ms-auto position-relative">
                    <div class="ms-auto">
                        <a href="{{route('checkout.create')}}" class="btn btn-primary">Create Checkout Request</a>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle" id="datatable">
                    <thead class="table-secondary">
                        <tr>
                            <th>Sl</th>
                            <th>Asset Name</th>
                            <th>Checkout Month</th>
                            <th>Available Date</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($checkouts as  $key => $checkout)
                        <tr>
                            <td>{{ $key +1}}</td>
                            <td>{{$checkout->asset_id}}</td>
                            <td>{{$checkout->month}}</td>
                            <td>{{$checkout->availability_date}}</td>
                            <td>{{$checkout->notes}}</td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-original-title="Views" aria-label="Views"><i
                                            class="bi bi-eye-fill text-primary"></i></a>
                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-original-title="Edit" aria-label="Edit"><i
                                            class="bi bi-pencil-fill text-warning"></i></a>

                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-original-title="Print" aria-label="Print"><i
                                            class="bi bi-printer text-primary"></i></a>
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

</script>
@endpush
