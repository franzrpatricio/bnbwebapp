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

                    <div class="mb-3">
                        <label>Project Name</label>
                        <input type="text" name="name" value="{{$project->name}}" class="form-control">
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
                                name="images[]"
                                class="form-control"
                                id="inputFiles"
                                multiple
                        >
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    Upload Images for Project Gallery
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

                    <div class="col-md-4 mt-3">
                        <label>Cost</label>
                        <input type="number" name="cost" min="0" step="0.01" value="{{$project->cost}}" class="form-control">
                    </div>

                    <div class="col-md-4 mt-3">
                        <label>Stories</label>
                        <input type="text" name="stories" value="{{$project->stories}}" class="form-control" style="font-family:Arial, FontAwesome">
                    </div>

                    <div class="col-md-4 mt-3">
                        <label>Rooms</label>
                        <input type="number" name="rooms" value="{{$project->rooms}}" class="form-control">
                    </div>

                    <div class="mt-3">
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" id="summernoteDesc" rows="5" class="form-control">{{$project->description}}</textarea>
                        </div>
                    </div>

                    <div class="col-6 mb-3">
                        <label><strong>Architectural Designs :</strong></label><br>
                        <select name="designs[]" id="desgins" multiple class="filter-multi-select">
                            @foreach ($architectural as $itemz)
                                <option 
                                    @foreach (json_decode($project->designs) as $item => $key)
                                        {{ $itemz->design == $key ? 'selected' : '' }} 
                                    @endforeach
                                    value="{{ $itemz->design }}"
                                >
                                    {{$itemz->design}}
                                </option>
                            @endforeach                            
                        </select>  
                    </div>

                    <div class="col-6 mb-3">
                        <label><strong>Amenities :</strong></label><br>
                        <select name="amenities[]" id="amenities" multiple class="filter-multi-select">
                            @foreach ($amenities as $itema)
                                <option 
                                    @foreach (json_decode($project->amenities) as $item => $key)
                                        {{ $itema->service == $key ? 'selected' : '' }} 
                                    @endforeach
                                    value="{{ $itema->service }}"
                                >
                                    {{$itema->service}}
                                </option>
                            @endforeach                            
                        </select>  
                    </div>

                    <h6 class="mt-4"><i class="fa fa-tags"></i>SEO Tags</h6>
                    <div class="col-6 mb-3" style="font-family:Arial, FontAwesome">
                        <label>&#xf02b; Slug</label>
                        <input type="text" name="slug" value="{{$project->slug}}" class="form-control">
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    The keyword for Project page is often the name of the project.
                                </strong>
                            </small>
                        </div>
                    </div>    

                    <div class="col-6 mb-3" style="font-family:Arial, FontAwesome">
                        <label>&#xf121; Meta Title</label>
                        <input type="text" name="meta_title" value="{{$project->meta_title}}" class="form-control">
                        <div class="card mt-1" style="background-color:antiquewhite">
                            <small class="ml-3">
                                <i class="fas fa-info-circle" style="color:gold"></i>
                                <strong>
                                    Keyword as close to the beginning of the Project Name as possible.
                                </strong>
                            </small>
                        </div>
                    </div>

                    <div class="mb-3" style="font-family:Arial, FontAwesome">
                        <label>&#xf121; Meta Description</label>
                        <textarea type="text" name="meta_description" rows="3" class="form-control">{{$project->meta_description}}</textarea>
                    </div>

                    {{-- <h6>Status</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>Visible</label>
                            <input type="checkbox" name="status" {{$project->status == '1' ? 'checked':''}}/>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div> --}}

                
                        @if ($project->status == 1)
                            <div class="mb-3">
                                <label class="mr-2" style="font-family: FontAwesome; color:green"> &#xf111; <strong style="color: black">Project Status</strong></label>
                                <div class="mb-3">
                                    <input type="checkbox" name="status" {{$project->status == '1' ? 'checked':''}}/>
                                    <small>Click to make the project inactive.</small>
                                </div>
                            </div>
                        @else
                            <div class="mb-3">
                                <label class="mr-2" style="font-family: FontAwesome; color:red"> &#xf111; <strong style="color: black">Project Status</strong></label>
                                <div class="mb-3">
                                    <input type="checkbox" name="status"/>
                                    <small>Click to make the project Active.</small>
                                </div>
                            </div>
                        @endif

                      
                    
                </div> 
                 <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary m-2"><i class="fa fa-refresh fa-spin"></i> Update Project</button>
                            <a href="{{url('admin/projects')}}" class="btn btn-outline-danger m-2"><i class="fa fa-times"></i> Cancel</a>
                        </div>
            </form>
        </div>
    </div>
</div>
@endsection