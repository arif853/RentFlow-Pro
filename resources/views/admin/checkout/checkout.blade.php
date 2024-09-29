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
                                                <label class="form-label">Asset Name</label>
                                                <select class="form-select" name="asset_id" id="unit_id">
                                                    <!-- Asset will be dynamically populated here -->
                                                    @foreach ($assets as $asset)
                                                    <option value="{{$asset->id}}">{{$asset->unit_name}}</option>
                                                    @endforeach
                                                </select>
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
                                                <input type="date" id="availability_date" name="availability_date" value="" style="display: none;">
                                            </div>

                                            <div>
                                                <label class="form-label">Notes</label>
                                                <input type="hidden" name="employee_id" value="{{$asset->employee_id}}" id="employeeId">
                                                <input type="text" class="form-control" id="notes" name="notes" value=""
                                                    placeholder="Notes">
                                            </div>

                                        </div>
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
