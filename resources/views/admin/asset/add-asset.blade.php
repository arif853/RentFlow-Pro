@extends('layouts.admin')
@section('title','New Asset')
@section('content')

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Asset</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Asset</li>
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
                        <h5 class="mb-2 mb-sm-0">Add Asset</h5>
                        <div class="ms-auto">
                            <a href="{{route('asset.index')}}" class="btn btn-secondary">Manage Asset</a>
                        </div>
                    </div>
                </div>
                {{-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{route('asset.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-lg-8">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <!--Row-1-->
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Unit Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Unit Name"
                                                 name="unit_name" id="unitName" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Asset Code<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Asset Code"
                                                 name="asset_code" id="assetCode" readonly required>
                                            </div>
                                            <!--Row-5-->
                                            <div class="col-12">
                                                <label class="form-label">Complex <span class="text-danger">*</span></label>
                                                <select class="form-select" name="building_id" id="building-select" required>
                                                    <option value="">Select Complex</option>
                                                    @foreach ($buildings as $building)
                                                        <option value="{{ $building->id }}">{{ $building->building_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- Building details --}}
                                            <div class="col-12">
                                                <div class="card border shadow-none radius-10" id="buildingCardDetails" style="margin-bottom: 0px; display: none;">
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Name :</span>
                                                                <span id="building-name">Concord Tower</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Type :</span>
                                                                <span id="building-type">Commercial</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Total Floor :</span>
                                                                <span id="total-floor">12</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Code :</span>
                                                                <span id="building-code">BL-2001</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Address :</span>
                                                                <span id="building-address">522/B, North Shahjahanpur, Dhaka</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Security Guard Name :</span>
                                                                <span id="guard-name">Zakaria Hossain</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Guard Contact Number :</span>
                                                                <span id="guard-contact">+880 222 444 555</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Gate Open Time :</span>
                                                                <span id="gate-open-time">10:00 AM</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Gate Close Time :</span>
                                                                <span id="gate-close-time">11:00 PM</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Floor Name<span class="text-danger">*</span></label>
                                                <select class="form-select" name="floor_id" id="floorId" required>
                                                    <option value="">Select Floor</option>
                                                    @foreach ($floors as $floor)
                                                    <option value="{{ $floor->id }}" data-size="{{ $floor->floor_size }}" data-unit="{{ $floor->total_unit }}">
                                                        {{ $floor->floor_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Floor Size</label>
                                                <input type="text" class="form-control" placeholder="Floor Size" readonly id="floorSize">
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Total Unit</label>
                                                <input type="text" class="form-control" placeholder="Total Unit" readonly id="floorUnit">
                                            </div>

                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12 col-lg-6">
                                                <div class="card shadow-none border">
                                                    <div class="card-header">
                                                        <h6 class="mb-0 align-items-center">GAS Information</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row g-3 mb-2">
                                                            <div class="col-12">
                                                                <label class="form-label">GAS Type</label>
                                                                <select class="form-select" name="gas_type" id="gasType">
                                                                    <option value="">Select Option</option>
                                                                    <option value="Prepaid">Prepaid</option>
                                                                    <option value="Post Paid">Post Paid</option>
                                                                    <option value="Partial">Partial</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3" id="gasAmountCard" style="display: none">
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Owner Part amount</label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Owner Part amount" name="gas_owner_part_amount">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Rental Part amount </label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Rental Part amount " name="gas_rental_part_amount">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="card shadow-none border">
                                                    <div class="card-header">
                                                        <h6 class="mb-0 align-items-center">Lift Information</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label class="form-label">Lift Facility</label>
                                                                <select class="form-select" name="lift_facility">
                                                                    <option value="">Select Option</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="card shadow-none border">
                                                    <div class="card-header">
                                                        <h6 class="mb-0 align-items-center">Electricity Information</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row g-3 mb-2">
                                                            <div class="col-12">
                                                                <label class="form-label">Electricity Type</label>
                                                                <select class="form-select" name="electricity_type" id="electricityType" >
                                                                    <option value="">Select Option</option>
                                                                    <option value="Prepaid">Prepaid</option>
                                                                    <option value="Post Paid">Post Paid</option>
                                                                    <option value="Partial">Partial</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row g-3" id="ElectricityAmountCard" style="display: none">
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Owner Part amount</label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Owner Part amount" name="e_owner_part_amount">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Rental Part amount </label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Rental Part amount " name="e_rental_part_amount">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="card shadow-none border">
                                                    <div class="card-header">
                                                        <h6 class="mb-0 align-items-center">Water Information</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row g-3 mb-2">
                                                            <div class="col-12">
                                                                <label class="form-label">Water Type</label>
                                                                <select class="form-select" name="water_type" id="waterType">
                                                                    <option value="">Select Option</option>
                                                                    <option value="Prepaid">Prepaid</option>
                                                                    <option value="Post Paid">Post Paid</option>
                                                                    <option value="Partial">Partial</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row g-3" id="waterAmountCard" style="display: none">
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Owner Part amount</label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Owner Part amount" name="water_owner_part_amount">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Rental Part amount </label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Rental Part amount " name="water_rental_part_amount">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Room-->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none bg-light border">
                                            <div class="card-header">
                                                <h6 class="mb-0 align-items-center text-center">Room/Appartment Details
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div id="room-cards-container">
                                                    <!-- Existing Room Card -->

                                                </div>

                                                <!-- Button to add new room -->
                                                <button type="button" class="btn btn-primary" id="add-room-btn">+ New Room</button>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--Room-->
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Area/Location<span class="text-danger">*</span></label>
                                                <select class="form-select" name="location_id" id="location-select">
                                                    <option value="">Select Location</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <div class="card border shadow-none radius-10" id="location-details-card" style="margin-bottom: 0px; display: none;">
                                                    <div class="card-body">
                                                        <div class="" id="location-map">

                                                        </div>
                                                        <div class="">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Location:</span>
                                                                    <span id="location-name">Shahjahanpur</span>
                                                                </li>
                                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Location ID:</span>
                                                                    <span id="location-id">LC-2301</span>
                                                                </li>
                                                                <li class="d-flex justify-content-between align-items-center bg-transparent">
                                                                    <span class="side-title">Zip Code:</span>
                                                                    <span id="location-zip">1217</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Unit Size</label>
                                                <input type="text" class="form-control" placeholder="Unit Size" name="unit_size" >
                                            </div>
                                            <!--Row-2-->
                                            <!--Row-3-->
                                            <div class="col-12">
                                                <label class="form-label">Unit View</label>
                                                <select class="form-select" name="unit_view" >
                                                    <option value="">Select Unit View</option>
                                                    <option value="Front Side">Front Side</option>
                                                    <option value="Back Side">Back Side</option>
                                                    <option value="North View">North View</option>
                                                    <option value="South View">South View</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Monthly Rent</label>
                                                <input type="number" class="form-control" placeholder="Monthly Rent " name="monthly_rent" >
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Service Charge </label>
                                                <input type="number" class="form-control" placeholder="Service Charge " name="service_charge">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Others Charge </label>
                                                <input type="number" class="form-control" placeholder="Others Charge " name="others_charge">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Available From</label>
                                                <input type="date" class="form-control" placeholder="Available From" name="available_from">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Others Description </label>
                                                <textarea class="form-control" placeholder="Others Description " name="others_description"
                                                    rows="4" cols="4"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Employee</label>
                                                <select class="form-select" name="employee_id" id="employee-select">
                                                    <option value="">Select Employee</option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <div class="card border shadow-none radius-10" id="employee-details-card" style="margin-bottom: 0px; display: none;">
                                                    <div class="card-body">
                                                        <div class="align-items-center">
                                                            <div class="">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Name:</span>
                                                                        <span id="employee-name">Antone Wintheiser</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Designation:</span>
                                                                        <span id="employee-designation">Manager</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">ID:</span>
                                                                        <span id="employee-id">EM-2001</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Phone:</span>
                                                                        <span id="employee-phone">+880 222 444 555</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Date of Joining:</span>
                                                                        <span id="employee-joining-date">15 Aug 2024</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">NID Number:</span>
                                                                        <span id="employee-nid">6024856600005</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Present Address:</span>
                                                                        <span id="employee-address">Road-06, house-11, Mirpur 1, Dhaka 1216</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Status</label>
                                                <select class="form-select" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <!--end row-->
                    </form>
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
        $(document).ready(function(){

            $('#unitName').on('keyup', function() {
                // Get the building name value
                let buildingName = $(this).val().trim();

                // Generate the building code only if the building name has at least 4 characters
                if (buildingName.length >= 1) {
                    // Extract the first 4 characters of the building name
                    let namePart = buildingName.substring(0, 3).toUpperCase();

                    // Generate a random 4-digit number
                    let randomNumber = Math.floor(10000 + Math.random() * 90000);

                    // Get the current year and extract the last digit
                    let yearLastDigit = new Date().getFullYear().toString().slice(-2);

                    // Combine to form the building code
                    let assetCode = namePart + '-' + randomNumber;

                    // Set the generated code in the building code input
                    $('#assetCode').val(assetCode);
                } else {
                    // Clear the building code if the name is less than 4 characters
                    $('#assetCode').val('');
                }
            });

            function amountCardShow(value, previewId) {
                // Show or hide the amount card based on the selected value
                if (value == 'Partial') {
                    $(previewId).show();
                } else {
                    $(previewId).hide();
                }
            }

            $('#waterType').change(function(){
                // Get the selected value
                var selectedValue = $(this).val();
                amountCardShow(selectedValue, '#waterAmountCard')
            });

            $('#electricityType').change(function(){
                // Get the selected value
                var selectedValue = $(this).val();
                amountCardShow(selectedValue, '#ElectricityAmountCard')
            });

            $('#gasType').change(function(){
                // Get the selected value
                var selectedValue = $(this).val();
                amountCardShow(selectedValue, '#gasAmountCard')
            });

            $('#floorId').change(function() {
                // Get the selected option's data attributes
                var selectedOption = $(this).find('option:selected');
                var size = selectedOption.data('size');
                var unit = selectedOption.data('unit');

                // Update the input fields with the selected floor's data
                $('#floorSize').val(size || '');
                $('#floorUnit').val(unit || '');
            });

            $('#building-select').on('change', function () {
                var buildingId = $(this).val();

                if (buildingId) {
                    // Make an AJAX request to get building details
                    $.ajax({
                        url: '/dashboard/building/building_details/' + buildingId, // Update with your actual URL endpoint
                        method: 'GET',
                        success: function (data) {
                            // Update the building details card with the fetched data
                            $('#building-name').text(data.building_name);
                            $('#building-type').text(data.building_type);
                            $('#total-floor').text(data.total_floor);
                            $('#building-code').text(data.building_code);
                            $('#building-address').text(data.address);
                            $('#guard-name').text(data.security_guard_name || 'N/A');
                            $('#guard-contact').text(data.guard_contact_number || 'N/A');
                            $('#gate-open-time').text(data.gate_open_time || 'N/A');
                            $('#gate-close-time').text(data.gate_close_time || 'N/A');

                            // Show the details card
                            $('#buildingCardDetails').show();
                        },
                        error: function () {
                            // Hide the details card if there's an error
                            $('#buildingCardDetails').hide();
                        }
                    });
                } else {
                    // Hide the details card if no building is selected
                    $('#buildingCardDetails').hide();
                }
            });

            $('#employee-select').on('change', function () {
                var employeeId = $(this).val();

                if (employeeId) {
                    // Make an AJAX request to get employee details
                    $.ajax({
                        url: '/dashboard/building/employee_details/' + employeeId, // Update with your actual URL endpoint
                        method: 'GET',
                        success: function (data) {
                            // Update the employee details card with the fetched data
                            $('#employee-name').text(data.name || 'N/A');
                            $('#employee-designation').text(data.designation || 'N/A');
                            $('#employee-id').text(data.employee_code || 'N/A');
                            $('#employee-phone').text(data.phone || 'N/A');
                            $('#employee-joining-date').text(data.date_of_joining || 'N/A');
                            $('#employee-nid').text(data.nid_number || 'N/A');
                            $('#employee-address').text(data.present_address || 'N/A');

                            // Show the details card
                            $('#employee-details-card').show();
                        },
                        error: function () {
                            // Hide the details card if there's an error
                            $('#employee-details-card').hide();
                        }
                    });
                } else {
                    // Hide the details card if no employee is selected
                    $('#employee-details-card').hide();
                }
            });

            $('#location-select').on('change', function () {
                var locationId = $(this).val();

                if (locationId) {
                    // Make an AJAX request to get location details
                    $.ajax({
                        url: '/dashboard/locations/location-list/' + locationId, // Update with your actual URL endpoint
                        method: 'GET',
                        success: function (data) {
                            // Update the location details card with the fetched data
                            $('#location-name').text(data.name || 'N/A');
                            $('#location-id').text(data.location_code || 'N/A');
                            $('#location-zip').text(data.zip_code || 'N/A');

                            // Update the map source with the Google Map link
                            // $('#location-map').text(data.google_map_link || 'N/A');

                            // Show the details card
                            $('#location-details-card').show();
                        },
                        error: function () {
                            // Hide the details card if there's an error
                            $('#location-details-card').hide();
                        }
                    });
                } else {
                    // Hide the details card if no location is selected
                    $('#location-details-card').hide();
                }
            });

            // Room card template
            const roomCardTemplate = `
                <div class="card shadow-none border room-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Room</h6>
                        <button type="button" class="btn btn-danger btn-sm remove-room-btn">Remove</button>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Room Type<span class="text-danger">*</span></label>
                                <select class="form-select room-type-dropdown" name="room_type_id[]" required>
                                    <option value="">Select Room Type</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Room Size</label>
                                <input type="number" class="form-control" placeholder="Room Size" name="room_size[]">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Room Picture</label>
                                <input type="file" class="form-control" placeholder="Room Picture" name="room_image[]">
                            </div>
                            <!-- Checkboxes for Room Features -->
                            <div class="col-12 col-md-4">
                                <ul class="list-group list-group-flush">
                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                        <span class="side-title">Electricity Power Enable?</span>
                                        <span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="electricity[]">
                                            </div>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="align-items-center">
                                    <div class="">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                <span class="side-title">AC Line
                                                    Enable?</span>
                                                <span>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            type="checkbox"
                                                            id="flexSwitchCheckDefault" name="aircondition[]">
                                                    </div>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="align-items-center">
                                    <div class="">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                <span class="side-title">Has attach
                                                    Bath?</span>
                                                <span>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            type="checkbox"
                                                            id="flexSwitchCheckDefault" name="attach_toilet[]">
                                                    </div>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="align-items-center">
                                    <div class="">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                <span class="side-title">Has attach
                                                    Baranda? </span>
                                                <span>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            type="checkbox"
                                                            id="flexSwitchCheckDefault" name="attach_baranda[]">
                                                    </div>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="align-items-center">
                                    <div class="">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                <span class="side-title">Has Window?
                                                </span>
                                                <span>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            type="checkbox"
                                                            id="flexSwitchCheckDefault" name="has_window[]">
                                                    </div>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="align-items-center">
                                    <div class="">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                <span class="side-title">Other's:</span>
                                                <span>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            type="checkbox"
                                                            id="flexSwitchCheckDefault" name="others[]">
                                                    </div>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

            // Fetch room types when the page loads
            let roomTypes = [];

            function fetchRoomTypes() {
                $.ajax({
                    url: '/dashboard/room-types', // Endpoint to fetch room types
                    method: 'GET',
                    success: function (data) {
                        roomTypes = data; // Store room types globally
                    },
                    error: function () {
                        alert('Failed to fetch room types');
                    }
                });
            }

            // Call fetchRoomTypes when the document is ready
            fetchRoomTypes();

                // Handle the "+ New Room" button click

            $('#add-room-btn').on('click', function () {
                // Create a new room card from the template
                let newRoomCard = $(roomCardTemplate).clone();
                // console.log(newRoomCard);

                // Populate the room type dropdown with fetched room types
                let roomTypeDropdown = newRoomCard.find('.room-type-dropdown');
                roomTypeDropdown.empty(); // Clear any existing options
                roomTypeDropdown.append('<option value="">Select Room Type</option>'); // Add default option

                // Append options dynamically from the fetched data
                $.each(roomTypes, function (index, type) {
                    roomTypeDropdown.append('<option value="' + type.id + '">' + type.roomType + '</option>');
                });

                // Append the new room card to the container
                $('#room-cards-container').append(newRoomCard);
            });

            $('#room-cards-container').on('click', '.remove-room-btn', function () {
                $(this).closest('.room-card').remove(); // Remove the closest room card
            });

        });
    </script>
@endpush
