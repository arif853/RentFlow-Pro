@extends('layouts.admin')
@section('title','Edit Asset - '.$asset->asset_code)
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
                    <li class="breadcrumb-item active" aria-current="page">Update Asset - {{$asset->asset_code}}</li>
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
                        <h5 class="mb-2 mb-sm-0">Update Asset</h5>
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
                    <form action="{{route('asset.update',$asset->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-12 col-lg-8">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <!--Row-1-->
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Unit Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Unit Name"
                                                 name="unit_name" id="unitName" required value="{{$asset->unit_name}}">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Asset Code<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Asset Code"
                                                 name="asset_code" id="" readonly required value="{{$asset->asset_code}}">
                                            </div>
                                            <!--Row-5-->
                                            <div class="col-12">
                                                <label class="form-label">Building<span class="text-danger">*</span></label>
                                                <select class="form-select" name="building_id" id="building-select" required>
                                                    <option value="">Select Building</option>
                                                    @foreach ($buildings as $building)
                                                        <option value="{{ $building->id }}" {{$asset->building_id == $building->id ? 'selected' : '' }}>{{ $building->building_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <div class="card border shadow-none radius-10" id="buildingCardDetails" style="margin-bottom: 0px; display: block;">
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Name :</span>
                                                                <span id="building-name">{{$asset->building->building_name}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Type :</span>
                                                                <span id="building-type">{{$asset->building->building_type}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Total Floor :</span>
                                                                <span id="total-floor">{{$asset->building->total_floor}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Code :</span>
                                                                <span id="building-code">{{$asset->building->building_code}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Address :</span>
                                                                <span id="building-address">{{$asset->building->address}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Security Guard Name :</span>
                                                                <span id="guard-name">{{$asset->building->security_guard_name}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Guard Contact Number :</span>
                                                                <span id="guard-contact">{{$asset->building->guard_contact_number}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Gate Open Time :</span>
                                                                <span id="gate-open-time">{{$asset->building->gate_open_time}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Gate Close Time :</span>
                                                                <span id="gate-close-time">{{$asset->building->gate_close_time}}</span>
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
                                                    <option value="{{ $floor->id }}" data-size="{{ $floor->floor_size }}" data-unit="{{ $floor->total_unit }}"
                                                        {{$asset->floor_id == $floor->id ? 'selected' : ''}}>
                                                        {{ $floor->floor_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Floor Size</label>
                                                <input type="text" class="form-control" placeholder="Floor Size" readonly id="floorSize" value="{{$asset->floor->floor_size}}">
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Total Unit</label>
                                                <input type="text" class="form-control" placeholder="Total Unit" readonly id="floorUnit" value=" {{$asset->floor->total_unit}}">
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
                                                                <select class="form-select" name="gas_type" id="gasType" >
                                                                    <option value="">Select Type</option>
                                                                    <option value="Prepaid" {{$asset->gas_type =='Prepaid' ? 'selected' : '' }}>Prepaid</option>
                                                                    <option value="Post Paid" {{$asset->gas_type =='Post Paid' ? 'selected' : '' }}>Post Paid</option>
                                                                    <option value="Partial" {{$asset->gas_type =='Partial' ? 'selected' : '' }}>Partial</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3" id="gasAmountCard" style="{{$asset->gas_type == 'Partial' ? '' : 'display: none' }}">
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Owner Part amount</label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Owner Part amount" name="gas_owner_part_amount" value="{{$asset->gas_owner_part_amount}}">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Rental Part amount </label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Rental Part amount " name="gas_rental_part_amount" value="{{$asset->gas_rental_part_amount}}">
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
                                                                    <option value="" >Selecte Option</option>
                                                                    <option value="Yes" {{$asset->lift_facility == 'Yes' ? 'selected' : ''}}>Yes</option>
                                                                    <option value="No" {{$asset->lift_facility == 'No' ? 'selected' : ''}}>No</option>
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
                                                                <select class="form-select" name="electricity_type" id="electricityType">
                                                                    <option value="Prepaid" {{$asset->electricity_type == 'Prepaid' ? 'selected' : ''}}>Prepaid</option>
                                                                    <option value="Post Paid" {{$asset->electricity_type == 'Post Paid' ? 'selected' : ''}}>Post Paid</option>
                                                                    <option value="Partial" {{$asset->electricity_type == 'Partial' ? 'selected' : ''}}>Partial</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row g-3" id="ElectricityAmountCard" style="{{$asset->electricity_type == 'Partial' ? '' : 'display: none'}}">
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Owner Part amount</label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Owner Part amount" name="e_owner_part_amount" value="{{$asset->e_owner_part_amount}}">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Rental Part amount </label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Rental Part amount " name="e_rental_part_amount" value="{{$asset->e_rental_part_amount}}">
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
                                                                    <option value="Prepaid" {{$asset->water_type == 'Prepaid' ? 'selected' : ''}}>Prepaid</option>
                                                                    <option value="Post Paid" {{$asset->water_type == 'Post Paid' ? 'selected' : ''}}>Post Paid</option>
                                                                    <option value="Partial" {{$asset->water_type == 'Partial' ? 'selected' : ''}}>Partial</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row g-3" id="waterAmountCard" style="{{$asset->water_type == 'Partial' ? '' : 'display: none'}}">
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Owner Part amount</label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Owner Part amount" name="water_owner_part_amount" value="{{$asset->water_owner_part_amount}}">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Rental Part amount </label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Rental Part amount " name="water_rental_part_amount" value="{{$asset->water_rental_part_amount}}">
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
                                                @if($asset->rooms->isNotEmpty())
                                                
                                                @foreach ($asset->rooms as $key => $room)
                                                <div class="card shadow-none border room-card">
                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                        <h6 class="mb-0">Room</h6>
                                                        <a href="#" class="btn btn-danger btn-sm remove-room-btn">Remove</a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <input type="hidden" name="room_id[{{$key}}]" value="{{$room->id}}">
                                                                <label class="form-label">Room Type</label>
                                                                <select class="form-select room-type-dropdown" name="room_type_id[{{$key}}]">
                                                                    {{-- @foreach ($roomtypes as $data) --}}
                                                                    <option value="{{$room->room_type_id}}">{{$room->roomtype->roomType}}</option>
                                                                    {{-- @endforeach --}}
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Room Size</label>
                                                                <input type="number" class="form-control" placeholder="Room Size" name="room_size[{{$key}}]" value="{{$room->room_size}}">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label">Room Picture</label>
                                                                <input type="file" class="form-control" placeholder="Room Picture" name="room_image[{{$key}}]">
                                                                <div class="mt-3 mb-2">
                                                                    <img src="{{asset('storage/room_images/'.$room->room_image)}}" alt="No image found." width="200" height="100">
                                                                </div>
                                                            </div>

                                                            <!-- Checkboxes for Room Features -->
                                                            <div class="col-12 col-md-4">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Electricity Power Enable?</span>
                                                                        <span>
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" name="electricity[{{$key}}]"
                                                                                value="{{$room->electricity}}" {{$room->electricity == 1 ? 'checked' : ''}}>
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
                                                                                            type="checkbox" {{$room->aircondition == 1 ? 'checked' : ''}}
                                                                                            id="flexSwitchCheckDefault" name="aircondition[{{$key}}]" value="{{$room->aircondition}}">
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
                                                                                            id="flexSwitchCheckDefault" name="attach_toilet[{{$key}}]"
                                                                                            {{$room->attach_toilet == 1 ? 'checked' : ''}} value="{{$room->attach_toilet}}">
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
                                                                                            type="checkbox" value="{{$room->attach_baranda}}"
                                                                                            id="flexSwitchCheckDefault" name="attach_baranda[{{$key}}]"
                                                                                            {{$room->attach_baranda == 1 ? 'checked' : ''}}>
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
                                                                                            type="checkbox" value="{{$room->has_window}}"
                                                                                            id="flexSwitchCheckDefault" name="has_window[{{$key}}]"
                                                                                            {{$room->has_window == 1 ? 'checked' : ''}}>
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
                                                                                            type="checkbox" value="{{$room->others}}"
                                                                                            id="flexSwitchCheckDefault" name="others[{{$key}}]"
                                                                                            {{$room->others == 1 ? 'checked' : ''}}>
                                                                                    </div>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                @endforeach
                                                @else
                                                    @php
                                                        $key=0;
                                                    @endphp
                                                @endif
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
                                                <select class="form-select" name="location_id" id="location-select" required>
                                                    <option value="">Select Location</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}" {{$asset->location_id == $location->id ? 'selected' : ''}}
                                                            >{{ $location->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <div class="card border shadow-none radius-10" id="location-details-card" style="margin-bottom: 0px; {{$asset->location_id ? '':'display: none;'}}">
                                                    <div class="card-body">
                                                        <div class="" id="location-map">

                                                        </div>
                                                        <div class="">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Location:</span>
                                                                    <span id="location-name">{{$asset->location->name}}</span>
                                                                </li>
                                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                    <span class="side-title">Location ID:</span>
                                                                    <span id="location-id">{{$asset->location->location_code}}</span>
                                                                </li>
                                                                <li class="d-flex justify-content-between align-items-center bg-transparent">
                                                                    <span class="side-title">Zip Code:</span>
                                                                    <span id="location-zip">{{$asset->location->zip_code}}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Unit Size </label>
                                                <input type="text" class="form-control" placeholder="Unit Size"
                                                 name="unit_size" value="{{$asset->unit_size}}">
                                            </div>
                                            <!--Row-2-->
                                            <!--Row-3-->
                                            <div class="col-12">
                                                <label class="form-label">Unit View</label>
                                                <select class="form-select" name="unit_view" >
                                                    <option value="Front Side" {{$asset->unit_view == 'Front Side'? 'selected':'' }}>Front Side</option>
                                                    <option value="Back Side" {{$asset->unit_view == 'Back Side'? 'selected':'' }}>Back Side</option>
                                                    <option value="North View" {{$asset->unit_view == 'North View'? 'selected':'' }}>North View</option>
                                                    <option value="South View" {{$asset->unit_view == 'South View'? 'selected':'' }}>South View</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Monthly Rent</label>
                                                <input type="number" class="form-control" placeholder="Monthly Rent " name="monthly_rent" value="{{$asset->monthly_rent}}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Service Charge </label>
                                                <input type="number" class="form-control" placeholder="Service Charge " name="service_charge" value="{{$asset->service_charge}}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Others Charge </label>
                                                <input type="number" class="form-control" placeholder="Others Charge " name="others_charge" value="{{$asset->others_charge}}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Available From</label>
                                                <input type="date" class="form-control" placeholder="Available From" name="available_from" value="{{$asset->available_from}}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Others Description </label>
                                                <textarea class="form-control" placeholder="Others Description " name="others_description"
                                                    rows="4" cols="4">{{$asset->others_description}}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Employee</label>
                                                <select class="form-select" name="employee_id" id="employee-select">
                                                    <option value="">Select Employee</option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}" {{$asset->employee_id == $employee->id ? 'selected' : ''}}>{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <div class="card border shadow-none radius-10" id="employee-details-card" style="margin-bottom: 0px; {{$asset->employee_id ? '' : 'display: none;'}} ">
                                                    <div class="card-body">
                                                        <div class="align-items-center">
                                                            <div class="">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Name:</span>
                                                                        <span id="employee-name">{{$asset->employee ? $asset->employee->name : ''}}</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Designation:</span>
                                                                        <span id="employee-designation">{{$asset->employee ? $asset->employee->designation->designation_name :''}}</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">ID:</span>
                                                                        <span id="employee-id">{{$asset->employee ? $asset->employee->employee_code :''}}</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Phone:</span>
                                                                        <span id="employee-phone">{{$asset->employee ? $asset->employee->phone :''}}</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Date of Joining:</span>
                                                                        <span id="employee-joining-date">{{\Carbon\Carbon::parse($asset->employee ? $asset->employee->date_of_joining : '')->format(' d-M-Y')}}</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">NID Number:</span>
                                                                        <span id="employee-nid">{{$asset->employee ? $asset->employee->nid_number :''}}</span>
                                                                    </li>
                                                                    <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                                        <span class="side-title">Present Address:</span>
                                                                        <span id="employee-address">{{$asset->employee ? $asset->employee->present_address :''}}</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Status<span class="text-danger">*</span> </label>
                                                <select class="form-select" name="status">
                                                    <option value="1" {{$asset->status == '1' ? 'selected':''}}>Active</option>
                                                    <option value="0" {{$asset->status == '0' ? 'selected':''}}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update</button>
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

            function amountCardShow(value, previewId) {
                // Show or hide the amount card based on the selected value
                if (value == 'Partial') {
                    $(previewId).show();
                } else {
                    $(previewId).hide();
                    $(previewId).find('input[type="number"]').each(function() {
                        // Set the value to 0 or null as per your requirement
                        // $(this).val(0);  // Set to 0
                        $(this).val(null);
                    });
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

              
            var key = {{$key+1}}
            // Handle the "+ New Room" button click
            $('#add-room-btn').on('click', function () {
                console.log(key);

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
                                    <select class="form-select room-type-dropdown" name="room_type_id[${key}]" required>
                                        <option value="">Select Room Type</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Room Size</label>
                                    <input type="number" class="form-control" placeholder="Room Size" name="room_size[${key}]">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Room Picture</label>
                                    <input type="file" class="form-control" placeholder="Room Picture" name="room_image[${key}]">
                                </div>
                                <!-- Checkboxes for Room Features -->
                                <div class="col-12 col-md-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                            <span class="side-title">Electricity Power Enable?</span>
                                            <span>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="electricity[${key}]">
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
                                                                id="flexSwitchCheckDefault" name="aircondition[${key}]">
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
                                                                id="flexSwitchCheckDefault" name="attach_toilet[${key}]">
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
                                                                id="flexSwitchCheckDefault" name="attach_baranda[${key}]">
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
                                                                id="flexSwitchCheckDefault" name="has_window[${key}]">
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
                                                                id="flexSwitchCheckDefault" name="others[${key}]">
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
                key++;
            });

            $('#room-cards-container').on('click', '.remove-room-btn', function () {
                $(this).closest('.room-card').remove(); // Remove the closest room card
            });

        });
    </script>
@endpush
