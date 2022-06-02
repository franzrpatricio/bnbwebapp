@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fa fa-users "></i>List of Subscribers
                     <!-- Navbar Search-->
                     <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/newsletter/find')}}">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" name="query" type="search" placeholder="&#xf002; Search subscribers..." style="font-family:Arial, FontAwesome" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            {{-- <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button> --}}
                        </div>
                    </form>
                </div>
            </h4>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive" id="no-more-tables">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>SN</th>
                    <th>Email</th>
                    <th>Subscription Date</th>
                </tr>
            </thead>

            <tbody>
                @if (isset($msg))
                    <tr class="text-center">
                        <td colspan="3">
                            <div class="alert alert-danger">{{ $msg }}</div>
                        </td>
                    </tr>
                @else
                    @forelse ($subscribers as $item)
                        <tr class="text-center">
                            <td data-title="ID">{{$item->id}}</td>
                            <td data-title="Email">{{$item->email}}</td>
                            <td data-title="Date">{{$item->created_at}}</td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="3"><strong>No Subscribers Yet</strong></td>
                        </tr>
                    @endforelse
                @endif
            </tbody>
        </table>
    </div>
        <div class="float-end">
            {{ $subscribers->links() }}
        </div>
    </div>
</div>
@endsection
