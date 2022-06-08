@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')
<!-- Gallery -->
<!-- Gallery is linked to lightbox using data attributes.
To open lightbox, this is added to the gallery element: {data-toggle="modal" data-target="#exampleModal"}.
To open carousel on correct image, this is added to each image element: {data-target="#carouselExample" data-slide-to="0"}.
Replace '0' with corresponding slide number. -->

<div class="container-fluid">
  <div class="row mt-5">
    <div class="col-6">
      <h1>Manage Vitual Tour</h1>
    </div>

    <div class="col-6 d-flex justify-content-end">
      <a href="{{url('admin/projects')}}" class="btn btn-outline-danger mt-3 float-end"><i class="fa fa-times"></i> Cancel</a>
    </div>
    
    </div>
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

    <div class="row p-3">
      @foreach ($videos as $item)
        <div class="col-lg-3">
          <div class="card">
            <iframe src="{{ asset('uploads/virtual_tour/'.$item->video) }}" 
              width="100%" height="200px"
              frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
              allowfullscreen></iframe>
            <form method="post" action="{{ route('virtualTour.update', $item->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="p-2">
                <input class="form-control" type="text" value="{{$item->text}}" name="text">
              </div>
              <div class="p-1">
                <input type="file" name="vtour" class="form-control">
              </div>

              <div class="row text-center m-3">
                <div class="col-6">
                  <button type="submit" class="btn btn-outline-primary">
                      <i class="fa fa-refresh fa-spin"></i>
                      Update
                  </button>
                </div>
                <div class="col-6">
                  <a href="{{ route('virtualTour.destroy', $item->id) }}" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      @endforeach
  </div>
</div>
@endsection

