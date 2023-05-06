<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\DepartmentCollection;
use App\Http\Resources\HR\DepartmentResource;
use App\Models\HR\Department;

class DepartmentController extends Controller
{
    public function index() : DepartmentCollection
    {
        return new DepartmentCollection(Department::all());
    }

    public function show($id) : DepartmentResource
    {
        $department = Department::findOrFail($id);
        return new DepartmentResource($department);
    }

    public function store()
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required | alpha:ascii',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        Department::create(request()->all());

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function update($id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required | alpha:ascii',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $department = Department::findOrFail($id);

        request()->validate([
            'name' => ['required'],
        ]);

        $department->update(request()->all());

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json(["message" => "The process has been succeded"]);
    }

}
