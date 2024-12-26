<?php

namespace App\Http\Controllers\Back;

use App\Models\Articles;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $article = Articles::with('Category')->latest()->get();
            return DataTables::of($article)
                ->addcolumn('category_id', function ($article) {
                    return $article->category->name;
                })
                ->addcolumn('status', function ($article) {
                    if ($article->status == 0) {
                        return '<div class="py-1 px-2 text-sm text-white bg-red-400 rounded inline-block">Private</div>';
                    } else {
                        return '<div class="py-1 px-2 text-sm text-white bg-green-500 rounded inline-block">Public</div>';
                    }
                })
                ->addcolumn('status', function ($article) {
                    if ($article->status == 0) {
                        return '<div class="py-1 px-2 text-sm text-white bg-red-400 rounded inline-block">Private</div>';
                    } else {
                        return '<div class="py-1 px-2 text-sm text-white bg-green-500 rounded inline-block">Public</div>';
                    }
                })

                ->addcolumn('button', function ($article) {
                    return '
                    <button type="button" 
                        class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        Detail
                    </button>
                    <button type="button" 
                        class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        Edit
                    </button>
                    <button type="button"
                        class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        Delete
                    </button>
                ';
                })


                ->rawcolumns(['category_id', 'status','button'])
                ->make();
        }
        return view('back.article.article');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|min:3'
        ]);
        $data['slug'] = Str::slug($data['name']);

        Articles::create($data);

        return back()->with('success', 'Article has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
