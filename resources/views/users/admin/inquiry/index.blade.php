@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fas fa-message"></i>Inquiry List
                
                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/inquiries/find')}}">
                        @csrf
                        <div class="input-group">
                            {{-- <input class="form-control" name="query" type="search" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" /> --}}
                            <input class="form-control" name="query" type="search" placeholder="&#xf002; Search inquiry here..." style="font-family:Arial, FontAwesome" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        </div>
                    </form>
                </div>
            </h4>

            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('inquiries.index') }}" class="btn btn-outline-info">
                        <i class="fas fa-message"></i>
                        View All Inquiries</a>
                    <a href="{{ route('inquiries.restore_all') }}" class="btn btn-outline-success">
                        <i class="fa fa-plus-square"></i>
                        Restore All</a>
                @else
                    <a href="{{ route('inquiries.index', ['trashed' => 'post']) }}" class="btn btn-outline-danger">
                        <i class="fa fa-trash"></i>
                        View Deleted posts</a>
                @endif
            </div>
        </div>
    </div>

    <div class="card-body">
        {{-- display msg after redirecting --}}
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        <div class="table-responsive" id="no-more-tables">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>SN</th>
                    {{-- <th>Project ID</th> --}}
                    <th>Project Name</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Inquiry Message</th>
                    <th>Inqury Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($inquiries as $item)
                    <tr class="text-center">
                        <td data-title="ID">{{$item->id}}</td>
                        {{-- <td>{{$item->proj_id}}</td> --}}
                        <td data-title="Project Name">
                            @if ($item->proj_name == NULL)
                                <small>No Project Included</small>
                            @else
                                {{$item->proj_name}}
                            @endif
                        </td>
                        <td data-title="Name">{{$item->name}}</td>
                        <td data-title="Email">{{$item->email}}</td>
                        <td data-title="Contact Number">{{$item->phone}}</td>
                        <td data-title="Address">{{$item->address}}</td>
                        <td data-title="Message">{{$item->message}}</td>
                        <td data-title="Date">{{$item->created_at}}</td>
                        <td data-title="Actions">
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
                @empty
                    <tr class="text-center"><td colspan="10"><h5>No Inquiries</h5></td></tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <div class="float-end">
            {{ $inquiries->links() }}
        </div>
    </div>
</div>
@endsection
