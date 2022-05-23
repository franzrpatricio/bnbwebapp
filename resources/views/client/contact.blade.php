@extends('layouts.client')
@section('content')
    
    <!-- contact us codes -->
    <div class="contact">
    <div class="container1">
      <div class="form"  data-aos="fade-right" data-aos-duration="1000">
          <div class="contact-info">
              <h3 class="title">Let's get in touch</h3>
              <p class="text"> Contact us with the following details. and fillup the form with the details. </p>
              <div class="info">
                  <div class="social-information"> <i class="fa fa-map-marker"></i>
                      <p>Unit 903 PCS Residences, Calixto Dyco St. Paco Manila</p>
                  </div>
                  <div class="social-information"> <i class="fa fa-envelope-o"></i>
                      <p>bnb@gmail.com</p>
                  </div>
                  <div class="social-information"> <i class="fa fa-mobile-phone"></i>
                      <p>63 928-719-8975 </p>
                  </div>
              </div>
              <div class="social-media">
                  <p>Connect with us :</p> 
                  <div class="social-icons"> <a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i><a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"> <i class="fa fa-instagram"></i> </a> </div>
              </div>
          </div>
          <div class="contact-info-form"> <span class="circle one"></span> <span class="circle two"></span>
            <form action="{{ route('send.email') }}" method="POST">
                @csrf
                <h3 class="title">Contact us</h3>
                <div class="social-input-containers"> <input type="text" name="name" class="input" placeholder="Name" required/> </div>
                <div class="social-input-containers"> <input type="email" name="email" class="input" placeholder="Email" required/> </div>
                <div class="social-input-containers"> <input type="tel" name="phone" class="input" placeholder="Phone" required/> </div>
                <div class="social-input-containers"> <input type="text" name="address" class="input" placeholder="Address"  required/> </div>
                <div class="social-input-containers textarea"> <textarea name="message" class="input" placeholder="Message" required></textarea> </div> 
                <input type="submit" value="Send Message" class="btn1" />
                {{-- display msg after redirecting --}}
                @if (isset($msg))
                <div class="alert alert-danger">
                    {{ $msg }}
                    {{-- <a href="{{url('portfolio')}}" class="close float-end" data-dismiss="alert" aria-label="close">&times;</a> --}}
                </div>
                @endif
            </form>
          </div>
      </div>
    </div>
</div>
<script>
  AOS.init();
</script>
@endsection