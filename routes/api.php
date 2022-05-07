<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllerAPI;
use App\Http\Controllers\AuthController;

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

// Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/rank', [AuthController::class, 'ranking']);

Route::get('/game', [AuthControllerAPI::class, 'retornaGame']);

Route::post('/login', [AuthControllerAPI::class, 'loginAPI']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function(Request $request) {
        return auth()->user();
    });
    Route::post('/puntuacio/{puntuacio}', [AuthControllerAPI::class, 'puntuacio']);
    Route::post('/logout', [AuthControllerAPI::class, 'logout']);
});