<div class="footer">
    <footer class="bd-footer text-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-3 mt-4">
            <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="Bootstrap">
                <img src="{{asset('assets/client/logo.png')}}" width="80" height="40" alt="">       
            </a>
            <ul class="list-unstyled small text-white justify-text">
                <li style="text-align: justify;">Bana & Bana Architects is home to more than 5 professionals specializing in interiors and building. Homeowners, hospitality entrepreneurs, and real estate developers seek out the practice for places of beauty and necessity. These commissions foster genuine connections to site and community while surpassing the client’s needs, and they are executed with a signature restraint.</li>
            </ul>
          </div>
          <div class=" col-lg-2 col-md-6 col-sm-6 mt-4">
            <h5>Links</h5>
            <ul class="list-unstyled">
              <li><a href="{{ url('/') }}" class="link-light text-decoration-none">Home</a></li>
              <li><a href="{{ url('/portfolio') }}" class="link-light text-decoration-none">Portfolio</a></li>
              <li><a href="{{ url('/profile') }}" class="link-light text-decoration-none">Profile</a></li>
              <li><a href="{{ url('/projects') }}" class="link-light text-decoration-none">Projects</a></li>
              <li><a href="{{ url('/contact') }}" class="link-light text-decoration-none">Contact US</a></li>
            </ul>
          </div>
          <div class="col-lg-2  col-md-6 col-sm-6 mt-4">
            <h5>Services</h5>
            <ul class="list-unstyled">
              <li class="text-white">Construction</li>
              <li class="text-white">Roofing</li>
              <li class="text-white">Design and Build</a></li>
            </ul>

            <h5>Social Media</h5>
            
              <ul class="list-unstyled">
                <a href="https://www.facebook.com/BANA-BANA-Architects-405780513132811/"><i class="fa fa-facebook fa-1x fa-color text-white p-2"></i></a>
                <a href="#"><i class="fa fa-instagram fa-1x fa-color text-white p-2"></i></a>
                <a href="#"><i class="fa fa-linkedin fa-1x fa-color text-white p-2"></i></a>      
              </ul>
          
          </div>
        
          <div class="col-lg-4 col-md-6">
            @include('layouts.newsletter')
          </div>

          <div class="text-center">
            <div class="text-muted">Copyright &copy; Bana and Bana Architects 2022</div>
            <div>
                <a href="{{route('policy')}}">Privacy Policy</a>
                &middot;
                <a href="{{route('conditions')}}">Terms &amp; Conditions</a>
            </div>
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

