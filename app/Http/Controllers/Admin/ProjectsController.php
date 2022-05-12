<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Files;
use App\Models\Designs;
use App\Models\Category;
use App\Models\Projects;
use App\Models\Amenities;
use App\Models\HousePlan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProjectAmenities;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProjectFormRequest;

class ProjectsController extends Controller
{
    #VIEW
    public function index(Request $request){
<<<<<<< HEAD
        if(Auth::check()){
            $projects = Projects::all();
            if ($request->has('trashed')) {
                # code...
                $projects = Projects::onlyTrashed()->get();
            }
            return view('users.admin.project.index', compact('projects'));
        }else {
            #if not authenticated
            return redirect('/login')->with('status','Log In First!');
=======
        // $projects = Projects::get();
        if ($request->has('trashed')) {
            # code...
            $projects = Projects::onlyTrashed()->paginate(2);
        }else {
            $projects = Projects::paginate(2);
>>>>>>> backendfranz
        }
    }

    #CREATE
    public function create(){
        #FORM
        #1 means visible
        #show all categories and houseplans with status == 1
        $category = Category::where('status', '0')->get(); 
        $houseplan = HousePlan::where('status', '1')->get();
        $amenities = Amenities::all();
        $architectural = Designs::all();
        return view('users.admin.project.create', compact('category','houseplan','amenities','architectural'));
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
        #vtour condition...
        #if data has file...
        if ($request->hasfile('vtour')) {
            #store image file from data in to $file
            $vtour = $request->file('vtour');
            #then get extension of image file 
            #together with the timestamp uploaded 
            #and store it in $filename
            $vidname = time().'.'. $vtour->getClientOriginalExtension();
            #move the $filename in directory
            $vtour->move('uploads/virtual_tour/', $vidname);
            #store filename as data for image field in db 
            #then in to $category
            $project->vtour = $vidname;
        }

        $project->cost = $data['cost'];
        $project->stories = $data['stories'];
        $project->rooms = $data['rooms'];
        $project->slug = Str::slug($data['slug']);
        $project->description = $data['description'];

        $designs = $request->input('designs');
        $project->designs = json_encode($designs);
        $amenities = $request->input('amenities');
        $project->amenities = json_encode($amenities);
        
        $project->meta_title = $data['meta_title'];
        $project->meta_description = $data['meta_description'];
        $project->meta_keyword = $data['meta_keyword'];
        
        $project->status = $request->status == true ? '1':'0';
        $project->posted_by = Auth::user()->id;
        $project->save();
<<<<<<< HEAD
        
        $projID = $project->id;
        // $data = $request->input('amenity');
        // foreach ($data as $key) {
        //     DB::table('project_amenities')->insert(
        //         array(
        //             'project_id' => $projID,
        //             'amenity_id' => $key,
        //             'posted_by' => Auth::user()->id,
        //             'created_at' => Carbon::now(),
        //         )
        //      );
        // }

        // $data = $request->input('designs');
        // foreach ($data as $key) {
        //     DB::table('Project_design')->insert(
        //         array(
        //             'project_id' => $projID,
        //             'design_id' => $key,
        //             'posted_by' => Auth::user()->id,
        //             'created_at' => Carbon::now(),
        //         )
        //      );
        // }
        if ($request->hasfile('filenames')) {
            # code...
            $files = $request->file('filenames');
            foreach ($files as $image) {
                # code...
                $image_name = time().rand(1,50).'.'.$image->getClientOriginalExtension();
                $image->move('uploads/project_images/', $image_name);

                DB::table('files')->insert(
                    array(
                        'posted_by' => Auth::user()->id,
                        'project_id' => $projID,
                        'filenames' => $image_name,
                        'created_at' => Carbon::now(),
                    )
                 );
            }
        }
=======
        //insert to activity logs
        $name = Auth::user()->name;
                $description = "Created Project";
                $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

            $data = [

                'name'          => $name,
                'description'   => $description,
                'date_time'     => $date_time,
            ];
                
                DB::table('user_activity_logs')->insert($data);
>>>>>>> backendtrisha
        return redirect('admin/projects')->with('msg','Successfully Created Project');
    }

    #VIEW specific project
    public function edit($project_id){
        $category = Category::where('status', '0')->get(); 
        $houseplan = HousePlan::where('status', '1')->get();
        $amenities = Amenities::all();
        $architectural = Designs::all();
        $project = Projects::find($project_id);
        return view('users.admin.project.edit', compact('project', 'category','houseplan','amenities','architectural'));
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

        #vtour condition...
        #if data has file...
        if ($request->hasfile('vtour')) {
            #store image file from data in to $file
            $vtour = $request->file('vtour');
            #then get extension of image file 
            #together with the timestamp uploaded 
            #and store it in $filename
            $vidname = time().'.'. $vtour->getClientOriginalExtension();
            #move the $filename in directory
            $vtour->move('uploads/virtual_tour/', $vidname);
            #store filename as data for image field in db 
            #then in to $category
            $project->vtour = $vidname;
        }

        $project->cost = $data['cost'];
        $project->slug = Str::slug($data['slug']);
        $project->description = $data['description'];

        $designs = $request->input('designs');
        $project->designs = json_encode($designs);
        $amenities = $request->input('amenities');
        $project->amenities = json_encode($amenities);

        $project->meta_title = $data['meta_title'];
        $project->meta_description = $data['meta_description'];
        $project->meta_keyword = $data['meta_keyword'];
        
        $project->status = $request->status ==true ? '0':'1';
        $project->posted_by = Auth::user()->id;
        $project->update();
        //insert to activity logs
        $name = Auth::user()->name;
                $description = "Update a Project";
                $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

            $data = [

                'name'          => $name,
                'description'   => $description,
                'date_time'     => $date_time,
            ];
                
                DB::table('user_activity_logs')->insert($data);
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
        return redirect('admin/projects')->with('msg','Post Successfully Restored');
    }
 
    #RESTORE ALL
    public function restore_all(){
        Projects::onlyTrashed()->restore();
        return redirect('admin/projects')->with('msg','Successfully Restored Projects');
    }

    #SEARCH
    public function search(Request $request){
        $find_this = $request->get('query');
        $projects = Projects::where('id', 'LIKE', '%'.$find_this.'%')
            ->orWhere('name', 'LIKE', '%'.$find_this.'%')
            ->orWhere('cost', 'LIKE', '%'.$find_this.'%')
            ->with('category', 'houseplan')
            ->paginate(2);
        if (count ($projects) > 0) {
            return view('users.admin.project.index', compact('projects'));
        } else {
            # code...
            return view ('users.admin.project.index', compact('projects'))->with( 'No Projects Found. 🥺' );
        }
    }
}
