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
                    <li class="breadcrumb-item active" aria-current="page">New Collection</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <form action="{{route('collection.store')}}" method="POST">
        @csrf
        @method("POST")
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">New Collection</h5>
                            <div class="ms-auto">
                                <button type="submit" class="btn btn-primary">Save</button>
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
                                                <select class="form-select" name="building_id" id="building_id">
                                                    <!-- Asset will be dynamically populated here -->
                                                    <option value="">Select Complex</option>
                                                    @foreach ($buildings as $building)
                                                    <option value="{{$building->id}}"
                                                        data-building-name="{{ $building->building_name }}"
                                                        data-employee_id="{{$building->employee_id}}">
                                                        {{$building->building_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('building_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Asset Name</label>
                                                <select class="form-select" name="asset_id" id="unit_id">
                                                    <!-- Asset will be dynamically populated here -->
                                                    <option value="">Select Asset Name</option>
                                                </select>
                                                @error('asset_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12" id="asset_info">
                                                <div class="card border shadow-none radius-10" id=""
                                                    style="margin-bottom: 0px;">
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Unit Name :</span>
                                                                <span id="unit_name">---</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Building Name :</span>
                                                                <span id="building_name">---</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Gas Bill Type :</span>
                                                                <span id="gas_bill_type">---</span>
                                                                <input id="gas_type" type="text" name="gas_type"
                                                                    style="display:none;">
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Electricity Bill Type :</span>
                                                                <span id="electricity_bill_type">---</span>
                                                                <input id="electricity_type" type="text"
                                                                    name="electricity_type" style="display:none;">
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Water Bill Type :</span>
                                                                <span id="water_bill_type">---</span>
                                                                <input id="water_type" type="text" name="water_type"
                                                                    style="display:none;">
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Monthly Rent :</span>
                                                                <span id="monthly_rent">---</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Service Charge :</span>
                                                                <span id="service_charge">---</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Others Charge :</span>
                                                                <span id="others_charge">---</span>
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
                                                                <span id="client_name">---</span>
                                                                <input id="customer_id" type="text" name="customer_id" style="display:none;">
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                                <span class="side-title">Phone Number :</span>
                                                                <span id="client_phone">---</span>
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
                                                    id="collection_date" placeholder="Collection Date">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Employee</label>
                                                <input type="hidden" name="employee_id" value="" id="employeeId">
                                                <input type="text" class="form-control" id="employee_name" value=""
                                                    placeholder="Employee" readonly>
                                            </div>
                                            <div class="col-12">
                                                <!-- Month Wise Selection -->
                                                <div class="col-12" id="month_wise_dates">
                                                    <label>Select Month</label>
                                                    <select class="form-select col-12" id="selected_month" name="month">
                                                        <option class="" value="">Select a month</option>
                                                        <option class="" value="January">January</option>
                                                        <option class="" value="February">February</option>
                                                        <option class="" value="March">March</option>
                                                        <option class="" value="April">April</option>
                                                        <option class="" value="May">May</option>
                                                        <option class="" value="June">June</option>
                                                        <option class="" value="July">July</option>
                                                        <option class="" value="August">August</option>
                                                        <option class="" value="September">September</option>
                                                        <option class="" value="October">October</option>
                                                        <option class="" value="November">November</option>
                                                        <option class="" value="December">December</option>
                                                    </select>
                                                    @error('month')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div id="bill_type" style="display:none;">
                                                    <h5>Post Paid</h5>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <div class="col-3" id="gas_type_show"
                                                        style="display:none; margin-right:10px;">
                                                        <label class="form-label">Gas Bill</label>
                                                        <input type="number" class="form-control" placeholder="Gas Bill"
                                                            id="gas_amount" value="" name="gas_amount">
                                                    </div>
                                                    <div class="col-3" id="electricity_type_show"
                                                        style="display:none; margin-right:10px;">
                                                        <label class="form-label">Electricity Bill</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Electricity Bill" id="electricity_amount"
                                                            value="" name="electricity_amount">
                                                    </div>
                                                    <div class="col-3" id="water_type_show"
                                                        style="display:none; margin-right:10px;">
                                                        <label class="form-label">Water Bill</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Water Bill" id="water_amount" value=""
                                                            name="water_amount">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Total Payable Rent</label>
                                                <input type="number" class="form-control"
                                                    placeholder="Total Payable Rent" id="total_payable_amount" value=""
                                                    readonly name="payable_amount">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Collection Amount</label>
                                                <input type="number" class="form-control" name="collection_amount"
                                                    placeholder="Collection Amount" id="collection_amount">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Due</label>
                                                <input type="number" class="form-control" name="due_amount"
                                                    placeholder="Collection Amount" id="due_amount" readonly>
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


        $('#building_id').on('change', function () {
            var buildingId = $(this).val();

            var buildingName = this.options[this.selectedIndex].getAttribute('data-building-name');
            $('#building_name').text(buildingName);
            // console.log(buildingId);

            var employeeId = this.options[this.selectedIndex].getAttribute('data-employee_id');
            // console.log('employeeId',employeeId);


            // Get Employee Name
            if (employeeId) {
                $.ajax({
                    url: '/dashboard/collection/get-employee-details/' + employeeId,
                    type: 'GET',
                    success: function (data) {
                        $('#employeeId').val(data.id);
                        $('#employee_name').val(data.name);
                        // console.log('ajax data',data.name);

                    }
                });
            }


            $('#unit_id').html('');
            if (buildingId) {
                $.ajax({
                    url: '/dashboard/collection/get-asset/' + buildingId,
                    type: 'GET',
                    success: function (data) {
                        $('#unit_id').html(
                            '<option value="">Select Asset Name</option>');
                        $.each(data, function (key, value) {
                            $('#unit_id').append('<option value="' + value.id +
                                '">' + value.unit_name + '</option>');
                        });
                    }
                });
            }
        });


        // Get Details
        $('#unit_id').on('change', function () {
            var assetId = $(this).val();


            // console.log(assetId);
            if (assetId) {

                $.ajax({
                    url: '/dashboard/collection/get-asset-details/' + assetId,
                    type: 'GET',
                    success: function (data) {
                        // console.log('ajax data', data);
                        // console.log(data.bookings);
                        data.bookings.forEach(item => {
                            const customer = item.customer; // Accessing the customer object
                            console.log(customer);
                            $('#client_name').text(customer.client_name);
                            $('#client_phone').text(customer.client_phone);
                            $('#customer_id').val(customer.id);

                        });

                        $('#unit_name').text(data.unit_name);
                        $('#gas_bill_type').text(data.gas_type);
                        $('#electricity_bill_type').text(data.electricity_type);
                        $('#water_bill_type').text(data.water_type);
                        $('#gas_type').val(data.gas_type);
                        $('#electricity_type').val(data.electricity_type);
                        $('#water_type').val(data.water_type);
                        $('#monthly_rent').text(data.monthly_rent);
                        $('#service_charge').text(data.service_charge);
                        $('#others_charge').text(data.others_charge);
                        if (data.gas_type === 'Post Paid' || data.electricity_type ===
                            'Post Paid' || data.water_type === 'Post Paid') {
                            $('#bill_type').show();
                        } else {
                            $('#bill_type').hide();
                        }

                        if (data.gas_type === 'Post Paid') {
                            $('#gas_type_show').show();
                        } else {
                            $('#gas_type_show').hide();
                        }
                        if (data.electricity_type === 'Post Paid') {
                            $('#electricity_type_show').show();
                        } else {
                            $('#electricity_type_show').hide();
                        }
                        if (data.water_type === 'Post Paid') {
                            $('#water_type_show').show();
                        } else {
                            $('#water_type_show').hide();
                        }
                        $('#total_payable_amount').val(
                            parseFloat(data.monthly_rent || 0) +
                            parseFloat(data.service_charge || 0) +
                            parseFloat(data.others_charge || 0)
                        );

                        $('#gas_amount, #electricity_amount, #water_amount').on('keyup',
                            function () {
                                $('#total_payable_amount').val(
                                    parseFloat(data.monthly_rent || 0) +
                                    parseFloat(data.service_charge || 0) +
                                    parseFloat(data.others_charge || 0) +
                                    parseFloat($('#gas_amount').val() || 0) +
                                    parseFloat($('#electricity_amount').val() ||
                                        0) +
                                    parseFloat($('#water_amount').val() || 0)
                                );
                            });

                        $('#collection_amount').on('keyup',
                            function () {
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
                    }
                });
            }
        });






        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Month is zero-based
        const day = String(today.getDate()).padStart(2, '0');

        // Format today's date as yyyy-mm-dd
        const formattedDate = `${year}-${month}-${day}`;

        // Set the value of the date input to today's date
        $('#collection_date').val(formattedDate);


    });

</script>
@endpush
