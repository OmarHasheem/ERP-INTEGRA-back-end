<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\UserMangment\RoleResource;
use App\Http\Resources\UserMangment\RoleCollection;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RoleCollection(Role::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if( $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'api'
            ])){
        
            return response()->json(['message' => 'Role is created']);
        }
    }

    public function attach(Request $request , string $name) {

            $role = Role::where('name', $name)->where('guard_name', 'api')->first();
    
            foreach ($request->permissions as $permission) {
            $role->givePermissionTo($permission); 
            }
            return response()->json(['message' => 'Permissions is assign to ' . $name . ' role']);
        
    }

    public function detach(Request $request , string $name) {

        if( $role = Role::where('name', $name)->where('guard_name', 'api')->first()){
    
            $role->revokePermissionTo($request->permissions);  
            
            return response()->json(['message' => 'Permissions is unassign to ' . $name . ' role']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $role)
    {
        return new RoleResource(Role::where('name', $role)->where('guard_name', 'api')->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function assignRole(string $id , Request $request)
    {
        $user = User::find($id);
        $role = Role::where('name', $request->role)->where('guard_name', 'api')->first();
        $user->assignRole($request->role);
        return response()->json(['message' => $request->role . " is assigned to " . $user->fullName]); 
    }

    public function unassignRole(string $id , Request $request)
    {
        $user = User::find($id);
        $role = Role::where('name', $request->role)->where('guard_name', 'api')->first();
        $user->removeRole($request->role);
        return response()->json(['message' => $request->role . " is unassigned to " . $user->fullName]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $name , Request $request)
    {
        $role = Role::where('name', $name)->where('guard_name', 'api')->first();    

         if ($role->name != $request->name){
            $role->name = $request->name;
            $role->save();
            return response()->json(['message' => 'Role does changed']); 
        }

         else
         return response()->json(['message' => 'Role does not changed']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $name)
    {
        
        $role = Role::where('name', $name)->where('guard_name', 'api')->first();
        $role->delete();
        return response()->json(['message' => 'Role Deleted']);

    }
}
