<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Back\CategorController;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('front.home.index', [
            'latest_post' => Articles::latest()->first(),
            'articles' => Articles::latest()->get(),
            'categories' => Categories::latest()->get()
        ]);
    }
}
