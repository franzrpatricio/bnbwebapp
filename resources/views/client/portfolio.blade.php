@extends('layouts.client')
@section('content')
  <!-- Banner -->
  <div class="header animate__animated animate__fadeInLeft animate__delay-0.7s" style=" background-image: url({{asset('assets/client/building2.jpg')}});">
    <div  class="p-3 text-center bg-image"  style="filter: brightness(60%);"></div>
    <div class="d-flex justify-content-center align-items-center">
      <div class="banner-title text-center">
        <h1 class="mb-3 text-light py-4 animate__animated animate__fadeInRight animate__delay-0.7s">Portfolio</h1>
        <p class="mb-3 text-light text-center animate__animated animate__fadeInRight animate__delay-0.7s" style="font-size: 22px;">Get to Know More About the Firm</p>
      </div>
    </div>
  </div>
<br>

  <!-- Banner About Us -->
  <section id="about-video" class="about-video" >
    <div class="container">
      <div class="row" >
        <div class="col-lg-6 video-box align-self-baseline">
          <img src="{{asset('assets/client/about-us-hero.png')}}" class="img1 animate__animated animate__fadeInLeft animate__delay-0.7s" style="height: 80%; width: 100%;"  alt="">
        </div>
        
        <div class="col-lg-6 pt-3 pt-lg-0 content"  >
          <h2 class="animate__animated animate__fadeInLeft animate__delay-0.7s">ABOUT US</h2>
          <p class="animate__animated animate__fadeInLeft animate__delay-0.7s" style="text-align: justify; text-indent: 50px; font-size: 15px; font-color: #213b52;">
          Bana & Bana Architects formerly known as MC Architects is an architectural firm founded in 200 by two brothers namely Arch. Christopher G. Bana and Arch. Michael G. Bana, who collaborated with other architects in the past. Bana & Bana Architectural Firm were able to operate their firm legally with clients. This experience enables their young office to work on technically challenging small to large scale projects. 
          </p>
        </div>
      </div>
    </div>
  </section>
<br>


  <div class="header"  data-aos="fade-right" data-aos-duration="3000" style=" background-image: url({{asset('assets/client/building2.jpg')}});">
    <div class="p-5 text-center bg-image">
    </div>
    <div class="d-flex justify-content-center align-items-center" >
      <div class="banner-title text-center">
        <h1 class="mb-3 text-light fade-in">Roadmaps</h1>
      </div>
    </div>
  </div>

  <div class="container-fluid mb-5"  data-aos="fade-right" data-aos-duration="3000">
    <div class="row">
      <div class="col-md-4">
        <div class="box">
          <div class="our-services settings">
            <div class="icon"> <img src="{{asset('assets/client/vision.png')}}" style="height: 80px;"> </div>
            <h4>Vision</h4>
            <p style="text-align:justify;">It's our mission at Bana & Bana Architects to provide client focused service through our responsible practice of Architecture.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="box">
          <div class="our-services privacy">
            <div class="icon"> <img src="{{asset('assets/client/mission.png')}}" style="height: 80px;justify-content: center;"> </div>
            <h4>Mission</h4>
            <p style="text-align:justify;">To be viewed as a respected architectural firm, providing high quality design and service to our clients with honesty and integrity.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="box">
          <div class="our-services ssl">
            <div class="icon"> <img src="{{asset('assets/client/goal.png')}}" style="height: 80px; align-items: center;"> </div>
            <h4>Goals</h4>
            <p style="text-align:justify;">Our goal at Bana & Bana Architects is to designing well, creating beautiful buildings.</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="header" data-aos="fade-right" data-aos-duration="3000"style=" background-image: url({{asset('assets/client/building2.jpg')}});">
    <div  class="p-5 text-center bg-image"  style="filter: brightness(60%);">
      <img src="" alt="">
    </div>
      <div class="d-flex justify-content-center align-items-center" >
        <div class="banner-title text-center">
          <h1 class="mb-3 text-light">Specialization</h1>
        </div>
    </div>
  </div>

  <!-- Specialization -->
  <div class="container">
    <div class="row" data-aos="fade-right" data-aos-duration="3000">
      <article class="col-md-4 col-lg-3">
        <div class="card-content">
          @foreach ($category as $item)
            <a href="{{url('specialization/'.$item->id)}}"><img class="spectrum1" src="{{asset('uploads/category/'.$item->image)}}" style="height: 200px;" alt="meow">
            <h4 class="spectrum-h2 text-center text-justify">{{$item->name}}</h4>
            <p>Bana & Bana Architectural provides architectural residencial designs and can be built according to the client's own preference of design.</p></a>
          @endforeach
          </div>
        <!-- .card-content -->
        </a>
      </article>
    <!-- .card -->
  </div>


  <script>
  AOS.init();
</script>
@endsection