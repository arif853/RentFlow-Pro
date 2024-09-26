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
                            <th>Complex</th>
                            <th>Asset</th>
                            <th>Employee</th>
                            <th>Collection date</th>
                            <th>Collection Type</th>
                            <th>Duration</th>
                            <th>Total payable Rent</th>
                            <th>Collection Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td>1</td>
                            <td>fsdf</td>
                            <td>dsffdsfs</td>
                            <td>sfsfsfsf</td>
                            <td>sfsf</td>
                            <td>
                                sfsf
                            </td>
                            <td>
                                sfsfs
                            </td>
                            <td>sfsf</td>
                            <td>sf</td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-original-title="Views" aria-label="Views"><i
                                            class="bi bi-eye-fill text-primary"></i></a>
                                    <a href="" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-original-title="Edit" aria-label="Edit"><i
                                            class="bi bi-pencil-fill text-warning"></i></a>

                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-original-title="Print" aria-label="Print"><i class="bi bi-printer text-primary"></i></a>
                                </div>

                            </td>
                        </tr>


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
