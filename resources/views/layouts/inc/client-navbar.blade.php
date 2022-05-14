<nav class="navbar navbar-expand-lg navbar-light" data-aos="fade-right" data-aos-duration="1000">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="{{asset('assets/client/logo.png')}}" width="200" height="100" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarText">
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item ">
            <a class="nav-link text-light" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/portfolio') }}">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/profile') }}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/projects') }}">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/contact') }}">Contact Us</a>
          </li>
        </ul>
        
      </div>
    </div>
</nav>

<script>
  AOS.init();
</script>
