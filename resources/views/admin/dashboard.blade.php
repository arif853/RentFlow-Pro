@extends('layouts.admin')
@section('title','Dashboard')
@section('content')

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">
            <i class="bi bi-speedometer2 me-2"></i>Dashboard
        </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ date('F d, Y') }}</small>
        </div>
    </div>

    <!-- Stats Cards Row -->
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4 g-4 mb-4">
        <div class="col">
            <div class="card stats-card overflow-hidden radius-10 h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="mb-2 text-uppercase fw-medium text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Asset</p>
                            <h3 class="mb-0 fw-bold text-gradient">
                                @php
                                    $asset = DB::table('assets')->where('status',1)->get();
                                    $totalAssets = $asset->count();
                                @endphp
                                {{$totalAssets}}
                            </h3>
                            <small class="text-success"><i class="bi bi-arrow-up me-1"></i>Active units</small>
                        </div>
                        <div class="stat-icon bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-boxes fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card stats-card overflow-hidden radius-10 h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="mb-2 text-uppercase fw-medium text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Resident</p>
                            @php
                                $resident = DB::table('customers')->count();
                            @endphp
                            <h3 class="mb-0 fw-bold" style="color: #10b981;">{{$resident}}</h3>
                            <small class="text-muted"><i class="bi bi-people me-1"></i>Active tenants</small>
                        </div>
                        <div class="stat-icon text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #10b981, #059669);">
                            <i class="bi bi-person-check fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card stats-card overflow-hidden radius-10 h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="mb-2 text-uppercase fw-medium text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px;">Available Units</p>
                            <h3 class="mb-0 fw-bold" style="color: #f59e0b;">{{$availableunitCount}}</h3>
                            <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>Next month</small>
                        </div>
                        <div class="stat-icon text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #f59e0b, #d97706);">
                            <i class="bi bi-house-door fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card stats-card overflow-hidden radius-10 h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="mb-2 text-uppercase fw-medium text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px;">Collection Amount</p>
                            <h3 class="mb-0 fw-bold" style="color: #06b6d4;">0</h3>
                            <small class="text-muted"><i class="bi bi-currency-dollar me-1"></i>This month</small>
                        </div>
                        <div class="stat-icon text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #06b6d4, #0891b2);">
                            <i class="bi bi-cash-coin fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Charts Row -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-6 d-flex">
            <div class="card radius-10 w-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-1 fw-semibold">Revenue Overview</h6>
                            <small class="text-muted">Monthly earnings trend</small>
                        </div>
                        <div class="ms-auto dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-download me-2"></i>Export</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-printer me-2"></i>Print</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="chart5"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex">
            <div class="card radius-10 w-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-1 fw-semibold">Collection Breakdown</h6>
                            <small class="text-muted">Current month distribution</small>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-3 mt-2 align-items-center">
                        <div class="col-lg-7 col-xl-7 col-xxl-8">
                            <div class="by-device-container">
                                <div class="piechart-legend">
                                    <h2 class="mb-1 text-gradient">85%</h2>
                                    <h6 class="mb-0 text-muted" style="font-size: 0.75rem;">Total Collection</h6>
                                </div>
                                <canvas id="chart6"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-5 col-xxl-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-center justify-content-between border-0 px-0">
                                    <span class="d-flex align-items-center">
                                        <span class="badge rounded-pill me-2" style="background: linear-gradient(135deg, #6366f1, #8b5cf6); width: 12px; height: 12px;"></span>
                                        Buildings
                                    </span>
                                    <span class="fw-semibold">22.5%</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between border-0 px-0">
                                    <span class="d-flex align-items-center">
                                        <span class="badge rounded-pill me-2" style="background: linear-gradient(135deg, #10b981, #059669); width: 12px; height: 12px;"></span>
                                        Utility
                                    </span>
                                    <span class="fw-semibold">62.3%</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between border-0 px-0">
                                    <span class="d-flex align-items-center">
                                        <span class="badge rounded-pill me-2" style="background: linear-gradient(135deg, #f59e0b, #d97706); width: 12px; height: 12px;"></span>
                                        Others
                                    </span>
                                    <span class="fw-semibold">15.2%</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->

    <!-- Data Tables Row -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-7 col-xl-7 d-flex">
            <div class="card radius-10 w-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-1 fw-semibold"><i class="bi bi-boxes me-2 text-primary"></i>Asset List</h6>
                            <small class="text-muted">Available units overview</small>
                        </div>
                        <a href="{{route('asset.index')}}" class="btn btn-sm btn-outline-primary ms-auto">
                            View All <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Asset ID</th>
                                    <th>Employee</th>
                                    <th>Building</th>
                                    <th>Rooms</th>
                                    <th>Available From</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($assets as $key => $asset)
                                <tr>
                                    <td><span class="badge bg-light text-dark">{{$key +1}}</span></td>
                                    <td><span class="fw-medium text-primary">{{$asset->asset_code}}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-gradient-primary text-white d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px; font-size: 12px;">
                                                {{ $asset->employee ? strtoupper(substr($asset->employee->name, 0, 1)) : 'N' }}
                                            </div>
                                            <div>
                                                <div class="fw-medium">{{$asset->employee ? $asset->employee->name:'N/A'}}</div>
                                                <small class="text-muted">{{$asset->employee ? $asset->employee->employee_code:''}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-medium">{{$asset->building ? $asset->building->building_name : 'N/A'}}</div>
                                        <small class="text-muted">{{$asset->building ? $asset->building->building_code : ''}}</small>
                                    </td>
                                    <td>
                                        @if($asset->rooms->isNotEmpty())
                                            @foreach ($asset->rooms->take(2) as $room)
                                                <span class="badge bg-light text-dark me-1">{{$room->roomtype->roomType}}</span>
                                            @endforeach
                                            @if($asset->rooms->count() > 2)
                                                <span class="badge bg-primary">+{{$asset->rooms->count() - 2}}</span>
                                            @endif
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            {{\Carbon\Carbon::parse($asset->available_from)->format('d M, Y')}}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="empty-state">
                                            <i class="bi bi-inbox text-muted" style="font-size: 2rem;"></i>
                                            <p class="text-muted mt-2 mb-0">No assets found</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-xl-5 d-flex">
            <div class="card radius-10 w-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-1 fw-semibold"><i class="bi bi-people me-2 text-success"></i>Resident List</h6>
                            <small class="text-muted">Active tenants</small>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Resident Name</th>
                                    <th>Building</th>
                                    <th>Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <div class="empty-state">
                                            <i class="bi bi-person-x text-muted" style="font-size: 2rem;"></i>
                                            <p class="text-muted mt-2 mb-0">No residents found</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Data Tables Row -->
    <div class="row g-4">
        <div class="col-12 col-lg-7 col-xl-7 d-flex">
            <div class="card radius-10 w-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-1 fw-semibold"><i class="bi bi-cash-stack me-2 text-info"></i>Recent Collection</h6>
                            <small class="text-muted">Latest payment records</small>
                        </div>
                        <a href="{{route('collection.index')}}" class="btn btn-sm btn-outline-info ms-auto">
                            View All <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Asset ID</th>
                                    <th>Employee</th>
                                    <th>Building</th>
                                    <th>Unit</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="empty-state">
                                            <i class="bi bi-wallet2 text-muted" style="font-size: 2rem;"></i>
                                            <p class="text-muted mt-2 mb-0">No recent collections</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-xl-5 d-flex">
            <div class="card radius-10 w-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-1 fw-semibold"><i class="bi bi-person-badge me-2 text-warning"></i>Employee List</h6>
                            <small class="text-muted">Staff overview</small>
                        </div>
                        <a href="{{route('employee.index')}}" class="btn btn-sm btn-outline-warning ms-auto">
                            View All <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Employee</th>
                                    <th>ID</th>
                                    <th>Assigned</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <div class="empty-state">
                                            <i class="bi bi-person-x text-muted" style="font-size: 2rem;"></i>
                                            <p class="text-muted mt-2 mb-0">No employees found</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--end row-->



</main>
<!--end page main-->
@endsection
