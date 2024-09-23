@extends('layouts.admin')
@section('title','Add Employee')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Employee</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
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
                        <h5 class="mb-2 mb-sm-0">Add Employee</h5>
                        <div class="ms-auto">
                            <a href="{{route('employee.index')}}" class="btn btn-secondary">Manage Employee</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-lg-8">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <!--Row-1-->
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Employee Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Employee Name"
                                                    name="name" id="employeeName" required>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Email Address</label>
                                                <input type="email" class="form-control" placeholder="Email Address"
                                                    name="email" >
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <!--Row-2-->
                                            <!--Row-3-->
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" placeholder="Phone Number "
                                                    name="phone" id="phoneNumber" >
                                                    @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Alternative Number </label>
                                                <input type="text" class="form-control" placeholder="Phone Number "
                                                    name="alternative_phone" id="altPhoneNumber">
                                                @error('alternative_phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <!--Row-4-->
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Present Address</label>
                                                <textarea class="form-control" placeholder="Present Address" rows="4"
                                                    cols="4" name="present_address"></textarea>
                                                @error('present_address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Permanent Address</label>
                                                <textarea class="form-control" placeholder="Permanent Address" rows="4"
                                                    cols="4" name="permanent_address" ></textarea>
                                                @error('permanent_address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <!--Row-5-->
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">NID Card Number</label>
                                                <input type="text" class="form-control" placeholder="Product title"
                                                    name="nid_number">

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
                                                <div class="mt-4" id="nidFront">
                                                    <img src="" alt="" width="200" height="100">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label">NID Back</label>
                                                <input class="form-control" type="file" name="nid_back">
                                                @error('nid_back')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="mt-4" id="nidBack">
                                                    <img src="" alt="" width="200" height="100">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Other's Documents</label>
                                                <select class="form-select" name="other_documents_type">
                                                    <option value="Passport">Passport</option>
                                                    <option value="Birth certificate">Birth Certificate</option>
                                                    <option value="Driving license">Driving License</option>
                                                </select>
                                                @error('other_documents_type')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label">Documents Photo</label>
                                                <input class="form-control" type="file" name="documents_photo">
                                                @error('documents_photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="mt-4" id="documentPhoto">
                                                    <img src="" alt="" width="200" height="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Employee ID<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Employee ID"
                                                name="employee_code" readonly id="employeeCode" required>
                                                @error('employee_code')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Designation<span class="text-danger">*</span></label>
                                                <select class="form-select" name="designation_id" required>
                                                    <option>Select Designation</option>
                                                    @foreach ($designations as $item)
                                                    <option value="{{$item->id}}">{{$item->designation_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('designation_id')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Date of Joining</label>
                                                <input type="date" class="form-control" placeholder="Joining Date" name="date_of_joining" >
                                                @error('date_of_joining')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Passport Size Photo</label>
                                                <input class="form-control" type="file" name="passport_photo">
                                                @error('passport_photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="mt-4" id="passportPhoto">
                                                    <img src="" alt="" width="200" height="100">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Signature</label>
                                                <input class="form-control" type="file" name="signature">
                                                @error('signature')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="mt-4" id="signature">
                                                    <img src="" alt="" width="200" height="100">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Status</label>
                                                <select class="form-select" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                @error('status')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Add Employee</button>
                            </div>
                        </div>
                    </form>
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
        $('#phoneNumber, #altPhoneNumber').inputmask('+880 9999999999', {
            placeholder: '+880 XXXXXXXXXX',  // keeps the space to make it visually clear
            showMaskOnHover: true,
            showMaskOnFocus: true,
        });

        $('#employeeName').on('keyup', function() {
            // Get the building name value
            let buildingName = $(this).val().trim();

            // Generate the building code only if the building name has at least 4 characters
            if (buildingName.length >= 4) {
                // Extract the first 4 characters of the building name
                let namePart = buildingName.substring(0, 4).toUpperCase();

                // Generate a random 4-digit number
                let randomNumber = Math.floor(1000 + Math.random() * 9000);

                // Get the current year and extract the last digit
                let yearLastDigit = new Date().getFullYear().toString().slice(-2);

                // Combine to form the building code
                let employecode = "EMP" + '-' + yearLastDigit + randomNumber;

                // Set the generated code in the building code input
                $('#employeeCode').val(employecode);
            } else {
                // Clear the building code if the name is less than 4 characters
                $('#employeeCode').val('');
            }
        });

        // Function to handle the file input change and display preview
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Set the image source to the file data
                    $(previewId).find('img').attr('src', e.target.result);
                }

                // Read the image file as a data URL
                reader.readAsDataURL(input.files[0]);
            }
        }

        // NID Front preview
        $('input[name="nid_front"]').on('change', function () {
            readURL(this, '#nidFront');
        });

        // NID Back preview
        $('input[name="nid_back"]').on('change', function () {
            readURL(this, '#nidBack');
        });

        // Other Documents preview
        $('input[name="documents_photo"]').on('change', function () {
            readURL(this, '#documentPhoto');
        });

        $('input[name="passport_photo"]').on('change', function () {
            readURL(this, '#passportPhoto');
        });

        $('input[name="signature"]').on('change', function () {
            readURL(this, '#signature');
        });
    });

</script>
@endpush
