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
        $users = User::all();
        return view('users.admin.users.index', compact('users'));
    }
    public function create(){
        #VIEW category create form
        return view('users.admin.users.create');
    }
    public function store(Request $request){
        #BACKEND PART...CONTROLLER COMMUNICATING WITH MODEL
        #CategoryFormRequest=FormValidation before inserting data...
        // $data = $request->validated();
        // $users = new User();
        // $users->name = $data['name'];
        // $users->email = $data['email'];
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('STAFFpassword123')
            #set this default password for every staff
            #then they change it later
        ]);
        #get id of authenticated user who posted
        // $users->created_by = Auth::user()->id;
        #after everything....
        #save the category
        // $users->save();
        #redirect with message;see in index.blade.php
        return redirect('admin/users')->with('msg','Successfully Added New Staff. Thanks!');
    }
    #VIEW specific project
    public function edit($users_id){
        $user = User::find($users_id);
        return view('users.admin.users.edit', compact('user'));
    }
    #UPDATE specific category
    public function update(UserFormRequest $request, $users_id){
        $data = $request->validated();

        $users = User::find($users_id);
        $users->name = $data['name'];
        $users->email = $data['email'];
        $users->password = $data['password'];
        #PASSWORD NEEDS TO ENCRYPT
       
        $users->status = $request->status == true ? '1':'0';
        #get id of authenticated user who posted the category
        $users->created_by = Auth::user()->id;
        #after everything....
        #save the category
        $users->update();
        #redirect with message;see in index.blade.php
        return redirect('admin/users')->with('msg','Successfully Updated a User! :D');
    }
    #DELETE
    public function destroy($users_id){
        $user = User::find($users_id);
        if ($user) {
            # code...
            #then delete all data based from id
            $user->delete();
            return redirect('admin/users')->with('msg','Successfully Deleted User');
        }else {
            return redirect('admin/users')->with('msg','No User ID found');
        }
    }
}
