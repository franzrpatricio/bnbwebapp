@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-5">Update Category</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">Edit Category
                <a href="{{url('admin/category')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            {{-- show any errors in saving the forms --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/update-category/'.$category->id) }}" method="post" enctype="multipart/form-data">
                {{-- Laravel provides protection with the CSRF attacks 
                    by generating a CSRF token. 
                    This CSRF token is generated 
                    automatically for each user. --}}
                @csrf

                {{-- for updating the record --}}
                @method('PUT')

                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" id="summernoteDesc" rows="5" class="form-control">{{$category->description}}</textarea>
                    </div>
                    {{-- no need to show the current image when updating
                        you'll replace it anyway zzzz....  --}}
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image"class="form-control">
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control">{{$category->meta_description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Meta Keywords</label>
                        <textarea name="meta_keyword" rows="3" class="form-control">{{$category->meta_keyword}}</textarea>
                    </div>

                    <h6>Mode</h6>
                    <div class="row">
                        <div class="mb-3">
                            <label>Navbar Status</label>
                            <input type="checkbox" name="name" {{$category->navbar_status == '1' ? 'checked':''}} />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Visible</label>
                            <input type="checkbox" name="status" {{$category->status == '1' ? 'checked':''}}/>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection