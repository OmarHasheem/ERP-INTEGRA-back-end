<?php

use App\Http\Controllers\HRControllers\BenefitController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/benefits', [BenefitController::class, 'index']);
    Route::get('/benefit/show/{id}', [BenefitController::class, 'show']);

    Route::post('/benefit/store', [BenefitController::class, 'store']);
    Route::put('/benefit/update/{id}', [BenefitController::class, 'update']);
    Route::delete('/benefit/destroy/{id}', [BenefitController::class, 'destroy']);
});
