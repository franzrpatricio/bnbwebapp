@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-5">Manage Category</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of Categories</div>
                <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Category</div>
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
                        <th>Category Name</th>
                        <th>Image</th>
                        <th colspan="2">Status</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr class="text-center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                @if ($item->image == true)
                                    {{-- get the category image from folder --}}
                                    <img src="{{ asset('uploads/category/'.$item->image) }}" width="50px" height="50px" alt="cat_img">
                                @else
                                    <h5>No Image Found</h5>                                
                                @endif
                            </td>
                            {{-- if status is true, show if not visible || visible --}}
                            {{-- to make the category visible just check the box for status --}}
                            <td >{{$item->status == '1' ? 'Active':'Inactive'}}</td>
                            <td>{{$item->feature == '1' ? 'Yes':'No'}}</td>
                            <td>
                                {{-- pass the ID of specific category --}}
                                <a href="{{ url('admin/edit-category/'.$item->id) }}">
                                    <i class="fa-solid fa-pen p-2" style="color:#019ad2;"></i>
                                </a>
                                <a href="{{url('admin/delete-category/'.$item->id)}}">
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