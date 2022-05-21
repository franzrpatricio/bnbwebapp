@extends('layouts.client')
@section('content')
    {{-- display msg after redirecting --}}
    @if (isset($msg))
    <div class="alert alert-danger">
        {{ $msg }}
        <a href="{{url('portfolio')}}" class="close float-end" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
    @endif
    <div class="header" data-aos="fade-right" data-aos-duration="3000"style=" background-image: url({{asset('assets/client/building2.jpg')}});">
    <div  class="p-5 text-center bg-image"  style="filter: brightness(60%);">
      <img src="" alt="">
    </div>
      <div class="d-flex justify-content-center align-items-center" >
        <div class="banner-title text-center">
          <h1 class="mb-3 text-light">Categories</h1>
        </div>
    </div>
  </div>


  <!-- Specialization -->
  <div class="container">
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-md-4 col-lg-3">
          <div class="card-content">
            
            <a href="{{url('specialization/'.$category->id.'/'.$category->slug)}}">
              <img class="spectrum1" src="{{asset('uploads/category/'.$category->image)}}" style="height: 200px;" alt="meow">
             
              <h4 class="spectrum-h2 text-center text-justify">{{$category->name}}</h4>
              <p>{!!$category->description!!}</p>
            </a>  
          </div>
          <!-- .card-content -->
    </div>
      @endforeach
    <!-- .card -->
   
  </div>
</div>
   <a href="{{url('portfolio')}}">Back to Portfolio
@endsection