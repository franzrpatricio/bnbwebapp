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
           
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">
                      @if (session('msg'))
                      <div class="alert alert-success">{{ session('msg') }}</div>
                      @endif

                      
                                
                      <form class="form-horizontal" method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="text-center">
                              @if (Auth::user()->image === "def.png")
                              <img class="profile-pic" src="{{ asset('assets/images/'.Auth::user()->image) }}" alt="" style="border-radius: 100px; width: 200px; height: 200px; align-items: center; padding: 10px;">
                              @else 
                              <img class="profile-pic" src="{{ asset('uploads/users/'.Auth::user()->image) }}" alt="" style="border-radius: 100px; width: 200px; height: 200px; align-items: center; padding: 10px;">
                              @endif
                              
                              
                              <div class="ml-4 sm-12">
                                <label class="btn btn-outline-primary">
                                  Upload new photo
                                  <input type="file" 
                                    class="account-settings-fileinput" 
                                    value="{{ Auth::user()->image }}" 
                                    name="image" style="position: absolute; visibility: hidden; width: 1px;height: 1px; opacity: 0;">
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

                  
          </div>
        </div>
           
      </div>
    </div>
    
    
</div>
@endsection