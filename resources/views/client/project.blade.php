@extends('layouts.client')
@section('title',"$project->meta_title")
@section('meta_description',"$project->meta_description")
@section('meta_keyword',"$project->meta_keyword")
@section('content')
  <div>
    <div class="header">
      <div class="d-flex justify-content-center align-items-center">
        <div class="banner-title text-center">
          <h1 class="mb-3 text-light">Gallery</h1>
        </div>
      </div>
    </div>
  </div> 
  
  <div class="float-end">
    <a href="{{url('specialization/'.$project->category->id.'/'.$project->category->slug)}}" class="btn btn-secondary mt-auto">Back</a>
  </div>

  <div class="container-fluid p-3" >
    {{-- show any errors in saving the forms --}} 
    @if ($errors->any())
      <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
              <div>{{$error}}</div>
          @endforeach
      </div>
    @endif  

    {{-- display msg after redirecting --}}
    @if (isset($msg))
      <div class="alert alert-danger">{{ $msg }}</div>
      <a href="{{url('projects')}}" class="close float-end" data-dismiss="alert" aria-label="close">&times;Go to Projects</a>
    @endif

    <div class="row"> 
      <div class="col-12 col-lg-6 col-sm-12 col-md-12 p-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              @foreach ($images as $item)
                <div>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></button>
                </div>
              @endforeach
            </div>
                
            <div class="carousel-inner" style="height:500px; width: 100%; ">
              @foreach ($images as $item)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                  <img src="{{ asset('uploads/project_images/'.$item->filenames) }}" alt="..." >
                </div>
              @endforeach
            </div>
              {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
  
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <div class="col-12 col-lg-6 col-sm-12 col-md-12 d-flex justify-content-center align-items-center">  
        <label for="">Architectural Designs: </label>
        @foreach (json_decode($project->designs) as $item => $key)
          <p style="text-align: justify;">{{$key}}</p>
        @endforeach
        <label for="">Amenities: </label>
        @foreach (json_decode($project->amenities) as $item => $key)
          <p style="text-align: justify;">{{$key}}</p>
        @endforeach
        {{-- FOR SUMMERNOTE DATA USE -> {!! MESSAGE !!} --}}
        <label for="">Description: </label>
        <p style="text-align: justify;">{!!$project->description!!}</p>
        <label for="">Date Posted: </label>
        <p style="text-align: justify;">{{$project->created_at}}</p>
      </div>
    </div>
  
    <div>
      <div class="header">
        <div  class="p-5 text-center bg-image"  style="filter: brightness(60%);">
        <img src="" alt="">
        </div>
  
        <div class="d-flex justify-content-center align-items-center" >
          <div class="banner-title text-center">
            <h1 class="mb-3 text-light">Virtual Tour</h1>
          </div>
        </div>
      </div>
    </div>
  
    <div class="d-flex justify-content-center p-3">
      <iframe width="560" 
        height="315" 
        src="{{asset('uploads/virtual_tour/'.$project->vtour)}}" 
        {{-- title="YouTube video player"  --}}
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
      </iframe>
    </div>
  
    <div class="container-fluid">
      <div class="row">
        {{-- it should be form --}}
        {{-- validate form --}}
        {{-- post the form --}}
        {{-- save to comments db --}}
        <div class="col-lg-6 p-3">
          @if (session('msgc'))
            <h6 class="alert alert-warning mb-3">{{session('msgc')}}</h6>
          @endif  
          <div class="p-3"> Comment Panel</div>
            <form action="{{url('comments')}}" method="post">
              @csrf
              <input type="hidden" name="project_slug" value="{{$project->slug}}">
              {{-- <input type="hidden" name="project_id" value="{{$project->id}}"> --}}
              <div class="p-3"> 
                {{-- <input type="text" name="name" placeholder="Full Name" id="email" style="width: 100%;"> --}}
                <label for="">Name</label>
                <input type="text" 
                  name="name" 
                  class="form-control @error('name') is-invalid @enderror('name')" 
                  placeholder="Full Name" 
                  id="email" 
                  style="width: 100%;"
                  required> 
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
              </div>
              <div class="p-3"> 
                {{-- <input type="email" name="email" placeholder="Email" id="email" style="width: 100%;"> --}}
                <label>Email</label>
                <input type="email" 
                  name="email" 
                  class="form-control @error('name') is-invalid @enderror('email')" 
                  placeholder="Email" 
                  id="email" 
                  style="width: 100%;"
                  required>
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
              </div>
              <div class="p-3"> 
                <textarea class="form-control" name="comment" placeholder="leave a comment..." rows="3" required></textarea>
              </div>  
          
              <button type="submit" class="btn btn-info pull-right" style="color:aqua;">Post</button>
            </form>
        </div>
        {{-- end form --}}

        {{-- comments = Comment::all(); --}}
        {{-- compact comments --}}
        {{-- foreach comments as comment --}}
        {{-- 
          comment->id
          comment->name
          comment->email
          comment->comment
          comment->created_at
        --}}
        @forelse ($project->comments as $comment)
          <div class="col-lg-6 p-3">
            <div>Comment Review</div>
            <div class="card m-3" style="width: 500px; height: 150px;">
              <div class="row p-3" >
                <div class="col-3">
                  <img src="{{asset('assets/avatar/shanks.jpg')}}" class="img-fluid" style="height: 100px; width: 100px; border-radius: 200px;">
                </div>
                
                <div class="col-9" >
                  <div>{{$comment->name}}</div>
                  <div>{{$comment->email}}</div>
                  <div>{{$comment->comment}}</div>
                  <div>{{$comment->created_at->format('d-m-Y')}}</div>
                </div>
              </div> 
            </div>
          </div> 
        @empty
          <h6>No Comments yet.</h6>
        @endforelse
      </div>
    </div>
  </div>
@endsection