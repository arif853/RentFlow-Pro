@extends('layouts.admin')
@section('title','Collection Details')
@section('content')
<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">collection</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    {{-- <li class="breadcrumb-item active" aria-current="page">{{$collection->unit_name}}</li> --}}
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-2 mb-sm-0">collection Details</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Complex :</span>
                            @if($collection->building)
                            <span>{{$collection->building->building_name}} <br> {{$collection->building->building_code}}</span>
                            @endif
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Unit Name :</span>
                            <span>{{$collection->asset->unit_name}}</span>
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            <span class="side-title">Employee Name :</span>
                            <span>{{$collection->employee->name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Collection Date : </span>
                            <span>{{$collection->collection_date}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Collection Type :</span>
                            <span>@if($collection->collection_type == '1')
                                Day Wise
                                @elseif($collection->collection_type == '2')
                                Month Wise
                                @endif</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Duration :</span>
                            @if($collection->collection_type == '1')
                                {{$collection->duration}} days,  ( {{$collection->from_date}} -
                                {{$collection->to_date}} )
                            @elseif($collection->collection_type == '2')
                                {{$collection->month}}
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Monthly Rent :</span>
                            <span>{{$collection->asset->monthly_rent}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Service Charge :</span>
                            <span>{{$collection->asset->service_charge}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Other Charge :</span>
                            <span>{{$collection->asset->others_charge}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Total Payable Rent :</span>
                            <span>{{$collection->payable_amount}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            <span class="side-title">Collection amount :</span>
                            <span>{{$collection->collection_amount}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!--end row-->
</main>
<!--end page main-->
@endsection
