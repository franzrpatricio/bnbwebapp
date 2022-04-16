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
                <div class="mb-3">
                    <label>Type</label>
                    <input type="text" name="type"class="form-control">
                </div>
                <div class="mb-3">
                    <label>Cost</label>
                    <input type="number" required name="cost" min="0" value="0" step="0.01" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Floor</label>
                    <input type="text" name="floor"class="form-control">
                </div>
                <div class="mb-3">
                    <label>Wall</label>
                    <input type="text" name="wall"class="form-control">
                </div>
                <div class="mb-3">
                    <label>Window</label>
                    <input type="text" name="window"class="form-control">
                </div>
                <div class="mb-3">
                    <label>Ceiling</label>
                    <input type="text" name="ceiling"class="form-control">
                </div>

                <h6>Status</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Visible</label>
                            <input type="checkbox" name="status"/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save House Plan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection