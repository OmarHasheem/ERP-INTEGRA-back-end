<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Models\marketing\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Marketing\SocialMediaResource;
use App\Http\Resources\Marketing\SocialMediaCollection;
use Illuminate\Support\Facades\Validator;


class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new SocialMediaCollection(SocialMedia::all());
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

        $validator = Validator::make($request->all(), [
            'blogger'          => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'type'             => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'way'              => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'cost'             => 'required | numeric',
            'expected_revenue' => 'required | numeric',
            'campaign_id'      => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        if (SocialMedia::create ([

            'blogger'          => request('blogger') ,
            'type'             => request('type') ,
            'way'              => request('way') ,
            'cost'             => request('cost') ,
            'expected_revenue' => request('expected_revenue') ,
            'campaign_id'      => request('campaign_id')
        ]));


        return response()->json([ 'message' => 'SocialMedia  has been created']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new SocialMediaResource(SocialMedia::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'blogger'          => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'type'             => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'way'              => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'cost'             => 'required | numeric',
            'expected_revenue' => 'required | numeric',
            'campaign_id'      => 'required | numeric',

        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $socialmedia = SocialMedia::findOrFail($id);

        $socialmedia->blogger               = request('blogger');
        $socialmedia->type                  = request('type');
        $socialmedia->way                   = request('way');
        $socialmedia->cost                  = request('cost');
        $socialmedia->expected_revenue      = request('expected_revenue');
        $socialmedia->campaign_id           = request('campaign_id');


        if($socialmedia->isDirty(['blogger' , 'type' , 'way', 'cost' , 'expected_revenue' , 'campaign_id' ])){
            $socialmedia->save();
            return response()->json(['message' => 'SocialMedia is updated']);
        }

        else {
        return response()->json(['message' => 'Nothing Changed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $socialmedia = SocialMedia::findOrFail($id);
        $socialmedia->delete();
        return response()->json(['message' => 'SocialMedia has been deleted']);
    }
}
