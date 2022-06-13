@extends('layouts.client')
@section('content')
<main>
    <!-- Homepage Codes -->
    <section class="home"  data-aos="fade-right" data-aos-duration="1000">
      <img src="{{asset('assets/client/bghome.jpg')}}" class="fitBg">
      <div class="content1">
        <h1 class="text-light" data-aos="fade-right" data-aos-duration="1000"><span>Bana & Bana Architects</span></h1>
        <p  data-aos="fade-left" data-aos-duration="1000">By Wisdom a House is Built and by Understanding it is Established</p>
        {{-- <h1><span>Bana</span>&<span>Bana Architects</span></h1>
        <h1><span>By Wisdom a House is Built</span>&<span>Understanding it is Established</span></h1> --}}
        
        {{-- Getting a link to go to a specific section on another page --}}
        <a href="{{url('/portfolio#specialization')}}">
          <button type="button" class="btn btn-outline-light btn-lg"  data-aos="fade-right" data-aos-duration="1000">Specialization</button>
        </a>
        <button class="btn btn-outline-light btn-lg"  data-aos="fade-right" data-aos-duration="1000" onclick="botmanChatWidget.whisper('Open Calculator');">Start Estimating</button>
        {{-- <button class="btn btn-outline-light btn-lg"  data-aos="fade-right" data-aos-duration="1000" onclick="">g</button> --}}
      </div>
  </section>
</main>

<script>
  AOS.init();
</script>
@endsection
