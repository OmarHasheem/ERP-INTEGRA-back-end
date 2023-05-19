<?php

use App\Http\Controllers\HRControllers\BenefitController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/benefits', [BenefitController::class, 'index'])->middleware('can:index benefit');
    Route::get('/benefit/show/{id}', [BenefitController::class, 'show'])->middleware('can:show benefit');
    Route::post('/benefit/store', [BenefitController::class, 'store'])->middleware('can:store benefit');
    Route::put('/benefit/update/{id}', [BenefitController::class, 'update'])->middleware('can:update benefit');
    Route::delete('/benefit/destroy/{id}', [BenefitController::class, 'destroy'])->middleware('can:destroy benefit');
});
