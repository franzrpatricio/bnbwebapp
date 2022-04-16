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
                    {{-- ADMIN --}}
                    
                {{-- USER --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="{{ url('admin/add-user') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New Users
                        </a>
                        <a class="nav-link" href="{{ url('admin/user') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of Users
                        </a>
                    </nav>
                </div>
                @elseif(Auth::user()->role_as == '1')
                    {{-- STAFF --}}
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

                 {{-- FAQS --}}
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFaqs" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    FAQS
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFaqs" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="{{ url('admin/add-faqs') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New FAQ
                        </a>
                        <a class="nav-link" href="{{ url('admin/faqs') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of FAQ
                        </a>
                    </nav>
                </div>

                
                

               
                
              
               
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Comment Review
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <a class="nav-link" href="{{ url('staff/dashboard') }}">Visit Staff Dashboard</a>
        </div>
    </nav>
</div>