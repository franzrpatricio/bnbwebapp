@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
<h1 class="mt-5">Add Category
    <a href="{{url('admin/categories')}}" class="btn btn-danger float-end">Back</a>
</h1>
    <div class="card mt-4">
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Category</div></h4>
        </div>
        
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/add-category') }}" method="post" enctype="multipart/form-data">
                {{-- Laravel provides protection with the CSRF attacks 
                    by generating a CSRF token. 
                    This CSRF token is generated 
                    automatically for each user. --}}
                @csrf
                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" name="name"class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug"class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" id="summernoteDesc" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image"class="form-control">
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title"class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Meta Description</label>
                        <input type="text" name="meta_description"class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Meta Keywords</label>
                        <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                    </div>

                    <h6>Mode</h6>
                    <div class="row">
                        <div class="mb-3">
                            <label>Navbar Status</label>
                            <input type="checkbox" name="name"/>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Visible</label>
                            <input type="checkbox" name="status"/>
                            {{-- <input type="checkbox" name="status" />Hidden --}}
                            {{-- <input type="checkbox" name="status"/>Active --}}
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary">Save Category</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection