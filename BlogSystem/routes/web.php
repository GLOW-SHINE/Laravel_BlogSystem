<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


// testing Route 


Route::get('/example-auth', function () {
    $pageTitle='Example Auth';
    return view('back.example-auth', compact('pageTitle'));
});


Route::view('/example_page','example_page');
Route::view('/example_auth','back.example_auth');


Route::prefix('admin')->name('admin.')->group(function(){
     Route::middleware([])->group(function(){
     	 Route::controller(AuthController::class)->group(function(){
     	  Route::get('/login','loginForm')->name('login');
          Route::post('/login','loginHandler')->name('login_handler');
     	  Route::get('/forgot-password','forgotForm')->name('forgot');
     	 });
     });
     
     Route::middleware([])->group(function(){
     	 Route::controller(AdminController::class)->group(function(){
     	     Route::get('/dashboard','adminDashboard')->name('dashboard');
             Route::post('/logout', 'logoutHandler')->name('logout');
     	 });
     });
});

