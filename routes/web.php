<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
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