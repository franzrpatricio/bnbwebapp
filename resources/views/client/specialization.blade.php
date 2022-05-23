@extends('layouts.client')
@section('content')

<div class="header" data-aos="fade-right" data-aos-duration="3000"style=" background-image: url({{asset('assets/client/building2.jpg')}});">
  <div  class="p-5 text-center bg-image"  style="filter: brightness(60%);">
    <img src="" alt="">
  </div>
  <div class="d-flex justify-content-center align-items-center" >
    <div class="banner-title text-center">
      @foreach ($category as $item)
        <h1 class="mb-3 text-light">{{$item->name}}</h1>
      @endforeach
    </div>
  </div>
</div>

<div class="container-fluid bg-light h-100">
  <div class="row min-vh-100">
    <div class="col-lg-9 col-md-9 col-sm-12 p-3 ">
      {{-- show any errors in saving the forms --}} 
      @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        </div>
      @endif  
      
      <div class="row ">
        @forelse ($projects as $project)
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
            <div>
              <div class="card" style="height: 300px; width: 200px; ">
                <div class="img-fluid border-bottom">
                  <div class="card-img">
                    <img src="{{asset('uploads/project/'.$project->image)}}" class="card-img-top" style="height: 200px;width:199px; object-fit: contain;" alt="...">
                  </div>
                </div>
                <div class="card-body">
                  <h6 class="card-title text-center">{{$project->name}}</h6>
                  <div class="text-center">
                    <a href="{{ url('project/'.$project->id.'/'.$project->slug) }}">
                      <button class="btn btn-primary text ">View</button>
                    </a>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        @empty
          {{-- display msg after redirecting --}}
          @if (isset($msg))
            <div class="alert alert-danger">
              {{ $msg }}
              <a href="{{url('portfolio')}}" class="close float-end" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
          @endif
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection