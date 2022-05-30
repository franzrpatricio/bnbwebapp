@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-3">
        {{-- <div class="card mt-4"></div> --}}
        <div class="card-header">
            <h4><div class="sb-nav-link-icon">
                <i class="fas fa-plus-circle"></i>
                Create New Project
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
                <div class="row">
                    <div class="col-6 mb-3">
                        {{-- select what category --}}
                        <select name="category_id" id="" class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($category as $cat)
                                <option value="{{$cat->id}}" style="font-family:Arial, FontAwesome">&#xf0ea; {{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="col-6 mb-3">
                        {{-- select what category --}}
                        <select name="houseplan_id" id="" class="form-control">
                            <option value="">--Select House Plan Type--</option>
                            @foreach ($houseplan as $plan)
                                <option value="{{$plan->id}}" style="font-family:Arial, FontAwesome">&#xf0f7; {{$plan->type}}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        {{-- input name refers to db field --}}
                        <input type="text" name="name" class="form-control" placeholder="&#xf015; Project Name" required style="font-family:Arial, FontAwesome" required> 
                    </div>

                    <div class="col-md-4">
                        <input type="file" name="image" class="form-control">
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    Upload Image for Project Thumbnail
                                </strong>
                            </small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="file" 
                            name="videos[]" 
                            class="form-control"
                            id="inputFiles"
                            multiple
                        >
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    Upload Videos for Project Virutal Tour
                                </strong>
                            </small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="file" 
                                name="images[]"
                                class="form-control"
                                id="inputFiles"
                                multiple
                        >
                        <div class="card mt-1 mb-3" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    Upload Images for Project Gallery
                                </strong>
                            </small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <input type="number" required name="cost" min="0" step="0.01" class="form-control" placeholder="&#8369; Project Cost" style="font-family:Arial, FontAwesome">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="stories" class="form-control" placeholder="&#xf015; Stories" style="font-family:Arial, FontAwesome">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="rooms" min="1" class="form-control" placeholder="&#xf015; Rooms" style="font-family:Arial, FontAwesome">
                    </div>
                    <div class="mt-3">
                        <div class="mb-3">
                            <textarea name="description" rows="5" class="form-control" placeholder="&#xf039; Write a description here..." style="font-family:Arial, FontAwesome"></textarea>
                        </div>
                    </div>
    
                    <div class="col-6 mb-3">
                        <label for=""><strong>Architectural Designs:</strong></label>
                        <select name="designs[]" id="desgins" multiple class="filter-multi-select">
                            @foreach ($architectural as $item)
                                <option value="{{$item->design}}">{{$item->design}}</option>
                            @endforeach
                        </select>    
                    </div>
                    
                    <div class="col-6 mb-3">
                        <label for=""><strong>Amenities:</strong></label>
                        <select name="amenities[]" id="amenities" multiple class="filter-multi-select">
                            @foreach ($amenities as $item)
                                <option value="{{$item->service}}">{{$item->service}}</option>
                            @endforeach
                        </select>    
                    </div>
    
                    <h6 class="mt-4"><i class="fa fa-tags"></i>SEO Tags</h6>
                    <div class="col-6 mb-3">
                        <input type="text" name="slug" class="form-control" placeholder="&#xf02b; Slug" style="font-family:Arial, FontAwesome">
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    The keyword for Project page is often the name of the project.
                                </strong>
                            </small>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <input type="text" name="meta_title" class="form-control" placeholder="&#xf121; Meta Title" style="font-family:Arial, FontAwesome">
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    Keyword as close to the beginning of the Project Name as possible.
                                </strong>
                            </small>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <textarea name="meta_description" rows="5" class="form-control" placeholder="&#xf121; Meta Description" style="font-family:Arial, FontAwesome"></textarea>
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3"><i class="fas fa-info-circle" style="color:gold"></i><strong>Include a compelling summary of the page someone is about to click on.</strong></small>
                        </div>
                    </div> 
                    
                    <div class="mb-3">
                            <label class="mr-2" style="font-family: FontAwesome; color:green"> &#xf111; <strong style="color: black">Project Status</strong></label>
                            <div class="mb-3">
                                <input type="checkbox" name="status"/>
                                <small>Click to make the project visible .</small>
                            </div>
                        </div>
        
                    <div class="d-flex justify-content-end">
                      
                        <div class="col-4 mb-3">
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fa fa-plus"></i>
                                Save Project
                            </button>
                            <a href="{{url('admin/projects')}}" class="btn btn-outline-danger">
                                <i class="fa fa-times"></i>    
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection