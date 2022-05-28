@extends('layouts.client')
@section('title',"$project->meta_title")
@section('meta_description',"$project->meta_description")
@section('meta_keyword',"$project->meta_keyword")
@section('content')

<div>
  <div class="header" data-aos="fade-right" data-aos-duration="1000" style="background-image: url('{{asset('assets/client/building2.jpg')}}')">
    <div class="d-flex justify-content-center align-items-center" >
      <div class="banner-title text-center">
        <h1 data-aos="fade-right" data-aos-duration="1000"><span>{{$project->name}}</span></h1>
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
        @forelse ($images as $item)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('uploads/project_images/'.$item->image) }}" class="d-block w-100 img-fluid" style="height:500px; width: 100%; " alt="..." >
          </div>
        @empty
          <h5>No Gallery yet for this Project.</h5>
        @endforelse
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

  <div class=" col-lg-6 col-sm-12 col-md-12" data-aos="fade-right" data-aos-duration="3000">
<div class="row">
    <div class="col-6">
        <h5>Architectural Designs: </h5>  
          @foreach (json_decode($project->designs) as $item => $key)
            <p>{{$key}}</p>
          @endforeach
    </div>
    <div class="col-6">
        <h5>Amenities:   </h5>
          @foreach (json_decode($project->amenities) as $item => $key)
            <p style="text-align: justify;">{{$key}}</p>
          @endforeach
    </div>
    <div class="col-6">
        <h5>House Plan:</h5>
          {{-- @foreach ($project as $item) --}}
            <p style="text-align: justify;" >{{ $project->houseplan->type }}</p>
          {{-- @endforeach --}}
    </div>
    <div class="col-6">
      <h5>Cost:</h5>
       <p style="text-align: justify;" >{{$project->cost}}</p>
  </div>
    <div class="col-6">
      <h5>Stories:</h5> 
        <p style="text-align: justify;" >{{$project->stories}}</p>
    </div>
    <div class="col-6">
     <h5>Rooms:</h5> 
    <p style="text-align: justify;">{{$project->rooms}}</p>
    </div>
    <div class="col-12">
      {{-- FOR SUMMERNOTE DATA USE -> {!! MESSAGE !!} --}}
    <h5>Description:</h5> 
    <p style="text-align: justify;"">{!!$project->description!!}</p>
   <h5>  Date Posted:</h5>
    <p style="text-align: justify;" >{{$project->created_at}}</p>
    </div>
</div>
  </div>

<div>
<div class="header" data-aos="fade-right" data-aos-duration="1000" style="background-image: url('{{asset('assets/client/building2.jpg')}}')">
  <div  class="p-5 text-center bg-image"  style="filter: brightness(60%);">
  </div>
  <div class="d-flex justify-content-center align-items-center" >
    <div class="banner-title text-center">
      {{-- <h1 class="mb-3 text-light" data-aos="fade-right" data-aos-duration="1000">Virtual Tour</h1> --}}
      <h1 data-aos="fade-right" data-aos-duration="1000"><span>Virtual Tour</span></h1>
    </div>
  </div>
</div>
</div>

<div class="container-fluid p-2">
    <div class="row m-5">
      <div class="col-lg-9 col-md-12">
        @forelse ($videos->take(1) as $video)
          <video src="{{asset('uploads/virtual_tour/'.$video->video)}}" class="slider img-fluid" style="width:800px;" autoplay loop muted></video>
        @empty
          <h2>No Virtual Tour Yet.</h2>          
        @endforelse
          {{-- <video src="{{asset('uploads/virtual_tour/'.$project->video)}}" class="slider img-fluid" style="width:800px;" autoplay loop muted></video> --}}
      </div>

      <div class="col-lg-3 col-md-12" style="background:whitesmoke; overflow-y:scroll; height:400px">
        @forelse ($videos as $video)
          <ul style="list-style: none;">
            <li class="img-fluid p-2" onclick="videoslider('{{asset('uploads/virtual_tour/'.$video->video)}}')">
              <video src="{{asset('uploads/virtual_tour/'.$video->video)}}" style="cursor: pointer;  width: 200px; transform: scale(1.1);"></video>
            </li>
          </ul>
        @empty
            <h4>No Virtual Tour Yet</h4>
        @endforelse
      </div>
    </div>
</div>

{{-- MODAL PROJECT INQUIRY FORM START --}}
<!-- Button trigger modal -->
<div class="text-center p-3">
  <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa fa-pencil-square-o"></i>
      Inquire about this Project<i class="fa fa-question"></i>
</button>
</div>

