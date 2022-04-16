<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // return 'hello';
        #view the page of dashboard.blade.php inside admin folder
        return view('users/admin/dashboard');
    }
}
