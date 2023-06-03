<?php

use App\Http\Controllers\MarketingControllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::controller(LeadController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        // Route::get('/leads/{id}', 'show')->middleware('permission:show lead');
        // Route::get('/leads', 'index')->middleware('permission:index lead');        
        // Route::post('/leads', 'store')->middleware('permission:store lead');
        // Route::put('/leads/{id}', 'update')->middleware('permission:update lead');
        // Route::delete('/leads/{id}', 'destroy')->middleware('permission:destroy lead');

        Route::get('/leads/{id}', 'show');
        Route::get('/leads', 'index');        
        Route::post('/leads', 'store');
        Route::put('/leads/{id}', 'update');
        Route::delete('/leads/{id}', 'destroy');

        
    });
});