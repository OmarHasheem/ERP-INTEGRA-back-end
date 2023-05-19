<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Models\marketing\Tv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Marketing\TvResource;
use App\Http\Resources\Marketing\TvCollection;
use Illuminate\Support\Facades\Validator;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TvCollection(Tv::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'channel'            => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'time'               => 'required',
            'cost'               => 'required | numeric',
            'advertising_period' => 'required | numeric',
            'campaign_id'        => 'required | numeric',
            'actual_revenue'     => 'numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        if (Tv::create ([

            'channel'            => request('channel') ,
            'time'               => request('time') ,
            'cost'               => request('cost') ,
            'advertising_period' => request('advertising_period') ,
            'expected_revenue'   => request('expected_revenue') ,
            'campaign_id'        => request('campaign_id')
        ]));

        return response()->json(['message' => 'Tv has been created']);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new TvResource(Tv::find($id));
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
    public function update(Request $request,  $id)
    {

        $validator = Validator::make($request->all(), [
            'channel'            => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'time'               => 'required',
            'cost'               => 'required | numeric',
            'advertising_period' => 'required | numeric',
            'expected_revenue'   => 'required | numeric',
            'campaign_id'        => 'required | numeric',

        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $tv = Tv::findOrFail($id);

        $tv->channel                        = request('channel');
        $tv->time                           = request('time');
        $tv->cost                           = request('cost');
        $tv->advertising_period             = request('advertising_period');
        $tv->expected_revenue      = request('expected_revenue');
        $tv->campaign_id                    = request('campaign_id');

        if($tv->isDirty(['channel' , 'time' , 'cost', 'advertising_period' , 'expected_revenue' , 'campaign_id' ])){
            $tv->save();
            return response()->json( ['message' => 'Tv is Updated']);
        }

        else {
            return response()->json( ['message' => 'Nothing changed']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tv = Tv::findOrFail($id);
        $tv->delete();
        return response()->json( ['message' => 'tv has been deleted']);
    }
}
