<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('back.dashboard.index');
    }
    
    public function user(){
        return view('back.dashboard.user');
    }
    public function articles(){
        return view('back.article.article');
    }
    public function categories(){
        return view('back.category.categories');
    }
}
