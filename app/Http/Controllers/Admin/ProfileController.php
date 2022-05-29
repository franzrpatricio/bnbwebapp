<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Logs;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\UserProfileFormRequest;

class ProfileController extends Controller
{
    
    public function profile(){
        $user = User::find(Auth::user()->id);
    
        return view('users.profilesettings', compact('user'));
    }
    public function logs(){
        if (Auth::user()->role_as == '0')
        {
            $logs = Logs::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(5);
            return view('users.logs', compact('logs'));
        }
        else
        {
            $logs = Logs::orderBy('created_at','DESC')->paginate(5);
            return view('users.logs', compact('logs'));
        }
    }
    #SEARCH
    public function search(Request $request){
        $find_this = $request->get('query');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        $time = $request->get('time');
        if ($find_this) {
            # code...
            $logs = Logs::where('name', 'LIKE', '%'.$find_this.'%')
                ->orWhere('description', 'LIKE', '%'.$find_this.'%')
                ->orWhere('created_at', 'LIKE', '%'.$find_this.'%')
                ->paginate(5);
            if (count ($logs) > 0) {
                return view('users.logs',['msg'=>'Showing '.$logs->count().' log results in "'.$find_this.'".'],compact('logs'));
            } else {
                # code...
                return view ('users.logs',['msg'=>'No '.$find_this.' User is Found.🥺'], compact('logs'));
            }
        } elseif ($time) {
            # code...
            $logs = Logs::where('created_at', 'LIKE', '%'.$time.'%')
                ->paginate(5);
            if (count ($logs) > 0) {
                return view('users.logs',['msg'=>'Showing '.$logs->count().' log results during '.$time.'.'],compact('logs'));
            } else {
                # code...
                return view ('users.logs',['msg'=>'No logs during this '.$time.'.🥺'], compact('logs'));
            }
        }
        elseif ($start_date && $end_date) {
            $logs = Logs::whereBetween('created_at', [$start_date, Carbon::parse($end_date)->endOfDay()])
            ->paginate(100);
            if (count ($logs) > 0) {
                return view('users.logs', ['msg'=>'Showing '.$logs->count().' log results during '.$start_date.' and '.$end_date.'.'],compact('logs'));
            } else {
                # code...
                return view ('users.logs',['msg'=>'No logs found during'.$start_date.' and '.$end_date.' .🥺'], compact('logs'));
            }
        }
    }
    public function generateAuditTrailPDF()
    {
        if (Auth::user()->role_as == '0')
        {
            $logs = Logs::where('user_id',Auth::user()->id)->get();
            $pdf = PDF::loadView('users.logsTable', array('logs'=> $logs));
            return $pdf->download('BanaAndBana-AuditTrail.pdf');
        }
        else
        {
            $logs = Logs::all();
            $pdf = PDF::loadView('users.logsTable', array('logs'=> $logs));
            return $pdf->download('BanaAndBana-AuditTrail.pdf');
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
        $description = "Password successfully changed";
        $date_time = Carbon::now();

        $data = [
            'user_id'       => $user_id,
            'name'          => $name,
            'description'   => $description,
            'created_at'     => $date_time,
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

        // $user = Auth::user();
        $user = User::find(Auth::user()->id);
        if ($user) {
            # code...
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
            $description = "Successfully Updated Profile";
            $date_time = Carbon::now();
    
            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'created_at'     => $date_time,
                'role_as'       => $role_as
            ];
                
            DB::table('user_activity_logs')->insert($data);
            #redirect with message;see in profilesettings.blade.php
            return redirect('admin/profile')->with('msg','Successfully Updated Profile. Thanks! :D');
        }
    }
}
