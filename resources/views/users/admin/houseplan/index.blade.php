@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fas fa-house-chimney"></i>
                    List of House Plans
                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/houseplan/find')}}">
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
                    <a href="{{ route('houseplan.index') }}" class="btn btn-outline-info btn-sm m-1">
                        <i class="fas fa-house-chimney"></i>
                        View All House Plans</a>
                    <a href="{{ route('houseplan.restore_all') }}" class="btn btn-outline-success btn-sm">
                        <i class="fa fa-plus-square"></i>
                        Restore All</a>
                @else
                <a href="{{ url('admin/add-houseplan') }}" class="btn btn-outline-primary btn-sm">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-plus-circle"></i>
                        Create New Category</div>
                    <a href="{{ route('houseplan.index', ['trashed' => 'post']) }}" class="btn btn-outline-danger btn-sm m-1">
                        <i class="fa fa-trash"></i>
                        View Deleted House Plans</a>
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
                        <th>House Plan</th>
                        <th>Rates</th> {{-- rates == cost --}}
                        <th colspan="4">Materials</th>
                        <th>Status</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>
                <tbody>
                    @if (isset($msg))
                        <tr class="text-center">
                            <td colspan="10">
                                <div class="alert alert-danger">{{ $msg }}</div>
                            </td>
                        </tr>
                    @else
                        @forelse ($houseplan as $item)
                            <tr class="text-center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->cost}}</td>
                                <td>{{$item->floor}}</td>
                                <td>{{$item->wall}}</td>
                                <td>{{$item->window}}</td>
                                <td>{{$item->ceiling}}</td>

                                {{-- if status is true, show if not visible || visible --}}
                                {{-- to make the category visible just check the box for status --}}
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
                                    {{-- ACTIONS DELETE --}}
                                    @if(request()->has('trashed'))
                                        <a href="{{ route('houseplan.restore', $item->id) }}" class="btn btn-success btn-sm">Restore</a>
                                    @else    
                                    <form method="POST" action="{{ route('houseplan.destroy', $item->id) }}">
                                        {{-- pass the ID of specific faq --}}
                                        <a href="{{ url('admin/edit-houseplan/'.$item->id) }}">
                                            <i class="fa-solid fa-pen" style="color:#019ad2;"></i>
                                        </a>
                                    
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
                        <tr class="text-center"><td colspan="10"><h5>No Houseplans</h5></td></tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
            <div class="float-end">
                {{ $houseplan->links() }}
            </div>
        </div>
    </div>
</div>
@endsection