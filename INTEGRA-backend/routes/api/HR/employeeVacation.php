<?php

use App\Http\Controllers\HRControllers\EmployeeVacationController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/employeeVacations', [EmployeeVacationController ::class, 'index'])->middleware('can:index campaign');
    Route::get('/employeeVacation/show/{id}', [EmployeeVacationController::class, 'show'])->middleware('can:index campaign');
    Route::post('/employeeVacation/store', [EmployeeVacationController::class, 'store'])->middleware('can:index campaign');
    Route::put('/employeeVacation/update/{id}', [EmployeeVacationController::class, 'update'])->middleware('can:index campaign');
    Route::delete('/employeeVacation/destroy/{id}', [EmployeeVacationController::class, 'destroy'])->middleware('can:index campaign');
});
