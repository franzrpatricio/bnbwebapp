@extends('layouts.app')
@section('content')
{{-- section class need baguhin para maximize yung bg color na blue --}}
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
              <div class="card-body text-center text-black">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <span class="h1 fw-bold mb-0 text-primary ">BANA AND BANA</span>      
                  <h5 class="fw-normal" style="letter-spacing: 1px;">Sign in to your account</h5>

                  <div class="row m-3">
                    <div class="form-outline">
                      <input id="email" type="email" placeholder="&#xf0e0; Email Account" style="font-family:Arial, FontAwesome" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>      
                  </div>

                  <div class="form-outline p-2">
                    <div class="row m-3">
                      <div class="col-10">
                        <input id="pwd" type="password" placeholder="&#xf084; Password" style="font-family:Arial, FontAwesome" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                      </div>

                      <div class="col-2">
                        <span class="eye" style="position: absolute;" onclick="togglepass()">
                        <i id="hide1" style="display:none;" class="btn btn-outline-secondary fa fa-eye"></i>
                        <i id="hide2" class="btn btn-outline-secondary fa fa-eye-slash"></i>
                        </span>
                      </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                  </div>

                  <div class="pt-1 mb-4">
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