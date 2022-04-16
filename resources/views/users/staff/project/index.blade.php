@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card mt-4"></div>
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of Projects</div>
                <a href="{{ url('admin/add-project') }}" class="btn btn-primary btn-sm float-end">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Project</div>
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
                        <th>Category</th>
                        <th>House Plan</th>
                        <th>Project Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($projects as $item)    
                        <tr class="text-center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->houseplan->type}}</td>
                            <td>{{$item->name}}</td>

                            {{-- it should be multiple images and not visible sa index --}}
                            <td>
                                @if ($item->image == true)
                                    {{-- get the category image from folder --}}
                                    <img src="{{ asset('uploads/project/'.$item->image) }}" width="50px" height="50px" alt="proj_img">
                                @else
                                    <h5>No Image Found</h5>                                
                                @endif
                            </td>

                            {{-- if status is true, show if not visible || visible --}}
                            {{-- to make the project visible just check the box for status --}}
                            <td>{{$item->status == '1' ? 'Active':'Inactive'}}</td>
                            <td>
                                {{-- pass the ID of specific category --}}
                                <a href="{{ url('admin/edit-project/'.$item->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{url('admin/delete-project/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection