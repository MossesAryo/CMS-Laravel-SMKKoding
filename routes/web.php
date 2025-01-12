<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategorController;
use App\Http\Controllers\Back\DashboardController;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('back.dashboard.index');
Route::get('/user', [DashboardController::class, 'user'])->name('back.dashboard.user');

    Route::resource('article', ArticleController::class);

Route::get('articles', [DashboardController::class, 'articles'])->name('back.dashboard.articles');
Route::resource('/categories', CategorController::class)->only([
    'index','store','update','destroy'
])
?>