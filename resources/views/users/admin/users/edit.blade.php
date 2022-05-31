@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
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

            <div class="row">
                <div class="col-6 mb-3"><label>
                    <i class="fa fa-address-card"></i>
                    <strong>Full Name</strong></label><p class="form-control">{{$user->name}}</p></div>
                <div class="col-6 mb-3"><label>
                    <i class="fa fa-envelope"></i>
                    <strong>Email Account</strong></label><p class="form-control">{{$user->email}}</p></div>
                <div class="col-6 mb-3"><label for=""><strong>
                    <i class="fa fa-clock"></i>
                    Created At</strong></label><p class="form-control">{{ $user->created_at->format('d/m/Y') }}</p></div>
            </div>

            <form action="{{ url('admin/update-user/'.$user->id) }}" method="post" enctype="multipart/form-data">
                {{-- Laravel provides protection with the CSRF attacks 
                    by generating a CSRF token. 
                    This CSRF token is generated 
                    automatically for each user. --}}
                @csrf

                {{-- for updating the record --}}
                @method('PUT')

                {{-- FETCH ALL RECORDS --}}
                {{-- REPLACE CATEGORY ID AND HOUSE PLAN ID WITH CAT && PLAN NAME --}}
                <div class="row" style="font-family: FontAwesome;">
                    <label class="mr-2" style="color:green"> &#xf111; <strong style="color: black">User Status</strong></label>
                    {{-- if role and status == 1, then display check on the box --}}
                    <div class="col-md-3 mb-3">
                        <label><strong>Role</strong></label>
                        {{-- <input type="checkbox" name="role_as" {{$user->role_as == '1' ? 'checked':''}}/> --}}
                        <select name="role_as" class="form-control" >
                            <option value="">--Select Role--</option>
                            <option value="0" {{$user->role_as=='1' ? 'selected':''}} >&#xf21b; Administrator</option>
                            <option value="1" {{$user->role_as=='0' ? 'selected':''}}>&#xf0f0; Staff</option>
                        </select>
                    </div>

                    <div class="col-6 mb-3">
                        @if ($user->status == '1')
                            <div class="mb-3">
                                <input type="checkbox" name="status" {{$user->status == '1' ? 'checked':''}}/>
                                <small>Click to make this user Active.</small>
                            </div>
                        @else
                            <input type="checkbox" name="status" {{$user->status == '1' ? 'checked':''}}/>
                            <small>Click to activate the user.</small>
                        @endif
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary m-2">
                            <i class="fa fa-refresh fa-spin"></i>
                            Update User
                        </button>
                        <a href="{{url('admin/users')}}" class="btn btn-outline-danger m-2">
                            <i class="fa fa-times"></i>
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection