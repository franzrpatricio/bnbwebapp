@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-5">Manage FAQs</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of FAQs</div>
                <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New FAQs</div>
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
                    <tr class="text-center">
                        <th>SN</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th>{{-- edit --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $item)
                        <tr class="text-center">
                            <td data-title="SN">2</td>
                            <td data-title="Question">Pwede bang panlakad yung pantalon</td>
                            <td data-title="Answer">pwidipirudipindi</td>
                            <td>
                                {{-- pass the ID of specific category --}}
                                <a href="{{ url('admin/edit-category/'.$item->id) }}" class="fa-solid fa-pen" style="color:#26B4FF"></a>
                                <a href="{{url('admin/delete-category/'.$item->id)}}" class="fa-solid fa-trash"style="color:red"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection