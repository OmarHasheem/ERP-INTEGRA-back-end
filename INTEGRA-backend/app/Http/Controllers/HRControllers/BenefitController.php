<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\BenefitCollection;
use App\Http\Resources\HR\BenefitResource;
use App\Models\HR\Benefit;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> 69fa921c485ba7180d0f275486482a80fc772c95
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
            'name' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
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

<<<<<<< HEAD
    public function update(Request $request , $id)
=======
    public function update(Request $request, $id)
>>>>>>> 69fa921c485ba7180d0f275486482a80fc772c95
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
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
