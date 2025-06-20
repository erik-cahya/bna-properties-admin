<div class="navbar-custom">
    <div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo-light">
                    <img src="{{ asset('admin') }}/assets/images/logo-light.png" alt="logo" class="logo-lg" height="20">
                    <img src="{{ asset('admin') }}/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="20">
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <img src="{{ asset('admin') }}/assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="20">
                    <img src="{{ asset('admin') }}/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="20">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu waves-effect waves-dark rounded-circle">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-2">

            <li class="d-none d-md-inline-block">
                <a class="nav-link waves-effect waves-dark" href="#" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen font-size-24"></i>
                </a>
            </li>

            <li class="nav-link waves-effect waves-dark" id="theme-mode">
                <i class="bx bx-moon font-size-24"></i>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user waves-effect waves-dark me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('admin') }}/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                    <span class="d-none d-md-inline-block ms-1">
                        {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-lucide="user" class="font-size-16 me-2"></i>
                        <span>My Account</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" class="dropdown-item notify-item">
                            <i data-lucide="log-out" class="font-size-16 me-2"></i>
                            <span>Logout</span>
                        </a>
                    </form>

                </div>
            </li>

        </ul>
    </div>
</div>
