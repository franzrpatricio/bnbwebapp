@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card mt-4"></div>
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Staff</div></h4>
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
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror('name')"> 
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('name') is-invalid @enderror('email')">
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label>Role</label>
                    <select name="role_as" class="form-control">
<<<<<<< HEAD
                        <option value="0">Administrator</option>
                        <option value="1">Staff</option>
=======
                        <option value="1">Administrator</option>
                        <option value="0">Staff</option>
>>>>>>> backendfranz
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label>Disable User</label>
                    <input type="checkbox" name="status"/>
                </div>

                <div class="col-md-8">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                        {{__('Save User')}}
                        </button>
                        <a href="{{url('admin/users')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection