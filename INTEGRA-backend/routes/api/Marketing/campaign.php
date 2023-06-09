<?php

use App\Http\Controllers\MarketingControllers\CampaignController;
use Illuminate\Support\Facades\Route;

Route::controller(CampaignController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        // Route::get('/campaigns/{id}', 'show')->middleware('permission:show campaign');        
        // Route::get('/campaigns', 'index')->middleware('permission:index campaign');
        // Route::post('/campaigns', 'store')->middleware('permission:store campaign');
        // Route::put('/campaigns/{id}', 'update')->middleware('permission:update campaign');
        // Route::delete('/campaigns/{id}', 'destroy')->middleware('permission:destroy campaign');
        // Route::post('/campaigns/attachCampaignToLead/{id}', 'attachCampaignToLead')->middleware('campaign:attach attachCampaignToLead');
        // Route::post('/campaigns/detachCampaignToLead/{id}', 'detachCampaignToLead')->middleware('campaign:detach detachCampaignToLead   ');

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

