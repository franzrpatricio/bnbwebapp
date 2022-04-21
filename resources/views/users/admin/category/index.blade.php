@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-5">Manage Category</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of Categories</div></h4>

            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('categories.index') }}" class="btn btn-info btn-sm">View All Category</a>
                    <a href="{{ route('categories.restore_all') }}" class="btn btn-success btn-sm">Restore All Categories</a>
                @else
                    <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Category</div>
                    <a href="{{ route('categories.index', ['trashed' => 'post']) }}" class="btn btn-primary btn-sm">View Deleted Categories</a>
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
                    @if (count($category)>0)
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
                                    {{-- <a href="{{ url('admin/edit-category/'.$item->id) }}">
                                        <i class="fa-solid fa-pen p-2" style="color:#019ad2;"></i>
                                    </a>
                                    <a href="{{url('admin/delete-category/'.$item->id)}}">
                                        <i class="fa-solid fa-trash p-2" style="color:red;"></i>
                                    </a> --}}

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
                                            <button type="submit" class="btn btn-danger delete" title='Delete'>
                                                <i class="fa-solid fa-trash" style="color:red;"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No Category Found. 🥺</td>
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