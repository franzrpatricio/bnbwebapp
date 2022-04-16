<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UserFormRequest;

class UsersController extends Controller
{
    public function index(){
        #ONLY FOR ADMINISTRATOR, NOT STAFF
        if(Auth::check()){
            if (Auth::user()->role_as=='0' ) {
                #role_as == 1 = staff
                #role_as == 0 = admin
                # code... 
                $users = User::all();
                return view('users.admin.users.index', compact('users'));
            }else {
                # code...
                return redirect('/home')->with('status','Access Denied! Not an Admin.');
            }
        }else {
            #if not authenticated
            return redirect('/login')->with('status','Log In First!');
        }
    }
    public function create(){
        #VIEW category create form
        return view('users.admin.user.create');
    }
    public function store(UserFormRequest $request){
        #BACKEND PART...CONTROLLER COMMUNICATING WITH MODEL
        #CategoryFormRequest=FormValidation before inserting data...
        $data = $request->validated();
        $users = new User();
        $users->type = $data['name'];
        $users->cost = $data['email'];
        $users->floor = $data[''];

        $users->status = $request->status == true ? '1':'0';
        #get id of authenticated user who posted the category
        $users->created_by = Auth::user()->id;
        #after everything....
        #save the category
        $users->save();
        #redirect with message;see in index.blade.php
        return redirect('admin/users')->with('msg','Successfully Added New House Plan. Thanks!');
    }
    #UPDATE specific category
    public function update(UserFormRequest $request, $users_id){
        $data = $request->validated();

        $users = User::find($users_id);
        $users->type = $data['type'];
        $users->cost = $data['cost'];
        $users->floor = $data['floor'];
        $users->wall = $data['wall'];
        $users->window = $data['window'];
        $users->ceiling = $data['ceiling'];
       
        $users->status = $request->status == true ? '1':'0';
        #get id of authenticated user who posted the category
        $users->created_by = Auth::user()->id;
        #after everything....
        #save the category
        $users->update();
        #redirect with message;see in index.blade.php
        return redirect('admin/users')->with('msg','Successfully Updated House Plan. Thanks! :D');
    }
}
