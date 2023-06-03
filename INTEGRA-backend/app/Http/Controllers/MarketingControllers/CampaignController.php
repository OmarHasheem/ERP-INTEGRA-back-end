<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Models\Marketing\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Marketing\CampaignResource;
use App\Http\Resources\Marketing\CampaignCollection;
use Illuminate\Support\Facades\Validator;
use DB;

class CampaignController extends Controller
{

    public function index() : CampaignCollection {

        return new CampaignCollection(Campaign::all());
    }

    public function store(Request $request) {

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

       if( Campaign::create ([
            'name'             => request('name') ,
            'description'      => request('description') ,
            'start_date'       => request('start_date') ,
            'end_date'         => request('end_date') ,
            'budget'           => request('budget') ,
            'expected_revenue' => request('expected_revenue') ,
        ]))
            return $this->success();
        else
            return $this->failure();
    }

    public function show($id) : CampaignResource {

            $campaign = Campaign::find($id);
            if($campaign)
                return new CampaignResource($campaign);
            else 
                return $this->failure();
    }

    public function update(Request $request, $id) {

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
            return $this->success();
        }
        else 
            return $this->failure();
    }

    public function destroy($id) {

        if( $campaign = Campaign::findOrFail($id)){
            $campaign->delete();
            return $this->success();
        } 
        else
            return $this->failure();
    }

    public function attachCampaignToLead($id) {

        $campaign = Campaign::find($id)->leads()->attach(request('lead_id'));
        
        if($campaign)
            return $this->success();
         else
            return $this->failure();
    }

    public function detachCampaignToLead($id) {

        $campaign = Campaign::find($id)->leads()->detach(request('lead_id'));

        if($campaign)
            return $this->success();
        else
            return $this->failure();
    }

    public function edit(Request $request)
    {
        $query = DB::table('campaigns');
        if ($request->name) {
            $name = $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->start_date) {
            $start_date = $query->where('start_date', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $end_date = $query->where('end_date', '<=', $request->end_date);
        }
        if ($request->budget) {
            $budget = $query->where('budget', '>=', $request->budget);
        }
        if ($request->expected_revenue) {
            $expected_revenue = $query->where('expected_revenue', '>=', $request->expected_revenue);
        }
        if ($name || $start_date || $end_date || $budget || $expected_revenue) {
            $query->where(function ($q) use ($name, $start_date, $end_date, $budget, $expected_revenue) {
                $q->where('name', 'like', '%' . $name . '%')
                  ->where('start_date', '>=', $start_date)
                  ->where('end_date', '<=', $end_date)
                  ->where('budget', '>=', $budget)
                  ->where('expected_revenue', '>=', $expected_revenue);
            });
        }

        // if ($request->tv) {
        //     $query->whereHas('tv', function ($q) use ($tv) {
        //         $q->where('name', 'like', '%' . $tv . '%');
        //     });
        // }

        // if ($request->event) {
        //     $query->whereHas('event', function ($q) use ($event) {
        //         $q->where('name', 'like', '%' . $event . '%');
        //     });
        // }

        // if ($request->social_media) {
        //     $query->whereHas('socialMedia', function ($q) use ($social_media) {
        //         $q->where('name', 'like', '%' . $social_media . '%');
        //     });
        // }

       return
       
       $campaigns = $query->get();
    }


}
