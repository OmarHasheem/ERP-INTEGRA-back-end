<?php

use App\Http\Controllers\UserManagementController\RoleController;
use Illuminate\Support\Facades\Route;

Route::controller(RoleController::class)->group(function () {
Route::prefix('userManagement')->group(function(){
    Route::get('/roles/roleUsers/{id}','showRoleUsers');
    Route::get('/roles/rolePermissions/{id}','showRolePermissions');
    Route::get('/roles/{name}', 'show');
    Route::get('/roles','index');
    Route::post('/roles' ,'store');
    Route::delete('/roles/{name}',  'destroy');
    Route::put('/roles/{id}', 'update');

    Route::post('/roles/attach/{id}',  'attach');
    Route::post('/roles/detach/{id}', 'detach');

    Route::post('/roles/assignRole/{id}', 'assignRole');
    Route::post('/roles/unassignRole/{id}', 'unassignRole');
});
});
