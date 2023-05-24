<?php

use App\Http\Controllers\HRControllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::controller(DepartmentController::class)->group(function () {
    Route::prefix('HR')->group(function (){
        Route::get('/departments', 'index')->middleware('permission:index department');        
        Route::get('/department/show/{id}', 'show')->middleware('permission:store department');
        Route::post('/department/store', 'store')->middleware('permission:show department');
        Route::put('/department/update/{id}', 'update')->middleware('permission:update department');
        Route::delete('/department/destroy/{id}', 'destroy')->middleware('permission:destroy department');
    });
});

