<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo.png') }}" class="dark-logo" width="180" alt="" />
                <img src="{{ asset('assets/images/logos/logo-light.png') }}" class="light-logo" width="180" alt="" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Dashboard</span>
                </li>
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-home"></i>
                        </span>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>
                <!-- ============================= -->
                <!-- Apps -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Pengguna</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('dashboard/pasien') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Pasien</span>
                    </a>
                </li>
                @if (auth()->user()->role == 'admin')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('dashboard/staff') }}" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-user-check"></i>
                        </span>
                        <span class="hide-menu">Staff</span>
                    </a>
                </li>
                @endif
                <!-- ============================= -->
                <!-- PAGES -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Akun</span>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('dashboard/account') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">Akun Saya</span>
                    </a>
                </li>

                <!-- =================== -->
                <!-- AUTH -->
                <!-- =================== -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Autentikasi</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" onclick="showLogout();" aria-expanded="false">
                        <span class="rounded-3">
                            <i class="ti ti-logout"></i>
                        </span>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
            </ul>
            <div class="unlimited-access hide-menu bg-light-primary position-relative my-7 rounded w-100">
                <div class="d-flex">
                    <div class="unlimited-access-title">
                        <h6 class="fw-semibold fs-4 mb-6 text-dark">Developed By</h6>
                        <h6 class="fw-semibold fs-2 mb-6 text-dark">Ahmad Aziz Muhyasir</h6>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->