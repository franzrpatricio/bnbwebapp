<nav class="navbar navbar-expand-lg navbar-light" data-aos="fade-right" data-aos-duration="1000">
    <div class="container-fluid">
      {{-- @include('cookie-consent::index') --}}
      <a class="navbar-brand" href="index.php"><img src="{{asset('assets/client/logo.png')}}" width="200" height="100" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarText">
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/') }}">
              <h5 data-aos="fade-right" data-aos-duration="1000"><span>Home</span></h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/portfolio')}}">
              <h5 data-aos="fade-right" data-aos-duration="1000"><span>Portfolio</span></h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/profile') }}">
              <h5 data-aos="fade-right" data-aos-duration="1000"><span>Profile</span></h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/projects') }}">
              <h5 data-aos="fade-right" data-aos-duration="1000"><span>Projects</span></h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/contact') }}">
              <h5 data-aos="fade-right" data-aos-duration="1000"><span>Contact Us</span></h5>
            </a>
          </li>
        </ul>
      </div>
    </div>
</nav>

<script>
  AOS.init();
</script>
