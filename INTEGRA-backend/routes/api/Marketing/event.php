<?php

use App\Http\Controllers\MarketingControllers\EventController;
use Illuminate\Support\Facades\Route;


Route::prefix('marketing')->group(function(){
    Route::get('/events', [EventController::class, 'index'])->middleware('permission:index event');
    Route::get('/event/show/{id}', [EventController::class, 'show'])->middleware('permission:show event');
    Route::post('/event/store', [EventController::class, 'store'])->middleware('permission:store event');
    Route::delete('/event/destroy/{id}', [EventController::class, 'destroy'])->middleware('permission:destroy event');
    Route::put('/event/update/{id}', [EventController::class, 'update'])->middleware('permission:update event');
});