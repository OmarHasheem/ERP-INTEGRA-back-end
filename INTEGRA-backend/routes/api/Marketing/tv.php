<?php

use App\Http\Controllers\MarketingControllers\TvController;
use Illuminate\Support\Facades\Route;

Route::prefix('marketing')->group(function(){
    Route::get('/tvs', [TvController::class, 'index'])->middleware('permission:index tv');
    Route::get('/tv/show/{id}', [TvController::class, 'show'])->middleware('permission:show tv');
    Route::post('/tv/store', [TvController::class, 'store'])->middleware('permission:store tv');
    Route::delete('/tv/destroy/{id}', [TvController::class, 'destroy'])->middleware('permission:destroy tv');
    Route::put('/tv/update/{id}', [TvController::class, 'update'])->middleware('permission:update tv');
 

});