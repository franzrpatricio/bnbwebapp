<div class="footer">
    <footer class="bd-footer text-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-6 mb-3 p-3">
            <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="Bootstrap">
                <img src="{{asset('assets/client/logo.png')}}" width="80" height="40" alt="">       
            </a>
            <ul class="list-unstyled small text-white justify-text">
                <li class="mb-2" style="text-align: justify;">Bana & Bana Architects is home to more than 5 professionals specializing in interiors and building. Homeowners, hospitality entrepreneurs, and real estate developers seek out the practice for places of beauty and necessity. These commissions foster genuine connections to site and community while surpassing the client’s needs, and they are executed with a signature restraint.</li>
            </ul>
          </div>
          <div class=" col-lg-2 col-md-6 col-sm-6 p-5 ">
            <h5>Links</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="{{ url('/') }}" class="link-light text-decoration-none">Home</a></li>
              <li class="mb-2"><a href="{{ url('/portfolio') }}" class="link-light text-decoration-none">Portfolio</a></li>
              <li class="mb-2"><a href="{{ url('/profile') }}" class="link-light text-decoration-none">Profile</a></li>
              <li class="mb-2"><a href="{{ url('/projects') }}" class="link-light text-decoration-none">Projects</a></li>
              <li class="mb-2"><a href="{{ url('/contact') }}" class="link-light text-decoration-none">Contact US</a></li>
            </ul>
          </div>
          <div class="col-lg-2  col-md-6 col-sm-6 p-5 ">
            <h5>Services</h5>
            <ul class="list-unstyled">
              <li class="mb-2 text-white">Construction</li>
              <li class="mb-2 text-white">Roofing</li>
              <li class="mb-2 text-white">Design and Build</a></li>
            </ul>
          </div>
          <div class="col-lg-2  col-md-6  col-sm-6 p-5 ">
            <h5>Social Media</h5>
            <div class="row">
              <ul class="list-unstyled">
                <a href="https://www.facebook.com/BANA-BANA-Architects-405780513132811/"><i class="fa fa-facebook fa-1x fa-color text-white p-2"></i></a>
                <a href="#"><i class="fa fa-instagram fa-1x fa-color text-white p-2"></i></a>
                <a href="#"><i class="fa fa-linkedin fa-1x fa-color text-white p-2"></i></a>      
              </ul>
            </div>
          </div>
          <div class="col-lg-4  col-md-6 p-3">
            @include('layouts.newsletter')
          </div>
          <div></div>
          <div class="fixed-bottom d-flex justify-content-center">
              @include('cookie-consent::index')    
          </div>  
        </div>
        </div>
      </div>
    </footer>

</div>

