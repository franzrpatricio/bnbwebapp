@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')
<!-- Gallery -->
<!-- Gallery is linked to lightbox using data attributes.
To open lightbox, this is added to the gallery element: {data-toggle="modal" data-target="#exampleModal"}.
To open carousel on correct image, this is added to each image element: {data-target="#carouselExample" data-slide-to="0"}.
Replace '0' with corresponding slide number. -->

<div class="container-fluid px-4">
  <div class="row mt-5">
    <div class="col-6">
      <h1>Manage Gallery</h1>
    </div>
    
      <div class="col-6 d-flex justify-content-end">
        <a href="{{url('admin/projects')}}" class="btn btn-outline-danger mt-3 float-end"><i class="fa fa-times"></i> Cancel</a>
      </div>

  </div>
  

 
    {{-- show any errors in saving the forms --}} 
    @if ($errors->any())
      <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
              <div>{{$error}}</div>
          @endforeach
      </div>
    @endif  

    {{-- display msg after redirecting --}}
    @if (session('msg'))
      <div class="alert alert-success">{{ session('msg') }}</div>
    @endif    
  </div>




   
<div class>

</div>
    
  <div class="row">   

    @foreach ($images as $item)

    <div class="col-lg-3">
      <div class="card p-3">
 
      <div id="gallery" data-toggle="modal" data-target="#exampleModal">
          
            <img src="{{ asset('uploads/project_images/'.$item->image) }}" 
              class="w-100" 
              data-slide-to="{{ $loop->index }}"
              data-target="#carouselExample"
            />
          
      </div>



      <div class="p-2">
        <form method="post" action="{{ route('gallery.update', $item->id) }}" enctype="multipart/form-data">
          @csrf
       
            <input type="file" name="image" class="form-control">
       
      <div class="row text-center p-2">
          <div class="col-6">
            <button type="submit" class="btn btn-outline-primary" title='Update'>
              <i class="fa fa-refresh fa-spin"></i>
              Update
            </button>
          </div>
       
      
        <div class="col-6">
          <a href="{{ route('gallery.destroy', $item->id) }}" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Delete</a>
        </div> 
      </div>
      </form>
      </div>

    </div>
     
  </div>
    @endforeach
 

    <!-- Modal -->
    <!-- This part is straight out of Bootstrap docs. Just a carousel inside a modal. -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          
          <div class="modal-body">
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                @foreach ($images as $item)
                  <div>
                    <li data-target="#carouselExample" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                  </div>
                @endforeach
              </ol>

              <div class="carousel-inner">
                @foreach ($images as $item)
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('uploads/project_images/'.$item->image) }}" class="d-block w-100"/>
                  </div>
                @endforeach
              </div>

              <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div> --}}
        </div>
      </div>
    </div>

  </div>

 


  

 


@endsection

