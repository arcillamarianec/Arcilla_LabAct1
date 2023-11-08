<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // public function store(Request $request)
    // {
    //     $category = new Category();
    //     $category->name = $request->input('name');
    //     $category->save();
    
    //     return redirect()->route('categories.index');
    // }

    public function index() {
    $categories = Category::all();
    return view('category', compact('categories'));
    }
    // public function store(Request $request)
    // {
    //     // Validate the input
    //     $request->validate([
    //         'category_name' => 'required|string|max:255',
    //         'user_id' => 'required|integer',
    //     ]);
    
    //     // Create a new category
    //     $category = new Category;
    //     $category->category_name = $request->input('category_name');
    //     $category->user_id = $request->input('user_id');
    //     $category->save();
    
    //     return redirect('/category');

    // }<?php

    public function store(Request $request)
    {
        $category_name = $request->input('category_name');
        $user_id = $request->input('user_id');

        $category = new Category;
        $category->category_name = $category_name;
        $category->user_id = $user_id;
        $category->save();

        return redirect()->route('category');
    }

}