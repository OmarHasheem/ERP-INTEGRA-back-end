    <?php

use App\Http\Controllers\RepositoryControllers\ProductDetailController;
use Illuminate\Support\Facades\Route;


Route::controller(ProductDetailController::class)->group(function () {
    Route::prefix('repository')->group(function (){
        Route::get('/productDetails/{id}', 'show');
        Route::get('/productDetails', 'index');
        Route::post('/productDetails', 'store');
        Route::put('/productDetails/{id}', 'update');
        Route::delete('/productDetails/{id}', 'destroy');
    });
});
