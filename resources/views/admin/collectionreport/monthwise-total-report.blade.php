@extends('layouts.admin')
@section('title','Report')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Collection Report</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Month Wise</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Month Wise Collection Report</h5>
                <form class="ms-auto position-relative">
                    <div class="ms-auto">

                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <div class="col-12">
                    <div class="col-12 d-flex align-items-end">
                        <div class="col-auto">
                            <label for="selected_month">Select Month</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="selected_month" name="month" placeholder="Select month and year" readonly>
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-auto ms-3">
                            <label for="building">Building</label>
                            <select class="form-select" name="building" id="building">
                                <option value="0">Select a Building</option>
                                @foreach ($buildings as $building)
                                <option value="{{ $building->id }}">{{ $building->building_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-auto ms-3">
                            <button type="button" class="btn btn-primary" id="btn_download_pdf" style="display: none;">Download PDF</button>
                        </div>
                    </div>



                </div>

                <div id="assetList" class="mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Client</th>
                                <th scope="col">Building</th>
                                <th scope="col">Asset</th>
                                <th scope="col">Collectable Amount</th>
                                <th scope="col">Collection Amount</th>
                                <th scope="col">Due</th>
                            </tr>
                        </thead>
                        <tbody id="assetTableBody">
                            <!-- Dynamic rows will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!--end page main-->
@endsection

@push('script')
 <!-- Bootstrap Datepicker JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
 <script>
    $(document).ready(function () {
        let selectedMonth = 0;
        let selectedBuilding = 0;

        $('#selected_month').datepicker({
                format: "mm/yyyy", // Month and year only
                minViewMode: 1,    // Only view month and year
                autoclose: true,   // Close picker automatically after selection
                todayHighlight: true
        });

        // Handle month change
        $('#selected_month').on('change', function () {
            $('#btn_download_pdf').show();
            selectedMonth = $(this).val() || 0; // Default to 0 if not selected
            details(); // Call details function to filter assets
        });

        // Handle building change
        $('#building').on('change', function () {
            $('#btn_download_pdf').show();
            selectedBuilding = $(this).val() || 0; // Default to 0 if not selected
            details(); // Call details function to filter assets
        });

        function details() {
            console.log(selectedMonth);


            // Make the AJAX request
            $.ajax({
                url: '/dashboard/collectionreport/monthwise/details/',
                type: 'GET',
                data: {
                    selected_month: selectedMonth,
                    selected_building: selectedBuilding,
                },
                success: function (data) {
                    $('#assetTableBody').empty();

                    if (data && data.length > 0) {
                        $.each(data, function (index, collection) {
                            $('#assetTableBody').append(`
                                <tr>
                                    <th scope="row">${index + 1}</th>
                                    <td>${collection.collection_date}</td>
                                    <td>${collection.customer.client_name}</td>
                                    <td>${collection.building.building_name}</td>
                                    <td>${collection.asset.unit_name}</td>
                                    <td>${collection.payable_amount}</td>
                                    <td>${collection.collection_amount}</td>
                                    <td>${collection.due_amount}</td>
                                </tr>
                            `);
                        });
                    } else {
                        $('#assetTableBody').append(`
                            <tr>
                                <td colspan="7" class="text-center">No assets available.</td>
                            </tr>
                        `);
                    }
                },
                error: function () {
                    console.log('Error fetching asset details.');
                }
            });
        }

        $('#btn_download_pdf').on('click', function () {
            var collectionMonth = $('#selected_month').val() || '0/0'; // Default to 0 if not selected
            var selectedBuilding = $('#building').val() || 0; // Default to 0 if not selected

            let formattedCollectionMonth = collectionMonth.replace('/', '-');
            window.location.href = `/dashboard/collectionreport/monthwise/pdf/${formattedCollectionMonth}/${selectedBuilding}`;
        });

    });
</script>

@endpush
