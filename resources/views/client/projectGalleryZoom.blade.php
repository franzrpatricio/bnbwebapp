@extends('layouts.client')
@section('title',"$project->meta_title")
@section('meta_description',"$project->meta_description")
@section('meta_keyword',"$project->meta_keyword")
@section('content')

    <style>
        body { min-height: 100vh; }
        #exzoom {
            width: 500px;
            /* height: 400px; */
        }
        .container { margin: 150px auto; max-width: 960px; }
        .hidden { display: none; }
    </style>

    <div>
        <div class="header" data-aos="fade-right" data-aos-duration="1000" style="background-image: url('{{asset('assets/client/building2.jpg')}}')">
            <div class="d-flex justify-content-center" >
                <div class="banner-title">
                    <h1 class="mt-5" data-aos="fade-right" data-aos-duration="1000"><span>{{$project->name}}</span></h1>
                </div>
            </div>
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
    @if (isset($msg))
        <div class="alert alert-danger">{{ $msg }}</div>
        <a href="{{ url()->previous() }}" class="close float-end" data-dismiss="alert" aria-label="close">&times;Go back</a>
    @endif

    {{-- <div class="row mt-5 ml-5"> --}}
        <div class="exzoom col-12 col-lg-6 col-sm-12 col-md-12 p-5" id="exzoom" data-aos="fade-right" data-aos-duration="3000">
            <!-- Images -->
            <div class="exzoom_img_box">
                <ul class='exzoom_img_ul'>
                    @forelse ($images as $image)
                    <li>
                        <img src="{{ asset('uploads/project_images/'.$image->image) }}" class="d-block w-100 img-fluid" alt="..." >
                    </li>  
                    @empty
                    <h5>No Gallery yet for this Project.</h5>
                    @endforelse
                </ul>
            </div>
            <div class="exzoom_nav"></div>
            <!-- Nav Buttons -->
            <div class="row">
                <p class="exzoom_btn">
                    <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                </p>
                <div>
                    <a href="{{ url()->previous() }}">
                        <button type="button" class="btn btn-outline-danger btn-sm float-end mt-3">Go back</button>
                    </a>
                </div>
            </div>
        </div>
    {{-- </div> --}}

<script>
    AOS.init();
</script>
@endsection