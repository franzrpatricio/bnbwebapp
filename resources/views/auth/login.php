@extends('layouts.app')

@section('content')

<section class="vh-100" style="background-color: #296BCC">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">

                    
    

                  <div class="col-md-6 col-lg-5 d-flex justify-content-center align-items-center">
                    <img src="./images/Bnb.png"alt="login form" style="height:15rem; width:15rem;" />
                  </div>

                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form>
                        <div class="text-center p-4">
                              <span class="h1 fw-bold mb-0 text-primary ">BANA AND BANA</span>
                          </div>
      
                      
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
      
                        <div class="form-outline mb-4">
                          <input type="email" id="form2Example17" class="form-control form-control-lg" />
                          <label class="form-label" for="form2Example17">Email address</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password" id="form2Example27" class="form-control form-control-lg" />
                          <label class="form-label" for="form2Example27">Password</label>
                        </div>
      
                        <div class="d-flex justify-content-center pt-1 mb-4">
                          <button class="btn btn-primary btn-lg btn-block" type="button"style="width:20rem;">Login</button>
                        </div>
      <div>
           <a class="small text-muted" href="#!">Forgot password?</a>
                        
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