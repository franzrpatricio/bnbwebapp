@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-3">Manage FAQs</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fas fa-list"></i>List of FAQs
               

                <!-- Navbar Search-->
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/faqs/find')}}">
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
                    <a href="{{ route('faqs.index') }}" class="btn btn-info btn-sm m-1">View All FAQs</a>
                    <a href="{{ route('faqs.restore_all') }}" class="btn btn-success btn-sm m-1">Restore All</a>
                @else
                    <a href="{{ url('admin/add-faq') }}" class="btn btn-primary btn-sm m-1">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle m-1"></i>Create New FAQs</div>
                    <a href="{{ route('faqs.index', ['trashed' => 'post']) }}" class="btn btn-primary btn-sm m-1">View Deleted Faqs</a>
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
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th> {{-- edit --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($faqs as $item)
                        <tr class="text-center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->question}}</td>
                            <td>{{$item->answewr}}</td>
                            <td>
                                {{-- pass the ID of specific faq --}}
                                @if(request()->has('trashed'))
                                    <a href="{{ route('faqs.restore', $item->id) }}" class="btn btn-success">Restore</a>
                                @else
                                    {{-- pass the ID of specific faq --}}
                                    <a href="{{ url('admin/edit-faq/'.$item->id) }}">
                                        <i class="fa-solid fa-pen" style="color:#019ad2;"></i>
                                    </a>
                                    <form method="POST" action="{{ route('faqs.destroy', $item->id) }}">
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
                        <tr class="text-center"><td colspan="4"><h5>No FAQs</h5></td></tr>
                    @endforelse
                </tbody>
            </table>
            {{ $faqs->links() }}
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