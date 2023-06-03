<?php

use App\Http\Controllers\MarketingControllers\TvController;
use Illuminate\Support\Facades\Route;

Route::controller(TvController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        Route::get('/Tvs', 'index')->middleware('permission:index Tv');        
        Route::get('/Tv/show/{id}', 'show')->middleware('permission:store Tv');
        Route::post('/Tv/store', 'store')->middleware('permission:show Tv');
        Route::put('/Tv/update/{id}', 'update')->middleware('permission:update Tv');
        Route::delete('/Tv/destroy/{id}', 'destroy')->middleware('permission:destroy Tv');
    });
});