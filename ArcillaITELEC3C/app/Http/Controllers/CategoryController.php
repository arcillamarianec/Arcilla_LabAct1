<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index() {
    $categories = Category::latest()->paginate('5');
    // all();
    return view('category', compact('categories'));
    }
    public function AddCat(Request $request) {
        $validated = $request->validate([
            'category_name'=>'required|unique:categories|max:255'
        ]);
         Category::create([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now()
         ]);
         return Redirect()->back()->with('success','Category Inserted Successfully');
    }
    public function EditCat($id) {
        $categories = Category::find($id);
        return view('edit', compact('categories'));
    }
    public function Update(Request $request, $id) {
        $update = Category::find($id)->update([
                'category_name'=>$request->category_name,
                'user_id'=>Auth::user()->id
        ]);
        return Redirect()->route('category')->with('success','Updated Successfully');
    }
}