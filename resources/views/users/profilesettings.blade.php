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
                      @if (session('msg'))
                      <div class="alert alert-success">{{ session('msg') }}</div>
                      @endif

                      
                                
                      <form class="form-horizontal" method="POST" action="{{ route('update-profile') }}">
                                {{ csrf_field() }}
                            <div class="text-center">
                        
                                    <img class="profile-pic" src="{{ asset('assets/images/aj.jpg') }}" alt="" style="border-radius: 100px; width: 200px; height: 200px; align-items: center; padding: 10px;">
                                    
                                    <div class="ml-4 sm-12">
                                      <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput" name="image" style="position: absolute; visibility: hidden; width: 1px;height: 1px; opacity: 0;">
                                        @if ($errors->has('image'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('image') }}</strong>
                                                        </span>
                                                    @endif
                                      </label>&nbsp;
                                    </div>
                            </div>
              
                              <hr class="border-light m-0"> 
                            <div class="card p-3">
                              <div>
                                  <div class="row text-start">
                                          <!-- <div class="col-6">
                                            Username:
                                          </div>
                                        <div class="col-6">
                                            {{ Auth::user()->name }}
                                            
                                          </div>
                                          <div class="col-6">
                                          Email:
                                        </div>
                                        <div class="col-6">
                                           {{ Auth::user()->email }}
                                          
                                        </div> -->

                                        <div class="form-group">
                                                
                                                  <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="Enter New Name">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Enter New Email">
                                                </div>
                                      </div>

                                          <!-- <div id="Edit" class="collapse">
                                          
                                              <div class="card"> 
                                                
                                                <div class="form-group">
                                                
                                                  <input type="text" name="name" class="form-control" placeholder="Enter New Name">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" name="email" class="form-control" placeholder="Enter New Email">
                                                </div>
                                                                
                                                  
                                              
                                               </div>
                                        
                                    
                                          </div> -->
                                  </div>
                      
                                         
                                <div>
                                   

                                    
                                </div>
                            </div>

                                 
              
                        <div class="text-right mt-3 p-3">
                          <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                          <button type="button" class="btn btn-default">Cancel</button>
                        </div>
                  </form>
                
                                  
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
                  <input id="currentpwd" type="password" class="form-control" name="current-password" required>
                  <span class="eye" style="position: absolute;" onclick="current()">
                            <i id="hide1" style="display:none;" class="fa fa-eye"></i>
                            <i id="hide2" class="fa fa-eye-slash"></i>
                            
                          </span>
                  @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                </div>
    
                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                  <label class="form-label">New password</label>
                  <input id="newpwd" type="password" class="form-control" name="new-password" required>
                  <span class="eye" style="position: absolute;" onclick="newpass()">
                            <i id="hide3" style="display:none;" class="fa fa-eye"></i>
                            <i id="hide4" class="fa fa-eye-slash"></i>
                            
                          </span>
                  @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                </div>
    
                <div class="form-group">
                  <label class="form-label">Repeat new password</label>
                  <input id="repeatpwd" type="password" class="form-control" name="new-password_confirmation" required>
                  <span class="eye" style="position: absolute;" onclick="repeat()">
                            <i id="hide5" style="display:none;" class="fa fa-eye"></i>
                            <i id="hide6" class="fa fa-eye-slash"></i>
                            
                          </span>
                </div>
    
              </div>
                <div class="text-right mt-3 p-3">
                  <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                  <button type="button" class="btn btn-default">Cancel</button>
                </div>
                <!-- <script>

                            function togglepass(){
                              var input = document.getElementById("pwd");
                              var hide = document.getElementById("hide1");
                              var show = document.getElementById("hide2");

                              if(input.type === 'password'){
                                input.type = "text";
                                hide.style.display = "block";
                                show.style.display = "none";
                              }
                              else{
                                input.type = "password";
                                hide.style.display = "none";
                                show.style.display = "block";
                              }
                            }
                            </script> -->
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
                          @foreach ($logs as $row)  
                              <tr>
                                  <td data-title="ID">{{ $row->id }}</td>
                                  <td data-title="Name">{{ $row->name }}</td>
                                  <td data-title="Action">{{ $row->description }}</td>
                                  <td data-title="Date">{{ $row->date_time }}</td>
              
                              </tr>
                          @endforeach
                            
                          </tbody>
                      </table>
                      <h5>Page</h5>
                      {{ $logs->links() }}
          
                    </div>
                  </div>
          </div>
        </div>
           
      </div>
    </div>
    
    
</div>
@endsection