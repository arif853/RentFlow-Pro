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
                    <div class="ms-auto"></div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <div class="col-12">
                    <div class="col-12 d-flex align-items-end">
                        <div class="col-3 position-relative">
                            <label for="customer">Customer</label>
                            <input type="text" id="customerSearch" class="form-control" placeholder="Search for a customer..." />
                            <div id="customerList" class="list-group" style="display: none;"></div> <!-- Custom dropdown list -->
                            <input type="hidden" name="customer" id="selectedCustomer" /> <!-- Hidden input for selected ID -->
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
                                <th scope="col">Month</th>
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
<style>
    #customerList {
        border: 1px solid #ccc;
        max-height: 200px;
        overflow-y: auto;
        background: white;
        position: absolute;
        z-index: 1000;
        width: 100%; /* Match input width */
        display: none; /* Hide initially */
    }

    .customer-item {
        padding: 0.5rem;
        cursor: pointer;
    }

    .customer-item:hover {
        background-color: #f1f1f1;
    }
</style>
<script>
    $(document).ready(function () {
        const customers = @json($customers); // Pass customers from PHP to JavaScript
        const customerSearch = $('#customerSearch');
        const customerList = $('#customerList');
        const selectedCustomer = $('#selectedCustomer');

        // Function to filter and display customer options
        customerSearch.on('input', function() {
            const searchTerm = customerSearch.val().toLowerCase();
            customerList.empty(); // Clear previous results

            if (searchTerm) {
                const filteredCustomers = customers.filter(customer =>
                    customer.client_name.toLowerCase().includes(searchTerm)
                );

                filteredCustomers.forEach(customer => {
                    const listItem = $('<div>')
                        .addClass('customer-item list-group-item')
                        .text(`${customer.client_name} - ${customer.client_phone}`) // Display name and phone number
                        .data('id', customer.id)
                        .on('click', function() {
                            customerSearch.val(customer.client_name); // Set input to selected customer name
                            selectedCustomer.val(customer.id); // Store selected customer ID
                            customerList.hide(); // Hide the dropdown

                            // Log the selected customer ID
                            console.log("Selected Customer ID:", customer.id); // Log the ID

                            details(customer.id);
                        });

                    customerList.append(listItem);
                });

                customerList.toggle(filteredCustomers.length > 0); // Show/hide dropdown
            } else {
                customerList.hide(); // Hide if no search term
            }
        });

        // Hide the dropdown when clicking outside
        $(document).on('click', function(event) {
            if (!$(event.target).closest('#customerSearch').length) {
                customerList.hide(); // Hide the list
            }
        });



        function details($customerId) {
                $('#btn_download_pdf').show();
            // Make the AJAX request
            $.ajax({
                url: '/dashboard/collectionreport/clientwise/details/',
                type: 'GET',
                data: {
                    customer_id: $customerId,
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
                                    <td>${collection.month}</td>
                                    <td>${collection.payable_amount}</td>
                                    <td>${collection.collection_amount}</td>
                                    <td>${collection.due_amount}</td>
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

            var selectedCustomer = $('#selectedCustomer').val() || 0;
            window.location.href = `/dashboard/collectionreport/clientwise/pdf/${selectedCustomer}/`;
        });
    });
</script>

@endpush
