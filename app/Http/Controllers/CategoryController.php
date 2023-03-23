<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->post());
        return response()->json([
            'message'=>'Category Created Successfully!!',
            'category'=>$category
        ]);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(Request $request, Category $category)
    {
        $category->fill($request->post())->save();
        return response()->json([
            'message'=>'Category Updated Successfully!!',
            'category'=>$category
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message'=>'Category Deleted Successfully!!'
        ]);
    }

    public function search(Request $request)
    {
        $categories = Category::where('name', 'like', '%' . $request->keywords . '%')
        ->orWhere('description', 'like', '%' . $request->keywords . '%')->paginate(5);
        return response()->json($categories); 
    }

    public function getAllCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
