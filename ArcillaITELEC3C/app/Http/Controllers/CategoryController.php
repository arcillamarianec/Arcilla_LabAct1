<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
    
        return redirect()->route('categories.index');
    }
    public function index()
{
    $categories = Category::all();
    return view('categories.index', ['categories' => $categories]);
}
}