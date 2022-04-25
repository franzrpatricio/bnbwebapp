@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
<h1 class="mt-5">Manage Projects</h1>
    <div class="card">
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of Projects</div></h4>

            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('projects.index') }}" class="btn btn-info btn-sm">View All Projects</a>
                    <a href="{{ route('projects.restore_all') }}" class="btn btn-success btn-sm">Restore All Projects</a>
                @else
                    <a href="{{ url('admin/add-project') }}" class="btn btn-primary btn-sm">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Project</div>
                    <a href="{{ route('projects.index', ['trashed' => 'post']) }}" class="btn btn-primary btn-sm">View Deleted Projects</a>
                </a>
                @endif
            </div>
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
                                <td>{{$item->status == '0' ? 'Active':'Inactive'}}</td>
                                <td>
                                    @if(request()->has('trashed'))
                                        <a href="{{ route('projects.restore', $item->id) }}" class="btn btn-success">Restore</a>
                                    @else
                                        <a href="{{ url('admin/edit-project/'.$item->id) }}"><i class="fas fa-pen"></i></a>
                                        <form method="POST" action="{{ route('projects.destroy', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn delete" title='Delete'>
                                                <i class="fa-solid fa-trash" style="color:red;"></i>
                                            </button>
                                        </form>

                                        {{-- pass the ID of specific category --}}

                                        <a href="{{ url('admin/edit-project/'.$item->id) }}" class="fa-solid fa-pen p-2" style="color:#019ad2;"></a>
                                        {{-- <a href="{{url('admin/delete-project/'.$item->id)}}" class="fa-solid fa-trash p-2" style="color:red;"></a> --}}

                                        <a href="{{ url('admin/edit-project/'.$item->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{url('admin/delete-project/'.$item->id)}}" class="btn btn-danger">Delete</a>


                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No Projects Found. 🥺</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').click(function(e) {
            if(!confirm('Are you sure you want to delete this post?')) {
                e.preventDefault();
            }
        });
    });
</script>
@endsection