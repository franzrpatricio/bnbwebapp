@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card mt-4"></div>
        <div class="card-header">
            <h4><div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Upload Images</div></h4>
            <a href="{{url('admin/projects')}}" class="btn btn-danger float-end">Back</a>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{url('admin/add-images')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="">Project</label>
                    {{-- select what category --}}
                    <select name="project_id" id="" class="form-control">
                        @foreach ($projects as $proj)
                            <option value="{{$proj->id}}">{{$proj->name}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- multiple file upload --}}
                <div class="mb-3">
                    <label>Upload Project Files</label>
                    <span>You can upload multiple images</span>
                    <input type="file" 
                            name="filenames[]"
                            class="form-control"
                            multiple
                    >
                </div>

                <div class="col-md-8">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save Project Images</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection