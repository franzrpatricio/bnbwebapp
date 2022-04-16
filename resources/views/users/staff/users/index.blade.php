@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card mt-4"></div>
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

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $item)    
                        <tr class="text-center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role_as == '1' ? 'Administrator':'Staff'}}</td>

                            {{-- if status is true, show if not visible || visible --}}
                            {{-- to make the user visible just check the box for status --}}
                            {{-- <td>{{$item->status == '1' ? 'Active':'Inactive'}}</td> --}}
                            <td>
                                {{-- pass the ID of specific category --}}
                                <a href="{{ url('admin/edit-user/'.$item->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{url('admin/delete-user/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection