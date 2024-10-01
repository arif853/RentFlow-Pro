@extends('layouts.admin')
@section('title', 'new collection')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Checkout Request</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">New Checkout Request</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <form action="{{route('checkout.store')}}" method="POST">
        @csrf
        @method("POST")
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">New Checkout Request</h5>
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
                                            <div class="col-12">
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
                                            </div>
                                            <div>
                                                <input type="date" id="availability_date" name="availability_date"
                                                    value="" style="display: none;">
                                            </div>

                                            <div>
                                                <label class="form-label">Notes</label>
                                                <input type="hidden" name="employee_id" value=""
                                                    id="employeeId">
                                                <input type="text" class="form-control" id="notes" name="notes" value=""
                                                    placeholder="Notes">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="card border shadow-none radius-10" id=""
                                style="margin-bottom: 0px;">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            <span class="side-title">Created At :</span>
                                            {{-- <span id="created_at">---</span> --}}
                                            <input id="created_at" type="date" name="created_at" value="" readonly>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            <span class="side-title">Customer Name :</span>
                                            <span id="client_name">---</span>
                                            <input id="customer_id" type="number" name="customer_id" value="" style="display:none;">
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            <span class="side-title">Phone Number :</span>
                                            <span id="client_phone">---</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            <span class="side-title">Email :</span>
                                            <span id="client_email">---</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            <span class="side-title">Birthday :</span>
                                            <span id="birthday">---</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            <span class="side-title">Gender :</span>
                                            <span id="gender">---</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            <span class="side-title">NID Number :</span>
                                            <span id="nid_number">---</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            <span class="side-title">Advanced :</span>
                                            <span id="advanced">---</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            <span class="side-title">Due :</span>
                                            <span id="due">---</span>
                                        </li>
                                    </ul>
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
                        // console.log('ajax data',data.id);

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

        $('#unit_id').on('change', function () {
            var assetId = $(this).val();
            // console.log(assetId);
            if (assetId) {
                $.ajax({
                    url: '/dashboard/collection/get-asset-details/' + assetId,
                    type: 'GET',
                    success: function (data) {
                        // console.log( data);
                        data.bookings.forEach(item => {
                            console.log('Collections-due: ',item.customer.collection.due_amount);
                            $('#due').text(item.customer.collection.due_amount);

                            const customer = item.customer; // Accessing the customer object

                            console.log('Rent-advance: ',customer.customer_info.advance_amount_type);

                            if(customer.customer_info.advance_amount_type ==='Yes'){
                                $('#advanced').text(customer.customer_info.advance_amount);
                            }else{
                                $('#advanced').text(customer.customer_info.advance_amount_type);
                            }

                            const date = new Date(item.created_at);

                            // Format the date as YYYY-MM-DD for input type="date"
                            const year = date.getFullYear();
                            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed
                            const day = String(date.getDate()).padStart(2, '0');

                            const formattedDate = `${year}-${month}-${day}`;

                            $('#created_at').val(formattedDate);
                            $('#client_name').text(customer.client_name);
                            $('#client_phone').text(customer.client_phone);
                            $('#client_email').text(customer.client_email);
                            $('#birthday').text(customer.birthday);
                            $('#gender').text(customer.gender);
                            $('#nid_number').text(customer.nid_number);
                            $('#customer_id').val(customer.id);


                        });
                    }
                });
            }
        });
    });



    document.getElementById('selected_month').addEventListener('change', function () {
        const monthMap = {
            "January": 0,
            "February": 1,
            "March": 2,
            "April": 3,
            "May": 4,
            "June": 5,
            "July": 6,
            "August": 7,
            "September": 8,
            "October": 9,
            "November": 10,
            "December": 11
        };

        const selectedMonth = this.value;
        const currentYear = new Date().getFullYear();

        const selectedMonthIndex = monthMap[selectedMonth];
        let nextMonthDate = new Date(currentYear, selectedMonthIndex + 1, 1); // Next month's 1st day

        const year = nextMonthDate.getFullYear(); // e.g., 2024
        const day = String(nextMonthDate.getDate()).padStart(2, '0'); // Day of the month
        const month = String(nextMonthDate.getMonth() + 1).padStart(2, '0'); // Month (0-based)

        // Format the date as 'YYYY-DD-MM'
        const formattedDate = `${year}-${day}-${month}`;

        // console.log(formattedDate);
        document.getElementById('availability_date').value = formattedDate;

    });

</script>
@endpush
