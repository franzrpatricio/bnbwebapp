@extends('layouts.client')
@section('content')

  <!-- Banner -->
  {{-- <div style=" background-image: url({{asset('assets/client/building2.jpg')}});">
  

      <div class="banner-title text-center">
        <h1 class="text-light py-4" data-aos="fade-right" data-aos-duration="1000"><span>Portfolio</span></h1>
        <p class=" text-light text-center" data-aos="fade-right" data-aos-duration="1000" style="font-size: 22px;">
          Get to Know More About the Firm
        </p>
      </div>
    </div>

  </div> --}}

  <!-- Banner About Us -->
  {{-- <section class="about section-padding" data-aos="fade-right" data-aos-duration="1000" id="about">
    
    <div class="container">
      <div class="row" >
       
        
        <div class="col-lg-6"  >
          <h2 style="color:#0d6efd;" data-aos="fade-right" data-aos-duration="1000">ABOUT US</h2>
          <p data-aos="fade-right" data-aos-duration="1000" style="text-align: justify; text-indent: 50px; font-size: 17px; font-color: #213b52;">
            Bana & Bana Architects formerly known as MC Architects is an architectural firm founded in 200 by two brothers namely Arch. Christopher G. Bana and Arch. Michael G. Bana, who collaborated with other architects in the past. Bana & Bana Architectural Firm were able to operate their firm legally with clients. This experience enables their young office to work on technically challenging small to large scale projects. We are committed to low energy sustainable 
            design providing appropriate, imaginative, cost effective and technical solutions to meet our client’s 
            individual requirements. We implement and manage our input into each project to the highest 
            professional standards, meeting with our clients requirements with clear communication throughout 
            the project
          </p>
        </div> 
        <div class="col-lg-6 align-self-baseline">
          <img src="{{asset('assets/client/about-us-hero.png')}}" data-aos="fade-right" data-aos-duration="1000" style="height: 80%; width: 100%;"  alt="">
        </div>
      </div>
    </div>
  </section> --}}

  <div class="p-5 text-center" data-aos="fade-left" data-aos-duration="3000" style=" background-image: url({{asset('assets/client/building2.jpg')}});">
   
    <div class="d-flex justify-content-center align-items-center" >
      <div class="banner-title text-center">
        <h1 class="text-light py-4" data-aos="fade-right" data-aos-duration="1000"><span>Portfolio</span></h1>
        <p class=" text-light text-center" data-aos="fade-right" data-aos-duration="1000" style="font-size: 22px;">
          Get to Know More About the Firm
        </p>
      </div>
    </div>
  </div>

  <div class="container-fluid mb-5"  >

      <div class="container mt-3">
      <div class="row" >
       
        
        <div class="col-lg-6"  >
          <h2 style="color:#0d6efd;" data-aos="fade-right" data-aos-duration="1000">ABOUT US</h2>
          <p data-aos="fade-right" data-aos-duration="1000" style="text-align: justify; text-indent: 50px; font-size: 17px; font-color: #213b52;">
            Bana & Bana Architects formerly known as MC Architects is an architectural firm founded in 200 by two brothers namely Arch. Christopher G. Bana and Arch. Michael G. Bana, who collaborated with other architects in the past. Bana & Bana Architectural Firm were able to operate their firm legally with clients. This experience enables their young office to work on technically challenging small to large scale projects. We are committed to low energy sustainable 
            design providing appropriate, imaginative, cost effective and technical solutions to meet our client’s 
            individual requirements. We implement and manage our input into each project to the highest 
            professional standards, meeting with our clients requirements with clear communication throughout 
            the project
          </p>
        </div> 
        <div class="col-lg-6 align-self-baseline">
          <img src="{{asset('assets/client/about-us-hero.png')}}" data-aos="fade-right" data-aos-duration="1000" style="height: 80%; width: 100%;"  alt="">
        </div>
      </div>
    </div>

    <div class="row m-2">
      <div class="col-md-4" data-aos="zoom-in" data-aos-duration="3000">
        <div class="box p-2">
          <div class="our-services settings m-3">
            <div class="icon"> <img src="{{asset('assets/client/vision.png')}}" style="height: 80px;"> </div>
            <h4 style="color:#0d6efd;">Vision</h4>
            <p style="text-align:justify;">It's our mission at Bana & Bana Architects to provide client focused service through our responsible practice of Architecture.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4" data-aos="zoom-in" data-aos-duration="3000">
        <div class="box p-2">
          <div class="our-services privacy m-3">
            <div class="icon"> <img src="{{asset('assets/client/mission.png')}}" style="height: 80px;justify-content: center;"> </div>
            <h4 style="color:#0d6efd;">Mission</h4>
            <p style="text-align:justify;">To be viewed as a respected architectural firm, providing high quality design and service to our clients with honesty and integrity.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4" data-aos="zoom-in" data-aos-duration="3000">
        <div class="box p-2">
          <div class="our-services ssl m-3">
            <div class="icon"> <img src="{{asset('assets/client/goal.png')}}" style="height: 80px; align-items: center;"> </div>
            <h4 style="color:#0d6efd;">Goals</h4>
            <p style="text-align:justify;">Our goal at Bana & Bana Architects is to designing well, creating beautiful buildings.</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="header" data-aos="fade-right" data-aos-duration="3000" style=" background-image: url({{asset('assets/client/building2.jpg')}});" id="specialization">
    <div  class="p-5 text-center bg-image"  style="filter: brightness(60%);">
      <img src="" alt="">
    </div>
      <div class="d-flex justify-content-center align-items-center" >
        <div class="banner-title text-center">
          <h1 class="mb-3 text-light"><span>Specialization</span></h1>
        </div>
    </div>
  </div>

  <!-- Specialization -->
  <div class="container">
    <div class="row">        
      @forelse ($category as $item)
        <div class="col-md-4 col-lg-3">
          <div class="card-shadow" syle="width:20rem">
            <div class="card-content">
              <div class="card-img">
                <img class="card-img-top" src="{{asset('uploads/category/'.$item->image)}}" style="max-height:100%; width:300px" alt="meow">
              </div>
              <a href="{{url('specialization/'.$item->id.'/'.$item->slug)}}">
                <h4 class="text-center text-justify" style="color:#0d6efd;">{{$item->name}}</h4>
                  <p style="text-align:justify">{!!$item->description!!}</p>
              </a>
            </div>
          </div>
        </div>
      @empty
          <h3 class="text-center">No Featured Categories</h3>
      @endforelse
    </div>
  </div>

  <div class="text-center p-3">
    <a href="{{url('categories')}}">
    View other Categories</a>
  </div>

<script>
  AOS.init();
</script>
@endsection