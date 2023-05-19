<?php

use App\Http\Controllers\MarketingControllers\SocialMediaController;
use Illuminate\Support\Facades\Route;


Route::prefix('marketing')->group(function(){
    Route::get('/socialMedia', [SocialMediaController::class, 'index'])->middleware('permission:index socialmedia');
    Route::get('/socialMedia/show/{id}', [SocialMediaController::class, 'show'])->middleware('permission:show socialmedia');
    Route::post('/socialMedia/store', [SocialMediaController::class, 'store'])->middleware('permission:store socialmedia');
    Route::delete('/socialMedia/destroy/{id}', [SocialMediaController::class, 'destroy'])->middleware('permission:destroy socialmedia');
    Route::put('/socialMedia/update/{id}', [SocialMediaController::class, 'update'])->middleware('permission:update socialmedia');


});
