<?php include('partials/navbar.php') ?>
<main class="container-fluid bg-light h-100">
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
              <div class="row ">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                  <div>
                  <div class="card" style="height: 300px; width: 200px; "  >
                      <div class="img-fluid border-bottom">
                    <img src="{{asset('assets/client/building2.jpg')}}" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
                      </div>
                      <div class="card-body">
                        <h6 class="card-title text-center">Quezon City Project</h6>
                        <div class="text-center">
                          <a href="sampleproject.html">
                        <button  class="btn btn-primary text ">View  </button>
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
                      <img src="{{asset('assets/client/building2.jpg')}}" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
                      </div>
                      <div class="card-body">
                        <h6 class="card-title text-center">Tanza Cavite Project</h6>
         
                        <div class="text-center">
                          <button  class="btn btn-primary text " >View  </button>
                          </div>
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                  <div>
                  <div class="card" style="height: 300px; width: 200px; "  >
                      <div class="img-fluid border-bottom">
                      <img src="{{asset('assets/client/building2.jpg')}}" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
                      </div>
                      <div class="card-body">
                        <h6 class="card-title text-center">Manila Project</h6>
         
                        <div class="text-center">
                          <button  class="btn btn-primary text " >View  </button>
                          </div>
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                  <div>
                  <div class="card" style="height: 300px; width: 200px; "  >
                      <div class="img-fluid border-bottom">
                      <img src="{{asset('assets/client/building2.jpg')}}" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
                      </div>
                      <div class="card-body">
                        <h6 class="card-title text-center">Lancaster Project</h6>
         
                        <div class="text-center">
                          <button  class="btn btn-primary text " >View  </button>
                          </div>
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                  <div>
                  <div class="card" style="height: 300px; width: 200px; "  >
                      <div class="img-fluid border-bottom">
                      <img src="{{asset('assets/client/building2.jpg')}}" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
                      </div>
                      <div class="card-body">
                        <h6 class="card-title text-center">Zobel Project</h6>
         
                        <div class="text-center">
                          <button  class="btn btn-primary text " >View  </button>
                          </div>
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                  <div>
                  <div class="card" style="height: 300px; width: 200px; "  >
                      <div class="img-fluid border-bottom">
                      <img src="{{asset('assets/client/building2.jpg')}}" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
                      </div>
                      <div class="card-body">
                        <h6 class="card-title text-center">Laguna Project</h6>
         
                        <div class="text-center">
                          <button  class="btn btn-primary text " >View  </button>
                          </div>
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                  <div>
                  <div class="card" style="height: 300px; width: 200px; "  >
                      <div class="img-fluid border-bottom">
                      <img src="images/building2.jpg" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
                      </div>
                      <div class="card-body">
                        <h6 class="card-title text-center">Batangas Project</h6>
         
                        <div class="text-center">
                          <button  class="btn btn-primary text " >View </button>
                          </div>
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                  <div>
                  <div class="card" style="height: 300px; width: 200px; "  >
                      <div class="img-fluid border-bottom">
                      <img src="/public/assets/client/residencial.jpg" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
                      </div>
                      <div class="card-body">
                        <h6 class="card-title text-center">San Pedro Project</h6>
         
                        <div class="text-center">
                          <button  class="btn btn-primary text " >View </button>
                          </div>
                      </div>
                    </div>
                  </div>  
                </div>
                 
          </div>

        </div>
       
      </main>
      <?php include('partials/footer.php') ?>   