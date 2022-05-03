@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
<h1 class="mt-5">Manage Projects</h1>
    <div class="card">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fas fa-list"></i>List of Projects

                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/projects/find')}}">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" name="query" type="search" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </h4>

            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('projects.index') }}" class="btn btn-info btn-sm mr-2">View All Projects</a>
                    <a href="{{ route('projects.restore_all') }}" class="btn btn-success btn-sm mr-2">Restore All Projects</a>
                @else
                    <a href="{{ url('admin/add-project') }}" class="btn btn-primary btn-sm mr-2">
                        <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Project</div>
                    </a>

                    <a href="{{ url('admin/projects/add-images') }}" class="btn btn-primary btn-sm mr-2">
                        <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Add Gallery for Specific Project</div>
                    </a>

                    <a href="{{ route('projects.index', ['trashed' => 'post']) }}" class="btn btn-primary btn-sm mr-2">View Deleted Projects</a>
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
                        <th>Thumbnail</th>
                        <th>Gallery</th>
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

                            <td>
                                <a href="{{route('projects.gallery',$item->id)}}" class="btn btn-primary btn-sm mr-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                {{-- <a href="{{route('projects.gallery')}}" class="btn btn-primary btn-sm mr-2">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-eye"></i></div> --}}
                            </a>

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
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $projects->links() }}
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