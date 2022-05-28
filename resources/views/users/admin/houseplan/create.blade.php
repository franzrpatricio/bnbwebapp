@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New House Plan</div></h4>
        </div>
        
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/add-houseplan') }}" method="post">
                {{-- Laravel provides protection with the CSRF attacks 
                    by generating a CSRF token. 
                    This CSRF token is generated 
                    automatically for each user. --}}
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <input type="text" name="type"class="form-control" placeholder="&#xf015; House Plan Design" style="font-family:Arial, FontAwesome">
                    </div>
    
                    <div class="col-6 mb-3">
                        <input type="number" required name="cost" min="0" step="0.01" class="form-control" placeholder="&#8369; Construction Cost" style="font-family:Arial, FontAwesome">
                    </div>
                    <div>
                        <hr class="dropdown-divider"/>
                    </div>
                    <div class="text-center mb-3"><label><strong>Materials to be used</strong></label></div>
                    <div class="col-6 mb-3">
                        <input type="text" name="floor" class="form-control" placeholder="&#8971; Floor" style="font-family:Arial, FontAwesome">
                    </div>
                    <div class="col-6 mb-3">
                        <input type="text" name="wall" class="form-control" placeholder="&#9619; Wall" style="font-family:Arial, FontAwesome">
                    </div>
                    <div class="col-6 mb-3">
                        <input type="text" name="window" class="form-control" placeholder="&#xf17a; Window" style="font-family:Arial, FontAwesome">
                    </div>
                    <div class="col-6 mb-3">
                        <input type="text" name="ceiling" class="form-control" placeholder="&#8969; Ceiling" style="font-family:Arial, FontAwesome">
                    </div>

                    <div class="d-flex justify-content-end">
                        <label class="mr-2" style="font-family: FontAwesome; color:green"> &#xf111; <strong style="color: black">House Plan Status</strong></label>
                        <div class="mb-3">
                            <input type="checkbox" name="status"/>
                            <small>Click to make the House Plan visible.</small>
                        </div>
                        <div class="col-4 mb-3">
                            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-plus"></i>
                                Add House Plan</button>
                            <a href="{{url('admin/houseplan')}}" class="btn btn-outline-danger"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection