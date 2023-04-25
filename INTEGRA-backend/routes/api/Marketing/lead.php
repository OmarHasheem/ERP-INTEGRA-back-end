<?php

use App\Http\Controllers\MarketingControllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::prefix('marketing')->group(function(){
    Route::get('/leads', [LeadController::class, 'index']);
    Route::get('/lead/show/{id}', [LeadController::class, 'show']);
    Route::post('/lead/store', [LeadController::class, 'store']);
    Route::delete('/lead/destroy/{id}', [LeadController::class, 'destroy']);
    Route::put('/lead/update/{id}', [LeadController::class, 'update']);

});