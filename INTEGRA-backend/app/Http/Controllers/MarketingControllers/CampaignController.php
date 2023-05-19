<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Models\Marketing\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Marketing\CampaignResource;
use App\Http\Resources\Marketing\CampaignCollection;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CampaignCollection(Campaign::all());
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
            'name'             => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'description'      => 'required | regex:/^[^\'"]+$/',
            'start_date'       => 'required | date',
            'end_date'         => 'required | date',
            'budget'           => 'required | numeric',
            'expected_revenue' => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        Campaign::create ([
            'name'             => request('name') ,
            'description'      => request('description') ,
            'start_date'       => request('start_date') ,
            'end_date'         => request('end_date') ,
            'budget'           => request('budget') ,
            'expected_revenue' => request('expected_revenue') ,
        ]);

        return response()->json( ['message' => 'Campaign ' . request('name') . ' has been created']);
    }

    public function attach($id) {

        $campaign = Campaign::find($id)->leads()->attach(request('lead_id'));

        return response()->json( [ 'message' => 'Done' ]);

    }

    public function detach($id) {

        $campaign = Campaign::find($id)->leads()->detach(request('lead_id'));

        return response()->json( [ 'message' => 'Done' ]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new CampaignResource(Campaign::find($id));
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
            'name'             => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'description'      => 'required | regex:/^[^\'"]+$/',
            'start_date'       => 'required | date',
            'end_date'         => 'required | date',
            'budget'           => 'required | numeric',
            'expected_revenue' => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $campaign = Campaign::findOrFail($id);

        $campaign->name                  = request('name');
        $campaign->description           = request('description');
        $campaign->start_date            = request('start_date');
        $campaign->end_date              = request('end_date');
        $campaign->budget                = request('budget');
        $campaign->expected_revenue      = request('expected_revenue');

        if($campaign->isDirty(['name' , 'description' , 'start_date', 'end_date' , 'budget' , 'expected_revenue' ])){
            $campaign->save();
            return response()->json(['message' => 'Campaign is updated']);
        }

        else {
            return response()->json(['message' => 'Nothing changed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
        return response()->json(['message' => 'Campaign ' . $campaign->name . ' has been deleted']);
    }
}
