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

{{-- @foreach (explode("|",$files) as $item) --}}
{{-- @foreach ($files as $item)
    <div class="mr-4">
      <img src="{{ asset('uploads/project_images/'.$item) }}">
      <img src="/uploads/project_images/'{{$item}}">
    </div>
@endforeach --}}

@php
    // $image = DB::table('files')->where('project_id', $image->project_id)->first();
    // $images = explode(',',$image->filenames);
@endphp
@foreach ($images as $item)
    <div>
      <img src="{{ asset('uploads/project_images/'.$item) }}"  width="100px" height="100px" class="mt-4 ml-4"/>
    </div>
@endforeach

{{-- <div>
  <h1>
    <STRONG>
      THE PEOPLE BEHIND THE SCENE
    </STRONG>
  </h1>

</div> --}}
{{-- <div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="{{ asset('assets/images/aj.jpg')}}" alt="First slide" data-target="#carouselExample" data-slide-to="0">
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="{{ asset('assets/images/renz.jpg')}}" alt="Second slide" data-target="#carouselExample" data-slide-to="1">
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="{{ asset('assets/images/3sha.jpg')}}" alt="Third slide" data-target="#carouselExample" data-slide-to="2">
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="{{ asset('assets/images/franz.jpg')}}" alt="Fourth slide" data-target="#carouselExample" data-slide-to="3">
  </div>
</div> --}}

<!-- Modal -->
<!-- 
This part is straight out of Bootstrap docs. Just a carousel inside a modal.
-->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
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
            <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample" data-slide-to="1"></li>
            <li data-target="#carouselExample" data-slide-to="2"></li>
            <li data-target="#carouselExample" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{ asset('assets/images/aj.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('assets/images/renz.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('assets/images/3sha.jpg')}}" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('assets/images/franz.jpg')}}" alt="Fourth slide">
            </div>
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
</div> --}}


<!-- Custom Styling Toggle. For demo purposes only. -->
{{-- <div class="switch-wrap">
  <label class="switch">
    <input type="checkbox" id="styleSwitch" onclick="switchStyle();">
    <span class="slider round"></span>
  </label>
  <span class="switch-text">Toggle between <em>Bootstrap defaults</em> and <em>custom styling</em>.</span>
</div> --}}
@endsection

