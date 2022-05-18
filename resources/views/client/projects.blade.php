@extends('layouts.client')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css
" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid bg-light h-100">
  <div class="row min-vh-100">
    <div class="col-lg-3 col-md-3 col-sm-12 p-3 navbar-expand-lg navbar-expand-md navbar-light bg-light">
      {{-- SEARCH BAR --}}
      <div>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('projects')}}">
          @csrf
          <div class="input-group">
              <input class="form-control" name="query" type="search" placeholder="Search Project here..." aria-label="Search Project" aria-describedby="btnNavbarSearch"/>
              <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
          </div>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div>
              <button type="submit" class="btn btn-primary btn-sm">Apply Filter</button>
              <a href="{{url('projects')}}" class="btn btn-danger btn-sm mt-auto">Reset</a>

              {{-- CATEGORIES --}}
              <div class="container  border-bottom p-3" >
                <div>
                  <h3>Category</h3>
                </div> 
                  @foreach ($categories as $category)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="category" value="{{$category->id}}" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">{{$category->name}}</label>
                    </div>
                  @endforeach
              </div>

              {{-- ARCHITECTURAL DESIGNS --}}
              <div class="container border-bottom p-3">
                <h3>Architectural Design</h3>
                  @foreach ($architectural as $design)
                    <div class="form-check">
                      <input class="form-check-input" 
                        type="checkbox" 
                        name="design" 
                        value="{{$design->design}}" 
                        id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">{{$design->design}}</label>
                    </div>
                  @endforeach
              </div>

              {{-- STORIES --}}
              <div class="container border-bottom p-3">
                <h3>No. Stories</h3>
                {{-- @foreach ($projects->sortBy('stories') as $project)
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="stories" value="{{$project->stories}}" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">{{$project->stories}}</label>
                  </div>
                @endforeach --}}
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="stories" value="Bungalow" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">Bungalow</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="stories" value="1" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="stories" value="2" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="stories" value="3" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">3</label>
                </div>
              </div>
              {{-- 
                put projects->stories in value,
                find = request->get('name'),
                if find
                  stories = Projects::where('stories','LIKE','%'.find.'%')->get(),
                  if count stories > 0 return view compact,
                  else return view msg compact,
                return view compact,
              --}}

              {{-- AMENITIES --}}
              <div class="container  border-bottom  p-3">
                <h3>Amenities</h3>
                  @foreach ($amenities as $amenity)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="amenity" value="{{$amenity->service}}" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">{{$amenity->service}}</label>
                    </div>
                  @endforeach
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <div class="col-lg-9 col-md-9 col-sm-12 p-3 ">
      {{-- show any errors in saving the forms --}} 
      @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        </div>
      @endif  

      {{-- display msg after redirecting --}}
      @if (isset($msg))
        <div class="alert alert-danger">
          <div class="">Showing Results of "{{Request::input('query')}}"</div>
          {{ $msg }}
          <a href="{{url('projects')}}" class="close float-end" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
      @endif
        
      @foreach ($projects as $project)
        <div class="row ">
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
            <div>
              <div class="card" style="height: 300px; width: 200px; ">
                <div class="img-fluid border-bottom">
                  <img src="{{asset('uploads/project/'.$project->image)}}" class="card-img-top img-top " style="height: 200px; object-fit: contain;" alt="...">
                </div>
                <div class="card-body">
                  <h6 class="card-title text-center">{{$project->name}}</h6>
                  <div class="text-center">
                    <a href="{{ url('project/'.$project->id.'/'.$project->slug) }}">
                      <button class="btn btn-primary text ">View</button>
                    </a>
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
                <div class="social-input-containers"> <input type="@disabled(true)" name="proj_id" value="{{ $project->id }}" class="form-control"></div>
                <div class="social-input-containers"> <input type="@disabled(true)" name="proj_name" value="{{ $project->name }}" class="form-control"></div>
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
          </div>
        </div>
      @endforeach
      {{-- {{ $projects->links() }} --}}
    </div>
  </div>
</div>
<!-- script -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js
" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js
" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js
" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection