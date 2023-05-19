<?php

use App\Http\Controllers\HRControllers\DepartmentController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/departments', [DepartmentController::class, 'index'])->middleware('can:index department');
    Route::get('/department/show/{id}', [DepartmentController::class, 'show'])->middleware('can:show department');
    Route::post('/department/store', [DepartmentController::class, 'store'])->middleware('can:store department');
    Route::put('/department/update/{id}', [DepartmentController::class, 'update'])->middleware('can:update department');
    Route::delete('/department/destroy/{id}', [DepartmentController::class, 'destroy'])->middleware('can:destroy department');
});
