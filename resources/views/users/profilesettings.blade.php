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
    <div class="text-center">
    
                <img class="profile-pic" src="../images/aj.jpg" alt="" style="border-radius: 100px; width: 200px; height: 200px; align-items: center; padding: 10px;">
    
                <div class="ml-4 sm-12">
                  <label class="btn btn-outline-primary">
                    Upload new photo
                    <input type="file" class="account-settings-fileinput" style="position: absolute; visibility: hidden; width: 1px;height: 1px; opacity: 0;">
                  </label> &nbsp;
              </div>
    </div>
              
              <hr class="border-light m-0">
    
              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control mb-1" value="Enter your Username">
                </div>
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" value="Enter your Name">
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail</label>
                  <input type="text" class="form-control mb-1" value="Enter your Email">
                  
                </div>
                
              </div>
    
            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">
    
                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" class="form-control">
                </div>
    
                <div class="form-group">
                  <label class="form-label">New password</label>
                  <input type="password" class="form-control">
                </div>
    
                <div class="form-group">
                  <label class="form-label">Repeat new password</label>
                  <input type="password" class="form-control">
                </div>
    
              </div>
            </div>
           
    
    <div class="text-right mt-3 p-3">
      <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
      <button type="button" class="btn btn-default">Cancel</button>
    </div>
    
    </div>
@endsection