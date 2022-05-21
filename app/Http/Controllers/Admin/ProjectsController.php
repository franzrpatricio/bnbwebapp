<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Files;
use App\Models\Designs;
use App\Models\Category;
use App\Models\Projects;
use App\Models\Amenities;
use App\Models\HousePlan;
use App\Events\NewProject;
use App\Models\Newsletter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProjectAmenities;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Events\NewProject as EventsNewProject;
use App\Http\Requests\Admin\ProjectFormRequest;
use App\Mail\MailSubscribers;

class ProjectsController extends Controller
{
    #VIEW
    public function index(Request $request){
        // $projects = Projects::get();
        if ($request->has('trashed')) {
            # code...
            $projects = Projects::onlyTrashed()->paginate(2);
        }else {
            $projects = Projects::paginate(2);
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
        

        #id of this project needed to save multi images and videos in Files DB Table
        $projID = $project->id;
        #vtour condition...
        #if data has file...
        if ($request->hasfile('videos')) {
            #store image file from data in to $file
            $videos = $request->file('videos');
            foreach ($videos as $video) {
                # code...
                $video_name = time().rand(1,50).'.'.$video->getClientOriginalExtension();
                $video->move('uploads/virtual_tour/', $video_name);

                DB::table('virtual_tour')->insert(
                    array(
                        'posted_by' => Auth::user()->id,
                        'project_id' => $projID,
                        'video' => $video_name,
                        'created_at' => Carbon::now(),
                    )
                );
            }
        }
        #saving of multiple image files
        if ($request->hasfile('images')) {
            # code...
            $images = $request->file('images');
            foreach ($images as $image) {
                # code...
                $image_name = time().rand(1,50).'.'.$image->getClientOriginalExtension();
                $image->move('uploads/project_images/', $image_name);

                DB::table('project_images')->insert(
                    array(
                        'posted_by' => Auth::user()->id,
                        'project_id' => $projID,
                        'image' => $image_name,
                        'created_at' => Carbon::now(),
                    )
                 );
            }
        }
<<<<<<< HEAD
                //insert to activity logs
                $user_id = Auth::user()->id;
                $name = Auth::user()->name;
                $role_as = Auth::user()->role_as;
                $description = "Created a Project";
                $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'date_time'     => $date_time,
                'role_as'       => $role_as
            ];
                
                DB::table('user_activity_logs')->insert($data);
=======
        #saving and mailing of subscribers
        $subscribers = Newsletter::all();
        foreach ($subscribers as $subscriber) {
            # code...
            // event(new NewProject($subscriber->email));
            Mail::to($subscriber->email)->send(new MailSubscribers($subscriber));
        }
>>>>>>> backendfranz

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

        // #old vtour condition...
        // #if data has file...
        // if ($request->hasfile('vtour')) {
        //     #store image file from data in to $file
        //     $vtour = $request->file('vtour');
        //     #then get extension of image file 
        //     #together with the timestamp uploaded 
        //     #and store it in $filename
        //     $vidname = time().'.'. $vtour->getClientOriginalExtension();
        //     #move the $filename in directory
        //     $vtour->move('uploads/virtual_tour/', $vidname);
        //     #store filename as data for image field in db 
        //     #then in to $category
        //     $project->vtour = $vidname;
        // }

        $project->cost = $data['cost'];
        $project->stories = $data['stories'];
        $project->slug = Str::slug($data['slug']);
        $project->description = $data['description'];

        $designs = $request->input('designs');
        $project->designs = json_encode($designs);
        $amenities = $request->input('amenities');
        $project->amenities = json_encode($amenities);

        $project->meta_title = $data['meta_title'];
        $project->meta_description = $data['meta_description'];
        $project->meta_keyword = $data['meta_keyword'];
        
        $project->status = $request->status ==true ? '1':'0';
        $project->posted_by = Auth::user()->id;
        $project->update();

<<<<<<< HEAD
                //insert to activity logs
                $user_id = Auth::user()->id;
                $name = Auth::user()->name;
                $role_as = Auth::user()->role_as;
                $description = "Update a Project";
                $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'date_time'     => $date_time,
                'role_as'       => $role_as
            ];
                
                DB::table('user_activity_logs')->insert($data);
=======
        #vtour condition...
        #if data has file...
        if ($request->hasfile('videos')) {
            #store image file from data in to $file
            $videos = $request->file('videos');
            foreach ($videos as $video) {
                # code...
                $video_name = time().rand(1,50).'.'.$video->getClientOriginalExtension();
                $video->move('uploads/virtual_tour/', $video_name);

                DB::table('virtual_tour')->insert(
                    array(
                        'posted_by' => Auth::user()->id,
                        'project_id' => $project->id,
                        'video' => $video_name,
                        'created_at' => Carbon::now(),
                    )
                );
            }
        }
        #saving of multiple image files
        if ($request->hasfile('images')) {
            # code...
            $images = $request->file('images');
            foreach ($images as $image) {
                # code...
                $image_name = time().rand(1,50).'.'.$image->getClientOriginalExtension();
                $image->move('uploads/project_images/', $image_name);

                DB::table('project_images')->insert(
                    array(
                        'posted_by' => Auth::user()->id,
                        'project_id' => $project->id,
                        'image' => $image_name,
                        'created_at' => Carbon::now(),
                    )
                 );
            }
        }
>>>>>>> backendfranz

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
            return view ('users.admin.project.index', compact('projects'))->with('msg','No Projects Found.🥺' );
        }
    }
}
