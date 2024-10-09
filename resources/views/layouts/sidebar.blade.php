        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{asset('admin')}}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">RENTAL</h4>
                </div>
                <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <!--Dashboard-->
                <li>
                    <a href="{{route('dashboard')}}">
                        <div class="parent-icon"><i class="bi bi-house-fill"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <!--Dashboard-->

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                        </div>
                        <div class="menu-title">Setup</div>
                    </a>
                    <ul>
                        {{-- Employee --}}
                        <li>
                            <a href="{{route('employee.create')}}"><i class="bi bi-circle"></i>Employee</a>
                        </li>
                        <li>
                            <a href="{{route('employee.index')}}"><i class="bi bi-circle"></i>Employee List</a>
                        </li>
                        <li>
                            <a href="{{route('designation.index')}}"><i class="bi bi-circle"></i>Designation</a>
                        </li>
                        <li>
                            <a href="{{route('locations.index')}}"><i class="bi bi-circle"></i>Area/Location</a>
                        </li>

                        <li>
                            <a href="{{route('building.create')}}"><i class="bi bi-circle"></i>Building</a>
                        </li>
                        <li>
                            <a href="{{route('building.index')}}"><i class="bi bi-circle"></i>Building List</a>
                        </li>

                        <li>
                            <a href="{{route('floors.index')}}"><i class="bi bi-circle"></i>Floor</a>
                        </li>
                        <li>
                            <a href="{{route('roomtype.index')}}"><i class="bi bi-circle"></i>Room Type</a>
                        </li>
                        <li>
                            <a href="{{route('asset.create')}}"><i class="bi bi-circle"></i>Asset/Unit</a>
                        </li>
                        <li>
                            <a href="{{route('asset.index')}}"><i class="bi bi-circle"></i>Asset List</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i>
                        </div>
                        <div class="menu-title">Proccess</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('booking.create')}}"><i class="bi bi-circle"></i>Booking</a>
                        </li>
                        <li>
                            <a href="{{url('/dashboard/booking/approval/list')}}"><i class="bi bi-circle"></i>Booking Approval</a>
                        </li>
                        <li>
                            <a href="{{route('booking.index')}}"><i class="bi bi-circle"></i>Booking List</a>
                        </li>
                        <li>
                            <a href="{{route('collection.index')}}"><i class="bi bi-circle"></i>Collection List</a>
                        </li>
                        <li>
                            <a href="{{route('collection.due')}}"><i class="bi bi-circle"></i>Collection Due List</a>
                        </li>
                        <li>
                            <a href="{{route('checkout.index')}}"><i class="bi bi-circle"></i>Checkout</a>
                        </li>
                        <li>
                            <a href="{{route('checkout.approval.list')}}"><i class="bi bi-circle"></i>Checkout Approval</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-card-checklist"></i></div>
                        <div class="menu-title">Reports</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('report.booking')}}"><i class="bi bi-circle"></i>Booking Report</a>
                        </li>
                        <li>
                            <a href="#"><i class="bi bi-circle"></i>Checkout Report</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="bi bi-chat-right-text"></i></div>
                        <div class="menu-title">Notification</div>
                    </a>
                </li>

                <li>
                    <a href="{{route('users.index')}}">
                        <div class="parent-icon"><i class="bi bi-person-lines-fill"></i></div>
                        <div class="menu-title">Manage Users</div>
                    </a>
                </li>

            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->
