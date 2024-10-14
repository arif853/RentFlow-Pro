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
                    <li class="breadcrumb-item active" aria-current="page">Booking Report</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Booking Report</h5>
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
                    <button type="button" class="btn btn-primary mt-3" id="btn_download_pdf" style="display: none">Download PDF</button>
                </div>
                <div id="bookingList" class="mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Building</th>
                                <th scope="col">Floor</th>
                                <th scope="col">Asset</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Monthly Rent</th>
                            </tr>
                        </thead>
                        <tbody id="bookingTableBody">
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
        $('#btn_download_pdf').show();
        var buildingId = $('#building_id').val();
        console.log(buildingId);

        if (buildingId) {
            $.ajax({
                url: '/dashboard/report/booking/details/' + buildingId,
                type: 'GET',
                success: function (data) {
                    // Clear the existing table rows
                    $('#bookingTableBody').empty();
                    console.log(data);
                    if (data) {
                        $.each(data, function (index, booking) {
                            // console.log(booking.building);

                            $('#bookingTableBody').append(`
                                <tr>
                                    <th scope="row">${index + 1}</th>
                                    <td>${booking.building.building_name}</td>
                                    <td>${booking.floor.floor_name}</td>
                                    <td>${booking.asset.unit_name}</td>
                                    <td>${booking.customer.client_name}</td>
                                    <td>${booking.customer.client_phone}</td>
                                    <td>${booking.asset.monthly_rent}</td>
                                </tr>
                            `);
                        });
                    } else {
                        console.log('No booking found for this building.');
                        $('#bookingTableBody').append(`
                            <tr>
                                <td colspan="4" class="text-center">No bookings available.</td>
                            </tr>
                        `);
                    }
                },
                error: function () {
                    console.log('Error fetching booking details.');
                }
            });
        }
    });

    $('#btn_download_pdf').on('click', function () {
        var buildingId = $('#building_id').val();
        if (buildingId) {
            window.location.href = '/dashboard/report/booking/pdf/' + buildingId;
        } else {
            alert('Please select a building first.');
        }
    });

});
</script>
@endpush
