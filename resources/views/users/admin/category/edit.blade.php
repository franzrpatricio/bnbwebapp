@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
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
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for=""><strong>Category Name</strong></label>
                        <input type="text" required name="name"class="form-control" value="{{$category->name}}">
                    </div>
                    <div class="col-6 mb-3">
                        <label for=""><strong>Category Slug</strong></label>
                        <input type="text" name="slug"class="form-control" required value="{{$category->slug}}">
                    </div>
                    <div class="mb-3">
                        <label for=""><strong>Category Description</strong></label>
                        <textarea name="description" rows="5" class="form-control">{!!$category->description!!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label><i class="fa fa-upload"></i> <strong>Image</strong></label>
                        <input type="file" name="image" class="form-control">
                    </div>
    
                    <h6 class="mb-3"><i class="fa fa-tags"></i> SEO Tags</h6>
                    <div class="mb-3">
                        <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}">
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    For Category Meta Title, keyword as close to the beginning of the Category Name as possible.
                                </strong>
                            </small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea name="meta_description" rows="5" class="form-control">{!!$category->meta_description!!}</textarea>
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    For Category Meta Description, include a compelling summary of the page someone is about to click on.
                                </strong>
                            </small>
                        </div>
                    </div>
    
                    <div class="d-flex justify-content-end">
                        @if ($category->status == 1)
                            <label class="mr-2" style="font-family: FontAwesome; color:green"> &#xf111; <strong style="color: black">Category Status</strong></label>
                            <div class="mb-3">
                                <input type="checkbox" name="status" {{$category->status == '1' ? 'checked':''}}/>
                                <small>Click to make the category inactive.</small>
                            </div>
                            @if ($category->feature == 1)
                                <div class="mb-3">
                                    <input type="checkbox" name="feature" {{$category->feature == '1' ? 'checked':''}}/>
                                    <small>Click to remove this category as part of Specialization.</small>
                                </div>
                            @else
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" name="feature"/>
                                    <small>Click to make this category as part of Specialization.</small>
                                </div>
                            @endif
                        @else
                            <label class="mr-2" style="font-family: FontAwesome; color:red"> &#xf111; <strong style="color: black">Category Status</strong></label>
                            <div class="mb-3">
                                <input type="checkbox" name="status"/>
                                <small>Click to make the category active .</small>
                            </div>
                            @if ($category->feature == 1)
                                <div class="mb-3">
                                    <input type="checkbox" name="feature" {{$category->feature == '1' ? 'checked':''}}/>
                                    <small>Click to remove this category as part of Specialization.</small>
                                </div>
                            @else
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" name="feature"/>
                                    <small>Click to make this category as part of Specialization.</small>
                                </div>
                            @endif
                        @endif    
                        <div class="col-4 mb-3">
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fa fa-refresh fa-spin"></i>
                                {{__('Update Category')}}
                            </button>
                            <a href="{{url('admin/categories')}}" class="btn btn-outline-danger"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection