@extends('layouts.client')
@section('content')
  <div>
    <div class="header">
      <div class="d-flex justify-content-center align-items-center">
        <div class="banner-title text-center">
          <h1 class="mb-3 text-light">Gallery</h1>
        </div>
      </div>
      {{-- @foreach ($images as $image)
        <div class="p-5 text-center bg-image"  style="filter: brightness(60%);">
          <img src="{{ asset('uploads/project_images/'.$image->filenames) }}" alt="">
        </div>
      @endforeach --}}
    </div>
  </div> 
  
  <div class="container-fluid p-3" >
    <div class="row"> 
      <div class="col-12 col-lg-6 col-sm-12 col-md-12 p-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            @foreach ($images as $item)
              <div>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></button>
              </div>
  
              <div class="carousel-inner" style="height:500px; width: 100%; ">
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                  <img src="{{ asset('uploads/project_images/'.$item->filenames) }}" alt="..." >
                </div>
              </div>
            @endforeach
            {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
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
  
      {{-- @foreach ($project as $proj)
        <div class="col-12 col-lg-6 col-sm-12 col-md-12 d-flex justify-content-center align-items-center">  
          <label for="">Architectural Designs: <p style="text-align: justify;">@php $p = json_decode($proj->designs); @endphp</p></label>
          <label for="">Amenities: <p style="text-align: justify;">@php $p = json_decode($proj->amenities); @endphp</p></label>
          <label for="">Description: <p style="text-align: justify;">{{$proj->description}}</p></label>
        </div>
      @endforeach --}}

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
      </div>
      {{-- <div class="col-12 col-lg-6 col-sm-12 col-md-12 d-flex justify-content-center align-items-center">
        <p  style="text-align: justify;">
          Tanza, Cavite Project<br>            
          Kitchen 15.10' x 9.06'<br>
          Living, Dining 60 cm x 60 cm<br>
          Study, Den and Maid’s Room<br>
          Living, Dining 60 cm x 60 cm<br>
          Living, Dining 60 cm x 60 cm<br><br>
          Opulent, and meticulously detailed, this lush modern themed home is very classy. Floor to ceiling windows bring in soft northern and westerly light. Spaces are crafte by a refined and highly practical floor plan. A sweeping 10 foot balcony invites amazing entertaining, and offers privileged direct access to swimming, sun patios and fitness. Working with great real space gave the architects an opportunity to refine the layout to match the building's true charcter. Results are impressive. Two large bedroom suites are located at either end of the living spaces for undisturbed privacy. A home office is sited close to the master bedroom suite. And a rarity home living even the kitchen has a door to the:
        </p>
      </div> --}}
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
        src="https://www.youtube.com/embed/Fo1QgbSZXHU" 
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
      </iframe>
    </div>
  
    {{-- it should be form --}}
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 p-3">
          <div class="p-3"> Comment Panel</div>
          
          <div class="p-3"> 
            <input type="email" name="email" placeholder="Email" id="email" style="width: 100%;">
          </div>
          <div class="p-3"> 
            <input type="email" name="email" placeholder="Email" id="email" style="width: 100%;">
          </div>
          <div class="p-3"> 
            <textarea class="form-control" placeholder="write a comment..." rows="3"></textarea>
          </div>  
      
          <button type="button" class="btn btn-info pull-right" style="color:aqua;">Post</button>
        </div>
  
        <div class="col-lg-6 p-3">
          <div>Comment Review</div>
          <div class="card m-3" style="width: 500px; height: 150px;">
            <div class="row p-3" >
              <div class="col-3">
                <img src="./images/ar1.jpg" class="img-fluid" style="height: 100px; width: 100px; border-radius: 200px;">
              </div>
              
              <div class="col-9" >
                <div>name</div>
                <div>email</div>
                <div>comment</div>
              </div>
            </div> 
          </div>
        </div> 
      </div>
    </div>
    {{-- end form --}}
  </div>
@endsection