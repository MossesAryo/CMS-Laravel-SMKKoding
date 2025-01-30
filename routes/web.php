<?php

use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategorController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\HomeController as AuthHomeController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;

// Route::get('/', function () {
//         return view('auth.login');
//     });
    
    Route::get('/', [HomeController::class, 'index'])->name('Blogs');
    Route::post('/articles/search', [HomeController::class, 'index'])->name('search');
    Route::get('/category/{category_id}', [HomeController::class, 'show'])->name('category.show');
    Route::get('/p/{slug}', [FrontArticleController::class, 'show']);
    Route::get('/about', function () {
        return view('front.home.about');
    })->name('about');
    Route::get('/contact', function () {
        return view('front.home.contact');
    })->name('contact');
    
    
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
        Route::get('/home', [AuthHomeController::class, 'index'])->name('home');
        
        