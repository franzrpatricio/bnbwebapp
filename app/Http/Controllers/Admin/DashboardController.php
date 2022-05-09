<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HousePlan;
use App\Models\Projects;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        // return 'hello';
        #view the page of dashboard.blade.php inside admin folder
        $administrators = User::where('role_as','1')->count();
        $staffs = User::where('role_as','0')->count();
        $categories = Category::count();

        #USE THIS CODE TO DISPLAY ALL ACTIVE PROJECTS
        #$projects = Projects::where('status','0')->get();
        // $projects = Projects::where([
        //         'category_id' => 'value1',
        //         'houseplan_id' => value2,
        //         'status' => '0',
        //         'feature' => '0'
        // ])->get();

        $projects = Projects::count();
        $houseplans = HousePlan::count();
        // $faqs = Faqs::count();
        // $inquiries = Inquiry::count();
        // $reviews = Review::count();

        if(Auth::user()->role_as == '1'){
            // return view('users/admin/dashboard', compact('administrators','staffs'));
            return view('users/admin/dashboard', compact('administrators','staffs','categories', 'projects', 'houseplans'));
        }else {
            # code...
            return view('users/admin/dashboard', compact('categories', 'projects', 'houseplans'));
        }

        // return view('users/admin/dashboard', compact('categories', 'projects', 'houseplans', 'faqs', 'reviews', 'inquiries'));
    }
}
