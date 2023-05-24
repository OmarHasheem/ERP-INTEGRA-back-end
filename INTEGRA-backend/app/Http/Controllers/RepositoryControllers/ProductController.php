<?php

namespace App\Http\Controllers\RepositoryControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Repository\ProductCollection;
use App\Http\Resources\Repository\ProductResource;
use App\Models\Repository\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index () : ProductCollection {
        return new ProductCollection(Product::all());
    }

    public function show ($id) : ProductResource {
        $product = Product::find($id);
        if($product)
             return new ProductResource($campaign);
        else 
             return $this->failure();
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'               => 'required | regex:/^[a-zA-Z0-9\s]+$/ ',
            'description'        => 'required | regex:/^[^\'"]+$/',
            'price'              => 'required | numeric',
            'quantity_in_stock'  => 'required | numeric',
            'details'            => 'required | regex:/^[^\'"]+$/',
            'category_id'        => 'required | numeric',
            'supplier_id'        => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        if(Product::create([
            'name'               => request('name'),
            'description'        => request('description'),
            'price'              => request('price'),
            'quantity_in_stock'  => request('quantity_in_stock'),
            'details'            => request('details'),
            'category_id'        => request('category_id'),
            'supplier_id'        => request('supplier_id'),
        ]))
            return $this->success();
        else
            return $this->failure();    
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name'               => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'description'        => 'required | regex:/^[^\'"]+$/',
            'price'              => 'required | numeric',
            'quantity_in_stock'  => 'required | numeric',
            'details'            => 'required | regex:/^[^\'"]+$/',
            'category_id'        => 'required | numeric',
            'supplier_id'        => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $product = Product::findOrFail($id);

        $product->name              = request('name');
        $product->description       = request('description');
        $product->price             = request('price');
        $product->quantity_in_stock = request('quantity_in_stock');
        $product->details           = request('details');
        $product->category_id       = request('category_id');
        $product->supplier_id       = request('supplier_id');

        if($product->isDirty(['name', 'description', 'price', 'quantity_in_stock', 'details', 'category_id', 'supplier_id'])){
            $product->save();
            return $this->success();
        }
        else {
            return $this->failure();
        }
    }

    public function destroy ($id) {
        if( $product = Product::findOrFail($id)){
            $product->delete();
            return $this->success();
        } 
        else
            return $this->failure();
    }
}