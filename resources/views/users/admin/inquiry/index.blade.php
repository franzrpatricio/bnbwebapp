@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fas fa-list"></i>List of Inquiries

                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/inquiry/find')}}">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" name="query" type="search" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </h4>

            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('inquiries.index') }}" class="btn btn-info">View All posts</a>
                    <a href="{{ route('inquiries.restore_all') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('inquiries.index', ['trashed' => 'post']) }}" class="btn btn-primary">View Deleted posts</a>
                @endif
            </div>
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
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Inqury Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- @if (count($inquiries)>0) --}}
                        @foreach ($inquiries as $item)
                            <tr class="text-center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->contact}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->created_at->format('m/d/Y')}}</td>
                                <td>
                                    {{-- pass the ID of specific category --}}
                                    {{-- <a href="{{ url('admin/edit-houseplan/'.$item->id) }}" class="btn btn-success">Edit</a> --}}

                                    @if(request()->has('trashed'))
                                        <a href="{{ route('inquiries.restore', $item->id) }}" class="btn btn-success">Restore</a>
                                    @else
                                        <form method="POST" action="{{ route('inquiries.destroy', $item->id) }}">
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
                    {{-- @else
                        <tr>
                            <td colspan="4" class="text-center">No Inquiries Found.</td>
                        </tr>                        
                    @endif --}}
                </tbody>
            </table>
            {{ $inquiries->links() }}
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
