<?php

use App\Http\Controllers\MarketingControllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::controller(LeadController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        Route::get('/leads', 'index')->middleware('permission:index lead');        
        Route::get('/lead/show/{id}', 'show')->middleware('permission:store lead');
        Route::post('/lead/store', 'store')->middleware('permission:show lead');
        Route::put('/lead/update/{id}', 'update')->middleware('permission:update lead');
        Route::delete('/lead/destroy/{id}', 'destroy')->middleware('permission:destroy lead');
    });
});