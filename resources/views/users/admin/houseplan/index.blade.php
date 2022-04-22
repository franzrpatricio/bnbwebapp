@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-5">Manage House Plan</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of House Plans</div>
            </h4>
            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('houseplan.index') }}" class="btn btn-info btn-sm">View All House Plans</a>
                    <a href="{{ route('houseplan.restore_all') }}" class="btn btn-success btn-sm">Restore All</a>
                @else
                <a href="{{ url('admin/add-houseplan') }}" class="btn btn-primary btn-sm">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Category</div>
                    <a href="{{ route('houseplan.index', ['trashed' => 'post']) }}" class="btn btn-primary btn-sm">View Deleted House Plans</a>
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
                        <th colspan="4">Materials</th>
                        <th>Status</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>
                <tbody>
                    @if (count($houseplan)>0)
                        @foreach ($houseplan as $item)
                            <tr class="text-center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->cost}}</td>

                                {{-- <td>Floor</td>
                                <td>Wall</td>
                                <td>Window</td>
                                <td>Ceiling</td> --}}
                                <td>{{$item->floor}}</td>
                                <td>{{$item->wall}}</td>
                                <td>{{$item->window}}</td>
                                <td>{{$item->ceiling}}</td>

                                {{-- if status is true, show if not visible || visible --}}
                                {{-- to make the category visible just check the box for status --}}
                                <td>{{$item->status == '1' ? 'Visible':'Not Visible'}}</td>
                                <td>
                                    @if(request()->has('trashed'))
                                        <a href="{{ route('houseplan.restore', $item->id) }}" class="btn btn-success btn-sm">Restore</a>
                                    @else
                                        {{-- pass the ID of specific faq --}}
                                        <a href="{{ url('admin/edit-houseplan/'.$item->id) }}">
                                            <i class="fa-solid fa-pen" style="color:#019ad2;"></i>
                                        </a>
                                        <form method="POST" action="{{ route('houseplan.destroy', $item->id) }}">
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
                            <td colspan="4" class="text-center">No House Plan Found. 🥺</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection