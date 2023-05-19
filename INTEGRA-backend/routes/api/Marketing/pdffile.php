<?php

use App\Http\Controllers\MarketingControllers\PDFController;
use Illuminate\Support\Facades\Route;


Route::prefix('marketing')->group(function(){
    Route::get('/pdfs', [PDFController::class, 'index'])->middleware('permission:index pdf');
    Route::get('/pdf/show/{id}', [PDFController::class, 'show'])->middleware('permission:show pdf');
    Route::post('/pdf/store/{id}', [PDFController::class, 'store'])->middleware('permission:store pdf');
    Route::delete('/pdf/destroy/{id}', [PDFController::class, 'destroy'])->middleware('permission:destoy pdf');
});
