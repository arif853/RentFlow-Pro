@extends('layouts.admin')
@section('title', 'Customer Details - '. $customer->booking->customer->client_name)
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Customer</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$customer->booking->customer->client_name}}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-7">

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-2 mb-sm-0">Rentant Information</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Name :</span>
                            <span>{{$customer->booking->customer->client_name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Personal Info :</span>
                            <span>
                                <p style="margin: 2px; padding:0;" class="d-flex justify-content-between">
                                    Birthday: <span>{{$customer->booking->customer->birthday ?? 'N/A'}}</span>
                                </p>
                                <p style="margin: 2px; padding:0;" class="d-flex justify-content-between">
                                    Gender: <span>{{$customer->booking->customer->gender?? 'N/A'}}</span>
                                </p>
                                <p style="margin: 2px; padding:0;" class="d-flex justify-content-between">
                                    Education: <span>{{$customer->booking->customer->education_status ?? 'N/A'}}</span>
                                </p>
                                <p style="margin: 2px; padding:0;" class="d-flex justify-content-between">
                                    Religion<span>{{$customer->booking->customer->religion ?? 'N/A'}}</span>
                                </p>
                                <p style="margin: 2px; padding:0;" class="d-flex justify-content-between">
                                    Blood:<span>{{$customer->booking->customer->blood_group ?? 'N/A'}}</span>
                                </p>
                                <p style="margin: 2px; padding:0;" class="d-flex justify-content-between">
                                    Father's Name: <span>{{$customer->booking->customer->father_name ?? 'N/A'}}</span>
                                </p>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Contact :</span>
                            <span>
                                <a
                                    href="tel:{{$customer->booking->customer->client_phone}}">{{$customer->booking->customer->client_phone}}</a>
                                <a
                                    href="mailto:{{$customer->booking->customer->client_email}}">{{$customer->booking->customer->client_email}}</a>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Address :</span>
                            <span>
                                Present Address: <a
                                    href="#">{{$customer->booking->customer->present_address ?? 'N/A'}}</a> <br>
                                Permanent Address: <a
                                    href="#">{{$customer->booking->customer->permanent_address ?? 'N/A'}}</a>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Occupation :</span>
                            <span>
                                @if ($customer->booking->customer->occupation == 'Job Holder')
                                <h6>{{$customer->booking->customer->occupation}}</h6>
                                <p style="margin: 2px; padding:0;">Company:
                                    <span>{{$customer->booking->customer->job_place_name ?? 'N/A'}}</span></p>
                                <p style="margin: 2px; padding:0;">Address:
                                    <span>{{$customer->booking->customer->job_place_address?? 'N/A'}}</span></p>
                                @else
                                {{$customer->booking->customer->occupation}}
                                @endif
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Marital Status :</span>
                            <span>
                                @if ($customer->booking->customer->marriage_status == 'Married')
                                <h6>{{$customer->booking->customer->marriage_status ?? 'N/A'}}</h6>
                                <p style="margin: 2px; padding:0;">Spouse Name:
                                    <span>{{$customer->booking->customer->spouse_name ?? 'N/A'}}</span></p>
                                <p style="margin: 2px; padding:0;">Phone:
                                    <span>{{$customer->booking->customer->spouse_phone ?? 'N/A'}}</span></p>
                                <p style="margin: 2px; padding:0;">NID:
                                    <span>{{$customer->booking->customer->spouse_nid?? 'N/A'}}</span></p>
                                @else
                                <h6>{{$customer->booking->customer->marriage_status ?? 'N/A'}}</h6>
                                @endif
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Family Members :</span>
                            <span>

                                @php
                                $familymembers =
                                DB::table('family_member')->where('customer_extra_id',$customer->booking->customer->customerInfo->id)->get();
                                // echo $familymembers;
                                @endphp
                                @if ($familymembers)
                                @foreach ($familymembers as $member)
                                <p style="margin: 2px; padding:0;">Name: <span>{{$member->member_name ?? 'N/A'}}</span>,
                                </p>
                                <span style="margin: 2px; padding:0;">Phone:
                                    <span>{{$member->member_phone ?? 'N/A'}}</span></span>,
                                <span style="margin: 2px; padding:0;">Relation:
                                    <span>{{$member->member_relation?? 'N/A'}}</span></span>,
                                <span style="margin: 2px; padding:0;">Gender:
                                    <span>{{$member->member_gender?? 'N/A'}}</span></span>. <br>
                                @endforeach
                                @else
                                <h6>N/A</h6>
                                @endif
                            </span>
                        </li>
                        @if ($customer->booking->customer->customerInfo->home_maid == 'Yes')
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Home Worker :</span>
                            <span>

                                <p style="margin: 2px; padding:0;">Name:
                                    <span>{{$customer->booking->customer->customerInfo->home_maid_name ?? 'N/A'}}</span>,
                                </p>
                                <span style="margin: 2px; padding:0;">Phone:
                                    <span>{{$customer->booking->customer->customerInfo->home_maid_phone ?? 'N/A'}}</span></span>,
                                <span style="margin: 2px; padding:0;">Address:
                                    <span>{{$customer->booking->customer->customerInfo->home_maid_address ?? 'N/A'}}</span></span>,
                                <span style="margin: 2px; padding:0;">Nid:
                                    <span>{{$customer->booking->customer->customerInfo->home_maid_nid?? 'N/A'}}</span></span>.
                                <br>

                            </span>
                        </li>
                        @endif
                        @if ($customer->booking->customer->customerInfo->driver == 'Yes')
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Driver :</span>
                            <span>

                                <p style="margin: 2px; padding:0;">Name:
                                    <span>{{$customer->booking->customer->customerInfo->driver_name ?? 'N/A'}}</span>,
                                </p>
                                <span style="margin: 2px; padding:0;">Phone:
                                    <span>{{$customer->booking->customer->customerInfo->driver_phone ?? 'N/A'}}</span></span>,
                                <span style="margin: 2px; padding:0;">Address:
                                    <span>{{$customer->booking->customer->customerInfo->driver_address ?? 'N/A'}}</span></span>,
                                <span style="margin: 2px; padding:0;">Nid:
                                    <span>{{$customer->booking->customer->customerInfo->driver_nid?? 'N/A'}}</span></span>.
                                <br>

                            </span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">NID :</span>
                            <span>{{$customer->booking->customer->nid_number}}</span>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-2 mb-sm-0">Rent Information</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Actual Rent :</span>
                            <span>{{$customer->booking->customer->customerInfo->actual_rent}}</span>
                        </li>
                        @if ($customer->booking->customer->customerInfo->advance_amount_type == 'Yes')
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Advance Amount :</span>
                            <span>{{$customer->booking->customer->customerInfo->advance_amount}}</span>
                        </li>
                        @endif
                        @if ($customer->booking->customer->customerInfo->adjustable_amount_type == 'Yes')
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Advance Amount :</span>
                            <span>{{$customer->booking->customer->customerInfo->adjustable_amount}}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Monthly Rent Collection date :</span>
                            <span>{{Carbon\Carbon::parse($customer->booking->customer->customerInfo->collection_date)->format('d M, Y')}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent ">
                            <span class="side-title">Rent Collection Last Date :</span>
                            <span>{{Carbon\Carbon::parse($customer->booking->customer->customerInfo->collection_last_date)->format('d M, Y')}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @if($customer->booking->asset->employee)
        <div class="col-12 col-lg-5">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-2 mb-sm-0">Booking Details</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Unit Name :</span>
                            <span>{{$customer->booking->asset->unit_name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Unit Size : </span>
                            <span>{{$customer->booking->asset->unit_size}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Unit View :</span>
                            <span>{{$customer->booking->asset->unit_view}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Complex :</span>
                            @if($customer->booking->building)
                            <span>{{$customer->booking->building->building_name}} <br> <strong>Code:</strong>
                                {{$customer->booking->building->building_code}}</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Floor :</span>
                            @if($customer->booking->floor)
                            <span>{{$customer->booking->floor->floor_name}},
                                {{$customer->booking->floor->floor_size}}</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Area/Location Name : </span>
                            @if($customer->booking->location)
                            <span> {{$customer->booking->location->name}} <br><strong>Code:</strong>
                                {{$customer->booking->location->location_code}}</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Monthly Rent :</span>
                            <span>{{$customer->booking->asset->monthly_rent}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Service Charge :</span>
                            <span>{{$customer->booking->asset->service_charge}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Other Charge :</span>
                            <span>{{$customer->booking->asset->others_charge}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Description :</span>
                            <span>{{$customer->booking->asset->others_description}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Gate Open Time :</span>
                            <span>{{ \Carbon\Carbon::parse($customer->booking->asset->available_from)->format('d M, Y') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-2 mb-sm-0">Employee/Manager Details</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3 text-center">
                        <div class="">
                            <img src="{{asset('storage/employee/image/'.$customer->booking->asset->employee->passport_photo)}}"
                                width="100" alt="">
                        </div>
                        <div class="">
                            <ul class="list-group list-group-flush">
                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                    <span class="side-title">Name:</span>
                                    <span>{{$customer->booking->asset->employee->name}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                    <span class="side-title">Designation:</span>
                                    <span>{{$customer->booking->asset->employee->designation->designation_name}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                    <span class="side-title">Phone:</span>
                                    <span>{{$customer->booking->asset->employee->phone}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center bg-transparent">
                                    <span class="side-title">Date of Joining: </span>
                                    <span>{{ \Carbon\Carbon::parse($customer->booking->asset->employee->date_of_joining)->format('d M Y') }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="">
                            <img src="{{asset('storage/employee/image/'.$customer->booking->asset->employee->signature)}}"
                                width="80" alt="">
                        </div>
                    </div>
                </div>

            </div>

        </div>
        @endif

    </div>
    <!--end row-->
    <div class="row">
        <div class="col col-lg-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    @foreach ($groupedCollections as $year => $collections)
                        <h5 class="text-left mb-4">Year: {{ $year }}</h5>
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            @foreach ($collections as $key => $collection)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link " data-bs-toggle="tab" href="#{{ $collection->month }}_{{$year}}" role="tab" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-calendar font-18 me-1'></i></div>
                                            <div class="tab-title">{{ $collection->month }}</div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content py-3">
                            @foreach ($collections as $key => $collection)
                                <div class="tab-pane fade" id="{{ $collection->month }}_{{$year}}" role="tabpanel">
                                    <div class="card shadow-sm border-0 overflow-hidden">
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                    <span class="side-title">Collection Date:</span>
                                                    <span>{{ $collection->collection_date }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                    <span class="side-title">Monthly Rent:</span>
                                                    <span>{{ $collection->asset->monthly_rent }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                    <span class="side-title">Service Charge:</span>
                                                    <span>{{ $collection->asset->service_charge }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                    <span class="side-title">Other Charge:</span>
                                                    <span>{{ $collection->asset->others_charge }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                    <span class="side-title">Total Payable Rent:</span>
                                                    <span>{{ $collection->asset->service_charge }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                    <span class="side-title">Collection Amount:</span>
                                                    <span>{{ $collection->collection_amount }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                    <span class="side-title">Due:</span>
                                                    <span>{{ $collection->due_amount }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>




</main>
<!--end page main-->
@endsection
