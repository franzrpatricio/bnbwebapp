@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fa fa-user-plus"></i> Create New Staff</div></h4>
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
                <div class="row">
                    <div class="col-6 mb-3">
                        {{-- <label for="">Name</label> --}}
                        {{-- input name refers to db field --}}
                        <input type="text" name="name" 
                        placeholder="&#xf2c0; Full Name" required style="font-family:Arial, FontAwesome"
                        class="form-control @error('name') is-invalid @enderror('name')"> 
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        {{-- <label>Email</label> --}}
                        <input type="email" name="email" 
                        placeholder="&#xf0e0; Gmail Account" required style="font-family:Arial, FontAwesome"
                        class="form-control @error('name') is-invalid @enderror('email')">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="col-6 mb-3">
                        {{-- <label for="password" class="form-label">{{ __('Password') }}</label> --}}
                        <input id="password" type="password" 
                        placeholder="&#xf084; Password" required style="font-family:Arial, FontAwesome"
                        class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-6 mb-3">
                        {{-- <label for="password-confirm" class=" form-label">{{ __('Confirm Password') }}</label> --}}
                        <input id="password-confirm" type="password" 
                        placeholder="&#xf084; Confirm Password" style="font-family:Arial, FontAwesome"
                        class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="col-6 mb-3">
                        {{-- <label>
                            <i class="fa fa-user-secret"></i>
                            Role
                        </label> --}}
                        <select name="role_as" class="form-control">
                            <option value="">--Select Role--</i></option>
                            <option value="1">Administrator</option>
                            <option value="0">Staff</option>
                        </select>
                    </div>

                    <div class="col-6 mb-3">
                        <div><label><strong>User Status</strong></label></div>
                        <input type="checkbox" name="status"/>
                        <small>Click to activate the user.</small>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary">
                            <i class="fa fa-plus"></i>
                            {{__('Add User')}}
                            </button>
                            <a href="{{url('admin/users')}}" class="btn btn-outline-danger">
                                <i class="fa fa-times"></i>
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection