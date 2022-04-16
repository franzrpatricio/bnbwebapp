<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                @if (Auth::user()->role_as == '0')
                {{-- MODULES NG ADMIN --}}
                 {{-- USERS --}}
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="{{ url('admin/add-category') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New USers
                        </a>
                        <a class="nav-link" href="{{ url('admin/category') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of Users
                        </a>
                    </nav>
                </div>
            @elseif(Auth::user()->role_as == '1')
                {{-- MODUELS NG STAFF --}}
                {{-- Category --}}
                {{-- Project --}}
                {{-- FAQS --}}
                 {{-- Inquiry --}}
                  {{-- House plan --}}

            @endif
                {{-- CATEGORIES --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="{{ url('admin/add-category') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New Category
                        </a>
                        <a class="nav-link" href="{{ url('admin/category') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of Categories
                        </a>
                    </nav>
                </div>

                {{-- PROJECTS --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProject" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Projects
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProject" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="{{ url('admin/add-project') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New Project
                        </a>
                        <a class="nav-link" href="{{ url('admin/projects') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of Projects
                        </a>
                    </nav>
                </div>
                 {{-- FAQs --}}
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProject" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    FAQs
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProject" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="{{ url('admin/add-project') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New FAQs
                        </a>
                        <a class="nav-link" href="{{ url('admin/projects') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of FAQs
                        </a>
                    </nav>
                </div>
                 {{-- Inquiry List --}}
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProject" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Inquiry List
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProject" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="{{ url('admin/add-project') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New Inquiry List
                        </a>
                        <a class="nav-link" href="{{ url('admin/projects') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of Inquiry List
                        </a>
                    </nav>
                </div>
                 {{-- HousePlan --}}
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProject" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    House Plan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProject" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="{{ url('admin/add-project') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New House Plan
                        </a>
                        <a class="nav-link" href="{{ url('admin/projects') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of House PLan
                        </a>
                    </nav>
                </div>
                 {{-- Comment Review --}}
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProject" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Comment Reviews
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProject" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="{{ url('admin/add-project') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New FAQs
                        </a>
                        <a class="nav-link" href="{{ url('admin/projects') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of FAQs
                        </a>
                    </nav>
                </div>
               