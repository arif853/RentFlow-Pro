@extends('layouts.admin')
@section('title','Manage Collection List')
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
                <form class="ms-auto position-relative">
                    <div class="ms-auto">
                        <a href="{{route('collection.create')}}" class="btn btn-primary">Add New Collection</a>
                    </div>
                </form>
            </div>
            <div class="col-12 mb-3">
                <div class="col-3 d-flex align-items-center">
                    <div class="col-11">
                        <label for="nameOrPhone">Name Or Phone</label>
                        <input class="form-control" name="nameOrPhone" id="nameOrPhone" placeholder="Search Name Or Phone">
                    </div>
                    <div class="col-11 ps-3">
                        <label for="building">Building</label>
                        <select class="form-select" name="building" id="building">
                            <option value="">Select a Building</option>
                            @foreach ($buildings as $building)
                            <option value="{{ $building->building_name }}">{{ $building->building_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-9 ps-3">
                        <label for="employee">Asset</label>
                        <input class="form-control" name="client_name_phone" id="client_name_phone" placeholder="Search Asset">
                    </div>
                    <div class="col-9 ps-3">
                        <label for="selected_month">Select Month</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="selected_month" name="month" placeholder="Select month and year" readonly>
                                    <span class="input-group-text">
                                        <i class="bi bi-calendar"></i>
                                    </span>
                            </div>
                    </div>
                </div>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($collections as $key => $collection)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{route('customer.show',$collection->customer_id)}}" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-original-title="Details" aria-label="Details">{{$collection->customer->client_name}}</a></td>
                            <td>{{$collection->asset->unit_name}}</td>
                            <td>{{$collection->building->building_name}}</td>
                            <td>{{$collection->asset->unit_name}}</td>
                            <td>{{$collection->employee ? $collection->employee->name : 'N/A'}}</td>
                            <td>{{$collection->collection_date}}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('m/Y', $collection->month)->format('F, Y') }}</td>
                            <td>{{$collection->payable_amount}}</td>
                            <td>{{$collection->collection_amount}}</td>
                            <td>{{$collection->due_amount}}</td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    <a href="{{route('collection.show', $collection->id)}}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-original-title="Views" aria-label="Views"><i
                                            class="bi bi-eye-fill text-primary"></i></a>
                                    {{-- <a href="{{route('collection.edit',$collection->id)}}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-original-title="Edit" aria-label="Edit"><i
                                            class="bi bi-pencil-fill text-warning"></i></a> --}}
                                    <form action="{{ route('collection.destroy', $collection->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger border-0 bg-transparent p-0 delete-btn"
                                            data-bs-toggle="tooltip" title="Delete" id="confirmApproveBtn">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('collection.print',$collection->id)}}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-original-title="Print" aria-label="Print"><i class="bi bi-printer text-primary"></i></a>
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
</main>
<!--end page main-->
@endsection
@push('script')
 <!-- Bootstrap Datepicker JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('#selected_month').datepicker({
                format: "mm/yyyy", // Month and year only
                minViewMode: 1,    // Only view month and year
                autoclose: true,   // Close picker automatically after selection
                todayHighlight: true
        }).on('changeDate', function(e) {
            // Format the selected date to "Month, YYYY"
            const selectedDate = e.date;
            const options = { year: 'numeric', month: 'long' }; // Month and year in long format
            const formattedDate = new Intl.DateTimeFormat('en-US', options).format(selectedDate);
            // Display the formatted date in the input field
            $('#selected_month').val(formattedDate);
        });

        // Custom Search: Asset ID or Name
        $('#nameOrPhone').on('keyup', function () {
            $('#datatable').DataTable().columns(1).search(this.value).draw();
        });


            // Custom Search: Building Name
        $('#building').on('change', function () {
            $('#datatable').DataTable().columns(2).search(this.value).draw();
        });

        // Custom Search: Client Name or phone
        $('#client_name_phone').on('keyup', function () {
            $('#datatable').DataTable().columns(3).search(this.value).draw();
        });

        // Custom Search: Client Name or phone
        $('#selected_month').on('change', function () {
            $('#datatable').DataTable().columns(6).search(this.value).draw();
        });
    });
    $(document).on('submit', '.delete-form', function(e) {
            e.preventDefault(); // Prevent default form submission

            var form = this; // Store form instance
            Swal.fire({
                title: "Do you want to delete this?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // If confirmed, submit the form
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire("Cancelled", "Your data is safe :)", "error");
                }
            });
        });

</script>
@endpush
