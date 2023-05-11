<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\BenefitCollection;
use App\Http\Resources\HR\BenefitResource;
use App\Models\HR\Benefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BenefitController extends Controller
{

    public function index() : BenefitCollection
    {
        return new BenefitCollection(Benefit::all());
    }

    public function show($id) : BenefitResource
    {
        $benefit = Benefit::findOrFail($id);
        return new BenefitResource($benefit);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required | alpha:ascii',
            'cost' => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }
        
        Benefit::create([
            'name' => request('name'),
            'cost' => request('cost'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required | alpha:ascii',
            'cost' => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $benefit = Benefit::findOrFail($id);

        $benefit->update([
            'name' => request('name'),
            'cost' => request('cost'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function destroy($id)
    {
        $benefit = Benefit::findOrFail($id);
        $benefit->delete();

        return response()->json(["message" => "The process has been succeded"]);
    }
}
