<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make($requestData,[
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $requestData['password'] = Hash::make($requestData['password']);

        $user = User::create($requestData);

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
        $requestData = $request->all();
        $validator = Validator::make($requestData,[
            'name' => 'required|max:55',
            'email' => 'email|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        if($requestData['password'] != null){
            $requestData['password'] = Hash::make($requestData['password']);
        }else{
            $requestData['password'] = $user->password;
        }

        $user = User::whereId($user->id)->update($requestData);

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

    public function search(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->keywords . '%')
        ->orWhere('email', 'like', '%' . $request->keywords . '%')->paginate(5);
        return response()->json($users); 
    }
}