<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketing\Lead;
use App\Http\Resources\Marketing\LeadResource;
use App\Http\Resources\Marketing\LeadCollection;
use Illuminate\Support\Facades\Validator;


class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new LeadCollection(Lead::all());
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
    public function store(Request $request )
    {

        $validator = Validator::make($request->all(), [
            'type' => 'required | alpha:ascii',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

             if($lead = Lead::create ([

                'type' => request('type') ,
            ]));

            return response()->json( ['message'=> 'Lead ' . request('type') . 'has been created']);


    }

    public function attach($id) {

        $lead = Lead::find($id)->customers()->attach(request('customer_id'));

        return response()->json( [ 'message' => 'Done' ]);

    }


    public function detach($id) {

        $lead = Lead::find($id)->customers()->detach(request('customer_id'));

        return response()->json( [ 'message' => 'Done' ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new LeadResource(Lead::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'type' => 'required | alpha:ascii',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $lead = Lead::findOrFail($id);

        $lead->type = request('type');

        if($lead->isDirty(['type'])){
            $lead->save();
            return response()->json( ['message' => 'Lead is updated']);
        }

        else {
            return response()->json([ 'message' => 'Nothing changed']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();
        return response()->json(['message' => 'Lead ' . $lead->name . " has been deleted"]);
    }
}
