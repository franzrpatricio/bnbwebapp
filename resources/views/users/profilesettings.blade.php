@extends('layouts.master')
@section('title', 'Bana and Bana Architects')
@section('content')

<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
      Account settings
    </h4>
    
    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#activity-logs">Activity Logs</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">
    <div class="text-center">
    
                <img class="profile-pic" src="{{ asset('assets/images/aj.jpg') }}" alt="" style="border-radius: 100px; width: 200px; height: 200px; align-items: center; padding: 10px;">
    
                <div class="ml-4 sm-12">
                  <label class="btn btn-outline-primary">
                    Upload new photo
                    <input type="file" class="account-settings-fileinput" style="position: absolute; visibility: hidden; width: 1px;height: 1px; opacity: 0;">
                  </label> &nbsp;
              </div>
    </div>
              
    <div class="container">
      <div class="card p-3">
        <div>
                   <div class="row text-start">
                      <div class="col-6">
                         Username
                      </div>
                    <div class="col-6">
                         Arthur John Cotoner
                        <a type="button" class="btn" data-toggle="collapse" data-target="#Name">
                          <i class="fa-solid fa-pen" style="color:#4CA5D7;"></i> 
                        </a>
                      </div>
              </div>
  
          <div id="Name" class="collapse">
                <div class="card"> 
                   <div class="form-group">
                     <input type="password" class="form-control" placeholder="Enter New Name">
                  </div>
                <div class="d-flex justify-content-end mt-3 p-3">
                    <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                </div>
         </div>
      
        </div>
  
  
        <div>
          <div class="row text-start">
                <div class="col-6">
                  Email:
                </div>
                <div class="col-6">
                  arthur@gmail.com
                  <a type="button" class="btn" data-toggle="collapse" data-target="#Email">
                  <i class="fa-solid fa-pen" style="color:#4CA5D7;"></i> 
                  </a>
                </div>
          </div>
  
          <div id="Email" class="collapse">
                <div class="card"> 
                   <div class="form-group">
                     <input type="password" class="form-control" placeholder="Enter New Name">
                  </div>
                <div class="d-flex justify-content-end mt-3 p-3">
                    <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
               </div>
         </div>
      
        </div>
      </div>
  
  </div>  
    
              {{-- <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control mb-1" value="Enter your Username">
                </div>
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail</label>
                  <input type="text" class="form-control mb-1" value="{{ Auth::user()->email }}">
                  
                </div>
                
              </div> --}}
              
    
            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">

              @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
            <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
                        {{ csrf_field() }}
    
                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                  <label class="form-label">Current password</label>
                  <input id="current-password" type="password" class="form-control" name="current-password" required>
                  @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                </div>
    
                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                  <label class="form-label">New password</label>
                  <input id="new-password" type="password" class="form-control" name="new-password" required>
                  @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                </div>
    
                <div class="form-group">
                  <label class="form-label">Repeat new password</label>
                  <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                </div>
    
              </div>
                <div class="text-right mt-3 p-3">
                  <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                  <button type="button" class="btn btn-default">Cancel</button>
                </div>
            </div>

            <div class="tab-pane fade" id="activity-logs">
              <div class="card-body pb-2">
    
              <table class="table bg-white" >
                <thead class="bg-dark text-light">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Date</th>
                </thead>
                <tbody>
                   
                    <tr>
                        <td data-title="ID">1</td>
                        <td data-title="Name">Arthur John B. Cotoner</td>
                        <td data-title="Action">Login</td>
                        <td data-title="Date">3-27-2022</td>
    
                    </tr>
                    <tr>
                        <td data-title="ID">2</td>
                        <td data-title="Name">Renz Bana</td>
                        <td data-title="Action">Login</td>
                        <td data-title="Date">3-22-2022</td>
    
                    </tr>
                   
                </tbody>
            </table>
    
              </div>
            </div>
    </div>
           
    
    
    
    </div>
@endsection