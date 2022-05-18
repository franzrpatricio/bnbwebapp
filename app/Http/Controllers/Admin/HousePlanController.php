<?php

namespace App\Http\Controllers\Admin;

use App\Models\HousePlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\HousePlanFormRequest;

class HousePlanController extends Controller
{
    public function index(Request $request){
        #VIEW category page of index.blade.php in admin/category
        #get all categories
        // $houseplan = HousePlan::all();
        if ($request->has('trashed')) {
            $houseplan = HousePlan::onlyTrashed()->paginate(3);
        } else {
            $houseplan = HousePlan::paginate(3);
        }

        #get all houseplans
        $houseplan = HousePlan::all();
        return view('users.admin.houseplan.index', compact('houseplan'));
    }

    public function create(){
        #VIEW category create form
        return view('users.admin.houseplan.create');
    }

    public function store(HousePlanFormRequest $request){
        #BACKEND PART...CONTROLLER COMMUNICATING WITH MODEL
        #CategoryFormRequest=FormValidation before inserting data...
        $data = $request->validated();
        $houseplan = new HousePlan();
        $houseplan->type = $data['type'];
        $houseplan->cost = $data['cost'];
        $houseplan->floor = $data['floor'];
        $houseplan->wall = $data['wall'];
        $houseplan->window = $data['window'];
        $houseplan->ceiling = $data['ceiling'];

        $houseplan->status = $request->status == true ? '1':'0';
        #get id of authenticated user who posted the category
        $houseplan->created_by = Auth::user()->id;
        #after everything....
        #save the category
        $houseplan->save();

         //insert to activity logs
         $user_id = Auth::user()->id;
         $name = Auth::user()->name;
         $role_as = Auth::user()->role_as;
         $description = "Created a House Plam";
         $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

     $data = [
         'user_id'       => $user_id,
         'name'          => $name,
         'description'   => $description,
         'date_time'     => $date_time,
         'role_as'       => $role_as
     ];
         
         DB::table('user_activity_logs')->insert($data);
         
        #redirect with message;see in index.blade.php
        return redirect('admin/houseplan')->with('msg','Successfully Added New House Plan. Thanks!');
    }
    
    #VIEW specific category
    public function edit($houseplan_id){
        $houseplan = HousePlan::find($houseplan_id);
        return view('users.admin.houseplan.edit', compact('houseplan'));
    }
    #UPDATE specific category
    public function update(HousePlanFormRequest $request, $houseplan_id){
        $data = $request->validated();

        $houseplan = HousePlan::find($houseplan_id);
        $houseplan->type = $data['type'];
        $houseplan->cost = $data['cost'];
        $houseplan->floor = $data['floor'];
        $houseplan->wall = $data['wall'];
        $houseplan->window = $data['window'];
        $houseplan->ceiling = $data['ceiling'];
       
        $houseplan->status = $request->status == true ? '1':'0';
        #get id of authenticated user who posted the category
        $houseplan->created_by = Auth::user()->id;
        #after everything....
        #save the category
        $houseplan->update();

         //insert to activity logs
         $user_id = Auth::user()->id;
         $name = Auth::user()->name;
         $role_as = Auth::user()->role_as;
         $description = "Update a House Plan";
         $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

     $data = [
         'user_id'       => $user_id,
         'name'          => $name,
         'description'   => $description,
         'date_time'     => $date_time,
         'role_as'       => $role_as
     ];
         
         DB::table('user_activity_logs')->insert($data);

        #redirect with message;see in index.blade.php
        return redirect('admin/houseplan')->with('msg','Successfully Updated House Plan. Thanks! :D');
    }

    public function destroy($houseplan_id){
        $houseplan = HousePlan::find($houseplan_id);
        if ($houseplan) {
            # code...
            #then delete all data based from id
            $houseplan->delete();
            return redirect('admin/houseplan')->with('msg','Successfully Deleted House Plan');
        }else {
            return redirect('admin/houseplan')->with('msg','No House Plan ID found');
        }
    }

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($houseplan_id)
    {
        HousePlan::withTrashed()->find($houseplan_id)->restore();
  
        return redirect('admin/houseplan')->with('msg','success');
    }  
  
    /**
     * restore all post
     *
     * @return response()
     */
    public function restore_all()
    {
        HousePlan::onlyTrashed()->restore();
  
        return redirect('admin/houseplan')->with('msg','success');
    }

    #SEARCH
    public function search(Request $request){
        $find_this = $request->get('query');
        $houseplan = HousePlan::where('id', 'LIKE', '%'.$find_this.'%')
            ->orWhere('type', 'LIKE', '%'.$find_this.'%')
            ->orWhere('cost', 'LIKE', '%'.$find_this.'%')
            ->orWhere('floor', 'LIKE', '%'.$find_this.'%')
            ->orWhere('wall', 'LIKE', '%'.$find_this.'%')
            ->orWhere('window', 'LIKE', '%'.$find_this.'%')
            ->orWhere('ceiling', 'LIKE', '%'.$find_this.'%')
            ->paginate(2);
        if (count ($houseplan) > 0) {
            return view('users.admin.houseplan.index', compact('houseplan'));
        } else {
            # code...
            return view ('users.admin.houseplan.index', compact('houseplan'))->with( 'No Housep Plan Found. 🥺' );
        }
    }
}
