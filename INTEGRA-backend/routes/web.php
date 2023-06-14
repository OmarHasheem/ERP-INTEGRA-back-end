<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {

//     $role = Role::find(1);

//     // $permission = Permission::find(1);

//     // $role->givePermissionTo($permission);

//     return $role->getPermissionNames();
// });

Route::controller(PDFController::class)->group(function () {
    Route::prefix('marketing')->group(function (){
        // Route::get('/pdfs', 'index')->middleware('permission:index pdf');
        // Route::get('/pdf/show/{id}', 'show')->middleware('permission:store pdf');
        // Route::post('/pdf/store', 'store')->middleware('permission:show pdf');
        // Route::delete('/pdf/destroy/{id}', 'destroy')->middleware('permission:destroy pdf');

        Route::get('/pdfs', 'index');
        Route::get('/pdf/show/{id}', 'show');
        Route::get('/pdfs/storeImport/{id}', 'storeImport');
        Route::get('/pdfs/storeExport/{id}', 'storeExport');
        Route::get('/pdfs/storeCampaign/{id}','storeCampaign');
        Route::get('/pdfs/storeEmployeeVacation/{id}','storeEmployeeVacation');
        Route::delete('/pdf/destroy/{id}', 'destroy');
    });
});
