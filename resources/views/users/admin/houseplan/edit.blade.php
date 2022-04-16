@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-5">ADMINISTRATOR</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">Edit House Plan
                <a href="{{url('admin/houseplan')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            {{-- show any errors in saving the forms --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/update-houseplan/'.$houseplan->id) }}" method="post">
                {{-- Laravel provides protection with the CSRF attacks 
                    by generating a CSRF token. 
                    This CSRF token is generated 
                    automatically for each user. --}}
                @csrf

                {{-- for updating the record --}}
                @method('PUT')

                    <div class="mb-3">
                        <label>Type</label>
                        <input type="text" name="type" value="{{$houseplan->type}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Cost</label>
                        <input type="text" name="cost" value="{{$houseplan->cost}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Floor</label>
                        <input type="text" name="floor" value="{{$houseplan->floor}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Wall</label>
                        <input type="text" name="wall" value="{{$houseplan->wall}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Window</label>
                        <input type="text" name="window" value="{{$houseplan->window}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Ceiling</label>
                        <input type="text" name="ceiling" value="{{$houseplan->ceiling}}" class="form-control">
                    </div>

                    <h6>Status</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>Visible</label>
                            <input type="checkbox" name="status" {{$houseplan->status == '1' ? 'checked':''}}/>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update House Plan</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection