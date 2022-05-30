@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fa fa-users"></i>List of Users
                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/users/find')}}">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" name="query" type="search" placeholder="&#xf002; Search user here..." style="font-family:Arial, FontAwesome" aria-describedby="btnNavbarSearch" />
                            {{-- <button class="btn btn-outline-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button> --}}
                        </div>
                    </form>
                </div>
            </h4>
            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('users.index') }}" class="btn btn-outline-info btn-sm"><i class="fa fa-users"></i>View All Users</a>
                    <a href="{{ route('users.restore_all') }}" class="btn btn-outline-success btn-sm">
                        <i class="fa fa-user-plus"></i>
                        Restore All Users</a>
                @else
                    <a href="{{ url('admin/add-user') }}" class="btn btn-outline-primary btn-sm">
                        <div class="sb-nav-link-icon">
                            <i class="fa fa-user-plus"></i>Create New User
                        </div>
                    </a>
                    <a href="{{ route('users.index', ['trashed' => 'post']) }}" class="btn btn-outline-danger btn-sm">
                        <i class="fa fa-user-times"></i>
                        View Deleted Users
                    </a>
                @endif
            </div>
        </div>
        <div class="card-body">
            {{-- display msg after redirecting --}}
            @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Full Name</th>
                        {{-- <th>Email</th> --}}
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>

                <tbody>
                    @if (isset($msg))
                        <tr class="text-center">
                            <td colspan="5">
                                <div class="alert alert-danger">{{ $msg }}</div>
                            </td>
                        </tr>
                    @else
                        @forelse ($users as $item)    
                            <tr class="text-center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                {{-- <td>{{$item->email}}</td> --}}
                                <td>{{$item->role_as == '1' ? 'Administrator':'Staff'}}</td>

                                {{-- if status is true, show if not visible || visible --}}
                                {{-- to make the user visible just check the box for status --}}
                                {{-- if status = 1->active; else->inactive --}}
                                @if ($item->status == 1)
                                       
                                    <td style="font-family: FontAwesome; color:green">
                                        &#xf111; Active
                                    </td>
                                        
                                    @else
                                    <td style="font-family: FontAwesome; color:red">
                                        &#xf111; Inactive
                                    </td>
                                    @endif

                                <td>
                                    @if(request()->has('trashed'))
                                        <a href="{{ route('users.restore', $item->id) }}" class="btn btn-outline-success">
                                            <i class="fa fa-user-plus"></i>
                                            Restore</a>
                                    @else 
                                    <form method="POST" action="{{ route('users.destroy', $item->id) }}">
                                        <a href="{{ url('admin/edit-user/'.$item->id) }}"><i class="fas fa-pen"></i></a>
                                       
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn delete" title='Delete'>
                                                <i class="fa-solid fa-trash" style="color:red;"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center"><td colspan="6"><h5>No Users</h5></td></tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
            <div class="float-end">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

@endsection