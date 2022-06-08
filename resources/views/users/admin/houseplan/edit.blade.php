@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
        <h4 class="mt-4">Edit House Plan</h4>
    <div class="card mt-4">
       
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
                <div class="row">

                    <div class="col-6 mb-3">
                        <label>Type</label>
                        <input type="text" name="type" value="{{$houseplan->type}}" class="form-control">
                    </div>
                    <div class="col-6 mb-3">
                        <label>Cost</label>
                        <input type="text" name="cost" value="{{$houseplan->cost}}" class="form-control">
                    </div>
                    <div class="col-6 mb-3">
                        <label>Floor</label>
                        <input type="text" name="floor" value="{{$houseplan->floor}}" class="form-control">
                    </div>
                    <div class="col-6 mb-3">
                        <label>Wall</label>
                        <input type="text" name="wall" value="{{$houseplan->wall}}" class="form-control">
                    </div>
                    <div class="col-6 mb-3">
                        <label>Window</label>
                        <input type="text" name="window" value="{{$houseplan->window}}" class="form-control">
                    </div>
                    <div class="col-6 mb-3">
                        <label>Ceiling</label>
                        <input type="text" name="ceiling" value="{{$houseplan->ceiling}}" class="form-control">
                    </div>

                    <h6>Status</h6>
                    
                        <div class="">
                            <label>Visible</label>
                            <input type="checkbox" name="status" {{$houseplan->status == '1' ? 'checked':''}}/>
                        </div>

                </div>
                        {{-- <div class="">
                            <button type="submit" class="btn btn-primary">Update House Plan</button>
                            <a href="{{url('admin/houseplan')}}" class="btn btn-danger float-end">Back</a>

                        </div> --}}
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary m-2">
                                <i class="fa fa-refresh fa-spin"></i>
                                Update House Plan
                            </button>
                            <a href="{{url('admin/houseplan')}}" class="btn btn-outline-danger m-2">
                                <i class="fa fa-times"></i>
                                Cancel
                            </a>
                        </div>
                    
            </form>


        </div>
    </div>
</div>
@endsection