<?php

use App\Http\Controllers\MarketingControllers\SocialMediaController;
use Illuminate\Support\Facades\Route;

Route::controller(SocialMediaController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        // Route::get('/socialMedia', 'index')->middleware('permission:index socialmedia');        
        // Route::get('/socialMedia/show/{id}', 'show')->middleware('permission:store socialmedia');
        // Route::post('/socialMedia/store', 'store')->middleware('permission:show socialmedia');
        // Route::put('/socialMedia/update/{id}', 'update')->middleware('permission:update socialmedia');
        // Route::delete('/socialMedia/destroy/{id}', 'destroy')->middleware('permission:destroy socialmedia');

        Route::get('/socialMedia', 'index');        
        Route::get('/socialMedia/show/{id}', 'show');
        Route::post('/socialMedia/store', 'store');
        Route::put('/socialMedia/update/{id}', 'update');
        Route::delete('/socialMedia/destroy/{id}', 'destroy');
    });
});
