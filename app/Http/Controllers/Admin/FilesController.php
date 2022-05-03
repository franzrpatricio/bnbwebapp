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
use BotMan\BotMan\Messages\Attachments\File;
use App\Http\Requests\Admin\FilesFormRequest;

class FilesController extends Controller
{
    #PROJECTS GALLERY
    public function gallery($project_id){
        $project = Projects::find($project_id);
        if ($project) {
            # code...
            // $image = Files::select('filenames')->where('project_id',$project)->get();
            // foreach ($files as $file) {
            //     # code...
            //     $images = explode(',', $file);
            // }
            // $files = explode(',', $file->filenames);
            
            // $image = DB::table('files')->where('project_id', $project->id)->first();
            // $image = DB::table('files')->select('filenames')->where('files.project_id', '=', $project->id)->value('id')->get();
            $image = Files::select('id','filenames')->where('project_id', $project_id)->first();
            # CHECK IF THERE ARE NO IMAGES FOR THIS PROJECT ID
            if ($image == NULL) {
                # code...
                return back()->with('msg','No images found');
            } else {
                # code...
                // $file = $image->id;
                $images = explode(',',$image->filenames);
                return view('users.admin.project.gallery', compact('project','images', 'image'));
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

    public function destroy($files_id){
        $files = Files::findOrFail($files_id);
        if ($files) {
            # code...
            // $files = explode(',',$files->filenames);
            // foreach ($files as $file) {
            //     if (file_exists('public/uploads/project_images' . json_decode($file, true))) {
            //         Storage::disk('public')->delete('uploads/project_images' . $file['filenames']);
            //     }
            // }
            $files->delete();
            return redirect('admin/projects')->with('msg','Gallery for this Project Successfully Deleted.');
        } else {
            return redirect('admin/projects')->with('msg','No Gallery found for this Project.');
        }
    }
}
