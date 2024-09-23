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
    <form action="{{route('booking.update',$booking->customer->id)}}" method="post" enctype="multipart/form-data" id="bookingForm">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">Personal Information</h5>
                            <div class="ms-auto">
                                {{-- <a href="add-booking.php" class="btn btn-success">Previous</a> --}}
                                <input type="hidden" name="action" id="formAction" value="draft">
                                <button type="button" class="btn btn-primary" id="nextButton">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-12">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <!--Row-1-->
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Full Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Full Name"
                                                    value="{{$booking->customer->client_name}}" required name="client_name">
                                                @error('client_name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Contact Number<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Contact Number"
                                                    value="{{$booking->customer->client_phone}}" required name="client_phone">
                                                    @error('client_phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Email Address</label>
                                                <input type="text" class="form-control" placeholder="Email Address"
                                                    value="{{$booking->customer->client_email}}" name="client_email">
                                                    @error('client_email')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Gender</label>
                                                <div>
                                                    <input type="radio" class="form-checbox" name="gender" id="male"
                                                        value="male" {{$booking->customer->gender == 'male' ? 'checked': ''}}>
                                                    <label for="male" class="form-label me-4">Male</label>
                                                    <input type="radio" class="form-checkbox " name="gender" id="female"
                                                        value="female" {{$booking->customer->gender == 'female' ? 'checked': ''}}>
                                                    <label for="female" class="form-label">Female</label>
                                                </div>
                                                @error('gender')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Father's Name</label>
                                                <input type="text" class="form-control" placeholder="Father's Name"
                                                    value="{{$booking->customer->father_name}}" name="father_name">
                                                    @error('father_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Date Of Birth</label>
                                                <input type="date" class="form-control" placeholder="Date of Birth"
                                                    value="{{$booking->customer->birthday}}" name="birthday">
                                                    @error('birthday')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Educational Status</label>
                                                <input type="text" class="form-control" placeholder="Last Educational Status"
                                                    value="{{$booking->customer->education_status}}" name="education_status">
                                                    @error('education_status')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Religion<span class="text-danger">*</span></label>
                                                <select class="form-select" name="religion" required>
                                                    <option value="">Select Religion</option>
                                                    <option value="Islam" {{$booking->customer->religion == 'Islam' ? 'selected':''}}>Islam</option>
                                                    <option value="Hiduism" {{$booking->customer->religion == 'Hiduism' ? 'selected':''}}>Hiduism</option>
                                                    <option value="Christan" {{$booking->customer->religion == 'Christan' ? 'selected':''}}>Christan</option>
                                                    <option value="Buddism" {{$booking->customer->religion == 'Buddism' ? 'selected':''}}>Buddism</option>
                                                </select>
                                                @error('religion')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Blood Group</label>
                                                <input type="text" class="form-control" placeholder="Blood Group"
                                                    name="blood_group" value="{{$booking->customer->blood_group}}">
                                                @error('blood_group')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Occupation<span class="text-danger">*</span></label>
                                                <select class="form-select mb-3" name="occupation" required id="occupation" >
                                                    <option >Select Occupation</option>
                                                    <option value="Job Holder"
                                                        {{$booking->customer->occupation == 'Job Holder'? 'selected': ''}}>Job Holder
                                                    </option>
                                                    <option value="Business"
                                                        {{$booking->customer->occupation == 'Business'? 'selected': ''}}>Business
                                                    </option>
                                                    <option value="Service Provider"
                                                        {{$booking->customer->occupation == 'Service Provider'? 'selected': ''}}>
                                                        Service Provider</option>
                                                </select>
                                                @error('occupation')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror

                                            </div>
                                            <div class="col-lg-6"></div>
                                            <!-- Placeholder for additional fields -->
                                            <div id="job-holder-fields" style="display: none;" class="row">
                                                <div class="col-12 col-md-3 form-group">
                                                    <label class="form-label">Name of Institution</label>
                                                    <input type="text" class="form-control mb-2" name="job_place_name" placeholder="Name of Institution">
                                                    @error('job_place_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <label class="form-label">Designation</label>
                                                    <input type="text" class="form-control mb-2" placeholder="Designation">
                                                    @error('job_place_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-3 form-group">
                                                    <label class="form-label">Institution Address</label>
                                                    <input type="text" class="form-control mb-2" name="job_place_address" placeholder="Enter Address">
                                                    @error('job_place_address')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Present Address</label>
                                                <textarea class="form-control" placeholder="Present Address" rows="4" cols="4"
                                                name="present_address" id="present_address" required>{{$booking->customer->present_address}}</textarea>
                                                @error('present_address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label">Permanent Address<span class="text-danger">*</span></label>
                                                    <label for="sameAddress" class="form-label">
                                                        <input type="checkbox" class="form-checkbox" id="sameAddress"> Same as Present Address
                                                    </label>
                                                </div>
                                                <textarea class="form-control" placeholder="Permanent Address" rows="4" cols="4"
                                                name="permanent_address" id="permanent_address" required>{{$booking->customer->permanent_address}}</textarea>
                                                @error('permanent_address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">NID Card Number<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="NID Card Number"
                                                    name="nid_number" value="{{$booking->customer->nid_number}}" required>
                                                @error('nid_number')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">NID Front</label>
                                                <input class="form-control" type="file" name="nid_front">
                                                @error('nid_front')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="my-2" style="{{$booking->customer->nid_front ? 'display:block;': 'display:none;'}}">
                                                    <img src="{{asset('storage/booking/nids/'.$booking->customer->nid_front)}}" alt=""
                                                        width="200" height="150">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">NID Back</label>
                                                <input class="form-control" type="file" name="nid_back">
                                                @error('nid_back')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="my-2" style="{{$booking->customer->nid_back ? 'display:block;': 'display:none;'}}">
                                                    <img src="{{asset('storage/booking/nids/'.$booking->customer->nid_back)}}" alt=""
                                                        width="200" height="150">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Other's Documents</label>
                                                <select class="form-select" name="other_document">
                                                    <option value="Passport" {{$booking->customer->other_document == 'Passport' ? 'selected':''}}>Passport</option>
                                                    <option value="Birth Certificate" {{$booking->customer->other_document == 'Birth Certificate' ? 'selected':''}}>Birth Certificate</option>
                                                    <option value="Driving License" {{$booking->customer->other_document == 'Driving License' ? 'selected':''}}>Driving License</option>
                                                </select>
                                                @error('other_document')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Documents Photo</label>
                                                <input class="form-control" type="file" name="document_photo">
                                                @error('document_photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="my-2" style="{{$booking->customer->document_photo ? 'display:block;': 'display:none;'}}">
                                                    <img src="{{asset('storage/booking/documents/'.$booking->customer->document_photo)}}"
                                                        alt="" width="200" height="150">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">Marital Status<span class="text-danger">*</span></label>
                                                <select class="form-select" id="marriage_status" name="marriage_status" required>
                                                    <option value="">Select Marital Status</option>
                                                    <option value="Married" {{$booking->customer->marriage_status == 'Married' ? 'selected' : ''}}>Married</option>
                                                    <option value="Unmarried" {{$booking->customer->marriage_status == 'Unmarried' ? 'selected' : ''}}>Unmarried/Single</option>
                                                    <option value="Divorced" {{$booking->customer->marriage_status == 'Divorced' ? 'selected' : ''}}>Divorced</option>
                                                </select>
                                                @error('marriage_status')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <!-- Placeholder for spouse fields -->
                                            <div id="spouse-fields" class="row g-3" style="{{$booking->customer->marriage_status == 'Married' ? 'display: block;' : 'display: none;'}}">
                                                <div class="col-12 col-md-4">
                                                    <label class="form-label">Spouse Name</label>
                                                    <input type="text" class="form-control" placeholder="Spouse Name" name="spouse_name"
                                                     value="{{$booking->customer->spouse_name}}">
                                                    @error('spouse_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <label class="form-label">Spouse Contact Number</label>
                                                    <input type="number" class="form-control" placeholder="Spouse Contact Number"
                                                    name="spouse_phone" value="{{$booking->customer->spouse_phone}}">
                                                    @error('spouse_phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <label class="form-label">Spouse NID Number</label>
                                                    <input type="text" class="form-control" placeholder="Spouse NID Number"
                                                    name="spouse_nid" value="{{$booking->customer->spouse_nid}}">
                                                    @error('spouse_nid')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <label class="form-label">Spouse NID Front</label>
                                                    <input class="form-control" type="file" name="s_nid_front">
                                                    @error('s_nid_front')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <div class="my-2" style="{{$booking->customer->s_nid_front ? 'display:block;': 'display:none;'}}">
                                                        <img src="{{asset('storage/booking/nids/'.$booking->customer->s_nid_front)}}" alt="" width="200" height="150">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <label class="form-label">Spouse NID Back</label>
                                                    <input class="form-control" type="file" name="s_nid_back">
                                                    @error('s_nid_back')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <div class="my-2" style="{{$booking->customer->s_nid_back ? 'display:block;': 'display:none;'}}">
                                                        <img src="{{asset('storage/booking/nids/'.$booking->customer->s_nid_back)}}" alt="" width="200" height="150">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Emergency Contact Person</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Emergency Contact Person" name="emergency_contact_name"
                                                    value="{{$booking->customer->emergency_contact_name}}">
                                                @error('emergency_contact_name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Relation</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Emergency Contact Relation" name="emergency_contact_relation"
                                                    value="{{$booking->customer->emergency_contact_relation}}">
                                                @error('emergency_contact_relation')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Emergency Contact Number</label>
                                                <input type="text" class="form-control" value="{{$booking->customer->emergency_contact_phone}}"
                                                    placeholder="Emergency Contact Number" name="emergency_contact_phone">
                                                @error('emergency_contact_phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label">Emergency Contact Address</label>
                                                <input type="text" class="form-control" value="{{$booking->customer->emergency_contact_address}}"
                                                    placeholder="Emergency Contact Address" name="emergency_contact_address" >
                                                @error('emergency_contact_address')
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
    $(document).ready(function() {

        $('#sameAddress').change(function() {
            if ($(this).is(':checked')) {
                // If checked, copy the present address to permanent address
                $('#permanent_address').val($('#present_address').val());
            } else {
                // If unchecked, clear the permanent address field
                $('#permanent_address').val('');
            }
        });

        $('#nextButton').on('click', function() {
            $('#formAction').val('next'); // Set action as next
            $('#bookingForm').submit(); // Submit the form
        });

        $('#occupation').change(function() {
            if ($(this).val() === 'Job Holder') {
                $('#job-holder-fields').show();
            } else {
                $('#job-holder-fields').hide();
            }
        });

        // Optionally, trigger the change event on page load if the initial value is 'Job Holder'
        if ($('#occupation').val() === 'Job Holder') {
            $('#job-holder-fields').show();
        }

        // Event listener for the dropdown change
        $('#marriage_status').change(function() {

            if ($('#marriage_status').val() === 'Married') {
                $('#spouse-fields').show();
            } else {
                $('#spouse-fields').hide();
            }
        });
    });
    </script>
@endpush
