@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')
<!-- Gallery -->
<!-- Gallery is linked to lightbox using data attributes.
To open lightbox, this is added to the gallery element: {data-toggle="modal" data-target="#exampleModal"}.
To open carousel on correct image, this is added to each image element: {data-target="#carouselExample" data-slide-to="0"}.
Replace '0' with corresponding slide number. -->

<div class="float-end">
  <a href="{{url('admin/projects')}}" class="btn btn-secondary mt-auto">Back</a>
</div>

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
    @foreach ($videos as $item)
        <iframe src="{{ asset('uploads/virtual_tour/'.$item->video) }}" 
          width="100%" height="200px"
          frameborder="0" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
          allowfullscreen></iframe>
        <form method="post" action="{{ route('virtualTour.update', $item->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <input type="file" name="vtour" class="form-control">
          </div>
      
          <div class="mb-3">
            <button type="submit" class="btn btn-primary" title='Update'>Update</button>
          </div>
        </form>
      
        <div class="mb-3">
          <a href="{{ route('virtualTour.destroy', $item->id) }}" class="btn btn-danger">Delete</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection

