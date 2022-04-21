<?php

namespace App\Http\Controllers\Admin;

use App\Models\HousePlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\HousePlanFormRequest;

class HousePlanController extends Controller
{
    public function index(){
        #VIEW category page of index.blade.php in admin/category
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
}
