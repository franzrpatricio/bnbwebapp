@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header"><h4 class="mt-2">Edit FAQ</h4></div>
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
                <div class="row">
                    <div class="col-6 mb-3">
                        <textarea name="question" rows="8" class="form-control" style="font-family:Arial, FontAwesome">{{$faq->question}}</textarea>
                    </div>
                    <div class="col-6 mb-3">
                        {{-- <label>Answer</label> --}}
                        <textarea name="answewr" rows="8" class="form-control">{{$faq->answewr}}</textarea>
                    </div>
                    
                   
                </div> 
                <div class="col-12 d-flex justify-content-end">
                     
                            <button type="submit" class="btn btn-outline-primary m-2">
                                <i class="fa fa-refresh fa-spin"></i>
                                Update FAQ</button>
                            <a href="{{url('admin/faqs')}}" class="btn btn-outline-danger m-2">
                                <i class="fa fa-times"></i>
                                Cancel
                            </a>
                       
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection