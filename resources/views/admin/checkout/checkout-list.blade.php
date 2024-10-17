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
                            <th>Building</th>
                            <th>Asset</th>
                            <th>Customer</th>
                            <th>Checkout Month</th>
                            <th>Available Date</th>
                            <th>Notes</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($checkouts as  $key => $checkout)
                        <tr>
                            <td>{{ $key +1}}</td>
                            <td>{{$checkout->asset->building->building_name}}</td>
                            <td>
                                <a href="{{route('customer.show',$checkout->customer_id)}}" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-original-title="Details" aria-label="Details">{{$checkout->asset->unit_name}}</a>
                            </td>
                            <td>{{$checkout->customer->client_name}}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('m/Y', $checkout->month)->format('F, Y') }}</td>
                            <td>{{$checkout->availability_date}}</td>
                            <td>{{$checkout->notes}}</td>
                            <td>
                                @if ($checkout->is_confirm == 0)
                                <a href="#" class="badge bg-warning">Pending</a>
                                @else
                                <a href="#" class="badge bg-success">Confirmed</a>
                                @endif
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
