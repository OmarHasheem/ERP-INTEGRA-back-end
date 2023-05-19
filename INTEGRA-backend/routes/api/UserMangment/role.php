<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('userMangment')->group(function(){
    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/role/show/{name}', [RoleController::class, 'show']);
    Route::post('/role/store', [RoleController::class, 'store']);
    Route::delete('/role/destroy/{name}', [RoleController::class, 'destroy']);
    Route::put('/role/update/{id}', [RoleController::class, 'update']);

    Route::post('/role/attach/{name}', [RoleController::class, 'attach']);
    Route::post('/role/detach/{name}', [RoleController::class, 'detach']);

    Route::post('/role/assignRole/{id}', [RoleController::class, 'assignRole']);
    Route::post('/role/unassignRole/{id}', [RoleController::class, 'unassignRole']);

});
