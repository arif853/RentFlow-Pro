@extends('layouts.admin')
@section('title','checkout Approval List')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">checkout</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">checkout Approval List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">checkout Approval List</h5>
                <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                            class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle" id="datatable">
                    <thead class="table-secondary">
                        <tr>
                            <th>Sl</th>
                            <th>Building</th>
                            <th>Asset</th>
                            <th>Floor</th>
                            <th>Checkout Month</th>
                            <th>client Name</th>
                            <th>client Cause</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($checkouts as $key => $checkout)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$checkout->asset->building->building_name}}</td>
                            <td>{{$checkout->asset->asset_code}}</td>
                            <td>{{$checkout->asset->floor->floor_name}}</td>
                            <td>{{$checkout->month}}</td>
                            <td>{{$checkout->customer->client_name}}</td>
                            <td>{{$checkout->notes}}</td>
                            <td>

                                @if ($checkout->is_confirm == 0)
                                <a href="#" class="badge bg-warning">Pending</a>
                                @else
                                <a href="#" class="badge bg-success">Confirmed</a>
                                @endif

                            </td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">

                                    @if ($checkout->is_confirm == 0)
                                    <a href="{{route('checkout.approval.list.approve', $checkout->id)}}" class="text-primary btn_checkoutConfirm" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Approve" id="confirmApproveBtn">
                                        <i class="bi bi-check-lg"></i></a>
                                    @else
                                    <a href="" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Confirmed"><i class="bi bi-hand-thumbs-up"></i></a>

                                    @endif
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
 $(document).ready(function(){

$(document).on('click', '#confirmApproveBtn', function (e) {
    e.preventDefault(); // Prevent the default anchor behavior
    var url = $(this).attr('href'); // Get the href link

    Swal.fire({
        title: "Do you want to approve this Checkout Request?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Approve",
        denyButtonText: `Deny!`
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, redirect to the route
            window.location.href = url;
            Swal.fire("Thank You", "Checkout Cofirmed", "success");
        } else if (result.isDenied) {
            Swal.fire("Sorry!", "Checkout is not confirmed", "info");
        }
    });
});
});
</script>
@endpush
