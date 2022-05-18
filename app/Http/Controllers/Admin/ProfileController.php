<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use App\Models\Logs;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\UserProfileFormRequest;

class ProfileController extends Controller
{
    
    public function profile(){
        $user = User::find(Auth::user()->id);
    
        return view('users.profilesettings', compact('user'));
    }
    public function logs(){
        $user = Auth::user();
        // $logs = Logs::orderBy('id','desc')->paginate(10);
       
        // return view('users.logs', compact('logs'));
        if ($user->role_as == '0')
        {
            $logs = Logs::where('user_id',$user->id)->paginate(10);
            return view('users.logs', compact('logs'));
        }
        else
        {
            $logs = Logs::paginate(10);
            return view('users.logs', compact('logs'));
        }
    }



    public function showChangePasswordGet() {
        return view('users.profilesettings');
    }

    public function changePasswordPost(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        } 

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        
        //insert to activity logs
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $role_as = Auth::user()->role_as;
                $description = "Changed Password";
                $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'date_time'     => $date_time,
                'role_as'       => $role_as
            ];
                
                DB::table('user_activity_logs')->insert($data);

        return redirect()->back()->with("success","Password successfully changed!");
    }
    

    public function update(Request $request){
       $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|string|max:40',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        #image condition...
        #if data has image file...
        if ($request->hasfile('image')) {
            #delete first the current image
            #before inserting new image
            #check the path if it is right
            $destination = 'uploads/users/'.$user->image;
            if (File::exists($destination)) {
                # code...
                #if the path exists, delete it
                File::delete($destination);
            }

            #store image file from data in to $file
            $file = $request->file('image');
            #then get extension of image file 
            #together with the timestamp uploaded 
            #and store it in $filename
            $filename = time().'.'. $file->getClientOriginalExtension();
            #move the $filename in directory
            $file->move('uploads/users/', $filename);
            #store filename as data for image field in db 
            #then in to $category
            $user->image = $filename;
        }

         #save the category
         $user->update();
         
                //insert to activity logs
                $user_id = Auth::user()->id;
                $name = Auth::user()->name;
                $role_as = Auth::user()->role_as;
                $description = "Update Own Profile";
                $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'date_time'     => $date_time,
                'role_as'       => $role_as
            ];
                
                DB::table('user_activity_logs')->insert($data);
                
        #redirect with message;see in profilesettings.blade.php
         return redirect('admin/profile')->with('msg','Successfully Updated Profile. Thanks! :D');
    }




}
