@extends('layouts.client')
@section('content')
    <div class="header" data-aos="fade-right" data-aos-duration="3000"style=" background-image: url({{asset('assets/client/building2.jpg')}});">
    <div  class="p-5 text-center bg-image"  style="filter: brightness(60%);">
      <img src="" alt="">
    </div>
      <div class="d-flex justify-content-center align-items-center" >
        <div class="banner-title text-center">
          <h1 class="mb-3 text-light"><span>Categories</span></h1>
        </div>
    </div>
  </div>

  <!-- Specialization -->
  <div class="container">
    <div class="row">
      @forelse ($categories as $category)
        <div class="col-md-4 col-lg-3">
          <div class="card-content">
            <div class="card-img">
                <img class="card-img-top" src="{{asset('uploads/category/'.$category->image)}}" style="max-height:100%; width:300px" alt="meow">
            </div>
            <a href="{{url('specialization/'.$category->id.'/'.$category->slug)}}">
              <h4 class="text-center text-justify" style="color:#0d6efd;">{{$category->name}}</h4>
              <p style="text-align:justify">{!!$category->description!!}</p>
            </a>  
          </div>
          <!-- .card-content -->
        </div>
      @empty
        {{-- display msg after redirecting --}}
        <div class="alert alert-danger">
            <h5 class="text-center">No Active Categories</h5>
            <a href="{{url('portfolio')}}" class="close float-end" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
      @endforelse
      <!-- .card -->
    </div>
  </div>
@endsection