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
#for client/prospect/visitor
#BOT WIDGET
// Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);
Route::get('/', function(){
    return view ('index');
});
#when request hits server, pull out botman instance; listen to any incoming commands
Route::post('/botman',function(){
    app('botman')->listen();
});

// #INQUIRY CREATE
// Route::get('add-inquiry', [App\Http\Controllers\InquiryController::class, 'create']);
// Route::post('add-inquiry', [App\Http\Controllers\InquiryController::class, 'store']);

// #REVIEWS CRUD
// #READ ALL
// Route::get('reviews', [App\Http\Controllers\ReviewsController::class, 'index']);
// #CREATE FORM AND SUBMIT
// Route::get('add-review', [App\Http\Controllers\ReviewsController::class, 'create']);
// Route::post('add-review', [App\Http\Controllers\ReviewsController::class, 'store']);
// #UPDATE ICON
// Route::get('edit-review/{review_id}', [App\Http\Controllers\ReviewsController::class, 'edit']);
// Route::put('update-review/{review_id}',[App\Http\Controllers\ReviewsController::class, 'update']);
// #DELETE ICON
// Route::get('delete-review/{review_id}',[App\Http\Controllers\ReviewsController::class, 'destroy']);

#USERS GATEWAY
Route::get('/gateway', function () {
    return view('welcome');
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
    #RESTORE
    Route::get('restore-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class, 'restore']);
    Route::get('restore-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class, 'restore_all']);

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
    #RESTORE
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
    #RESTORE
    Route::get('restore-houseplan/{houseplan_id}',[App\Http\Controllers\Admin\HousePlanController::class, 'restore']);
    Route::get('restore-houseplans/{houseplan_id}',[App\Http\Controllers\Admin\HousePlanController::class, 'restore_all']);

    #USERS CRUD
    #USER ADMINISTRATOR
    #READ
    Route::get('users', [App\Http\Controllers\Admin\UsersController::class, 'index']);
    #CREATE
    // Route::get('add-user', [App\Http\Controllers\Admin\UsersController::class, 'create']);
    // Route::post('add-user', [App\Http\Controllers\Admin\UsersController::class, 'store']);
    #UPDATE
    Route::get('edit-user/{users_id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);
    Route::put('update-user/{users_id}',[App\Http\Controllers\Admin\UsersController::class, 'update']);
    #DELETE
    Route::get('delete-user/{users_id}',[App\Http\Controllers\Admin\UsersController::class, 'destroy']);
    #RESTORE
    Route::get('restore-user/{users_id}',[App\Http\Controllers\Admin\UsersController::class, 'restore']);
    Route::get('restore-users/{users_id}',[App\Http\Controllers\Admin\UsersController::class, 'restore_all']);
    
    #USER STAFF
    #VIEW PROFILE
    Route::get('profile', [App\Http\Controllers\Admin\UsersController::class, 'profile']);
    #EDIT PROFILE
    Route::get('profile/edit-profile', [App\Http\Controllers\Admin\UsersController::class, 'editProfile']);
    Route::put('profile/update-profile',[App\Http\Controllers\Admin\UsersController::class, 'updateProfile']);

    #FAQS CRUD 
    #READ
    Route::get('faqs', [App\Http\Controllers\FaqsController::class, 'index']);
    #CREATE
    Route::get('add-faq', [App\Http\Controllers\FaqsController::class, 'create']);
    Route::post('add-faq', [App\Http\Controllers\FaqsController::class, 'store']);
    #UPDATE
    Route::get('edit-faq/{faq_id}', [App\Http\Controllers\FaqsController::class, 'edit']);
    Route::put('update-faq/{faq_id}',[App\Http\Controllers\FaqsController::class, 'update']);
    #DELETE
    Route::get('delete-faq/{faq_id}',[App\Http\Controllers\FaqsController::class, 'destroy']);
    #RESTORE
    Route::get('restore-faq/{faq_id}',[App\Http\Controllers\FaqsController::class, 'restore']);
    Route::get('restore-faqs/{faq_id}',[App\Http\Controllers\FaqsController::class, 'restore_all']);

    #INQUIRY CRUD
    #READ
    Route::get('inquiries', [App\Http\Controllers\InquiriesController::class, 'index']);
    #DELETE
    Route::get('delete-inquiry/{inquiry_id}',[App\Http\Controllers\InquiriesController::class, 'destroy']);
    #RESTORE
    Route::get('restore-inquiry/{inquiry_id}',[App\Http\Controllers\InquiriesController::class, 'restore']);
    Route::get('restore-inquiries/{users_id}',[App\Http\Controllers\InquiriesController::class, 'restore_all']);

    #The fundamental difference between the POST and PUT requests is reflected in the different meaning of the Request-URI. The URI in a POST request identifies the resource that will handle the enclosed entity... In contrast, the URI in a PUT request identifies the entity enclosed with the request.
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
