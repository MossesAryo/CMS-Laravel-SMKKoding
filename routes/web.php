<?php

use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategorController;
use App\Http\Controllers\Back\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('back.dashboard.index');
    
    Route::resource('article', ArticleController::class);
    
    Route::get('articles', [DashboardController::class, 'articles'])
    ->name('back.article.articles');
    Route::resource('/users', UserController::class);
    
    Route::resource('/categories', CategorController::class)->only([
        'index','store','update','destroy'
        ])->middleware('UserAccess:1');
        Route::post('ckeditor/upload', [ArticleController::class, 'uploadImage'])->name('ckeditor.upload');
    });


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
?>
