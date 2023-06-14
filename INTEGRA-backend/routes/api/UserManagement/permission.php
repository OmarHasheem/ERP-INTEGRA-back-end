<?php

use App\Http\Controllers\UserManagementController\PermissionController;
use Illuminate\Support\Facades\Route;


Route::controller(PermissionController::class)->group(function () {
Route::prefix('userMangement')->group(function(){
    Route::get('/permissions/{id}', 'showPermissionRoles');
    Route::get('/permissions', 'index');
});
});
