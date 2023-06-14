<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Models\Marketing\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Marketing\CampaignCollection;
use App\Http\Resources\Marketing\CampaignResource;
use App\Http\Resources\Marketing\EventCollection;
use App\Http\Resources\Marketing\SocialMediaCollection;
use App\Http\Resources\Marketing\TvCollection;
use App\Http\Resources\Marketing\LeadCollection;
use Illuminate\Support\Facades\Validator;
use DB;
use Throwable;

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

            $campaign = Campaign::findOrFail($id);
            return new CampaignResource($campaign);
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

    public function attachCampaignToLead(Request $request, $id) {
        try {
            Campaign::find($id)->leads()->attach(request('lead_id'));
            return $this->success();
        } catch(Throwable $e) {
            return $this->failure();
        }
    }

    //error

    public function detachCampaignToLead($id) {
        try {
            Campaign::find($id)->leads()->detach(request('lead_id'));
            return $this->success();
        } catch(Throwable $e) {
            return $this->failure();
        }
    }

    public function showCampaignEvents($id) {
        $campaign = Campaign::findOrFail($id);
        return new EventCollection($campaign->events);
    }

    public function showCampaignSocialMedia($id) {
        $campaign = Campaign::findOrFail($id);
        return new SocialMediaCollection($campaign->socialmedia);
    }

    public function showCampaignTvs($id) {
        $campaign = Campaign::findOrFail($id);
        return new TvCollection($campaign->tvs);
    }

     public function showCampaignLeads($id) {
        $campaign = Campaign::findOrFail($id);
        return new LeadCollection($campaign->leads);
    }
}
