@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">Edit Project
                <a href="{{url('admin/projects')}}" class="btn btn-danger float-end">Back</a>
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

            <form action="{{ url('admin/update-project/'.$project->id) }}" method="post" enctype="multipart/form-data">
                {{-- Laravel provides protection with the CSRF attacks 
                    by generating a CSRF token. 
                    This CSRF token is generated 
                    automatically for each user. --}}
                @csrf

                {{-- for updating the record --}}
                @method('PUT')

                    {{-- FETCH ALL RECORDS --}}
                    {{-- REPLACE CATEGORY ID AND HOUSE PLAN ID WITH CAT && PLAN NAME --}}
                    <div class="row">
                        <div class="col-md-6">
                            <label>Category</label>
                            <select name="category_id" required class="form-control">
                                <option value="">-- Select Category --</option>
                                @foreach ($category as $cat_item)
                                    <option value="{{$cat_item->id}}" {{$project->category_id == $cat_item->id ? 'selected':''}}>
                                        {{$cat_item->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>House Plan</label>
                            <select name="houseplan_id" required class="form-control">
                                <option value="">-- Select House Plan --</option>
                                @foreach ($houseplan as $plan)
                                    <option value="{{$plan->id}}" {{$project->houseplan_id == $plan->id ? 'selected':''}}>
                                        {{$plan->type}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Project Name</label>
                            <input type="text" name="name" value="{{$project->name}}" class="form-control">
                        </div>
    
                        {{-- no need to show the current image when updating
                            you'll replace it anyway zzzz....  --}}
                        <div class="col-md-6">
                            <label>Image</label>
                            <input type="file" name="image"class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Virtual Tour</label>
                        <span><h5>Upload Videos for Project Virutal Tour</h5></span>
                        <input type="file" 
                            name="videos[]" 
                            class="form-control"
                            id="inputFiles"
                            multiple
                        >
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Cost</label>
                            <input type="text" name="cost" value="{{$project->cost}}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Stories</label>
                            <input type="text" name="stories" value="{{$project->stories}}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Rooms</label>
                            <input type="number" name="rooms" value="{{$project->rooms}}" class="form-control">
                        </div>
    
                        <div class="col-md-6">
                            <label>Slug</label>
                            <input type="text" name="slug" value="{{$project->slug}}" class="form-control">
                        </div>    
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" id="summernoteDesc" rows="5" class="form-control">{{$project->description}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label><strong>Architectural Designs :</strong></label><br>
                        <span>Please select designs again:</span>
                        <select name="designs[]" id="desgins" multiple class="filter-multi-select">
                            @foreach ($architectural as $item)
                                <option value="{{ $item->design }}">{{$item->design}}</option>
                            @endforeach
                        </select>    
                    </div>

                    <div class="mb-3">
                        <label><strong>Amenities :</strong></label><br>
                        <span>Please select amenities again:</span>
                        <select name="amenities[]" id="amenities" multiple class="filter-multi-select">
                            @foreach ($amenities as $item)
                                <option value="{{ $item->service }}">{{$item->service}}</option>
                            @endforeach
                        </select>    
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" value="{{$project->meta_title}}" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Meta Description</label>
                            <textarea type="text" name="meta_description" rows="3" class="form-control">{{$project->meta_description}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Meta Keywords</label>
                            <textarea name="meta_keyword" rows="3" class="form-control">{{$project->meta_keyword}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Upload Project Files</label>
                        <span>You can upload multiple images</span>
                        <input type="file" 
                                name="images[]"
                                class="form-control"
                                id="inputFiles"
                                multiple
                        >
                    </div>

                    <h6>Status</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>Visible</label>
                            <input type="checkbox" name="status" {{$project->status == '1' ? 'checked':''}}/>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update Project</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection