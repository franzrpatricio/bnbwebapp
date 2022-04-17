@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
    @if (Auth::user()->role_as == '0')
    {{-- ADMIN --}}
     <!-- User -->
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            USERS</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">40</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300" style="color: #4CA5D7"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- USER --}}

@elseif(Auth::user()->role_as == '1')
    {{-- STAFF --}}
@endif
       
        <!-- Content Row -->
       

         

            <!-- Categories -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                    Categories</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">200</div>
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
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">PROJECTS
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50</div>
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

            <!-- Inquiries -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                   Inquiries</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
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
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                   Customer Review</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300" style="color: #4CA5D7"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
        
   
</div>

@endsection