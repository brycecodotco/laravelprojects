<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('products.category', ['categories' => $categories]);
    }

    public function create()
    {
        Category::create([
            'name' => request('name')
        ]);
        return view('products.category');
    }

    public function store(Request $request)
    {
        $category = Category::create([
                'name'=> $request->name
            ]);
            return redirect('/products')->route('categories')->with('success','Category created successfully.');
    }

}
