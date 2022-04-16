@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card mt-4"></div>
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New User</div></h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{url('admin/add-user')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="">Name</label>
                    {{-- input name refers to db field --}}
                    <input type="text" name="name" class="form-control"> 
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image"class="form-control">
                </div>
                <div class="mb-3">
                    <label>Cost</label>
                    <input type="number" required name="cost" min="0" value="0" step="0.01" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    {{-- input name refers to db field --}}
                    <input type="text" name="slug" class="form-control"> 
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" id="summernoteDesc" rows="5" class="form-control"></textarea>
                </div>

                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title"class="form-control"/>
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keywords</label>
                    <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                </div>

                <h6>Status</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Visible</label>
                            <input type="checkbox" name="status"/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save Project</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection