<?php

use App\Http\Controllers\MarketingControllers\LeadController;
use Illuminate\Support\Facades\Route;


Route::prefix('marketing')->group(function(){
    Route::get('/leads', [LeadController::class, 'index'])->middleware('permission:index lead');
    Route::get('/lead/show/{id}', [LeadController::class, 'show'])->middleware('permission:show lead');
    Route::post('/lead/store', [LeadController::class, 'store'])->middleware('permission:store lead');
    Route::delete('/lead/destroy/{id}', [LeadController::class, 'destroy'])->middleware('permission:destroy lead');
    Route::put('/lead/update/{id}', [LeadController::class, 'update'])->middleware('permission:update lead');

});