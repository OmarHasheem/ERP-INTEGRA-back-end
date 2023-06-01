<?php

use App\Http\Controllers\MarketingControllers\EventController;
use Illuminate\Support\Facades\Route;

Route::controller(EventController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        // Route::get('/events', 'index')->middleware('permission:index event');        
        // Route::get('/event/show/{id}', 'show')->middleware('permission:store event');
        // Route::post('/event/store', 'store')->middleware('permission:show event');
        // Route::put('/event/update/{id}', 'update')->middleware('permission:update event');
        // Route::delete('/event/destroy/{id}', 'destroy')->middleware('permission:destroy event');
   
        Route::get('/events', 'index');        
        Route::get('/event/show/{id}', 'show');
        Route::post('/event/store', 'store');
        Route::put('/event/update/{id}', 'update');
        Route::delete('/event/destroy/{id}', 'destroy');
   
    });
});