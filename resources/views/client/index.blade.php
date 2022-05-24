@extends('layouts.client')
@section('content')
<main>
    <!-- Homepage Codes -->
    <section class="home"  data-aos="fade-right" data-aos-duration="1000">
      <img src="{{asset('assets/client/bghome.jpg')}}" class="fitBg">
      <div class="content1">
      <h2  data-aos="fade-right" data-aos-duration="1000">Bana & Bana Architects</h2>
          <p  data-aos="fade-left" data-aos-duration="1000">By Wisdom a House is Built and by Understanding it is Established</p>
          <a href="{{url('/portfolio')}}">
            <button type="button" class="btn btn-outline-light btn-lg"  data-aos="fade-right" data-aos-duration="1000">Learn More</button>
          </a>
      </div>
  </section>
</main>

<script>
  AOS.init();
</script>
@endsection
