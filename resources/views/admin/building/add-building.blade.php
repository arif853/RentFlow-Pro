@extends('layouts.admin')
@section('title','Add Builing')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Complex</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Complex</li>
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
                        <h5 class="mb-2 mb-sm-0">Add Complex</h5>
                        <div class="ms-auto">
                            <a href="{{route('building.index')}}" class="btn btn-secondary">Manage Complex</a>
                            {{-- <button type="button" class="btn btn-primary">Add Complex</button> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 col-lg-12">
                            <div class="card shadow-none bg-light border">
                                <div class="card-body">

                                    <form class="row g-3" action="{{route('building.store')}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <!--Row-1-->
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Complex Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Complex Name"
                                            name="building_name" required id="buildingName" value="{{ old('building_name') }}">
                                            @error('building_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Complex Type</label>
                                            <select class="form-select" name="building_type">
                                                <option value="commercial">Commercial</option>
                                                <option value="residential">Residential</option>
                                                <option value="teen-sheed">Teen Sheed</option>
                                                <option value="semi-paka">Semi Paka</option>
                                                <option value="others">Others</option>
                                            </select>
                                            @error('building_type')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Total Floor</label>
                                            <input type="text" class="form-control" placeholder="Total Floor" name="total_floor" >
                                            @error('total_floor')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <!--Row-2-->
                                        <!--Row-4-->
                                        <div class="col-12 col-md-9">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" placeholder="Address" name="address" >
                                            @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <label class="form-label">Complex Code</label>
                                            <input type="text" class="form-control" placeholder="Complex Code"
                                            name="building_code" readonly id="buildingCode" readonly value="{{ old('building_code') }}">
                                            @error('building_code')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <!--Row-5-->
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Area/Location</label>
                                            <select id="location-select" name="location_id" class="form-select">
                                                <option value="">Select a Location</option>
                                                @foreach($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('location_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Manager/Employee Name </label>
                                            <select class="form-select" name="employee_id" id="employee-select">
                                                <option value="">Select Employee</option>
                                                @foreach ($employees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->name}} - {{$employee->employee_code}}</option>
                                                @endforeach
                                            </select>
                                            @error('employee_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">
                                            {{-- Showing selected loaction details --}}
                                            <div id="location-details-card" class="card border shadow-none radius-10" style="margin-bottom: 0px; display: none;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        {{-- <div class="col-12 col-md-4 ">
                                                            <div id="google-map" style="width: 100px; height:100px;">

                                                            </div>
                                                            <iframe id="google-map" src="" width="100%" height="100" style="border:0;" allowfullscreen=""
                                                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                        </div> --}}
                                                        <div class="col-12 col-md-12">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Location:</span>
                                                                    <span id="location-name"></span>
                                                                </li>
                                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Location ID:</span>
                                                                    <span id="location-id"></span>
                                                                </li>
                                                                <li class="d-flex justify-content-between align-items-center bg-transparent">
                                                                    <span class="side-title">Zip Code:</span>
                                                                    <span id="zip-code"></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            {{-- Showing selected employee details --}}
                                            <div id="employee-details-card" class="card border shadow-none radius-10" style="margin-bottom: 0px; display:none">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="">
                                                            <img src="assets/images/Man.jpg" width="80" alt="">
                                                        </div>
                                                        <div class="">
                                                            <ul class="list-group list-group-flush">
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Name:</span>
                                                                    <span>Antone Wintheiser</span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Designation:</span>
                                                                    <span>Manager</span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Phone:</span>
                                                                    <span>+880 222 444 555</span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent">
                                                                    <span class="side-title">Date of Joining:</span>
                                                                    <span>15 Aug 2024</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="">
                                                            <img src="assets/images/Signature.png" width="80" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Security guard Name</label>
                                            <input type="text" class="form-control" placeholder="Security guard Name" name="security_guard_name" >
                                            @error('security_guard_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">guard Contact Number</label>
                                            <input type="text" class="form-control" placeholder="guard Contact Number" name="guard_contact_number">
                                            @error('guard_contact_number')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Gate Open Time </label>
                                            <input type="time" class="form-control" placeholder="Gate Open Time " name="gate_open_time">
                                            @error('gate_open_time')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Gate Close Time</label>
                                            <input type="time" class="form-control" placeholder="Gate Close Time" name="gate_close_time">
                                            @error('gate_close_time')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" name="status">
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </form>
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

        $('#buildingName').on('keyup', function() {
            // Get the building name value
            let buildingName = $(this).val().trim();

            // Generate the building code only if the building name has at least 4 characters
            if (buildingName.length >= 1) {
                // Extract the first 4 characters of the building name
                let namePart = buildingName.substring(0, 4).toUpperCase();

                // Generate a random 4-digit number
                let randomNumber = Math.floor(1000 + Math.random() * 9000);

                // Get the current year and extract the last digit
                let yearLastDigit = new Date().getFullYear().toString().slice(-2);

                // Combine to form the building code
                let buildingCode = "BL" + yearLastDigit + '-' + randomNumber;

                // Set the generated code in the building code input
                $('#buildingCode').val(buildingCode);
            } else {
                // Clear the building code if the name is less than 4 characters
                $('#buildingCode').val('');
            }
        });

        $('#location-select').on('change', function () {
            var locationId = $(this).val();

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
                            // $('#google-map').html(data.google_map_link).attr('width', '100%')
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

        $('#employee-select').on('change', function () {
            var employeeId = $(this).val();

            // Hide the details card if the default option is selected
            if (employeeId === '') {
                $('#employee-details-card').hide();
                return;
            }

            // AJAX request to fetch employee details
            $.ajax({
                url: '/dashboard/building/employee_details/' + employeeId,
                method: 'GET',
                success: function (data) {
                    // Show and update the details card with fetched data
                    if (data) {
                        $('#employee-details-card').show();
                        $('#employee-details-card img:first').attr('src', data.photo); // Update the employee photo
                        $('#employee-details-card img:last').attr('src', data.signature); // Update the employee signature
                        $('#employee-details-card').find('li:nth-child(1) span:last').text(data.name); // Update name
                        $('#employee-details-card').find('li:nth-child(2) span:last').text(data.designation); // Update designation
                        $('#employee-details-card').find('li:nth-child(3) span:last').text(data.phone); // Update phone
                        $('#employee-details-card').find('li:nth-child(4) span:last').text(data.date_of_joining); // Update joining date
                    } else {
                        $('#employee-details-card').hide();
                    }
                },
                error: function () {
                    $('#employee-details-card').hide(); // Hide the card if an error occurs
                }
            });
        });
    });
</script>
@endpush
