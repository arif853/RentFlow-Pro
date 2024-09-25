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
                                                <input type="date" class="form-control" name="collection_date" id="collection_date" placeholder="Collection Date">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Employee</label>
                                                <input type="hidden" name="employee_id" value="" id="employeeId">
                                                <input type="text" class="form-control" id="employee_name" value=""
                                                    placeholder="Employee" readonly>
                                            </div>
                                            <div class="col-12">
                                                <label for="collection_type" class="form-label">Collection Type</label>
                                                <select class="form-select" id="collection_type" name="collection_type">
                                                    <option value="">Select Collection Type</option>
                                                    <option value="1"> Day Wise</option>
                                                    <option value="2">Month Wise</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <!-- Day Wise Date Pickers in One Row, Responsive -->
                                                <div id="day_wise_dates" class="form-group row" style="display:none;">
                                                    <div class="col-12 col-sm-6">
                                                        <label for="from_date">From Date</label>
                                                        <input type="date" id="from_date" class="form-control"
                                                            placeholder="Select From Date" name="from_date">
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <label for="to_date">To Date</label>
                                                        <input type="date" id="to_date" class="form-control"
                                                            placeholder="Select To Date" name="to_date">
                                                    </div>
                                                   <div class="mt-3 d-flex">
                                                    Total days: <p id="days_difference"></p>
                                                    <input type="hidden" name="duration" value="" id="duration_days">
                                                   </div>
                                                </div>

                                                <!-- Month Wise Selection -->
                                                <div class="col-12" id="month_wise_dates" style="display:none;">
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
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Total Payable Rent</label>
                                                <input type="number" class="form-control" placeholder="Total Payable Rent"
                                                    id="total_payable_amount" value="" readonly name="payable_amount">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Collection Amount</label>
                                                <input type="number" class="form-control" name="collection_amount" placeholder="Collection Amount" id="collection_amount">
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

        // Show the appropriate section based on the selected collection type
        $('#collection_type').on('change', function () {
            var selectedType = $(this).val();

            if (selectedType == '1') {
                $('#day_wise_dates').show(); // Show date pickers for day wise
                $('#month_wise_dates').hide(); // Hide month selection
                $('#selected_month').val(''); // Hide month selection

            } else if (selectedType == '2') {
                $('#day_wise_dates').hide(); // Hide date pickers
                $('#month_wise_dates').show(); // Show month divs
                $('#from_date').val('');
                $('#to_date').val('');
                $('#days_difference').text('');
            } else {
                $('#day_wise_dates').hide(); // Hide both if none selected
                $('#month_wise_dates').hide();
            }
        });




        function calculateDays() {
            var fromDate = $('#from_date').val();
            var toDate = $('#to_date').val();

            if (fromDate && toDate) {
                var start = new Date(fromDate);
                var end = new Date(toDate);
                var timeDiff = end - start;

                // Calculate days
                var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Convert milliseconds to days
                if(daysDiff<0){
                    // Display the result
                $('#days_difference').text('');
                alert("Invalid date input");
                }else{
                // Display the result
                $('#days_difference').text(daysDiff);
                $('#duration_days').val(daysDiff);
                }

            } else {
                $('#days_difference').text(''); // Clear the result if any date is not selected
            }
        }

        // Attach change event to both date inputs
        $('#from_date, #to_date').on('change', calculateDays);




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
            console.log(assetId);
            if (assetId) {
                $.ajax({
                    url: '/dashboard/collection/get-asset-details/' + assetId,
                    type: 'GET',
                    success: function (data) {
                        // console.log('ajax data', data);
                        $('#unit_name').text(data.unit_name);
                        $('#monthly_rent').text(data.monthly_rent);
                        $('#service_charge').text(data.service_charge);
                        $('#others_charge').text(data.others_charge);
                        $('#total_payable_amount').val(
                            parseFloat(data.monthly_rent || 0) +
                            parseFloat(data.service_charge || 0) +
                            parseFloat(data.others_charge || 0)
                        );

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



        // $('#form_submit_btn').on('click', function(e) {
        //     console.log('Submit');

        //         e.preventDefault(); // Prevent the default form submission

        //         // Collecting values by ID
        //         const complexId = $('#building_id').val();
        //         const assetId = $('#unit_id').val();
        //         const collectionDate = $('#collection_date').val();
        //         const collectionType = $('#collection_type').val();
        //         const month = $('#selected_month').val();
        //         const fromDate = $('#from_date').val();
        //         const toDate = $('#to_date').val();
        //         const duration = parseInt($('#days_difference').text());
        //         const payableAmount = $('#total_payable_amount').val();
        //         const collectionAmount = $('#collection_amount').val();

        //         // console.log('complexId',complexId);
        //         // console.log('assetId',assetId);
        //         // console.log('collectionDate',collectionDate);
        //         // console.log('collectionType',collectionType);
        //         // console.log('month',month);
        //         // console.log('fromDate',fromDate);
        //         // console.log('toDate',toDate);
        //         // console.log('duration',duration);
        //         // console.log('payableAmount',payableAmount);
        //         // console.log('collectionAmount',collectionAmount);


        //         // Sending the data via AJAX
        //         $.ajax({
        //             url: '/dashboard/collection',
        //             method: 'POST',
        //             data: {
        //                 building_id: complexId,
        //                 asset_id: assetId,
        //                 collection_date: collectionDate,
        //                 collection_type: collectionType,
        //                 month: month,
        //                 from_date: fromDate,
        //                 to_date: toDate,
        //                 duration: duration,
        //                 payable_amount: payableAmount,
        //                 collection_amount: collectionAmount,
        //                 _token: '{{ csrf_token() }}' // Include CSRF token
        //             },
        //             success: function(response) {
        //                 console.log(response); // Handle success response
        //                 alert('Form submitted successfully!');
        //             },
        //             error: function(xhr) {
        //                 console.error(xhr.responseText); // Handle error response
        //                 alert('Something went wrong!');
        //             }
        //         });
        //     });



    });

</script>
@endpush
