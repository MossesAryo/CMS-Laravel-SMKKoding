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
        $keyword = request()->keyword;

        if ($keyword) {
            $articles = Articles::with('Category')
            ->whereStatus(1)
            ->where('title','like','%' .$keyword. '%')
            ->latest()
            ->paginate(6);
        } else {
            $articles = Articles::with('Category')->whereStatus(1)->latest()->paginate(6);
        }
        


        return view('front.home.index', [
            'latest_post' => Articles::latest()->first(),
            'articles' => $articles,
            'categories' => Categories::latest()->get()
        ]);
    }

    public function home(){
        
    }
}
