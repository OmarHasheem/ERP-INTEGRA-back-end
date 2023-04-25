<?php

use App\Http\Controllers\MarketingControllers\CampaignController;
use Illuminate\Support\Facades\Route;


Route::prefix('marketing')->group(function(){
    Route::get('/campaigns', [CampaignController::class, 'index']);
    Route::get('/campaign/show/{id}', [CampaignController::class, 'show']);
    Route::post('/campaign/store', [CampaignController::class, 'store']);
    Route::delete('/campaign/destroy/{id}', [CampaignController::class, 'destroy']);
    Route::put('/campaign/update/{id}', [CampaignController::class, 'update']);
});
