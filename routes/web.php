<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HousePlanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/gateway', function () {
    return view('welcome');
});


#for client/prospect/visitor
// Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);
Route::get('/', function(){
    return view ('index');
});
#when request hits server, pull out botman instance; listen to any incoming commands
Route::post('/botman',function(){
    app('botman')->listen();
});

#middleware auth checks user authentication to prevent user to access admin panel w/o logging in

#admin pages
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    #PUT ALL YOUR ADMIN CONTROLLERS HERE
    #ADMIN DASHBOARD VIEW
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    #CATEGORY CRUD
    #READ
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    #CREATE
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    #UPDATE
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class, 'update']);
    #DELETE
    Route::get('delete-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    #PROJECTS CRUD
    #READ
    Route::get('projects', [App\Http\Controllers\Admin\ProjectsController::class, 'index']);
    #CREATE
    Route::get('add-project', [App\Http\Controllers\Admin\ProjectsController::class, 'create']);
    Route::post('add-project', [App\Http\Controllers\Admin\ProjectsController::class, 'store']);
    #UPDATE
    Route::get('edit-project/{project_id}', [App\Http\Controllers\Admin\ProjectsController::class, 'edit']);
    Route::put('update-project/{project_id}',[App\Http\Controllers\Admin\ProjectsController::class, 'update']);
    #DELETE
    Route::get('delete-project/{project_id}',[App\Http\Controllers\Admin\ProjectsController::class, 'destroy']);
    Route::get('restore-project/{project_id}',[App\Http\Controllers\Admin\ProjectsController::class, 'restore']);
    Route::get('restore-projects/{project_id}',[App\Http\Controllers\Admin\ProjectsController::class, 'restore_all']);


    #HOUSE PLAN CRUD
    #READ
    Route::get('houseplan', [App\Http\Controllers\Admin\HousePlanController::class, 'index']);
    #CREATE
    Route::get('add-houseplan', [App\Http\Controllers\Admin\HousePlanController::class, 'create']);
    Route::post('add-houseplan', [App\Http\Controllers\Admin\HousePlanController::class, 'store']);
    #UPDATE
    Route::get('edit-houseplan/{houseplan_id}', [App\Http\Controllers\Admin\HousePlanController::class, 'edit']);
    Route::put('update-houseplan/{houseplan_id}',[App\Http\Controllers\Admin\HousePlanController::class, 'update']);
    #DELETE
    Route::get('delete-houseplan/{houseplan_id}',[App\Http\Controllers\Admin\HousePlanController::class, 'destroy']);

    #USERS CRUD
    #READ
    
    Route::get('users', [App\Http\Controllers\Admin\UsersController::class, 'index']);
    // #CREATE
    // Route::get('add-user', [App\Http\Controllers\Admin\UsersController::class, 'create']);
    // Route::post('add-user', [App\Http\Controllers\Admin\UsersController::class, 'store']);
    // #UPDATE
    // Route::get('edit-user/{users_id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);
    // Route::put('update-user/{users_id}',[App\Http\Controllers\Admin\UsersController::class, 'update']);
    // #DELETE
    // Route::get('delete-user/{users_id}',[App\Http\Controllers\Admin\UsersController::class, 'destroy']);



    #The fundamental difference between the POST and PUT requests is reflected in the different meaning of the Request-URI. The URI in a POST request identifies the resource that will handle the enclosed entity... In contrast, the URI in a PUT request identifies the entity enclosed with the request.
});


// #staff pages
// Route::prefix('staff')->middleware(['auth','isStaff'])->group(function(){
//     Route::get('/dashboard',[App\Http\Controllers\Staff\DashboardController::class, 'index']);

//     #CATEGORY CRUD
//     #READ
//     Route::get('category', [App\Http\Controllers\Staff\CategoryController::class, 'index']);
//     #CREATE
//     Route::get('add-category', [App\Http\Controllers\Staff\CategoryController::class, 'create']);
//     Route::post('add-category', [App\Http\Controllers\Staff\CategoryController::class, 'store']);
//     #UPDATE
//     Route::get('edit-category/{category_id}', [App\Http\Controllers\Staff\CategoryController::class, 'edit']);
//     Route::put('update-category/{category_id}',[App\Http\Controllers\Staff\CategoryController::class, 'update']);
//     #DELETE
//     Route::get('delete-category/{category_id}',[App\Http\Controllers\Staff\CategoryController::class, 'destroy']);

//     #PROJECTS CRUD
//     #READ
//     Route::get('projects', [App\Http\Controllers\Staff\ProjectsController::class, 'index']);
//     #CREATE
//     Route::get('add-project', [App\Http\Controllers\Staff\ProjectsController::class, 'create']);
//     Route::post('add-project', [App\Http\Controllers\Staff\ProjectsController::class, 'store']);
//     #UPDATE
//     Route::get('edit-project/{project_id}', [App\Http\Controllers\Staff\ProjectsController::class, 'edit']);
//     Route::put('update-project/{project_id}',[App\Http\Controllers\Staff\ProjectsController::class, 'update']);
//     #DELETE
//     Route::get('delete-project/{project_id}',[App\Http\Controllers\Staff\ProjectsController::class, 'destroy']);


//     #HOUSE PLAN CRUD
//     #READ
//     Route::get('houseplan', [App\Http\Controllers\Staff\HousePlanController::class, 'index']);
//     #CREATE
//     Route::get('add-houseplan', [App\Http\Controllers\Staff\HousePlanController::class, 'create']);
//     Route::post('add-houseplan', [App\Http\Controllers\Staff\HousePlanController::class, 'store']);
//     #UPDATE
//     Route::get('edit-houseplan/{houseplan_id}', [App\Http\Controllers\Staff\HousePlanController::class, 'edit']);
//     Route::put('update-houseplan/{houseplan_id}',[App\Http\Controllers\Staff\HousePlanController::class, 'update']);
//     #DELETE
//     Route::get('delete-houseplan/{houseplan_id}',[App\Http\Controllers\Staff\HousePlanController::class, 'destroy']);

//     #USERS CRUD -> view & update his own account only
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
