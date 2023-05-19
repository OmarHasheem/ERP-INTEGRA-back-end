<?php

use App\Http\Controllers\MarketingControllers\CampaignController;
use Illuminate\Support\Facades\Route;



Route::prefix('marketing')->group(function(){
    Route::get('/campaigns', [CampaignController::class, 'index'])->middleware('permission:index campaign');
    Route::get('/campaign/show/{id}', [CampaignController::class, 'show'])->middleware('permission:show campaign');
    Route::post('/campaign/store', [CampaignController::class, 'store'])->middleware('permission:store campaign');
    Route::delete('/campaign/destroy/{id}', [CampaignController::class, 'destroy'])->middleware('permission:destroy campaign');
    Route::put('/campaign/update/{id}', [CampaignController::class, 'update'])->middleware('permission:update campaign');
    Route::post('/campaign/attach/{id}', [CampaignController::class, 'attach'])->middleware('permission:attach campaign');
    Route::post('/campaign/detach/{id}', [CampaignController::class, 'detach'])->middleware('permission:view-detach campaign');

});
