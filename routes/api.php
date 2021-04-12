<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth']], function() {

    Route::get('/self', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});

Route::post('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

// Resources
Route::apiResources([
    'users' => UserController::class,
]);

// For testing and debugging only
Route::group(['prefix' => 'test'], function() {

    Route::get('/unauthenticated', function() {
            return response(null, 204);
        })
        ->name('test.unauthenticated');

    Route::get('/authenticated', function() {
            return response(null, 204);
        })
        ->middleware('auth')
        ->name('test.authenticated');
});

// Error catchall
Route::any('{any?}', function () {
    return response('Resource not found', 404);
})->where('any', '.*');
