<?php

use App\Http\Controllers\HRControllers\DepartmentController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::get('/department/show/{id}', [DepartmentController::class, 'show']);

    Route::post('/department/store', [DepartmentController::class, 'store']);
    Route::put('/department/update/{id}', [DepartmentController::class, 'update']);
    Route::delete('/department/destroy/{id}', [DepartmentController::class, 'destroy']);
});
