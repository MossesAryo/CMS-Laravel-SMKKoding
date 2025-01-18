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
            'latest_post' => Articles::with('Category')->latest()->first(),
            'articles' => Articles::with('Category')->whereStatus(1)->latest()->paginate(6),
            'categories' => Categories::latest()->get()
        ]);
    }
}
