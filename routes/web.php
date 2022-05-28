<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HousePlanController;
use App\Http\Controllers\Admin\InquiriesController;
use App\Http\Controllers\Admin\VirtualTourController;
use App\Http\Controllers\Admin\ProjectImagesController;

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
#CLIENT-SIDE PAGES
Route::post('/send-email', [App\Http\Controllers\Client\ClientController::class, 'sendEmail'])->name('send.email');
Route::post('/send-projectInquiry', [App\Http\Controllers\Client\ClientController::class, 'sendProjInquiry'])->name('send.projectInquiry');
Route::get('/', [App\Http\Controllers\Client\ClientController::class, 'index']);
Route::get('/portfolio', [App\Http\Controllers\Client\ClientController::class, 'portfolio']);
Route::get('/categories', [App\Http\Controllers\Client\ClientController::class, 'categories']);
Route::get('/profile', [App\Http\Controllers\Client\ClientController::class, 'profile']);
Route::get('specialization/{category_id}/{category_slug}', [App\Http\Controllers\Client\ClientController::class, 'specProject']);
Route::get('/projects', [App\Http\Controllers\Client\ClientController::class, 'projects']);
Route::get('project/{project_id}/{project_slug}', [App\Http\Controllers\Client\ClientController::class, 'project']);
Route::post('comments', [App\Http\Controllers\Client\CommentController::class, 'store']);
Route::get('/contact', [App\Http\Controllers\Client\ClientController::class, 'contact']);
Route::post('subscribe', [App\Http\Controllers\Client\ClientController::class, 'subscribe'])->name('subscribe.subscribe');
#when request hits server, pull out botman instance; listen to any incoming commands
Route::post('/botman',function(){
    app('botman')->listen();
});

Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generateInvoicePDF'])->name('generate-pdf.download');

#ADMINISTRATOR & STAFF PAGES
#USERS GATEWAY
// Auth::routes();
Auth::routes([
    'register' => false,
    'verify' => true
]);
Route::get('/gateway', ['middleware' => 'guest',function () {
    return view('auth/login');
}]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
#middleware auth checks user authentication to prevent user to access admin panel w/o logging in
Route::prefix('admin')->middleware(['auth','isAdmin','verified'])->group(function(){
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
    Route::get('project/gallery/{project_id}', [App\Http\Controllers\Admin\ProjectImagesController::class, 'gallery'])->name('projects.gallery');
    Route::post('update-image/{image_id}', [App\Http\Controllers\Admin\ProjectImagesController::class, 'update'])->name('gallery.update');
    #DELETE GALLERY
    Route::get('delete-gallery/{image_id}', [App\Http\Controllers\Admin\ProjectImagesController::class,'destroy'])->name('gallery.destroy');
    #VIEW VIRTUAL TOUR
    Route::get('project/virtual_tour/{project_id}', [App\Http\Controllers\Admin\VirtualTourController::class, 'virtualTour'])->name('projects.virtualTour');
    Route::post('update-video/{video_id}', [App\Http\Controllers\Admin\VirtualTourController::class, 'update'])->name('virtualTour.update');
    #DELETE VIRTUAL TOUR
    Route::get('delete-virtual_tour/{video_id}', [App\Http\Controllers\Admin\VirtualTourController::class,'destroy'])->name('virtualTour.destroy');

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
    // #VIEW PROFILE
     Route::get('profile', [App\Http\Controllers\Admin\ProfileController::class, 'profile']);
    // #EDIT PROFILE
    //  Route::get('profile/edit-profile', [App\Http\Controllers\Admin\UsersController::class, 'editProfile']);
      Route::post('profile/update-profile',[App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('update-profile');
    // #CHANGEPASS
     Route::get('profilesettings', [App\Http\Controllers\Admin\ProfileController::class, 'showChangePasswordGet'])->name('changePasswordGet');
     Route::post('profilesettings', [App\Http\Controllers\Admin\ProfileController::class, 'changePasswordPost'])->name('changePasswordPost');

    #ACTIVITYLOGS
    // Route::get('profilesettings/activityLog',[App\Http\Controllers\Admin\ProfileController::class, 'activityLog'])->name('profilesettings/activityLog');
    // Route::get('activityLoginLogout',[App\Http\Controllers\Admin\ProfileController::class, 'activityLoginLogout'])->name('activityLoginLogout');
    Route::get('logs', [App\Http\Controllers\Admin\ProfileController::class, 'logs']);
    
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

    #COMMENTS
    #READ
    Route::get('comments', [App\Http\Controllers\Client\CommentController::class, 'index'])->name('comments.index');
    #SEARCH
    Route::get('comments/find', [App\Http\Controllers\Client\CommentController::class, 'search']);
    #DELETE
    Route::delete('delete-comment/{comment_id}',[App\Http\Controllers\Client\CommentController::class, 'destroy'])->name('comments.destroy');
    #RESTORE
    Route::get('restore-comment/{comment_id}',[App\Http\Controllers\Client\CommentController::class, 'restore'])->name('comments.restore');
    Route::get('restore-comments',[App\Http\Controllers\Client\CommentController::class, 'restore_all'])->name('comments.restore_all');

    #NEWSLETTER
    Route::get('newsletter', [App\Http\Controllers\Client\ClientController::class, 'subscriber']);
    #The fundamental difference between the POST and PUT requests is reflected in the different meaning of the Request-URI. The URI in a POST request identifies the resource that will handle the enclosed entity... In contrast, the URI in a PUT request identifies the entity enclosed with the request.
});