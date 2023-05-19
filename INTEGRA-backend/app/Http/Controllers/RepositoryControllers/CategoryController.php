<?php

namespace App\Http\Controllers\RepositoryControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Repository\CategoryCollection;
use App\Http\Resources\Repository\CategoryResource;
use App\Models\Repository\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index() : CategoryCollection {
        return new CategoryCollection(Category::all());
    }

    public function show($id) : CategoryResource {
        return new CategoryResource(Category::findOrFail($id));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        Category::create([
            'name' => request('name'),
        ]);

        return $this->success();
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $category = Category::findOrFail($id);

        $category->name = request('name');

        if($category->isDirty(['name'])){
            $category->save();
            return response()->json(['message' => 'product is updated']);
        }
        else {
            return response()->json(['message' => 'Nothing changed']);
        }
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return $this->success();
    }
}
