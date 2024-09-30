@extends('layouts.admin')
@section('title','Collection Details')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">collection</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    {{-- <li class="breadcrumb-item active" aria-current="page">{{$collection->unit_name}}</li> --}}
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-2 mb-sm-0">collection Details</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Complex :</span>
                            @if($collection->building)
                            <span>{{$collection->building->building_name}} <br>
                                {{$collection->building->building_code}}</span>
                            @endif
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Unit Name :</span>
                            <span>{{$collection->asset->unit_name}}</span>
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Customer Name :</span>
                            <span>{{$collection->customer->client_name}}</span>
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Customer Phone Number :</span>
                            <span>{{$collection->customer->client_phone}}</span>
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Employee Name :</span>
                            <span>{{$collection->employee ? $collection->employee->name : 'N/A'}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Collection Date : </span>
                            <span>{{$collection->collection_date}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Gas Bill Type :</span>
                            <span id="gas_bill_type">{{$collection->gas_type}}</span>
                            <input id="gas_type" type="text" name="gas_type" style="display:none;">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Electricity Bill Type :</span>
                            <span id="electricity_bill_type">{{$collection->electricity_type}}</span>
                            <input id="electricity_type" type="text" name="electricity_type" style="display:none;">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Water Bill Type :</span>
                            <span id="water_bill_type">{{$collection->water_type}}</span>
                            <input id="water_type" type="text" name="water_type" style="display:none;">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Monthly Rent :</span>
                            <span>{{$collection->asset->monthly_rent}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Service Charge :</span>
                            <span>{{$collection->asset->service_charge}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Other Charge :</span>
                            <span>{{$collection->asset->others_charge}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Total Payable Rent :</span>
                            <span>{{$collection->payable_amount}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Collection amount :</span>
                            <span>{{$collection->collection_amount}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Due :</span>
                            <span>{{$collection->due_amount}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!--end row-->
</main>
<!--end page main-->
@endsection
