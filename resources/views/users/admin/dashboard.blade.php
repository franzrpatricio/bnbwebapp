@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">All Active Modules</li>
    </ol>
    <div class="row">
        @if (Auth::user()->role_as == '1')
        <!-- User -->
            {{-- ADMIN --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{ url('admin/users') }}" class="stretched-link"></a>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">ADMINISTRATORS</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$administrators}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-shield fa-2x text-gray-300" style="color: #4CA5D7"></i>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STAFF --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                <a href="{{ url('admin/users') }}" class="stretched-link"></a>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">STAFF</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$staffs}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tie fa-2x text-gray-300" style="color: #4CA5D7"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Content Row -->
    
        <!-- Categories -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
            <a href="{{ url('admin/categories') }}" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-landmark fa-2x text-gray-300" style="color: #4CA5D7"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
            <a href="{{ url('admin/projects') }}" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">PROJECTS</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $projects }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300" style="color: #4CA5D7"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- houseplans -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
            <a href="{{ url('admin/houseplan') }}" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">House Plans</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $houseplans }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300" style="color: #4CA5D7"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQS -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
            <a href="{{ url('admin/faqs') }}" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">FAQS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $faqs }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-question-circle fa-2x text-gray-300" style="color: #4CA5D7"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inquiries -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
            <a href="{{ url('admin/inquiries') }}" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Inquiries</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $inquiries }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300" style="color: #4CA5D7"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Reviews -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
            <a href="{{ url('admin/comments') }}" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Comments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $comments }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-address-card fa-2x text-gray-300" style="color: #4CA5D7"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribers -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
            <a href="{{ url('admin/newsletter') }}" class="stretched-link"></a>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Subscribers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $subscribers }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300" style="color: #4CA5D7"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection