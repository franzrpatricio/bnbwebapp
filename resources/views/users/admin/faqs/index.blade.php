@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fas fa-circle-question"></i>
                    List of FAQs
                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" type="get" action="{{url('admin/faqs/find')}}">
                        @csrf
                        <div class="input-group">
                            {{-- <input class="form-control" name="query" type="search" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" /> --}}
                            <input class="form-control" name="query" type="search" placeholder="&#xf002; Search faq here..." style="font-family:Arial, FontAwesome" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        </div>
                    </form>
                </div>
            </h4>
            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('faqs.index') }}" class="btn btn-outline-info btn-sm m-1">
                        <i class="fas fa-circle-question"></i>
                        View All FAQs</a>
                    <a href="{{ route('faqs.restore_all') }}" class="btn btn-outline-success btn-sm m-1">
                        <i class="fa fa-plus-square"></i>
                        Restore All</a>
                @else
                    <a href="{{ url('admin/add-faq') }}" class="btn btn-outline-primary btn-sm m-1">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>
                        Create New FAQs</div>
                    </a>
                    <a href="{{ route('faqs.index', ['trashed' => 'post']) }}" class="btn btn-outline-danger btn-sm m-1">
                        <i class="fa fa-trash"></i>
                        View Deleted Faqs
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
                    @if (isset($msg))
                        <tr class="text-center">
                            <td colspan="4">
                                <div class="alert alert-danger">{{ $msg }}</div>
                            </td>
                        </tr>
                    @else
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
                                    <form method="POST" action="{{ route('faqs.destroy', $item->id) }}">
                                        {{-- pass the ID of specific faq --}}
                                        <a href="{{ url('admin/edit-faq/'.$item->id) }}">
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
                            <tr class="text-center"><td colspan="4"><h5>No FAQs</h5></td></tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
            <div class="float-end">
                {{ $faqs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection