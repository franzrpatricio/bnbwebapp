@extends('layouts.client')
@section('title',"$project->meta_title")
@section('meta_description',"$project->meta_description")
@section('meta_keyword',"$project->meta_keyword")
@section('content')

<div>
  <div class="header" data-aos="fade-right" data-aos-duration="1000" style="background-image: url('{{asset('assets/client/building2.jpg')}}')">
    {{-- <div class="p-5 text-center bg-image"  style="filter: brightness(60%);">
        <img src="{{asset('uploads/project/'.$project->image)}}" alt="project_thumbnail">
     </div> --}}
    <div class="d-flex justify-content-center align-items-center" >
      <div class="banner-title text-center">
        <h1 class="mb-3 text-light" data-aos="fade-right" data-aos-duration="1000">{{$project->name}}</h1>
      </div>
    </div>
  </div>
</div> 

<div class="container-fluid p-3">
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
    <div class="col-12 col-lg-6 col-sm-12 col-md-12 p-3" data-aos="fade-right" data-aos-duration="3000">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">  
      <div class="carousel-indicators">
        @foreach ($images as $item)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
        @endforeach
      </div>

      <div class="carousel-inner "style="height:500px; width: 100%; ">
        @foreach ($images as $item)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('uploads/project_images/'.$item->image) }}" class="d-block w-100 img-fluid" style="height:500px; width: 100%; " alt="..." >
          </div>
        @endforeach
      </div>

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
      <p style="text-align: justify;" data-aos="fade-right" data-aos-duration="3000">{{$key}}</p>
    @endforeach
    <label for="">Amenities: </label>
    @foreach (json_decode($project->amenities) as $item => $key)
      <p style="text-align: justify;" data-aos="fade-right" data-aos-duration="3000">{{$key}}</p>
    @endforeach
    <label for="">Cost: </label>
    <p style="text-align: justify;" data-aos="fade-right" data-aos-duration="3000">{{$project->cost}}</p>
    <label for="">Stories: </label>
    <p style="text-align: justify;" data-aos="fade-right" data-aos-duration="3000">{{$project->stories}}</p>
    <label for="">Rooms: </label>
    <p style="text-align: justify;" data-aos="fade-right" data-aos-duration="3000">{{$project->rooms}}</p>
    {{-- FOR SUMMERNOTE DATA USE -> {!! MESSAGE !!} --}}
    <label for="">Description: </label>
    <p style="text-align: justify;" data-aos="fade-right" data-aos-duration="3000">{!!$project->description!!}</p>
    <label for="">Date Posted: </label>
    <p style="text-align: justify;" data-aos="fade-right" data-aos-duration="3000">{{$project->created_at}}</p>
  </div>
</div>

<div>
<div class="header" data-aos="fade-right" data-aos-duration="1000" style="background-image: url('{{asset('assets/client/building2.jpg')}}')">

<div  class="p-5 text-center bg-image"  style="filter: brightness(60%);">
</div>
<div class="d-flex justify-content-center align-items-center" >
  <div class="banner-title text-center">
    <h1 class="mb-3 text-light" data-aos="fade-right" data-aos-duration="1000">Virtual Tour</h1>
  </div>
</div>
</div>
</div>

<div class="container-fluid p-2">
    <div class="row m-5">
      <div class="col-lg-9 col-md-12">
          <video src="{{asset('uploads/virtual_tour/'.$project->video)}}" class="slider img-fluid" style="width:800px;" autoplay loop muted></video>
      </div>

      <div class="col-lg-3 col-md-12" style="background:whitesmoke; overflow-y:scroll; height:400px">
        @foreach ($videos as $video)
          <ul style="list-style: none;">
            <li class="img-fluid p-2" onclick="videoslider('{{asset('uploads/virtual_tour/'.$video->video)}}')">
              <video src="{{asset('uploads/virtual_tour/'.$video->video)}}" style="cursor: pointer;  width: 200px; transform: scale(1.1);"></video>
            </li>
          </ul>
        @endforeach
      </div>
    </div>
</div>

{{-- MODAL PROJECT INQUIRY FORM START --}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Inquire about this Project
</button>
@if (session('msgpi'))
    <h6 class="alert alert-warning mb-3">{{session('msgpi')}}</h6>
@endif  

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">project </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- START FORM --}}
      <form action="{{ route('send.projectInquiry') }}" method="POST" onclick=" false;" autocomplete="off">
        @csrf
        <div class="modal-body">
          <div class="contact-info-form"> <span class="circle one"></span> <span class="circle two"></span>
            <h3 class="title">Inquiry Form</h3>
            <div class="col-md-12">
              <div class="social-input-containers"> <input type="hidden" name="proj_id" value="{{ $project->id }}" class="form-control"></div>
              <div class="social-input-containers"> <input type="@disabled(true)" name="proj_name" value="{{ $project->name }}" class="form-control"></div>
              <div class="social-input-containers"> <input type="text" name="name" class="input" placeholder="Name" /> </div>
              <div class="social-input-containers"> <input type="email" name="email" class="input" placeholder="Email" /> </div>
              <div class="social-input-containers"> <input type="tel" name="phone" class="input" placeholder="Phone" /> </div>
              <div class="social-input-containers"> <input type="text" name="address" class="input" placeholder="Address" /> </div>
              <div class="social-input-containers textarea"> <textarea name="message" class="input" placeholder="Message"></textarea> </div> 
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit Inquiry</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
      {{-- END FORM --}}
    </div>
  </div>
</div>
{{-- MODAL PROJECT INQUIRY FORM END --}}

<div class="container-fluid" style="background:whitesmoke;" data-aos="fade-right" data-aos-duration="3000">
  <div class="row">
    <div class="col-lg-6 p-3">
      <div class="p-3"> Comment Panel </div>
      <form action="{{url('comments')}}" method="post">
        {{-- Returning false stops the page from reloading --}}
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

    <div class="col-lg-6 p-3">
      <div>Comment Review</div>
      @if (session('msgc'))
        <h6 class="alert alert-warning mb-3">{{session('msgc')}}</h6>
      @endif

      @forelse ($project->comments->sortByDesc('created_at') as $comment)
        <div style="background:whitesmoke; overflow-y:scroll; height:380px">
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

<script>
  AOS.init();
</script>
@endsection