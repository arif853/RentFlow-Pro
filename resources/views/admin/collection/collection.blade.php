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
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">New Collection</h5>
                        <div class="ms-auto">
                            <a href="manage-employee.php" class="btn btn-secondary">Upcoming Collection</a>
                            <button type="button" class="btn btn-primary">Publish</button>
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
                                            <select class="form-select" name="complex_id" id="complex_id">
                                                <!-- Asset will be dynamically populated here -->
                                                <option value="">Select Complex</option>
                                                @foreach ($buildings as $building)
                                                <option value="{{$building->id}}">{{$building->building_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Asset Name</label>
                                            <select class="form-select" name="unit_name" id="unit_id">
                                                <!-- Asset will be dynamically populated here -->
                                                <option value="">Select Asset Name</option>

                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="card border shadow-none radius-10" id=""
                                                style="margin-bottom: 0px;">
                                                <div class="card-body">
                                                    <ul class="list-group list-group-flush">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                            <span class="side-title">Asset ID :</span>
                                                            <span id="building-name">Concord Tower</span>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                            <span class="side-title">Employee Name :</span>
                                                            <span id="building-type">Commercial</span>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                            <span class="side-title">Building :</span>
                                                            <span id="total-floor">12</span>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                            <span class="side-title">Rooms :</span>
                                                            <span id="building-code">BL-2001</span>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                                            <span class="side-title">Address :</span>
                                                            <span id="building-address">522/B, North Shahjahanpur,
                                                                Dhaka</span>
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
                                            <input type="date" class="form-control" placeholder="Collection Date">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Employee</label>
                                            <input type="text" class="form-control" placeholder="Employee">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Collection Type</label>
                                            <select class="form-select">
                                                <option> Day Wise</option>
                                                <option>Month Wise</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Rent Amount</label>
                                            <input type="number" class="form-control" placeholder="Rent Amount">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Collection Amount</label>
                                            <input type="number" class="form-control" placeholder="Collection Amount">
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
    <!--end row-->
</main>
<!--end page main-->
@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('#complex_id').on('change', function() {
            var ComplexId = $(this).val();
            console.log(ComplexId);

            const selectunitid = document.querySelector('#unit_id');
            selectunitid.innerHTML = ''; // Clear previous orders
            const userOrders = orders.filter(order => order.userId === userId);
            // @foreach ($assets as $asset)
            //    <option value="{{$asset->unit_id}}">{{$asset->unit_name}}</option>
            //  @endforeach

            userOrders.forEach(order => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order.orderId}</td>
                    <td>${order.product}</td>
                    <td>${order.amount}</td>
                `;
                orderTableBody.appendChild(row);
            });

        });

    });
</script>
@endpush
