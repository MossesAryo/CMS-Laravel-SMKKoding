<?php

use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategorController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Front\HomeController;

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [HomeController::class, 'index']);

Route::post('/article/search', [HomeController::class, 'index'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('back.dashboard.index');

    Route::resource('article', ArticleController::class);

    Route::get('articles', [DashboardController::class, 'articles'])
        ->name('back.article.articles');
    Route::resource('/users', UserController::class);

    Route::resource('/categories', CategorController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ])->middleware('UserAccess:1');
    Route::post('ckeditor/upload', [ArticleController::class, 'uploadImage'])->name('ckeditor.upload');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
