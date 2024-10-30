@extends('layouts.admin')
@section('title','Complete Booking')
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
               <li class="breadcrumb-item active" aria-current="page">Add Booking</li>
            </ol>
         </nav>
      </div>
   </div>
   <!--end breadcrumb-->
   <form action="{{route('booking.final',$customer->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("POST")
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">Rent Related Others Information</h5>
                            <div class="ms-auto">
                                <a href="{{route('booking.step2',['booking'=>$customer->booking])}}" class="btn btn-success">Previous</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                                {{-- {{$customer->booking}} --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-12">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <input type="hidden" name="customer_id" id="customer_id" value="{{$customer->id}}">
                                            <!--Row-1-->
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Family Members: </label>
                                                <button type="button" class="btn btn-info btn-sm text-sm" id="addMembers">+ Add Family Members</button>
                                                {{-- <input type="button" class="form-control" id="memberCount" placeholder="How many members will there"
                                                name="members" value="{{$customer->customerInfo ? $customer->customerInfo->members : ''}}"> --}}
                                            </div>
                                            @if ($customer->customerInfo)
                                            <div class="row mt-3">
                                                <div class="col-12 col-md-1 mb-2">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <label class="form-label">Member Name</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <label class="form-label">Gender</label>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <label class="form-label">Relation With Rental</label>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <label class="form-label">Contact Number</label>
                                                </div>
                                            </div>
                                            @php
                                                $members = DB::table('family_member')->where('customer_extra_id',$customer->customerInfo->id)->get();

                                            @endphp
                                            @foreach ($members as $key => $member)
                                            <div class="row">
                                                <div class="col-1 col-md-0 mb-2 text-end">
                                                    <label class="text-end">{{$key + 1}}</label>
                                                    <input type="hidden" name="member_id" id="" value="{{$member->id}}">
                                                </div>
                                                <div class="col-12 col-md-3 mb-2">
                                                    <input type="text" class="form-control" placeholder="Member Name" name="member_name[{{$key + 1}}]" value="{{$member->member_name}}">
                                                </div>
                                                <div class="col-12 col-md-2 mb-2">
                                                    <select class="form-select" name="member_gender[{{$key + 1}}]">
                                                        <option value="Male" {{$member->member_gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                        <option value="Female" {{$member->member_gender == 'Female' ? 'selected' : ''}}>Female</option>
                                                        <option value="Other" {{$member->member_gender == 'Other' ? 'selected' : ''}}>Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3 mb-2">
                                                    <input type="text" class="form-control" placeholder="Relation With Rental"
                                                    name="member_relation[{{$key + 1}}]" value="{{$member->member_relation}}">
                                                </div>
                                                <div class="col-12 col-md-2 mb-2">
                                                    <input type="text" class="form-control" placeholder="Contact Number"
                                                    name="member_phone[{{$key + 1}}]" value="{{$member->member_phone}}">
                                                </div>
                                                <div class="col-12 col-md-1 mb-2">
                                                    <a href="{{route('booking.member.delete',$member->id)}}" class="btn btn-danger memberDelete">x</a>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                            <!-- Container to append member rows -->
                                            <div class="member-rows mt-3"></div>

                                            @php
                                                if ($customer->customerInfo !=  null) {
                                                   $selectedNo = $customer->customerInfo->home_maid == "No";
                                                   $selectedYes =  $customer->customerInfo->home_maid == "Yes";
                                                } else {
                                                    $selectedYes = '';
                                                    $selectedNo = '';
                                                }
                                            @endphp
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Home worker with Family?</label>
                                                <select class="form-select" name="home_maid" id="homeMaidSelect">
                                                    <option value="No" {{ $selectedNo ? 'selected' : ''}}>No</option>
                                                    <option value="Yes" {{ $selectedYes ? 'selected' : ''}}>Yes</option>
                                                </select>
                                            </div>
                                            <div class="row mt-3" id="homeWorkerFields" style="{{ $selectedYes ? '' : 'display:none;' }}">
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Home worker Name</label>
                                                    <input type="text" class="form-control" placeholder="Home worker Name" name="home_maid_name" value="{{$customer->customerInfo ? $customer->customerInfo->home_maid_name :''}}">
                                                    @error('home_maid_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Home worker Contact Number</label>
                                                    <input type="text" class="form-control" placeholder="Home worker Contact Number" name="home_maid_phone" value="{{$customer->customerInfo ? $customer->customerInfo->home_maid_phone : ''}}">
                                                    @error('home_maid_phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Home worker Address</label>
                                                    <input type="text" class="form-control" placeholder="Home worker Address" name="home_maid_address" value="{{$customer->customerInfo ? $customer->customerInfo->home_maid_address : ''}}">
                                                    @error('home_maid_address')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Home worker NID Card Number</label>
                                                    <input type="text" class="form-control" placeholder="Home worker NID Card Number" name="home_maid_nid" value="{{$customer->customerInfo ? $customer->customerInfo->home_maid_nid : '' }}">
                                                    @error('home_maid_nid')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Home worker NID Front</label>
                                                    <input class="form-control" type="file" name="home_maid_nidfront" id="nid_front">
                                                    <img id="nidFront-preview" src="{{$customer->customerInfo ? asset('storage/booking/extra/nids/'.$customer->customerInfo->home_maid_nidfront) : ''}}" alt="" width="200" height="100" style="margin-top:15px;">
                                                    @error('home_maid_nidfront')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Home worker NID Back</label>
                                                    <input class="form-control" type="file" name="home_maid_nidback" id="nid_back">
                                                    <img id="nidBack-preview" src="{{$customer->customerInfo ? asset('storage/booking/extra/nids/'.$customer->customerInfo->home_maid_nidback) : ''}}" alt="" width="200" height="100" style="margin-top:15px;">
                                                    @error('home_maid_nidback')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @php
                                                if ($customer->customerInfo !=  null) {
                                                   $selectedNo = $customer->customerInfo->driver == "No";
                                                   $selectedYes =  $customer->customerInfo->driver == "Yes";
                                                } else {
                                                    $selectedYes = '';
                                                    $selectedNo = '';
                                                }
                                            @endphp
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Car Drive?</label>
                                                <select class="form-select" name="driver" id="driverSelect">
                                                    <option value="No" {{ $selectedNo == "No"? 'selected' : '' }}>No</option>
                                                    <option value="Yes" {{ $selectedYes ? 'selected' : '' }}>Yes</option>
                                                </select>
                                                @error('driver')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="row mt-3" id="driverFields" style="display:none;">
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Driver Name</label>
                                                    <input type="text" class="form-control" placeholder="Driver Name" name="driver_name"
                                                    value="{{$customer->customerInfo ? $customer->customerInfo->driver_name : ''}}">
                                                    @error('driver_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Driver Contact Number</label>
                                                    <input type="text" class="form-control" placeholder="Driver Contact Number" name="driver_phone"
                                                    value="{{$customer->customerInfo ? $customer->customerInfo->driver_phone : ''}}">
                                                     @error('driver_phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Driver Address</label>
                                                    <input type="text" class="form-control" placeholder="Driver Address" name="driver_address"
                                                    value="{{$customer->customerInfo ? $customer->customerInfo->driver_address : ''}}">
                                                     @error('driver_address')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Driver NID Card Number</label>
                                                    <input type="text" class="form-control" placeholder="Driver NID Card Number" name="driver_nid"
                                                    value="{{$customer->customerInfo ? $customer->customerInfo->driver_nid : ''}}">
                                                     @error('driver_nid')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Driver NID Front</label>
                                                    <input class="form-control" type="file" name="driver_nidfront" id="dnid_front">
                                                    <img id="dnidFront-preview" src="{{$customer->customerInfo ? asset('storage/booking/extra/nids/'.$customer->customerInfo->driver_nidfront) : ''}}"
                                                    alt="" width="200" height="100" style="margin-top:15px;">
                                                     @error('driver_nidfront')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <label class="form-label">Driver NID Back</label>
                                                    <input class="form-control" type="file" name="driver_nidback" id="dnid_back">
                                                    <img id="dnidBack-preview" src="{{$customer->customerInfo ? asset('storage/booking/extra/nids/'.$customer->customerInfo->driver_nidback) : ''}}"
                                                    alt="" width="200" height="100" style="margin-top:15px;">
                                                    @error('driver_nidback')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-none bg-light border">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0 align-items-center">Previous House Informations</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mt-3">
                                            <div class="col-12 col-md-3 mb-2">
                                                <label class="form-label">Previous House Holder Name</label>
                                                <input type="text" class="form-control" placeholder="Previous House Holder Name"
                                                name="previous_householder_name" value="{{$customer->customerInfo ? $customer->customerInfo->previous_householder_name : ''}}">
                                                @error('previous_householder_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3 mb-2">
                                                <label class="form-label">Previous House Holder Phone</label>
                                                <input type="text" class="form-control" placeholder="Previous House Holder Phone"
                                                name="previous_householder_phone" value="{{$customer->customerInfo ? $customer->customerInfo->previous_householder_phone : ''}}">
                                                @error('previous_householder_phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3 mb-2">
                                                <label class="form-label">Previous House Address</label>
                                                <input type="text" class="form-control" placeholder="Previous House Address"
                                                name="previous_house_address" value="{{$customer->customerInfo ? $customer->customerInfo->previous_house_address : ''}}">
                                                @error('previous_house_address')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3 mb-2">
                                                <label class="form-label">Reason For Left Previous House</label>
                                                <input type="text" class="form-control" placeholder="Reason For Left Previous House"
                                                name="left_reason" value="{{$customer->customerInfo ? $customer->customerInfo->left_reason : ''}}">
                                                @error('left_reason')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-none border">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0 align-items-center">Financial Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <!--Row-1-->
                                            <div class="col-12 col-md-4 mb-2">
                                                <label class="form-label">Actual Unit Rent</label>
                                                <input type="number" class="form-control" placeholder="Actual Unit Rent"
                                                name="actual_rent" value="{{$customer->customerInfo ? $customer->customerInfo->actual_rent : ''}}">
                                                @error('actual_rent')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            @php
                                                if ($customer->customerInfo !=  null) {
                                                   $selectedNo = $customer->customerInfo->advance_amount_type == "No";
                                                   $selectedYes =  $customer->customerInfo->advance_amount_type == "Yes";
                                                } else {
                                                    $selectedYes = '';
                                                    $selectedNo = '';
                                                }
                                            @endphp
                                            <div class="col-12 col-md-4 mb-2">
                                                <label class="form-label">Advance Amount Applicable</label>
                                                <select class="form-select" name="advance_amount_type" id="advanceAmount">
                                                    <option value="No" {{ $selectedNo ? 'selected' : ''}}>No</option>
                                                    <option value="Yes" {{ $selectedYes ? 'selected' : ''}}>Yes</option>
                                                </select>
                                                @error('advance_amount_type')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-4 mb-2" id="advanceAmountFields" style="{{$selectedYes ? '':'display: none;'}}">
                                                <label class="form-label">Advance Amount</label>
                                                <input type="number" class="form-control" placeholder="Advance Amount"
                                                name="advance_amount" value="{{$customer->customerInfo ? $customer->customerInfo->advance_amount : ''}}">
                                                @error('advance_amount')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            @php
                                                if ($customer->customerInfo !=  null) {
                                                    $selectedYes =  $customer->customerInfo->adjustable_amout_type == "Yes";
                                                    $selectedNo = $customer->customerInfo->adjustable_amout_type == "No";
                                                } else {
                                                    $selectedYes = '';
                                                    $selectedNo = '';
                                                }
                                            @endphp
                                            <div class="col-12 col-md-6 mb-2">
                                                <label class="form-label">Advance Amount Adjustable with Monthly rent?</label>
                                                <select class="form-select" name="adjustable_amout_type" id="adjustableAmount">
                                                    <option value="No" {{$selectedNo ? 'selected' : ''}}>No</option>
                                                    <option value="Yes" {{$selectedYes ? 'selected' : ''}}>Yes</option>
                                                </select>
                                                @error('adjustable_amout_type')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 mb-2" >
                                                <div id="adjustableAmountFields"  style="{{$selectedYes ? '':'display: none;'}}">
                                                    <label class="form-label">Monthly Adjustable Amount</label>
                                                    <input type="number" class="form-control" placeholder="Monthly Adjustable Amount"
                                                    name="adjustable_amount" value="{{$customer->customerInfo ? $customer->customerInfo->adjustable_amount : ''}}">
                                                    @error('adjustable_amount')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mb-2">
                                                <label class="form-label">Monthly Rent Collection date</label>
                                                <input type="date" class="form-control" placeholder="Monthly Rent Collection date"
                                                name="collection_date" value="{{$customer->customerInfo ? $customer->customerInfo->collection_date : ''}}">
                                                @error('collection_date')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 mb-2">
                                                <label class="form-label">Rent Collection Last Date</label>
                                                <input type="date" class="form-control" placeholder="Rent Collection Last Date"
                                                name="collection_last_date" value="{{$customer->customerInfo ? $customer->customerInfo->collection_last_date : ''}}">
                                                @error('collection_last_date')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
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
    $(document).ready(function () {
        $('#nid_front').on('change', function() {
            const [file] = this.files;
            if (file) {
                const preview = $('#nidFront-preview');
                preview.show;
                preview.attr('src', URL.createObjectURL(file)).show();
            }
        });
        $('#nid_back').on('change', function() {
            const [file] = this.files;
            if (file) {
                const preview = $('#nidBack-preview');
                preview.show;
                preview.attr('src', URL.createObjectURL(file)).show();
            }
        });

        $('#dnid_front').on('change', function() {
            const [file] = this.files;
            if (file) {
                const preview = $('#dnidFront-preview');
                preview.show;
                preview.attr('src', URL.createObjectURL(file)).show();
            }
        });
        $('#dnid_back').on('change', function() {
            const [file] = this.files;
            if (file) {
                const preview = $('#dnidBack-preview');
                preview.show;
                preview.attr('src', URL.createObjectURL(file)).show();
            }
        });


        $('#homeMaidSelect').on('change', function() {
            // Get the selected value
            var selectedValue = $(this).val();

            // Show or hide the home worker fields based on the selected value
            if (selectedValue == 'Yes') {
                $('#homeWorkerFields').show();
            } else {
                $('#homeWorkerFields').hide();
            }
        });
        $('#driverSelect').on('change', function() {
            // Get the selected value
            var selectedValue = $(this).val();

            // Show or hide the home worker fields based on the selected value
            if (selectedValue == 'Yes') {
                $('#driverFields').show();
            } else {
                $('#driverFields').hide();
            }
        });

        // $('#advanceAmountFields').hide();
        $('#advanceAmount').on('change', function() {
            // Get the selected value
            var selectedValue = $(this).val();

            // Show or hide the home worker fields based on the selected value
            if (selectedValue == 'Yes') {
                $('#advanceAmountFields').show();
            } else {
                $('#advanceAmountFields').hide();
            }
        });
        // $('#adjustableAmountFields').hide();
        $('#adjustableAmount').on('change', function() {
            // Get the selected value
            var selectedValue = $(this).val();

            // Show or hide the home worker fields based on the selected value
            if (selectedValue == 'Yes') {
                $('#adjustableAmountFields').show();
            } else {
                $('#adjustableAmountFields').hide();
            }
        });

        let i = 0;
        $('#addMembers').on('click', function () {
            i++;
            let memberRow = `
                <div class="row">
                    <div class="col-1 col-md-0 mb-2 text-end">
                        <label class="text-end">${i}</label>
                        <input type="hidden" name="member_id" id="" value="">
                    </div>
                    <div class="col-12 col-md-3 mb-2">
                        <input type="text" class="form-control" placeholder="Member Name" name="member_name[]">
                    </div>
                    <div class="col-12 col-md-2 mb-2">
                        <select class="form-select" name="member_gender[]">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3 mb-2">
                        <input type="text" class="form-control" placeholder="Relation With Rental" name="member_relation[]">
                    </div>
                    <div class="col-12 col-md-2 mb-2">
                        <input type="text" class="form-control" placeholder="Contact Number" name="member_phone[]">
                    </div>
                </div>
            `;
            $('.member-rows').append(memberRow);

        });

        $(document).on('click', '.memberDelete', function (e) {
            e.preventDefault(); // Prevent the default anchor behavior
            var url = $(this).attr('href'); // Get the href link

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
                    window.location.href = url;
                    Swal.fire("Deleted", "Member deleted succefully!", "danger");
                }
            });
        });
    });

</script>
@endpush
