<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Projects;
use App\Models\VirtualTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VirtualTourController extends Controller
{
    //
    #PROJECTS GALLERY
    public function virtualTour($project_id){
        $project = Projects::find($project_id);
        if ($project) {
            # code...
            $videos = VirtualTour::select('id','video')->where('project_id', $project_id)->get();
            # CHECK IF THERE ARE NO IMAGES FOR THIS PROJECT ID
            if (VirtualTour::where('project_id', $project_id)->exists()) {
                # code...
                return view('users.admin.project.virtualTour', compact('videos'));
            } else {
                # code...
                return back()->with('msg','No Videos found');
            }
        } else {
            # code...
            return view('users.admin.project.virtualTour')->with('msg','No Videos found');
        }
    }
    #update specific image
    public function update(Request $request, $video_id){
        $video = VirtualTour::find($video_id);
        $this->validate($request, [
            'vtour' => 'nullable|mimes:mp4',
        ]);
        #image condition...
        #if data has image file...
        if ($request->hasfile('vtour')) {
            #store image file from data in to $file
            $vid = $request->file('vtour');
            #then get extension of image file 
            #together with the timestamp uploaded 
            #and store it in $filename
            $vidname = time().'.'. $vid->getClientOriginalExtension();
            #move the $filename in directory
            $vid->move('uploads/virtual_tour/', $vidname);
            #store filename as data for image field in db 
            #then in to $category
            $video->video = $vidname;
        }

        $video->posted_by = Auth::user()->id;
        $video->update();

        //insert to activity logs
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $role_as = Auth::user()->role_as;
        $description = "Successfully Updated Video $video_id";
        $date_time = Carbon::now();

        $data = [
            'user_id'       => $user_id,
            'name'          => $name,
            'description'   => $description,
            'created_at'     => $date_time,
            'role_as'       => $role_as
        ];
        DB::table('user_activity_logs')->insert($data);
        return back()->with('msg','Successfully Updated Video');
    }

    #delete specific image
    public function destroy($video_id){
        $video = VirtualTour::findOrFail($video_id);
        if ($video) {
            # code...
            #write condiiton to delete image
            $video->delete();    

            //insert to activity logs
            $user_id = Auth::user()->id;
            $name = Auth::user()->name;
            $role_as = Auth::user()->role_as;
            $description = "Successfully Deleted Video $video_id";
            $date_time = Carbon::now();

            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'created_at'     => $date_time,
                'role_as'       => $role_as
            ];
            DB::table('user_activity_logs')->insert($data);
            return back()->with('msg','Successfully Deleted Video from Virtual Tour.');
        } else {
            return redirect('admin/projects')->with('msg','No Videos found for this Project Virtual Tour.');
        }
    }
}
