@extends('layouts.admin')
@section('title','Report')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Report</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">chekout Report</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">chekout Report</h5>
                <form class="ms-auto position-relative">
                    <div class="ms-auto">

                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <div class="col-12">
                    <div class="col-4 d-flex">
                        <div class="col-11">
                            <select class="form-select" name="building_id" id="building_id">
                                <!-- Asset will be dynamically populated here -->
                                <option value="">Select Complex</option>
                                @foreach ($buildings as $building)
                                <option value="{{$building->id}}">{{$building->building_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" class="btn btn-secondary ms-3" id="btn_submit">Search</button>
                    </div>
                </div>
                <div id="chekoutList" class="mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Building</th>
                                <th scope="col">Unit Name</th>
                                <th scope="col">Asset Code</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Checkout Month</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody id="chekoutTableBody">
                            <!-- Dynamic rows will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!--end page main-->
@endsection

@push('script')
<script>
$(document).ready(function () {
    $('#btn_submit').on('click', function () {
        var buildingId = $('#building_id').val();
        console.log(buildingId);

        if (buildingId) {
            $.ajax({
                url: '/dashboard/report/checkout/details/' + buildingId,
                type: 'GET',
                success: function (data) {
                    // Clear the existing table rows
                    $('#chekoutTableBody').empty();
                    // console.log('ajax data',data);

                    if (data) {
                        $.each(data, function (index, chekout) {
                            // console.log(chekout.building);
                            $('#chekoutTableBody').append(`
                                <tr>
                                    <th scope="row">${index + 1}</th>
                                    <td>${chekout.building.building_name}</td>
                                    <td>${chekout.asset.unit_name}</td>
                                    <td>${chekout.asset.asset_code}</td>
                                    <td>${chekout.customer.client_name}</td>
                                    <td>${chekout.customer.client_phone}</td>
                                    <td>${chekout.month}</td>
                                    <td>${chekout.is_confirm == 1 ? "Confiremd": "Pending"}</td>
                                </tr>
                            `);
                        });
                    } else {
                        console.log('No chekout found for this building.');
                        $('#chekoutTableBody').append(`
                            <tr>
                                <td colspan="4" class="text-center">No chekouts available.</td>
                            </tr>
                        `);
                    }
                },
                error: function () {
                    console.log('Error fetching chekout details.');
                }
            });
        }
    });
});
</script>
@endpush
