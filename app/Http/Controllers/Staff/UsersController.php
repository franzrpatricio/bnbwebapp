<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UserFormRequest;

class UsersController extends Controller
{
    #UPDATE specific category
    public function update(UserFormRequest $request, $users_id){
        $data = $request->validated();

        $users = User::find($users_id);
        $users->type = $data['type'];
        $users->cost = $data['cost'];
       
        $users->status = $request->status == true ? '1':'0';
        #get id of authenticated user who posted the category
        $users->created_by = Auth::user()->id;
        #after everything....
        #save the category
        $users->update();
        #redirect with message;see in index.blade.php
        return redirect('staff/profile')->with('msg','Successfully Updated House Plan. Thanks! :D');
    }
}
