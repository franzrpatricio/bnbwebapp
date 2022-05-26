@extends('layouts.client')
@section('content')
  <div class="container-fluid bg-light h-100" data-aos="fade-right" data-aos-duration="1000">
    <div class="row min-vh-100">
      <div class="col-lg-3 col-md-3 col-sm-12 p-3 navbar-expand-lg navbar-expand-md navbar-light bg-light">
        {{-- SEARCH BAR --}}
        <div>
          <!-- Navbar Search-->
          <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('projects')}}">
          @csrf
            <input class="form-control" name="query" type="search" placeholder="Search Project here..." aria-label="Search Project" aria-describedby="btnNavbarSearch"/>
            <button class="btn btn-primary" id="btnNavbarSearch" type="submit">
              <i class="fa fa-search"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div>  
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
            <div class="text-center p-2">
              <button type="submit" class="btn btn-primary btn-sm">Apply Filter</button>
            <a href="{{url('projects')}}" class="btn btn-danger btn-sm mt-auto">Reset</a>
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
        
      
        <div class="row ">
          @forelse ($projects as $project)
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3 d-flex justify-content-center"  >
            <div>
              <div class="card" style="height: 300px; width: 200px; ">
                <div class="img-fluid border-bottom">
                  <div class="card-img">
                    <img src="{{asset('uploads/project/'.$project->image)}}" class="card-img-top" style="height: 200px;width:199px; object-fit: contain;" alt="...">
                 </div>
                </div>
                <div class="card-body">
                  <h6 class="card-title text-center">{{$project->name}}</h6>
                  {{-- <h6 class="card-title text-center">{{$project->cost}}</h6> --}}
                  <div class="text-center">
                    <a href="{{ url('project/'.$project->id.'/'.$project->slug) }}">
                      <button class="btn btn-primary text">View</button>
                    </a>
                  </div>
                </div>
              </div>  
            </div>               
          </div>
          @empty
            <h3>No Projects Found</h3>
          @endforelse
        </div>
      </div>
    </div>
@endsection