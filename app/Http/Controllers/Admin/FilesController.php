<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Files;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\FilesFormRequest;

class FilesController extends Controller
{
    #PROJECTS GALLERY
    public function gallery($project_id){
        $project = Projects::find($project_id);
        if ($project) {
            # code...
            $image = Files::select('id','filenames')->where('project_id', $project_id)->get();
            # CHECK IF THERE ARE NO IMAGES FOR THIS PROJECT ID
            if ($image == NULL) {
                # code...
                return back()->with('msg','No images found');
            } else {
                # code...
                return view('users.admin.project.gallery', compact('image'));
            }
        } else {
            # code...
            return view('users.admin.project.gallery')->with('msg','No images found');
        }
    }

    public function create()
    {
        $projects = Projects::where('status', '1')->get();
        return view('users.admin.project.images' ,compact('projects'));
    }

    public function store(Request $request)
    {        
        $this->validate($request, [
            'project_id' => 'required|integer',
            'filenames' => 'required',
            'filenames.*' => 'image|mimes:jpeg,jpg,png,gif',
        ]);
        $image = array();
        if ($files = $request->file('filenames')) {
            # code...
            foreach ($files as $file) {
                # code...
                $image_name = time().rand(1,50).'.'.$file->getClientOriginalExtension();
                $file->move('uploads/project_images/', $image_name);
                $image[] = $image_name; 
            }
        }

        Files::insert([
            'posted_by' => Auth::user()->id,
            'project_id' => $request->project_id,
            'filenames' => implode(',',$image),
            'created_at' => Carbon::now(),
        ]);
        return redirect('admin/projects')->with('msg','Images are successfully uploaded');
    }

    public function update(Request $request, $files_id){
        $files = Files::find($files_id);
        $this->validate($request, [
            'filenames' => 'nullable|mimes:jpeg,jpg,png,gif',
        ]);
        #image condition...
        #if data has image file...
        if ($request->hasfile('image')) {
            #store image file from data in to $file
            $file = $request->file('image');
            #then get extension of image file 
            #together with the timestamp uploaded 
            #and store it in $filename
            $filename = time().'.'. $file->getClientOriginalExtension();
            #move the $filename in directory
            $file->move('uploads/project_images/', $filename);
            #store filename as data for image field in db 
            #then in to $category
            $files->filenames = $filename;
        }

        $files->posted_by = Auth::user()->id;
        $files->update();
        return back()->with('msg','Successfully Updated Image');
    }

    public function destroy($files_id){
        $files = Files::findOrFail($files_id);
        if ($files) {
            # code...
            #write condiiton to delete image
            $files->delete();    
            return redirect('admin/projects')->with('msg','Successfully Deleted image from Gallery.');
        } else {
            return redirect('admin/projects')->with('msg','No Gallery found for this Project.');
        }
    }
}
