@extends('layouts.client')
@section('content')
<main>
    <!-- Homepage Codes -->
    <section class="home">
      <img src="{{asset('assets/client/bghome.jpg')}}" class="fitBg">
      <div class="content1">
          <h2 class="fw-bold animated bounceInRight" style="animation-delay: 1s">Welcome To Bana & Bana Architects</h2>
          <p class="animated bounceInLeft" style="animation-delay: 2s">By Wisdom a House is Built and by Understanding it is Established</p>
          <button type="button" class="btn btn-outline-light btn-lg animated bounceInRight" style="animation-delay: 3s">Learn More</button>
      </div>
  </section>
</main>

@endsection