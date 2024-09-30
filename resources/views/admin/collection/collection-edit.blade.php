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
                    <li class="breadcrumb-item active" aria-current="page">Edit Collection</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <form action="{{route('collection.update', $collection->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">Edit Collection</h5>
                            <div class="ms-auto">
                                <button type="submit" class="btn btn-primary">Update</button>
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
                                                <input class="form-control" name="building_id" id="building_id"
                                                    value="{{$collection->building->building_name}}" readonly>
                                                {{-- @error('building_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror --}}
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Asset Name</label>
                                                <input class="form-control" name="asset_id" id="unit_id"
                                                    value="{{$collection->asset->unit_name}}" readonly>
                                            </div>
                                            <div class="col-12" id="asset_info">
                                                <div class="card border shadow-none radius-10" id=""
                                                    style="margin-bottom: 0px;">
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Unit Name :</span>
                                                                <span
                                                                    id="unit_name">{{$collection->asset->unit_name}}</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Name :</span>
                                                                <span
                                                                    id="building_name">{{$collection->building->building_name}}</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Gas Bill Type :</span>
                                                                <span
                                                                    id="gas_bill_type">{{$collection->gas_type}}</span>
                                                                <input id="gas_type" type="text" name="gas_type"
                                                                    style="display:none;">
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Electricity Bill Type :</span>
                                                                <span
                                                                    id="electricity_bill_type">{{$collection->electricity_type}}</span>
                                                                <input id="electricity_type" type="text"
                                                                    name="electricity_type" style="display:none;">
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Water Bill Type :</span>
                                                                <span
                                                                    id="water_bill_type">{{$collection->water_type}}</span>
                                                                <input id="water_type" type="text" name="water_type"
                                                                    style="display:none;">
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Monthly Rent :</span>
                                                                <span
                                                                    id="monthly_rent">{{$collection->asset->monthly_rent}}</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Service Charge :</span>
                                                                <span
                                                                    id="service_charge">{{$collection->asset->service_charge}}</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Others Charge :</span>
                                                                <span
                                                                    id="others_charge">{{$collection->asset->others_charge}}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card border shadow-none radius-10" id=""
                                                    style="margin-bottom: 0px; margin-top: 20px;">
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Customer Name :</span>
                                                                <span id="client_name">{{$collection->customer->client_name}}</span>
                                                                <input id="customer_id" type="text" name="customer_id" style="display:none;">
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Phone Number :</span>
                                                                <span id="client_phone">{{$collection->customer->client_phone}}</span>
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
                                                <input type="date" class="form-control" name="collection_date"
                                                    id="collection_date" value="{{$collection->collection_date}}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Employee</label>
                                                <input type="hidden" name="employee_id" value="" id="employeeId">
                                                <input type="text" class="form-control" id="employee_name"
                                                    value="{{$collection->employee->name}}" placeholder="Employee"
                                                    readonly>
                                            </div>

                                            <div class="col-12">

                                                <!-- Month Wise Selection -->
                                                <div class="col-12" id="month_wise_dates">
                                                    <label>Select Month</label>
                                                    <input type="text" class="form-control" id="selected_month"
                                                        name="month" value="{{$collection->month}}" readonly>
                                                </div>
                                            </div>

                                            @if ($collection->gas_type ==="Post Paid" || $collection->electricity_type
                                            ==="Post Paid" ||$collection->water_type ==="Post Paid")
                                            <div class="col-12">
                                                <div id="bill_type">
                                                    <h5>Pre Paid</h5>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    @if ($collection->gas_type === "Post Paid")
                                                    <div class="col-3" id="gas_type_show" style="margin-right:10px;">
                                                        <label class="form-label">Gas Bill</label>
                                                        <input type="number" class="form-label" placeholder="Gas Bill"
                                                            id="gas_amount" value="{{$collection->gas_amount}}"
                                                            name="gas_amount" readonly>
                                                    </div>
                                                    @endif
                                                    @if ($collection->electricity_type === "Post Paid")
                                                    <div class="col-3" id="electricity_type_show"
                                                        style="margin-right:10px;">
                                                        <label class="form-label">Electricity Bill</label>
                                                        <input type="number" class="form-label"
                                                            placeholder="Electricity Bill" id="electricity_amount"
                                                            value="{{$collection->electricity_amount}}"
                                                            name="electricity_amount" readonly>
                                                    </div>
                                                    @endif
                                                    @if ($collection->water_type === "Post Paid")
                                                    <div class="col-3" id="water_type_show" style="margin-right:10px;">
                                                        <label class="form-label">Water Bill</label>
                                                        <input type="number" class="form-label" placeholder="Water Bill"
                                                            id="water_amount" value="{{$collection->water_amount}}"
                                                            name="water_amount" readonly>
                                                    </div>
                                                    @endif



                                                </div>
                                            </div>
                                            @endif


                                            <div class="col-12">
                                                <label class="form-label">Total Payable Rent</label>
                                                <input type="number" class="form-control"
                                                    placeholder="Total Payable Rent" id="total_payable_amount"
                                                    value="{{$collection->payable_amount}}" readonly
                                                    name="payable_amount">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Previous Collection Amount</label>
                                                <input type="number" class="form-control" name="prev_collection_amount"
                                                    placeholder="Previous Collection Amount" id="prev_collection_amount"
                                                    value="{{$collection->collection_amount}}" readonly>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">New Collection Amount</label>
                                                <input type="number" class="form-control" name="new_collection_amount"
                                                    placeholder="New Collection Amount" id="new_collection_amount" value="">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Total Collection Amount</label>
                                                <input type="number" class="form-control" name="collection_amount"
                                                    placeholder="Total Collection Amount" id="collection_amount"
                                                    value="" readonly>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Due</label>
                                                <input type="number" class="form-control" name="due_amount"
                                                    placeholder="Due Amount" id="due_amount" value="" readonly>
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
        $('#new_collection_amount').on('keyup',
            function () {

                $('#collection_amount').val(
                    parseFloat($('#prev_collection_amount').val() ||
                        0) +
                    parseFloat($('#new_collection_amount').val() || 0)
                );

                $('#due_amount').val(
                    parseFloat($('#total_payable_amount').val() ||
                        0) -
                    parseFloat($('#collection_amount').val() || 0)
                );
                if ($('#due_amount').val() < 0) {
                    alert(
                        "Warning: Due amount is negative! Please check the collection amount."
                    );
                }
            });

    });

</script>
@endpush
