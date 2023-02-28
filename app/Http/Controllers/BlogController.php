<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
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
}
