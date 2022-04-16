<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectFormRequest;
use App\Models\HousePlan;
use App\Models\Projects;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    #VIEW
    public function index(ProjectFormRequest $request){
        $projects = Projects::all();
        if ($request->has('view_deleted')) {
            # code...
            $projects = Projects::onlyTrashed()->get();
        }
        return view('users.admin.project.index', compact('projects'));
    }
    #CREATE
    public function create(){
        #FORM
        #1 means visible
        #show all categories and houseplans with status == 1
        $category = Category::where('status', '1')->get(); 
        $houseplan = HousePlan::where('status', '1')->get();
        return view('users.admin.project.create', compact('category','houseplan'));
        #if you want to get multiple conditions in where(), use array
        #$category = Category::where(['status', '1'],[])->get();
    }
    public function store(ProjectFormRequest $request){
        #SAVING
        $data = $request->validated();
        $project = new Projects;
        $project->category_id = $data['category_id'];
        $project->houseplan_id = $data['houseplan_id'];
        $project->name = $data['name'];

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
            $file->move('uploads/project/', $filename);
            #store filename as data for image field in db 
            #then in to $category
            $project->image = $filename;
        }

        $project->cost = $data['cost'];
        $project->slug = $data['slug'];
        $project->description = $data['description'];
        $project->meta_title = $data['meta_title'];
        $project->meta_description = $data['meta_description'];
        $project->meta_keyword = $data['meta_keyword'];
        
        $project->status = $request->status ==true ? '1':'0';
        $project->posted_by = Auth::user()->id;
        $project->save();
        return redirect('admin/projects')->with('msg','Successfully Created Project');
    }
    #VIEW specific project
    public function edit($project_id){
        $category = Category::where('status', '1')->get(); 
        $houseplan = HousePlan::where('status', '1')->get();
        $project = Projects::find($project_id);
        return view('users.admin.project.edit', compact('project', 'category','houseplan'));
    }
    #UPDATE specific project
    public function update(ProjectFormRequest $request, $project_id){
        $data = $request->validated();
        $project = Projects::find($project_id);
        $project->category_id = $data['category_id'];
        $project->houseplan_id = $data['houseplan_id'];
        $project->name = $data['name'];

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
            $file->move('uploads/project/', $filename);
            #store filename as data for image field in db 
            #then in to $category
            $project->image = $filename;
        }

        $project->cost = $data['cost'];
        $project->slug = $data['slug'];
        $project->description = $data['description'];
        $project->meta_title = $data['meta_title'];
        $project->meta_description = $data['meta_description'];
        $project->meta_keyword = $data['meta_keyword'];
        
        $project->status = $request->status ==true ? '1':'0';
        $project->posted_by = Auth::user()->id;
        $project->update();
        return redirect('admin/projects')->with('msg','Successfully Updated Project');
    }
    #DELETE
    public function destroy($project_id){
        $project = Projects::find($project_id);
        if ($project) {
            # code...
            #then delete all data based from id
            $project->delete();
            return redirect('admin/projects')->with('msg','Successfully Deleted Project');
        }else {
            return redirect('admin/projects')->with('msg','No Project ID found');
        }
    }

    #RESTORE SINGLE
    public function restore($project_id){
        Projects::withTrashed()->find($project_id)->restore();
        return back()->with('msg','Post Successfully Restored');
    }

    #RESTORE ALL
    public function restore_all(){
        Projects::onlyTrashed()->restore();
        return back()->with('msg', 'All Projects Successfuly Restored');
    }
}
