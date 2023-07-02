<?php

use App\Http\Controllers\MarketingControllers\CampaignController;
use Illuminate\Support\Facades\Route;

Route::controller(CampaignController::class)->group(function () {
    Route::prefix('marketing')->group(function (){

        // Route::get('/campaigns/showCampaignEvents/{id}', 'showCampaignEvents')->middleware('permission:show CampaignEvents');
        // Route::get('/campaigns/showCampaignTvs/{id}', 'showCampaignTvs')->middleware('permission:show CampaignTvs');
        // Route::get('/campaigns/showCampaignSocialMedia/{id}', 'showCampaignSocialMedia')->middleware('permission:show CampaignSocialMedia');
        // Route::get('/campaigns/showCampaignLeads/{id}', 'showCampaignLeads')->middleware('permission:show CampaignLeads');

        // Route::get('/campaigns/{id}', 'show')->middleware('permission:show campaign');
        // Route::get('/campaigns', 'index')->middleware('permission:index campaign');

        // Route::post('/campaigns/attachCampaignToLead/{id}', 'attachCampaignToLead')->middleware('permission:attach CampaignToLead');
        // Route::post('/campaigns/detachCampaignToLead/{id}', 'detachCampaignToLead')->middleware('permission:detach CampaignToLead');

        // Route::post('/campaigns', 'store')->middleware('permission:store campaign');
        // Route::put('/campaigns/{id}', 'update')->middleware('permission:update campaign');
        // Route::delete('/campaigns/{id}', 'destroy')->middleware('permission:destroy campaign');



        Route::get('/campaigns/showCampaignsRevenues', 'showCampaignsRevenues');
        Route::get('/campaigns/showCampaignsDetailsRevenue', 'showCampaignsDetailsRevenue');
        Route::get('/campaigns/{id}', 'show');
        Route::get('/campaigns', 'index');
        Route::post('/campaigns', 'store');
        Route::put('/campaigns/{id}', 'update');
        Route::delete('/campaigns/{id}', 'destroy');
        Route::post('/campaigns/attachCampaignToLead/{id}', 'attachCampaignToLead');
        Route::post('/campaigns/detachCampaignToLead/{id}', 'detachCampaignToLead');

        Route::get('/campaigns/showCampaignEvents/{id}', 'showCampaignEvents');
        Route::get('/campaigns/showCampaignTvs/{id}', 'showCampaignTvs');
        Route::get('/campaigns/showCampaignSocialMedia/{id}', 'showCampaignSocialMedia');
        Route::get('/campaigns/showCampaignLeads/{id}', 'showCampaignLeads');



    });
});

