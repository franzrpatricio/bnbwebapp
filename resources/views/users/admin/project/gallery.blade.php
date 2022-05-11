@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')
<!-- Gallery -->
<!-- Gallery is linked to lightbox using data attributes.
To open lightbox, this is added to the gallery element: {data-toggle="modal" data-target="#exampleModal"}.
To open carousel on correct image, this is added to each image element: {data-target="#carouselExample" data-slide-to="0"}.
Replace '0' with corresponding slide number. -->

<div class="container-fluid px-4">
  <div class="card">
    {{-- show any errors in saving the forms --}} 
    @if ($errors->any())
      <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
              <div>{{$error}}</div>
          @endforeach
      </div>
    @endif  

    {{-- display msg after redirecting --}}
    @if (session('msg'))
      <div class="alert alert-success">{{ session('msg') }}</div>
    @endif    
  </div>
  <div class="card-body">
      {{-- <div class="float-end">
        <a href="{{ route('gallery.destroy', $project->id) }}" class="btn btn-danger mt-auto">Delete</a>
        <a href="{{url('admin/projects')}}" class="btn btn-secondary mt-auto">Back</a>
      </div> --}}
      {{-- DISPLAYING IMAGES --}}
      {{-- @foreach ($images as $item)
          <div>
            <img src="{{ asset('uploads/project_images/'.$item) }}"  width="100px" height="100px" class="mt-4 ml-4"/>
          </div>
      @endforeach --}}
    <div class="float-end">
      <a href="{{url('admin/projects')}}" class="btn btn-secondary mt-auto">Back</a>
    </div>

    @foreach ($image as $item)
      <div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
          <div class="col-12 col-sm-6 col-lg-3">
            <img src="{{ asset('uploads/project_images/'.$item->filenames) }}" 
              class="w-100" 
              data-slide-to="{{ $loop->index }}"
              data-target="#carouselExample"
            />
          </div>
      </div>
      <div>
        <form method="post" action="{{ route('gallery.update', $item->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <input type="file" name="image" class="form-control">
          </div>
      
          <div class="mb-3">
            <button type="submit" class="btn btn-primary" title='Update'>Update</button>
          </div>
        </form>
      
        <div class="mb-3">
          <a href="{{ route('gallery.destroy', $item->id) }}" class="btn btn-danger">Delete</a>
        </div>
      </div>
    @endforeach

    <!-- Modal -->
    <!-- This part is straight out of Bootstrap docs. Just a carousel inside a modal. -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                @foreach ($image as $item)
                  <div>
                    <li data-target="#carouselExample" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                  </div>
                @endforeach
              </ol>

              <div class="carousel-inner">
                @foreach ($image as $item)
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('uploads/project_images/'.$item->filenames) }}" class="d-block w-100"/>
                  </div>
                @endforeach
              </div>

              <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

