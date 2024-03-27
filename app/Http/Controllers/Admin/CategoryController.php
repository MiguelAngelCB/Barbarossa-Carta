<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::orderBy("position","asc")->get();
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }
    
    public function store(CategoryRequest $request)
    {
        Category::create(
           ['name'=> $request->name,
            'slug'=> $request->slug,
            'description'=> $request->description,
            'position' => Category::count()+1]
        );

        return redirect()->route('admin.categories.index')->with('info','The category was created successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update(
            ['name'=> $request->name,
             'slug'=> $request->slug,
             'description'=> $request->description]
         );
        return redirect()->route('admin.categories.index')->with('info','The category was updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('info','The category was deleted successfully');
    }
}
