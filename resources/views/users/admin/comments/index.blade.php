@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-3">Manage Comments</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fas fa-list"></i>List of Comments
                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/comments/find')}}">
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
                    <a href="{{ route('comments.index') }}" class="btn btn-info btn-sm m-1">View All Comments</a>
                    <a href="{{ route('comments.restore_all') }}" class="btn btn-success btn-sm m-1">Restore All</a>
                @else
                    <a href="{{ route('comments.index', ['trashed' => 'post']) }}" class="btn btn-primary btn-sm m-1">View Deleted Comments</a>
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
                        <th>SN</th>
                        <th>Project</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Inqury Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($comments as $item)
                        <tr class="text-center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->project->name}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->comment}}</td>
                            <td>{{$item->created_at->format('m/d/Y')}}</td>
                            <td>
                                {{-- ACTIONS DELETE --}}
                                @if(request()->has('trashed'))
                                    <a href="{{ route('comments.restore', $item->id) }}" class="btn btn-success btn-sm">Restore</a>
                                @else
                                    {{-- pass the ID of specific faq --}}
                                    <form method="POST" action="{{ route('comments.destroy', $item->id) }}">
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
                        <tr class="text-center"><td colspan="7"><h5>No Comments</h5></td></tr>
                    @endforelse
                </tbody>
            </table>
            {{ $comments->links() }}
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
