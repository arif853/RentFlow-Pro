@extends('layouts.admin')
@section('title','Edit Complex')
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
                    <li class="breadcrumb-item active" aria-current="page">Edit Complex</li>
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
                        <h5 class="mb-2 mb-sm-0">Update Complex</h5>
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

                                    <form class="row g-3" action="{{ route('building.update', $building->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <!--Row-1-->
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Complex Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Complex Name"
                                            name="building_name" required id="buildingName" value="{{$building->building_name}}">
                                            @error('building_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Complex Type</label>
                                            <select class="form-select" name="building_type"  value="{{$building->building_type}}">
                                                <option value="commercial" {{$building->building_type == 'commercial'? 'selected' : ''}}>Commercial</option>
                                                <option value="residential" {{$building->building_type == 'residential'? 'selected' : ''}}>Residential</option>
                                                <option value="teen-sheed" {{$building->building_type == 'teen-sheed'? 'selected' : ''}}>Teen Sheed</option>
                                                <option value="semi-paka" {{$building->building_type == 'semi-paka'? 'selected' : ''}}>Semi Paka</option>
                                                <option value="others" {{$building->building_type == 'others'? 'selected' : ''}}>Others</option>
                                            </select>
                                            @error('building_type')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Total Floor </label>
                                            <input type="text" class="form-control" placeholder="Total Floor" name="total_floor"
                                            value="{{$building->total_floor}}">
                                            @error('total_floor')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <!--Row-2-->
                                        <!--Row-4-->
                                        <div class="col-12 col-md-9">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" placeholder="Address" name="address"
                                            value="{{$building->address}}" >
                                            @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <label class="form-label">Complex Code</label>
                                            <input type="text" class="form-control" placeholder="Complex Code"
                                            name="building_code" readonly id="buildingCode" readonly  value="{{$building->building_code}}">
                                            @error('building_code')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <!--Row-5-->

                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Area/Location</label>
                                            <select class="form-select" name="location_id" id="locationSelect">
                                                <option value="">Select Building</option>
                                                @foreach($locations as $location)
                                                    <option value="{{ $location->id }}" {{ $building->location_id == $location->id ? 'selected' : '' }}>
                                                        {{ $location->name }}
                                                    </option>
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
                                                <option value="{{$employee->id}}" {{$building->employee_id == $employee->id ? 'selected' : ''}}>{{$employee->name}} - {{$employee->employee_code}}</option>
                                                @endforeach
                                            </select>
                                            @error('employee_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <!-- Location Detail Card -->
                                        <div class="col-12 col-md-6">
                                            <div class="card border shadow-none radius-10" id="locationDetailCard" >
                                                <div class="card-body">
                                                    @if ($building->location)
                                                        <div class="row">
                                                            <div class="col-12 col-md-5">
                                                                {!! $building->location->google_map_link !!}
                                                            </div>
                                                            <div class="col-12 col-md-7">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Location:</span>
                                                                        <span>{{ $building->location->name }}</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Location ID:</span>
                                                                        <span>{{ $building->location->location_code }}</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent">
                                                                        <span class="side-title">Zip Code:</span>
                                                                        <span>{{ $building->location->zip_code }}</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            {{-- Showing selected employee details --}}

                                            <div id="employee-details-card" class="card border shadow-none radius-10" style="margin-bottom: 0px; display:none">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="">
                                                            <img src="" width="80" alt="">
                                                        </div>
                                                        <div class="">
                                                            <ul class="list-group list-group-flush">
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Name:</span>
                                                                    <span></span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Designation:</span>
                                                                    <span></span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Phone:</span>
                                                                    <span></span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent">
                                                                    <span class="side-title">Date of Joining:</span>
                                                                    <span></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="">
                                                            <img src="" width="80" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="employee-details-card2" class="card border shadow-none radius-10" style="margin-bottom: 0px;">
                                                <div class="card-body">
                                                    @if ($building->employee)
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="">
                                                            <img src="{{asset('storage/employee/image/' . $employee->passport_photo)}}" width="80" alt="">
                                                        </div>
                                                        <div class="">
                                                            <ul class="list-group list-group-flush">
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Name:</span>
                                                                    <span>{{$building->employee->name}}</span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Designation:</span>
                                                                    <span>{{$building->employee->designation->designation_name}}</span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Phone:</span>
                                                                    <span>{{$building->employee->phone}}</span>
                                                                </li>
                                                                <li
                                                                    class="d-flex justify-content-between align-items-center bg-transparent">
                                                                    <span class="side-title">Date of Joining:</span>
                                                                    <span>{{ \Carbon\Carbon::parse($building->employee->date_of_joining)->format('d M Y') }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="">
                                                            <img src="{{asset('storage/employee/image/' . $employee->signature)}}" width="80" alt="">
                                                        </div>
                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Security guard Name</label>
                                            <input type="text" class="form-control" placeholder="Security guard Name"
                                            name="security_guard_name"  value="{{$building->security_guard_name}}">
                                            @error('security_guard_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">guard Contact Number</label>
                                            <input type="text" class="form-control" placeholder="guard Contact Number"
                                             name="guard_contact_number"  value="{{$building->guard_contact_number}}">
                                            @error('guard_contact_number')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Gate Open Time </label>
                                            <input type="time" class="form-control" placeholder="Gate Open Time "
                                            name="gate_open_time"  value="{{$building->gate_open_time}}">
                                            @error('gate_open_time')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Gate Close Time</label>
                                            <input type="time" class="form-control" placeholder="Gate Close Time"
                                            name="gate_close_time"  value="{{$building->gate_close_time}}">
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
                                            <button class="btn btn-primary" type="submit">Update</button>
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

        $('#locationSelect').on('change', function () {
            var locationId = $(this).val();

            // Empty the content of the location details card
            $('#locationDetailCard').empty();

            if (locationId) {
                // Make an AJAX request to get location details
                $.ajax({
                    url: '/dashboard/locations/location-list/' + locationId,
                    method: 'GET',
                    success: function (data) {

                        if (data) {
                            // Populate the location details card with new data
                            var locationCardContent = `
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-5">
                                            ${data.google_map_link}
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <ul class="list-group list-group-flush">
                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                    <span class="side-title">Location:</span>
                                                    <span>${data.name}</span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                    <span class="side-title">Location ID:</span>
                                                    <span>${data.location_code}</span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center bg-transparent">
                                                    <span class="side-title">Zip Code:</span>
                                                    <span>${data.zip_code}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            `;

                            // Add the new content to the card
                            $('#locationDetailCard').html(locationCardContent);
                            $('#locationDetailCard').show();
                        } else {
                            // Hide the location details card if no data is returned
                            $('#locationDetailCard').hide();
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle any errors from the AJAX request
                        console.error('Error fetching location details:', error);
                        $('#locationDetailCard').hide();
                    }
                });
            } else {
                // Hide the location details card if no location is selected
                $('#locationDetailCard').hide();
            }
        });

        $('#employee-select').on('change', function () {
            var employeeId = $(this).val();
            $('#employee-details-card2').hide();
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
