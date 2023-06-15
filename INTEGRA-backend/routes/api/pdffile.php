<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::controller(PDFController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        // Route::get('/pdfs/{id}', 'show')->middleware('permission:show pdf'); ;
        // Route::get('/pdfs', 'index')->middleware('permission:index pdf');
        // Route::post('/pdfs/storeCampaign/{id}', 'storeCampaign');
        // Route::get('/pdfs/storeExport/{id}', 'storeExport');
        // Route::post('/pdfs/storeImport/{id}', 'storeImport');
        // Route::delete('/pdfs/{id}', 'destroy')->middleware('permission:destroy pdf');

        Route::get('/pdfs/{id}', 'show');
        Route::get('/pdfs', 'index');
        Route::post('/pdfs/storeImport/{id}', 'storeImport');
        Route::post('/pdfs/storeCampaign/{id}', 'storeCampaign');
        Route::post('/pdfs/storeExport/{id}', 'storeExport');
        Route::post('/pdfs/storeEmployeeVecation/{id}', 'storeEmployeeVacation');
        Route::delete('/pdfs/{id}', 'destroy');


    });
});
