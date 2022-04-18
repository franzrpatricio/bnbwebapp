@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-5">Edit FAQs</h1>
    <div class="card mt-4">
        
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/update-faq/'.$faq->id) }}" method="post" enctype="multipart/form-data">
                {{-- Laravel provides protection with the CSRF attacks 
                    by generating a CSRF token. 
                    This CSRF token is generated 
                    automatically for each user. --}}
                @csrf
                {{-- for updating the record --}}
                @method('PUT')

                    <div class="mb-3">
                        <label>Question</label>
                        <textarea name="question" rows="5" class="form-control">{{$faq->question}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Answer</label>
                        <textarea name="answewr" rows="5" class="form-control">{{$faq->answewr}}</textarea>
                    </div>
                    
                    <div class="d-flex justify-content-lg-end alig px-5 py-4">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection