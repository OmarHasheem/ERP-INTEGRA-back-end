<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Models\Marketing\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Marketing\EventResource;
use App\Http\Resources\Marketing\EventCollection;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new EventCollection(Event::all());
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
            'name'             => 'required | alpha:ascii',
            'place'            => 'required | alpha:ascii',
            'description'      => 'required | alpha:ascii',
            'type'             => 'required | alpha:ascii',
            'cost'             => 'required | numeric',
            'expected_revenue' => 'required | numeric',
            'campaign_id'      => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        if (Event::create ([

            'name'             => request('name') ,
            'place'            => request('place') ,
            'description'      => request('description') ,
            'type'             => request('type') ,
            'cost'             => request('cost') ,
            'expected_revenue' => request('expected_revenue') ,
            'campaign_id'      => request('campaign_id') ,

        ]));

        return response()->json(['message' => 'Event ' . request('name') . ' has been created']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new EventResource(Event::find($id));
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
    public function update(Request $request,  $id)
    {

        $validator = Validator::make($request->all(), [
            'name'             => 'required | alpha:ascii',
            'place'            => 'required | alpha:ascii',
            'description'      => 'required | alpha:ascii',
            'type'             => 'required | alpha:ascii',
            'cost'             => 'required | numeric',
            'expected_revenue' => 'required | numeric',
            'campaign_id'      => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $event = Event::findOrFail($id);

        $event->name                  = request('name');
        $event->place                 = request('place');
        $event->description           = request('description');
        $event->type                  = request('type');
        $event->cost                  = request('cost');
        $event->expected_revenue      = request('expected_revenue');
        $event->campaign_id           = request('campaign_id');

        if($event->isDirty(['name' , 'place' , 'description' , 'type' , 'cost' , 'expected_revenue' , 'campaign_id' ])){
            $event->save();
            return response()->json( ['message' => 'Event is Updated']);
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
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Event ' . $event->name . ' has been deleted']);
    }
}
