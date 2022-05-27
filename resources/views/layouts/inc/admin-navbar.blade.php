<nav class="sb-topnav navbar navbar-expand" style="background: #4CA5D7">
    <!-- Navbar Brand-->
    <img src="{{ asset('assets/images/logo.png') }}" alt="" style="height: 5rem; width:15rem;">
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-light" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <!-- <img src="{{ asset('assets/images/'.Auth::user()->image) }}" alt="" style="height: 3rem; width:3rem; border-radius:100rem;"> -->
        @if (Auth::user()->image === "def.png")
        <img src="{{ asset('assets/images/'.Auth::user()->image) }}" alt="" style="height: 3rem; width:3rem; border-radius:100rem;">
        @else 
        <img src="{{ asset('uploads/users/'.Auth::user()->image) }}" alt="" style="height: 3rem; width:3rem; border-radius:100rem;">
        @endif
    </div>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <i class="fas fa-user fa-fw"></i> --}}
                {{-- <img src="assets/images/aj.jpg"> --}}
                {{-- <img src=".{{ asset('assets/images/aj.jpg') }}" class="rounded-circle" width="40px" height="40px"> --}}
                <small>{{ Auth::user()->name }}</small></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ url('admin/profile') }}"><i class="fa fa-gear"></i> Profile Settings</a></li>
                <li><a class="dropdown-item" href="{{ url('admin/logs') }}"><i class="fas fa-tasks"></i> Activity Logs</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
