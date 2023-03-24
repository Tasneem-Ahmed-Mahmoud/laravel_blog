<?php


use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'admin','as'=>'admin.'],function(){


Route::get('register',[RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('register',[RegisterController::class,'register'])->name('register.post');


// Route::get('register', 'App\Http\Controllers\Admin\Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'App\Http\Controllers\Admin\Auth\RegisterController@register')->name('register.post');
Route::get('login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('login',[LoginController::class,'login'])->name('login.post');
Route::get('home',[DashboardController::class,'index'])->name('home');

Route::get('password/reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/reset',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('reset/password/{token}',[ ResetPasswordController::class,'showResetForm'])->name('reset.password');
Route::post('reset/password',[ ResetPasswordController::class,'reset'])->name('password.update');

// Route::group(['middleware'=>'auth:admin'],function(){
    Route::get('/admin/home',[DashboardController::class,'index'])->name('home');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    Route::Resource('categories','App\Http\Controllers\Admin\CategoryController',[
        'names'=>[
       'create'=>'categories.create',
       'store'=>'categories.store',
       'edite'=>'categories.edite',
       'update'=>'categories.update',
       'destroy'=>'categories.destroy',
        
        ]
    ]);
//});

});