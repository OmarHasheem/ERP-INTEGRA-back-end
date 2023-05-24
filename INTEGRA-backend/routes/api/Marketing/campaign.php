<?php

use App\Http\Controllers\MarketingControllers\CampaignController;
use Illuminate\Support\Facades\Route;

Route::controller(CampaignController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        Route::get('/campaigns', 'index')->middleware('permission:index campaign');        
        Route::get('/campaign/show/{id}', 'show')->middleware('permission:store campaign');
        Route::post('/campaign/store', 'store')->middleware('permission:show campaign');
        Route::put('/campaign/update/{id}', 'update')->middleware('permission:update campaign');
        Route::delete('/campaign/destroy/{id}', 'destroy')->middleware('permission:destroy campaign');
        Route::post('/campaign/attach/{id}', 'attach')->middleware('campaign:attach campaign');
        Route::post('/campaign/detach/{id}', 'detach')->middleware('campaign:detach campaign');
    });
});

