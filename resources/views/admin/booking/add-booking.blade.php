@extends('layouts.admin')
@section('title','Add Booking')
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
                    <li class="breadcrumb-item active" aria-current="page">Add Booking</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <form action="{{route('booking.store')}}" method="post" enctype="multipart/form-data" id="bookingForm">
        @csrf
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
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
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">Add Booking</h5>
                            <div class="ms-auto">
                                <input type="hidden" name="action" id="formAction" value="draft">
                                <button type="button" class="btn btn-success" id="draftButton">Book Now</button>
                                <button type="button" class="btn btn-primary" id="nextButton">Next</button>
                                {{-- <button type="submit" class="btn btn-success" id="bookNow">Book Now</button>
                                <a href="{{route('final.booking')}}" class="btn btn-primary" id="nextPage">Next</a> --}}
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
                                                <label class="form-label">Area/Location</label>
                                                <select class="form-select" name="location_id" id="location">
                                                    <option value="">Select Location</option>
                                                    @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <div class="card border shadow-none radius-10" style="margin-bottom: 0px;"
                                                    id="location-details-card">
                                                    <div class="card-body">

                                                        <div class="d-flex justify-content-start align-content-center">
                                                            <div class="" id="location-map" style="margin-right: 20px;">

                                                            </div>
                                                            <ul class="list-group list-group-flush">
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Location:</span>
                                                                    <span id="location-name">Shahjahanpur</span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Location ID:</span>
                                                                    <span id="location-code">LC-2301</span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent">
                                                                    <span class="side-title">Zip Code:</span>
                                                                    <span id="zip-code">1217</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Building</label>
                                                <select class="form-select" name="building_id" id="building">
                                                    <option value="">Select Building</option>
                                                    <!-- Buildings will be dynamically populated here -->
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <div class="card border shadow-none radius-10" id="buildingCardDetails"
                                                    style="margin-bottom: 0px; display: none;">
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Name :</span>
                                                                <span id="building-name">Concord Tower</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Type :</span>
                                                                <span id="building-type">Commercial</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Total Floor :</span>
                                                                <span id="total-floor">12</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Code :</span>
                                                                <span id="building-code">BL-2001</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Address :</span>
                                                                <span id="building-address">522/B, North Shahjahanpur,
                                                                    Dhaka</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Security Guard Name :</span>
                                                                <span id="guard-name">Zakaria Hossain</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Guard Contact Number :</span>
                                                                <span id="guard-contact">+880 222 444 555</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Gate Open Time :</span>
                                                                <span id="gate-open-time">10:00 AM</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Gate Close Time :</span>
                                                                <span id="gate-close-time">11:00 PM</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Floor Name</label>
                                                <select class="form-select" name="floor_id" id="floorId">
                                                    <option> Select Floor</option>
                                                    @foreach ($floors as $floor)
                                                    <option value="{{$floor->id}}"
                                                        data-building-id="{{ $floor->building_id }}"
                                                        data-floor-size="{{$floor->floor_size}}"
                                                        data-floor-unit="{{$floor->total_unit}}"
                                                        >{{$floor->floor_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Floor Size</label>
                                                <input type="text" class="form-control" placeholder="Floor Size" readonly id="floorSize">
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Total Unit</label>
                                                <input type="email" class="form-control" placeholder="Total Unit" readonly id="floorUnit">
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Select Appartment</label>
                                                <select class="form-select" name="asset_id" id="assetId">
                                                    <option>Select Appartment</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <div id="apartmentDetails"></div>
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
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" placeholder="Full Name"
                                                name="client_name">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Contact Number</label>
                                                <input type="text" class="form-control" placeholder="Contact Number"
                                                name="client_phone">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Email Address</label>
                                                <input type="email" class="form-control" placeholder="Email Address"
                                                name="client_email">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Occupation</label>
                                                <select class="form-select" name="occupation">
                                                    <option value="Job Holder">Job Holder</option>
                                                    <option value="Business">Business</option>
                                                    <option value="Service Provider">Service Provider</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Gender</label>
                                                <div>
                                                    <input type="radio" class="form-checbox" name="gender" id="male" value="male">
                                                    <label for="male" class="form-label me-4">Male</label>
                                                    <input type="radio" class="form-checkbox " name="gender" id="female" value="female">
                                                    <label for="female" class="form-label">Female</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">NID Card Number</label>
                                                <input type="text" class="form-control" placeholder="13 or 17 digit NID number" name="nid_number">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">NID Front</label>
                                                <input class="form-control" type="file" name="nid_front">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">NID Back</label>
                                                <input class="form-control" type="file" name="nid_back">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Other's Documents</label>
                                                <select class="form-select" name="other_document">
                                                    <option value="Passport">Passport</option>
                                                    <option value="Birth Certificate">Birth Certificate</option>
                                                    <option value="Driving License">Driving License</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Documents Photo</label>
                                                <input class="form-control" type="file" name="document_photo">
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
    </form>
    <!--end row-->
</main>
<!--end page main-->
@endsection
@push('script')
<script>
    $(document).ready(function () {

        // Cache the floor select element and all floor options
        var $floorSelect = $('#floorId');
        var $allFloorOptions = $floorSelect.find('option').clone(); // Clone all floor options

        // Initially hide all floor options
        $floorSelect.html('<option value="">Select Floor</option>');

        // Listen for changes on the building dropdown
        $('#building').on('change', function() {
            var selectedBuildingId = $(this).val(); // Get the selected building ID

            // Clear the floor dropdown on each building change
            $floorSelect.html('<option value="">Select Floor</option>');

            // If no building is selected, do nothing
            if (!selectedBuildingId) return;

            // Filter and append the matching floor options
            $allFloorOptions.each(function() {
                var $option = $(this);
                var buildingId = $option.data('building-id');

                // Append options where the building_id matches
                if (buildingId == selectedBuildingId) {
                    $floorSelect.append($option);
                }
            });
        });

        $('#draftButton').on('click', function() {
            $('#formAction').val('draft'); // Set action as draft
            $('#bookingForm').submit(); // Submit the form
        });

        $('#nextButton').on('click', function() {
            $('#formAction').val('next'); // Set action as next
            $('#bookingForm').submit(); // Submit the form
        });

        // Handle location change event
        $('#location').on('change', function () {
            var locationId = $(this).val();
            console.log(locationId);

            // Check if a valid location is selected
            if (locationId) {
                $.ajax({
                    url: '/dashboard/booking/get-buildings/' +locationId, // The route to fetch buildings
                    type: 'GET',
                    success: function (response) {
                        // Clear and populate the buildings dropdown
                        $('#building').empty().append(
                            '<option value="">Select Building</option>');
                        $.each(response.buildings, function (index, building) {
                            $('#building').append('<option value="' + building.id +
                                '">' + building.building_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to fetch buildings. Please try again.');
                    }
                });
            } else {
                // Clear the buildings dropdown if no location is selected
                $('#building').empty().append('<option value="">Select Building</option>');
            }

            if (locationId) {
                // Make an AJAX request to get location details
                $.ajax({
                    url: '/dashboard/locations/location-list/' + locationId,
                    method: 'GET',
                    success: function (data) {
                        if (data) {
                            $('#location-details-card').show();
                            $('#location-name').text(data.name);
                            $('#location-id').text(data.location_code);
                            $('#zip-code').text(data.zip_code);
                            $('#location-map').html(data.google_map_link);
                            // .attr('height', '100%');
                            // $('#google-map').attr('src', data.google_map_link);
                        } else {
                            $('#location-details-card').hide();
                        }
                    }
                });
            } else {
                $('#location-details-card').hide();
            }

        });
        // Initially hide the location details card
        $('#location-details-card').hide();

        $('#building').on('change', function () {
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

        $('#floorId').on('change',function() {
            // Get the selected option's data attributes
            var selectedOption = $(this).find('option:selected');
            var size = selectedOption.data('floor-size');
            var unit = selectedOption.data('floor-unit');

            // Update the input fields with the selected floor's data
            $('#floorSize').val(size || '');
            $('#floorUnit').val(unit || '');

            var assetId = $(this).val();
            console.log(assetId);

            // Check if a valid location is selected
            if (assetId) {
                $.ajax({
                    url: '/dashboard/booking/get-asset/' +assetId, // The route to fetch asset
                    type: 'GET',
                    success: function (response) {
                        // Clear and populate the asset dropdown
                        $('#assetId').empty().append(
                            '<option value="">Select Appartment</option>');
                        $.each(response.assets, function (index, asset) {
                            $('#assetId').append('<option value="' + asset.id +'">' + asset.unit_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to fetch asset. Please try again.');
                    }
                });
            } else {
                // Clear the asset dropdown if no location is selected
                $('#assetId').empty().append('<option value="">Select Appartment</option>');
            }
        });

        $('#assetId').on('change', function() {
            let apartmentId = $(this).val();

            if (apartmentId) {
                $.ajax({
                    url: '/dashboard/booking/get-apartment-details/' + apartmentId,
                    type: 'GET',
                    success: function(data) {
                        // Clear the apartment details section
                        $('#apartmentDetails').html('');

                        // Generate HTML for room counts
                        let roomCountsHtml = '';
                        data.roomCounts.forEach(function(room) {
                            roomCountsHtml += `
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                    <span class="side-title">${room.type}:</span>
                                    <span>${room.count}</span>
                                </li>`;
                        });

                        // Create the details section dynamically
                        let htmlContent = `
                        <div class="card border shadow-none radius-10" style="margin-bottom: 0px;">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0 align-items-center text-center">Apartment Information</h6>
                                    </div>
                                    <div class="card-body border-bottom">
                                        <ul class="list-group list-group-flush">
                                            ${roomCountsHtml} <!-- Room counts dynamically generated -->
                                        </ul>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Unit Name:</span>
                                        <span>${data.apartment.unit_name}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Asset ID:</span>
                                        <span>${data.apartment.asset_code}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Unit Size:</span>
                                        <span>${data.apartment.unit_size} sft</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Unit View:</span>
                                        <span>${data.apartment.unit_view}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">GAS Type:</span>
                                        <span>${data.apartment.gas_type}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Lift Facility:</span>
                                        <span>${data.apartment.lift_facility ? 'Yes' : 'No'}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Electricity Type:</span>
                                        <span>${data.apartment.electricity_type}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Water Type:</span>
                                        <span>${data.apartment.water_type}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Monthly Rent:</span>
                                        <span>${data.apartment.monthly_rent}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Service Charge:</span>
                                        <span>${data.apartment.service_charge}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Others Charge:</span>
                                        <span>${data.apartment.others_charge}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        <span class="side-title">Available From:</span>
                                        <span>${data.apartment.available_from}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>`;

                        // Append the details to the container
                        $('#apartmentDetails').append(htmlContent);
                    },
                    error: function() {
                        alert('Unable to fetch apartment details.');
                    }
                });
            } else {
                // Clear details if no apartment is selected
                $('#apartmentDetails').html('');
            }
        });

        // Handle 'Book Now' button click
        $('#bookNow').on('click', function (e) {
            e.preventDefault(); // Prevent default form submission

            // Set status to 'pending'
            // $('#status').val('pending');

            // Submit the form
            $('#bookingForm').submit();
        });

        // Handle 'Next' button click
        $('#nextPage').on('click', function (e) {
            e.preventDefault(); // Prevent the default anchor action

            // Set status to an appropriate value or leave it empty if not needed
            // $('#status').val(''); // Optional: set a different status if needed

            // Submit the form with an action to redirect to the next page
            // $('#bookingForm').attr('action', 'final-booking.php'); // Set the form action to the next page
            $('#bookingForm').submit();
        });
    });

</script>
@endpush
