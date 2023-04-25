<?php

use App\Http\Controllers\MarketingControllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::prefix('marketing')->group(function(){
    Route::get('/pdfs', [PDFController::class, 'index']);
    Route::get('/pdf/show/{id}', [PDFController::class, 'show']);
    Route::post('/pdf/store/{id}', [PDFController::class, 'store']);
    Route::delete('/pdf/destroy/{id}', [PDFController::class, 'destroy']);
});
