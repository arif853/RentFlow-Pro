@extends('layouts.admin')
@section('title', $asset->asset_code)
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
                    <li class="breadcrumb-item active" aria-current="page">{{$asset->unit_name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-2 mb-sm-0">Asset Details</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Unit Name :</span>
                            <span>{{$asset->unit_name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Unit Size : </span>
                            <span>{{$asset->unit_size}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Unit View :</span>
                            <span>{{$asset->unit_view}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Complex :</span>
                            @if($asset->building)
                            <span>{{$asset->building->building_name}} <br> {{$asset->building->building_code}}</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Floor :</span>
                            @if($asset->floor)
                            <span>{{$asset->floor->floor_name}}, {{$asset->floor->floor_size}}</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Area/Location Name : </span>
                            @if($asset->location)
                            <span> {{$asset->location->name}} <br> {{$asset->location->location_code}}</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Monthly Rent :</span>
                            <span>{{$asset->monthly_rent}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Service Charge :</span>
                            <span>{{$asset->service_charge}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Other Charge :</span>
                            <span>{{$asset->others_charge}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Description :</span>
                            <span>{{$asset->others_description}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Gate Open Time :</span>
                            <span>{{ \Carbon\Carbon::parse($asset->available_from)->format('d M, Y') }}</span>
                        </li>
                    </ul>
                    <div class="row mt-4">
                        <div class="col-12 col-lg-6">

                        </div>
                        <div class="col-12 col-lg-6">
                            @if($asset->location)
                            <img src="{{asset('storage/locations/')}}" class="img-fluid mb-3" width="100%" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($asset->employee)
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-2 mb-sm-0">Employee/Manager Details</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3 text-center">
                        <div class="">
                            <img src="{{asset('storage/employee/image/'.$asset->employee->passport_photo)}}" width="100"
                                alt="">
                        </div>
                        <div class="">
                            <ul class="list-group list-group-flush">
                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                    <span class="side-title">Name:</span>
                                    <span>{{$asset->employee->name}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                    <span class="side-title">Designation:</span>
                                    <span>{{$asset->employee->designation->designation_name}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                    <span class="side-title">Phone:</span>
                                    <span>{{$asset->employee->phone}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center bg-transparent">
                                    <span class="side-title">Date of Joining: </span>
                                    <span>{{ \Carbon\Carbon::parse($asset->employee->date_of_joining)->format('d M Y') }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="">
                            <img src="{{asset('storage/employee/image/'.$asset->employee->signature)}}" width="80"
                                alt="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-2 mb-sm-0">Untility Facility</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Lift Facility Info :</span>
                            <span>{{$asset->lift_facility}}</span>
                            {{-- <span>Owner: {{$asset->gas_owner_part_amount}}, Rental:
                            {{$asset->gas_rental_part_amount}}</span> --}}
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Gas Info :</span>
                            <span>{{$asset->gas_type}}</span>
                            @if ($asset->gas_type == 'Partial')

                            <span>Owner: {{$asset->gas_owner_part_amount}}, Rental:
                                {{$asset->gas_rental_part_amount}}</span>
                            @endif
                        </li>

                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Electricity Info :</span>
                            <span>{{$asset->electricity_type}}</span>
                            @if ($asset->electricity_type == 'Partial')
                            <span>Owner: {{$asset->e_owner_part_amount}}, Rental:
                                {{$asset->e_rental_part_amount}}</span>
                            @endif
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Water Info :</span>
                            <span>{{$asset->water_type}}</span>
                            @if ($asset->water_type == 'Partial')
                            <span>Owner: {{$asset->water_owner_part_amount}}, Rental:
                                {{$asset->water_rental_part_amount}}</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        @endif
        @if($asset->rooms)
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-2 mb-sm-0">Room Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($asset->rooms as $key => $room)
                        <div class="col-6 col-lg-4">
                            <div class="card shadow-sm border-0 overflow-hidden">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h6>Room {{$key+1}}</h6>
                                    </div>
                                    <div class="d-flex align-items-center gap-4 text-center">
                                        <div class="">
                                            <img src="{{asset('storage/room_images/'.$room->room_image)}}" width="100"
                                                alt="">
                                        </div>
                                        <div class="">
                                            <ul class="list-group list-group-flush">
                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                    <span class="side-title">Room Type:</span>
                                                    <span>{{$room->roomtype->roomType}}</span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                    <span class="side-title">Room Size:</span>
                                                    <span>{{$room->room_size}}</span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                    <span class="side-title">Facilities:</span>
                                                        <span class="text-end">
                                                            AC: <span class="{{$room->aircondition == 1 ? "text-success": "text-danger"}}">{{$room->aircondition == 1 ? "YES": "NO"}}</span>
                                                            <br>
                                                            Baranda: <span class="{{$room->attach_baranda == 1 ? "text-success": "text-danger"}}">{{$room->attach_baranda == 1 ? "YES": "NO"}}</span>
                                                            <br>
                                                            Toilet: <span class="{{$room->attach_toilet == 1 ? "text-success": "text-danger"}}">{{$room->attach_toilet == 1 ? "YES": "NO"}}</span>
                                                            <br>
                                                            Electricity: <span class="{{$room->electricity == 1 ? "text-success": "text-danger"}}">{{$room->electricity == 1 ? "YES": "NO"}}</span>
                                                            <br>
                                                            Windows: <span class="{{$room->has_window == 1 ? "text-success": "text-danger"}}">{{$room->has_window == 1 ? "YES": "NO"}}</span>
                                                            <br>
                                                            Others: <span class="{{$room->others == 1 ? "text-success": "text-danger"}}">{{$room->others == 1 ? "YES": "NO"}}</span>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
        @endif

    </div>
    <!--end row-->
</main>
<!--end page main-->
@endsection
