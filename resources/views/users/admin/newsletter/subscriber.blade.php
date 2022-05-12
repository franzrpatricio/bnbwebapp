@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fas fa-list"></i>List of Subscribers

                    <!-- Navbar Search-->
                    {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/comments/find')}}">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" name="query" type="search" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form> --}}
                </div>
            </h4>
        </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>SN</th>
                        <th>Email</th>
                        <th>Date Subscribed</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subscribers as $item)
                        <tr class="text-center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->created_at->format('m/d/Y')}}</td>
                            {{-- <td>
                                <form method="POST" action="{{ route('comments.destroy', $item->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn delete" title='Delete'>
                                        <i class="fa-solid fa-trash" style="color:red;"></i>
                                    </button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $subscribers->links() }}
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
