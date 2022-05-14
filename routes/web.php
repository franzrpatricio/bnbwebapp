<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\FilesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HousePlanController;
use App\Http\Controllers\Admin\InquiriesController;

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
// Route::get('/admin', function(){
//     return view ('index');
// });
Route::get('/', [App\Http\Controllers\Client\ClientController::class, 'index']);
Route::get('/portfolio', [App\Http\Controllers\Client\ClientController::class, 'portfolio']);
Route::get('/profile', [App\Http\Controllers\Client\ClientController::class, 'profile']);
Route::get('specialization/{category_id}', [App\Http\Controllers\Client\ClientController::class, 'specProject']);
Route::get('/projects', [App\Http\Controllers\Client\ClientController::class, 'projects']);
Route::get('/project', [App\Http\Controllers\Client\ClientController::class, 'project']);

Route::get('/contact', [App\Http\Controllers\Client\ClientController::class, 'contact']);
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
Auth::routes(['register'=>false]);
Route::get('/gateway', function () {
    return view('auth/login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
#middleware auth checks user authentication to prevent user to access admin panel w/o logging in
#admin pages
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    #PUT ALL YOUR ADMIN CONTROLLERS HERE
    #ADMIN DASHBOARD VIEW
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    #CATEGORY CRUD
    #READ
    Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.index');
    #CREATE
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    #UPDATE
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class, 'update']);
    #DELETE
    Route::delete('delete-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('categories.destroy');
    #RESTORE
    Route::get('restore-category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class, 'restore'])->name('categories.restore');
    Route::get('categories/restore-all',[App\Http\Controllers\Admin\CategoryController::class, 'restore_all'])->name('categories.restore_all');
    #SEARCH
    Route::get('categories/find', [App\Http\Controllers\Admin\CategoryController::class, 'search']);

    #PROJECTS CRUD
    #READ
    Route::get('projects', [App\Http\Controllers\Admin\ProjectsController::class, 'index'])->name('projects.index');
    #CREATE
    Route::get('add-project', [App\Http\Controllers\Admin\ProjectsController::class, 'create']);
    Route::post('add-project', [App\Http\Controllers\Admin\ProjectsController::class, 'store']);
    #UPDATE
    Route::get('edit-project/{project_id}', [App\Http\Controllers\Admin\ProjectsController::class, 'edit']);
    Route::put('update-project/{project_id}',[App\Http\Controllers\Admin\ProjectsController::class, 'update']);
    #DELETE
    Route::delete('delete-project/{project_id}',[App\Http\Controllers\Admin\ProjectsController::class, 'destroy'])->name('projects.destroy');
    #RESTORE
    Route::get('restore-project/{project_id}',[App\Http\Controllers\Admin\ProjectsController::class, 'restore'])->name('projects.restore');
    Route::get('projetcs/restore-projects',[App\Http\Controllers\Admin\ProjectsController::class, 'restore_all'])->name('projects.restore_all');
    #SEARCH
    Route::get('projects/find', [App\Http\Controllers\Admin\ProjectsController::class, 'search']);
    
    #VIEW GALLERY
    Route::get('project/gallery/{project_id}', [App\Http\Controllers\Admin\FilesController::class, 'gallery'])->name('projects.gallery');
    // Route::get('projects/images/{project_id}',[App\Http\Controllers\Admin\ProjectsController::class,'gallery']);
    #CREATE PROJECT IMAGES 
    // Route::get('projects/add-images', [App\Http\Controllers\Admin\FilesController::class, 'create']);
    Route::post('update-image/{files_id}', [App\Http\Controllers\Admin\FilesController::class, 'update'])->name('gallery.update');
    #DELETE GALLERY
    Route::get('delete-gallery/{files_id}', [App\Http\Controllers\Admin\FilesController::class,'destroy'])->name('gallery.destroy');

    #HOUSE PLAN CRUD
    #READ
    Route::get('houseplan', [App\Http\Controllers\Admin\HousePlanController::class, 'index'])->name('houseplan.index');
    #CREATE
    Route::get('add-houseplan', [App\Http\Controllers\Admin\HousePlanController::class, 'create']);
    Route::post('add-houseplan', [App\Http\Controllers\Admin\HousePlanController::class, 'store']);
    #UPDATE
    Route::get('edit-houseplan/{houseplan_id}', [App\Http\Controllers\Admin\HousePlanController::class, 'edit']);
    Route::put('update-houseplan/{houseplan_id}',[App\Http\Controllers\Admin\HousePlanController::class, 'update']);
    #DELETE
    Route::delete('delete-houseplan/{houseplan_id}',[App\Http\Controllers\Admin\HousePlanController::class, 'destroy'])->name('houseplan.destroy');
    #RESTORE
    Route::get('restore-houseplan/{houseplan_id}',[App\Http\Controllers\Admin\HousePlanController::class, 'restore'])->name('houseplan.restore');
    Route::get('houseplan/restore-houseplans',[App\Http\Controllers\Admin\HousePlanController::class, 'restore_all'])->name('houseplan.restore_all');
    #SEARCH
    Route::get('houseplan/find', [App\Http\Controllers\Admin\HousePlanController::class, 'search']);

    #USERS CRUD
    #USER ADMINISTRATOR
    #READ
    Route::get('users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users.index');
    #CREATE
    Route::get('add-user', [App\Http\Controllers\Admin\UsersController::class, 'create']);
    Route::post('add-user', [App\Http\Controllers\Admin\UsersController::class, 'store']);
    #UPDATE
    Route::get('edit-user/{users_id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);
    Route::put('update-user/{users_id}',[App\Http\Controllers\Admin\UsersController::class, 'update']);
    #DELETE
    Route::delete('delete-user/{users_id}',[App\Http\Controllers\Admin\UsersController::class, 'destroy'])->name('users.destroy');
    #RESTORE
    Route::get('restore-user/{users_id}',[App\Http\Controllers\Admin\UsersController::class, 'restore'])->name('users.restore');
    Route::get('users/restore-users',[App\Http\Controllers\Admin\UsersController::class, 'restore_all'])->name('users.restore_all');
    #SEARCH
    Route::get('users/find', [App\Http\Controllers\Admin\UsersController::class,'search']);

    #USER STAFF
    #VIEW PROFILE
    Route::get('profile', [App\Http\Controllers\Admin\UsersController::class, 'profile']);
    #EDIT PROFILE
    Route::get('profile/edit-profile', [App\Http\Controllers\Admin\UsersController::class, 'editProfile']);
    Route::put('profile/update-profile',[App\Http\Controllers\Admin\UsersController::class, 'updateProfile']);

    #FAQS CRUD 
    #READ
    Route::get('faqs', [App\Http\Controllers\Admin\FaqsController::class, 'index'])->name('faqs.index');
    #CREATE
    Route::get('add-faq', [App\Http\Controllers\Admin\FaqsController::class, 'create']);
    Route::post('add-faq', [App\Http\Controllers\Admin\FaqsController::class, 'store']);
    #UPDATE
    Route::get('edit-faq/{faq_id}', [App\Http\Controllers\Admin\FaqsController::class, 'edit']);
    Route::put('update-faq/{faq_id}',[App\Http\Controllers\Admin\FaqsController::class, 'update']);
    #DELETE
    Route::delete('delete-faq/{faq_id}', [App\Http\Controllers\Admin\FaqsController::class, 'destroy'])->name('faqs.destroy');
    #RESTORE
    Route::get('restore-faq/{faq_id}',[App\Http\Controllers\Admin\FaqsController::class, 'restore'])->name('faqs.restore');
    Route::get('restore-faqs',[App\Http\Controllers\Admin\FaqsController::class, 'restore_all'])->name('faqs.restore_all');
    #SEARCH
    Route::get('faqs/find', [App\Http\Controllers\Admin\FaqsController::class, 'search']);

    #INQUIRY CRUD
    #READ
    Route::get('inquiries', [App\Http\Controllers\Admin\InquiriesController::class, 'index'])->name('inquiries.index');
    #DELETE
    Route::delete('delete-inquiry/{inquiry_id}', [App\Http\Controllers\Admin\InquiriesController::class, 'destroy'])->name('inquiries.destroy');
    // Route::get('delete-inquiry/{inquiry_id}',[App\Http\Controllers\Admin\InquiriesController::class, 'destroy']);
    #RESTORE
    Route::get('restore-inquiry/{inquiry_id}',[App\Http\Controllers\Admin\InquiriesController::class, 'restore'])->name('inquiries.restore');
    Route::get('restore-inquiries',[App\Http\Controllers\Admin\InquiriesController::class, 'restore_all'])->name('inquiries.restore_all');
    #SEARCH
    Route::get('inquiries/find', [App\Http\Controllers\Admin\InquiriesController::class, 'search']);

    #The fundamental difference between the POST and PUT requests is reflected in the different meaning of the Request-URI. The URI in a POST request identifies the resource that will handle the enclosed entity... In contrast, the URI in a PUT request identifies the entity enclosed with the request.
});