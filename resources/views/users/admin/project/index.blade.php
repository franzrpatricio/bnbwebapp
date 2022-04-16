@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card mt-4"></div>
        <div class="card-header">
            @if (request()->has('view_deleted'))
                <h4><div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of Projects</div>
                    
                    <a href="{{ url('admin/restore-projects') }}" class="btn btn-succss btn-sm">
                        Restore All
                    </a>
                </h4>
                {{-- <a href="{{ url('admin/projects') }}" class="btn btn-info btn-sm">
                    View All Projects
                </a> --}}
            @else
                <div class="col col-md-6 text-right">
                    <a href="{{ url('admin/add-project') }}" class="btn btn-primary btn-sm float-end">
                        <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Project</div>
                    </a>

                    <a href="{{ url('admin/projects', ['view_deleted'=>'DeletedRecords']) }}" class="btn btn-primary btn=sm">
                        View Deleted Projects
                    </a>
                </div>
            @endif
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
                    @if (count($projects)>0)
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
                                    @if (request()->has('view_deleted'))
                                        <a href="{{ url('admin/retore-project/'.$item->id) }}" class="btn btn-success btn-sm">
                                            Restore
                                        </a>
                                    @else
                                        <form action="{{ url('admin/delete-project/'.$item->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delet">
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                        {{-- pass the ID of specific category --}}
                                        <a href="{{ url('admin/edit-project/'.$item->id) }}" class="btn btn-success">Edit</a>
                                        {{-- <a href="{{url('admin/delete-project/'.$item->id)}}" class="btn btn-danger">Delete</a> --}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td>
                                No Projects Found.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection