@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
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
                <div class="row">
                    <div class="col-6 mb-3">
                        <input type="text" placeholder="&#xf0ea; Category Name" required style="font-family:Arial, FontAwesome" name="name"class="form-control">
                    </div>
                    <div class="col-6 mb-3">
                        <input type="text" name="slug"class="form-control" placeholder="&#xf02b; Slug" required style="font-family:Arial, FontAwesome">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" rows="5" class="form-control" placeholder="&#xf039; Write a description here..." style="font-family:Arial, FontAwesome"></textarea>
                    </div>
                    <div class="mb-3">
                        <label><i class="fa fa-upload"></i>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
    
                    <h6 class="mb-3"><i class="fa fa-tags"></i>SEO Tags</h6>
                    <div class="mb-3">
                        <input type="text" name="meta_title" class="form-control" placeholder="&#xf121; Meta Title" style="font-family:Arial, FontAwesome">
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    Keyword as close to the beginning of the Category Name as possible.
                                </strong>
                            </small>
                        </div>
                    </div>
                    <div class="mb-3">
                        {{-- <input type="text" name="meta_description" class="form-control" placeholder="&#xf121; Meta Description" style="font-family:Arial, FontAwesome"> --}}
                        <textarea name="meta_description" rows="5" class="form-control" placeholder="&#xf121; Meta Description" style="font-family:Arial, FontAwesome"></textarea>
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    Include a compelling summary of the page someone is about to click on.
                                </strong>
                            </small>
                        </div>
                    </div>
    
                  
                        <label class="mr-2" style="font-family: FontAwesome; color:green"> &#xf111; <strong style="color: black">Category Status</strong></label>
                        <div class="mb-3">
                            <input type="checkbox" name="status"/>
                            <small>Click to make the category visible .</small>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="feature"/>
                            <small>Click to make this category part of Specialization.</small>
                        </div>
                      
                 
                </div>  
                <div class="col-12 d-flex justify-content-end p-3">
                            <button type="submit" class="btn btn-outline-primary m-2">
                                <i class="fa fa-plus"></i>
                                {{__('Add Category')}}
                            </button>
                            
                            <a href="{{url('admin/categories')}}" class="btn btn-outline-danger m-2"><i class="fa fa-times"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection