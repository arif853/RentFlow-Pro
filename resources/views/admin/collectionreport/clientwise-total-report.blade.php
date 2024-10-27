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
                    <li class="breadcrumb-item active" aria-current="page">Client Wise</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Client Wise Collection Report</h5>
                <form class="ms-auto position-relative">
                    <div class="ms-auto">

                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <div class="col-12">
                    <div class="col-12 d-flex align-items-end">
                        <div class="col-3">
                            <label for="selected_client">Search Client</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="selected_client" name="client" placeholder="Select Client">
                            </div>
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
<script>
    $(document).ready(function () {

    // Handle building change
    $('#selected_client').on('keyup', function () {
        $('#btn_download_pdf').show();
        selectedClient = $(this).val(); // Get the selected building ID
        details(); // Call details function to filter assets
    });


    function details() {
        // Make the AJAX request
        $.ajax({
            url: '/dashboard/collectionreport/Clientwise/details/',
            type: 'GET',
            data: {
                selected_client: selectedClient,
            },
            success: function (data) {

                console.log(data);

                $('#assetTableBody').empty();

                if (data && data.length > 0) {
                    $.each(data, function (index, collection) {
                        $('#assetTableBody').append(`
                            <tr>
                                <th scope="row">${index + 1}</th>
                                <td>${collection.asset.unit_name}</td>
                                <td>${collection.total_payable_amount}</td>
                                <td>${collection.total_collection_amount}</td>
                                <td>${collection.total_due_amount}</td>
                            </tr>
                        `);
                    });
                } else {
                    console.log('No asset found for the selected filters.');
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

        var collectionClient = $('#selected_client').val() || 0;
        window.location.href = `/dashboard/collectionreport/Clientwise/pdf/${collectionClient}`;

    });


});


</script>
@endpush
