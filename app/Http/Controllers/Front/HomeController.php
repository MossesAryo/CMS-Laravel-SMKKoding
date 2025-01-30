<?php

namespace App\Http\Controllers\Front;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Back\CategorController;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

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

    public function show($category_id,){
        
         
        $articles = Articles::with('Category')
        ->whereStatus(1)
        ->where('category_id', $category_id)
        ->latest()
        ->paginate(6);

    return view('front.home.index', [
        'latest_post' => Articles::latest()->first(),
        'articles' => $articles,
        'categories' => Categories::latest()->get(),
        'selected_category' => Categories::find($category_id) 
    ]);
        
    }
}
