<?php

use App\Http\Controllers\HRControllers\EmployeeCertificateController;
use Illuminate\Support\Facades\Route;


Route::prefix('HR')->group(function (){
    Route::get('/employeeCertificates', [EmployeeCertificateController  ::class, 'index'])->middleware('can:index employeeCertification');
    Route::get('/employeeCertificate/show/{id}', [EmployeeCertificateController::class, 'show'])->middleware('can:store employeeCertification');
    Route::post('/employeeCertificate/store', [EmployeeCertificateController::class, 'store'])->middleware('can:show employeeCertification');
    Route::put('/employeeCertificate/update/{id}', [EmployeeCertificateController::class, 'update'])->middleware('can:update employeeCertification');
    Route::delete('/employeeCertificate/destroy/{id}', [EmployeeCertificateController::class, 'destroy'])->middleware('can:destroy employeeCertification');
});
