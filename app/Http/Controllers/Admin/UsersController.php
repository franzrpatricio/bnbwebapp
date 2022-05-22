<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\UserFormRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsersController extends Controller
{
    use RegistersUsers;
    public function index(Request $request){
        if(Auth::check()){
            if (Auth::user()->role_as=='1') {
                #role_as == 0 = staff
                #role_as == 1 = admin
                # code... 
                // $users = User::paginate(5);
                if ($request->has('trashed')) {
                    # code...
                    $users = User::onlyTrashed()->paginate(3);
                }else {
                    $users = User::paginate(3);
                }

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
        return view('users.admin.users.create');
    }
    public function store(UserFormRequest $request){
        
        #BACKEND PART...CONTROLLER COMMUNICATING WITH MODEL
        #UserFormRequest=FormValidation before inserting data...
        $data = $request->validated();
        $users = new User();
        $users->name = $data['name'];
        $users->email = $data['email'];
        $users->password = Hash::make($data['password']);
        $users->role_as = $request->role_as == true ? '1':'0';
        $users->status = $request->status == true ? '0':'1';

        #save the category
        $users->save();

                //insert to activity logs
                $user_id = Auth::user()->id;
                $name = Auth::user()->name;
                $role_as = Auth::user()->role_as;
                $description = "Created User";
                $date_time = Carbon::now();

            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'created_at'     => $date_time,
                'role_as'       => $role_as
            ];
                    
                DB::table('user_activity_logs')->insert($data);

        #redirect with message;see in index.blade.php
        return redirect('admin/users')->with('msg','Successfully Added New User. Thanks!');
    }
    #VIEW specific project
    public function edit($users_id){
        $user = User::find($users_id);
        return view('users.admin.users.edit', compact('user'));
    }
    #UPDATE specific category
    public function update(Request $request, $users_id){
        

        $user = User::find($users_id);
       
        if ($user) {
            # code...
            $user->role_as = $request->role_as == true ? '0':'1'; #admin=1,staff=0
            $user->status = $request->status == true ? '0':'1'; #active=1, inactive=0
            // $user->updated_at = $request->touch();
            #get id of authenticated user who posted the category
            // $user->created_by = Auth::user()->id;
            #after everything....
            #save the category
            $user->update();

            //insert to activity logs
            $user_id = Auth::user()->id;
            $name = Auth::user()->name;
            $role_as = Auth::user()->role_as;
            $description = "Update User's Info";
            $date_time = Carbon::now();

        $data = [
            'user_id'       => $user_id,
            'name'          => $name,
            'description'   => $description,
            'created_at'     => $date_time,
            'role_as'       => $role_as
        ];
            
            DB::table('user_activity_logs')->insert($data);
        
            #redirect with message;see in index.blade.php
            return redirect('admin/users')->with('msg','Successfully Updated a User! :D');
        }else {
            # code...
            return redirect('admin/users')->with('msg','No user found.');
        }
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
    #RESTORE SINGLE
    public function restore($users_id){
        User::withTrashed()->find($users_id)->restore();
        return redirect('admin/users')->with('msg','User Successfully Restored');
    }

    #RESTORE ALL
    public function restore_all(){
        User::onlyTrashed()->restore();
        return redirect('admin/users')->with('msg','Successfully Restored Users');
    }

    #SEARCH
    public function search(Request $request){
        $find_this = $request->get('query');
        $users = User::where('id', 'LIKE', '%'.$find_this.'%')
            ->orWhere('name', 'LIKE', '%'.$find_this.'%')
            ->orWhere('email', 'LIKE', '%'.$find_this.'%')
            // ->orWhere('role_as', 'LIKE', '%'.$find_this.'%')
            // ->orWhere('status', 'LIKE', '%'.$find_this.'%')
            ->paginate(2);
        if (count ($users) > 0) {
            return view('users.admin.users.index', compact('users'));
        } else {
            # code...
            return view ('users.admin.users.index', compact('users'))->with( 'No Users Found. 🥺' );
        }
    }
}