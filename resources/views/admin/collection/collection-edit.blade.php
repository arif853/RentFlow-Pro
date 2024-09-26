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
                                                {{-- <select name="building_id" id="building_id" class="form-control">
                                                    <option value="">Select Complex</option>
                                                    @foreach ($buildings as $building)
                                                    <option value="{{$building->id}}">{{$building->building_name}}</option>

                                                    @endforeach
                                                </select> --}}
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
                                                <label for="collection_type" class="form-label">Collection Type</label>
                                                <select class="form-select" id="collection_type" name="collection_type">
                                                    <option value="">Select Collection Type</option>
                                                    <option value="1"
                                                        {{ old('collection_type', $collection->collection_type) == '1' ? 'selected' : '' }}>
                                                        Day Wise</option>
                                                    <option value="2"
                                                        {{ old('collection_type', $collection->collection_type) == '2' ? 'selected' : '' }}>
                                                        Month Wise</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <!-- Day Wise Date Pickers in One Row, Responsive -->
                                                <div id="day_wise_dates" class="form-group row" style="display:none;">
                                                    <div class="col-12 col-sm-6">
                                                        <label for="from_date">From Date</label>
                                                        <input type="date" id="from_date" class="form-control"
                                                            placeholder="Select From Date" name="from_date"
                                                            value="{{$collection->from_date}}">
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <label for="to_date">To Date</label>
                                                        <input type="date" id="to_date" class="form-control"
                                                            placeholder="Select To Date" name="to_date"
                                                            value="{{$collection->to_date}}">
                                                    </div>
                                                    <div class="mt-3 d-flex">
                                                        Total days: <p id="days_difference">{{$collection->duration}}
                                                        </p>
                                                        <input type="hidden" name="duration"
                                                            value="{{$collection->duration}}" id="duration_days">
                                                    </div>
                                                </div>

                                                <!-- Month Wise Selection -->
                                                <div class="col-12" id="month_wise_dates" style="display:none;">
                                                    <label>Select Month</label>
                                                    <select class="form-select col-12" id="selected_month" name="month">
                                                        <option class="" value="">Select a month</option>
                                                        <option value="January"
                                                            {{ $collection->month == 'January' ? 'selected' : '' }}>
                                                            January</option>
                                                        <option value="February"
                                                            {{ $collection->month == 'February' ? 'selected' : '' }}>
                                                            February</option>
                                                        <option value="March"
                                                            {{ $collection->month == 'March' ? 'selected' : '' }}>March
                                                        </option>
                                                        <option value="April"
                                                            {{ $collection->month == 'April' ? 'selected' : '' }}>April
                                                        </option>
                                                        <option value="May"
                                                            {{ $collection->month == 'May' ? 'selected' : '' }}>May
                                                        </option>
                                                        <option value="June"
                                                            {{ $collection->month == 'June' ? 'selected' : '' }}>June
                                                        </option>
                                                        <option value="July"
                                                            {{ $collection->month == 'July' ? 'selected' : '' }}>July
                                                        </option>
                                                        <option value="August"
                                                            {{ $collection->month == 'August' ? 'selected' : '' }}>
                                                            August</option>
                                                        <option value="September"
                                                            {{ $collection->month == 'September' ? 'selected' : '' }}>
                                                            September</option>
                                                        <option value="October"
                                                            {{ $collection->month == 'October' ? 'selected' : '' }}>
                                                            October</option>
                                                        <option value="November"
                                                            {{ $collection->month == 'November' ? 'selected' : '' }}>
                                                            November</option>
                                                        <option value="December"
                                                            {{ $collection->month == 'December' ? 'selected' : '' }}>
                                                            December</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Total Payable Rent</label>
                                                <input type="number" class="form-control"
                                                    placeholder="Total Payable Rent" id="total_payable_amount"
                                                    value="{{$collection->payable_amount}}" readonly
                                                    name="payable_amount">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Collection Amount</label>
                                                <input type="number" class="form-control" name="collection_amount"
                                                    placeholder="Collection Amount" id="collection_amount"
                                                    value="{{$collection->collection_amount}}">
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

        // Initialize based on the selected option on page load
        var selectedType = $('#collection_type').val();
        toggleDateFields(selectedType);

        // Trigger change event when collection_type is changed
        $('#collection_type').on('change', function () {
            var selectedType = $(this).val();
            toggleDateFields(selectedType);
        });

        function toggleDateFields(selectedType) {
            if (selectedType == '1') {
                $('#day_wise_dates').show(); // Show date pickers for day wise
                $('#month_wise_dates').hide(); // Hide month selection
                $('#selected_month').val(''); // Clear the month field
            } else if (selectedType == '2') {
                $('#day_wise_dates').hide(); // Hide date pickers
                $('#month_wise_dates').show(); // Show month divs
                $('#from_date').val(''); // Clear from_date field
                $('#to_date').val(''); // Clear to_date field
                $('#days_difference').text(''); // Clear days_difference text
            } else {
                $('#day_wise_dates').hide(); // Hide both if none selected
                $('#month_wise_dates').hide();
            }
        }




        function calculateDays() {
            var fromDate = $('#from_date').val();
            var toDate = $('#to_date').val();

            if (fromDate && toDate) {
                var start = new Date(fromDate);
                var end = new Date(toDate);
                var timeDiff = end - start;

                // Calculate days
                var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Convert milliseconds to days
                if (daysDiff < 0) {
                    // Display the result
                    $('#days_difference').text('');
                    alert("Invalid date input");
                } else {
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






        // const today = new Date();
        // const year = today.getFullYear();
        // const month = String(today.getMonth() + 1).padStart(2, '0'); // Month is zero-based
        // const day = String(today.getDate()).padStart(2, '0');

        // // Format today's date as yyyy-mm-dd
        // const formattedDate = `${year}-${month}-${day}`;

        // // Set the value of the date input to today's date
        // $('#collection_date').val(formattedDate);



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
