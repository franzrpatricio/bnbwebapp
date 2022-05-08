<?php

namespace App\Http\Controllers\Client;

use App\Models\Files;
use App\Models\Designs;
use App\Models\Category;
use App\Models\Projects;
use App\Models\Amenities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ClientController extends Controller
{
    //
    public function index(){
        return view('client.index');
    }
    public function portfolio(){
        $category = Category::where('feature','1')->where('status','1')->get();
        return view('client.portfolio', compact('category'));
    }
    #projects from specialization
    public function specProject($category_id, $category_slug){
        $projects = Projects::where('category_id', $category_id)->where('status','1')->get();
        if (Projects::where('category_id', $category_id)->where('status','1')->exists()) {
            # code...
            return view('client.specialization',compact('projects'));
        } else {
            # code...
            return view ('client.specialization',['msg'=> 'No projects for this Category.🥺']);
        }
    }
    public function profile(){
        return view('client.profile');
    }
    public function projects(Request $request){
        $categories = Category::where('status','1')->get();
        $projects = Projects::where('status','1')->paginate(4);
        $amenities = Amenities::all();
        $architectural = Designs::all();
        
        $find_this = $request->get('query');
        if ($find_this) {
            # code...
            $projects = Projects::where('name', 'LIKE', '%'.$find_this.'%')->get();
            if (count ($projects) > 0) {
                return view('client.projects', compact('categories','projects','amenities','architectural'));
            } else {
                # code...
                return view ('client.projects',['msg'=> 'Sorry but '.$find_this.' not Found.🥺'],compact('categories','projects','amenities','architectural'));
            }
        }
        return view('client.projects', compact('categories','projects','amenities','architectural'));
    }
    #specific project from projects
    public function project($project_id,$project_slug){
        $project = Projects::find($project_id);
        if ($project) {
            # code...
            $images = Files::select('id','filenames')->where('project_id', $project_id)->get();
            # CHECK IF THERE ARE NO IMAGES FOR THIS PROJECT ID
            if (Files::where('project_id', $project_id)->exists()) {
                # code...
                return view('client.project', compact('project','images'));
            } else {
                # code...
                return view('client.project',['msg'=>'No images found'],compact('project','images'));
            }
        } else {
            # code...
            return view('client.project',['msg'=>'No images found']);
        }
    }
    public function contact(){
        return view('client.contact');
    }
}
