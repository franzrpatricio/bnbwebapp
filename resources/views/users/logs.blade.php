@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
      Activity Logs
    </h4>
    
    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        
       
          

                    <div class="card-body pb-2">
          
                        <table class="table bg-white" >
                          <thead class="bg-dark text-light">
                              
                              <th>Name</th>
                              <th>Action</th>
                              <th>Date</th>
                          </thead>
                          <tbody>

                          @if (Auth::user()->status == 1)
                          @foreach ($logs as $row) 
                              <tr>
                                  <td data-title="Name">{{ Auth::user()->name }}</td>
                                  <td data-title="Action">{{ $row->description }}</td>
                                  <td data-title="Date">{{ $row->date_time }}</td>
              
                              </tr>
                          @endforeach
                          @else
                          @foreach ($logs as $row) 
                              <tr>
                                  <td data-title="Name">{{ $row->name }}</td>
                                  <td data-title="Action">{{ $row->description }}</td>
                                  <td data-title="Date">{{ $row->date_time }}</td>
              
                              </tr>
                          @endforeach
                          @endif
                            
                          </tbody>
                      </table>
                      {{ $logs->onEachSide(1)->links() }}
          
                   
           
      </div>
    </div>
    
    
</div>
@endsection