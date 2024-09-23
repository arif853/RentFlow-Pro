@extends('layouts.admin')
@section('title',$employee->employee_code)
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
                    <li class="breadcrumb-item active" aria-current="page">{{$employee->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="profile-avatar text-center">
                        <img src="{{asset('storage/employee/image/'.$employee->passport_photo)}}" class="img-fluid mb-3" width="200" alt="">
                    </div>
                    <div class="text-center mt-4">
                        <h4 class="mb-1">{{$employee->name}}</h4>
                        <p class="mb-1 text-secondary"><strong>ID:</strong> {{$employee->employee_code}}</p>
                        <h6 class="mb-1">{{$employee->designation->designation_name}}</h6>
                        <div class="mt-4"></div>
                        <img src="{{asset('storage/employee/image/'.$employee->signature)}}" class="img-fluid mb-3" width="130" alt="">
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                        Name:
                        <span>{{$employee->name}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Designation:
                        <span>{{$employee->designation->designation_name}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        ID:
                        <span>{{$employee->employee_code}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Email:
                        <span>{{$employee->email}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Phone Number:
                        <span>{{$employee->phone}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Alternative Number:
                        <span>{{$employee->alternative_phone}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Date of Joining:
                        <span>{{ \Carbon\Carbon::parse($employee->date_of_joining)->format('d M Y') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        NID Number:
                        <span>{{$employee->nid_number}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Present Address:
                        <span>{{$employee->present_address}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Permanent Address:
                        <span>{{$employee->permanent_address}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <!--Documents-->
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Documents</h5>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <img src="{{asset('storage/employee/nids/'.$employee->nid_front)}}" class="img-fluid mb-3" width="100%" alt="">
                        </div>
                        <div class="col-12 col-lg-6">
                            <img src="{{asset('storage/employee/nids/'.$employee->nid_back)}}" class="img-fluid mb-3" width="100%" alt="">
                        </div>

                        <div class="col-12 col-lg-6">
                            <img src="{{asset('storage/employee/documents/'.$employee->documents_photo)}}" class="img-fluid mb-3" width="100%" alt="">
                        </div>
                        {{-- <div class="col-12 col-lg-6">
                            <img src="assets/images/documents.jpg" class="img-fluid mb-3" width="100%" alt="">
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!--end row-->

</main>
<!--end page main-->
@endsection
