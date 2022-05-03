<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Projects;
use Illuminate\Http\Request;

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
    public function specProject($category_id){
        $projects = Projects::where('category_id', $category_id)->where('status','1')->get();
        return view('client.specialization',compact('projects'));
    }
    public function profile(){
        return view('client.profile');
    }
    public function project(){
        return view('client.project');
    }
    public function contact(){
        return view('client.contact');
    }
}
