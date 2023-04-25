<?php

use App\Http\Controllers\MarketingControllers\EventController;
use Illuminate\Support\Facades\Route;

Route::prefix('marketing')->group(function(){
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/event/show/{id}', [EventController::class, 'show']);
    Route::post('/event/store', [EventController::class, 'store']);
    Route::delete('/event/destroy/{id}', [EventController::class, 'destroy']);
    Route::put('/event/update/{id}', [EventController::class, 'update']);
});