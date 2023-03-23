<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('/images/avatars'), $imageName);

        $request['image'] = $imageName;
        $product = Product::create($request->post());
        return response()->json([
            'message'=>'Product Created Successfully!!',
            'product'=>$product
        ]);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        if($request->file('image')){
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/images/avatars'), $imageName);
            $request['image'] = $imageName;
        }
        
        $product->fill($request->post())->save();
        return response()->json([
            'message'=>'Product Updated Successfully!!',
            'product'=>$product
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message'=>'Product Deleted Successfully!!'
        ]);
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->keywords . '%')
        ->orWhere('description', 'like', '%' . $request->keywords . '%')
        ->orWhere('price', 'like', '%' . $request->keywords . '%')->paginate(5);
        return response()->json($products); 
    }

    public function getAllProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
