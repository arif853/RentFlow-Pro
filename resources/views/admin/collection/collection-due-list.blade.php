@extends('layouts.admin')
@section('title', 'Manage Collection List')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Collection</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Collection List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Manage Collection List</h5>
            </div>
            <div class="table-responsive mt-3">
                @if($collections->isEmpty())
                    <tr>No data available.</tr>
                @else
                <table class="table align-middle" id="datatable">
                    <thead class="table-secondary">
                        <tr>
                            <th>Sl</th>
                            <th>Customer Name</th>
                            <th>Complex</th>
                            <th>Asset</th>
                            <th>Employee</th>
                            <th>Collection date</th>
                            <th>Collection Month</th>
                            <th>Total payable Rent</th>
                            <th>Collection Amount</th>
                            <th>Due</th>
                            <th>Pay Due</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collections as $key => $collection)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><a href="{{route('customer.show',$collection->customer_id)}}" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-original-title="Details" aria-label="Details">{{$collection->customer->client_name}}</a></td>
                            <td>{{ $collection->building->building_name }}</td>
                            <td>{{ $collection->asset->unit_name }}</td>
                            <td>{{ $collection->employee ? $collection->employee->name : 'N/A' }}</td>
                            <td>{{ $collection->collection_date }}</td>
                            <td>{{ $collection->month }}</td>
                            <td>{{ $collection->payable_amount }}</td>
                            <td>{{ $collection->collection_amount }}</td>
                            <td>{{ $collection->due_amount }}</td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <button type="button" class="btn btn-transparent" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-placement="bottom"
                                        data-bs-original-title="Pay Due" aria-label="Pay Due"
                                        data-id="{{ $collection->id }}"
                                        data-customer="{{ $collection->customer->client_name }}"
                                        data-amount="{{ $collection->due_amount }}"
                                        data-payable="{{ $collection->payable_amount }}"
                                        data-collection="{{ $collection->collection_amount }}"
                                        data-month="{{ $collection->month }}">
                                        <i class="bi bi-cash-coin text-primary"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="paymentForm" method="POST">
            @csrf
            @method("post")
            <input type="hidden" name="collection_id" id="collectionId">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pay Due</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="customerName" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="totalPayableRent" class="form-label">Total Payable Rent</label>
                                <input type="text" class="form-control" id="totalPayableRent" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="collectionAmount" class="form-label">Collected Amount</label>
                                <input type="text" class="form-control" id="collectionAmount" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="collectionMonth" class="form-label">Collection Month</label>
                        <input type="text" class="form-control" id="collectionMonth" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="modalDueAmount" class="form-label">Due Amount</label>
                        <input type="text" class="form-control" id="modalDueAmount" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="paymentDate" class="form-label">Payment Date</label>
                        <input type="date" class="form-control" id="paymentDate" name="collection_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="paymentAmount" class="form-label">Payment Amount</label>
                        <input type="number" class="form-control" id="paymentAmount" placeholder="Enter amount" name="collection_amount" required>
                    </div>
                    <div class="mb-3">
                        <label for="dueAmount" class="form-label">Due</label>
                        <input type="number" class="form-control" id="dueAmount" name="due_amount" placeholder="Enter amount" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Pay</button>
                </div>
            </div>
        </form>
    </div>
</div>

</main>
<!--end page main-->
@endsection

@push('script')
<script>
    $(document).ready(function () {
        const payButtons = $('[data-bs-toggle="modal"]');

        payButtons.each(function () {
            $(this).on('click', function () {
                const customerName = $(this).data('customer');
                const dueAmount = $(this).data('amount');
                const collectionId = $(this).data('id');
                const totalPayableRent = $(this).data('payable');
                const collectionAmount = $(this).data('collection');
                const collectionMonth = $(this).data('month');

                $('#customerName').val(customerName);
                $('#modalDueAmount').val(dueAmount);
                $('#collectionId').val(collectionId);

                // Set today's date in the payment date input
                const today = new Date().toISOString().split('T')[0];
                $('#paymentDate').val(today);

                // Set values for total payable rent, collection amount, and month
                $('#totalPayableRent').val(totalPayableRent);
                $('#collectionAmount').val(collectionAmount);
                $('#collectionMonth').val(collectionMonth);

                $('#paymentAmount').on('keyup', function () {
                    const updatedDueAmount = dueAmount - $(this).val();
                    $('#dueAmount').val(updatedDueAmount);

                    if (updatedDueAmount < 0) {
                        alert("Warning: Due amount is negative! Please check the collection amount.");
                        $('#paymentAmount').val('');
                        $('#dueAmount').val('');
                        event.preventDefault();
                    }
                });

                // Update the form action URL dynamically if needed
                // $('#paymentForm').attr('action', `{{ route('collection.update', '') }}/${collectionId}`);
            });
        });

        $('#paymentForm').on('submit', function (e) {
            e.preventDefault();
            const data = new FormData(this);

            $.ajax({
                url: '{{route('collection.due.payment')}}',
                method: 'post',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status == 200) {
                        location.reload();
                    } else {
                        $.Notification.autoHideNotify('danger', 'top right', 'Danger', res);
                    }
                },
                error: function (xhr) {
                    $.Notification.autoHideNotify('danger', 'top right', 'Error', xhr.responseJSON.errors.join('<br>'));
                    $("#userEditModal").modal('hide');
                }
            });
        });
    });
</script>

@endpush
