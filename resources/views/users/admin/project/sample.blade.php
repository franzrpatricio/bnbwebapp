@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')
<!-- Gallery -->
<!-- 
Gallery is linked to lightbox using data attributes.

To open lightbox, this is added to the gallery element: {data-toggle="modal" data-target="#exampleModal"}.

To open carousel on correct image, this is added to each image element: {data-target="#carouselExample" data-slide-to="0"}.
Replace '0' with corresponding slide number.
-->
<a href="{{url('admin/projects')}}" class="btn btn-danger float-end mt-auto">Back</a>

{{-- show any errors in saving the forms --}} 
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    </div>
@endif  

{{-- DISPLAYING IMAGES --}}
{{-- @foreach ($images as $item)
    <div>
      <img src="{{ asset('uploads/project_images/'.$item) }}"  width="100px" height="100px" class="mt-4 ml-4"/>
    </div>
@endforeach --}}

<div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
  @foreach ($images as $item)
      <div class="col-12 col-sm-6 col-lg-3">
        <img src="{{ asset('uploads/project_images/'.$item) }}" 
          class="w-100" 
          data-slide-to="{{ $loop->index }}"
          data-target="#carouselExample"
        />
      </div>
  @endforeach
</div>

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
            @foreach ($images as $item)
              <div>
                <li data-target="#carouselExample" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
              </div>
            @endforeach
          </ol>

          <div class="carousel-inner">
            @foreach ($images as $item)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset('uploads/project_images/'.$item) }}" class="d-block w-100"/>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Custom Styling Toggle. For demo purposes only. -->
{{-- <div class="switch-wrap">
  <label class="switch">
    <input type="checkbox" id="styleSwitch" onclick="switchStyle();">
    <span class="slider round"></span>
  </label>
  <span class="switch-text">Toggle between <em>Bootstrap defaults</em> and <em>custom styling</em>.</span>
</div> --}}
@endsection

