<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class CategoryController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            AdminMiddleware::class
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.tabel', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:50',
        ]);

        Category::create([
            'name_category' => $request->category,
        ]);
        return redirect()->route('category.create')->with('success', 'Category Success added!!');
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
    public function edit($id_category)
    {
        $categories = Category::findOrFail($id_category);
        return view('admin.category.edit', compact('categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_category)
    {
        $categories = Category::findOrFail($id_category);
        $request->validate([
            'category' => 'required|string|max:50',
        ]);
        $categories->update([
            'name_category' => $request->category,
        ]);
        return redirect()->route('layouts.maintable.category')->with('success', 'Category Success updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_category)
    {
        $categories = Category::findOrFail($id_category);
        $categories->delete();
        return redirect()->route('layouts.maintable.category')->with('success', 'Category Success deleted');
    }
}
