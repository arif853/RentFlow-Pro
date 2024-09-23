@extends('layouts.admin')
@section('title', $building->building_name)
@section('content')
<!--start content-->
<main class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Building</div>
      <div class="ps-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">{{$building->building_name}}</li>
            </ol>
         </nav>
      </div>
   </div>
   <!--end breadcrumb-->
   <div class="row">
      <div class="col-12 col-lg-6">
         <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-header py-3 bg-transparent">
               <h5 class="mb-2 mb-sm-0">Building Details</h5>
            </div>
            <div class="card-body">
               <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                     <span class="side-title">Building Name :</span>
                     <span>{{$building->building_name}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Building Type :</span>
                     <span>{{$building->building_type}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Total Floor :</span>
                     <span>{{$building->total_floor}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Building Code :</span>
                    <span>{{$building->building_code}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Address :</span>
                     <span>{{$building->address}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Area/Location Name :</span>
                     <span>{{$building->location !=null ? $building->location->name : 'N/A'}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Location ID :</span>
                     <span>{{$building->location !=null ? $building->location->location_code : 'N/A'}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Zip Code :</span>
                     <span>{{$building->location !=null ? $building->location->zip_code : 'N/A'}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Security Gard Name :</span>
                     <span>{{$building->security_guard_name}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Gard Contact Number :</span>
                     <span>{{$building->guard_contact_number}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Gate Open Time :</span>
                     <span>{{ \Carbon\Carbon::parse($building->gate_open_time)->format('h:i A') }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                     <span class="side-title">Gate Close Time :</span>
                     <span>{{\Carbon\Carbon::parse($building->gate_close_time)->format('h:i A')}}</span>
                  </li>
               </ul>
               <div class="row mt-4">
                  <div class="col-12 col-lg-6">
                     {!! $building->location !=null ? $building->location->google_map_link : 'N/A'!!}
                  </div>
                  <div class="col-12 col-lg-6">
                      @if( $building->location)
                     <img src="{{asset('storage/locations/'.$building->location->picture)}}" class="img-fluid mb-3" width="100%" alt="">
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-lg-6">
          @if($building->employee)
         <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-header py-3 bg-transparent">
               <h5 class="mb-2 mb-sm-0">Employee/Manager Details</h5>
            </div>
            <div class="card-body">
               <div class="d-flex align-items-center gap-3 text-center">
                  <div class="">
                     <img src="{{asset('storage/employee/image/'.$building->employee->passport_photo)}}" width="100" alt="">
                  </div>
                  <div class="">
                     <ul class="list-group list-group-flush">
                        <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                           <span class="side-title">Name:</span>
                           <span>{{$building->employee->name}}</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                           <span class="side-title">Designation:</span>
                           <span>{{$building->employee->designation->designation_name}}</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                           <span class="side-title">Phone:</span>
                           <span>{{$building->employee->phone}}</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center bg-transparent">
                           <span class="side-title">Date of Joining: </span>
                           <span>{{ \Carbon\Carbon::parse($building->employee->date_of_joining)->format('d M Y') }}</span>
                        </li>
                     </ul>
                  </div>
                  <div class="">
                     <img src="{{asset('storage/employee/image/'.$building->employee->signature)}}" width="80" alt="">
                  </div>
               </div>
            </div>
            <ul class="list-group list-group-flush">
               <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                  Name:
                  <span>{{$building->employee->name}}</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                  Designation:
                  <span>{{$building->employee->designation->designation_name}}</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                  ID:
                  <span>{{$building->employee->employee_code}}</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                  Email:
                  <span>{{$building->employee->email}}</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                  Phone Number:
                  <span>{{$building->employee->phone}}</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                  Alternative Number:
                  <span>{{$building->employee->alternative_phone}}</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                  Date of Joining:
                  <span>{{ \Carbon\Carbon::parse($building->employee->date_of_joining)->format('d M Y') }}</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                  NID Number:
                  <span>{{$building->employee->nid_number}}</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                  Present Address:
                  <span>{{$building->employee->present_address}}</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                  Permanent Address:
                  <span>{{$building->employee->permanent_address}}</span>
               </li>
            </ul>
            <div class="card-body">
               <div class="row mt-4">
                  <div class="col-12 col-lg-6">
                     <img src="{{asset('storage/employee/nids/'.$building->employee->nid_front)}}" class="img-fluid mb-3" width="100%" alt="">
                  </div>
                  <div class="col-12 col-lg-6">
                     <img src="{{asset('storage/employee/nids/'.$building->employee->nid_back)}}" class="img-fluid mb-3" width="100%" alt="">
                  </div>
               </div>
            </div>
         </div>
         @endif
      </div>
   </div>
   <!--end row-->
</main>
<!--end page main-->
@endsection
