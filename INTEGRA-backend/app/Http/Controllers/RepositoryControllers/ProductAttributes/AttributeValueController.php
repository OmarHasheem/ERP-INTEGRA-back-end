<?php

namespace App\Http\Controllers\RepositoryControllers\ProductAttributes;

use App\Http\Controllers\Controller;
use App\Http\Resources\Repository\ProductAttributes\AttributeValueCollection;
use App\Http\Resources\Repository\ProductAttributes\AttributeValueResource;
use App\Models\Repository\ProductAttributes\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeValueController extends Controller
{
    public function index() : AttributeValueCollection {
        return new AttributeValueCollection(AttributeValue::all());
    }

    public function show($id) : AttributeValueResource {
        return new AttributeValueResource(AttributeValue::findOrFail($id));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'         => 'required | regex:/^[^\'"]+$/',
            'attribute_id' => 'required | numeric',
        ]);
        
        if ($validator->fails()) {
            return  $validator->errors();
        }

       if(AttributeValue::create([
            'name'         => request('name'),
            'attribute_id' => request('attribute_id'),
        ]))
            return $this->success();
        else
            return $this->failure();
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required | regex:/^[^\'"]+$/',
            'attribute_id' => 'required | numeric',
        ]);
        
        if ($validator->fails()) {
            return  $validator->errors();
        }

        $attributeValue = AttributeValue::findOrFail($id);

        $attributeValue->name = request('name');
        $attributeValue->attribute_id = request('attribute_id');

        if($attributeValue->isDirty(['name', 'attribute_id'])){
            $attributeValue->save();
            return $this->success();
        }
        else {
            return $this->failure();
        }
    }

    public function destroy($id) {
        $attributeValue = AttributeValue::findOrFail($id);
        $attributeValue->delete();

        return $this->success();
    }
}
