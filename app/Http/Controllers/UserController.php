<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $blogs = User::paginate(5);
        return response()->json($blogs);
    }

    public function store(Request $request)
    {
        $user = User::create($request->post());
        return response()->json([
            'message'=>'User Created Successfully!!',
            'user'=>$user
        ]);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->post())->save();
        return response()->json([
            'message'=>'User Updated Successfully!!',
            'user'=>$user
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message'=>'User Deleted Successfully!!'
        ]);
    }
}