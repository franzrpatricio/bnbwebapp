@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-5">ADMINISTRATOR</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of House Plans</div>
                <a href="{{ url('admin/add-houseplan') }}" class="btn btn-primary btn-sm float-end">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New House Plan</div>
                </a>
            </h4>
        </div>

        <div class="card-body">
            {{-- display msg after redirecting --}}
            @if (session('msg'))
                <div class="alert alert-success">{{ session('msg') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <div class="text-center">
                        <small>
                            <strong>IMPORTANT: PLEASE READ!</strong> <br>
                            <strong>Rates</strong> are rules of thumb ONLY and serves as the minimun basis for your building. <strong>ESTIMATES</strong> may vary to your chosen design
                        </small>
                    </div>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>House Plan</th>
                        <th>Rates</th> {{-- rates == cost --}}
                        {{-- <th>Floor</th>
                        <th>Wall</th>
                        <th>Window</th>
                        <th>Ceiling</th> --}}
                        <th>Status</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($houseplan as $item)
                        <tr class="text-center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->cost}}</td>
                            {{-- <td>{{$item->floor}}</td>
                            <td>{{$item->wall}}</td>
                            <td>{{$item->window}}</td>q
                            <td>{{$item->ceiling}}</td> --}}

                            {{-- if status is true, show if not visible || visible --}}
                            {{-- to make the category visible just check the box for status --}}
                            <td>{{$item->status == '1' ? 'Visible':'Not Visible'}}</td>
                            <td>
                                {{-- pass the ID of specific category --}}
                                <a href="{{ url('admin/edit-houseplan/'.$item->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{url('admin/delete-houseplan/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection