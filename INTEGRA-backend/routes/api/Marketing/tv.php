<?php

use App\Http\Controllers\MarketingControllers\TvController;
use Illuminate\Support\Facades\Route;

Route::controller(TvController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
<<<<<<< HEAD
        // Route::get('/tvs/{id}', 'show')->middleware('permission:show Tv');        
        // Route::get('/tvs', 'index')->middleware('permission:index Tv');
        // Route::post('/tvs', 'store')->middleware('permission:store Tv');
        // Route::put('tvs/{id}', 'update')->middleware('permission:update Tv');
        // Route::delete('/tvs/{id}', 'destroy')->middleware('permission:destroy Tv');

        Route::get('/tvs/{id}', 'show');        
        Route::get('/tvs', 'index');
        Route::post('/tvs', 'store');
        Route::put('tvs/{id}', 'update');
=======
        // Route::get('/tvs/{id}', 'show')->middleware('permission:store Tv');
        // Route::get('/tvs', 'index')->middleware('permission:index Tv');        
        // Route::post('/tvs', 'store')->middleware('permission:show Tv');
        // Route::put('/tvs/{id}', 'update')->middleware('permission:update Tv');
        // Route::delete('/tvs/{id}', 'destroy')->middleware('permission:destroy Tv');

        Route::get('/tvs/{id}', 'show');
        Route::get('/tvs', 'index');        
        Route::post('/tvs', 'store');
        Route::put('/tvs/{id}', 'update');
>>>>>>> d3d05fe32dbc62ac755ed4891f41fe55eb8e5fb9
        Route::delete('/tvs/{id}', 'destroy');
    });
});