<?php

namespace App\Http\Controllers\RepositoryControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Repository\ProductDetailCollection;
use App\Http\Resources\Repository\ProductDetailResource;
use App\Models\Repository\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ProductDetailController extends Controller
{
    public function index() : ProductDetailCollection {
        return new ProductDetailCollection(ProductDetail::all());
    }

    public function show($id) : ProductDetailResource {
        return new ProductDetailResource(ProductDetail::findOrFail($id));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'details'    => 'required',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        try {
        $details = request('details');
        foreach($details as $detail){
            $product_id = $detail["productId"];
            $stock = $detail["stock"];
            unset($detail["productId"]);
            unset($detail["stock"]); 
            ProductDetail::create([
                'stock'      => $stock,
                'product_id' => $product_id,
                'details'    => $detail,
            ]);  
        }       
        return $this->success();
    } catch (Throwable $e) {
        return $this->failure();
    }

    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'stock'      => 'required | numeric',
            'product_id' => 'required | numeric',
            'details'    => 'required',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }


        $product = ProductDetail::findOrFail($id);

        $product->stock      = request('stock');
        $product->product_id = request('category_id');
        $product->details    = request('supplier_id');

        if($product->isDirty(['stock', 'details', 'product_id'])){
            $product->save();
            return $this->success();
        }
        else {
            return $this->failure();
        }
    }

    public function destroy($id) {
        if($detail = ProductDetail::findOrFail($id)){
            $detail->delete();
            return $this->success();
        } 
        else
            return $this->failure();
    }
}
