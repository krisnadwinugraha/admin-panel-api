<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('categoryId')->latest()->paginate(5);
        return response()->json($blogs);
    }

    public function store(Request $request)
    {
        $blog = Blog::create($request->post());
        return response()->json([
            'message'=>'Blog Created Successfully!!',
            'blog'=>$blog
        ]);
    }

    public function show(Blog $blog)
    {
        return response()->json($blog);
    }

    public function update(Request $request, Blog $blog)
    {
        $blog->fill($request->post())->save();
        return response()->json([
            'message'=>'Blog Updated Successfully!!',
            'blog'=>$blog
        ]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json([
            'message'=>'Blog Deleted Successfully!!'
        ]);
    }
    
    public function search(Request $request)
    {
        $blogs = Blog::with('categoryId')->where('title', 'like', '%' . $request->keywords . '%')
        ->orWhere('category_id', 'like', '%' . $request->keywords . '%')
        ->orWhere('content', 'like', '%' . $request->keywords . '%')->paginate(5);
        return response()->json($blogs); 
    }
}
