@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">Edit Staff
                <a href="{{url('admin/users')}}" class="btn btn-danger float-end">Back</a>
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

            <div class="col-md-6">
                <label>Name</label>
                {{-- <input type="text" name="name" value="{{$user->name}}" class="form-control"> --}}
                <p class="form-control">{{$user->name}}</p>
            </div>

            <div class="col-md-6">
                <label>Email</label>
                {{-- <input type="text" name="email" value="{{$user->email}}" class="form-control"> --}}
                <p class="form-control">{{$user->email}}</p>
            </div>

            <div class="col-md-3 mb-3">
                <label for="">Created At</label>
                <p>{{ $user->created_at->format('d/m/Y') }}</p>
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
                <div class="row">
                    <h6>User Status</h6>
                    {{-- if role and status == 1, then display check on the box --}}
                    <div class="col-md-3 mb-3">
                        <label>Role</label>
                        {{-- <input type="checkbox" name="role_as" {{$user->role_as == '1' ? 'checked':''}}/> --}}
                        <select name="role_as" class="form-control">
                            <option value="0" {{$user->role_as=='1' ? 'selected':''}}>Administrator</option>
                            <option value="1" {{$user->role_as=='0' ? 'selected':''}}>Staff</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Disable User</label>
                        <input type="checkbox" name="status" {{$user->status == '0' ? 'checked':''}}/>
                        {{-- <select name="status" class="form-control">
                            <option value=""{{$user->status=='0' ? 'selected':''}}>Active</option>
                            <option value="" {{$user->status=='1' ? 'selected':''}}>Inactive</option>
                        </select> --}}
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection