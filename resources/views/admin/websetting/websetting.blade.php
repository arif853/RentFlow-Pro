@extends('layouts.admin')
@section('title', 'Report')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Home</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Web Settings</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="d-flex col-12 justify-content-between">
        <div class="card col-6 d-flex mx-auto">
            <div class="card-body d-flex justify-content-center">
                <form action="{{ route('websetting.update', $company->id) }}" method="POST" enctype="multipart/form-data" class="w-75">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <!-- Company Name -->
                        <div class="mb-3">
                            <label for="company_name" class="form-label mt-5">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                placeholder="Enter company name" value="{{ $company->company_name }}" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Enter phone number" value="{{ $company->phone_number }}" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                value="{{ $company->email }}" required>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"
                                placeholder="Enter address" required>{{ $company->address }}</textarea>
                        </div>

                        <!-- Logo Upload -->
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo" accept="image/*" onchange="previewImage(event)">
                        </div>

                        <!-- Image Preview -->
                        <div class="mb-3 text-center">
                            <img id="logo-preview" src="{{ asset($company->logo) }}" alt="Logo Preview"
                                style="display: {{ $company->logo ? 'block' : 'none' }}; max-width: 200px; max-height: 200px;">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Company</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card col-5">
            <div class="card-body d-flex">
                <div class="mx-auto d-flex justify-content-center align-items-center">
                    <div class="text-center mb-4 w-100" style="line-height: 2;">
                        <!-- Adjusted line height -->
                        <!-- Logo -->
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="logo-preview"
                                style="max-width: 300px; max-height: 300px; object-fit: cover;">
                        </div>

                        <!-- Company Name -->
                        <h5 class="mb-1" style="font-size: 1.5rem;">{{ $company->company_name }}</h5>

                        <!-- Phone Number -->
                        <p class="mb-1" style="font-size: 1.25rem;"><strong>Phone:</strong> {{ $company->phone_number }}
                        </p>

                        <!-- Email -->
                        <p class="mb-1" style="font-size: 1.25rem;"><strong>Email:</strong> {{ $company->email }}</p>

                        <!-- Address -->
                        <p class="mb-1" style="font-size: 1.25rem;"><strong>Address:</strong> {{ $company->address }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<!--end page main-->

@push('script')
<script>
    function previewImage(event) {
        const output = document.getElementById('logo-preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.display = 'block';
    }

</script>
@endpush
