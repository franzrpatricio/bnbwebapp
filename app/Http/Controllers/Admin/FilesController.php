<?php

namespace App\Http\Controllers\Admin;

use App\Models\Files;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\FilesFormRequest;
use BotMan\BotMan\Messages\Attachments\File;

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
            
            $image = DB::table('files')->where('project_id', $project->id)->first();

            // $image = DB::table('files')->select('filenames')->where('files.project_id', '=', $project->id)->value('id')->get();

            $images = explode(',',$image->filenames);
            return view('users.admin.project.sample', compact('project','images'));
        } else {
            # code...
            return view('users.admin.project.sample')->with('msg','No images found');
        }
    }

    public function create()
    {
        $projects = Projects::where('status', '0')->get();
        return view('users.admin.project.images' ,compact('projects'));
    }

    public function store(Request $request)
    {        
        $this->validate($request, [
            'project_id' => 'required|integer',
            'filenames' => 'required',
            'filenames.*' => 'image|mimes:jpeg,jpg,png,gif',
        ]);
        // // dd($request->all());
        // $files = [];
        // if($request->hasfile('filenames'))
        // {
        //     foreach($request->file('filenames') as $file)
        //     {
        //         $name = time().rand(1,50).'.'.$file->extension();
        //         $file->move('uploads/project_images/', $name);  
        //         $files[] = $name;  
        //     }
        // }
        // $file= new Files();
        // $file->posted_by = Auth::user()->id;
        // $file->project_id = $request->project_id;
        // $file->filenames = implode(',',$files);
        // $file->save();
        // return redirect('admin/projects')->with('msg','Images are successfully uploaded');

        $image = array();
        if ($files = $request->file('filenames')) {
            # code...
            foreach ($files as $file) {
                # code...
                // $image_name = md5(rand(1,100));
                // $ext = strtolower($file->getClientOriginalExtension());
                // $imageFullname = $image_name.'.'.$ext;

                $image_name = time().rand(1,50).'.'.$file->getClientOriginalExtension();

                // $uploadPath = 'public/uploads/projects_image';
                // $imageUrl = $uploadPath.$imageFullname;
                $file->move('uploads/project_images/', $image_name);
                $image[] = $image_name; 
            }
        }

        Files::insert([
            'posted_by' => Auth::user()->id,
            'project_id' => $request->project_id,
            'filenames' => implode(',',$image),
        ]);
        return redirect('admin/projects')->with('msg','Images are successfully uploaded');
    }
}
