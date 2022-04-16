<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion " id="sidenavAccordion" style="background: #4CA5D7">
        <div class="sb-sidenav-menu text-white">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link link-light" href="{{ url('/admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                
                @if (Auth::user()->role_as == '0')
                    {{-- ADMIN --}}
                    
                {{-- USER --}}
                <a class="nav-link collapsed link-light" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed link-light" href="{{ url('admin/add-user') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New Users
                        </a>
                        <a class="nav-link link-light" href="{{ url('admin/user') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of Users
                        </a>
                    </nav>
                </div>
                @elseif(Auth::user()->role_as == '1')
                    {{-- STAFF --}}
                @endif

                

                {{-- CATEGORIES --}}
                <a class="nav-link collapsed link-light" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed link-light" href="{{ url('admin/add-category') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New Category
                        </a>
                        <a class="nav-link link-light" href="{{ url('admin/category') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of Categories
                        </a>
                    </nav>
                </div>

                {{-- PROJECTS --}}
                <a class="nav-link collapsed link-light" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProject" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Projects
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProject" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed link-light" href="{{ url('admin/add-project') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New Project
                        </a>
                        <a class="nav-link link-light" href="{{ url('admin/projects') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of Projects
                        </a>
                    </nav>
                </div>

                 {{-- FAQS --}}
                 <a class="nav-link collapsed link-light" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFaqs" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-circle-question"></i></div>
                    FAQS
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFaqs" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed link-light" href="{{ url('admin/add-faqs') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New FAQ
                        </a>
                        <a class="nav-link link-light" href="{{ url('admin/faqs') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of FAQ
                        </a>
                    </nav>
                </div>

                 {{-- House Plan --}}
                 <a class="nav-link collapsed link-light" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHousePlan" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-house-chimney"></i></div>
                    House Plan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseHousePlan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed link-light" href="{{ url('admin/add-houseplan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New House Plan
                        </a>
                        <a class="nav-link link-light" href="{{ url('admin/houseplan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of House Plans
                        </a>
                    </nav>
                </div>
                
                
                 {{-- Inquiry List --}}
                 <a class="nav-link collapsed link-light" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInquiryList" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
                    Inquiry List
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseInquiryList" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed link-light" href="{{ url('admin/add-inquirylist') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create New Inquiry List
                        </a>
                        <a class="nav-link link-light" href="{{ url('admin/inquirylist') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            List of Inquiry List
                        </a>
                    </nav>
                </div>
               
                
              
               
                <a class="nav-link link-light" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                    Comment Review
                </a>
            </div>
        </div>
       
    </nav>
</div>
