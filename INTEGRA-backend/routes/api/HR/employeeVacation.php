<?php

use App\Http\Controllers\HRControllers\EmployeeVacationController;
use Illuminate\Support\Facades\Route;

Route::controller(EmployeeVacationController::class)->group(function () {
    Route::prefix('HR')->group(function (){
        Route::get('/employeeVacations', 'index')->middleware('permission:index employeeVacation');        
        Route::get('/employeeVacation/show/{id}', 'show')->middleware('permission:store employeeVacation');
        Route::post('/employeeVacation/store', 'store')->middleware('permission:show employeeVacation');
        Route::put('/employeeVacation/update/{id}', 'update')->middleware('permission:update employeeVacation');
        Route::delete('/employeeVacation/destroy/{id}', 'destroy')->middleware('permission:destroy employeeVacation');
    });
});


