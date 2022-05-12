<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Logs;
use App\Http\Requests\Admin\UserFormRequest;
use Carbon\Carbon;
use Hash;
use Auth;
use DB;

class ProfileController extends Controller
{
    // public function change_password(){
    //     return view('users.admin.profile.change_password');

    // }

    // public function update_password(Request $request){
    //     return view('users.admin.profile.update_password');
    // }

    // public function profile_settings(Request $request){
    //     return view('users.admin.profile.profile_settings');
    // }

    public function showChangePasswordGet() {
        return view('auth.passwords.change-password');
    public function profile(){
        $user = User::find(Auth::user()->id);
        $logs = Logs::orderBy('id','desc')->paginate(10);
        

        return view('users.profilesettings', compact(['user','logs']));
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
        $name = Auth::user()->name;
                $description = "Changed Password";
                $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

            $data = [

                'name'          => $name,
                'description'   => $description,
                'date_time'     => $date_time,
            ];
                
                DB::table('user_activity_logs')->insert($data);

        return redirect()->back()->with("success","Password successfully changed!");
    }
    

    public function update(UserFormRequest $request){
        $data = $request->validated();

        $user = Auth::user();
        $user->name = $data['name'];
        $user->email = $data['email'];
        
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
         
                #insert to activity logs
                $name = Auth::user()->name;
                $description = "Updated Profile";
                $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

            $data = [

                'name'          => $name,
                'description'   => $description,
                'date_time'     => $date_time,
            ];
                
                DB::table('user_activity_logs')->insert($data);
                
        #redirect with message;see in profilesettings.blade.php
         return redirect('admin/profile')->with('msg','Successfully Updated Profile. Thanks! :D');
    }




}
