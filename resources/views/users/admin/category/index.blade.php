@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    {{-- <i class="fas fa-layer-group"></i> --}}
                    <i class="fa fa-layer-group"></i>
                    List of Categories
                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/categories/find')}}">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" name="query" type="search" placeholder="&#xf002; Search category here..." style="font-family:Arial, FontAwesome" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        </div>
                    </form>
                </div>
            </h4>

            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-info btn-sm"> 
                        <i class="fas fa-layer-group"></i>
                        View All Category</a>
                    <a href="{{ route('categories.restore_all') }}" class="btn btn-outline-success btn-sm"> 
                        <i class="fa fa-plus-square"></i>
                        Restore All Categories</a>
                @else
                    <a href="{{ url('admin/add-category') }}" class="btn btn-outline-primary btn-sm">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Category</div>
                    </a>
                    <a href="{{ route('categories.index', ['trashed' => 'post']) }}" class="btn btn-outline-danger btn-sm"> 
                        <i class="fa fa-trash"></i>
                        View Deleted Categories</a>
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
                        <th>Category Name</th>
                        <th>Image</th>
                        <th colspan="2">Status</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>
                <tbody>
                    @if (isset($msg))
                        <tr class="text-center">
                            <td colspan="6">
                                <div class="alert alert-danger">{{ $msg }}</div>
                            </td>
                        </tr>
                    @else
                        @forelse ($category as $item)
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
                                    @if(request()->has('trashed'))
                                        <a href="{{ route('categories.restore', $item->id) }}" class="btn btn-success">Restore</a>
                                    @else
                                        {{-- pass the ID of specific faq --}}
                                        <a href="{{ url('admin/edit-category/'.$item->id) }}">
                                            <i class="fa-solid fa-pen" style="color:#019ad2;"></i>
                                        </a>
                                        <form method="POST" action="{{ route('categories.destroy', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn delete" title='Delete'>
                                                <i class="fa-solid fa-trash" style="color:red;"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center"><td colspan="6"><h5>No Categories</h5></td></tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
            <div class="float-end">
                {{ $category->links() }}
            </div>
        </div>
    </div>
</div>
@endsection