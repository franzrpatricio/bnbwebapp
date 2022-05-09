@extends('layouts.client')
@section('content')
    {{-- display msg after redirecting --}}
    @if (isset($msg))
    <div class="alert alert-danger">
        {{ $msg }}
        <a href="{{url('portfolio')}}" class="close float-end" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
    @endif

  <!-- Specialization -->
  <div class="container">
    <div class="row">
      @foreach ($categories as $category)
        <article class="col-md-4 col-lg-3">
          <div class="card-content">
            <a href="{{url('specialization/'.$category->id.'/'.$category->slug)}}">
              <img class="spectrum1" src="{{asset('uploads/category/'.$category->image)}}" style="height: 200px;" alt="meow">
              <h4 class="spectrum-h2 text-center text-justify">{{$category->name}}</h4>
              <p>{!!$category->description!!}</p>
            </a>  
          </div>
          <!-- .card-content -->
        </article>
      @endforeach
    <!-- .card -->
    <a href="{{url('portfolio')}}">Back to Portfolio
  </div>
@endsection