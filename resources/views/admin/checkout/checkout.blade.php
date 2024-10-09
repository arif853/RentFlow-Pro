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
                                <button type="submit" class="btn btn-primary" id="confirmApproveBtn">Send Request</button>
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
                                            <div class="col-12" id="month_wise_dates">
                                                <label for="selected_month" class="form-label">Select Month</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" id="selected_month" name="month" placeholder="Select month and year" readonly>
                                                    <span class="input-group-text">
                                                        <i class="bi bi-calendar"></i>
                                                    </span>
                                                </div>
                                                <!-- Display validation error if any -->
                                                @error('month')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div>
                                                <input type="date" id="availability_date" name="availability_date"
                                                    value="" style="display: none;">
                                            </div>

                                            <div>
                                                <label class="form-label">Notes</label>
                                                <input type="hidden" name="employee_id"
                                                    id="employeeId">
                                                <textarea class="form-control" id="notes" name="notes" placeholder="Notes"></textarea>
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
                                            <input id="customer_id" type="number" name="customer_id" style="display:none;">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function () {

        $('#selected_month').datepicker({
        format: "mm/yyyy", // Month and year format
        minViewMode: 1,    // Only allow selecting month and year
        autoclose: true,   // Automatically close the picker after selection
        todayHighlight: true // Highlight today's date
    });

        $('#building_id').on('change', function () {
            var buildingId = $(this).val();

            var buildingName = this.options[this.selectedIndex].getAttribute('data-building-name');
            $('#building_name').text(buildingName);
            // console.log(buildingId);

            var employeeId = this.options[this.selectedIndex].getAttribute('data-employee_id');
            // console.log('employeeId',employeeId);


            // Get Employee Name
            $('#employeeId').val('');
            $('#employee_name').val('');
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
                    url: '/dashboard/collection/checkout/get-asset/' + buildingId,
                    type: 'GET',
                    success: function (data) {
                    console.log('assets', data);

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
            $('#due').text('');
            $('#advanced').text('');
            $('#created_at').val('');
            $('#client_name').text('');
            $('#client_phone').text('');
            $('#client_email').text('');
            $('#birthday').text('');
            $('#gender').text('');
            $('#nid_number').text('');
            $('#customer_id').val('');
            // console.log(assetId);
            if (assetId) {
                $.ajax({
                    url: '/dashboard/collection/checkout/get-asset-details/' + assetId,
                    type: 'GET',
                    success: function (data) {
                        // console.log( data);
                        data.bookings.forEach(item => {
                            // console.log('Collections-due: ',item.customer.collection.due_amount);

                            const customer = item.customer; // Accessing the customer object

                            // console.log('Rent-advance: ',customer.customer_info.advance_amount_type);

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
                            fetchTotalDueAmount(customer.id);
                        });
                    }
                });
            }
        });
    });

            // Function to fetch the total due amount
        function fetchTotalDueAmount(customerId) {

            $.ajax({
                url: '/dashboard/collection/get/collection/details/' + customerId, // Update with your actual endpoint
                type: 'GET',
                success: function (collectionData) {

                    let totalDueAmount = 0;
                    collectionData.forEach(collectionItem => {

                        totalDueAmount += parseFloat(collectionItem.due_amount) || 0;
                    });
                    $('#due').text(totalDueAmount);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching collection data:', error);
                }
            });
        }



        $('#selected_month').on('change', function () {
            const selectedDate = $(this).val(); // Get the selected month in "mm/yyyy" format
            const [month, year] = selectedDate.split('/'); // Split into month and year

            let selectedYear = parseInt(year);
            let selectedMonth = parseInt(month); // Convert to number

            // If the selected month is December (12), roll over to January of the next year
            if (selectedMonth === 12) {
                selectedMonth = 1;  // January
                selectedYear += 1;  // Next year
            } else {
                // For other months, just increment the month
                selectedMonth += 1;
            }

            // The first day of the next month
            const nextMonth = String(selectedMonth).padStart(2, '0');  // Ensure it's always 2 digits
            const day = '01';  // Always the first day of the next month

            // Format the date as 'YYYY-MM-DD' (for availability_date)
            const formattedDate = `${selectedYear}-${nextMonth}-${day}`;

            // Set the availability_date input value to the formatted date
            $('#availability_date').val(formattedDate);

            // For debugging
            console.log("Selected Date:", selectedDate);
            console.log("Availability Date:", formattedDate);
        });

        $(document).on('click', '#confirmApproveBtn', function (e) {
            e.preventDefault(); // Prevent the default anchor behavior
            var url = $(this).attr('href'); // Get the href link

            Swal.fire({
                title: "Do you want to request a checkout ?",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "Approve",
                denyButtonText: `Deny!`
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, redirect to the route
                    window.location.href = url;
                    Swal.fire("Thank You", " Checkout Request Cofirmed", "success");
                } else if (result.isDenied) {
                    Swal.fire("Sorry!", " Checkout Request is not confirmed", "info");
                }
            });
        });

</script>
@endpush
