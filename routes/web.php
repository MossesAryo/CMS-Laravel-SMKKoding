<?php

use App\Http\Controllers\Back\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('dashboard.user');
Route::get('/dashboard/articles', [DashboardController::class, 'articles'])->name('dashboard.articles');
Route::get('/dashboard/categories', [DashboardController::class, 'categories'])->name('dashboard.categories');
