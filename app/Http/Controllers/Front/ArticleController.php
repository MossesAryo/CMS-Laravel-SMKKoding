<?php

namespace App\Http\Controllers\Front;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function show($slug){
        return view('front.article.show',[
            'articles' => Articles::whereSlug($slug)->first(),
            'categories' => Categories::latest()->get()
        ]);
    }
}