@if (session('msgpi'))
    <h6 class="alert alert-warning mb-3">{{session('msgpi')}}</h6>
@endif  

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Project Inquiry Form</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- START FORM --}}
      <form action="{{ route('send.projectInquiry') }}" method="POST" onclick=" false;" autocomplete="off">
        @csrf
        <div class="modal-body">
          <div class="contact-info-form"> 
            <h3 class="title">Inquiry Form</h3>
            <div class="col-md-12">
              <div class="social-input-containers">
                <input type="hidden" name="proj_id" value="{{ $project->id }}" class="form-control">
              </div>
              <div class="social-input-containers">
                <input type="@disabled(true)" name="proj_name" value="&#xf1c4; {{ $project->name }}" style="font-family:Arial, FontAwesome" class="input">
              </div>
              <div class="social-input-containers">
                <input type="text" name="name" class="input" placeholder="&#xf2c0; Full Name" style="font-family:Arial, FontAwesome" required/>
              </div>
              <div class="social-input-containers">
                <input type="email" name="email" class="input" placeholder="&#xf0e0; Gmail Account" style="font-family:Arial, FontAwesome" required/>
              </div>
              <div class="social-input-containers">
                <input type="tel" name="phone" class="input" placeholder="&#xf10b; Phone Number" style="font-family:Arial, FontAwesome" required/>
              </div>
              <div class="social-input-containers">
                <input type="text" name="address" class="input" placeholder="&#xf041; Personal Address" style="font-family:Arial, FontAwesome" required/>
              </div>
              <div class="social-input-containers textarea">
                <textarea name="message" class="input" placeholder="Message" required></textarea>
              </div> 
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
      <div class="p-1"><h4><i class="fa fa-commenting-o"></i>&nbsp;Would you Help BNB? Voice your Testimonials Now!</h4></div>
      <div class="text-center"><small>To our customers, <br> It would be great if you could tell the world why you like our Services. <br> Your Testimonials may be displayed on our website. <br> Thank you for your willingness to help!</small></div>
      <form action="{{url('comments')}}" method="post">
        {{-- Returning false stops the page from reloading --}}
        @csrf
        <input type="hidden" name="project_slug" value="{{$project->slug}}">
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <div class="p-3"> 
          <input type="text" 
            name="name" 
            id="email" 
            class="form-control @error('name') is-invalid @enderror('name')" 
            placeholder="&#xf2c0; Full Name" style="font-family:Arial, FontAwesome"
            required> 
          @error('name')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
        </div>
        <div class="p-3"> 
          <input type="email" 
            name="email"
            id="email" 
            class="form-control @error('name') is-invalid @enderror('email')" 
            placeholder="&#xf0e0; Gmail Account" style="font-family:Arial, FontAwesome"
            required>
          @error('email')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
        </div>
        <div class="p-3"> 
          <textarea class="form-control" name="comment" placeholder="&#xf27a; Leave a comment..." style="font-family:Arial, FontAwesome" rows="3" required></textarea>
        </div>  
    
        <button type="submit" class="btn btn-outline-info pull-right"><i class="fa fa-upload"></i>Post</button>
      </form>
      <span><small><i class="fa fa-exclamation-circle"></i>
        <strong>Important:</strong> We do not use your profile for anything other than providing a social proof for your Testimonials.
      </small></span>
    </div>

    <div class="col-lg-6 p-3 text-center">
      <div><h4><i class="fa fa-comments-o"></i>&nbsp;Customer Reviews</h4></div>
      <div class="text-center"><strong><small>What our customers are saying...</small></strong></div>
      @if (session('msgcom'))
        <h6 class="alert alert-warning mb-3">{{session('msgcom')}}</h6>
      @endif

        <div style="background:whitesmoke; overflow-y:scroll; height:380px">
          @forelse ($project->comments->sortByDesc('created_at') as $comment)
            <div class="card" style="width: 500px; height: 150px;">
              <div class="row">
                  <div class="col-3">
                    <img src="{{asset('assets/images/avatar.png')}}" class="img-fluid" style="height: 100px; width: 100px; border-radius: 200px;">
                  </div>
                  
                  <div class="col-9" >
                    <div>{{$comment->name}}</div>
                    <div>{{$comment->email}}</div>
                    <div>{{$comment->comment}}</div>
                    <div>{{$comment->created_at->format('d-m-Y')}}</div>
                  </div>
              </div> 
            </div>
          @empty
            <h6>No Comments yet.</h6>
          @endforelse
        </div>
    </div>
  </div>
</div>

<script>
  AOS.init();
</script>
@endsection