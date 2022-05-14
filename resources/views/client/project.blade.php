@extends('layouts.client')
@section('content')
    <div class="container-fluid bg-light h-100" data-aos="fade-right" data-aos-duration="1000">
      <div class="row min-vh-100">
        <div class="col-lg-3 col-md-3 col-sm-12 p-3 navbar-expand-lg navbar-expand-md navbar-light bg-light">
            <div>
              <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-primary" type="submit">Search</button>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="fa-solid fa-filter"></span>
                  </button>
                </form>
            
             
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
              


              <div>
               
                <div class="container  border-bottom p-3" >
                 <div>
                   <h3>Category</h3>
                 </div> 
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Residencial
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                      Condo Interior
                    </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        Roofing
                      </label>
                  </div>

              </div>

              

              <div class="container  border-bottom  p-3">
                  <h3>Architectural Design</h3>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Modern
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Basic
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Baroque
                    </label>
                  </div>

              </div>

              <div class="container border-bottom  p-3 ">
                <h3>No. Stories</h3>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Bungalow
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                  <label class="form-check-label" for="flexCheckChecked">
                    1-stories
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                  <label class="form-check-label" for="flexCheckChecked">
                    2-stories
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                  <label class="form-check-label" for="flexCheckChecked">
                    3-stories
                  </label>
                </div>

                </div>
                <div class="container  border-bottom  p-3">
                    <h3>Amenities</h3>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Swimming Pool
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label" for="flexCheckChecked">
                        Game Room
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label" for="flexCheckChecked">
                        Home Theater
                      </label>
                    </div>
  
                </div>
              </div>
            </div>
          </div>
        </div>
       
       
        <div  class="col-lg-9 col-md-9 col-sm-12 p-3 ">
            <div class="">
              Showing Results of "Mansion House"                  
            </div>
            <div class="row animate__animated animate__fadeInUp animate__delay-0.7s">
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                <div>
                <div class="card" style="height: 300px; width: 200px; "  >
                    <div class="img-fluid border-bottom">
                    <img src="{{asset('assets/client/Gent.png')}}" class="card-img-top img-top " style="height:200px; width: 200px;  object-fit:fill;" alt="...">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title text-center">General Trias Project</h6>
                      <div class="text-center">
                        <a href="sampleproject.html">
                      <button  class="btn btn-primary text " style="color:white;" >View  </button>
                      </a>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                <div>
                <div class="card" style="height: 300px; width: 200px; "  >
                    <div class="img-fluid border-bottom">
                    <img src="{{asset('assets/client/atanacio.png')}}" class="card-img-top img-top " style="height: 200px; width: 200px; object-fit: fill;" alt="...">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title text-center">Atanacio Project</h6>
       
                      <div class="text-center">
                        <button  class="btn btn-primary text " style="color:white;" >View  </button>
                        </div>
                    </div>
                  </div>
                </div>  
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                <div>
                <div class="card" style="height: 300px; width: 200px; "  >
                    <div class="img-fluid border-bottom">
                    <img src="{{asset('assets/client/gacusan.png')}}" class="card-img-top img-top " style="height: 200px; width: 200px; object-fit: fill;" alt="...">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title text-center">Gacusan Project</h6>
       
                      <div class="text-center">
                        <button  class="btn btn-primary text " style="color:white;">View  </button>
                        </div>
                    </div>
                  </div>
                </div>  
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                <div>
                <div class="card" style="height: 300px; width: 200px; "  >
                    <div class="img-fluid border-bottom">
                    <img src="{{asset('assets/client/lourdes.png')}}" class="card-img-top img-top " style="height: 200px; width: 200px; object-fit: fill;" alt="...">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title text-center">Lourdes Project</h6>
       
                      <div class="text-center">
                        <button  class="btn btn-primary text " style="color:white;" >View  </button>
                        </div>
                    </div>
                  </div>
                </div>  
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                <div>
                <div class="card" style="height: 300px; width: 200px; "  >
                    <div class="img-fluid border-bottom">
                    <img src="{{asset('assets/client/starosa.png')}}" class="card-img-top img-top " style="height: 200px; width: 200px; object-fit: fill;" alt="...">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title text-center">Sta. Rosa Project</h6>
       
                      <div class="text-center">
                        <button  class="btn btn-primary text " style="color:white;">View  </button>
                        </div>
                    </div>
                  </div>
                </div>  
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                <div>
                <div class="card" style="height: 300px; width: 200px; "  >
                    <div class="img-fluid border-bottom">
                    <img src="{{asset('assets/client/cruz.png')}}" class="card-img-top img-top " style="height: 200px; width: 200px; object-fit: fill;" alt="...">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title text-center">Cruz Project</h6>
       
                      <div class="text-center">
                        <button  class="btn btn-primary text " style="color:white;">View  </button>
                        </div>
                    </div>
                  </div>
                </div>  
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                <div>
                <div class="card" style="height: 300px; width: 200px; "  >
                    <div class="img-fluid border-bottom">
                    <img src="{{asset('assets/client/calamucha.png')}}" class="card-img-top img-top " style="height: 200px; width: 200px; object-fit: fill;" alt="...">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title text-center">Calamucha Project</h6>
       
                      <div class="text-center">
                        <button  class="btn btn-primary text " style="color:white;">View </button>
                        </div>
                    </div>
                  </div>
                </div>  
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                <div>
                <div class="card" style="height: 300px; width: 200px; "  >
                    <div class="img-fluid border-bottom">
                    <img src="{{asset('assets/client/maribel.png')}}" class="card-img-top img-top " style="height: 200px; width: 200px; object-fit: fill;" alt="...">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title text-center">Maribel Project</h6>
       
                      <div class="text-center">
                        <button  class="btn btn-primary text " style="color:white;">View </button>
                        </div>
                    </div>
                  </div>
                </div>  
              </div>
               
        </div>

      </div>
    </div>
@endsection