<?php

namespace App\Http\Controllers\Client;

use App\Models\Designs;
use App\Models\Category;
use App\Models\Projects;
use App\Models\Amenities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    //
    public function index(){
        return view('client.index');
    }
    public function portfolio(){
        $category = Category::where('navbar_status','1')->where('status','1')->get();
        return view('client.portfolio', compact('category'));
    }
    #specific project from specialization
    public function specProject($category_id){
        $projects = Projects::where('category_id', $category_id)->where('status','1')->get();
        return view('client.specialization',compact('projects'));
    }
    public function profile(){
        return view('client.profile');
    }
    #specific project from projects
    public function project(){
        return view('client.sampleproject');
    }
    public function projects(Request $request){
        $categories = Category::where('status','1')->get();
        $projects = Projects::where('status','1')->get();
        $amenities = Amenities::all();
        $architectural = Designs::all();
        
        $find_this = $request->get('query');
        if ($find_this) {
            # code...
            $projects = Projects::where('name', 'LIKE', '%'.$find_this.'%')->get();
            if (count ($projects) > 0) {
                return view('client.project', compact('categories','projects','amenities','architectural'));
            } else {
                # code...
                return view ('client.project',['msg'=> 'Sorry but '.$find_this.' not Found.🥺'],compact('categories','projects','amenities','architectural'));
            }
        }
        return view('client.project', compact('categories','projects','amenities','architectural'));
    }
    public function contact(){
        return view('client.contact');
    }
}
