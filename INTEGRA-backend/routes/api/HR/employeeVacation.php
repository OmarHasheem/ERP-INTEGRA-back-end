<?php

use App\Http\Controllers\HRControllers\EmployeeVacationController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/employeeVacations', [EmployeeVacationController ::class, 'index']);
    Route::get('/employeeVacation/show/{id}', [EmployeeVacationController::class, 'show']);

    Route::post('/employeeVacation/store', [EmployeeVacationController::class, 'store']);
    Route::put('/employeeVacation/update/{id}', [EmployeeVacationController::class, 'update']);
    Route::delete('/employeeVacation/destroy/{id}', [EmployeeVacationController::class, 'destroy']);
});
