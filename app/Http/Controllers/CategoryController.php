<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::has('dishes')
            ->with(['dishes' => function ($query) {
                $query->orderBy('position', 'asc');
            }])
            ->orderBy('position', 'asc')
            ->get();
        return view('categories.index', compact('categories'));
    }
}
