<?php

use App\Http\Controllers\MarketingControllers\TvController;
use Illuminate\Support\Facades\Route;

Route::prefix('marketing')->group(function(){
    Route::get('/tvs', [TvController::class, 'index']);
    Route::get('/tv/show/{id}', [TvController::class, 'show']);
    Route::post('/tv/store', [TvController::class, 'store']);
    Route::delete('/tv/destroy/{id}', [TvController::class, 'destroy']);
    Route::put('/tv/update/{id}', [TvController::class, 'update']);
 

});