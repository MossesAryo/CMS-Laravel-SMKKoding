<?php

namespace App\Http\Controllers\Back;

use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.category.categories',[
    'categories'=> Categories::latest()->get()
]);
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

        Categories::create($data);

        return back()->with('success','Categories has been created');

        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3'
        ]);
    
        
        $data['slug'] = Str::slug($data['name']);
    
        
        $category = Categories::find($id); 
        if ($category) {
            $category->update($data);
            return back()->with('success', 'Category has been updated');
        }
    
        // Jika kategori tidak ditemukan
        return back()->with('error', 'Category not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Categories::find($id)->delete();

       return back()->with('success','Category has been deleted');
    }
}
