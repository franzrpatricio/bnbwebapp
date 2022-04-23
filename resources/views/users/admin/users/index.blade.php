@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
<h1 class="mt-5">Manage Users</h1>

    <div class="card">
        <div class="card mt-4"></div>
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of Users</div></h4>
            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">View All Users</a>
                    <a href="{{ route('users.restore_all') }}" class="btn btn-success btn-sm">Restore All Users</a>
                @else
                    <a href="{{ url('admin/add-user') }}" class="btn btn-primary btn-sm">
                        <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New User</div>
                        <a href="{{ route('users.index', ['trashed' => 'post']) }}" class="btn btn-primary btn-sm">View Deleted Users</a>
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
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>

                <tbody>
                    @if (count($users)>0)
                        @foreach ($users as $item)    
                            <tr class="text-center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->role_as == '0' ? 'Administrator':'Staff'}}</td>

                                {{-- if status is true, show if not visible || visible --}}
                                {{-- to make the user visible just check the box for status --}}
                                {{-- if status = 1->active; else->inactive --}}
                                <td>{{$item->status == '0' ? 'Active':'Inactive'}}</td> 
                                <td>
                                    @if(request()->has('trashed'))
                                        <a href="{{ route('users.restore', $item->id) }}" class="btn btn-success">Restore</a>
                                    @else
                                        <a href="{{ url('admin/edit-user/'.$item->id) }}"><i class="fas fa-pen"></i></a>
                                        <form method="POST" action="{{ route('users.destroy', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn delete" title='Delete'>
                                                <i class="fa-solid fa-trash" style="color:red;"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No Users Found. 🥺</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').click(function(e) {
            if(!confirm('Are you sure you want to delete this post?')) {
                e.preventDefault();
            }
        });
    });
</script>

@endsection