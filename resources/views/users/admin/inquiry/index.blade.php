@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container-fluid px-4">
  
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i>List of Inquiries</div>
                <a href="{{ url('admin/add-houseplan') }}" class="btn btn-primary btn-sm float-end">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i>Create New Inquiries</div>
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
                          <th>Name</th>
                          <th>Contact Number</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Inqury Date</th>
                          <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                     <tbody>
                          <tr>
                              <td data-title="SN">1</td>
                              <td data-title="Name">Arthur John Cotoner</td>
                              <td data-title="Contact Number">1234345345</td>
                              <td data-title="Email">adfssf@gmail.com</td>
                              <td data-title="Address">Basta bahay</td>
                              <td data-title="Inquiry Date">03-07-2000</td>
                              <td data-title="Actions">
                                  <label class="switch">
                                  <input type="checkbox" checked>
                                  <span class="slider round"></span>
                                </label>
                              </td>
                         
                      </tbody>
                    @foreach ($inquiries as $item)
                        <tr class="text-center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->cost}}</td>
                            {{-- <td>{{$item->floor}}</td>
                            <td>{{$item->wall}}</td>
                            <td>{{$item->window}}</td>q
                            <td>{{$item->ceiling}}</td> --}}

                            {{-- if status is true, show if not visible || visible --}}
                            {{-- to make the category visible just check the box for status --}}
                            <td>{{$item->status == '1' ? 'Visible':'Not Visible'}}</td>
                            <td>
                                {{-- pass the ID of specific category --}}
                                <a href="{{ url('admin/edit-houseplan/'.$item->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{url('admin/delete-houseplan/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection