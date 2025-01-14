<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back.dashboard.index', [
            'total_articles' => Articles::count(),
            'total_categories' => Categories::count(),
            'latest_article' => Articles::with('Category')->whereStatus(1)->latest()->take(3)->get(),
            'popular_article' => Articles::with('Category')->whereStatus(1)->OrderBy('views','desc')->take(3)->get(),
        ]);
    }
}
