<?php

namespace App\Http\Controllers\Admin;

use App\Models\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectImages;

class ProjectImagesController extends Controller
{
    #PROJECTS GALLERY
    public function gallery($project_id){
        $project = Projects::find($project_id);
        if ($project) {
            # code...
            $images = ProjectImages::select('id','image')->where('project_id', $project_id)->get();
            # CHECK IF THERE ARE NO IMAGES FOR THIS PROJECT ID
            if (ProjectImages::where('project_id', $project_id)->exists()) {
                # code...
                return view('users.admin.project.gallery', compact('images'));
            } else {
                # code...
                return back()->with('msg','No images found');
            }
        } else {
            # code...
            return view('users.admin.project.gallery')->with('msg','No images found');
        }
    }
    #update specific image
    public function update(Request $request, $image_id){
        $image = ProjectImages::find($image_id);
        $this->validate($request, [
            'filenames' => 'nullable|mimes:jpeg,jpg,png,gif',
        ]);
        #image condition...
        #if data has image file...
        if ($request->hasfile('image')) {
            #store image file from data in to $file
            $img = $request->file('image');
            #then get extension of image file 
            #together with the timestamp uploaded 
            #and store it in $filename
            $imgname = time().'.'. $img->getClientOriginalExtension();
            #move the $filename in directory
            $img->move('uploads/project_images/', $imgname);
            #store filename as data for image field in db 
            #then in to $category
            $image->image = $imgname;
        }

        $image->posted_by = Auth::user()->id;
        $image->update();
        return back()->with('msg','Successfully Updated Image');
    }

    #delete specific image
    public function destroy($image_id){
        $image = ProjectImages::findOrFail($image_id);
        if ($image) {
            # code...
            #write condiiton to delete image
            $image->delete();    
            return back()->with('msg','Successfully Deleted image from Gallery.');
        } else {
            return redirect('admin/projects')->with('msg','No Gallery found for this Project.');
        }
    }

    // public function create()
    // {
    //     $projects = Projects::where('status', '1')->get();
    //     return view('users.admin.project.images' ,compact('projects'));
    // }

    // public function store(Request $request)
    // {        
    //     $this->validate($request, [
    //         'project_id' => 'required|integer',
    //         'filenames' => 'required',
    //         'filenames.*' => 'image|mimes:jpeg,jpg,png,gif',
    //     ]);
    //     $image = array();
    //     if ($files = $request->file('filenames')) {
    //         # code...
    //         foreach ($files as $file) {
    //             # code...
    //             $image_name = time().rand(1,50).'.'.$file->getClientOriginalExtension();
    //             $file->move('uploads/project_images/', $image_name);
    //             $image[] = $image_name; 
    //         }
    //     }

    //     ProjectImages::insert([
    //         'posted_by' => Auth::user()->id,
    //         'project_id' => $request->project_id,
    //         'filenames' => implode(',',$image),
    //         'created_at' => Carbon::now(),
    //     ]);
    //     return redirect('admin/projects')->with('msg','Images are successfully uploaded');
    // }
}
