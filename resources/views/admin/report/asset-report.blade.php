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
                    <li class="breadcrumb-item active" aria-current="page">Asset Report</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Asset Report</h5>
                <form class="ms-auto position-relative">
                    <div class="ms-auto">

                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <div class="col-12">
                    <div class="col-4 d-flex">
                        <div class="col-11">
                            <label for="location_id">Location</label>
                            <select class="form-select" name="location_id" id="location_id">
                                <option value="">Select a location</option>
                                @foreach ($locations as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-11 ps-3">
                            <label for="building_id">Complex</label>
                            <select class="form-select" name="building_id" id="building_id">
                                <option value="">Select a complex</option>
                                @foreach ($buildings as $building)
                                <option value="{{$building->id}}" data-location-id="{{$building->location_id}}">
                                    {{$building->building_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-11 ps-3">
                            <label for="floor_id">Floor</label>
                            <select class="form-select" name="floor_id" id="floor_id">
                                <option value="">Select a floor</option>
                                @foreach ($floors as $floor)
                                <option value="{{$floor->id}}" data-building-id="{{$floor->building_id}}">
                                    {{$floor->floor_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <button type="button" class="btn btn-primary mt-3" id="btn_download_asset_pdf" style="display: none">Download PDF</button>
                <div id="assetList" class="mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Building</th>
                                <th scope="col">Floor</th>
                                <th scope="col">Location</th>
                                <th scope="col">Available From</th>
                                <th scope="col">Monthly Rent</th>
                            </tr>
                        </thead>
                        <tbody id="assetTableBody">
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

        var $buildingSelect = $('#building_id');
        var $floorSelect = $('#floor_id');
        var $allBuildingOptions = $buildingSelect.find('option').clone(); // Clone all building options
        var $allFloorOptions = $floorSelect.find('option').clone(); // Clone all floor options

        // Initially hide buildings and floors
        $buildingSelect.html('<option value="">Select a complex</option>');
        $floorSelect.html('<option value="">Select a floor</option>');

        // When a location is selected, filter the buildings
        $('#location_id').on('change', function() {
            var selectedLocationId = $(this).val(); // Get selected location ID

            // Clear the building and floor dropdowns
            $buildingSelect.html('<option value="">Select a complex</option>');
            $floorSelect.html('<option value="">Select a floor</option>');

            // If no location is selected, keep buildings and floors empty
            if (!selectedLocationId) return;

            // Filter the buildings based on the selected location
            $allBuildingOptions.each(function() {
                var $option = $(this);
                var locationId = $option.data('location-id');

                // Only append buildings that belong to the selected location
                if (locationId == selectedLocationId) {
                    $buildingSelect.append($option);
                }
            });
        });

        // When a building is selected, filter the floors
        $('#building_id').on('change', function() {
            var selectedBuildingId = $(this).val(); // Get selected building ID

            // Clear the floor dropdown
            $floorSelect.html('<option value="">Select a floor</option>');

            // If no building is selected, keep floors empty
            if (!selectedBuildingId) return;

            // Filter the floors based on the selected building
            $allFloorOptions.each(function() {
                var $option = $(this);
                var buildingId = $option.data('building-id');

                // Only append floors that belong to the selected building
                if (buildingId == selectedBuildingId) {
                    $floorSelect.append($option);
                }
            });
        });



    // Declare variables to store selected IDs
    var locationId, buildingId, floorId;

    // Handle location change
    $('#location_id').on('change', function () {
        $('#btn_download_asset_pdf').show();
        locationId = $(this).val(); // Get the selected location ID
        console.log(locationId);
        details(); // Call details function to filter assets
    });

    // Handle building change
    $('#building_id').on('change', function () {
        $('#btn_download_asset_pdf').show();
        buildingId = $(this).val(); // Get the selected building ID
        console.log(buildingId);
        details(); // Call details function to filter assets
    });

    // Handle floor change
    $('#floor_id').on('change', function () {
        $('#btn_download_asset_pdf').show();
        floorId = $(this).val(); // Get the selected floor ID
        console.log(floorId);
        details(); // Call details function to filter assets
    });

    function details() {
        // Build the AJAX request URL
        var url = '/dashboard/report/asset/details/';

        // Make the AJAX request
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                location_id: locationId, // Include the location ID
                building_id: buildingId, // Include the building ID
                floor_id: floorId // Include the floor ID
            },
            success: function (data) {
                // Clear the existing table rows
                $('#assetTableBody').empty();
                console.log(data);

                if (data && data.length > 0) {
                    $.each(data, function (index, asset) {
                        $('#assetTableBody').append(`
                            <tr>
                                <th scope="row">${index + 1}</th>
                                <td><span>Name: ${asset.unit_name}</span> <br> <span>Code: ${asset.asset_code}</span></td>
                                <td>${asset.building.building_name}</td>
                                <td>${asset.floor.floor_name}</td>
                                <td>${asset.location.name}</td>
                                <td>${asset.is_book == 0 ? asset.available_from ?asset.available_from : "N/A" : 'Booked' }</td>
                                <td>${asset.monthly_rent}</td>
                            </tr>
                        `);
                    });
                } else {
                    console.log('No asset found for the selected filters.');
                    $('#assetTableBody').append(`
                        <tr>
                            <td colspan="7" class="text-center">No assets available.</td>
                        </tr>
                    `);
                }
            },
            error: function () {
                console.log('Error fetching asset details.');
            }
        });
    }

    $('#btn_download_asset_pdf').on('click', function () {
        var locationId = $('#location_id').val() || 0; // Default to 0 if not selected
        var buildingId = $('#building_id').val() || 0; // Default to 0 if not selected
        var floorId = $('#floor_id').val() || 0; // Default to 0 if not selected

        window.location.href = `/dashboard/report/asset/pdf/${locationId}/${buildingId}/${floorId}`;
    });


});


</script>
@endpush
