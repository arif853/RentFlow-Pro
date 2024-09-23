@extends('layouts.admin')
@section('title','Dashboard')
@section('content')

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        {{-- <div class="breadcrumb-title pe-3">Dashboard</div> --}}
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        Dashboard
                    </li>
                    {{-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> --}}
                </ol>
            </nav>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="overflow-hidden">
                        <div class="w-100">
                            <p>Total Asset</p>
                            <h4 class="">@php
                                $asset = DB::table('assets')->where('status',1)->get();
                                $totalAssets = $asset->count();
                            @endphp
                            {{$totalAssets}}
                            </h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-50">
                            <p>Total Resident</p>
                            @php
                                $resident = DB::table('customers')->count();
                            @endphp
                            <h4 class="">{{$resident}}</h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-50">
                            <p>Next Month Available Unit</p>
                            <h4 class="">{{$availableunitCount}}</h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                        <div class="w-50">
                            <p>Collection Amount</p>
                            <h4 class="">0</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
              <div class="col-12 col-lg-6 d-flex">
                <div class="card radius-10 w-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <h6 class="mb-0">Revenue</h6>
                      <div class="fs-5 ms-auto dropdown">
                         <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="#">Action</a></li>
                             <li><a class="dropdown-item" href="#">Another action</a></li>
                             <li><hr class="dropdown-divider"></li>
                             <li><a class="dropdown-item" href="#">Something else here</a></li>
                           </ul>
                       </div>
                     </div>
                    <div id="chart5"></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6 d-flex">
                <div class="card radius-10 w-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                       <h6 class="mb-0">By Current Month Collection</h6>
                       <div class="fs-5 ms-auto dropdown">
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-3 mt-2 align-items-center">
                      <div class="col-lg-7 col-xl-7 col-xxl-8">
                        <div class="by-device-container">
                           <div class="piechart-legend">
                              <h2 class="mb-1">85%</h2>
                              <h6 class="mb-0">Total Collection</h6>
                           </div>
                          <canvas id="chart6"></canvas>
                        </div>
                      </div>
                      <div class="col-lg-5 col-xl-5 col-xxl-4">
                        <div class="">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                              <i class="bi bi-tablet-landscape-fill me-2 text-primary"></i> <span>Buildings - </span> <span>22.5%</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                              <i class="bi bi-phone-fill me-2 text-primary-2"></i> <span>Utility - </span> <span>62.3%</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                              <i class="bi bi-display-fill me-2 text-primary-3"></i> <span>Others - </span> <span>15.2%</span>
                            </li>
                          </ul>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--end row-->

    <div class="row">
        <div class="col-12 col-lg-7 col-xl-7 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Asset List</h6>

                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sl</th>
                                    <th>Asset ID</th>
                                    <th>Employee Name</th>
                                    <th>Building</th>
                                    <th>Rooms</th>
                                    <th>Availabe from</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assets as $key => $asset)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$asset->asset_code}}</td>
                                    <td>
                                        {{$asset->employee ? $asset->employee->name:''}} <br>
                                        {{$asset->employee ? $asset->employee->employee_code:''}}
                                    </td>
                                    <td>
                                        {{$asset->building ? $asset->building->building_name : ''}} <br>
                                        {{$asset->building ? $asset->building->building_code : ''}}
                                    </td>
                                    <td>
                                        {{-- {{$asset->rooms}} --}}
                                        @if($asset->rooms->isNotEmpty())
                                        @foreach ($asset->rooms as $room)
                                        {{$room->roomtype->roomType}}, <br>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($asset->available_from)->format('d M, Y')}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-xl-5 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Resident List</h6>

                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sl</th>
                                    <th>Resident Name</th>
                                    <th>Building</th>
                                    <th>Unit Name</th>
                                    <th>Rooms</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-7 col-xl-7 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Recent Collection</h6>

                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sl</th>
                                    <th>Asset ID</th>
                                    <th>Employee ID</th>
                                    <th>Building</th>
                                    <th>Unit</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-xl-5 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Employee List</h6>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sl</th>
                                    <th>Employee Name</th>
                                    <th>Emplyee ID</th>
                                    <th>Assigned Building</th>
                                </tr>
                            </thead>
                            <tbody>

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
