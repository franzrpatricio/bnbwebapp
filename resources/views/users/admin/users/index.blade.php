@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
<h1 class="mt-5">Manage Users</h1>

    <div class="card">
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of Users</div>
                <a href="{{ url('admin/add-user') }}" class="btn btn-primary btn-sm float-end">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New User</div>
                </a>
            </h4>
        </div>
        <div class="card-body">
            {{-- display msg after redirecting --}}
            @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
            @endif

            <table id="example" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $item)    
                        <tr class="text-center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role_as == '0' ? 'Administrator':'Staff'}}</td>

                            {{-- if status is true, show if not visible || visible --}}
                            {{-- to make the user visible just check the box for status --}}
                            {{-- if status = 1->active; else->inactive --}}
                            <td>{{$item->status == '0' ? 'Active':'Inactive'}}</td> 
                            <td>
                                {{-- pass the ID of specific category --}}
                                <a href="{{ url('admin/edit-user/'.$item->id) }}">
                                    <i class="fa-solid fa-pen p-2" style="color:#019ad2;"></i>
                                </a>
                                <a href="{{url('admin/delete-user/'.$item->id)}}">
                                    <i class="fa-solid fa-trash p-2" style="color:red;"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection