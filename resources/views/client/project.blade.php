@extends('layouts.client')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css
" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <div class="container-fluid bg-light h-100">
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
                    <img src="images/15288516_1292551174142952_7851552844722180038_o (1).jpg" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title text-center">Quezon City Project</h6>
                      <div class="text-center">
                        <a href="sampleproject.html">
                      <button  class="btn btn-primary text " >View  </button>
                      </a>
                      </div>
                      {{-- MODAL PROJECT INQUIRY FORM START --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Inquire about this Project
    </button>
    @if (session('msgc'))
        <h6 class="alert alert-warning mb-3">{{session('msgc')}}</h6>
    @endif  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">project </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          {{-- START FORM --}}
          <form action="{{ route('send.projectInquiry') }}" method="POST" onclick=" false;" autocomplete="off">
            @csrf
            <div class="modal-body">
              <div class="contact-info-form"> <span class="circle one"></span> <span class="circle two"></span>
                <h3 class="title">Inquiry Form</h3>
                <div class="col-md-12">
                <div class="social-input-containers"> <input type="@disabled(true)" name="proj_name" value="QC Proj" class="form-control"></div>
                <div class="social-input-containers"> <input type="text" name="name" class="input" placeholder="Name" /> </div>
                <div class="social-input-containers"> <input type="email" name="email" class="input" placeholder="Email" /> </div>
                <div class="social-input-containers"> <input type="tel" name="phone" class="input" placeholder="Phone" /> </div>
                <div class="social-input-containers"> <input type="text" name="address" class="input" placeholder="Address" /> </div>
                <div class="social-input-containers textarea"> <textarea name="message" class="input" placeholder="Message"></textarea> </div> 
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit Inquiry</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
          {{-- END FORM --}}
        </div>
      </div>
    </div>
    {{-- MODAL PROJECT INQUIRY FORM END --}}
                    </div>
                  </div>
                </div>  
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
                <div>
                <div class="card" style="height: 300px; width: 200px; "  >
                    <div class="img-fluid border-bottom">
                    <img src="images/15288516_1292551174142952_7851552844722180038_o (1).jpg" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
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
                    <img src="images/15288516_1292551174142952_7851552844722180038_o (1).jpg" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
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
                    <img src="images/15288516_1292551174142952_7851552844722180038_o (1).jpg" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
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
                    <img src="images/15288516_1292551174142952_7851552844722180038_o (1).jpg" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
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
                    <img src="images/15288516_1292551174142952_7851552844722180038_o (1).jpg" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
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
                    <img src="images/15288516_1292551174142952_7851552844722180038_o (1).jpg" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
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
                    <img src="images/15288516_1292551174142952_7851552844722180038_o (1).jpg" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
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
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js
" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js
" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js
" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection