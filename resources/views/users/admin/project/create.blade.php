@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card mt-4"></div>
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>
                Create New Project
                <a href="{{url('admin/projects')}}" class="btn btn-danger float-end">Back</a>
            </div></h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{url('admin/add-project')}}" method="post" enctype="multipart/form-data">
                @csrf

                <select name="cars" id="cars" multiple="" class="chosen-select" style="width: 300px">
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>

                <div class="mb-3">
                    <label for="">Category</label>
                    {{-- select what category --}}
                    <select name="category_id" id="" class="form-control">
                        @foreach ($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">House Plan</label>
                    {{-- select what category --}}
                    <select name="houseplan_id" id="" class="form-control">
                        @foreach ($houseplan as $plan)
                            <option value="{{$plan->id}}">{{$plan->type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">Project Name</label>
                    {{-- input name refers to db field --}}
                    <input type="text" name="name" class="form-control"> 
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image"class="form-control">
                </div>
                <div class="mb-3">
                    <label>Virtual Tour</label>
                    <span><h5>Upload your Project Virutal Tour</h5></span>
                    <input type="file" name="vtour" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Cost</label>
                    <input type="number" required name="cost" min="0" value="0" step="0.01" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Stories</label>
                    <input type="text" name="stories" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Rooms</label>
                    <input type="number" name="rooms" min="1" value="1" class="form-control">
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

                <div class="form-group">
                    <label><strong>Amenities :</strong></label><br>
                    @foreach ($amenities as $item)
                        <label><input type="checkbox" value="{{$item->id}}" name="amenity[]">{{$item->service}}</label>
                        {{-- <input hidden name="amenity_id" value="{{ $item->id }}"> --}}
                    @endforeach
                </div>  

                {{-- <div class="form-group">
                    <label><strong>Architectural Design :</strong></label><br>
                    @foreach ($architectural as $designs)
                        <label><input type="checkbox" value="{{$designs->id}}" name="designs[]">{{$designs->design}}</label>
                    @endforeach
                </div>   --}}

                <div class="form-group">
                    <label>Upload Project Files</label>
                    <span>You can upload multiple images</span>
                    <input type="file" 
                            name="filenames[]"
                            class="form-control"
                            id="inputFiles"
                            multiple
                    >
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