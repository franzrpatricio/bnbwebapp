@extends('layouts.app')

@section('content')

<section class="vh-100" style="background-color: #296BCC">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">

                    
    
                  
                  <div class="col-md-6 col-lg-5 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/Bnb.png') }}"alt="login form" style="height:15rem; width:15rem;" />
                  </div>
                
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form method="POST" action="{{ route('login') }}">
                                        @csrf
                        <div class="text-center p-4">
                              <span class="h1 fw-bold mb-0 text-primary ">BANA AND BANA</span>
                          </div>
      
                      
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign in to your account</h5>
                      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example17">Email address</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                          

                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
      
                        <div class="form-outline mb-4">
                          <div>
                          <label class="form-label" for="form2Example27">Password</label>
                          <input id="pwd" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                          <span class="eye" style="position: absolute;" onclick="togglepass()">
                            <i id="hide1" style="display:none;" class="fa fa-eye"></i>
                            <i id="hide2" class="fa fa-eye-slash"></i>
                            
                          </span>
                          </div>
                          <script>

                            function togglepass(){
                              var input = document.getElementById("pwd");
                              var hide = document.getElementById("hide1");
                              var show = document.getElementById("hide2");

                              if(input.type === 'password'){
                                input.type = "text";
                                hide.style.display = "block";
                                show.style.display = "none";
                              }
                              else{
                                input.type = "password";
                                hide.style.display = "none";
                                show.style.display = "block";
                              }
                            }
                            </script>
                          
  
                          @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                        </div>
                        
      
                        <div class="d-flex justify-content-center pt-1 mb-4">
                          <button class="btn btn-primary btn-lg btn-block" type="submit" style="width:20rem;">Login</button>
                        </div>

                          <div>
                          @if (Route::has('password.request'))
                              <a class="small text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                          @endif
                                            
                          </div>

                       
                        <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a>
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>
  @endsection