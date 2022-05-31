@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i> Create New FAQs</div></h4>
        </div>
        
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/add-faq') }}" method="post" enctype="multipart/form-data">
                {{-- Laravel provides protection with the CSRF attacks 
                    by generating a CSRF token. 
                    This CSRF token is generated 
                    automatically for each user. --}}
                @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <textarea name="question" rows="8" class="form-control" placeholder="&#xf059; Question" style="font-family:Arial, FontAwesome"></textarea>
                        </div>
                        <div class="col-6 mb-3">
                            {{-- <label>Answer</label> --}}
                            <textarea name="answewr" rows="8" class="form-control"placeholder="&#xf27a; Answer" style="font-family:Arial, FontAwesome"></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-end alig px-5 py-4">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="fa fa-plus"></i>
                                    Add FAQ</button>
                                <a href="{{url('admin/faqs')}}" class="btn btn-outline-danger">
                                    <i class="fa fa-times"></i>
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection