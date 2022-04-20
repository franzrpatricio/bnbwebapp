@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card mt-4"></div>
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New User</div></h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{url('admin/add-user')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="">Name</label>
                    {{-- input name refers to db field --}}
                    <input type="text" name="name" class="form-control"> 
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" required name="password" class="form-control">
                </div>

                <div class="col-md-8">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Save New User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection