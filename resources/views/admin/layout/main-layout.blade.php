
<!-- [Body] Start -->
<body data-pc-header="header-1" data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true"
      data-pc-direction="ltr" data-pc-theme="light">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
{{--add--}}





<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/admin-dashboard" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{asset('assets/images/rental-black.png')}}" alt="logo image" class="logo-lg">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    {{--          <label>Navigation</label>--}}
                </li>
                <li class="pc-item">
                    <a href="{{route('admin-dashboard')}}" class="pc-link"
                    ><span class="pc-micon">
              <i class="ph ph-gauge"></i></span
                        ><span class="pc-mtext">Dashboard</span></a>
                </li>

                <li class="pc-item pc-caption">
                    {{--            <label>UI Components</label>--}}
                    <i class="ph ph-compass-tool"></i>
                </li>
                <li class="pc-item">
                    <a href="{{route('car-page')}}" class="pc-link">
                        <span class="pc-micon"> <i class="fas fa-car"></i> </span>
                        <span class="pc-mtext"> Manage Cars</span>
                    </a>

                </li>
                <li class="pc-item">
                    <a href="{{route('customer-page')}}" class="pc-link">
                        <span class="pc-micon"><i class="fas fa-users"></i></span>
                        <span class="pc-mtext">Manage Customers</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{route('rental-page')}}" class="pc-link">
                        <span class="pc-micon"><i class="fas fa-file-invoice"></i></span>
                        <span class="pc-mtext"> Manage Rentals</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->


<!-- [ Header Topbar ] start -->
<header class="pc-header">
    <div class="m-header">
        <a href="{{route('admin-dashboard')}}" class="b-brand text-primary">
            <!-- ========   Change your logo from here   ============ -->
            <img src="{{asset('assets/images/renral-white.png')}}" height="58px" alt="logo image"
                 class="logo-lg img-fluid">
        </a>
    </div>
    <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ph ph-list"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ph ph-list"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
                       role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <i class="ph ph-magnifying-glass"></i>
                    </a>
                    <div class="dropdown-menu pc-h-dropdown drp-search">
                        <form class="px-3">
                            <div class="form-group mb-0 d-flex align-items-center">
                                <input type="search" class="form-control border-0 shadow-none"
                                       placeholder="Search here. . .">
                                <button class="btn btn-light-secondary btn-search">Search</button>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <!-- [Mobile Media Block end] -->

        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                       role="button"
                       aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="{{asset('assets/images/user/avatar-2.jpg')}}" alt="user-image" class="user-avtar">
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative"
                                 style="max-height: calc(100vh - 225px)">
                                <ul class="list-group list-group-flush w-100">
                                    <li class="list-group-item">
                                        <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph ph-user-circle"></i>
                    <span>Edit profile</span>
                  </span>
                      </a>
                     <a href="{{route('send-otp')}}" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph ph-plus-circle"></i>
                    <span>Reset password</span>
                  </span>
                      </a>
                   <a href="{{route('logout')}}" class="dropdown-item">
                  <span class="d-flex align-items-center">
                     <i class="ph ph-power"></i>
                      <span>Logout</span>
                  </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

    <!-- Required Js -->
    <script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.min')}}"></script>
    <script src="{{asset('assets/js/pcoded.js')}}"></script>
    <script src="{{asset('assets/js/plugins/feather.min.js')}}"></script>

