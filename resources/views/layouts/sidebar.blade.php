        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="d-flex align-items-center">
                    <div class="logo-icon-wrapper">
                        <img src="{{asset('admin')}}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                    </div>
                    <div class="ms-2">
                        <h4 class="logo-text mb-0">RENTAL</h4>
                        <small class="text-muted" style="font-size: 10px; color: #64748b !important;">Management System</small>
                    </div>
                </div>
                <div class="toggle-icon ms-auto">
                    <i class="bi bi-list"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <!--Dashboard-->
                <li>
                    <a href="{{route('dashboard')}}">
                        <div class="parent-icon"><i class="bi bi-speedometer2"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <!--Dashboard-->

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-gear-fill"></i>
                        </div>
                        <div class="menu-title">Setup</div>
                    </a>
                    <ul>
                        {{-- Employee --}}
                        <li>
                            <a href="{{route('employee.create')}}"><i class="bi bi-person-plus"></i>Add Employee</a>
                        </li>
                        <li>
                            <a href="{{route('employee.index')}}"><i class="bi bi-people"></i>Employee List</a>
                        </li>
                        <li>
                            <a href="{{route('designation.index')}}"><i class="bi bi-bookmark-star"></i>Designation</a>
                        </li>
                        <li>
                            <a href="{{route('locations.index')}}"><i class="bi bi-geo-alt"></i>Area/Location</a>
                        </li>
                        <li>
                            <a href="{{route('building.create')}}"><i class="bi bi-building-add"></i>Building</a>
                        </li>
                        <li>
                            <a href="{{route('building.index')}}"><i class="bi bi-buildings"></i>Building List</a>
                        </li>
                        <li>
                            <a href="{{route('floors.index')}}"><i class="bi bi-layers"></i>Floor</a>
                        </li>
                        <li>
                            <a href="{{route('roomtype.index')}}"><i class="bi bi-door-closed"></i>Room Type</a>
                        </li>
                        <li>
                            <a href="{{route('asset.create')}}"><i class="bi bi-box-seam"></i>Asset/Unit</a>
                        </li>
                        <li>
                            <a href="{{route('asset.index')}}"><i class="bi bi-boxes"></i>Asset List</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-clipboard2-data"></i>
                        </div>
                        <div class="menu-title">Process</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('booking.create')}}"><i class="bi bi-calendar-plus"></i>Booking</a>
                        </li>
                        <li>
                            <a href="{{url('/dashboard/booking/approval/list')}}"><i class="bi bi-check2-circle"></i>Booking Approval</a>
                        </li>
                        <li>
                            <a href="{{route('booking.index')}}"><i class="bi bi-calendar-check"></i>Booking List</a>
                        </li>
                        <li>
                            <a href="{{route('collection.index')}}"><i class="bi bi-cash-stack"></i>Collection List</a>
                        </li>
                        <li>
                            <a href="{{route('collection.due')}}"><i class="bi bi-exclamation-triangle"></i>Collection Due</a>
                        </li>
                        <li>
                            <a href="{{route('checkout.index')}}"><i class="bi bi-box-arrow-right"></i>Checkout</a>
                        </li>
                        <li>
                            <a href="{{route('checkout.approval.list')}}"><i class="bi bi-clipboard-check"></i>Checkout Approval</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-bar-chart-line"></i></div>
                        <div class="menu-title">Reports</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('report.asset')}}"><i class="bi bi-file-earmark-bar-graph"></i>Asset Report</a>
                        </li>
                        <li>
                            <a href="{{route('report.booking')}}"><i class="bi bi-file-earmark-text"></i>Booking Report</a>
                        </li>
                        <li>
                            <a href="{{route('report.checkout')}}"><i class="bi bi-file-earmark-arrow-down"></i>Checkout Report</a>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <i class="bi bi-graph-up-arrow"></i>
                                <div >Collection Reports</div>
                            </a>
                            <ul>
                                <li>
                                    <a class="menu-title" href="{{route('collection.report.monthwise')}}">Month Wise</a>
                                </li>
                                <li>
                                    <a class="menu-title" href="{{route('collection.report.yearwise')}}">Year Wise</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{route('websetting.index')}}">
                        <div class="parent-icon"><i class="bi bi-sliders"></i></div>
                        <div class="menu-title">Web Settings</div>
                    </a>
                </li>

                <li>
                    <a href="{{route('users.index')}}">
                        <div class="parent-icon"><i class="bi bi-shield-lock"></i></div>
                        <div class="menu-title">Manage Users</div>
                    </a>
                </li>

            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->
