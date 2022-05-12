<?php

namespace App\Http\Controllers\Client;

use App\Events\ClientSubscribed;
use App\Models\Files;
use App\Models\Designs;
use App\Models\Category;
use App\Models\Projects;
use App\Models\Amenities;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    //
    public function index(){
        return view('client.index');
    }
    public function portfolio(){
        $category = Category::where('feature','1')->get();
        return view('client.portfolio', compact('category'));
    }
    public function categories(){
        #check muna kung featured or not
        #check if there are categories with active sataus, then get it, if none, disp something
        $categories = Category::where('feature','0')->get();
        if (Category::where('status','1')->exists()) {
            # code...
            return view('client.categories', compact('categories'));
        } else {
            # code...
            return view ('client.categories',['msg'=> 'No Active Categories.🥺'],compact('categories'));
        }
    }

    #projects from specialization
    public function specProject($category_id, $category_slug){
        $projects = Projects::where('category_id', $category_id)->where('status','1')->get();
        $category = Category::all();
        if (Category::where('status','1')->exists()) {
            # code...
            if (Projects::where('category_id', $category_id)->where('status','1')->exists()) {
                # code...
                return view('client.specialization',compact('projects','category'));
            } else {
                # code...
                return view ('client.specialization',['msg'=> 'No Projects found in this Category.🥺'],compact('projects','category'));
            }
        } else {
            # code...
            return view ('client.specialization',['msg'=> 'No Active Projects for this Category.🥺'],compact('projects','category'));
        }
    }
    public function profile(){
        return view('client.profile');
    }
    public function projects(Request $request){
        $categories = Category::where('status','1')->get();
        $projects = Projects::where('status','1')->get();
        $amenities = Amenities::all();
        $architectural = Designs::all();
                
        $find_this = $request->get('query');
        $find_category = $request->get('category');
        $find_design = $request->get('design');
        $find_stories = $request->get('stories');
        $find_amenity = $request->get('stories');

        if ($find_this) {
            # code...
            $projects = Projects::where('name', 'LIKE', '%'.$find_this.'%')->get();
            if (count ($projects) > 0) {
                return view('client.projects', compact('categories','projects','amenities','architectural'));
            } else {
                # code...
                return view('client.projects',['msg'=> 'Sorry but '.$find_this.' not Found.🥺'],compact('categories','projects','amenities','architectural'));
            }
        } elseif ($find_category) {
            # code...
            $projects = Projects::where('category_id', 'LIKE', '%'.$find_category.'%')->get();
            if (count ($projects) > 0) {
                return view('client.projects', compact('categories','projects','amenities','architectural'));
            } else {
                # code...
                return view('client.projects',['msg'=> 'Sorry but '.$find_category.' not Found.🥺'],compact('categories','projects','amenities','architectural'));
            }
        } elseif ($find_design) {
            # code...
            // $design = json_decode($find_design);
            $projects = Projects::where('designs', 'LIKE', '%'.$find_design.'%')->get();
            if (count ($projects) > 0) {
                return view('client.projects', compact('categories','projects','amenities','architectural'));
            } else {
                # code...
                return view('client.projects',['msg'=> 'Sorry but '.$find_design.' not Found.🥺'],compact('categories','projects','amenities','architectural'));
            }
        } elseif ($find_stories) {
            # code...
            $projects = Projects::where('stories', 'LIKE', '%'.$find_stories.'%')->get();
            if (count ($projects) > 0) {
                return view('client.projects', compact('categories','projects','amenities','architectural'));
            } else {
                # code...
                return view('client.projects',['msg'=> 'Sorry but '.$find_stories.' not Found.🥺'],compact('categories','projects','amenities','architectural'));
            }
        } elseif ($find_amenity) {
            # code...
            $projects = Projects::where('amenities', 'LIKE', '%'.$find_amenity.'%')->get();
            if (count ($projects) > 0) {
                return view('client.projects', compact('categories','projects','amenities','architectural'));
            } else {
                # code...
                return view('client.projects',['msg'=> 'Sorry but '.$find_amenity.' not Found.🥺'],compact('categories','projects','amenities','architectural'));
            }
        } 
        // else {
        //     # code...
        //     return view('client.projects',['msg'=> 'Sorry but we found nothing on applied filters.🥺'],compact('categories','projects','amenities','architectural'));
        // }
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
                return view('client.project',['msgc'=>'No images found'],compact('project','images'));
            }
        } else {
            # code...
            return view('client.project',['msgc'=>'No images found']);
        }
    }
    public function contact(){
        return view('client.contact');
    }
    public function subscribe(Request $request){

        // dd('OK');
        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email|max:255|unique:newsletter,email'
        ]);

        if ($validator->fails()) {
            # code...
            return redirect()->back()->with('msgc','This email has already subscribed!');
        } else {
            # code...
            event(new ClientSubscribed($request->input('email')));
            // Newsletter::create([
            //     'email' => $request->email
            // ]);
            return redirect()->back()->with('msgc','Subscription Added. Thanks, Pal!');
        }
    }
    public function subscriber(){
        $subscribers = Newsletter::paginate(5);
        return view('users.admin.newsletter.subscriber',compact('subscribers'));
    }
}
