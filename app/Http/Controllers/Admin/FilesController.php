<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FilesFormRequest;
use App\Models\Files;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
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
            'filenames.*' => 'image',
        ]);

        $files = [];
        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $file)
            {
                $name = time().rand(1,50).'.'.$file->extension();
                $file->move('uploads/project_images/', $name);  
                $files[] = $name;  
            }
        }
        // $file = Projects::find($project_id);

        $file= new Files();
        $file->posted_by = Auth::user()->id;
        $file->project_id = $request->project_id;
        $file->filenames = $files;
        $file->save();
        return redirect('admin/projects')->with('msg','Images are successfully uploaded');

        // $data = $request->validated();
        // $file = new Files;
        // $file->project_id = $data['project_id'];

        // if($request->hasFile('images'))
        // {
        //     $allowedfileExtension=['pdf','jpeg','jpg','png','docx'];
        //     $files = $request->file('images');
        
        //     foreach($files as $file){
        //         $filename = $file->getClientOriginalName();
        //         $extension = $file->getClientOriginalExtension();
        //         $check=in_array($extension,$allowedfileExtension);
        //         //dd($check);
        //         if($check){
        //             // $project= Projects::create($request->all());
        //             foreach ($request->photos as $photo) {
        //             $filename = $photo->store('images');
        //             Files::create([
        //                 'project_id' => $project->id,
        //                 'filename' => $filename
        //             ]);
        //         }
        //         echo "Upload Successfully";
        //         } else{
        //             echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
        //         }
        //     }
        // }
    }
}
