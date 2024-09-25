@extends('layouts.admin')
@section('title', 'new collection')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Collection</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">New Collection</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">New Collection</h5>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 col-lg-6">
                            <div class="card shadow-none bg-light border">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!--Row-1-->

                                        <div class="col-12">
                                            <label class="form-label">Complex</label>
                                            <select class="form-select" name="building_id" id="building_id">
                                                <!-- Asset will be dynamically populated here -->
                                                <option value="">Select Complex</option>
                                                @foreach ($buildings as $building)
                                                <option value="{{$building->id}}" data-building-name="{{ $building->building_name }}" data-employee_id="{{$building->employee_id}}">{{$building->building_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Asset Name</label>
                                            <select class="form-select" name="unit_name" id="unit_id">
                                                <!-- Asset will be dynamically populated here -->
                                                <option value="">Select Asset Name</option>

                                            </select>
                                        </div>
                                        <div class="col-12" id="asset_info">
                                            <div class="card border shadow-none radius-10" id=""
                                                style="margin-bottom: 0px;">
                                                <div class="card-body">
                                                    <ul class="list-group list-group-flush">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                            <span class="side-title">Unit Name :</span>
                                                            <span id="unit_name">---</span>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                            <span class="side-title">Building Name :</span>
                                                            <span id="building_name">---</span>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                            <span class="side-title">Monthly Rent :</span>
                                                            <span id="monthly_rent">---</span>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                            <span class="side-title">Service Charge :</span>
                                                            <span id="service_charge">---</span>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                            <span class="side-title">Others Charge :</span>
                                                            <span id="others_charge">---</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="card shadow-none bg-light border">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Collection Date </label>
                                            <input type="date" class="form-control" placeholder="Collection Date">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Employee</label>
                                            <input type="text" class="form-control" id="employee_name" value="" placeholder="Employee">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Collection Type</label>
                                            <select class="form-select">
                                                <option> Day Wise</option>
                                                <option>Month Wise</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Rent Amount</label>
                                            <input type="number" class="form-control" placeholder="Rent Amount">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Collection Amount</label>
                                            <input type="number" class="form-control" placeholder="Collection Amount">
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</main>
<!--end page main-->
@endsection

@push('script')
<script>

    $(document).ready(function () {

        $('#building_id').on('change', function () {
            var buildingId = $(this).val();

            var buildingName =  this.options[this.selectedIndex].getAttribute('data-building-name');
            $('#building_name').text(buildingName);
            // console.log(buildingId);

            var employeeId =  this.options[this.selectedIndex].getAttribute('data-employee_id');
            // console.log('employeeId',employeeId);


            // Get Employee Name
            if (employeeId) {
                $.ajax({
                    url: '/dashboard/collection/get-employee-details/' + employeeId,
                    type: 'GET',
                    success: function (data) {
                        $('#employee_name').val(data.name);
                        // console.log('ajax data',data.name);


                    }
                });
            }


            $('#unit_id').html('');
            if (buildingId) {
                $.ajax({
                    url: '/dashboard/collection/get-asset/' + buildingId,
                    type: 'GET',
                    success: function (data) {
                        $('#unit_id').html(
                            '<option value="">Select Asset Name</option>');
                        $.each(data, function (key, value) {
                            $('#unit_id').append('<option value="' + value.id +
                                '">' + value.unit_name + '</option>');
                        });
                    }
                });
            }
        });


        // Get Details
        $('#unit_id').on('change', function () {
            var assetId = $(this).val();
            console.log(assetId);
            if (assetId) {
                $.ajax({
                    url: '/dashboard/collection/get-asset-details/' + assetId,
                    type: 'GET',
                    success: function (data) {
                        // console.log('ajax data', data);
                        $('#unit_name').text(data.unit_name);
                        $('#monthly_rent').text(data.monthly_rent);
                        $('#service_charge').text(data.service_charge);
                        $('#others_charge').text(data.others_charge);

                    }
                });
            }
        });
    });

</script>
@endpush
