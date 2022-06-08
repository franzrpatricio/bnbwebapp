@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon">
                    <i class="fas fa-building"></i>List of Projects
                </div>
            </h4>
        </div>
        
        <div class="card-body">
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (isset($msg))
                            <tr class="text-center">
                                <td colspan="7">
                                    <div class="alert alert-danger">{{ $msg }}</div>
                                </td>
                            </tr>
                        @else
                            @forelse ($projects as $item)    
                                <tr class="text-center">
                                    <td data-title="ID">{{$item->id}}</td>
                                    <td data-title="Project Name">{{$item->name}}</td>

                                    {{-- it should be multiple images and not visible sa index --}}
                                    <td data-title="Thumbnail">
                                        @if ($item->image == true)
                                            {{-- get the category image from folder --}}
                                            <img src="{{asset('./uploads/project/'.$item->image)}}" width="50px" height="50px" alt="proj_img">
                                            
                                        @else
                                            <h5>No Image Found</h5>                                
                                        @endif
                                    </td>
                                    
                                    {{-- if status is true, show if not visible || visible --}}
                                    {{-- to make the project visible just check the box for status --}}
                                    @if ($item->deleted_at == NULL)
                                        @if ($item->status == 1)
                                            <td data-title="Status" style="font-family: FontAwesome; color:green">
                                                &#xf111; Active
                                            </td>
                                        @else
                                            <td data-title="Status" style="font-family: FontAwesome; color:red">
                                                &#xf111; Inactive
                                            </td>
                                        @endif
                                    @else
                                        <td data-title="Status" style="font-family: FontAwesome; color:red">
                                            &#xf111; Deleted
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr class="text-center"><td colspan="7"><h5>No Projects</h5></td></tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
@endsection