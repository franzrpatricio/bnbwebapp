@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-5">Manage FAQs</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of FAQs</div>

            </h4>
            <div class="float-end">
                @if(request()->has('trashed'))
                    <a href="{{ route('faqs.index') }}" class="btn btn-info btn-sm">View All FAQs</a>
                    <a href="{{ route('faqs.restore_all') }}" class="btn btn-success btn-sm">Restore All</a>
                @else
                    <a href="{{ url('admin/add-faq') }}" class="btn btn-primary btn-sm">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New FAQs</div>
                    <a href="{{ route('faqs.index', ['trashed' => 'post']) }}" class="btn btn-primary btn-sm">View Deleted Faqs</a>
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
                    @if (count($faqs)>0)
                        @foreach ($faqs as $item)
                            <tr class="text-center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->question}}</td>
                                <td>{{$item->answewr}}</td>

<<<<<<< HEAD
                            <td>
                                {{-- pass the ID of specific faq --}}
                                <a href="{{ url('admin/edit-faq/'.$item->id) }}" class="fa-solid fa-pen p-2" style="color:#019ad2;"></a>
                                <a href="{{url('admin/delete-faq/'.$item->id)}}" class="fa-solid fa-trash p-2" style="color:red;"></a>
                            </td>
                        </tr>
                    @endforeach
=======
                                <td>
                                    {{-- pass the ID of specific faq --}}
                                    {{-- <a href="{{ url('admin/edit-faq/'.$item->id) }}">
                                        <i class="fa-solid fa-pen" style="color:#019ad2;"></i>
                                    </a>
                                    <a href="{{ url('admin/delete-faq/'.$item->id) }}">
                                        <i class="fa-solid fa-trash" style="color:red;"></i>
                                    </a> --}}

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
                                            <button type="submit" class="btn btn-danger delete" title='Delete'>
                                                <i class="fa-solid fa-trash" style="color:red;"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No FAQs Found.</td>
                        </tr>                        
                    @endif
>>>>>>> faqs
                </tbody>
            </table>
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