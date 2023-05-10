<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(5);
        return response()->json($roles);
    }

    public function store(Request $request)
    {
        $role = Role::create($request->post());
        return response()->json([
            'message'=>'Role Created Successfully!!',
            'role'=>$role
        ]);
    }

    public function show(Role $role)
    {
        return response()->json($role);
    }

    public function update(Request $request, Role $role)
    {
        $role->fill($request->post())->save();
        return response()->json([
            'message'=>'Role Updated Successfully!!',
            'role'=>$role
        ]);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            'message'=>'Role Deleted Successfully!!'
        ]);
    }

    public function search(Request $request)
    {
        $roles = Role::where('name', 'like', '%' . $request->keywords . '%')->paginate(5);
        return response()->json($roles); 
    }
}
