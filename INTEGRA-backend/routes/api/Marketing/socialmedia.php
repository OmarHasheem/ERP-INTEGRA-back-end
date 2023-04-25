<?php

use App\Http\Controllers\MarketingControllers\SocialMediaController;
use Illuminate\Support\Facades\Route;

Route::prefix('marketing')->group(function(){
    Route::get('/socialMedia', [SocialMediaController::class, 'index']);
    Route::get('/socialMedia/show/{id}', [SocialMediaController::class, 'show']);
    Route::post('/socialMedia/store', [SocialMediaController::class, 'store']);
    Route::delete('/socialMedia/destroy/{id}', [SocialMediaController::class, 'destroy']);
    Route::put('/socialMedia/update/{id}', [SocialMediaController::class, 'update']);


});
