<?php


use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
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
    // gategories
    Route::Resource('categories','App\Http\Controllers\Admin\CategoryController',[
        'names'=>[
       'create'=>'categories.create',
       'store'=>'categories.store',
       'edite'=>'categories.edite',
       'update'=>'categories.update',
       'destroy'=>'categories.destroy',

        ]
    ])->except(['show']);




// tags
    Route::Resource('tags','App\Http\Controllers\Admin\TagController',[
        'names'=>[
            'index'=>'tags.index',
       'create'=>'tags.create',
       'store'=>'tags.store',
       'edite'=>'tags.edite',
       'update'=>'tags.update',
       'destroy'=>'tags.destroy',

        ]
    ])->except(['show']);


    // posts
    Route::get('/posts/{post}/approve',[PostController::class,'approve'])->name('posts.approve');
    Route::get('/posts/{post}/reject',[PostController::class,'reject'])->name('posts.reject');
    Route::Resource('posts','App\Http\Controllers\Admin\PostController',[
        'names'=>[
       'index'=>"posts.index",
       'edite'=>'posts.edite',
       'update'=>'posts.update',
       'destroy'=>'posts.destroy',

        ]
    ])->except(['show,create,store']);

 // users
 Route::get('/users/{user}/approve',[UserController::class,'approve'])->name('users.approve');
 Route::get('/users/{user}/reject',[UserController::class,'reject'])->name('users.reject');
 Route::Resource('users','App\Http\Controllers\Admin\UserController',[
    'names'=>[
        'index'=>'users.index',
   'create'=>'users.create',
   'store'=>'users.store',
   'edite'=>'users.edite',
   'update'=>'users.update',
   'destroy'=>'users.destroy',

    ]
])->except(['show']);



 // comments
 Route::get('/comments/{comment}/approve',[CommentController::class,'approve'])->name('comments.approve');
 Route::get('/comments/{comment}/reject',[CommentController::class,'reject'])->name('comments.reject');
 Route::Resource('comments','App\Http\Controllers\Admin\CommentController',[
    'names'=>[
        'index'=>'comments.index',
         'destroy'=>'comments.destroy',
         'show'=>'comments.show',

    ]
])->except(['update','store','create']);




 // comments
 Route::get('/pages/{page}/approve',[PageController::class,'approve'])->name('pages.approve');
 Route::get('/pages/{page}/reject',[PageController::class,'reject'])->name('pages.reject');
 Route::Resource('pages','App\Http\Controllers\Admin\PageController',[
    'names'=>[
        'index'=>'pages.index',
         'destroy'=>'pages.destroy',
         'show'=>'pages.show',
         'create'=>'pages.create',
         'store'=>'pages.store',

    ]
])->except([]);


//});

});


// Route::post('categories.destroy',[CategoryController::class,'destroy'])->name('admin.categories.destroy');
