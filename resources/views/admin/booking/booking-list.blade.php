@extends('layouts.admin')
@section('title','Manage Booking')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Booking</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Booking</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Manage Booking</h5>

            </div>
            <div class="table-responsive mt-3">
                <div class="col-12 mb-3">
                    <div class="col-3 d-flex">
                        <div class="col-11">
                            <label for="asset">Asset</label>
                            <input class="form-control" name="asset" id="asset" placeholder="Search Asset id or Name">
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
                        <div class="col-11 ps-3">
                            <label for="employee">Client Name or Phone Number</label>
                            <input class="form-control" name="client_name_phone" id="client_name_phone" placeholder="Search Client Name or Phone Number">
                        </div>
                    </div>
                </div>
                <table class="table align-middle" id="datatable">
                    <thead class="table-secondary">
                        <tr>
                            <th>Sl</th>
                            <th>Asset</th>
                            <th>Building</th>
                            <th>Floor</th>
                            <th>client Name</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($bookings as $key => $booking)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$booking->asset->unit_name}},<br>
                                <span class="font-13">{{$booking->asset->asset_code}}</span>
                            </td>
                            <td>{{$booking->building->building_name}} <br>
                                <span class="font-13">{{$booking->building->building_code}}</span>
                            </td>
                            <td>
                                {{$booking->floor->floor_name}},<br>
                                Floor Size: {{$booking->floor->floor_size}}
                            </td>
                            <td>
                                <a href="{{route('customer.show',$booking->customer->id)}}" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title=" Client Details" aria-label="Client Details"><span class="">{{$booking->customer->client_name}}</span></a>

                                    <br>

                               <a href="tel:{{$booking->customer->client_phone}}" class="font-13">{{$booking->customer->client_phone}}</a><br>
                               <a href="mailto:{{$booking->customer->client_email}}" class="font-13">{{$booking->customer->client_email}}</a>
                            </td>
                            <td>
                                @if ($booking->status == 'pending')
                                <a href="#" class="badge bg-warning">Pending</a>
                                @elseif ($booking->status == 'confirmed')
                                <a href="#" class="badge bg-success">Confirmed</a>
                                @else
                                <a href="#" class="badge bg-danger">Canceled</a>

                                @endif
                            </td>
                            <td>
                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                    @if ($booking->status == 'pending')
                                    <a href="{{ route('booking.approved', $booking->id) }}" class="text-primary btn_bookingConfirm" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Approve" id="confirmApproveBtn">
                                        <i class="bi bi-check-lg"></i></a>
                                    @else
                                    <a href="{{route('booking.show',$booking->id)}}" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>

                                    @endif
                                    <a href="{{route('booking.edit',$booking->id)}}" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="{{ route('booking.destroy', $booking->id) }}"
                                        method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-danger border-0 bg-transparent p-0 delete-btn"
                                                data-bs-toggle="tooltip" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('booking.printPDF')}}" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Rentant Form print" >
                                        <i class="bi bi-printer"></i></a>
                                </div>

                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!--end page main-->
@endsection
@push('script')
<script>
    $(document).ready(function(){
        // Custom Search: Asset ID or Name
        $('#asset').on('keyup', function () {
            $('#datatable').DataTable().columns(1).search(this.value).draw();
        });


            // Custom Search: Building Name
        $('#building').on('change', function () {
            $('#datatable').DataTable().columns(2).search(this.value).draw();
        });

        // Custom Search: Client Name or phone
        $('#client_name_phone').on('keyup', function () {
            $('#datatable').DataTable().columns(4).search(this.value).draw();
        });


        $(document).on('click', '#confirmApproveBtn', function (e) {
            e.preventDefault(); // Prevent the default anchor behavior
            var url = $(this).attr('href'); // Get the href link

            Swal.fire({
                title: "Do you want to approve this booking?",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "Approve",
                denyButtonText: `Deny!`
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, redirect to the route
                    window.location.href = url;
                    Swal.fire("Thank You", "Booking Cofirmed", "success");
                } else if (result.isDenied) {
                    Swal.fire("Sorry!", "Booking is not confirmed", "info");
                }
            });
        });
    });

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
