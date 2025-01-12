<?php

namespace App\Http\Controllers\Back;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateArticleRequest;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

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
                ->addIndexColumn()
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
                   <div class="text-center">
                    <a href="article/' . $article->id . '" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Detail</a>
                    <a href="article/' . $article->id . '/edit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <a href="#" onclick="deleteArticle(' . $article->id . ')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</a>
                   </div>

                ';
                })


                ->rawcolumns(['category_id', 'status', 'button'])
                ->make();
        }
        return view('back.article.article');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create', [
            'categories' => Categories::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {

        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('images', $file, $filename);
            $data['img'] = $path;
        } else {
            return redirect()->back()->with('error', 'Image is required');
        }

        $data['slug'] = Str::slug($data['title']);
        Articles::create($data);

        return redirect()->route('article.index')->with('success', 'Article data has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Articles::find($id);
        return view('back.article.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.article.update', [
            'article'    => Articles::find($id),
            'categories' => Categories::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('images', $file, $filename);


            if ($request->oldImg && Storage::disk('public')->exists($request->oldImg)) {
                Storage::disk('public')->delete($request->oldImg);
            }

            $data['img'] = $path;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['title']);
        Articles::findOrFail($id)->update($data);

        return redirect()->route('article.index')->with('success', 'Article data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $article = Articles::findOrFail($id);
            $article->delete();
            return response()->json(['success' => true, 'message' => 'Article deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
